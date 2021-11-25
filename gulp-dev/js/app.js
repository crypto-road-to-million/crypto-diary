/* eslint-disable no-undef */
if (document.getElementById('js-modalSearchBtn') && document.getElementById('searchModal')) {

  let searchBtn = document.getElementById('js-modalSearchBtn');

  let searchModal = new bootstrap.Modal(document.getElementById('searchModal'), {
    keyboard: false
  });

  searchBtn.addEventListener('click', () => {
    searchModal.toggle();
  });
}

if (document.querySelector('.node-marquee')) {
  nodeMarquee({
    selector: '.node-marquee',
    pauseOnHover: true,
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










// eslint-disable-next-line no-unused-vars
function myFunction() {
  var copyText = document.getElementById("refCode");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("refCodeTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

// eslint-disable-next-line no-unused-vars
function outFunc() {
  var tooltip = document.getElementById("refCodeTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}