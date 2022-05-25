<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | Employee Portal</title>
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
          <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary">
                  <h1 class="mb-4">Nova <br class="d-none d-lg-inline"> Music</h1>
                  <p class="lead text-muted">Employee Portal</p>
                </div>
          <div class="col-lg-6 px-lg-4">
            <div class="card">
              <div class="card-header px-lg-5">
                <div class="card-heading text-primary">Nova Music | Team</div>
              </div>
              <div class="card-body p-lg-5">
              <?php
              echo $this->session->flashdata('acct_create_success');
              echo $this->session->flashdata('success');
              ?>
                <h3 class="mb-4">Log In</h3>
                <?php if (isset($artistExistsFalse)){echo $artistExistsFalse;}
                else {if (isset($incorrectPassword)){echo $incorrectPassword;}}
                ?>
                <p class="text-muted text-sm mb-5">This is a secured, private computer system owned by East Rock Entertainment. All Information contained on this system is deemed to be PRIVATE, PROPRIETARY, CONFIDENTIAL and the property of East Rock Entertainment., its affiliates, divisions or subsidiaries. Unauthorized access or use is strictly prohibited. Any use of East Rock resources must be in compliance with East Rock policies. By using myCloud, you agree to comply with East Rock policies. Any unauthorized access to or use of East Rock Resources may be punishable in a court of law and may include termination of employment or contract with East Rock Entertainment.</p>
                <?php
                if(isset($no_admin)){
                  echo $no_admin;
                }
                else if(isset($login_failed)){
                  echo $login_failed;
                }
                 ?>
                <?php echo form_open();?>

                  <div class="form-floating mb-3">
                    <input class="form-control"  name="email" type="text" placeholder="johndoe@anymail.net" value="<?php echo set_value('artist_account_email')?>">
                    <small class="text-danger"><?php echo form_error('email')?></small>
                    <label>Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" name="pwd" type="password" placeholder="Password">
                    <small class="text-danger"><?php echo form_error('pwd')?></small>
                    <label>Password</label>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" id="register" type="submit" name="registerSubmit">Log In</button>
                 <br><br>
                 <a class="link-primary" href="reset_pwd">Forgot your password?</a>
                  </div>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
  <!--  <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary">
            <h1 class="mb-4">The future of <br class="d-none d-lg-inline">music distribution</h1>
            <p class="lead text-muted">Welcome back! We're excited to see what you're going to do.</p>
          </div> -->
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
