<html lang="zh-Hans">

  <head>
    <meta charset="utf-8">
    @include('green2.common.common_title')
    <base href="/">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/material-icons.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/static/css/styles.4917b6f03b8811030eaf.css">
     <!-- 分离好的样式开始 -->
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/mobile/css/swipeslider.css">
    <link rel="stylesheet" href="https://www.betbra.net:8032/bx_1/public/mobile/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/mobile/green2/css/index.css">
     <!-- 分离好的样式结束 -->
    <!-- Used in supported Android browsers -->
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/way.min.js"></script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/mobile/js/index.js"></script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/mobile/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="/mobile/green2/js/jquery.i18n.properties.js"></script>
    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using green2-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="green2">
    <meta name="format-detection" content="telephone=no">
	</head>

  <body style="color: white; background-color: #04431f;width: 100%;overflow-x: hidden;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">
        <router-outlet _ngcontent-way-c0=""></router-outlet>
        <jx-home-page _nghost-way-c1="" class="ng-star-inserted">
          <!---->
          <!---->
          <jx-app-background _ngcontent-way-c1="" _nghost-way-c2="">
            <div _ngcontent-way-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-way-c1="" _nghost-way-c3="">
          @include('green2.common.modal')
          @include('green2.common.modal_sub')
            <div _ngcontent-way-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-way-c3="" class="header-view__nav-row-wrapper__container" _nghost-way-c11="">

              <div _ngcontent-way-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                  <!---->
                  <!---->
                  <!---->
                  <div _ngcontent-way-c3="" class="header-icons-ctn ng-star-inserted">
                    <div _ngcontent-way-c3="" class="header-jx-icon header-icon"></div>
                  </div>
                  <!---->
                  <div _ngcontent-way-c3="" class="header-view__nav-row-wrapper__container__nav-row__content" style="position: relative;"></div>
                  @if (Auth::check())
                    <span style="font-size:0.9rem;position: absolute;right:10px;">
                        <div class="money">
                            <span class="money_rs"></span>
                            <span>{{ $user['coin'] }}</span>
                            <div class="qb"><img onclick="location.href='{{ url("mobile/pay/recharge") }}'" src="/mobile/blue/images/qb.png"></div>
                        </div>
                    </span>
                  @else
                    <div class="dl show_login" data-locale="Login">Login</div>
                    <div class="zc show_login" data-locale="Register">Registo</div>
                  @endif
                </div>

              </jx-header-row>
            </div>
            <style>
            .index_banner{
              width:100%;
              height:160px;
              text-align:center;
           }
           .index_banner img{
              width:96%;
              height:160px;
           }
            @media screen and (min-width: 1200px){
              .swipslider{padding-top:17% !important;}
              #qh button{
                width:12% !important;
              }
              .index_banner{
              width:65%;
              height:160px !important;
              text-align:center;
              margin:0 auto;
           }
              .index_banner img{
              width:96%;
              height:160px !important;
           }
           .div.bulletin-board-container[_ngcontent-way-c6]{
            width:65% !important;
            margin:0 auto;
           }
           .bulletin-board-container{
            width:65% !important;
            margin:0 auto;
           }
           .home-game-board-ctn[_ngcontent-way-c8]{
            width:65% !important;
            margin:0 auto;
           }
           .winning-box{
            width:65%;
           }
           .index_bottom{
            width:65%;
           }
           .game_list a{
            width:15%;
            margin-right:10px;
            margin-left:0;
           }
            }
           .rm a:hover img{
            filter:brightness(70%);
           }
           .game_list a:hover img{
            filter:brightness(70%);
           }
           #tab2_content_pgs a:hover{
            filter:brightness(70%);
           }
           #tab1_content_pps a:hover{
            filter:brightness(70%);
            
           }
          
            </style>
            <div _ngcontent-way-c3="" class="header-view__content-wrapper" style="margin-top:84px;">
              <div _ngcontent-way-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-way-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-banner-board _ngcontent-way-c1="" _nghost-way-c5="" class="ng-tns-c5-0 ng-star-inserted">
                   
                    <div class="index_banner">
                      <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                        @foreach($bnners as $banner)

                          <div class="swiper-slide">
                          @if ($banner['url'] === 'activity_info')
                            <img onclick="location.href='{{ route("mobile.banner.info", ["id" => $banner["id"]]) }}'" src="{{$banner['img']}}" />
                          @elseif (in_array($banner['url'],['download', 'game_out']))
                            <img onclick="location.href='{{$banner["title"]}}'" src="{{$banner['img']}}" />
                          @else
                            <img src="{{$banner['img']}}" />
                          @endif
                          </div>
                        @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>
                    </div>

                    <div class="xh_game">
                        <div class="xh_game_top">
                            <label></label>
                            <span  data-locale="Favorite">juego</span>
                        </div>
                        <div class="xh_game_centen">
                          <div class="swiper mySwiper1">
                            <div class="swiper-wrapper">
                              @foreach($tadaRecommend as $item)
                                <div class="swiper-slide"><a><img gameid="{{ $item['id'] }}" class="tada_game_go" src="{{ $item['icon'] }}" /></a></div>
                              @endforeach 
                            </div>
                          </div>
                        </div>
                    </div>
                    <div style="width:100%; height:10px;"></div> 
                    
                  <script>
                  var windowWidth = $(window).width();
                     if(windowWidth < 640){
                      var swiper = new Swiper(".mySwiper", {
                          slidesPerView: 1,
                          spaceBetween: 30,
                          pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                          },
                          autoplay:true
                        });
                       var swiper1 =new Swiper('.mySwiper1',{
                        slidesPerView:3,
                        autoplay:{
                          delay: 5000,
                        }
                       }) 
                      }
                     if(windowWidth >= 640){
                      var swiper = new Swiper(".mySwiper", {
                          slidesPerView: 3,
                          spaceBetween: 30,
                          pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                          },
                        });
                        var swiper1 =new Swiper('.mySwiper1',{
                        slidesPerView:8,
                        autoplay:{
                          delay: 5000,
                        }
                       }) 
                      }



                  </script>
                  </jx-banner-board>
                  <jx-bulletin-board _ngcontent-way-c1="" _nghost-way-c6="" class="ng-tns-c6-1 ng-star-inserted">
                    <!---->
                    {{--<button _ngcontent-way-c6="" class="bulletin-board-btn" tabindex="0">
                      <!---->
                      <div _ngcontent-way-c6="" class="bulletin-board-container">
                        <div _ngcontent-way-c6="" class="bulletin-icon"></div>
                        <!---->
                        <!--系统通知公告-->
                        <div _ngcontent-way-c6="" class="bulletin-board ng-tns-c6-1 ng-star-inserted">

                          <marquee style="width: 70vw;height: 26px;line-height: 26px;vertical-align: top;display: inline-block;box-sizing: border-box;">
                         
                          </marquee>
                        </div>


                      </div>
                    </button>--}}
                  </jx-bulletin-board>

                  <jx-util-bar _ngcontent-way-c1="" _nghost-way-c7="">
                  <!--触发声音-->
                  <audio id="myTune">
                    <source src="https://www.betbra.net:8032/bx_1/public/audio/btn_click.mp3">
                  </audio>
                  {{--
                  <script>
                    setInterval("myInterval()",5000);
                      function myInterval() {document.getElementById('myTune').play();}
                  </script>--}}
                  <!--触发声音-->
                    <button _ngcontent-way-c7="" jxnewwindowbtn="" style="display: none;"></button>
                    <!----></jx-util-bar>
                  <jx-home-game-board _ngcontent-way-c1="" _nghost-way-c8="">
                    <!---->
                    <div _ngcontent-way-c8="" class="home-game-board-ctn" name="navigations">
                      <div _ngcontent-way-c8="" class="side-menu-ctn" id="qh">
                      <button _ngcontent-way-c8="" id="tab8" onclick="myclick(8)" class="side-menu-item ng-star-inserted active-side-menu" style="width: 30%;">
                          <div class="button1">
                          <span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="Game">jogos</span>
                          </div>
                      </button>
                        <!---->
                        <button _ngcontent-way-c8="" id="tab9" onclick="myclick(9)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div class="button2">
                          <span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="Favorite">Favoritos</span>
                          </div>
                          </button>
                        <!---->
                        <button _ngcontent-way-c8="" id="tab2" onclick="myclick(2)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                            <div class="button3"><span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="PG">>P G</span></div>
                          </button>
                          <!---->
                        <button _ngcontent-way-c8="" id="tab4" onclick="myclick(4)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                            <div class="button4"><span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="Xadrez">Xadrez</span></div>
                          </button> 
                          <!---->
                        <button _ngcontent-way-c8="" id="tab3" onclick="myclick(3)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div class="button5"><span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="Tada">Tada</span></div>
                          </button>
                        <!---->
                        <button _ngcontent-way-c8="" id="tab1" onclick="myclick(1)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div class="button6"> <span _ngcontent-way-c8="" class="side-menu-item__tag" data-locale="PP">P P</span></div>
                         </button>
                       
                             
                     
                      </div>
                      <div _ngcontent-way-c8="" class="game-board-ctn">
                        <!---->
                        {{-- 全部游戏 --}}
                        <div _ngcontent-avh-c16="" class="lottery-board-ctn tab" id="tab8_content" style="display: block">
                          <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab8_content_pps"></div>
                          @include('green2.index.game_recommend')
                        </div>
                        <!---->
                        <div _ngcontent-avh-c16="" class="lottery-board-ctn tab" id="tab9_content" style="display: none">
                          <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab9_content_pps"></div>
                          <div style="width:100%;text-align:center;">
                          {{-- 喜欢的游戏 --}}
                          <div class="game_list">
                              @foreach($favorRecommend as $item)
                                  <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
                              @endforeach
                              </div>
                          </div>
                        </div>

                        {{-- PP 游戏 --}}
                        <div _ngcontent-avh-c16="" class="lottery-board-ctn tab" id="tab1_content" style="display: none">
                          <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab1_content_pps"></div>
                          <div style="width:100%;text-align:center;margin-top:1rem">
                              <button id="pp_load_more" page="0" onclick="loadPpGames()"  style="color:#fff;" data-locale="More">{{--点击加载更多--}}Carregue mais</button>
                          </div>
                        </div>
                      {{-- PG 游戏 --}}
                        <div _ngcontent-avh-c16="" class="live-game-board-ctn tab" id="tab2_content" style="display: none;">
                            <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab2_content_pgs"></div>
                            <div style="width:100%;text-align:center;margin-top:1rem">
                                <button id="pg_load_more" page="0" onclick="loadPgGames()"  style="color:#fff; font-size:14px;" data-locale="More">{{--点击加载更多--}}Carregue mais</button>
                            </div>
                        </div>

                        {{-- JILI 游戏 --}}
                        <div _ngcontent-avh-c16="" class="live-game-board-ctn tab" id="tab3_content" style="display: none;">
                            <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab3_content_jls"></div>
                            <div style="width:100%;text-align:center;margin-top:1rem">
                                <button id="jl_load_more" page="0" onclick="loadJlGames()"  style="color:#fff; font-size:14px;" data-locale="More">{{--点击加载更多--}}Carregue mais</button>
                            </div>
                        </div>
                        {{-- Tada棋牌添加 --}}
                        <div _ngcontent-avh-c16="" class="live-game-board-ctn tab" id="tab4_content" style="display: none;">
                            <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab4_content_jls"></div>
                            <div style="width:100%;text-align:center;margin-top:1rem">
                                <button id="tada_load_more" page="0" onclick="loadTadaGames()"  style="color:#fff; font-size:14px;" data-locale="More">{{--点击加载更多--}}Carregue mais</button>
                            </div>
                        </div>

                      </div>
                    </div>
                  </jx-home-game-board>
                </jx-safe-area>
              </div>
            </div>
            <div class="winning-box">
              <div class="rankBg"></div>
            </div>
            <div class="index_bottom">
                  <img src="/mobile/green2/images/footer_icon_2-18834dfc.png" />
                  <p>Este site oferece jogos com experiencia de risco Para ser um usuario do nosso site,voce deve mais de 18 anos.Nao somos responsaveis.
