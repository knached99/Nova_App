<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Music | Register</title>
    <meta name="description"
        content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="author" content="Sean O'Hara">
    <meta name="og:title" property="og:title" content="Nova Music - Your Music, Your Way.">
    <meta property="og:image" content="<?php echo base_url();?>img/novaog.png" />
    <meta property="og:type" content="website" />
    <meta property="og:description"
        content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity." />
    <meta property="og:url" content="https://novamusic.app" />
    <meta name="twitter:title" content="Nova Music">
    <meta name="twitter:description"
        content="Nova provides the record label experience with 0 commitments or contracts. Our subscription based platform provides artists an outlet for freedom and creativity.">
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendor/prismjs/themes/prism-okaidia.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">
    <style>
        /* The message box is shown when the user clicks on the password field */
        #msg {
            display: none;
            background: #fff;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #msg p {
            padding: 10px 35px;
            font-size: 14px;
            background-color: white;


        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: #5cb85c;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✅";

        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: #e96060;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "❌";
        }
    </style>
</head>

<body>
    <div class="page-holder align-items-center py-4 bg-gray-100 vh-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"><img class="img-fluid mb-4"
                        width="300" src="img/drawkit-illustration.svg" alt="" style="transform: rotate(10deg)">
                    <h1 class="mb-4">The future of <br class="d-none d-lg-inline">Music Distribution</h1>
                    <p class="lead text-muted">Join the Nova Music community and be a part of the most innovative distribution platform ever created.</p>
                </div>
                <div class="col-lg-6 px-lg-4">
                    <div class="card">
                        <div class="card-header px-lg-5">
                            <div class="card-heading text-primary">Nova Music</div>
                        </div>
                        <div class="card-body p-lg-5">
                            <h3 class="mb-4">Get started with Nova</h3><br>
                            <?php
                if (isset($regSuccess)){
                  echo $regSuccess;
                }

                else if (isset($regFailed)){
                  echo $regFailed;
                }

                else if(isset($email_err)){
                  echo $email_err;
                }
                ?>
                            <p class="text-muted text-sm mb-5">Let's get started with some basic information, than we'll build your artist profile.</p>
                            <?php echo form_open();?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="artist_account_name_artist" type="text"
                                                placeholder="Lil Jon Doe"
                                                value="<?php echo set_value('artist_account_name_artist')?>">
                                            <small class="text-danger">
                                                <?php echo form_error('artist_account_name_artist', '<i class="fas fa-times-circle"></i>')?>
                                            </small>
                                            <label for="artist_account_name_artist">Artist Name</label>
                                            <p class="m-3 text-primary"><i class="fas fa-exclamation-circle" style="color:orange"></i> Your display name on the stores. This cannot be changed.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="artist_account_name_first" type="text"
                                                placeholder="Jon"
                                                value="<?php echo set_value('artist_account_name_first')?>">
                                            <small class="text-danger">
                                                <?php echo form_error('artist_account_name_first','<i class="fas fa-times-circle"></i>')?>
                                            </small>
                                            <label for="artist_account_name_first">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="artist_account_name_last" type="text"
                                                placeholder="Doe"
                                                value="<?php echo set_value('artist_account_name_last')?>">
                                            <small class="text-danger">
                                                <?php echo form_error('artist_account_name_last','<i class="fas fa-times-circle"></i>')?>
                                            </small>
                                            <label for="artist_account_name_last">Last Name</label>
                                        </div>
                                    </div>
                                  </div>
                                    <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="artist_account_email" type="text"
                                                placeholder="johndoe@anymail.net"
                                                value="<?php echo set_value('artist_account_email')?>">
                                            <small class="text-danger">
                                                <?php echo form_error('artist_account_email','<i class="fas fa-times-circle"></i>')?>
                                            </small>
                                            <label for="artist_account_email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="artist_account_password" type="password" id="pwd"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" value="<?php echo set_value('artist_account_password');?>">

                                    <small class="text-danger">
                                        <?php echo form_error('artist_account_password','<i class="fas fa-times-circle"></i>')?>
                                    </small>
                                    <div id="msg">
                                        <h6 class="fw-normal">Your password must contain the following:</h6>
                                        <hr style="background-color: #4650dd !important">
                                        <p id="letter" class="fw-normal invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="fw-normal invalid">A <b>capital (uppercase)</b> letter
                                        </p>
                                        <p id="number" class="fw-normal  invalid">A <b>number</b></p>
                                        <p id="length" class="fw-normal  invalid">Minimum <b>8 characters</b></p>
                                        <p id="special" class="fw-normal  invalid">special character like <b>?</b> or
                                            <b>!</b></p>
                                    </div>
                                    <input type="checkbox" class="m-2" onclick="showpwd()"> <b
                                        class="fw-normal text-primary" id="text">Show Password</b>

                                    <label for="artist_account_password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="artist_account_password_confirm" id="pwdConfirm"
                                        type="password" placeholder="Confirm Password" value="<?php echo set_value('artist_account_password_confirm');?>">
                                    <small class="text-danger">
                                        <?php echo form_error('artist_account_password_confirm','<i class="fas fa-times-circle"></i>')?>
                                    </small>
                                    <label for="artist_account_password_confirm">Confirm Password</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox"
                                        name="artist_account_terms_agreement" value="1" <?php echo
                                        set_checkbox('artist_account_terms_agreement', '1' );?> id="agree">

                                    <label class="form-check-label" for="agree">I agree with the
                                        <!--<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

                                        Terms & Conditions
                                        </button>--> <a href="terms">Terms & Conditions</a>
                                        <small class="text-danger"><br>
                                            <?php echo form_error('artist_account_terms_agreement','<i class="fas fa-times-circle"></i>');?>
                                        </small>

                                    </label>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" id="register" type="submit"
                                        name="registerSubmit">Register</button>
                                </div>
                            <?php echo form_close();?>
                        </div>
                        <div class="card-footer px-lg-5 py-lg-4">
                            <div class="text-sm text-muted">Already have an account? <a
                                    href="../Login/signin">Login</a>.</div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"><img class="img-fluid mb-4" width="300" src="img/drawkit-illustration.svg" alt="" style="transform: rotate(10deg)">
            <h1 class="mb-4">The future of <br class="d-none d-lg-inline">music distribution</h1>
            <p class="lead text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed in</p>
          </div> -->
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-dialog-scrollable" id="staticBackdrop" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Terms & Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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
    <script
        src="<?php echo base_url();?>vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="<?php echo base_url();?>vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script
        src="<?php echo base_url();?>vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script type="text/javascript">
        // Optional
        Prism.plugins.NormalizeWhitespace.setDefaults({
            'remove-trailing': true,
            'remove-indent': true,
            'left-trim': true,
            'right-trim': true,
        });

    </script>

    <script>
        // Password validation as the user types
        var myInput = document.getElementById("pwd");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var special = document.getElementById("special");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("msg").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function () {
            document.getElementById("msg").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate special characters
            var specialChars = /[\!\@\#\$\%\^\&\*\)\(\+\=\.\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-\?]/g;
            if (myInput.value.match(specialChars)) {
                special.classList.remove("invalid");
                special.classList.add("valid");
            } else {
                special.classList.remove("valid");
                special.classList.add("invalid");
            }
            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>

    <script>
        // toggle password visibilty
        function showpwd() {
            let x = document.getElementById("pwd");
            let y = document.getElementById('pwdConfirm');
            let text = document.getElementById('text');
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                text.innerHTML = "Hide Password";
            } else {
                x.type = "password";
                y.type = "password";
                text.innerHTML = "Show Password";
            }
        }
    </script>

    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
