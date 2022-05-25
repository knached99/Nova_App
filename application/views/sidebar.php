<?php

    switch(current_url()){
        case 'https://my.novamusicapp.com/':
            $active_my_dash = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/artist/' . $this->session->artist_id :
            $active_view_artist = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/wallet':
            $active_wallet = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/lyrics':
            $active_notebook = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/releases':
            $active_releases = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/createrelease':
            $active_release_create = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/analytics':
            $active_analytics = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/deals':
            $active_deals = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/engineering':
            $active_engineering = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/collaborations':
            $active_collaborations = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/opportunities':
            $active_opportunities = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/trending':
            $active_trending = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/artists':
            $active_artists = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/news':
            $active_news = 'active';
            $inactive = '';
            break;
        case 'https://my.novamusicapp.com/index.php/verificationprogram':
            $active_verificationprogram = 'active';
            $inactive = '';
            break;
        default:
        $inactive = '';
        break;
    }
?>
<div class="d-flex align-items-stretch bg-gray-100">
    <div class="sidebar py-3" id="sidebar">
        <h6 class="sidebar-heading">My Nova</h6>
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_my_dash)){ echo $active_my_dash;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#real-estate-1"> </use>
        </svg><span class="sidebar-link-title">Dashboard</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_view_artist)){ echo $active_view_artist;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/Dash/artist/<?php echo $this->session->artist_id;?>">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#person-1"> </use>
        </svg><span class="sidebar-link-title">Profile</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_wallet)){ echo $active_wallet;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/wallet">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#wallet-1"> </use>
        </svg><span class="sidebar-link-title">Wallet</span></a>
            </li>
        </ul>
        <h6 class="sidebar-heading">Music</h6>
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted " href="#" data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#song-5096"> </use>
        </svg><span class="sidebar-link-title">Releases </span></a>
                <ul class="sidebar-menu list-unstyled collapse " id="widgetsDropdown">
                    <li class="sidebar-list-item"><a class="sidebar-link text-muted <?php if(isset($active_release_create)){ echo $active_release_create;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/createrelease">Add New
            Release</a></li>
                    <li class="sidebar-list-item"><a class="sidebar-link text-muted <?php if(isset($active_releases)){ echo $active_releases;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/releases">View All Releases</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_notebook)){ echo $active_notebook;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/lyrics">
                    <svg class="svg-icon svg-icon-md me-3">
            <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#notebook-1"> </use>
          </svg><span class="sidebar-link-title">Lyrics</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_engineering)){ echo $active_engineering;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/engineering/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#record-1"> </use>
        </svg><span class="sidebar-link-title">Engineering</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_analytics)){ echo $active_analytics;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/analytics/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#analytics-1"> </use>
        </svg><span class="sidebar-link-title">Analytics</span></a>
            </li>
        </ul>
        <h6 class="sidebar-heading">Growth</h6>
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_deals)){ echo $active_deals;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/deals/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#moneybag-1"> </use>
        </svg><span class="sidebar-link-title">Deals</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_collaborations)){ echo $active_collaborations;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/collaborations/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#people-1"> </use>
        </svg><span class="sidebar-link-title">Collaborations</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_opportunities)){ echo $active_opportunities;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/opportunities/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#handshake-1"> </use>
        </svg><span class="sidebar-link-title">Opportunities</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted" href="https://www.eastrock.fm/playlists">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#playlist-1"> </use>
        </svg><span class="sidebar-link-title">Playlist Submission</span></a>
            </li>
        </ul>
        <h6 class="sidebar-heading">Community</h6>
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_trending)){ echo $active_trending;}  else{ echo $inactive;} ?>" href="/trending/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#stars-1"> </use>
        </svg><span class="sidebar-link-title">Trending</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_artists)){ echo $active_artists;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/artists">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#people-1"> </use>
        </svg><span class="sidebar-link-title">Artists</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_news)){ echo $news;}  else{ echo $inactive;} ?>" href="/news/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#alert-1"> </use>
        </svg><span class="sidebar-link-title">News</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted <?php if(isset($active_verificationprogram)){ echo $active_verificationprogram;}  else{ echo $inactive;} ?>" href="https://my.novamusicapp.com/index.php/verificationprogram/">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#check"> </use>
        </svg>
        <span class="sidebar-link-title">Verification Program</span></a>
            </li>
        </ul>
        <h6 class="sidebar-heading">Tools</h6>
        <ul class="list-unstyled">
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted" href="https://www.musicsplits.io">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#music-file-1"> </use>
        </svg><span class="sidebar-link-title">MusicSplits</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted" href="https://artists.apple.com">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#apple-1"> </use>
        </svg><span class="sidebar-link-title">Apple Music for Artists</span></a>
            </li>
            <li class="sidebar-list-item">
                <a class="sidebar-link text-muted" href="https://artists.spotify.com">
                    <svg class="svg-icon svg-icon-md me-3">
          <use xlink:href="<?php echo base_url();?>icons/orion-svg-sprite.svg#spotify-1"> </use>
        </svg><span class="sidebar-link-title">Spotify for Artists</span></a>
            </li>
        </ul>
    </div>
