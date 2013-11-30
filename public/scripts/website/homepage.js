var homepage = (function () {
	
	var config = {
		uploadUrl: '/upload2'
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

	function init () {
		// var opt = {};
		// opt.idselector = 'pickpic-btn';
		// opt.maxFileSize = '200mb';
		// opt.chunkSize = '512kb';
		// opt.isMulti = false;
		// opt.exts = 'jpg,png,mp3,mp4,gif';
		//initUploader(opt);
		bindUploader('pickpic');
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