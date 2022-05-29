const open = document.getElementById('open');
const close = document.getElementById('close');
const container = document.querySelector('.container');
const circle = document.querySelector('.circle');
const body = document.querySelector('body');
const lu = document.querySelector('.lu');
const nav = document.querySelector('.nav');
const overlay = document.createElement('DIV');
body.appendChild(overlay);

open.addEventListener('click',()=> {
    container.classList.add('show-nav');
    circle.classList.add('show-nav');
    container.classList.add('overlay');
    overlay.classList.add('overlay');
    nav.classList.add('active');

    if(overlay.classList.contains('overlay')){
        overlay.addEventListener('click',()=>{
            container.classList.remove('show-nav');
            circle.classList.remove('show-nav');
            container.classList.remove('overlay');
            overlay.classList.remove('overlay');
            nav.classList.remove('active');
        });
    }
});
close.addEventListener('click',()=> {
    container.classList.remove('show-nav');
    circle.classList.remove('show-nav');
    container.classList.remove('overlay');
    body.classList.remove('overlay');
    overlay.classList.remove('overlay');
    nav.classList.remove('active');
});
container.addEventListener('click',()=>{
    container.classList.remove('show-nav');
    circle.classList.remove('show-nav');
    container.classList.remove('overlay');
    body.classList.remove('overlay');
    overlay.classList.remove('overlay');
    nav.classList.remove('active');

});
lu.addEventListener('click',()=>{
    container.classList.remove('show-nav');
    circle.classList.remove('show-nav');
    container.classList.remove('overlay');
    body.classList.remove('overlay');
    overlay.classList.remove('overlay');
    nav.classList.remove('active');
});

var swiper = new Swiper(".mySwiper", {
    direction: getDirection(),
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    // mousewheel: true,
    autoplay: {
      delay: 10000,
      disableOnInteraction: false,
    },
    loop:true
    
  });
  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = windowWidth <= 768 ? 'horizontal' : 'vertical';

    return direction;
  }
  var swiper1 = new Swiper(".mySwiper1", {
    direction: 'horizontal',
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    loop:true,
    // mousewheel: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    coverflowEffect: {
      rotate: 0,
      stretch: 1000,
      depth: 0,
      modifier: 0,
      slideShadows: false,
    },
  });
