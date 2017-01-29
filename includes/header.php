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
		<div class="img_holder">
			<img src="img/header.png" alt="" width="100%" height="100%"/>
			<a id="sign_in_button" href="index.php?page=connect">SIGN IN</a>
			<a id="sign_up_button" href="index.php?page=registration">SIGN UP</a>
		</div>
</header>