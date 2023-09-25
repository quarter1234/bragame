<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('black.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/gold/css/activity.css">
    <link rel="stylesheet" href="/mobile/gold/css/member.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/js/way.min.js"></script>
   

    <meta name="theme-color" content="#141413">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #141413;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
          
          @include('gold.common.top_sub') 

            <div class="email_h"></div>
            <div id="email_list_pages">

            </div>
            <div style="width:100%;text-align:center;margin-top:1rem">
              <button id="email_load_more" page="0" onclick="loadEmails()"  style="color:#fff; font-size:14px;">{{--点击加载更多--}}Carregue mais</button>
          </div>

          {{--loading组件--}}
          @include('gold.common.loading')
          
          {{--
            <div class="e_bottom">
                <button class="e_b1">Receber Tudo</button>
                <button class="e_b2">Excluir Tudo</button>
            </div>--}}

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
                  
                  @include('gold.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>

    <script>
    function loadEmails() {
        let page = $('#email_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/member/emailList')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                // 判断 字符串是否为空
                if(data == '') {
                  return false;
                }
                
                $('#email_load_more').attr('page', parseInt(page) + 1);
                $('#email_list_pages').append(data)
              }
          })
    }
    
    $(document).ready(function() {
      loadEmails();  
    })
    </script>
  </body>

</html>
