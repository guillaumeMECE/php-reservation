<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow ">
  <a class="navbar-brand" href="#">Reservation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <script type="text/javascript">
  function change_focus2(focusId) {
     //alert("work");
     var element = document.getElementById("nav0");
     element.classList.remove("active");
      element = document.getElementById("nav1");
     element.classList.add("active");

 /* switch (focusId) {
     case 0:
     element = document.getElementById("nav0");
     element.classList.add("active");
     var element = document.getElementById("nav1");
     element.classList.remove("active");
     element = document.getElementById("nav2");
     element.classList.remove("active");
        break;
     case 1:
     element = document.getElementById("nav0");
     element.classList.remove("active");
     var element = document.getElementById("nav1");
     element.classList.add("active");
     element = document.getElementById("nav2");
     element.classList.remove("active");
        break;
     case 2:
     element = document.getElementById("nav0");
     element.classList.remove("active");
     var element = document.getElementById("nav1");
     element.classList.remove("active");
     element = document.getElementById("nav2");
     element.classList.add("active");
        break;
     default:
     element = document.getElementById("nav0");
     element.classList.add("active");
  }*/
  }
  </script>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ">
      <a id="nav0" class="nav-item nav-link"  href="/php-reservation4/index.php">Home <!--span class="sr-only">(current)</span--></a>
      <a id="nav1" class="nav-item nav-link" href="/php-reservation4/views/reserve.php">Reserve a desk</a>
      <a id="nav2" class="nav-item nav-link"  href="/php-reservation4/views/settings.php">Settings</a>
    </div>
  </div>
</nav>
