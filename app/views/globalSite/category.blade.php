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
	{{ HTML::style('/style/website/category.css') }}
</head>
<body ng-app="cate" ng-controller="cateCtrl" fade-in style="display:none;">
<div class="wrapper">
<div class="container wcsite-cate-page">
<h3 class="myheader h3"><span class="glyphicon glyphicon-th"></span>分类设置</h3>
<!-- <span class="header_des">设置微信官网分类页面</span> -->
	<hr/>
	<p class="help-block">设置微信官网的分类页面</p>
	<div class="contentWrapper">
		<ng-view class="content-view" ng-animate="{enter: 'animate-enter', leave: 'animate-leave'}"></ng-view>
	</div>
</div>
</div>

{{ HTML::script('/scripts/jquery.js') }}
{{ HTML::script('/scripts/jquery.ambiance.js') }}
{{ HTML::script('/scripts/bootstrap.min.js') }}
{{ HTML::script('/scripts/plupload.full.js') }}
{{ HTML::script('/scripts/angular.min.js') }}
{{ HTML::script('/scripts/website/category.js') }}
</body>
<script type="text/ng-template" id="mainpage.html">
<a class="button-small orange_dark rounded3 add-btn" href="#/get"><span class=" glyphicon glyphicon-plus"></span>  添加分类</a>


<div class="panel panel-default">
  <!-- Default panel contents -->

  <!-- Table -->
<table class="table table-hover">
        <thead>
          <tr>
            <th>分类名称</th>
            <th>首页显示</th>
            <th>显示顺序</th>
            <th>触发类型</th>
            <th>触发行为</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>dsdf</td>
            <td>
            	<span class="grid-btn glyphicon glyphicon-edit"></span>
            	<span class="grid-btn glyphicon glyphicon-trash"></span>
            </td>
          </tr>
          <tr>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@fat</td>
            <td>
            	<span class="grid-btn glyphicon glyphicon-edit"></span>
            	<span class="grid-btn glyphicon glyphicon-trash"></span>
            </td>
          </tr>
          <tr>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
            	<span class="grid-btn glyphicon glyphicon-edit"></span>
            	<span class="grid-btn glyphicon glyphicon-trash"></span>
            </td>
          </tr>
        </tbody>
      </table>
</div>
</script>
<script type="text/ng-template" id="getpage.html">
<h1></h1>
<a class="add-btn button-small grey_light rounded3 glyphicon glyphicon-plus " href="#/">back</a>
</script>
<script type="text/ng-template" id="hold.html"></script>
<footer>this is the footer</footer>
</html>