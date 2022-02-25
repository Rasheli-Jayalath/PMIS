<?php
include_once("../../../config/config.php");
$ObjPictoAna = new PictorialAnalysis();
$ObjPictoAna2 = new PictorialAnalysis();
$ObjPictoAna3 = new PictorialAnalysis();
$ObjPictoAna4 = new PictorialAnalysis();
$ObjPictoAna5 = new PictorialAnalysis();


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
        
        .text-34{
  background-color: #151563;
  border-radius: 10px;
  /* box-shadow: rgba(34, 34, 199, .2) 0 -25px 18px -14px inset,rgba(34, 34, 199, .15) 0 1px 2px,rgba(34, 34, 199, .15) 0 2px 4px,rgba(34, 34, 199, .15) 0 4px 8px,rgba(34, 34, 199, .15) 0 8px 16px,rgba(34, 34, 199, .15) 0 16px 32px; */
  padding-bottom: 12px;
  padding-top: 12px;
  border-radius: 5px 5px;
  color: white;
  font-size: 100%;
  /* margin-right: 5%; */
  /* right: 5%;
  left: 5%; */


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
.text-33{
  background-color: #151563;
  border-radius: 10px;
  box-shadow: rgba(34, 34, 199, .2) 0 -25px 18px -14px inset,rgba(34, 34, 199, .15) 0 1px 2px,rgba(34, 34, 199, .15) 0 2px 4px,rgba(34, 34, 199, .15) 0 4px 8px,rgba(34, 34, 199, .15) 0 8px 16px,rgba(34, 34, 199, .15) 0 16px 32px;
  padding-bottom: 8px;
  padding-top: 8px;
  border-radius: 0px 20px;
  color: white;
  /* margin-right: 5%; */
  /* right: 5%;
  left: 5%; */


}

.button-33 {
  background-color: #1a1a7d;
  border-radius: 10px;
  box-shadow: rgba(34, 34, 199, .2) 0 -25px 18px -14px inset,rgba(34, 34, 199, .15) 0 1px 2px,rgba(34, 34, 199, .15) 0 2px 4px,rgba(34, 34, 199, .15) 0 4px 8px,rgba(34, 34, 199, .15) 0 8px 16px,rgba(34, 34, 199, .15) 0 16px 32px;
  color: white;
  cursor: pointer;
  font-weight: 600;
  margin-left:1%;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 5px 2px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 13px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(22, 22, 51,.35) 0 -25px 18px -14px inset,rgba(22, 22, 51,.25) 0 1px 2px,rgba(22, 22, 51,.25) 0 2px 4px,rgba(22, 22, 51,.25) 0 4px 8px,rgba(22, 22, 51,.25) 0 8px 16px,rgba(22, 22, 51,.25) 0 16px 32px;
  transform: scale(1.1) ;
}
.button-34 {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(26, 26, 125);
  color: #1a1a7d;
  /* box-shadow: rgba(34, 34, 199, .02) 0 -25px 18px -14px inset,rgba(34, 34, 199, .05) 0 1px 2px,rgba(34, 34, 199, .05) 0 2px 4px,rgba(34, 34, 199, .05) 0 4px 8px,rgba(34, 34, 199, .05) 0 8px 16px,rgba(34, 34, 199, .10) 0 16px 32px; */
  box-shadow: none;
  padding: 15px 1px;
  border-radius: 0px;
  font-size: 73%;

  font-weight: 900;
  margin-left:0%;
}
.button-34:hover {
  background-color: #1f1f91;
  color: #fff;
  font-weight: 900;
  font-size: 75%;
  transform: scale(1.05) ;
}
.button-35 {

  padding: 12px 2px;

  font-size: 73%;
  font-weight: 700;
  margin-left:0%;
}
.button-35:hover {
  transform: scale(1.0) ;
  font-size: 85%;
}
.sm-unLine {

  font-weight: 600;
  /* text-decoration-line: underline;
  text-decoration: underline solid #1f1f91 1px;
  text-underline-position: under; */
  
  /* border-bottom: 3px solid #f9dd94; */
 
}

/* .sm-unLine::after {
  content: "";
  display: block;

  padding-top: 3px;
  border-bottom: 2px solid #f9dd94;
} */

/* #u-border-head {
  height:3px;
  background-color: rgba(31, 31, 145 );

  border-radius:10px 30px;
  padding:3.8px;
} */
 

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
    <div class="col-sm-4">


    <div style="background-image: linear-gradient(180deg, #c9c9f5, white); padding: 20px ; border-radius: 15px; margin-right: -5px; ">

          <div class="row btn-group" style="align-content:center; padding-left: 5px;  padding-right: 2.5%; margin-bottom: 25px; margin-top: 10px; justify-content: center; width: 108%;">
          <button type="button" style="  width: 45%; border-top-left-radius: 10px; border-bottom-left-radius: 10px; margin-right: 2.5%; " class=" button-33 button-34" onclick="window.open('pictorial_form.php', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but1">Upload Photos</button>
          <button type="button"  style="  width: 45%; border-bottom-right-radius: 10px; border-top-right-radius: 10px;" class="button-33  button-34" onclick="window.open('location_form.php', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but1">Add Sub Component</button>
          <!-- <button type="button" class="btn btn-warning" onclick="location.href='pictorial_form.php'">Upload Photos</button> -->
          </div>
          <div class="main">

         
          <form action="#"> 
          
          <div class="form-group">
                      <label for="exampleSelectGender" style="font-weight: bold">Select Component</label>
                        <select style="font-size: 14px; color: #000;   background-color: rgba(255, 255, 255);" onchange="getCanals(this.value)" class="form-control" id="location" name="location">
                          
                        <option value="" > Select </option>
                            
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
              <button type="submit" class="button-33 button-35" onclick=""  id="but2" style="margin-bottom: -25px; width:100%;">View Results</button>
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

    <div class="col-sm-8" >
    <div class="" >
<h4 class="text-center text-34" style="  letter-spacing: 4px"> PHOTO / VIDEO ALBUMS </h4> 
</div> 
    <!-- <div style="background-image: linear-gradient(180deg, white, white);padding: 20px; border-radius: 15px;margin-left: -10px;height: 100%;"> -->
    <div style=" padding: 20px; border-radius: 15px;margin-left: -10px;height: 100%;">

    <div>
    
    <div class="row " style="margin-right: -6%; margin-bottom:10px">
    <?php 
    if($_REQUEST['album_id']){
   
      // //////////////

      $ObjPictoAna5->setProperty("maxpid",$maxpid); 
      $ObjPictoAna5->setProperty("albumid",$_REQUEST["album_id"]);
      $pictodefaparenrfold = $ObjPictoAna5->getroject_album(); 
      while($plevelrow031=$ObjPictoAna5->dbFetchArray())
      {
        $album_id = $plevelrow031['albumid'];
        $album_name = $plevelrow031['album_name'];
    
        $ObjPictoAna3->setProperty("maxpid",$maxpid); 
        $ObjPictoAna3->setProperty("albumid",$album_id); 
        $pictodefaparenrfoldt027 = $ObjPictoAna3->gett027project_photos(); 
    

      
      }
      
      
      // /////////////
    ?>

<?php
   } 
   ?>
 
 
    <?php 
    if($_REQUEST['album_id']){
    ?>
<div class="row pt-2 pb-5" >
  
<div class="col-sm-4 " style="  font-weight: 600;">  
  <?php echo strtoupper($album_name) ;?>
</div>

<div class="col-sm-8 text-end" >  
    <button type="button" class="  col-sm-3 button-33" onclick="window.open('sp_video_input.php?album_id=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Videos</button>
    <button type="button" class=" col-sm-3 button-33" onclick="window.open('sp_photo_album_input.php?album_id=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Photos</button>
    <button type="button" class="  col-sm-3 button-33" onclick="window.open('sp_subalbum_input.php?parentid=<?php echo $album_idd; ?>', 'newwindow', 'left=600,top=60,width=870,height=800');return false;" id="but3">Manage Albums</button>
    </div>
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
                          <div  style="float:left;width:152px;margin-right:8px;" >
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

<tr style="height:40px; "></tr>
  <tr style="font-size:12px; color:#CCC; background-color: #151563; height: 30px;">
  <td style="font-size:15px; font-weight:bold; padding-left:3px; letter-spacing: 3px; " class="text-center">PHOTOS 
  </td>
  </tr>
  <tr class="text-center">
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
            <div class="new_div" style="margin-top: 15px;">
              <li class="dfwp-item">
                    <div  style="float:left;width:163px; margin-right:5px; ">
                   	
                      <a  href=" <?php echo $data_url.$al_file_r; ?>" data-lightbox="roadtrip" data-title="" style="text-decoration:none" >
                      <img src="<?php //echo $data_url."thumb/".$result['al_file'];
                echo $data_url."thumb/".$al_file_r; ?>"  border="0" width="150px" height="112px" title="<?php echo $al_file_r;?>"/>
                      </a>
                      
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
<tr style="height:40px; "></tr>
  <tr style="font-size:12px; color:#CCC; background-color: #151563; height:30px;" >
  <td style="font-size:15px; font-weight:bold; padding-left:3px; letter-spacing: 3px;" class="text-center">VIDEOS</td>

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
            <div class="new_div" style="margin-top: 15px;">
              <li class="dfwp-item">
                    <div  style="float:left;width:163px;margin-right:5px;">
                   
                      <a  href=" <?php echo $data_url.$al_file_r; ?>" data-lightbox="roadtrip" data-title="" style="text-decoration:none" >
                      <img src="photos/video_file_icon.jpg"  border="0" width="150px" height="112px" title="<?php echo $al_file_r;?>"/>
                      </a>
                
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