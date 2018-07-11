<?php
if (isset($_SESSION['alertes']['submit_success']) && !empty($_SESSION['alertes']['submit_success']))
{
    ?>
    <p style="color:green;"><?= $_SESSION['alertes']['submit_success'] ?></p>
    <?php
    $_SESSION['alertes'] = [];
}
elseif (isset($_SESSION['alertes']['submit_error']) && !empty($_SESSION['alertes']['submit_error']))
{
    ?>
    <p style="color:darkred;"><?= $_SESSION['alertes']['submit_error'] ?></p>
    <?php
    $_SESSION['alertes'] = [];
}
?>
<!-- Material form login -->
<div class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form action="" method="post">
                    <p class="h4 text-center mb-4">Connexion</p>
                    <!-- Material input email -->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="email" id="materialFormLoginEmailEx" class="form-control" placeholder="Votre pseudo">
                            <label for="materialFormSubscriptionNameEx"</label>
                        </div>
                    <!-- Material input password -->
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="materialFormLoginPasswordEx" class="form-control" placeholder="Votre Mot de Passe">
                            <label for="materialFormLoginPasswordEx"</label>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-default waves-effect waves-light">Se connecter</button>                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Material form login -->

