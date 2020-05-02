//slick slider
$(document).ready(function () {

  console.log("custom.js loaded");

  $('#offer-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    dots: false,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('#news').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 3000,

  });

  $('#reviews').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 3000,

  });

  initMap();

});


function initMap() {
  var uluru = { lat: 34.425510, lng: -116.985370 };
  var map = new google.maps.Map(
    document.getElementById('map'), { zoom: 4, center: uluru });
  var marker = new google.maps.Marker({ position: uluru, map: map });
}
