<div class="top">
    <div class="logo"><img src="/brling/img/icon_logo01.png"/></div>
    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/img/sx.png" /></div>
        <div class="qb"><img onclick="location.href='{{ url("brling/pay/recharge") }}'" src="../../brling/img/qb.png" /></div>
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