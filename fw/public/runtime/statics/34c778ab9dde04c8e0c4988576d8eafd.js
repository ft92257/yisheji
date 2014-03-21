
function upd_file(obj,file_id)
{	

	$("input[name='"+file_id+"']").bind("change",function(){	
		if($("#image_box").find(".image_item").length>=4)
		{
			$.showErr("图片不能超过四张");
			return false;
		}
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/upload_item.php',
				    secureuri:false,
				    fileElementId:file_id,
				    dataType: 'json',
				    success: function (data, status)
				    {
				   		$(obj).show();
				   		$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				   		if(data.status==1)
				   		{
				   			$("#image_box_outer").show();
				   			$("#image_box").append('<div class="image_item">'+
									'<span></span>'+
									'<img src="'+data.thumb_url+'" width=50 height=50 />'+	
									'<input type="hidden" name="image[]" value="'+data.url+'"  />'+	
								'</div>');
				   			bind_del_image();
				 
				   		}
				   		else
				   		{
				   			$.showErr(data.msg);
				   		}
				   		
				    },
				    error: function (data, status, e)
				    {
						$.showErr(data.responseText);;
				    	$(obj).show();
				    	$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				    }
			   }
		   );
		  $("input[name='"+file_id+"']").unbind("change");
	});	
}
$(document).ready(function(){
	bind_item_form();
	bind_del_image();
	bind_add_item();
	bind_cancel_item();
	bind_del_item();
	bind_submit_deal_btn();
});
function bind_item_form()
{
	$("#item_form").find("input[name='price']").bind("keyup blur",function(){
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>8)
		{
			$(this).val($(this).val().substr(0,8));
			$("#support_price").html($(this).val().substr(0,8));
			$("#support_price_btn").html($(this).val().substr(0,8));
		}
		else
		$("#support_price").html($(this).val());
		$("#support_price_btn").html($(this).val().substr(0,8));
	});
	
	$("#item_form").find("textarea[name='description']").bind("keyup blur",function(){
		$("#repaid_content").html($(this).val());
	});
	
	$("#item_form").find("select[name='is_delivery']").bind("change",function(){
		if($(this).val()==0)
		{
			$("#item_form").find("input[name='delivery_fee']").parent().hide();
			$("#delivery_box").hide();
		}
		else
		{
			$("#item_form").find("input[name='delivery_fee']").parent().show();
			$("#delivery_box").show();
		}
	});
	
	if($("#item_form").find("select[name='is_delivery']").val()==0)
	{
		$("#item_form").find("input[name='delivery_fee']").parent().hide();
		$("#delivery_box").hide();
	}
	else
	{
		$("#item_form").find("input[name='delivery_fee']").parent().show();
		$("#delivery_box").show();
	}
	
	$("#item_form").find("input[name='delivery_fee']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<0)
		{
			$(this).val("");
		}
		else if($(this).val().length>8)
		{
			$(this).val($(this).val().substr(0,8));
			$("#delivery_fee_box").html($(this).val().substr(0,8));
		}
		else
		$("#delivery_fee_box").html($(this).val());

	});
	
	
	$("#item_form").find("select[name='is_limit_user']").bind("change",function(){
		if($(this).val()==0)
		{
			$("#item_form").find("input[name='limit_user']").parent().hide();
			$("#limit_user_box").hide();
		}
		else
		{
			$("#item_form").find("input[name='limit_user']").parent().show();
			$("#limit_user_box").show();
		}
	});
	
	if($("#item_form").find("select[name='is_limit_user']").val()==0)
	{
		$("#item_form").find("input[name='limit_user']").parent().hide();
		$("#limit_user_box").hide();
	}
	else
	{
		$("#item_form").find("input[name='limit_user']").parent().show();
		$("#limit_user_box").show();
	}
	
	
	$("#item_form").find("input[name='limit_user']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>6)
		{
			$(this).val($(this).val().substr(0,6));
			$("#limit_user").html($(this).val().substr(0,6));
			$("#remain_user").html($(this).val().substr(0,6));
		}
		else
		{
			$("#limit_user").html($(this).val());
			$("#remain_user").html($(this).val());
		}

	});

	$("#item_form").find("input[name='repaid_day']").bind("keyup blur",function(){
		
		if($.trim($(this).val())==''||isNaN($(this).val())||parseFloat($(this).val())<=0)
		{
			$(this).val("");
		}
		else if($(this).val().length>6)
		{
			$(this).val($(this).val().substr(0,6));
			$("#repaid_day").html($(this).val().substr(0,6));

		}
		else
		{
			$("#repaid_day").html($(this).val());

		}
	
	});
}
function bind_del_image()
{
	$(".image_item").find("span").bind("click",function(){
		del_image($(this));
	});
}

