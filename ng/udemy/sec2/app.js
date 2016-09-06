// MODULE
var angularApp = angular.module('angularApp', ['ngRoute']);

angularApp.config(function ($routeProvider) {
  $routeProvider.when('/', {
    templateUrl:'../../src/tmpl/a.html',
    controller:'mainController'
  }).when('/b/:num', {
    templateUrl:'../../src/tmpl/b.html',
    controller:'secondController'
  }).when('/b', {
    templateUrl:'../../src/tmpl/b.html',
    controller:'secondController'
  });
});

angularApp.service('serviceName', function () {
  var self = this;
  self.name = 'john';
  self.nameLength = function () {
    return self.name.length;
  }

});

// CONTROLLERS
angularApp.controller('mainController', ['$scope', function ($scope) {
  $scope.arr = [{a:1},{a:1},{a:1}];
  $scope.obj={name:'ken111',age:5};
  $scope.name = 'ken';
}]);

angularApp.controller('secondController', ['$scope', function ($scope) {
  $scope.name = 'ann';
}]);

angularApp.directive('searchResult', function () {
  return{
    restrict:'CM',
    templateUrl:'../../src/tmpl/tmpl.html',
    replace:true,
    scope:{obj:'='}
  }
});
