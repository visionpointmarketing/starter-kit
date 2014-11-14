function visitBfs(node, func) {
    var q = [node];
    while (q.length > 0) {
        node = q.shift();
        if (func) {
            func(node);
        }
        for (var i=0; i<node.children.length; i++) {
            if (node.children.length > 0 ) {
                var child = node.children[i];
                var breadth = node.children.length;
                index = _.indexOf(node.children, node);
                if (child.tagName == "LI") {

                    jQuery( child ).addClass( "width-" + breadth );
                    // console.log(child);   /* displays item's html tag / attributes  */
                    // console.log(node.children.length);   /* displays number of items in level (breadth) */
                    // console.log(child.tagName);
                    // console.log($( child ).siblings());
                }
            }
        }
 
        _.each(node.children, function (child) {
            q.push(child);
        });
    }
}

jQuery.fn.doFade = function(settings) {

    // if no paramaters supplied...
    settings = jQuery.extend({
        fadeColor: "black",
        duration: 200,
        fadeOn: 0.95,
        fadeOff: 0.5
    }, settings);

    var duration = settings.duration;
    var fadeOff = settings.fadeOff;
    var fadeOn = settings.fadeOn;
    var fadeColor = settings.fadeColor;
    //console.log(fadeColor);
        
    jQuery(this).hover(function(){
      jQuery(this)
          .stop()
          .data("origColor", jQuery(this).css("background-color"))
          .animate({
              opacity: fadeOn,
              backgroundColor: fadeColor
          }, duration)
    }, function() {
      jQuery(this)
          .stop()
          .animate({
              opacity: fadeOff,
              backgroundColor: jQuery(this).data("origColor")
          }, duration)
    });

};

jQuery(document).ready(function ($) {
    var node = document.getElementsByClassName('menu')[0];
    visitBfs(node);

    //options bar functionality to switch b/w horizontal & vertical views
    $('.options li').on('click', function(event){
        //remove all active classes from the options
        $('.options li').each(function(index){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        //remove all classes from the nav
        $('#option-switch').removeClass();
        //get the ID of the option selected
        var target_id = $(this).attr('id');
        $('#option-switch').addClass(target_id);
    });

    //add HTML to display home link icon (font-awesome)
    $('.menu-block-wrapper').prepend('<a href="/" class="home"><i class="fa fa-home"></i></a>');

    //add HTML to show toggle icon (font-awesome)
    $('ul.menu li').prepend('<i class="toggle-icon fa fa-times"></i>');
    //toggle functionality to show and hide menu items
    $('.toggle-icon').on('click', function(e){
        $(this).siblings().children().toggleClass("hide");
        $(this).toggleClass("fa-plus");
    });


    /* Color Change On Hover (jquery.color.js only works with jquery version 1.7 or below) */
    //$("ul.menu").css("opacity", "0.5");
    $("html body .sitemap ul.menu").doFade({ fadeColor: "#362b40", fadeOff: "0.5", fadeOn: "0.99" });
    $("html body .sitemap ul.menu ul.menu").doFade({ fadeColor: "#354668", fadeOff: "0.5", fadeOn: "0.99" });
    $("html body .sitemap ul.menu ul.menu ul.menu").doFade({ fadeColor: "#304531", fadeOff: "0.5", fadeOn: "0.99" });
    $("html body .sitemap ul.menu ul.menu ul.menu ul.menu").doFade({ fadeColor: "#72352d", fadeOff: "0.5", fadeOn: "0.99" });

});