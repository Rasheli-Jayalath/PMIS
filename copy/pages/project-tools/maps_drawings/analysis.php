<?php
include_once("../../../config/config.php");
$ObjMapDrawing  = new  MapsDrawings();
$ObjMapDrawing2 = new MapsDrawings();
$ObjMapDrawing3 = new MapsDrawings();
$ObjMapDrawing4 = new MapsDrawings();

//$data_url="../../../images/photos/";

$file_path="pictorial_data";
$data_url="photos/";

$album_idd=$_REQUEST['album_id'];


$pictomaxpid = $ObjMapDrawing->getMaxPid(); 
while($plevelrows=$ObjMapDrawing->dbFetchArray())
{
  $maxpid = $plevelrows['pid'];
}  
if(isset($album_idd)&&!empty( $album_idd))
 {
  $ObjMapDrawing4->setProperty("maxpid",$maxpid); 
  $ObjMapDrawing4->setProperty("albumid",$album_idd); 
  $pictoalbumname = $ObjMapDrawing4->gett031project_albums_alname(); 
  while($plevelrowtalname=$ObjMapDrawing4->dbFetchArray())
  {
      $status = $plevelrowtalname['status'];
      $album_name = $plevelrowtalname['album_name'];
  }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pictorial Analysis</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../../../css/basic-styles.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
  
  <!-- CSS scrollbar style -->
  <link id="pagestyle" href="../../../css/scrollbarStyle.css" rel="stylesheet" />

 <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- bootstrap -->
  <style>
        .margintopCSS {
          margin-top:10px;
        }   
.new_div li {
    list-style: outside none none;
} 
.img-frame-gallery {
    background: rgba(0, 0, 0, 0) url("../../../images/images/frame.png") no-repeat scroll 0 0;
    float: left;
    height: 130px;
    padding: 50px 0 0 6px;
    width: 152px;
	padding-left: 21px !important;
}
.imageTitle {
    color: #464646;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    font-weight: normal;
}
.rl-p0{
  padding-left:0;
  padding-right:0;
  padding-bottom: 0;
}
    </style>
</head>
<body>
  <div class="container-scroller">
     <!-- partial:partials/_navbar.html -->
     <div id="partials-navbar"></div>
     <!-- partial -->
     <div class=" page-body-wrapper" id="pagebodywraper">
       <!-- partial:partials/_sidebar.html -->
       <div class="sidebar sidebar-offcanvas" id="partials-sidebar-offcanvas"></div>
       <!-- partial -->

      <div class="main-panel " id="mainpanel">
      <div class="content-wrapper" style="">
          <!-- Page Data Goes Here -->
  <div class="row">
    <div class="col-sm-3">
    <div style="background-color:#fff;padding: 20px; border-radius: 15px;margin-right: -10px;">

          <div class="row " style="align-content:center; font-weight: bold; margin-bottom: 20px; margin-top: 1px; justify-content: center;">
          Search
          </div>
          <div class="main">
          <form action="#"> 
            <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Folder</label>
                      <div class="col-sm-7 rl-p0" >
                      <select style="font-size: 14px; color: #000;background-color: #fff;" onchange="getCanals(this.value)" class="form-control" id="location" name="location">
                      <option value="" >select  </option>
                          <?php
                           $ObjMapDrawing->setProperty("maxpid",$maxpid); 
                           $pictoalbumname = $ObjMapDrawing->getAllFolders(); 
                           while($rowsallcompo=$ObjMapDrawing->dbFetchArray())
                           {
                               $albumid = $rowsallcompo['albumid'];
                               $album_name = $rowsallcompo['album_name'];
                               ?>
  
                               <option value="<?php echo $albumid;?>"  ><?php echo $album_name;?></option>
                              
                              <?php
                              }
                          ?>
                          </select>
                      </div>
           </div>
           <div id="canal_div"> </div>
           <div class="form-group " id="location_div"></div>   
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Drawing Type</label>
                      <div class="col-sm-7 rl-p0" >
                      <select style="font-size: 14px; color: #000;background-color: #fff;" class="form-control"  name="" >
                        <option value="" >select  </option>
                        <option value="Design" >Design</option>
                        <option value="Survey"  >Survey</option>
                        <option value="Others"  >Others</option>
                        <option value="All"  >All</option>
                      </select>
                      </div>
           </div>
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Drawing No</label>
                      <div class="col-sm-7 rl-p0" >
                        <input type="text" style="margin: 0;"class="form-control"  >
                      </div>
           </div>
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Document Title</label>
                      <div class="col-sm-7 rl-p0" >
                        <input type="text" style="margin: 0;"class="form-control"  >
                      </div>
           </div>
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Drawing Date</label>
                      <div class="col-sm-7 rl-p0" >
                        <input type="text" style="margin: 0;"class="form-control"  >
                      </div>
           </div>
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Revision No</label>
                      <div class="col-sm-7 rl-p0" >
                        <input type="text" style="margin: 0;"class="form-control"  >
                      </div>
           </div>
           <div class="form-group row" >
                      <label  style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Drawing Status</label>
                      <div class="col-sm-7 rl-p0" >
                      <select style="font-size: 14px; color: #000;background-color: #fff;" class="form-control"  name="" >
                        <option value="" >select  </option>
                        <option value="2" <?php if($dwg_status=='2')echo "selected";?>>Approved</option>
                        <option value="1" <?php if($dwg_status=='1')echo "selected";?>>Initiated</option>
                        <option value="3" <?php if($dwg_status=='3')echo "selected";?>>Not Approved</option>
                        <option value="4" <?php if($dwg_status=='4')echo "selected";?>>Under Review</option>
                        <option value="5" <?php if($dwg_status=='5')echo "selected";?>>Response Awaited</option>
                        <option value="7" <?php if($dwg_status=='7')echo "selected";?>>Responded</option>
                      </select>
                      </div>
           </div>
          <div style="text-align: center;">
              <button type="submit" class="btn btn-primary" onclick=""  id="but2" style="margin-bottom: 25px;">View</button>
          </div>
          </form>
          <div style="vertical-align:top; margin:5px 0px 0px 5px; padding:5px 0px 0px 5px;" id="Gallery_View">
   <?php 
 if($_REQUEST['date_p']!=0 && $_REQUEST['location']!=0 && $_REQUEST['canal_name']!=0 && $_REQUEST['date_p2']!=0)
 {
  $ObjMapDrawing->setProperty("pid",$maxpid); 
  $ObjMapDrawing->setProperty("ph_cap",$_REQUEST['location']); 
  $ObjMapDrawing->setProperty("lcid",$_REQUEST['canal_name']); 
  $ObjMapDrawing->setProperty("date_p",$_REQUEST['date_p']); 
  $ObjMapDrawing->setProperty("date_p2",$_REQUEST['date_p2']); 
  $pictoalbumname = $ObjMapDrawing->getGalleryPictures(); 
  while($plevelrowspics=$ObjMapDrawing->dbFetchArray())
  {

    ?>

<strong><?php echo $plevelrowspics['title']."&nbsp; as on &nbsp;&nbsp;".date('d F, Y',strtotime($plevelrowspics['date_p'])); ?>:</strong>
<a href="<?php echo $file_path."/".$plevelrowspics['al_file']; ?>" data-lightbox="roadtrip" data-title="" style="text-decoration:none">
<img src="<?php echo $file_path."/thumb/".$plevelrowspics['al_file']; ?>" title="<?php echo date('d F, Y',strtotime($plevelrowspics['date_p'])); ?>"  style=" border:3px solid #000; border-radius:6px;margin-top:10px;"  width="270px" /></a>
			<br/><br/>

    <?php
  }   
 } 
 ?>       
</div> 
          </div><!-- class="main" -->

    </div>
  </div><!-- class="col-sm-3 -->

    <div class="col-sm-9" >
    <div style="background-color:#fff;padding: 20px; border-radius: 15px;margin-left: -10px;height: 100%;">
    <div>
    
    <div class="row" style="margin-right: 20px; margin-bottom:10px">
    <h4 class="col-sm-5">Drawings and Maps</h4> 
    <?php 
    if($_REQUEST['album_id']){
    ?>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" id="but3"> View Drawings </button>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" onclick="window.open('sp_subalbum_input.php?parentid=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Drawing Folders</button>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" onclick="window.open('sp_photo_album_input.php?album_id=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Drawings</button>
    <?php
   } 
   ?>
    </div>
    
    <!-- Albums Goes Here -->
<table width="100%" style="margin:0px; border:0px; padding:0px">
			<tbody>
              <tr>
              <td width="90%" valign="top" style="margin:0px; border:0px; padding:0px">
              <?php 
if(isset($_REQUEST["album_id"])&&!empty($_REQUEST["album_id"]))
{
  $cm=0;
  $ObjMapDrawing2->setProperty("maxpid",$maxpid); 
  $ObjMapDrawing2->setProperty("albumid",$_REQUEST["album_id"]);
  $pictodefaparenrfold = $ObjMapDrawing2->gett031project_albums(); 
  while($plevelrow031=$ObjMapDrawing2->dbFetchArray())
  {
    $album_id = $plevelrow031['albumid'];
    $album_name = $plevelrow031['album_name'];
    $ObjMapDrawing3->setProperty("maxpid",$maxpid); 
    $ObjMapDrawing3->setProperty("albumid",$album_id); 
    $pictodefaparenrfoldt027 = $ObjMapDrawing3->gett027project_photos(); 
    if($ObjMapDrawing3->totalRecords() > 0)
      {
    while($plevelrowt027=$ObjMapDrawing3->dbFetchArray())
    {
        $al_file_r = $plevelrowt027['al_file'];
      $cm++;
    }
  }
  else
      {
        $al_file_r="no_image.png";
      }

?>
<div class="new_div">
    <li  class="dfwp-item" >
        <div  style="float:left;width:152px;margin-right:8px;">
            <a  href="analysis.php?album_id=<?php echo $album_id; ?>" >
            <div class="img-frame-gallery">	
            <img width="80" height="80" alt="" border="0" align="top" src="<?php echo $data_url."thumb/".$al_file_r; ?>">
            </div>
            </a>
            <div align="center" class="imageTitle" style="padding-top:5px; font-weight:bold">
            <?php echo  $album_name; ?></div>
        </div>
  </li>
</div>
<?php
}
}
else{
                    $cm=0;
                    $ObjMapDrawing2->setProperty("maxpid",$maxpid); 
                    $pictodefaparenrfold = $ObjMapDrawing2->gett031project_albumsparent0(); 
                    while($plevelrow031=$ObjMapDrawing2->dbFetchArray())
                    {
                      $album_id = $plevelrow031['albumid'];
                      $album_name = $plevelrow031['album_name'];

                      $ObjMapDrawing3->setProperty("maxpid",$maxpid); 
                      $ObjMapDrawing3->setProperty("albumid",$album_id); 
                      $pictodefaparenrfoldt027 = $ObjMapDrawing3->gett027project_photos(); 
                       if($ObjMapDrawing3->totalRecords() > 0)
                              {
                                   while($plevelrowt027=$ObjMapDrawing3->dbFetchArray())
                                      {
                                          $al_file_r = $plevelrowt027['al_file'];
                                        $cm++;
                                      }
                              }
                        else
                            {
                               $al_file_r="no_image.png";
                            }
                    
                ?>
                <div class="new_div">
                      <li  class="dfwp-item" >
                          <div  style="float:left;width:152px;margin-right:8px;">
                              <a  href="analysis.php?album_id=<?php echo $album_id; ?>" >
                              <div class="img-frame-gallery">	
                              <img width="80" height="80" alt="" border="0" align="top" src="<?php echo $data_url."thumb/".$al_file_r; ?>">
                              </div>
                              </a>
                              <div align="center" class="imageTitle" style="padding-top:5px; font-weight:bold">
                              <?php echo  $album_name; ?></div>
                          </div>
                    </li>
                </div>

                <?php
                   
                  }
              }     
                ?>
              <!-- <div class="new_div">
                      <li  class="dfwp-item" >
                          <div  style="float:left;width:152px;margin-right:8px;">
                              <a  href="analysis.php?album_id=<?php echo $album_id; ?>" >
                              <div class="img-frame-gallery">	
                              <img width="80" height="80" alt="" border="0" align="top" src="<?php echo $data_url."thumb/"."no_image.png"; ?>">
                              </div>
                              </a>
                              <div align="center" class="imageTitle" style="padding-top:5px; font-weight:bold">
                              <?php echo  $album_name; ?>Album Name Goes</div>
                          </div>
                    </li>
              </div> -->
            </td>
            </tr>

            <?php
if(isset($_REQUEST["album_id"])&&!empty($_REQUEST["album_id"]))
{
  ?>
  <tr style="background: #E6E6E6; height:32px">
  <td style="font-size:18px; font-weight:bold; padding-left:3px; ">Photos
  </td>
  </tr>
  <tr>
    <td>
<?php
                      $ObjMapDrawing3->setProperty("maxpid",$maxpid); 
                      $ObjMapDrawing3->setProperty("albumid",$_REQUEST["album_id"]); 
                      $pictodefaparenrfoldt027 = $ObjMapDrawing3->gett027project_photos_selectphotos(); 
                       if($ObjMapDrawing3->totalRecords() > 0)
                              {
                                   while($plevelrowt027=$ObjMapDrawing3->dbFetchArray())
                                      {
                                        //$al_file_r = $plevelrowt027['al_file'];
                                      
                                          $al_file_r = $plevelrowt027['al_file'];

                                          ?>
            <div class="new_div">
              <li class="dfwp-item">
                    <div  style="float:left;width:163px;margin-right:0px;">
                      <div style="border: thin #999 solid; padding: 3px;margin-bottom: 3px;">	
                      <a  href=" <?php echo $data_url.$al_file_r; ?>" data-lightbox="roadtrip" data-title="" style="text-decoration:none" >
                      <img src="<?php //echo $data_url."thumb/".$result['al_file'];
                echo $data_url."thumb/".$al_file_r; ?>"  border="0" width="150px" height="112px" title="<?php echo $al_file_r;?>"/>
                      </a>
                      </div>
                    </div>
                  </li>
              </div>

                                          <?php
                                        $cm++;
                                      }
                              }

?>
</td>
</tr>

  <?php
} ?>

		</tbody>
		</table>
     <!-- Albums Goes Here -->
    </div>
    </div>
  </div><!-- class="col-sm-9" -->
  </div><!-- class="row" -->
  </div><!-- container -->
              <!-- Page Data Goes Here -->
        <div id="partials-footer"></div>
        <!-- partial -->

         </div>     <!--content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../../../js/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


  <!-- End custom js for this page-->

  <script>
    $(function(){
      $("#partials-navbar").load("../../../partials/_navbar.html");
    });
</script>

<script>
  $(function(){
    $("#partials-theme-setting-wrapper").load("../../../partials/_settings-panel.html");
  });
</script>

<script>
  $(function(){
    $("#partials-sidebar-offcanvas").load("../../../partials/_sidebar.html");
  });
</script>

<script>
$(function(){
  $("#partials-footer").load("../../../partials/_footer.html");
});
</script>
<script language="javascript" type="text/javascript"></script>
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
	
function getDates(lcid){
	if (lcid!=0) {
			var strURL="finddate.php?lcid="+lcid;
			var req = getXMLHTTP();
			if (req) {
				req.onreadystatechange = function() {
					if (req.readyState == 4) {
						// only if "OK"
						if (req.status == 200) {						
							document.getElementById("location_div").innerHTML=req.responseText;						
						} else {
							alert("There was a problem while using XMLHTTP COM:\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
			}
		}
		else{
			document.getElementById("date_p").value="0";
			document.getElementById('date_p').disabled = true;
			document.getElementById("date_p2").value="0";
			document.getElementById('date_p2').disabled = true;
		}
}

function getCanals(lid){
	if (lid!=0) {
			var strURL="findcanal.php?lid="+lid;
			var req = getXMLHTTP();
			
			if (req) {
				req.onreadystatechange = function() {
          
					if (req.readyState == 4) {
						if (req.status == 200) {						
							document.getElementById("canal_div").innerHTML=req.responseText;						
						} else {
							alert("There was a problem while using XMLHTTP COM:\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
			}
		}
		else
		{
			document.getElementById("canal_name").value="0";
			document.getElementById('canal_name').disabled = true;
			document.getElementById("date_p").value="0";
			document.getElementById('date_p').disabled = true;
			document.getElementById("date_p2").value="0";
			document.getElementById('date_p2').disabled = true;
		}
}

function getGalleryView(month) 
	{
	
		var location=document.getElementById("location").value;  
			
		if (month!="") {
			var strURL="findGalleryView.php?date_p="+month+" &location="+location;
			var req = getXMLHTTP();
			
			if (req) {
				
				req.onreadystatechange = function() {
					if (req.readyState == 4) {
						// only if "OK"
						if (req.status == 200) {						
							document.getElementById('Gallery_View').innerHTML=req.responseText;						
						} else {
							alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
			}
		} 
		   
	}
</script>
<!-- Page Load Function -->
</body>
</html>