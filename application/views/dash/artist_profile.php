<?php
foreach($artist['data'] as $row){
  // artist info
  $artist_id = $row->artist_id;
  $artist_name = $row->artist_account_name_artist;
  $artist_fname = $row->artist_account_name_first;
  $artist_lname = $row->artist_account_name_last;
  $artist_email = $row->artist_account_email;
  $artist_bio = $row->artist_social_biography;
  $artist_location = $row->artist_social_public_location;
  $artist_pic = $row->artist_social_picture;
  // artist address
  $artist_addy = $row->artist_account_address_street;
  $artist_unit = $row->artist_account_address_unit;
  $artist_city = $row->artist_account_address_city;
  $artist_state = $row->artist_account_address_state;
  $artist_zip = $row->artist_account_address_zip;
  // artist social media
  $artist_insta = $row->artist_social_instagram;
  $artist_facebook = $row->artist_social_facebook;
  $artist_twitter = $row->artist_social_twitter;
  $artist_youtube = $row->artist_social_youtube;
  $artist_soundcloud = $row->artist_social_soundcloud;
  $artist_website = $row->artist_social_website;


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Dashboard</title>
</head>
<body>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Admin Dashboard</h1>
            </div>
            <section class="mb-3 mb-lg-5">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="/releases/">
                            <div class="card-widget h-100">
                                <div class="card-widget-body">
                                    <div class="dot me-3 bg-green"></div>
                                    <div class="text">
                                        <h6 class="mb-0">Active Releases</h6><span class="text-gray-500">192</span>
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
                                        <h6 class="mb-0">Releases Pending Submission</h6><span class="text-gray-500">43</span>
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
                                        <h6 class="mb-0">Community Streams </h6><span class="text-gray-500">10,430,321</span>
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
                                        <h6 class="mb-0">Monthly Subscription Income </h6><span class="text-gray-500">$7,014.73</span>
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
                    <h1 class="page-heading">Artist Info</h1>
                </center>
            </div>
            <section>
            <div class="row align-items-center justify-content-center">
              <!-- <Projects Table>-->

              <div class="col-md-6 col-xl-4" style="width: 500px;">
                <div class="card" style="object-fit: contain;">
          <img src="<?php echo $artist_pic?>" class="card-img-top" alt="<?php echo $artist_name?>'s picture">
          <div class="card-body">
            <h5 class="card-title text-secondary"><b style="font-weight: 900;" class="text-primary"><?php echo $artist_name;?></b> - <?php echo $artist_location;?></h5>
            <p class="card-text text-wrap text-break"><?php echo $artist_bio?></p>
            <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <?php
              echo $this->session->flashdata('msg_err');
              echo $this->session->flashdata('msg_success');
              ?>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Send <?php echo $artist_name;?> a message
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <form action="../send_msg/<?php echo $artist_email;?> " method="POST" autocomplete="off">
                  <div class="row m-3">
                    <div class="col">
                      <textarea class="form-control" style="border-width: 0; outline: none !important; border-bottom: 1px solid blue;" name="msg" placeholder="what do you want to say?"></textarea>
                    </div>
                  </div>
                  <div class="row m-3">
                    <div class="col">
                      <button class="btn btn-primary" type="submit">Send Message <i class="far fa-paper-plane"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
          </div>
        </div>
              </div>
              <!-- </Projects Table>-->
              <!-- <Team Members>-->
            <!--  <div class="col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-header">
                    <h5 class="card-heading"> Latest Members</h5>
                  </div>
                  <div class="card-body pb-2">
                    <div class="d-flex align-items-center mb-3"><img class="avatar p-1 me-2" src="#" alt="ArtistPic">
                      <div class="mt-1"><a class="text-dark fw-bold text-decoration-none" href="#!">artist_account_name_artist</a>
                        <p class="text-muted text-sm mb-0">artist_account_email</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- </Team Members>-->
            </div>

            </section>
        </div>

</body>
</html>