? 2022 brcrown.com All rights reserved.</p>
            </div>
            <div class="menu_body">
                   <div class="green2_logo">
                      
                   </div> 
                   <div class="green2_gb"></div> 
                   <div class="green2_nav">
                      <ul>
                          <li onclick="location.href='{{url("mobile/index")}}'"><label class="n1"></label><span>Casa</span></li>
                          <li onclick="location.href='{{url("mobile/activity")}}'"><label class="n2"></label><span>Atividades</span></li>
                          <li onclick="location.href='{{url("mobile/share")}}'"><label class="n3"></label><span>Partilhar</span></li>
                          <li onclick="location.href='{{url("mobile/shop")}}'"><label class="n4"></label><span>preferenciais</span></li>
                          <li onclick="location.href='{{url("mobile/member/index")}}'"><label class="n5"></label><span>Meu</span></li>
                      </ul>
                   </div>
            </div>
            
            <div class="pc_tab">
                   <div class="pc_nav">
                      <ul>
                      <li onclick="location.href='{{url("mobile/index")}}'"><label class="n1"></label><span data-locale="Home">Casa</span></li>
                          <li onclick="location.href='{{url("mobile/activity")}}'"><label class="n2"></label><span data-locale="Events">Atividades</span></li>
                          <li onclick="location.href='{{url("mobile/share")}}'"><label class="n3"></label><span data-locale="Share" >Partilhar</span></li>
                          <li onclick="location.href='{{url("mobile/shop")}}'"><label class="n4"></label><span data-locale="Favorable">preferenciais</span></li>
                          <li onclick="location.href='{{url("mobile/member/vip")}}'" ><label class="n6"></label><span data-locale="VIP">VIP Grau</span></li>
                          <li onclick="location.href='{{url("mobile/member/email")}}'" ><label class="n7"></label><span data-locale="Email">Email</span></li>
                          <li onclick="location.href='{{url("mobile/member/customerService")}}'" ><label class="n8"></label><span data-locale="Service">Atendimento</span></li>
                          <li onclick="location.href='{{url("mobile/member/index")}}'"><label class="n5"></label><span data-locale="Mine">Meu</span></li>
                      </ul>
                   </div>
            </div>
            
            {{--loading组件--}}
            @include('green2.common.loading')
            @include('green2.index.index_login')
            @include('green2.index.notice')
            <style>
              .other-live-ctn a{width:30%; margin-top:15px;object-fit:cover;transition:0.1s;transform:scale(1);}
              .other-live-ctn a:active img{transform:scale(0.9);}
            </style>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                <div _ngcontent-way-c10="" class="tab-bar safe-area-fix-bottom safe-area-fix-left safe-area-fix-right" jxsafeareafixbottom="" jxsafeareafixleft="" jxsafeareafixright="">
                <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShareController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/share")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--cs"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title"  data-locale="Share">{{--分享--}}Convidar</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ActivityController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/activity")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--activity"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title"data-locale="Events"> >{{--活动--}}Atividades</span>
    </button>



    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-left @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\IndexController')  tab-bar__nav-btn--active @endif" jxsafeareafixleft="" routerlink="/home" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--home"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Home">{{--首页--}}Cassino</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\ShopController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/shop")}}'">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--brand"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title"  data-locale="Promotional" >{{--优惠活动--}}preferenciais</span>
    </button>

    <button _ngcontent-way-c10="" class="tab-bar__nav-btn safe-area-fix-bottom safe-area-fix-right @if(getCurrentControllerName() == 'App\Http\Controllers\Mobile\MemberController')  tab-bar__nav-btn--active @endif" onclick="location.href='{{url("mobile/member/index")}}'" routerlinkactive="tab-bar__nav-btn--active" tabindex="0">
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__icon tab-bar__nav-btn__icon--my"></span>
        <span _ngcontent-way-c10="" class="tab-bar__nav-btn__title" data-locale="Mine">{{--我的--}}Meu</span>
    </button>
