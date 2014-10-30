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

jQuery(document).ready(function ($) {
    var node = document.getElementsByClassName('menu')[0];
    visitBfs(node);

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

    //add HTML to display home link (font-awesome icon)
    $('.menu-block-wrapper').prepend('<a href="/" class="home"><i class="fa fa-home"></i></a>');

});

