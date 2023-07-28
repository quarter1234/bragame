<!DOCTYPE html>
<html>
<head>
  <title>game</title>
  <style>
    #game-container {
      position: relative;
    }

    #game-frame {
      width: 100%;
      height: calc(100vh - 40px); /* 调整游戏窗口高度 */
      margin: 0;
      padding: 0;
      border: none;
    }

    #return-button {
      position: absolute;
      top: 10px;
      left: 10px;
      z-index: 9999; /* 设置更高的z-index值 */
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div id="game-container">
    <a id="return-button" onclick="goBack()">
       <img src="https://wwv.condebet.com/bx_4/public/static/close/bgt.png" alt="返回按钮">
    </a>
    <iframe id="game-frame" src="{{$url}}"></iframe>
  </div>

  <script>
    function goBack() {
      let act = "{{ $act }}";

      if(act == 'kyc') {
        window.location.href = "{{ url('mobile/shop') }}"
      } else {
        window.history.back();
      }

    }
  </script>
</body>
</html>
