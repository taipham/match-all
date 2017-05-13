<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "http://match-all.com/product.php"; ?>
        <?php include 'header_nav.inc.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php include 'side_bar.inc.php';?>
            <div class="col-md-10">
                 <h3>HROBOTER</h3>

                <div class="row">

                   <?php 
                                             
                      $data = getMarketProduct('http://hroboter.com/topfiveout.php');
                      $count = 0;  
                      foreach ($data as $row) {
                        if($count >= 5)
                          break;
                        else {
                          $count++;
                           print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                             print " <div class='thumbnail'> \n";
                                print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                print " <div class='caption'> \n";
                                   print " <h5><a href='http://hroboter.com/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                    print " <h5>$ " . $row["price"] . "</h5> \n";
                                   print " <h5>" . $row["location"] . "</h5> \n";
                                   print " <div class='ratings'> \n";
                                   print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                                   print "<p>";
                                     $round_rating = round($row["avgRating"]);
                                     $avgRating = number_format($row["avgRating"], 1, '.', '');
                                     drawStars($round_rating);
                                     print "&nbsp&nbsp" . $avgRating  . " stars";
                                   print "</p>";    
                                   print " </div> \n";                          
                                print " </div> \n";
                             print " </div> \n";
                          print " </div> \n";
                        }
                      }    
                   ?>
              </div>     
            </div>
        </div>          
    </div>
    <!-- /.container -->

    <div class="container">

        <!-- Footer -->
        <?php include 'footer.inc.php';?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
