<div class="padding">
    <div class="container">

        <?php if(isset($post)): ?>
            <!-- Card -->
            <div class="card card-cascade wider reverse">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="<?=ASSETS;?>images/<?=$post->getImg()?>" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong><?=$post->getTitle();?></strong></h4>
                    <!-- Subtitle -->
                    <h6 class="font-weight-bold py-2"><?=$post->getName();?> le <?=$post->getCreatedAt();;?></h6>
                    <!-- Text -->
                    <p class="card-text"><?=$post->getContent();?>
                    </p>

                </div>

            </div>

        <?php endif; ?>
       <?php require('comment-edit-view.php'); ?>


</div>

<!-- Card -->
</div>
