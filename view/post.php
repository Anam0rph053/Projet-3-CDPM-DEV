<div class="padding">
    <div class="container">
        <?php foreach ($params as $post):?>

            <!-- Card -->
            <div class="card card-cascade wider reverse">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="<?=ASSETS;?>images/lac2.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong><?=$post->getTitle();?></strong></h4>
                    <!-- Subtitle -->
                    <h6 class="font-weight-bold indigo-text py-2"><?=$post->getName();?> le <?=$post->getCreatedAt();;?></h6>
                    <!-- Text -->
                    <p class="card-text"><?=$post->getContent();?>
                    </p>

                    <!-- Linkedin -->
                    <a class="px-2 fa-lg li-ic"><i class="fa fa-linkedin"></i></a>
                    <!-- Twitter -->
                    <a class="px-2 fa-lg tw-ic"><i class="fa fa-twitter"></i></a>
                    <!-- Dribbble -->
                    <a class="px-2 fa-lg fb-ic"><i class="fa fa-facebook"></i></a>

                </div>

            </div>
            <h2 class="text-center">Commentaires</h2>

            <!--Section: Comments-->
            <section class="my-5">

                <!-- Card header -->
                <div class="card-header border-0 font-weight-bold">4 comments</div>

                <div class="media d-block d-md-flex mt-4">
                    <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="font-weight-bold mt-0">
                            <a class="text-default" href="">Miley Steward</a>
                            <a href="" class="pull-right text-default">
                                <i class="fa fa-reply" href="<?=HOST;?>commentEditView"></i>
                            </a>
                        </h5>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        <div class="media d-block d-md-flex mt-4">
                            <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img (27).jpg" alt="Generic placeholder image">
                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                <h5 class="font-weight-bold mt-0">
                                    <a class="text-default" href="">Tommy Smith</a>
                                    <a href="" class="pull-right text-default">
                                        <i class="fa fa-reply" href="<?=HOST;?>commentEditView"></i>
                                    </a>
                                </h5>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </div>
                        </div>

                        <!-- Quick Reply -->
                        <div class="md-form mt-4">
                            <label for="quickReplyFormComment">Your comment</label>
                            <textarea class="form-control md-textarea" id="quickReplyFormComment" rows="3"></textarea>

                            <div class="text-center my-4">
                                <button class="btn btn-default btn-sm btn-rounded" type="submit">Post</button>
                            </div>
                        </div>


                <!--Pagination -->
                <nav class="d-flex justify-content-center mt-5">
                    <ul class="pagination pagination-circle pg-teal mb-0">

                        <!--First-->
                        <li class="page-item disabled">
                            <a class="page-link">First</a>
                        </li>

                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <!--Numbers-->
                        <li class="page-item active">
                            <a class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">5</a>
                        </li>

                        <!--Arrow right-->
                        <li class="page-item">
                            <a class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                        <!--Last-->
                        <li class="page-item">
                            <a class="page-link">Last</a>
                        </li>

                    </ul>
                </nav>
                <!--Pagination -->

            </section>
            <!--Section: Comments-->

        <?php endforeach;?>


</div>

    <div class="container">

    </div>
<!-- Card -->
</div>
