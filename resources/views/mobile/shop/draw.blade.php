<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/mobile/css/activity.css">
    <link rel="stylesheet" href="https://wwv.condebet.com/bx_4/public/mobile/css/share.css">
    <link rel="stylesheet" href="/mobile/css/shop.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://wwv.condebet.com/bx_4/public/static/js/way.min.js"></script>
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
        @include('mobile.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row"></div>
                
                <form method="post" onSubmit="return check_draw(this)" id="form1" action="{{url('mobile/shop/doDraw')}}">
                    @csrf
                    <div class="draw_top">
                        <div class="draw_top_l">disponivel para retirada</div>
                        <div class="draw_top_r">$R{{ $user['dcoin'] }}</div>
                    </div>

                    <div class="draw_c">
                      <a href="{{url('mobile/shop/bind')}}">
                          <div class="draw_img"><img src="../mobile/img/yh_ico.png" /></div>
                          <div class="draw_text">
                              <h2>Nova conta bancaria</h2>
                              <p>Adicione uma nova conta bancaria.</p>
                          </div>
                          <div class="draw_arrow">
                            <img src="../mobile/img/right_ico.png" />
                          </div>
                      </a>
                    </div>


                    @foreach($banks as $key => $item)
                    <div class="draw_bottom @if($key == 0) braw_on @endif" id="{{$item['id']}}">
                      <a>
                        <div class="draw_b_left">
                            <img src="../mobile/img/active_brand.26b0bef9602b57eac72e.png" />
                        </div>
                        <div class="draw_text">
                            <p>VERIFIED</p>
                            <h2>{{$item['format_account']}}</h2>
                        </div>
                        <div class="draw_xz"></div>
                        </a>
                    </div>
                    @endforeach  

                <div class="braw_d">
                    <p>montante</p>
                    <div class="braw_d_sr">
                        <span>R$</span>
                        <input name="amount" id="postAmount" value="{{ $user['mincoin'] }}" placeholder="Por favor, insira o valor" />
                        <input type="hidden" id="bankId" value="{{$banks[0]['id']}}"  name="bankid" />
                    </div>
                    <p>Valor minimo de retirada :R$ {{ $user['mincoin'] }}</p>
                    <p>&maior.:R$ {{ $user['maxcoin'] }} Permitido cada vez</p>
                </div>

                <button id="drawSubmit"  class="braw_b">Retirar agora</button>
              </form>
              </jx-header-row>
            </div>
            @include('mobile.common.loading')
            @include('mobile.common.modal')
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
      function check_draw(obj) {
        let amount = $('#postAmount').val();
        let bank_id = $('#bankId').val();
        
        if(amount === '' || amount.trim().length == 0){
          showModal('Por favor, insira o valor do saque.');
          return false;
        }

        if(amount.trim().length > 132){
          showModal('Por favor, insira um valor de saque correto.');
          return false;
        }

        $('#drawSubmit').attr('disabled', 'disabled')

        showLoading();
        $.ajax({
            url : "{{url('mobile/shop/doDraw')}}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                hideLoading()
                $('#drawSubmit').attr('disabled', false)

                if(data.code == 200) {
                  showModal('Triunfo');
                  window.location.href= "{{url('mobile/shop')}}"
                } else {
                  showModal(data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              hideLoading()
              $('#drawSubmit').attr('disabled', false)
              
              showModal(jqXHR.responseJSON.message);
            }
        })

        return false;
      }

      $(function(){
          $('.draw_bottom').click(function(){
            let bankId = $(this).attr('id')
            $('#bankId').val(bankId);
            $(this).addClass('braw_on').siblings().removeClass('braw_on')
          })
      })
  </script>
  </body>

</html>
