

        <!-- Material form subscription -->
        <form action="<?=HOST;?>register" method="post">
            <p class="h4 text-center mb-4">Inscription</p>

            <!-- Material input text -->
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" name="pseudo" id="materialFormSubscriptionNameEx"  placeholder="Votre pseudo" class="form-control">
                <label for="materialFormSubscriptionNameEx" </label>
            </div>

            <!-- Material input email -->
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" name="email" id="materialFormSubscriptionEmailEx" placeholder="Votre Email" class="form-control">
                <label for="materialFormSubscriptionEmailEx" </label>
            </div>

            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" name="email2" id="materialFormSubscriptionEmailEx" placeholder="Confirmez votre Email" class="form-control">
                <label for="materialFormSubscriptionEmailEx" </label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="pass" id="materialFormCardPasswordEx" placeholder="Votre Mot de Passe" class="form-control">
                <label for="materialFormSubscriptionEmailEx" </label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="pass2" id="materialFormCardPasswordEx" placeholder="confirmez votre Mot de Passe" class="form-control">
                <label for="materialFormSubscriptionEmailEx" </label>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-default waves-effect waves-light" type="submit" name="envoyer">S'inscrire</button>
            </div>
        </form>
        <!-- Material form subscription -->
<!-- Card -->


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
