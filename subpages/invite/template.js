var xhttp = new XMLHttpRequest();
var id = location.search.split('id=')[1];
xhttp.open("GET", "invite/template.php?id="+id, true);
xhttp.send();
xhttp.onreadystatechange = function() {
  if (xhttp.readyState == 4) {
    var state = JSON.parse(this.responseText);
    console.log(state);
    if (state.template == 'birthday') {
      document.getElementById('birthday-temp').style.display = "inline-block";
    }
    if (state.template == 'wedding') {
      document.getElementById('subdiv').style.padding = "300px 110px";
      document.getElementById('wedding-temp').style.display = "inline-block";
      document.getElementById('wedding-temp').style.width = "800px";
    }
    if (state.font != "default"){
      document.querySelectorAll('.font').forEach(ele =>
        {
          ele.classList.add(state.font);
      });
    }
    if (state.font_color != "black"){
      document.querySelectorAll('.font').forEach(ele =>
        {
          ele.style.color = state.font_color;
      });
    }
  }
}
