<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('drling.common.common_title')
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/artDialog.css">
    <link rel="stylesheet" href="/drling/css/share.css">
    <link rel="stylesheet" href="/drling/css/shop.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/js/way.min.js"></script>

    <meta name="theme-color" content="#0C192C">
    <meta name="apple-drling-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-drling-web-app-status-bar-style" content="black">
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
    <body style="color: white; background-color: #17252f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">

        @include('drling.common.top') 

            <div class="centen"></div>
            <div class="centen_tab">
                  <div class="centen_list centen_on">
                      <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/drling/img/fx.png" />
                      <p>Convidar{{--分享--}}</p>
                  </div>
                  <div class="centen_list">
                      <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/drling/img/dl.png" style="width:35px;height:35px;margin:-2px 0 -20px 0;" />
                      <p>Agente{{--代理--}}</p>
                  </div>
                  <div class="centen_list">
                      <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/drling/img/flzh.png" />
                      <p>Membro {{--成员--}}</p>
                  </div>
            </div>
            <div class="centen_show"  style="display:block;" >
             @include('drling.share.invite') 
            </div>
            <div class="centen_show" >
            @include('drling.share.agent') 
            </div>
            <div class="centen_show" >
            @include('drling.share.user') 
            </div>
            <div style="height:200px;"></div>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('drling.common.footer') 
                  
                 
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