<div class="top">
    <!-- <div class="logo"><img src="/mobile/green/images/logo11.png"/></div> -->
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
})
</script>
<style>
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