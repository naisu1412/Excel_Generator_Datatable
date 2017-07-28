<?php

require_once "../Classes/PHPExcel.php";

$value = "";
if(isset($_POST['submit'])){

        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        //echo $_POST["submit"];

        //Upload File

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
            // echo "Sorry, there was an error uploading your file.";
            }


    	$tmpfname = "../uploads/{$_FILES["fileToUpload"]["name"]}";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		$lastCol = $worksheet->getHighestColumn();
        $alphas = range('A', 'Z');

        $colCount = 0;
        $rowCount = $lastRow;
        for($i=0;$i<=sizeof($alphas);$i++){
           if($lastCol == $alphas[$i] ){
               $colCount = $i+1;
               break;
           }
        }
		$table = '';
      
		$table .=  "<table class='table table-striped'>";


        //create table
        for( $j = 1; $j<=$lastRow; $j++ ) {
         	$table .= "<tr>";

            for( $i = 'A'; $i<=$lastCol; $i++ ) {
                $table .= "<td>";
                //Read 
                // $table .= $worksheet->getCell($i.$j.'')->getValue();

                //Write
             	 $table .= "<input type='text' value='". $worksheet->getCell($i.$j.'')->getValue()."' id='".$i.$j."' name='".$i.$j."'>";
                $table .= "</td>";

             }

         	$table .= "</tr>";

         }

		$table .= "</table>";	
         $table .= "<input type='text' name='rowCount' id='rowCount' style='display:none;' value='".$rowCount."'>";
         $table .= "<input type='text' name='colCount' id='colCount' style='display:none;' value='".$colCount."'>";
        // $table .= " <input type='submit' >";
        // $table .= " </form>";
        $value =   $table;
}
	

?>


    <!doctype html>

    <html lang="en">

    <head>
        <meta charset="utf-8">

        <title>The HTML5 Herald</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

        <!-- ========================== Bootstrap main css ==========================  -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




        <!-- ========================== inline styling ==========================  -->
        <style lang="">
            .col-md-12 {
                background-color: #e8eed6;
                
                min-height: 800px;
            }
            
            .textarea {
                max-width: 50px;
            }
            
            .content {
                min-height: 300px;
            }
            
            input[type="text"] {
                width: 70px;
            }

            .ouput{
                padding:20px;
            }
        </style>
    </head>

    <body>
        <!-- ========================== Main Content ==========================  -->

        <div class="container">
            <h1 class="text-center">PHP Excel</h1>

            <div class="col-md-12 write">



                <form id="docxform" method="post" action="conversion.php">

                    Row: <input type="text" name="rowCount" id="rowCount" style="display:;" value="5"> Col : <input type="text" name="colCount" id="colCount" style="display:;" value="5">
                    <input type="button" id="TableGenerator" value="makeTables" class="btn btn-primary">
                    <table class="table table-striped">
                        <tr id="tableHeading"></tr>
                        <tbody id="tableContent">

                        </tbody>

                    </table>
                    <input type="submit" id="docx-button" value="Generate" class="btn btn-success">

                    <br>
                </form>


            </div>

            <div class="col-md-12 read">

                <div class="row">


                    <div class="upload">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"><br>
                            <div class="col-md-8">
                                Select Document to upload:<br>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default"><br>
                                <input type="submit" value="Upload Document" name="submit" class="btn btn-success"><br>
                            </div>
                        </form>
                    </div>
                    <hr>

                </div>

                <div class="row">

                    <div class="output">
                        <div class="col-md-12">
                        Output
                          <form id='docxform' method='post' action='download.php'>
                            <?php echo $value; ?>

                            <input type='submit' value='Generate' class='btn btn-success' >
                            </form>
                        </div>
                      
                       

                    </div>
                </div>
            </div>
        </div>

        <!-- ========================== Scripts ==========================  -->
        <!-- Bootsrap   -->

        <!-- Jquery   -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>

    <script>
        $(document).ready(function() {
            $('#TableGenerator').on('click', function() {
                $("#tableContent").empty();
                $("#tableHeading").empty();
                var alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');


                //For the heading
                for (var j = -1; j < $('#colCount').val(); j++) {
                    if (alphabet[j]) {
                        $("#tableHeading").append("<th id='Heading-" + j + "'>" + alphabet[j] + "</th>");
                    } else {
                        $("#tableHeading").append("<th id='Heading'></th>");
                    }

                }

                //For the content

                for (var i = 1; i <= $('#rowCount').val(); i++) {

                    $("#tableContent").append("<tr id='Row-" + i + "'></tr>");
                    $("#Row-" + i + "").append("<td>" + i + "</td>");
                    for (var j = 1; j <= $('#colCount').val(); j++) {

                        var idName = alphabet[j - 1] + "" + i;
                        $("#Row-" + i + "").append("<td><input type='text' id='" + idName + "' name='" + idName + "' value='" + idName + "'></td>");

                    }
                }
            });



        });
    </script>

    </html>