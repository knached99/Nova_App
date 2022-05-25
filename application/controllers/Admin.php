<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['admin_account_email'])){
		  //redirect('./Admin/login');
		}
	  }

  public function login(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('Admin_Model');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', array('required'=>'you must enter your email', 'valid_email'=>'the email you entered is not valid'));
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim');
    if($this->form_validation->run()==FALSE){
      $this->load->view('admin_login');
    }
    else{
      // check to see if admin exists
      $exists = $this->Admin_Model->exists($this->input->post('email'));
      if($exists == FALSE){
        $data['no_admin']="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
           There is no admin with the associated email
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        $this->load->view('admin_login',$data);
      }
      else{
        $auth = $this->Admin_Model->authenticate($this->input->post('email'), $this->input->post('pwd'));
        if($auth == FALSE){
          $data['login_failed']="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
           Your login credentials are incorrect
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          $this->load->view('admin_login', $data);
        }
        else{
          $admin_data = array(
            'admin_id'=>$auth->admin_id,
            'admin_first_name'=>$auth->admin_first_name,
            'admin_last_name'=>$auth->admin_last_name,
            'admin_account_level'=>$auth->admin_account_level,
            'admin_account_email'=>$auth->admin_account_email,
          );
          $this->session->set_userdata($admin_data);
          redirect('./Admin/dash');
        }
      }
    }
  }

  public function reset_pwd(){
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->load->model('Admin_Model');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required'=>'your email is required to continue', 'valid_email'=>'you must enter a valid email'));
    if($this->form_validation->run()==FALSE){
      $this->load->view('admin_reset_pwd');
    }
    else{
      $exists = $this->Admin_Model->exists($this->input->post('email'));
      if($exists == FALSE){
        $data['no_user']='<div class="alert alert-warning">There is no administrator account associated with that email <i class="fa fa-exclamation-circle"></i></div>';
        $this->load->view('admin_reset_pwd');
      }
      else{
        $code = mt_rand(111111, 999999);
        $send_code = $this->Admin_Model->send_code($code, $this->input->post('email'));
        if($send_code == FALSE){
          $data['$code_send_failed']='<div class="alert alert-danger">There was an issue sending the verification code <i class="fa fa-exclamation-circle"></i></div>';
          $this->load->view('admin_reset_pwd');
        }
        else{
          $msg = '<div class="alert alert-primary">Please enter the verification code we sent to '.$this->input->post('email').'</div>';
          $this->session->set_flashdata('msg', $msg);
          redirect('./Admin/verify/'.$this->input->post('email').'');
        }
      }
    }
  }

  public function dash(){
    $this->load->helper('url');
    $this->load->model('Admin_Model');
    $data['artists']=$this->Admin_Model->get_artists();
    $this->load->view('header');
    $this->load->view('admin_nav');
    $this->load->view('sidebar');
    $this->load->view('admin_dash', $data);
    $this->load->view('footer');
  }

  public function artist_profile($id){
    $data['id']=$id;
    $this->load->helper(array('form', 'url'));
    $this->load->model('Admin_Model');
    $this->load->model('Notifications_Model');
    $data['artist']=$this->Admin_Model->get_artist($id);
    $this->load->view('header');
    $this->load->view('admin_nav');
    $this->load->view('sidebar');
    $this->load->view('artist_profile', $data);
    $this->load->view('footer');
  }

  public function send_msg($email){
    $data['email']=$email;
    $this->load->helper(array('form', 'url'));
    $this->load->model('Admin_Model');
    $this->load->model('Notifications_Model');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('msg', 'message', 'min_length[10]', array('min_length'=>'your message must be at least 10 characters long'));
    if($this->form_validation->run()==FALSE){
      $err = 'your message must be at least 10 characters long';
      $this->session->set_flashdata('msg_err', $err);
      redirect('./Admin/dash');
    }
    else{
      // Notifies user that admin has sent them a message
        $notification_id = "ni".md5($email.time());
        $title ='Nova Music';
        $msg =$this->input->post('msg');
        $user_notify = array(
          'notification_id'=>$notification_id,
          'notification_artist_email'=>$email,
          'notification_title'=>$title,
          'notification_message'=>$msg,
          'notification_date'=>date('Y-m-d h:i:sa'),
          'notification_admin'=>1

      );
      $this->Notifications_Model->notify_admin_sent_msg($user_notify);
      $success = 'your message was sent!';
      $this->session->set_flashdata('msg_success', $success);
      redirect('./Admin/dash');
    }
  }

  public function signout(){
        if(session_destroy()){
          redirect('../index.php/Admin/login');
        }
}
}
?>
