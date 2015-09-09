<?php

include_once 'config/db.php';


class Model extends Database {
    
            
    public function model_login_validate($array = array()){
        
        $username = $array['username'];
        $password = $array['password'];
        
        $q  = "SELECT count(*) as cnt,user_id "
            . "FROM vmoneydb.v_users "
            . "WHERE username='{$username}' and password = MD5('{$password}') LIMIT 1;";
        $r  = $this->db->query($q);
        $result = $r->fetch_assoc();
        
        return $result;
        
    }
    
    public function model_user_save($array = array()){
        
        $username   = $array['username'];
        $password   = MD5($array['password']);
        $active     = $array['active'];
        
        $q      = "INSERT dmp_transaction.hooq_user (`username`,`password`,`is_active`)"
                . " VALUES ('{$username}','{$password}','{$active}');";
        $r      = $this->db->query($q);
        $result = $this->db->insert_id;
        
        return $result;
    }
    
    
    public function model_register_username_validate($data){
        $q  = "SELECT count(*) as cnt "
            . "FROM vmoneydb.v_users "
            . "WHERE username='{$data}' LIMIT 1;";
        $r  = $this->db->query($q);
        $result = $r->fetch_assoc();
        
        return $result['cnt'];
    }
    
    
    public function model_register_insert_profile($array = array()){
        $q      = "INSERT vmoneydb.v_profile (`firstname`,`middlename`,`lastname`,`gender`,`homeaddress`,`emailaddress`,`mobilenumber`)"
                . " VALUES ('{$array['firstname']}','{$array['middlename']}','{$array['lastname']}','{$array['gender']}','{$array['homeaddress']}','{$array['emailaddress']}','{$array['mobilenumber']}');";
        $r      = $this->db->query($q);
        $result = $this->db->insert_id;
        
        return $result;
    }
    
    public function model_profile_user_update($array = array()){
        $q      = " UPDATE vmoneydb.v_profile a, vmoneydb.v_users b"
                . " SET ";
                
        if(isset($array['password']) && !empty($array['password'])){
        $q      .= " `b`.`password` = MD5('{$array['password']}'),";
        }
                
        $q      .= " `a`.`firstname` = '{$array['firstname']}',"
                . " `a`.`middlename` = '{$array['middlename']}',"
                . " `a`.`lastname` = '{$array['lastname']}',"
                . " `a`.`gender` = '{$array['gender']}',"
                . " `a`.`homeaddress` = '{$array['homeaddress']}',"
                . " `a`.`emailaddress` = '{$array['emailaddress']}',"
                . " `a`.`mobilenumber` = '{$array['mobilenumber']}' "
                . " WHERE `b`.`user_id` = '{$array['user_id']}'"
                . " AND `a`.`profile_id` = `b`.`profile_id`";
        $r      = $this->db->query($q);
        $result = $this->db->insert_id;
        
        return $result;
    }
    
    public function model_register_insert_user($array = array()){
        $q      = "INSERT vmoneydb.v_users (`username`,`password`,`profile_id`,`created_at`)"
                . " VALUES ('{$array['username']}',MD5('{$array['password']}'),'{$array['profile_id']}',now());";
        $r      = $this->db->query($q);
        $result = $this->db->insert_id;
        
        return $result;
    }
    
    
    public function model_profile_list(){
        $q  = 'SELECT * '
            . 'FROM vmoneydb.v_profile;';
        $r  = $this->db->query($q);
        
        $data = array();
        
        if($r->num_rows > 0){
            while($row = $r->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }
    
    
    public function model_profile_user($id){
        $q  = "SELECT * "
            . "FROM vmoneydb.v_users a, vmoneydb.v_profile b "
            . "WHERE a.user_id = '{$id}'"
            . " AND a.profile_id = b.profile_id "
            . "LIMIT 1";
        $r  = $this->db->query($q);
        $result = $r->fetch_assoc();
        
        return $result;
    }
    
    
    
}