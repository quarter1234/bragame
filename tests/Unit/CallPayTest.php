<?php

namespace Tests\Unit;

use App\Common\Enum\GameEnum;
use PHPUnit\Framework\TestCase;
use App\Facades\User;

class CallPayTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_callpay()
    {
        $orderid = '';
        $resVal = User::orderAsynCallback($orderid);
        $this->assertTrue(GameEnum::PDEFINE['RET']['SUCCESS'] == $resVal);
    }
}
