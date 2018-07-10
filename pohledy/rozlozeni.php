<!DOCTYPE html>
<html lang="cs-cz">
<meta>
<base href="/localhost"/>
<meta charset="UTF-8"/>
<title>Házená Velké Meziříčí</title>
<meta name="description" content="<?= $popisek ?>"/>
<meta name="keywords" content="<?= $klicova_slova ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#B71C1C">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
      integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
        integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
        crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/bootstrap/css/style.css">

</head>

<body>


<header>
    <nav class="navbar navbar-expand-md navbar-dark stroke"
         style="background-color: #b71c1c;">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbar10">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar10">
                <ul class="navbar-nav nav-fill w-100 align-items-center">
                    <li class="nav-item">
                        <a href="uvod" class="navbar-brand">
                            <img src="/img/home-button.png" width="30" height="30" alt="Home">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="galerie">Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prohrace">Pro hráče</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php foreach ($zpravy as $zprava) : ?>
    <div class="alert alert-primary" role="alert"><?= $zprava ?></div>
<?php endforeach ?>

<div class="content">
    <?php $this->kontroler->vypisPohled(); ?>
</div>


<footer>
    <div class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5>Házená Velké Meziříčí</h5>
                </div>
                <div class="col-md-6">
                    <h5>Užitečné odkazy</h5>
                    <ul>
                        <li><a href="administrace">Administrace</a></li>
                        <li><a href="#"></a>Link2</li>
                        <li><a href="#"></a>Link3</li>
                        <li><a href="#"></a>Link4</li>
                    </ul>
                </div>
            </div>
        </div>

        <div>
            <div class="footer-copyright">
                <div class="container">
                    © 2018 Copyright: Tomáš Pažourek
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<script src="/bootstrap/js/myJs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
</body>
</html>