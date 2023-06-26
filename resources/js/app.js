import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('burger');
    burger.addEventListener('click', () => {
      const menu = document.getElementById('menu');
      menu.classList.toggle('menu__list--active');
    })
  })
  
  const swiper = new Swiper('.swiper', {
    loop: true,
    speed: 2000,
  
    pagination: {
      el: '.swiper-pagination',
    },
  
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });