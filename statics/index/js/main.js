/*技术支持www.dookay.com*/
$(function(){
	$.metadata.setType("attr","data-meta");
//水印
	$.each($('.j_watermark'),function(i,n){
		if(typeof($(n).attr('watermark')) != 'undefined')
			$(n).watermark($(n).attr('watermark'));
	});
//tab
	$(".j_silde").tabs("ul.j_sildeCnt > li", {
		effect: 'fade',
		fadeInSpeed: 1500,
		fadeOutSpeed: 1500,
		rotate: true
	}).slideshow({autoplay:true,interval:4000,autopause:false});
	$('.j_tabs').tabs('.j_tabCnt');
	$('.j_tabAjax').each(function(index, element) {
		var tab=$(this).children('a'),panne=$(this).parent().find('.j_tabAjax-cnt');
		tab.click(function(){
			var index=$(this).index();
			$(this).addClass('current').siblings().removeClass('current');
			panne.hide().eq(index).show();
			if(! $(this).data('load')){
				$(this).data('load','true');
				panne.eq(index).load($(this).attr('href'));
			}
			return false;
		});
		tab.first().trigger('click');
    });
	
//滑动
	$('.j_scrollSize').each(function() {
        var data=$(this).metadata();
		if(data.scrollAuto){
			//自动滑动
		}else{
			if(data.seek){
				$(this).scrollable({onSeek:function(){
					if(typeof(eval(data.seek))=="function"){
						eval(data.seek+'(this)');
					}	
				}});
			}else{
				var direction=false,cycle=false;
				if(data.direction == 'true'){
					direction=true;	
				}
				if(data.cycle == 'true'){
					cycle=true;	
				}
				if ($(this).parent().css('display') != 'none') {
					$(this).scrollable({size:data.size,vertical:direction,circular:true});
				}
			}
		}
    });
	
	$('.j_scrollPage').each(function(){
		var itemsSize=$(this).parent().find('.items').children().length - 2,
			itemsIndex=1,
			scrollInfo=$(this).find('.j_info');
		scrollInfo.html('1/'+itemsSize);
		$(this).find('.j_prev').click(function(){
			$(this).siblings('.prev').trigger('click');
			itemsIndex=itemsIndex-1;
			if(itemsIndex<1)itemsIndex=1;
			scrollInfo.html(itemsIndex+'/'+itemsSize);
		});
		$(this).find('.j_next').click(function(){
			$(this).siblings('.next').trigger('click');	
			itemsIndex=itemsIndex+1;
			if(itemsIndex>itemsSize) itemsIndex=itemsSize;
			scrollInfo.html(itemsIndex+'/'+itemsSize);
		});
	});
	function activityTop(p){
		$('.j_activityTop > strong').text(p.getItems().eq((p.getIndex())).metadata().title);
		
	}
//hover
	if(isNotCss3() == 6){
		$('.j_hover').each(function() {
            var hoverTag=$(this).metadata().hoverTag;
			if(!hoverTag){
				hoverTag='li';
			}
			var dataHover=$(this).data("hovers")
			if(dataHover){
				$(this).removeData("hovers");
				$(this).children(hoverTag).unbind("hover");
			}
			dataHover='bindHover';
			$(this).data("hovers", dataHover);
			$('.j_hover >'+hoverTag).hover(function(){
				$(this).addClass('hover');
			},function(){
				$(this).removeClass('hover');
			});
        });
		
		var firstTag=$('.j_first').metadata().firstTag;
		if(!firstTag){
			firstTag='li';
		}
		$('.j_first >'+firstTag+':first').addClass('first');
	}
//判断浏览器版本
	function isNotCss3(){
		if ($.browser.msie){
			var $v=parseInt($.browser.version);
			if($v<9){
				 return $v;	
			}else{
				return false;	
			}
		}
		return false;
	}
//画廊
	$('.j_gallery').each(function() {
        var picCnt=$(this).parent().find('.j_galleryCnt');
			thumb=$(this).children('a');
		if(picCnt.length < 1) picCnt=$(this).parents('.j_galleryParent').find('.j_galleryCnt');
		thumb.click(function(){
			if(!$(this).hasClass('current')){
				$(this).addClass('current').siblings().removeClass('current');
				var picLink=$(this).metadata().pic;
				picCnt.html('<img style="display:none" src="'+picLink+'" />');
				picCnt.find('img').load(picLink,function(){
					$(this).fadeIn();
				});
			}
		});
		if(thumb.filter('.current').length > 0){
			alert('ttt');
			thumb.filter('.current').trigger('click');	
		}else{
			thumb.first().trigger('click');	
		};
    });
//浮动的联系我们
	$('#contact_float > a.click').toggle(function(){
		$(this).parent().animate({'right':0},300);	
	},function(){
		$(this).parent().animate({'right':-143},300)	
	});
//下拉列表
	$('.j_select').selectbx({selectbd:'.show',callback:function(value,node){
		var fun=node.metadata().fun;
		if(fun){
			if(typeof(eval(fun))=="function"){
				eval(fun+'(value)');
			}
		}
	}});
//弹出框
	$("a[rel]").overlay({mask:{
        color: '#000',
        opacity:0.5//,
		//closeSpeed:0,
		//loadSpeed:0
      },
      closeOnClick:false,
	  top:'center'
	});
});
