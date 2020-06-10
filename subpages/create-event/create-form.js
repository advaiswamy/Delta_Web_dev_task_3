document.getElementById("evt_type").addEventListener("click", function() {
  let element = document.querySelectorAll(".pvt");
  element.forEach(ele => {
    if (ele.classList.contains("hide") && document.getElementById("evt_type").value == "private") {
      ele.classList.remove('hide')
    } else {
      ele.classList.add('hide');
    }
  });
});

document.getElementById("template").addEventListener("click", function() {
  if (document.getElementById("template").value == "birthday") {
    document.getElementById("template-div").classList.add('birthday');
  } else {
    document.getElementById("template-div").classList.remove('birthday');
  }
});

document.getElementById('font-color').addEventListener("keydown", function(event) {
  setTimeout(function() {

    let str = document.getElementById('font-color').value;
    let element = document.querySelectorAll(".inv");
    var s = new Option().style;
    s.color = str;
    if(str != "")
      var test1 = s.color == str.toLowerCase();
    else
      var test1 = false;
    var test2 = /^#[0-9A-F]{6}$/i.test(str);
    if (test1 == true || test2 == true) {
      // console.log(str);
      element.forEach(ele => {
        ele.style.color = str;
      });
      document.getElementById("colors").value = str;
      console.log(document.getElementById("colors").value);
    }
    else{
      element.forEach(ele => {
        ele.style.color = "black";
      });
      document.getElementById("colors").value = 'black';
    }

  }, 10);

});

document.getElementById('font').addEventListener("click", function() {
  let element = document.querySelectorAll(".inv");
  if (document.getElementById('font').value != 'default') {
    element.forEach(ele => {
      ele.classList.add('fonts');
    });
  } else {
    element.forEach(ele => {
      ele.classList.remove('fonts');
    });
  }
})
