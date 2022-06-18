<?php
foreach($release['data'] as $row){
  $release_title = $row->release_name;
  $release_id=$row->release_id;
  $release_date = $row->release_date;
  $release_artist = $row->release_artist_main;
  $release_type = $row->release_type;
  $release_genre = $row->release_genre;
  $release_status = $row->release_status;
  $release_artwork = $row->release_artwork;

}

switch($release_type){
  case 'Single':
  $single = 'checked';
  $unchecked = '';
  break;
  case 'EP':
  $ep='checked';
  $unchecked ='';
  break;
  case 'Album':
  $album = 'checked';
  $unchecked='';
  default:
  $unchecked ='';
  break;
}

switch($release_status){
  case 'Draft':
    $analytics = 'hidden';
    $readonly ='';
    $disabled ='';
    $hidden = '';
    $status_style = 'style="font-weight:500;"';
  break;
  case 'In Review':
    $analytics = 'hidden';
    $readonly = 'readonly';
    $disabled = 'disabled';
    $hidden = 'hidden';
    $status_style = 'style="font-weight:500; color:#301934;"';
  break;
  case 'Needs Repair':
    $analytics = 'hidden';
    $readonly = '';
    $disabled ='';
    $hidden = '';
    $status_style = 'style="font-weight:500; color:#FF0000;"';
  break;
  case 'Locked':
    $analytics = 'hidden';
    $readonly='readonly';
    $disabled = 'disabled';
    $hidden = 'hidden';
    $status_style = 'style="font-weight:500;"';
  break;
  case 'Submitted':
    $analytics = 'hidden';
    $readonly = 'readonly';
    $disabled = 'disabled';
    $hidden = 'hidden';
    $status_style = 'style="font-weight:500; color:#4169e1;"';
  break;
  case 'Live':
    $analytics = '';
    $readonly = 'readonly';
    $disabled = 'disabled';
    $hidden = 'hidden';
    $status_style = 'style="font-weight:500; color:#4BB543;"';
  break;
  case 'Takedown':
    $analytics = '';
    $readonly ='readonly';
    $disabled = 'disabled';
    $hidden = 'hidden';
    $status_style = 'style="font-weight:500; color:#D11A2A;"';
  break;

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nova Music | Edit - <?php echo $release_title;?></title>
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
                text-decoration: none ;
                color: inherit;
            }



    </style>
    </head>
    <body>
        <div class="page-holder bg-gray-100 ">
            <div class="container-fluid px-lg-4 px-xl-5 ">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Releases</a></li>
                        <li class="breadcrumb-item active">Edit Release </li>
                    </ul>
                </div>
                <div class="page-header">
                    <h1 class="page-heading">Edit Release</h1>
                    <?php
                        echo $this->session->flashdata('err');
                        echo $this->session->flashdata('success');
                        echo $this->session->flashdata('update_err');
                        echo $this->session->flashdata('request_err');
                    ?>
                </div>
                <section>
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                          <?php
                          echo form_open_multipart('../index.php/Dash/save_release/'.$release_id.'');
                          ?>
                                <div class="row">
                                    <div class="">
                                        <div class="card">
                                            <div class="card-header card-heading bg-primary">
                                                <div class="row">
                                                    <h3 style="color:white;"><?php echo $release_title;?></h3>
                                                    <p style="color:white;"><?php echo $release_type;?></p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <h3 class="">Release Details</h3>
                                                        <h5 class="form-text text-muted">Update your release details.</h5>

                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Release Status:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <div class="input-group mb-3">
                                                            <input class="form-control" type="text" aria-label="Text input with dropdown button" name="release_status" <?php echo $status_style;?> readonly value="<?php echo $release_status;?>">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#previewModal" href="#"><i class="fas fa-eye"></i> Preview Release</a>
                                                                <a class="dropdown-item" <?php echo $analytics;?>  href="#"><i class="fas fa-chart-line"></i> Analytics</a>
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reviewModal" <?php echo $hidden;?> href="#"><i class="fas fa-search"></i> Request Review</a>
                                                                <?php
                                                                    switch($release_status){
                                                                    case 'Draft':
                                                                    echo ' <div class="dropdown-divider" role="separator"></div>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteRelease" href="#"><i class="fas fa-trash" style="color:"></i> Delete Release</a>';
                                                                    break;

                                                                    case 'Live':
                                                                    echo '<div class="dropdown-divider" role="separator"></div>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#takedown" href="#"><i class="fas fa-arrow-down" style="color:"></i> Request Takedown</a>';
                                                                    break;
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Release Type:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <label class="checkbox-inline" style="padding-right:20px;">
                                                            <input id="inlineCheckbox1" <?php echo $disabled;?> type="radio" value="Single" name="release_type" <?php if(isset($single)){ echo $single;} else{ echo $unchecked;}?>> Single
                                                        </label>
                                                        <label class="checkbox-inline" style="padding-right:20px;">
                                                            <input id="inlineCheckbox2" <?php echo $disabled;?> type="radio" value="EP" name="release_type" <?php if(isset($ep)){ echo $ep;} else{ echo $unchecked;}?>> EP
                                                        </label>
                                                        <label class="checkbox-inline" style="padding-right:20px;">
                                                            <input id="inlineCheckbox3" <?php echo $disabled;?> type="radio" value="Album" name="release_type" <?php if(isset($album)){ echo $album;} else{ echo $unchecked;}?>> Album
                                                        </label><br><br>
                                                        <div <?php echo $hidden;?> >
                                                            <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> A <b>Single</b> is a release containing one to three songs that are under 10 minutes each.</small><br>
                                                            <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> An <b>EP</b> contains four to six songs with a total running time of 30 minutes or less.</small><br>
                                                            <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> An <b>Album</b> is a release that contains over 30 minutes of music, a continuous DJ mix, or six different tracks from the same artist.</small>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Release Title:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <input <?php echo $readonly;?> class="multisteps-form__input form-control form-control-sm" id="release_title" name="release_title" type="text" value="<?php echo $release_title;?>"><small class="form-text text-muted">If you are releasing a single, this will also be your song title. If you are releasing an EP or an Album, this will be your release title.</small>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Main Release Artist:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <input <?php echo $readonly;?> class="multisteps-form__input form-control form-control-sm" id="release_artist_primary" name="artist_account_name_artist" readonly type="text" value="<?php echo $release_artist;?>"><small class="form-text text-muted">You are the primary release artist. If you'd like to change your artist name, please contact support.</small>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Release Genre:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <select name="release_genre" class="form-control form-control-sm" <?php echo $disabled;?>>
                                                            <option selected value="<?php echo $release_genre;?>"><?php echo $release_genre;?></option>
                                                            <option value="Alternative">Alternative</option>
                                                            <option value="Blues">Blues</option>
                                                            <option value="Classical">Classical</option>
                                                            <option value="Country">Country</option>
                                                            <option value="Dance">Dance</option>
                                                            <option value="Electronic">Electronic</option>
                                                            <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
                                                            <option value="Jazz">Jazz</option>
                                                            <option value="Latin">Latin</option>
                                                            <option value="New Age">New Age</option>
                                                            <option value="Pop">Pop</option>
                                                            <option value="R&B/Soul">R&B/Soul</option>
                                                            <option value="Reggae">Reggae</option>
                                                            <option value="Rock">Rock</option>
                                                            <option value="Soundtrack">Soundtrack</option>
                                                            <option value="Spoken Word">Spoken Word</option>
                                                            <option value="World">World</option>
                                                        </select>
                                                        <small class="form-text text-muted">These are all of the recongized genres for most DSPs. If yours is not on the list, please select the closest option.</small>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Release Date:</label>
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <input <?php echo $disabled;?> class="form-control form-control-sm input-datepicker" type="text" value="<?php echo $release_date;?>" id="release_date" name="release_date" placeholder="Select Release Date"> <small class="form-text text-muted">Please select a date at least <b>14</b> days from today. This allows us and the DSPs time to process your release for distribution.</small>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label">Album Artwork:</label><br>
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-10">
                                                        <input type="file" <?php echo $disabled;?> name="release_artwork" class="form-control form-control-sm" id="customFile"/><small class="form-text text-muted">Album artwork must be at least <b>3000</b> by <b>3000</b> pixels in size and in the <b>.JPG</b> format.</small>
                                                    </div>
                                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                        <img class=" card-img " src="<?php echo $release_artwork; ?>" alt="Create New Release" style="">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                        <h3 class="">Artist Details</h3>
                                                        <h5 class="form-text text-muted">Ensure artist data is correct to allow proper placement on DSPs.</h5>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <label class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 form-label"><?php echo $release_artist; ?>:</label>
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                                    <input class="multisteps-form__input form-control form-control-sm" id="release_artist_name_first" name="release_artist_name_first" readonly  type="text" placeholder="" value="<?php echo $this->session->artist_account_name_first;?>"><br>

                                                        <input <?php echo $readonly;?> class="multisteps-form__input form-control form-control-sm" id="release_artist_apple" name="release_artist_apple"  type="text" placeholder="<?php echo $release_artist; ?>'s Apple Music Page" value=""><br>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                                        <input class="multisteps-form__input form-control form-control-sm" id="release_artist_name_last" name="release_artist_name_last" readonly  type="text" placeholder="" value="<?php echo $this->session->artist_account_name_last;?>"><br>

                                                        <input <?php echo $readonly;?> class="multisteps-form__input form-control form-control-sm" id="release_artist_spotify" name="release_artist_spotify"  type="text" placeholder="<?php echo $release_artist; ?>'s Spotify Page" value=""><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                                                    <button <?php echo $disabled;?> class="btn btn-outline-primary btn-sm" style="background-color:">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <?php echo form_close();?>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="">
                                <div class="card">
                                    <div class="card-header card-heading bg-secondary">
                                        <div class="row">
                                            <h3 style="color:white;">Track Manager</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a class data-bs-toggle="modal" data-bs-target="#editSong">
                                            <div class="row">
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                            <h5 class="text-muted">1. </h5>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                                            <h5 class="">Song Title</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-12 d-flex align-items-center justify-content-center">
                                            <a class="" data-bs-toggle="modal" data-bs-target="#addSong" <?php echo $hidden;?> href="#"><button href="#" class="btn btn-primary btn-sm" style="background-color:">Add Track</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="reviewModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Release Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                <img class="card-img" src="<?php echo $release_artwork; ?>" alt="Create New Release" style="width:70%; box-shadow:0 0 30px;"><br><br>
                <p style="font-size:18px; font-weight:500;"><?php echo $release_title;?></p>
                <p style="font-size:15px; font-weight:300; color:#f9233b; margin-top: -14px;"><?php echo $release_artist;?></p>
                <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -14px; text-transform: uppercase"><?php echo $release_genre;?> • 2022</p>
                <div class="row">
                    <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                        <button type="button" class="btn" style="background-color:#ebecf0; color:f9233b; padding:10px; border-radius: 9px; width:175px;"><i class="fas fa-play"></i>&nbsp;&nbsp; Play</button>

                    </div>
                    <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6">
                        <button type="button" class="btn" style="background-color:#ebecf0; color:f9233b; padding:10px; border-radius: 9px; width:175px;"><i class="fas fa-random"></i>&nbsp;&nbsp; Shuffle</button>

                    </div>
                </div>
                </center>
                <hr>
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; 1</p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p style="text-align:left; font-size:14px; font-weight:400; color:#black; margin-top: 0px; margin-bottom: 14px">This is my song
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; 2</p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p style="text-align:left; font-size:14px; font-weight:400; color:#black; margin-top: 0px; margin-bottom: 14px">This is my second song
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; 3</p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p style="text-align:left; font-size:14px; font-weight:400; color:#black; margin-top: 0px; margin-bottom: 14px">This is my third song
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; 4</p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p style="text-align:left; font-size:14px; font-weight:400; color:#black; margin-top: 0px; margin-bottom: 14px">This is my final song
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -5px; text-transform: uppercase">March 14, 2022</p>
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -14px; text-transform: uppercase">4 songs, 35 minutes</p>
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -14px; text-transform: uppercase">℗ 2022 Nova Music Publishing</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Request Review Modal -->

<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Once you submit a request for review, your release will be locked
        until the review has been finalized.
        From there, you'll receive a message regarding your review.
        Please note: we perform reviews in the order they were accepted.
        This process can take up to 5 days.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="../request_review/<?php echo $release_id;?>" class="btn btn-primary">Send Request</a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteRelease" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-weight: 900; color: #333;" id="deleteRelease">Deletion Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Deleting your release is irreversable. Are you sure you wish to proceed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Cancel</button>
        <a href="../delete_release/<?php echo $release_id;?>" class="btn btn-danger btn-md">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

<!-- Add Song Modal -->
<div class="modal fade" id="addSong" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-weight: 900; color: #333;" id="addSong">Add Track</h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-label">Track Title</label>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <input class="multisteps-form__input form-control form-control-sm" id="song_title" name="song_title" type="text" value="">
            </div>
        </div><br>
        <div class="row">
            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-label">Explicit Content</label>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <select name="release_genre" class="form-control form-control-sm">
                    <option selected value="Select..." disabled>Select...</option>
                    <option value="Explicit">Explicit</option>
                    <option value="Clean">Clean</option>
                </select>
            </div>
        </div><br>
        <div class="row">
            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-label">Music File</label>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <input type="file" name="song_file" class="form-control form-control-sm" id="song_file"/>
            <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> A 16-bit WAV file is required for upload.</small>

            </div>
        </div><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Back</button>
        <a href="#" class="btn btn-primary btn-md">Create Track</a>
      </div>
    </div>
  </div>
</div>
<!-- End Add Song Modal -->
    </body>
    <script>
    var element = document.getElementById("release_date");
    if (element) {
        var maskOptions = {
            mask: "00/00/0000",
        };
        var mask = IMask(element, maskOptions);
    }
</script>
</html>
