<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/lake/css/activity.css">
    <link rel="stylesheet" href="/mobile/lake/css/member.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/css/swiper-bundle.min.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/js/way.min.js"></script>
   

    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using lake-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="lake">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #04431f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
          
          @include('lake.common.top_sub') 

            <div class="banner">

            <div class="swiper mySwiper">
              <div class="swiper-wrapper">

              @foreach($vipList as $key => $item)

                @if($key > 9)
                    <?php break;?>
                @endif

                <div class="swiper-slide">
                    <div class="sw_banner v{{ $item['level'] + 1 }}">
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
              <h2>VIP Privileges" em português é "Privilégios VIP</h2>
              <p>Upgrade VIP pode aumentar o número de saques" em português é "O upgrade VIP pode aumentar o número de saques</p>
              <p>A atualização VIP pode aumentar o valor da retirada" em português é "A atualização VIP pode aumentar o valor do saque</p>
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
                  @include('lake.common.footer')
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
  </body>
  <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/js/swiper-bundle.min.js"></script>
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
