<?php

namespace App\Helper;

use App\Common\Enum\CommonEnum;
use App\Repositories\ImageRepository;

class ImageHelper 
{
    public static function getImgs(int $type, string $objId)
    {
        $imageRepo = app()->make(ImageRepository::class);
        return $imageRepo->getImgByTypeObjId($type, $objId);
    }

    public static function storeImageList(array $images, $type, $objId)
    {
        $imageRepo = app()->make(ImageRepository::class);
        $imageRepo->deleteImages($type, $objId, $images);

        foreach ($images as $key => $url) {
            $info = $imageRepo->getInfo($type, $objId, $url);
            if($info) {
                continue;
            }

            $isTop = CommonEnum::UNABLE;
            if($key === 0) {
                $isTop = CommonEnum::ENABLE;
            }
            
            $data = self::formatData($type, $objId, $url, $isTop);
            $imageRepo->store($data);
        }
        
    }

    public static function formatData($type, $objId, $url, $isTop)
    {
        $data = [];
        $data['type'] = $type;
        $data['obj_id'] = $objId;
        $data['url'] = $url;
        $data['is_top'] = $isTop;
        return $data;
    }

    public static function getImageTop($type, $objId)
    {
        $imageRepo = app()->make(ImageRepository::class);
        return $imageRepo->getImageTop($type, $objId);
    }
}