<head>
    <?php require_once '../components/css.php';?>
</head>

<?php require_once '../components/header.php';?>

<section  class="view" id="view_profiles">
        
    <?php 

        if(($_COOKIE["form_type"]=="get_profiles") and (!empty($result))){

            // setcookie("form_type", null);

            echo "<script id='tempscr'>view_profiles.hidden=false; tempscr.innerHTML=\"'executed';\"</script>";

            $result = $_SESSION["json_result"];
            $result = json_decode($result, $associative=TRUE);

            echo "<table class='table-bordered table-dark'><thead><tr class='bg-dark text-light'>";
            // echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>name</th>";
            echo "<th scope='col'>email</th>";
            echo "<th scope='col'>is_active</th>";
            echo "<th scope='col'>last_seen</th>";
            echo "</tr></thead>";
                
            foreach($result as $row){

                echo "<tr>";
                // echo "<th class='bg-light text-dark'>".$row["id"]."</th>";
                echo "<td class=''>".$row["name"]."</td>";
                echo "<td class=''>".$row["email"]."</td>";
                echo "<td class=''>".$row["is_active"]."</td>";
                echo "<td class=''>".$row["last_seen"]."</td>";
                echo "</tr>";
            }

            echo "</table>";

        }


    ?>
</section>