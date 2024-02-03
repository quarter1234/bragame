var fv = true;
$(function(){
	var str = `<div id="popup_box" style="width: 100%;height: 100vh;display:none; z-index: 1000; margin: 0px;padding: 0px;top: 0px;left: 0px; position: fixed; background-color: rgba(55,55,55,.6);">
		<div style="width: 320px;height: 450px;text-align: center; margin: 0 auto;margin-top: 50vh;position: relative; top: -225px;">
			<img onclick="close_popup()" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYBAMAAAASWSDLAAAAJ1BMVEX///8AAAD///////////////////////////////////////////8wxMEwAAAADXRSTlOZADkSkolvZUg2RYOCW5ZR1wAAAJFJREFUGNNVkL0NwlAMhD8Fwo+gcVIgUSViAcIEtHQZgZISNqCipmABNmAERsu9KIl0V1j+7Cc/n4mI8tXmt0YJyu9IS5HgQ69Lgj2DvoL3COugPI8wb9gx6cERtic4/GDGUyGqLFRccYUsijoqWNACdUQB5EBqqSEZ2DMb4KMVNunTv4q2ji1qFsyc2baD2Kk6LwwVls0SSuMAAAAASUVORK5CYII=" style="top: 30px;right: 0px;position: absolute;">
			<img src="./zhong.png" style="width: 320px;"><br/>
			<span id="popup_text" style="font-size: 16px;font-weight: 700;top: -50px;position: relative; color: #ffdc37;">恭喜您中奖了，详情请查看投注记录哦！</span>
		</div>
	</div>`;
	$('body').append(str);
});
function list_tag_curr(obj,index){
	$(obj).addClass('curr').siblings('i').removeClass('curr');
	$(".wapp_top_midle .tag_det .tag_copy").eq(index).show().siblings().hide();
}
function index_list_tag(lotterylist){
	var html1='',$node1 = $(".wapp_top_midle .list_tag");
	var html2='',$node2 = $(".wapp_top_midle .tag_det");
	for(var o in lotterylist){
		var class1='';
		if(o<=5){
			html2 += index_list_tag_info(lotterylist[o],o);
			if(o==5){
				html1 += '<i onclick="list_tag_curr(this,'+o+')" class="">'+lotterylist[o].title+'</i>';
			}else{
				if(o==0){
					class1 = 'curr';
				}
				html1 += '<i onclick="list_tag_curr(this,'+o+')" class="'+class1+'">'+lotterylist[o].title+'</i><em>|</em>';
			}
			
		}
	};
	$node1.html(html1);
	$node2.html(html2);
}
function index_list_tag_info(openinfo,index){

	var taginfohtml='',display='none';
	if(openinfo.opencode){
		var array = (openinfo.opencode).split(",");
	}else{
		var array = "";
	}
	var sum = parseInt(array[0])+parseInt(array[1])+parseInt(array[2]);
	var smallbig='',oddeven='';
	if(sum>10)
		smallbig='大';
	else
		smallbig='小';
	if(sum%2!=0)
		oddeven='单';
	else
		oddeven='双';
	if(index==0)display = 'block';
	taginfohtml += '<div class="tag_copy" style="display: '+display+';">';
	taginfohtml += '<div class="tag_top">';
	taginfohtml += '<img class="img1" src="'+WebConfigs["ROOT"]+'/resources/images/game/img4.png">';
	taginfohtml += '<span>';
	taginfohtml += '<img src="'+WebConfigs["ROOT"]+'/resources/images/game/k3_'+array[0]+'.jpg">';
	taginfohtml += '<i>+</i>';
	taginfohtml += '<img src="'+WebConfigs["ROOT"]+'/resources/images/game/k3_'+array[1]+'.jpg">';
	taginfohtml += '<i>+</i>';
	taginfohtml += '<img src="'+WebConfigs["ROOT"]+'/resources/images/game/k3_'+array[2]+'.jpg">';
	taginfohtml += '<i>+</i>';
	taginfohtml += '<em>'+sum+'</em>';
	taginfohtml += '</span>';
	taginfohtml += '<input class="btn radius bg_red" value="立即投注" type="button" onclick="openMenuUrl(\''+host+'/Game.k3?code='+openinfo.name+'\',true)">';
	taginfohtml += '</div>';
	taginfohtml += '<div class="tag_down">';
	taginfohtml += '<span>当前期：第 <i class="c_red">'+openinfo.expect+'</i>期</span>';
	taginfohtml += '<span>开奖号码：<i class="c_red">'+openinfo.opencode+'</i></span>';
	taginfohtml += '和值：<i class="c_red">'+sum+'</i></span>';
	taginfohtml += '形态：<em class="bg_zyell">'+smallbig+'</em> | <em class="bg_green">'+oddeven+'</em></span>';
	taginfohtml += '</div></div>';
	return taginfohtml;
}

  /**
   * 当天投注记录
   * @param shortName
   */
   function getUserBetsListToday2(_lotteryname) {
   	lotteryname = _lotteryname?_lotteryname:lotteryname;
   	var url = apirooturl + 'betslisttoday';
$.post(url,{"lotteryname": lotteryname,'jqueryGridPage': jqueryGridPage,'jqueryGridRows': jqueryGridRows},function(data){
			var is_show = false;
			var data = JSON.parse(data),root = null;
			if(data.sign == false&&data.data.islogin != 1&&fv){
				fv = false;
				alert("您已下线，请重新登录！");
				window.location.href = "/Public.LoginOut.do";
			}
			root = data.root;
			var val;
			
	
					});
   }
  function getUserBetsListToday(_lotteryname) {
    if(!user || user.islogin!=1){
      return false;
    }
    lotteryname = _lotteryname?_lotteryname:lotteryname;
    var tabs = $("#userBetsListToday");
    tabs.empty();
    var url = apirooturl + 'betslisttoday';
    var pagination = $.pagination({
      render: '.paging',
      pageSize: jqueryGridRows,
      pageLength: 7,
      ajaxType: 'post',
      //hideInfos: false,
      hideGo: true,
      ajaxUrl: url,
      ajaxData: {
        "lotteryname": lotteryname,'jqueryGridPage': jqueryGridPage,'jqueryGridRows': jqueryGridRows
      },
      complete: function() {},
      success: function(data) {
        tabs.empty();
        var is_show = false;
        $.each(data, function(index, val) {
       
          var html = '<tr id="'+val.trano+'">';
          html += '<td> <a href="javascript:getBillInfo(\''+val.trano+'\')">' + val.trano + '</a></td>';
          html += '<td>' + val.expect + '</td>';
          html += '<td>' + val.opencode + '</td>';
          html += '<td>' + val.playtitle + '</td>';
          html += '<td>' + val.mode + '</td>';
          html += '<td>' + val.amount + '</td>';
          html += '<td>' + (val.okamount ? val.okamount : 0) + '</td>';
          html += '<td>' + val.oddtime + '</td>';
          html += '<td>';
          //'<td>' + val.betsTimes + '</td>' +
          if(val.isdraw == -1) { // 未中奖绿色
            html += '<span style="color:green">未中奖</span>';
          } else if(val.isdraw == 1) { // 已中奖红色
            html += '<span style="color:red">已中奖</span>';
          }else if(val.isdraw == -2) {
            html += '<del>已撤单</del>';
          }else if(val.isdraw == 0) {
            html += '<span>未开奖</span>';
          }else{
            html += '<span>未知状态</span>';
          }
          html += '</td>';
          html += '</tr>';
          tabs.append(html);
        });



      },
      pageError: function(response) {

      },
      emptyData: function() {}
    });
   
    pagination.init();
  }



