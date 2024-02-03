<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseMoel extends Model
{
    protected $guarded = ['id'];

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}