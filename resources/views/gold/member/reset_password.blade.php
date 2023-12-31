<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/gold/css/shop.css">
    <link rel="stylesheet" href="/mobile/gold/css/share.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
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
        @include('gold.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row"></div>
                <form method="post" onSubmit="return check_form(this)" id="form1" action="{{url('mobile/member/doChangePassword')}}">
                  @csrf
                  <div class="bind d1">

                      <h2 data-locale="account">conta</h2>
                      <img src="/mobile/img/sj_ico.png" class="tp_1"/>
                      <input name="account" type="text" value="{{ $user['phone'] }}" readonly="readonly" placeholder="conta" />

                      <h2 data-locale="Oldpassword">Senha Antiga</h2>
                      <img src="/mobile/img/password.png" class="tp_2"/>
                      <input type="password" name="oldPassword" id="oldPassword" value="" placeholder="Senha Antiga" />

                      <h2 data-locale="Newpassword">Nova Senha</h2>
                      <img src="/mobile/img/password.png"  class="tp_3"/>
                      <input type="password" name="newPassword" id="newPassword" value="" placeholder="Nova Senha" />

                  </div>
                  <button type="submit" class="bind_buttom" data-locale="Confirmchanges">Confirme as alterações</button>
               </form>

              </jx-header-row>
            </div>
            @include('gold.common.loading')
            @include('gold.common.modal')
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
   function check_form(obj) {
    let oldPassword = $('#oldPassword').val();
    let newPassword = $('#newPassword').val();

    if(oldPassword === '' || oldPassword.trim().length == 0){
      showModal('A senha antiga não pode estar vazia.');
      return false;
    }

    if(newPassword === '' || newPassword.trim().length == 0){
      showModal('A nova senha não pode estar vazia.');
      return false;
    }

    if(oldPassword.trim().length > 132){
      showModal('A senha antiga é muito longa.');
      return false;
    }

    if(newPassword.trim().length > 132){
      showModal('A nova senha é muito longa.');
      return false;
    }
        showLoading();
        $.ajax({
            url : "{{url('mobile/member/doChangePassword')}}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                hideLoading()
                if(data.code == 200) {
                  showModal('Triunfo');

				          window.location.href= "{{url('mobile/member/index')}}"
                } else {
                  showModal(data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              hideLoading()
              showModal(jqXHR.responseJSON.message);
            }
        })

        return false;
    }

   </script>
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
