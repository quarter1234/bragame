<?php
namespace App\Services;

use App\Cache\IndexGameCache;
use App\Cache\UserCache;
use App\Common\Enum\CommonEnum;
use App\Helper\RedPackageHelper;
use App\Models\DRedPacket;
use App\Repositories\DRedPacketUserRepository;
use App\Repositories\SConfigPicRepository;
use App\Repositories\SNoticeIndexRepository;
use Illuminate\Support\Facades\Auth;

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

        if($data['code']) {
            session([CommonEnum::INVITE_CODE_KEY => $data['code']]);
        }
        $data['pgRecommend'] = IndexGameCache::getPGRecommend();
        $data['ppRecommend'] = IndexGameCache::getPPRecommend();
        // $data['favorRecommend'] = IndexGameCache::getFavorRecommend();
        $data['favorRecommend'] = IndexGameCache::getFavorRecommendTada();
        $data['getTadaRecommend'] = IndexGameCache::getTadaRecommend();

        $data['showUserRedPakc'] = RedPackageHelper::isShowRedPackage($data['user']);
        
        $data['bnners'] = $this->picRepo->getBanners();
        $data['indexNotice'] = $this->getIndexNotice($data['user']);
        $data['ranks'] = UserCache::getRankCoin();
        $data['notice'] = $this->noticeRepo->getNoticeIndex(time());
        
        return $data;
    }

    public function getIndexNotice($user)
    {
        if(!$user) {
            return false;
        }
        
        $hadShow = UserCache::getIndexNoticeCache($user);
        if($hadShow) {
            return false;
        }

        UserCache::setIndexNoticeCache($user);
        
        return $this->picRepo->getIndexNotice();
    }

    public function bannerInfo(int $id)
    {
        return $this->picRepo->find($id);
    }


}