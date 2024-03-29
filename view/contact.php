<?php
if (isset($_SESSION['alertes']['submit_success']) && !empty($_SESSION['alertes']['submit_success']))
{
    ?>
    <div class="alert alert-success" role="alert">
        <p style="color:green;"><?= $_SESSION['alertes']['submit_success'] ?></p></div>
    <?php
    $_SESSION['alertes'] = [];
}
elseif (isset($_SESSION['alertes']['submit_error']) && !empty($_SESSION['alertes']['submit_error']))
{
    ?>
    <div class="alert alert-danger" role="alert">
        <p style="color:darkred;"><?= $_SESSION['alertes']['submit_error'] ?></p></div>
    <?php
    $_SESSION['alertes'] = [];
}
?>
<!-- Material form contact -->
<form action="<?=HOST;?>contact" method="post">
    <p class="h4 text-center mb-4" style="font-family: fontastique !important;">Contactez-Moi</p>

    <!-- Material input text -->
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" style="font-family: fontastique !important;">
        <label for="pseudo"</label>
    </div>

    <!-- Material input email -->
    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="email" name="email" id="email" class="form-control" placeholder="Adresse Electronique" style="font-family: fontastique !important;">
        <label for="Email"</label>
    </div>

    <!-- Material input subject -->
    <div class="md-form">
        <i class="fa fa-tag prefix grey-text"></i>
        <input type="text" name="title" id="title" class="form-control" placeholder="Objet du Message" style="font-family: fontastique !important;">
        <label for="title"</label>
    </div>

    <!-- Material textarea message -->
    <div class="md-form">
        <i class="fas fa-pen-nib prefix grey-text"></i>
        <textarea type="text" name="message" id="message" class="form-control md-textarea" rows="3" placeholder="Message" style="font-family: fontastique !important;"></textarea>
        <label for="message"</label>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-default" type="submit">Envoyer</button>
    </div>
</form>

<!-- Material form contact -->
