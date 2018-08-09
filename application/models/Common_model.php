<?php 
class Common_model extends CI_Model
{
  public function insert($table,$data){
    $this->db->insert($table,$data);
    $query = $this->db->insert_id();
    return $query;
// $q = $this->db->get_where($table, array('id' => $id));
// return $q->result();
  }
  public function select($table,$id){
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where('userId',$id);
   $query = $this->db->get();
   return $query->result();

 }
 public function select_user_address($table,$address){
   $this->db->select('*');
   $this->db->from($table);
   //$this->db->where('transaction_hash',$hash);
   $this->db->where('address',$address);
   $query = $this->db->get();
   return $query->result();

 }
 public function select_token($table,$hash,$address){
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where('transaction_hash',$hash);
   $this->db->where('address_to',$address);
   $query = $this->db->get();
   return $query->result();

 }
 public function calculatebunny($userid){
   $query =$this->db->query("SELECT
    SUM(bunny) AS Total
    FROM
    buy_token
    WHERE
    userid = $userid
    GROUP BY
    userid");
   return $query->result();
 }
 public function calculate_rasied($type){
   $query =$this->db->query("SELECT
    SUM(value) AS Total
    FROM
    buy_token
    WHERE
    type = '".$type."'
   ");
   return $query->result();
 }
 public function get_user_id($table,$link){
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where('link',$link);
   $query = $this->db->get();
   return $query;
 }
  public function get_user($table,$id){
   $this->db->select('*');
   $this->db->from($table);
   $this->db->where('id',$id);
   $query = $this->db->get();
   return $query->result();

 }
 public function insert_bonus($table,$bunny,$refrel,$remember=FALSE){
     $this->db->where('id',$refrel);
 }
 public function login($email,$password){
  $query = $this->db->select('*')
    ->where('email', $email)
    ->limit(1)
    ->order_by('id', 'desc')
    ->get('users');
  return $query->result();

}
}
?>