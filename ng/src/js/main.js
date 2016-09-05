var app = angular.module('app', []);

//app.controller('EventController', ['$scope', function ($scope) {
//    $scope.count = 0;
//    $scope.$on('MyEvent', function (e) {
//      $scope.count++;
//      console.log(e);
//    });
//  }
//]);
//

//app.controller('Hello', ['$scope', function ($scope) {
//  $scope.greeting = {
//    txt:123123123123
//  };
//}]);

app.controller('UserInfoCtrl', ['$scope', function ($scope) {
  $scope.isRed = true;
  $scope.isGreen = false;
  $scope.setGreen = function () {
    $scope.isRed = false;
    $scope.isGreen =true ;
  };
  $scope.setRed = function () {
    $scope.isRed = true;
    $scope.isGreen = false;
  };

  $scope.isError = false;
  $scope.isWarning = false;
  $scope.showError = function () {
    $scope.msg = 'this is a error!';
    $scope.isError = true;
    $scope.isWarning = false;
  }
  $scope.showWarning = function () {
    $scope.msg = 'this is a warning!';
    $scope.isWarning = true;
    $scope.isError = false;
  }


}]);
