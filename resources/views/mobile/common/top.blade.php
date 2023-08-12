<div class="top">
    <div class="logo"><img src="https://wwv.condebet.com/bx_4/public/mobile/img/icon_logo01.png"/></div>
    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="https://wwv.condebet.com/bx_4/public/mobile/img/sx.png" /></div>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="../../mobile/img/qb.png" /></div>
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