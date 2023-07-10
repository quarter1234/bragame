<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    <title>游戏大厅</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <!-- Used in supported Android browsers -->
    <link rel="stylesheet" href="/static/css/artDialog.css">
    <script>var Webconfigs = {
        "ROOT": "__ROOT__"
      }</script>
    <script src="/static/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/static/js/artDialog.js"></script>
    <script type="text/javascript" src="/static/js/way.min.js"></script>

    <meta name="theme-color" content="#0C192C">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	</head>
    <style>
        .top{width:100%;height:62px;background:#1a2c38;position:fixed;color:#fff;top:0;left:0;}
        .logo{width:91px;height:34px;float:left;margin:14px;}
        .logo img{width:91px;height:34px;}
        .money{width:151px;height:32px;background:#102230;border-radius:5px;float:left;margin:15px 0 0 10px;position:relative; line-height:32px;}
        .money span{padding-left:10px;float:left;}
        .sx{width:16px;height:16px;position:absolute;right:45px;top:7px;}
        .sx img{width:16px;height:16px;}
        .qb{width:34px;height:29px;background:#007aff;border-radius:5px;right:3px;top:1px;position:absolute;text-align:center;}
        .qb img{width:16px;height:16px; margin-top:5px;}
        .yh{width:20px;height:20px;position:absolute;right:20px;top:20px;}
        .yh img{width:20px;height:20px;}
        .centen{width:100%;height:80px;}
        .centen_tab{width:96%;height:54px;background:#13202d;margin:0px auto;border-radius:15px; display:flex; justify-content:space-between;}
        .centen_list{width:33%;text-align:center;align-items:center;font-size:14px; border:1px solid #13202d;border-radius:15px;margin:1px;}
        .centen_list img{width:20px;height:20px;margin:6px 0 -13px 0;}
        .centen_on{background:#324d5d;border:1px solid #3d5767;}
        .centen_show{width:96%;margin:10px auto;display:none; color:#fff;}
        .xk{width:100%;height:250px;background:linear-gradient(#121e2e,#013681);border-radius:10px;}
        .xk p{width:85%;margin:10px auto; padding-top:30px;clear:both;overflow:hidden;}
        .xk_t{width:85%;margin:0 auto;}
        .xk_t input{border:1px #fff dashed;width:80%;float:left;height:40px; background:#0f212e; outline:none; color:#fff;font-size:16px; padding-left:5px;}
        .xk_t button{width:40px;height:40px;border-radius:5px;background:#007aff;text-align:center;color:#fff;float:right;}
        .xk_t button img{width:15px;height:15px;}
        .xk_b{width:100%;height:150px; margin-top:15px; background:#071824; border-radius:10px; overflow:hidden;}
        .xk_b h2{color:#fff;text-align:center;padding-top:10px;font-weight:500px;font-size:22px;}
        .xk_but{width:100%; margin-top:20px;display:flex; justify-content:center;}
        .xk_but button{color:#fff; margin:0 10px;width:108px;height:40px;line-height:40px;text-align:center;}
        .times{width:96%;height:32px;background:#13202d;margin:0px auto;border-radius:5px; display:flex; justify-content:space-between; border:1px solid #2c4355; display:flex; justify-content:space-between;}
        .times_list{width:19%;height:30px; margin:1px; border-radius:5px; text-align:center; line-height:30px;color:#fff;font-size:14px;}
        .times_on{background:#2c4355;}
        .times_xk{width:100%;background:linear-gradient(#0f212f,#102744);border-radius:10px; padding:10px 0 20px 0; margin-top:15px;}
        .times_div{display: none;}
        .times_fl{width:88%;height:54px;background:#1a2c38;margin:20px auto 0 auto; border-radius:10px; position:relative;}
        .times_fl span{width:20px;height:10px;border-radius:3px; position:absolute;top:20px;left:20px; display:inline-block;}
        .times_fl .text{width:200px;top:15px; position:absolute;left:75px; color:#fff; font-size:16px;}
        .times_fl label{position:absolute; right:20px; top:15px; color:#cec269;}
        .b1{background:#81ca3f;}
        .b2{background:#007aff;}
        .b3{background:#484edf;}
        .yh_top{width:100%; padding:10px 0; display:flex;justify-content:space-between;}
        .yh_t_list{width:48%;height:87px;background:#0f212f;border-radius:10px; text-align:center;}
        .yh_t_list h2{color:#ffe777;margin:10px 0;}
        .yh_t_list p{margin:0;}
        .yh_table{width:100%;}
        .yh_table table{border-collapse:collapse;width:100%;}
        .yh_table table td{background:#13202d;border:1px solid #2c4355;font-size:14px;text-align:center;line-height:30px;}
        .yh_table thead td{background:#334d5d;}
    </style>
    {{--底部导航样式开始--}}
    <style>button.jx-app-download-button[_ngcontent-way-c1] {width:100%;height:44px;background-color:#000000aa} div.jx-app-download-container[_ngcontent-way-c1] {width:100%;display:flex;align-items:center} div.jx-app-download-container[_ngcontent-way-c1] > img[_ngcontent-way-c1] {width:32px;height:auto;margin:auto 10px auto 15px} div.jx-app-download-container[_ngcontent-way-c1] > span[_ngcontent-way-c1] {color:#fff;font-size:16px;flex-grow:1;text-align:left} div.jx-app-download-dismiss[_ngcontent-way-c1] {width:44px;height:44px;background-image:url(/mobile/img/close.07a630d9b4dd917a2c57.svg);background-repeat:no-repeat;background-position:center;background-size:20px 20px} div.dialog-header-row[_ngcontent-way-c1] {font-size:24px;font-weight:700;margin-bottom:.5em} .center[_ngcontent-way-c1] {text-align:center} .jx-brand-url-btn[_ngcontent-way-c1] {display:block;margin-left:auto;padding:0;width:23px;height:23px;border-radius:0;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(/mobile/img/jx_brand_icon.573366da01d92eacea3d.svg)}</style>
    <style>div.app-background[_ngcontent-way-c2] {position:fixed;top:0;left:0;width:100%;height:100%;z-index:-999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;touch-action:none;pointer-events:none;background-image:url(/mobile/img/pi-xiu.a23ab2aff01478fd81ad.svg);background-position:center 20%;background-repeat:no-repeat;background-size:contain}</style>
    <style>.header-view__nav-row-wrapper[_ngcontent-way-c3] {position:fixed;top:0;left:0;right:0;z-index:999;background-color:rgba(12,25,44,1)} @supports ((-webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__nav-row-wrapper[_ngcontent-way-c3] {background-color:rgba(12,25,44,.8);-webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)} } .header-view__nav-row-wrapper--gradient[_ngcontent-way-c3] {background-color:transparent;background-image:linear-gradient(to bottom,#0c192c,rgba(12,25,44,0))} .header-view__nav-row-wrapper--gradient-black[_ngcontent-way-c3] {background-color:transparent;background-image:linear-gradient(to bottom,rgba(0,0,0,1),rgba(12,25,44,0))} @supports ((-webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__nav-row-wrapper--gradient[_ngcontent-way-c3],.header-view__nav-row-wrapper--gradient-black[_ngcontent-way-c3] {-webkit-backdrop-filter:none;backdrop-filter:none} }</style>
    <style>.header-view__footer-row-wrapper[_ngcontent-way-c3] {position:fixed;bottom:0;left:0;right:0;z-index:999;background-color:rgba(19,34,53,1)} @supports ((-webkit-backdrop-filter:blur(20px)) or (backdrop-filter:blur(20px))) {.header-view__footer-row-wrapper[_ngcontent-way-c3] {background-color:rgba(19,34,53,.8);-webkit-backdrop-filter:blur(20px);backdrop-filter:blur(20px)} } .header-view__footer-row-wrapper[_ngcontent-way-c3]:empty {display:none} .header-view__footer-row-wrapper--gradient[_ngcontent-way-c3] {background-color:transparent;background-image:linear-gradient(to top,#0c192c,rgba(19,34,53,0))} .header-view__footer-row-wrapper--gradient-black[_ngcontent-way-c3] {background-color:transparent;background-image:linear-gradient(to top,rgba(0,0,0,1),rgba(19,34,53,0))} @supports ((-webkit-backdrop-filter:none) or (backdrop-filter:none)) {.header-view__footer-row-wrapper--gradient[_ngcontent-way-c3],.header-view__footer-row-wrapper--gradient-black[_ngcontent-way-c3] {-webkit-backdrop-filter:none;backdrop-filter:none} }</style>
    <style>.header-view__nav-row-wrapper__container__nav-row[_ngcontent-way-c3] {min-height:64px;color:#fff;font-size:20px;font-weight:500;line-height:20px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:flex-start} .header-view__nav-row-wrapper__container__nav-row__prefix[_ngcontent-way-c3] {flex:0 0 auto;box-sizing:border-box;padding:0;width:44px;height:64px;color:#fff;border-radius:0;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center} .header-view__nav-row-wrapper__container__nav-row__prefix__icon[_ngcontent-way-c3] {width:1em;height:1em;font-size:44px} .header-icons-ctn[_ngcontent-way-c3] {height:34px;width:100%;margin:15px;display:flex;flex-flow:row nowrap} .header-icon[_ngcontent-way-c3] {background-repeat:no-repeat;background-size:cover;background-position:center} .header-jx-icon[_ngcontent-way-c3] {background-image:url(/mobile/img/jx-logo.443c8ffbee580d3672f7.png);height:100%;width:91px;margin-right:10px} .header-vertical-line[_ngcontent-way-c3] {border:1px solid #3f4f66} .header-laliga-icon[_ngcontent-way-c3] {background-image:url(/mobile/img/laliga-logo.01f82bb57660e2ece9d1.png);height:100%;width:128px;margin-left:10px} .header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-way-c3] {flex:0 1 auto;padding:15px 0} .header-view__nav-row-wrapper__container__nav-row__title[_ngcontent-way-c3]:first-child {padding-left:15px} .header-view__nav-row-wrapper__container__nav-row__content[_ngcontent-way-c3] {flex:1 1 auto;min-height:inherit;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch} .header-view__nav-row-wrapper__container__nav-row__suffix[_ngcontent-way-c3],.header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-way-c3] {flex:0 0 auto;margin:15px;padding:0;font-size:34px;border-radius:50%;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center} .header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-way-c3] {display:flex;flex-direction:row} .header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-way-c3] jx-avatar[_ngcontent-way-c3] {width:20px} .header-view__nav-row-wrapper__subordinate-container__nav-row__suffix[_ngcontent-way-c3] span[_ngcontent-way-c3] {font-size:14px;margin:0 0 0 10px} .header-view__content-wrapper[_ngcontent-way-c3] {box-sizing:border-box} .header-view__content-wrapper--full-screen[_ngcontent-way-c3] {position:absolute;top:0;bottom:0;left:0;right:0;width:100%;height:100%} .header-view__content-wrapper__content-container[_ngcontent-way-c3] {box-sizing:border-box} .header-view__content-wrapper__content-container--full-screen[_ngcontent-way-c3] {position:relative;width:100%;height:100%} .msg-centre-btn[_ngcontent-way-c3] {margin:25px 15px 15px;border-radius:1px} div.message-centre[_ngcontent-way-c3] {width:24px;height:16px;background-image:url(/mobile/img/letter.a6d96d31aad6d4b972f8.png);background-repeat:no-repeat;background-position:center;background-size:cover} div.message-centre.unread[_ngcontent-way-c3] {background-image:url(/mobile/img/unread-letter.2071a72b2e3b5bc9b34c.png)} button.create-agent-link-btn[_ngcontent-way-c3] > div[_ngcontent-way-c3] {width:28px;height:28px;background-image:url(/mobile/img/create-agentlink.1b7d4b7a8cd476e6b31b.svg);background-repeat:no-repeat;background-size:contain}</style>
    <style>@supports (padding-top:constant(safe-area-inset-top)) or (padding-top:env(safe-area-inset-top)) {.safe-area-top {padding-top:env(safe-area-inset-top)} .safe-area-fix-top {margin-top:calc(-1 * env(safe-area-inset-top));padding-top:env(safe-area-inset-top)} } @supports (padding-bottom:constant(safe-area-inset-bottom)) or (padding-bottom:env(safe-area-inset-bottom)) {.safe-area-bottom {padding-bottom:env(safe-area-inset-bottom)} .safe-area-fix-bottom {margin-bottom:calc(-1 * env(safe-area-inset-bottom));padding-bottom:env(safe-area-inset-bottom)} } @supports (padding-left:constant(safe-area-inset-left)) or (padding-left:env(safe-area-inset-left)) {.safe-area-left {padding-left:env(safe-area-inset-left)} .safe-area-fix-left {margin-left:calc(-1 * env(safe-area-inset-left));padding-left:env(safe-area-inset-left)} } @supports (padding-right:constant(safe-area-inset-right)) or (padding-right:env(safe-area-inset-right)) {.safe-area-right {padding-right:env(safe-area-inset-right)} .safe-area-fix-right {margin-right:calc(-1 * env(safe-area-inset-right));padding-right:env(safe-area-inset-right)} }</style>
    <style>[_nghost-way-c5] {position:relative;display:block;padding-bottom:calc(480 / 1125 * 100%)} @media screen and (min-aspect-ratio:1125/960) {[_nghost-way-c5] {padding-bottom:50vh} } div.banner-board-wrapper[_ngcontent-way-c5] {position:absolute;top:0;left:0;width:100%;height:100%} div.banner-board-container[_ngcontent-way-c5] {width:100%;height:100%;overflow:hidden} div.banner-item-container[_ngcontent-way-c5] {width:100%;height:100%;display:flex;flex-flow:row nowrap;justify-content:flex-start;align-items:center} img.banner-item[_ngcontent-way-c5] {flex:0 0 auto;width:100%;height:100%;-o-object-fit:contain;object-fit:contain;pointer-events:none;background-image:linear-gradient(to right,transparent,#000 calc(50% - 50vh / 480 * 1125 / 2),#000 calc(50% + 50vh / 480 * 1125 / 2),transparent)}</style>
    <style>button.bulletin-board-btn[_ngcontent-way-c6] {display:block;margin:0;padding:8px 10px;width:100%;border-radius:0;color:#fff} div.bulletin-board-container[_ngcontent-way-c6] {box-sizing:border-box;height:20px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center} div.bulletin-icon[_ngcontent-way-c6] {flex:0 0 auto;width:20px;height:20px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(/mobile/img/bulletin-icon.a996c907273958ac2d65.svg)} .more-announcement-icon[_ngcontent-way-c6] {flex:0 0 auto;width:70px;height:100%;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(/mobile/img/more-announcement.e9aba3242f773db1453a.png)} div.bulletin-board[_ngcontent-way-c6] {flex:1 1 auto;margin-left:1em;height:20px;overflow:hidden;text-align:start;font-size:14px;font-weight:400;color:#878e97;line-height:20px}</style>
    <style>div.util-bar-container[_ngcontent-way-c7] {padding:0 10px 10px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:center} .daily-gift[_ngcontent-way-c7] {flex:1 0 auto;max-width:50%} .daily-gift-title-row[_ngcontent-way-c7] {display:flex;flex-direction:row;height:24px;align-items:center;margin-bottom:4px} .daily-gift-username-title[_ngcontent-way-c7] {color:#7998b1;font-size:12px;margin-right:8px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap} .daily-gift-logo[_ngcontent-way-c7] {background-image:url(/mobile/img/bgDailyGift.f36b818e9b284312109a.png);background-repeat:no-repeat;background-position:center;background-size:contain;min-width:70px;height:100%} .daily-gift-logo-title[_ngcontent-way-c7] {margin-left:27px;white-space:nowrap;font-family:"PingFangSC-Medium,PingFang SC";font-size:9px;color:#fff} .daily-gift-value[_ngcontent-way-c7] {font-size:19px;width:100%} .daily-gift-value-sign[_ngcontent-way-c7] {font-size:12px} .util-bar[_ngcontent-way-c7] {flex:1 0 auto;display:flex;justify-content:space-between;margin-left:auto;margin-right:16 px;max-width:50%} button.util-btn[_ngcontent-way-c7] {padding:0;width:50px;height:50px;color:#7998b1;font-size:12px;display:inline-flex;flex-flow:column nowrap;justify-content:space-between;align-items:center} span.util-btn-icon[_ngcontent-way-c7] {display:block;width:25px;height:25px;background-size:contain;background-repeat:no-repeat;background-position:center center} span.util-btn-icon.deposit[_ngcontent-way-c7] {background-image:url(/mobile/img/deposit.862cd26ec57e83f225c4.png)} span.util-btn-icon.transfer[_ngcontent-way-c7] {background-image:url(/mobile/img/transfer.a1c5b153615b288c7824.png)} span.util-btn-icon.withdraw[_ngcontent-way-c7] {background-image:url(/mobile/img/withdraw.a41c76f1715915566d01.png)} span.util-btn-icon.ac[_ngcontent-way-c7] {background-image:url(/mobile/img/ac.6e82c2d8f893679d58fb.png)} div.cs-dialog-icon[_ngcontent-way-c7] {display:block;width:99px;height:92px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url(cs_img.c95648a5d29ec2d84117.svg)} div.cs-dialog-title[_ngcontent-way-c7] {margin-top:22px;color:#333;font-size:24px;font-weight:500}</style>
    <style>.home-game-board-ctn[_ngcontent-way-c8] {/*display:flex;*/flex-flow:row nowrap} .side-menu-ctn[_ngcontent-way-c8] {margin-left:10px;display:flex;/*flex-flow:column nowrap;align-items:center;*/justify-content:flex-start;overflow-x:auto;} .side-menu-item[_ngcontent-way-c8] {display:flex;flex-flow:row nowrap;align-items:center;justify-content:center;width:100%;box-sizing:border-box;margin:0 0 5px;padding:10px;font-size:12px;color:#7998b1;background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url(bg.bb9d51fea2a2599c8737.png)} .side-menu-item__tag[_ngcontent-way-c8] {white-space:nowrap} .active-side-menu[_ngcontent-way-c8] {color:#fff;background-image:url(/mobile/img/bg_active.4290af043bcec3617ad5.png)} .side-menu-item__icon[_ngcontent-way-c8] {background-size:cover;background-repeat:no-repeat;background-position:center;width:24px;padding-bottom:24px;margin-right:5px} .game-board-ctn[_ngcontent-way-c8] {margin:0 10px;width:100%} .side-menu-icon-lottery[_ngcontent-way-c8] {background-image:url(/mobile/img/lottery.45d67018e32eec8b862c.png)} .side-menu-icon-lottery.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/lottery_active.88066d8dcaf479878e64.png)} .side-menu-icon-live[_ngcontent-way-c8] {background-image:url(/mobile/img/live.3be00c21be6f02e81489.png)} .side-menu-icon-live.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/live_active.a0070344ba437bf32dea.png)} .side-menu-icon-slot[_ngcontent-way-c8] {background-image:url(/mobile/img/slot.8c1c064dca40f3e255e7.png)} .side-menu-icon-slot.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/slot_active.9725d9aea1b9d087c9b7.png)} .side-menu-icon-sport[_ngcontent-way-c8] {background-image:url(/mobile/img/sport.56210547767ef73a4d32.png)} .side-menu-icon-sport.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/sport_active.d66e7bcb8a1eeb5070c7.png)} .side-menu-icon-fishing[_ngcontent-way-c8] {background-image:url(/mobile/img/fishing.149177d7d963fea179e2.png)} .side-menu-icon-fishing.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/fishing_active.016cd2b3678134b02ace.png)} .side-menu-icon-boardgame[_ngcontent-way-c8] {background-image:url(/mobile/img/boardgame.201c62bfbf568040859b.png)} .side-menu-icon-boardgame.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/boardgame_active.eb4ce6f334b0fc8e9137.png)} .side-menu-icon-esport[_ngcontent-way-c8] {background-image:url(/mobile/img/esport.a4eb4a91f21db4f5ee2c.png)} .side-menu-icon-esport.active-side-menu-icon[_ngcontent-way-c8] {background-image:url(/mobile/img/esport_active.23c7638fe647fe2598c0.png)}</style>
    <style>.tab-bar[_ngcontent-way-c10] {box-sizing:content-box;min-height:59px;display:flex;flex-flow:row nowrap;justify-content:space-around;align-items:stretch} .tab-bar__nav-btn[_ngcontent-way-c10] {flex:1 1 0;min-height:49px;color:#5d636e;display:flex;flex-flow:column nowrap;justify-content:flex-start;align-items:center} .tab-bar__nav-btn--active[_ngcontent-way-c10] {color:#0b93ae} .tab-bar__nav-btn__icon[_ngcontent-way-c10] {flex:0 0 auto;display:block;margin-top:6px;width:24px;height:24px;background-size:contain;background-repeat:no-repeat;background-position:center} .tab-bar__nav-btn__icon--home[_ngcontent-way-c10] {background-image:url(/mobile/img/home.93b20d6e835f71c043b8.png)} .tab-bar__nav-btn__icon--activity[_ngcontent-way-c10] {background-image:url(/mobile/img/activity.8a6a35ba2ac648314ace.png)} .tab-bar__nav-btn__icon--cs[_ngcontent-way-c10] {background-image:url(/mobile/img/datin.svg)} .tab-bar__nav-btn__icon--brand[_ngcontent-way-c10] {background-image:url(/mobile/img/huodong.svg)} .tab-bar__nav-btn__icon--my[_ngcontent-way-c10] {background-image:url(/mobile/img/my.87c43b85171cb8232892.png)} .tab-bar__nav-btn--active[_ngcontent-way-c10] > .tab-bar__nav-btn__icon--home[_ngcontent-way-c10] {background-image:url(/mobile/img/active_home.485e6c98acecf897b8ba.png)} .tab-bar__nav-btn--active[_ngcontent-way-c10] > .tab-bar__nav-btn__icon--activity[_ngcontent-way-c10] {background-image:url(/mobile/img/active_activity.0eee109d4b6a4ccedf91.png)} .tab-bar__nav-btn--active[_ngcontent-way-c10] > .tab-bar__nav-btn__icon--cs[_ngcontent-way-c10] {background-image:url(/mobile/img/active_cs.9be7ce116557877dec91.png)} .tab-bar__nav-btn--active[_ngcontent-way-c10] > .tab-bar__nav-btn__icon--brand[_ngcontent-way-c10] {background-image:url(/mobile/img/active_brand.26b0bef9602b57eac72e.png)} .tab-bar__nav-btn--active[_ngcontent-way-c10] > .tab-bar__nav-btn__icon--my[_ngcontent-way-c10] {background-image:url(/mobile/img/active_my.030b4715dce6d516f9c8.png)} .tab-bar__nav-btn__title[_ngcontent-way-c10] {flex:0 0 auto;display:block;margin-top:6px;color:inherit;font-size:10px;font-weight:400;line-height:14px}</style>
    <style>[_nghost-way-c14] {box-sizing:border-box;position:absolute;top:0;left:0;bottom:0;right:0;width:100%;height:100%;border-radius:inherit;background-color:transparent;display:flex;flex-flow:column nowrap;justify-content:center;align-items:center} .backdrop[_nghost-way-c14] {background-color:rgba(0,0,0,.5)}</style>
    <style>.mat-progress-spinner {display:block;position:relative} .mat-progress-spinner svg {position:absolute;transform:rotate(-90deg);top:0;left:0;transform-origin:center;overflow:visible} .mat-progress-spinner circle {fill:transparent;transform-origin:center;transition:stroke-dashoffset 225ms linear} ._mat-animation-noopable.mat-progress-spinner circle {transition:none;animation:none} .mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] {animation:mat-progress-spinner-linear-rotate 2s linear infinite} ._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] {transition:none;animation:none} .mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] circle {transition-property:stroke;animation-duration:4s;animation-timing-function:cubic-bezier(.35,0,.25,1);animation-iteration-count:infinite} ._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-animation[mode=indeterminate] circle {transition:none;animation:none} .mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] {animation:mat-progress-spinner-stroke-rotate-fallback 10s cubic-bezier(.87,.03,.33,1) infinite} ._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] {transition:none;animation:none} .mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] circle {transition-property:stroke} ._mat-animation-noopable.mat-progress-spinner.mat-progress-spinner-indeterminate-fallback-animation[mode=indeterminate] circle {transition:none;animation:none} @keyframes mat-progress-spinner-linear-rotate {0% {transform:rotate(0)} 100% {transform:rotate(360deg)} } @keyframes mat-progress-spinner-stroke-rotate-100 {0% {stroke-dashoffset:268.60617px;transform:rotate(0)} 12.5% {stroke-dashoffset:56.54867px;transform:rotate(0)} 12.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(72.5deg)} 25% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(72.5deg)} 25.0001% {stroke-dashoffset:268.60617px;transform:rotate(270deg)} 37.5% {stroke-dashoffset:56.54867px;transform:rotate(270deg)} 37.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(161.5deg)} 50% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(161.5deg)} 50.0001% {stroke-dashoffset:268.60617px;transform:rotate(180deg)} 62.5% {stroke-dashoffset:56.54867px;transform:rotate(180deg)} 62.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(251.5deg)} 75% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(251.5deg)} 75.0001% {stroke-dashoffset:268.60617px;transform:rotate(90deg)} 87.5% {stroke-dashoffset:56.54867px;transform:rotate(90deg)} 87.5001% {stroke-dashoffset:56.54867px;transform:rotateX(180deg) rotate(341.5deg)} 100% {stroke-dashoffset:268.60617px;transform:rotateX(180deg) rotate(341.5deg)} } @keyframes mat-progress-spinner-stroke-rotate-fallback {0% {transform:rotate(0)} 25% {transform:rotate(1170deg)} 50% {transform:rotate(2340deg)} 75% {transform:rotate(3510deg)} 100% {transform:rotate(4680deg)} }</style>
    <style mat-spinner-animation="36">@keyframes mat-progress-spinner-stroke-rotate-36 {0% {stroke-dashoffset:77.59733854366789;transform:rotate(0);} 12.5% {stroke-dashoffset:16.336281798666928;transform:rotate(0);} 12.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(72.5deg);} 25% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(72.5deg);} 25.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(270deg);} 37.5% {stroke-dashoffset:16.336281798666928;transform:rotate(270deg);} 37.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(161.5deg);} 50% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(161.5deg);} 50.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(180deg);} 62.5% {stroke-dashoffset:16.336281798666928;transform:rotate(180deg);} 62.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(251.5deg);} 75% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(251.5deg);} 75.0001% {stroke-dashoffset:77.59733854366789;transform:rotate(90deg);} 87.5% {stroke-dashoffset:16.336281798666928;transform:rotate(90deg);} 87.5001% {stroke-dashoffset:16.336281798666928;transform:rotateX(180deg) rotate(341.5deg);} 100% {stroke-dashoffset:77.59733854366789;transform:rotateX(180deg) rotate(341.5deg);} }</style>
    <style mat-spinner-animation="18">@keyframes mat-progress-spinner-stroke-rotate-18 {0% {stroke-dashoffset:23.876104167282428;transform:rotate(0);} 12.5% {stroke-dashoffset:5.026548245743669;transform:rotate(0);} 12.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(72.5deg);} 25% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(72.5deg);} 25.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(270deg);} 37.5% {stroke-dashoffset:5.026548245743669;transform:rotate(270deg);} 37.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(161.5deg);} 50% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(161.5deg);} 50.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(180deg);} 62.5% {stroke-dashoffset:5.026548245743669;transform:rotate(180deg);} 62.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(251.5deg);} 75% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(251.5deg);} 75.0001% {stroke-dashoffset:23.876104167282428;transform:rotate(90deg);} 87.5% {stroke-dashoffset:5.026548245743669;transform:rotate(90deg);} 87.5001% {stroke-dashoffset:5.026548245743669;transform:rotateX(180deg) rotate(341.5deg);} 100% {stroke-dashoffset:23.876104167282428;transform:rotateX(180deg) rotate(341.5deg);} }</style>
    <style>.lottery-board-ctn[_ngcontent-way-c15] {/*display:flex;*/flex-flow:column wrap;justify-content:flex-start;height:40%;width:95%;} .lottery-btns-ctn[_ngcontent-way-c15] {display:flex;flex-flow:row wrap;justify-content: space-between; } .lottery-btn[_ngcontent-way-c15] {display:flex;flex-flow:column nowrap;align-items:center;width:24%;box-sizing:border-box;border-radius:10px;padding:10px;margin: 0  0 5px 0; font-size:12px;background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url(/mobile/img/lottery_bg.5b0db9f6401c9434ec75.png)} .title[_ngcontent-way-c15] {color:#a9bed8} .sub-title[_ngcontent-way-c15] {color:#7998b1} .lottery-btn[_ngcontent-way-c15]:first-child {/*border-radius:10px 0 0*/} .lottery-btn[_ngcontent-way-c15]:nth-child(4) { /*border-radius:0 10px 0 0*/} .lottery-btn[_ngcontent-way-c15]:nh-child(5) {border-radius:0 0 0 10px} .lottery-btn[_ngcontent-way-c15]:nth-child(8) { /* border-radius:0 0 10px*/} .lottery-btn-icon[_ngcontent-way-c15] {background-size:cover;background-repeat:no-repeat;background-position:center;width:50px;height:50px} .lottery-lobby[_ngcontent-way-c15] {background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url(/mobile/img/lottery_lobby.3ebc4b9cfc4f865db015.png);border-radius:10px;width:100%;padding-bottom:calc((100% * 144 / 314))} .game-1[_ngcontent-way-c15] {background-image:url(/mobile/img/1.94732245082a337d973a.png)} .game-6[_ngcontent-way-c15] {background-image:url(/mobile/img/6.f45183d305b4055e0491.png)} .game-26[_ngcontent-way-c15] {background-image:url(/mobile/img/26.b99820baf827d5c86613.png)} .game-27[_ngcontent-way-c15] {background-image:url(/mobile/img/27.b66a27dc46bf56e60c6a.png)} .game-28[_ngcontent-way-c15] {background-image:url(/mobile/img/28.5004283522d159495603.png)} .game-32[_ngcontent-way-c15] {background-image:url(/mobile/img/32.552f1aa9ef799e732bce.png)} .game-43[_ngcontent-way-c15] {background-image:url(/mobile/img/43.c402a9fb3d3945ac39b8.png)} .game-45[_ngcontent-way-c15] {background-image:url(/mobile/img/45.36dd88e459f576fea52e.png)}</style>
    <style>.mat-dialog-container {display:block;padding:24px;border-radius:4px;box-sizing:border-box;overflow:auto;outline:0;width:100%;height:100%;min-height:inherit;max-height:inherit} @media (-ms-high-contrast:active) {.mat-dialog-container {outline:solid 1px} } .mat-dialog-content {display:block;margin:0 -24px;padding:0 24px;max-height:65vh;overflow:auto;-webkit-overflow-scrolling:touch} .mat-dialog-title {margin:0 0 20px;display:block} .mat-dialog-actions {padding:8px 0;display:flex;flex-wrap:wrap;min-height:52px;align-items:center;margin-bottom:-24px} .mat-dialog-actions[align=end] {justify-content:flex-end} .mat-dialog-actions[align=center] {justify-content:center} .mat-dialog-actions .mat-button-base+.mat-button-base {margin-left:8px} [dir=rtl] .mat-dialog-actions .mat-button-base+.mat-button-base {margin-left:0;margin-right:8px}</style>
    <style>div.dialog-wrapper[_ngcontent-way-c22] {box-sizing:border-box;padding:16px 16px 10px} div.content-wrapper[_ngcontent-way-c22] {display:flex;flex-flow:column nowrap;justify-content:flex-start;align-items:center} div.content-plain-text[_ngcontent-way-c22] {color:#333;font-size:20px;font-weight:500;line-height:28px;text-align:center;word-break:break-word;white-space:pre-line} mat-dialog-content[_ngcontent-way-c22] {margin:0 -40px;padding:0 40px;max-height:45vh} mat-dialog-actions[_ngcontent-way-c22] {margin:20px 0 0;padding:0;min-height:44px;display:flex;flex-flow:row nowrap;justify-content:space-between;align-items:stretch} button[_ngcontent-way-c22] {flex:1 1 100%;padding:10px;border-radius:10px;font-size:18px;font-weight:500;line-height:25px;color:#fff;text-align:center} button[_ngcontent-way-c22]:not(:first-child) {margin-left:10px} button.ok-btn[_ngcontent-way-c22] {background:linear-gradient(to bottom,#13a2ba,#087c95)} button.cancel-btn[_ngcontent-way-c22] {background:linear-gradient(to bottom,#9ea3aa,#59585d)}</style>
    <body style="color: white; background-color: #17252f;">
    <jx-root ng-version="8.2.12">
      <router-outlet></router-outlet>
      <jx-main-wrapper _nghost-way-c0="" class="ng-star-inserted">
            <div class="top">
                <div class="logo"><img src="../../mobile/img/jx-logo.443c8ffbee580d3672f7.png"/></div>
                <div class="money">
                    <span>R$</span>
                    <span>{{$user['coin']}}</span>
                    <div class="sx"><img src="../../mobile/img/sx.png" /></div>
                    <div class="qb"><img src="../../mobile/img/qb.png" /></div>
                </div>
                <div class="yh">
                     <img src="../../mobile/img/yh.png" /> 
                </div>
            </div>
            <div class="centen"></div>
            <div class="centen_tab">
                  <div class="centen_list centen_on">
                      <img src="../../mobile/img/fx.png" />
                      <p>分享</p>
                  </div>
                  <div class="centen_list">
                      <img src="../../mobile/img/dl.png" style="width:35px;height:35px;margin:-2px 0 -20px 0;" />
                      <p>代理</p>
                  </div>
                  <div class="centen_list">
                      <img src="../../mobile/img/flzh.png" />
                      <p>用户</p>
                  </div>
            </div>
            <div class="centen_show"  style="display:block;" >
             @include('mobile.share.invite') 
            </div>
            <div class="centen_show" >
                  <div class="times">
                      <div class="times_list times_on">今日</div>
                      <div class="times_list">昨日</div>
                      <div class="times_list">一周</div>
                      <div class="times_list">本月</div>
                      <div class="times_list">本年</div>
                  </div>
                  <div class="times_xk">
                        <div class="times_div"  style="display:block;">
                              <div class="times_fl">
                                    <span class="b1"></span>
                                    <div class="text">一号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b2"></span>
                                    <div class="text">二号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b3"></span>
                                    <div class="text">三号代理</div>
                                    <label>0</label>
                              </div>
                        </div>
                        <div class="times_div">
                        <div class="times_fl">
                                    <span class="b1"></span>
                                    <div class="text">一号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b2"></span>
                                    <div class="text">二号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b3"></span>
                                    <div class="text">三号代理</div>
                                    <label>0</label>
                              </div>
                        </div>
                        <div class="times_div">
                        <div class="times_fl">
                                    <span class="b1"></span>
                                    <div class="text">一号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b2"></span>
                                    <div class="text">二号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b3"></span>
                                    <div class="text">三号代理</div>
                                    <label>0</label>
                              </div>
                        </div>
                        <div class="times_div">
                        <div class="times_fl">
                                    <span class="b1"></span>
                                    <div class="text">一号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b2"></span>
                                    <div class="text">二号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b3"></span>
                                    <div class="text">三号代理</div>
                                    <label>0</label>
                              </div>
                        </div>
                        <div class="times_div">
                        <div class="times_fl">
                                    <span class="b1"></span>
                                    <div class="text">一号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b2"></span>
                                    <div class="text">二号代理</div>
                                    <label>0</label>
                              </div>
                              <div class="times_fl">
                                    <span class="b3"></span>
                                    <div class="text">三号代理</div>
                                    <label>0</label>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="centen_show" >
                <div class="yh_top">
                      <div class="yh_t_list">
                          <h2>0</h2>
                          <p>专属会员</p>
                      </div>
                      <div class="yh_t_list">
                         <h2>0</h2>
                          <p>专属会员</p>
                      </div>
                </div>
                <div class="yh_table">
                    <table>
                        <thead>
                        <tr>
                            <td>序号</td>
                            <td>名字</td>
                            <td>数量</td>
                            <td>时间</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>膝盖中箭</td>
                            <td>1</td>
                            <td>2023/07/08</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div _ngcontent-way-c3="" class="header-view__footer-row-wrapper safe-area-bottom safe-area-left safe-area-right" jxsafeareabottom="" jxsafearealeft="" jxsafearearight="">
              <jx-footer-row _ngcontent-way-c1="" _nghost-way-c9="">
                <jx-tab-bar _ngcontent-way-c1="" _nghost-way-c10="">
                  
                @include('mobile.common.footer') 
                  
                 
                </jx-tab-bar>
              </jx-footer-row>
            </div>
      </jx-main-wrapper>
    </jx-root>
    <script>
        $(function(){
          $('.sx').click(function(){
              location.reload(true)
          })
          $('.centen_list').click(function(){
            $(this).addClass('centen_on').siblings().removeClass('centen_on')
            var index1 =$(this).index()
            console.log(index1)
            $('.centen_show').hide().eq(index1).show()
          })
          $('.times_list').click(function(){
            $(this).addClass('times_on').siblings().removeClass('times_on')
            var index1 =$(this).index()
             $('.times_div').hide().eq(index1).show()
          })
        })
    </script>          
    </body>