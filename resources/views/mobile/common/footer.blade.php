{{--底部导航--}}

<div _ngcontent-way-c10="" class="tab-bar safe-area-fix-bottom safe-area-fix-left safe-area-fix-right" jxsafeareafixbottom="" jxsafeareafixleft="" jxsafeareafixright="">
    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-left @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\IndexController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/index")}}'" jxsafeareafixleft="" routerlink="/home" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--home"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--首页--}}Casa</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ActivityController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/activity")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--activity"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--活动--}}Atividades</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShareController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/share")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--cs"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--分享--}}Convidar</span>
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