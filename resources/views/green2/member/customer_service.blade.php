<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('blue.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/green2/css/activity.css">
    <link rel="stylesheet" href="/mobile/green2/css/member.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>
   

    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using green2-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="green2">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="/mobile/green2/js/jquery.i18n.properties.js"></script>  
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
          
          @include('green2.common.top_sub') 

            <div class="email_h"></div>

            @foreach($list as $item)
            @if ($item['category'] == 6)
                <div class="kf">
                <a href="{{ $item['url'] }}">
                  <div class="kf_yq">
                      <img src="/mobile/green2/images/dh_ico.png" />
                  </div>
                  <div class="kf_text">
                      <h2 data-locale="Thesupport">WhatsApp suporte</h2>
                      <p data-locale="Hisfatherisalawyerandhismotherisalawyer">The engines in the .Game Framework</p>
                  </div>
                  <div class="kf_right">
                      <div class="shop_jt_ico"></div>
                  </div>
                </a>
              </div>
            @else 
              <div class="kf">
              <a href="{{ $item['url'] }}">
                <div class="kf_yq">
                    <img src="/mobile/green2/images/kf_ico.png" />
                </div>
                <div class="kf_text">
                    <h2 data-locale="Customerservice">Atendimento ao cliente</h2>
                    <p data-locale="Hisfatherisalawyerandhismotherisalawyer">The engines in the .Game Framework</p>
                </div>
                <div class="kf_right">
                    <div class="shop_jt_ico"></div>
                </div>
              </a>
            </div>
            @endif
          @endforeach  
           <div class="e_bottom">
                <button class="e_b2" style="width:350px;height:50px;" data-locale="ldeiasandbugreports">Relatorio de ldeias e Bugs Jogos </button>
            </div>
            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">
                    <!---->
                    <!---->
                    <!---->
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
