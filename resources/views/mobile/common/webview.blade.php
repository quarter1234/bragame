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
    // 获取URL参数的函数
    // function getParameterByName(name, url) {
    //   if (!url) url = window.location.search;
    // //   name = name.replace(/[[\]]/g, "\\$&");
    // //   var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    // //       results = regex.exec(url);
    // //   if (!results) return null;
    // //   if (!results[2]) return '';
    // //   return decodeURIComponent(results[2].replace(/\+/g, " "));
    //     console.log('000  '+ url)
    //     if (url && url.length>1) {
    //         let i1=url.indexOf("game_link=")
    //         if(i1!=-1){
    //             let newurl = url.substring(url.indexOf("=")+1,url.length) 
    //             return newurl
    //         }
    //     }
    //     return  window.location.href;
    // }
    function goBack() {
        window.history.back();
    }

    //  window.location.href = Global.apiUrl+ ":82/game.html?game_link="+ d2.url;//'https://www.baidu.com'

    // 获取传递的链接参数
    // var gameLinkParam = getParameterByName('game_link');
    // console.log( '222  '+ gameLinkParam)
    // 将参数赋值给iframe的src属性
    // if (gameLinkParam) {
    //   var gameFrame = document.getElementById('game-frame');
    //   gameFrame.src = gameLinkParam;
    // }
  </script>
</body>
</html>
