$(function(){
	$("span[class=sp_collect]").bind('click',function(){
		var obj = $(this); 
		$.ajax({
			'type':'post',
			'url': GROUP+'/Base/actRequest',
			'data': 'type='+$(this).attr('data-type')+'&target='+$(this).attr('data-id')+'&act=9105',
			'dataType': 'json',
			'async' : false,
			'success' : function(r){
				if(r.status == -2){
					showLogin();
				}
				if(r.status ==1){
					obj.html('<i class="ico ico-10"></i>已收藏');
					obj.parent().css({'display':'block'});
				}
			}
		});
	});
});
