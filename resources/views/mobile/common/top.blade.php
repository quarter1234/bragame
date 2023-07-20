<div class="top">
    <div class="logo"><img src="../../mobile/img/icon_logo.png"/></div>
    <div class="money" style="float:right;margin-right:10px">
        <span>R$</span>
        <span>{{$user['coin']}}</span>
        <div class="sx"><img src="../../mobile/img/sx.png" /></div>
        <div class="qb"><img src="../../mobile/img/qb.png" /></div>
    </div>

</div>
<script>
$(function(){
    $('.sx').click(function(){
        location.reload(true)
    })
})
</script>