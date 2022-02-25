<?php
include_once("../../../config/config.php");
$ObjPictoAna = new PictorialAnalysis();
$ObjPictoAna2 = new PictorialAnalysis();
$ObjPictoAna3 = new PictorialAnalysis();
$ObjPictoAna4 = new PictorialAnalysis();

//$data_url="../../../images/photos/";

$file_path="pictorial_data";
$data_url="photos/";

$album_idd=$_REQUEST['album_id'];


$pictomaxpid = $ObjPictoAna->getMaxPid(); 
while($plevelrows=$ObjPictoAna->dbFetchArray())
{
  $maxpid = $plevelrows['pid'];
}

if(isset($album_idd)&&!empty( $album_idd))
 {

  $ObjPictoAna4->setProperty("maxpid",$maxpid); 
  $ObjPictoAna4->setProperty("albumid",$album_idd); 
  $pictoalbumname = $ObjPictoAna4->gett031project_albums_alname(); 
  while($plevelrowtalname=$ObjPictoAna4->dbFetchArray())
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
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
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

    </style>

</head>

<body>


     
  <!-- Spinner -->
  
 <!-- Spinner -->

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
            <!-- Page Data Goes Here -->
  
  <!-- <button type="button" class="btn btn-warning" onclick="window.location.href='albums.php'">Albums</button>
  <button type="button" class="btn btn-warning" onclick="window.location.href='3row.php'">row</button> -->

  <div class="row">
    <div class="col-sm-3">


    <div style="background-color:#fff;padding: 20px; border-radius: 15px;margin-right: -10px;">

          <div class="row" style="align-content: center;margin-bottom: 25px; margin-top: 10px; justify-content: center;">
          <button type="button" style="font-size: 13px; font-weight: 500;" class="btn btn btn-outline-primary col-sm-3" onclick="window.open('pictorial_form.php', 'newwindow', 'left=600,top=60,width=670,height=800');return false;" id="but1">Upload Photos</button>
          <button type="submit" style="font-size: 13px; font-weight: 500; margin-left: 5px;" class="btn btn btn-outline-primary col-sm-3" onclick="window.open('component_form.php?ppid=<?php echo $maxpid ?>', 'newwindow', 'left=600,top=60,width=670,height=650');return false;" id="but1">Add Component</button>
          <button type="button" style="font-size: 13px; font-weight: 500; margin-left: 5px;" class="btn btn btn-outline-primary col-sm-3" onclick="window.open('location_form.php', 'newwindow', 'left=600,top=60,width=670,height=650');return false;" id="but1">Add Sub Component</button>
          <!-- <button type="button" class="btn btn-warning" onclick="location.href='pictorial_form.php'">Upload Photos</button> -->
          </div>
          <div class="main">

         
          <form action="#"> 
          
          <div class="form-group">
                      <label for="exampleSelectGender" style="font-weight: bold">Select Component</label>
                        <select style="font-size: 14px; color: #000;background-color: #fff;" onchange="getCanals(this.value)" class="form-control" id="location" name="location">
                          

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

                        <label for="exampleSelectGender" style="margin-top: 20px;font-weight: bold;">Select Sub Component</label>
                        <div id="canal_div">
                            
                      

                        </div>
            </div>


            <div class="form-group">
                      <label for="" style="font-weight: bold">Comparison Dates:</label>
                      <div id="location_div" class="row" style=" justify-content: center;">
                     
                      
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

  $ObjPictoAna->setProperty("pid",$maxpid); 
  $ObjPictoAna->setProperty("ph_cap",$_REQUEST['location']); 
  $ObjPictoAna->setProperty("lcid",$_REQUEST['canal_name']); 
  $ObjPictoAna->setProperty("date_p",$_REQUEST['date_p']); 
  $ObjPictoAna->setProperty("date_p2",$_REQUEST['date_p2']); 
  $pictoalbumname = $ObjPictoAna->getGalleryPictures(); 
  while($plevelrowspics=$ObjPictoAna->dbFetchArray())
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
    <h4 class="col-sm-5">Photo / Video Albums</h4> 
    <?php 
    if($_REQUEST['album_id']){
    ?>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" onclick="window.open('sp_video_input.php?album_id=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Videos</button>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" onclick="window.open('sp_photo_album_input.php?album_id=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Photos</button>
    <button type="button" style="font-weight: bold;margin-left:5px" class="btn btn-outline-success col-sm-2" onclick="window.open('sp_subalbum_input.php?parentid=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Albums</button>
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

  $ObjPictoAna2->setProperty("maxpid",$maxpid); 
  $ObjPictoAna2->setProperty("albumid",$_REQUEST["album_id"]);
  $pictodefaparenrfold = $ObjPictoAna2->gett031project_albums(); 
  while($plevelrow031=$ObjPictoAna2->dbFetchArray())
  {
    $album_id = $plevelrow031['albumid'];
    $album_name = $plevelrow031['album_name'];

    $ObjPictoAna3->setProperty("maxpid",$maxpid); 
    $ObjPictoAna3->setProperty("albumid",$album_id); 
    $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_photos(); 

    if($ObjPictoAna3->totalRecords() > 0)
      {
    while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
    {
      //$al_file_r = $plevelrowt027['al_file'];
     
     
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
                    $ObjPictoAna2->setProperty("maxpid",$maxpid); 
                    $pictodefaparenrfold = $ObjPictoAna2->gett031project_albumsparent0(); 
                    while($plevelrow031=$ObjPictoAna2->dbFetchArray())
                    {
                      $album_id = $plevelrow031['albumid'];
                      $album_name = $plevelrow031['album_name'];

                      $ObjPictoAna3->setProperty("maxpid",$maxpid); 
                      $ObjPictoAna3->setProperty("albumid",$album_id); 
                      $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_photos(); 
                       if($ObjPictoAna3->totalRecords() > 0)
                              {
                                   while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
                                      {
                                        //$al_file_r = $plevelrowt027['al_file'];
                                      
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
                      $ObjPictoAna3->setProperty("maxpid",$maxpid); 
                      $ObjPictoAna3->setProperty("albumid",$_REQUEST["album_id"]); 
                      $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_photos_selectphotos(); 
                       if($ObjPictoAna3->totalRecords() > 0)
                              {
                                   while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
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

  <tr style="background: #E6E6E6; height:32px">
  <td style="font-size:18px; font-weight:bold; padding-left:3px">Videos</td>

  <tr>
    <td>
<?php
                      $ObjPictoAna3->setProperty("maxpid",$maxpid); 
                      $ObjPictoAna3->setProperty("albumid",$_REQUEST["album_id"]); 
                      $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_video_selectvideos(); 
                       if($ObjPictoAna3->totalRecords() > 0)
                              {
                                   while($plevelrowt027=$ObjPictoAna3->dbFetchArray())
                                      {
                                        //$al_file_r = $plevelrowt027['al_file'];
                                      
                                          $al_file_r = $plevelrowt027['v_al_file'];

                                          ?>
            <div class="new_div">
              <li class="dfwp-item">
                    <div  style="float:left;width:163px;margin-right:0px;">
                      <div style="border: thin #999 solid; padding: 3px;margin-bottom: 3px;">	
                      <a  href=" <?php echo $data_url.$al_file_r; ?>" data-lightbox="roadtrip" data-title="" style="text-decoration:none" >
                      <img src="photos/video_file_icon.jpg"  border="0" width="150px" height="112px" title="<?php echo $al_file_r;?>"/>
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



  </tr>
  <?php
}

            ?>
           
 

          
	

		</tbody>
		</table>



     <!-- Albums Goes Here -->


    </div>

    </div>

  </div><!-- class="col-sm-9" -->
  </div><!-- class="row" -->
  </div><!-- container -->

  

              <!-- Page Data Goes Here -->
                <!-- Page Data Goes Here -->

   
        <!-- partial:../../partials/_footer.html -->
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
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../js/chart.js"></script>
  <!-- <script src="../../js/navtype_session.js"></script> -->
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


<script language="javascript" type="text/javascript">



</script>

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
	
function getDates(lcid,lid)
{
	
	if (lcid!=0) {
			var strURL="finddate.php?lid="+lid+"&lcid="+lcid;
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
		else
		{
		
			document.getElementById("date_p").value="0";
			document.getElementById('date_p').disabled = true;
			document.getElementById("date_p2").value="0";
			document.getElementById('date_p2').disabled = true;
			
		}

}

function getCanals(lid)
{
 // alert(lid);
	
	if (lid!=0) {
			var strURL="findcanal.php?lid="+lid;
			var req = getXMLHTTP();
			
			if (req) {
				req.onreadystatechange = function() {
          
					if (req.readyState == 4) {
						// only if "OK"
            //alert(req.responseText);
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
<!-- Page Load Function -->
  


</body>

</html>