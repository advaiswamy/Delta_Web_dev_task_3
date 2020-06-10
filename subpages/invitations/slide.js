document.querySelectorAll('.main-div').forEach(ele => {
  ele.firstElementChild.addEventListener('click', function(){
    ele.lastElementChild.classList.toggle('hide');
  });
});
