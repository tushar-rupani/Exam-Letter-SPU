<?php include "../utils/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DAshboard </title>
     <!-- bootstrap css link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="row">
        
            <div class="button text-center">
                <!-- button*10>a.nav-link.text-light.ng-info.my-1 -->
                <button class="my-3" ><a href="details.php?insert_prof" class="nav-link text-light bg-info my-1">Insert New Professor details.</a></button>
                <button><a href="details.php?view_prof" class="nav-link text-light bg-info my-1">View Professor details</a></button>
                <button><a href="details.php?view_order" class="nav-link text-light bg-info my-1">View Order details</a></button>
            </div>
       
</div>


<div class="container my-5">
        <?php
        if(isset($_GET['insert_prof'])){
            include('insert_prof.php');
        }

        if(isset($_GET['view_prof'])){
            include('view_prof.php');
        }
        if(isset($_GET['view_order'])){
            include('view_order.php');
        }
        ?>
    </div>

<!-- bootstrap js link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>