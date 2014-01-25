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


function ajaxReturnFun(r){
	switch(r.status){
		case -1:
			alert('参数错误:'+r.msg); return;
		case -2:
			showLogin(); return;
		case -3:
			alert('数据库错误:'+r.msg); return;
	}
	switch(r.act){
		case '105':
			flag = r.status ? 0 : 1; return;
		case '106':
			flag = r.status ? 0 : 1; return;
		case '108':
			flag = r.status ? 0 : 1; return;
	}
	if(r.msg != null){
		alert(r.msg);
	}
	r.url == null ? window.location.reload() : window.location.href = r.url;
}