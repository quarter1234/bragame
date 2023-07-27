<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/css/activity.css">
    <link rel="stylesheet" href="/mobile/css/share.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
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
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
        @include('mobile.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                    <div class="recharge_top">
                        <span>Current account balance</span>
                        <label>$10.00</label>
                    </div>
                </div>
                <div class="recharge_div">
                        <div class="recharge_div_t">Terms of payment</div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                Online payment
                                </div>
                                <div class="recharge_bz">
                                  +20
                                </div>
                            </div>
                        </div>
                        <div class="recharge_div_t">Top-up amount</div>
                        <div class="recharge_kn">
                        <div class="recharge_k recharge_on">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$100
                                </div>
                                <div class="recharge_bz">
                                  +10
                                </div>
                            </div>
                        </div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$200
                                </div>
                                <div class="recharge_bz">
                                  +20
                                </div>
                            </div>
                        </div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$500
                                </div>
                                <div class="recharge_bz">
                                  +50
                                </div>
                            </div>
                        </div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$1000
                                </div>
                                <div class="recharge_bz">
                                  +100
                                </div>
                            </div>
                        </div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$10000
                                </div>
                                <div class="recharge_bz">
                                  +1000
                                </div>
                            </div>
                        </div>
                        <div class="recharge_k">
                            <div class="recharge_k_n">
                                <div class="recharge_k_w">
                                R$50000
                                </div>
                                <div class="recharge_bz">
                                  +5000
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="recharge_input">
                           <span>R$</span>
                           <input type="text" value="200"/>
                           <label>Extra+R$20.00</label>
                        </div>
                        <div class="recharge_bottom">
                            <span>Deposit time:</span>
                            <span>2023/03/22 16:20:00</span>
                        </div>
                        <div class="recharge_bottom">
                            <span>Maximum recharge:</span>
                            <span>permissive3000000</span>
                        </div>
                        <button class="recharge_button">Recharge immediately</button>
                    </div>
              </jx-header-row>
            </div>
            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">
                
                   </jx-content-view>
                </jx-safe-area>
              </div>
            </div>

            
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
   <script>
   $(function(){
      $('.recharge_kn .recharge_k').click(function(){
        $(this).addClass('recharge_on').siblings().removeClass('recharge_on')
      })
    })
   </script>
  </body>

</html>
