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
  case 'Released':
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

            @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap');

html {
  
    box-sizing: border-box ;
    --parent-height : 20em ;
    --duration: 1s ;
    --duration-text-wrap: 12s 1.5s cubic-bezier(0.82, 0.82, 1, 1.01) ;
    --cubic-header: var(--duration) cubic-bezier(0.71, 0.21, 0.3, 0.95) ;
    --cubic-slider : var(--duration) cubic-bezier(0.4, 0, 0.2, 1) ;
    --cubic-play-list : .35s var(--duration) cubic-bezier(0, 0.85, 0.11, 1.64) ;
    --cubic-slider-context : cubic-bezier(1, -0.01, 1, 1.01) ;
    
}

html *,
html *::before,
html *::after {

    box-sizing: inherit ;
    scrollbar-width: none ;
  
}


/*body{
  
    margin: 0 ;
    height: 100vh ;
    display: flex ;
    user-select: none ;
    align-items: center ;
    justify-content: center ;
    background-color: #e5e7e9 ;
    font-family: 'Quicksand', sans-serif ;
    -webkit-tap-highlight-color: transparent ;
    transition: background-color  var(--cubic-slider) ;

}  */

.img {

    width: 100% ;
    flex-shrink: 0;
    display: block ;
    object-fit: cover ;

}

.list {

    margin: 0 ;
    padding: 0 ;
    list-style-type: none ;

}

.flex {

    display: flex ;
    align-items: center ;
    justify-content: space-between ;

}

.uppercase{
  
    text-transform: uppercase ;
  
}

.player {

    width: 17.15em ;
    display: flex ;
    overflow: hidden ;
    font-size: 1.22em ;
    border-radius: 1.35em ;
    flex-direction: column ;
    background-color: white ;
    height: var(--parent-height) ;

}

.player__header {

    z-index: 1 ;
    gap: 0 .4em ;
    width: 100% ;
    display: flex;
    height: 5.85em ;
    flex-shrink: 0 ;
    position: relative;
    align-items: flex-start ;
    border-radius: inherit ;
    justify-content: flex-end ;
    background-color: white  ;
    padding: .95em 0.6em 0 1.2em ;
    box-shadow: 0 2px 6px 1px #0000001f ;
    transition: height var(--cubic-header), box-shadow var(--duration), padding var(--duration) ease-in-out ;

}

.player__header.open-header {

    height: 100% ;
    padding-left: 0 ;
    padding-right: 0 ;
    box-shadow: unset ;

}

.player__img {

    width: 3.22em ;
    height: 3.22em ;
    border-radius: 1.32em ;

}

.player__img--absolute {
  
    top: 1.4em ;
    left: 1.2em ;
    position: absolute ;
    
}

.slider {

    flex-shrink: 0 ;
    overflow: hidden ;
    transition: width var(--cubic-header), height var(--cubic-header), top var(--cubic-header), left var(--cubic-header);
    
}

.slider.open-slider{

    top: 0 ;
    left: 0 ;
    width: 100% ;
    height: 14.6em ;

}

.slider__content {

    display: flex ;
    height: 100% ;
    will-change : transform ;
    transition: transform var(--cubic-slider);

}

.slider__img {

    filter: brightness(75%) ;

}

.slider__name, 
.slider__title {
  
    overflow: hidden ;
    white-space: nowrap ;

}

.text-wrap {

    display: block ;
    white-space: pre ;
    width: fit-content ;
    animation: text-wrap var(--duration-text-wrap) infinite ;

}

@keyframes text-wrap {

    75%{
      
        transform: translate3d(-51.5%, 0, 0) ;
      
    }

    100%{
      
        transform: translate3d(-51.5%, 0, 0) ;

    }
    
}

.player__button {

    all: unset ;
    z-index: 100 ;
    width: 2.5em ;
    height: 2.5em ;
    cursor: pointer ;

}

.playlist {

    transform: scale(0) ;
    transition: transform calc(var(--duration) / 2) ;
    
}

