
<!-- Section: Blog v.1 -->
<section class="my-5">


    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Lectures</h2>
    <!-- Section description -->
    <p class="text-center w-responsive mx-auto mb-5">Ici vous trouverez au fur et à mesure les chapitres de mon roman "Billet Simple pour l'Alaska ! </p>
    <div class="padding">

        <div class="container">
            <hr class="my-5">
            <?php foreach ($variables as $post):?>

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


                       <p><?=substr($post->getContent(), 0, 150)?>...</p>
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
            <nav>
                <ul class="pagination pg-teal justify-content-center">
                    <!--Arrow left-->
                    <li class="page-item">
                        <a class="page-link" aria-label="Précédent">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Précédent</span>
                        </a>
                    </li>

                    <!--Numbers-->
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link">4</a></li>
                    <li class="page-item"><a class="page-link">5</a></li>

                    <!--Arrow right-->
                    <li class="page-item">
                        <a class="page-link" aria-label="suivant">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">suivant</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!--/Pagination teal-->
                </div>
                <!-- Grid row -->
        </div>
    </div>
</section>
<!-- Section: Blog v.1 -->