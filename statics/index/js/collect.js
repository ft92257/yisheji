$(".pic,.status").each(function(){
	if($(this).attr('data-collect') != '1'){
		$(this).bind('mouseover',function(){
			$(this).parent().find('div[class=status]').css({'display':'block'});
		});
	}
});

$(".pic,.status").each(function(){
	if($(this).attr('data-collect') != '1'){
		$(this).bind('mouseout',function(){
			$(this).parent().find('div[class=status]').css({'display':'none'});
		});
	}
});

$("span[class=sp_collect]").bind('click',function(){
	var obj = $(this); 
	actRequest('type='+$(this).attr('data-type')+'&target='+$(this).attr('data-id'), '9105');
	$.ajax({
		'type':'post',
		'url':GROUP+'/Collect/add',
		'data':{'type':$(this).attr('data-type'),'target':$(this).attr('data-id')},
		'success':function(r){
			if(r > 0){
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
	});
});


$pageStr1     =   str_replace(
        array('%header%','%nowPage%','%totalRow%','%totalPage%),
        array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages),
        $this->config['theme']
     );

$pageStr2     =   str_replace(
        array('%upPage%','%downPage%','%first%','%prePage%','%linkPage%','
        		%nextPage%','%end%'),
        array($upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),
        $this->config['theme']
     );
    return "<div class = 'pageinfo'>{$pageStr1}</div><div class='pagemenu'>{$pageStr2}</div>";
}