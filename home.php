<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/boven.css">
    <link rel="stylesheet" href="css/left.css">
</head>

<body>
    <nav class="navbar" style="background-color: rgb(103, 191, 14)">
        <div class="container-fluid">
            <form class="d-flex">
                <h3>ReMaS Superior Waste Recycling<h3>
            </form>
            <?php
            session_start();
            if (isset($_SESSION["username"])) {
                echo '<h3>ingelogd als - ' . $_SESSION["username"] . '</h3>';
            } else {
                header("location:login.php");
            }
            ?>
        </div>
    </nav>
    <div class="nav2">
        <input type="checkbox" id="menu" />
        <img src="../img/recycle.jpg" width="300" height="200">
        <div class="multi-level">
            <div class="item">
                <input type="checkbox" id="A" />
                <label for="A">Inname</label>
            </div>
            <div class="item">
                <input type="checkbox" id="a">
                <label for="A">Verwerking</label>
            </div>
            <div class="item">
                <input type="checkbox" id="C" />
                <label for="C">Rapportage</label>

                <ul>
                    <li><a href="#">Inname</a></li>
                    <li><a href="#">Werkoorraad</a></li>
                </ul>
            </div>
            <div class="item">
                <input type="checkbox" id="B" />
                <label for="B">Onderhoud</label>
                <ul>
                    <li>
                        <div class="sub-item">
                            <input type="checkbox" id="B-A" />
                            <label for="B-A">Mederwerker</label>

                            <ul>
                                <li><a href="#">Gerbruikers</a></li>
                                <li><a href="#">Rollen</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">Apparaten</a></li>
                    <li><a href="#">Onderdelen</a></li>
                    <li><a href="#">Innames</a></li>
                    <li><a href="#">Uitgiftes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <p>
        <a href="logout.php" class="">
            <button class="button button1">logout</button>
        </a>
    </p>
</body>

</html>