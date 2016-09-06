var Singleton = (function() {
    var instantiated;
    function init() {
        return {
            publicMethod: function() {
                alert('hello word');
            },
            publicPrototype: "test"
        };
    }
    return {
        getinstance: function() {
            if (!instantiated) {
                instantiated = new init();
            }
            return instantiated;
        }
    }
})();
var yourOnlyOneObj = Singleton.getinstance();