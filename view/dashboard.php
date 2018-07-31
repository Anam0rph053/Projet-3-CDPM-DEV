

    <H2>Administration</H2>

    <?php// Ici on est bien loggué, on affiche un message
   // echo 'Bienvenue ', $_SESSION['admin'];?>



<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Liste des Chapitres</h3>
    <div class="card-body">
        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Extrait</th>
                    <th class="text-center">Actions</th>
                </tr>
                <tr>
                    <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                    <td class="pt-3-half" contenteditable="true">30</td>
                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                    <td class="pt-3-half" contenteditable="true">Spain</td>
                    <td class="pt-3-half" contenteditable="true">Madrid</td>

                    </td>
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                        <span class="table-"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Modifier</button></span>

                    </td>
                </tr>
                <!-- This is our clonable table line -->
                <tr>
                    <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
                    <td class="pt-3-half" contenteditable="true">45</td>
                    <td class="pt-3-half" contenteditable="true">Insectus</td>
                    <td class="pt-3-half" contenteditable="true">USA</td>
                    <td class="pt-3-half" contenteditable="true">San Francisco</td>
                    <td class="pt-3-half">
                        <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                        <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                </tr>
                <!-- This is our clonable table line -->
                <tr>
                    <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
                    <td class="pt-3-half" contenteditable="true">26</td>
                    <td class="pt-3-half" contenteditable="true">Isotronic</td>
                    <td class="pt-3-half" contenteditable="true">Germany</td>
                    <td class="pt-3-half" contenteditable="true">Frankfurt am Main</td>
                    <td class="pt-3-half">
                        <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                        <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                </tr>
                <!-- This is our clonable table line -->
                <tr class="hide">
                    <td class="pt-3-half" contenteditable="true">Elisa Gallagher</td>
                    <td class="pt-3-half" contenteditable="true">31</td>
                    <td class="pt-3-half" contenteditable="true">Portica</td>
                    <td class="pt-3-half" contenteditable="true">United Kingdom</td>
                    <td class="pt-3-half" contenteditable="true">London</td>
                    <td class="pt-3-half">
                        <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                        <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                    </td>
                    <td>
                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- Editable table -->










