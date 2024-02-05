{{--用户签到页面--}}
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
        .sign-frame {
            display: block;
        }

        .sign-box {
            width: 90%;
            margin: 0 auto;
            display: block;
            padding-top: 62px;
            padding-bottom: 30px;
            color: #fff;
        }

        .user-info {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            padding: 0 20px;
            margin-top: 30px;
            background: url("/mobile/black/images/vipleaderbar.png");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            position: relative;
        }

        .user-icon {
            width: 107px;
            position: absolute;
            top: -50px;
            right: 5px;
        }

        .topup-box, .bet-box {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .topup-box>span,
        .bet-box>span {
            font-size: 14px;
        }

        .topup-box>.pg-box,
        .bet-box>.pg-box {
            height: 16px;
            border-radius: 8px;
            background-color: rgba(54, 54, 54, .8);
        }

        .topup-box .pg,
        .bet-box .pg {
            height: 100%;
            border-radius: 8px;
            background-image: linear-gradient(90deg, rgb(176, 79, 0) .16%, rgb(94, 0, 0) 100%);
        }

        .tip {
            display: inline-block;
            margin-top: 25px;
            text-align: center;
            font-size: 16px;
        }

        .sign-day {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .sign-day>.item {
            height: 70px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 15px;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, .1);
            font-size: 14px;
            position: relative;
        }

        .sign-day .item.actived {
            background-color: rgba(255, 255, 255, .3);
        }

        .sign-day .item>.gold-icon {
            width: 40px;
        }

        .sign-day .item>.sign-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
            font-size: 16px;
        }

        .sign-day .item>.sign-info>.award {
            font-size: 14px;
        }

        .sign-day .item>.sign-btn {
            width: 60px;
            line-height: 30px;
            position: absolute;
            right: 15px;
            bottom: 10px;
            border-radius: 15px;
            background-color: #B04F00;
            text-align: center;
            font-size: 12px;
        }

        .mark-box {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #fff;
            position: absolute;
            right: 15px;
        }

        .mark-box>img {
            width: 100%;
            height: 100%;
        }
    </style>

  <body style="color: white; background-color: #0a0e2b;">
  @include('black.common.top_sub')
  <div class="sign-frame">
      <div class="sign-box">
          <div class="user-info">
{{--              <img class="user-icon" src="/mobile/black/images/0.png" />--}}
              <div class="topup-box">
                  <span>Valor de recarga de hoje: R${{$today_recharge}}/R$10</span>
                  <div class="pg-box">
                      <div class="pg" style="width: {{$recharge_percent}}%;"></div>
                  </div>
              </div>
              <div class="bet-box">
                  <span>Volume de apostas de hoje: R${{$today_pgbet}}/R$50</span>
                  <div class="pg-box">
                      <div class="pg" style="width: {{$bet_percent}}%;"></div>
                  </div>
              </div>
          </div>
          <span class="tip">Check-in</span>
          <div class="sign-day">
              @foreach($list as $idx => $item)
                  <div class="item @if($date > $idx || ($todaysign && $date == $idx)) actived @endif">
                      <img class="gold-icon" src="/mobile/black/images/gold-icon.png"/>
                      <div class="sign-info">
                          <span>Dia {{$item['date']}}</span>
                          <span class="award">prêmio: R${{$item['coin']}}</span>
                      </div>
                      @if($todaysign && $date == $idx)
                          <div class="sign-btn" onclick="userSign({{$idx}})">Entrar</div>
                      @elseif($date > $idx)
                          <div class="mark-box">
                              <img src="/mobile/black/images/duigo.png" />
                          </div>
                      @endif
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  @include('black.common.loading')
  @include('black.common.modal')
  </body>

  <script type="text/javascript">
      // 用户签到
      function userSign(idx) {
          // console.log('ok==>111', idx);
          showLoading();
          $.ajax({
              url : "{{url('mobile/signin')}}",
              type : 'POST',
              data : {

              },
              success : function (data) {
                  hideLoading();
                  window.location.reload();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  hideLoading();
                  const data = jqXHR.responseJSON;
                  showModal(data.message);
              }
          });
      }
  </script>

</html>
