var homepage = (function () {
	
	var $title = $('#inputTitle')
		, $keyword = $('#inputKeyword')
		, $messageCover = $('#messageCover')
		, $logoImg = $('#logoImg')
		, $homeBg = $('#homeBg');

	var model = {
		homeTitle: '',
		keyword: '',
		messageCover: '',
		logoImg: '',
		homeBg: ''
	}

	var config = {
		uploadUrl: '/upload',
		uploadClass: 'pickpic',
		sub_btn: '#submit'
	};

	function initUploader (opts) {

		var _uploader = new plupload.Uploader({
            runtimes: 'html5,html4,flash',
            browse_button: opts.idselector,
            max_file_size: opts.maxFileSize,//2000mb
            chunk_size: opts.chunkSize,//'512kb'
            multi_selection: opts.isMulti,
            // resize: { width: 125, height: 85, quality: 90 },
            flash_swf_url: 'plupload.flash.swf',
            filters: [{
                extensions: opts.exts//'jpg,png,mp3,mp4,gif'
            }]
        });

        _uploader.bind('UploadProgress',function (up,files) {
			$('#' + opts.idselector).siblings('.percent').html(files.percent + '%');
        });

        _uploader.bind('BeforeUpload',function (up,files) {
        	up.settings.file_data_name = 'chunkfile';
        	up.settings.url = config.uploadUrl;
        });

        _uploader.bind('FileUploaded',function (up,file,info) {
        	$('#' + opts.idselector).siblings('img').attr('src',info.response);
        	console.log(info);
        });

        _uploader.bind('UploadComplete',function (up,file) {
        	$('#' + opts.idselector).siblings('.percent').html('<span style="color:green;" class="glyphicon glyphicon-ok"></span>');
        });

		_uploader.bind('init',function () {
        	console.log('init');
        });

        
        _uploader.init();

        _uploader.bind('FilesAdded',function (up,files) {
        	alert(files.length);
        	up.start();
        });	
	}

	function bindSubmit () {
		//$(config.sub_btn).button();
		$(config.sub_btn).bind('click',function () {
			$(this).addClass('disabled').html('正在提交');
			generateJson();
			postData({ data: JSON.stringify(model)});
		});
	}

	function postData(model) {
		$.ajax({
            type: 'POST',
            data: model,
            url: '/wcsite',
            dataType: 'json'
        })
        .success(function (data) {
        	console.log(data);	
        	$(config.sub_btn).button('reset');
        	$.ambiance({
        		message: "保存成功！", 
	            title: "消息",
	            type: "success"
	        });
        })
        .error(function () {
        
        })
        .complete(function () {
        	$(config.sub_btn).removeClass('disabled').html('提交');
        });
	}

	function renderData(data) {
		if(!data)
			return;

		$title.val(data.homeTitle);
		$keyword.val(data.keyword);
		$messageCover.attr('src',data.messageCover);
		$logoImg.attr('src',data.logoImg);
		$homeBg.attr('src',data.homeBg);
	}

	function loadData () {
		$.ajax({
			type: 'GET',
			data: {},
			url: '/wcsite/data',
			dataType: 'json'
		})
		.success(function (data) {
			if(data && data.homepage) {
				renderData(JSON.parse(data.homepage));
			}
		})
		.error(function () {
			
		})
		.complete(function () {
			
		});
	}

	function init () {
		loadData();
		bindUploader(config.uploadClass);
		bindSubmit();
	}

	// homeTitle: '',
	// keyword: '',
	// messageCover: '',
	// logoImg: '',
	// homeBg: ''
	function generateJson () {
		model.homeTitle = $('#inputTitle').val();
		model.keyword = $('#inputKeyword').val();
		model.messageCover = $('#messageCover').attr('src');
		model.logoImg = $('#logoImg').attr('src');
		model.homeBg = $('#homeBg').attr('src');
	}

	function bindUploader (className) {
		$('.' + className).each(function () {
			var id = $(this).attr('id');
			var opt = {};
			opt.idselector = id;
			opt.maxFileSize = '200mb';
			opt.chunkSize = '512kb';
			opt.isMulti = false;
			opt.exts = 'jpg,png';
			initUploader(opt);
		});
	}

	return {
		init: init
	};

})();

$(document).ready(function () {
	homepage.init();
});