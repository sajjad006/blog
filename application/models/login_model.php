<?php

/**
* 
*/
class Login_model extends CI_Model
{

    public function getUser($username, $password)
    {
        $query = $this->db->select('*')
        ->where('Username', $username)
        ->where('Password', $password)
        ->get('users');

        if($query->num_rows()){
            $row = $query->row();
            $dbusername=$row->Username;
            $dbpassword=$row->Password;

            if ($dbusername==$username && $dbpassword==$password) {
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

}