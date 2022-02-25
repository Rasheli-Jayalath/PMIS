<?php
include_once("../../../config/config.php");
$ObjPictoAna = new PictorialAnalysis();
$ObjPictoAna3 = new PictorialAnalysis();

$file_path="photos/";
$file_thumb_path="photos/thumb/";

$pictomaxpid = $ObjPictoAna->getMaxPid(); 
while($plevelrows=$ObjPictoAna->dbFetchArray())
{
  $maxpid = $plevelrows['pid'];
}


function genRandom($char = 5){
	$md5 = md5(time());
	return substr($md5, rand(5, 25), $char);
}
function getExtention($type){
	if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/pjpeg")
		return "jpg";
	elseif($type == "image/png")
		return "png";
	elseif($type == "image/gif")
		return "gif";
	elseif($type == "application/pdf")
		return "pdf";
	elseif($type == "application/msword")
		return "doc";
	elseif($type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
		return "docx";
	elseif($type == "text/plain")
		return "doc";
		
}


$album_id=$_REQUEST['album_id'];
$palid = $_REQUEST['palid'];

if(isset($_REQUEST['delete']) && isset($_REQUEST['album_id']) && isset($_REQUEST['vid']))
{ 
 
	  ///Insert data
    $ObjPictoAna->setProperty("albumid",$_REQUEST['album_id']);
    $ObjPictoAna->setProperty("vid",$_REQUEST['vid']);
    $pictoalbumname = $ObjPictoAna->deletet027project_videos(); 

    echo "
    <script type=\"text/javascript\">
    javascript:window.close();
    </script>
";
	
}

if(isset($_REQUEST['save']))
{ 
   $v_cap=$_REQUEST['v_cap'];
	//$file_name = $_FILES['al_file']['name'];
    $file_type = $_FILES['v_al_file']['type'];
    $file_size = $_FILES['v_al_file']['size'];
	
	if(isset($_FILES["v_al_file"]["name"])&&$_FILES["v_al_file"]["name"]!="")
	{
 $allowed_extensions = array("webm","ogv","mov", "mp4", "3gp", "ogg","avi","mpeg");
 $pattern = implode ($allowed_extensions, "|");
 $extension = pathinfo($_FILES['v_al_file']['name'], PATHINFO_EXTENSION);
	//$extension=getExtention($_FILES["al_file"]["type"]);
	$file_name=genRandom(5)."-".$maxpid. ".".$extension;
   
	 if (preg_match("/({$pattern})$/i", $_FILES['v_al_file']['name']) )
        {
            if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv") || ($file_type == "video/avi")|| ($file_type == "video/mpeg"))
            
	{ 
	$target_file=$file_path.$file_name;
	if(move_uploaded_file($_FILES['v_al_file']['tmp_name'],$target_file))
	{

        ///Insert data
        $ObjPictoAna->setProperty("pid",$maxpid); 
        $ObjPictoAna->setProperty("v_cap",$v_cap); 
        $ObjPictoAna->setProperty("alfile",$file_name); 
        $ObjPictoAna->setProperty("album_id",$palid); 
        $pictoalbumname = $ObjPictoAna->setT027ProjectVideos(); 

// 	$iSQL = ("INSERT INTO pages_visit_log (log_id,request_url) VALUES ('$log_id','$activity')");
// mysql_query($iSQL);


	}
	}
	
	
		}
	}
	$v_al_file='';
	
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
  <title>Manage Videos<</title>
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
                  <h4 class="card-title">Manage Videos</h4>

                  <form class="forms-sample" action="sp_video_input.php" method="post" id="add_details" enctype="multipart/form-data" >
                    <div class="form-group row">
                    <div class="text-center col-sm-4">
                      </div>
                      <div class="text-center col-sm-4">
                       
                        <input type="text" class="form-control text-center  " type="text"  id="v_cap" name="v_cap" placeholder="Enter The Video Caption Here" Required>
                        <input class="form-control"  type="hidden" style="width:300px;" id="palid" name="palid" value="<?php echo $album_id;?>">
                      </div>
                      <div class="text-center col-sm-4">
                      </div>
                    </div>
     
                    <div class="form-group row">
                    <div class="text-center col-sm-2">
                      </div>
                      <div class="text-center col-sm-8">
                        <input  type="file" name="v_al_file" id="v_al_file"  multiple="multiple" class="form-control"  Required >
                      </div>
                      <div class="text-center col-sm-2">
                      </div>
                    </div>

          
                    <button type="submit" class="btn btn-primary me-2" name="save" id="save" style="width:20%">Submit</button>
                    <button class="btn btn-light" type="button" style="width:20%" onclick="javascript:window.close()">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

    <div class="row">

    <div class="col-sm-12" style="" id="tworow">

<table class="table table-hover">
    <thead class="" style="background-image: linear-gradient(180deg, #c9c9f5, #c9c9f5);">
        <th style="font-weight: 900;">#</th>
        <th style="font-weight: 900;">Video Cap</th>
        <th style="font-weight: 900;">Thumb</th>
        <th class="text-center "  style="font-weight: 900;">Action</th>
    </thead>
    <tbody id="table_data">
    <?php
 $ObjPictoAna3->setProperty("maxpid",$maxpid); 
 $ObjPictoAna3->setProperty("albumid",$_REQUEST['album_id']); 
 $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_video_selectvideos(); 

 $ss=1;
 while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
 {
    ?>

<tr>
        <td><?php echo $ss;?></td>
        <td><?php echo $plevelrowt027['v_cap'];?></td>
        <td>  <img src="photos/video_file_icon.jpg"  width="50" height="50"/></td>
        <td class="text-center" style="padding: 0% 6%">
        <span style="float:left">
        <form action="sp_video_input.php?vid=<?php echo $plevelrowt027['vid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post">
        <button type="submit" class="btn btn-outline-warning btn-fw  py-1 "name="edit" id="edit" value="Edit" > 
          <i class="ti-pencil" ></i> EDIT </button></form></span>
        <span style="float:right">
        <form action="sp_video_input.php?vid=<?php echo $plevelrowt027['vid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post">
        <button type="submit" class="btn btn-outline-danger btn-fw  py-1 "name="delete" id="delete" value="Del" onclick="return confirm('Are you sure?')" >
        <i class="ti-trash" ></i> DELETE </button> </form></span>
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