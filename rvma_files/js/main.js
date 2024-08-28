$(function () {

  $('.slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<span class="priv_arrow"><i class="fa fa-arrow-left"></i></span>',
    nextArrow: '<span class="next_arrow"><i class="fa-solid fa-arrow-right"></i></span>',
    responsive: [
      {
        breakpoint: 801, 
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 601, 
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

});


$(function () {
  $('.slider-reviews').slick({
    infinite: true,
    slidesToShow: 3, 
    slidesToScroll: 1,
    prevArrow: '<span class="priv_arrow"><i class="fa fa-arrow-left"></i></span>',
    nextArrow: '<span class="next_arrow"><i class="fa-solid fa-arrow-right"></i></span>',
    responsive: [
      {
        breakpoint: 1025, 
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 801, 
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });
});


document.addEventListener('DOMContentLoaded', function() {
  const burgerMenu = document.querySelector('.burger_menu');
  const headerMenu = document.querySelector('.header-menu');

  burgerMenu.addEventListener('click', function() {
      headerMenu.classList.toggle('active');
  });
});

