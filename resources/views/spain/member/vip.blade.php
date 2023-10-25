<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/black/css/activity.css">
    <link rel="stylesheet" href="/mobile/black/css/member.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/mobile/css/swiper-bundle.min.css">
    <!-- Used in supported Android browsers -->
     
    <style>
    
    .box{
      width: 351px;
    height: 200px;
    margin: 0 auto;
     
    background: url(/mobile/green/images/banner_1.png) no-repeat;
    background-size: 351px 200px;

    }



.index_bottom{
        width: 95%;
        background: rgba(0, 0, 0, .3);
       border-radius: 5px;
       text-align: center;
        margin: 20px  auto 0 auto; 
        
      }



@media screen and (min-width: 1200px) {
  .index_bottom{
        width: 50%;
        background: rgba(0, 0, 0, .3);
        border-radius: 5px;
        text-align: center;
        margin: 20px  auto 0 auto; 
        
      }
}

    </style>

    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
   

    <meta name="theme-color" content="#0a0e2b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #0a0e2b;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
          
          @include('black.common.top_sub') 
             
            <div class="banner">
             
            <div class="swiper mySwiper">
            <div class="box"> </div>
              <div class="swiper-wrapper" style='display: none;'>

              @foreach($vipList as $key => $item)

                @if($key > 9)
                    <?php break;?>
                @endif
                

                <div class="swiper-slide" style='display: none;'>
                  
                    <div class="sw_banner v{{ $item['level'] + 1 }}" style='display: none;'>
                        <h2>V{{ $item['level'] + 1 }}<span>Nível atua</span></h2>
                        <div class="sw_h_bottom">Depósito atual: {{ $user['svipexp'] }}</div>
                        <p>Recarga cumulativa<span>{{$item['diamond']}}/{{ $vipList[$key + 1]['diamond'] }}</span></p>
                         <div class="sw_jd">
                             <div class="sw_jd_n"><div @if($key == $user['svip']) style="width: {{ ($user['svipexp'] / $exp) * 100 }}%;" @elseif($key < $user['svip']) style="width: 100%;"  @else style="width: 0%;" @endif class="sw_jd_b"></div></div>
                         </div>
                         <div class="sw_text">
                             <div>V{{ $item['level'] + 1 }}</div>
                             <div>V{{ $item['level'] + 2 }}</div>
                         </div>
                    </div>
                </div>
              @endforeach
              </div>
            </div>
            </div>

            <div class="vip_centen">
              <h2>VIP Privileges" en portugués es "VIP Privileges</h2>
              <p>La actualización VIP puede aumentar el número de retiros" en portugués es "La actualización VIP puede aumentar el número de retiros</p>
              <p>La actualización VIP puede aumentar el monto del retiro" en portugués es "La actualización VIP puede aumentar el monto del retiro</p>
            </div>
            <div class="vip_bottom">
                <div class="vip_blist">
                    <h2>Weekly bonus</h2>
                    <p class="week_bonus">{{ $vipList[$user['svip']]['weeklybonus_format'] }}</p>
                </div>
                <div class="vip_blist">
                    <h2>monthly bonus</h2>
                    <p class="month_bonus">{{ $vipList[$user['svip']]['monthlybonus_foramt'] }}</p>
                </div>
                <div class="vip_blist">
                    <h2>level up bonus</h2>
                    <p class="rewards_bonus">{{ $vipList[$user['svip']]['rewards_format'] }}</p>
                </div>

            </div>
            <div class="index_bottom">
                  <img src="/mobile/black/images/footer_icon_2-18834dfc.png" />
                  <p>Este sitio ofrece juegos con experiencia arriesgada Para ser usuario de nuestro sitio, debe ser mayor de 18 años. No somos responsables.
? 2022 brcrown.com Todos los derechos reservados.</p>
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
                  @include('black.common.footer')
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
  </body>
  <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/mobile/js/swiper-bundle.min.js"></script>
  <script>
      var vipList = @json($vipList);
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        initialSlide: "{{$user['svip']}}",
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 0,
          stretch:-50,
          depth: 100,
          modifier:1,
          slideShadows : true
        },
        pagination: {
          el: ".swiper-pagination",
        },
        on: {
          slideChange: function () {
            $('.week_bonus').text(vipList[this.activeIndex].weeklybonus_format)
            $('.month_bonus').text(vipList[this.activeIndex].monthlybonus_foramt)
            $('.rewards_bonus').text(vipList[this.activeIndex].rewards_format)
          },
        }
      });
    </script>
</html>
