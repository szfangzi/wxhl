$(function () {
    var firstPage = 1;
    var $pages = null;
    var _ = 'page';
    var prefix = _ + '-';
    $('#wrapper').fullpage({
        onLeave: function (index, nextIndex, direction) {
            $(this).trigger('onLeave');
        },
        afterLoad: function (anchorLink, index) {
            $(this).trigger('afterLoad');
        },
        afterRender: function(a,b,c) {
            $(".fp-tableCell").addClass('clearfix');

            $.fn.fullpage.moveTo( 4 );
            $(this).find('.page.4').addClass(prefix + 'load');
        }
    });

    $('.page').on('onLeave', function (e) {
        $(this).removeClass(prefix + 'load');
    }).on('afterLoad', function (e) {
        $(this).addClass(prefix + 'load');
    });

    //课程方向分布
    var $polyLine = document.querySelector('.poly-line');
    $('.page.course-direction').on('onLeave', function (e) {
        $polyLine.querySelector('canvas').remove();
    }).on('afterLoad', function (e) {
        var canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d'),
            w = 640,
            h = 640;
        canvas.width = ctx.width = w;
        canvas.height = ctx.height = h;
        //水平网格线
        var step = 10;
        ctx.beginPath();
        ctx.lineWidth = 10;
        ctx.strokeStyle = '#aaa';
        for (var i = 0; i < step; i++) {
            var y = (h/step)*i;
            ctx.moveTo(0, y);
            ctx.lineTo(w, y);
            ctx.stroke();
        }
        for (var i = 0; i < step; i++) {
            var x = (w/step)*i;
            ctx.moveTo(x, 0);
            ctx.lineTo(x, h);
            ctx.stroke();
        }


        //canvas.id = 'canvas';
        $polyLine.appendChild(canvas);
        //ctx.moveTo(50,50);
        //ctx.lineTo(100,100);
        //ctx.lineTo(150,150);
        //ctx.lineTo(100,150);
        //ctx.closePath();
        //ctx.stroke();
    });

    //$('.component').on('onLeave', function (e) {
    //    $(this).fadeOut();
    //}).on('afterLoad', function (e) {
    //    $(this).fadeIn();
    //});
});
