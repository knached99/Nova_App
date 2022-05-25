<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Dashboard</title>
    <style>
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
a, a:hover, a:focus, a:active {
     text-decoration: none;
     color: inherit;
 }
        </style>
</head>
<body>
<header class="header">
  <!--  <button class="menu-icon-btn" data-menu-icon-btn>
      <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="menu-icon"><g ><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></g></svg>
    </button>-->
    </header>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Dashboard</h1>
            </div>
            <section class="mb-3 mb-lg-5">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/releases/">
                            <div class="card-widget h-100">
                                <div class="card-widget-body">
                                    <div class="dot me-3 bg-green"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Active Releases</h6><span class="text-gray-500">0</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-green"><i class="fas fa-music"></i></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/releases/">
                            <div class="card-widget h-100">
                                <div class="card-widget-body">
                                    <div class="dot me-3 bg-orange"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Pending Releases</h6><span class="text-gray-500"><?php echo count($releases['data']);?></span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-orange"><i class="far fa-clock"></i></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/analytics/">
                            <div class="card-widget h-100">
                                <div class="card-widget-body">
                                    <div class="dot me-3 bg-blue"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Lifetime Streams </h6><span class="text-gray-500">1,430,321</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-blue"><i class="fa fa-chart-line"></i></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/wallet/">
                            <div class="card-widget h-100">
                                <div class="card-widget-body">
                                    <div class="dot me-3 bg-red"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Wallet </h6><span class="text-gray-500">$2,014.73</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-red"><i class="fas fa-money-bill"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <div class="page-header">
                <center>
                    <h1 class="page-heading">Recent Releases</h1>
                </center>
            </div>
            <section>

                <div class="row ">
                  <?php
                  if(empty($releases['data'])){
                    echo '<p class="lead text-danger text-center">You haven\'t created a release yet, <a class="text-dark" style="text-decoration: underline;" href="index.php/createrelease">create one now</a></p>';
                  }
                  else{
                    foreach($releases['data'] as $row){
                      echo '
                      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">
                        <a style="text-decoration: none;" href="https://my.novamusicapp.com/index.php/Dash/release_edit/'.$row->release_id.'">
                            <div class="card mb-3" style="max-height:400px;">
                                <div class="card-body p-3 p-lg-3">
                                <h5 class="card-title">'.$row->release_name.'</h5>
                                <h6 class="card-subtitle text-muted">'.$row->release_type.'</h6>
                                </div>
                                <img class="img-fluid card-img-bottom" src="'.$row->release_artwork.'" alt="">
                            </div>
                        </a>
                      </div>

                      ';
                    }
                  }
                  ?>
                                  <?php
                  if(empty($releases['data'])){
                    echo '';
                  }
                  else{
                    echo '
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">
                        <a style="text-decoration: none;" href="https://my.novamusicapp.com/index.php/Dash/release_create/">
                            <div class="card mb-3" style="max-height:300px;">
                                <div class="card-body p-3 p-lg-3">
                                <h5 class="card-title">Create Release</h5>
                                <h6 class="card-subtitle text-muted">&nbsp;</h6>
                                </div>
                                <img class="img-fluid card-img-bottom" src="'.base_url().'img/photos/addnew.jpg">
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
