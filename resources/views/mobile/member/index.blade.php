<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>个人中心</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="/mobile/css/member.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script src="/static/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/static/js/artDialog.js"></script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>


    <meta name="theme-color" content="#0C192C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
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
                      <div _ngcontent-xfs-c1="" class="profile-header-btn-group ng-tns-c1-1">
                        <button _ngcontent-xfs-c1="" class="setting-btn" onclick="location.href='{{url("mobile/Member/setting")}}'" tabindex="0"></button>
                        <!---->
                        <!---->
                       
                      </div>
					  <div _ngcontent-xfs-c1="" class="profile-header-btn-group ng-tns-c1-1"style="right:0;">

                        <!---->
                        <!---->
                        <button _ngcontent-xfs-c1="" class="customer-service-btn ng-tns-c1-1 ng-star-inserted" onclick="location.href='{:GetVar('kefuthree')}'"></button>
                      </div>
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
                      <div _ngcontent-xfs-c1="" class="username">欢迎您，{{ $user['playername'] }}</div>
                      <!---->
                      </div>
                  </div>
                  <jx-content-view _ngcontent-xfs-c1="" _nghost-xfs-c7="" class="ng-tns-c1-1">
                    <div _ngcontent-xfs-c1="" class="account-summary ng-tns-c1-1">
                      <!---->
                      <!---->
                      <div _ngcontent-xfs-c1="" class="account-field ng-tns-c1-1 ng-trigger ng-trigger-fadeInOut ng-star-inserted" style="text-align:center">
                        <div _ngcontent-xfs-c1="" class="account-field-title">主账户余额</div>
                        <div _ngcontent-xfs-c1="" class="account-field-value din-alternate-bold">{{ $user['coin'] }}</div></div>
                      <div _ngcontent-xfs-c1="" class="account-field ng-tns-c1-1 ng-trigger ng-trigger-fadeInOut ng-star-inserted" style="text-align:center">
                        <div _ngcontent-xfs-c1="" class="account-field-title">今日投注</div>
                        <div _ngcontent-xfs-c1="" class="account-field-value din-alternate-bold">0</div></div>
					  <div _ngcontent-xfs-c1="" class="account-field ng-tns-c1-1 ng-trigger ng-trigger-fadeInOut ng-star-inserted" style="text-align:center">
                        <div _ngcontent-xfs-c1="" class="account-field-title">今日盈亏</div>
                        <div _ngcontent-xfs-c1="" class="account-field-value din-alternate-bold" style="text-align:center">0</div></div>
                    </div>
                    <div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="location.href='{{ route("mobile.display", ["act" => "pay"]) }}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-btn-icon deposit-icon"></span>充值</button>
                      <button _ngcontent-xfs-c1="" class="finance-btn withdraw-btn" onclick="location.href='{{ route("mobile.display", ["act" => "kyc"]) }}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-btn-icon withdraw-icon"></span>提现</button>
                     </div>

                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
					
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{:U('Account/dealRecord2')}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon transfer-records-icon"></span>充值记录
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
					  <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{:U('Account/dealRecord3')}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon transfer-records-icon"></span>提现记录
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                      
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{:U('Member/betRecord')}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon bet-record-icon"></span>投注记录
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    </div>

                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/email")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon agency-icon"></span>邮件
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    </div>


                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/vip")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon agency-icon"></span>VIP等级
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    </div>

                    <div _ngcontent-xfs-c1="" class="finance-entry-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-entry-btn-group__btn" onclick="location.href='{{url("mobile/member/customerService")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-entry-icon agency-icon"></span>客服中心
                        <i class="icon iconfont" style="margin-left: auto;"><img src="..\..\static\images\right_ico.png" style="width:8px;height:12px;margin-left:10px" /></i></button>
                    </div>

                    <div _ngcontent-xfs-c1="" class="finance-btn-group ng-tns-c1-1">
                      <button _ngcontent-xfs-c1="" class="finance-btn deposit-btn" onclick="javascript:if(confirm('是否退出？'))location='{{url("mobile/logout")}}'" tabindex="0">
                        <span _ngcontent-xfs-c1="" class="finance-btn-icon deposit-icon"></span>退出账号
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