<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="search.css" rel="stylesheet">

    <title>Search Bar</title>
</head>
<style>
    body {
        background-image: url(back.jpeg);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100px;
    }
</style>

<body>
    <!-- <th> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4> Type the name of project or Department </h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">

                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search Data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <!-- </th> -->
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>students_name</th>
                                    <th>project_name</th>
                                    <th>department</th>
                                    <th>guided_by</th>
                                    <th>project_details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        $con = mysqli_connect("localhost","root","","php_college");


                                        if(isset($_GET['search']))
                                        {
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM main WHERE CONCAT(project_name,deparnment) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0 ){
                                                foreach($query_run as $items){
                                                    ?>
                                <tr>
                                    <td>
                                        <?= $items['students_name'];?>
                                    </td>
                                    <td>
                                        <?= $items['project_name'];?>
                                    </td>
                                    <td>
                                        <?= $items['deparnment'];?>
                                    </td>
                                    <td>
                                        <?= $items['guided_by'];?>
                                    </td>
                                    <td>
                                        <?= $items['project_details'];?>
                                    </td>



                                </tr>
                                <?php

                                                }

                                            }
                                            else{

                                                ?>
                                    <tr>
                                        <td colspan="5">
                                            No Record found
                                        </td>
                                    </tr>

                                    <?php

                                            }
                                        }   
                                    
                                    ?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>



        </div>

    </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>