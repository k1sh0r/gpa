
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include'db.php';
?>
</head>
<body>
    <!-- Begin page -->

    <div id="layout-wrapper">
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                        <form class="row" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                                        <div class="col-sm-12 col-md-3">
                                            <h4 class="card-title">GPA Calculator</h4>
                                            <p class="card-subtitle mb-4">
                                                Enter Your Details
                                            </p>

                                        </div>
                                        
                                        <div class="col-sm-12 col-md-3">
                                            <!--<div class="btn-group mb-2">
                                                <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Semester <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <input type="submit" class="dropdown-item" name="sem" value="1" id="1">
                                                    <input type="submit" class="dropdown-item" name="sem" value="2" id="2">
                                                    <input type="submit" class="dropdown-item" name="sem" value="3" id="3">
                                                    <input type="submit" class="dropdown-item" name="sem" value="4" id="4">
                                                    <input type="submit" class="dropdown-item" name="sem" value="5" id="5">
                                                    <input type="submit" class="dropdown-item" name="sem" value="6" id="6">
                                                    <input type="submit" class="dropdown-item" name="sem" value="7" id="7">
                                                    <input type="submit" class="dropdown-item" name="sem" value="8" id="8">
                                                </div>
                                            </div>-->
                                                <div class="form-group">
                                                    <select class="form-control" name="sem">
                                                        <option value="">Semester</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select>
                                                </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-3">
                                            <!--<div class="btn-group mb-2">
                                                <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Department <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    

                                                    <input type="submit" class="dropdown-item" name="dept" value="CSE" id="CSE">
                                                    <input type="submit" class="dropdown-item" name="dept" value="ECE" id="ECE">
                                                    <input type="submit" class="dropdown-item" name="dept" value="MECH" id="MECH">
                                                    <input type="submit" class="dropdown-item" name="dept" value="IT" id="IT">
                                                    <input type="submit" class="dropdown-item" name="dept" value="AGRI" id="AGRI">
                                                    <input type="submit" class="dropdown-item" name="dept" value="CIVIL" id="CIVIL">
                                                    <input type="submit" class="dropdown-item" name="dept" value="BME" id="BME">
                                                    </div>
                                                </div>-->
                                                
                                                    <div class="form-group">
                                                        <select class="form-control" name="dept">
                                                        <option value="">Department</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="MECH">MECH</option>
                                                        <option value="IT">IT</option>
                                                        <option value="AGRI">AGRI</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="BME">BME</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            <div class="col-sm-12 col-md-3">
                                            <div class="btn-group mb-2">
                                                <input class="btn btn-danger waves-effect waves-light" name="submit" type="submit" value="Submit">
                                            </div>
                                            </div>
                                    </form>

                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th class="mob">Subject Code</th>
                                                <th>Credits</th>
                                                <th>Grade</th>
                                                <th class="mob">Semester</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                    <?php
                                    if(isset($_GET['submit']))
                                    {
                                    $deptt=$_GET['dept'];
                                    $semm=$_GET['sem'];
                                    $result=mysqli_query($conn,"SELECT * FROM subjects");

                                    if ($semm) {
                                        $result=mysqli_query($conn,"SELECT * FROM subjects WHERE sem='$semm'");
                                    }
                                   
                                    if ($deptt) {
                                        $result=mysqli_query($conn,"SELECT * FROM subjects WHERE dept='$deptt'");
                                    }
                                    
                                    if ($semm&&$deptt) {
                                        $result=mysqli_query($conn,"SELECT * FROM subjects WHERE sem='$semm' AND dept='$deptt'");
                                    }

                                    while($r=mysqli_fetch_array($result))
                                    {
                                        
                                        
                                            $scode = $r[0];
                                            $credits=$r[4];
                                            $sem=$r[2];
                                            $name=urlencode($r[1]);
                                            
                                            
                                    echo "<tr><td>".$r[1]."</td>";
                                    echo "<td class='mob'>".$r[0]."</td>";
                                    echo "<td>".$r[4]."</td>";
                                    echo "
                                                <td><div class='btn-group mb-2'>
                                                <button class='btn btn-light btn-sm dropdown-toggle waves-effect waves-light' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Choose Grade <i class='mdi mdi-chevron-down'></i>
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' href=''>O</a>
                                                    <a class='dropdown-item' href=''>A+</a>
                                                    <a class='dropdown-item' href=''>A</a>
                                                    <a class='dropdown-item' href=''>B+</a>
                                                    <a class='dropdown-item' href=''>B</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='#'>RA</a>
                                                </div>
                                            </div></td>
                                            ";
                                    echo "<td class='mob'>".$r[2]."</td></tr>";
                                    }
                                    if (!$result) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                    }
                                }

                                    ?>
                                       
                                        </tbody>

                                    </table>
                                </div>
                                    <input class="btn btn-danger waves-effect waves-light" type="submit" style="float: right;" value="Submit">

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    </div>
                </div>
            </div>
        </div>

                    <!-- end row-->

                    
</body>
</html>