<div class="container mt-3 ">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12">
            <h1>Kontaktní formulář</h1>
            <p>Kontaktujte nás odesláním formuláře níže.</p>
            <hr>
            <form method="post" id="form-email">
                <div class="form-group">
                    <label for="email">Vaše emailová adresa</label>
                    <input type="email" name="email" id="email" class="form-control" required
                           value="<?php if (isset($_POST['email'])) echo(htmlspecialchars($_POST['email'])); ?>"/>
                </div>
                <div class="form-group">
                    <label for="rok"> Antispam - zadejte aktuální rok </label>
                    <input type="text" name="rok" id="rok" class="form-control" required/>
                </div>
                <div class="form-group">
                <textarea
                        name="zprava" rows="10"
                        class="form-control"><?php if (isset($_POST['zprava'])) echo(htmlspecialchars($_POST['zprava'])); ?></textarea><br/>
                    <input type="submit" value="Odeslat" class="btn btn-outline-danger"/>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid m-0 p-0">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d546.2907829896982!2d16.004534712154477!3d49.35950049607644!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDnCsDIxJzM0LjUiTiAxNsKwMDAnMTcuMCJF!5e0!3m2!1scs!2scz!4v1521571222229"
            width=100% height="300" frameborder="0" style="border:0" allowfullscreen class="mb-0 mt-3"></iframe>
</div>
