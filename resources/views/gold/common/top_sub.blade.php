<div class="top">
    <div class="black"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/left_ico.png" /></div>
   <div class="logo"><img src="/mobile/black/images/logo11.png"/></div>
    <div class="money" style="float:right;margin-right:10px">
        <span class="money_rs"></span>
        <span>{{$user['coin']}}</span>
        <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/gold/images/qb.png" /></div>
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
    .top{
        z-index:9999;
        top:0;
    }
</style>