<?php

/**
 * Arf is the top level site object. 
 * It contains methods needed in many different places, like checking login.
 */
class Arf {
    
    private $db;
    
    /**
     * Constructor that simply holds a reference to the database PDO object.
     * @param type $db Reference to the database PDO object.
     */
    public function Arf($db) {
        $this->db = $db;
    }
    
    /**
     * This helper function sanitizes a string for SQL queries.
     * @param type $value String to sanitize.
     * @return type Return the sanitized string.
     */
    public function sanitize_data($value) {
        return mysql_real_escape_string($value);
    }
    
    /**
     * Helper function that escapes a user's input.
     * @param type $string String to escape.
     * @return type Return the escaped string.
     */
    public function escape_string($string) {
        return $this->db->quote($string);
    }
    
    /**
     * Checks whether or not the user_id in the session is empty.
     * If the session is empty, the user is not logged in.
     * If the session exists, then the user is logged in. 
     * @return boolean True if user is logged in, false otherwise.
     */
    public function check_login() {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (!empty($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @return boolean Return true if user is admin, false otherwise.
     */
    public function check_if_admin() {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (!empty($_SESSION['user_id'])) {
            $row = $this->get_user($_SESSION['user_id']);
            if ($row['admin'] == 'yes') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * Logs out a user by unsetting the session variables
     * and then destroying the session.
     */
    public function log_out_user() {
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['firstname']);
        session_destroy();
    }
    
    /**
     * Helper function to return a users details.
     * @param type $user_id The id of the user to get details for.
     * @return type Return a row representing the specific user.
     */
    private function get_user($user_id) {
        $sql = "SELECT id, admin FROM users "
                . "WHERE id = {$user_id} LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
    
    /**
     * This helper function prints a contextual header, depending on a few conditions.
     * Whether a user is logged in, and if so, whether they are an admin
     */
    public function print_contextual_header () {
        $contextual_buttons = '';
        $is_logged_in = $this->check_login();
        
        $is_admin = $this->check_if_admin();
  
        if ($is_logged_in) {
            
              $contextual_buttons .= '<div class="navbar-left controls first-control">';
              $contextual_buttons .= '<a href="http://sfsuswe.com/~s15g09/views/showUser.php" class="action">YOUR ACCOUNT</a>';
              $contextual_buttons .= '</div>';
              
              // if admin show the admin panel 
              if ($is_admin) {
                $contextual_buttons .= '<div class="navbar-left controls">';
                $contextual_buttons .= '<a href="http://sfsuswe.com/~s15g09/views/showAdmin.php" class="action">ADMIN PANEL</a>';
                $contextual_buttons .= '</div>';
              }

              $contextual_buttons .= '<div class="navbar-left controls">';
              $contextual_buttons .= '<a href="http://sfsuswe.com/~s15g09/controllers/logoutUser.php" class="action">LOG OUT</a>';
              $contextual_buttons .= '</div>';
          } else {
              $contextual_buttons .= '<div class="navbar-left controls first-control">';
              $contextual_buttons .= '<a href="http://sfsuswe.com/~s15g09/views/newUser.php" class="action">REGISTER</a>';
              $contextual_buttons .= '</div>';

              $contextual_buttons .= '<div class="navbar-left controls">';
              $contextual_buttons .= '<a href="http://sfsuswe.com/~s15g09/views/loginForm.php" class="action">LOG IN</a>';
              $contextual_buttons .= '</div>';
          }

          // Inject script that inserts contextual buttons into the DOM
          echo '<script type="text/javascript">';
          echo '$(document).ready(function onReady () {';
          echo '$("#navbar").append(\'' . $contextual_buttons . '\');';
          echo '});';
          echo '</script>';
    }
}
