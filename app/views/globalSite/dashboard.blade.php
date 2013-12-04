@extends('globalSite.layout')

@section('content')
<div class="container reg_container">
	<h1 class="myheader">主面板</h1>
	<hr/>
	<a href="{{url('wcsite')}}" class="imglink">
	<div class="dashboard-pan">
		<div class="panItem">
			{{ HTML::image('images/dash_website.png') }}
			<span class="item-tip">微信网站</span>
		</div>
	</div>
	</a>
</div>
@stop
