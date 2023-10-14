<style>
    .tc{ width:100%;height:600px;position:fixed;bottom:0;z-index:999; border-radius:10px 10px 0 0; background:#202121;}
    .tc_top{height:40px;width:204px; background:rgba(0, 0, 0, 0.5); margin:20px auto; border-radius:5px;}
    .close{position:absolute; right:20px;text-align:right;top:15px;width:20px;height:20px;}
    .close img{width:20px;height:20px;}
    .tc_top_list{width:102px;height:40px;text-align:center;line-height:40px;border-radius:5px; float:left;color:#666;}
    .tc_on{background:rgba(255, 255, 255, 0.1);color:#fff;font-weight:bold;}
    .list{width:95%;margin:20px auto;color: #fff;display:none;}
    .list_top,.list_top2{width:270px;height:60px;background:#12202e; border-radius:10px;overflow:hidden;}
    .list_top_l,.list_top_l2{width:127px;height:48px;margin:6px 0 0 5px;border-radius:10px;line-height:48px; text-align:center;float:left;}
    .list_top_l_on{background:#304655;}
    .list_top_l_on2{background:#304655;}
    .list_b,.list_b2{width:100%;height:450px; display:none;}
    .entry{width:100%;height:60px;margin-top:15px; background:rgba(0, 0, 0, 0.5);border-radius:10px; position:relative;}
    .email{position:absolute;left:10px;top:15px}
    .email img{width:30px;height:30px;}
    .sr{width:200px;height:30px;position:absolute;top:15px;left:50px;}
    .sr input{height:30px;background:none; border:none; outline:none;font-size:18px;color:#fff;}
    input:-internal-autofill-selected{
      background:#080f19 !important;
    }
    .sr_close{position:absolute;top:20px;right:20px;width:20px;height:20px;}
    .sr_close img{width:20px;height:20px;}
    .pass{width:100%;height:60px;margin-top:15px; background:rgba(0, 0, 0, 0.5);border-radius:10px; position:relative;}
    .pass img{width:25px;height:25px;margin-left:2px; margin-top:2px;}
    .pass_sr{width:200px;height:30px;position:absolute;top:15px;left:50px;}
    .pass_sr input{height:30px;background:none; border:none; outline:none;font-size:18px;color:#fff;}
    .pass_show{position:absolute;top:20px;right:23px;width:20px;height:20px;}
    .pass_show img{margin:0;}
    .remember{width:100%;margin-top:15px;}
    .remember_left{width:50%;float:left;}
    .remember_left2{width:100%;margin-top:15px;}
    .r_left{width:100%;line-height:20px;font-size:14px;color:#abb4ce;}
    .r_left img{float:left; width:20px;height:20px;margin-right:10px;}
    .r1,.r3,.r5{display:block;}
    .r2,.r4,.r6{display:none;}
    .r_right{width:50%;float:right;text-align:right;font-size:14px;}
    .r_right a{color:#abb4ce; text-decoration:underline;}
    .login{width:100%;height:50px;line-height:50px; margin-top:15px;border-radius:5px;font-size:14px;    background: linear-gradient(307deg,#e7a738 0%,#f1c56e 100%);
    color: #202121;}
    .login2{width:100%;height:50px;line-height:50px; margin-top:15px;border-radius:5px;font-size:14px;    background: linear-gradient(307deg,#e7a738 0%,#f1c56e 100%);
    color: #202121;}
    .xl{position:absolute;width:80px;left:40px;top:20px}
    .xl select{background:none; border:none;color:#fff; outline:none;}
    .yzm{width:100%;height:60px;margin-top:15px; background:#12202e;border-radius:10px; position:relative;}
    .yzm_left{width:30px;height:30px;position:absolute;top:15px;left:10px;}
    .yzm_left img{width:30px;height:30px;}
    .yzm_sr{width:200px;height:30px;position:absolute;top:15px;left:50px;}
    .yzm_sr input{width:100%;height:30px;background:none; border:none; outline:none;font-size:18px;color:#fff; }
    .yzm_right{width:80px;height:40px;position:absolute;text-align:center;background:#344e5e;color:#fff;right:10px;top:10px;border-radius:10px;line-height:40px;}

    @media screen and (min-width: 1200px){
      .tc{ width:40%;height:410px;position:fixed;top:50%;z-index:999; border-radius:10px 10px 0 0; background:#033619;margin-top:-205px;left:50%;margin-left:-20%;}

    }

  </style>

  <div class="tc" style="display: none;">
  <div class="close"><img src="/mobile/deep/images/gb_black.png"></div>      
      <div class="tc_top">
              <div class="tc_top_list tc_on" data-locale="Login">{{ trans('auth.login') }}</div>
              <div class="tc_top_list" data-locale="Register">{{ trans('auth.register') }}</div>
      </div>
      <div class="list" style="display:block;">
          
          
          <div class="list_b" style="display:block;">
          <form method="post" class="login-form ng-untouched ng-pristine ng-valid" onSubmit="return check_login(this)" id="form1" checkby_ruivalidate url="" action="{{url('Public/login')}}" style="margin-top: 30px;">
          @csrf
          <div class="entry">
                  <div class="email"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/iphone.png" /></div>
                  <div class="xl"><select><option>+55</option></select></div>
                  <div class="sr" style="left:100px"><input type="text" id="phone" name="phone" onkeyup="checkContent(this)"/></div>
                  <div class="sr_close"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/close.png"></div>
              </div>
              <div class="pass">
                <div class="email"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/pass.png" /></div>
                <div class="pass_sr"><input id="pass" name="password" type="password" onkeyup="checkContent(this)" /></div>
                <div class="pass_show"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/show.png"></div>
              </div>
              <div class="remember">
                  <div class="remember_left">
                        <div class="r_left r2"><img src="/mobile/deep/images/25gf.png" />{{ trans('auth.remember_password') }}</div>
                        <div class="r_left r1"><img src="/mobile/deep/images/24gf.png" />{{ trans('auth.remember_password') }}</div>
                        <input type="hidden" name="remember_me" value="true" />
                  </div>
                  <div class="r_right">{{--<a>忘记密码？</a>--}}</div>
              </div>
              <button id="sub" type="submit" disabled="disabled" class="login">{{ trans('auth.login') }}</button>
          </form>
          </div>
      </div>

      
      <div class="list">
          
      <div class="list_b2" style="display:block;">
            <form method="post" action="{{url('Public/register')}}"  class="ruivalidate_form_class" onSubmit="return check_register(this)" id="form_register">
                @csrf  
                <div class="pass">
                <div class="email"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/zh.png" /></div>
                <div class="pass_sr"><input name="playername" id="playernameRegister" placeholder="Nome do usuário" type="text"/></div>
                <div class="pass_show"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/show.png"></div>
              </div>  
              <div class="entry">
                  <div class="email"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/iphone.png" /></div>
                  <div class="xl"><select><option>+55</option></select></div>
                  <div class="sr" style="left:100px"><input id="phoneRegister" name="phone" onkeyup="checkRegisterContent(this)" type="text" placeholder="Número" /></div>
                  <div class="sr_close"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/close.png"></div>
              </div>
              <div class="pass">
                <div class="email"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/pass.png" /></div>
                <div class="pass_sr"><input id="passRegister" name="password" type="password" onkeyup="checkRegisterContent(this)" type="password" placeholder="Senha" /></div>
                <div class="pass_show"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/show.png"></div>
              </div>
              {{--<div class="yzm">
                  <div class="yzm_left"><img src="https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public/static/images/yzm.png" /></div>
                  <div class="yzm_sr"><input type="text" placeholder="验证码" /></div>
                  <div class="yzm_right">验证码</div>
              </div>--}}
              <div class="remember">
                  <div class="remember_left">
                        <div class="r_left r2"><img src="/mobile/deep/images/25gf.png" />{{ trans('auth.remember_password') }}</div>
                        <div class="r_left r1"><img src="/mobile/deep/images/24gf.png" />{{ trans('auth.remember_password') }}</div>
                  </div>
                  <div class="r_right">{{--<a>忘记密码？</a>--}}</div>
              </div>
              <button id="subRegister" type="submit" disabled="disabled" class="login">{{ trans('auth.register') }}</button>

            </form>
          </div>
      </div>
      </div>
      

  <script type="text/javascript">
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
    function checkRegisterContent(obj) {
      if($(obj).val() === '' ||$(obj).val() === null){
          if($("#phoneRegister").val() !== '' ||$("#passRegister").val() !== '' || $("#playernameRegister").val() !== ''  ){
            $('#subRegister').attr('disabled',false);
          }else{
            $('#subRegister').attr('disabled',true);
          }
        }else{
          $('#subRegister').attr('disabled',false);
        }
    }
    function check_login(obj) {
        showLoading();
        $.ajax({
            url : "{{url('mobile/login')}}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                hideLoading()
                if(data.code == 200) {
				          window.location.href= "{{url('mobile/index')}}"
                } else {
                  showModal(data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              hideLoading()
              showModal(jqXHR.responseJSON.message);
            }
        })
        return false;
    }
    function check_register(obj) {
      showLoading();
       $.ajax({
          url : "{{url('mobile/register')}}",
          type : 'POST',
          data : $("#form_register").serialize(),
          success : function (data) {
            hideLoading()
            if(data.code == 200) {
              window.location.href= "{{url('mobile/index')}}"
            } else {
              showModal(data.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            hideLoading()
            showModal(jqXHR.responseJSON.message);
          }
        })
		  return false;
	  }

      $(function(){
        $('.show_login').click(function(){
          $('.tc').show();
        });

        $('.close').click(function(){
          $('.tc').hide()
        });

        var isShowLogin = "{{$showLogin}}";
        if(isShowLogin == 1) {
          $('.tc').show(); 
        }
        
        $('.tc_top_list').click(function(){
          $(this).addClass('tc_on').siblings().removeClass('tc_on')
          var index =$(this).index()
          $('.list').hide().eq(index).show()
        })
        
        $('.list_top_l').click(function(){
          $(this).addClass('list_top_l_on').siblings().removeClass('list_top_l_on')
          var index1 =$(this).index()
          $('.list_b').hide().eq(index1).show()
        })
        $('.sr_close').click(function(){
          $('.sr input').val('')
        })
        $('.pass_show').click(function(){
          var sr =$('.pass_sr input').attr('type')
          if(sr=='password'){
            $('.pass_sr input').attr('type','text')
          }else{
            $('.pass_sr input').attr('type','password')
          }
        })
        $('.r1').click(function(){
          $('.r1').css('display','none')
          $('.r2').css('display','block')
        })
        $('.r2').click(function(){
          $('.r2').css('display','none')
          $('.r1').css('display','block')
        })
        $('.r3').click(function(){
          $('.r3').css('display','none')
          $('.r4').css('display','block')
        })
        $('.r4').click(function(){
          $('.r4').css('display','none')
          $('.r3').css('display','block')
        })
        $('.r5').click(function(){
          $('.r5').css('display','none')
          $('.r6').css('display','block')
        })
        $('.r6').click(function(){
          $('.r6').css('display','none')
          $('.r5').css('display','block')
        })  
        $('.list_top_l2').click(function(){
          $(this).addClass('list_top_l_on2').siblings().removeClass('list_top_l_on2')
          var index1 =$(this).index()
          $('.list_b2').hide().eq(index1).show()
        })
        var time = 60;
        $(".yzm_right").click(function (){
          if(time==60){//如果不加入该判断，则会出现在倒计时期间不断的点击发生不断的加快（其实就是你点了多少次就重复多少次该函数）的问题，用setTimeout（）方法不加此判断也是一样的
          var time1=setInterval(function(){
          if(time==0){
              $(".yzm_right").html("验证码");
              $(".yzm_right").removeAttr("disabled");
              time=60;
              clearInterval(time1);
            }else{
              $(".yzm_right").attr("disabled","true");
              $(".yzm_right").html("("+time+")S");
              time--;
            }
          }, 1000);
          }

        })
})
</script>