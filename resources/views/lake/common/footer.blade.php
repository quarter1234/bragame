{{--底部导航--}}

<div _ngcontent-way-c10="" class="tab-bar safe-area-fix-bottom safe-area-fix-left safe-area-fix-right" jxsafeareafixbottom="" jxsafeareafixleft="" jxsafeareafixright="">

<button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShareController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/share")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--cs"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title">{{--分享--}}Partilhar</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ActivityController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/activity")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--activity"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Events">{{--活动--}}Atividades</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-left @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\IndexController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/index")}}'" jxsafeareafixleft="" routerlink="/home" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--home"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Home">{{--首页--}}Casa</span>
    </button>
   
    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShopController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/shop")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--brand"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Promotional">{{--优惠活动--}}preferenciais</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-right @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\MemberController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/member/index")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--my"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Mine">{{--我的--}}Meu</span>
    </button>
</div>
{{--侧边导航--}}
<div class="pc_tab">
                   <div class="pc_nav">
                      <ul class="zf_box">
                      <li class="zf_box1" onclick="location.href='{{url("mobile/index")}}'"><label class="n1"></label><span data-locale="Home">Casa</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/activity")}}'"><label class="n2"></label><span data-locale="Events">Atividades</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/share")}}'"><label class="n3"></label><span data-locale="Share" >Partilhar</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/shop")}}'"><label class="n4"></label><span data-locale="Favorable">preferenciais</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/member/vip")}}'" ><label class="n6"></label><span data-locale="VIP">VIP Grau</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/member/email")}}'" ><label class="n7"></label><span data-locale="Email">Email</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/member/customerService")}}'" ><label class="n8"></label><span data-locale="Service">Atendimento</span></li>
                      <li class="zf_box1" onclick="location.href='{{url("mobile/member/index")}}'"><label class="n5"></label><span data-locale="Mine">Meu</span></li>
                      </ul>
                      <div id="music-player">
                       <audio id="audio" controls autoplay>
                       <source src="/mobile/lake/yinyue/11111.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                         </audio>
                        
                         <button class="zf_touzhu"><img class="tubiao" src="/mobile/lake/images/zf_jinbi.png" alt="">Registro de apuestas</button>
                  </div>
                  
                </div> 
                <button id="play-button"></button>
                </div>
            
    </div>
</div>

<style>
 /* 自定义播放器样式 */
 #music-player {
    width: 180px;
    color: #06c1fa;
    text-align: center;
    border-radius: 25px;
    margin-top: 20px;
}

#music-player audio {
    width: 100%;
}
.zf_touzhu{
    background-color: rgba(255, 255, 255,.1);
    color: #f7f0f0;
    width: 180px;
    height: 40px;
    font-size: 16px;
    margin-top: 20px;
}
.tubiao{
    width: 20px;
    height: 20px;
    line-height: 40px;
}

.n1{
    background:url(/mobile/lake/images/home.93b20d6e835f71c043b8.png);
    background-size:24px 24px;
}
.n2{
    background:url(/mobile/lake/images/activity.8a6a35ba2ac648314ace.png);
    background-size:24px 24px;
}
.n3{
    background:url(/mobile/lake/images/zfj_ico.png);
    background-size:24px 24px;
}
.n4{
    background:url(/mobile/lake/images/sk.png);
    background-size:24px 24px;
}
.n5{
    background:url(/mobile/lake/images/my.87c43b85171cb8232892.png);
    background-size:24px 24px;
}
.pc_nav.n5{
    background:url(/mobile/lake/images/my.87c43b85171cb8232892.png);
    background-size:24px 24px;
}
.n6{
    background:url(/mobile/lake/images/f-vip1.png);
    background-size:24px 24px;
}
.n7{
    background:url(/mobile/lake/images/email-fill1.png);
    background-size:24px 24px;
}
.n8{
    background:url(/mobile/lake/images/kf_r_ico1.png);
    background-size:24px 24px;
}

