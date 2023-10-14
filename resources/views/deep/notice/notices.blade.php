<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="UTF-8">
    @include('mobile.common.common_title') 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <link rel="icon" type="image/x-icon" href="/static/img/favicon.ico">
    <link rel="stylesheet" href="/static/css/material-icons.css">
	<link rel="stylesheet" href="/mobile/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/static/css/styles.41928e9497559161f9b8.css">
	<link rel="stylesheet" href="/static/css/artDialog.css">
	<script type="text/javascript" src="/static/js/way.min.js"></script>


  <style>button.jx-app-download-button[_ngcontent-iif-c1] {width:100%;height:44px;background-color:#000000aa}
div.jx-app-download-container[_ngcontent-iif-c1] {width:100%;display:flex;align-items:center}
div.jx-app-download-container[_ngcontent-iif-c1] > img[_ngcontent-iif-c1] {width:32px;height:auto;margin:auto 10px auto 15px}
div.jx-app-download-container[_ngcontent-iif-c1] > span[_ngcontent-iif-c1] {color:#fff;font-size:16px;flex-grow:1;text-align:left}
div.jx-app-download-dismiss[_ngcontent-iif-c1] {width:44px;height:44px;background-image:url(close.07a630d9b4dd917a2c57.svg);background-repeat:no-repeat;background-position:center;background-size:20px 20px}
div.dialog-header-row[_ngcontent-iif-c1] {font-size:24px;font-weight:700;margin-bottom:.5em}
.center[_ngcontent-iif-c1] {text-align:center}
.jx-brand-url-btn[_ngcontent-iif-c1] {display:block;margin-left:auto;padding:0;width:23px;height:23px;border-radius:0;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(jx_brand_icon.573366da01d92eacea3d.svg)}
</style><style>div.app-background[_ngcontent-iif-c2] {position:fixed;top:0;left:0;width:100%;height:100%;z-index:-999;webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;touch-action:none;pointer-events:none;background-position:center 20%;background-repeat:no-repeat;background-size:contain}
</style><style>.header-view__nav-row-wrapper[_ngcontent-iif-c3] {position:fixed;top:0;left:0;right:0;z-index:999;background-color:rgba(12,25,44,1)}
@supports ((webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__nav-row-wrapper[_ngcontent-iif-c3] {background-color:rgba(12,25,44,.8);webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)}
}
.header-view__nav-row-wrapper--gradient[_ngcontent-iif-c3] {background-color:transparent;background-image:linear-gradient(to bottom,#0c192c,rgba(12,25,44,0))}
.header-view__nav-row-wrapper--gradient-deep[_ngcontent-iif-c3] {background-color:transparent;background-image:linear-gradient(to bottom,rgba(0,0,0,1),rgba(12,25,44,0))}
@supports ((webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__nav-row-wrapper--gradient[_ngcontent-iif-c3],.header-view__nav-row-wrapper--gradient-deep[_ngcontent-iif-c3] {webkit-backdrop-filter:none;backdrop-filter:none}
}
</style><style>.header-view__footer-row-wrapper[_ngcontent-iif-c3] {position:fixed;bottom:0;left:0;right:0;z-index:999;background-color:rgba(19,34,53,1)}
@supports ((webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__footer-row-wrapper[_ngcontent-iif-c3] {background-color:rgba(19,34,53,.8);webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)}
}
.header-view__footer-row-wrapper[_ngcontent-iif-c3]:empty {display:none}
.header-view__footer-row-wrapper--gradient[_ngcontent-iif-c3] {background-color:transparent;background-image:linear-gradient(to top,#0c192c,rgba(19,34,53,0))}
.header-view__footer-row-wrapper--gradient-deep[_ngcontent-iif-c3] {background-color:transparent;background-image:linear-gradient(to top,rgba(0,0,0,1),rgba(19,34,53,0))}
@supports ((webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__footer-row-wrapper--gradient[_ngcontent-iif-c3],.header-view__footer-row-wrapper--gradient-deep[_ngcontent-iif-c3] {webkit-backdrop-filter:none;backdrop-filter:none}
}
</style><style>.header-view__nav-row-wrapper__container__nav-row[_ngcontent-iif-c3] {min-height:64px;color:#fff;font-size:30px;font-weight:500;line-height:34px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:flex-start}
.header-view__nav-row-wrapper__container__nav-row__prefix[_ngcontent-iif-c3] {flex:0 0 auto;box-sizing:border-box;padding:0;width:44px;height:64px;color:#fff;border-radius:0;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.header-view__nav-row-wrapper__container__nav-row__prefix__icon[_ngcontent-iif-c3] {width:1em;height:1em;font-size:44px}
.header-icons-ctn[_ngcontent-iif-c3] {height:34px;width:100%;margin:15px;display:flex;flex-flow:row nowrap}
.header-icon[_ngcontent-iif-c3] {background-repeat:no-repeat;background-size:cover;background-position:center}
.header-jx-icon[_ngcontent-iif-c3] {background-image:url(jx-logo.443c8ffbee580d3672f7.png);height:100%;width:91px;margin-right:10px}
.header-vertical-line[_ngcontent-iif-c3] {border:1px solid #3f4f66}
.header-laliga-icon[_ngcontent-iif-c3] {background-image:url(laliga-logo.01f82bb57660e2ece9d1.png);height:100%;width:128px;margin-left:10px}
.header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-iif-c3] {flex:0 1 auto;padding:15px 0}
.header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-iif-c3]:first-child {padding-left:15px}
.header-view__nav-row-wrapper__container__nav-row__content[_ngcontent-iif-c3] {flex:1 1 auto;min-height:inherit;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
.header-view__nav-row-wrapper__container__nav-row__suffix[_ngcontent-iif-c3],.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-iif-c3] {flex:0 0 auto;margin:15px;padding:0;font-size:34px;border-radius:50%;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-iif-c3] {display:flex;flex-direction:row}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-iif-c3]   jx-avatar[_ngcontent-iif-c3] {width:20px}
.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-iif-c3]   span[_ngcontent-iif-c3] {font-size:14px;margin:0 0 0 10px}
.header-view__content-wrapper[_ngcontent-iif-c3] {box-sizing:border-box}
.header-view__content-wrapper--full-screen[_ngcontent-iif-c3] {position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%}
.header-view__content-wrapper__content-container[_ngcontent-iif-c3] {box-sizing:border-box}
.header-view__content-wrapper__content-container--full-screen[_ngcontent-iif-c3] {position:relative;width:100%;height:100%}
.msg-centre-btn[_ngcontent-iif-c3] {margin:25px 15px 15px;border-radius:1px}
div.message-centre[_ngcontent-iif-c3] {width:24px;height:16px;background-image:url(letter.a6d96d31aad6d4b972f8.png);background-repeat:no-repeat;background-position:center;background-size:cover}
div.message-centre.unread[_ngcontent-iif-c3] {background-image:url(unread-letter.2071a72b2e3b5bc9b34c.png)}
button.create-agent-link-btn[_ngcontent-iif-c3] > div[_ngcontent-iif-c3] {width:28px;height:28px;background-image:url(create-agentlink.1b7d4b7a8cd476e6b31b.svg);background-repeat:no-repeat;background-size:contain}
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
</style><style>[_nghost-iif-c5] {position:relative;display:block;padding-bottom:calc(480 / 1125 * 100%)}
@media screen and (min-aspect-ratio:1125/960) {[_nghost-iif-c5] {padding-bottom:50vh}
}
div.banner-board-wrapper[_ngcontent-iif-c5] {position:absolute;top:0;left:0;width:100%;height:100%}
div.banner-board-container[_ngcontent-iif-c5] {width:100%;height:100%;overflow:hidden}
div.banner-item-container[_ngcontent-iif-c5] {width:100%;height:100%;display:flex;flex-flow:row nowrap;justify-content:flex-start;align-items:center}
img.banner-item[_ngcontent-iif-c5] {flex:0 0 auto;width:100%;height:100%;-o-object-fit:contain;object-fit:contain;pointer-events:none;background-image:linear-gradient(to right,transparent,#000 calc(50% - 50vh / 480 * 1125 / 2),#000 calc(50% + 50vh / 480 * 1125 / 2),transparent)}
</style><style>button.bulletin-board-btn[_ngcontent-iif-c6] {display:block;margin:0;padding:8px 15px;width:100%;border-radius:0;color:#fff}
div.bulletin-board-container[_ngcontent-iif-c6] {box-sizing:border-box;height:20px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center}
div.bulletin-icon[_ngcontent-iif-c6] {flex:0 0 auto;width:20px;height:20px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/mobile/img/bulletin-icon.a996c907273958ac2d65.svg)}
.more-announcement-icon[_ngcontent-iif-c6] {flex:0 0 auto;width:70px;height:100%;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(more-announcement.e9aba3242f773db1453a.png)}
div.bulletin-board[_ngcontent-iif-c6] {flex:1 1 auto;margin-left:1em;height:20px;overflow:hidden;text-align:start;font-size:14px;font-weight:400;color:#878e97;line-height:20px}
</style><style>div.util-bar-container[_ngcontent-iif-c7] {padding:0 10px 10px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center}
.daily-gift[_ngcontent-iif-c7] {flex:1 0 auto;max-width:50%}
.daily-gift-title-row[_ngcontent-iif-c7] {display:flex;flex-direction:row;height:24px;align-items:center;margin-bottom:4px}
.daily-gift-username-title[_ngcontent-iif-c7] {color:#7998b1;font-size:12px;margin-right:8px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}
.daily-gift-logo[_ngcontent-iif-c7] {background-image:url(bgDailyGift.f36b818e9b284312109a.png);background-repeat:no-repeat;background-position:center;background-size:contain;min-width:70px;height:100%}
.daily-gift-logo-title[_ngcontent-iif-c7] {margin-left:27px;white-space:nowrap;font-family:"PingFangSC-Medium,PingFang SC";font-size:9px;color:#fff}
.daily-gift-value[_ngcontent-iif-c7] {font-size:19px;width:100%}
.daily-gift-value-sign[_ngcontent-iif-c7] {font-size:12px}
.util-bar[_ngcontent-iif-c7] {flex:1 0 auto;display:flex;justify-content:space-between;margin-left:auto;margin-right:16 px;max-width:50%}
button.util-btn[_ngcontent-iif-c7] {padding:0;width:50px;height:50px;color:#7998b1;font-size:12px;display:inline-flex;flex-flow:column nowrap;justify-content:space-between;align-items:center}
span.util-btn-icon[_ngcontent-iif-c7] {display:block;width:25px;height:25px;background-size:contain;background-repeat:no-repeat;background-position:center center}
span.util-btn-icon.deposit[_ngcontent-iif-c7] {background-image:url(deposit.862cd26ec57e83f225c4.png)}
span.util-btn-icon.transfer[_ngcontent-iif-c7] {background-image:url(transfer.a1c5b153615b288c7824.png)}
span.util-btn-icon.withdraw[_ngcontent-iif-c7] {background-image:url(withdraw.a41c76f1715915566d01.png)}
span.util-btn-icon.ac[_ngcontent-iif-c7] {background-image:url(ac.6e82c2d8f893679d58fb.png)}
div.cs-dialog-icon[_ngcontent-iif-c7] {display:block;width:99px;height:92px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public/mobile/img/cs_img.c95648a5d29ec2d84117.svg)}
div.cs-dialog-title[_ngcontent-iif-c7] {margin-top:22px;color:#333;font-size:24px;font-weight:500}
</style><style>.home-game-board-ctn[_ngcontent-iif-c8] {display:flex;flex-flow:row nowrap}
.side-menu-ctn[_ngcontent-iif-c8] {margin-left:10px;display:flex;flex-flow:column nowrap;align-items:center;justify-content:flex-start}
.side-menu-item[_ngcontent-iif-c8] {display:flex;flex-flow:row nowrap;align-items:center;justify-content:center;width:100%;box-sizing:border-box;margin:0 0 5px;padding:10px;font-size:12px;color:#7998b1;background-size:cover;background-repeat:no-repeat;background-position:center;}
.side-menu-item__tag[_ngcontent-iif-c8] {white-space:nowrap}
.active-side-menu[_ngcontent-iif-c8] {color:#fff;background-image:url(bg_active.4290af043bcec3617ad5.png)}
.side-menu-item__icon[_ngcontent-iif-c8] {background-size:cover;background-repeat:no-repeat;background-position:center;width:24px;padding-bottom:24px;margin-right:5px}
.game-board-ctn[_ngcontent-iif-c8] {margin:0 10px;width:100%}
.side-menu-icon-lottery[_ngcontent-iif-c8] {background-image:url(lottery.45d67018e32eec8b862c.png)}
.side-menu-icon-lottery.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(lottery_active.88066d8dcaf479878e64.png)}
.side-menu-icon-live[_ngcontent-iif-c8] {background-image:url(live.3be00c21be6f02e81489.png)}
.side-menu-icon-live.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(live_active.a0070344ba437bf32dea.png)}
.side-menu-icon-slot[_ngcontent-iif-c8] {background-image:url(slot.8c1c064dca40f3e255e7.png)}
.side-menu-icon-slot.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(slot_active.9725d9aea1b9d087c9b7.png)}
.side-menu-icon-sport[_ngcontent-iif-c8] {background-image:url(sport.56210547767ef73a4d32.png)}
.side-menu-icon-sport.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(sport_active.d66e7bcb8a1eeb5070c7.png)}
.side-menu-icon-fishing[_ngcontent-iif-c8] {background-image:url(fishing.149177d7d963fea179e2.png)}
.side-menu-icon-fishing.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(fishing_active.016cd2b3678134b02ace.png)}
.side-menu-icon-boardgame[_ngcontent-iif-c8] {background-image:url(boardgame.201c62bfbf568040859b.png)}
.side-menu-icon-boardgame.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(boardgame_active.eb4ce6f334b0fc8e9137.png)}
.side-menu-icon-esport[_ngcontent-iif-c8] {background-image:url(esport.a4eb4a91f21db4f5ee2c.png)}
.side-menu-icon-esport.active-side-menu-icon[_ngcontent-iif-c8] {background-image:url(esport_active.23c7638fe647fe2598c0.png)}
</style><style>.tab-bar[_ngcontent-iif-c10] {box-sizing:content-box;min-height:49px;display:flex;flex-flow:row nowrap;justify-content:space-around;align-items:stretch}
.tab-bar__nav-btn[_ngcontent-iif-c10] {flex:1 1 0;min-height:49px;color:#5d636e;display:flex;flex-flow:column nowrap;justify-content:flex-start;align-items:center}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] {color:#0b93ae}
.tab-bar__nav-btn__icon[_ngcontent-iif-c10] {flex:0 0 auto;display:block;margin-top:6px;width:24px;height:24px;background-size:contain;background-repeat:no-repeat;background-position:center}
.tab-bar__nav-btn__icon--home[_ngcontent-iif-c10] {background-image:url(home.93b20d6e835f71c043b8.png)}
.tab-bar__nav-btn__icon--activity[_ngcontent-iif-c10] {background-image:url(activity.8a6a35ba2ac648314ace.png)}
.tab-bar__nav-btn__icon--cs[_ngcontent-iif-c10] {background-image:url(datin.svg)}
.tab-bar__nav-btn__icon--brand[_ngcontent-iif-c10] {background-image:url(huodong.svg)}
.tab-bar__nav-btn__icon--my[_ngcontent-iif-c10] {background-image:url(my.87c43b85171cb8232892.png)}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] > .tab-bar__nav-btn__icon--home[_ngcontent-iif-c10] {background-image:url(active_home.485e6c98acecf897b8ba.png)}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] > .tab-bar__nav-btn__icon--activity[_ngcontent-iif-c10] {background-image:url(active_activity.0eee109d4b6a4ccedf91.png)}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] > .tab-bar__nav-btn__icon--cs[_ngcontent-iif-c10] {background-image:url(active_cs.9be7ce116557877dec91.png)}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] > .tab-bar__nav-btn__icon--brand[_ngcontent-iif-c10] {background-image:url(active_brand.26b0bef9602b57eac72e.png)}
.tab-bar__nav-btn--active[_ngcontent-iif-c10] > .tab-bar__nav-btn__icon--my[_ngcontent-iif-c10] {background-image:url(active_my.030b4715dce6d516f9c8.png)}
.tab-bar__nav-btn__title[_ngcontent-iif-c10] {flex:0 0 auto;display:block;margin-top:6px;color:inherit;font-size:10px;font-weight:400;line-height:14px}
</style><style>[_nghost-iif-c14] {box-sizing:border-box;position:absolute;top:0;left:0;bottom:0;right:0;width:100%;height:100%;border-radius:inherit;background-color:transparent;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center}
.backdrop[_nghost-iif-c14] {background-color:rgba(0,0,0,.5)}
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
</style><style mat-spinner-animation="18"> @keyframes mat-progress-spinner-stroke-rotate-18 {0% {stroke-dashoffset:23.876104167282428;transform:rotate(0);}
12.5% {stroke-dashoffset:5.026548245743669;transform:rotate(0);}
12.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(72.5deg);}
25% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(72.5deg);}
25.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(270deg);}
37.5% {stroke-dashoffset:5.026548245743669;transform:rotate(270deg);}
37.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(161.5deg);}
50% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(161.5deg);}
50.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(180deg);}
62.5% {stroke-dashoffset:5.026548245743669;transform:rotate(180deg);}
62.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(251.5deg);}
75% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(251.5deg);}
75.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(90deg);}
87.5% {stroke-dashoffset:5.026548245743669;transform:rotate(90deg);}
87.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(341.5deg);}
100% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(341.5deg);}
}
</style><style>.lottery-board-ctn[_ngcontent-iif-c15] {display:flex;flex-flow:column wrap;justify-content:flex-start;height:100%}
.lottery-btns-ctn[_ngcontent-iif-c15] {display:flex;flex-flow:row wrap;margin-bottom:10px}
.lottery-btn[_ngcontent-iif-c15] {display:flex;flex-flow:column nowrap;align-items:center;width:25%;box-sizing:border-box;border-radius:0;padding:10px;font-size:12px;background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url(lottery_bg.5b0db9f6401c9434ec75.png)}
.title[_ngcontent-iif-c15] {color:#a9bed8}
.sub-title[_ngcontent-iif-c15] {color:#7998b1}
.lottery-btn[_ngcontent-iif-c15]:first-child {border-radius:10px 0 0}
.lottery-btn[_ngcontent-iif-c15]:nth-child(4) {border-radius:0 10px 0 0}
.lottery-btn[_ngcontent-iif-c15]:nth-child(5) {border-radius:0 0 0 10px}
.lottery-btn[_ngcontent-iif-c15]:nth-child(8) {border-radius:0 0 10px}
.lottery-btn-icon[_ngcontent-iif-c15] {background-size:cover;background-repeat:no-repeat;background-position:center;width:50px;height:50px}
.lottery-lobby[_ngcontent-iif-c15] {background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url(lottery_lobby.3ebc4b9cfc4f865db015.png);border-radius:10px;width:100%;padding-bottom:calc((100% * 144 / 314))}
.game-1[_ngcontent-iif-c15] {background-image:url(1.94732245082a337d973a.png)}
.game-6[_ngcontent-iif-c15] {background-image:url(6.f45183d305b4055e0491.png)}
.game-26[_ngcontent-iif-c15] {background-image:url(26.b99820baf827d5c86613.png)}
.game-27[_ngcontent-iif-c15] {background-image:url(27.b66a27dc46bf56e60c6a.png)}
.game-28[_ngcontent-iif-c15] {background-image:url(28.5004283522d159495603.png)}
.game-32[_ngcontent-iif-c15] {background-image:url(32.552f1aa9ef799e732bce.png)}
.game-43[_ngcontent-iif-c15] {background-image:url(43.c402a9fb3d3945ac39b8.png)}
.game-45[_ngcontent-iif-c15] {background-image:url(45.36dd88e459f576fea52e.png)}
</style><style>.mat-dialog-container {display:block;padding:24px;border-radius:4px;box-sizing:border-box;overflow:auto;outline:0;width:100%;height:100%;min-height:inherit;max-height:inherit}
@media (-ms-high-contrast:active) {.mat-dialog-container {outline:solid 1px}
}
.mat-dialog-content {display:block;margin:0 -24px;padding:0 24px;max-height:65vh;overflow:auto;webkit-overflow-scrolling:touch}
.mat-dialog-title {margin:0 0 20px;display:block}
.mat-dialog-actions {padding:8px 0;display:flex;flex-wrap:wrap;min-height:52px;align-items:center;margin-bottom:-24px}
.mat-dialog-actions[align=end] {justify-content:flex-end}
.mat-dialog-actions[align=center] {justify-content:center}
.mat-dialog-actions .mat-button-base+.mat-button-base {margin-left:8px}
[dir=rtl] .mat-dialog-actions .mat-button-base+.mat-button-base {margin-left:0;margin-right:8px}
</style><style>div.dialog-wrapper[_ngcontent-iif-c22] {box-sizing:border-box;padding:16px 16px 10px}
div.content-wrapper[_ngcontent-iif-c22] {display:flex;flex-flow:column nowrap;justify-content:flex-start;align-items:center}
div.content-plain-text[_ngcontent-iif-c22] {color:#333;font-size:20px;font-weight:500;line-height:28px;text-align:center;word-break:break-word;white-space:pre-line}
mat-dialog-content[_ngcontent-iif-c22] {margin:0 -40px;padding:0 40px;max-height:45vh}
mat-dialog-actions[_ngcontent-iif-c22] {margin:20px 0 0;padding:0;min-height:44px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
button[_ngcontent-iif-c22] {flex:1 1 100%;padding:10px;border-radius:10px;font-size:18px;font-weight:500;line-height:25px;color:#fff;text-align:center}
button[_ngcontent-iif-c22]:not(:first-child) {margin-left:10px}
button[_ngcontent-iif-c22]:active {webkit-filter:brightness(80%);filter:brightness(80%)}
button.ok-btn[_ngcontent-iif-c22] {background:linear-gradient(to bottom,#13a2ba,#087c95)}
button.cancel-btn[_ngcontent-iif-c22] {background:linear-gradient(to bottom,#9ea3aa,#59585d)}
</style><style>jx-safe-area[_ngcontent-iif-c23] {margin:auto 15px}
button.bulletin-read-all-btn[_ngcontent-iif-c23] {display:block;margin-left:auto;margin-right:15px;padding:0;color:#fff;font-size:17px;font-weight:500;line-height:34px;border-radius:0}
button.bulletin-read-all-btn.allRead[_ngcontent-iif-c23] {opacity:.6}
.bulletin-list-wrapper[_ngcontent-iif-c23] {padding-left:0;padding-right:0}
button.bulletin-btn[_ngcontent-iif-c23] {box-sizing:border-box;display:block;margin:14px auto;padding:0;min-height:80px;width:100%;text-align:start;border-radius:0;background-color:#142135}
button.bulletin-btn[_ngcontent-iif-c23]:active {webkit-filter:none;filter:none;background-color:#132235}
.bulletin-btn-content-safe-area[_ngcontent-iif-c23] {display:block}
button.bulletin-btn[_ngcontent-iif-c23]   .bulletin-unread-spot[_ngcontent-iif-c23] {width:8px;height:8px;background:url(announ_unread_icon.93426d56caa3672e53e4.svg);position:absolute;right:10px;top:10px}
button.bulletin-btn.read[_ngcontent-iif-c23]   .bulletin-unread-spot[_ngcontent-iif-c23] {width:8px;height:8px;background:url(announ_unread_icon.93426d56caa3672e53e4.svg);position:absolute;right:10px;top:10px;display:none}
.bulletin-btn-content-wrapper[_ngcontent-iif-c23] {box-sizing:border-box;display:block;padding:18px 15px}
.bulletin-btn-content-wrapper[_ngcontent-iif-c23] > .bulletin-title[_ngcontent-iif-c23] {display:block;color:#fff;font-size:18px;font-weight:500;line-height:25px}
.bulletin-btn-content-wrapper[_ngcontent-iif-c23] > .bulletin-time[_ngcontent-iif-c23] {display:block;margin-top:9px;color:#999;font-size:11px;font-weight:500;line-height:16px}
button.bulletin-btn.read[_ngcontent-iif-c23]   .bulletin-title[_ngcontent-iif-c23] {color:rgba(255,255,255)}
button.bulletin-btn.read[_ngcontent-iif-c23]   .bulletin-time[_ngcontent-iif-c23] {color:rgba(255,255,255)}
jx-content-view.no-more-record[_ngcontent-iif-c23] {text-align:center}
</style><style>[_nghost-iif-c24] {flex:1 1 auto;box-sizing:border-box;position:relative;padding:15px 0;display:flex;flex-flow:row wrap;justify-content:flex-start;align-items:center}
</style><style>.message-tab-btn-group[_ngcontent-iif-c25] {display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
.message-tab-btn-group__tab-btn[_ngcontent-iif-c25] {flex:1 1 0;display:block;box-sizing:border-box;border-radius:0}
.message-tab-btn-group__tab-btn__content-wrapper[_ngcontent-iif-c25] {box-sizing:border-box;padding:5px;height:100%;min-height:49px;font-size:16px;font-weight:500;line-height:22px;text-align:center;color:#5d636e;display:flex;flex-flow:row nowrap;justify-content:center;align-items:center;width:100%;margin:0 auto}
.message-tab-btn-group__tab-btn__content-wrapper--active[_ngcontent-iif-c25] {color:#fff;border-bottom:2px solid #14a4be}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-iif-c25] {flex:0 0 auto;display:block;margin-right:10px;width:30px;height:30px;background-size:contain;background-repeat:no-repeat;background-position:center center;position:relative}
.message-tab-btn-group__tab-btn__content-wrapper__icon--announcement[_ngcontent-iif-c25] {background-image:url(/mobile/img/message-center-tab-bar-notice_icon.ce1d06cb69405ac3c3e3.svg)}
.message-tab-btn-group__tab-btn__content-wrapper__icon--chatroom[_ngcontent-iif-c25] {background-image:url(message-center-tab-bar-message_icon.442135c6e41a14c2f1ef.svg)}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-iif-c25] > div.unread[_ngcontent-iif-c25] {position:absolute;top:-8px;left:20px;font-size:12px;color:#fff;background-color:red;border-radius:8px;width:auto;min-width:16px;height:16px;line-height:16px;font-weight:inherit}
.message-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-iif-c25] > div.unread.twoDigit[_ngcontent-iif-c25] {padding:0 2px}
</style><style>[_nghost-iif-c26] {box-sizing:border-box;display:block;padding:15px}
</style><style>.mat-icon {background-repeat:no-repeat;display:inline-block;fill:currentColor;height:24px;width:24px}
.mat-icon.mat-icon-inline {font-size:inherit;height:inherit;line-height:inherit;width:inherit}
[dir=rtl] .mat-icon-rtl-mirror {transform:scale(-1,1)}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon {display:block}
.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button .mat-icon,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button .mat-icon {margin:auto}
</style><style>div.bulletin-not-found[_ngcontent-iif-c27] {padding:1em;text-align:center}
div.bulletin-detail-title[_ngcontent-iif-c27] {font-size:18px;font-weight:500;color:#fff;line-height:25px}
div.bulletin-detail-time[_ngcontent-iif-c27] {margin-top:5px;font-size:12px;font-weight:400;color:#999;line-height:17px}
div.bulletin-detail-content[_ngcontent-iif-c27] {margin-top:20px;font-size:15px;font-weight:400;color:#fff;line-height:21px}
</style><style>button.bulletin-read-all-btn[_ngcontent-iif-c29] {display:block;margin-left:auto;margin-right:15px;padding:0;color:#fff;font-size:17px;font-weight:500;line-height:34px;border-radius:0}
.contact-search-container[_ngcontent-iif-c29] {margin:15px;display:flex;align-items:center;background-color:#132235}
div.icon-search[_ngcontent-iif-c29] {background-size:contain;background-image:url(icon_search.f4c4aa746965b72ce044.svg);width:20px;height:20px;margin-left:21px}
button.chatroom-btn[_ngcontent-iif-c29] {box-sizing:border-box;display:flex;margin:22px auto;padding:0;height:40px;width:100%;text-align:start;border-radius:0;color:#8e8e93}
button.chatroom-btn[_ngcontent-iif-c29]:nth-of-type(1) {margin-top:0}
button.chatroom-btn[_ngcontent-iif-c29]   .avatar-wrapper[_ngcontent-iif-c29] {position:relative}
button.chatroom-btn[_ngcontent-iif-c29]   jx-avatar[_ngcontent-iif-c29] {width:40px;height:40px}
button.chatroom-btn[_ngcontent-iif-c29]   .unread[_ngcontent-iif-c29] {position:absolute;top:-5px;left:28px;min-width:9px;height:15px;background-color:red;font-size:10px;text-align:center;color:#fff;border-radius:7.5px;padding:0 3px}
button.chatroom-btn[_ngcontent-iif-c29]   .chatroom-content[_ngcontent-iif-c29] {display:flex;flex-direction:column;margin-left:15px;align-self:flex-end;flex-grow:1;padding-bottom:5px;max-width:70%}
button.chatroom-btn[_ngcontent-iif-c29]   .chatroom-content[_ngcontent-iif-c29]   span.chatroom-username[_ngcontent-iif-c29] {color:#fff;font-size:16px}
button.chatroom-btn[_ngcontent-iif-c29]   .chatroom-content[_ngcontent-iif-c29]   span.chatroom-last-message[_ngcontent-iif-c29] {font-size:14px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
button.chatroom-btn[_ngcontent-iif-c29]   span.chatroom-time[_ngcontent-iif-c29] {font-size:12px;position:absolute;right:0;top:0}
</style><style>[_nghost-iif-c30] {webkit-appearance:none;-moz-appearance:none;appearance:none;background:#132235;border:1px solid transparent;outline:0;display:block;box-sizing:border-box;padding:14px;width:100%;font-size:16px;font-weight:500;line-height:22px;color:#fff;border-radius:inherit}
[_nghost-iif-c30]::webkit-input-placeholder {color:#8e8e93}
[_nghost-iif-c30]::-moz-placeholder {color:#8e8e93}
[_nghost-iif-c30]::-ms-input-placeholder {color:#8e8e93}
[_nghost-iif-c30]::placeholder {color:#8e8e93}
[_nghost-iif-c30]:disabled {webkit-filter:opacity(50%);filter:opacity(50%)}
[_nghost-iif-c30]:webkit-autofill {border-radius:inherit}
.ng-dirty.ng-invalid[_nghost-iif-c30],.ng-touched.ng-invalid[_nghost-iif-c30] {border-color:#b72639}
</style><style>.chatroom-tab-btn-group[_ngcontent-iif-c31] {display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch}
.chatroom-tab-btn-group__tab-btn[_ngcontent-iif-c31] {flex:1 1 0;display:block;box-sizing:border-box;border-radius:0}
.chatroom-tab-btn-group__tab-btn--active[_ngcontent-iif-c31] {background-image:linear-gradient(179deg,#13a2ba,#087c95)}
.chatroom-tab-btn-group__tab-btn__content-wrapper[_ngcontent-iif-c31] {box-sizing:border-box;padding:5px;width:100%;height:100%;min-height:49px;font-size:16px;font-weight:500;line-height:22px;text-align:center;color:#5d636e;display:flex;flex-flow:row nowrap;justify-content:center;align-items:center}
.chatroom-tab-btn-group__tab-btn__content-wrapper--active[_ngcontent-iif-c31] {color:#fff}
.chatroom-tab-btn-group__tab-btn__content-wrapper__icon[_ngcontent-iif-c31] {flex:0 0 auto;display:block;margin-right:5px;width:20px;height:20px;background-size:contain;background-repeat:no-repeat;background-position:center center}
.chatroom-tab-btn-group__tab-btn__content-wrapper__icon--chatroom[_ngcontent-iif-c31] {background-image:url(conversation_icon_default.77e1f7bfb7bdfdb28e53.svg)}
.chatroom-tab-btn-group__tab-btn__content-wrapper__icon--chatroom--active[_ngcontent-iif-c31] {background-image:url(conversation_icon_selected.3ba5f5014d4accf2bf22.svg)}
.chatroom-tab-btn-group__tab-btn__content-wrapper__icon--contact[_ngcontent-iif-c31] {background-image:url(contact_icon_default.a5b043f67c0bbc04092e.svg)}
.chatroom-tab-btn-group__tab-btn__content-wrapper__icon--contact--active[_ngcontent-iif-c31] {background-image:url(contact_icon_selected.2dfea6db9d6bf976f470.svg)}
</style>
</head>
<body style="color: white; background-color: #0c192c;">
  <jx-root ng-version="8.2.12">
    <router-outlet></router-outlet>
    <jx-main-wrapper _nghost-iif-c0="" class="ng-star-inserted">
      <router-outlet _ngcontent-iif-c0=""></router-outlet>
      <jx-announcement-list-page _nghost-iif-c23="" class="ng-star-inserted">
        <jx-header-view _ngcontent-iif-c23="" title="消息中心" _nghost-iif-c3="">
          <div _ngcontent-iif-c3="" class="header-view__nav-row-wrapper safe-area-top safe-area-left safe-area-right" jxsafearealeft="" jxsafearearight="" jxsafeareatop="">
            <jx-header-row _ngcontent-iif-c3="" class="header-view__nav-row-wrapper__container" _nghost-iif-c11="">
              <div _ngcontent-iif-c3="" class="header-view__nav-row-wrapper__container__nav-row">
                <!---->
                <!---->
                <button _ngcontent-iif-c3="" class="header-view__nav-row-wrapper__container__nav-row__prefix ng-star-inserted" onclick="location.href='javascript:history.back(-1)'">
                  <i class="icon iconfont">&#xe67c;</i></button>
                <!---->
                <!---->
                <!---->
                <div _ngcontent-iif-c3="" class="header-view__nav-row-wrapper__container__nav-row__title ng-star-inserted">公告中心</div>
                <div _ngcontent-iif-c3="" class="header-view__nav-row-wrapper__container__nav-row__content"></div>
                <!---->
                <!---->
                <!----></div>
            </jx-header-row>
            <jx-header-row _ngcontent-iif-c23="" _nghost-iif-c11="">
              <jx-message-centre-tab-bar _ngcontent-iif-c23="" _nghost-iif-c25="">
                <div _ngcontent-iif-c25="" class="message-tab-btn-group">
                  <button _ngcontent-iif-c25="" class="message-tab-btn-group__tab-btn safe-area-fix-bottom safe-area-fix-left message-tab-btn-group__tab-btn--active" jxsafeareafixbottom="" jxsafeareafixleft="" replaceurl="" routerlinkactive="message-tab-btn-group__tab-btn--active" tabindex="0">
                    <span _ngcontent-iif-c25="" class="message-tab-btn-group__tab-btn__content-wrapper message-tab-btn-group__tab-btn__content-wrapper--active" routerlinkactive="message-tab-btn-group__tab-btn__content-wrapper--active">
                      <span _ngcontent-iif-c25="" class="message-tab-btn-group__tab-btn__content-wrapper__icon message-tab-btn-group__tab-btn__content-wrapper__icon--announcement message-tab-btn-group__tab-btn__content-wrapper__icon--announcement--active" routerlinkactive="message-tab-btn-group__tab-btn__content-wrapper__icon--announcement--active"></span>系统公告</span>
                  </button>
                </div>
              </jx-message-centre-tab-bar>
            </jx-header-row>
          </div>
          <div _ngcontent-iif-c3="" class="header-view__content-wrapper" style="padding-top: 113px;">
            <div _ngcontent-iif-c3="" class="header-view__content-wrapper__content-container">
              <jx-safe-area _ngcontent-iif-c23="" class="safe-area-top safe-area-bottom safe-area-left safe-area-right" style="display: block; box-sizing: border-box;">
                <jx-content-view _ngcontent-iif-c23="" class="bulletin-list-wrapper" _nghost-iif-c26="">
                  <!---->
                  <div _ngcontent-iif-c23="" class="bulletin-list-container" jxwindowscrollloader="">
                    <!---->
                    <!---->
                    <!---->
                    <volist name="gglist" id="vo">
                    <button _ngcontent-iif-c23="" class="bulletin-btn read ng-star-inserted" tabindex="0" onclick="location.href='{:U('Member/ggshow',array('aid'=>$vo['id']))}'">
                      <span _ngcontent-iif-c23="" class="bulletin-btn-content-safe-area">
                        <div _ngcontent-iif-c23="" class="bulletin-unread-spot"></div>
                        <span _ngcontent-iif-c23="" class="bulletin-btn-content-wrapper">
                          <span _ngcontent-iif-c23="" class="bulletin-title">{$vo[title]}</span>
                          <span _ngcontent-iif-c23="" class="bulletin-time">{$vo[oddtime]|date='Y-m-d',###}</span></span>
                      </span>
                    </button>
					</volist>
                  </div>
                  <!----></jx-content-view>
              </jx-safe-area>
            </div>
          </div>
        </jx-header-view>
      </jx-announcement-list-page>
    </jx-main-wrapper>
  </jx-root>
</body>

</html>