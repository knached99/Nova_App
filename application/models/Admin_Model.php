<?php
class Admin_Model extends CI_Model{

  public function get_artists(){
      // Get all the artists that have their preferences set to public
      $get_artists = $this->db->query("SELECT * FROM Artists_Table");
      return array('count'=>$get_artists->num_rows(), 'data'=>$get_artists->result(),'first'=>$get_artists->row());
  }

  public function get_artist($id){
    $data = $this->db->query("SELECT * FROM Artists_Table WHERE artist_id='{$id}'");
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }

  public function exists($email){
  $this->db->select('*');
  $this->db->from('Admin_Table');
  $this->db->where('admin_account_email', $email);
  $results=$this->db->get()->num_rows();
  if ($results > 0){
      return true;
  }
  else {
      return false;
  }
  }

  public function authenticate($email, $password)
  {
      $this->db->where('admin_account_email', $email);
      $query = $this->db->get('Admin_Table');

      if($query->num_rows() == 1) {
          foreach($query->result_array() as $row){
              $right_pwd = $row['admin_account_password'];
          }  // If they enter the right password, authenticate into the dashboard and get their data
          if(password_verify($password, $right_pwd)){
              return $query->row();
          }

      }

      return false;
  }

  public function send_code($code, $email){
    $this->db->set('verification_code', $code);
    $this->db->set('verified', 0);
    $this->db->where('admin_account_email', $email);
    if($this->db->update('Admin_Table')){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
}
?>