.pc_nav li.pc_on{
    color:#ef962f;
}
.pc_on .n1{
    background:url(/mobile/lake/images/active_home.485e6c98acecf897b8ba.png);
    background-size:24px 24px;
}
.pc_on .n2{
    background:url(/mobile/lake/images/active_activity.0eee109d4b6a4ccedf91.png);
    background-size:24px 24px;
}
.pc_on .n3{
    background:url(/mobile/lake/images/zfj_on_ico.png);
    background-size:24px 24px;
}
.pc_on .n4{
    background:url(/mobile/lake/images/active_brand.26b0bef9602b57eac72e.png);
    background-size:24px 24px;
}
.pc_on .n5{
    background:url(/mobile/lake/images/active_my.030b4715dce6d516f9c8.png);
    background-size:24px 24px;
}
.pc_on .n6{
    background:url(/mobile/lake/images/f-vip.png);
    background-size:24px 24px;
}
.pc_on .n7{
    background:url(/mobile/lake/images/email-fill.png);
    background-size:24px 24px;
}
.pc_on .n8{
    background:url(/mobile/lake/images/kf_r_ico.png);
    background-size:24px 24px;
}
.pc_nav{
    display:none;
}
.zf_box{
    display: flex;
    list-style: none;
}
.zf_box1{
    display: flex;
    
}
@media screen and (min-width: 1200px) {
    .tab-bar[_ngcontent-way-c10]{
        display:none;
    }
    .pc_tab{
        width:180px;
        height:100%;
        position:absolute;
        left:0;
        top:-970px;  
        display:block;
    }
    .pc_nav ul{
        margin:0;
        padding:0;
        display: flex;
        flex-wrap: wrap;
        border-radius: 15px;
        margin-top: 130px;
    }
    .pc_nav li{
        height: 87px;
        width: 86px;
        display: flex;
        line-height: 40px;
        font-size: 14px;
        color: #cecece;
        flex-direction: column;
        align-items: center;
        background-color: rgba(255, 255, 255,.1);
        border-radius: 15px;
        margin-top: 4px;
        margin-left: 4px;
    }
    .pc_nav li label{
        width:24px;
        height:24px;
        display:inline-block;
        margin-left:10px;
        margin-right:10px;
        margin-top: 18px;
    }
    .pc_nav li:hover{
        background-color: rgb(0, 93, 254);
    }
    .pc_nav li label{
        width:24px;
        height:24px;
        display:inline-block;
        margin-left:10px;
        margin-right:10px;
    }
}
</style>
<script>
    $(function(){
      $('.pc_nav li').hover(function(){
        $(this).addClass('pc_on').siblings().removeClass('pc_on')
      })
      $('.pc_nav li').mouseout(function(){
        $(this).removeClass('pc_on')
      })
      $('.aaa').click(function(){
          $('.pc_nav').toggle()
      })
    })
    
function loadProperties(lang) {
            $.i18n.properties({
                name: 'strings',  //资源文件名称 ， 命名格式： 文件名_国家代号.properties
                path: '../mobile/lake/lang/',    //资源文件路径，注意这里路径是你属性文件的所在文件夹,可以自定义。
                mode: 'map',     //用 Map 的方式使用资源文件中的值
                language: lang,  //这就是国家代号 name+language刚好组成属性文件名：strings+zh -> strings_zh.properties
                callback: function () {
                    $("[data-locale]").each(function () {
                        $(this).html($.i18n.prop($(this).data("locale")));

                    });
                }
            })
        }
        loadProperties('en');
   
    // var button = document.getElementById("aaa");
    // button.addEventListener("click",function(){
    //     window.location.href="views/lack/member/bets.blade.php"
    // })


    const audio = document.getElementById("audio");
        const playButton = document.getElementById("play-button");

        playButton.addEventListener("click", function() {
            if (audio.paused) {
                audio.play();
                playButton.textContent = "";
            } else {
                audio.pause();
                playButton.textContent = "";
            }
        });

</script>