<?php
defined("BASEPATH") or exit ("No direct scripts allowed");?>

<div class="container-fluid"> 
    <div class = "row">
        <div>
            <?php var_dump($user->id); ?>
            <h1>Welcome <?php echo $user->first_name ?></h1>
            <a href="<?php echo site_url("user/logout"); ?>" class="btn btn-secondary" id="logoutBtn">LOGOUT</a>
        </div>
    </div>
</div>