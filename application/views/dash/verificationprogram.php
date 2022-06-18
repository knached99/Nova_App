<!DOCTYPE html>
<html>

<head>
    <title>Nova Music | Verification Program</title>
</head>

<body>
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <!-- Breadcrumbs -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Dash/dash.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Verification Program</li>
                    </ul>
                </div>
                <!-- Page Header-->
                <div class="page-header">
                    <h1 class="page-heading">                                     
                        <span class="fa-layers fa-fw" style="">
                            <i class="fas fa-certificate" style="color:#0275d8"></i>
                                 <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i>
                            </span> Verification Program</h1>
                    <p></p>
                </div>

                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="card mb-4" method="POST">
                                <div class="card-header">
                                    <h4 class="card-heading">Verification Form</h4>
                                    <?php
                                    if(isset($update_err)){
                                        echo $update_err;
                                    }
                                    else if(isset($update_success)){
                                        echo $update_success;
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <h2>About Verification</h2>
                                        <p>Our verification program protects notable creators and provides our community involved leaders who set the bar high. 
                                            All Nova Music members have the ability to submit their profile for verification however we only verify a small number of those that meet the criteria.
                                            <br><br>Please review these requirements carefully, if you meet all of the requirements, please submit for verification.</p>
                                            <br><br>
                                            <div class="col-12">
                                        <p>
                                        <ul>
                                        <li>At least 5 releases distributed through Nova Music</li>
                                        <li>Nova Music profile is complete</li>
                                        <li>Valid Justification for Verification</li>
                                        <li>At least 1 social media account with 20K or more followers</li>
                                        <li>At least 1 social media account with 20K or more followers</li>

                                         </ul>


                                         </p>
                                </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" readonly placeholder="John" value="<?php echo $this->session->artist_account_name_first;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" readonly placeholder="Doe" value="<?php echo $this->session->artist_account_name_last;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" name="artist_account_email" placeholder="johndoe@gmail.com" readonly value="<?php echo $this->session->artist_account_email;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Artist Name</label>
                                                <input class="form-control" type="text" placeholder="Lil Uzi Vert" readonly value="<?php echo $this->session->artist_account_name_artist;?>">
                                                <p class="m-3 text-primary"><i class="fas fa-exclamation-circle" style="color:orange"></i> This information will be sent to our verification staff.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-4">
                                                <label class="form-label">Street</label>
                                                <input class="form-control" name="artist_account_address_street" type="text" placeholder="123 Anywhere Street" value="<?php echo $this->session->artist_account_address_street;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Unit</label>
                                                <input class="form-control" name="artist_account_address_unit" type="text" placeholder="APT 1" value="<?php echo $this->session->artist_account_address_unit;?>">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit Request</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>


            </div>

</body>
</html>
