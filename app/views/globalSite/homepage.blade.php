<!DOCTYPE html>
<html>
<head>
	<title>Wechat SCRM</title>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	{{ HTML::style('/style/jquery.ambiance.css') }}
	{{ HTML::style('/style/bootstrap.css') }}
	{{-- HTML::style('/style/bootstrap-theme.min.css') --}}
	{{ HTML::style('/style/global.css') }}
</head>
<body>

<div class="wrapper">
<div class="container wcsite-home-page">
<h3 class="myheader h3">网站首页设置</h3>
	<hr/>
	<dive class="form-horizontal">
	  <div class="form-group">
	    <label for="inputTitle" class="col-sm-2 control-label">官网标题</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputTitle" placeholder="官网标题">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputKeyword" class="col-sm-2 control-label">触发关键字</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputKeyword" placeholder="触发关键字">
	    </div>
	  </div>
	  <div class="form-group">
	  	<label class="col-sm-2 control-label">图文消息封面</label>
	  	<img id="messageCover" src="http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg" style="margin-left:20px;height:80px;"/>
	  	<button id="pickpic-btn" type="button" class="btn pickpic" style="border:1px solid;margin-left:100px;padding:5px;">
	  	<span class="glyphicon glyphicon-plus"></span>
	  	选择
	  	</button>
	  	<span class="percent"></span>
	  </div>
	  <div class="form-group">
	  	<label class="col-sm-2 control-label">logo图</label>
	  	<img id="logoImg" src="http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg" style="margin-left:20px;height:80px;"/>
	  	<button id="logo-btn" type="button" class="btn pickpic" style="border:1px solid;margin-left:100px;padding:5px;">
	  	<span class="glyphicon glyphicon-plus"></span>
	  	选择
	  	</button>
	  	<span class="percent"></span>
	  </div>
	  <div class="form-group">
	  	<label class="col-sm-2 control-label">首页背景</label>
	  	<img id="homeBg" src="http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg" style="margin-left:20px;height:80px;"/>
	  	<button id="bg-btn" type="button" class="btn pickpic" style="border:1px solid;margin-left:100px;padding:5px;">
	  	<span class="glyphicon glyphicon-plus"></span>
	  	选择
	  	</button>
	  	<span class="percent"></span>
	  </div>
	  <div class="form-group">
	  	<div class="col-sm-offset-2 col-sm-10">
	  		<button type="button" id="submit" class="btn btn-primary">提交</button>
	  	</div>
	  </div>
	</div>
</div>
</div>

{{ HTML::script('/scripts/jquery.js') }}
{{ HTML::script('/scripts/jquery.ambiance.js') }}
{{ HTML::script('/scripts/bootstrap.min.js') }}
{{ HTML::script('/scripts/plupload.full.js') }}
{{ HTML::script('/scripts/website/homepage.js') }}
</body>
<footer>this is the footer</footer>
</html>