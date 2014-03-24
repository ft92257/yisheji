
function upd_file(obj,file_id,uid)
{	
	$("input[name='"+file_id+"']").bind("change",function(){			
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/index.php?ctl=avatar&act=upload&uid='+uid,
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
				   			document.getElementById("avatar").src = data.middle_url+"?r="+Math.random();
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

//切换地区
$(document).ready(function(){	
		$("select[name='province']").bind("change",function(){
			load_city();
		});
});
	
function load_city()
{
		var id = $("select[name='province']").find("option:selected").attr("rel");
		
		var evalStr="regionConf.r"+id+".c";

		if(id==0)
		{
			var html = "<option value=''>请选择城市</option>";
		}
		else
		{
			var regionConfs=eval(evalStr);
			evalStr+=".";
			var html = "<option value=''>请选择城市</option>";
			for(var key in regionConfs)
			{
				html+="<option value='"+eval(evalStr+key+".n")+"' rel='"+eval(evalStr+key+".i")+"'>"+eval(evalStr+key+".n")+"</option>";
			}
		}
		$("select[name='city']").html(html);		
}
var regionConf = {"r3":{"i":3,"n":"安徽","c":{"r36":{"i":36,"n":"安庆","c":""},"r37":{"i":37,"n":"蚌埠","c":""},"r38":{"i":38,"n":"巢湖","c":""},"r39":{"i":39,"n":"池州","c":""},"r40":{"i":40,"n":"滁州","c":""},"r41":{"i":41,"n":"阜阳","c":""},"r42":{"i":42,"n":"淮北","c":""},"r43":{"i":43,"n":"淮南","c":""},"r44":{"i":44,"n":"黄山","c":""},"r45":{"i":45,"n":"六安","c":""},"r46":{"i":46,"n":"马鞍山","c":""},"r47":{"i":47,"n":"宿州","c":""},"r48":{"i":48,"n":"铜陵","c":""},"r49":{"i":49,"n":"芜湖","c":""},"r50":{"i":50,"n":"宣城","c":""},"r51":{"i":51,"n":"亳州","c":""}}},"r4":{"i":4,"n":"福建","c":{"r53":{"i":53,"n":"福州","c":""},"r54":{"i":54,"n":"龙岩","c":""},"r55":{"i":55,"n":"南平","c":""},"r56":{"i":56,"n":"宁德","c":""},"r57":{"i":57,"n":"莆田","c":""},"r58":{"i":58,"n":"泉州","c":""},"r59":{"i":59,"n":"三明","c":""},"r60":{"i":60,"n":"厦门","c":""},"r61":{"i":61,"n":"漳州","c":""}}},"r5":{"i":5,"n":"甘肃","c":{"r62":{"i":62,"n":"兰州","c":""},"r63":{"i":63,"n":"白银","c":""},"r64":{"i":64,"n":"定西","c":""},"r65":{"i":65,"n":"甘南","c":""},"r66":{"i":66,"n":"嘉峪关","c":""},"r67":{"i":67,"n":"金昌","c":""},"r68":{"i":68,"n":"酒泉","c":""},"r69":{"i":69,"n":"临夏","c":""},"r70":{"i":70,"n":"陇南","c":""},"r71":{"i":71,"n":"平凉","c":""},"r72":{"i":72,"n":"庆阳","c":""},"r73":{"i":73,"n":"天水","c":""},"r74":{"i":74,"n":"武威","c":""},"r75":{"i":75,"n":"张掖","c":""}}},"r6":{"i":6,"n":"广东","c":{"r76":{"i":76,"n":"广州","c":""},"r77":{"i":77,"n":"深圳","c":""},"r78":{"i":78,"n":"潮州","c":""},"r79":{"i":79,"n":"东莞","c":""},"r80":{"i":80,"n":"佛山","c":""},"r81":{"i":81,"n":"河源","c":""},"r82":{"i":82,"n":"惠州","c":""},"r83":{"i":83,"n":"江门","c":""},"r84":{"i":84,"n":"揭阳","c":""},"r85":{"i":85,"n":"茂名","c":""},"r86":{"i":86,"n":"梅州","c":""},"r87":{"i":87,"n":"清远","c":""},"r88":{"i":88,"n":"汕头","c":""},"r89":{"i":89,"n":"汕尾","c":""},"r90":{"i":90,"n":"韶关","c":""},"r91":{"i":91,"n":"阳江","c":""},"r92":{"i":92,"n":"云浮","c":""},"r93":{"i":93,"n":"湛江","c":""},"r94":{"i":94,"n":"肇庆","c":""},"r95":{"i":95,"n":"中山","c":""},"r96":{"i":96,"n":"珠海","c":""}}},"r7":{"i":7,"n":"广西","c":{"r97":{"i":97,"n":"南宁","c":""},"r98":{"i":98,"n":"桂林","c":""},"r99":{"i":99,"n":"百色","c":""},"r100":{"i":100,"n":"北海","c":""},"r101":{"i":101,"n":"崇左","c":""},"r102":{"i":102,"n":"防城港","c":""},"r103":{"i":103,"n":"贵港","c":""},"r104":{"i":104,"n":"河池","c":""},"r105":{"i":105,"n":"贺州","c":""},"r106":{"i":106,"n":"来宾","c":""},"r107":{"i":107,"n":"柳州","c":""},"r108":{"i":108,"n":"钦州","c":""},"r109":{"i":109,"n":"梧州","c":""},"r110":{"i":110,"n":"玉林","c":""}}},"r8":{"i":8,"n":"贵州","c":{"r111":{"i":111,"n":"贵阳","c":""},"r112":{"i":112,"n":"安顺","c":""},"r113":{"i":113,"n":"毕节","c":""},"r114":{"i":114,"n":"六盘水","c":""},"r115":{"i":115,"n":"黔东南","c":""},"r116":{"i":116,"n":"黔南","c":""},"r117":{"i":117,"n":"黔西南","c":""},"r118":{"i":118,"n":"铜仁","c":""},"r119":{"i":119,"n":"遵义","c":""}}},"r9":{"i":9,"n":"海南","c":{"r120":{"i":120,"n":"海口","c":""},"r121":{"i":121,"n":"三亚","c":""},"r122":{"i":122,"n":"白沙","c":""},"r123":{"i":123,"n":"保亭","c":""},"r124":{"i":124,"n":"昌江","c":""},"r125":{"i":125,"n":"澄迈县","c":""},"r126":{"i":126,"n":"定安县","c":""},"r127":{"i":127,"n":"东方","c":""},"r128":{"i":128,"n":"乐东","c":""},"r129":{"i":129,"n":"临高县","c":""},"r130":{"i":130,"n":"陵水","c":""},"r131":{"i":131,"n":"琼海","c":""},"r132":{"i":132,"n":"琼中","c":""},"r133":{"i":133,"n":"屯昌县","c":""},"r134":{"i":134,"n":"万宁","c":""},"r135":{"i":135,"n":"文昌","c":""},"r136":{"i":136,"n":"五指山","c":""},"r137":{"i":137,"n":"儋州","c":""}}},"r10":{"i":10,"n":"河北","c":{"r138":{"i":138,"n":"石家庄","c":""},"r139":{"i":139,"n":"保定","c":""},"r140":{"i":140,"n":"沧州","c":""},"r141":{"i":141,"n":"承德","c":""},"r142":{"i":142,"n":"邯郸","c":""},"r143":{"i":143,"n":"衡水","c":""},"r144":{"i":144,"n":"廊坊","c":""},"r145":{"i":145,"n":"秦皇岛","c":""},"r146":{"i":146,"n":"唐山","c":""},"r147":{"i":147,"n":"邢台","c":""},"r148":{"i":148,"n":"张家口","c":""}}},"r11":{"i":11,"n":"河南","c":{"r149":{"i":149,"n":"郑州","c":""},"r150":{"i":150,"n":"洛阳","c":""},"r151":{"i":151,"n":"开封","c":""},"r152":{"i":152,"n":"安阳","c":""},"r153":{"i":153,"n":"鹤壁","c":""},"r154":{"i":154,"n":"济源","c":""},"r155":{"i":155,"n":"焦作","c":""},"r156":{"i":156,"n":"南阳","c":""},"r157":{"i":157,"n":"平顶山","c":""},"r158":{"i":158,"n":"三门峡","c":""},"r159":{"i":159,"n":"商丘","c":""},"r160":{"i":160,"n":"新乡","c":""},"r161":{"i":161,"n":"信阳","c":""},"r162":{"i":162,"n":"许昌","c":""},"r163":{"i":163,"n":"周口","c":""},"r164":{"i":164,"n":"驻马店","c":""},"r165":{"i":165,"n":"漯河","c":""},"r166":{"i":166,"n":"濮阳","c":""}}},"r12":{"i":12,"n":"黑龙江","c":{"r167":{"i":167,"n":"哈尔滨","c":""},"r168":{"i":168,"n":"大庆","c":""},"r169":{"i":169,"n":"大兴安岭","c":""},"r170":{"i":170,"n":"鹤岗","c":""},"r171":{"i":171,"n":"黑河","c":""},"r172":{"i":172,"n":"鸡西","c":""},"r173":{"i":173,"n":"佳木斯","c":""},"r174":{"i":174,"n":"牡丹江","c":""},"r175":{"i":175,"n":"七台河","c":""},"r176":{"i":176,"n":"齐齐哈尔","c":""},"r177":{"i":177,"n":"双鸭山","c":""},"r178":{"i":178,"n":"绥化","c":""},"r179":{"i":179,"n":"伊春","c":""}}},"r13":{"i":13,"n":"湖北","c":{"r180":{"i":180,"n":"武汉","c":""},"r181":{"i":181,"n":"仙桃","c":""},"r182":{"i":182,"n":"鄂州","c":""},"r183":{"i":183,"n":"黄冈","c":""},"r184":{"i":184,"n":"黄石","c":""},"r185":{"i":185,"n":"荆门","c":""},"r186":{"i":186,"n":"荆州","c":""},"r187":{"i":187,"n":"潜江","c":""},"r188":{"i":188,"n":"神农架林区","c":""},"r189":{"i":189,"n":"十堰","c":""},"r190":{"i":190,"n":"随州","c":""},"r191":{"i":191,"n":"天门","c":""},"r192":{"i":192,"n":"咸宁","c":""},"r193":{"i":193,"n":"襄樊","c":""},"r194":{"i":194,"n":"孝感","c":""},"r195":{"i":195,"n":"宜昌","c":""},"r196":{"i":196,"n":"恩施","c":""}}},"r14":{"i":14,"n":"湖南","c":{"r197":{"i":197,"n":"长沙","c":""},"r198":{"i":198,"n":"张家界","c":""},"r199":{"i":199,"n":"常德","c":""},"r200":{"i":200,"n":"郴州","c":""},"r201":{"i":201,"n":"衡阳","c":""},"r202":{"i":202,"n":"怀化","c":""},"r203":{"i":203,"n":"娄底","c":""},"r204":{"i":204,"n":"邵阳","c":""},"r205":{"i":205,"n":"湘潭","c":""},"r206":{"i":206,"n":"湘西","c":""},"r207":{"i":207,"n":"益阳","c":""},"r208":{"i":208,"n":"永州","c":""},"r209":{"i":209,"n":"岳阳","c":""},"r210":{"i":210,"n":"株洲","c":""}}},"r15":{"i":15,"n":"吉林","c":{"r211":{"i":211,"n":"长春","c":""},"r212":{"i":212,"n":"吉林","c":""},"r213":{"i":213,"n":"白城","c":""},"r214":{"i":214,"n":"白山","c":""},"r215":{"i":215,"n":"辽源","c":""},"r216":{"i":216,"n":"四平","c":""},"r217":{"i":217,"n":"松原","c":""},"r218":{"i":218,"n":"通化","c":""},"r219":{"i":219,"n":"延边","c":""}}},"r16":{"i":16,"n":"江苏","c":{"r220":{"i":220,"n":"南京","c":""},"r221":{"i":221,"n":"苏州","c":""},"r222":{"i":222,"n":"无锡","c":""},"r223":{"i":223,"n":"常州","c":""},"r224":{"i":224,"n":"淮安","c":""},"r225":{"i":225,"n":"连云港","c":""},"r226":{"i":226,"n":"南通","c":""},"r227":{"i":227,"n":"宿迁","c":""},"r228":{"i":228,"n":"泰州","c":""},"r229":{"i":229,"n":"徐州","c":""},"r230":{"i":230,"n":"盐城","c":""},"r231":{"i":231,"n":"扬州","c":""},"r232":{"i":232,"n":"镇江","c":""}}},"r17":{"i":17,"n":"江西","c":{"r233":{"i":233,"n":"南昌","c":""},"r234":{"i":234,"n":"抚州","c":""},"r235":{"i":235,"n":"赣州","c":""},"r236":{"i":236,"n":"吉安","c":""},"r237":{"i":237,"n":"景德镇","c":""},"r238":{"i":238,"n":"九江","c":""},"r239":{"i":239,"n":"萍乡","c":""},"r240":{"i":240,"n":"上饶","c":""},"r241":{"i":241,"n":"新余","c":""},"r242":{"i":242,"n":"宜春","c":""},"r243":{"i":243,"n":"鹰潭","c":""}}},"r18":{"i":18,"n":"辽宁","c":{"r244":{"i":244,"n":"沈阳","c":""},"r245":{"i":245,"n":"大连","c":""},"r246":{"i":246,"n":"鞍山","c":""},"r247":{"i":247,"n":"本溪","c":""},"r248":{"i":248,"n":"朝阳","c":""},"r249":{"i":249,"n":"丹东","c":""},"r250":{"i":250,"n":"抚顺","c":""},"r251":{"i":251,"n":"阜新","c":""},"r252":{"i":252,"n":"葫芦岛","c":""},"r253":{"i":253,"n":"锦州","c":""},"r254":{"i":254,"n":"辽阳","c":""},"r255":{"i":255,"n":"盘锦","c":""},"r256":{"i":256,"n":"铁岭","c":""},"r257":{"i":257,"n":"营口","c":""}}},"r19":{"i":19,"n":"内蒙古","c":{"r258":{"i":258,"n":"呼和浩特","c":""},"r259":{"i":259,"n":"阿拉善盟","c":""},"r260":{"i":260,"n":"巴彦淖尔盟","c":""},"r261":{"i":261,"n":"包头","c":""},"r262":{"i":262,"n":"赤峰","c":""},"r263":{"i":263,"n":"鄂尔多斯","c":""},"r264":{"i":264,"n":"呼伦贝尔","c":""},"r265":{"i":265,"n":"通辽","c":""},"r266":{"i":266,"n":"乌海","c":""},"r267":{"i":267,"n":"乌兰察布市","c":""},"r268":{"i":268,"n":"锡林郭勒盟","c":""},"r269":{"i":269,"n":"兴安盟","c":""}}},"r20":{"i":20,"n":"宁夏","c":{"r270":{"i":270,"n":"银川","c":""},"r271":{"i":271,"n":"固原","c":""},"r272":{"i":272,"n":"石嘴山","c":""},"r273":{"i":273,"n":"吴忠","c":""},"r274":{"i":274,"n":"中卫","c":""}}},"r21":{"i":21,"n":"青海","c":{"r275":{"i":275,"n":"西宁","c":""},"r276":{"i":276,"n":"果洛","c":""},"r277":{"i":277,"n":"海北","c":""},"r278":{"i":278,"n":"海东","c":""},"r279":{"i":279,"n":"海南","c":""},"r280":{"i":280,"n":"海西","c":""},"r281":{"i":281,"n":"黄南","c":""},"r282":{"i":282,"n":"玉树","c":""}}},"r22":{"i":22,"n":"山东","c":{"r283":{"i":283,"n":"济南","c":""},"r284":{"i":284,"n":"青岛","c":""},"r285":{"i":285,"n":"滨州","c":""},"r286":{"i":286,"n":"德州","c":""},"r287":{"i":287,"n":"东营","c":""},"r288":{"i":288,"n":"菏泽","c":""},"r289":{"i":289,"n":"济宁","c":""},"r290":{"i":290,"n":"莱芜","c":""},"r291":{"i":291,"n":"聊城","c":""},"r292":{"i":292,"n":"临沂","c":""},"r293":{"i":293,"n":"日照","c":""},"r294":{"i":294,"n":"泰安","c":""},"r295":{"i":295,"n":"威海","c":""},"r296":{"i":296,"n":"潍坊","c":""},"r297":{"i":297,"n":"烟台","c":""},"r298":{"i":298,"n":"枣庄","c":""},"r299":{"i":299,"n":"淄博","c":""}}},"r23":{"i":23,"n":"山西","c":{"r300":{"i":300,"n":"太原","c":""},"r301":{"i":301,"n":"长治","c":""},"r302":{"i":302,"n":"大同","c":""},"r303":{"i":303,"n":"晋城","c":""},"r304":{"i":304,"n":"晋中","c":""},"r305":{"i":305,"n":"临汾","c":""},"r306":{"i":306,"n":"吕梁","c":""},"r307":{"i":307,"n":"朔州","c":""},"r308":{"i":308,"n":"忻州","c":""},"r309":{"i":309,"n":"阳泉","c":""},"r310":{"i":310,"n":"运城","c":""}}},"r24":{"i":24,"n":"陕西","c":{"r311":{"i":311,"n":"西安","c":""},"r312":{"i":312,"n":"安康","c":""},"r313":{"i":313,"n":"宝鸡","c":""},"r314":{"i":314,"n":"汉中","c":""},"r315":{"i":315,"n":"商洛","c":""},"r316":{"i":316,"n":"铜川","c":""},"r317":{"i":317,"n":"渭南","c":""},"r318":{"i":318,"n":"咸阳","c":""},"r319":{"i":319,"n":"延安","c":""},"r320":{"i":320,"n":"榆林","c":""}}},"r26":{"i":26,"n":"四川","c":{"r322":{"i":322,"n":"成都","c":""},"r323":{"i":323,"n":"绵阳","c":""},"r324":{"i":324,"n":"阿坝","c":""},"r325":{"i":325,"n":"巴中","c":""},"r326":{"i":326,"n":"达州","c":""},"r327":{"i":327,"n":"德阳","c":""},"r328":{"i":328,"n":"甘孜","c":""},"r329":{"i":329,"n":"广安","c":""},"r330":{"i":330,"n":"广元","c":""},"r331":{"i":331,"n":"乐山","c":""},"r332":{"i":332,"n":"凉山","c":""},"r333":{"i":333,"n":"眉山","c":""},"r334":{"i":334,"n":"南充","c":""},"r335":{"i":335,"n":"内江","c":""},"r336":{"i":336,"n":"攀枝花","c":""},"r337":{"i":337,"n":"遂宁","c":""},"r338":{"i":338,"n":"雅安","c":""},"r339":{"i":339,"n":"宜宾","c":""},"r340":{"i":340,"n":"资阳","c":""},"r341":{"i":341,"n":"自贡","c":""},"r342":{"i":342,"n":"泸州","c":""}}},"r28":{"i":28,"n":"西藏","c":{"r344":{"i":344,"n":"拉萨","c":""},"r345":{"i":345,"n":"阿里","c":""},"r346":{"i":346,"n":"昌都","c":""},"r347":{"i":347,"n":"林芝","c":""},"r348":{"i":348,"n":"那曲","c":""},"r349":{"i":349,"n":"日喀则","c":""},"r350":{"i":350,"n":"山南","c":""}}},"r29":{"i":29,"n":"新疆","c":{"r351":{"i":351,"n":"乌鲁木齐","c":""},"r352":{"i":352,"n":"阿克苏","c":""},"r353":{"i":353,"n":"阿拉尔","c":""},"r354":{"i":354,"n":"巴音郭楞","c":""},"r355":{"i":355,"n":"博尔塔拉","c":""},"r356":{"i":356,"n":"昌吉","c":""},"r357":{"i":357,"n":"哈密","c":""},"r358":{"i":358,"n":"和田","c":""},"r359":{"i":359,"n":"喀什","c":""},"r360":{"i":360,"n":"克拉玛依","c":""},"r361":{"i":361,"n":"克孜勒苏","c":""},"r362":{"i":362,"n":"石河子","c":""},"r363":{"i":363,"n":"图木舒克","c":""},"r364":{"i":364,"n":"吐鲁番","c":""},"r365":{"i":365,"n":"五家渠","c":""},"r366":{"i":366,"n":"伊犁","c":""}}},"r30":{"i":30,"n":"云南","c":{"r367":{"i":367,"n":"昆明","c":""},"r368":{"i":368,"n":"怒江","c":""},"r369":{"i":369,"n":"普洱","c":""},"r370":{"i":370,"n":"丽江","c":""},"r371":{"i":371,"n":"保山","c":""},"r372":{"i":372,"n":"楚雄","c":""},"r373":{"i":373,"n":"大理","c":""},"r374":{"i":374,"n":"德宏","c":""},"r375":{"i":375,"n":"迪庆","c":""},"r376":{"i":376,"n":"红河","c":""},"r377":{"i":377,"n":"临沧","c":""},"r378":{"i":378,"n":"曲靖","c":""},"r379":{"i":379,"n":"文山","c":""},"r380":{"i":380,"n":"西双版纳","c":""},"r381":{"i":381,"n":"玉溪","c":""},"r382":{"i":382,"n":"昭通","c":""}}},"r31":{"i":31,"n":"浙江","c":{"r383":{"i":383,"n":"杭州","c":""},"r384":{"i":384,"n":"湖州","c":""},"r385":{"i":385,"n":"嘉兴","c":""},"r386":{"i":386,"n":"金华","c":""},"r387":{"i":387,"n":"丽水","c":""},"r388":{"i":388,"n":"宁波","c":""},"r389":{"i":389,"n":"绍兴","c":""},"r390":{"i":390,"n":"台州","c":""},"r391":{"i":391,"n":"温州","c":""},"r392":{"i":392,"n":"舟山","c":""},"r393":{"i":393,"n":"衢州","c":""}}},"r52":{"i":52,"n":"北京","c":{"r500":{"i":500,"n":"东城区","c":""},"r501":{"i":501,"n":"西城区","c":""},"r502":{"i":502,"n":"海淀区","c":""},"r503":{"i":503,"n":"朝阳区","c":""},"r504":{"i":504,"n":"崇文区","c":""},"r505":{"i":505,"n":"宣武区","c":""},"r506":{"i":506,"n":"丰台区","c":""},"r507":{"i":507,"n":"石景山区","c":""},"r508":{"i":508,"n":"房山区","c":""},"r509":{"i":509,"n":"门头沟区","c":""},"r510":{"i":510,"n":"通州区","c":""},"r511":{"i":511,"n":"顺义区","c":""},"r512":{"i":512,"n":"昌平区","c":""},"r513":{"i":513,"n":"怀柔区","c":""},"r514":{"i":514,"n":"平谷区","c":""},"r515":{"i":515,"n":"大兴区","c":""},"r516":{"i":516,"n":"密云县","c":""},"r517":{"i":517,"n":"延庆县","c":""}}},"r321":{"i":321,"n":"上海","c":{"r2703":{"i":2703,"n":"长宁区","c":""},"r2704":{"i":2704,"n":"闸北区","c":""},"r2705":{"i":2705,"n":"闵行区","c":""},"r2706":{"i":2706,"n":"徐汇区","c":""},"r2707":{"i":2707,"n":"浦东新区","c":""},"r2708":{"i":2708,"n":"杨浦区","c":""},"r2709":{"i":2709,"n":"普陀区","c":""},"r2710":{"i":2710,"n":"静安区","c":""},"r2711":{"i":2711,"n":"卢湾区","c":""},"r2712":{"i":2712,"n":"虹口区","c":""},"r2713":{"i":2713,"n":"黄浦区","c":""},"r2714":{"i":2714,"n":"南汇区","c":""},"r2715":{"i":2715,"n":"松江区","c":""},"r2716":{"i":2716,"n":"嘉定区","c":""},"r2717":{"i":2717,"n":"宝山区","c":""},"r2718":{"i":2718,"n":"青浦区","c":""},"r2719":{"i":2719,"n":"金山区","c":""},"r2720":{"i":2720,"n":"奉贤区","c":""},"r2721":{"i":2721,"n":"崇明县","c":""}}},"r343":{"i":343,"n":"天津","c":{"r2912":{"i":2912,"n":"和平区","c":""},"r2913":{"i":2913,"n":"河西区","c":""},"r2914":{"i":2914,"n":"南开区","c":""},"r2915":{"i":2915,"n":"河北区","c":""},"r2916":{"i":2916,"n":"河东区","c":""},"r2917":{"i":2917,"n":"红桥区","c":""},"r2918":{"i":2918,"n":"东丽区","c":""},"r2919":{"i":2919,"n":"津南区","c":""},"r2920":{"i":2920,"n":"西青区","c":""},"r2921":{"i":2921,"n":"北辰区","c":""},"r2922":{"i":2922,"n":"塘沽区","c":""},"r2923":{"i":2923,"n":"汉沽区","c":""},"r2924":{"i":2924,"n":"大港区","c":""},"r2925":{"i":2925,"n":"武清区","c":""},"r2926":{"i":2926,"n":"宝坻区","c":""},"r2927":{"i":2927,"n":"经济开发区","c":""},"r2928":{"i":2928,"n":"宁河县","c":""},"r2929":{"i":2929,"n":"静海县","c":""},"r2930":{"i":2930,"n":"蓟县","c":""}}},"r394":{"i":394,"n":"重庆","c":{"r3325":{"i":3325,"n":"合川区","c":""},"r3326":{"i":3326,"n":"江津区","c":""},"r3327":{"i":3327,"n":"南川区","c":""},"r3328":{"i":3328,"n":"永川区","c":""},"r3329":{"i":3329,"n":"南岸区","c":""},"r3330":{"i":3330,"n":"渝北区","c":""},"r3331":{"i":3331,"n":"万盛区","c":""},"r3332":{"i":3332,"n":"大渡口区","c":""},"r3333":{"i":3333,"n":"万州区","c":""},"r3334":{"i":3334,"n":"北碚区","c":""},"r3335":{"i":3335,"n":"沙坪坝区","c":""},"r3336":{"i":3336,"n":"巴南区","c":""},"r3337":{"i":3337,"n":"涪陵区","c":""},"r3338":{"i":3338,"n":"江北区","c":""},"r3339":{"i":3339,"n":"九龙坡区","c":""},"r3340":{"i":3340,"n":"渝中区","c":""},"r3341":{"i":3341,"n":"黔江开发区","c":""},"r3342":{"i":3342,"n":"长寿区","c":""},"r3343":{"i":3343,"n":"双桥区","c":""},"r3344":{"i":3344,"n":"綦江县","c":""},"r3345":{"i":3345,"n":"潼南县","c":""},"r3346":{"i":3346,"n":"铜梁县","c":""},"r3347":{"i":3347,"n":"大足县","c":""},"r3348":{"i":3348,"n":"荣昌县","c":""},"r3349":{"i":3349,"n":"璧山县","c":""},"r3350":{"i":3350,"n":"垫江县","c":""},"r3351":{"i":3351,"n":"武隆县","c":""},"r3352":{"i":3352,"n":"丰都县","c":""},"r3353":{"i":3353,"n":"城口县","c":""},"r3354":{"i":3354,"n":"梁平县","c":""},"r3355":{"i":3355,"n":"开县","c":""},"r3356":{"i":3356,"n":"巫溪县","c":""},"r3357":{"i":3357,"n":"巫山县","c":""},"r3358":{"i":3358,"n":"奉节县","c":""},"r3359":{"i":3359,"n":"云阳县","c":""},"r3360":{"i":3360,"n":"忠县","c":""},"r3361":{"i":3361,"n":"石柱","c":""},"r3362":{"i":3362,"n":"彭水","c":""},"r3363":{"i":3363,"n":"酉阳","c":""},"r3364":{"i":3364,"n":"秀山","c":""}}},"r395":{"i":395,"n":"香港","c":{"r3365":{"i":3365,"n":"沙田区","c":""},"r3366":{"i":3366,"n":"东区","c":""},"r3367":{"i":3367,"n":"观塘区","c":""},"r3368":{"i":3368,"n":"黄大仙区","c":""},"r3369":{"i":3369,"n":"九龙城区","c":""},"r3370":{"i":3370,"n":"屯门区","c":""},"r3371":{"i":3371,"n":"葵青区","c":""},"r3372":{"i":3372,"n":"元朗区","c":""},"r3373":{"i":3373,"n":"深水埗区","c":""},"r3374":{"i":3374,"n":"西贡区","c":""},"r3375":{"i":3375,"n":"大埔区","c":""},"r3376":{"i":3376,"n":"湾仔区","c":""},"r3377":{"i":3377,"n":"油尖旺区","c":""},"r3378":{"i":3378,"n":"北区","c":""},"r3379":{"i":3379,"n":"南区","c":""},"r3380":{"i":3380,"n":"荃湾区","c":""},"r3381":{"i":3381,"n":"中西区","c":""},"r3382":{"i":3382,"n":"离岛区","c":""}}},"r396":{"i":396,"n":"澳门","c":{"r3383":{"i":3383,"n":"澳门","c":""}}},"r397":{"i":397,"n":"台湾","c":{"r3384":{"i":3384,"n":"台北","c":""},"r3385":{"i":3385,"n":"高雄","c":""},"r3386":{"i":3386,"n":"基隆","c":""},"r3387":{"i":3387,"n":"台中","c":""},"r3388":{"i":3388,"n":"台南","c":""},"r3389":{"i":3389,"n":"新竹","c":""},"r3390":{"i":3390,"n":"嘉义","c":""},"r3391":{"i":3391,"n":"宜兰县","c":""},"r3392":{"i":3392,"n":"桃园县","c":""},"r3393":{"i":3393,"n":"苗栗县","c":""},"r3394":{"i":3394,"n":"彰化县","c":""},"r3395":{"i":3395,"n":"南投县","c":""},"r3396":{"i":3396,"n":"云林县","c":""},"r3397":{"i":3397,"n":"屏东县","c":""},"r3398":{"i":3398,"n":"台东县","c":""},"r3399":{"i":3399,"n":"花莲县","c":""},"r3400":{"i":3400,"n":"澎湖县","c":""}}}}
