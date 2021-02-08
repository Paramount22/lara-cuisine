'use strict';

( function( $, window, document, undefined )
{
    $( '.inputfile' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

        // Firefox bug fix
        $input
            .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
            .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });
})( jQuery, window, document );



(function($) {

// close flash message
    $('.close').on('click', function () {
        $('.alert-success').fadeOut();
    });
    
    $('.alert-success').not('.alert-important').delay(3500).fadeOut(350);

    // Dropdown menu on hover

    $('ul.navbar-nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });

    // DELETE comment

     $('.fa-times').on('click', function() {
         return confirm('Vymazať komentár ?');
     });
     
     // Delete recipe
     
     $('.delete-recipe').on('click', function() {
         
        return confirm('Delete ?');
    });

    // Back to top link

     var backToTop = $('.back-to-top');

    $(window).scroll(function(){
        if( $(window).scrollTop() > 300 ) {
            backToTop.show();
        } else {
            backToTop.hide();
        }
    });

    $('a.page-scroll').bind('click', function(event) {
        var anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 50
        }, 1500, 'easeInOutExpo');

        // disable default click behaviour
        event.preventDefault();
    });

    // backToTop.on("click", function(event){
    //     event.preventDefault();
    //     $("html,body").animate({ scrollTop: 0},600);
    //
    // });


    // $('.search-recipes').hide();
     //
     // $('.fa-search').on('click', function () {
     //     $('.search-recipes').fadeIn(300);
     // });


    // Comments

    // var discussion = $('#discussion');
    //
    // discussion.find('form').on('submit', function(event) {
    //
    //     var form = $(this);
    //
    //     var req = $.ajax({
    //         url: form.attr('action'),
    //         type: 'post',
    //         data: form.serialize()
    //     });
    //
    //     req.done(function (data) {
    //         req = $.ajax({
    //             url: 'comment/' + data.id,
    //             type: 'get',
    //             success: function (html) {
    //                 var li = $(html).hide();
    //                 discussion.find('.discussion').append(li);
    //                 li.fadeIn();
    //             }
    //         });
    //
    //     });
    //
    //     form.find('textarea').val('').focus();
    //
    //     event.preventDefault();

    // });


    // discussion.hide();
    //
    // $('.show-comments').on('click', function (event) {
    //     event.preventDefault();
    //     $('#discussion').fadeIn(500);
    //     $('.show-comments').hide();
    //
    // });


}(jQuery));
