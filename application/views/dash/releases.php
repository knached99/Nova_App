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
   /*     .textWithBlurredBg{
    width:300px;
    height:auto;
    display:inline-block;
    position:relative;
    transition:.3s;
    margin:4px;
  }
  */
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
    font-weight: 700;
    color: hotpink;
  }

  .textWithBlurredBg p{
    top: 60%;
    font-size: 20px;
    color: #ffffff;
  }
  
  .textWithBlurredBg:hover :not(img){
    opacity:1;
  }
  input[type=text]:focus{
      transform: scale(1.01);
      box-shadow: 0 10px 10px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
      transition: .2s transform cubic-bezier(.155,1.105,.295,1.05),.2s box-shadow,.9s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
      border: 1px solid #f7f7f7;
       background-color: transparent;
       resize: none;
       outline: none;
       color: #4650DD;
       border-radius: 25px;

       
    }

  .search{
      height: 60;
      width: 100%;
      border: none;
      outline: none;
      text-indent: 20px;
      border-radius: 25px;
    }
    .search:focus{
      -webkit-transition: all ease-in-out .15s;
  -o-transition: all ease-in-out .15s;
  transition: all ease-in-out .15s;
      border: 1px solid #f7f7f7; 
    
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


                <?php
                      echo form_open('search_releases');
                      echo $this->session->flashdata('err');
                       echo $this->session->flashdata('err_msg');
                       echo $this->session->flashdata('no_results');
                       echo $this->session->flashdata('violation');
                      ?>
                <div class="input-group" >
                <input name="search" type="text" class="search" placeholder="Search for a release and hit enter..">
              </div>
            <?php echo form_close();?><br>
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
                      <a style="text-decoration: none;" href="https://my.novamusicapp.com/index.php/Dash/release_edit/'.$row->release_id.'">

                            <div class="card mb-3 textWithBlurredBg" style="max-height:550px;">
                                <div class="card-body p-3 p-lg-3">
                                <h5 class="card-title">'.$row->release_name.'</h5>
                                <h6 class="card-subtitle">'.$row->release_type.'</h6>
                                </div>
                                <!-- card-img-bottom in the image styling to make border-bottom rounded -->
                                  <img class="img-fluid" src="'.$row->release_artwork.'" alt="Independnent Day">
                                <div class="card-footer status">
                                <br><br><br>
                                <p class="card-subtitle">Status: '.$row->release_status.'</p>

                                </div>
                            </div>
                            </a>
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
