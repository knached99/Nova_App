<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | Login</title>
    <meta name="description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="author" content="Sean O'Hara">
    <meta name="og:title" property="og:title" content="Nova Music - Your Music, Your Way.">
    <meta property="og:image" content="<?php echo base_url();?>img/novaog.png" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity." />
    <meta property="og:url" content="https://novamusic.app" />
    <meta name="twitter:title" content="Nova Music">
    <meta name="twitter:description" content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
    <meta name="twitter:creator" content="eastrockent">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>img/favicon/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>img/favicon/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>img/favicon/favicon-16x16.png?v=2">
    <link rel="manifest" href="<?php echo base_url();?>img/favicon/site.webmanifest?v=2">
    <link rel="mask-icon" href="<?php echo base_url();?>img/favicon/safari-pinned-tab.svg?v=2" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon/favicon.ico?v=2">
    <meta name="apple-mobile-web-app-title" content="Nova Music">
    <meta name="application-name" content="Nova Music">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo base_url();?>img/favicon/browserconfig.xml?v=2">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/themes/prism-okaidia.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
  </head>
  <body>
    <div class="page-holder align-items-center py-4 bg-gray-100 vh-100">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 px-lg-4">
            <div class="card">
              <div class="card-header px-lg-5">
                <div class="card-heading text-primary">Nova Music</div>
              </div>
              <div class="card-body p-lg-5">
                <h3 class="mb-4">Verify two-factor authentication</h3>
                <?php
                
                if(isset($incorrect_code)){
                    echo $incorrect_code;
                }
                echo $this->session->flashdata('msg');
                ?>
                <p class="text-muted text-sm mb-5">Please check your email for the verification code</p>
                <?php
                echo form_open();
                ?>
                  <div class="form-floating mb-3">
                    <input class="form-control" name="code" type="text">
                    <small class="text-danger"><?php echo form_error('code')?></small>
                    <label for="email">Verification Code</label>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary" id="register" type="submit">Verify Code</button>
                  </div>
                <?php
                echo form_close();
                ?>
              </div>

            </div>
          </div>
          <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"><img class="img-fluid mb-4" width="300" src="img/drawkit-illustration.svg" alt="" style="transform: rotate(10deg)">
            <h1 class="mb-4">The future of <br class="d-none d-lg-inline">music distribution</h1>
            <p class="lead text-muted">We're excited to see what you're going to do, but before we move on, we need you to verify your account</p>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- Main Theme JS File-->
    <script src="<?php echo base_url();?>js/theme.js"></script>
    <!-- Prism for syntax highlighting-->
    <script src="<?php echo base_url();?>vendor/prismjs/prism.js"></script>
    <script src="<?php echo base_url();?>vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="<?php echo base_url();?>vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script type="text/javascript">
      // Optional
      Prism.plugins.NormalizeWhitespace.setDefaults({
      'remove-trailing': true,
      'remove-indent': true,
      'left-trim': true,
      'right-trim': true,
      });

    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