.slider.open-slider .playlist {

    transform: scale(1) ;
    transition: transform var(--cubic-play-list) ;


}

.player__button--absolute--nw {

    top: 5.5% ;
    left: 5.5% ;
    position: absolute ;
    
}

.player__button--absolute--center {
    
    top: 0 ;
    left: 0 ;
    right: 0 ;
    bottom: 0 ;
    margin: auto ;
    position: absolute ;

}

img[alt ="pause-icon"] {

    display: none ;
    
}

.player__controls {

    width: 77% ;
    gap: .5em 0 ;
    display: flex ;
    flex-wrap: wrap ;
    align-items: center ;
    will-change: contents ;
    align-content: center ;
    justify-content: center ;
    transition: transform var(--cubic-header) , width var(--cubic-header) ;

}

.player__controls.move {

    width: 88% ;
    transform: translate3d(-1.1em , calc(var(--parent-height) - 153%) , 0) ;
    
}

.player__context {

    margin: 0 ;
    width: 100% ;
    display: flex ;
    line-height: 1.8 ;
    flex-direction: column ;
    justify-content: center ;
    text-transform: capitalize ;

}

.slider__context {

    width: 56.28% ;
    cursor: pointer ;
    text-align: center ;
    padding-bottom: .2em ;
    will-change: contents ;
    transition: width var(--cubic-header) ;
    animation: calc(var(--duration) / 2) var(--cubic-slider-context) ;

}

@keyframes opacity {
   

    0% {

        opacity: 0 ;

    }

    90%{

        opacity: 1 ;

    }

}

.player__controls.move .slider__context{
    
    width: 49.48% ;

}

.player__title {

    font-size: .7em ;
    font-weight: bold ;
    color: #00000086 ;

}

.progres {

    width: 90% ;
    height: .25em ;
    cursor: pointer ;
    border-radius: 1em ;
    touch-action : none ;
    background-color: #e5e7ea ;
    transition: width var(--cubic-header) ;

}

.player__controls.move .progres{

    width: 98% ;
    
}

.progres__filled {

    width: 0% ;
    height: 100% ;
    display: flex ;
    position: relative ;
    align-items: center ;
    border-radius: inherit ;
    background-color: #78adfe ;
    
}

.progres__filled::before {

    right: 0 ;
    width: .35em ;
    content: " " ;
    height: .35em ;
    border-radius: 50% ;
    position: absolute ;
    background-color: #5781bd ;
    
}

.player__playlist {

    height: 100% ;
    overflow: auto ;   
    padding: 1.05em .9em 0 1.2em ; 

}

.player__playlist::-webkit-scrollbar {
    
    width: 0 ;

}

.player__song {

/*     gap: 0 .65em ; */
    display: flex ;
    cursor: pointer ;
    margin-bottom: .5em ;
    padding-bottom: .7em ;
    border-bottom: .1em solid #d8d8d859 ;

}

.player__song .player__context {

    line-height: 1.5 ;
    margin-left: .65em ;

}

.player__song-name {

    font-size: .88em ;

}

.player__song-time {

    font-size: .65em ;
    font-weight: bold ;
    color: #00000079 ; 
    height: fit-content ;
    align-self: flex-end ;

}

.audio {

    display: none !important ;

}



    </style>
    </head>
    <body>
        <div class="page-holder bg-gray-100 ">
            <div class="container-fluid px-lg-4 px-xl-5 ">
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../releases">Releases</a></li>
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
                        echo $this->session->flashdata('in_review');
                    ?>
                </div>
                <section>
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                          <?php echo form_open_multipart('../index.php/Dash/save_release/'.$release_id.'');?>
                          <!--  <form method="POST" action="../save_release/<?php echo $release_id;?>" > -->
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
                                                        <input type="file" <?php echo $disabled;?> name="release_artwork" class="form-control form-control-sm"/><small class="form-text text-muted">Album artwork must be at least <b>3000</b> by <b>3000</b> pixels in size and in the <b>.JPG</b> format.</small>
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
                        <!--</form> -->
                        <?php echo form_close();?>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="">
                                <div class="card" style="width:350px;">
                                    <div class="card-header card-heading bg-dark">
                                        <div class="row">
                                            <h3 style="color:white;">Track Manager</h3>
                                          
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--<a class data-bs-toggle="modal" data-bs-target="#editSong">
                                            <div class="row">
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                                             <?php echo $this->session->flashdata('track_upload_err');?>
                                                            <?php echo $this->session->flashdata('track_upload_success');?>
                                                            <?php echo $this->session->flashdata('song_deleted');?>
                                                            <?php echo $this->session->flashdata('delete_err');?>
                                                            <h5 class="text-muted"></h5>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> -->
                                      
 
 <div class="player">

