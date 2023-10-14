<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="UTF-8">
    @include('green2.common.common_title') 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <link rel="icon" type="image/x-icon" href="/static/img/favicon.ico">
    <link rel="stylesheet" href="/static/css/material-icons.css">
	<link rel="stylesheet" href="/mobile/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/static/css/styles.41928e9497559161f9b8.css">
	<link rel="stylesheet" href="/static/css/artDialog.css">
	<script type="text/javascript" src="/static/js/way.min.js"></script>
<style>jx-safe-area[_ngcontent-uwv-c1] {margin:auto 15px}
button.bulletin-read-all-btn[_ngcontent-uwv-c1] {display:block;margin-left:auto;margin-right:15px;padding:0;color:#fff;font-size:17px;font-weight:500;line-height:34px;border-radius:0}
button.bulletin-read-all-btn.allRead[_ngcontent-uwv-c1] {opacity:.6}
.bulletin-list-wrapper[_ngcontent-uwv-c1] {padding-left:0;padding-right:0}
button.bulletin-btn[_ngcontent-uwv-c1] {box-sizing:border-box;display:block;margin:14px auto;padding:0;min-height:80px;width:100%;text-align:start;border-radius:0;background-color:#142135}
button.bulletin-btn[_ngcontent-uwv-c1]:active {webkit-filter:none;filter:none;background-color:#132235}
.bulletin-btn-content-safe-area[_ngcontent-uwv-c1] {display:block}
button.bulletin-btn[_ngcontent-uwv-c1]   .bulletin-unread-spot[_ngcontent-uwv-c1] {width:8px;height:8px;background:url(announ_unread_icon.93426d56caa3672e53e4.svg);position:absolute;right:10px;top:10px}
button.bulletin-btn.read[_ngcontent-uwv-c1]   .bulletin-unread-spot[_ngcontent-uwv-c1] {width:8px;height:8px;background:url(announ_unread_icon.93426d56caa3672e53e4.svg);position:absolute;right:10px;top:10px;display:none}
.bulletin-btn-content-wrapper[_ngcontent-uwv-c1] {box-sizing:border-box;display:block;padding:18px 15px}
.bulletin-btn-content-wrapper[_ngcontent-uwv-c1] > .bulletin-title[_ngcontent-uwv-c1] {display:block;color:#fff;font-size:18px;font-weight:500;line-height:25px}
.bulletin-btn-content-wrapper[_ngcontent-uwv-c1] > .bulletin-time[_ngcontent-uwv-c1] {display:block;margin-top:9px;color:#999;font-size:11px;font-weight:500;line-height:16px}
button.bulletin-btn.read[_ngcontent-uwv-c1]   .bulletin-title[_ngcontent-uwv-c1] {color:rgba(255,255,255,.6)}
button.bulletin-btn.read[_ngcontent-uwv-c1]   .bulletin-time[_ngcontent-uwv-c1] {color:rgba(153,153,153,.6)}
jx-content-view.no-more-record[_ngcontent-uwv-c1] {text-align:center}
</style><style>.header-view__nav-row-wrapper[_ngcontent-uwv-c2] {position:fixed;top:0;left:0;right:0;z-index:999;background-color:rgba(12,25,44,1)}
@supports ((webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__nav-row-wrapper[_ngcontent-uwv-c2] {background-color:rgba(12,25,44,.8);webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)}
}
.header-view__nav-row-wrapper--gradient[_ngcontent-uwv-c2] {background-color:transparent;background-image:linear-gradient(to bottom,#0c192c,rgba(12,25,44,0))}
.header-view__nav-row-wrapper--gradient-green2[_ngcontent-uwv-c2] {background-color:transparent;background-image:linear-gradient(to bottom,rgba(0,0,0,1),rgba(12,25,44,0))}
@supports ((webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__nav-row-wrapper--gradient[_ngcontent-uwv-c2],.header-view__nav-row-wrapper--gradient-green2[_ngcontent-uwv-c2] {webkit-backdrop-filter:none;backdrop-filter:none}
}
</style><style>.header-view__footer-row-wrapper[_ngcontent-uwv-c2] {position:fixed;bottom:0;left:0;right:0;z-index:999;background-color:rgba(19,34,53,1)}
@supports ((webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__footer-row-wrapper[_ngcontent-uwv-c2] {background-color:rgba(19,34,53,.8);webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)}
}
.header-view__footer-row-wrapper[_ngcontent-uwv-c2]:empty {display:none}
.header-view__footer-row-wrapper--gradient[_ngcontent-uwv-c2] {background-color:transparent;background-image:linear-gradient(to top,#0c192c,rgba(19,34,53,0))}
.header-view__footer-row-wrapper--gradient-green2[_ngcontent-uwv-c2] {background-color:transparent;background-image:linear-gradient(to top,rgba(0,0,0,1),rgba(19,34,53,0))}
@supports ((webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__footer-row-wrapper--gradient[_ngcontent-uwv-c2],.header-view__footer-row-wrapper--gradient-green2[_ngcontent-uwv-c2] {webkit-backdrop-filter:none;backdrop-filter:none}
}
</style><style>.header-view__nav-row-wrapper__container__nav-row[_ngcontent-uwv-c2] {min-height:64px;color:#fff;font-size:30px;font-weight:500;line-height:34px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:flex-start}
.header-view__nav-row-wrapper__container__nav-row__prefix[_ngcontent-uwv-c2] {flex:0 0 auto;box-sizing:border-box;padding:0;width:44px;height:64px;color:#fff;border-radius:0;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.header-view__nav-row-wrapper__container__nav-row__prefix__icon[_ngcontent-uwv-c2] {width:1em;height:1em;font-size:44px}
.header-icons-ctn[_ngcontent-uwv-c2] {height:34px;width:100%;margin:15px;display:flex;flex-flow:row nowrap}
.header-icon[_ngcontent-uwv-c2] {background-repeat:no-repeat;background-size:cover;background-position:center}
.header-jx-icon[_ngcontent-uwv-c2] {background-image:url(jx-logo.443c8ffbee580d3672f7.png);height:100%;width:91px;margin-right:10px}
.header-vertical-line[_ngcontent-uwv-c2] {border:1px solid #3f4f66}
.header-laliga-icon[_ngcontent-uwv-c2] {background-image:url(laliga-logo.01f82bb57660e2ece9d1.png);height:100%;width:128px;margin-left:10px}
.header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-uwv-c2] {flex:0 1 auto;padding:15px 0}
.header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-uwv-c2]:first-child {padding-left:15px}
.header-view__nav-row-wrapper__container__nav-row__content[_ngcontent-uwv-c2] {flex:1 1 auto;min-height:inherit;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
.header-view__nav-row-wrapper__container__nav-row__suffix[_ngcontent-uwv-c2],.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-uwv-c2] {flex:0 0 auto;margin:15px;padding:0;font-size:34px;border-radius:50%;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-uwv-c2] {display:flex;flex-direction:row}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-uwv-c2]   jx-avatar[_ngcontent-uwv-c2] {width:20px}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-uwv-c2]   span[_ngcontent-uwv-c2] {font-size:14px;margin:0 0 0 10px}
.header-view__content-wrapper[_ngcontent-uwv-c2] {box-sizing:border-box}
.header-view__content-wrapper--full-screen[_ngcontent-uwv-c2] {position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%}
.header-view__content-wrapper__content-container[_ngcontent-uwv-c2] {box-sizing:border-box}
.header-view__content-wrapper__content-container--full-screen[_ngcontent-uwv-c2] {position:relative;width:100%;height:100%}
.msg-centre-btn[_ngcontent-uwv-c2] {margin:25px 15px 15px;border-radius:1px}
div.message-centre[_ngcontent-uwv-c2] {width:24px;height:16px;background-image:url(letter.a6d96d31aad6d4b972f8.png);background-repeat:no-repeat;background-position:center;background-size:cover}
div.message-centre.unread[_ngcontent-uwv-c2] {background-image:url(unread-letter.2071a72b2e3b5bc9b34c.png)}
button.create-agent-link-btn[_ngcontent-uwv-c2] > div[_ngcontent-uwv-c2] {width:28px;height:28px;background-image:url(create-agentlink.1b7d4b7a8cd476e6b31b.svg);background-repeat:no-repeat;background-size:contain}
</style><style>[_nghost-uwv-c3] {flex:1 1 auto;box-sizing:border-box;position:relative;padding:15px 0;display:flex;flex-flow:row wrap;justify-content:flex-start;align-items:center}
</style><style>.message-tab-btn-group[_ngcontent-uwv-c5] {display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
.message-tab-btn-group__tab-btn[_ngcontent-uwv-c5] {flex:1 1 0;display:block;box-sizing:border-box;border-radius:0}
.message-tab-btn-group__tab-btn__content-wrapper[_ngcontent-uwv-c5] {box-sizing:border-box;padding:5px;height:100%;min-height:49px;font-size:16px;font-weight:500;line-height:22px;text-align:center;color:#5d636e;display:flex;flex-flow:row nowrap;justify-content:center;align-items:center;width:75%;margin:0 auto}
.message-tab-btn-group__tab-btn__content-wrapper--active[_ngcontent-uwv-c5] {color:#fff;border-bottom:2px solid #14a4be}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-uwv-c5] {flex:0 0 auto;display:block;margin-right:10px;width:30px;height:30px;background-size:contain;background-repeat:no-repeat;background-position:center center;position:relative}
.message-tab-btn-group__tab-btn__content-wrapper__icon--announcement[_ngcontent-uwv-c5] {background-image:url(message-center-tab-bar-notice_icon.ce1d06cb69405ac3c3e3.svg)}
.message-tab-btn-group__tab-btn__content-wrapper__icon--chatroom[_ngcontent-uwv-c5] {background-image:url(message-center-tab-bar-message_icon.442135c6e41a14c2f1ef.svg)}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-uwv-c5] > div.unread[_ngcontent-uwv-c5] {position:absolute;top:-8px;left:20px;font-size:12px;color:#fff;background-color:red;border-radius:8px;width:auto;min-width:16px;height:16px;line-height:16px;font-weight:inherit}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-uwv-c5] > div.unread.twoDigit[_ngcontent-uwv-c5] {padding:0 2px}
</style><style>@supports (padding-top:constant(safe-area-inset-top)) or (padding-top:env(safe-area-inset-top)) {.safe-area-top {padding-top:env(safe-area-inset-top)}
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
</style><style>[_nghost-uwv-c7] {box-sizing:border-box;display:block;padding:15px}
</style><style>[_nghost-uwv-c8] {box-sizing:border-box;position:absolute;top:0;left:0;bottom:0;right:0;width:100%;height:100%;border-radius:inherit;background-color:transparent;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.backdrop[_nghost-uwv-c8] {background-color:rgba(0,0,0,.5)}
</style><style>.mat-progress-spinner {display:block;position:relative}
.mat-progress-spinner svg {position:absolute;transform:rotate(-90deg);top:0;left:0;transform-origin:center;overflow:visible}
.mat-progress-spinner circle {fill:transparent;transform-origin:center;transition:stroke-dashoffset 225ms linear}
._mat-animation-noopable.mat-progress-spinner circle {transition:none;animation:none}
.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] {animation:mat-progress-spinner-linear-rotate 2s linear infinite}
._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] {transition:none;animation:none}
.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] circle {transition-property:stroke;animation-duration:4s;animation-timing-function:cubic-bezier(.35,0,.25,1);animation-iteration-count:infinite}
._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] circle {transition:none;animation:none}
.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] {animation:mat-progress-spinner-stroke-rotate-fallback 10s cubic-bezier(.87,.03,.33,1) infinite}
._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] {transition:none;animation:none}
.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] circle {transition-property:stroke}
._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] circle {transition:none;animation:none}
@keyframes mat-progress-spinner-linear-rotate {0% {transform:rotate(0)}
100% {transform:rotate(360deg)}
}
@keyframes mat-progress-spinner-stroke-rotate-100 {0% {stroke-dashoffset:268.60617px;transform:rotate(0)}
12.5% {stroke-dashoffset:56.54867px;transform:rotate(0)}
12.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(72.5deg)}
25% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(72.5deg)}
25.0001% {stroke-dashoffset:268.60617px;transform:rotate(270deg)}
37.5% {stroke-dashoffset:56.54867px;transform:rotate(270deg)}
37.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(161.5deg)}
50% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(161.5deg)}
50.0001% {stroke-dashoffset:268.60617px;transform:rotate(180deg)}
62.5% {stroke-dashoffset:56.54867px;transform:rotate(180deg)}
62.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(251.5deg)}
75% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(251.5deg)}
75.0001% {stroke-dashoffset:268.60617px;transform:rotate(90deg)}
87.5% {stroke-dashoffset:56.54867px;transform:rotate(90deg)}
87.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(341.5deg)}
100% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(341.5deg)}
}
@keyframes mat-progress-spinner-stroke-rotate-fallback {0% {transform:rotate(0)}
25% {transform:rotate(1170deg)}
50% {transform:rotate(2340deg)}
75% {transform:rotate(3510deg)}
100% {transform:rotate(4680deg)}
}
</style><style mat-spinner-animation="36"> @keyframes mat-progress-spinner-stroke-rotate-36 {0% {stroke-dashoffset:77.59733854366789;transform:rotate(0);}
12.5% {stroke-dashoffset:16.336281798666928;transform:rotate(0);}
12.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(72.5deg);}
25% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(72.5deg);}
25.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(270deg);}
37.5% {stroke-dashoffset:16.336281798666928;transform:rotate(270deg);}
37.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(161.5deg);}
50% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(161.5deg);}
50.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(180deg);}
62.5% {stroke-dashoffset:16.336281798666928;transform:rotate(180deg);}
62.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(251.5deg);}
75% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(251.5deg);}
75.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(90deg);}
87.5% {stroke-dashoffset:16.336281798666928;transform:rotate(90deg);}
87.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(341.5deg);}
100% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(341.5deg);}
}
</style><style>.mat-icon {background-repeat:no-repeat;display:inline-block;fill:currentColor;height:24px;width:24px}
.mat-icon.mat-icon-inline {font-size:inherit;height:inherit;line-height:inherit;width:inherit}
[dir=rtl] .mat-icon-rtl-mirror {transform:scale(-1,1)}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon {display:block}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button .mat-icon {margin:auto}
</style><style>div.bulletin-not-found[_ngcontent-uwv-c12] {padding:1em;text-align:center}
div.bulletin-detail-title[_ngcontent-uwv-c12] {font-size:18px;font-weight:500;color:#fff;line-height:25px}
div.bulletin-detail-time[_ngcontent-uwv-c12] {margin-top:5px;font-size:12px;font-weight:400;color:#999;line-height:17px}
div.bulletin-detail-content[_ngcontent-uwv-c12] {margin-top:20px;font-size:15px;font-weight:400;color:#fff;line-height:21px}
</style></head>
<body style="color: white; background-color: #0c192c;">
  <jx-root ng-version="8.2.12">
    <router-outlet></router-outlet>
    <jx-main-wrapper _nghost-uwv-c0="">
      <router-outlet _ngcontent-uwv-c0=""></router-outlet>
      <jx-announcement-detail-page _nghost-uwv-c12="">
        <!---->
        <jx-header-view _ngcontent-uwv-c12="" title="" _nghost-uwv-c2="">
          <div _ngcontent-uwv-c2="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
            <jx-header-row _ngcontent-uwv-c2="" class="header-view__nav-row-wrapper__container" _nghost-uwv-c4="">
              <div _ngcontent-uwv-c2="" class="header-view__nav-row-wrapper__container__nav-row">
                <!---->
                <!---->
                <button _ngcontent-uwv-c2="" class="header-view__nav-row-wrapper__container__nav-row__prefix" onclick="location.href='javascript:history.back(-1)'">
                  <i class="icon iconfont">&#xe67c;</i></button>
                <!---->
                <!---->
                <div _ngcontent-uwv-c2="" class="header-view__nav-row-wrapper__container__nav-row__content"></div>
                <!---->
                <!---->
                <!---->
                <!----></div>
            </jx-header-row>
          </div>
          <div _ngcontent-uwv-c2="" class="header-view__content-wrapper" style="padding-top: 64px;">
            <div _ngcontent-uwv-c2="" class="header-view__content-wrapper__content-container">
              <jx-safe-area _ngcontent-uwv-c12="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                <jx-content-view _ngcontent-uwv-c12="" _nghost-uwv-c7="">
                  <!---->
                  <!---->
                  <div _ngcontent-uwv-c12="" class="bulletin-detail-title">{$ggshow.title}</div>
                  <div _ngcontent-uwv-c12="" class="bulletin-detail-time">{$ggshow.oddtime|date="Y-m-d",###}</div>
                  <div _ngcontent-uwv-c12="" class="bulletin-detail-content">
                    {$ggshow.content}
				  </div></jx-content-view>
              </jx-safe-area>
            </div>
          </div>
          <div _ngcontent-uwv-c2="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight=""></div>
        </jx-header-view>
      </jx-announcement-detail-page>
    </jx-main-wrapper>
  </jx-root>
</body>

</html>