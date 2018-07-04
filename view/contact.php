<?php require('_header.php'); ?>

<div class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <p class="h4 text-center mb-4">Contact</p>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" id="name" placeholder="Votre Nom et prénom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="text" id="email" placeholder="Votre adresse de messageri" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message"></label>
                        <input type="text" id="message" placeholder="Votre message" class="form-control">
                    </div>
                    <button type="submit" id="Envoyer" class="btn btn-default">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('_footer.php'); ?>
