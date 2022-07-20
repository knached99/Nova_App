<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
public function signin(){
    $this->load->library('form_validation');
    $this->load->library('user_agent');
    $this->load->helper('url');
    $this->load->model('Artist_Model');
    $this->form_validation->set_rules('artist_account_email','Email','required|trim|valid_email', array('required' => 'Please enter a vaild email.'));
    $this->form_validation->set_rules('artist_account_password', 'Password', 'required|trim', array('required' => 'Please enter a secure password.'));
    $this->form_validation->set_message('exists', 'This email is not associated with an account.');
    if ($this->form_validation->run()==FALSE){
      $this->load->view('login/login');
    }
else {
    $exists=$this->Artist_Model->exists($this->input->post('artist_account_email'));
if ($exists==FALSE){
    $data['artistExistsFalse']="
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Account Doesn't Exist</strong> An account with this email does not exist.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    $this->load->view('login/login', $data);
}
else {
$authenticate=$this->Artist_Model->verify($this->input->post('artist_account_email'),$this->input->post('artist_account_password'));
if ($authenticate==FALSE){

    $data['incorrectPassword']="
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Incorrect Password</strong> The password you entered is incorrect.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  $this->load->view('login/login', $data);
}
else if($authenticate->artist_account_verified == 0){
  $not_verified ='<div class="alert alert-warning">You have not yet verified your account</div>';
  $this->session->set_flashdata('acctn_ot_verified',$not_verified);
  redirect('../index.php/Register/verify_code/'.$this->input->post('artist_account_email').'');
}

// If user logging in is not an authorized device, 
// verify with 2FA 
// Need to also verify device being used, not just by IP Address 

/* else if($trusted_device->ip_addr !== $_SERVER['REMOTE_ADDR']){
    $data['unauthorized_device']="
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    The device logging in isn't a trusted device
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    <a href='authorize_device/".$this->input->post('artist_account_email')."'>Verify New Device</a>
  </div>";
  $this->load->view('login', $data);
}*/
else {
$artist_data = array(
    'artist_id'=>$authenticate->artist_id,
    'artist_account_name_artist'=> $authenticate->artist_account_name_artist,
    'artist_account_name_first'=>$authenticate->artist_account_name_first,
    'artist_account_name_last'=>$authenticate->artist_account_name_last,
    'artist_account_email'=>$authenticate->artist_account_email,
    'artist_social_website'=>$authenticate->artist_social_website,
    'artist_social_instagram'=>$authenticate->artist_social_instagram,
    'artist_social_facebook'=>$authenticate->artist_social_facebook,
    'artist_social_twitter'=>$authenticate->artist_social_twitter,
    'artist_social_soundcloud'=>$authenticate->artist_social_soundcloud,
    'artist_social_genre'=>$authenticate->artist_social_genre,
    'artist_social_biography'=>$authenticate->artist_social_biography,
    'artist_social_public_location'=>$authenticate->artist_social_public_location,
    'artist_social_picture'=>$authenticate->artist_social_picture,
    'artist_account_address_street'=>$authenticate->artist_account_address_street,
    'artist_account_address_unit'=>$authenticate->artist_account_address_unit,
    'artist_account_address_city'=>$authenticate->artist_account_address_city,
    'artist_account_address_state'=>$authenticate->artist_account_address_state,
    'artist_account_address_zip'=>$authenticate->artist_account_address_zip,
    'two_factor_auth_enabled'=>$authenticate->two_factor_auth_enabled
   );
   $twofa_devices = $this->Artist_Model->get_2fa_device($authenticate->artist_id);
if($authenticate->two_factor_auth_enabled == 1 && $twofa_devices == NULL){
     // Generate 2fa code 
     $code = mt_rand(111111, 999999); 
     // Update DB with new auth code
     $send_auth = $this->Artist_Model->send_auth_code($authenticate->artist_id, $code);
     $email_auth = $this->__email_auth($this->input->post('artist_account_email'), $code);
     if($send_auth && $email_auth){
         $msg = '<div class="alert alert-info">We sent your 2fa code to '.$this->input->post('artist_account_email').'</div>';
         $this->session->set_flashdata('msg', $msg);
         redirect('../index.php/Login/verify_auth/'.$authenticate->artist_id.'');
         
     }
     else{
         $data['err'] = '<div class="alert alert-warning">An error occurred trying to send your 2fa code </div>';
         $this->load->view('login/login', $data);
     }
}
else if( $authenticate->two_factor_auth_enabled==1 && $twofa_devices->authenticated == 0){
    // Generate 2fa code 
    $code = mt_rand(111111, 999999); 
    // Update DB with new auth code
    $send_auth = $this->Artist_Model->send_auth_code($authenticate->artist_id, $code);
    $email_auth = $this->__email_auth($this->input->post('artist_account_email'), $code);
    if($send_auth && $email_auth){
        $msg = '<div class="alert alert-info">We sent your 2fa code to '.$this->input->post('artist_account_email').'</div>';
        $this->session->set_flashdata('msg', $msg);
        redirect('../index.php/Login/verify_auth/'.$authenticate->artist_id.'');
        
    }
    else{
        $data['err'] = '<div class="alert alert-warning">An error occurred trying to send your 2fa code </div>';
        $this->load->view('login/login', $data);
    }
} 
else if($authenticate->two_factor_auth_enabled == 1 && $twofa_devices->authenticated == 1){
    // If trusted device is disabled or 2fa code is verified , allow user to login
    // Delete two-factor-auth from DB
    $this->Artist_Model->deauthenticate($authenticate->artist_id);
    $this->session->set_userdata($artist_data);
    redirect(base_url());
    //redirect('../index.php/Dash/my_dash');
}
else{
    $this->session->set_userdata($artist_data);
    redirect(base_url());
}

/*
$this->session->set_userdata($artist_data);
redirect('../index.php/Dash/my_dash');
*/
}
}
}
}
// Verify two factor auth code 
public function verify_auth($id){
    //$data['artist_account_email']= $email;
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('Artist_Model');
    $this->load->library('user_agent');
    $this->form_validation->set_rules('code', 'Verification Code', 'required|trim|numeric', array('numeric'=>'The verification code must be a number'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('login/verify_auth');
    }
    else{
        $verify_device = $this->Artist_Model->verify_two_factor_auth($id, $this->input->post('code'));
        if($verify_device == TRUE){
            $auth_code_verified='<div class="alert alert-success">Two factor auth code verified <i class="fa fa-check-circle"></i></div>';
            $this->session->set_flashdata('auth_code_verified', $auth_code_verified);
            redirect('../index.php/Login/signin');
        }
        else{
            $data['incorrect_code']='
                <div class="alert alert-danger">Code entered is incorrect, please check your email and try again</div>
            ';
            $this->load->view('login/verify_auth', $data);
        }
    }
}
public function reset_pwd(){
    $this->load->library('form_validation');
    $this->load->library('user_agent'); // Used to get device info 
    $this->load->helper('url');
    $this->load->model('Artist_Model');
    $this->load->model('Notifications_Model');
    $this->form_validation->set_rules('artist_account_email', 'Email', 'required|trim|valid_email');
    if($this->form_validation->run()==FALSE){
        $this->load->view('login/reset_pwd');
    }
    else{
        // verify the account exists
        $exists = $this->Artist_Model->exists($this->input->post('artist_account_email'));
        if($exists == FALSE){
            $data['no_user']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Looks like that email is not in our system. Please use the one you used to setup your account
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
          </div>';
          $this->load->view('login/reset_pwd', $data);
        }
        else{
             /* 
              Get user's IP address and device info in case this is an
              unauthorized attempt to reset a user's password
            */
            // Using Geolocation API to get location details 
            $ip_addr = $_SERVER['REMOTE_ADDR'];
            $location = @unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr));
            $city = $location['geoplugin_city'];
            $region = $location['geoplugin_regionName']; // if country is MURICA, this would be the state 
            $zipcode = $location['geoplugin_areaCode'];
            $country = $location['geoplugin_countryName'];
            $continent = $location['geoplugin_continentName'];
            $latitude = $location['geoplugin_latitude'];
            $longitude = $location['geoplugin_longitude'];
            $timezone = $location['geoplugin_timezone'];
            $device_info = array(
            'device_os'=> $this->agent->platform(),
            'browser_used'=> $this->agent->browser(),
            'browser_version'=> $this->agent->version(),
            'mobile_device'=> $this->agent->mobile(),
            'robot'=> $this->agent->robot(),
            'ip_addr'=> $ip_addr,
            'city'=>$city,
            'zipcode'=>$zipcode,
            'country'=>$country,
            'region'=>$region,
            'continent'=>$continent,
            'latitude'=>$latitude,
            'longitude'=>$longitude,
            'timezone'=>$timezone,
            'victim_email'=> $this->input->post('artist_account_email'),
            );
            $this->__notify_user($this->input->post('artist_account_email'), $city, $region, $country, $this->agent->platform(), $this->agent->mobile(), $this->agent->browser());
            date_default_timezone_get(); // set the time zone to whatever the system's is
            $token_expires = DATE('Y-m-d h:i:sa', strtotime('+1 minute'));    // Token expires after 1 minute

            $code = mt_rand(1111, 9999);
            $email = $this->input->post('artist_account_email');
            $send_reset_request = $this->Artist_Model->send_reset_code($code, $email, $token_expires);
            $this->Artist_Model->get_device_info($device_info);
            // Send a notification to the user 
            $notification_id = "ni".md5($this->input->post('artist_account_email').time());
            $title = 'A password reset attempt was made';
            $msg = 'A password reset attempt was made on '.date('F, jS, Y'). '. Here are the device details: 
            <ul>
            <li>
            Browser Used: '.$this->agent->browser().'
            </li>
            <li>
            Device OS: '.$this->agent->platform().'
            </li>
            <li>
            Mobile Device Used: '.$this->agent->mobile().'
            </li>
            <li>
            Location where attempt was made: 
            '.$city.', '.$region.', '.$country.'
            </li>
            </ul>
            <b>If you did not attempt this, please notify an administrator immediately!</b>
            ';
            $notification = array(
              'notification_id'=>$notification_id,
              'notification_artist_email'=>$email,
              'notification_system'=>1,
              'notification_date'=>DATE('Y-m-d h:i:sa'),
              'notification_title'=>$title,
              'notification_message'=>$msg
            );
            $this->Notifications_Model->alert_user($notification);
            if($send_reset_request){
                $this->__send_verification($email, $code);
                redirect('./Login/auth/'.$email.'');
            }
        }
    }
}
// In case email does not send, function resends email 
public function resend_code($email){
    $this->load->model('Artist_Model');
    $this->load->helper('url');
    $data['artist_account_email']= $email;
    date_default_timezone_get();
    $token_expires = DATE('Y-m-d h:i:sa', strtotime('+1 minute'));
    $code = mt_rand(1111, 9999);
    $send_reset_request = $this->Artist_Model->send_reset_code($code, $email, $token_expires);
    if($send_reset_request){
        $this->__send_verification($email, $code);
        $code_resent = '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">We sent you another verification code, please check your email</div>';
        $this->session->set_flashdata('code_resent', $code_resent);
        redirect('./Login/auth/'.$email.'');
    }
}

