<?php
include_once("../../../config/config.php");
require_once('../../../rs_lang.admin.php');
require_once('../../../rs_lang.eng.php');
$objDb  		= new Database();
$objCommon 		= new Common();
$objAdminUser 	= new AdminUser();
$objNews 		= new News();
/*if ($strusername==null  )
	{
		header("Location: ../../index.php?init=3");
	}
else if ($news_flag==0)
	{
		header("Location: ../../index.php?init=3");
	}
*/
if($_GET['mode'] == 'delete'){
	$objNews->setProperty('news_cd', $_GET['news_cd']);
	 $sql_ii="SELECT * FROM `rs_tbl_news` where news_cd='$_GET[news_cd]'"; 
		$sql_newi=mysql_query($sql_ii);
		$sql_resnew=mysql_fetch_array($sql_newi);
		if($sql_resnew['newsfile']!="")
		{
		@unlink(NEWS_PATH . $sql_resnew['newsfile']);
		}
		if($sql_resnew['newsfile1']!="")
		{
		@unlink(NEWS_PATH . $sql_resnew['newsfile1']);
		}
		if($sql_resnew['newsfile2']!="")
		{
		@unlink(NEWS_PATH . $sql_resnew['newsfile2']);
		}
		if($sql_resnew['newsfile3']!="")
		{
		@unlink(NEWS_PATH . $sql_resnew['newsfile3']);
		}
		if($sql_resnew['newsfile4']!="")
		{
		@unlink(NEWS_PATH . $sql_resnew['newsfile4']);
		}
	$objNews->actNews('D');
	
	$objCommon->setMessage('News deleted successfully!', 'Info');
	redirect('./?p=news_mgmt');
}
if($_GET['mode'] == 'active')
{
$n_cd=$_GET['news_cd'];
$sqll="update rs_tbl_news set status='Y' where news_cd='$n_cd'";
//mysql_query($sqll);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php //include ('includes/metatag.php'); ?>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Project News & Events</title>
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
       <div class="content-wrapper">
          <div class="row">
             <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Recent News & Events</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Archieve</a>
                    
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">

                   <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                     
                       
  <?php echo $objCommon->displayMessage();?>
        
 <?php
 	$objNews->setProperty("status", "Y");
	$objNews->setProperty("orderby", "newsdate desc");
	$objNews->setProperty("limit", 10);
	$objNews->lstNews();
	$Sql = $objNews->getSQL();
	if($objNews->totalRecords() >= 1){
		$sno = 1;
		while($rows = $objNews->dbFetchArray(1)){
			$bgcolor = ($bgcolor == "#FFFFFF") ? "#f1f0f0" : "#FFFFFF";
			?>
            <div class="row">
                    
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="wrapper d-flex align-items-center justify-content-between py-2 ">
                                        <div class="d-flex">
                                           <?php if($rows['newsfile']!="") {?> <a href="<?php //echo NEWS_URL.$rows['newsfile'] ;?>" target="_blank"><img class="img-lg rounded-10" src="news/<?php echo $rows['newsfile'] ;?>" alt="profile"> <?php }
		   else
		   {
		   ?>
		   <img src="<?php echo "images/news.jpg" ;?>" border="0" width="80px" height="80px" />
		   <?php
		   }?></a>
                                          <div class="wrapper ms-3">
                                           <h4 class="card-title"><?php echo substr($rows['title'],0,100);?></h4>
                                           
                  <p class="card-description wrapper">
                  <?php print substr($rows['details'],0,300).'...'?>
                  <br/>
                   <a href="news_detail.php?news_cd=<?php echo $rows['news_cd'];?>" style="text-decoration:none"><?php echo READ_MORE;?> <i class="mdi mdi-arrow-right ms-2"></i></a>
                  </p>
                                          </div>
                                          
                                           <div class="text-muted" style="width:200px"><?php echo date('d-m-Y', strtotime($rows['newsdate']));?></div>
                                        </div>
                                       
                                      </div>
               
                                     
                                <?php if($newsentry_flag==1 || $newsadm_flag==1 )
				{
				?>
				<a href="./?p=news_form&mode=edit&news_cd=<?php echo $rows['news_cd'];?>" style="text-decoration:none"title="Edit"><?php echo EDIT;?></a>
				<?php
				}
				?>
				 <?php if($newsadm_flag==1)
				{
				?>
				 | <a onClick="return doConfirm('<?php echo DEL_MSG?>');" href="./?p=news_mgmt&mode=delete&news_cd=<?php echo $rows['news_cd'];?>" style="text-decoration:none" title="Delete"><?php echo DEL;?></a>
				<?php
				}
				?>
                </div>
              </div>
            </div>
            
            
            
            
            
          </div>
          <?php
			$sno++;
		}
    }
	else{
	?><?php echo 'No news found.';?>
    <?php }?>
		
	 
                  
                    
                  </div>
                  <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences"> 
                    <div class="row">
                    
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="wrapper d-flex align-items-center justify-content-between py-2 ">
                                        <div class="d-flex">
                                          <img class="img-lg rounded-10" src="news/cab82-1.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                           <h4 class="card-title">News Title</h4>
                                           
                  <p class="card-description wrapper">
                   The contract has been signed between APDCL & M/S Laser Power Infra Pvt.ltd. for execution of the Construction of new 33/11kV substation with construction of new 33kV Terminal Bay construction of 33kV & 11kV lines for Distribution System Enhancement &Loss Reduction in 
                   - i) Bongaigaon Electrical Cir..
                  </p>
                                          </div>
                                          
                                           <div class="text-muted" style="width:200px">2022-02-15</div>
                                        </div>
                                       
                                      </div>
                <div class="list align-items-right pt-3" style="float:right">
                                      <a href="#" class="fw-bold text-primary">View Detail <i class="mdi mdi-arrow-right ms-2"></i></a>
                                </div>
                </div>
              </div>
            </div>
            
            
            
            
            
          </div> 
                  </div>
                  </div>

        </div>
        </div>
  </div><!-- class="content-wrapper" -->

   
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
      $("#partials-navbar").load("../../../partials/_navbar.php");
    });
</script>

<script>
  $(function(){
    $("#partials-theme-setting-wrapper").load("../../../partials/_settings-panel.php");
  });
</script>

<script>
  $(function(){
    $("#partials-sidebar-offcanvas").load("../../../partials/_sidebar.php");
  });
</script>

<script>
$(function(){
  $("#partials-footer").load("../../../partials/_footer.php");
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

</body>
</html>

