<?php
namespace App\Models;

class DuserTree extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_user_tree'; 

    public function descendant()
    {
        return $this->hasOne(User::class, 'uid', 'descendant_id');
    }
}