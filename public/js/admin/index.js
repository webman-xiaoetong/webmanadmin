layui.extend({
	"adminConfig":"config"
})
.define(['jquery', 'layer', 'form','miniAdmin','adminConfig'],function(exports){ //提示：模块也可以依赖其它模块，如：layui.define('layer', callback);

          var $ = layui.jquery,
          miniAdmin = layui.miniAdmin,
          config = layui.adminConfig,
          form = layui.form,
            layer = layui.layer;

  var index = {
    getToken: function(){
    	return 1;
      	var tokenKey = config.tokenKey  && 'token';
      	var tokeData =  layui.data(tokenKey);

      	if(!!tokeData && !!tokeData['token']){
      		return tokeData['token'];
      	}
      	return '1';
    },

    setToken: function(token){
    	var tokenKey = config.tokenKey  && 'token';
    	layui.data(tokenKey,{key:'token',value:token});
    },

    gotoLogin:function(){
		window.location = config.loginUrl;
    },

    toHome:function(){
    	window.location = config.homeUrl;
    },

    init:function(){
    	var token = index.getToken();
    	console.log(token);
    	if(!token){
    		index.gotoLogin();
    		return;
    	}

    	var options = {
            iniUrl: config.iniUrl,//"api/init.json",    // 初始化接口
            clearUrl: config.clearUrl,//"MenuController/clear", // 缓存清理接口
            urlHashLocation: true,      // 是否打开hash定位
            bgColorDefault: false,      // 主题默认配置
            multiModule: true,          // 是否开启多模块
            menuChildOpen: false,       // 是否默认展开菜单
            loadingTime: 0,             // 初始化加载时间
            pageAnim: true,             // iframe窗口动画
            maxTabNum: 20,              // 最大的tab打开数量
        };
        miniAdmin.render(options);

        index.bindLogout();
    },
    bindLogout:function(){
    	$('.login-out').on("click", function () {
        	index.setToken(null);
            /*删除token,并且退出登录的*/
            layer.msg('退出登录成功', function () {
                window.location = config.loginUrl;//'page/login-1.html';
            });
        });
    },

    bindLogin:function(){
    	var token = index.getToken();

    	if(!!token){
    		index.toHome();
    		return;
    	}
    	        // 进行登录操作
        form.on('submit(login)', function (data) {
            data = data.field;
            if (data.username == '') {
                layer.msg('用户名不能为空');
                return false;
            }
            if (data.password == '') {
                layer.msg('密码不能为空');
                return false;
            }
            if (data.captcha == '') {
                layer.msg('验证码不能为空');
                return false;
            }
            layer.msg('登录成功', function () {
            	index.setToken(1111111111);
                index.toHome()//'../index.html';
            });
            return false;
        });
    }
  };



  //输出test接口
  exports('adminIndex', index);
}); 