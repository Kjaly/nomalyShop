
$(function() {

   $(".input input").focus(function() {

      $(this).parent(".input").each(function() {
         $("label", this).css({
            "line-height": "18px",
            "font-size": "18px",
            "font-weight": "100",
            "top": "0px"
         })
         $(".spin", this).css({
            "width": "100%"
         })
      });
   }).blur(function() {
      $(".spin").css({
         "width": "0px"
      })
      if ($(this).val() == "") {
         $(this).parent(".input").each(function() {
            $("label", this).css({
               "line-height": "60px",
               "font-size": "24px",
               "font-weight": "300",
               "top": "10px"
            })
         });

      }
   });

   $(".button").click(function(e) {
      var pX = e.pageX,
         pY = e.pageY,
         oX = parseInt($(this).offset().left),
         oY = parseInt($(this).offset().top);

      $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
      $('.x-' + oX + '.y-' + oY + '').animate({
         "width": "500px",
         "height": "500px",
         "top": "-250px",
         "left": "-250px",

      }, 600);
      $("button", this).addClass('active');
   })


   $(".alt-2").click(function() {
      let  clientWidth =document.documentElement.clientWidth
      function windowSize(){
         let w = window.innerWidth;
         console.log(w)
         if (w >= '320'){
            $(".error").css({
               "margin-top": "0px"
            })
         } else {
            $(".error").css({
               "margin-top": "0px"
            })
         }
      }
      windowSize();
      if (!$(this).hasClass('material-button')) {
         $(".shape").css({
            "width": "100%",
            "height": "100%",
            "transform": "rotate(0deg)"
         })


         setTimeout(function() {
            $(".overbox").css({
               "overflow": "initial"
            })
            if($("div").is(".error")){

               $(window).on('load resize',windowSize);
            }
         }, 600)
         if(clientWidth > 552){
            $(this).animate({
               "width": "100px",
               "height": "100px"
            }, 500, function() {
               $(".box").removeClass("back");

               $(this).removeClass('active')
            });

            $(".overbox .title").fadeOut(300);
            $(".overbox .input").fadeOut(300);
            $(".overbox .button").fadeOut(300);

            $(".alt-2").addClass('material-buton');
         } else {
            $(this).animate({
               "width": "50px",
               "height": "50px"
            }, 500, function() {
               $(".box").removeClass("back");

               $(this).removeClass('active')
            });

            $(".overbox .title").fadeOut(300);
            $(".overbox .input").fadeOut(300);
            $(".overbox .button").fadeOut(300);

            $(".alt-2").addClass('material-buton');
         }

      }

   })

   $(".material-button").click(function() {
      function windowSize(){
         let w = window.innerWidth;
         if (w >= '320'){
            $(".error").css({
               "margin-top": "80px"
            })
            $(".button").css({
               "margin": "15px 0px"
            })
         } else {
            $(".error").css({
               "margin-top": "60px"
            })
            $(".button").css({
               "margin": "15px 0px"
            })
         }
      }
      windowSize();
      if ($(this).hasClass('material-button')) {
         setTimeout(function() {
            $(".overbox").css({
               "overflow": "hidden"
            })
            $(".box").addClass("back");
            if($("div").is(".error")){

               $(window).on('load resize',windowSize);
            }

         }, 200)
         $(this).addClass('active').animate({
            "width": "800px",
            "height": "850px"
         });

         setTimeout(function() {
            $(".shape").css({
               "width": "50%",
               "height": "50%",
               "transform": "rotate(45deg)"
            })

            $(".overbox .title").fadeIn(300);
            $(".overbox .input").fadeIn(300);
            $(".overbox .button").fadeIn(300);
         }, 700)

         $(this).removeClass('material-button');

      }

      if ($(".alt-2").hasClass('material-buton')) {
         $(".alt-2").removeClass('material-buton');
         $(".alt-2").addClass('material-button');
      }

   });

   if ($(".hi").length){
      $(".alt-2").css({
         "display": "none",
      })

   }

});