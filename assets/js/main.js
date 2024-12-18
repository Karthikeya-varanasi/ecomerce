

function openNav() {
    document.getElementById("myNav").style.width = "80%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}



$(document).ready(function() {
    new Swiper('.heroslide', {
    loop: true,
    centeredSlides: true,   
    autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });
    
    var mySwiper = document.querySelector('.heroslide').swiper
    $(".heroslide").mouseenter(function() {
    mySwiper.autoplay.stop();
    console.log('slider stopped');
    });

    $(".heroslide").mouseleave(function() {
    mySwiper.autoplay.start();
    console.log('slider started again');
    });
});

 document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper(".testimonials-swiper", {
            slidesPerView: 1,
            centeredSlides: true, // Ensures the active slide is in the center
            // loop: true, // Optional: Makes the slider infinite
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1, // Shows partial slides on tablets
                },
                1024: {
                    slidesPerView: 2, // Shows more slides on larger screens
                },
            },
        });
    });

$(document).ready(function() {
    new Swiper('.catogeriey', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        // breakpoints: {
        // "@0.00": {
        //     slidesPerView: 2,
        //     spaceBetween: 10,
        // },
        // "@0.75": {
        //     slidesPerView: 2,
        // },
        // "@1.25": {
        //     slidesPerView: 3,
        //     spaceBetween: 10,
        // },
        // "@1.50": {
        //     slidesPerView: 3,
        //     spaceBetween: 20,
        // },
        // "@1.75": {
        //     slidesPerView: 4,
        //     spaceBetween: 20,
        // },
        // },
        breakpoints: {
            400: {
                slidesPerView: 1,
                spaceBetween: 20,
              },
            500: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
              },
            768: {
              slidesPerView: 3,
              spaceBetween: 40,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
            1199: {
              slidesPerView: 3,
              spaceBetween: 10,
            },
          },
    });
    
    var mySwiper = document.querySelector('.catogeriey').swiper
    $(".catogeriey").mouseenter(function() {
    mySwiper.autoplay.stop();
    console.log('slider stopped');
    });

    $(".catogeriey").mouseleave(function() {
    mySwiper.autoplay.start();
    console.log('slider started again');
    });
});



$(document).ready(function() {
    new Swiper('.Prodectslist', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
         },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            
            
             400: {
                slidesPerView: 1,
                spaceBetween: 20,
              },
            500: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
              },
            768: {
              slidesPerView: 3,
              spaceBetween: 40,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
            1300: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
        // "@0.00": {
        //     slidesPerView: 1,
        //     spaceBetween: 10,
        // },
        // "@0.75": {
        //     slidesPerView: 2,
        //     spaceBetween: 20,
        // },
        // "@1.00": {
        //     slidesPerView: 2,
        //     spaceBetween: 10,
        // },
        // "@1.25": {
        //     slidesPerView: 3,
        //     spaceBetween: 10,
        // },
        // "@1.50": {
        //     slidesPerView: 3,
        //     spaceBetween: 20,
        // },
        // "@1.75": {
        //     slidesPerView: 4,
        //     spaceBetween: 20,
        // },
        // "@2.00": {
        //     slidesPerView: 5,
        //     spaceBetween: 20,
        // },
        },
    });
    
    var mySwiper = document.querySelector('.Prodectslist').swiper
    $(".Prodectslist").mouseenter(function() {
    mySwiper.autoplay.stop();
    console.log('slider stopped');
    });

    $(".Prodectslist").mouseleave(function() {
    mySwiper.autoplay.start();
    console.log('slider started again');
    });
});





$(document).ready(function() {
    new Swiper('.Relatedprodects', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        breakpoints: {
            
            
        "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        "@1.25": {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        "@1.50": {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        "@1.75": {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        },
    });
    
    var mySwiper = document.querySelector('.Relatedprodects').swiper
    $(".Relatedprodects").mouseenter(function() {
    mySwiper.autoplay.stop();
    console.log('slider stopped');
    });

    $(".Relatedprodects").mouseleave(function() {
    mySwiper.autoplay.start();
    console.log('slider started again');
    });
});


$(".sidebar").stick_in_parent({
    offset_top: 5
});




function magnify(imgID, zoom) {
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);
    /*create magnifier glass:*/
    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");
    /*insert magnifier glass:*/
    img.parentElement.insertBefore(glass, img);
    /*set background properties for the magnifier glass:*/
    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
    bw = 3;
    w = glass.offsetWidth / 2;
    h = glass.offsetHeight / 2;
    /*execute a function when someone moves the magnifier glass over the image:*/
    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);
    /*and also for touch screens:*/
    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);
    function moveMagnifier(e) {
      var pos, x, y;
      /*prevent any other actions that may occur when moving over the image*/
      e.preventDefault();
      /*get the cursor's x and y positions:*/
      pos = getCursorPos(e);
      x = pos.x;
      y = pos.y;
      /*prevent the magnifier glass from being positioned outside the image:*/
      if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
      if (x < w / zoom) {x = w / zoom;}
      if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
      if (y < h / zoom) {y = h / zoom;}
      /*set the position of the magnifier glass:*/
      glass.style.left = (x - w) + "px";
      glass.style.top = (y - h) + "px";
      /*display what the magnifier glass "sees":*/
      glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /*get the x and y positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x and y coordinates, relative to the image:*/
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
}














