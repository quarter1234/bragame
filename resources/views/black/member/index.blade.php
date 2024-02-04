<html lang="zh-Hans">

  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title')
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="/mobile/black/css/member.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/clipboard.min.js"></script>

    <meta name="theme-color" content="#0a0e2b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <style>
    @media screen and (min-width: 1200px){
      div.profile-detail[_ngcontent-xfs-c1]>jx-avatar[_ngcontent-xfs-c1]{
       margin-left:38%;
      }
      [_nghost-xfs-c7]{
        width:38%;
        margin:0 auto;
      }
      .shop_jt{
        width:38%;
      }
      .pc_nav{
        margin-top:0 !important;
      }
    }
    [_nghost-xfs-c4] {
    flex: 1 1 auto;
    box-sizing: border-box;
    position: relative;
    padding: 0 !important;
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    align-items: center
}

     .sign-icon {
         width: 25px;
         height: 25px;
         display: inline-block;
         float: right;
         margin-left: 10px;
     }

        .sign-icon>img {
            width: 100%;
            height: 100%;
        }
    </style>
    </head>



  <body style="color: white; background-color: #0a0e2b;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-xfs-c0="" class="ng-star-inserted">
        <router-outlet _ngcontent-xfs-c0=""></router-outlet>
        <jx-profile-page _nghost-xfs-c1="" class="ng-tns-c1-1 ng-star-inserted">
          <!---->
          <jx-header-view _ngcontent-xfs-c1="" class="ng-tns-c1-1" _nghost-xfs-c3="">
            <div _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper__container" _nghost-xfs-c11="">
                <div _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper__container__nav-row" style="min-height:0;">
                  <!---->
                  <!---->
                  <!---->
                  <div _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper__container__nav-row__content">
                    <jx-header-nav-content _ngcontent-xfs-c1="" _nghost-xfs-c4="" class="ng-tns-c1-1">
                    </jx-header-nav-content>
                  </div>
                  <!---->
                  <!---->
                  <!---->
                  <!----></div>
              </jx-header-row>
            </div>
            <div _ngcontent-xfs-c3="" class="header-view__content-wrapper" style="padding-top: 64px; padding-bottom: 50px;">
              <div _ngcontent-xfs-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-xfs-c1="" class="ng-tns-c1-1 safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <div _ngcontent-xfs-c1="" class="profile-detail ng-tns-c1-1">
                    <jx-avatar _ngcontent-xfs-c1="" class="ng-tns-c1-1" _nghost-xfs-c6="">
                      <img _ngcontent-xfs-c6="" alt="" class="avatar-icon" src="{{$avatar}}" style="border-radius: 50%;"></jx-avatar>
                    <div _ngcontent-xfs-c1="" class="ng-tns-c1-1">
                      <div _ngcontent-xfs-c1="" class="username">{{ $user['playername'] }}
                        <p class="avatar_sub_title">
                            <label class="m_vip"></label>：<span class="avatar_sub_title-span">{{ $user['svip'] }}</span>
                            I D :  <span class="avatar_sub_title-span">{{ $user['uid'] }}</span>
                            <a class="sign-icon" href="{{url('mobile/signlog')}}">
                                <img src="/mobile/black/images/sign-icon.png" />
                            </a>
                            <label class="copy_btn" data-clipboard-text="{{ $user['uid'] }}">
                                <a></a>
                            </label>
                        </p>
                        <style>
                          .avatar_sub_title{font-size:1rem;line-height: 1.8rem;}
                          .avatar_sub_title-span{margin-left:0.6rem;margin-right:10px;}
                        </style>
                      </div>
                      <script>
                      $(document).ready(function() {
                        var clipboard = new ClipboardJS('.copy_btn')
                        clipboard.on('success', function (e) {
                          alert('success')
                        })

                      })
                      </script>
                      <!---->
                      </div>
                  </div>
                  <jx-content-view _ngcontent-xfs-c1="" _nghost-xfs-c7="" class="ng-tns-c1-1">

                    {{--<div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="location.href='{{ url("mobile/pay/recharge") }}'" tabindex="0">
                      Recarregar</button>

                        @if(!$bankInfo)
                              <button _ngcontent-xfs-c1="" class="finance-btn withdraw-btn" onclick="location.href='{{ url("mobile/shop/guide") }}'" tabindex="0">
                          @else
                            <button _ngcontent-xfs-c1="" class="finance-btn withdraw-btn" onclick="location.href='{{ url("mobile/shop/draw") }}'" tabindex="0">
                          @endif
                     Reembolso</button>

                     </div>--}}

                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
                    <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{ url("mobile/pay/recharge") }}'" tabindex="0">
                        <span class="m_cz"></span>
                        {{--交易记录--}}Recarregar
                        <i class="icon iconfont" style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                        @if(!$bankInfo)
                          <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{ url("mobile/shop/guide") }}'" tabindex="0">
                        @else
                        <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{ url("mobile/shop/draw") }}'" tabindex="0">
                        @endif
                        <span class="m_tx"></span>
                        {{--交易记录--}}Reembolso
                        <i class="icon iconfont" style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                    <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/transaction")}}'" tabindex="0">
                        <span class="jy_ico"></span>
                        {{--交易记录--}}Depósito e saque
                        <i class="icon iconfont" style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>



                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/bets")}}'" tabindex="0">
                        <span class="tzjl_ico"></span>
                        {{--投注记录--}}Registro de apostas
                        <i class="icon iconfont"  style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                        <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/transactions")}}'" tabindex="0">
                        <span class="jy_ico"></span>
                        {{--交易记录--}}Minhas Transações
                        <i class="icon iconfont" style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                        <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/email")}}'" tabindex="0">
                      <span class="em_ico"></span>
                        {{--邮件--}}Correio
                        <i class="icon iconfont"   style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/vip")}}'" tabindex="0">
                      <span class="vip_ico"></span>
                        {{--VIP等级--}}VIP
                        <i class="icon iconfont"  style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>



                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/customerService")}}'" tabindex="0">
                      <span class="kf_ico"></span>
                       {{--客服中心--}}Contact Us
                        <i class="icon iconfont"  style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                        <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/resetPassword")}}'" tabindex="0">
                      <span class="m_xg"></span>
                       {{--客服中心--}}alterar a senha
                        <i class="icon iconfont"  style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                        <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="javascript:if(confirm('{{ trans("auth.login_out") }}')) location='{{url("mobile/logout")}}'" tabindex="0">
                      <span class="m_tc"></span>
                       {{--客服中心--}}Saia da conta
                        <i class="icon iconfont"  style=" position:absolute;right:15px;top:18px;"><img src="https://www.betbra.net:8032/bx_1/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                        {{--<div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                    <button _ngcontent-xfs-c1="" style="background:#111e33;color:#fff;" class="finance-btn deposit-btn" onclick="location.href='{{url("mobile/member/resetPassword")}}'" tabindex="0">
                          修改密码
                      </button>--}}

                      {{--<button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="javascript:if(confirm('{{ trans("auth.login_out") }}')) location='{{url("mobile/logout")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-btn-icon deposit-icon"> </span>

                        退出账号Saia da conta
                      </button>--}}
                     </div>

                  </jx-content-view>
                </jx-safe-area>
              </div>
            </div>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">

                @include('black.common.footer')


                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-profile-page>
      </jx-main-wrapper>
    </jx-root>
  </body>
</html>
