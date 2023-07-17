<?php
namespace App\Services;

use App\Exceptions\BadRequestException;
use App\Repositories\DUserMailNewRepository;
use App\Repositories\TokenRepository;
use App\Repositories\UserRepository;

class EmailService
{
    private $mailRepo;

    public function __construct(DUserMailNewRepository $mailRepo)
    {
        $this->mailRepo  = $mailRepo;
    }

    public function getEmails($user)
    {
        return $this->mailRepo->getEmails($user);
    }

    public function getEmailInfo(int $id, $user)
    {
        return $this->mailRepo->getEmailInfo($id, $user);
    }
}