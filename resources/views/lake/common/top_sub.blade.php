<div class="top">
    <div class="lake"><img src="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/mobile/img/left_ico.png" /></div>
   <div class="logo"><img src="/mobile/lake/images/logo11.png"/></div>
    <div class="money" style="float:right;margin-right:10px">
        <span class="money_rs"></span>
        <span>{{$user['coin']}}</span>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/lake/images/qb.png" /></div>
    </div>

    
</div>
<script>
$(function(){
    $('.sx').click(function(){
        location.reload(true)
    })
    $('.lake').click(function(){
        // window.history.go(-1);
        window.location.href= "{{url('mobile/index')}}"
    })
})
</script>
<style>
    .lake{
        float:left;
        margin:20px 0px 0 5px;
    }
    .lake img{
        width:20px;
        height:20px;
    }
    .top{
        z-index:9999;
        top:0;
    }
</style>