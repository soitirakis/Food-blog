<?php
//session_start();
?>
<header class="navbar navbar-static-top navbar-inverse">
    <nav class="navbar navbar-inverse navbar-expand-lg fixed-top" aria-expanded="false">
      <ul class="nav navbar-nav col-sm-12">
          <li class="nav-item col-sm-4 text-center">
            <a class="nav-link" onclick="w3_open()">&#9776;</a>
          </li>
          <li class="nav-item col-sm-4 text-center">
            <a class="nav-link disabled" href="#">My Food</a>
          </li>
          <li class="nav-item col-sm-4 text-center">
            <a class="nav-link disabled" href="#">Mail</a>
          </li>
        </ul>

        <ul class="nav navbar-nav sidenav" id="mySidebar">
          <li class="nav-item">
            <a class="nav-link" onclick="w3_close()" href="javascript:void(0)">Close Menu</a>
          </li>
          <?php
          if(isset($_SESSION["logat"])){
           echo
            "<li class='nav-item'>
              <a class='nav-link' onclick='w3_close()' href='index.php#food'>Food</a>
            </li>";
            echo "<li class='nav-item'>
              <a class='nav-link' onclick='w3_close()' href='index.php#about-me'>About</a>
            </li>";
            echo "<li class='nav-item'>
                  <a class='nav-link' onclick='w3_close()' href='login.php'>Logged, Admin</a>
                </li>";
            echo "<li class='nav-item'>
                  <a class='nav-link' onclick='w3_close()' href='logout.php'>Logout</a>
                </li>";

          }else{
            echo
              "<li class='nav-item'>
                <a class='nav-link' onclick='w3_close()' href='#food'>Food</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' onclick='w3_close()' href='#about-me'>About</a>
              </li>";
          }
      ?>
        </ul>
      </nav>
  </header>
