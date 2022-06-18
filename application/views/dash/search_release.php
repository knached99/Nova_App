<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | Artists</title>
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

        .textWithBlurredBg img{
    width:100%;
    height:100%;
    transition:.3s;
    border-radius:4px;
  }
  
  .textWithBlurredBg:hover img{
    filter:blur(2px) brightness(60%);
    box-shadow:0 0 16px #4a4a4a;
  }
   
  .textWithBlurredBg :not(img){
    position:absolute;
    z-index:1;
    top:30%;
    width:100%;
    text-align:center;
    color:#fff;
    opacity:0;
    transition:.3s;
  }
  
  .textWithBlurredBg h5{
    top:50%;
    font-size: 25px;
    font-weight: 900;
    
  }

  .textWithBlurredBg h6{
    top:-50%;
    font-size: 20px;
    font-weight: 800;
    color: hotpink;
  }
  
  .textWithBlurredBg:hover :not(img){
    opacity:1;
  }

    </style>
</head>

<body>
<!-- Navbar view will go here-->

    <div class="d-flex align-items-stretch">
        <!--<div class="sidebar py-3" id="sidebar">
            <h6 class="sidebar-heading">My Nova</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="my_dash">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#real-estate-1"> </use>
            </svg><span class="sidebar-link-title">Dashboard</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="my_profile">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#person-1"> </use>
            </svg><span class="sidebar-link-title">Profile</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/wallet/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#wallet-1"> </use>
            </svg><span class="sidebar-link-title">Wallet</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Music</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted " href="#" data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#song-5096"> </use>
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
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#analytics-1"> </use>
            </svg><span class="sidebar-link-title">Analytics</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Growth</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/deals/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#moneybag-1"> </use>
            </svg><span class="sidebar-link-title">Deals</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/collaborations/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#people-1"> </use>
            </svg><span class="sidebar-link-title">Collaborations</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/opportunities/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#handshake-1"> </use>
            </svg><span class="sidebar-link-title">Opportunities</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Community</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/trending/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#stars-1"> </use>
            </svg><span class="sidebar-link-title">Trending</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted active" href="#">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#people-1"> </use>
            </svg><span class="sidebar-link-title">Artists</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/news/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#alert-1"> </use>
            </svg><span class="sidebar-link-title">News</span></a>
                </li>
            </ul>
            <h6 class="sidebar-heading">Tools</h6>
            <ul class="list-unstyled">
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/engineering/">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#record-1"> </use>
            </svg><span class="sidebar-link-title">Engineering</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="/notebook/">
                        <svg class="svg-icon svg-icon-md me-3">
                <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#notebook-1"> </use>
              </svg><span class="sidebar-link-title">Notebook</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://www.eastrock.fm/playlists">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#playlist-1"> </use>
            </svg><span class="sidebar-link-title">Playlist Submission</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://www.musicsplits.io">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#music-file-1"> </use>
            </svg><span class="sidebar-link-title">MusicSplits</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://artists.apple.com">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#apple-1"> </use>
            </svg><span class="sidebar-link-title">Apple Music for Artists</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a class="sidebar-link text-muted" href="https://artists.spotify.com">
                        <svg class="svg-icon svg-icon-md me-3">
              <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#spotify-1"> </use>
            </svg><span class="sidebar-link-title">Spotify for Artists</span></a>
                </li>
            </ul>
        </div> -->
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <!-- Page Header-->
                <div class="page-header">
                    <h1 class="page-heading">Search Results</h1>
                    <?php
                    if(isset($results_msg)){
                      echo $results_msg;
                    }

                    ?>
                    <a href="releases" class="p-5 m-5 text-primary fw-bold" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i> back </a>
                </div>

                <section>
                <div class="row" >
                    <?php
                    /* if(empty($row->profile_pic)){
                        $profile_pic ='https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';
                    }
                    else{
                        $profile_pic = $row->profile_pic;
                    }*/

                    foreach($search['data'] as $row){

                        echo '
                        <div class="col">
                        <a href="./Dash/release_edit/'.$row->release_id.'">
                            <div class="card mb-4 textWithBlurredBg">
                                <img class="" src="'.$row->release_artwork.'" alt="No pic" style=" width: auto; height: 250px; object-fit: cover;">

                                <div class="card-body p-3 p-lg-3">
                                   <h5> '.$row->release_name.'</h5>
                                    <h6>'.$row->release_status.'</h6>
                                    
                                </div>
                            </div>
                            </a>
                        </div>
                        ';

                    }
                    ?>
                    </div>

                </section>

            </div>
</body>

</html>
