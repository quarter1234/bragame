{{--底部导航--}}

<div _ngcontent-way-c10="" class="tab-bar safe-area-fix-bottom safe-area-fix-left safe-area-fix-right" jxsafeareafixbottom="" jxsafeareafixleft="" jxsafeareafixright="">
<button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShareController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/share")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--cs"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--分享--}}Partilhar</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ActivityController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/activity")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--activity"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--活动--}}Atividades</span>
    </button>

  
    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-left @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\IndexController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/index")}}'" jxsafeareafixleft="" routerlink="/home" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--home"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--首页--}}Casa</span>
    </button>
    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShopController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/shop")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--brand"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--优惠活动--}}preferenciais</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-right @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\MemberController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/member/index")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--my"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--我的--}}Meu</span>
    </button>
</div>

<div class="pc_tab">
                   <div class="pc_nav">
                      <ul>
                      <li onclick="location.href='{{url("mobile/index")}}'"><label class="n1"></label><span>Casa</span></li>
                          <li onclick="location.href='{{url("mobile/activity")}}'"><label class="n2"></label><span>Atividades</span></li>
                          <li onclick="location.href='{{url("mobile/share")}}'"><label class="n3"></label><span>Partilhar</span></li>
                          <li onclick="location.href='{{url("mobile/shop")}}'"><label class="n4"></label><span>preferenciais</span></li>
                          <li onclick="location.href='{{url("mobile/member/vip")}}'" ><label class="n6"></label><span>VIP Grau</span></li>
                          <li onclick="location.href='{{url("mobile/member/email")}}'" ><label class="n7"></label><span>Email</span></li>
                          <li onclick="location.href='{{url("mobile/member/customerService")}}'" ><label class="n8"></label><span>Atendimento</span></li>
                          <li onclick="location.href='{{url("mobile/member/index")}}'"><label class="n5"></label><span>Meu</span></li>
                      </ul>
                   </div>
            </div>
<style>
.n1{
    background:url(/mobile/black/images/home.93b20d6e835f71c043b8.png);
    background-size:24px 24px;
}
.n2{
    background:url(/mobile/black/images/activity.8a6a35ba2ac648314ace.png);
    background-size:24px 24px;
}
.n3{
    background:url(/mobile/black/images/zfj_ico.png);
    background-size:24px 24px;
}
.n4{
    background:url(/mobile/black/images/sk.png);
    background-size:24px 24px;
}
.n5{
    background:url(/mobile/black/images/my.87c43b85171cb8232892.png);
    background-size:24px 24px;
}
.pc_nav.n5{
    background:url(/mobile/black/images/my.87c43b85171cb8232892.png);
    background-size:24px 24px;
}
.n6{
    background:url(/mobile/black/images/f-vip1.png);
    background-size:24px 24px;
}
.n7{
    background:url(/mobile/black/images/email-fill1.png);
    background-size:24px 24px;
}
.n8{
    background:url(/mobile/black/images/kf_r_ico1.png);
    background-size:24px 24px;
}

.pc_nav li.pc_on{
    color:#ef962f;
}
.pc_on .n1{
    background:url(/mobile/black/images/active_home.485e6c98acecf897b8ba.png);
    background-size:24px 24px;
}
.pc_on .n2{
    background:url(/mobile/black/images/active_activity.0eee109d4b6a4ccedf91.png);
    background-size:24px 24px;
}
.pc_on .n3{
    background:url(/mobile/black/images/zfj_on_ico.png);
    background-size:24px 24px;
}
.pc_on .n4{
    background:url(/mobile/black/images/active_brand.26b0bef9602b57eac72e.png);
    background-size:24px 24px;
}
.pc_on .n5{
    background:url(/mobile/black/images/active_my.030b4715dce6d516f9c8.png);
    background-size:24px 24px;
}
.pc_on .n6{
    background:url(/mobile/black/images/f-vip.png);
    background-size:24px 24px;
}
.pc_on .n7{
    background:url(/mobile/black/images/email-fill.png);
    background-size:24px 24px;
}
.pc_on .n8{
    background:url(/mobile/black/images/kf_r_ico.png);
    background-size:24px 24px;
}
.pc_tab{
    display:none;
}
@media screen and (min-width: 1200px) {
    .tab-bar[_ngcontent-way-c10]{
        display:none;
    }
    .pc_tab{
        width:180px;
        height:100%;
        position:absolute;
        left:0;
        top:-970px;  
        display:block;
    }
    .pc_nav{
        margin-top:66px;
        background:rgba(0, 0, 0, .2);
        padding-bottom:1000;
    }
    .pc_nav ul{
        margin:0;
        padding:0;
    }
    .pc_nav li{
        height:40px;
        display:flex;
        align-items:center;
        line-height:40px;
        font-size:14px;
        color:#cecece;
    }
    .pc_nav li label{
        width:24px;
        height:24px;
        display:inline-block;
        margin-left:10px;
        margin-right:10px;
    }
}
</style>
<script>
    $(function(){
      $('.pc_nav li').hover(function(){
        $(this).addClass('pc_on').siblings().removeClass('pc_on')
      })
      $('.pc_nav li').mouseout(function(){
        $(this).removeClass('pc_on')
      })
    })
</script>