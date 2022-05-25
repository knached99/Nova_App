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
                    <h1 class="page-heading">Artist Community</h1>
                </center>
            </div>
            <section>
            <div class="row">
              <!-- <Projects Table>-->
              <div class="col-lg-8 mb-4">
                <div class="card card-table h-100">
                  <div class="card-header">
                    <h5 class="card-heading text-primary fw-bold">Active Artists</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover mb-0 bg-white" id="artists">
                        <thead class="bg-primary text-white">
                          <tr>
                            <th>Artist Name </th>
                            <th>Join Date</th>
                            <th>Number of Releases</th>
                            <th class="text-end">Account Type</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody class="align-middle">

                            <?php
                            foreach($artists['data'] as $row){
                              echo '<tr>';
                              echo '<td> <span class="d-flex align-items-center"><img class="avatar p-1 me-2" src="'.$row->artist_social_picture.'" alt="Artist Picture"><span class="d-inline-block"><strong>'.$row->artist_account_name_artist.'</strong><br><span class="text-muted text-sm">'.$row->artist_account_email.'</span></span></span></td>';
                              echo '<td>Join date not available</td>';
                              echo '<td>Releases data not available</td>';
                              echo '<td>Account type not available</td>';
                              echo '<td><a href="artist_profile/'.$row->artist_id.'"><i class="fa fa-eye fa-lg"></i></a></td>';
                              echo '</tr>';
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </Projects Table>-->
              <!-- <Team Members>-->
              <div class="col-lg-4 mb-4">
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
              </div>
              <!-- </Team Members>-->
            </div>

            </section>
        </div>

</body>
</html>
