<div class="top">
    {{--<div class="logo"><img src="/mobile/black/images/logo11.png"/></div>--}}
    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/sx.png" /></div>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/black/images/qb.png" /></div>
    </div>

    
</div>
<script>
$(function(){
    $('.sx').click(function(){
        location.reload(true)
    })
})
</script>
<style>
    .top{
        z-index:9999;
        top:0;
    }
</style>