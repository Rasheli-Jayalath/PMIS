<?php 

include_once("../../../config/config.php");
	$ObjPictoAna1 = new PictorialAnalysis();
	$ObjPictoAna = new PictorialAnalysis();


  $file_path="pictorial_data/";

  $size=50;
  $max_size=($size * 1024 * 1024);

	$pictomaxpid = $ObjPictoAna1->getMaxPid(); 
	while($plevelrows=$ObjPictoAna1->dbFetchArray())
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


  if(isset($_REQUEST['save']))
  { 
  
    $ph_cap=$_REQUEST['ph_cap'];
    $lcid=$_REQUEST['canal_name'];

                        
      $ObjPictoAna->setProperty("lid",$ph_cap); 
      $ObjPictoAna->setProperty("lcid",$lcid); 
      $pictoalbumname = $ObjPictoAna->getGisCode(); 
      while($rowsallcompo=$ObjPictoAna->dbFetchArray())
      {
          $giscode = $rowsallcompo['giscode'];
      }
                       
    $date_p=date("Y-m-d",strtotime($_REQUEST['date_p']));

    $extension=getExtention($_FILES["al_file"]["type"]);
	  $file_name=genRandom(5)."-".$ph_cap."-".$lcid.".".$extension;

    if(($_FILES["al_file"]["type"] == "image/jpg")|| 
	($_FILES["al_file"]["type"] == "image/jpeg")|| 
	($_FILES["al_file"]["type"] == "image/gif") || 
	($_FILES["al_file"]["type"] == "image/png"))
	{ 
	$target_file=$file_path.$file_name;
	if(move_uploaded_file($_FILES['al_file']['tmp_name'],$target_file))
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
            switch($extension){
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
            switch($extension){
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
  $ObjPictoAna->setProperty("file_name",$file_name); 
  $ObjPictoAna->setProperty("ph_cap",$ph_cap); 
  $ObjPictoAna->setProperty("lcid",$lcid); 
  $ObjPictoAna->setProperty("date_p",$date_p); 
  $ObjPictoAna->setProperty("giscode",$giscode); 
  $pictoalbumname = $ObjPictoAna->setProjectPhotos(); 
	
	}
	}

  
  
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- bootstrap -->
    <title>Pictorial form</title>
</head>
<body>

<style>
   .col-sm-8{
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

    thead {
		text-align: center;	
	}

	tbody {
		text-align: center;	
	}

  button.hidden {
		display: none;
	}

    /* form{
      text-align: center;
    } */
</style>
 
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12" style="background-color:lavender;">
    <div class="row">
      <div class="col-sm-8">
        <h3>Upload Photos/Videos</h3>
      <form class="form-horizontal"  action="#" method="post" id="frm" enctype="multipart/form-data">
     <!-- <div class="form-inline"> -->
     <div class="form-group">
                
     <label for="exampleSelectGender" style="font-weight: bold;margin-top:25px">Select Component</label>
                        <select id="ph_cap" name="ph_cap" style="font-size: 14px; color: #000;background-color: #fff;" onchange="getSubComponents(this.value)" class="form-control" >
                          

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

                        <label for=" style="font-weight: bold;margin-top:25px">Select Sub Component</label>

                        <div id="subcompo_div">

                        <select  id="justforview" name="justforview" onchange=""  class="form-control"  style="font-size: 14px; color: #000;background-color: #fff;">
                        <option value="0">Select Sub Component</option>
                        </select>

                        </div>


                        <label for="" style="font-weight: bold;margin-top:25px">Select Date</label>
                        <input type="date" name="date_p" id="date_p"  class="form-control"/>

                        <label for="" style="font-weight: bold;margin-top:25px">Choose File</label>
                      <input type="file"  class="form-control custom-file" id="al_file" name="al_file" required>


    
     </div>

    
    
     <input type="hidden" class="form-control" name="pvid" id='pvid' required value='0' placeholder="">
   
     <button type="submit" name="save" id="save" class="btn btn-success" style="width:120px;">SAVE</button>
  <button type="button" class="btn btn-secondary" style="width:120px;" onclick="javascript:window.close()">CANCEL</button>
  


 </form>
      </div>
    </div><!-- class="col-sm-6" -->
   

</div><!-- class="col-sm-12" -->
    <div class="col-sm-12" style="background-color:lavenderblush;" id="tworow">
    <table class="table" id='table'>
    <thead class="thead-dark">
        <th>S#</th>
        <th>Location</th>
        <th>Date</th>
        <th>Photo</th>
        <th colspan="2">Action</th>
    </thead>
    <tbody>
    <?php
							// $sql="select * from uploadpv";
							// $res=$con->query($sql);
							// if($res->num_rows>0)
							// {
							// 	while($row=$res->fetch_assoc())
							// 	{	
							// 		echo"<tr class='{$row["upvid"]}'>
							// 			<td>{$row["upvid"]}</td>
							// 			<td>{$row["loca"]}</td>
              //       <td>{$row["date"]}</td>
              //       <td>{$row["photo"]}</td>
							// 			<td><a href='#' class='btn btn-primary edit' style='width:70px;' pvid='{$row["upvid"]}'>Edit</a></td>
							// 			<td><a href='#' class='btn btn-danger del' style='width:70px;' pvid='{$row["upvid"]}'>Delete</a></td>					
							// 		</tr>";
							// 	}
							// }
						?>
    </tbody>
</table>

</div><!-- class="col-sm-12" -->
  </div><!--  class="row"-->
</div><!-- class="container-fluid" -->
 

<script>

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		return xmlhttp;
    }


function getSubComponents(lid)
{

  var input = document.createElement("justforview");
  input.setAttribute("type", "hidden");


  //alert(lid);
	
	if (lid!=0) {
			var strURL="findcanal.php?lid="+lid;
			var req = getXMLHTTP();
			//alert(lid);
			if (req) {
				req.onreadystatechange = function() {
          //alert(req.readyState);
					if (req.readyState == 4) {
						// only if "OK"
            
						if (req.status == 200) {						
							document.getElementById("subcompo_div").innerHTML=req.responseText;						
						} else {
							alert("There was a problem while using XMLHTTP COM:\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
			}
		}
		 

}
</script>


</body>
</html>