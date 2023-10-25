<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/gold/css/activity.css">
    <link rel="stylesheet" href="/mobile/gold/css/member.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/clipboard.min.js"></script>
    <script type="text/javascript" src="/mobile/gold/js/jquery.i18n.properties.js"></script>   
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
          {{-- Tab --}}
         <div class="transaction_t">
            <div class="transaction_list transaction_list_on" data-locale="Charginghistory">Historico de recargas</div>
            <div class="transaction_list" data-locale="Withdrawalrecord" >Registro de saque</div>
         </div>

        {{--内容切换 Recharges --}}
         <div class="transaction_b"  style="display: block;">
            <div id="content_recharge_list_pages">
            </div>
            <div style="width:100%;text-align:center;margin-top:1rem">
                <button id="content_recharge_load_more" page="0" onclick="loadRecharges()"  style="color:#fff; font-size:14px;" data-locale="Clickmost">{{--点击加载更多--}}Carregue mais</button>
            </div>
            <div class="email_h" style="height: 100px;"></div>
         </div>

          {{--内容切换 Draws--}}
         <div class="transaction_b">
            <div id="content_draw_list_pages">
            </div>
            <div style="width:100px;text-align:center;margin-top:1rem;height: 30px; margin: 0 auto; border-radius: 10px;">
                <button id="content_draws_load_more" page="0" onclick="loadDraws()"  style="color:#fff; font-size:14px; line-height: 30px; "data-locale="Clickmost">{{--点击加载更多--}}Carregue mais</button>
            </div>
            <div class="email_h" style="height: 100px;"></div>
         </div>


          {{--loading组件--}}
          @include('gold.common.loading')      

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
                  
                  @include('gold.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>

    <script>
    function copy(orderid) {
      const btnCopy = new Clipboard();
      this.copyValue = 'orderid';
      console.log(orderid)
    }

    function loadDraws() {
        let page = $('#content_draws_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/member/drawList')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                // 判断 字符串是否为空
                if(data == '') {
                  return false;
                }
                
                $('#content_draws_load_more').attr('page', parseInt(page) + 1);
                $('#content_draw_list_pages').append(data)
              }
          })
    }

    function loadRecharges() {
        let page = $('#content_recharge_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/member/rechargeList')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                // 判断 字符串是否为空
                if(data == '') {
                  return false;
                }
                
                $('#content_recharge_load_more').attr('page', parseInt(page) + 1);
                $('#content_recharge_list_pages').append(data)
              }
          })
    }
    
    $(document).ready(function() {
      loadRecharges();
      loadDraws();

      var clipboard = new ClipboardJS('.copy_btn')
      clipboard.on('success', function (e) {
        alert('success')
      })

      $('.transaction_list').click(function(){
         $(this).addClass('transaction_list_on').siblings().removeClass('transaction_list_on')
         let index=$(this).index()
         $('.transaction_b').hide().eq(index).show()
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

</html>
