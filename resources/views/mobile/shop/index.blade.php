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
    <link rel="stylesheet" href="/mobile/css/activity.css">
    <link rel="stylesheet" href="/mobile/css/share.css">
    <link rel="stylesheet" href="/mobile/css/shop.css">
    <!-- Used in supported Android browsers -->
 
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
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            
          @include('mobile.common.top') 

            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">

                      <div class="shop_top">
                          <div class="shop_t_text">Saldo Total</div>
                          <div class="shop_b">{{ $user['coin'] }}</div>
                          <button onclick="location.href='{{ route("mobile.display", ["act" => 'pay']) }}'" class="shop_button">Adicionar dinheiro</button>
                      </div>
                      <div class="shop_list">
                          <span>Adicionar dinheiro</span>
                          <p>R$ {{$user['coin']}}</p>
                          <button  class="shop_list_button"></button>
                      </div>
                      <div class="shop_list">
                          <span>Saldo Retiravel</span>
                          <p>R$ {{ $user['gamedraw'] }}</p>
                          <button class="shop_list_button2"></button>
                          <div class="shop_wk"><a href="{{ route('mobile.display', ["act" => 'kyc']) }}" >Verdifcar agora</a></div>
                          <div class="shop_wk2">Verdifcar agora sda dejfskjd ad fasda</div>
                      </div>
                      <div class="shop_h"></div>

                      <a style="color:white" href="{{ route('mobile.display', ["act" => 'transaction']) }}" >
                      <div class="shop_jt">
                       <div class="shop_jt_left">
                          <h2>Minhas Trabsacones<span>Verdifcar agora sda dejskjd ad fasda iDA</span></h2>
                       </div>
                       <div class="shop_right">
                          <div class="shop_jt_ico"></div>
                       </div>
                      </div>
                      </a>

                      <a style="color:white" href="{{ route('mobile.display', ["act" => 'payment']) }}" >
                      <div class="shop_jt">
                       <div class="shop_jt_left">
                          <h2>Minhas Trabsacones</h2>
                       </div>
                       <div class="shop_right">
                          <div class="shop_jt_ico"></div>
                       </div>
                      </div>
                      </a>

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
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
  </body>

</html>
