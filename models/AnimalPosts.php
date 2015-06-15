<?php

/**
 * Represents the object used to encapsulate database access with the
 * animal_posts database table
 */
class AnimalPosts {
    
    // the database object
    private $db;
    
    /**
     * Constructs the model
     * @param type $db The database object to use to communicate with
     * the database.
     */
    public function AnimalPosts($db) {        
        $this->db = $db;
    }

    /**
     * Retrieves the given post from the database
     * @param type $post_id The id of hte post to retrieve
     * @return type Returns the row from the database
     */
    function get_post($post_id) {
        $sql = "SELECT * FROM animal_posts WHERE id = {$post_id} LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    /**
     * Returns a list of all posts from the given user_id
     * If user_id is null, then just return ALL posts
     * @param type $user_id The user's id to return posts (can be null)
     * @return type Returns an associative array containing all of the posts
     */
    function get_all_posts($user_id) {
        if ($user_id == null) {
            $sql = "SELECT id, pet_name, species, breed, pet_from,"
                        . " age, spayed, gender FROM animal_posts";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } else {
            $sql = "SELECT id, pet_name, species, breed, pet_from,"
                    . " age, spayed, gender FROM animal_posts WHERE user_id={$user_id}";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }
        
    }
    
    /**
     * Inserts a given post's data into a row in the database
     * @param type $data The passed in associative array containing the name of
     * the database column names (AKA fields) as keys, with the data to insert
     * as the values of those keys
     * @return type Returns the id of the inserted post
     */
    function insert_post($data) {
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
        $sql = "INSERT INTO animal_posts ( {$fields} ) VALUES ( {$values} );";
        
        $insert = $this->db->prepare($sql);
        $insert->execute();
        
        return $this->db->lastInsertId();
    }
    
    /**
     * Updates a post 
     * @param type $data The associative array containing the fields to 
     * update as keys and the values to update as the key's value
     */
    public function update_post($data, $post_id) {
        $update = "UPDATE animal_posts SET ";
        
        foreach ($data as $f => $v) {
            $update .= $f . "='{$v}',";
        }
        
        // remove trailing ,
        $update = substr($update, 0, -1);
        
        // add condition to statement
        $update .= " WHERE id=" . $post_id;
                
        // prepare and execute sql statment
        $query = $this->db->prepare($update);
        $query->execute();
    }
    
    /**
     * Deletes a post
     * @param type $post_id The id of the post to delete
     */
    public function delete_post($post_id) {
        $sql = "DELETE FROM animal_posts WHERE id={$post_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    public function delete_user_posts($user_id) {
        $sql = "DELETE FROM animal_posts WHERE user_id={$user_id}";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}
