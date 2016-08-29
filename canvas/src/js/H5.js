/* 内容管理对象 */

var H5 = function (options) {
    var self = this;
    self._ = 'h5';
    self._page = 'h5-page';
    self._component = 'h5-component';
    self.defaults = {

    };
    self.options = {};
    self.prefix = self._ + '-';

    self.id = self.prefix + ~~(Math.random()*2e6);
    self.$container = null;
    self.pages = [];

    self.init = function (){
        self.options = $.extend({}, self.defaults, options);
        self.$container = $('<div class="'+self._+'" id="'+self.id+'">').hide();
        $('body').prepend( self.$container );

        return self;
    };
    /**
     * 新增一个页
     * @param {string} name 组建的名称，会加入到ClassName中
     * @param {string} text 页内的默认文本
     * @return {H5} H5对象，可以重复使用H5对象支持的方法
     */
    self.addPage = function(options ){
        var page = {};
        var cls = self._page + ' section';
        page.components = [];
        page.$container = $('<div class="'+cls+'">');
        page.options = $.extend({}, options);
        page.options.name && page.$container.addClass(self.prefix + page.options.name);
        page.options.text && page.$container.text(page.options.text);
        page.options.css && page.$container.css(page.options.css);

        self.$container.append(page.$container);
        self.pages.push( page );
        if( typeof self.options.whenAddPage === 'function' ){
            self.options.whenAddPage();
        }
        return self;
    };

    /* 新增一个组件 */
    self.addComponent = function(options){
        var component = {};
        var page = self.pages[self.pages.length-1];
        var $page = page.$container;
        switch( options.type ){
            case 'base' :
                component = new H5ComponentBase(options);
                page.components.push(component);
                break;
            //
            //case 'polyline' :
            //    component = new H5ComponentPolyline(options);
            //    break;
            //
            //case 'pie' :
            //    component = new H5ComponentPie(options);
            //    break;
            //case 'bar' :
            //    component = new H5ComponentBar(options);
            //    break;
            //case 'bar_v' :
            //    component = new H5ComponentBar_v(options);
            //    break;
            //
            //case 'radar' :
            //    component = new H5ComponentRadar(options);
            //    break;
            //
            //case 'pie' :
            //    component = new H5ComponentPie(options);
            //    break;
            //case 'ring' :
            //    component = new H5ComponentRing(options);
            //    break;
            //case 'point' :
            //    component = new H5ComponentPoint(options);
            //    break;
            default:
        }

        $page.append(component.$container);

        return self;
    };
    /* H5对象初始化呈现 */
    self.load = function( firstPage ){
        self.$container.fullpage({
            'sectionsColor':['#ff9900','blue','green','pink', 'red', 'purple'],
            onLeave:function( index, nextIndex, direction) {
                $(this).find('.' + self._component).trigger('onLeave');
            },
            afterLoad:function( anchorLink, index ) {
                $(this).find('.' + self._component).trigger('onLoad');
            }
        });
        self.pages[0].$container.find('.' + self._component).trigger('onLoad');
        self.$container.show();
        if(firstPage){
            $.fn.fullpage.moveTo( firstPage );
        }
    };

    return self.init();
}
