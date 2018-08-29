
<?php
if (isset($_SESSION['alertes']['submit_success']) && !empty($_SESSION['alertes']['submit_success']))
{
    ?>
    <div class="alert alert-success" role="alert">
        <p style="color:green;"><?= $_SESSION['alertes']['submit_success'] ?></p></div>
    <?php
    $_SESSION['alertes'] = [];
}
elseif (isset($_SESSION['alertes']['submit_error']) && !empty($_SESSION['alertes']['submit_error']))
{
    ?>
    <div class="alert alert-danger" role="alert">
        <p style="color:darkred;"><?= $_SESSION['alertes']['submit_error'] ?></p></div>
    <?php
    $_SESSION['alertes'] = [];
}
?>

<h2 class="titre-com">Commentaires</h2>


<!--Section: Comments-->
<section class="my-5">

   <?php if($comments !== null): ?>
   <?php foreach($comments as $comment): ?>
    <!-- Card header -->

    <div class="card-header font-weight-bold"></div>
    <div class="d-block d-md-flex">
        <div class="media-body text-center text-md-left ml-md- ml-0">

                    <h5 class="font-weight-bold mt-0">

                        <?php if($comment->getValidated() === '1'): ?>

                        <a class="text-default"><?= htmlspecialchars($comment->getPseudo());?>, le <?=htmlspecialchars($comment->getCommentDate());?></a>
                    <a class="pull-right text-default" href="<?=HOST;?>warning-comment&amp;id=<?=$comment->getId()?>&amp;post_id=<?=$post->getId()?>">
                    <span class="fas fa-exclamation-circle" name="warning-comment" id="warning-comment" ></span>
                </a>
            </h5>
            <p><<?=htmlspecialchars($comment->getComment());?></p>
            <?php   else : ?>

            <h5 class="font-weight-bold mt-0">
            <a class="text-default"><?=htmlspecialchars($comment->getPseudo());?>, le <?=htmlspecialchars($comment->getCommentDate());?></a>
                <a class="pull-right text-default" href="<?=HOST;?>warning-comment&amp;post_id=<?=$post->getId()?>"></a>
            </h5>

               <p class="pt-3-half">Le Commentaire a été signalé, il est en cours de modération !</p>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif;?>

</section>
<!--Section: Comments-->

    <!-- Reply section -->
<section class="my-5">
    <!-- Leave a reply -->
    <div class="card-header border-0 font-weight-bold">Laisser un Commentaire</div>

    <!-- Default form reply -->
    <form class="px-1 mt-4" action="<?=HOST;?>add-comment&amp;post_id=<?=$post->getId()?>" method="post">



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
            <button class="btn btn-default btn-rounded btn-md" type="submit">Envoyer</button>
        </div>

    </form>
    <!-- Default form reply -->
</section>
<!-- Reply section -->


