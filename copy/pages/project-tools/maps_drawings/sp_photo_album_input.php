<?php
include_once("../../../config/config.php");
$ObjMapDrawing = new MapsDrawings();
$ObjMapDrawing2 = new MapsDrawings();


$file_path="photos/";
$file_thumb_path="photos/thumb/";

$pictomaxpid = $ObjMapDrawing->getMaxPid(); 
while($plevelrows=$ObjMapDrawing->dbFetchArray())
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

if(isset($_REQUEST['delete']) && isset($_REQUEST['album_id']) && isset($_REQUEST['dwgid']))
{ 
 
	  ///Insert data
    $ObjMapDrawing->setProperty("albumid",$_REQUEST['album_id']);
    $ObjMapDrawing->setProperty("dwgid",$_REQUEST['dwgid']);
    $pictoalbumname = $ObjMapDrawing->deletet027project_photos(); 

    echo "
    <script type=\"text/javascript\">
    javascript:window.close();
    </script>
";
	
}


if(isset($_REQUEST['save']))
{ 
    
	    $ph_cap=$_REQUEST['ph_cap'];
	
	
	    //Loop through each file
        for($i=0; $i<count($_FILES['al_file']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['al_file']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
              $shortname1 = $_FILES['al_file']['name'][$i];
			
				$ext = pathinfo($shortname1, PATHINFO_EXTENSION);
				$array_sname=explode(".",$shortname1);
				if(count($_FILES['al_file']['name'])==1 && $ph_cap!='')
				{
				$report_title=$ph_cap;
				}
				else
				{
				//$report_title= mysql_real_escape_string(trim($array_sname[0]));
				}
				$report_title_1=$array_sname[0];
				
		
		
				$file_name=genRandom(5)."-".$palid.".".$ext;
               
			 	$target_file=$file_path.$file_name;
			
              

                
                if(move_uploaded_file($tmpFilePath, $target_file)) 
                
                {
				
	
		///create thumbnail
	    $thumb=TRUE;
	    $thumb_width='150';
		if($thumb == TRUE)
        {
		
          	$thumbnail = $file_path."thumb/".$file_name;
            list($width,$height) = getimagesize($target_file);
			$thumb_height = ($thumb_width/$width) * $height;
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($target_file);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($target_file);
                    break;

                case 'png':
                    $source = imagecreatefrompng($target_file);
                    break;
			
                case 'gif':
                    $source = imagecreatefromgif($target_file);
                    break;
                default:
                    $source = imagecreatefromjpeg($target_file);
            }

            imagecopyresampled($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail);
            }

	}
	//// End thumbnails
	

                        ///Insert data
                    $ObjMapDrawing->setProperty("pid",$maxpid); 
                    $ObjMapDrawing->setProperty("orifile_name",$shortname1); 
                    $ObjMapDrawing->setProperty("ph_cap",$ph_cap); 
                    $ObjMapDrawing->setProperty("alfile",$file_name); 
                    $ObjMapDrawing->setProperty("album_id",$palid); 
                    $pictoalbumname = $ObjMapDrawing->setT027ProjectPhotos(); 

                    echo "
                    <script type=\"text/javascript\">
                    javascript:window.close();
                    </script>
                ";

	            }
				
              }
			
        }
	
	
	//header("Location: sp_photo_album_input.php?album_id=$album_id");
   
	
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
    <title>Manage Photos</title>
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

      <h3>Manage Photos</h3>
    
    <form class="form-horizontal" action="sp_photo_album_input.php" method="post" id="add_details" enctype="multipart/form-data" >
    <div class="form-group">
    <label for="email">Photo Caption</label>
    <input class="form-control"  type="text" style="width:300px;" id="ph_cap" name="ph_cap">
    <input class="form-control"  type="hidden" style="width:300px;" id="palid" name="palid" value="<?php echo $album_id;?>">
    </div>
  

  <div class="form-group">
    <label for="email">Photo(s)</label>
   <input type="file" name="al_file[]" id="al_file" multiple="multiple">
    
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
        <th>S#</th>
        <th>Photo Caption</th>
        <th>Thumb</th>
        <th>Action</th>
    </thead>
    <tbody id="table_data">

    <?php
 $ObjMapDrawing2->setProperty("maxpid",$maxpid); 
 $ObjMapDrawing2->setProperty("albumid",$_REQUEST['album_id']); 
 $pictodefaparenrfoldt027 = $ObjMapDrawing2->gett027project_photos_selectphotos(); 

 $ss=1;
 while($plevelrowt027=$ObjMapDrawing2->dbFetchArray())
 {
    ?>

<tr>
        <td><?php echo $ss;?></td>
        <td><?php echo $plevelrowt027['ph_cap'];?></td>
        <td>  <img src="<?php echo $file_path."thumb/".$plevelrowt027["al_file"];?>"  width="50" height="50"/></td>
        <td>
        <span style="float:left"><form action="sp_photo_album_input.php?dwgid=<?php echo $plevelrowt027['dwgid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post"><input type="submit" class="btn btn-warning btn-sm"name="edit" id="edit" value="Edit" /></form></span>
        <span style="float:right"><form action="sp_photo_album_input.php?dwgid=<?php echo $plevelrowt027['dwgid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post"><input type="submit" class="btn btn-danger btn-sm"name="delete" id="delete" value="Del" onclick="return confirm('Are you sure?')" /></form></span>
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