<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Imsloat</title>
	<meta name="keywords" content="Imsloat" />
	<meta name="description" content="Imsloat" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/static/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/static/css/jx-login.css" rel="stylesheet" type="text/css">
    <link href="/static/css/coin-slider-styles.css" rel="stylesheet" type="text/css">
    <link href="/static/css/htmleaf-demo.css" rel="stylesheet" type="text/css">
    <link href="/static/css/unlock.css" rel="stylesheet" type="text/css">
    <link href="/static/css/slideunlock.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/static/css/coin-slider-styles.css" type="text/css">
    <link rel="stylesheet" href="/static/css/artDialog.css" type="text/css">

<script src="/static/js/jquery-3.1.1.min.js"></script> 
<script type="text/javascript" src="/static/js/artDialog.js"></script>
<script type="text/javascript" src="/static/js/way.min.js"></script>
<script src="/static/drling/js/require.js" data-main="/static/drling/js/main"></script>
</head>
<body>
    <div class="Wap RegisterBg">
<header>
    <div class="h_container">
      <div class="jx-logo_drling"><a href="#"><img src="/static/img/drling_logo.png"></a></div>
    </div>
  </header>
        <div id="Container">
            <div class="RegisterFrame">
                <div class="RegisterTitle">
                </div>
                <form method="post" action="{{url('Public/register')}}"  class="ruivalidate_form_class" onSubmit="return check_form(this)" id="form1">
                @csrf    
                    <!-- <input class="inputFrame R-UserID" type="text" value="" id="reccode" class="input fadeIn delay1 input_txt" size="60" name="reccode" maxlength="16"  placeholder="请输入邀请码" /> -->
                    <input class="inputFrame R-UserID" type="text"  name="playername" id="playername" class="input_txt" placeholder="请输入昵称">
					<input class="inputFrame R-UserID" type="text"  name="phone" id="phone" class="input_txt" placeholder="请输入手机号">
					<input class="inputFrame R-UserID" type="password" name="password" id="password" class="input_txt" placeholder="请输入密码">
                    <input class="inputFrame R-UserID" type="password"  name="repassword" id="repassword" class="input_txt" placeholder="请再次输入密码">
                    
                    <!-- <input class="inputFrame R-UserID" type="password"  name="tradepassword" id="tradepassword" class="input_txt" placeholder="请输入提款密码"> -->
					<p class="bank_pass"><a href="{{url('drling/login')}}" style="font-size: 14px;color: #118799;padding-left: 8px;">已有账号? 立即登录</a></p>
                    
                    <input id="btnRegister" class="BtnLogin BTN-Register" type="submit" value="立即注册">
				</form>
            </div>
        </div>
        <div class="adv_banner_drling"><img src="/static/img/banner_register.jpg"></div>
<div id="MainFt">
    <ul class="FtFrame">
        <li class="pay_drling"><a href="#"><img src="/static/img/flogo1.png"></a></li>
        <li class="pay_drling"><a href="#"><img src="/static/img/flogo2.png"></a></li>
        <li class="pay_drling"><a href="#"><img src="/static/img/flogo3.png"></a></li>
        <li class="pay_drling"><a href="#"><img src="/static/img/flogo4.png"></a></li>
    </ul>
    <div class="FT-Copyright">
        <span class="copyright_mail">官方邮箱：<a href="mailt:heccsd@gmail.com">heccsd@gmail.com</a></span>    
    </div>
</div>
    </div>
<script>
	function check_form(obj) {
       $.ajax({
		   url : "{{url('drling/register')}}",
		   type : 'POST',
		   data : $("#form1").serialize(),
		   success : function (data) {
                if(data.code == 200) {
				//    alert("恭喜你!注册成功");
				   window.location.href= "{{url('drling/index')}}"
                } else {
                    art.dialog({ title: '', content: data.message, time: 3 });
                }
		   }
	   })
		return false;
	}
</script>
</body>
</html>