<!DOCTYPE html>
<html>

<head>
    <title>Nova Music | Update Account</title>
</head>

<body>
        <div class="page-holder bg-gray-100">
            <div class="container-fluid px-lg-4 px-xl-5">
                <!-- Breadcrumbs -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                        <li class="breadcrumb-item active">Edit Account</li>
                    </ul>
                </div>
                <!-- Page Header-->
                <div class="page-header">
                    <h1 class="page-heading">Account</h1>
                    <p></p>
                </div>

                <section>
                    <div class="row">
                        <div class="col-lg-12 card mb-4">
                          <?php echo form_open();?>
                            <!--<form class="card mb-4" method="POST">-->
                                <div class="card-header">
                                    <h4 class="card-heading">Edit Account</h4>
                                    <?php
                                    if(isset($update_err)){
                                        echo $update_err;
                                    }
                                    else if(isset($update_success)){
                                        echo $update_success;
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" readonly placeholder="John" value="<?php echo $this->session->artist_account_name_first;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" readonly placeholder="Doe" value="<?php echo $this->session->artist_account_name_last;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Artist Name</label>
                                                <input class="form-control" type="text" placeholder="Lil Uzi Vert" readonly value="<?php echo $this->session->artist_account_name_artist;?>">
                                                <p class="m-3 text-primary"><i class="fas fa-exclamation-circle" style="color:orange"></i> You cannot change your first name, last name, or artist name. For more info, please contact support.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" name="artist_account_email" placeholder="johndoe@gmail.com" value="<?php echo $this->session->artist_account_email;?>">
                                               <small class="text-danger"><?php echo form_error('artist_account_email'); ?></small>
                                            </div>
                                        </div>
                                    </div><br><br>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-4">
                                                <label class="form-label">Street</label>
                                                <input class="form-control" name="artist_account_address_street" type="text" placeholder="123 Anywhere Street" value="<?php echo $this->session->artist_account_address_street;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Unit</label>
                                                <input class="form-control" name="artist_account_address_unit" type="text" placeholder="APT 1" value="<?php echo $this->session->artist_account_address_unit;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">City</label>
                                                <input class="form-control" name="artist_account_address_city" type="text" placeholder="Vice City" value="<?php echo $this->session->artist_account_address_city;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label">State</label>
                                                <select class="form-control custom-select" name="artist_account_address_state">
                                                  <option selected disabled value="<?php if(!isset($this->session->artist_account_address_state)){echo '';} else{ echo $this->session->artist_account_address_state;}?>"><?php if(!isset($this->session->artist_account_address_state)){echo 'Select State';} else{ set_select('artist_account_address_state', $this->session->artist_account_address_state); echo $this->session->artist_account_address_state;}?></option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District Of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label">ZIP</label>
                                                <input class="form-control" type="text" name="artist_account_address_zip" placeholder="12345" value="<?php echo $this->session->artist_account_address_zip;?>">
                                                <small class="text-danger"><?php echo form_error('artist_account_address_zip'); ?></small>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update Account</button>
                                </div>
                                <?php echo form_close();?>
                            <!--</form>-->
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-lg-12 card mb-4">
                          <?php echo form_open('./Dash/update_pwd');?>
                          <!--  <form class="card mb-4" method="POST" action="update_pwd"> -->
                                <div class="card-header">
                                    <h4 class="card-heading">Update Password</h4>
                                    <?php
                                    // Display any error/success messages
                                    echo $this->session->flashdata('form_err');
                                    echo $this->session->flashdata('incorrect_pwd');
                                    echo $this->session->flashdata('update_failed');
                                    echo $this->session->flashdata('update_success');
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Current Password</label>
                                                <input class="form-control" name="curr_pwd" type="password" placeholder="*******">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">New Password</label>
                                                <input class="form-control" name="artist_account_password" type="password" placeholder="New Password" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Retye New Password</label>
                                                <input class="form-control" name="confirm_pwd" type="password" placeholder="Retype Password">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update Password</button>
                                </div>
                                <?php echo form_close();?>
                          <!--  </form> -->
                        </div>
                    </div>
                </section>

            </div>

</body>
<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="<?php echo base_url();?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>js/all.js"></script>
<script src="<?php echo base_url();?>js/all.min.js"></script>
<script src="<?php echo base_url();?>js/brands.js"></script>
<script src="<?php echo base_url();?>js/conflict-detection.js"></script>
<script src="<?php echo base_url();?>js/conflict-detection.min.js"></script>
<script src="<?php echo base_url();?>js/fontawesome.js"></script>
<script src="<?php echo base_url();?>js/fontawesome.min.js"></script>
<script src="<?php echo base_url();?>js/regular.js"></script>
<script src="<?php echo base_url();?>js/regular.min.js"></script>
<script src="<?php echo base_url();?>js/solid.js"></script>
<script src="<?php echo base_url();?>js/solid.min.js"></script>
<script src="<?php echo base_url();?>js/v4-shims.js"></script>
<script src="<?php echo base_url();?>js/v4.shims.min.js"></script>
<script src="<?php echo base_url();?>js/charts-defaults.js"></script>
<script src="<?php echo base_url();?>js/charts-home.js"></script>
<script src="<?php echo base_url();?>js/theme.js"></script>
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
</html>
