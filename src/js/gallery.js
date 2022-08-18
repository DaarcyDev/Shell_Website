function createGallery(){
    const gallery = document.querySelector('.img-concha');
    for(let i = 1; i <=2; i++ ){
      const image = document.createElement('picture');
      image.innerHTML = `<img class="img-concha" src="build/img/concha/Press-photo-${i}-comp.webp" />`;
      gallery.appendChild(image);
    }
  }
createGallery();