
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
    <!-- Card -->
    <div class="card testimonial-card">

        <?php if(isset($profil)) : ?>
        <!-- Background color -->
        <div class="card-up aqua-gradient">
        </div>

        <!-- Avatar -->
        <div class="avatar mx-auto white"><img src="<?=ASSETS;?>images/profil.png" class="rounded-circle">
        </div>

        <div class="card-body">
            <!-- Name -->
            <h4 class="card-title"> <?=$profil->getPseudo()?></h4>
            <hr>
            <!-- Quotation -->
            <p><i class="fa fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, adipisci</p>
        </div>
        <?php endif;?>
    </div>
    <!-- Card -->


