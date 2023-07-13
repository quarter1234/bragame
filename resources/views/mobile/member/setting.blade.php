<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>{:GetVar('webtitle')}</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/static/css/userHome.css">
    <link rel="stylesheet" href="/static/css/artDialog.css">
    <link rel="stylesheet" href="/mobile/css/setting.css">
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
      <jx-main-wrapper _nghost-mto-c0="" class="ng-star-inserted">
        <router-outlet _ngcontent-mto-c0=""></router-outlet>
        <jx-setting-page _nghost-mto-c30="" class="ng-star-inserted">
          <!---->
          <!---->
          <!---->
          <jx-header-view _ngcontent-mto-c30="" title="设置" _nghost-mto-c3="">
            <div _ngcontent-mto-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-mto-c3="" class="header-view__nav-row-wrapper__container" _nghost-mto-c11="">
                <div _ngcontent-mto-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                  <!---->
                  <!---->
                  <button _ngcontent-mto-c3="" class="header-view__nav-row-wrapper__container__nav-row__prefix ng-star-inserted" onclick="location.href='javascript:history.back(-1)'">
                   <i class="icon iconfont">{{--&#xe67c;--}}<img src="..\..\static\images\rui-icon-back.png" style="width:40px;height:40px"/></i></button>
                  <!---->
                  <!---->
                  <!---->
                  <div _ngcontent-mto-c3="" class="header-view__nav-row-wrapper__container__nav-row__title ng-star-inserted">设置</div>
                  <div _ngcontent-mto-c3="" class="header-view__nav-row-wrapper__container__nav-row__content"></div>
                  <!---->
                  <!---->
                  <!---->
                  <!----></div>
              </jx-header-row>
            </div>
            <div class="security_h" style="margin-top: 50px;">
            {{--<h4>—— 您的账号安全级别为{$aqjibie} ——</h4>--}}
            <p class="security_h_stars">
            {{--<?php
            $num = abs($schedule/100)*10/2;
            for($i=1;$i<6;$i++){
               if($num-$i >= 0){
                    echo "<i class=\"iconfont icon-favorfill current\">&#xe80d;</i>";
                    }else{
                    echo "<i class=\"iconfont icon-favorfill\">&#xe80d;</i>";
                }
            }
            ?>--}}
            </p>

            {{--<p class="security_h_time">
            上次登录：{$Think.session.lastlogin.lasttime}</p>
            <p class="security_h_ress"> IP：{$Think.session.lastlogin.lastip}，{$Think.session.lastlogin.login_address}  | <a href="{:U('Member/update_pass')}">不是我登录?</a></p>--}}
            </div>
            <div _ngcontent-mto-c3="" class="header-view__content-wrapper">
              <div _ngcontent-mto-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-mto-c30="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <div _ngcontent-mto-c30="" class="footer-view-wrapper">
                    <div _ngcontent-mto-c30="" class="setting-container">
                      <div _ngcontent-mto-c30="" class="setting-header">
                        <div _ngcontent-mto-c30="" class="setting-header-icon security-icon"></div>账户安全</div>
                      <div _ngcontent-mto-c30="" class="setting-content">
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <div _ngcontent-mto-c30="" class="setting-content">
                          <!---->
                          <!---->
                          <!---->
                          <button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='{:U('Member/update_pass')}'" tabindex="0">
                            <span _ngcontent-mto-c30="" class="heading">登录密码</span>
                            <span _ngcontent-mto-c30="" class="subheading">修改</span>
                            <i class="icon iconfont"><img src="..\..\static\images\right_ico.png" style="width:6px;height:10px;margin-left:10px" /></i></button>
						 {{--<button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='<eq name="userinfo['tradepassword']" value=""><else /></eq>
						 <span _ngcontent-mto-c30="" class="heading">资金密码</span>
                            <span _ngcontent-mto-c30="" class="subheading"><?php  if(empty($userinfo['tradepassword'])){?>设置<?php }else{?>修改<?php }?></span>
                            <i class="icon iconfont"></i></button>--}}
						  <button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='{:U('Member/safephone')}'" tabindex="0">
                            <span _ngcontent-mto-c30="" class="heading">密保手机</span>
                            <span _ngcontent-mto-c30="" class="subheading"><eq name="userinfo['tel']" value="">设置<else />修改</eq></span>
                            <i class="icon iconfont"><img src="..\..\static\images\right_ico.png" style="width:6px;height:10px;margin-left:10px" /></i></button>
                            {{--<button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='<eq name="userinfo['question']" value="">{:U('Member/setProblem')}<else />{:U('Member/updateProblem')}</eq>'" tabindex="0">
                            <span _ngcontent-mto-c30="" class="heading">密保问题</span>
                            <span _ngcontent-mto-c30="" class="subheading"><eq name="userinfo['question']" value="">设置<else />修改</eq></span>
                            <i class="icon iconfont">&#xe66f;</i></button>--}}
                          <button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='{:U('Member/bindmail')}'" tabindex="0">
                            <span _ngcontent-mto-c30="" class="heading">密保邮箱</span>
                            <span _ngcontent-mto-c30="" class="subheading"><eq name="userinfo['email']" value="">设置<else />修改</eq></span>
                            <i class="icon iconfont"><img src="..\..\static\images\right_ico.png" style="width:6px;height:10px;margin-left:10px" /></i></button>
                          <button _ngcontent-mto-c30="" class="setting-item-btn ng-star-inserted" onclick="location.href='{:U('Member/bindcard')}'" tabindex="0">
                            <span _ngcontent-mto-c30="" class="heading">银行卡管理</span>
							<span _ngcontent-mto-c30="" class="subheading"><eq name="bankcard" value="">查看<else />添加</eq></span>
                            <i class="icon iconfont"><img src="..\..\static\images\right_ico.png" style="width:6px;height:10px;margin-left:10px" /></i></button>
                          <!----></div>
                        <!---->
                        <!----></div>
                    </div>
                    <div _ngcontent-mto-c30="" class="setting-container">
                      <div _ngcontent-mto-c30="" class="setting-header">
                        <div _ngcontent-mto-c30="" class="setting-header-icon system-icon"></div>系统</div>
                      <div _ngcontent-mto-c30="" class="setting-content">
                        <button _ngcontent-mto-c30="" class="setting-item-btn">
                          <span _ngcontent-mto-c30="" class="heading">系统版本</span>
                          <span _ngcontent-mto-c30="" class="hint">1.2.0.2366</span></button>
                      </div>
                    </div>
                    <div _ngcontent-mto-c30="" class="footer-fixed-container safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
                      <div _ngcontent-mto-c30="" class="footer-wrapper">
                        <button _ngcontent-mto-c30="" onclick="javascript:if(confirm('是否退出？'))location='{{url("mobile/logout")}}'" class="logout-btn mat-elevation-z10">退出账户</button></div>
                    </div>
                  </div>
                </jx-safe-area>
              </div>
            </div>
            <div _ngcontent-mto-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight=""></div>
          </jx-header-view>
        </jx-setting-page>
      </jx-main-wrapper>
    </jx-root>
  </body>

</html>