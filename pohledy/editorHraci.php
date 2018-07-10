<div class="container mt-3 mb-3">
    <a href="administrace" class="btn btn-primary">Zpět</a>
    <div class="row justify-content-center align-content-center">
        <h1>Editor "pro hráče"</h1>
    </div>
    <div class="row justify-content-center align-content-center">


        <form method="post">
            <input type="hidden" name="clanky_id" value="<?= $clanek['clanky_id'] ?>"/>

            <div class="formg-group">
                <label for="titulek"></label> Titulek
                <input type="text" class="form-control" name="titulek" id="titulek"
                       value="<?= $clanek['titulek'] ?>"/>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" name="url" id="url" class="form-control" value="<?= $clanek['url'] ?>"/>
                <small id="urlHelp" class="form-text text-muted">Adresa článku</small>
            </div>
            <div class="form-group">
                <label for="popisek">Popisek</label>
                <input type="text" name="popisek" id="popisek" class="form-control" value="<?= $clanek['popisek'] ?>"/>
            </div>
            <textarea name="obsah"><?= $clanek['obsah'] ?></textarea>

            <button type="submit" class="btn btn-primary mt-2">Odeslat článek</button>
        </form>

        <script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea[name=obsah]",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                entities: "160,nbsp",
                entity_encoding: "named",
                entity_encoding: "raw",
                language_url: "/bootstrap/js/langs/cs.js",
                height: 300
            });
        </script>
    </div>
</div>