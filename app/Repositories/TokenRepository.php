<?php
namespace App\Repositories;

use App\Models\Token;
use App\Models\User;

class TokenRepository extends Repository
{
    function model()
    {
        return Token::class;
    }
}