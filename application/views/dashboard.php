<?php
defined("BASEPATH") or exit ("No direct scripts allowed");?>

<div class="container-fluid"> 
    <div class = "row">
        <div class="">
            
            <h1>Welcome <?php echo $user->first_name ?></h1>
            <a href="<?php echo site_url("user/logout"); ?>" class="btn btn-secondary" id="logoutBtn">LOGOUT</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <nav>   
                <div class="nav nav-tabs">
                    <a class="nav-link active" href="" data-toggle="tab" role="tab">sample1</a>
                    <a class="nav-link " href="" data-toggle="tab" role="tab">sample2</a>
                    <a class="nav-link " href="" data-toggle="tab" role="tab">sample3</a>
                </div>
            </nav>
        <div class="tab-content">

        </div>   
            

    <button class="btn btn-success mt-3" data-toggle="modal" data-target="#sampleModal">Modal</button>


        </div>
    </div>


</div>