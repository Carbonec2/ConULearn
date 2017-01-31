<!--Here is the header, before the main-->
<header>
    <?php
    if (!empty($_SESSION['user'])) {
        echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>.';
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
		<div id="headerdiv" class="container-fluid text-center">
			<img src="img/logo.png" alt="ConULearn" width="25%" height="25%"/></br>
			<img src="img/header.png" alt="" width="50%" height="50%"/>
			
			
			
			<?php 
                        if (empty($_SESSION['user'])) {
                            echo '<a id="sign_in_button" href="index.php?page=connect">SIGN IN</a>';
                            echo '<a id="sign_up_button" href="index.php?page=registration">SIGN UP</a>';
                        }else{
                            echo '<a id="logout_button" href="index.php?page=logout">LOGOUT</a>';
                        }
			parse_str($_SERVER["QUERY_STRING"],$query_array);
			if(empty($query_array)){
			echo '</br></br></br></br></br>';
			}else {if($_GET['page']=="registration"){
			echo '
				<h3> SIGN UP</h3>
				<span class="glyphicon glyphicon-triangle-bottom"></span>
				'
				;
			}
			if($_GET['page']=="connect"){
			echo '
				<h3> SIGN IN </h3>
				<span class="glyphicon glyphicon-triangle-bottom"></span>
				'
				;
			}
			}
			?>
		</div>
</header>