<div class="player__header">

  <div class="player__img player__img--absolute slider">

    <button class="player__button player__button--absolute--nw playlist">

      <img src="http://physical-authority.surge.sh/imgs/icon/playlist.svg" alt="playlist-icon">

    </button>

    <button class="player__button player__button--absolute--center play">
     <!-- Temporary dynamic album cover solution -->
                                                       
      <img src="http://physical-authority.surge.sh/imgs/icon/play.svg" alt="play-icon">
      <img src="http://physical-authority.surge.sh/imgs/icon/pause.svg" alt="pause-icon">

    </button>

    <div class="slider__content">
        <!-- Need to make these images dynamic. These appear behind the play/pause button -->
        <?php 
    foreach($songs['data'] as $row){
        // This will dynamically display the release artwork for each song 
        echo '<img class="img slider__img" src='.$release_artwork.' alt="cover">';
    }
    ?>                                                         
      
    <!--  <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/2.jpg" alt="cover">
      <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/3.jpg" alt="cover">
      <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/4.jpg" alt="cover">
      <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/5.jpg" alt="cover">
      <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/6.jpg" alt="cover">
      <img class="img slider__img" src="http://physical-authority.surge.sh/imgs/7.jpg" alt="cover"> -->

    </div>

  </div>

  <div class="player__controls">

    <button class="player__button back">

      <img class="img" src="http://physical-authority.surge.sh/imgs/icon/back.svg" alt="back-icon">

    </button>
    
    <p class="player__context slider__context">

      <strong class="slider__name"></strong>
      <span class="player__title slider__title"></span>

    </p>

    <button class="player__button next">

      <img class="img" src="http://physical-authority.surge.sh/imgs/icon/next.svg" alt="next-icon">

    </button>

    <div class="progres">

      <div class="progres__filled"></div>

    </div>

  </div>

</div>

<ul class="player__playlist list">
    <?php 
    foreach($songs['data'] as $row){
        echo '
        <li class="player__song">

        <img class="player__img img" src="'.$release_artwork.'" alt="cover">
    
        <p class="player__context">
    
          <b class="player__song-name text-truncate">'.$row->song_title.'</b>
          <span class="flex">
          
            <span class="player__title">'.$this->session->artist_account_name_artist.'</span>
            <span class="player__song-time"></span>
          
          </span>
    
        </p>
    
        <audio class="audio" src='.$row->song_file.'></audio>
    
      </li>
        ';
    }
    ?>
      <!--'.form_open('../index.php/Dash/deleteSong/'.$row->song_id.''.$row->song_file.'/'.$release_id.'').'
            <button class="btn btn-sm text-white" style="background-color:#ff3b65;">Delete</button>
            '.form_close().' -->


 
</ul>

