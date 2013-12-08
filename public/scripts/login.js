var login = login || (function () {
	
	$('#mylogin').bind('click',submitForm);

	function submitForm () {
		var temp = $(this).html();
		
		$(this).addClass('disabled');
		

		var _this = this;

		var form = {};
		form.email = $('#inputEmail').val();
		form.password = $('#inputPassword').val();

		if(form.username == '' || form.password == '') {
			alert('请输入完整的登录凭据！')
			return false;
		}
		$(this).html('提交.....');
		$.ajax({
			url: '/checkUser',
			type: 'POST',
			dataType: 'json',
			data: form
		})
		.success(function (data) {
			//alert(data);
			window.location.href = '/dashboard';
		})
		.error(function () {
			// body...
		})
		.done(function () {
			$(_this).removeClass('disabled');
			$(_this).html(temp);
		});
	}

	return {
		submit: submitForm
	};

})();