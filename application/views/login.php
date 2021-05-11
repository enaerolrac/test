<?php defined("BASEPATH") or exit("No direct script access allowed"); ?>
<div class="container-fluid">
    <div class="row">
        <div class = "col-lg-6 text-center">
            <img class="img-fluid" src="https://controtek.com/wp-content/uploads/2018/10/Company-Logo.png" alt="">
        </div>
        <div class = "col-lg-5">
            <form method="POST" action=<?php echo site_url('user/login'); ?> id="loginUser">
                <div class = "form-group">
                    <label for = "Username">Username</label>
                    <input class = "form-control" type = "text" name="username" required>
                </div>

                <div class = "form-group">
                    <label for="Password">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" class ="btn btn-success" value="Login">
                </div>

        </div>
    </div>
</div>