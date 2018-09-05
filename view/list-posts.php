
<!-- Section: Blog v.1 -->
<section class="my-5">


    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Lectures</h2>
    <!-- Section description -->
    <p class="text-center w-responsive mx-auto mb-5">Ici vous trouverez au fur et à mesure les chapitres de mon roman "Billet Simple pour l'Alaska ! </p>
    <div class="padding">

        <div class="container">
            <hr class="my-5">
            <?php foreach ($variables['posts'] as $post):?>

                <div class="row">

                    <div class="col-lg-5">
                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                            <img class="img-fluid" src="<?=ASSETS;?>images/<?=$post->getImg()?>" alt="Sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7">

                        <!-- Post title -->
                        <h3 class="font-weight-bold mb-3"><?=htmlspecialchars($post->getTitle());?></h3>
                        <!-- Excerpt -->

                            <?php
                            $extract = substr($post->getContent(), 0, 150);
                            $espace = strrpos($extract, ' ');
                            $text = substr($post->getContent(), 0, $espace).'...' ;?>


                       <p><?=$text?></p>
                        <!-- Post data -->
                        <p><?=$post->getName();?> le <?=htmlspecialchars($post->getCreatedAt());?></p>
                        <!-- Read more button -->
                        <a  href="post&amp;id=<?=$post->getId()?>" style="color:white !important;" class ="btn btn-default" >Lire la Suite</a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <hr class="my-5">

            <?php endforeach;?>
            <!--Pagination teal-->
            <nav aria-label="pagination example">

                <ul class="pagination justify-content-center">
                    <!--Arrow left-->
                    <?php for($x = 1; $x<=$nbrePage; $x++) : ?>
                    <!--Numbers-->
                    <li class="active"><a href="?page=<?=$x;?>"><?=$x;?></a></li>
                    <!--Arrow right-->
                    <?php endfor;?>
                </ul>

            </nav>

            <!--/Pagination teal-->
                </div>
                <!-- Grid row -->
        </div>

</section>
<!-- Section: Blog v.1 -->