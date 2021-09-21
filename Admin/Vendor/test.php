<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <label for="validationCustom04">State</label>
    <select class="custom-select" id="validationCustom04" required> -->
        <?php 
            $query = "SELECT * FROM category";
            $select_category = mysqli_query($connection, $query);

            check_query_success($select_category);
            while($row = mysqli_fetch_assoc($select_category)){
                $cat_id = $row['cat_id'];;
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
        ?> 
    </select>
</body>
</html>