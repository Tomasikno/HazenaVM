<div class="container mt-3 mb-3">
    <a class="btn btn-primary" href="administrace">Zpět</a>
    <h1>Seznam článků pro hráče</h1>
    <?php foreach ($clanky as $clanek): ?>
        <h2><a href="clanek/<?= $clanek['url'] ?> "> <?= $clanek['titulek'] ?></a></h2>
        <div class="container">
            <div class="row"><strong> Popisek článku: &nbsp </strong><?= $clanek['popisek'] ?></div>
        </div>
        <?php if ($admin) : ?>
            <br>
            <a class="btn btn-primary m-1" href=" editorHraci/<?= $clanek['url'] ?>">Editovat</a>
            <a class="btn btn-danger" href="proHrace/<?= $clanek['url'] ?>/odstranit">Odstranit</a>
        <?php endif ?>
        <hr>
    <?php endforeach ?>

</div>