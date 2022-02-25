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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- bootstrap -->
    <title>Manage Videos</title>
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

      <h3>Manage Videos</h3>
    
    <form class="form-horizontal" action="sp_video_input.php" method="post" id="add_details" enctype="multipart/form-data" >
    <div class="form-group">
    <label for="email">Video Caption</label>
    <input class="form-control"  type="text" style="width:300px;" id="v_cap" name="v_cap">
    <input class="form-control"  type="hidden" style="width:300px;" id="palid" name="palid" value="<?php echo $album_id;?>">
    </div>
  

  <div class="form-group">
    <label for="email">Video</label>
   <input type="file" name="v_al_file" id="v_al_file" multiple="multiple">
    
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
        <th>Video Cap</th>
        <th>Thumb</th>
        <th>Action</th>
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
        <td>
        <span style="float:left"><form action="sp_video_input.php?vid=<?php echo $plevelrowt027['vid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post"><input type="submit" class="btn btn-warning btn-sm"name="edit" id="edit" value="Edit" /></form></span>
        <span style="float:right"><form action="sp_video_input.php?vid=<?php echo $plevelrowt027['vid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post"><input type="submit" class="btn btn-danger btn-sm"name="delete" id="delete" value="Del" onclick="return confirm('Are you sure?')" /></form></span>
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