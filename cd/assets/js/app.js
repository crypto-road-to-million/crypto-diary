/* eslint-disable no-undef */
if (document.getElementById('js-modalSearchBtn') && document.getElementById('searchModal')) {
  
  let searchBtn = document.getElementById('js-modalSearchBtn');
  
  let searchModal = new bootstrap.Modal(document.getElementById('searchModal'), {
    keyboard: false
  });
  
  searchBtn.addEventListener('click', () => { searchModal.toggle(); });
}

if (document.querySelector('.node-marquee')) {
  nodeMarquee({
    selector: '.node-marquee'
  });
}

var docWidth = document.documentElement.offsetWidth;
[].forEach.call(
  document.querySelectorAll('*'),
  function (el) {
    if (el.offsetWidth > docWidth) {
      console.log(el);
    }
  }
);