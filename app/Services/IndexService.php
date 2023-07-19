<?php
namespace App\Services;

use App\Cache\IndexGameCache;
use App\Common\Enum\CommonEnum;
use App\Repositories\SConfigPicRepository;
use Illuminate\Support\Facades\Auth;

class IndexService
{
    private $picRepo;

    public function __construct(SConfigPicRepository $picRepo)
    {
        $this->picRepo  = $picRepo;
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
        $data['favorRecommend'] = IndexGameCache::getFavorRecommend();
        
        $data['bnners'] = $this->picRepo->getBanners();

        return $data;
    }

    public function bannerInfo(int $id)
    {
        return $this->picRepo->find($id);
    }


}