public function auth($email){
    $data['artist_account_email']= $email;
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('Artist_Model');
    $this->form_validation->set_rules('code', 'Verification Code', 'required|trim|numeric', array('numeric'=>'The verification code must be a number'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('login/auth',$data);
    }
    else{
        // check if code entered was the right one
        $check_code = $this->Artist_Model->verify_auth($email, $this->input->post('code'));
        if($check_code == FALSE){
            $data['wrong_code']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Either the verification code you entered is incorrect or the reset token expired &nbsp; <a style="text-decoration: underline" href="../reset_pwd">send another request</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
          </div>';
          $this->load->view('login/auth', $data);
        }
        else{
            redirect('./Login/create_pwd/'.$email.'');
        }
    }
}

public function create_pwd($email){
    $data['artist_account_email'] =$email;
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('Artist_Model');
    $this->load->model('Notifications_Model');
    $this->form_validation->set_rules('artist_account_password', 'Password', 'trim|required');
    $this->form_validation->set_rules('artist_account_password_confirm', 'Confirm Password', 'trim|required|matches[artist_account_password]');
    if($this->form_validation->run()==FALSE){
        $this->load->view('login/create_pwd');
    }
    else{
        // Update password
        $pwd = password_hash($this->input->post('artist_account_password'), PASSWORD_DEFAULT);
        $reset_pwd = $this->Artist_Model->reset_pwd($pwd, $email);
        if($reset_pwd){
          $notification_id = "ni".md5($this->input->post('artist_account_email').time());
          $title = 'Your password was changed';
          $msg = 'Your password was reset on '.date('F, jS, Y'). '. If you did not make this change to your account, please email accounts@novamusicapp.com';
          $notification = array(
            'notification_id'=>$notification_id,
            'notification_artist_email'=>$email,
            'notification_system'=>1,
            'notification_date'=>DATE('Y-m-d h:i:sa'),
            'notification_title'=>$title,
            'notification_message'=>$msg
          );
          $this->Notifications_Model->notify_update_pwd($notification);
          $success='<div class="alert alert-success">Your password has been reset, go ahead and login with your new password!</div>';
          $this->session->set_flashdata('success', $success);
            redirect('./Login/signin');
        }
        else{
            $data['err']='<div class="alert alert-warning">There was an unknown issue resetting your password</div>';
            $this->load->view('login/create_pwd', $data);
        }
    }
}
private function __email_auth($email, $code){
    $body= '<style type="text/css">
    body {
        margin: 0;
        font-family: Arial, Geneva, sans-serif;
        color: #222222;
        font-size: 18px;
        font-weight: normal;
        text-decoration: none;
        padding: 4px;
    }

    .nova1 img {
        max-width: 100%;
        height: auto;
    }

    .m30 {
        margin-bottom: 10px;
    }

    .button_cont a {
        vertical-align: middle;
    }

    h1 {
        font-family: Arial Black, Geneva, sans-serif;
        color: #222222;
        font-size: 27px;
        font-weight: bolder;
        margin-bottom: 5;
        text-align: center;
        text-transform: uppercase;
        text-decoration: none;
    }

    h1 a {
        text-decoration: none;
        color: #222222;
    }

    h1 a:hover {
        color: #0000ee;
    }

    h2 {
        font-family: Arial Black, Geneva, sans-serif;
        color: #ffffff;
        font-size: 24px;
        font-weight: bolder;
        background: #222222;
        padding: 14px;
        text-align: center;
        text-transform: uppercase;
        margin-top: 30px;
    }

    h3 {
        font-family: Arial Black, Geneva, sans-serif;
        color: #ffffff;
        font-size: 24px;
        font-weight: bolder;
        background: #222222;
        padding: 14px;
        text-align: center;
        margin-top: 30px;
    }

    p {
        width: 95%;
        margin: auto;
        margin: 20px;
    }

    .intro_button_folow {
        border: none;
        background: #606060;
        color: #ffffff !important;
        font-family: Arial Black, Geneva, sans-serif;
        font-size: 16px;
        font-weight: bold;
        padding: 20px;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 6px;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    .intro_button_folow span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.4s;
    }

    .intro_button_folow span:after {
        content: "00bb";
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .intro_button_folow:hover span {
        padding-right: 25px;
    }

    .intro_button_folow:hover span:after {
        opacity: 1;
        right: 0;
    }

    .promo_button {
        border: none;
        background: #606060;
        color: #ffffff !important;
        font-family: Arial Black, Geneva, sans-serif;
        font-size: 16px;
        font-weight: bold;
        padding: 20px;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 6px;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    .promo_button:hover {
        color: #ffffff !important;
        font-weight: 700 !important;
        letter-spacing: 3px;
        background: #1a3cfb;
        -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
        -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
        transition: all 0.3s ease 0s;
    }
</style>

<div style="width: 100%;">
    <div class="nova1" style="max-width: 690px;width: 100%;margin: 10px auto; box-shadow: 0 0 18px rgba(0,0,0,0.5);padding: 30px;">

        <iframe src="https://cloud.eastrockent.com/img/nova/novaHeader.html" style="width: 100%; height: 500px; border: none;"></iframe>



        <h1>Verify your two factor authentication code</h1>
        <br>
        <h5>You\'ve opted in to two factor authentication, every time you login, you will need to verify your 2fa code in order to login
        <p>
         Please enter the code below to verify
        </p>




        <p></p>

        <h3>'.$code.'</h3>



        <p></p>
    </div>
</div>';
$this->load->library('email');
$config['useragent']='CodeIgniter';
$config['protocol']='smtp';
$config['smtp_host']='smtp.ionos.com';
$config['smtp_user']='';  // not showing email credentials
$config['smtp_pass']='';  // not showing email credentials
$config['smtp_port']='587';
$config['newline']="\r\n";
$config['smtp_timeout']='5';
$config['smtp_crypto']='tls';
$config['wordwrap']=TRUE;
$config['mailtype']='html';
$config['charset']='iso-8859-1';
$this->email->initialize($config);
  $this->email->from('accounts@novamusic.app');
  $this->email->to($email);
  $this->email->subject('Verify your account');
  $this->email->message($body);
  if(!$this->email->send()){
    return FALSE;
    return $this->email->print_debugger();
  }
  else{
    return TRUE;
  }
}
private function __send_verification($email, $code){
    $body='
    <style type="text/css">
        body {
            margin: 0;
            font-family: Arial, Geneva, sans-serif;
            color: #222222;
            font-size: 18px;
            font-weight: normal;
            text-decoration: none;
            padding: 4px;
        }

        .nova1 img {
            max-width: 100%;
            height: auto;
        }

        .m30 {
            margin-bottom: 10px;
        }

        .button_cont a {
            vertical-align: middle;
        }

        h1 {
            font-family: Arial Black, Geneva, sans-serif;
            color: #222222;
            font-size: 27px;
            font-weight: bolder;
            margin-bottom: 5;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
        }

        h1 a {
            text-decoration: none;
            color: #222222;
        }

        h1 a:hover {
            color: #0000ee;
        }

        h2 {
            font-family: Arial Black, Geneva, sans-serif;
            color: #ffffff;
            font-size: 24px;
            font-weight: bolder;
            background: #222222;
            padding: 14px;
            text-align: center;
            text-transform: uppercase;
            margin-top: 30px;
        }

        h3 {
            font-family: Arial Black, Geneva, sans-serif;
            color: #ffffff;
            font-size: 24px;
            font-weight: bolder;
            background: #222222;
            padding: 14px;
            text-align: center;
            margin-top: 30px;
        }

        p {
            width: 95%;
            margin: auto;
            margin: 20px;
        }

        .intro_button_folow {
            border: none;
            background: #606060;
            color: #ffffff !important;
            font-family: Arial Black, Geneva, sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 20px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .intro_button_folow span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.4s;
        }

        .intro_button_folow span:after {
            content: "00bb";
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .intro_button_folow:hover span {
            padding-right: 25px;
        }

        .intro_button_folow:hover span:after {
            opacity: 1;
            right: 0;
        }

        .promo_button {
            border: none;
            background: #606060;
            color: #ffffff !important;
            font-family: Arial Black, Geneva, sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 20px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .promo_button:hover {
            color: #ffffff !important;
            font-weight: 700 !important;
            letter-spacing: 3px;
            background: #1a3cfb;
            -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
            transition: all 0.3s ease 0s;
        }
    </style>

    <div style="width: 100%;">
        <div class="nova1" style="max-width: 690px;width: 100%;margin: 10px auto; box-shadow: 0 0 18px rgba(0,0,0,0.5);padding: 30px;">

            <iframe src="https://cloud.eastrockent.com/img/nova/novaHeader.html" style="width: 100%; height: 500px; border: none;"></iframe>



            <h1>Hey!</h1>

            <p>Looks like you sent us a password reset request. If you haven\'t, please ignore this email, otherwise...
            <br><br>
            Please enter the verification code below to verify your account.

            </p>




            <p></p>

            <h3>'.$code.'</h3>



            <p></p>
        </div>
    </div>';
    $this->load->library('email');
    $config['useragent']='CodeIgniter';
    $config['protocol']='smtp';
    $config['smtp_host']='smtp.ionos.com';
    $config['smtp_user']='';  // not showing email credentials
    $config['smtp_pass']='';  // not showing email credentials
    $config['smtp_port']='587';
    $config['newline']="\r\n";
    $config['smtp_timeout']='5';
    $config['smtp_crypto']='tls';
    $config['wordwrap']=TRUE;
    $config['mailtype']='html';
    $config['charset']='iso-8859-1';
    $this->email->initialize($config);
      $this->email->from('accounts@novamusic.app');
      $this->email->to($email);
      $this->email->subject('Verify your account');
      $this->email->message($body);
      if(!$this->email->send()){
        return FALSE;
        return $this->email->print_debugger();
      }
      else{
        return TRUE;
      }
    }


    // Send user an email informing them of password reset attempt
    private function __notify_user($email, $city, $region, $country, $os, $device, $browser){
        $body='
        <style type="text/css">
            body {
                margin: 0;
                font-family: Arial, Geneva, sans-serif;
                color: #222222;
                font-size: 18px;
                font-weight: normal;
                text-decoration: none;
                padding: 4px;
            }
    
            .nova1 img {
                max-width: 100%;
                height: auto;
            }
    
            .m30 {
                margin-bottom: 10px;
            }
    
            .button_cont a {
                vertical-align: middle;
            }
    
            h1 {
                font-family: Arial Black, Geneva, sans-serif;
                color: #222222;
                font-size: 27px;
                font-weight: bolder;
                margin-bottom: 5;
                text-align: center;
                text-transform: uppercase;
                text-decoration: none;
            }
    
            h1 a {
                text-decoration: none;
                color: #222222;
            }
    
            h1 a:hover {
                color: #0000ee;
            }
    
            h2 {
                font-family: Arial Black, Geneva, sans-serif;
                color: #ffffff;
                font-size: 24px;
                font-weight: bolder;
                background: #222222;
                padding: 14px;
                text-align: center;
                text-transform: uppercase;
                margin-top: 30px;
            }
    
            h3 {
                font-family: Arial Black, Geneva, sans-serif;
                color: #ffffff;
                font-size: 24px;
                font-weight: bolder;
                background: #222222;
                padding: 14px;
                text-align: center;
                margin-top: 30px;
            }
    
            p {
                width: 95%;
                margin: auto;
                margin: 20px;
            }
    
            .intro_button_folow {
                border: none;
                background: #606060;
                color: #ffffff !important;
                font-family: Arial Black, Geneva, sans-serif;
                font-size: 16px;
                font-weight: bold;
                padding: 20px;
                text-transform: uppercase;
                text-decoration: none;
                border-radius: 6px;
                display: inline-block;
                transition: all 0.3s ease 0s;
            }
    
            .intro_button_folow span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.4s;
            }
    
            .intro_button_folow span:after {
                content: "00bb";
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }
    
            .intro_button_folow:hover span {
                padding-right: 25px;
            }
    
            .intro_button_folow:hover span:after {
                opacity: 1;
                right: 0;
            }
    
            .promo_button {
                border: none;
                background: #606060;
                color: #ffffff !important;
                font-family: Arial Black, Geneva, sans-serif;
                font-size: 16px;
                font-weight: bold;
                padding: 20px;
                text-transform: uppercase;
                text-decoration: none;
                border-radius: 6px;
                display: inline-block;
                transition: all 0.3s ease 0s;
            }
    
            .promo_button:hover {
                color: #ffffff !important;
                font-weight: 700 !important;
                letter-spacing: 3px;
                background: #1a3cfb;
                -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
                -moz-box-shadow: 0px 5px 40px -10px rgba(0, 0, 0, 0.57);
                transition: all 0.3s ease 0s;
            }
        </style>
    
        <div style="width: 100%;">
            <div class="nova1" style="max-width: 690px;width: 100%;margin: 10px auto; box-shadow: 0 0 18px rgba(0,0,0,0.5);padding: 30px;">
    
                <iframe src="https://cloud.eastrockent.com/img/nova/novaHeader.html" style="width: 100%; height: 500px; border: none;"></iframe>
    
    
    
                <h1>Hey there!</h1>
    
                <p>we just wanted to let you know that a password reset attempt was made today: '.date('F, jS, Y').' &nbsp; and here are the 
                details:
                <br><br>
                <b>Device Details:</b>
                </p>
                <ul>
                <li>Browser Used: '.$browser.'</li>
                <li>Operating System: '.$os.'</li>
                <li>Mobile device used (if it was a mobile device): '.$device.'</li>
                </ul>
                <br>
                <b>Location Details:</b>
                <ul>
                <li>City: '.$city.'</li>
                <li>Region (state): '.$region.'</li>
                <li>Country: '.$country.'</li>
                </ul>
                <br>
                If you did not make this request, please contact Nova administrators immediately
            </div>
        </div>';
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.ionos.com';
        $config['smtp_user']='';  // not showing email credentials
        $config['smtp_pass']='';  // not showing email credentials
        $config['smtp_port']='587';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='tls';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $this->email->initialize($config);
          $this->email->from('accounts@novamusic.app');
          $this->email->to($email);
          $this->email->subject('A password reset request was made');
          $this->email->message($body);
          if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
          }
          else{
            return TRUE;
          }
        }
}
