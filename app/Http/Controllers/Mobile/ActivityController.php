<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Services\ActivityService;
use App\Common\Lib\Result;
use App\Models\Dsign;
use App\Models\Dsignsys;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Facades\User;
use App\Models\DPgGameBets;
use App\Models\DUserRecharge;

/**
 * 活动任务相关
 */
class ActivityController extends Controller
{
    private $activityService;

    public function __construct(ActivityService $activityService)
    {
       $this->activityService = $activityService;
    }

    public function index()
    {
        $data = [];
        $data['activity'] = $this->activityService->getActivity();

        return view(ViewHelper::getTemplate('activity.index'), $data);
    }

    public function show(int $id)
    {
        $data = [];
        $data['activity'] = $this->activityService->getActivityInfo($id);

        return view(ViewHelper::getTemplate('activity.show'), $data);
    }

    /**
     * 签到准备数据
     */
    public function signlog(){
        $user = Auth::user();
        $today = $this->today();
        $yesterday = $this->yesterday();
        $signIn = new Dsign();
        $signsys = new Dsignsys();
        $todaysign = 0; //今日是否签到
        $date = 0;
        $lastSignIn = $signIn::where(['uid' => $user->uid])->orderBy('timestamps', 'desc')->first();

        $todaysign = $signIn::where(['uid' => $user->uid])->whereBetween('timestamps', [date('Y-m-d H:i:s',$today[0]), date('Y-m-d H:i:s',$today[1])])->first();
        $yesterdaysign = $signIn::where(['uid' => $user->uid])->whereBetween('timestamps', [date('Y-m-d H:i:s',$yesterday[0]), date('Y-m-d H:i:s',$yesterday[1])])->first();
        if(!empty($yesterdaysign)){ //昨天如果没有签到，当前签到视为第一天签到
            $date = $lastSignIn['sort'];
        }
        $rechage = DUserRecharge::where(['uid' => $user->uid,'status'=>2])->whereBetween('create_time', [$today[0], $today[1]])->sum('count');
        $pgbet = DPgGameBets::where(['uid' => $user->uid,'status'=>2])->where('bet_amount', '<>', 0)->whereBetween('bet_stamp', [$today[0], $today[1]])->where('status', CommonEnum::ENABLE)->sum('bet_amount');
        if(!empty($todaysign) && $rechage >= 10 && $pgbet >= 50){
            $todaysign = 1;
        }
        $return = [
            'user' => $user,
            'list' => $signsys::orderBy('date', 'asc')->get(),
            'date' => $date,
            'todaysign' => $todaysign,
            'today_recharge' => $rechage,
            'today_pgbet' => $pgbet,
            'recharge_percent' => round($rechage * 100 / 10, 2),
            'bet_percent' => round($pgbet * 100 / 50, 2)
        ];
        return view(ViewHelper::getTemplate('activity.signin'), $return);
    }

    /**
     * 用户签到
     */
    public function signIn()
    {
        $user = Auth::user();
        $today = $this->today();
        $yesterday = $this->yesterday();
        $signIn = new Dsign();
        $signsys = new Dsignsys();
        // 检查用户是否已经签到
        $lastSignIn = $signIn::where(['uid' => $user->uid])->orderBy('timestamps', 'desc')->first();
        if($lastSignIn && $lastSignIn['sort'] == 7){
            return Result::error('Have signed in for 7 consecutive days');
        }
        $todaysign = $signIn::where(['uid' => $user->uid])->whereBetween('timestamps', [date('Y-m-d H:i:s',$today[0]), date('Y-m-d H:i:s',$today[1])])->first();
        if(!empty($todaysign)){
            return Result::error('Already signed in today');
        }
        $rechage = DUserRecharge::where(['uid' => $user->uid,'status'=>2])->whereBetween('create_time', [$today[0], $today[1]])->sum('count');
        $pgbet = DPgGameBets::where(['uid' => $user->uid,'status'=>2])->where('bet_amount', '<>', 0)->whereBetween('bet_stamp', [$today[0], $today[1]])->where('status', CommonEnum::ENABLE)->sum('bet_amount');
        if($rechage < 10 && $pgbet < 50){
            return Result::error('Condition not met');
        }
        // 获取签到奖励
        // 检查用户是否有断签
        $yesterdaysign = $signIn::where(['uid' => $user->uid])->whereBetween('timestamps', [date('Y-m-d H:i:s',$yesterday[0]), date('Y-m-d H:i:s',$yesterday[1])])->first();
        if(!empty($yesterdaysign)){ //昨天如果没有签到，当前签到视为第一天签到
            $sort = ($lastSignIn->sort)+1;
            $reward = $signsys::where(['date' => $sort])->first();
        }else{
            $sort = 1;
            $reward = $signsys::where(['date' => 1])->first();
        }
        DB::beginTransaction(); // 开启事务
        try {
            // 执行数据库操作
            // 创建签到记录
            $signIn->uid = $user->uid;
            $signIn->date = date('Y-m-d');
            $signIn->sort = $sort;
            $signIn->coin = $reward['coin'];
            $signIn->save();
            // 更新用户金币
            User::signin($user, $reward['coin']);
            DB::commit(); // 提交事务
            return Result::success();
        } catch (\Exception $e) {
            // 异常处理逻辑
            DB::rollback(); // 回滚事务
            return Result::error($e->getMessage());
        }

        return Result::success();
    }

    /**
     * 返回今日开始和结束的时间戳
     *
     * @return array
     */
    public static function today()
    {
        return [
            mktime(0, 0, 0, date('m'), date('d'), date('Y')),
            mktime(23, 59, 59, date('m'), date('d'), date('Y'))
        ];
    }

    /**
     * 返回昨日开始和结束的时间戳
     *
     * @return array
     */
    public static function yesterday()
    {
        return [
            mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')),
            mktime(23, 59, 59, date('m'), date('d') - 1, date('Y'))
        ];
    }

    /**
     * 返回本周开始和结束的时间戳
     *
     * @return array
     */
    public static function week()
    {
        $timestamp = time();
        return [
            strtotime(date('Y-m-d', strtotime("this week Monday", $timestamp))),
            strtotime(date('Y-m-d', strtotime("this week Sunday", $timestamp))) + 24 * 3600 - 1
        ];
    }

    /**
     * 返回本月开始和结束的时间戳
     *
     * @return array
     */
    public static function month($everyDay = false)
    {
        return [
            mktime(0, 0, 0, date('m'), 1, date('Y')),
            mktime(23, 59, 59, date('m'), date('t'), date('Y'))
        ];
    }
}