function del_image(o)
{
	
	$(o).parent().remove();
	if($(".image_item").length==0)
	{
		$("#image_box_outer").hide();
	}
}

function bind_add_item()
{
	
	$("#add_item_btn").bind("click",function(){
		if($(".item_row").length>=10)
		{
			$.showErr("回报项目不能超过10个");
			return;
		}
		$("#add_item_form").slideDown(function(){
			$("#add_item_row").hide();
		});
	});
}

function bind_cancel_item()
{
	$("#cancel_add").bind("click",function(){
		$("#add_item_form").slideUp(function(){
			$("#add_item_row").show();
		});
	});
}

function bind_del_item()
{
	$(".del_item").bind("click",function(){
		var ajaxurl = $(this).attr("href");
		var query = new Object();
		query.ajax = 1;
		$.showConfirm("确定删除该项吗？",function(){
			close_pop();
			$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				data:query,
				type: "POST",
				success: function(ajaxobj){
					if(ajaxobj.status==1)
					{
						if(ajaxobj.info!="")
						{
							$.showSuccess(ajaxobj.info,function(){
								if(ajaxobj.jump!="")
								{
									location.href = ajaxobj.jump;
								}
							});	
						}
						else
						{
							if(ajaxobj.jump!="")
							{
								location.href = ajaxobj.jump;
							}
						}
					}
					else
					{
						if(ajaxobj.info!="")
						{
							$.showErr(ajaxobj.info,function(){
								if(ajaxobj.jump!="")
								{
									location.href = ajaxobj.jump;
								}
							});	
						}
						else
						{
							if(ajaxobj.jump!="")
							{
								location.href = ajaxobj.jump;
							}
						}							
					}
				},
				error:function(ajaxobj)
				{
					if(ajaxobj.responseText!='')
					alert(ajaxobj.responseText);
				}
			});
		});
		
		return false;
	});
}

