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
// CONTROLLERS
angularApp.controller('mainController', ['$scope', '$timeout', '$http', '$location', '$route', '$routeParams', function ($scope, $timeout, $http, $location, $route, $routeParams) {

  $scope.name = $routeParams.num;
}]);

angularApp.controller('secondController', ['$scope', '$timeout', '$http', '$routeParams', function ($scope, $timeout, $http, $routeParams) {
  console.log($routeParams.num);
  $scope.name = $routeParams.num || 1;
}]);

