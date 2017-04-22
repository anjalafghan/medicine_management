<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="./iconfont/material-icons.css" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="js/materialize.js"></script>
  </head>
  <style media="screen">
    .card{
      width: 50%;
      margin-left: 25%;
      margin-top: 20%;
      padding: 20px;
    }
  </style>
  <body>
    <?php
    session_start();
    $total = $_SESSION['total'];
     $tax = $_SESSION['tax'];?>
     <div class="card z-depth-3">
       <div class="card-title">
        TOTAL:
&nbsp;RS.<?= $total ?>
       </div>
       <h5> CHECKOUT SUCCESSFULL!!</h5>
     </div>
  </body>
</html>
