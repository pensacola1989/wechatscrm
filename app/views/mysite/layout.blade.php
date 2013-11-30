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
	{{ HTML::style('/style/bootstrap.css')}}
	{{-- HTML::style('/style/bootstrap-theme.min.css') --}}
	{{ HTML::style('/style/index.css') }}
</head>
<body>
<!-- <div class="wrapper">
 -->	
 <div class="navbar navbar-inverse navbar-fixed-top mynav" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Wechat SCRM</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
</div>
<ul class="sidebar">
	<li class="sidebar-item"><a href="#" class="sidebar-link">微信官网</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
	<li class="sidebar-item"><a href="#" class="sidebar-link">menu1</a></li>
</ul>
	<iframe src="{{link_to('/wcsite')}}"></iframe>
<!-- </div> -->
{{ HTML::script('/scripts/jquery.js') }}
{{ HTML::script('/scripts/bootstrap.min.js') }}
{{ HTML::script('/scripts/index.js') }}
</body>
</html>