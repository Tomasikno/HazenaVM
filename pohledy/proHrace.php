<div class="container mt-5 mb-5">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                        Odkazy svazu
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">

                    <p><a href="http://www.svaz.chf.cz/documents/rozpis%C4%8Dp_17-18_web.pdf">Český pohár
                            2017-2018</a>
                    </p>
                    <p><a href="http://www.svaz.chf.cz/download.aspx?catid=1677">Soutěžní rozpis ČSH 2017-2018</a>
                    </p>
                    <p><a href="http://www.svaz.chf.cz/content.aspx?catid=392">Rozhodčí</a></p>
                    <p><a href="http://vksh.chf.cz/download.aspx?catid=1693">KSH Vysočina</a></p>
                    <p><a href="http://jmksh.chf.cz/download.aspx?catid=1684">Jihomoravská liga mužů</a></p>
                    <p><a href="http://www.svaz.chf.cz/content.aspx?catid=83">Kontakty ČSH Praha</a></p>
                    <p>
                        <a href="http://www.svaz.chf.cz/user_files//chalupa/0_sout%C4%9B%C5%BEn%C3%AD%20%C5%99%C3%A1d%20h%C3%A1zen%C3%A9%202015.pdf">Soutěžní
                            plán 1.červenec 2018</a>
                    </p>


                    <p>
                        <a href="http://www.svaz.chf.cz/user_files//chalupa/0_disciplin%C3%A1rn%C3%AD%20%C5%99%C3%A1d%202015.pdf">Disciplinární
                            řád 1.července 2015</a></p>
                    <p><a href="http://www.svaz.chf.cz/documents/zdravotn%C3%ADprohl%C3%ADdky2014.pdf">Zdravotní
                            prohlídky</a></p>
                    <p><a href="http://www.hazenavm.estranky.cz/file/506/prestupni-rad-navrh-2014.pdf">Přestupní
                            řád</a>
                    </p>
                    <p>
                        <a href="http://www.svaz.chf.cz/user_files//0_ekonom%20sm%C4%9Brnice_srpen%202016%20(2)%20(1).pdf">Ekonomická
                            směrnice</a></p>
                    <p><a href="http://www.svaz.chf.cz/content.aspx?contentid=1265&scat=352">Výběrový kemp pro dívky
                            1994-1998</a></p>
                    <p><a href="http://www.svaz.chf.cz/content.aspx?contentid=14934">Tréninkové jednotky - videa
                            SCM</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container mt-5 mb-5">
    <?php foreach ($clanky as $clanek): ?>

        <div class="media">
            <div class="media-body">
                <h5 class="mt-0"><a href="proHrace/<?= $clanek['url'] ?>"><?= $clanek['titulek'] ?></a></h5>
                <?= $clanek['popisek'] ?>
                <div class="line"></div>
            </div>
        </div>
    <?php endforeach ?>

</div>


