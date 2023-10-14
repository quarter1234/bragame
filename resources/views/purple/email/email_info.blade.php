<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/purple/css/member.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/js/way.min.js"></script>

    <meta name="theme-color" content="#14092b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #14092b;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">

          @include('purple.common.top') 
          @include('purple.common.modal') 
            <div class="email_h"></div>
            <div class="email_tit">Receba sua recompensa</div>
            <div class="email_nr">

            @if($info['hastake'] == 1) 
                
            Já foi recebido
                
            @endif

              <span>Remeber: System</span><span>{{ $info['timestamp'] }}</span>
            </div>
            <div class="e_b_hs">
                <span>Correio:</span>
                <div class="email_w_left">
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/jb.png" />
                <label>{{ $info['attach'][1] ?? 0 }}</label> 
                </div>
            </div>

            {{--loading组件--}}
            @include('purple.common.loading')

            <div class="e_bottom">
            @if($info['hastake'] == 0) 
                <button class="e_b2" id="ReceberBtn" style="width:260px;">Receber </button>
            @else
                <button class="e_b2" onclick="javascript:void(0);" style="width:260px;background:#333;color:#fff;" disabled>Receber </button>
            @endif
            </div>
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
                  
                  @include('purple.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>

    <script>
    $(document).ready(function() {
        $('#ReceberBtn').click(function(){
          showLoading();
          $.ajax({
              url : "{{ route('mobile.email.attach', ['id' => $info['id']]) }}",
              type : 'GET',
              data : {},
              success : function (data) {
                hideLoading();
                console.log(data);
                if(data.code == 200) {

                  showModal('Triunfo');

                 

                  window.location.href= "{{ url('mobile/member/email') }}"
                } else {
                  showModal(data.message);
                 
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
              hideLoading()
              showModal(jqXHR.responseJSON.message);

            }
          })
        })
    })
    </script>
  </body>

</html>
