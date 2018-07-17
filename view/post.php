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

        <?php endforeach;?>


       <?php foreach($params as $comment): ?>
       <?php require('commentEditView.php'); ?>
        <?php endforeach; ?>

</div>

<!-- Card -->
</div>