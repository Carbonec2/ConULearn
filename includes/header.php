<!--Here is the header, before the main-->
<header>
    <?php
    if (!empty($_SESSION['user'])) {
        //echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>.';
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo"><strong>ConULearn</strong></li>
                    <li><a href="index.php?page=logout" id="logoutbutton">LOGOUT</a></li>   
                               

                    ';




        //Menu for a teacher
        //This if condition shows the good menu according to the rights of the logged user
        if ($_SESSION['Rights_id'] == 1) { //Let's say teacher == 1, student == 2
            echo '<li><a href=""><strong> ' . $_SESSION['user'] . ' (Teacher)</strong></a></li> 
                <li><a href="index.php?page=dashboard_teacher">DASHBOARD</a></li>
                <li><a href="index.php">HOME</a></li>
                ';
        } else {
            if ($_SESSION['Rights_id'] == 2) {
                //This will be the menu for a student
                echo '<li><a href=""><strong> ' . $_SESSION['user'] . ' (student)</strong></a></li>
                    <li><a href="index.php?page=dashboard_student">DASHBOARD</a></li>
                <li><a href="index.php">HOME</a></li>';
            }
        }
 

        echo '</ul>';
    } else {
        echo '<ul id="nav_bar">
                    <li id="nav_bar_logo"><strong>ConULearn</strong></li>
                    <li><a href="index.php?page=connect">SIGN IN</a></li>
                    <li><a href="index.php?page=registration">SIGN UP</a></li>
                    <li><a href="index.php">HOME</a></li>
                </ul>';
    }
    ?>

    <!--Header div-->

    <?php
    parse_str($_SERVER["QUERY_STRING"], $query_array);

    if (empty($_SESSION['user'])) {
        echo '<div id="headerdiv" class="container-fluid text-center">';
        echo '<img src="img/logo.png" alt="ConULearn" width="25%" height="25%"/></br>
        <img src="img/header.png" alt="" width="50%" height="50%"/></br></br>';
        echo '<a id="sign_in_button" href="index.php?page=connect">SIGN IN</a>';
        echo '<a id="sign_up_button" href="index.php?page=registration">SIGN UP</a>';


        echo '</div>';
    } else {
        if (empty($query_array)) {
            echo '<div id="headerdiv" class="container-fluid text-center">';
            echo '<img src="img/logo.png" alt="ConULearn" width="25%" height="25%"/></br>
        <img src="img/header.png" alt="" width="50%" height="50%"/></br></br>';
            echo '</div>';
        }
    }


    /*
      parse_str($_SERVER["QUERY_STRING"], $query_array);
      if (empty($query_array)) {
      echo '</br></br></br></br></br>';
      } else {
      if ($_GET['page'] == "registration") {
      echo '
      <h3> SIGN UP</h3>
      <span class="glyphicon glyphicon-triangle-bottom"></span>
      '
      ;
      }
      if ($_GET['page'] == "connect") {
      echo '
      <h3> SIGN IN </h3>
      <span class="glyphicon glyphicon-triangle-bottom"></span>
      '
      ;
      }
      }
     */
    ?>

</header>

