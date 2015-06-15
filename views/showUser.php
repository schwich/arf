<!-- Header & Config -->
<?php
    include_once '../includes/arf_config.php';

    $header = file_get_contents('./header.php');
    echo $header;
    
    $arf->print_contextual_header();
?>
<style>
    .user-container {
        padding: 40px;
        padding-top: 90px;
    }
    
    h2 {
        font-weight: 200;
        letter-spacing: 2px;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    
    #no-messages {
        font-style: italic;
        margin-left: 7px;
    }
    
    .glyphicon {
        padding-right: 10px;
    }
    
    .delete {
        margin-left: 10px;
    }
    
    .controls {
        margin-left: 15px;
    }

    .controls .action {
        border-radius: 3px;
        border: 2px solid #fff;
        padding: 8px;
    }
</style>

<div class="container user-container">
    
<?php echo "<h2> Hello, " . $_SESSION['firstname'] . "</h2>"; ?>
    
<a class='btn btn-default' href='editUser.php'>
     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit User Profile
</a>
<a class='btn btn-default delete' href='../controllers/deleteUser.php?id=<?php echo $_SESSION['user_id'];?>'>
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete Account
</a>
    
<h2>Your Messages: </h2>
<!--<table class='table table-hover' style='margin-top: 10px;'>
    <tr>
        <th>Message</th>
        <th>Message Sent At</th>
        <th>Delete Message</th>
    </tr>-->

<?php
    $messages = $model_messages->get_messages($_SESSION['user_id']);
    if (empty($messages)) { 
        echo "<span id='no-messages'> No messages for you :(</span>"; 
        
    } else {
        echo "<table class='table table-hover' style='margin-top: 10px;'>"
        . "<tr>"
                . "<th>Message</th>"
                . "<th>Message Sent At</th>"
                . "<th>Delete Message</th>"
                . "</tr>";
        foreach ($messages as $message) {
            echo "<tr style='cursor: pointer;'"
                            . "onclick=\"window.document.location='showMessage.php?id=$message[id]'\">";

            $stripped_message = substr($message['message'], 1, -1);
            echo "<td>" . $stripped_message . "</td>";

            echo "<td>" . $message['created_at'] . "</td>";
            echo "<td><a class='btn btn-default' href=\"../controllers/deleteMessage.php?id=$message[id]\" >Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
    
<h2>Posts that you've created:</h2>

<?php

    $user_id = $_SESSION['user_id'];
    $posts = $model_animal_posts->get_all_posts($user_id);
    
    
    if (empty($posts)) {
        echo "You haven't created any posts! :'(";
    }  else {
        echo "<table class='table table-hover' style='margin-top: 10px;'><tr><th>Pet name</th>"
                . "<th>Pet species</th><th>Pet breed</th>"
                . "<th>Pet from:</th><th>Age</th><th>Spayed?</th><th>Gender</th>"
                . "<th>Show Post</th><th>Edit Post</th><th>Delete Post</th></tr>";
        foreach ($posts as $post) {
            echo "<tr>";
            echo "<td>" . $post['pet_name'] . "</td>";
            echo "<td>" . $post['species'] . "</td>";
            echo "<td>" . $post['breed'] . "</td>";
            echo "<td>" . $post['pet_from'] . "</td>";
            echo "<td>" . $post['age'] . "</td>";
            echo "<td>" . $post['spayed'] . "</td>";
            echo "<td>" . $post['gender'] . "</td>";
            echo "<td><a class='btn btn-default' href='../views/showPost.php?id=" . $post['id'] . "'>Show Post</a></td>";
            echo "<td><a class='btn btn-default' href='editPost.php?id=" . $post['id'] . "'>Edit Post</a></td>";
            echo "<td><a class='btn btn-default' href=\"../controllers/deletePost.php?id=$post[id]\" >Delete Post</a></td>";
            echo "</tr>";
        }
        echo "</table>";    
    }
?>
   
</div>

<!-- Footer -->
<?php
    $footer = file_get_contents('./footer.php');
    echo $footer;
?>