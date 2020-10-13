$(document).ready(function(){

    $('.parallax__list>li').addClass('layer');
    $('.parallax__list').parallax();
    $('.wrapper').addClass('active');

    // $('a[href^="#"], *[data-href^="#"]').on('click', function(e){
    //     e.preventDefault();
    //     var t = 900;
    //     var d = $(this).attr('data-href') ? $(this).attr('data-href') : $(this).attr('href');
    //     $('html,body').stop().animate({ scrollTop: $(d).offset().top-150 }, t);
    // });


    $('.header__burger').click(function(event){
    	$('.header__burger,.nav').toggleClass('active');
    	$('body').toggleClass('lock');
    })


    


    // function countup(className){
    //     var countBlockTop = $("."+className).offset().top;
    //     var windowHeight = window.innerHeight;
    //     var show = true;
                    
    //     $(window).scroll( function (){
    //         if(show && (countBlockTop < $(window).scrollTop() + windowHeight)){
    //             show = false;
                        
    //             $('.'+className).spincrement({
    //                 from: 0,
    //                 duration: 4000,
    //             });
    //         }
    //     })
    // }

    
    //     $(function() {
    //     countup("stat_count");

    //     });
});
$('.shopBurg').click(function(event){
    $('.header__burger,.nav, .shopnav').toggleClass('active');
    $('body').toggleClass('lock');
})