<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Releases</title>
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
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">My Releases</h1>
                <?php
                echo $this->session->flashdata('err');
                ?>
                <p>Nova Music brings your releases to life, let's get to work!</p>
            </div>

            <form method="POST" action="search_releases">
                <?php
                       echo $this->session->flashdata('err');
                       echo $this->session->flashdata('no_results');
                       echo $this->session->flashdata('violation');
                      ?>
                <div class="input-group" >
                <input name="search" style=" height: 50px; border: 1;" class="form-control" type="text" placeholder="Search Releases">
                <button class="btn btn-outline-primary ladda-button ladda-button-progress" data-style="slide-right" type="submit"><span class="ladda-label"><i class="fa fa-search"></i></span></button>
              </div>
            </form><br>
            <section>
                <div class="row">
                  <?php
                  if(empty($releases['data'])){
                    echo '<p class="lead text-danger text-center">You haven\'t created a release yet, <a class="text-dark" style="text-decoration: underline;" href="createrelease">create one now</a></p>';
                  }
                  else{
                    foreach($releases['data'] as $row){
                      echo '
                      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">

                            <div class="card mb-3" style="max-height:550px;">
                                <div class="card-body p-3 p-lg-3">
                                <h5 class="card-title">'.$row->release_name.'</h5>
                                <h6 class="card-subtitle text-muted">'.$row->release_type.'</h6>
                                </div>
                                <!-- card-img-bottom in the image styling to make border-bottom rounded -->
                                <a style="text-decoration: none;" href="https://my.novamusicapp.com/index.php/Dash/release_edit/'.$row->release_id.'">
                                  <img class="img-fluid" src="'.$row->release_artwork.'" alt="Independnent Day">
                                </a>
                                <div class="card-footer status">
                                <h6 class="card-subtitle text-muted">'.$row->release_status.'</h6>

                                </div>
                            </div>

                      </div>
                      ';
                    }

                  }
                  ?>


                </div>

            </section>
            <script>

              </script>
            <!-- Footer view will be loaded by controller -->
        </div>

</body>
</html>
