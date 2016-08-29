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

            $.fn.fullpage.moveTo( 2 );
            $(this).find('.page.hxln').addClass(prefix + 'load');
        }
    });

    $('.page').on('onLeave', function (e) {
        $(this).removeClass(prefix + 'load');
    }).on('afterLoad', function (e) {
        $(this).addClass(prefix + 'load');
    });

    //$('.component').on('onLeave', function (e) {
    //    $(this).fadeOut();
    //}).on('afterLoad', function (e) {
    //    $(this).fadeIn();
    //});
});
