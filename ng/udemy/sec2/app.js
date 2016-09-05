// MODULE
var angularApp = angular.module('angularApp', ['ngMessages']);

// CONTROLLERS
angularApp.controller('mainController', function ($scope, $log, $filter) {
  $log.log($filter('uppercase')('asdasdasdasd'));

});

var test = function (a,b,c,d,e) {
  return 'x';
}
console.log(angular.injector.$$annotate(test));

