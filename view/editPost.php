<?php

?>

<form action="#" method="post" enctype="multipart/form-data">
    <p>
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value=""/>
    </p>
    <p>
        <label for="contenu">Texte :</label>
        <textarea name="content" id="content"></textarea>
        <script>tinymce.init({selector:'textarea'});</script>
    </p>
    <p>
        <label for="image">Fichier (PNG/JPEG/JPG | max. 1 go) :</label><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="1024000000" />
        <input type="file" name="image" />

    </p>

    <input type="submit" value="Envoyer"/>
</form>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
