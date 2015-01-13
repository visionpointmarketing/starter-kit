function traverseBF(node, func) {
    //breadth first tree traversal to determine how many items in each level (http://www.timlabonne.com/2013/07/tree-traversals-with-javascript)
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
    //add class to correct menu block (w/o admin menu could be traversed)
    $(".menu-block-wrapper > .menu").addClass('parse');
    var node = document.getElementsByClassName('parse')[0];
    // console.log(node);    /* displays menu being parsed  */
    traverseBF(node);

    /* Extra Features Control Panel */
    $('.control-panel').on('click',function(e){
        $(this).toggleClass('open');
    });
    //switch b/w horizontal & vertical views
    $('.layout-switch li').on('click', function(event){
        $('.control-panel').toggleClass('open'); //keep control panel open
        //remove all active classes from li's
        $('.layout-switch li').each(function(index){
            $(this).removeClass('active');
        });
        //add active class to appropriate li
        $(this).addClass('active');
        //get the ID of the option selected
        var target_id = $(this).attr('id');
        $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", "auto" );
        if (target_id == 'o1'){
            $('#option-switch').removeClass('o2');
            $('#option-switch').addClass('o1');
            //set height of 1st level based on page height so hover color will show
            $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", $(document).height() + "px" );
        }
        if (target_id == 'o2'){
            $('#option-switch').removeClass('o1');
            $('#option-switch').addClass('o2');
            $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", "auto" );
        }
    });
    $('.hover-switch li').on('click', function(event){
        $('.control-panel').toggleClass('open'); //keep control panel open
        //remove all active classes from li's
        $('.hover-switch li').each(function(index){
            $(this).removeClass('active');
        });
        //add active class to appropriate li
        $(this).addClass('active');
        //get the ID of the option selected
        var target_id = $(this).attr('id');
        if (target_id == 'o3'){
            $('#option-switch').removeClass('o4');
            $('#option-switch').addClass('o3');
            //console.log(document.documentElement.scrollHeight);
            $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", $(document).height() + "px" );
        }
        if (target_id == 'o4'){
            $('#option-switch').removeClass('o3');
            $('#option-switch').addClass('o4');
            $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", "auto" );
        }
    });
    $('.toggle-switch li').on('click', function(event){
        $('.control-panel').toggleClass('open'); //keep control panel open
        //remove all active classes from li's
        $('.toggle-switch li').each(function(index){
            $(this).removeClass('active');
        });
        //add active class to appropriate li
        $(this).addClass('active');
        //get the ID of the option selected
        var target_id = $(this).attr('id');
        if (target_id == 'o5'){
            $('#option-switch').removeClass('o6');
            $('#option-switch').addClass('o5');
        }
        if (target_id == 'o6'){
            $('#option-switch').removeClass('o5');
            $('#option-switch').addClass('o6');
        }
    });

    //add HTML to display home link icon (font-awesome)
    $('.menu-block-wrapper').prepend('<a href="/" class="home"><i class="fa fa-home"></i></a>');

    //add HTML to show toggle icon (font-awesome)
    $('ul.menu li').prepend('<i class="toggle-icon fa fa-times"></i>');
    //toggle functionality to show and hide menu items
    $('.toggle-icon').on('click', function(e){
        $(this).siblings().children().toggleClass("hide");
        $(this).toggleClass("fa-plus");
        //adjust height for hover color
        $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", "auto" );
        $("#option-switch.o1 .sitemap .menu-block-wrapper > ul.menu" ).css( "height", $(document).height() + "px" );
    });


});