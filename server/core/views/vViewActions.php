<head>
    <?php require_once '../components/css.php';?>
</head>

<?php require_once '../components/header.php';?>

<section class="view" id="view_actions">
    <?php    

        if(($_COOKIE["form_type"]=="get_actions") and (!empty($result))){

            // setcookie("form_type", null);

            echo "<script id='tempscr'>view_actions.hidden=false; tempscr.innerHTML=\"'executed';\"</script>";

            $result = $_SESSION["json_result"];
            $result = json_decode($result, $associative=TRUE);

            echo "<table class='table-bordered table-dark'><thead><tr class='bg-dark text-light'>";
            // echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>name</th>";
            echo "<th scope='col'>target</th>";
            echo "<th scope='col'>value</th>";
            echo "<th scope='col'>chance</th>";
            echo "<th scope='col'>profile_id</th>";
            echo "</tr></thead>";
                
            foreach($result as $row){

                echo "<tr>";
                // echo "<th class='bg-light text-dark'>".$row["id"]."</th>";
                echo "<td class=''>".$row["act_name"]."</td>";
                echo "<td class=''>".$row["act_target"]."</td>";
                echo "<td class=''>".$row["act_value"]."</td>";
                echo "<td class=''>".$row["act_chance"]."</td>";
                echo "<td class=''>".$row["profile_id"]."</td>";
                echo "</tr>";
            }

            echo "</table>";

            
        }
    ?>
</section>