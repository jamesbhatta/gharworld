<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />
    <title>Document</title>
</head>
<body>
    <!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
      <?php for($i=1; $i<=4;$i++){?>
        <li data-thumb="images/<?php echo $i?>.jpg">
        <img src="images/<?php echo $i?>.jpg" />
</li>
      <?php } ?>
   
  </ul>
</div>
<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="jquery.flexslider.js"></script>

<script type="text/javascript">
    // Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
  </script>
</body>
</html>


 

