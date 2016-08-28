/* 基本图文组件对象 */

function H5ComponentBase(options){
    var self = this;
    self._ = 'h5-component';
    self.defaults = {
        type:'base',
        name:'default',
        delay:0,
        speed:400,
        css:{

        },
        animateIn:{},
        animateOut:{},
        center:false
    };
    self.options = {};
    self.prefix = self._ + '-';

    self.$container = null;

    self.init = function () {
        self.options = $.extend({}, self.defaults, options);
        self.id = self.prefix +  ~~(Math.random() * 2e6);
        // 把当前的组建类型添加到样式中进行标记
        var oCls = self._ ,
            typeCls = self.prefix + self.options.type,
            customCls = self.prefix + self.options.name,
            cls = [oCls, typeCls, customCls].join(' ');
        self.$container = $('<div class="' + cls + '" id="' + self.id + '">');

        self.options.text && self.$container.text(self.options.text);
        self.options.width && self.$container.width(self.options.width);
        self.options.height && self.$container.height(self.options.height);
        self.options.css && self.$container.css(self.options.css);

        if( self.options.center === true){
            self.$container.css({
                marginLeft : -(self.options.width/2) + 'px',
                left:'50%'
            });
        }

        self.bind();

        return self;
    };

    self.bind = function () {
        if( typeof self.options.onclick === 'function' ){
            self.$container.on('click',self.options.onclick);
        }
        self.$container.on('onLoad',function(){
            setTimeout(function(){
                self.$container.addClass(self.prefix + 'load').removeClass(self.prefix + 'leave');
                self.options.animateIn && self.$container.animate( self.options.animateIn ,self.options.speed );
            },self.options.delay);
            return false;
        });
        self.$container.on('onLeave',function(){
            setTimeout(function(){
                self.$container.addClass(self.prefix + 'leave').removeClass(self.prefix + 'load');
                self.options.animateOut && self.$container.animate( self.options.animateOut ,self.options.speed);
            },self.options.delay);
            return false;
        });

        return self;
    };

    return self.init();
}
