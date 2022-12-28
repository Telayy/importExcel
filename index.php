<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>


<div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Product Info</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-9">
                            <label for="validationCustom01">Product Name</label>
                            <input type="text" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Please provide a product name. 
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Product Category</label>
                            <input type="text" class="form-control" id="validationCustom02" required>
                            <div class="invalid-feedback">
                                Please select a product category.
                            </div>
                            </div>
                        </div>
                            <div class="form-row">
                            <div class="col-md-6 mb-9">
                            <label for="validationCustom03">Product Family</label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please select a product family.
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Model Code</label>
                            <input type="text" class="form-control" id="validationCustom04" required>
                            <div class="invalid-feedback">
                                Please provide a model code.
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-9">
                            <label for="validationCustom05">RTI Reference</label>
                            <input type="text" class="form-control" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide an RTI Reference.
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom06">Currency Rate</label>
                            <input type="text" class="form-control" id="validationCustom06" required>
                            <div class="invalid-feedback">
                                Please provide a currency rate.
                            </div>
                            </div>
                        </div>

                            <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                            <input placeholder="Select date" type="date" id="example" class="form-control">
                            <label for="example">D</label>
                            <i class="fas fa-calendar input-prefix"></i>
                            </div>
                           
                            <div class="form-row">
                            <div class="col-md-6 mb-9">
                            <label for="validationCustom01">Effectivity Date</label>
                            <input type="text" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Please provide an effectivity date.
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    
    
    <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

    

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h4>".$_SESSION['message']."</h4>";
                        unset($_SESSION['message']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Import Parts List</h4>
                    </div>
                    <div class="card-body">
                        <form action="import.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel" class="btn btn-primary mt-3">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>




</body>
</html>