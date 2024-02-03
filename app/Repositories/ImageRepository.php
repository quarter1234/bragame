<?php
namespace App\Repositories;

use App\Models\Image;
use App\Models\Rent;

class ImageRepository extends Repository
{
    function model()
    {
        return Image::class;
    }

    public function store($params)
    {
        return $this->create($params);
    }

    public function getImgByTypeObjId($type, $objId)
    {
        return $this->model()::where('type', $type)->where('obj_id', $objId)->orderBy('is_top', 'desc')
        ->pluck('url');
    }

    public function getImageTop($type, $objId)
    {
        return $this->model()::where('type', $type)->where('obj_id', $objId)->orderBy('is_top', 'desc')
        ->value('url');
    }

    public function deleteImages($type, $objId, $urls)
    {
        $this->model()::where('type', $type)->where('obj_id', $objId)->whereNotIn('url', $urls)->delete();
    }

    public function getInfo($type, $objId, $url)
    {
        return $this->model()::where('type', $type)->where('obj_id', $objId)->where('url', $url)->first();
    }
}