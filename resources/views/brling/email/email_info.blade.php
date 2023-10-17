<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
<<<<<<< HEAD
    @include('mobile.common.common_title') 
=======
    @include('brling.common.common_title') 
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/css/DINAlternate-bold.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/css/activity.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/css/member.css">
=======
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/css/activity.css">
    <link rel="stylesheet" href="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/css/member.css">
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>

    <script type="text/javascript" src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/js/way.min.js"></script>

    <meta name="theme-color" content="#0C192C">
<<<<<<< HEAD
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
=======
    <meta name="apple-brling-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-brling-web-app-status-bar-style" content="black">
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
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
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">

<<<<<<< HEAD
          @include('mobile.common.top') 
          @include('mobile.common.modal') 
=======
          @include('brling.common.top') 
          @include('brling.common.modal') 
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
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
<<<<<<< HEAD
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/mobile/img/jb.png" />
=======
                <img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/brling/img/jb.png" />
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
                <label>{{ $info['attach'][1] ?? 0 }}</label> 
                </div>
            </div>

            {{--loading组件--}}
<<<<<<< HEAD
            @include('mobile.common.loading')
=======
            @include('brling.common.loading')
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a

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
                  
<<<<<<< HEAD
                  @include('mobile.common.footer') 
=======
                  @include('brling.common.footer') 
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
                  
                 
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
<<<<<<< HEAD
              url : "{{ route('mobile.email.attach', ['id' => $info['id']]) }}",
=======
              url : "{{ route('brling.email.attach', ['id' => $info['id']]) }}",
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
              type : 'GET',
              data : {},
              success : function (data) {
                hideLoading();
                console.log(data);
                if(data.code == 200) {

                  showModal('Triunfo');

                 

<<<<<<< HEAD
                  window.location.href= "{{ url('mobile/member/email') }}"
=======
                  window.location.href= "{{ url('brling/member/email') }}"
>>>>>>> a0eae707048c0c2095d544dd0d575b0763b4be2a
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
