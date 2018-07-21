<h2 class="text-center">Commentaires</h2>


<!--Section: Comments-->
<section class="my-5">
   <?php if($comments !== null): ?>
   <?php foreach($comments as $comment): ?>

    <!-- Card header -->
    <div class="card-header border-0 font-weight-bold"></div>

    <div class="d-block d-md-flex">
        <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <h5 class="font-weight-bold mt-0">
                <a class="text-default"><?=$comment->getPseudo();?></a>
                    <a class="pull-right text-default">
                    <i class="fa fa-reply"></i>
                </a>
            </h5>
            <?=$comment->getComment();?>
            <?php// var_dump($comments);die; ?>


            <?php endforeach; ?>
            <?php endif;?>


</section>
<!--Section: Comments-->

    <!-- Reply section -->
<section class="my-5">
    <!-- Leave a reply -->
    <div class="card-header border-0 font-weight-bold">Laisser un Commentaire</div>

    <!-- Default form reply -->
    <form class="px-1 mt-4" action="<?=HOST;?>addComment&amp;post_id=<?=$post->getId()?>" method="post">



        <!-- Email -->
        <div class="md-form mt-5">
            <label for="replyFormEmail"></label>
            <input type="text" id="pseudo" class="form-control"  name="pseudo" placeholder="Votre Pseudo" >
        </div>

        <!-- Email -->
        <div class="md-form mt-5">
            <label for="replyFormEmail"></label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Votre Email" >
        </div>

        <!-- Comment -->
        <div class="md-form">
            <label for="replyFormComment"></label>
            <textarea class="form-control md-textarea" name="comment" id="comment" placeholder="Votre commentaire" rows="4"></textarea>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-default btn-rounded btn-md" type="submit" >Envoyer</button>
        </div>

    </form>
    <!-- Default form reply -->
</section>
<!-- Reply section -->

<?php

if (isset($_SESSION['alertes']['submit_error']) && !empty($_SESSION['alertes']['submit_error']))
{
    ?>
    <p style="color:darkred;"><?= $_SESSION['alertes']['submit_error'] ?></p>
    <?php
    $_SESSION['alertes'] = [];
}
?>

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