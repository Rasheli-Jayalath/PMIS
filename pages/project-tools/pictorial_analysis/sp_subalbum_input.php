<?php
include_once("../../../config/config.php");
$ObjPictoAna = new PictorialAnalysis();
$ObjPictoAna2 = new PictorialAnalysis();

$pictomaxpid = $ObjPictoAna->getMaxPid(); 
while($plevelrows=$ObjPictoAna->dbFetchArray())
{
  $maxpid = $plevelrows['pid'];
}

$parentidd = $_REQUEST['parentid'];
$album_name = $_REQUEST['album_name'];
$palid = $_REQUEST['palid'];
$status = $_REQUEST['status'];


$file_path="photos/";

if(isset($_REQUEST['save']))
{ 
	 
	  ///Insert data
    $ObjPictoAna->setProperty("pid",$maxpid); 
    $ObjPictoAna->setProperty("album_name",$album_name); 
    $ObjPictoAna->setProperty("status",$status); 
    $ObjPictoAna->setProperty("parental_id",$palid); 
    $pictoalbumname = $ObjPictoAna->setSpSubAlbum(); 

    echo "
    <script type=\"text/javascript\">
    javascript:window.close();
    </script>
";
	
}

if(isset($_REQUEST['delete']))
{ 
	 
	  ///Insert data
    $ObjPictoAna->setProperty("albumid",$_REQUEST['albumid']);
    $pictoalbumname = $ObjPictoAna->deleteSpSubAlbum(); 

    echo "
    <script type=\"text/javascript\">
    javascript:window.close();
    </script>
";
	
}



?>


<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Manage Albums</title>
</head> -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Albums</title>
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
    #inp1{
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    table{
      box-shadow: 0px 2px 5px 1px  rgba(0, 0, 0, 0.3);
    }
  </style>
    <div class="container-fluid">
    <div class=" grid-margin stretch-card " style = "margin-top: 3%;">
              <div class="card" style="background-image: linear-gradient(180deg, #f0f0fc, #f0f0fc);">
                <div class="card-body text-center">
                  <h4 class="card-title">Manage Albums</h4>

                  <form class="forms-sample" action="sp_subalbum_input.php" method="post" id="add_details" >
                    <div class="form-group row">
                    <div class="text-center col-sm-4">
                      </div>
                      <div class="text-center col-sm-4">
                       
                      <input class="form-control"  type="text"  id="album_name" name="album_name" placeholder="Enter The Album Name Here" Required>
                        <input class="form-control"  type="hidden"  id="palid" name="palid" value="<?php echo $parentidd;?>" >
                      </div>
                      <div class="text-center col-sm-4">
                      </div>
                    </div>
     
                    <div class="form-group row">
                    <div class="text-center col-sm-2">
                      </div>
                      <div class="text-center col-sm-8">
                      <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="1" checked>
                              Active
                            </label>
                            <label class="form-check-label" style="padding-left: 10%">
                              <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="0">
                              Inactive
                            </label>
                      </div>
                      <div class="text-center col-sm-2">
                      </div>
                    </div>

          
                    <button type="submit" class="btn btn-primary me-2" name="save" id="save" style="width:20%"> Submit </button>
                    <button class="btn btn-light" type="button" style="width:20%" onclick="javascript:window.close()" >Cancel</button>
                  </form>

                </div>
              </div>
            </div>
    <div class="row">

    <div class="col-sm-12" style="" id="tworow">

<table class="table table-hover">
    <thead class="" style="background-image: linear-gradient(180deg, #c9c9f5, #c9c9f5);" >
        <th style="font-weight: 900;">#</th>
        <th style="font-weight: 900;">Album Name</th>
        <th style="font-weight: 900;">Status</th>
        <th class="text-center " style="font-weight: 900;">Action</th>
    </thead>

    <tbody id="table_data">


    <?php

$ObjPictoAna2->setProperty("maxpid",$maxpid); 
$ObjPictoAna2->setProperty("albumid",$_REQUEST["parentid"]);
$pictodefaparenrfold = $ObjPictoAna2->gett031project_albums(); 

$ss =1;
while($plevelrow031=$ObjPictoAna2->dbFetchArray())
{

    ?>
<tr>
        <td><?php echo $ss;?></td>
        <td><?php echo $plevelrow031['album_name']; ?></td>
        <td><?php echo $plevelrow031['status']; ?></td>
        <td class="text-center" style="padding: 2% 6%">
        <span style="float:left">
        <form action="sp_subalbum_input.php?albumid=<?php echo $plevelrow031['albumid']; ?>" method="post">
        <button type="submit" class="btn btn-outline-warning btn-fw  py-1 "name="edit" id="edit" value="Edit" >
          <i class="ti-pencil btn-icon-prepend" ></i> EDIT </button> </form></span>
        <span style="float:right">
        <form action="sp_subalbum_input.php?albumid=<?php echo $plevelrow031['albumid'];?>" method="post">
        <button type="submit" class="btn btn-outline-danger btn-fw  py-1 "name="delete" id="delete" value="Del" onclick="return confirm('Are you sure?')" >
        <i class="ti-trash btn-icon-prepend" ></i> DELETE</button> </form></span>
        </td>
        </tr>

        <?php
        $ss++;
}
        ?>


    </tbody>

</table>



<script>

</script>
<br>
</div><!-- tworow -->
</div><!-- class="row" -->
    </div><!-- class="container" -->
</body>
</html>