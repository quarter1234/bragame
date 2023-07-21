<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>{{--游戏大厅--}}Salão de jogos</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
     <!-- 分离好的样式开始 -->
    <link rel="stylesheet" href="/mobile/css/index_style.css">
    <link rel="stylesheet" href="/mobile/css/swipeslider.css">
     <!-- 分离好的样式结束 -->
    <!-- Used in supported Android browsers -->
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script src="/static/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>
    <script type="text/javascript" src="/mobile/js/index.js"></script>

    <meta name="theme-color" content="#0C192C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	</head>
  
  <body style="color: white; background-color: #0c192c;width: 100%;overflow-x: hidden;">
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
          @include('mobile.common.modal') 
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
                            <span>R$</span>
                            <span>{{ $user['coin'] }}</span>
                            <div class="sx"><img src="../../mobile/img/sx.png"></div>
                            <div class="qb"><img onclick="location.href='{{ route("mobile.display", ["act" => "pay"]) }}'" src="../../mobile/img/qb.png"></div>
                        </div>
                    </span>
                  @else 
                    <div class="dl show_login">Login</div>
                    <div class="zc show_login">Registo</div>
                  @endif
                </div>

              </jx-header-row>
            </div>
            <div _ngcontent-way-c3="" class="header-view__content-wrapper" style=" padding-top: 64px;">
              <div _ngcontent-way-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-way-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-banner-board _ngcontent-way-c1="" _nghost-way-c5="" class="ng-tns-c5-0 ng-star-inserted">

                    <div id="responsiveness" class="swipslider">
                      <ul class="sw-slides">
                      @foreach($bnners as $banner)
                        <li class="sw-slide">
                          @if ($banner['url'] === 'activity_info')
                            <img onclick="location.href='{{ route("mobile.banner.info", ["id" => $banner["id"]]) }}'" src="{{$banner['img']}}" />
                          @elseif (in_array($banner['url'],['download', 'game_out']))
                            <img onclick="location.href='{{$banner["title"]}}'" src="{{$banner['img']}}">
                          @else
                            <img src="{{$banner['img']}}">
                          @endif
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  <script>
                  $('#responsiveness').swipeslider();
                  </script>    
                  </jx-banner-board>
                  <jx-bulletin-board _ngcontent-way-c1="" _nghost-way-c6="" class="ng-tns-c6-1 ng-star-inserted">
                    <!---->
                    <button _ngcontent-way-c6="" class="bulletin-board-btn" tabindex="0">
                      <!---->
                      <div _ngcontent-way-c6="" class="bulletin-board-container">
                        <div _ngcontent-way-c6="" class="bulletin-icon"></div>
                        <!---->
                        <!--系统通知公告-->
                        <div _ngcontent-way-c6="" class="bulletin-board ng-tns-c6-1 ng-star-inserted">
                          
                          <marquee style="width: 70vw;height: 26px;line-height: 26px;vertical-align: top;display: inline-block;box-sizing: border-box;">{{--系统公告1--}}Anúncio do sistema</marquee></div>
                          
                          
                      </div>
                    </button>
                  </jx-bulletin-board>

                  <jx-util-bar _ngcontent-way-c1="" _nghost-way-c7="">
                  <!--触发声音-->
                  <audio id="myTune"> 
                    <source src="https://d186gute5mq2g4.cloudfront.net/audio/btn_click.mp3"> 
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
                    <div _ngcontent-way-c8="" class="home-game-board-ctn">
                      <div _ngcontent-way-c8="" class="side-menu-ctn" id="qh">
                      <button _ngcontent-way-c8="" id="tab1" onclick="myclick(8)" class="side-menu-item ng-star-inserted active-side-menu" style="width: 30%;">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-qb qb_ico"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag" style="text-transform: uppercase">jogos</span></button>
                        <!---->
                        <button _ngcontent-way-c8="" id="tab1" onclick="myclick(9)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon xh_ico"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">Gostas</span></button>
                        <!----> 
                        <button _ngcontent-way-c8="" id="tab2" onclick="myclick(2)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon game_pg active-side-menu-icon"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">P G</span></button> 
                        <!---->
                        <button _ngcontent-way-c8="" id="tab1" onclick="myclick(1)" class="side-menu-item ng-star-inserted" style="width: 30%;">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon game_pp "></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">P P</span></button>
                        <!---->
                        
                      
                        {{--<button _ngcontent-way-c8="" id="tab3" onclick="myclick(3)" class="side-menu-item ng-star-inserted">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-slot"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">电子Eletrônica</span></button>--}}
                    
                        {{--<button _ngcontent-way-c8="" id="tab4" onclick="myclick(4)" class="side-menu-item ng-star-inserted">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-sport"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">体育Esportes</span></button>--}}
              
                        {{--<button _ngcontent-way-c8="" id="tab5" onclick="myclick(5)" class="side-menu-item ng-star-inserted">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-fishing"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">捕鱼Pesca</span></button>--}}
             
                        {{--<button _ngcontent-way-c8="" id="tab6" onclick="myclick(6)" class="side-menu-item ng-star-inserted">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-boardgame"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">棋牌Xadrez</span></button>--}}
     
                        {{--<button _ngcontent-way-c8="" id="tab7" onclick="myclick(7)" class="side-menu-item ng-star-inserted">
                          <div _ngcontent-way-c8="" class="side-menu-item__icon side-menu-icon-esport"></div>
                          <span _ngcontent-way-c8="" class="side-menu-item__tag">电竞Concorrência elétrica</span></button>--}}
                      </div>
                      <div _ngcontent-way-c8="" class="game-board-ctn">
                        <!---->
                        {{-- 全部游戏 --}}
                        <div _ngcontent-avh-c16="" class="lottery-board-ctn tab" id="tab8_content" style="display: block">
                          <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab8_content_pps"></div>
                          @include('mobile.index.game_recommend')
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
                              <button id="pp_load_more" page="0" onclick="loadPpGames()"  style="color:#fff;">{{--点击加载更多--}}Carregue mais</button>
                          </div>
                        </div>
                      {{-- PG 游戏 --}}
                        <div _ngcontent-avh-c16="" class="live-game-board-ctn tab" id="tab2_content" style="display: none;">
                            <div _ngcontent-avh-c16="" class="other-live-ctn" id="tab2_content_pgs"></div>
                          <div style="width:100%;text-align:center;margin-top:1rem">
                              <button id="pg_load_more" page="0" onclick="loadPgGames()"  style="color:#fff; font-size:14px;">{{--点击加载更多--}}Carregue mais</button>
                          </div>
                        </div>

                        {{--<div class="tab" id="tab3_content" style="display: none;">

                            <div _ngcontent-avh-c17="" class="slot-btns-ctn ng-star-inserted">
                              <button _ngcontent-avh-c17="" class="jx-slot generic-background-image" tabindex="0" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'bbin','game_type'=>2))}'"></button>
                            </div>

                            <div _ngcontent-avh-c17="" class="game-btn-holder ng-star-inserted">
                              <!---->
                              <!---->
                              <button _ngcontent-avh-c17="" class="game-btn generic-background-image game-999010 ng-star-inserted" tabindex="0" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'pt','game_type'=>2))}'"></button>
                              <!---->
                              <button _ngcontent-avh-c17="" class="game-btn generic-background-image game-999011 ng-star-inserted" tabindex="0"onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'pp','game_type'=>2))}'"></button>
							  <button _ngcontent-avh-c17="" class="game-btn generic-background-image game-jdb ng-star-inserted" tabindex="0"onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'jdb','game_type'=>2))}'"></button>
							  <button _ngcontent-avh-c17="" class="game-btn generic-background-image game-sg ng-star-inserted" tabindex="0"onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'sg','game_type'=>2))}'"></button>
                            </div>
                        </div>--}}
						 {{--<div _ngcontent-avh-c18="" class="other-btns-ctn tab" id="tab4_content" style="display: none;">

						      <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-888001 ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'ibc','game_type'=>4))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-agti ng-star-inserted" style="padding-bottom: calc(((100% / 2 - 5px) * 108 / 152));width: calc(50% - 5px);border-radius: 10px;margin-bottom: 10px;" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'ag','game_type'=>4))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-bbti ng-star-inserted" style="padding-bottom: calc(((100% / 2 - 5px) * 108 / 152));width: calc(50% - 5px);border-radius: 10px;margin-bottom: 10px;margin-left:5px" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'newbb','game_type'=>4))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-gj ng-star-inserted" style="padding-bottom: calc(((100% / 2 - 5px) * 108 / 152));width: calc(50% - 5px);border-radius: 10px;margin-bottom: 10px;" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'gj','game_type'=>4))}'"></button>
						</div>--}}
            {{--	<div _ngcontent-avh-c19="" class="fishing-game-board-ctn tab" id="tab5_content" style="display: none;">

						      <button _ngcontent-avh-c19="" class="fishing generic-background-image fishing-game-999013 ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'ag','game_type'=>6))}'"></button>
							  <button _ngcontent-avh-c19="" class="fishing generic-background-image fishing-game-999006 ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'bbin','game_type'=>6))}'"></button>
							  <button _ngcontent-avh-c19="" class="fishing generic-background-image fishing-game-bgby ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'bg','game_type'=>6))}'"></button>
						</div>--}}
						{{--<div _ngcontent-avh-c18="" class="other-btns-ctn tab" id="tab6_content" style="display: none;">
						      <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-ky ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'ky','game_type'=>7))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-mt ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'mt','game_type'=>7))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-rmg ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'rmg','game_type'=>7))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-nw ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'nw','game_type'=>7))}'"></button>
						</div>--}}
						{{--<div _ngcontent-avh-c18="" class="other-btns-ctn tab" id="tab7_content" style="display: none;">
						      <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-999008 ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'avia','game_type'=>5))}'"></button>
						      <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-999009 ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'newbb','game_type'=>5))}'"></button>
							  <button _ngcontent-avh-c18="" class="game-btn generic-background-image game-esb ng-star-inserted" onclick="location.href='{:U('Zhenren/login',array('plat_type'=>'esb','game_type'=>5))}'"></button>
						</div>--}}

                      </div>
                    </div>
                  </jx-home-game-board>
                </jx-safe-area>
              </div>
            </div>
            <div class="winning-box">
              <div class="news-title clearfix">
                <img src="/static/images/rank.png" style="margin: 10px;width: 16px;vertical-align:middle;">
                <h2 class="news-tit pull-left" style="display: inline-block;font-size: 14px;vertical-align: middle;">
                  <strong style="color: #a9bed8;">{{--最新中奖榜--}}A última lista vencedora</strong>
                </h2>
              </div>
              <div class="rankBg"></div>
              <div class="news-content myScroll" style="height: 200px; padding: 0px 10px;">
                <ul class="news-scroll" style="padding-left: 0px;">
                <li style="color: #a9bed8;">
                    <span>Json**a</span>
                      <em>
                        <em style="color: #999;">R$9000.00</em></em>
                  </li>

                  <li style="color: #a9bed8;">
                  <span>8****32</span>
                      <em>
                        <em style="color: #999;">R$4560.00</em></em>
                  </li>
                  <li style="color: #a9bed8;">
                  <span>a****5</span>
                      <em>
                        <em style="color: #999;">R$645.00</em></em>
                  </li>
                  <li style="color: #a9bed8;">
                    <span>1**34</span>
                      <em>
                        <em style="color: #999;">R$7647.00</em></em>
                  </li>
                  <li style="color: #a9bed8;">
                  <span>2**4</span>
                      <em>
                        <em style="color: #999;">R$7647.00</em></em>
                  </li>
                </ul>
              </div>
            </div>
            <div class="index_bottom">
                  <img src="../../mobile/img/index_b.png" />
                  <p>Este site oferece jogos e experiências de aventura.  Para se tornar um usuário do nosso site, você deve ter 18 anos de idade ou mais.  Não somos responsáveis por violações das leis locais de jogos de azar online.  Espero que joguem com responsabilidade e se divirtam em nossa pl</p>
            </div>
            {{--loading组件--}}
            @include('mobile.common.loading')
            @include('mobile.index.index_login') 
            @include('mobile.common.slide') 
            <style>
              .other-live-ctn a{width:30%; margin-top:15px;object-fit:cover;transition:0.1s;transform:scale(1);}
              .other-live-ctn a:active img{transform:scale(0.9);}
            </style>
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                @include('mobile.common.footer') 
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
        var llis = document.getElementsByTagName("button");
        for (var i = 0; i < llis.length; i++) {
          var lli = llis[i];
          if (lli == document.getElementById("tab" + v)) {
            lli.style.backgroundColor = "side-menu-item ng-star-inserted active-side-menu";
          } else {
            lli.style.backgroundColor = "side-menu-item ng-star-inserted";
          }
        }
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

      });
    </script>
    <script type="text/javascript" src="/static/js/scroll.js"></script> 
    <script>
    $(function() {
        $('.myScroll').myScroll({
          speed: 40,
          //数值越大，速度越慢
          rowHeight:40 //li的高度
        });

        $('.notice-tab li.tab_g').hover(function() {
          //获取当前的索引
          //去掉全部的on class
          $('.notice-tab li').removeClass('on');
          $(this).addClass('on');
          var index = $('.notice-tab li').index(this);
          $('.notice-main .draw-contents').hide();
          $('.notice-main').find('.draw-contents').eq(index).show();
        });
      });
    </script>

    
  </body>

</html>