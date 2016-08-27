(function(factory) {
    if (typeof module === 'object' && typeof module.exports === 'object') {
        factory(require('jquery'));
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define([], factory(window.jQuery));
    } else {
        factory(window.jQuery);
    }
}(function($) {
    //  Don't throw any errors when jQuery
    if(!$) {
        return console.warn('Slider needs jQuery');
    }
    $.Slider = function(context, options){
        var self = this;
        self._ = 'slider';

        self.defaults = {
            autoplay: false,
            //  元素切换延迟时间(毫秒)
            delay: 3000,

            //  动画速度(毫秒)
            speed: 750,

            //  An easing string to use. If you're using Velocity, use a
            //  Velocity string otherwise you can use jQuery/jQ UI options.
            easing: 'swing', // [.42, 0, .58, 1],

            //  Does it support keyboard arrows?
            //  Can pass either true or false -
            //  or an object with the keycodes, like so:
            //  {
            //	 prev: 37,
            //	 next: 39
            // }
            //  You can call any internal method name
            //  before the keycode and it'll be called.
            keys: {
                prev: 37,
                next: 39
            },

            //  Do you want to generate clickable navigation
            //  to skip to each slide? Accepts boolean true/false or
            //  a callback function per item to generate.
            nav: true,

            // 上下页html
            arrows: {
                prev: '<a class="' + self._ + '-arrow prev">Prev</a>',
                next: '<a class="' + self._ + '-arrow next">Next</a>'
            },

            //  动画切换类型
            //  "horizontal": 横向切换
            //  "vertical": 垂直切换
            animation: 'horizontal',
            selectors: {
                container: 'ul:first',
                slides: 'li'
            },

            //  Do you want to animate the heights of each slide as
            //  it moves
            animateHeight: false,

            //  当前圆点导航
            activeClass: self._ + '-active',

            //  Have swipe support?
            //  You can set this here with a boolean and always use
            //  initSwipe/destroySwipe later on.
            swipe: false,
            // Swipe threshold -
            // lower float for enabling short swipe
            swipeThreshold: 0.2
        };

        self.$context = context;
        self.options = {};

        //  set them in the init method.
        self.$parent = null;
        self.$container = null;
        self.$slides = null;
        self.$nav = null;
        self.$arrows = [];

        // 轮播元素总数 以及 当前元素位置
        self.total = 0;
        self.current = 0;

        // 命名前缀 以及 事件随机命名空间后缀
        self.prefix = self._ + '-';
        self.eventSuffix = '.' + self.prefix + ~~(Math.random() * 2e3);

        //声明自动播放定时器
        self.interval = null;

        self.init = function(options){
            //扩展我们默认的设置
            self.options = $.extend({}, self.defaults, options);

            self.$container = self.$context.find(self.options.selectors.container).addClass(self.prefix + 'wrap');
            self.$slides = self.$container.children(self.options.selectors.slides);

            // 初始化容器的基本html和css调整
            self.setup();

            // 根据参数, 初始化圆点导航、上下页功能、键盘上下页操作
            $.each(['nav', 'arrows', 'keys','swipe'], function(index, module) {
                self.options[module] && self['init' + $._ucfirst(module)]();
            });

            self.options.autoplay && self.start();

            //计算轮播元素的个数 并且 设置元素样式
            self.calculateSlides();

            //返回self, 说不定哪天就需要链式调用
            return self.animate(self.options.index || self.current, 'init');
        };

        self.setup = function(){

            self.$context.addClass(self.prefix + self.options.animation).wrap('<div class="' + self._ + '" />');
            self.$parent = self.$context.parent('.' + self._);

            //  self.$context(内容容器)必须是 absolute或者relative，不是的话自动设置成relative
            var position = self.$context.css('position');
            if(position === 'static') {
                self.$context.css('position', 'relative');
            }

            self.$context.css('overflow', 'hidden');

            return self;
        };
        self.calculateSlides = function(){
            self.$slides = self.$container.children(self.options.selectors.slides);

            self.total = self.$slides.length;

            var prop = 'width';

            if(self.options.animation === 'vertical') {
                prop = 'height';
            }

            self.$container.css(prop, (self.total * 100) + '%').addClass(self.prefix + 'carousel');
            self.$slides.css(prop, (100 / self.total) + '%');
        }
        //  Start our autoplay
        self.start = function() {
            self.interval = setTimeout(function() {
                //  Move on to the next slide
                self.next();

                //  If we've got autoplay set up
                //  we don't need to keep starting
                //  the slider from within our timeout
                //  as .animate() calls it for us
            }, self.options.delay);

            return self;
        };

        //  And pause our timeouts
        //  and force stop the slider if needed
        self.stop = function() {
            clearTimeout(self.interval);

            return self;
        };
        self.initNav = function(){
            var $nav = $('<nav class="' + self.prefix + 'nav"><ol /></nav>');

            //  Build our click navigation item-by-item
            self.$slides.each(function(key) {
                //  If we've already set a label, let's use that
                //  instead of generating one
                var label = this.getAttribute('data-nav') || key + 1;

                //  Listen to any callback functions
                if($.isFunction(self.options.nav)) {
                    label = self.options.nav.call(self.$slides.eq(key), key, label);
                }

                //  And add it to our navigation item
                $nav.children('ol').append('<li data-slide="' + key + '">' + label + '</li>');
            });

            //  Keep a copy of the nav everywhere so we can use it
            self.$nav = $nav.insertAfter(self.$context);

            //  Now our nav is built, let's add it to the slider and bind
            //  for any click events on the generated links
            self.$nav.find('li').on('mouseenter' + self.eventSuffix, function() {
                //  Cache our link and set it to be active
                var $me = $(this).addClass(self.options.activeClass);

                //  Set the right active class, remove any other ones
                $me.siblings().removeClass(self.options.activeClass);

                //  Move the slide
                self.animate($me.attr('data-slide'));
            });
        };
        self.initArrows = function(){
            if(self.options.arrows){
                self.options.arrows = self.defaults.arrows;
            }

            $.each(self.options.arrows, function(key, val) {
                self.$arrows.push(
                    $(val).insertAfter(self.$context).on('click' + self.eventSuffix, self[key])
                );
            });

        };
        //  Set up our keyboad navigation
        //  Allow binding to multiple keycodes
        self.initKeys = function() {
            if(self.options.keys === true) {
                self.options.keys = self.defaults.keys;
            }

            $(document).on('keyup' + self.eventSuffix, function(e) {
                $.each(self.options.keys, function(key, val) {
                    if(e.which === val) {
                        $.isFunction(self[key]) && self[key].call(self);
                    }
                });
            });
        };

        //  Requires jQuery.event.swipe
        //  -> stephband.info/jquery.event.swipe
        self.initSwipe = function() {
            var width = self.$slides.width();

            //  We don't want to have a tactile swipe in the slider
            //  in the fade animation, as it can cause some problems
            //  with layout, so we'll just disable it.
            if(self.options.animation !== 'fade') {

                self.$container.on({

                    movestart: function(e) {
                        //  If the movestart heads off in a upwards or downwards
                        //  direction, prevent it so that the browser scrolls normally.
                        if((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
                            return !!e.preventDefault();
                        }

                        self.$container.css('position', 'relative');
                    },

                    move: function(e) {
                        self.$container.css('left', -(100 * self.current) + (100 * e.distX / width) + '%');
                    },

                    moveend: function(e) {
                        // Check if swiped distance is greater than threshold.
                        // If yes slide to next/prev slide. If not animate to
                        // starting point.

                        if((Math.abs(e.distX) / width) > self.options.swipeThreshold) {

                            self[e.distX < 0 ? 'next' : 'prev']();
                        }
                        else {

                            self.$container.animate({left: -(100 * self.current) + '%' }, self.options.speed / 2 );
                        }
                    }
                });
            }
        };

        //  Remove any trace of arrows
        //  Loop our array of arrows and use jQuery to remove
        //  It'll unbind any event handlers for us
        self.destroyArrows = function() {
            $.each(self.$arrows, function(i, $arrow) {
                $arrow.remove();
            });
        };

        //  Remove any swipe events and reset the position
        self.destroySwipe = function() {
            //  We bind to 4 events, so we'll unbind those
            self.$container.off('movestart move moveend');
        };

        //  Unset the keyboard navigation
        //  Remove the handler
        self.destroyKeys = function() {
            //  Remove the event handler
            $(document).off('keyup' + self.eventSuffix);
        };
        //根据目标参数 设置 当前slide和nav的样式
        self.setIndex = function(to) {
            if(to < 0) {
                to = self.total - 1;
            }

            self.current = Math.min(Math.max(0, to), self.total - 1);

            if(self.options.nav) {
                self.$nav.find('[data-slide="' + self.current + '"]')._active(self.options.activeClass);
            }

            self.$slides.eq(self.current)._active(self.options.activeClass);

            return self;
        };
        // to是目标元素标示, dir表示从哪个函数调用, 比如init、next、prev
        self.animate = function(to, dir) {
            //  Animation shortcuts
            //  Instead of passing a number index, we can now
            //  use .data('unslider').animate('last');
            //  or .unslider('animate:last')
            //  to go to the very last slide
            if(to === 'first') to = 0;
            if(to === 'last') to = self.total;

            //  Don't animate if it's not a valid index
            if(isNaN(to)) {
                return self;
            }

            if(self.options.autoplay) {
                self.stop().start();
            }

            //根据目标参数 设置 当前slide和nav的样式
            self.setIndex(to);

            // 声明调用哪种动画类型
            var fn = 'animate' + $._ucfirst(self.options.animation);

            if($.isFunction(self[fn])) {
                self[fn](self.current, dir);
            }

            return self;
        };
        //  Shortcuts for animating if we don't know what the current
        //  index is (i.e back/forward)
        //  For moving forward we need to make sure we don't overshoot.
        self.next = function() {
            var target = self.current + 1;

            //  If we're at the end, we need to move back to the start
            if(target >= self.total) {
                target = 0;
            }

            return self.animate(target, 'next');
        };

        //  Previous is a bit simpler, we can just decrease the index
        //  by one and check if it's over 0.
        self.prev = function() {
            return self.animate(self.current - 1, 'prev');
        };


        //  基本横向动画样式设置
        self.animateHorizontal = function(to) {
            var prop = 'left';

            //  支持rtl反向取元素
            if(self.$context.attr('dir') === 'rtl') {
                prop = 'right';
            }

            return self.slide(prop, to);
        };

        //  垂直动画样式设置 不支持rtl反向取元素
        self.animateVertical = function(to) {
            self.options.animateHeight = true;

            return self.slide('top', to);
        };

        //  移动元素到to
        self.slide = function(prop, to) {
            //  If we want to change the height of the slider
            //  to match the current slide, you can set
            //  {animateHeight: true}
            self.animateHeight(to);

            //  We need to create an object to store our property in
            //  since we don't know what it'll be.
            var obj = {};

            //  Manually create it here
            obj[prop] = -(100 * to) + '%';

            //  And animate using our newly-created object
            return self._move(self.$container, obj);
        };

        //Animate height of slider
        self.animateHeight = function(to) {
            //  If we want to change the height of the slider
            //  to match the current slide, you can set
            //  {animateHeight: true}
            if (self.options.animateHeight) {
                self._move(self.$context, {height: self.$slides.eq(to).outerHeight()}, false);
            }
        };

        self._move = function($el, obj, callback, speed) {
            if(callback !== false) {
                callback = function() {
                    self.$context.trigger(self._ + '.moved');
                };
            }

            return $el._move(obj, speed || self.options.speed, self.options.easing, callback);
        };


        return self.init(options);
    };

    //  Internal (but global) jQuery methods
    //  They're both just helpful types of shorthand for
    //  anything that might take too long to write out or
    //  something that might be used more than once.
    $.fn._active = function(className) {
        return this.addClass(className).siblings().removeClass(className);
    };
    //首字符大写
    $._ucfirst = function(str) {
        //  Take our variable, run a regex on the first letter
        return (str + '').toLowerCase().replace(/^./, function(match) {
            //  And uppercase it. Simples.
            return match.toUpperCase();
        });
    };
    //调用velocity动画插件 或者 jquery的animate方法
    $.fn._move = function() {
        this.stop(true, true);
        //如果有加载velocity动画插件则调用velocity
        return $.fn[$.fn.velocity ? 'velocity' : 'animate'].apply(this, arguments);
    };

    //封装jQuery插件
    $.fn.slider = function(opts) {
        return this.each(function() {
            var $this = $(this);
            //一个页面多个slider，这样可以循环绑定self
            return $this.data('slider', new $.Slider($this, opts));
        });
    };

}));
