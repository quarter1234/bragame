<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('green2.common.common_title') 
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/green2/css/activity.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="/mobile/green2/js/jquery.i18n.properties.js"></script>

    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using green2-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="green2">
    <meta name="format-detection" content="telephone=no">
    </head>
    <style>
            @media screen and (min-width: 1200px){
                .header-view__content-wrapper__content-container{
                  display:flex;
                  justify-content:space-between;
                }
                .activity-btn{
                  width:640px !important;
                }
                .header-view__content-wrapper__content-container{
                  width:36%;
                  margin:0 auto;
                }

            }
    </style>        

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
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                  <!---->
                  <!---->
                  <!---->
                  <!---->
                  <div _ngcontent-snw-c3="" style="font-size:16px;" class="header-view__nav-row-wrapper__container__nav-row__title ng-star-inserted">{{--活动中心--}}</div>
                  <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row__content">
                  {{--<jx-header-nav-content _ngcontent-snw-c1="" _nghost-snw-c4="">
                      <!---->
                      <!---->
                      
                      <button _ngcontent-snw-c1="" onclick="location.href='{{ route("mobile.activity.info", ["id" => 2])}}'" class="client-service-btn ng-star-inserted" jxnewwindowbtn=""></button>
                      
                    </jx-header-nav-content>--}}
                  </div>
                  <!---->
                  <!---->
                  <!---->
                  <!----></div>
              </jx-header-row>
            </div>
            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">
                    <!---->
                    <!---->
                    <!---->

                    @foreach($activity as $item)
					          <button _ngcontent-snw-c1="" class="activity-btn ng-star-inserted" onclick="location.href='{{ route("mobile.activity.info", ["id" => $item['id']])}}'" tabindex="0">
                      <span _ngcontent-snw-c1="" class="activity-status open"></span>
                      <span _ngcontent-snw-c1="" class="activity-btn-title">{{ $item['title'] }}</span>
                      <span _ngcontent-snw-c1="" class="activity-btn-duration">Tempo：A eficácia a Longo prazo</span>
                     
                      <div><img style="width:100%;height:auto;margin:1rem 0;" src="{{ $item['img'] }}"></div>
                    </button>
                    @endforeach  
                   </jx-content-view>
                </jx-safe-area>
              </div>
            
            </div>

            
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('green2.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
            <div class="index_bottom">
                  <img src="/mobile/green2/images/footer_icon_2-18834dfc.png" />
                  <p>Este site oferece jogos com experiencia de risco Para ser um usuario do nosso site,voce deve mais de 18 anos.Nao somos responsaveis.
? 2022 brcrown.com All rights reserved.</p>
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
                path: '../mobile/green2/lang/',    //资源文件路径，注意这里路径是你属性文件的所在文件夹,可以自定义。
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
