<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Css/Login.css">
</head>

<body>
    <header>
        <?php include('Menu/Top Menu.php'); ?>
    </header>

    <form action="Login.php" method="post">
        <div class="pic">
            <img src="Img/recycle.jpg" alt="" width="300" height="200">
            <div class="text1">
                <a>Welkom Bij ReMas, het REcycle Management System voor het project Superior Waste van de gemeente
                    Emserveen.</a>
            </div>
        </div>
        <?php if (isset($_GET['error'])) { ?>
        <p class="error">
            <?php echo $_GET['error']; ?>
        </p>
        <?php } ?>
        <div class="log">
            <label>Gerbruikernaam</label>
            <input type="text" name="uname" placeholder="Gerbruikernaam"></br>
            <label>Wachtwoord</label>
            <input type="password" name="password" placeholder="Wachtwoord"></br>
            <button type="Submit" class="Btn">Login</button>
        </div>
    </form>
</body>

</html>