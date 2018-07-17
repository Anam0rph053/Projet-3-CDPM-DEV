<?php
if (isset($_SESSION['alertes']['submit_success']) && !empty($_SESSION['alertes']['submit_success']))
{
    ?>
    <p style="color:green;"><?= $_SESSION['alertes']['submit_success'] ?></p>
    <?php
    $_SESSION['alertes'] = [];
}