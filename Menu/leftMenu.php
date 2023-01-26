<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Left menu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/top.css">
</head>

<body>
    <div class="nav">
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
</body>

</html>