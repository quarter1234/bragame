
<div class="kj_kf">
<img onclick="location.href='{{url("mobile/member/customerService")}}'" src="/mobile/pink/images/kf_ico.png" />
</div>
{{--
<div class="down_ico">
<img src="https://www.betbra.net:8032/bx_1/public/mobile/img/down_ico.png" />
</div>
--}}
@if($showUserRedPakc)
<div class="hb">
<a href="javascript:void(0);" id="redPacket"><img src="https://www.betbra.net:8032/bx_1/public/mobile/img/hb.png" /></a>
</div>
@endif
<div class="menu_tc">
    <div class="menu_right">
        <ul>
            <li>
                <a href="{{url('mobile/member/vip')}}">
                    <span>
                        <img src="/mobile/blue/images/f-vip.png" />
                    </span>
                    <label>VIP Grau</label>
                </a>
            </li>
            <li>
                <a href="{{url('mobile/member/email')}}">
                <span>
                        <img src="/mobile/blue/images/email-fill.png" />
                    </span>
                    <label>Email</label>
                </a>
            </li>
            <li>
                <a href="{{url('mobile/member/customerService')}}">
                <span>
                        <img src="/mobile/blue/images/kf_r_ico.png" />
                    </span>
                    <label>Atendimento</label>
                </a>
            </li>
        </ul>
    </div>
</div>
<style>
   .menu_on{
    width:40px;
    height:40px;
    background:rgba(0, 0, 0, 0.8);
    position:fixed;
    z-index:99;
    top:60%;
    right:10px;
    margin-top:-30px;
    border-radius:100%;
    text-align:center;
   }
   .menu_on img{
        width:20px;
        height:20px;
        margin-top:9px;
   }
   .menu_tc{
        width:100%;
        height:100%;
        position:fixed;
        z-index:999;
        top:0;
        left:0;
        display:none;
   }
   .menu_right{
        width:200px;
        height:100%;
        background:#244d85;
        position:absolute;
        right:-200px;
        top:0;
   }
   .menu_right ul{
    width:100%;
    padding:0;
   }
   .menu_right li{
        width:100%;
        height:50px;
        list-style:none;
        border-top:1px solid #000;
        border-bottom:1px solid rgba(255, 255, 255, 0.1);
        position:relative;
   }
   .menu_right span{
        width:40px;
        height:40px;
        border-radius:100%;
        background:rgba(0, 0, 0, 0.8);
        position:absolute;
        left:10px;
        top:5px;
        text-align:center;
   }
   .menu_right img{
        width:30px;
        height:30px;
        margin-top:5px;
   }
   .menu_right label{
    position:absolute;
    top:15px;
    left:60px;
   }
   .menu_right a{
    color:#fff;
   }
   .kj_kf{
    width:40px;
    height:40px;
    background:rgba(0, 0, 0, 0.8);
    position:fixed;
    z-index:99;
    top:67%;
    right:10px;
    margin-top:-30px;
    border-radius:100%;
    text-align:center;
   }
   .kj_kf img{
        width:25px;
        height:25px;
        margin-top:9px;
        -webkit-animation-name: xing;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-duration: 1s;

   }
   .down_ico{
    width:40px;
    height:40px;
    background:rgba(0, 0, 0, 0.8);
    position:fixed;
    z-index:99;
    top:74%;
    right:10px;
    margin-top:-30px;
    border-radius:100%;
    text-align:center;
   }
   .down_ico img{
        width:20px;
        height:20px;
        margin-top:9px;
   }

   .hb{
    width:40px;
    height:40px;
    background:rgba(0, 0, 0, 0.8);
    position:fixed;
    z-index:99;
    top:74%;
    right:10px;
    margin-top:-30px;
    border-radius:100%;
    text-align:center;
   }
   .hb img{
    width:20px;
        height:20px;
        margin-top:10px;
       
   }


@keyframes xing {
    0% {
        transform: scale(1);
    }
    25% {
        transform: scale(0.8);
    }
    50% {
        transform: scale(1);
    }
    75% {
        transform: scale(0.8);
    }
}
</style>
<script>
    $(function(){
        $('.menu_on').click(function(){
            $('.menu_on').hide();
            $('.menu_tc').show()
            $('.menu_right').delay(300).animate({right:'0'});    
        })
        $('.menu_tc').click(function(){
            $('.menu_on').show();
            $('.menu_tc').hide()
            $('.menu_right').delay(300).animate({right:'-200'+'px'});  
        })
      
        $('#redPacket').click(function(){
            showLoading()
            $('body,html').addClass('notScroll')
            $.ajax({
              url : "{{url('mobile/redPacket/doLottery')}}",
              type : 'GET',
              data : {},
              success : function (data) {
                hideLoading();
                showModalSub('Receba um bônus de '+data.data.coin+' moedas');
                // location.reload(true)
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading()
                hideModalSub()
                showModal(jqXHR.responseJSON.message);
              }
            })
        })
    })
</script>