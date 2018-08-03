



    <?php// Ici on est bien loggué, on affiche un message
   // echo 'Bienvenue ', $_SESSION['admin'];?>



<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Administration</h3><br/>
    <h4 class="card-title text-center  py-4"  style="color:#26b2a4;">Liste des Chapitres</h4>
    <div class="card-body">
        <?php// foreach ($variables as $post):?>

        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>

            <table class="table table-bordered table-responsive-md table-striped text-center">
                <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Extrait</th>
                    <th class="text-center">Actions</th>
                </tr>
                <tr>
                    <td class="pt-3-half" ></td>
                    <td class="pt-3-half" ></td>
                    <td class="pt-3-half" ></td>
                    <td class="pt-3-half" ></td>
                    <td class="pt-3-half" ><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                        <span class="table-"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Modifier</button></span></td>

                    </td>
                </tr>
            </table>
        </div>
        <?php //endforeach;?>

    </div>
</div>
<!-- Editable table -->

    <!-- Editable table -->
    <div class="card">
        <h4 class="card-title text-center  py-4" style="color:#26b2a4;">Liste des commentaires signalés</h4>
        <div class="card-body">


            <div id="table" class="table-editable">

                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <tr>

                        <th class="text-center">id Com</th>
                        <th class="text-center">id Post</th>
                        <th class="text-center">Pseudo</th>
                        <th class="text-center">Commentaire</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <tr>
                        <td class="pt-3-half" contenteditable="false"></td>
                        <td class="pt-3-half" contenteditable="false"></td>
                        <td class="pt-3-half" contenteditable="false"></td>
                        <td class="pt-3-half" contenteditable="false"></td>
                        <td class="pt-3-half" contenteditable="false"><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Effacer</button></span>
                            <span class="table-"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Valider</button></span></td>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Editable table -->









