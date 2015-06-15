<?php

/**
 * Represents the model that encapsulates database access to 
 * the animal_post_images table.
 */
class Images {
    private $db;
    
    /**
     * Constructor simply stores a local reference to the database object.
     * @param type $db Local reference to the database object.
     */
    public function Images($db) {
        $this->db = $db;
    }
    
    /**
     * Deletes all images associated with a particular post.
     * @param type $post_id The id of the post to delete images for.
     */
    public function delete_images($post_id) {
        $sql = "DELETE FROM animal_post_images WHERE post_id=$post_id";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    /**
     * Deletes all images that a user has uploaded.
     * @param type $user_id The id of the user to delete all of the images
     * associated with all of their posts.
     */
    public function delete_user_images($user_id) {
        $sql = "DELETE FROM animal_post_images WHERE post_id IN "
           . "( SELECT id FROM animal_posts WHERE animal_posts.user_id={$user_id} )";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}

