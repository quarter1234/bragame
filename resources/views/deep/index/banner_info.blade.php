<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/amazeui.min.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/common2.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/mobile/css/index_style03.css?rand=3">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="    <link rel="stylesheet" href="/static/css/artDialog.css">/static/css/icon.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/static/js/way.min.js"></script>
   

    <meta name="theme-color" content="#0C192C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using deep-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="deep">
    <meta name="format-detection" content="telephone=no">
  </head>
<body class="bg_fff"style="background: #0c192c;">
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<div class="am-header-left am-header-nav">
			<a href="javascript:history.back(-1);" class="" style="margin-top:15px;margin-left:8px">
				<img src="..\..\static\images\left_ico.png" style="width:22px;height:22px" />
			</a>
      	</div>

		<h1 class="am-header-title activity_h1">
			{{ $banner['title'] }}
		</h1>
	</header>
    <div class="banner_top"><img style="width:100%;height:auto;" src="{{ $banner['img'] }}" />
</div>    
	<div class="banner_text" style="box-sizing: border-box;padding: 15px; color: white;">

        {!! $banner['content'] !!}
    </div>


</body>
</html>