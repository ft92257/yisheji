
function actRequest(data, act){
	$.ajax({
		'type' : 'post',
		'url' : GROUP+'/Base/actRequest',
		'data': data+'&act='+act,
		'dataType': 'json',
		'async' : false,
		'success': function(r){
			ajaxReturnFun(r);
		}
	});
}

function showLogin(){
	var login_layer = $.layer({
		shade : [0.5 , '#000' , true],
		type : 1,
		area : ['auto','auto'],
		title : false,
		border : [0],
		page : {dom : '.layer_notice'},
		close : function(index){
			layer.close(index);
		}
	});
}

function showAlert(status, msg, url){
	var str = [];
	str.push('<div class="layer_alert" style="display:none; padding:10px"><table class="layerTable"><tr>');
	if(status == 1){
		str.push('<td class="pLeft">');
		str.push('<td class="pLeft"><img src="'+STATICS+'/images/1212121xiao.jpg" /></td>');
		str.push('<td class="zT"><div class="cred">成功</div>');
		if(msg != null){
			str.push('<p>'+msg+'</p>');
		}
		str.push('</td>');
	}
	if(status == 2){
		str.push('<td class="pLeft">');
		str.push('<td class="pLeft"><img src="'+STATICS+'/images/1212121ku.jpg" /></td>');
		str.push('<td class="zT"><div class="cred">失败</div>');
		if(msg != null){
			str.push('<p>'+msg+'</p>');
		}
		str.push('</td>');
	}
	str.push('</tr></table></div>');
	var html = str.join('');
	var alert_layer = $.layer({
		shade : [0.5 , '#000' , true],
		type : 1,
		area : ['auto','auto'],
		title : false,
		border : [0],
		page : {html : html},
		close : function(index){
			layer.close(index);
		}
	});
	setTimeout(function(){url == null ? window.location.reload() : window.location.href = url;},5000);
}

function ajaxReturnFun(r){
	switch(r.act){
		case '105':
			flag = r.status ? 0 : 1; return;
		case '106':
			flag = r.status ? 0 : 1; return;
		case '108':
			flag = r.status ? 0 : 1; return;
		case '9105':
			alert(r.msg);return;
			if(r.status > 0){
				obj.html('<i class="ico ico-10"></i>已收藏');
				obj.parent().css({'display':'block'});
				obj.parent().unbind('mouseover').unbind('mouseout');
				obj.parent().parent().find('a[class=pic]').unbind('mouseover').unbind('mouseout');
			}else{
				if(confirm('您还没有登录,是否去登录?')){
					window.location.href=GROUP+'/User/login';
				} else {
					return false;
				}
			}
	}

	switch(r.status){
		case -1:
			alert('参数错误:'+r.msg); return;
		case -2:
			showLogin(); return;
		case -3:
			alert('数据库错误:'+r.msg); return;
		case 1:
			showAlert(1, msg, url); return;
		case 0:
			showAlert(2, msg, url); return;
	}
}
$(function(){
	$(".pic,.status").each(function(){
		if($(this).attr('data-collect') != '1'){
			$(this).bind('mouseover',function(){
				
				$(this).parent().find('div[class=status]').css({'display':'block'});
			}).bind('mouseout',function(){
				$(this).parent().find('div[class=status]').css({'display':'none'});
			});
		}
	});
	
	$("span[class=sp_collect]").bind('click',function(){
		var obj = $(this); 
		actRequest('type='+$(this).attr('data-type')+'&target='+$(this).attr('data-id'), '9105');
	});
});

