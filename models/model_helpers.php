<?php

function sanitize_data($value) {
    // strip slashes
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($values);
    }

    $value = mysql_real_escape_string($value);
    
    return $value;
}