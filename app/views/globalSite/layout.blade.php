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
	{{ HTML::style('/style/global.css') }}
</head>
<body>

<div class="wrapper">
	 <div class="navbar navbar-fixed-top mynav" role="navigation">
      <div class="container pull-left">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Wechat SCRM</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          @if(!Auth::check())
            <li class="{{$data['currentPage'] == 'register' ? 'active' : ''}} myli wc">{{HTML::link('/register','注册')}}</li>
            <li class="{{$data['currentPage'] == 'userLogin' ? 'active' : ''}} myli wc">{{HTML::link('/login','登录')}}</li>
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
  @yield('content')
</div>

{{ HTML::script('/scripts/jquery.js') }}
{{ HTML::script('/scripts/bootstrap.min.js') }}
<script type="text/javascript">
  $(document).ready(function () {}
  //   $('#logout').bind('click',function () {
  //     $.ajax({
  //       type: 'POST',
  //       url:'/logout',
  //       data:{},
  //       dataType: 'json'
  //     })
  //     .success(function (data) {
        
  //     })
  //     .error(function () {
        
  //     })
  //     .done(function () {
        
  //     });
  //   });
  // });
</script>
@yield('script')
</body>
<footer>this is the footer</footer>
</html>