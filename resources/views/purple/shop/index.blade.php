<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
   <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/mobile/css/activity.css">
    <link rel="stylesheet" href="/mobile/purple/css/share.css">
    <link rel="stylesheet" href="/mobile/purple/css/shop.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <meta name="theme-color" content="#14092b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <style>
    @media screen and (min-width: 1200px){
      .shop_button{
       width:38%;
      }
      .shop_list{
        width:38%;
      }
      .shop_jt{
        width:38%;
      }
    }
    </style>
    </head>

  <body style="color: white; background-color: #14092b;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            
          @include('purple.common.top') 

            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">

                      <div class="shop_top">
                          <div class="shop_t_text">Saldo Total</div>
                          <div class="shop_b">{{ $user['coin'] }}</div>
                          <button onclick="location.href='{{ url("mobile/pay/recharge") }}'" class="shop_button">Adicionar dinheiro</button>
                      </div>
                      <div class="shop_list">
                          <span>Adicionar dinheiro</span>
                          <p>R$ {{$user['coin']}}</p>
                          <button  class="shop_list_button"></button>
                      </div>

                      <div class="shop_list">
                          <span>Saldo Retiravel</span>
                          <p>R$ {{ $user['gamedraw'] }}</p>
                         

                          <div class="shop_wk">
                            @if(!$bankInfo)
                              <a href="{{ url('mobile/shop/guide') }}" >
                            @else
                              <a href="{{ url('mobile/shop/draw') }}" >
                            @endif
                              Verdifcar agora
                            </a>

                          </div>
                          

                      </div>
                      <div class="shop_h"></div>
                      <a style="color:white" href="{{ url('mobile/member/transaction') }}" >
                      <div class="shop_jt">
                       <div class="shop_jt_left">
                          <h2>Minhas Transações</h2>
                       </div>
                       <div class="shop_right">
                          <div class="shop_jt_ico"></div>
                       </div>
                      </div>
                      </a>
                      
                      <a style="color:white" href="{{ url('mobile/shop/guide') }}" >
                      <div class="shop_jt">
                       <div class="shop_jt_left">
                          <h2>Carteira<span>Gerenciar contas bancárias</span></h2>
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

            <div style="height:200px;"></div>
            
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                  @include('purple.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
  </body>

</html>
