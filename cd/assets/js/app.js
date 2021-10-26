// eslint-disable-next-line no-undef
let searchBtn = document.getElementById('js-modalSearchBtn');

// eslint-disable-next-line no-undef
let searchModal = new bootstrap.Modal(document.getElementById('searchModal'), {
  keyboard: false
});

searchBtn.addEventListener('click', () => { searchModal.toggle(); });

// eslint-disable-next-line no-undef
nodeMarquee({
  selector: '.node-marquee'
});