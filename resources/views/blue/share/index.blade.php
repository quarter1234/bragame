<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title')
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/artDialog.css">
    <link rel="stylesheet" href="/mobile/green/css/share.css">
    <link rel="stylesheet" href="/mobile/green/css/shop.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <script type="text/javascript" src="https://wwv.condebet.com/bx_4/public/static/js/way.min.js"></script>

    <meta name="theme-color" content="#0C192C">
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
    <body style="color: white; background-color: #04431f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">

        @include('green.common.top') 

            <div class="centen"></div>
            <div class="centen_tab">
                  <div class="centen_list centen_on">
                      <div class="fx"></div>
                      <p>Convidar{{--分享--}}</p>
                  </div>
                  <div class="centen_list">
                      <div class="dl"></div>
                      <p style="margin-top:-5px;">Agente{{--代理--}}</p>
                  </div>
                  <div class="centen_list">
                      <div class="flzh"></div>
                      <p>Membro {{--成员--}}</p>
                  </div>
            </div>
            <div class="centen_show"  style="display:block;" >
             @include('green.share.invite') 
            </div>
            <div class="centen_show" >
            @include('green.share.agent') 
            </div>
            <div class="centen_show" >
            @include('green.share.user') 
            </div>
            <div style="height:200px;"></div>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('green.common.footer') 
                  
                 
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