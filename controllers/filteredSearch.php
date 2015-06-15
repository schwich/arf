<?php

include_once '../includes/db_connect.php';

// these are all of the possible filter values
$species_cat = $_POST['cat'];
$species_dog = $_POST['dog'];
$homed = $_POST['homed'];
$sheltered = $_POST['sheltered'];
$male = $_POST['male'];
$female = $_POST['female'];
$spayed_yes = $_POST['spayed_yes'];
$spayed_no = $_POST['spayed_no'];
$age_lessthan1y = $_POST['age_lessthan1y'];
$age_1yto3y = $_POST['age_1yto3y'];
$age_3yto10y = $_POST['age_3yto10y'];
$age_morethan10y = $_POST['age_morethan10y'];

// this is the beginning of the search query
$search_query = "SELECT * FROM animal_posts";

// this array will hold all of the set conditions
$conditions = array();

// if the particular filter has a value (has been set)
// then add it to the conditions array
if (isset($species_cat)) {
    $conditions[] = "species = 'cat'";
}
if (isset($species_dog)) {
    $conditions[] = "species = 'dog'";
}
if (isset($homed)) {
    $conditions[] = "pet_from = 'home'";
}
if (isset($sheltered)) {
    $conditions[] = "pet_from = 'shelter'";
}
if (isset($male)) {
    $conditions[] = "gender = 'male'";
}
if (isset($female)) {
    $conditions[] = "gender = 'female'";
}
if (isset($spayed_yes)) {
    $conditions[] = "spayed = 'yes'";
}
if (isset($spayed_no)) {
    $conditions[] = "spayed = 'no'";
}

if (isset($age_lessthan1y)) {
    $conditions[] = "age < 1";
}
if (isset($age_1yto3y)) {
    $conditions[] = "age < 3 AND age >= 1";
}
if (isset($age_3yto10y)) {
    $conditions[] = "age < 10 AND age >= 3";
}
if (isset($age_morethan10y)) {
    $conditions[] = "age > 10";
}

// finally, if there are conditions, add them to the SQL statement
if (count($conditions) > 0) {
    $search_query .= " WHERE " . implode(' OR ', $conditions);
}

$sql = $db->prepare($search_query);
$sql->execute();
            
$result = $sql->setFetchMode(PDO::FETCH_ASSOC);

echo "<table class='table table-hover' style='margin-top: 15px;'><tr><th>Pet name</th>"
    . "<th>Pet species</th><th>Pet breed</th><th>Homed or Sheltered</th>"
        . "<th>Age</th><th>Spayed</th><th>Gender</th>"
        . "<th>Pet Bio</th></tr>";

    // for each row in the whole table
    while ($row = $sql->fetch()) {
        echo "<tr style='cursor: pointer;'"
        . "onclick=\"window.document.location='../views/showPost.php?id=$row[id]'\">";
        echo "<td>" . $row['pet_name'] . "</td>";
        echo "<td>" . $row['species'] . "</td>";
        echo "<td>" . $row['breed'] . "</td>";
        echo "<td>" . $row['pet_from'] . "</td>";
        echo "<td>" . $row['age'] > "</td>";
        echo "<td>" . $row['spayed'] > "</td>";
        echo "<td>" . $row['gender'] > "</td>";
        echo "<td>" . $row['pet_bio'] . "</td>";
        echo "</tr>";
    }

echo "</table>";
