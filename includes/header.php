<!--Here is the header, before the main-->
<header>
    <p><a href="index.php">Home</a> 
        <?php
        if (!empty($_SESSION['user'])) {
            echo 'Logged in as <strong>' . $_SESSION['user'] . '</strong>. - <a href="index.php?page=logout">Logout </a>';
        } else {
            echo '<a href="index.php?page=connect">Connection</a>';
            echo ' <a href="index.php?page=registration">Sign up</a>';
        }
        ?>
		<!--Image of the header-->
		<img src="img/header.png" alt="" width="100%" height="100%">
		
		
		
    </p>
    <br/>
</header>