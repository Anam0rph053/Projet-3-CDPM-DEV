
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

<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Modifier un Chapitre</h3><br/>


<?php

if(isset($post)){
    ?>

<form action="<?=HOST;?>edit-post&amp;id=<?=$post->getId()?>" method="post" enctype="multipart/form-data">

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
        <input type="file" name="img" value="">
        <input type="hidden" name="img" value="<?=$post->getImg()?>"/>
        <img src="<?=ASSETS;?>images/<?=$post->getImg()?>" style="width: 150px; height:90px; ">


        <div class="text-center py-4 mt-3">
            <button class="btn btn-default" name="submit" type="submit">Mettre en ligne</button>
        </div>
</form>
<?php } else{

    echo "erreur";
}  ?>




