<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
	public function signup()
	{
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Artist_Model');
        $this->form_validation->set_rules('artist_account_name_artist','artist name','required|is_unique[Artists_Table.artist_account_name_artist]', array('required' => 'Please enter your artist name'));
        $this->form_validation->set_rules('artist_account_name_first','First Name','required|trim', array('required' => 'Please enter your first name'));
        $this->form_validation->set_rules('artist_account_name_last','Last Name','required|trim', array('required' => 'Please enter your last name'));
        $this->form_validation->set_rules('artist_account_email','email','required|trim|valid_email|is_unique[Artists_Table.artist_account_email]', array('required' => 'Please enter a vaild email', 'vaild_email'=>'The email you have entered is not vaild.'));
        $this->form_validation->set_rules('artist_account_password', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required' => 'Please enter a secure password', 'regex_match'=>'The password must meet the following constraints: at least 8 characters in length, one uppercase letter, one number, and one symbol'));
        $this->form_validation->set_rules('artist_account_password_confirm', 'Confirm Password', 'required|trim|matches[artist_account_password]', array('required' => 'Please verify your password', 'matches'=>'both passwords must match'));
        $this->form_validation->set_rules('artist_account_terms_agreement', 'Terms', 'required', array('required'=>'You must agree to the terms and conditions'));
        $this->form_validation->set_message('is_unique',    'This %s is already associated with a Nova account');

        if ($this->form_validation->run()==FALSE){
            $this->load->view('signup');

        }
else {
$artist_id="ar".md5($this->input->post('artist_account_email').time());
$artist_data=array(
'artist_id'=> $artist_id,
'artist_account_name_artist'=> $this->input->post('artist_account_name_artist'),
'artist_account_name_first'=> $this->input->post('artist_account_name_first'),
'artist_account_name_last'=> $this->input->post('artist_account_name_last'),
'artist_account_email'=> $this->input->post('artist_account_email'),
'artist_account_password'=> password_hash($this->input->post('artist_account_password'), PASSWORD_DEFAULT),
'artist_account_terms_agreement'=>$this->input->post('artist_account_terms_agreement')
);
$code = mt_rand(111111, 999999); // six digit random verification code
$fname = $this->input->post('artist_account_name_first');
$email = $this->input->post('artist_account_email');
// create user in the DB
$create=$this->Artist_Model->registerArtist($artist_data);
if($create){
  $send_code = $this->Artist_Model->send_code($email, $code);
  if($this->__verify_account($fname, $email, $code)==TRUE){
    redirect('./Register/verify_code/'.$email.'');
  }
  else{
    echo $this->email->print_debugger();
  }
}
else{
  $data['regFailed']="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Account Creation Failed</strong> Unable to create your account. Please contact support@novamusic.app.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
$this->load->view('signup', $data);

}
// then send the email

/*if($this->__verify_account($fname, $email, $code) == TRUE){
  $send_code = $this->Artist_Model->send_code($email, $code);
  redirect("./verify_code/'.$email.'");
}
else{
  $data['email_err']='<div class="alert alert-warning">Something went wrong while trying to send you a verification email</div>';
  $this->load->view('signup', $data);
} */
/*$create=$this->Artist_Model->registerArtist($artist_data);

if ($create) {
$data['regSuccess']="
<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Account Created</strong> Your account has successfully been created, you may now sign in.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
$this->load->view('signup', $data);
}
else {
    $data['regFailed']="
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Account Creation Failed</strong> Unable to create your account. Please contact support@novamusic.app.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    $this->load->view('signup', $data);

}
*/
}
  }

  public function verify_code($email){
    $this->load->model('Artist_Model');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('code', 'Verification Code', 'required|trim');
    if($this->form_validation->run()==FALSE){
      $this->load->view('verify');
    }
    else{
      // get verification code
      $get_code = $this->Artist_Model->verify_code($email, $this->input->post('code'));
      if($get_code == FALSE){
        $data['incorrect_code']='<div class="alert alert-danger">The code entered was not correct, please check your email and try again.</div>';
        $this->load->view('verify', $data);
      }
      else{
        $success_msg ='<div class="alert alert-success">Thank you for verifying your account! You can now login!</div>';
        $this->session->set_flashdata('acct_create_success',$success_msg);
        redirect('../index.php/Login/signin');
      }
    }
  }

  private function __verify_account($fname, $email, $code){
  $body='
  <!DOCTYPE html>
  <html>

  <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          @media screen {
              @font-face {
                  font-family: "Lato";
                  font-style: normal;
                  font-weight: 400;
                  src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: normal;
                  font-weight: 700;
                  src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 400;
                  src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 700;
                  src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
              }
          }

          /* CLIENT-SPECIFIC STYLES */
          body,
          table,
          td,
          a {
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
          }

          table,
          td {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
          }

          img {
              -ms-interpolation-mode: bicubic;
          }

          /* RESET STYLES */
          img {
              border: 0;
              height: auto;
              line-height: 100%;
              outline: none;
              text-decoration: none;
          }

          table {
              border-collapse: collapse !important;
          }

          body {
              height: 100% !important;
              margin: 0 !important;
              padding: 0 !important;
              width: 100% !important;
          }

          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }

          /* MOBILE STYLES */
          @media screen and (max-width:600px) {
              h1 {
                  font-size: 32px !important;
                  line-height: 32px !important;
              }
          }

          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] {
              margin: 0 !important;
          }
      </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We\'re thrilled to have you here! Get ready to dive into your new account. </div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <!-- LOGO -->
          <tr>
              <td style="background-color: #4650dd !important" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td style="background-color: #4650dd !important" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                              <h1 style="font-size: 48px; font-weight: 600; margin: 2; font-family: Georgia; color: #333;">Almost Finished!</h1> <img style="background-color: #000 !important " src="https://eastrock.fm/assets/images/eastrockLight.png" width="100" height="1-0" style="display: block; border: 0px;" />
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <h3 style="margin: 0;">Hi '.$fname.', we\'re excited to have you get started! First, you need to confirm your account. Just enter the code below to continue</h3>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#ffffff" align="left">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="center"><p style="font-size: 30px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; color: #4650dd !important;text-decoration: none; padding: 15px 25px; display: inline-block; font-weight: 800; word-spacing: 2px; ">'.$code.'</p></td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr> <!-- COPY -->


                      <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">If you have any questions, please send an email to nova@eastrockent.com</p>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">Cheers,<br>The Nova Team!</p>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>

      </table>
  </body>

  </html>';
  $this->load->library('email');
  $config['useragent']='CodeIgniter';
  $config['protocol']='smtp';
  $config['smtp_host']='smtp.ionos.com';
  $config['smtp_user']='accounts@novamusic.app';
  $config['smtp_pass']=''; // Email password not shown 
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
  public function terms(){
    $this->load->helper('url');
    $this->load->view('Terms_of_Use-2');
  }
}
