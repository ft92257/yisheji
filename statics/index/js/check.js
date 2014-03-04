function checkEmail(email){
	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return reg.test(email);
}

function checkTrueName(trueName){
	var reg = /^[\u4e00-\u9fa5]+$/gi;
	var length = getCharLength(userName);
	if(length<4 || length>8) {
		return false;
	}
	if(!reg.test(trueName)){
		return false;
	}
	return true;
}

function checkUserName(userName){
	var reg = /^[\w\u4e00-\u9fa5]+$/gi;
	var length = getCharLength(userName);
	if( length < 4 || length > 24){
		return false;
	}
	if(!reg.test(userName)){
		return false;
	}
	return true;
}

function getCharLength(str){
	var l = 0; 
	var a = str.split(""); 
	for (var i=0;i<a.length;i++) { 
		if (a[i].charCodeAt(0)<299) { 
			l++; 
		} else { 
			l+=2; 
		} 
	} 
	return l; 
}

function checkPhone(phone){
	var reg = /^1[0-9]{10}$/;
	return reg.test(phone);
}

function checkPass(pass){
	var reg = /^[a-zA-Z0-9]{6,16}$/;
	return reg.test(pass);
}