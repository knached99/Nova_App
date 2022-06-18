<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#"><i class="fas fa-align-left"></i></a><a class="navbar-brand fw-bold text-uppercase text-base" style="color:white;" href="<?php echo base_url();?>"><span
      class="d-none d-brand-partial">Nova Music</span></a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item dropdown me-2">
                <a class="nav-link nav-link-icon text-gray-400 px-1" id="notifications" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-md svg-icon-heavy">
                <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#paper-plane-1"> </use>
              </svg><sup class="notification-badge-number badge badge-rounded-pill bg-dark" style="border-radius: 50%;"><?php echo count($notifications['data']);?></sup></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="notifications">
                  <?php
                  if(empty($notifications['data'])){
                    echo '  <a class="dropdown-item" href="#">
                          <div class="d-flex align-items-center">
                              <div class="icon icon-sm bg-indigo text-white"><i class="fa fa-exclamation-circle"></i></div>
                              <div class="text ms-2">

                              <h6 class="fw-normal">No Notifications</h6>
                              </div>
                          </div>
                      </a>';
                  }
                    foreach($notifications['data'] as $row){
                      echo '  <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-indigo text-white"><i class="fa fa-exclamation-circle"></i></div>
                                <div class="text ms-2">
                                <h6>'.$row->notification_title.'</h6>
                                    <span class="mb-0 text-truncate text-wrap text-break">'.$row->notification_message.'</span>
                                </div>
                            </div>
                        </a>
                        <hr style="border-bottom: 1px solid indigo;">
                        ';
                    }

                  ?>

   
                    <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="https://my.novamusicapp.com/index.php/Dash/allnotifications"><small class="fw-bold text-uppercase">View all notifications</small></a>
                </div>
            </li>
            <li class="nav-item dropdown me-2 me-lg-3">
                <a class="nav-link nav-link-icon text-gray-400 px-1" id="messages" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-md svg-icon-heavy">
                <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#chat"> </use>
              </svg><sup class="notification-badge-number badge badge-rounded-pill bg-danger" style="border-radius: 50%;"><?php echo count($msgs['data']);?></sup></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="messages">
                  <?php
                  if(empty($msgs['data'])){
                    echo '  <a class="dropdown-item" href="#">
                          <div class="d-flex align-items-center">
                              <div class="icon icon-sm bg-indigo text-white"><i class="fas fa-user-shield"></i></div>
                              <div class="text ms-2">
                              <h6 class="fw-normal">No Messages</h6>

                              </div>
                          </div>
                      </a>';
                  }
                  foreach($msgs['data'] as $row){
                    echo '  <a class="dropdown-item d-flex align-items-center p-3" href="#"><div class="icon icon-sm bg-indigo text-white"><i class="fas fa-user-shield"></i></div>

                          <div class="pt-1">
                              <h6 class="fw-bold mb-0">'.$row->notification_title.'</h6>
                              <p class="m-3 text-wrap text-break text-truncate">'.$row->notification_message.'</p>
                          </div>
                      </a>
                      <hr style="border-bottom: 1px solid indigo;">
              ';
                  }
                  ?>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="https://my.novamusicapp.com/index.php/Dash/allnotifications"> <small class="fw-bold text-uppercase">View all messages</small></a>
                </div>
            </li>
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar p-1" src="<?php if(!isset($_SESSION['artist_social_picture'])){ echo 'https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';} else { echo $_SESSION['artist_social_picture'];} ?>" alt="My profile pic"></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                    <div class="dropdown-header text-gray-700">
                        <h6 class="text-uppercase font-weight-bold">
                            <?php echo $_SESSION['artist_account_name_artist'];?>
                        </h6><small><?php echo $_SESSION['artist_account_email'];?></small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/editprofile"><i class="fas fa-user text-primary"></i> Edit Profile</a>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/editaccount"><i class="fa fa-cog text-primary"></i> Update Account</a>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/wallet"><i class="fas fa-wallet text-primary"></i> Manage Plan</a>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/editsocial"><i class="fas fa-user-friends text-primary"></i> Edit Social Media</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="https://my.novamusicapp.com/index.php/Dash/signout"><i class="fas fa-sign-out-alt text-primary"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
