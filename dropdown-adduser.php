<html>
<link rel="stylesheet" href="css/dropdown-adduser.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="dropdown2" style="float:right;">

  <button onclick="myFunction2()" class="dropbtn2">Add Users&nbsp&nbsp<i class="fa fa-caret-square-o-down"></i></button>
  <div id="myDropdown2" class="dropdown-content2">
    <a href="add_users_excel-mvc.php">Excel</a>
    <a href="add-user-responsive.php">Form</a>
    
  </div>
</div>
</html>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show2");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn2')) {
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show2')) {
        openDropdown.classList.remove('show2');
      }
    }
  }
}
</script>
