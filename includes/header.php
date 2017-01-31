<!--Here is the header, before the main-->
<header>
        <?php
		
        if (!empty($_SESSION['user'])) {
            echo 'Logged in as ' . $_SESSION['user'] . ' ';
        } else {
            echo '
					<ul id="nav_bar">
					<li id="nav_bar_logo"><strong>ConULearn</strong></li>
					<li><a href="index.php?page=connect">SIGN IN</a></li>
					<li><a href="index.php?page=registration">SIGN UP</a></li>
					<li><a href="index.php">HOME</a></li>
					</ul>
				';
        }
        ?>
		<!--Image of the header-->
		<div id="headerdiv" class="container-fluid text-center">
			<img src="img/logo.png" alt="ConULearn" width="30%" height="30%"/></br>
			<img src="img/header.png" alt="" width="60%" height="60%"/>
			
			<a id="sign_in_button" href="index.php?page=connect">SIGN IN</a>
			<a id="sign_up_button" href="index.php?page=registration">SIGN UP</a>
			<?php 
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
