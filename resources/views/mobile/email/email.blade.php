<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>{:GetVar('webtitle')}</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/css/activity.css">
    <link rel="stylesheet" href="/mobile/css/member.css">
    <!-- Used in supported Android browsers -->
 
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

  <body style="color: white; background-color: #0c192c;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="活动中心" _nghost-snw-c3="">
          <div class="top">
                <div class="logo"><img src="../../mobile/img/icon_logo.png"/></div>
                <div class="money">
                    <span>R$</span>
                    <span>{{--$user['coin']--}}</span>
                    <div class="sx"><img src="../../mobile/img/sx.png" /></div>
                    <div class="qb"><img src="../../mobile/img/qb.png" /></div>
                </div>
            </div>
            <div class="email_h"></div>
            <div id="email_list_pages">

            </div>






            <div style="width:100%;text-align:center;margin-top:1rem">
              <button id="email_load_more" page="0" onclick="loadInvites()"  style="color:#fff; font-size:14px;">{{--点击加载更多--}}Clique para carregar mais</button>
          </div>

          {{--loading组件--}}
          @include('mobile.common.loading')
          
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
                  
                  @include('mobile.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>

    <script>
    function loadInvites() {
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
        loadInvites();  
    })
    </script>
  </body>

</html>
