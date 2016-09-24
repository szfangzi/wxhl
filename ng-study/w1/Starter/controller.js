weatherApp.controller('HomeController', ['$scope', '$weatherService', '$location', function ($scope, $weatherService, $location) {
    $scope.city = $weatherService.city;
    $scope.$watch('city', function (newValue, oldValue, scope) {
        $weatherService.city = newValue;
    });
    $scope.$watch('days', function (newValue, oldValue, scope) {
        $weatherService.days = newValue;
    });
    $scope.submit = function () {
        $location.path('/forecast');
    };
}]);
weatherApp.controller('ForecastController', ['$scope', '$weatherService', '$apiService', '$routeParams', function ($scope, $weatherService, $apiService, $routeParams) {
    $scope.city = $weatherService.city;
    $scope.days = $routeParams.days || 2;

    $scope.weatherResult = $apiService.getWeatherApi($scope.city, $scope.days);

    $scope.convertToCelsius = function (deg) {
        return Math.round(deg - 273);
    };
}]);