<div class="top">
    <div class="black"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/drling/img/left_ico.png" /></div>
    <div class="logo"><img src="/drling/img/icon_logo01.png"/></div>

    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/drling/img/sx.png" /></div>
        <div class="qb"><img onclick="location.href='{{ url("drling/pay/recharge") }}'" src="../../drling/img/qb.png" /></div>
    </div>

</div>
<script>
$(function(){
    $('.sx').click(function(){
        location.reload(true)
    })
    $('.black').click(function(){
        // window.history.go(-1);
        window.location.href= "{{url('drling/index')}}"
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
</style>