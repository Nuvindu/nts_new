<html>
<link rel="stylesheet" href="css/dropdown.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="dropdown" style="float:right;">

  <button onclick="myFunction()" class="dropbtn">Student Updates&nbsp&nbsp<i class="fa fa-caret-square-o-down"></i></button>
  <div id="myDropdown" class="dropdown-content">
    
    <a href="delete_students.php">Delete Students</a>
    <a href="modify_year.php">Modify Years</a>
    <a href="modify-year-excel.php">Modify Years - Excel</a>
  </div>
</div>
</html>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
