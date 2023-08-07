<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title')
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/mobile/css/member.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://wwv.condebet.com/bx_4/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="https://wwv.condebet.com/bx_4/public/static/js/clipboard.min.js"></script>

    <meta name="theme-color" content="#0C192C">
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
    }
    </style>
    </head>
  
   

  <body style="color: white; background-color: #0c192c;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-xfs-c0="" class="ng-star-inserted">
        <router-outlet _ngcontent-xfs-c0=""></router-outlet>
        <jx-profile-page _nghost-xfs-c1="" class="ng-tns-c1-1 ng-star-inserted">
          <!---->
          <jx-header-view _ngcontent-xfs-c1="" class="ng-tns-c1-1" _nghost-xfs-c3="">
            <div _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper__container" _nghost-xfs-c11="">
                <div _ngcontent-xfs-c3="" class="header-view__nav-row-wrapper__container__nav-row">
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
                        <p class="avatar_sub_title">VIP :  <span class="avatar_sub_title-span">{{ $user['svip'] }}</span> I D :  <span class="avatar_sub_title-span">{{ $user['uid'] }}</span><label class="copy_btn" data-clipboard-text="{{ $user['uid'] }}"><a></a></label></p> 
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
                   
                    <div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="location.href='{{ url("mobile/pay/recharge") }}'" tabindex="0">
                      <span _ngcontent-xfs-c1="" class="finance-btn-icon deposit-icon"></span>{{--充值--}}Recarregar</button>
                        
                        @if(!$bankInfo)
                              <button _ngcontent-xfs-c1="" class="finance-btn withdraw-btn" onclick="location.href='{{ url("mobile/shop/guide") }}'" tabindex="0">
                          @else
                            <button _ngcontent-xfs-c1="" class="finance-btn withdraw-btn" onclick="location.href='{{ route("mobile.display", ["act" => "draw"]) }}'" tabindex="0">
                          @endif
                      <span _ngcontent-xfs-c1="" class="finance-btn-icon withdraw-icon"></span>{{--提现--}}Reembolso</button>

                     </div>

                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
                      
                    <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/transaction")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon transfer-records-icon"></span>{{--交易记录--}}Minhas Transações
                        <i class="icon iconfont" style="margin-left: auto;"><img src="https://wwv.condebet.com/bx_4/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                    
                        
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/bets")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon bet-record-icon"></span>{{--投注记录--}}Registro de apostas
                        <i class="icon iconfont" style="margin-left: auto;"><img src="https://wwv.condebet.com/bx_4/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    

                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/email")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon yj-icon"></span>{{--邮件--}}Correio
                        <i class="icon iconfont" style="margin-left: auto;"><img src="https://wwv.condebet.com/bx_4/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>

                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/vip")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon vip-icon"></span>{{--VIP等级--}}VIP
                        <i class="icon iconfont" style="margin-left: auto;"><img src="https://wwv.condebet.com/bx_4/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    

                    
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/customerService")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon kf-icon"></span>{{--客服中心--}}Contact Us
                        <i class="icon iconfont" style="margin-left: auto;"><img src="https://wwv.condebet.com/bx_4/public/static/images/right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    

                    <div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                    <button _ngcontent-xfs-c1="" style="background-image:linear-gradient(180deg, #008298, #005668);" class="finance-btn deposit-btn" onclick="location.href='{{url("mobile/member/resetPassword")}}'" tabindex="0">
                          {{--修改密码--}}alterar a senha
                      </button>

                      <button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="javascript:if(confirm('{{ trans("auth.login_out") }}')) location='{{url("mobile/logout")}}'" tabindex="0">
                        {{--<span _ngcontent-xfs-c1="" class="finance-btn-icon deposit-icon"> </span>--}}
                        
                        {{--退出账号--}}Saia da conta
                      </button>
                     </div>

                  </jx-content-view>
                </jx-safe-area>
              </div>
            </div>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                 
                @include('mobile.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-profile-page>
      </jx-main-wrapper>
    </jx-root>
  </body>
</html>