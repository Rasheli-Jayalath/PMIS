<?php 
	
	include_once("../../../config/config.php");
	$ObjPictoAna1 = new PictorialAnalysis();
	$ObjPictoAna = new PictorialAnalysis();

	$pictomaxpid = $ObjPictoAna1->getMaxPid(); 
	while($plevelrows=$ObjPictoAna1->dbFetchArray())
	{
	  $maxpid = $plevelrows['pid'];
	}


if(isset($_REQUEST['save']))
{ 

  $lid=$_REQUEST['component'];
  $subtitle=$_REQUEST['subtitle'];

  $ObjPictoAna->setProperty("lid",$lid); 
  $ObjPictoAna->setProperty("pid",$maxpid); 
  $ObjPictoAna->setProperty("subtitle",$subtitle); 
  $pictoalbumname = $ObjPictoAna->setSubLocationComponent(); 
  // while($rowsallcompo=$ObjPictoAna->dbFetchArray())
  // {
  //     $date_p = $rowsallcompo['date_p'];
  // }

        echo "
            <script type=\"text/javascript\">
            javascript:window.close();
            </script>
        ";


}

?>


<!DOCTYPE html>
<html lang="en">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Location Form</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../endors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../../../css/basic-styles.css">
 <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
    
    <style>
    .col-sm-6{
      text-align: center;
      background-color:lavender;
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
    }

    #tworow{
      padding: 20px;
    }

    h3{
      font-family: Arial, Helvetica, sans-serif;
    }

    label {
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 100%;
    }

	button.hidden {
		display: none;
	}

	thead {
		text-align: center;	
	}

	tbody {
		text-align: center;	
	}

    #inp1{
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    #back{
        float:right;
    }
    table{
      box-shadow: 0px 2px 5px 1px  rgba(0, 0, 0, 0.3);
    }
	
       
    </style>
    <div class="container-fluid">
    <div class="row">

    <div class=" grid-margin stretch-card " style = "margin-top: 3%;">
              <div class="card" style="background-image: linear-gradient(180deg, #fff, #c9c9f5);">
                <div class="card-body text-center">
                  <h4 class="card-title">Sub Component</h4>

                  <form class="forms-sample" action="location_form.php" method="post" id='frm' enctype="multipart/form-data" >
                    <div class="form-group row">
                    <div class="text-center col-sm-4">
                      </div>
                      <div class="text-center col-sm-4">
                      <label for="exampleSelectGender" style="font-weight: bold;margin-top:25px">Select Component</label>
                        <select style="font-size: 14px; color: #000;background-color: #fff;" onchange="" class="form-control" id="component" name="component">
                          

                        <?php
                         $ObjPictoAna->setProperty("maxpid",$maxpid); 
                         $pictoalbumname = $ObjPictoAna->getAllComponents(); 
                         while($rowsallcompo=$ObjPictoAna->dbFetchArray())
                         {
                             $lid = $rowsallcompo['lid'];
                             $title = $rowsallcompo['title'];
                             ?>

                             <option value="<?php echo $lid;?>" <?php if($_REQUEST['location']==$lid) {?> selected="selected" <?php }?>><?php echo $title;?></option>
                            
                            <?php
                            }
                        ?>
                       
                        </select>
                          </div>
                      <div class="text-center col-sm-4">
                      </div>
                    </div>
     
                    <div class="form-group row">
                    <div class="text-center col-sm-4">
                      </div>
                      <div class="text-center col-sm-4">
                      <label for="exampleSelectGender" style="font-weight: bold;margin-top:15px">Enter Sub Component</label>
                      <input type="text" class="form-control text-center  " type="text"id="subtitle" name="subtitle" required placeholder="Enter Sub Component Here">
                      </div>
                      <div class="text-center col-sm-4">
                      </div>
                    </div>
                    
    <input type="hidden" class="form-control" name="uid" id='uid' required value='0' placeholder="">

          
                    <button type="submit" class="btn btn-primary me-2" name="save" id="save" style="width:20%">Submit</button>
                    <button class="btn btn-light" type="button" style="width:20%"  onclick="javascript:window.close()"> Cancel</button>
                    <button type="button" id="clear" class="btn btn-warning hidden">Clear</button>
                  </form>
                </div>
              </div>
            </div>

    <div class="col-sm-12" style=";" id="tworow">
    <table class="table table-hover" id='table'>
    <thead class="" style="background-image: linear-gradient(180deg, #c9c9f5, #c9c9f5);">
        <th style="font-weight: 900;">S#</th>
        <th style="font-weight: 900;">Title</th>
        <th colspan="2"  class="text-center "style="font-weight: 900;">Action</th>
        
    </thead>
    <tbody>
    <?php
							// $sql="select * from location";
							// $res=$con->query($sql);
							// if($res->num_rows>0)
							// {
							// 	while($row=$res->fetch_assoc())
							// 	{	
							// 		echo"<tr class='{$row["lid"]}'>
							// 			<td>{$row["lid"]}</td>
							// 			<td>{$row["locat"]}</td>
							// 			<td><a href='#' class='btn btn-primary edit' style='width:70px;' uid='{$row["lid"]}'>Edit</a></td>
							// 			<td><a href='#' class='btn btn-danger del' style='width:70px;' uid='{$row["lid"]}'>Delete</a></td>					
							// 		</tr>";
							// 	}
							// }
						?>
    </tbody>
</table>
    </div><!-- tworow -->
</div><!-- class="row" -->
    </div><!-- class="container" -->

    

</body>
</html>