

    <!-- Navigation -->


<div class="landing">

    <div class="inner">
        <p class="title-start">Billet Simple Pour</p>
        <p class="title-end">l'Alaska</p>

    </div>

</div>

<div class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-title ">
                    <img class="card-img" src="assets/images/miniature-accueil-5.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <h3 class="title">Dernières Lectures</h3><hr>
                        <br/>
                        <p class="card-text">Jamais Matthew Pike, gardien taciturne des Eaux et Forêts de l'Alaska, n'aurait imaginé que porter secours au rescapé d'un crash aérien le précipiterait dans un tel imbroglio.</p>
                        <a class ="btn btn-default btn-rounded" type="button" href="<?=HOST;?>posts">Accèder aux Lectures</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-center">

                <?php foreach ($params as $post):?>
                <div class="card">
                    <div class="face front">
                        <img class="card-img" src="assets/images/miniature-accueil-2.jpg"  alt="Card image">
                        <div class="card-img-overlay">
                            <h4><?=$post->getTitle();?></h4>

                        </div>
                    </div>
                    <div class=" face back">
                        <p><?=$post->getTitle();?></p>
                        <p><?=substr($post->getContent(), 0, 50); ?></p>
                        <button type="button" class="btn btn-outline-info" >Lire la suite</button>
                    </div>
                </div>
                <?php endforeach;?>


        </div>
        </div>
    </div>
</div>






