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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- bootstrap -->
    <title>Manage Albums</title>
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
  </style>
    <div class="container-fluid">
    <div class="row">
    <div class="col-sm-12" style="background-color:lavender;" id="onerow">
    <div class="row">
      <div class="col-sm-6" style="">

      <h3>Manage Albums</h3>
    
    <form class="form-horizontal" action="sp_subalbum_input.php" method="post" id="add_details">
    <div class="form-group">
    <label for="email">Album Name</label>
    <input class="form-control"  type="text" style="width:300px;" id="album_name" name="album_name">
    <input class="form-control"  type="hidden" style="width:300px;" id="palid" name="palid" value="<?php echo $parentidd;?>">
    </div>
  

  <div class="form-group">
    <label for="email">Status :</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="radio-inline">&nbsp;&nbsp;
      <input type="radio" name="status" value="1" checked>Active
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="radio-inline">&nbsp;&nbsp;
      <input type="radio" name="status" value="0">Inactive
    </label>
    
  </div>

  <button type="submit" name="save" id="save" class="btn btn-success" style="width:120px;">SAVE</button>
  <button type="button" class="btn btn-secondary" style="width:120px;">CANCEL</button>
  

 

  </form>

      </div>
      
    </div><!-- row 6 -->


</div><!-- one row -->
    <div class="col-sm-12" style="background-color:lavenderblush;" id="tworow">

<table class="table">
    <thead class="thead-dark">
        <th>#</th>
        <th>Album Name</th>
        <th>Status</th>
        <th>Action</th>
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
        <td>
        <span style="float:left"><form action="sp_subalbum_input.php?albumid=<?php echo $plevelrow031['albumid']; ?>" method="post"><input type="submit" class="btn btn-warning btn-sm"name="edit" id="edit" value="Edit" /></form></span>
        <span style="float:right"><form action="sp_subalbum_input.php?albumid=<?php echo $plevelrow031['albumid'];?>" method="post"><input type="submit" class="btn btn-danger btn-sm"name="delete" id="delete" value="Del" onclick="return confirm('Are you sure?')" /></form></span>
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