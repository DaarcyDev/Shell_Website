function createGallery() {
  const gallery = document.querySelector('.content-img-concha');
  for (let i = 1; i <= 2; i++) {
    const image = document.createElement('picture');
    image.innerHTML = `
    <ul class="lineas_cont">
    <span class="linea"></span>
    <span class="linea"></span>
    <span class="linea"></span>
    <span class="linea"></span>
    <img class="img-concha" src="build/img/concha/Press-photo-${i}-comp.webp" />
    `;
    image.onclick = function(){
      showImage(i);
    }
    gallery.appendChild(image);

  }
}
function showImage(id){
  const image = document.createElement('picture');
    image.innerHTML = `
    <img class="img-concha" src="build/img/concha/Press-photo-${id}-comp.webp" />
    `;
    //crea el overlay con imagen
    const overlay = document.createElement('div')
    overlay.appendChild(image);
    overlay.classList.add('overlay2');
    overlay.onclick=function(){
      body.classList.remove('fixed-body')
      overlay.remove()
    }
    //añadirlo al html
    const body = document.querySelector('body')
    body.appendChild(overlay);
    body.classList.add('fixed-body')
    
    //añadir boton para cerrar
    const close = document.createElement('P')
    close.textContent = 'X'
    close.classList.add('button_top');
    close.onclick=function(){
      body.classList.remove('fixed-body')
      overlay.remove()
    }
    overlay.appendChild(close)
}
createGallery();
