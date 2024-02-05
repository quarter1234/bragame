{{--领取礼品页面--}}
<html lang="zh-Hans">

  <head>
    <meta charset="utf-8">
    @include('green.common.common_title')
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/black/css/activity.css">
    <!-- Used in supported Android browsers -->

    <link rel="stylesheet" href="/mobile/black/css/share.css">

    <script>
        var Webconfigs = {
            "ROOT": "__ROOT__"
        }
    </script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/mobile/js/index.js"></script>

    <meta name="theme-color" content="#0a0e2b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    @include('black.common.csrf_token')
    </head>

    <style>
        .gift-frame {
            /*padding-top: 62px;*/
            /*padding: 20px 0;*/
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /*padding-top: 100px;*/
            background-color: #000;
            background-image: url("/mobile/black/images/gift_card_bg.jpeg");
            background-repeat: no-repeat;
            background-size: 100% auto;
        }

        .gift-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
            margin-top: 100px;
            padding: 0 30px;
            color: #fff;
        }

        .info {
            font-size: 16px;
            font-weight: bold;
        }

        .phone {
            width: 100%;
            height: 40px;
            line-height: 40px;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, .5);
            outline: none;
            padding: 0 15px;
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            height: 40px;
            line-height: 40px;
            border-radius: 20px;
            background-image: linear-gradient(180deg, #4FE7F8, #238AD7);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        .money-box {
            width: 50%;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background-color: #232936;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .money-icon {
            width: 25px;
            height: 25px;
            line-height: 25px;
            text-align: center;
            border-radius: 50%;
            background-image: linear-gradient(45deg, #FCBB38, #FFEB80);
            color: #df8806;
            position: relative;
        }

        .money-icon::after {
            content: '';
            display: block;
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background-image: radial-gradient(circle, transparent 55%, #FFBA39 55%);
        }

        .money-val {
            font-size: 14px;
        }
    </style>

  <body style="color: white; background-color: #0a0e2b;">
{{--  @include('black.common.top_sub')--}}
  <div class="gift-frame">
    <div class="gift-box">
        <span class="info">Cartão Presente: {{$card['name']}}</span>
        <input id="phone" class="phone"
               type="number" value=""
               placeholder="Por favor insira o número de telefone" />
        <button id="submit-btn"
                class="submit-btn"
                onclick="receive()">Receber</button>
        <div class="money-box">
            <span class="money-icon">R$</span>
            <span class="money-val">{{$card['amount']}}</span>
        </div>
    </div>
  </div>
  @include('black.common.loading')
  @include('black.common.modal')
  </body>

  <script type="text/javascript">
      // 接收礼品卡
      function receive() {
          // console.log('ok==>111');
          const err = checkParams();
          if (err) {
              showModal(err);
              return;
          }
          const phone = $.trim($('#phone').val());
          showLoading();
          $('#submit-btn').attr('disabled', true);
          $.ajax({
              url : "{{url('mobile/receiveCard')}}",
              type : 'POST',
              data : {
                  mobile: phone,
                  code: "{{$card['code']}}"
              },
              success : function (data) {
                  hideLoading();
                  $('#submit-btn').attr('disabled', false);
                  if (data.data === true) {
                      showModal(data.message);
                      setTimeout(() => {
                          window.location.href = "{{$url}}";
                      }, 1500);
                  }
                  // window.location.reload();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  hideLoading();
                  $('#submit-btn').attr('disabled', false);
                  const data = jqXHR.responseJSON;
                  showModal(data.message);
              }
          });
      }

      function checkParams() {
        const phone = $.trim($('#phone').val());
        if (!phone)
            return 'O número do celular não pode ficar vazio';
        // else if (phone.length != 11)
        //     return 'O número do celular deve ter 11 dígitos';
        return '';
      }
  </script>

</html>
