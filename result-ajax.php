<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>

<?php 
    if (!isset($_SESSION['user_id'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 4) {
        header('Location: index.php');
    }
?>
<?php
$module= "English"; 
$term = "1";
$modules = array('1100'=>'English', '1200'=>'Psychology', '1300'=>'Sociology', '2110'=>'Anatomy & Physiology', '2120'=>'Micro Biology', '2130'=>'Pathology', '2140'=>'Pharmacology I', '2150'=>'Pharmacology II', '2160'=>'Nutrition', '2170'=>'General Science', '2310'=>'Community Health', '2320'=>'Community Health Practice', '2230'=>'First Aid', '2240'=>'First Aid Practice', '2250'=>'Fundamental of Nursing', '2260'=>'Fundamental of Nursing Practice', '2270'=>'Gynecologycal Nursing', '2280'=>'Gynecologycal Nursing Practice', '2290'=>'History of Nursing', '2210'=>'Medical Surgical Nursing', '2211'=>'Medical Surgical Nursing Practice', '2212'=>'Mental Health & Psychiatric Nursing', '2213'=>'Mental Health & Psychiatric Nursing Practice', '2214'=>'Obstetric Nursing', '2215'=>'Obstetric Nursing Practice', '2216'=>'Paediatric Nursing', '2217'=>'Paediatric Practice', '2218'=>'Professional Adjustment', '2219'=>'Ward Management', '2220'=>'Ward Management Practice', '2221'=>'Work Shop', '3100'=>'Research in Nursing');

    $module_code = $term. 'T'. array_search($module,$modules);
    // checking the validity of the module code
    $module_codes = array('1T1100','1T1200','1T1300','1T2110','1T2120','1T2250','1T2260','1T2290','2T1100','2T2110','2T2140','2T2160','2T2170','2T2250','2T2260','2T2218','3T2130','3T2150','3T2160','3T2230','3T2250','3T2260','3T2210','4T2240','4T2260','4T2270','4T2210','4T2211','4T2217','5T2280','5T2210','5T2211','5T2214','5T2216','5T2217','6T2310','6T2211','6T2215','6T2217','7T2320','7T2211','7T2212','7T2213','7T2217','8T2211','8T2217','8T2219','9T2211','9T2219','9T2220');
// Name Array
$query = "SELECT * FROM result WHERE is_deleted=0 ORDER BY id";
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
                $hint .= ", $name";
            }
        }
    }
}
    if ($hint !== ""){
        $query = "SELECT * FROM result WHERE (first_name LIKE '%{$hint}%') AND  is_deleted=0 ORDER BY id";
    }
    else {
        $query = "SELECT * FROM result WHERE is_deleted=0 ORDER BY id";
    }

    
    
  
        // valid module code
        $users = mysqli_query($connection, $query);

        verify_query($users);

        while ($user = mysqli_fetch_assoc($users)) {
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['index_no']}</td>";
            $user_list .= "<td>{$user['first_name']}</td>";
            $user_list .= "<td>{$user['last_name']}</td>";
            $user_list .= "<td >{$user["{$module_code}"]}</td>";
            $user_list .= "<td><a href=\"edit-result.php?user_id={$user['id']}&module_code={$module_code}\">Edit</a></td>";
            $user_list .= "</tr>";
        }


?>
<!DOCTYPE html>
<html lang="en">
<body>
<table class="masterlist" id = "table">
        <tr>
            <th>Index Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Grade/Marks</th>
            <th>Edit</th>
        </tr>

        <?php echo $user_list; ?>

    </table>
</body>
</html>
<?php mysqli_close($connection); ?>