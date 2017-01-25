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
    </p>
    <br/>
</header>