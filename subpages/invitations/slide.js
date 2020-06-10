document.querySelectorAll('.content').forEach(ele => {
  ele.addEventListener('click', function(){
    ele.lastElementChild.classList.toggle('hide');
  });
});
