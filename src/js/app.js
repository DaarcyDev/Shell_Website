const open = document.getElementById('open');
const close = document.getElementById('close');
const container = document.querySelector('.container');
const circle = document.querySelector('.circle');
const body = document.querySelector('body');
const lu = document.querySelector('.lu');
const nav = document.querySelector('.nav');
const overlay = document.createElement('DIV');
const areaItem = document.querySelectorAll('.area-item');
const active = document.querySelector('.active');
const number = document.getElementById("number");
var counterVal = 1


function incrementClick(){
  updateDisplay(++counterVal)
  
}
function decrementClick(){
  updateDisplay(--counterVal)
}
function updateDisplay(val){
  if(val <=0){
    val=2
    counterVal = 1
  }else{
    number.innerHTML = val;
  }
  
}
let pagina=1;
const singles = document.querySelector('.content-img-discography-singles')
const album = document.querySelector('.content-img-discography-album')
const all = document.querySelector('.content-img-discography-all')
areaItem.forEach(item => {
    item.addEventListener('click',()=>{
      removeActiveClasses();
      item.classList.add('active');
      //console.log(areaItem)

      change = document.getElementsByClassName('area-item active')
      page = document.getElementById(change[0]['id'])
      //console.log(change[0]['id']);
      console.log(page['id']);
      if(page["id"] == 1){
        singles.classList.remove('show-info')
        album.classList.add('show-info')
        all.classList.add('show-info')
      }
      if(page["id"] == 2){
        album.classList.remove('show-info')
        singles.classList.add('show-info')
        all.classList.add('show-info')
      }
      if(page["id"] == 3){
        all.classList.remove('show-info')
        singles.classList.add('show-info')
        album.classList.add('show-info')
      }

    })
});
function removeActiveClasses(){
  areaItem.forEach(item =>{
    item.classList.remove('active');
  })
}

const seccionActual = document.querySelector(`#info-${pagina}`)


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
