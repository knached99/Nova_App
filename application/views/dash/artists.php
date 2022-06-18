<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Artists</title>
    <style>
    .card:hover{
      transform: scale(1.01);
      box-shadow: 0 10px 10px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.05),.3s box-shadow,.9s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);

    }
    .input-group, input[type=text]:focus{
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
    <!-- Navbar view will go here-->
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Community</h1>
                <p>Discover the community that makes Nova Music, Nova Music.</p>
            </div>

                <?php
                       echo form_open('search_artist');
                       echo $this->session->flashdata('err');
                       echo $this->session->flashdata('no_results');
                      ?>
                      <input name="search" type="text" class="search" placeholder="Search by artist name and hit enter..">
            <!--    <div class="input-group" >
                <input name="search" style=" height: 50px; border: 1;" class="form-control" type="text" placeholder="Search Artists">
                <button class="btn btn-outline-primary ladda-button ladda-button-progress" data-style="slide-right" type="submit"><span class="ladda-label"><i class="fa fa-search"></i></span></button>
              </div> -->
            <?php echo form_close();?>
            <br>
            <div class="fa-4x">

            </div>
            <section>

                <div class="row">
                    <?php
                    /* if(empty($row->profile_pic)){
                        $profile_pic ='https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';
                    }
                    else{
                        $profile_pic = $row->profile_pic;
                    }*/

                    foreach($results['data'] as $row){
                       if($row->artist_account_name_artist == $this->session->artist_account_name_artist){
                           $artist_account_name_artist= '<h6 class="card-title text-primary fw-bold mb-1">'.$row->artist_account_name_artist.' <h8 style="font-weight:400; color:333;"> - My Account</h8></h6>

                           ';
                           $artist_social_genre= '<h6 class="card-title fw-bold mb-1">'.$row->artist_social_genre.'</h6>';
                           $view_profile = '<a class="btn btn-primary" href="./artist/'.$row->artist_id.' ">View Profile</a>';
                       }
                       else{
                           $artist_account_name_artist= '<h6 class="card-title fw-bold mb-1">'.$row->artist_account_name_artist.'
                           <span class="fa-layers fa-fw" style="">
                           <i class="fas fa-circle" style="color:#FFA500"></i>
                           <i class="fa-inverse fas fa-star" data-fa-transform="shrink-6"></i>
                           </span>

                           <span class="fa-layers fa-fw" style="">
                           <i class="fas fa-certificate" style="color:#0275d8"></i>
                           <i class="fa-inverse fas fa-check" data-fa-transform="shrink-6"></i>
                           </span>


                           </h6>';
                           $artist_social_genre= '<h6 class="card-title fw-bold mb-1">'.$row->artist_social_genre.'</h6>';
                           $view_profile ='<a class="btn btn-primary" href="./artist/'.$row->artist_id.' ">View Profile</a>';
                       }
                        echo '

                        <div class="col-md-6 col-xl-4">
                        <div class="card mb-4">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div class="flex-shrink-0"><img class="avatar avatar-lg p-1" loading="lazy" src="'.$row->artist_social_picture.'" alt=".$artist_account_name_artist."></div>
                              <div class="flex-grow-1 ps-3 overflow-hidden">
                                <h5 class="card-text mb-0">'.$artist_account_name_artist.'</h5>
                                <p class="card-text text-muted">'.$row->artist_social_genre.'</p>
                              </div>
                              <div class="flex-grow-5 ps-3 overflow-hidden">
                              <p class="card-text"><i class="fas fa-user"></i> <b>10</b><br><i class="fas fa-music"></i> <b>7</b></p>

                              </div>
                            </div><a class="stretched-link" href="./Dash/artist/'.$row->artist_id.'"></a>
                          </div>
                        </div>
                      </div>
                        ';
                    }
                    ?>
                </div>
            </section>
        </div>
</body>
</html>
