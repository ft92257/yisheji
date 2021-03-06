var urlCode = {
        encode : function (string) { 
                return escape(this._utf8_encode(string)); 
        }, 
        decode : function (string) { 
                return this._utf8_decode(unescape(string)); 
        }, 
        _utf8_encode : function (string) { 
                string = string.replace(/\r\n/g,"\n"); 
                var utftext = ""; 
                for (var n = 0; n < string.length; n++) { 
                        var c = string.charCodeAt(n); 
                        if (c < 128) { 
                                utftext += String.fromCharCode(c); 
                        } 
                        else if((c > 127) && (c < 2048)) { 
                                utftext += String.fromCharCode((c >> 6) | 192); 
                                utftext += String.fromCharCode((c & 63) | 128); 
                        } 
                        else { 
                                utftext += String.fromCharCode((c >> 12) | 224); 
                                utftext += String.fromCharCode(((c >> 6) & 63) | 128); 
                                utftext += String.fromCharCode((c & 63) | 128); 
                        } 
                } 
                return utftext; 
        }, 
        _utf8_decode : function (utftext) { 
                var string = ""; 
                var i = 0; 
                var c = c1 = c2 = 0; 
                while ( i < utftext.length ) { 
                        c = utftext.charCodeAt(i); 
                        if (c < 128) { 
                                string += String.fromCharCode(c); 
                                i++; 
                        } 
                        else if((c > 191) && (c < 224)) { 
                                c2 = utftext.charCodeAt(i+1); 
                                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63)); 
                                i += 2; 
                        } 
                        else { 
                                c2 = utftext.charCodeAt(i+1); 
                                c3 = utftext.charCodeAt(i+2); 
                                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63)); 
                                i += 3; 
                        } 
                } 
                return string; 
        } 
}

function getCookie(name){
	var arr = document.cookie.replace(/[ ]/g,"").split(';');
	for(i in arr){
		var item = arr[i].split('=');
		if(item[0] == name){
			return item[1];
		}
	}
	return null;
}

function isEmpty(v){
	return v.replace(/[ ]/g,"") == "" ? true : false;
}

function replace_em(str){
	str = str.replace(/\</g,'&lt;');
	str = str.replace(/\>/g,'&gt;');
	str = str.replace(/\n/g,'<br/>');
	str = str.replace(/\[em_([0-9]*)\]/g,'<img src="http://s.trueart.com/js/ckeditor/plugins/smiley/images/$1.gif" border="0" />');
	return str;
}

function replace_urlpara(url, arg, val){
	if(!/\/$/.test(url)){
		url += '/';
	}
	if(url.indexOf("/" + arg + "/") > 0){
		var raRegExp = new RegExp("/" + arg + "/(.*?)/","ig"); 
		url = url.replace(raRegExp, "/" + arg + "/" + val + "/");
	} else {
		url = url + arg + "/" + val + "/";
	}
	return url.substr(0,url.length-1);
}


