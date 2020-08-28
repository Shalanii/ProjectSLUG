
     var images = ["1.jpg", "2.jpg", "3.jpg","4.jpg"];
     
          $(function () {
             var i = 0;
                 $("#dvImage").css("background-image", "url(/img/" + images[i] + ")");
                 setInterval(function () {
                      i++;
                      if (i == images.length) {
                      i = 0;
                     }
                 $("#dvImage").fadeOut("slow", function () {
                      $(this).css("background-image", "url(/img/" + images[i] + ")");
                     $(this).fadeIn("slow");
                });
        }, 5000);
    });
