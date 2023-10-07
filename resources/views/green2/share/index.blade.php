<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title')
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/artDialog.css">
    <link rel="stylesheet" href="/mobile/gold/css/share.css">
    <link rel="stylesheet" href="/mobile/gold/css/shop.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <script type="text/javascript" src="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="/mobile/gold/js/jquery.i18n.properties.js"></script>

    <meta name="theme-color" content="#141413">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <style>
    @media screen and (min-width: 1200px){
      .centen_tab{
        width:50% !important;
      }
      .centen_show{
        width:50% !important;
      }
    }
    </style>
	</head>
    <body style="color: white; background-color: #141413;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">

        @include('gold.common.top') 

            <div class="centen"></div>
            <div class="centen_tab">
                  <div class="centen_list centen_on">
                      <p data-locale="Share">{{--分享--}}</p>
                  </div>
                  <div class="centen_list">
                      <p data-locale="Agency">{{--代理--}}</p>
                  </div>
                  {{--<div class="centen_list">
                      <div class="flzh"></div>
                      <p>Membro 成员</p>
                  </div>--}}
            </div>
            <div class="centen_show"  style="display:block;" >
             @include('gold.share.invite') 
            </div>
            <div class="centen_show" >
            @include('gold.share.agent') 
            </div>
            {{--<div class="centen_show" >
            @include('black.share.user') 
            </div>--}}
            <div style="height:200px;"></div>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('gold.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
      </jx-main-wrapper>
    </jx-root>
    <script>
        $(function(){
          $('.centen_list').click(function(){
            $(this).addClass('centen_on').siblings().removeClass('centen_on')
            var index1 =$(this).index()
            console.log(index1)
            $('.centen_show').hide().eq(index1).show()
          })
          $('.times_list').click(function(){
            $(this).addClass('times_on').siblings().removeClass('times_on')
            var index2 =$(this).index()
             $('.times_div').hide().eq(index2).show()
          })
        })

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