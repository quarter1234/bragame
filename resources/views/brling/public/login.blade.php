<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="UTF-8">
    <title>{{--登录--}}Login</title>
	<meta name="keywords" content="登录" />
	<meta name="description" content="登录" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <link rel="icon" type="image/x-icon" href="/static/img/favicon.ico">
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/static/css/styles.41928e9497559161f9b8.css">
    <link rel="stylesheet" href="/static/css/artDialog.css" type="text/css">
	
	<script src="/static/js/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript" src="/static/js/artDialog.js"></script>


    <style>.login-bg[_ngcontent-inw-c0] {box-sizing:border-box;position:fixed;left:0;right:0;width:100%;z-index:-1}
.login-bg.login-bg-bottom[_ngcontent-inw-c0] {bottom:0;padding-top:calc(203 / 375 * 100%);background:linear-gradient(to top,rgba(12,25,44,0) 0,#0c192c 100%) 0 0/cover,url(/static/img/login-page-bg-bottom.4df0b38f08bb26e3b9b8.svg) center bottom/cover no-repeat}
.login-bg.login-bg-top[_ngcontent-inw-c0] {top:0;padding-bottom:calc(276 / 375 * 100%);background:linear-gradient(to bottom,rgba(12,25,44,0) 0,#0c192c 100%) 0 0/cover,url(/static/img/login-page-bg-top.d4aa89d3ea80b6d6f428.svg) center top/cover no-repeat}
.login-bg.login-bg-middle[_ngcontent-inw-c0] {top:0;bottom:0;background:url(/static/img/login-page-bg-center.a23ab2aff01478fd81ad.svg) center 20%/contain no-repeat,linear-gradient(to bottom,rgba(12,25,44,0) 0,#0c192c 25%,#0c192c 75%,rgba(12,25,44,0) 100%) 0 0/contain}
.login-page-container[_ngcontent-inw-c0] {box-sizing:content-box;margin:auto;padding-top:calc((100vh - 30px - 373px)/ 2);padding-bottom:0;padding-right:15px;padding-left:15px;max-width:354px;max-height:373px}
@supports (padding-top:env(safe-area-inset-top)) or (padding-top:constant(safe-area-inset-top)) {.login-page-container[_ngcontent-inw-c0] {padding-top:calc((100vh - env(safe-area-inset-top) - env(safe-area-inset-bottom) - 30px - 373px)/ 2)}
}
.login-page-logo[_ngcontent-inw-c0] {margin:auto;width:195px;height:100px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(/static/img/login-page-logo.ca67e7aa2e9dd420db06.svg)}
.login-form[_ngcontent-inw-c0] {margin-top:50px}
.login-form__field[_ngcontent-inw-c0] {color:#fff;font-size:16px;font-weight:400;line-height:1.375;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(151,151,151,.2)}
.login-form__field[_ngcontent-inw-c0]:not(:first-child) {margin-top:15px}
.login-form__field__icon-prefix[_ngcontent-inw-c0] {flex:0 0 auto;display:block;width:1.5em;height:1.5em;background-size:contain;background-repeat:no-repeat;background-position:center center}
.login-form__field__icon-prefix--username[_ngcontent-inw-c0] {background-image:url(/static/img/login-page-icon-username.ecf3c36fd4142377ea24.svg)}
.login-form__field__icon-prefix--password[_ngcontent-inw-c0] {background-image:url(/static/img/login-page-icon-password.541dae01cade9bd75782.svg)}
.login-form__field__icon-prefix--captcha[_ngcontent-inw-c0] {background-image:url(/static/img/login-page-icon-captcha.c019de6674a45f7c249d.svg)}
.login-form__field__input[_ngcontent-inw-c0] {flex:1 1 auto;margin:0;padding:.3125em .5em;min-width:0;-webkit-appearance:none;-moz-appearance:none;appearance:none;outline:0;border:none;background:0 0;color:inherit;font-size:inherit;font-weight:inherit;line-height:inherit}
.login-form__field__input[_ngcontent-inw-c0]::-webkit-input-placeholder {color:#878e97}
.login-form__field__input[_ngcontent-inw-c0]::-moz-placeholder {color:#878e97}
.login-form__field__input[_ngcontent-inw-c0]::-ms-input-placeholder {color:#878e97}
.login-form__field__input[_ngcontent-inw-c0]::placeholder {color:#878e97}
.login-form__field__input[_ngcontent-inw-c0]:-webkit-autofill {border-radius:1em;background-color:#132235}
.login-form__field__icon-affix[_ngcontent-inw-c0] {flex:0 0 auto;display:block;padding:.3125em .5em;color:#404b5e;font-size:inherit;font-weight:inherit;line-height:inherit;border-radius:.5em}
.login-form__field__icon-affix[_ngcontent-inw-c0] > mat-icon[_ngcontent-inw-c0] {display:block}
.login-form__field__captcha-img-btn[_ngcontent-inw-c0] {flex:0 0 auto;display:block;padding:0;height:2em;width:auto;font-size:inherit;font-weight:inherit;line-height:inherit;border-radius:0}
.login-form__field__captcha-img-btn[_ngcontent-inw-c0] > img[_ngcontent-inw-c0] {display:block;max-width:100%;max-height:100%;pointer-events:none}
.login-form__submit-btn[_ngcontent-inw-c0] {display:block;margin-top:10px;padding:.5em;width:100%;min-height:54px;color:#fff;border-radius:10px;background-image:linear-gradient(179deg,#13a2ba,#087c95)}
.login-action-btn-group[_ngcontent-inw-c0] {margin-top:10px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center}
.login-action-btn-group__action-btn[_ngcontent-inw-c0] {flex:0 1 auto;padding:0;color:#878e97;font-size:14px;font-weight:400;line-height:20px}
.login-page-version-info[_ngcontent-inw-c0] {box-sizing:border-box;margin-top:15px;color:#878e97;font-size:14px;font-weight:400;line-height:20px;text-align:center}
div.login-method-button-group[_ngcontent-inw-c0] span.title[_ngcontent-inw-c0] {font-size:16px;color:#878e97}
div.login-method-button-group[_ngcontent-inw-c0] div.button-group-container[_ngcontent-inw-c0] {margin-top:11px;margin-bottom:30px;display:flex;justify-content:space-between}
div.login-method-button-group[_ngcontent-inw-c0] div.button-group-container[_ngcontent-inw-c0] > button[_ngcontent-inw-c0] {width:calc((100% - 40px)/ 3);height:36px;background:#132235}
div.login-method-button-group[_ngcontent-inw-c0] div.button-group-container[_ngcontent-inw-c0] > button.selected[_ngcontent-inw-c0] {background-image:linear-gradient(179deg,#13a2ba,#087c95);color:#fff}
</style>    
<style>@supports (padding-top:constant(safe-area-inset-top)) or (padding-top:env(safe-area-inset-top)) {.safe-area-top {padding-top:env(safe-area-inset-top)}
.safe-area-fix-top {margin-top:calc(-1 * env(safe-area-inset-top));padding-top:env(safe-area-inset-top)}
}
@supports (padding-bottom:constant(safe-area-inset-bottom)) or (padding-bottom:env(safe-area-inset-bottom)) {.safe-area-bottom {padding-bottom:env(safe-area-inset-bottom)}
.safe-area-fix-bottom {margin-bottom:calc(-1 * env(safe-area-inset-bottom));padding-bottom:env(safe-area-inset-bottom)}
}
@supports (padding-left:constant(safe-area-inset-left)) or (padding-left:env(safe-area-inset-left)) {.safe-area-left {padding-left:env(safe-area-inset-left)}
.safe-area-fix-left {margin-left:calc(-1 * env(safe-area-inset-left));padding-left:env(safe-area-inset-left)}
}
@supports (padding-right:constant(safe-area-inset-right)) or (padding-right:env(safe-area-inset-right)) {.safe-area-right {padding-right:env(safe-area-inset-right)}
.safe-area-fix-right {margin-right:calc(-1 * env(safe-area-inset-right));padding-right:env(safe-area-inset-right)}
}
</style>    
<style>[_nghost-inw-c2] {box-sizing:border-box;display:block;padding:15px}</style>    
<style>.mat-icon {background-repeat:no-repeat;display:inline-block;fill:currentColor;height:24px;width:24px}
.mat-icon.mat-icon-inline {font-size:inherit;height:inherit;line-height:inherit;width:inherit}
[dir=rtl] .mat-icon-rtl-mirror {transform:scale(-1,1)}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon {display:block}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button .mat-icon {margin:auto}
</style>
</head>
  
  <body style="color: white; background-color: #0c192c;">
    <div _ngcontent-inw-c0="" class="login-bg login-bg-top ng-trigger ng-trigger-fadeIn"></div>
    <div _ngcontent-inw-c0="" class="login-bg login-bg-bottom ng-trigger ng-trigger-fadeIn"></div>
    <div _ngcontent-inw-c0="" class="login-bg login-bg-middle"></div>
        <div _ngcontent-inw-c0="" class="login-page-container ng-tns-c0-0">
          <div _ngcontent-inw-c0="" class="login-page-logo"></div>
          <form method="post" class="login-form ng-untouched ng-pristine ng-valid" onSubmit="return check_login(this)" id="form1" checkby_ruivalidate url="" action="{{url('Public/login')}}" style="margin-top: 30px;">
          @csrf
          <div _ngcontent-inw-c0="" class="login-method-button-group">
             <span _ngcontent-inw-c0="" class="title">{{--请选择登录方式--}}Por favor, selecione o método de login</span>
               <div _ngcontent-inw-c0="" class="button-group-container">
                    <button _ngcontent-inw-c0="" class="login-action-btn-group__action-btn selected">账号</button>
                    <button _ngcontent-inw-c0="" class="login-action-btn-group__action-btn" disabled>手机号</button>
                    <button _ngcontent-inw-c0="" class="login-action-btn-group__action-btn" disabled>邮箱</button></div>
            </div>
            <label _ngcontent-inw-c0="" class="login-form__field ng-tns-c0-0 ng-star-inserted">
              <span _ngcontent-inw-c0="" class="login-form__field__icon-prefix login-form__field__icon-prefix--username"></span>
              <input _ngcontent-inw-c0="" class="login-form__field__input ng-untouched ng-pristine ng-valid" onkeyup="checkContent(this)" id="phone" name="phone" verify="isLoginName" isNot="true" placeholder="请输入您的手机号" type="text">
            </label>
            <label _ngcontent-inw-c0="" class="login-form__field">
              <span _ngcontent-inw-c0="" class="login-form__field__icon-prefix login-form__field__icon-prefix--password"></span>
              <input _ngcontent-inw-c0="" class="login-form__field__input ng-untouched ng-pristine ng-invalid" onkeyup="checkContent(this)" id="pass" name="password" verify="isALL" isNot="true" placeholder="请输入账号密码" required="" type="password">
            </label>
            <button disabled="disabled"  _ngcontent-inw-c0="" class="login-form__submit-btn" id="sub" type="submit" value="登录">登录</button>
		</form>
          <div _ngcontent-inw-c0="" class="login-action-btn-group">
            <a href="javascript:void(0)" style="flex: 0 1 auto;padding: 0;color: #878e97;font-size: 14px;font-weight: 400;line-height: 20px;text-decoration: none;"></a>
            
            <a href="{{url('brling/register')}}" style="flex: 0 1 auto;padding: 0;color: #878e97;font-size: 14px;font-weight: 400;line-height: 20px;text-decoration: none;">立即注册</a>
			</div>
          <div _ngcontent-inw-c0="" class="login-page-version-info">系统版本：1.2.0.2366</div></div>
<script>
function checkContent(obj) {
	 if($(obj).val() === '' ||$(obj).val() === null){
		   if($("#phone").val() !== ''||$("#pass").val() !== '' ){
			   $('#sub').attr('disabled',false);
		   }else{
			   $('#sub').attr('disabled',true);
		   }
	   }else{
		   $('#sub').attr('disabled',false);
	   }
}
</script>


<!-- 调用插件 -->
<script>
    function check_login(obj) {
        $.ajax({
            url : "{{url('brling/login')}}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.code == 200) {
				//    alert("恭喜你!注册成功");
				   window.location.href= "{{url('brling/index')}}"
                } else {
                    art.dialog({ title: 'Tips:', content: data.message, time: 3 });
                }
            }
        })
        return false;
    }
</script>
</body>
</html>