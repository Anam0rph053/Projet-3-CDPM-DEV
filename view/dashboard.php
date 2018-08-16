



    <?php// Ici on est bien loggué, on affiche un message
   // echo 'Bienvenue ', $_SESSION['admin'];?>



<!-- Editable table -->
<div class="card">

    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Administration</h3><br/>

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

    <h4 class="card-title text-center  py-4"  style="color:#26b2a4;">Liste des Chapitres</h4>
    <div class="card-body">


        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="<?=HOST;?>addPost" class="text-success"><i
                            class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>


            <table border="1" class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                <tr>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;">Id</th>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;"">Image</th>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;"">Auteur</th>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;"">Titre</th>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;"">Extrait</th>
                    <th class="text-center" style="font-family: fontastique ;color:#777676;"">Actions</th>
                </tr>

                </thead>



                <?php foreach ($posts as $post) : ?>


                    <tr>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$post->getId(); ?></td>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><img src="<?=ASSETS;?>images/<?=$post->getImg()?>" style="width: 150px; height:90px; "></td>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$post->getName(); ?></td>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$post->getTitle(); ?></td>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=substr($post->getContent(), 0, 150 ) ?></td>
                        <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><span class="table-remove"><a href="<?=HOST;?>deletePost&amp;id=<?=$post->getId()?>" ><button type="button"
                                                                                 class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                            <span class="table-"><a href="<?= HOST; ?>editPost&amp;id=<?=$post->getId()?>"><button type="button"
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
        <h4 class="card-title text-center  py-4" style="color:#26b2a4;">Liste des commentaires signalés</h4>
        <div class="card-body">

            <div id="table" class="table-editable">
                </tr>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <tr>

                        <th class="text-center">id Com</th>
                        <th class="text-center">Pseudo</th>
                        <th class="text-center">Commentaire</th>
                        <th class="text-center">Actions</th>

                        <?php foreach ($comments as $comment) : ?>

                    <tr>
                        <?php if($comment->getValidated() === '0'): ?>


                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getId(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getPseudo(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getComment(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><span class="table-remove"><a href="<?=HOST;?>deleteComment&amp;id=<?=$comment->getId()?>"><button type="button"
                                                                                                                                                                                                      class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                                <span class="table-"><a href="<?=HOST;?>validatedComment&amp;id=<?=$comment->getId()?>&amp;post_id=<?=$post->getId()?>"><button type="button"
                                                                                                                                                                class="btn btn-danger btn-rounded btn-sm my-0">Valider</button></a></span>
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
        <h4 class="card-title text-center  py-4" style="color:#26b2a4;">Liste des commentaires </h4>
        <div class="card-body">

            <div id="table" class="table-editable">
                </tr>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <tr>

                        <th class="text-center">id Com</th>
                        <th class="text-center">Pseudo</th>
                        <th class="text-center">Commentaire</th>
                        <th class="text-center">Actions</th>

                        <?php foreach ($comments as $comment) : ?>

                    <tr>



                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getId(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getPseudo(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><?=$comment->getComment(); ?></td>
                            <td class="pt-3-half" style="font-family: fontastique ;color:#777676;"><span class="table-remove"><a href="<?=HOST;?>deleteComment&amp;id=<?=$comment->getId()?>"><button type="button"
                                                                                                                                                                                                      class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>

                            </td>


                    </tr>

                    <?php endforeach; //fin foreach
                    ?>

                </table>

            </div>



        </div>
    </div>

    <!-- Editable table -->






