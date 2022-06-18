
<!DOCTYPE html>
<html>
    <head>
        <title>Nova Music | Dashboard</title>
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
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <div class="page-header">
                    <h1 class="page-heading">Lyrics</h1>
                    <p>Create and assign lyrics to your songs with ease.</p>
                    <small class="form-text text-muted"><i class="fas fa-check-circle" style="color:orange"></i> Lyrics must follow the Apple Music format. <a href="https://artists.apple.com/support/1111-lyrics-guidelines">Click here to learn more.</a></small>
                </div>
                <form method="POST" action="search_releases">
                    <div class="input-group">
                        <input name="search" style=" height: 50px; border: 1;" class="form-control" type="text" placeholder="Search Lyrics">
                        <button class="btn btn-outline-primary ladda-button ladda-button-progress" data-style="slide-right" type="submit"><span class="ladda-label"><i class="fa fa-search"></i></span></button>
                    </div>
                </form><br>
                <a href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" style="display:flex;">
                                    <i class="fas fa-pen" style="margin: auto; font-size:20px; "></i>
                                </div>
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
                                    <h4 class="card-title "><b>Lyric Title</b></h4>
                                    <h6 class="card-subtitle "><small class="form-text text-muted"> Created by  <?php echo $this->session->artist_account_name_artist;?> on DATE </small></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

    </body>
</html>
