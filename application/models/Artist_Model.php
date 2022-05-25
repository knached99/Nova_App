<?php
class Artist_Model extends CI_Model {
public function registerArtist($artist_data) {
return $this->db->insert('Artists_Table', $artist_data);
}

public function get_device_info($device_info){
    return $this->db->insert('account_breaches', $device_info);
}
public function exists($email){
$this->db->select('*');
$this->db->from('Artists_Table');
$this->db->where('artist_account_email', $email);
$results=$this->db->get()->num_rows();
if ($results > 0){
    return true;
}
else {
    return false;
}
}

// Search for artists
public function search_artist($search){
    // Allows users to only search for artists whose accounts are public 
    $search_artist = $this->db->query("SELECT * FROM Artists_Table WHERE artist_account_name_artist LIKE '%$search%' AND artist_social_ispublic=0");
    return array('count'=>$search_artist->num_rows(), 'data'=>$search_artist->result(),'first'=>$search_artist->row());
}
 // Login verification
public function verify($email, $password)
{
    $this->db->where('artist_account_email', $email);
    $query = $this->db->get('Artists_Table');

    if($query->num_rows() == 1) {
        foreach($query->result_array() as $row){
            $right_pwd = $row['artist_account_password'];
        }  // If they enter the right password, authenticate into the dashboard and get their data
        if(password_verify($password, $right_pwd)){
            return $query->row();
        }

    }

    return false;
}


public function check_curr_pwd($email, $curr_pwd){
    $this->db->select('*');
    $this->db->from('Artists_Table');
    $this->db->where('artist_account_email', $email);
    $results = $this->db->get()->result_array();
    foreach($results as $row){
        $current_pwd = $row['artist_account_password'];
    }
    if(password_verify($curr_pwd, $current_pwd)){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

public function update_pwd($email, $pwd){
    $this->db->set('artist_account_password', $pwd);
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table');
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}


public function upload_pic($email, $profile_pic){
    $this->db->set('artist_social_picture', $profile_pic);
    $this->db->where('artist_account_email', $email);
    $upload = $this->db->update('Artists_Table');
    if($upload){
        return TRUE;
    }
    else{
        return FALSE;
    }
}
public function update_acct($data, $email){
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table', $data);
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

public function update_profile($data, $email){
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table', $data);
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

public function edit_socials($data, $email){
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table', $data);
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

public function send_code($email, $code){
    $this->db->set('artist_account_verification_code', $code);
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table');
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

public function send_reset_code($code, $email, $token_expires){

    $this->db->set('auth_token', $code);
    $this->db->set('auth_reset_status', 0);
    $this->db->set('auth_expiry', $token_expires);
    $this->db->where('artist_account_email', $email);
    $update = $this->db->update('Artists_Table');
    if($update){
        return TRUE;
    }
    else{
        return FALSE;
    }
}



public function verify_code($email, $code){
$this->db->select('*');
$this->db->from('Artists_Table');
$this->db->where('artist_account_email', $email);
$results = $this->db->get()->result_array();
foreach($results as $row){
    $verification_code = $row['artist_account_verification_code'];
}
if($code == $verification_code){
    // update the verification status
    $status = 1;
    $this->db->set('artist_account_verified', $status);
    $this->db->where('artist_account_email', $email);
    if($this->db->update('Artists_Table')){
        return TRUE;
    }
}
else{
    return FALSE;
}
}

public function verify_auth($email, $code){
  $this->db->select('*');
  $this->db->from('Artists_Table');
  $this->db->where('artist_account_email', $email);
  $results = $this->db->get()->result_array();
  foreach($results as $row){
    $auth_code = $row['auth_token'];
    $token_expiration = $row['auth_expiry'];
  }
  if($code == $auth_code && $token_expiration < date('Y-m-d h:i:sa')){
    return FALSE;
  }
  else if($code !==$auth_code){
    return FALSE;
  }
  else{
    return TRUE;
  }
}


    public function reset_pwd($pwd, $email){
        $this->db->set('artist_account_password', $pwd);
        $this->db->where('artist_account_email', $email);
        $update = $this->db->update('Artists_Table');
        if($update){
            $status = 1;
            $this->db->set('auth_reset_status', $status);
            $this->db->where('artist_account_email', $email);
            $update = $this->db->update('Artists_Table');
            if($update){
              return TRUE;
            }
        }
        else{
            return FALSE;
        }
    }

    public function get_artists(){
        // Get all the artists that have their preferences set to public
        $get_artists = $this->db->query("SELECT * FROM Artists_Table WHERE artist_social_ispublic=0");
        return array('count'=>$get_artists->num_rows(), 'data'=>$get_artists->result(),'first'=>$get_artists->row());
    }

    public function get_artist($id){
        $get_artist = $this->db->query("SELECT * FROM Artists_Table WHERE artist_id='{$id}' ");
        return array('count'=>$get_artist->num_rows(), 'data'=>$get_artist->result(),'first'=>$get_artist->row());

    }

    public function artist($id){
      $this->db->where('artist_id', $id);
      $results = $this->db->get('Artists_Table');
      return $results->row();
    }

    // change release status to In Review
    public function send_request($id){
      $this->db->set('release_status', 'In Review');
      $this->db->where('release_id', $id);
      $update = $this->db->update('Releases_Table');
      if($update){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }

    // upload release
    public function create_release($release_data){
      return $this->db->insert('Releases_Table', $release_data);
    }


    // delete release

    public function delete_release($id){
      $this->db->where('release_id', $id);
      $delete = $this->db->delete('Releases_Table');
      if($delete){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }

    public function get_release($id){
      $data = $this->db->query("SELECT * FROM Releases_Table WHERE release_id='{$id}' ");
      return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }
    // use for save_release() function
    public function release($id){
      $this->db->where('release_id', $id);
      $query = $this->db->get('Releases_Table');
      return $query->row();
    }

    public function get_releases($artist){
      $data = $this->db->query("SELECT * FROM Releases_Table WHERE release_artist_main='{$artist}' ORDER BY release_date_submitted DESC LIMIT 3 ");
      return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

    }

    public function releases($artist){
      $data = $this->db->query("SELECT * FROM Releases_Table WHERE release_artist_main='{$artist}' ORDER BY release_date_submitted DESC");
      return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

    }

    public function update_release($data, $id){
        $this->db->where('release_id', $id);
        $update = $this->db->update('Releases_Table', $data);
        if($update){
            return TRUE;
        }
        else{
            return $this->db->error();
            //return FALSE;
        }
    }
}

?>