</div>

                                    </div> 
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-12 d-flex align-items-center justify-content-center">
                                            <a class="" data-bs-toggle="modal" data-bs-target="#addSong" <?php echo $hidden;?> href="#"><button href="#" class="btn btn-primary btn-md">Add Track</button></a>
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
                <?php 
                if(empty($songs['data'])){
                    echo '  <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; </p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p class="text-danger fw-normal" style="text-align:left; font-size:14px; font-weight:400; margin-top: 0px; margin-bottom: 14px">No Songs Yet
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>';
                }
                else{
                foreach($songs['data'] as $row){
                    echo '
                    <div class="row">
                    <div class="col-md-1 col-sm-1 col-1">
                        <p style="font-size:14px; font-weight:600; color:#949494; margin-top: 0px; margin-bottom: 14px; ">&nbsp; 1</p>
                    </div>
                    <div class="col-md-11 col-sm-11 col-11">
                        <p style="text-align:left; font-size:14px; font-weight:400; color:#black; margin-top: 0px; margin-bottom: 14px">'.$row->song_title.'
                        <span style="float:right;"><i class="fas fa-ellipsis-h" style="color:black"></i></span>
                        </p>
                        <hr>
                    </div>
                </div>
                    ';
                }
            }
                ?>
           
          
         
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -5px; text-transform: uppercase"><?php echo $release_date;?></p>
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -14px; text-transform: uppercase"><?php echo count($songs['data']);?> Songs - album length</p>
                        <p style="font-size:11px; font-weight:500; color:#949494; margin-top: -14px; text-transform: uppercase">℗ <?php echo DATE('Y'); ?> Nova Music Publishing</p>
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
        <?php 
            echo form_open('../index.php/Dash/delete_release/'.$release_id.'');
        ?>
        <button type="submit" class="btn btn-danger btn-md">Delete</button>
        <!--<a href="../delete_release/<?php echo $release_id;?>" class="btn btn-danger btn-md" >Delete</a> --> 
        <?php echo form_close();?>
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
        <?php 
                                            if(isset($validation_errs)){
                                                echo $validation_errs;
                                            }
                                            ?>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('../index.php/Dash/addSong/'.$release_id.'');?>
        <div class="row">
            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-label">Track Title</label>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <input class="multisteps-form__input form-control form-control-sm" id="song_title" name="song_title" type="text" value="">
            </div>
        </div><br>
        <div class="row">
            <label class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 form-label">Explicit Content</label>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <select name="song_rating" class="form-control form-control-sm">
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
        <button type="submit" class="btn btn-primary btn-md">Create Track</button>
        <?php echo form_close();?>
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

<script>
    // Designed by:  Mauricio Bucardo
// Original image: https://dribbble.com/shots/6957353-Music-Player-Widget

"use strict";

// add elemnts
const bgBody = ["#ffffff"];
const body = document.body;
const player = document.querySelector(".player");
const playerHeader = player.querySelector(".player__header");
const playerControls = player.querySelector(".player__controls");
const playerPlayList = player.querySelectorAll(".player__song");
const playerSongs = player.querySelectorAll(".audio");
const playButton = player.querySelector(".play");
const nextButton = player.querySelector(".next");
const backButton = player.querySelector(".back");
const playlistButton = player.querySelector(".playlist");
const slider = player.querySelector(".slider");
const sliderContext = player.querySelector(".slider__context");
const sliderName = sliderContext.querySelector(".slider__name");
const sliderTitle = sliderContext.querySelector(".slider__title");
const sliderContent = slider.querySelector(".slider__content");
const sliderContentLength = playerPlayList.length - 1;
const sliderWidth = 100;
let left = 0;
let count = 0;
let song = playerSongs[count];
let isPlay = false;
const pauseIcon = playButton.querySelector("img[alt = 'pause-icon']");
const playIcon = playButton.querySelector("img[alt = 'play-icon']");
const progres = player.querySelector(".progres");
const progresFilled = progres.querySelector(".progres__filled");
let isMove = false;

// creat functions
function openPlayer() {

    playerHeader.classList.add("open-header");
    playerControls.classList.add("move");
    slider.classList.add("open-slider");
    
}

function closePlayer() {

    playerHeader.classList.remove("open-header");
    playerControls.classList.remove("move");
    slider.classList.remove("open-slider");
    
}

function next(index) {
    
    count = index || count;

    if (count == sliderContentLength) {
        count = count;
        return;
    }

    left = (count + 1) * sliderWidth;
    left = Math.min(left, (sliderContentLength) * sliderWidth);
    sliderContent.style.transform = `translate3d(-${left}%, 0, 0)`;
    count++;
    run();

}

