<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | Dashboard</title>
    <meta name="description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="author" content="Sean O'Hara">
    <meta name="og:title" property="og:title" content="Nova Music - Your Music, Your Way.">
    <meta property="og:image" content="<?php echo base_url();?>img/novaog.png" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity." />
    <meta property="og:url" content="https://novamusic.app" />
    <meta name="twitter:title" content="Nova Music">
    <meta name="twitter:description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
    <meta name="twitter:creator" content="eastrockent">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>img/favicon/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>img/favicon/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>img/favicon/favicon-16x16.png?v=2">
    <link rel="manifest" href="<?php echo base_url();?>img/favicon/site.webmanifest?v=2">
    <link rel="mask-icon" href="<?php echo base_url();?>img/favicon/safari-pinned-tab.svg?v=2" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon/favicon.ico?v=2">
    <meta name="apple-mobile-web-app-title" content="Nova Music">
    <meta name="application-name" content="Nova Music">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo base_url();?>img/favicon/browserconfig.xml?v=2">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/themes/prism-okaidia.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>


<body>

        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <!-- Breadcrumbs -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                        <li class="breadcrumb-item active">Edit Social Media </li>
                    </ul>
                </div>
                <!-- Page Header-->
                <div class="page-header">
                    <h1 class="page-heading">Social Media</h1>
                    <p></p>
                </div>
                <section>
                    <div class="row">
                        <div class="col-lg-12 card mb-4">
                          <?php echo form_open();?>
                            <!--<form class="card mb-4" method="POST">-->
                                <div class="card-header">
                                    <h4 class="card-heading">Edit Social media</h4>
                                    <?php
                                    if(isset($update_failed)){
                                        echo $update_failed;
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
                                                <label class="form-label"><i class="fab fa-facebook" style="color:rgb(66, 103, 178);"></i> Facebook</label>
                                                <input class="form-control" type="text" name="artist_social_facebook" placeholder="https://www.facebook.com/myPage" value="<?php echo $this->session->artist_social_facebook;?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_facebook');?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fab fa-instagram" style="color:rgb(138, 58, 185)"></i> Instagram</label>
                                                <input class="form-control" type="text" name="artist_social_instagram" placeholder="https://www.instagram.com/myPage" value="<?php echo $this->session->artist_social_instagram;?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_instagram');?></small>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fab fa-twitter" style="color:rgb(81, 130, 255)"></i> Twitter</label>
                                                <input class="form-control" type="text" name="artist_social_twitter" placeholder="https://www.twitter.com/myPage" value="<?php echo $this->session->artist_social_twitter;?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_twitter');?></small>

                                             </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fab fa-youtube" style="color:#ff0000"></i> YouTube</label>
                                                <input class="form-control" type="text" name="artist_social_youtube" placeholder="https://www.youtube.com/channel/myChannel" value="<?php echo $this->session->artist_social_youtube;?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_youtube');?></small>

                                             </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fab fa-soundcloud" style="color:#ff7700"></i> Soundcloud</label>
                                                <input class="form-control" type="text" name="artist_social_soundcloud" placeholder="https://www.soundcloud.com/myPage" value="<?php echo $this->session->artist_social_soundcloud;?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_soundcloud');?></small>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fa fa-globe" style="color:#000000"></i> Official Website</label>
                                                <input class="form-control" type="text" name="artist_social_website" placeholder="https://www.yourwebsite.com/" value="<?php if(empty($this->session->artist_social_website)){echo ''; } else{ echo $this->session->artist_social_website;} ?>">
                                                    <small class="text-danger"><?php echo form_error('artist_social_website');?></small>

                                                </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                                <?php echo form_close();?>
                          <!--  </form>-->
                        </div>
                    </div>
                </section>
            </div>
</body>

</html>
