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
  {{ HTML::style('/style/tree.css') }}
</head>
<body>

<div class="wrapper">
	 <div class="navbar navbar-fixed-top mynav" role="navigation">
      <div class="container pull-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Wechat SCRM</a>
          <a href="javascript:void(null);" id="toggleBar" style="float:left;" class="glyphicon glyphicon-align-justify"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          @if(!Auth::check())
            <li class="{{--$data['currentPage'] == 'register' ? 'active' : ''--}} myli wc">{{--HTML::link('/register','注册')--}}</li>
            <li class="{{--$data['currentPage'] == 'userLogin' ? 'active' : ''--}} myli wc">{{--HTML::link('/login','登录')--}}</li>
          @else
            <span></span>  
          @endif
            <!-- <li class="myli wc"><a href=""></a></li> -->
            <!-- <li><a href="#about">Register</a></li> -->
          </ul>



        </div>
          
        </div><!--/.nav-collapse -->
        @if(Auth::check())
        <ul class="nav navbar-nav navbar-right" style="float:right;">
              <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-cog" style="margin-right:10px;"></span>
                  <span href="javascript:void(null);">{{ Auth::user()->username }}</span>
                </a>

                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <!-- <li><a href="#" id="logout">注销</a></li> -->
                  <li>{{ HTML::link('/logout','注销',array('id'=>'logout')) }}</li>
                </ul>
              </li>
              <li>
                 
              </li>
          </ul>
        @endif
      </div>
    </div>
    <div class="tree_bar">
       <ul class="tree_container">
        <li class="tree_item open">
          <a><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;微信网站</a>
          <ul class="tree_child">
            <li class="child_item"><a>网站首页</a></li>
            <!-- <li class="child_item"><a>分类页面</a></li> -->
            <li class="child_item">{{ HTML::link('frame/testhome','AngularJs分类页面',array('target' => 'contentFrame')) }}</li>
            <li class="child_item active"><a>详细页面</a></li>
            <li class="child_item"><a>其他设置</a></li>
          </ul>
        </li>
        <li class="tree_item"><a><span class=""></span>Parent2</a>
          <ul class="tree_child">
            <li class="child_item">child1</li>
            <li class="child_item">child2</li>
            <li class="child_item">child3</li>
            <li class="child_item">child4</li>
          </ul>
        </li>
        <li class="tree_item"><a><span class=""></span>Parent3</a>
          <ul class="tree_child">
            <li class="child_item">child1</li>
            <li class="child_item">child2</li>
            <li class="child_item">child3</li>
            <li class="child_item">child4</li>
          </ul>
        </li>
        <li class="tree_item"><a><span class=""></span>Parent4</a>
          <ul class="tree_child">
            <li class="child_item">child1</li>
            <li class="child_item">child2</li>
            <li class="child_item">child3</li>
            <li class="child_item">child4</li>
          </ul>
        </li>
        <li class="tree_item"><a><span class=""></span>Parent5</a>
          <ul class="tree_child">
            <li class="child_item">child1</li>
            <li class="child_item">child2</li>
            <li class="child_item">child3</li>
            <li class="child_item">child4</li>
          </ul>
        </li>
        <li class="tree_item"><a><span class=""></span>Parent6</a>
          <ul class="tree_child">
            <li class="child_item">child1</li>
            <li class="child_item">child2</li>
            <li class="child_item">child3</li>
            <li class="child_item">child4</li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="frame_container">
      <iframe name="contentFrame" id="contentFrame" src="{{url('frame/home')}}"></iframe>
    </div>    
</div>

{{ HTML::script('/scripts/jquery.js') }}
{{ HTML::script('/scripts/jquery.ambiance.js') }}
{{ HTML::script('/scripts/bootstrap.min.js') }}
{{ HTML::script('/scripts/tree.js') }}
{{ HTML::script('/scripts/layout.js') }}
</body>
<footer>this is the footer</footer>
</html>