<!DOCTYPE html>
<html>
<head>
  <title>game</title>
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
  <style>
    #game-container {
      position: relative;
    }

    #game-frame {
      /*width: 100%;*/
      /*height: calc(100vh - 40px); !* 调整游戏窗口高度 *!*/
      width: 100vw;
      height: 100vh;
      margin: 0;
      padding: 0;
      border: none;
    }

    #return-button {
      width: 52px;
      height: 52px;
      position: absolute;
      top: 10px;
      left: 10px;
      z-index: 9999; /* 设置更高的z-index值 */
      cursor: pointer;
    }

      #return-button>img {
          width: 100%;
          height: 100%;
      }
  </style>
</head>
<body style="margin: 0;padding:0">
  <div id="game-container">
    <a id="return-button" onclick="goBack()">
       <img src="https://www.betbra.net:8032/bx_1/public/static/close/bgt.png" alt="返回按钮">
    </a>
    <iframe id="game-frame" src="{{$url}}"></iframe>
  </div>

  <script>
    function goBack() {
      let act = "{{ $act }}";

      if(act == 'kyc') {
        window.location.href = "{{ url('mobile/shop') }}"
      } else if(act == 'pay') {
          window.location.href = "{{ url('mobile/shop') }}"
      } else if(act == 'payment') {
          window.location.href = "{{ url('mobile/shop') }}"
      } else if(act == 'post_pay') {
          window.location.href = "{{ url('mobile/pay/recharge') }}"
      } else {
        window.history.back();
      }

    }
  </script>
</body>
</html>
