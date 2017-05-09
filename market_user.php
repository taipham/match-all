<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "market_user.php"?>
        <?php include 'header_nav.inc.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

             <?php include 'side_bar.inc.php';?>


            <div class="col-md-10">

                <div class="row class='table-responsive'">
                <h3>Auto User</h3>
                <p> Name: Phong Dong </p>
		<p> Websites: <a href='http://match-all.com/matchall'>http://match-all.com/matchall</a> </p>
                
                 <?php 
                        try
                          {
                            $conn = getConnectionPDO();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $query = " select userFirst as 'First Name', userLast as 'Last Name' " .
                                     " , userEmail as 'Email' " .
                                     " , userGender as 'Gender', cellPhone as 'Cell Phone' " .
                                     " , address as 'Address', city as 'City', state as 'State' " .
                                     " , zip as 'Zip Code' " .
                                     "  from User ";
                            
                            $params = null;
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);

                            
                           if (count($data) > 0)
                            constructTable($data, true, "", "", "");
                           else
                              print "<h3>There is no user</h3>\n";

                    			    //Soccer GearX User
                                                // Initialize cURL session
                    			    $ch = curl_init();
                    			    
                    			    // Set the URL of the page file to download.
                    			    curl_setopt($ch, CURLOPT_URL, 'http://taipham.info/users/list_users.php');
                    			
                    			    // Ask cURL to write the contents to a file
                    			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    			    
                    			    //Execute the c session
                    			    $content = curl_exec($ch);
                    			    
                    			    // Close cURL session 
                    			    curl_close($ch);
                    			    // Close file
                    			    
                    			    
                    			    echo "<h3>Soccer GearX User</h3> ";
                    			    echo "<p> Name: Tai Pham </p>";
                    			    echo "<p> Websites: <a href='http://taipham.info'>taipham.info</a> </p>" . $content;
                    			    
                                                       

                          }
                          catch (PDOException $ex)
                          {
                                echo 'ERROR: ' . $ex->getMessage();
                          }
                          catch (Exception $ex)
                          {
                                echo 'ERROR: ' . $ex->getMessage();
                          }

                  ?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

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
