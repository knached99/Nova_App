<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | My Profile</title>
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
 <!-- Navbar view will be loaded here -->
    <div class="d-flex align-items-stretch">
        <div class="sidebar py-3" id="sidebar">
            <h6 class="sidebar-heading">My Nova</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="my_dash">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#real-estate-1"> </use>
            </svg><span class="sidebar-link-title">Dashboard</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted active" href="#">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#person-1"> </use>
            </svg><span class="sidebar-link-title">Profile</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/wallet/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#wallet-1"> </use>
            </svg><span class="sidebar-link-title">Wallet</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Music</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted " href="#" data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#song-5096"> </use>
            </svg><span class="sidebar-link-title">Releases </span></a>
                    <ul class="sidebar-menu list-unstyled collapse " id="widgetsDropdown">
                        <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/releases/create/">Add New
                Release</a></li>
                        <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/releases/">View All Releases</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/analytics/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#analytics-1"> </use>
            </svg><span class="sidebar-link-title">Analytics</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Growth</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/deals/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#moneybag-1"> </use>
            </svg><span class="sidebar-link-title">Deals</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/collaborations/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#people-1"> </use>
            </svg><span class="sidebar-link-title">Collaborations</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/opportunities/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#handshake-1"> </use>
            </svg><span class="sidebar-link-title">Opportunities</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Community</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/trending/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#stars-1"> </use>
            </svg><span class="sidebar-link-title">Trending</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="artists">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#people-1"> </use>
            </svg><span class="sidebar-link-title">Artists</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/news/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#alert-1"> </use>
            </svg><span class="sidebar-link-title">News</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Tools</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/engineering/">
                        <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#record-1"> </use>
