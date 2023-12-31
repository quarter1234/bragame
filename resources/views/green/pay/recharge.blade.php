<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/green/css/activity.css">
    <link rel="stylesheet" href="/mobile/green/css/share.css">
    <!-- Used in supported Android browsers -->
 
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>
    <meta name="theme-color" content="#04431f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    </head>

  <body style="color: white; background-color: #04431f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-snw-c0="">
        <router-outlet _ngcontent-snw-c0=""></router-outlet>
        <jx-activity-page _nghost-snw-c1="" class="ng-star-inserted">
        @include('green.common.top_sub')
          <jx-app-background _ngcontent-snw-c1="" _nghost-snw-c2="">
            <div _ngcontent-snw-c2="" class="app-background"></div>
          </jx-app-background>
          <jx-header-view _ngcontent-snw-c1="" title="" _nghost-snw-c3="">
            <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
              <jx-header-row _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container" _nghost-snw-c9="">
                <div _ngcontent-snw-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                    <div class="recharge_top">
                        <span>Current account balance</span>
                        <label>R${{ $user['totalcoin'] }}</label>
                    </div>
                </div>
                <div class="recharge_div">
                        <div class="recharge_div_t">Terms of payment</div>
                      <div class="recharge_wk">
                        @foreach($channels as $channel)
                          <div class="recharge_k1 re_on">
                              <div class="recharge_k_n">
                                  <div class="recharge_k_w">
                                  {{ $channel['title'] }}
                                  </div>
                              </div>
                          </div>

                          </div>    


                        <div class="recharge_div_t">Top-up amount</div>

                        {{--tab 1--}}
                        <div class="re_show" style="display:block;">
                          <div class="recharge_kn">
                          @foreach($channel['pages'] as $key => $page)
                              <div class="recharge_k  @if($key == 0) recharge_on @endif" itemId="{{ $page['id'] }}" payCoin = "{{ $page['pay_view_coin'] }}" rate="{{ $page['discoin'] }}">
                                  <div class="recharge_k_n">
                                      <div class="recharge_k_w">
                                      R$ {{ $page['pay_view_coin'] }}
                                      </div>
                                      <div class="recharge_bz">
                                        {{ $page['disrate'] }}
                                      </div>
                                  </div>
                              </div>
                            @endforeach  
                          </div>
                        </div>

                        {{--最外层Foreach--}}
                        @endforeach  

                        <form method="get" onSubmit="return check_submit(this)" action="{{url('mobile/display')}}" >
                          @csrf
                        <div class="recharge_input">
                           <span>R$</span>
                           <input type="text" name="amount" readonly="readonly" id="recharge_value" value="{{ $channels[0]['pages'][0]['pay_view_coin'] ?? 0}}"/>
                           <label>Extra+R$<span name="rate" id="recharge_rate">{{$channels[0]['pages'][0]['discoin'] ?? 0}}</span></label>
                           <input type="hidden" name="id" id="recharge_id" value="{{$channels[0]['pages'][0]['id'] ?? 0}}" />
                           <input type="hidden" name="act" value="post_pay" />
                        </div>

                        <div class="recharge_bottom">
                            <span>Deposit time:</span>

                            <span>{{date('Y/m/d H:i:s')}}</span>
                        </div>

                        {{--<div class="recharge_bottom">
                            <span>Maximum recharge:</span>
                            <span>permissive3000000</span>
                        </div>--}}
                        
                        <button id="recharge_submit" class="recharge_button">Recharge immediately</button>
                        </form>
                    </div>
              </jx-header-row>
            </div>

            @include('mobile.common.modal') 

            <div _ngcontent-snw-c3="" class="header-view__content-wrapper" style="padding-bottom: 50px; padding-top: 64px;">
              <div _ngcontent-snw-c3="" class="header-view__content-wrapper__content-container">
                <jx-safe-area _ngcontent-snw-c1="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                  <jx-content-view _ngcontent-snw-c1="" _nghost-snw-c6="">
                
                   </jx-content-view>
                </jx-safe-area>
              </div>
            </div>

            
            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
          </jx-header-view>
        </jx-activity-page>
      </jx-main-wrapper>
    </jx-root>
   <script>
   function check_submit() {
    let payCoin = $('#recharge_value').val()
    let id = $("#recharge_id").val()
    if(payCoin <= 0) {
      showModal('A escolha de moedas deve ser maior que zero.');
      return false;
    }

    if(id <= 0) {
      showModal('Por favor, selecione o valor de recarga.');
      return false;
    }

    return true;
   }
   $(function(){
      $('.recharge_kn .recharge_k').click(function(){
        let payCoin = $(this).attr('payCoin');
        let rate = $(this).attr('rate');
        let id = $(this).attr('itemId');
        $('#recharge_value').val(payCoin)
        $('#recharge_rate').text(rate)
        $("#recharge_id").val(id)
        $(this).addClass('recharge_on').siblings().removeClass('recharge_on')
      })

      $('.recharge_k1').click(function(){
        $(this).addClass('re_on').siblings().removeClass('re_on')
        let index =$(this).index()
        $('.re_show').hide().eq(index).show()
      })
    })
   </script>
  </body>

</html>