</div>



                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-home-page>
      </jx-main-wrapper>
    </jx-root>
    <style>

    </style>
    <script type="text/javascript">
    var myclick = function(v) {
        $('#tab' +v).addClass("side-menu-item ng-star-inserted active-side-menu").siblings().removeClass("active-side-menu");
        

        var divs = document.getElementsByClassName("tab");
        for (var i = 0; i < divs.length; i++) {
          var divv = divs[i];
          if (divv == document.getElementById("tab" + v + "_content")) {
            divv.style.display = "block";
          } else {
            divv.style.display = "none";
          }
        }
      }

      function loadPgGames() {
          let page = $('#pg_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/getPgs')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#pg_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                  let itemGame = '<a><img _ngcontent-avh-c16="" gameid="'+element.id+'" class=" generic-background-image pg_game_go ng-star-inserted" src="'+element.icon+'" /></a>'
                  $('#tab2_content_pgs').append(itemGame)
                })
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading()
              }
          })
        }

      function loadPpGames() {
          let page = $('#pp_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/getPps')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#pp_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                  let itemGame = '<a><img _ngcontent-avh-c16="" gameid="'+element.id+'" class=" generic-background-image pg_game_go ng-star-inserted" src="'+element.icon+'" /></a>'
                  $('#tab1_content_pps').append(itemGame)
                })
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading()
              }
          })
        }

        function loadJlGames() {
          let page = $('#jl_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/getJls')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#jl_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                  let itemGame = '<a><img _ngcontent-avh-c16="" gameid="'+element.id+'" class=" generic-background-image pg_game_go ng-star-inserted" src="'+element.icon+'" /></a>'
                  $('#tab3_content_jls').append(itemGame)
                })
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading()
              }
          })
        }

        function loadTadaGames(){
          let page = $('#tada_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/getTadas')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#tada_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                  let itemGame = '<a><img _ngcontent-avh-c16="" gameid="'+element.id+'" class=" generic-background-image tada_game_go ng-star-inserted" src="'+element.icon+'" /></a>'
                  $('#tab4_content_jls').append(itemGame)
                })
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading()
              }
          })
        }

      $(document).ready(function() {
        $('#qh .side-menu-item').click(function() {
          $(this).siblings().removeClass('active-side-menu');
          $(this).addClass('active-side-menu');
        })

        $('.sx').click(function(){
            location.reload(true)
        })

        loadPgGames()
        loadPpGames()
        loadJlGames()
        loadTadaGames()

        $(document).on('click', '.pg_game_go', function() {
          showLoading();

          let gameId = $(this).attr('gameid')
          $.ajax({
              url : "{{url('mobile/pgUrl')}}",
              type : 'GET',
              data : {id: parseInt(gameId)},
              success : function (data) {
                if(data.code == 200) {
				          window.location.href= "{{ route('mobile.display', ['act' => 'game_url']) }}" +'&game_code=' +data.data.code
                } else {
                    if(data.code == '400005') {
                      showModal('Por favor faça login primeiro');
                      $('.tc').show();
                    } else {
                      showModal(data.message);
                    }
                }

                setTimeout(function(){
                  hideLoading();
                }, 2000)
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading();
                if(jqXHR.responseJSON.code == 400005) {
                      showModal('Por favor faça login primeiro');
                      $('.tc').show();
                  } else {
                    showModal(jqXHR.responseJSON.message);
                  }

              }
          })
        });

        $(document).on('click', '.tada_game_go', function() {
          showLoading();

          let gameId = $(this).attr('gameid')
          $.ajax({
              url : "{{url('mobile/tadaUrl')}}",
              type : 'GET',
              data : {id: parseInt(gameId)},
              success : function (data) {
                if(data.code == 200) {
				          window.location.href= "{{ route('mobile.display', ['act' => 'tada_game_url']) }}" +'&game_code=' +data.data.code
                } else {
                    if(data.code == '400005') {
                      showModal('Por favor faça login primeiro');
                      $('.tc').show();
                    } else {
                      showModal(data.message);
                    }
                }

             setTimeout(function(){
                  hideLoading();
                },2000)
              },
              error: function(jqXHR, textStatus, errorThrown) {
                hideLoading();
                if(jqXHR.responseJSON.code == 400005) {
                      showModal('Por favor faça login primeiro');
                      $('.tc').show();
                  } else {
                    showModal(jqXHR.responseJSON.message);
                  }

              }
          })
        });

      });
    </script>
    <script type="text/javascript" src="https://www.betbra.net:8032/bx_1/public/static/js/scroll.js"></script>
    <script>
    function myFunction() {
        $('.menu_body').animate({left:"0"},300)
    }
    $(function(){
      $('.green2_gb').click(function(){
        $('.menu_body').animate({left:"-100%"},300)
      })
      $('.green2_nav li').click(function(){
        $(this).addClass('green2_on').siblings().removeClass('green2_on')
      })
      $('.pc_nav li').hover(function(){
        $(this).addClass('pc_on').siblings().removeClass('pc_on')
      })
      $('.pc_nav li').mouseout(function(){
        $(this).removeClass('pc_on')
      })
    })

    function loadProperties(lang) {
            $.i18n.properties({
                name: 'strings',  //资源文件名称 ， 命名格式： 文件名_国家代号.properties
                path: '../mobile/green2/lang/',    //资源文件路径，注意这里路径是你属性文件的所在文件夹,可以自定义。
                mode: 'map',     //用 Map 的方式使用资源文件中的值
                language: lang,  //这就是国家代号 name+language刚好组成属性文件名：strings+zh -> strings_zh.properties
                callback: function () {
                    $("[data-locale]").each(function () {
                        $(this).html($.i18n.prop($(this).data("locale")));

                    });
                }
            });
        }
        loadProperties('en');
    </script>
  </body>

</html>