</svg><span class="sidebar-link-title">Engineering</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/notebook/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#notebook-1"> </use>
            </svg><span class="sidebar-link-title">Notebook</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://www.eastrock.fm/playlists">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#playlist-1"> </use>
            </svg><span class="sidebar-link-title">Playlist Submission</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://www.musicsplits.io">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#music-file-1"> </use>
            </svg><span class="sidebar-link-title">MusicSplits</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://artists.apple.com">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#apple-1"> </use>
            </svg><span class="sidebar-link-title">Apple Music for Artists</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://artists.spotify.com">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>/icons/orion-svg-sprite.svg#spotify-1"> </use>
            </svg><span class="sidebar-link-title">Spotify for Artists</span></a>
                </li>
            </ul>
        </div>
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <!-- Breadcrumbs -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="my_dash">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile </li>
                    </ul>
                </div>
                <!-- Page Header-->
                <div class="page-header">
                    <h1 class="page-heading">Profile</h1>
                </div>
                <section>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-profile mb-4">
                                <div class="card-header" style="background-image: url(img/photos/paul-morris-116514-unsplash.jpg);">
                                </div>
                                <div class="card-body text-center">
                                <img class="card-profile-img" src="<?php if(!isset($_SESSION['profile_pic'])){ echo 'https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';} else { echo $_SESSION['profile_pic'];} ?>" alt="my profile pic">
                                <h3 class="mb-3"><?php echo $this->session->firstName. ' '.$this->session->lastName?></h3>
                                    <p class="mb-4">Pro Member</p>
                                    <!--<button class="btn btn-outline-dark btn-sm">Manage Membership</button> -->
                                <form method="POST" action="upload_profile_pic" autocomplete="off" class="m-2">
                                <?php 
                                echo $this->session->flashdata('url_required');
                                echo $this->session->flashdata('upload_err');
                                echo $this->session->flashdata('upload_success');
                                ?>
                                
                                <input class="form-control" type="text" name="profile_pic" placeholder="Enter profile pic url">
                                <button type="submit" class="btn btn-sm btn-primary m-2">upload</button>
                                </form>
                                    
                                    <?php 
                              
                                        echo $this->session->flashdata('form_err');
                                        echo $this->session->flashdata('incorrect_pwd');
                                        echo $this->session->flashdata('update_failed');
                                        echo $this->session->flashdata('update_success');
                                    ?>
                                    <div class="accordion m-4" id="pwdAccordion">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header" id="headerOne">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Manage Password 
                                  </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    <form method="POST" action="update_pwd">
                                    <div class="row m-2">
                                    <div class="col">
                                    <input type="password" class="form-control" placeholder="Current Password" name="curr_pwd">
                                    </div>
                                    </div>
                                    <div class="row m-2">
                                    <div class="col">
                                    <input type="password" class="form-control" placeholder="New Password" name="pwd">
                                    </div>
                                    </div>
                                    <div class="row m-2">
                                    <div class="col">
                                    <input type="password" class="form-control" placeholder="Retype Password" name="confirm_pwd">
                                    </div>
                                    </div>
                                    <div class="row m-2">
                                    <button type="submit" class="btn btn-primary btn-md">Update Password</button>
                                    </div>
                                    </form>
                                     </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                             
                            </div> 
                        </div>
                        
                        
                        <div class="col-lg-8">

                            <form class="card mb-4" method="POST">
                                <div class="card-header">
                                    <h4 class="card-heading">Edit Profile</h4>
                               
                                    <?php 
                                    if(isset($update_failed)){
                                        echo $update_failed;
                                    }
                                    else if(isset($update_success)){
                                        echo $update_success;
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-4">
                                                <label class="form-label">Artist Name</label>
                                                <input class="form-control" type="text" name="artist_name" readonly placeholder="Artist Name" value="<?php echo $this->session->artistName;?>">
                                                <small class="text-danger"><?php echo form_error('artist_name')?></small>
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Email address</label>
                                                <input class="form-control" type="email" name="artist_email"  placeholder="Email" value="<?php if(!isset($this->session->email)){echo 'Session data not available';} else{ echo $this->session->email;}?>">
                                                <small class="text-danger"><?php echo form_error('artist_email')?></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" readonly placeholder="First Name" value="<?php echo $this->session->firstName;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" readonly placeholder="Last Name" value="<?php echo $this->session->lastName;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fas fa-globe fa-lg text-primary"></i> Official Website</label>
                                                <input class="form-control" type="text" name="artist_website" placeholder="Website" value="<?php echo $this->session->artist_website; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fab fa-instagram fa-lg text-primary"></i> Instagram </label>
                                                <input class="form-control" type="text" name="artist_insta"  placeholder="Instagram Username" value="<?php if(!isset($this->session->artist_insta)){echo '';} else { echo $this->session->artist_insta; }?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-4">
                                                <label class="form-label"><i class="fas fa-music text-primary"></i> Genre</label>
                                                <select class="form-control custom-select" name="artist_genre">
                                                <option default selected disabled><?php if(!isset($this->session->artist_genre)){echo 'Select Genre';}else{ echo $this->session->artist_genre;} ?></option>
                                                <option value="Pop">Pop</option>
                                                <option value="Hip Hop">Hip Hop</option>
                                                <option value="RnB">RnB</option>
                                                <option value="Rock">Rock</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-0">
                                                <label class="form-label">Biography</label>
                                                <textarea name="artist_bio" class="form-control" rows="5" placeholder="Tell us about yourself.."><?php if(!isset($this->session->artist_bio)){echo '';}else{ echo $this->session->artist_bio;}?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                 <div class="text-start">
                                 <?php 
                                 switch($this->session->artist_privacy){
                                     case 0:
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" '.set_checkbox('artist_privacy', '1').' name="artist_privacy" checked>
                                        <label class="form-check-label text-primary">
                                          your account is private <i class="fas fa-lock"></i>
                                        </label>
                                      </div>';
                                     break;
                                     case 1:
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" '.set_checkbox('artist_privacy', '0').' name="artist_privacy">
                                        <label class="form-check-label text-primary">
                                          your account is public <i class="fas fa-unlock"></i>
                                        </label>
                                      </div>';
                                 }
                                 ?>
                                 </div>
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>



                
            </div>
            <div class="page-holder bg-gray-100">
                <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start fw-bold">
                                <p class="mb-2 mb-md-0 fw-bold">Project Nova by East Rock Entertainment. Copyright &copy; <?php echo DATE('Y');?></p>
                            </div>
                            <div class="col-md-6 text-center text-md-end text-gray-400">
                                <p class="mb-0">Alpha 0.0.1</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
            <script src="<?php echo base_url();?>vendor/chart.js/Chart.min.js"></script>
            <script src="<?php echo base_url();?>js/charts-defaults.js"></script>
            <script src="<?php echo base_url();?>js/charts-home.js"></script>
            <script src="<?php echo base_url();?>js/theme.js"></script>
            <script src="<?php echo base_url();?>vendor/prismjs/prism.js"></script>
            <script src="<?php echo base_url();?>vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
            <script src="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
            <script src="<?php echo base_url();?>vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
            <script type="text/javascript">
                // Optional
                Prism.plugins.NormalizeWhitespace.setDefaults({
                    'remove-trailing': true,
                    'remove-indent': true,
                    'left-trim': true,
                    'right-trim': true,
                });
            </script>
  

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</body>

</html>