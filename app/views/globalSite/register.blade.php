@extends('globalSite.layout')

@section('content')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign"></span><span style="margin-left:10px;">消息</span></h4>
      </div>
      <div class="modal-body cb-message">
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" >Close</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='/dashboard'">了解</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container reg_container">
	<h1 class="myheader">注册</h1>
	<hr/>
	<!-- <form role="form" id="reg_form"> -->
	  <div class="form-group">
	  	<label for="InputUserName">用户名</label>
	  	<input type="text" class="form-control input" id="InputUserName" placeholder="用户名"/>
	  	<span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email 地址</label>
	    <input type="email" class="form-control input" id="InputEmail" placeholder="E-mail">
	    <span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <div class="form-group">
	    <label for="InputPassword">密码</label>
	    <input type="password" class="form-control input" id="InputPassword" placeholder="密码">
	    <span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <div class="form-group">
	    <label for="InputPassword2">密码确认</label>
	    <input type="password" class="form-control input" id="InputPassword2" placeholder="密码确认">
	    <span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <div class="form-group">
	    <label for="mobile">手机</label>
	    <input type="text" class="form-control input" id="InputMobile" placeholder="手机号码"/>
	    <span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <div class="form-group">
	    <label for="qq">QQ</label>
	    <input type="text" class="form-control input" id="InputQQ" placeholder="qq"/>
	    <span></span>
	  	<span class="help-block tips"></span>
	  </div>
	  <button type="submit" class="btn btn-default btn-lg">马上注册</button>
	<!-- </form>	 -->
</div>

@stop
@section('script')
{{ HTML::script('/scripts/index.js') }}
<script>
$(document).ready(function  () {
    register.init();
});
</script>
@stop
