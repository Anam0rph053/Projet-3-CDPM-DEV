


<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Modifier un Chapitre</h3><br/>


<?php

if(isset($post)){
    ?>

<form action="<?=HOST;?>editPost&amp;id=<?=$post->getId()?>" method="post" enctype="multipart/form-data">

        <div class="md-form">
            <i class= "fas fa-user-secret prefix grey-text"></i>

            <input type="text" id="name"   name="name"  class="form-control" value="<?=$post->getName()?>">
            <label for="name"</label>
        </div>

    <div class="md-form">
        <i class="fas fa-edit prefix grey-text"></i>
        <input type="text" id="title"   name="title"  class="form-control" value="<?=$post->getTitle()?>">
        <label for="title"</label>
    </div>

        <br/>
        <div class="md-form">
            <i class="fas fa-pencil-alt prefix grey-text"></i>
            <textarea type="text" id="content" name="content" class="form-control md-textarea" rows="3"><?=$post->getContent()?></textarea>
            <label for="content"</label>
        </div>

        <input type="hidden" name="MAX_FILE_SIZE" value="1024000000" />
        <input type="file" name="img" value="" />



        <div class="text-center py-4 mt-3">
            <button class="btn btn-default" name="submit" type="submit">Mettre en ligne</button>
        </div>
</form>
<?php } else{

    echo "erreur";
}  ?>



<div class="alerte">
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
    ?></div>
