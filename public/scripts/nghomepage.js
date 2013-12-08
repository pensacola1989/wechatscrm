var homepage = angular.module('home',[],function ($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

homepage.controller('homeCtrl',function ($scope,homeservice,$rootScope) {
	homeservice
		.getData()
		.success(function (data) {
			$scope.model = JSON.parse(data.homepage);
			$rootScope.$broadcast('httpend');
		});
	$scope.model = {
		homeTitle: 'this is home title',
		keyword: 'this is keyword',
		messageCover: 'http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg',
		logoImg: 'http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg',
		homgBg: 'http://ww1.sinaimg.cn/bmiddle/6538fd8cjw1eb0jzna64mj209605kaa7.jpg'
	};
	$scope.updateData = function () {
		homeservice.
			saveData({data: JSON.stringify($scope.model) })
			.success(function (data) {
				if(data) {
					$rootScope.$broadcast('httpend:success');
				}	
			});
	};
})
.factory('homeservice',function ($http) {
	return {
		saveData: function (data) {
			return $http.post('/wcsite', data);
		},
		getData: function () {
			return $http.get('/wcsite/data');
		}
	};
});

homepage.directive('uploadBtn',function () {
	return {
		restrict: 'A',
		scope: {
			btnmodel: '='
		},
		link:function (scope,elem,attrs) {
			console.log(scope.btnmodel);
			(function initUploader () {
				// var expression = scope.$eval(attrs.model);
				// console.log('---------------------------------------');
				// console.log(expression);
				var config = {
					uploadUrl: '/upload',
					uploadClass: 'pickpic',
					sub_btn: '#submit'
				};
				var btnId = $(elem).attr('id');
				var _uploader = new plupload.Uploader({
		            runtimes: 'html5,html4,flash',
		            browse_button: btnId,
		            max_file_size: '2000mb',
		            chunk_size: '512kb',
		            multi_selection: false,
		            // resize: { width: 125, height: 85, quality: 90 },
		            flash_swf_url: 'plupload.flash.swf',
		            filters: [{
		                extensions: 'jpg,png,gif'
		            }]
		        });

				_uploader.bind('UploadProgress',function (up,files) {
					$('#' + btnId).siblings('.percent').html(files.percent + '%');
		        });

		        _uploader.bind('BeforeUpload',function (up,files) {
		        	up.settings.file_data_name = 'chunkfile';
		        	up.settings.url = config.uploadUrl;
		        });

		        _uploader.bind('FileUploaded',function (up,file,info) {
		        	//$('#' + btnId).siblings('img').attr('src',info.response);
		        	scope.$apply(function () {
		        		scope.btnmodel = info.response;		        		
		        	});
		        });

		        _uploader.bind('UploadComplete',function (up,file) {
		        	$('#' + btnId).siblings('.percent').html('<span style="color:green;" class="glyphicon glyphicon-ok"></span>');
		        });

				_uploader.bind('init',function () {
		        	console.log('init');
		        });

		        
		        _uploader.init();

		        _uploader.bind('FilesAdded',function (up,files) {
		        	up.start();
		        });	

			})();
		}
	};
})
.directive('ajaxButton', function() {
    return {
        restrict: 'A',
	    scope:{
	    	action: '&'   
	    },
        link: function(scope, elem, attrs) {
          var formHtml = $(elem).html();
          function buttonStatus(status) {

            var loadText = status == 'start' ? '提交...' : formHtml;
            var isDisabled = status == 'start' ? true : false;
            $(elem).attr('disabled',isDisabled).html(loadText);
            
          }
          
          elem.click(function(){
            buttonStatus('start');
            //-------call function -------------
            scope.$apply(function () {
            	scope.action();            	
            });
          });
          //-------listen events-----------------
            scope.$on('httpend:success',function() {
				$.ambiance({
	        		message: "保存成功！", 
		            title: "消息",
		            type: "success"
		        });            
		        console.log('success!!!');
              	buttonStatus('end');
            });
        }
    };
});
