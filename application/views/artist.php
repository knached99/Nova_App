<?php
 /* if(empty($row->profile_pic)){
    $profile_pic ='https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';
}
else{
    $profile_pic = $row->profile_pic;
}*/
 foreach($artist['data'] as $row){
     $artist_account_name_artist = $row->artist_account_name_artist;
     $artist_account_email = $row->artist_account_email;
     $artist_social_genre = $row->artist_social_genre;
     $artist_social_biography = $row->artist_social_biography;
     $artist_social_picture = $row->artist_social_picture;
     $artist_social_public_location = $row->artist_social_public_location;
     // social media, website, and email
     $artist_social_facebook = $row->artist_social_facebook;
     $artist_social_instagram = $row->artist_social_instagram;
     $artist_social_twitter = $row->artist_social_twitter;
     $artist_social_soundcloud = $row->artist_social_soundcloud;
     $artist_social_website = $row->artist_social_website;
     $artist_social_youtube = $row->artist_social_youtube;
 }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Nova Music |
        <?php echo $artist_account_name_artist;?>
    </title>
    <style>
        /* unvisited link */
        a:link {
            color: #222;
            text-decoration: none;

        }

        /* visited link */
        a:visited {
            color: #222;
            text-decoration: none;

        }

        /* mouse over link */
        a:hover {
            color: #555;
            text-decoration: none;
            text-decoration: none;

        }

        /* selected link */
        a:active {
            color: #555;
            text-decoration: none;

        }

        #social-icon,
        #social-icon~span {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Breadcrumbs -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../artists">Artists</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $artist_account_name_artist;?>
                    </li>
                </ul>
            </div>
            <div class="page-header">
            </div>
            <section>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card card-profile mb-4">
                            <div class="card-header"
                                style="background-image:linear-gradient(rgb(98, 0, 255), rgb(0, 140, 255));">
                            </div>
                            <div class="card-body">
                                <center><img class="card-profile-img "
                                        style="display: inline-block;"
                                        src="<?php if(!isset($artist_social_picture)){ echo 'https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';} else { echo $artist_social_picture;} ?>"
                                        alt="Artist Social Picture"></center>
                                <h3 class="mb-3 text-center">
                                    <?php echo $artist_account_name_artist;?>
                                    <span class="fa-layers fa-fw" style="">
                                        <i class="fas fa-certificate" style="color:#0275d8"></i>
                                        <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i>
                                    </span>
                                </h3>
                                <p class="mb-4 text-center">
                                    <?php echo $artist_social_public_location;?>
                                </p>
                                
                                <br>
                                <center>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <p style="margin-bottom:0px">Releases</p>
                                            <h1>50</h1>
                                        </div>
                                        <div class="col mb-3">
                                            <p style="margin-bottom:0px">Followers</p>
                                            <h1>1M</h1>
                                        </div>
                                        <div class="col">
                                            <p style="margin-bottom:0px">Likes</p>
                                            <h1>1.9M</h1>
                                        </div>
                                    </div>
                                </center>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                <h7 class="fw-bold">ABOUT ME</h7><br><br>
                                <p><?php echo $artist_social_biography;?></p>
                                    </div>
                                    <div class="col-6">

                                <h7 class="fw-bold">FOLLOW ME</h7><br><br>
                                <center>
                                <div class="row">
                                  <?php
                                  if(!empty($artist_social_facebook)){
                                    echo '  <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                          <a href="'.$artist_social_facebook.'" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$artist_account_name_artist.'\'s Facebook Profile">

                                              <button type="button" class="btn btn-lg  px-3" style="background:#3b5998; color:white; width:200px;"><i class="fa fab fa-facebook-f" ></i> Facebook</button>
                                          </a>
                                      </div><br><br><br>';

                                  }
                                  else{
                                    echo '

                                    ';
                                  }
                                  if(!empty($artist_social_instagram)){
                                    echo '
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <a href="'.$artist_social_instagram.'" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$artist_account_name_artist.'\'s Instagram Profile">
                                            <button type="button" class="btn btn-lg  px-3" style="background:#833ab4; color:white; width:200px;"><i class="fa fab fa-instagram"></i> Instagram</button>
                                        </a>
                                    </div><br><br><br>
                                    ';
                                  }
                                  else {
                                    echo '';
                                  }
                                  ?>
                                  <?php
                                    if(!empty($artist_social_twitter)){
                                      echo '  <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <a href="'.$artist_social_twitter.'">
                                                <button type="button" class="btn btn-lg  px-3" style="background:#1DA1F2; color:white; width:200px;"><i class="fa fab fa-twitter"></i> Twitter</button>
                                            </a>
                                        </div><br><br><br>';
                                    }
                                    else{
                                      echo '';
                                    }
                                    if(!empty($artist_social_soundcloud)){
                                      echo '  <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <a href="'.$artist_social_soundcloud.'">
                                                <button type="button" class="btn btn-lg px-3" style="background:#ff7700; color:white; width:200px;"><i class="fa fab fa-soundcloud"></i> Soundcloud</button>
                                            </a>
                                        </div><br><br><br>';
                                    }
                                    else{
                                      echo '';
                                    }
                                  ?>
                                    <?php
                                    if(!empty($artist_social_youtube)){
                                      echo '<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">

                                      <a href="'.$artist_social_youtube.'">
                                      <button type="button" class="btn btn-lg px-3" style="background:#ff0000; color:white; width:200px;"><i class="fa fab fa-youtube"></i> YouTube</button>
                                      </a>
                                      </div><br><br><br>
                                      ';
                                    }
                                    else{
                                      echo '';
                                    }


                                    ?>
                                    <?php
                                    if(!empty($artist_social_website)){
                                      echo '<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                       
                                     <button type="button" class="btn btn-dark btn-lg px-3" style="color:white; width:200px;" onclick="webpage_redirect('.$artist_social_website.')"><i class="fa fa-globe"></i> Website</button>
                                      </div><br><br><br>
                                      ';
                                    }
                                    else{
                                      echo '';
                                    }


                                    ?>

                                </div>
                                </center>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Artist's Releases-->

                </div>
                <div class="row">
                <center><h1 class="page-heading card-header mb-5 mt-5"><?php echo $artist_account_name_artist;?>'s Releases</h1></center>

                    <?php
                    foreach($releases['data'] as $row){
                      echo '
                      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                        <!--a style="text-decoration: none;" href="https://my.novamusicapp.com/index.php/Dash/release_edit/'.$row->release_id.'"-->
                            <div class="card mb-3" style="max-height:550px;">
                                <div class="card-body p-3 p-lg-3">
                                <h5 class="card-title">'.$row->release_name.'</h5>
                                <h6 class="card-subtitle text-muted">'.$row->release_type.'</h6>
                                </div>
                                <img class="img-fluid card-img-bottom" src="'.$row->release_artwork.'" alt="">
                            </div>
                        <!--/a-->
                      </div>
                      ';
                    }
                     ?>
                     </div>
            </section>
        </div>
        <script>
        function webpage_redirect(website){
          if(website == null){
            window.location.href="#";
          }
          else{
              window.location.replace(website);
          }
        }
        </script>
</body>

</html>
