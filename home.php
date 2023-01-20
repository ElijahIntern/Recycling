
    <?php
include 'header.php';
include 'Menu/leftMenu.php';
    ?>
    <h1>hallo,
        <?php echo $_SESSION['user_name']; ?>
    </h1>
    <a href="loguit.php">logout</a>
</body>

</html>
<?php
} else {
    header("location: index3.php");
    exit();
}
    ?>