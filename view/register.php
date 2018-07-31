
        <!-- Card -->
        <div class="card">

            <!-- Card body -->
            <div class="card-body">

                <!-- Material form register -->
                <form action="<?=HOST;?>register" method="post">
                    <p class="h4 text-center py-4">Inscription</p>

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="materialFormCardNameEx" class="form-control"  placeholder="Votre pseudo" value="<?php if(isset($_POST['pseudo'])) echo htmlspecialchars(trim($_POST['pseudo']));?>">
                        <label for="materialFormCardNameEx" class="font-weight-light"></label>
                    </div>

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" id="materialFormCardEmailEx" class="form-control" placeholder="votre Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars(trim($_POST['email']));?>">
                        <label for="materialFormCardEmailEx" class="font-weight-light"></label>
                    </div>

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                        <input type="email" id="materialFormCardConfirmEx" class="form-control" placeholder="Confirmez votre Email"  value="<?php if(isset($_POST['email'])) echo htmlspecialchars(trim($_POST['email2']));?>">
                        <label for="materialFormCardConfirmEx" class="font-weight-light"> </label>
                    </div>

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="materialFormCardPasswordEx" class="form-control" placeholder="Votre Mot de Passe" value="<?php if(isset($_POST['pass'])) echo password_hash($_POST['pass'], PASSWORD_DEFAULT);?>">
                        <label for="materialFormCardPasswordEx" class="font-weight-light"></label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="materialFormCardPasswordEx" class="form-control" placeholder="confirmez votre Mot de Passe" value="<?php if(isset($_POST['pass2'])) echo password_hash($_POST['pass2'], PASSWORD_DEFAULT);?>">
                        <label for="materialFormCardPasswordEx" class="font-weight-light"></label>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-default" type="submit">S'inscrire</button>
                    </div>
                </form>
                <!-- Material form register -->

            </div>
            <!-- Card body -->

        </div>
        <!-- Card -->

        <?php

        if (isset($_SESSION['alertes']['submit_error']) && !empty($_SESSION['alertes']['submit_error']))
        {
            ?>
            <p style="color:darkred;"><?= $_SESSION['alertes']['submit_error'] ?></p>
            <?php
            $_SESSION['alertes'] = [];
        }
        ?>
