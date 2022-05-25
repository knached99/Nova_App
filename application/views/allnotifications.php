<!DOCTYPE html>
<html>
<head>
    <title>Nova Music | Notifications</title>
</head>
<body>
    <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
            <!-- Page Header-->
            <div class="page-header">
                <h1 class="page-heading">Notifications</h1>
            </div>
            <?php
            echo $this->session->flashdata('violation');
            if(empty($all_notifications['data'])){
              echo '';
            }
            else{
              echo '    <div class="row">
                      <div class="col-xl-12">
                        <!-- modal for making sure user actually wants to delete all notifications -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" style="position: relative; float:right">Clear All Notifications</button><br><br><br></div>

                  </div>';
            }

            ?>


<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletemodal">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete all notifications?
      </div>
      <div class="modal-footer">
        <a href="del_notifications/<?php echo $_SESSION['artist_account_email'];?>" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>


            <section class="mb-3 mb-lg-5 align-items-center justify-content-center">
              <?php
              if(empty($all_notifications['data'])){
                echo '
                <h4 class="text-secondary lead m-5" style="padding: 70px 0; text-align: center;">No Notifications</h4>
                ';
              }
              foreach($all_notifications['data'] as $row){
                echo '
                <div class="row">

                    <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card-widget">
                                <div class="card-widget-body">
                                <div class="icon text-white bg-primary"><i class="fas fa-bell"></i></div>
                                    <div class="text" style="padding:10px;">
                                        <h6 class="mb-0">'.$row->notification_title.'</h6>
                                        <span class="">'.$row->notification_message.'</span>
                                    </div>
                                </div>
                                <div class="icon text-danger "><a href="del_notification/'.$row->notification_id.' "><i class="fas fa-times"></i></a></div>
                            </div>
                    </div>
                </div>
                ';
              }
              ?>

            </section>

            <div style="
    position: fixed;
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap-reverse;
    flex-direction: row-reverse;">

    <div style="
        width:130px;
        height:130px;
        position: absolute;
        background-color:green;">

    </div>

</div>

            <!-- Footer view will be loaded by controller -->
        </div>

</body>
</html>
