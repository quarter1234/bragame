<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
   <!-- Material Icons -->
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/mobile/css/activity.css">
    <link rel="stylesheet" href="/mobile/lake/css/share.css">
    <link rel="stylesheet" href="/mobile/lake/css/shop.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using lake-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="lake">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="/mobile/lake/js/jquery.i18n.properties.js"></script>
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

  <body style="color: white; background-color: #000;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            
          @include('lake.common.top') 

            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">
                {{--
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
--}}
<div class="shopindex">
           <div class="shop_index_list" onclick="location.href='{{ url("mobile/pay/recharge") }}'">
                <div class="shop_index_left">
                    <span class="s1"></span>
                </div>
                <div class="shop_text">
                    <h2 data-locale="Total">Total</h2>
                    <p>R$ {{$user['coin']}}</p>
                </div>    
           </div>
           <div class="shop_index_list" onclick="location.href=@if(!$bankInfo) '{{ url("mobile/shop/guide") }}' @else '{{ url("mobile/shop/draw") }}' @endif">
                  <div class="shop_index_left">
                    <span class="s2"></span>
                </div>
                <div class="shop_text">
                    <h2 data-locale="Withdraw">Retiravel</h2>
                    <p>R$ {{ $user['gamedraw'] }}</p>
                </div> 
           </div>
           <div class="shop_index_list" onclick="location.href='{{ url('mobile/member/transaction') }}'">
           <div class="shop_index_left">
                    <span class="s3"></span>
                </div>
                <div class="shop_text">
                    <h2 data-locale="Trading">Transações</h2>
                    
                </div> 
           </div>
           <div class="shop_index_list" onclick="location.href='{{ url('mobile/shop/guide') }}'">
           <div class="shop_index_left">
                    <span class="s4"></span>
                </div>
                <div class="shop_text"><h2 data-locale="Purse">Carteira</h2></div> 
           </div>       
</div>
<div style="width:100%;height:60px"></div>
<div class="index_bottom">
                  <img src="/mobile/lake/images/footer_icon_2-18834dfc.png" />
                  <p>Este site oferece jogos com experiencia de risco Para ser um usuario do nosso site,voce deve mais de 18 anos.Nao somos responsaveis.
? 2022 brcrown.com All rights reserved.</p>
            </div>
                      

                   </jx-content-view>
                </jx-safe-area>
              </div>
            </div>

            <div style="height:200px;"></div>
            
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                  @include('lake.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
  </body>
<script>
function loadProperties(lang) {
            $.i18n.properties({
                name: 'strings',  //资源文件名称 ， 命名格式： 文件名_国家代号.properties
                path: '../mobile/lake/lang/',    //资源文件路径，注意这里路径是你属性文件的所在文件夹,可以自定义。
                mode: 'map',     //用 Map 的方式使用资源文件中的值
                language: lang,  //这就是国家代号 name+language刚好组成属性文件名：strings+zh -> strings_zh.properties
                callback: function () {
                    $("[data-locale]").each(function () {
                        $(this).html($.i18n.prop($(this).data("locale")));

                    });
                }
            });
        }
        loadProperties('en');
</script>
</html>
