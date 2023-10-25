<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/black/css/shop.css">
    <link rel="stylesheet" href="/mobile/black/css/share.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
    <meta name="theme-color" content="#0a0e2b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #0a0e2b;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
        @include('black.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row"></div>

                <form method="post" onSubmit="return check_bind(this)" id="form1" action="{{url('mobile/shop/doBind')}}">
                @csrf

                <div class="bind" style="margin:70px auto 20px auto;">
                      <h2>PIX Os tipos</h2>
                      <select name="pix_type">
                          <option value="1" selected="selected">CPF</option>
                          <option value="2">CNPJ</option>
                          <option value="3">PHONE</option>
                          <option value="4">EMAIL</option>
                      </select>

                      <h2>Seu número de conta PIX</h2>
                      <input name="account" type="text" id="account" value="" placeholder="Insira o número do seu cartão" />
                      <h2>Redigite o número da conta PIX</h2>
                      <input type="text" name="reaccount" id="reaccount" value="" placeholder="Confirme seu número de conta do cartão" />
                      
                      <h2>O nome</h2>
                      <input type="text" name="username" id="username" value="" placeholder="O nome" />

                      @if ($is_need_cardid)
                        <h2>CPF para particulares, CNPJ para empresas</h2>
                        <input type="text" name="id_card" id="id_card" value="" placeholder="CPF OR CNPJ" />
                      @endif
                </div>
                
               

                <div class="bind_bottom">
                      <h2>Importante e importante</h2>
                      <p>Verifique os seus dados antes de enviar permanentemente um documento</p>
                </div>
               
               <button type="submit" id="bindSubmit" class="bind_buttom" style="width:45%;">determine</button>
               </form>
              </jx-header-row>
            </div>
            @include('black.common.loading')
            @include('black.common.modal')
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
   function check_bind(obj) {
    let account = $('#account').val();
    let reaccount = $('#reaccount').val();
    let username = $('#username').val();

    @if ($is_need_cardid)
      let cardid = $('#id_card').val();
    @endif

    if(account === '' || account.trim().length == 0){
      showModal('Por favor preencha o seu número de conta!');
      return false;
    }

    if(reaccount === '' || reaccount.trim().length == 0){
      showModal('Por favor, insira sua conta novamente!');
      return false;
    }

    if(account != reaccount) {
      showModal('As contas bancárias não correspondem!');
      return false;
    }

    if(username === '' || username.trim().length == 0){
      showModal('Por favor, preencha seu nome!');
      return false;
    }

    if(username.trim().length > 132){
      showModal('O nome é muito longo!');
      return false;
    }

    @if ($is_need_cardid)
      if(cardid === '' || cardid.trim().length == 0 || cardid.trim().length > 14){
        showModal('Insira o CPF de um indivíduo ou CNPJ de uma empresa');
        return false;
      }
    @endif

    showLoading();
    $('#bindSubmit').attr('disabled', 'disabled')
    $.ajax({
        url : "{{url('mobile/shop/doBind')}}",
        type : 'POST',
        data : $("#form1").serialize(),
        success : function (data) {
          $('#bindSubmit').attr('disabled', false)
            hideLoading()
            if(data.code == 200) {
              window.location.href= "{{url('mobile/shop/guide')}}"
            } else {
              showModal(data.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $('#bindSubmit').attr('disabled', false)
          hideLoading()
          showModal(jqXHR.responseJSON.message);
        }
      })

      return false;
    }

   </script>
  </body>

</html>
