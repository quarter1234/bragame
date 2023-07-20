<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>游戏大厅</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="/static/css/artDialog.css">
    <link rel="stylesheet" href="/mobile/css/share.css">
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
    <body style="color: white; background-color: #17252f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">

        @include('mobile.common.top') 

            <div class="centen"></div>
            <div class="centen_tab">
                  <div class="centen_list centen_on">
                      <img src="../../mobile/img/fx.png" />
                      <p>Compartilhar{{--分享--}}</p>
                  </div>
                  <div class="centen_list">
                      <img src="../../mobile/img/dl.png" style="width:35px;height:35px;margin:-2px 0 -20px 0;" />
                      <p>Representação{{--代理--}}</p>
                  </div>
                  <div class="centen_list">
                      <img src="../../mobile/img/flzh.png" />
                      <p>O usuário {{--代理--}}</p>
                  </div>
            </div>
            <div class="centen_show"  style="display:block;" >
             @include('mobile.share.invite') 
            </div>
            <div class="centen_show" >
            @include('mobile.share.agent') 
            </div>
            <div class="centen_show" >
            @include('mobile.share.user') 
            </div>

            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('mobile.common.footer') 
                  
                 
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
            var index1 =$(this).index()
             $('.times_div').hide().eq(index1).show()
          })
        })
    </script>          
    </body>