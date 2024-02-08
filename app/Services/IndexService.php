<?php
namespace App\Services;

use App\Cache\IndexGameCache;
use App\Cache\UserCache;
use App\Common\Enum\CommonEnum;
use App\Helper\RedPackageHelper;
use App\Helper\SystemConfigHelper;
use App\Models\DPgProGame;
use App\Models\DRedPacket;
use App\Repositories\DPgProGameRepository;
use App\Repositories\DRedPacketUserRepository;
use App\Repositories\SConfigPicRepository;
use App\Repositories\SNoticeIndexRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexService
{
    private $picRepo;
    private $userRedPack;
    private $noticeRepo;

    public function __construct(
        SConfigPicRepository $picRepo,
        DRedPacketUserRepository $userRedPack,
        SNoticeIndexRepository $noticeRepo)
    {
        $this->picRepo  = $picRepo;
        $this->userRedPack = $userRedPack;
        $this->noticeRepo = $noticeRepo;
    }

    /**
     * 获取首页数据
     * @param array $params
     * @return array
     */
    public function getIndexData(array $params) :array
    {
        $data=[];
        $data['user'] = null;
        if(Auth::check()) {
            $data['user'] = Auth::user();
        }

        $data['showLogin'] = $params['showLogin'] ?? 0;
        $data['code'] = $params['code'] ?? '';

        if (!Auth::check() && $data['code']) {
            $data['showLogin'] = 1;
        }

        if($data['code']) {
            session([CommonEnum::INVITE_CODE_KEY => $data['code']]);
        }
        $pgstatus = SystemConfigHelper::getByKey('pgstatus');
        if(!$pgstatus){ //0=真PG 1=假PG
            $data['pgRecommend'] = IndexGameCache::getPGRecommend();
        }else{
            $data['pgRecommend'] = IndexGameCache::getPGRecommendtc();
        }
        $data['ppRecommend'] = IndexGameCache::getPPRecommend();
        if(!$pgstatus){ //0=真PG 1=假PG
            $data['favorRecommend'] = IndexGameCache::getFavorRecommend();
        }else{
            $data['favorRecommend'] = IndexGameCache::getFavorRecommendtc();
        }
        $data['tadaRecommend'] = IndexGameCache::getFavorRecommendTada();
        $data['getTadaRecommend'] = IndexGameCache::getTadaRecommend();

        $data['showUserRedPakc'] = RedPackageHelper::isShowRedPackage($data['user']);

        $data['bnners'] = $this->picRepo->getBanners();
        $data['indexNotice'] = $this->getIndexNotice();
        $data['ranks'] = UserCache::getRankCoin();
        $data['notice'] = $this->noticeRepo->getNoticeIndex(time());

        return $data;
    }

    public function getIndexNotice()
    {
        // if(!$user) {
        //     return false;
        // }

        // $hadShow = UserCache::getIndexNoticeCache($user);
        // if($hadShow) {
        //     return false;
        // }

        // UserCache::setIndexNoticeCache($user);

        return $this->picRepo->getIndexNotice();
    }

    public function bannerInfo(int $id)
    {
        return $this->picRepo->find($id);
    }

    public function getGiftCard($code)
    {
        return IndexGameCache::getGiftCard($code);
    }
}
