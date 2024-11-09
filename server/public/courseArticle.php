<?php
    // Check if the 'id' parameter exists in the GET request
    if (isset($_GET['id'])) {
        // If it exists, echo its value
        $id = intval($_GET['id']);
        if($id){
            $invalidId = False;
        } else{
            $invalidId = True;
        }
    } else{
        $invalidId = True;
    }
    if($invalidId){
        // If it doesn't exist, display a message
        echo "the 'id' parameter is required";
        header('Location: ./courses.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<!-- INCLUDE PARTICLE EFFECT CONTAINER -->
<div id="particles-js"></div> 
<!-- INCLUDE HEAD ELEMENT -->
<?php require 'components/head.php'; ?>
<body>
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <div class="ver-2"></div>
    <main class="main">
        <script>
            const id = <?php echo $id?>;
            fetch(`courses/${id}.json`)
            .then((res) => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`);
                }
                return res.json();
            })
            .then((data) => {
                const name = data.name
                
            })
            .catch((error) =>
                console.error("Unable to fetch data:", error));
                // window.location.href = "./courses.php";
        </script>
    </main>
    <script></script>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>