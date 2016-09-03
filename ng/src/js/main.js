var app = angular.module('app', []);

app.controller('EventController', ['$scope',
  function EventController($scope) {
    $scope.count = 0;
    $scope.$on('MyEvent', function (e) {
      $scope.count++;
      console.log(e);
    });
  }
]).controller('EventController1', ['$scope',
  function EventController1($scope) {
    $scope.count = 0;
    $scope.fn = function () {
      console.log(123123);
    }
  }
]);
