<div class="container">


    <?php if (isset($_GET['kategorie'])): ?>
        <a class="btn btn-primary mt-3 mb-3" href="adminGalerie">Zpět</a>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="obrazek" required><br>
            Popisek
            <input type="text" name="popisek"><br>
            <input type="submit" value="Přidat" name="upload" class="btn">
        </form>

        <?php foreach ($kategorie_fotky as $item): ?>
            <img src="/uploads/<?= $item["foto_nazev"] ?>" width="200" height="200" alt="s">
            <a href="/adminGalerie?kategorie=<?= $_GET['kategorie'] ?>&smazat=<?= $item['foto_id'] ?>"
               class="btn-danger">Smazat</a>
        <?php endforeach; ?>

    <?php else: ?>
        <a class="btn btn-primary mt-3 mb-3" href="administrace">Zpět</a>
        <h2>Přidat kategorii</h2>
        <form method="post" class="mt-3 mb-3">
            <div class="form-group">
                <label for="nazev">Název kategorie</label>
                <input type="text" name="nazev" id="nazev" placeholder="Název kategorie" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="kategorie_send" value="Přidat kategorii">
            </div>
        </form>

        <h2>Seznam kategorií</h2>
        <?php foreach ($kategorie_all as $item): ?>
            <h4><a href="/adminGalerie?kategorie=<?= $item['kategorie_id'] ?>"><?= $item['kategorie_jmeno'] ?></a></h4>
            <a href="/adminGalerie?&smazat_kategorii=<?= $item['kategorie_id'] ?>" class="btn btn-danger">Smazat kategorii</a>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

</div>