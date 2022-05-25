<?php
class Notifications_Model extends CI_Model {
 // Tie a notification to a user
 public function notification($id){
  $this->db->where('notification_id', $id);
  $query = $this->db->get('Notifications');
  return $query->row();
}
  public function notify_update_pwd($notification){
    return $this->db->insert('Notifications', $notification);
  }

  public function alert_user($notification){
    return $this->db->insert('Notifications', $notification);
  }

  public function request_notification($notification){
    return $this->db->insert('Notifications', $notification);
  }

  public function get_notifications($email){
    $data = $this->db->query("SELECT * FROM Notifications WHERE notification_artist_email='{$email}' AND notification_system=1 OR notification_social=1");
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }

  public function get_notification($id){
    $data = $this->db->query("SELECT * FROM Notifications WHERE notification_id='{$id}'");
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }

  public function get_messages($email){
    $data = $this->db->query("SELECT * FROM Notifications WHERE notification_artist_email='{$email}' AND notification_admin=1");
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }

  public function get_all_notifications($email){
    $data = $this->db->query("SELECT * FROM Notifications WHERE notification_artist_email='{$email}'");
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

  }

  public function del_notification($id){
    $this->db->where('notification_id', $id);
    $delete = $this->db->delete('Notifications');
        if($delete){
          return TRUE;
        }
        else{
          return FALSE;
        }
  }

  public function del_all_notifications($email){
    $this->db->where('notification_artist_email', $email);
    $delete = $this->db->delete('Notifications');
        if($delete){
          return TRUE;
        }
        else{
          return FALSE;
        }
  }

  public function notify_admin_sent_msg($user_notify){
    return $this->db->insert('Notifications', $user_notify);
  }
}