function bind_submit_deal_btn()
{
	$("#submit_deal_btn").bind("click",function(){
		var ajaxurl = $(this).attr("url");
		var jump = $(this).attr("jump");
		$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				type: "POST",
				success: function(ajaxobj){
					if(ajaxobj.status)
					{
						$.showSuccess(ajaxobj.info,function(){
							 location.href = jump;
						});
					}
					else
					{
						if(ajaxobj.jump!="")
							location.href = ajaxobj.jump;
						else
						$.showErr(ajaxobj.info);
					}
				},
				error:function(ajaxobj)
				{

				}
			});
	});
}
// JavaScript Document
jQuery.extend({

    createUploadIframe: function(id, uri)
 {
   //create frame
            var frameId = 'jUploadFrame' + id;
            
            if(window.ActiveXObject) {
                var io = document.createElement('<iframe id="' + frameId + '" name="' + frameId + '" />');
                if(typeof uri== 'boolean'){
                    io.src = 'javascript:false';
                }
                else if(typeof uri== 'string'){
                    io.src = uri;
                }
            }
            else {
                var io = document.createElement('iframe');
                io.id = frameId;
                io.name = frameId;
            }
            io.style.position = 'absolute';
            io.style.top = '-1000px';
            io.style.left = '-1000px';

            document.body.appendChild(io);

            return io;   
    },
    createUploadForm: function(id, fileElementId)
 {
  //create form 
  var formId = 'jUploadForm' + id;
  var fileId = 'jUploadFile' + id;
  var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>'); 
  var oldElement = jQuery('#' + fileElementId);
  var newElement = jQuery(oldElement).clone();
  jQuery(oldElement).attr('id', fileId);
  jQuery(oldElement).before(newElement);
  jQuery(oldElement).appendTo(form);
  //set attributes
  jQuery(form).css('position', 'absolute');
  jQuery(form).css('top', '-1200px');
  jQuery(form).css('left', '-1200px');
  jQuery(form).appendTo('body');  
  return form;
    },

    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout  
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
        var id = s.fileElementId;        
  var form = jQuery.createUploadForm(id, s.fileElementId);
  var io = jQuery.createUploadIframe(id, s.secureuri);
  var frameId = 'jUploadFrame' + id;
  var formId = 'jUploadForm' + id;  
        
        if( s.global && ! jQuery.active++ )
  {
   // Watch for a new set of requests
   jQuery.event.trigger( "ajaxStart" );
  }            
        var requestDone = false;
        // Create the request object
        var xml = {};   
        if( s.global )
        {
         jQuery.event.trigger("ajaxSend", [xml, s]);
        }            
        
        var uploadCallback = function(isTimeout)
  {  
   // Wait for a response to come back 
   var io = document.getElementById(frameId);
            try 
   {    
    if(io.contentWindow)
    {
      xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                  xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
      
    }else if(io.contentDocument)
    {
      xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                 xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
    }      
            }catch(e)
   {
    jQuery.handleError(s, xml, null, e);
   }
            if( xml || isTimeout == "timeout") 
   {    
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    // Make sure that the request was successful or notmodified
                    if( status != "error" )
     {
                        // process the data (runs the xml through httpData regardless of callback)
                        var data = jQuery.uploadHttpData( xml, s.dataType );                        
                        if( s.success )
                        {
       // ifa local callback was specified, fire it and pass it the data
                         s.success( data, status );
                        };                 
                        if( s.global )
                        {
       // Fire the global callback
                         jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                        };                            
                    } else
                    {
                     jQuery.handleError(s, xml, status);
                    }
                        
                } catch(e) 
    {
                    status = "error";
                    jQuery.handleError(s, xml, status, e);
                };                
                if( s.global )
                {
     // The request was completed
                 jQuery.event.trigger( "ajaxComplete", [xml, s] );
                };
                    

                // Handle the global AJAX counter
                if(s.global && ! --jQuery.active)
                {
                 jQuery.event.trigger("ajaxStop");
                };
                if(s.complete)
                {
                  s.complete(xml, status);
                } ;                 

                jQuery(io).unbind();

                setTimeout(function()
         { try 
          {
           jQuery(io).remove();
           jQuery(form).remove(); 
           
          } catch(e) 
          {
           jQuery.handleError(s, xml, null, e);
          }         

         }, 100);

                xml = null;

            };
        }
        // Timeout checker
        if( s.timeout > 0 ) 
  {
            setTimeout(function(){
                
                if( !requestDone )
                {
     // Check to see ifthe request is still happening
                 uploadCallback( "timeout" );
                }
                
            }, s.timeout);
        }
        try 
  {
   var form = jQuery('#' + formId);
   jQuery(form).attr('action', s.url);
   jQuery(form).attr('method', 'POST');
   jQuery(form).attr('target', frameId);
            if(form.encoding)
   {
                form.encoding = 'multipart/form-data';    
            }
            else
   {    
                form.enctype = 'multipart/form-data';
            }   
            jQuery(form).submit();

        } catch(e) 
  {   
            jQuery.handleError(s, xml, null, e);
        }
        if(window.attachEvent){
            document.getElementById(frameId).attachEvent('onload', uploadCallback);
        }
        else{
            document.getElementById(frameId).addEventListener('load', uploadCallback, false);
        }   
        return {abort: function () {}}; 

    },

    uploadHttpData: function( r, type ) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        // ifthe type is "script", eval it in global context
        if( type == "script" )
        {
         jQuery.globalEval( data );
        }
            
        // Get the JavaScript object, ifJSON is used.
        if( type == "json" )
        {
         eval( "data = " + data );
        }
            
        // evaluate scripts within html
        if( type == "html" )
        {
         jQuery("<div>").html(data).evalScripts();
        }
            
        return data;
    }
});

