<div class="top">
    <div class="black"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/left_ico.png" /></div>
    <div class="money" style="float:right;margin-right:10px">
        <span class="rf_ico"></span>
        <span>{{$user['coin']}}</span>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/purple/images/qb.png" /></div>
    </div>

</div>
<script>
$(function(){
    $('.sx').click(function(){
        location.reload(true)
    })
    $('.black').click(function(){
        // window.history.go(-1);
        window.location.href= "{{url('mobile/index')}}"
    })
})
</script>
<style>
    .black{
        float:left;
        margin:20px 0px 0 5px;
    }
    .black img{
        width:20px;
        height:20px;
    }
    .logo{
        margin-left:0;
    }
    .top{
        z-index:9999;
        top:0;
    }
    .rf_ico{
    width:32px;
    height:32px;
    background:url(/mobile/purple/images/rf_ico.png) no-repeat;
    background-size:32px 32px;
}
</style>