<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="test">
    
    
    </div>
    <button class="testButton">click</button>

</body>    
</html>
<?php include "includes/footer.php"; ?>
<script>
    $(".testButton").click(function(){
        html = "<div style=\"width: 300px; height:300px; background-image: url('images/iphone1.png');\"></div>";
        console.log(html);
        $('.test').html(html);
    });
</script>
 