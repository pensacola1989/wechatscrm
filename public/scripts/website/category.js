var cate = angular.module('cate',[]);

cate.config(function ($routeProvider) {
	$routeProvider
		.when('/index', {
	        templateUrl: 'mainpage.html',
	        controller: 'cateCtrl'
	    })
	    .when('/get',{
	    	templateUrl: 'getpage.html',
	    	controller: 'getCtrl'
	    })
		.otherwise({
	    	redirectTo: '/index'
	  	});
})
.controller('cateCtrl',function ($scope) {
	
})
.controller('getCtrl',function ($scope) {
	
})
.directive('fadeIn',['$timeout',function (timer) {
	return {
		restrict: 'A',
		link: function (scope,elem,attrs) {
			scope.$on('httpend',function () {
				$(elem).fadeIn();
			});
			timer(function () {
				$(elem).fadeIn();
			},200);
		}
	}
}]);