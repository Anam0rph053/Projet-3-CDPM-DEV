
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

<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Ajouter un Chapitre</h3><br/>




<form action="<?=HOST;?>add-post" method="post" enctype="multipart/form-data">



    <div class="md-form">
        <i class= "fas fa-user-secret prefix grey-text"></i>
        <input type="text" id="name"   name="name"  class="form-control" value="Jean Forteroche" style="color:grey;">
        <label for="materialFormContactNameEx"</label>
    </div>
    <div class="md-form">
        <i class="fas fa-edit prefix grey-text"></i>
        <input type="text" id="title"   name="title"  class="form-control" placeholder=" Rédigez votre titre">
        <label for="materialFormContactNameEx"</label>
    </div>

    <br/>
    <div class="md-form">
        <i class="fas fa-pencil-alt prefix grey-text"></i>
        <textarea type="text" id="materialFormContactMessageEx" name="content" class="form-control md-textarea" rows="3" placeholder="Rédigez votre Chapitre"></textarea>
        <label for="materialFormContactMessageEx"</label>

    </div>
    <input type="hidden" name="MAX_FILE_SIZE" value="1024000000" />
    <input type="file" name="img" />


    <div class="text-center py-4 mt-3">
        <button class="btn btn-default" name="submit" type="submit">Mettre en ligne</button>
    </div>
</form>



