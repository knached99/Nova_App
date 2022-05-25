<?php 
switch($this->session->artist_social_ispublic){
    case 0:
        $public='checked';
        $unchecked='';
        break;
    case 1:
        $private='checked';
        $unchecked='';
        break;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Dashboard</title>
<style>
.img-div{position:relative; display: inline-block;}
.img-div:hover:after{
    content:'';
    position:absolute;
    left: 0px;
    top: 0px;
    bottom: 0px;
    width: 100%;
    background: url('https://www.pngall.com/wp-content/uploads/2/Upload.png') center no-repeat;
    background-size: 50px;
}

.img-div:hover img{opacity: 0.1;}
</style>
</head>

<body>
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Profile">Profile</a></li>
                        <li class="breadcrumb-item active">Edit Profile </li>
                    </ul>
                </div>
                <div class="page-header">
                    <h1 class="page-heading">Profile</h1>
                </div>
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-profile mb-4">
                                <div class="card-header" style="background-image:linear-gradient(rgb(98, 0, 255), rgb(0, 140, 255));"></div>
                                <div class="card-body text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="img-div">
                                    <img class="card-profile-img " style="display: inline-block;" src="<?php if(!isset($_SESSION['artist_social_picture'])){ echo 'https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';} else { echo $_SESSION['artist_social_picture'];} ?>" alt="Nathan Andrews">
                                      <?php
                                      echo $this->session->flashdata('upload_err');
                                      echo $this->session->flashdata('upload_success');
                                      ?>
                                    </div>
                                    </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Profile Pic</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <?php
                                      echo form_open_multipart('./Dash/do_upload');
                                      ?>
                                    <!--    <form method="POST" action="do_upload" enctype="multipart/form-data"> -->

                                        <div class="row">
                                        <input class="form-control" type="file" name="artist_social_picture" placeholder="Enter Image URL">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Upload Picture</button>
                                    </div>
                                    <!--</form> -->
                                    <?php echo form_close();?>
                                    </div>
                                </div>
                                </div>
                                <!-- End modal -->
                                    <h3 class="mb-3"><?php echo $this->session->artist_account_name_artist;?></h3>
                                    <p class="mb-4"><?php if(!isset($this->session->artist_social_genre)){ echo 'No Genre Set';} else{ echo $this->session->artist_social_genre;}?></p>
                                    <a href="./Dash/artist/<?php echo $this->session->artist_id;?>"><button class="btn btn-outline-dark btn-sm">VIEW PUBLIC PROFILE</button></a>
                                </div>
                            </div>
                            <?php echo form_open();?>
                            <div class="card mb-4">
                            <!-- <form class="card mb-4" method="POST">-->
                                <div class="card-header">
                                    <h4 class="card-heading">Edit Profile</h4>
                                    <?php
                                     if(isset($update_err)){
                                         echo $update_err;
                                     }
                                     else if(isset($update_success)){
                                         echo $update_success;
                                     }
                                  //  var_dump($_POST);
                                  //  echo validation_errors();

                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"> Genre</label>
                                                <select class="form-control custom-select" name="artist_social_genre">
                                                <option selected value="<?php echo $this->session->artist_social_genre?>"><?php if(!isset($this->session->artist_social_genre)){echo 'Select Genre';} else{ echo $this->session->artist_social_genre;}?></option>
                                                <option value="Pop" <?php echo set_select('artist_social_genre', 'Pop');?>>Pop</option>
                                                <option value="Hip Hop" <?php echo set_select('artist_social_genre', 'Hip Hop');?>>Hip Hop</option>
                                                <option value="R&B" <?php echo set_select('artist_social_genre','R&B');?>>R&B</option>
                                                <option value="Jazz" <?php echo set_select('artist_social_genre', 'Jazz');?>>Jazz</option>
                                                <option value="Acoustic" <?php echo set_select('artist_social_genre', 'Acoustic');?>>Acoustic</option>
                                                <option value="Country" <?php echo set_select('artist_social_genre', 'Country');?>>Country</option>
                                                <option value="Singer/Songwriter" <?php echo set_select('artist_social_genre', 'Singer/Songwriter'); ?>>Singer/Songwriter</option>
                                                <option value="Rock" <?php echo set_select('artist_social_genre', 'Rock');?>>Rock</option>
                                                <option value="Metal" <?php echo set_select('artist_social_genre', 'Metal');?>>Metal</option>
                                                <option value="EDM" <?php echo set_select('artist_social_genre', 'EDM');?>>EDM</option>
                                                <option value="Dubstep" <?php echo set_select('artist_social_genre', 'Dubstep');?>>Dubstep</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"> Location</label>
                                                <input class="form-control" name="artist_social_public_location" type="text" placeholder="Country, State, Area" value="<?php if(!isset($this->session->artist_social_public_location)){echo '';} else{echo $this->session->artist_social_public_location;}?>">
                                                <small class="text-danger"><?php echo form_error('artist_social_public_location'); ?></small>
                                                <p class="m-2 text-primary"><i class="fas fa-exclamation-circle" style="color:orange"></i> This displays on your public profile</p>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-0">
                                                <label class="form-label"> Biography</label>
                                                <textarea class="form-control" name="artist_social_biography" rows="6" placeholder="Tell us about yourself..."><?php echo $this->session->artist_social_biography;?></textarea>
                                                <small class="text-danger"><?php echo form_error('artist_social_biography'); ?></small>
                                            </div>
                                        </div>
                                        <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label mt-3 text-primary fw-bold">Toggle your account privacy</label>
                                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 mt-3">
                                            <label class="checkbox-inline text-primary fw-normal" style="padding-right:20px;">
                                                <input id="inlineCheckbox1" type="radio" value="0" name="account_privacy" <?php if(isset($public)){ echo $public;} else{ echo $unchecked;}?>> Public <i class="fas fa-eye"></i>
                                            </label>
                                            <label class="checkbox-inline text-primary fw-normal" style="padding-right:20px;">
                                            <input id="inlineCheckbox2" type="radio" value="1" name="account_privacy" <?php if(isset($private)){ echo $private;} else{ echo $unchecked;}?>> Private <i class="fas fa-eye-slash"></i>
                                            </label>
                                         </div>
                                      
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                                <?php echo form_close();?>
                              </div>
                          <!--  </form>-->
                        </div>
                    </div>
                </section>
            </div>

</body>
</html>
