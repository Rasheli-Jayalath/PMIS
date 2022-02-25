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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pictorial form</title>
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
   /* .col-sm-8{
      text-align: center;
      background-color:lavender;
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
    } */

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
  table{
      box-shadow: 0px 2px 5px 1px  rgba(0, 0, 0, 0.3);
    }

    /* form{
      text-align: center;
    } */
</style>
 
<div class="container-fluid">
<div class=" grid-margin stretch-card " style = "margin-top: 3%;">
              <div class="card" style="background-image: linear-gradient(180deg, #fff, #c9c9f5);">
                <div class="card-body text-center">
                  <h4 class="card-title">Upload Photos/Videos</h4>

                  <form class="forms-sample" action="#" method="post" id="frm" enctype="multipart/form-data" >
                    <div class="form-group row">
                        <div class="text-center col-sm-4"> </div>
                          <div class="text-center col-sm-4">
                          <label for="exampleSelectGender" style="font-weight: bold;margin-top:25px">Select Component</label>
                            <select class="form-control"  id="ph_cap" name="ph_cap" style="font-size: 14px; color: #000;background-color: #fff;" onchange="getSubComponents(this.value)" class="form-control" >
                              

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
                          <div class="text-center col-sm-4"></div>
                    </div>

                    <div class="form-group row">
                        <div class="text-center col-sm-4"> </div>
                          <div class="text-center col-sm-4">
                          <label  style="font-weight: bold;margin-top:25px">Select Sub Component</label>
                            <div id="subcompo_div">
                            <select  id="justforview" name="justforview" onchange=""  class="form-control"  style="font-size: 14px; color: #000;background-color: #fff;">
                            <option value="0">Select Sub Component</option>
                            </select>
                            </div>
                          </div>
                          <div class="text-center col-sm-4"></div>
                    </div>


                    <div class="form-group row">
                        <div class="text-center col-sm-4"> </div>
                          <div class="text-center col-sm-4">
                          <label for="" style="font-weight: bold;margin-top:25px">Select Date</label>
                        <input type="date" name="date_p" id="date_p"  class="form-control"/>
                          </div>
                          <div class="text-center col-sm-4"></div>
                    </div>

                    <div class="form-group row">
                        <div class="text-center col-sm-3"> </div>
                          <div class="text-center col-sm-6">
                          <label for="" style="font-weight: bold;margin-top:25px">Choose File</label>
                      <input type="file"  class="form-control custom-file" id="al_file" name="al_file" required>
                          </div>
                          <div class="text-center col-sm-3"></div>
                    </div>
                    <input type="hidden" class="form-control" name="pvid" id='pvid' required value='0' placeholder="">

                    <button type="submit" class="btn btn-primary me-2" name="save" id="save" style="width:20%">Submit</button>
                    <button class="btn btn-light" type="button" style="width:20%" onclick="javascript:window.close()">Cancel</button>
                  </form>
                </div>
              </div>
            </div> <!--grid-margin stretch-card  -->
            
  <div class="row">

    <div class="col-sm-12" style="" id="tworow">
    <table class="table table-hover" id='table'>
    <thead class="" style="background-image: linear-gradient(180deg, #c9c9f5, #c9c9f5);">
        <th style="font-weight: 900;">S#</th>
        <th style="font-weight: 900;">Location</th>
        <th style="font-weight: 900;">Date</th>
        <th style="font-weight: 900;">Photo</th>
        <th colspan="2" class="text-center "style="font-weight: 900;">Action</th>
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