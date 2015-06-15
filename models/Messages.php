<?php
/**
 * This class represents the model that encapsulated database access
 * to the messages table. The messages table stores data related to 
 * in-app messaging.
 */
class Messages {
    private $db;
    
    /**
     * The constructor simply holds a local reference to the database object.
     * @param type $db The database object reference.
     */
    public function Messages($db) {
        $this->db = $db;
    }
    
    /**
     * This method returns a particular message given the message_id
     * @param type $message_id
     * @return type Return the row containing the message you want.
     */
    public function get_message($message_id) {
        $sql = "SELECT id, sender_id, created_at, message, is_read FROM messages"
                . " WHERE id=$message_id";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    /**
     * Gets all messages for a particular user.
     * @param type $user_id
     * @return type Returns all rows that represent the user's messages.
     */
    public function get_messages($user_id) {
        $sql = "SELECT id, sender_id, created_at, message, is_read FROM messages"
                . " WHERE recipient_id={$user_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    
    /**
     * Creates a message.
     * @param type $data Contains the fields and values with which to 
     * create the message row.
     * @return type Returns the id of the inserted message.
     */
    public function insert_message($data) {
        $fields = "";
        $values = "";
        
        // populate the fields and values for the insert sql statement
        foreach ($data as $f => $v) {
            $fields .= "{$f},";
            $values .= "\"$v\",";
        }
        
        // remove trailing ,
        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);
        
        // build the sql statement
        $sql = "INSERT INTO messages ( {$fields} ) VALUES ( {$values} );";
        
        //echo $sql;
        $insert = $this->db->prepare($sql);
        $insert->execute();
        
        return $this->db->lastInsertId();
    }
    
    /**
     * Deletes a message.
     * @param type $message_id The id of the message to delete.
     */
    public function delete_message($message_id) {
        $sql = "DELETE FROM messages WHERE id={$message_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    /**
     * Deletes all of a user's messages at once.
     * @param type $user_id The id of the user to delete the messages for.
     */
    public function delete_user_messages($user_id) {
        $sql = "DELETE FROM messages WHERE recipient_id={$user_id} OR sender_id={$user_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}

