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

if(isset($_REQUEST['delete']) && isset($_REQUEST['album_id']) && isset($_REQUEST['phid']))
{ 
 
	  ///Insert data
    $ObjPictoAna->setProperty("albumid",$_REQUEST['album_id']);
    $ObjPictoAna->setProperty("phid",$_REQUEST['phid']);
    $pictoalbumname = $ObjPictoAna->deletet027project_photos(); 

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
                    $ObjPictoAna->setProperty("pid",$maxpid); 
                    $ObjPictoAna->setProperty("orifile_name",$shortname1); 
                    $ObjPictoAna->setProperty("ph_cap",$ph_cap); 
                    $ObjPictoAna->setProperty("alfile",$file_name); 
                    $ObjPictoAna->setProperty("album_id",$palid); 
                    $pictoalbumname = $ObjPictoAna->setT027ProjectPhotos(); 

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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Photos</title>
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
                  <h4 class="card-title">Manage Photos</h4>

                  <form class="forms-sample" action="sp_photo_album_input.php" method="post" id="add_details" enctype="multipart/form-data" >
                    <div class="form-group row">
                    <div class="text-center col-sm-4">
                      </div>
                      <div class="text-center col-sm-4">
                       
                        <input type="text" class="form-control text-center  " type="text"  id="ph_cap" name="ph_cap" placeholder="Enter The Photo Caption Here" Required>
                        <input class="form-control"  type="hidden" style="width:300px;" id="palid" name="palid" value="<?php echo $album_id;?>">
                      </div>
                      <div class="text-center col-sm-4">
                      </div>
                    </div>
     
                    <div class="form-group row">
                    <div class="text-center col-sm-2">
                      </div>
                      <div class="text-center col-sm-8">
                        <input  type="file" name="al_file[]" id="al_file" multiple="multiple" class="form-control"  Required >
                      </div>
                      <div class="text-center col-sm-2">
                      </div>
                    </div>

          
                    <button type="submit" class="btn btn-primary me-2" name="save" id="save" style="width:20%">Submit</button>
                    <button class="btn btn-light" type="button" style="width:20%" onclick="javascript:window.close()" >Cancel</button>
                  </form>
                </div>
              </div>
            </div>
    <div class="row">
      
    <!-- <div class="col-sm-12" style="background-color:lavender;" id="onerow">
    <div class="row"> <div class="col-sm-6" style=""></div></div></div> -->

 

    <div class="col-sm-12" style="" id="tworow">

<table class="table  table-hover">
    <thead class="" style="background-image: linear-gradient(180deg, #c9c9f5, #c9c9f5);" >
        <th style="font-weight: 900;">S#</th>
        <th style="font-weight: 900;">Photo Caption</th>
        <th style="font-weight: 900;">Thumb</th>
        <th class="text-center "style="font-weight: 900;">Action</th>
    </thead>
    <tbody id="table_data">

    <?php
 $ObjPictoAna3->setProperty("maxpid",$maxpid); 
 $ObjPictoAna3->setProperty("albumid",$_REQUEST['album_id']); 
 $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_photos_selectphotos(); 

 $ss=1;
 while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
 {
    ?>

<tr>
        <td><?php echo $ss;?></td>
        <td><?php echo $plevelrowt027['ph_cap'];?></td>
        <td>  <img src="<?php echo $file_path."thumb/".$plevelrowt027["al_file"];?>"  width="50" height="50"/></td>
        <td class="text-center" style="padding: 0% 6%">

        <span style="float:left">
         <form action="sp_photo_album_input.php?phid=<?php echo $plevelrowt027['phid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post">
             <button type="submit" class="btn btn-outline-warning btn-fw  py-1" name="edit" id="edit" value="Edit" > 
                   <i class="ti-pencil btn-icon-prepend" ></i> EDIT 
             </button>
          </form>
        </span>

        <span style="float:right">
        <form action="sp_photo_album_input.php?phid=<?php echo $plevelrowt027['phid'] ?>&album_id=<?php echo $plevelrowt027['album_id']; ?>" method="post">
        <button type="submit" class="btn btn-outline-danger btn-fw py-1"  name="delete" id="delete" value="Delete" onclick="return confirm('Are you sure?')" > 
         <i class="ti-trash btn-icon-prepend" ></i> DELETE
        </button> 
      </form>
    </span>

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