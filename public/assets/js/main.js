$(document).ready(function () {
    setTimeout(function () {
        $(".elipse").fadeOut(100);
    }, 3000);

    setTimeout(function () {
      $(".loader_video").fadeOut(100);
        $(".xs-videos").fadeOut(1000);
      //window.setTimeout(function(){
      if(localStorage.getItem("aida_newsletter") == null){
          window.setTimeout(function(){
              $('#mostrarModal').modal()
          }, 5000)

          let date = new Date
          date.setHours(date.getHours() + 1)
         // console.log("date", date)
          localStorage.setItem("aida_newsletter", date.getTime())

      }else{
          let date = new Date
          let time = localStorage.getItem("aida_newsletter")
          if(time < date){
              $('#mostrarModal').modal()

              date.setHours(date.getHours() + 1)
              localStorage.setItem("aida_newsletter", date.getTime())
          }

      }
    //}, 5000)
  }, 5000);
});

$(document).ready(function($) {
  $("#mostrarmodal").modal("show");


});
// Menú responsive
$(function () {
    $('[data-toggle="offcanvas"]').on("click", function () {
        $(".offcanvas-collapse").toggleClass("open");
        $("body").toggleClasss("offcanvas-expanded");
    });
});

$(".hamburger").on("click", function () {
    $(this).toggleClass("is-active");
});

$(".nav-link").click(function () {
    $(".offcanvas-collapse").removeClass("open");
    $(".hamburger").toggleClass("is-active");
    $("body").removeClass("offcanvas-expanded");
});

// Menú fixed
$(window).scroll(function () {
	if ($(document).scrollTop() > 70 && $(window).width() >= 0) {
		$(".navbar-fixed-js").addClass("fixed");
		//  $("#iso").addClass('img-size').attr('src', 'assets/img/logo.png').removeClass('scroll-up');
	} else {
		$(".navbar-fixed-js").removeClass("fixed");

	}
});


/*****************banner************** */
$('.main-banner__content').slick({
    infinite: true,
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    autoplaySpeed: 3000,
    arrows:true,
    fade: true,
    cssEase: "linear",
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
        }
    },
    {
        breakpoint: 900,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,

        }
    }
    ]
});
(function($) {
  $.fn.timeline = function() {
    var selectors = {
      id: $(this),
      item: $(this).find(".timeline-item"),
      activeClass: "timeline-item--active",
      img: ".timeline__img"
    };
    selectors.item.eq(0).addClass(selectors.activeClass);
    selectors.id.css(
      "background-image",
      "url(" +
        selectors.item
          .first()
          .find(selectors.img)
          .attr("src") +
        ")"
    );
    var itemLength = selectors.item.length;
    $(window).scroll(function() {
      var max, min;
      var pos = $(this).scrollTop();
      selectors.item.each(function(i) {
        min = $(this).offset().top;
        max = $(this).height() + $(this).offset().top;
        var that = $(this);
        if (i == itemLength - 2 && pos > min + $(this).height() / 2) {
          selectors.item.removeClass(selectors.activeClass);
          selectors.id.css(
            "background-image",
            "url(" +
              selectors.item
                .last()
                .find(selectors.img)
                .attr("src") +
              ")"
          );
          selectors.item.last().addClass(selectors.activeClass);
        } else if (pos <= max - 40 && pos >= min) {
          selectors.id.css(
            "background-image",
            "url(" +
              $(this)
                .find(selectors.img)
                .attr("src") +
              ")"
          );
          selectors.item.removeClass(selectors.activeClass);
          $(this).addClass(selectors.activeClass);
        }
      });
    });
  };
})(jQuery);

$("#timeline-1").timeline();


var zoomer = function (){
  document.getElementById('img-zoomer-box')
    .addEventListener('mousemove', function(e) {

    var original = document.getElementById('img1'),
        magnified = document.getElementById('img2'),
        style = magnified.style,
        x = e.pageX - this.offsetLeft,
        y = e.pageY - this.offsetTop,
        imgWidth = original.width,
        imgHeight = original.height,
        xperc = ((x/imgWidth) * 100),
        yperc = ((y/imgHeight) * 100);

    if(x > (.01 * imgWidth)) {
      xperc += (.15 * xperc);
    };//lets user scroll past right edge of image

    if(y >= (.01 * imgHeight)) {
      yperc += (.15 * yperc);
    };//lets user scroll past bottom edge of image

    style.backgroundPositionX = (xperc - 9) + '%';
    style.backgroundPositionY = (yperc - 9) + '%';

    style.left = (x - 180) + 'px';
    style.top = (y - 180) + 'px';

  }, false);
}();






 

