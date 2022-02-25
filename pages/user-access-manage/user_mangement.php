<?php
include_once("../../config/config.php");
$ObjPictoAna = new PictorialAnalysis();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
  <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
     <!-- partial:partials/_navbar.html -->
     <div id="partials-navbar"></div>
     <!-- partial -->
 
     <div class="container-fluid page-body-wrapper">
     
      
 
       <!-- partial:partials/_sidebar.html -->
       <div class="sidebar sidebar-offcanvas" id="partials-sidebar-offcanvas"></div>
       <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row">

        <div class="col-sm-2">
        <a class=" btn btn-primary  btn-sm" href="/PMIS/pages/administration/Data_Updation/add_IPC_data.php" style="margin-bottom: 15px;">Add New User</a>
        </div>

        <div class="col-sm-4">

        <form class="form-horizontal">

        <div class="input-group">
                <input type="text" class="form-control" placeholder="Search User" aria-label="Search User">
                <div class="input-group-append" style="margin-left: 10px;">
                        <button id="search" name="search" class="btn btn-sm btn-warning" type="button">Search</button>
                </div>
        </div>

        </form>

        </div>

        </div>
        
        <div class="card">

        
            <div class="card-body" style="overflow: auto;">
           


            <!-- Data Goes Here -->
            <form name="prd_frm" id="prd_frm" method="post" action="">	
		<table id="tblList" width="100%" border="0" cellspacing="1" cellpadding="5" style="padding:3px; margin:3px;">
        <tr>
		<th style="border-left:1px solid #000000; border-top:1px solid #000000;" ><?php echo "UID";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Name";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Designation";?></th>
        <th style="text-align:left;border-top:1px solid #000000;"><?php echo "User Name";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "News";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "NewsA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "NewsE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "ADDP";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "IssueA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Res";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "ResA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "ResE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Mdata";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "MdataA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "MdataE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Act-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Mile";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "MileA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "MileE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Mile-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Sprogress";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "SprogressA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "SprogressE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Splanned";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "SplannedA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "SplannedE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "KPI";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "KPIA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "KPIE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "KPI-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "CAM";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "CAMA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "CAME";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "CAM-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "BOQ";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "BOQA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "BOQE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "IPC";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "IPCA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "IPCE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "KFI-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "EVA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "EVAA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "EVAE";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "EVA-D";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "PIC";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "PICA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "PICE";?></th>
		
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "Draw";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "DrawA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "DrawE";?></th>
		
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "NCF";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "NCFA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "NCFE";?></th>
		
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "DP";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "DPA";?></th>
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "DPE";?></th>
		
		<th style="text-align:left;border-top:1px solid #000000;"><?php echo "PROCESS";?></th>
		<th colspan="2" style="border-top:1px solid #000000;">Action</th>
		</tr>
		
			<!-- Start Your Php Code her For Display Record's -->
			<tr style="background-color:<?php echo $bgcolor;?>">
				<td style="border-left:1px solid #000000;">usercd</td>
				<td>Full Name</td>
                <td><?php echo $rows['designation'];?></td>
				<td>User Name</td>
				<td>News</td>
				<td>News Adm</td>
				<td>NewsEntry</td>
				<td>Padm</td>
				<td>IssueAdm</td>
				<td>Res</td>
				<td>Res Adm</td>
				<td>Res Entry</td>
				<td>Mdata</td>
				<td>Mdata Adm</td>
				<td>Mdata Entry</td>
				<td>Act D</td>
				<td>Mile</td>
				<td>Mile Adm</td>
				<td>Mile Entry</td>
				<td>Miled</td>
				<td>Spg</td>
				<td>Spg Adm</td>
				<td>Spg Entry</td>
				<td>Sp Ln</td>
				<td>Spln Adm</td>
				<td>Spln Entry</td>
				<td>Kpi</td>
				<td>Kpi Adm</td>
				<td>Kpi Entry</td>
				<td>Kpid</td>
				<td>Cam</td>
				<td>Cam Adm</td>
				<td>Cam Entry</td>
				<td>Cam D</td>
				<td>Boq</td>
				<td>Boq Adm</td>
				<td>Boq Entry</td>
				<td>Ipc</td>
				<td>Ipc Adm</td>
				<td>Ipc Entry</td>
				<td>Kfid</td>
				<td>Eva</td>
				<td>Eva Admin</td>
				<td>Eva Entry</td>
				<td>Eva D</td>
				<td>Pic</td>
				<td>Pic Adm</td>
				<td>Pic Entry</td>
				
				
				<td>Draw</td>
				<td>Draw Adm</td>
				<td>Draw Entry</td>
				
				<td>Ncf</td>
				<td>Ncf Adm</td>
				<td>Ncf Entry</td>
				
				<td>Dp</td>
				<td>Dp Adm</td>
				<td>Dp Entry</td>
				
				
				<td>Process</td>
			
				</tr>
	
	<tr>
	<td colspan="59" style="padding:0;border-left:1px solid #000000; background-color:white">		
	<div id="tblFooter">
		
	<div style="float:left;width:170px;font-weight:bold"></div>
	<div id="paging" style="float:right;text-align:right; padding-right:5px;  font-weight:bold">
	  
	</div>
			</div>
	</td></tr>
		 </table>
	  </form>
     <!-- Data Goes Here Ends -->
                    
            </div>
        
        </div>

          <!-- Page Data Goes Here -->
            <!-- Page Data Goes Here -->
              <!-- Page Data Goes Here -->
                <!-- Page Data Goes Here -->
               

        </div>

        

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <div id="partials-footer"></div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->

  <script>
    $(function(){
      $("#partials-navbar").load("../../partials/_navbar.html");
    });
</script>

<script>
  $(function(){
    $("#partials-theme-setting-wrapper").load("../../partials/_settings-panel.html");
  });
</script>

<script>
  $(function(){
    $("#partials-sidebar-offcanvas").load("../../partials/_sidebar.html");
  });
</script>

<script>
$(function(){
  $("#partials-footer").load("../../partials/_footer.html");
});
</script>


</body>

</html>