layui.define(function(exports){
	var config = {
		iniUrl:'api/init.json',
		clearUrl:'MenuController/clear',
		loginUrl:'page/login-1.html',
		tokenKey:'token',
		homeUrl:'/index.html'
	};
	exports('adminConfig', config);
});