<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>游戏大厅</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="/static/css/artDialog.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script src="/static/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/static/js/artDialog.js"></script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>

    <meta name="theme-color" content="#0C192C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	</head>
    <style>
        .top{width:100%;height:62px;background:#1a2c38;position:fixed;color:#fff;top:0;left:0;}
        .logo{width:91px;height:34px;float:left;margin:14px;}
        .logo img{width:91px;height:34px;}
        .money{width:151px;height:32px;background:#102230;border-radius:5px;float:left;margin:15px 0 0 10px;position:relative; line-height:32px;}
        .money span{padding-left:10px;float:left;}
        .sx{width:16px;height:16px;position:absolute;right:45px;top:7px;}
        .sx img{width:16px;height:16px;}
        .qb{width:34px;height:29px;background:#007aff;border-radius:5px;right:3px;top:1px;position:absolute;text-align:center;}
        .qb img{width:16px;height:16px; margin-top:5px;}
    </style>
    <body style="color: white; background-color: #0c192c;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">
            <div class="top">
                <div class="logo"><img src="../../mobile/img/jx-logo.443c8ffbee580d3672f7.png"/></div>
                <div class="money">
                    <span>R$</span>
                    <span>0</span>
                    <div class="sx"><img src="../../mobile/img/sx.png" /></div>
                    <div class="qb"><img src="../../mobile/img/qb.png" /></div>
                </div>
            </div>
      </jx-main-wrapper>
    </jx-root>
    <script>
        $(function(){
          $('.sx').click(function(){
              location.reload(true)
          })
        })
    </script>          
    </body>