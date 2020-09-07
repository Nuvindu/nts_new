<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
// Name Array
$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY index_no";
$user_list = '';
$users = mysqli_query($connection, $query);
while ($user = mysqli_fetch_assoc($users)) {
        $a[] = $user['first_name'];
}

// Get the Search Query from the Form
$q = $_REQUEST["q"];

$hint = "";

// Go through the Name array to find a match - As long as query is not left empty
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $x = $hint;
                $hint='';
                $len = strlen($name);
                for ($i = 0; $i <= $len-1; $i++) {
                    if ($x[$i]==$name[$i]){
                        $hint .= "$name[$i]";
                    }
                    else{ break; }
                }
                
            }
        }
    }
    if ($hint !== ""){
        $query = "SELECT * FROM user WHERE (first_name LIKE '%{$hint}%')  AND  is_deleted=0 ORDER BY index_no";
    }
    else if (startsWith($q,"s") || startsWith($q,"l") || startsWith($q,"o")){
        $query = "SELECT * FROM user WHERE (type LIKE '%{$q}%')  AND  is_deleted=0 ORDER BY index_no";
    }
    else {
        $query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY index_no";
    }

}
$users = mysqli_query($connection, $query);
while ($user = mysqli_fetch_assoc($users)) {
        $user_list .= "<tr>";
        $user_list .= "<td>{$user['index_no']}</td>";
        $user_list .= "<td>{$user['first_name']}</td>";
        $user_list .= "<td>{$user['last_name']}</td>";
        $user_list .= "<td>{$user['last_login']}</td>";
        $user_list .= "<td>{$user['type']}</td>";
        $user_list .= "<td><a href=\"modify-user.php?user_index={$user['index_no']}\">Edit</a></td>";
        $user_list .= "<td><a href=\"delete-user.php?user_index={$user['index_no']}\">Delete</a></td>";
        $user_list .= "</tr>";
}

?>