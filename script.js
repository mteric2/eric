document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".background-carousel img");
    let index = 0;
    const transitionTime = 1000; // 1 segundo (debe coincidir con el tiempo de transición en CSS)
  
    function changeImage() {
      const currentImage = images[index];
      // Calcula el índice de la siguiente imagen
      index = (index + 1) % images.length;
      const nextImage = images[index];
  
      // Añade la clase 'active' a la siguiente imagen
      nextImage.classList.add("active");
  
      // Después del tiempo de transición, quita 'active' de la imagen anterior
      setTimeout(() => {
        currentImage.classList.remove("active");
      }, transitionTime);
    }
  
    // Cambia de imagen cada 4 segundos
    setInterval(changeImage, 4000);
  });
  