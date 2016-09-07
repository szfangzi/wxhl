weatherApp.service('$weatherService', [function () {
    this.city = 'shenzhen';
    //this.days = '3';
}]);

weatherApp.service('$apiService', ['$resource', function ($resource) {
    var self = this;
    self.getWeatherApi = function (city, days) {
        var weatherAPI = $resource('http://api.openweathermap.org/data/2.5/forecast/daily?APPID=14ed9feb1e0c9f7aae7a78b664e09803', {callback:"JSON_CALLBACK"}, {get:{method:"JSONP"} });
        return weatherAPI.get({
            q:city,
            cnt:days
        });
    };

}]);