function index_cplist(lotterylist){ 
	var html='',$node = $(".allcplist .cpitem");
	for(var o in lotterylist){
		var openinfo = lotterylist[o];
		if(!openinfo.opencode)openinfo.opencode='0,0,0';
		var array = (openinfo.opencode).split(",");
		var sum = parseInt(array[0])+parseInt(array[1])+parseInt(array[2]);
		var smallbig='',oddeven='';
		if(sum>10)
			smallbig='大';
		else
			smallbig='小';
		if(sum%2!=0)
			oddeven='单';
		else
			oddeven='双';
		html += '<li>';
		html += '<a href="javascript:void(0);" onclick="openMenuUrl(\''+host+'/Game.k3?code='+lotterylist[o].name+'\',true)">';
		html += '<dl>';
		html += '<dt>';
		html += '<img src="'+WebConfigs["ROOT"]+'/resources/images/game/img4.png" width="62" height="62">';
		
		html += '</dt>';
		html += '<dd>';
		html += '<h4>'+lotterylist[o].title+'</h4>';
		html += '<p></p>';
		html += '</dd>';
		html += '</dl>';
		html += '</a>';
		html += '<div class="det">';
		html += '<p>当前期：第 <i class="c_red">'+lotterylist[o].expect+'</i> 期</p>';
		html += '<p>开奖号码：<i class="c_red">'+lotterylist[o].opencode+'</i></p>';
		html += '<p>';
		html += '<span>和值：'+sum+'</span>';
		html += '<span>形态：<em class="bg_zyell">'+smallbig+'</em> | <em class="bg_green">'+oddeven+'</em></span></p>';
		
		html += '<div><a class="bg_red" onclick="openMenuUrl(\''+host+'/Game.k3?code='+lotterylist[o].name+'\',true)">立即投注</a><a class="bg_org" onclick="openMenuUrl(\''+host+'/Game.trend?code='+lotterylist[o].name+'\',false)">走势详情</a></div>';
		html += '</div>';
		html += '</li>';
	};
	$node.html(html);
	//onclick="javascript:Gameinit('ahk3');"
}
function close_popup(){
	$("#popup_box").css("display","none");
}