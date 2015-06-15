<?php

class Users {
    
    private $db;
    
    /**
     * Constructor simply stores a local reference to the database object.
     * @param type $db The database object.
     */
    public function Users($db) {
        require 'model_helpers.php';
        $this->db = $db;
    }
    
    /**
     * Returns a user's details.
     * @param type $user_id The id of the user to return.
     * @return type Returns the row representing the user.
     */
    public function get_user($user_id) {
        $sql = "SELECT id, username, email, firstname, lastname FROM users "
                . "WHERE id = {$user_id} LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    public function insert_user($data) { 
    }
    
    /**
     * Updates a user's details.
     * @param type $data The fields and values to update.
     * @param type $user_id The id of the user to update.
     */
    public function update_user($data, $user_id) {
        
        $update = "UPDATE users SET ";
        
        foreach ($data as $f => $v) {
            $update .= $f . "='{$v}',";
        }
        
        // remove trailing ,
        $update = substr($update, 0, -1);
        
        // add condition to statement
        $update .= " WHERE id=" . $user_id;
                
        // prepare and execute sql statment
        $query = $this->db->prepare($update);
        $query->execute();
    }
    
    /**
     * Deletes a user from the database.
     * @param type $user_id The id of the user to delete.
     */
    public function delete_user($user_id) {
        $sql = "DELETE FROM users WHERE id={$user_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}
