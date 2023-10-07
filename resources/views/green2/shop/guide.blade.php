<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title')
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">

    <link rel="stylesheet" href="/mobile/gold/css/shop.css">
    <link rel="stylesheet" href="/mobile/gold/css/share.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>
    <meta name="theme-color" content="#141413">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="/mobile/gold/js/jquery.i18n.properties.js"></script>
    </head>

  <body style="color: white; background-color: #141413;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
        @include('gold.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                </div>
               <div class="guide_top" style="margin:70px auto 0 auto;">Verificar Conta</div>
               <div class="guide_centen">
                    <div class="guide_ico"></div>
                    <div class="guide_text">
                        <h2 data-locale='Bankinformation'>informações bancárias</h2>
                        <p data-locale="Transferthemoneytoyourbankaccount">Transferência de dinheiro para sua conta bancária</p>
                    </div> 
               </div>
                    <div class="guide_right">
                        <button onclick="location.href='{{url("mobile/shop/bind")}}' ">Verify Now</button>
                    </div>
               @foreach($banks as $item)
               <div class="guide_yh">
                        <div class="gui_left">{{$item['format_account']}}</div>
                       
                        <div class="gui_right"></div>
               </div>
               @endforeach  

                {{--<div class="gui_bottom">
                    <h2>KYC Guidelines</h2>
                    <p>1. Once the ID card has been verifed, it cannot bechanged.</p>
                    <p>2. a person or entity that maintains an account orhas a business relationship with the reportingentity</p>
                    <p>3. Benefciaries of transactions conducted byprofessional intermediaries such as stockbrokers.CharteredAccountants, or solicitors, as permittedunder the law.</p>
                    <p>4. any person or entity connected with a fnancialtransaction that can pose signifcant reputationalor otherrisks to the bank, for example, a wiretransfer or issue of a high-value demand draft asa singletransaction.</p>
                </div> --}}       
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
function loadProperties(lang) {
            $.i18n.properties({
                name: 'strings',  //资源文件名称 ， 命名格式： 文件名_国家代号.properties
                path: '../mobile/gold/lang/',    //资源文件路径，注意这里路径是你属性文件的所在文件夹,可以自定义。
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
  </body>

</html>
