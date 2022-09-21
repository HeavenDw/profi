var lazyLoadInstance = new LazyLoad({});

new Swiper('.swiper-container', {
    slidesPerView: 1,
    pagination: {
        el: '.about__pagination',
        clickable: true,
    },
});

var inputPhone = document.querySelector('.phone-mask');


var mask = new IMask(inputPhone, {
mask: '+7 (000) 000-00-00',
lazy: true,
placeholderChar: '_'  
});

inputPhone.addEventListener('focus', function() {
    mask.updateOptions({ lazy: false });
}, true);

inputPhone.addEventListener('blue', function() {
    mask.updateOptions({ lazy: true });
}, true);