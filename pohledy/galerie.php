<div class="container">
    <?php if (isset($_GET['kategorie'])): ?>
        <a href="/galerie" class=" btn btn-outline-danger mt-2 mb-2">Galerie</a><br>

        <?php foreach ($kategorie_fotky as $item): ?>
            <div class="card" style="width: 18rem">
                <img src="/uploads/<?= $item["foto_nazev"] ?>" alt="nahled" class="card-img-top">
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="row mt-5 justify-content-center">
            <h1>Galerie</h1>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($kategorie_all as $item): ?>
                <a href="/galerie?kategorie=<?= $item['kategorie_id'] ?>">
                    <div class="card m-2 align-items-center" style="width: 15rem">
                        <img src="/img/logo-cervene.png" alt="cardtop" class="card-img-top">
                        <div class="card-body">
                            <a href="/galerie?kategorie=<?= $item['kategorie_id'] ?>">
                                <h5><?= $item['kategorie_jmeno'] ?></h5>
                            </a>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>