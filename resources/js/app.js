import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('burger');
    burger.addEventListener('click', () => {
      const menu = document.getElementById('menu');
      menu.classList.toggle('menu__list--active');
    })
})

new Swiper('.swiper', {
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

setTimeout(function(){
    document.querySelector('.session-error').classList.add("visible-error");
}, 5000);
