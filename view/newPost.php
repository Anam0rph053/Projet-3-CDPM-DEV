<h2>Insérer un Nouvel article</h2>
<form action="insert" method="POST" enctype="multipart/form-data">
    <p>Titre du chapitre: <input type="text" name="title" /></p>
    <p> Ecrire votre Chapitre: <br /><textarea name="content" ></textarea></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
    <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p>
    <input type="file" name="image">
    <br /><br />
    <input type="submit" name="ok" value="Envoyer">
</form>