function back(index) {
    
    count = index || count;

    if (count == 0) {
        count = count;
        return;
    }
    
    left = (count - 1) * sliderWidth;
    left = Math.max(0, left);
    sliderContent.style.transform = `translate3d(-${left}%, 0, 0)`;
    count--;
    run();

}

function changeSliderContext() {

    sliderContext.style.animationName = "opacity";
    
    sliderName.textContent = playerPlayList[count].querySelector(".player__title").textContent;
    sliderTitle.textContent = playerPlayList[count].querySelector(".player__song-name").textContent;
    
    if (sliderName.textContent.length > 16) {
        const textWrap = document.createElement("span");
        textWrap.className = "text-wrap";
        textWrap.innerHTML = sliderName.textContent + "   " + sliderName.textContent;  
        sliderName.innerHTML = "";
        sliderName.append(textWrap);
        
    }

    if (sliderTitle.textContent.length >= 18) {
        const textWrap = document.createElement("span");
        textWrap.className = "text-wrap";
        textWrap.innerHTML = sliderTitle.textContent + "    " + sliderTitle.textContent;  
        sliderTitle.innerHTML = "";
        sliderTitle.append(textWrap);
    }

}

function changeBgBody() {
    body.style.backgroundColor = bgBody[count];
}

function selectSong() {

    song = playerSongs[count];

    for (const item of playerSongs) {

        if (item != song) {
            item.pause();
            item.currentTime = 0;
        }

    }

    if (isPlay) song.play();
    
    
}

function run() {
  
    changeSliderContext();
    changeBgBody();
    selectSong();
  
}

function playSong() {

    if (song.paused) {
        song.play();
        playIcon.style.display = "none";
        pauseIcon.style.display = "block";

    }else{
        song.pause();
        isPlay = false;
        playIcon.style.display = "";
        pauseIcon.style.display = "";
    }


}

function progresUpdate() {

    const progresFilledWidth = (this.currentTime / this.duration) * 100 + "%";
    progresFilled.style.width = progresFilledWidth;

    if (isPlay && this.duration == this.currentTime) {
        next();
    }
    if (count == sliderContentLength && song.currentTime == song.duration) {
        playIcon.style.display = "block";
        pauseIcon.style.display = "";
        isPlay = false;
    }
}

function scurb(e) {

    // If we use e.offsetX, we have trouble setting the song time, when the mousemove is running
    const currentTime = ( (e.clientX - progres.getBoundingClientRect().left) / progres.offsetWidth ) * song.duration;
    song.currentTime = currentTime;

}

function durationSongs() {

    let min = parseInt(this.duration / 60);
    if (min < 10) min = "0" + min;

    let sec = parseInt(this.duration % 60);
    if (sec < 10) sec = "0" + sec;
    
    const playerSongTime = `${min}:${sec}`;
    this.closest(".player__song").querySelector(".player__song-time").append(playerSongTime);

}


changeSliderContext();

// add events
sliderContext.addEventListener("click", openPlayer);
sliderContext.addEventListener("animationend", () => sliderContext.style.animationName ='');
playlistButton.addEventListener("click", closePlayer);

nextButton.addEventListener("click", () => {
    next(0)
});

backButton.addEventListener("click", () => {
    back(0)
});

playButton.addEventListener("click", () => {
    isPlay = true;
    playSong();
});

playerSongs.forEach(song => {
    song.addEventListener("loadeddata" , durationSongs);
    song.addEventListener("timeupdate" , progresUpdate);
    
});

progres.addEventListener("pointerdown", (e) => {
    scurb(e);
    isMove = true;
});

document.addEventListener("pointermove", (e) => {
    if (isMove) {
        scurb(e); 
        song.muted = true;
    }
});

document.addEventListener("pointerup", () => {
    isMove = false;
    song.muted = false;
});

playerPlayList.forEach((item, index) => {

    item.addEventListener("click", function() {

        if (index > count) {
            next(index - 1);
            return;
        }
        
        if (index < count) {
            back(index + 1);
            return;
        }

    });
    
});
    </script>
</html>
