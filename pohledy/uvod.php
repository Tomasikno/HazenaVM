<section class="bgimage">
    <div class="container-fluid fixer">
        <div class="row">
            <div class="bgText">
                <div class="media">
                    <div class="media-body">
                        <h1 class="display-3"><a><?= $prvniClanek['titulek'] ?></a></h1>
                        <p><?= $prvniClanek['popisek'] ?></p>
                        <a href="clanek/<?= $prvniClanek['url'] ?> " class="btn btn-outline-danger">Číst dále</a>
                    </div>
                </div>
            </div>
            <div class="bgButton">
                <section id="section02" class="demo sectionUvod">
                    <a class="downChevron" href="#section03"><span></span></a>
                </section>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="container articles">
        <div class="col-xs-12 col-12 justify-content-center p-5" style="display: flex">
            <h1 class="display-2" id="section03">Házená Velké Meziříčí</h1>
        </div>

        <?php foreach ($clanky as $clanek): ?>
            <div class="col-12">
                <hr>
                <div class="col-xs-12 ">
                    <h1><a href="clanek/<?= $clanek['url'] ?>"><?= $clanek['titulek'] ?></a></h1>
                </div>
                <div class="col-xs-12">
                    <p>
                        <small><?= $clanek['time_stamp'] ?></small>
                    </p>
                </div>
                <div class="col-xs-12">
                    <p><?= $clanek['popisek'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<div class="row justify-content-center">

    <ul class="pagination">
        <?php if ($predchoziStranka <= 1 && $nasledujiciStranka != 3): ?>
    <li class="page-item disabled">
    <?php else: ?>
        <li class="page-item">
            <?php endif; ?>
            <a href="uvod?page=<?= $predchoziStranka ?>" class="page-link">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <?php for ($page = 1; $page <= $pocetStranek; $page++): ?>
            <?php if ($page == $stranka): ?>
                <li class="page-item active"><a href="uvod?page=<?= $page ?>" id="page"
                                                class="page-link"><?= $page ?></a></li>
            <?php else: ?>
                <li class="page-item"><a href="uvod?page=<?= $page ?>" id="page" class="page-link"><?= $page ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pocetStranek <= $nasledujiciStranka && $predchoziStranka != $pocetStranek - 2): ?>
        <li class="page-item disabled">
            <?php else: ?>
        <li class="page-item">
            <?php endif; ?>

            <a href="uvod?page=<?= $nasledujiciStranka ?>" class="page-link">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>

</div>
<div class="container-fluid">
    <div class="row">
        <div id="carouselSlides" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="http://via.placeholder.com/350x150" alt="asd">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="asd">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="asd">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="asd">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="asd">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="img-background-history">
    <div class="container img-text-history">
        <div class="row mt-5 mb-3">
            <div class="col-xl-12 col-md-12 col-sm-12 align-items-center">
                <h1> Historie klubu </h1>
                <p>
                    Roku 1921 byla v tehdejším SK Velké Meziříčí založena házená žen a v roce 1931 i házená mužů.
                    Hrálo
                    se v
                    prostorách městského tržiště(nyní hřiště fotbalistů). Ženy dosahovaly předních příček v
                    soutěžích
                    západomoravské župy a moravské ligy. Muži hráli I. A třídu. V roce 1945 přešla ligová
                    házená(opět
                    ženy)
                    na
                    nově vybudovaného hřiště s pískovým povrchem do Rudolfova parku. V té době již oddíl nese název
                    Sokol
                    Velkém
                    Meziříčí. V roce 1964 je oddíl přejmenován z TJ Spartak na TJ Motorpal Velké Meziříčí a všechna
                    družstva
                    přešla z české házené na házenou o 7 hráčích(mezinárodní házená). V roce 1990 se házená opět
                    "stěhuje"
                    tentokrát do Sportovního areálu "Za Světlou", kde jsou vybudována dvě asfaltová hřiště. Na jedno
                    z
                    nich je
                    v
                    roce 1993 položen nisaplastový povrch. V listopadu 1995 je započato s výstavbou sportovní haly a
                    budováním
                    nových šaten. Tato stavba je na podzim roku 1996 dokončena. První rok je v hale nisaplastový
                    povrch
                    a na
                    podzim roku 1997 je do haly položen nový litý povrch AH Alsagym.
                </p>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid"></div>
<div style="height: 200px; text-align: center">
    <p>Sponzori</p>y
</div>
<section class="img-background">
    <div class="container img-text">
        <div class="row mt-5 mb-3">
            <div class="col-xl-12 col-md-12 col-sm-12 align-items-center">
                <h1> Součastnost klubu </h1>
                <p>
                    Házená ve Velkém Meziříčí patří dlouhodobě k nejúspěšnějším sportům. Děje se tak především díky
                    poctivé
                    práci ve všech mládežnických kategoriích. Žákovská družstva hrají dlouhodobě oblastní soutěže a
                    zúčastňují
                    se turnajů. Kádry družstev mužů a žen tak mohou být složené výhradně z vlastních odchovanců,
                    čímž se
                    nemůže
                    pochlubit žádný jiný vrcholový sport ve městě. Všichni hráči a činovníci(bývalí odchovanci)
                    pracují
                    pro
                    klub bez nároků na honorář. Házenkářský klub hraje při TJ Sokol Velké Meziříčí.

                    Všechny domácí utkání se hrají v hale "Za Světlou", kde má klub své zázemí včetně posilovny.
                </p>
            </div>
        </div>
    </div>

</section>



