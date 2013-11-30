@extends('globalSite.layout')

@section('content')
<div class="container reg_container">
	<h1 class="myheader">登录</h1>
	<hr/>
	<dive class="form-horizontal">
	  <div class="form-group">
	    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="inputPassword" placeholder="密码">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="remember"> 记住我
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button id="mylogin" type="submit" class="btn btn-primary btn-lg btn-block" data-loading-text="Loading...">登录</button>
	    </div>
	  </div>
	</div>
</div>	
@stop
@section('script')
{{ HTML::script('/scripts/login.js') }}
<script type="text/javascript">
	$(document).ready(function () {
		
	});
</script>
@stop