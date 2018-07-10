<div class="container mb-5 mt-5 text-center">
    <p>Vítejte v administraci, jste přihlášen jako <?= $jmeno ?>.</p>
    <?php if (!$admin): ?>
        <p>Nemáte dostatečná administrátorská oprávnění pro editaci a odstranění článků</p>
    <?php endif ?>
    <div class="card text-center mb-3">
        <div class="card-header">
            <h2> Úvod</h2>
        </div>

        <ul class="list-group">
            <li class="list-group-item"><h3><a href="editor">Přidat článek</a></h3></li>
            <li class="list-group-item"><h3><a href="clanek">Seznam článků</a></h3></li>
        </ul>
    </div>

    <div class="card text-center mb-3">
        <div class="card-header">
            <h2> Pro hráče</h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><h3><a href="editorHraci">Přidat článek pro hráče</a></h3></li>
            <li class="list-group-item"><h3><a href="clankyHraci">Seznam článků</a></h3></li>
        </ul>
    </div>

    <div class="card text-center mb-3">
        <div class="card-header">
            <h2> Galerie</h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><h3><a href="adminGalerie">Přidat do galerie</a></h3></li>
        </ul>
    </div>
    <a href="administrace/odhlasit" class="btn btn-lg btn-danger">Odhlásit</a>

</div>