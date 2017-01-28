<!--Here is the header, before the main-->
<header>
    <p><a href="index.php">Home</a> 
        <?php
        if (!empty($_SESSION['user'])) {
            echo 'Logged in as ' . $_SESSION['user'] . ' ';
        } else {
            echo '<a href="index.php?page=connect">Connection</a>';
        }
        ?>
		<!--Image of the header-->
		<img src="img/header.png" alt="" width="100%" height="100%">
		
		
		
    </p>
    <br/>
</header>