<?php

require_once "../Classes/PHPExcel.php";
include 'importExcel.php';
include 'exportcsv.php';

?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>dataTable</title>
        <!-- jQuery   -->
        <script src="https://code.jquery.com/jquery-git.min.js"></script>
        <!-- dataTables  -->
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="CSVJSON/PapaParse/papaparse.min.js"></script>
        <!--  dataTables buttons  -->
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        <!-- Spinner  -->
        <script src="spinner.js"></script>
        <!--  bootstrap  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />

    </head>

    <!-- Upload  -->
    <style lang="">
        .dataTables_wrapper .dataTables_processing {
            position: absolute;
            top: 30%;
            left: 50%;
            width: 30%;
            height: 40px;
            margin-left: -20%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background: none;
        }
    </style>

    <body style="font-family: Arial">
        <div class="container">
            <h3 class="text-center">DataTable</h3>
            <div class="col-md-2"></div>
            <div class="col-md-10">

                <!-- Table -->
                <form id="form1">
                    <div style="width: 800px; border: 1px solid black; padding: 3px">

                        <table class='table table-striped' id='datatable'>
                            <thead>
                                <tr>
                                  <?php
                                        
                                        foreach($columnArray as $dt => $dt_index){
                                            foreach($dt_index as $dt => $dt_index_val){
                                                if($dt == 'dt'){
                                                    echo '<th>'.$dt_index_val.'</th>';
                                                }
                                            }
                                        }

                                    ?>
                                </tr>
                            </thead>

                        </table>


                    </div>
                </form>

                <hr>
                <!--  Dynamic Data Modify  -->
                <button id='EditTable' class='btn btn-primary'>Edit</button>
                <!--  DOM saving  -->
                <button id='SaveTable' class='btn btn-success' disabled>Save</button>
                <hr>
                <form action="#" method="post">
                    <button id='SaveTable' class='btn btn-success' type="submit" name="exp">Download to CSV</button>
                </form>

                <hr>

                <!--  For Uploading File  -->


                <h3 class="text-center">PHP Excel</h3>
                <div class="upload row">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"><br>
                        <div class="col-md-12">
                            Select Document to upload:<br>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default"><br>
                            <input type="submit" value="Upload Document" name="submit" class="btn btn-success"><br>
                        </div>
                    </form>
                </div>
                <hr><br>
                <div class="row">
                    <div class="col-md-12">
                            <?php echo $value;?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--  Creating the content of the table  -->
        <script src="dynamicTable.js"></script>
        <script>
        </script>


    </body>
<script>
    function valueJSON(value) {
        return value;
    }

valueJSON(<?php echo json_decode($myvar)?>);

</script>


    </html>