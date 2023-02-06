function myFunction() {
    document.getElementById("myDropdown").classList.toggle("combo-show");
  }
  
  
  window.onclick = function(event) {
    if (!event.target.matches('.combobtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('combo-show')) {
          openDropdown.classList.remove('combo-show');
        }
      }
    }
  }