<?php

?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Modifier un Chapitre</h3><br/>

<form action="<?=HOST;?>updatePost" method="post" enctype="multipart/form-data">

    <?php //if($post->getId()):?>
        <input type="hidden" name="id" value="<?php// echo $post->getId();?>"/>
    <?php //endif;?>

    <div class="md-form">
        <i class= "fas fa-user-secret prefix grey-text"></i>
        <input type="text" id="author"   name="author"  class="form-control" value="Jean Forteroche">
        <label for="materialFormContactNameEx"</label>
    </div>
    <div class="md-form">
        <i class="fas fa-edit prefix grey-text"></i>
        <input type="text" id="title"   name="title"  class="form-control" placeholder=" Modifiez votre titre" style="font-family: fontastique ;" value="<?//=$post->getTitle();?>"/>
        <label for="materialFormContactNameEx"</label>
    </div>
    <br/>
    <div class="md-form">
        <i class="fas fa-pencil-alt prefix grey-text"></i>
        <textarea type="text" id="materialFormContactMessageEx" name="content" class="form-control md-textarea" rows="3" placeholder="Modifiez votre Chapitre" ><?=$post->getContent();?></textarea>
        <label for="materialFormContactMessageEx"</label>
        <script>tinymce.init({selector:'textarea'});</script>
    </div>

    <div class="md-form">
       <p>Sélectionnez votre image au format :(PNG/JPEG/JPG | max. 1 go) :</p>
        <div class="file-field">
            <div class="btn btn-default btn-sm float-left">
                <span>Image</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000000" />
                <input type="file" name="img" />
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" style="font-family: fontastique;">
            </div>
        </div>
    </div>

    <div class="text-center py-4 mt-3">
        <button class="btn btn-default" name="submit"type="submit">Mettre en ligne</button>
    </div>

</form>



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
