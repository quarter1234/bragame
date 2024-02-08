{{--<div class="top @if (isMobile() && isInRoutes(['mobile/member/index'])) top-off @endif ">--}}
<div class="top">
    <div class="logo"><img src="/mobile/black/images/logo11.png"/></div>
    @if (Auth::check())
    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/sx.png" /></div>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/black/images/qb.png" /></div>
    </div>
    @else
    <div>
        <div class="dl show_login">Login</div>
        <div class="zc show_login">Registo</div>
    </div>
    @endif
</div>

<script>
$(function() {
    $('.sx').click(function(){
        location.reload(true)
    });
})
</script>
<style>
    .top {
        width: 100%;
        /*height: 62px;*/
        height: 64px;
        /*background: #111e33;*/
        background-color: rgba(17, 30, 51, .8);
        backdrop-filter: blur(20px);
        position: fixed;
        color: #fff;
        top: 0;
        left: 0;
        z-index: 9999;
    }

    .logo {
        width: 132px;
        height: 50px;
        float: left;
        /*margin: 14px;*/
        margin: 10px;
    }

    .logo img {
        width: 100%;
        height: 100%;
    }

    /*.black{*/
    /*    float:left;*/
    /*    margin:20px 0px 0 5px;*/
    /*}*/

    /*.black img{*/
    /*    width:20px;*/
    /*    height:20px;*/
    /*}*/

    .money {
        width: 201px;
        height: 32px;
        background: rgba(0, 0, 0, .5);
        border-radius: 5px;
        float: left;
        margin: 15px 0 0 10px;
        position: relative;
        line-height: 32px;
    }

    .money span {
        padding-left: 10px;
        float: left;
    }

    .sx {
        width: 16px;
        height: 16px;
        position: absolute;
        right: 45px;
        top: 7px;
    }

    .sx img {
        width: 16px;
        height: 16px;
    }

    .qb {
        width: 34px;
        height: 29px;
        /*background: linear-gradient(-135deg, #9c16d4, #2b22b1);*/
        background: #ffb31a;
        border-radius: 5px;
        right: 3px;
        top: 1px;
        position: absolute;
        text-align: center;
    }

    .qb img {
        width: 16px;
        height: 16px;
        margin-top: 7px;
    }

    .top.top-off {
        display: none;
    }


    /*.top{*/
    /*    z-index:9999;*/
    /*    top:0;*/
    /*}*/

    /*.logo{*/
    /*    margin-left:0;*/
    /*}*/
</style>
