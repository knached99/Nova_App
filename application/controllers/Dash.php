<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['artist_account_email'])){
		  redirect('../index.php/Login/signin');
		}
	  }


	public function my_dash()
	{
		$this->load->model('Notifications_Model');
		$this->load->model('Artist_Model');
		$data['releases']=$this->Artist_Model->get_releases($_SESSION['artist_account_name_artist']);
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
	    $this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/dash', $data);
		$this->load->view('footing/footer');

	}

	public function releases(){
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
		$this->load->helper('form');
		$data['releases']=$this->Artist_Model->releases($_SESSION['artist_account_name_artist']);
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');;
	 $this->load->view('dash/releases', $data);
	 $this->load->view('footing/footer');

	}
	public function release_create()
	{ $this->load->model('Notifications_Model');
		$this->load->model('Artist_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		// load the form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('release_name', 'Release Name', 'required', array('required'=> 'release name is required'));
		$this->form_validation->set_rules('release_date', 'Release Date', 'required', array('required'=>'release date is required'));
		$this->form_validation->set_rules('release_genre', 'Release Genre', 'required', array('required'=>'release genre is required'));
		$this->form_validation->set_rules('release_type', 'Release Type', 'required', array('required'=>'release type is required'));
		if($this->form_validation->run()==FALSE){
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/release_create');
			$this->load->view('footing/footer');
		}
		else{
			$release_id = md5($_SESSION['artist_account_email'].time());
			$release_data = array(
				'release_id'=>$release_id,
				'release_status'=>'Draft',
				'release_artist_main'=>$_SESSION['artist_account_name_artist'],
				'release_name'=>$this->input->post('release_name'),
				'release_date'=>$this->input->post('release_date'),
				'release_genre'=>$this->input->post('release_genre'),
				'release_type'=>$this->input->post('release_type'),
				'release_date_submitted'=>DATE('Y-m-d h:i:sa'),
				'release_artwork'=>'/img/release_artwork_default.jpg'
			);
			$create_release = $this->Artist_Model->create_release($release_data);
			if($create_release == TRUE){
				redirect('./Dash/release_edit/'.$release_id.'');
			}
			else{
				$data['err']='<div class="alert alert-danger">There was a problem uploading your release</div>';
				$this->load->view('heading/header');
				$this->load->view('heading/navbar', $data);
				$this->load->view('dash/sidebar');
				$this->load->view('dash/release_edit', $data);
				$this->load->view('footing/footer');
			}

		}

	}
	public function release_edit($id)
	{ $this->load->model('Notifications_Model');
		$this->load->helper(array('url', 'form'));
		$this->load->model('Artist_Model');
		$data['id']=$id;
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$data['release']=$this->Artist_Model->get_release($id);
		$data['songs']=$this->Artist_Model->get_songs($id);
		$release = $this->Artist_Model->release($id);
		if($release->release_artist_main !== $_SESSION['artist_account_name_artist']){
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/release_edit');
			$this->load->view('footing/footer');
		}
		else{
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/release_edit');
			$this->load->view('footing/footer');
		}


	}

	public function delete_release($id){
		$data['id']=$id;
		$this->load->model('Artist_Model');
		$release = $this->Artist_Model->release($id);
		if($release->release_artist_main !== $_SESSION['artist_account_name_artist']){
			$violation='<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle fa-lg"></i> 
			You\'re attempting to delete another artist\'s release. 
			Nova administrators have been informed of this 
			violation and any subsequent attempt will result in a permanent
			 ban of your account
		 	 </div>'; // Build functionality to notify administrators 
			$this->session->set_flashdata('violation', $violation);
			redirect('./releases');
		}
		else if($release->release_status=='In Review'){
			$in_review = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle fa-lg"></i> 
			You cannot delete this release because it is currently locked. Once the administrator completes review of this
			release, you can modify it.
		 	 </div>';
			  $this->session->set_flashdata('in_review', $in_review);
			  redirect('.Dash/release_edit/'.$id.'');
		}
		else{

		}
		$del_release = $this->Artist_Model->delete_release($id);
		if($del_release){
			redirect('./releases');
		}
		else{
			$err ='<div class="alert alert-danger">Error deleting release with id '.$id.' </div>';
			$this->session->set_flashdata('err', $err);
			redirect('./releases');
		}
		
	}

	public function request_review($id){
		$data['id'] = $id;
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
		$notification_id = 'ni'.md5($id.time());
		$notification = array(
			'notification_id'=>$notification_id,
			'notification_system'=>1,
			'notification_artist_email'=>$_SESSION['artist_account_email'],
			'notification_title'=>'Release Submitted For Review',
			'notification_date'=>date('m-d-y h:i:sa'),
			'notification_message'=>'Your release has been submitted for review. Until the review process is completed, you\'ll be prevented from making changes to this release.
			You will receive a notification once your release
			has been reviewed and notes will be provided
		 in the release view page.'
		);
		$send_request = $this->Artist_Model->send_request($id);
		if($send_request == TRUE){
			$notify_user = $this->Notifications_Model->request_notification($notification);
			if($notify_user){
				redirect('./Dash/release_edit/'.$id.'');
			}
		}
		else{
			$err = '<div class="alert alert-warning">There was an issue processing your request</div>';
			$this->session->set_flashdata('request_err', $err);
			redirect('./Dash/release_edit/'.$id.'');
		}
	}



	public function save_release($id){
		$this->load->helper(array('url', 'form'));
		$this->load->model('Artist_Model');
		$release = $this->Artist_Model->release($id);
		$config['upload_path']          = './releases/artwork/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 32000;
		$config['max_width']            = 3000;
		$confg['min_width'] = 3000;
		$config['main_height'] = 3000;
		$config['max_height']           = 3000;
		$config['remove_spaces']=true;
		$config['detect_mime']=true;
		$config['mod_mime_fix']=true;
		$config['file_name']=$_FILES['release_artwork']['name'];
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$data['id']=$id;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('release_type', 'Release Type', 'required', array('required'=>'Release Type is required'));
		$this->form_validation->set_rules('release_title', 'Release Title', 'required', array('required'=>'Release Title is required'));
		$this->form_validation->set_rules('release_genre', 'Release Genre', 'required', array('required'=>'Release Genre is required'));
		$this->form_validation->set_rules('release_date', 'Release Date', 'required', array('required'=>'Release Date is required'));
		//$this->form_validation->set_rules('release_artwork', 'Release Artwork', 'required', array('required'=>'You need to upload your release artwork'));
		if($this->form_validation->run()==FALSE){
			$err = validation_errors();
			$this->session->set_flashdata('err', $err);
			redirect('./Dash/release_edit/'.$id.'');
		}
		
		else{
			$uploadData = $this->upload->data();
			$release_artwork =  '/releases/artwork/'.$uploadData['file_name'];
			// implode converts array to a string. 
			if(implode('', $uploadData)=='./releases/artwork/./releases/artwork/'){
				$artwork = $release->release_artwork;
			}
		
			else{
				$artwork = $release_artwork;
			}
			 
			
			$data = array(
				'release_id'=>$id,
				'release_artwork'=> $artwork,
				'release_type'=>$this->input->post('release_type'),
				'release_name'=>$this->input->post('release_title'),
				'release_date'=>$this->input->post('release_date'),
				'release_genre'=>$this->input->post('release_genre')
			);
			$update_release = $this->Artist_Model->update_release($data, $id);
			$upload_artwork = $this->upload->do_upload('release_artwork');
			if($update_release || $upload_artwork == TRUE){

				$this->session->unset_userdata($data);
				$this->session->set_userdata($data);
				$success = '<div class="alert alert-success">Your changes have been saved <i class="fa fa-check-circle"></i></div>';
				$this->session->set_flashdata('success', $success);
				redirect('./Dash/release_edit/'.$id.'');
			}
			else{
				
				$update_err ='<div class="alert alert-warning">We were unable to update your changes, please try again later <i class="fa fa-exclamation-circle"></i>
				</div>';
				$this->session->set_flashdata('update_err', $update_err);
				redirect('./Dash/release_edit/'.$id.'');
			}	
			
		
		} 
	}
	public function addSong($id){
		$this->load->helper(array('url', 'form'));
		$this->load->model('Artist_Model');
		$release = $this->Artist_Model->release($id);
		$config['upload_path']          = './songs';
		$config['allowed_types']        = 'mp3';
		$config['max_size']             = 5000;
		$config['file_name']=$_FILES['song_file']['name'];
		$data['id']=$id;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('song_title', 'Song Title', 'required', array('required'=>'Song title is required'));
		$this->form_validation->set_rules('song_rating', 'Song Rating', 'required', array('required'=>'Song rating is required'));
		//$this->form_validation->set_rules('song_file', 'Music File', 'required', array('required'=>'Music file is required'));
		if($this->form_validation->run()==FALSE){
			$validation_errs = validation_errors();
			$this->session->set_flashdata('validation_errs', $validation_errs);
			redirect('./Dash/release_edit/'.$id.'');
		}
		
		else{
			$uploadData = $this->upload->data();
			$song =  '/songs/'.$uploadData['file_name']; 
			 
			
			$data = array(
				'release_id'=>$release->release_id,
				'artist_id'=>$this->session->artist_id,
				'song_id'=>md5(time().date('yyy-mm-dddd').$this->session->artist_id),
				'song_file'=> $song,
				'song_rating'=>$this->input->post('song_rating'),
				'song_title'=>$this->input->post('song_title'),
				'song_genre'=>$release->release_genre,
				'song_artist_featured_1_name_artist	'=>$this->session->artist_account_name_artist,
				'song_artist_featured_1_name_first'=>$this->session->artist_account_name_first,
				'song_artist_featured_1_name_last'=>$this->session->artist_account_name_last
			);
			$uploadSong = $this->Artist_Model->uploadSong($data);
			$upload_song = $this->upload->do_upload('song_file');
			if($uploadSong && $upload_song == TRUE){
				$success = '<div class="alert alert-success">Your track has been added <i class="fa fa-check-circle"></i></div>';
				$this->session->set_flashdata('track_upload_success', $success);
				redirect('./Dash/release_edit/'.$id.'');
			}
			else{
				
				$upload_err ='<div class="alert alert-warning">We were unable to add your song <i class="fa fa-exclamation-circle"></i>
				</div>';
				$this->session->set_flashdata('track_upload_err', $upload_err);
				redirect('./Dash/release_edit/'.$id.'');
			}	
			
		
		} 
	}
	// Enable or disable trusted devices feature 
	public function two_factor_auth(){
		$this->load->helper(array('url', 'form'));
		$this->load->model('Artist_Model');
		$data = array(
			'two_factor_auth_enabled'=>$this->input->post('2fa')
		);
		if($this->input->post('2fa') == 0){
			// Disable 2FA 
			if($this->Artist_Model->disable2fa($this->session->artist_account_email) == TRUE){
				$this->session->unset_userdata($data);
				$this->session->set_userdata($data);
				$disable_2fa = '<div class="alert alert-info">Two-factor authentication has been disabled </div>';
				$this->session->set_flashdata('disable_2fa', $disable_2fa);
				redirect('./Dash/edit_profile');
			}
			
		}
		else if($this->input->post('2fa')==1){
			if($this->Artist_Model->enable2fa($this->session->artist_account_email) == TRUE){
				$this->session->unset_userdata($data);
				$this->session->set_userdata($data);
				$enable_2fa = '<div class="alert alert-success">Two-factor authentication has been enabled </div>';
				$this->session->set_flashdata('enable_2fa', $enable_2fa);
				redirect('./Dash/edit_profile');
			}
		}
	}

	public function allnotifications()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->model('Notifications_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$data['all_notifications']=$this->Notifications_Model->get_all_notifications($_SESSION['artist_account_email']);
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/allnotifications', $data);
		$this->load->view('footing/footer');

	}

	public function view_notification($id) {
		$this->load->model('Notifications_Model');
		$notification=$data['notification']=$this->Notifications_Model->view_notification($id);
		return $notification;

	}

	public function del_notification($id){
			$this->load->model('Notifications_Model');
			$del_notification =$this->Notifications_Model->del_notification($id);
			if($del_notification == TRUE){
			 redirect('./Dash/allnotifications');
			}
			else{
				echo 'Error deleting notification';
			}
		
	}

public function del_notifications($email){
	$this->load->model('Notifications_Model');
	$data['artist_account_email']=$email;
	if($email!== $this->session->artist_account_email){
		$unauthorized= '<div class="alert alert-danger">You are attempting to tamper with another artist\'s notifications. This violation has been logged and subsequent attempts will result in a permanent ban of your account</div>';	
		$this->session->set_flashdata('unauthorized', $unauthorized);
		redirect('./Dash/allnotifications');
	}
	else{

	
	$del_notification =$this->Notifications_Model->del_all_notifications($email);
	if($del_notification == TRUE){
		redirect('./Dash/allnotifications');
	}
	else{
		echo 'Error deleting all notifications';
	}
}
}

	public function wallet(){
		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/wallet');
			$this->load->view('footing/footer');
	}
	public function lyrics(){
		$this->load->model('Artist_Model');

		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/lyrics');
			$this->load->view('footing/footer');
	}
	public function artists(){
		$this->load->model('Notifications_Model');
		$this->load->helper(array('url', 'form'));
		$this->load->model('Artist_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$data['results']=$this->Artist_Model->get_artists();
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/artists', $data);
		$this->load->view('footing/footer');
	}
	public function engineering(){
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/engineering');
		$this->load->view('footing/footer');
	}
	public function verificationprogram(){
		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

		$this->load->model('Artist_Model');
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/verificationprogram');
		$this->load->view('footing/footer');
	}
	public function admindash(){
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
		$this->load->view('dash/admin_dash');
		$this->load->view('footing/footer');
	}
	public function artist($id){
		$this->load->model('Artist_Model');
		$data['id']=$id;
		$data['artist']=$this->Artist_Model->get_artist($id);
		$artist = $this->Artist_Model->artist($id);
		$artist_name = $artist->artist_account_name_artist;
		$data['releases']=$this->Artist_Model->releases($artist_name);
		$this->load->model('Notifications_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/artist', $data);
		$this->load->view('footing/footer');
	}
	public function search_artist(){
		$this->load->model('Artist_Model');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->form_validation->set_rules('search', 'search', 'required', array('required'=>'You haven\'t typed anything to search..'));
		if($this->form_validation->run()==FALSE){
			$err_msg = validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>', '</div>');
			$this->session->set_flashdata('err', $err_msg);
			redirect('../index.php/artists');
		}
		else{
			// search for the artist
			$this->load->model('Notifications_Model');
				$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
				$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
				$data['results_msg'] = '<p class="text-dark fw-normal">The following results matched your search for <b class="text-primary">'.$this->input->post('search').'</b></p>';
				$data['search'] = $this->Artist_Model->search_artist($this->input->post('search'));
				$this->load->view('heading/header');
				$this->load->view('heading/navbar', $data);
				$this->load->view('dash/sidebar');
			$this->load->view('dash/search_artist', $data);
			$this->load->view('footing/footer');
		}
	}


	public function search_releases(){
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->form_validation->set_rules('search', 'Search', 'required', array('required'=>'You have not typed anything to search..'));
		//$this->form_validation->set_rules('search', 'search', 'required', array('required'=>'You haven\'t typed anything to search..'));
		if($this->form_validation->run()==FALSE){
			$err_msg = validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>', '</div>');
			$this->session->set_flashdata('err_msg', $err_msg);
			redirect('./Dash/releases');
		}
		else{
			$data['results_msg'] = '<p class="text-dark fw-normal">The following results matched your search for <b class="text-primary">'.$this->input->post('search').'</b></p>';
			$data['search'] = $this->Artist_Model->search_release($this->input->post('search'));
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/search_release', $data);
			$this->load->view('footing/footer');
	}
}
public function edit_profile(){
	$this->load->model('Notifications_Model');
		$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->model('Artist_Model');
	// set validation rules
	$this->form_validation->set_rules('artist_social_genre', 'Music Genre', 'required');
	$this->form_validation->set_rules('artist_social_public_location', 'Public Location', 'required');
	$this->form_validation->set_rules('artist_social_biography', 'my bio', 'required');
	if($this->form_validation->run()==FALSE){
		$this->load->view('heading/header');
		$this->load->view('heading/navbar', $data);
		$this->load->view('dash/sidebar');
		$this->load->view('dash/edit_profile');
		$this->load->view('footing/footer');
	}
	else{
		// update profile
		$artist_data = array(
			'artist_social_genre'=>$this->input->post('artist_social_genre'),
			'artist_social_public_location'=>$this->input->post('artist_social_public_location'),
			'artist_social_ispublic'=>$this->input->post('account_privacy'),
			'artist_social_biography' => $this->input->post('artist_social_biography')
		);
		$update_profile = $this->Artist_Model->update_profile($artist_data, $_SESSION['artist_account_email']);
		$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

		if(!$update_profile){
			$data['update_err']='<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
			There was a problem updating your profile
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			</div>';
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/edit_profile',$data);
			$this->load->view('footing/footer');
		}
		else{
			$data['update_success']='<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
			Your profile has been updated!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			</div>';
			$this->session->unset_userdata($artist_data);
			$this->session->set_userdata($artist_data);
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/edit_profile',$data);
			$this->load->view('footing/footer');
		}
	}
}

	public function edit_account(){
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

		// validation rules
		$this->form_validation->set_rules('artist_account_email', 'email', 'trim|valid_email|is_unique[Artists_Table.artist_account_email]', array('valid_email'=>'you need to enter a valid email'));
		$this->form_validation->set_rules('artist_account_address_zip', 'zipcode', 'trim|numeric|min_length[5]|max_length[5]', array('numeric'=>'zipcode has to be a number', 'min_length'=>'zipcode must be 5 digits long', 'max_length'=>'zipcode cannot be more than 5 digits long'));
		$this->form_validation->set_message('is_unique',    'This %s is already associated with a Nova account');
		if($this->form_validation->run()==FALSE){
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/editaccount');
		//	$this->load->view('footer');

		}
		else{
			// update account with new data
			$data = array(
				'artist_account_email'=>strtolower($this->input->post('artist_account_email')),
				'artist_account_address_street'=>$this->input->post('artist_account_address_street'),
				'artist_account_address_unit'=>$this->input->post('artist_account_address_unit'),
				'artist_account_address_city'=>$this->input->post('artist_account_address_city'),
				'artist_account_address_state'=>$this->input->post('artist_account_address_state'),
				'artist_account_address_zip'=>$this->input->post('artist_account_address_zip')
			);
			$update = $this->Artist_Model->update_acct($data, $_SESSION['artist_account_email']);
			if($update == TRUE){
				$data['update_success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
				Your account has been updated!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			  </div>';
			  $this->session->unset_userdata($data);
			  $this->session->set_userdata($data);
			  $this->load->view('heading/header');
			  $this->load->view('heading/navbar', $data);
			  $this->load->view('dash/sidebar');
			  $this->load->view('dash/editaccount',$data);
		//	  $this->load->view('footer');

			}
			else{
				$data['update_err']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
				There was a problem updating your account
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			  </div>';
			  $this->load->view('heading/header');
			  $this->load->view('heading/navbar', $data);
			  $this->load->view('dash/sidebar');
			  $this->load->view('dash/editaccount',$data);
			 // $this->load->view('footer');

			}
		}

	}

	public function edit_social(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Artist_Model');
		$this->load->model('Notifications_Model');
			$data['notifications']=$this->Notifications_Model->get_notifications($_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

		$this->form_validation->set_rules('artist_social_facebook', 'Facebook', 'required', array('required'=>'You did not enter your Facebook profile url'));
		$this->form_validation->set_rules('artist_social_instagram', 'Instagram', 'required', array('required'=>'You did not enter your Instagram profile url'));
		$this->form_validation->set_rules('artist_social_twitter', 'Twitter', 'required', array('required'=>'You did not enter your Twitter profile url'));
		$this->form_validation->set_rules('artist_social_soundcloud', 'Soundcloud', 'required', array('required'=>'You did not enter your Soundcloud profile url'));
		$this->form_validation->set_rules('artist_social_website', 'Website', 'required', array('required'=>'You did not enter your Website url'));
		$this->form_validation->set_rules('artist_social_youtube', 'YouTube', 'required', array('required'=>'You did not enter your YouTube profile url'));

		if($this->form_validation->run()==FALSE){
			$this->load->view('heading/header');
			$this->load->view('heading/navbar', $data);
			$this->load->view('dash/sidebar');
			$this->load->view('dash/edit_social');
			$this->load->view('footing/footer');
		}
		else{
				// Update their Social Media
			$socials = array(
				'artist_social_website'=>$this->input->post('artist_social_website'),
				'artist_social_instagram'=>$this->input->post('artist_social_instagram'),
				'artist_social_facebook'=>$this->input->post('artist_social_facebook'),
				'artist_social_twitter'=>$this->input->post('artist_social_twitter'),
				'artist_social_soundcloud'=>$this->input->post('artist_social_soundcloud'),
				'artist_social_youtube'=>$this->input->post('artist_social_youtube')

			);
			$edit_social = $this->Artist_Model->edit_socials($socials, $_SESSION['artist_account_email']);
			$data['msgs']=$this->Notifications_Model->get_messages($_SESSION['artist_account_email']);

			if(!$edit_social){
				$data['update_failed']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Something went wrong and we were unable to update your links.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			  </div>';
			  $this->load->view('heading/header');
			  $this->load->view('heading/navbar', $data);
			  $this->load->view('dash/sidebar');
		      $this->load->view('dash/edit_social', $data);
			  $this->load->view('footing/footer');
			}
			else{
				$data['update_success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
			    Your social media links were updated <i class="fas fa-check-circle"></i>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			  </div>';
				$this->session->unset_userdata($socials);
				$this->session->set_userdata($socials);
				$this->load->view('heading/header');
				$this->load->view('heading/navbar', $data);
				$this->load->view('dash/sidebar');
			  $this->load->view('dash/edit_social', $data);
			  $this->load->view('footing/footer');

			}
		}

	}

	public function update_pwd(){
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Artist_Model');
		$this->form_validation->set_rules('curr_pwd', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('artist_account_password', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required' => 'Please enter a secure password', 'regex_match'=>'Your password is not secure enough, please enter a secure password'));
		$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'required|trim|matches[artist_account_password]', array('required' => 'Please confirm your new password', 'matches'=>'both passwords must match'));
		if($this->form_validation->run()==FALSE){
			$errors = validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>', '</div>');
			$this->session->set_flashdata('form_err',$errors);
			redirect('./Dash/edit_account');
		}
		else{
			// check to see if current password entered is the one in use
			$pwd = password_hash($this->input->post('artist_account_password'), PASSWORD_DEFAULT);
			$is_curr_pwd = $this->Artist_Model->check_curr_pwd($_SESSION['artist_account_email'], $this->input->post('curr_pwd'));
			if($is_curr_pwd == FALSE){
				$wrong_pwd='<div class="alert alert-danger alert-dismissible fade show" role="alert">
				The "current password" must be the one you are currently using
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
			  </div>';
			  $this->session->set_flashdata('incorrect_pwd', $wrong_pwd);
			  redirect('./Dash/edit_account');
			}
			else{
				$update_pwd = $this->Artist_Model->update_pwd($_SESSION['artist_account_email'], $pwd);
				if($update_pwd == FALSE){
					$update_failed ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Unable to update your password, something went wrong
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
				  </div>';
				  $this->session->set_flashdata('update_failed', $update_failed);
				  redirect('./Dash/edit_account');
				}

				else{
					$update_success ='<div class="alert alert-success alert-dismissible fade show" role="alert">
					Your password has been updated!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="ii bet"></button>
				  </div>';
				  $this->session->set_flashdata('update_success', $update_success);
				  redirect('./Dash/edit_account');
				}
			}

		}

	}


	// function to upload user profile picture
	public function do_upload(){
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->model('Artist_Model');

					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'jpg|jpeg|png';
					$config['max_size']             = 32000;
					$config['max_width']            = 3000;
					$config['max_height']           = 3000;
					$config['remove_spaces']=true;
					$config['detect_mime']=true;
					$config['mod_mime_fix']=true;
					$config['file_name']=$_FILES['artist_social_picture']['name'];
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if(!$this->upload->do_upload('artist_social_picture')){
						$err = $this->upload->display_errors('<p class="text-danger fw-normal">', ' <i class="fas fa-exclamation-circle"></i></p>');
						$this->session->set_flashdata('upload_err',$err);
						 redirect('./editprofile');
					}
					else{
						//$profile_pic ='/uploads/'.$this->upload->do_upload('artist_social_picture');
						$uploadData = $this->upload->data();
						$profile_img = '/uploads/'.$uploadData['file_name'];
						$this->Artist_Model->upload_pic($_SESSION['artist_account_email'], $profile_img);
					//	$data = array('upload_data' => $this->upload->data());
						$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
						your profile picture was changed!
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>';
						$data = array(
						 'artist_social_picture'=>$profile_img
					 );
					 // If there is no uploaded profile pic, then upload the image the user selected
					 if($this->session->artist_social_picture =='/default_pic/avatar-1.png'){
						$this->session->unset_userdata($data);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('upload_success', $success);
						 redirect('./editprofile');
					 }
					/* if(empty('./uploads'.$_SESSION['artist_social_picture']) && $this->session->artist_social_picture == ''){
						$this->session->unset_userdata($data);
						$this->session->set_userdata($data);
						 $this->session->set_flashdata('upload_success', $success);
						 redirect('./editprofile');
					 } */
					 else{
						 // Otherwise if there is an existing picture, remove it from the uploads folder
						 unlink('./'.$_SESSION['artist_social_picture']);
						 $this->session->unset_userdata($data);
						 $this->session->set_userdata($data);
						 $this->session->set_flashdata('upload_success', $success);
						 redirect('./editprofile');
					 }

					}

	}
	// Delete trusted device but replace with the one the user is currently using 
	public function del_trusted_device($id){
		$this->load->model('Artist_Model');
		$this->load->library('user_agent');
		$delete_device = $this->Artist_Model->del_trusted_device($id);
		if($delete_device){
			// Get current device details 
			/*switch($this->agent->platform()){
				case 'Mac OS X' || 'Windows' || 'Linux':
					$desktop_platform = $this->agent->platform();
					$web_browser = $this->agent->browser();
					$browser_version = $this->agent->version();
					$ip_addr = $_SERVER['REMOTE_ADDR'];
					break;
				default:
					$desktop_platform = NULL;
					$web_browser = NULL;
					$browser_version = NULL;
					$ip_addr = NULL;
					break;
			}
			switch($this->agent->is_mobile()){
				case TRUE:
					$mobile_platform = $this->agent->mobile();
					$mobile_browser = $this->agent->browser();
					$mobile_browser_version = $this->agent->version();
					$mobile_ip_addr = $_SERVER['REMOTE_ADDR'];
					break;
				case FALSE:
					$mobile_platform = NULL;
					$mobile_browser = NULL;
					$mobile_browser_version = NULL;
					$mobile_ip_addr = NULL;
					break;
			} */
			$device_details = array(
				'artist_id'=>$this->session->artist_id,
				/*'desktop_platform'=>$desktop_platform,
				'mobile_platform'=>$mobile_platform,
				'web_browser'=>$web_browser,
				'browser_version'=>$browser_version,
				'mobile_browser'=>$mobile_browser,
				'mobile_browser_version'=>$mobile_browser_version,
				'ip_addr'=>$ip_addr,
				'mobile_ip_addr'=>$mobile_ip_addr,*/
				'user_agent'=>$this->agent->agent_string(),
				'trusted'=>1
			);
			$this->Artist_Model->register_device($device_details);
			$device_deleted = '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Your old device was deleted and replaced with the current one you are using <i class="fa fa-check-circle"></i>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>';
		  $this->session->set_flashdata('device_deleted', $device_deleted);
		  redirect('./editprofile');
		}
		else{
			$delete_error = '<div class="alert alert-danger">There was an issue deleting this trusted device <i class="fa fa-exclamation-circle"></i></div>';
			$this->session->set_flashdata('delete_error', $delete_error);
			redirect('./editprofile');
		}
	}

	public function signout(){
		$this->load->model('Artist_Model');
		$this->Artist_Model->deauthenticate($this->session->artist_id);
        if(session_destroy()){
          redirect('../index.php/Login/signin');
        }
}
}
