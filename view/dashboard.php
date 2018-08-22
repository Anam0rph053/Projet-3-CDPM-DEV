

<!-- Editable table -->
<div class="card">

    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Administration</h3><br/>

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

    <h4 class="titre-section text-center  py-4"  style="color:#26b2a4;">Liste des Chapitres</h4>
    <div class="card-body">


        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="<?=HOST;?>add-post" class="text-success"><i
                            class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>


            <table border="1" class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                <tr>
                    <th class="titre-tab">Id</th>
                    <th class="titre-tab">Image</th>
                    <th class="titre-tab">Nom</th>
                    <th class="titre-tab">Titre</th>
                    <th class="titre-tab">Extrait</th>
                    <th class="titre-tab">Actions</th>
                </tr>

                </thead>



                <?php foreach ($posts as $post) : ?>


                    <tr>
                        <td class="pt-3-half"><?=$post->getId(); ?></td>
                        <td class="pt-3-half"><img src="<?=ASSETS;?>images/<?=$post->getImg()?>" style="width: 150px; height:90px; "></td>
                        <td class="pt-3-half"><?=htmlspecialchars($post->getName()); ?></td>
                        <td class="pt-3-half"><?=htmlspecialchars($post->getTitle()); ?></td>
                        <td class="pt-3-half"><?=htmlspecialchars(substr($post->getContent(), 0, 150 )) ?></td>
                        <td class="pt-3-half"><span class="table-remove"><a href="<?=HOST;?>delete-post&amp;id=<?=$post->getId()?>" ><button type="button"
                                                                                 class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                            <span class="table-"><a href="<?= HOST; ?>edit-post&amp;id=<?=$post->getId()?>"><button type="button"
                                                                                        class="btn btn-danger btn-rounded btn-sm my-0">Modifier</button></a></span>
                        </td>

                    </tr>

                <?php endforeach; //fin foreach
                ?>
            </table>


        </div>


    </div>
</div>
<!-- Editable table -->

    <!-- Editable table -->
    <div class="card">
        <h4 class="titre-section text-center  py-4" >Liste des commentaires signalés</h4>
        <div class="card-body">

            <div id="table" class="table-editable">
                </tr>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>

                        <th class="titre-tab">id</th>
                        <th class="titre-tab">nom</th>
                        <th class="titre-tab">Commentaire</th>
                        <th class="titre-tab">Actions</th>

                        <?php foreach ($comments as $comment) : ?>
                    </tr>

                    </thead>

                        <?php if($comment->getValidated() === '0'): ?>


                            <td class="pt-3-half"><?=htmlspecialchars($comment->getId()); ?></td>
                            <td class="pt-3-half"><?=htmlspecialchars($comment->getPseudo()); ?></td>
                            <td class="pt-3-half"><?=htmlspecialchars($comment->getComment()); ?></td>
                            <td class="pt-3-half"><span class="table-remove"><a href="<?=HOST;?>delete-comment&amp;id=<?=$comment->getId()?>">
                                        <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                                <span class="table-"><a href="<?=HOST;?>validated-comment&amp;id=<?=$comment->getId()?>&amp;post_id=<?=$post->getId()?>">
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Valider</button></a></span>
                            </td>
                        <?php endif; ?>

                    </tr>

                    <?php endforeach; //fin foreach
                    ?>

                </table>

            </div>



        </div>
    </div>

    <!-- Editable table -->


    <!-- Editable table -->
    <div class="card">
        <h4 class="titre-section text-center  py-4">Liste des commentaires </h4>
        <div class="card-body">

            <div id="table" class="table-editable">
                </tr>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>

                        <th class="titre-tab">id Com</th>
                        <th class="titre-tab">Pseudo</th>
                        <th class="titre-tab">Commentaire</th>
                        <th class="titre-tab">Actions</th>

                        <?php foreach ($comments as $comment) : ?>
                    </tr>

                    </thead>
                    <tr>



                            <td class="pt-3-half" ><?=htmlspecialchars($comment->getId()); ?></td>
                            <td class="pt-3-half" ><?=htmlspecialchars($comment->getPseudo()); ?></td>
                            <td class="pt-3-half" ><?=htmlspecialchars($comment->getComment()); ?></td>
                            <td class="pt-3-half" ><span class="table-remove"><a href="<?=HOST;?>delete-comment&amp;id=<?=$comment->getId()?>">
                                                   <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>

                            </td>


                    </tr>

                    <?php endforeach; //fin foreach
                    ?>

                </table>

            </div>



        </div>
    </div>

    <!-- Editable table -->






