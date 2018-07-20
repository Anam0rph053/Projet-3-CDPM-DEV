
<!-- Section: Blog v.1 -->
<section class="my-5">


    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Lectures</h2>
    <!-- Section description -->
    <p class="text-center w-responsive mx-auto mb-5">Ici vous trouverez au fur et à mesure les chapitres de mon roman "Billet Simple pour l'Alaska ! </p>
    <div class="padding">
        <div class="container">

            <?php foreach ($variables as $post):?>

                <div class="row">

                    <div class="col-lg-5">
                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                            <img class="img-fluid" src="assets/images/loup.jpg" alt="Sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7">

                        <!-- Post title -->
                        <h3 class="font-weight-bold mb-3"><?=$post->getTitle();?></h3>
                        <!-- Excerpt -->
                        <p><?=substr($post->getContent(), 0, 150 )?></p>
                        <!-- Post data -->
                        <p><?=$post->getName();?> le <?=$post->getCreatedAt();?></p>
                        <!-- Read more button -->
                            <a class="btn btn-success btn-md" href="<?=HOST;?>post/id/<?php echo $post->getId();?>">Lire la Suite</a>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <hr class="my-5">

            <?php endforeach;?>

                </div>
                <!-- Grid row -->

        </div>
    </div>
</section>
<!-- Section: Blog v.1 -->