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

function ajaxReturnFun(r){
	switch(r.status){
		case -1:
			alert('参数错误:'+r.msg); return;
		case -2:
			alert('未登录'); return;
		case -3:
			alert('数据库错误:'+r.msg); return;
	}
	switch(r.act){
		case '1001':
			if(r.status){
				window.location.href = GROUP+'/User/init/uid/'+r.data.uid;
			}else{
				alert(r.msg);
			}
			return;
		case '1003':
			if(r.status == 1){
				window.location.href = urlCode.decode(getCookie('return_url'));
			}else if(r.status == 2){
				window.location.href = GROUP + '/Index/index';
			}else{
				alert(r.msg);
			}
			return;
		case '1002':
			if(r.status){
				alert('注册成功');
				actRequest('account='+getCookie('uaccount')+'&password='+getCookie('upassword'), '1003');
			}else{
				if(confirm('详情信息添加失败')){
					return false;
				}else{
					actRequest('account='+getCookie('uaccount')+'&password='+getCookie('upassword'), '1003');
				}
			}
			return;
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