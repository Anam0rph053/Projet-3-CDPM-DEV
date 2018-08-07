

    <!-- Navigation -->
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

<div class="landing">

    <div class="inner">
        <div class="col-sm-12">
            <h1 class="ml1">
              <span class="text-wrapper">
                <span class="line line1"></span>
                <span class="title-start">Billet Simple Pour</span><br/>
                  <span class="title-end">L'Alaska</span>
                <span class="line line2"></span>
              </span>
            </h1>
    </div>
    </div>

</div>


<div class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-title ">
                        <h3 class="title">Dernières Lectures</h3><hr>
                        <br/>
                        <p class="card-text">Jamais Matthew Pike, gardien taciturne des Eaux et Forêts de l'Alaska, n'aurait imaginé que porter secours au rescapé d'un crash aérien le précipiterait dans un tel imbroglio.</p>
                        <a class ="btn btn-default" type="button" style="" href="<?=HOST;?>posts">Accèder aux Lectures</a><hr>

                    </div>
                </div>

        <!-- Grid column -->
            <?php foreach ($variables as $post):?>
                <div class="col-lg-4">
            <!--Card-->
            <div class="card">
                <!--Card image-->
                <div class="view">
                    <img src="assets/images/chien.jpg" class="card-img-top" alt="photo">
                    <a href="#">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--Card content-->
                <div class="card-body elegant-color white-text">
                    <!--Title-->
                    <h4 class="card-title"><?=$post->getTitle();?></h4>
                    <!--Text-->
                    <p class="card-text white-text"><?=substr($post->getContent(), 0, 100); ?>...</p>
                    <a href="<?=HOST;?>post/id/<?php echo $post->getId();?>" class="btn btn-outline-white btn-md waves-effect">Lire la suite</a>
                </div>
            </div>
            <!--/.Card-->
        </div>
        <!-- Grid column -->
            <?php endforeach;?>
        </div>
    </div>
</div>






