<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#"><i class="fas fa-align-left"></i></a><a class="navbar-brand fw-bold text-uppercase text-base" style="color:white;" href="index.html"><span
      class="d-none d-brand-partial">Nova Music</span></a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item dropdown me-2">
                <a class="nav-link nav-link-icon text-gray-400 px-1" id="notifications" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-md svg-icon-heavy">
                <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#paper-plane-1"> </use>
              </svg><sup class="notification-badge-number badge badge-rounded-pill bg-dark" style="border-radius: 50%;">0</sup></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="notifications">
                  <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                           <div class="icon icon-sm bg-indigo text-white"><i class="fas fa-exclamation-circle"></i></div>
                           <div class="text ms-2">
                           <h6 class="fw-normal text-danger"></h6>

                           </div>
                       </div>
                   </a>

                  <!--  <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                            <div class="text ms-2">
                                <p class="mb-0">You have 6 new messages</p>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                            <div class="text ms-2">
                                <p class="mb-0">Server rebooted</p>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-sm bg-indigo text-white"><i class="fab fa-twitter"></i></div>
                            <div class="text ms-2">
                                <p class="mb-0">You have 2 followers</p>
                            </div>
                        </div>
                    </a> -->
                    <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="#"><small class="fw-bold text-uppercase">View all notifications</small></a>
                </div>
            </li>
            <li class="nav-item dropdown me-2 me-lg-3">
                <a class="nav-link nav-link-icon text-gray-400 px-1" id="messages" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-md svg-icon-heavy">
                <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#chat"> </use>
              </svg><sup class="notification-badge-number badge badge-rounded-pill bg-danger" style="border-radius: 50%;">0</sup></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="messages">
                  <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                           <div class="icon icon-sm bg-indigo text-white"><i class="fas fa-user-shield"></i></div>
                           <div class="text ms-2">
                           <h6 class="fw-normal text-danger"></h6>

                           </div>
                       </div>
                   </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="#"> <small class="fw-bold text-uppercase">View all messages                          </small></a>
                </div>
            </li>
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar p-1" src="<?php if(!isset($_SESSION['artist_social_picture'])){ echo 'https://cvhrma.org/wp-content/uploads/2015/07/default-profile-photo.jpg';} else { echo $_SESSION['artist_social_picture'];} ?>" alt="My profile pic"></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                    <div class="dropdown-header text-gray-700">
                        <h6 class="text-uppercase font-weight-bold">
                            <?php echo $_SESSION['admin_first_name']. ' '.$_SESSION['admin_last_name'] ;?>
                        </h6><small>Administrator</small>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/Dash/edit_profile"><i class="fas fa-user text-primary"></i> Edit Profile</a>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/Dash/edit_account"><i class="fa fa-cog text-primary"></i> My Account</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-wallet text-primary"></i> Manage Plan</a>
                    <a class="dropdown-item" href="https://my.novamusicapp.com/index.php/Dash/edit_social"><i class="fas fa-hashtag text-primary"></i> Edit Social Media</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="https://my.novamusicapp.com/index.php/Admin/signout"><i class="fas fa-sign-out-alt text-primary"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
