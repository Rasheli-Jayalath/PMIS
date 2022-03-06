<?php require_once('../../../rs_lang.admin.php');
require_once('../../../rs_lang.eng.php');
include_once("../../../config/config.php");
$log_id = 1;
$edit			= $_GET['edit'];
$revert			= $_GET['revert'];
$objDb  		= new Database();
$objSDb  		= new Database();
$objVSDb  		= new Database();
$objCSDb  		= new Database();
$file_path="rfi_docs/";
 $pSQL = "SELECT max(pid) as pid from project";
$objDb->dbQuery($pSQL);
$pData =$objDb->dbFetchArray();
$pid=$pData["pid"];
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
	
	$contractor_no=$_REQUEST['contractor_no'];
	$section=$_REQUEST['section'];
	$site=$_REQUEST['site'];
	$rfi_number=$_REQUEST['rfi_number'];
	$rfi_prev_ref=$_REQUEST['rfi_prev_ref'];
	 $rfi_Date=trim($_REQUEST['rfi_Date']);
	if($rfi_Date=='')
	{
		
		$rfi_Date='NULL';
	}
	else
	{
		$rfi_Date=$rfi_Date;
	}
	$rfi_sub_date_time=date('Y-m-d',strtotime($_REQUEST['rfi_sub_date_time']));
	$rfi_activity_detail=$_REQUEST['rfi_activity_detail'];
	$rfi_activity_location=$_REQUEST['rfi_activity_location'];
	$rfi_activity_location_from=$_REQUEST['rfi_activity_location_from'];
	$rfi_activity_location_to=$_REQUEST['rfi_activity_location_to'];
	$rfi_contractor_rep_name=$_REQUEST['rfi_contractor_rep_name'];
	$RFI_Received_by=$_REQUEST['RFI_Received_by'];
	$RFI_Received_date_time=$_REQUEST['RFI_Received_date_time'];
	$RFI_Scanned_document=$_REQUEST['RFI_Scanned_document'];
	
	
	$Survey_Surveyor_name=$_REQUEST['Survey_Surveyor_name'];
	 $Survey_Date_time=trim($_REQUEST['Survey_Date_time']);
	if($Survey_Date_time=='')
	{
		
		$Survey_Date_time='NULL';
	}
	else
	{
		$Survey_Date_time=$Survey_Date_time;
	}
	$Survey_report=$_REQUEST['Survey_report'];
	$Survey_comments=$_REQUEST['Survey_comments'];
	$Survey_document=$_REQUEST['Survey_document'];
	
	
	$Inspection_inspector_name=$_REQUEST['Inspection_inspector_name'];
	$Inspection_Date_time=date('Y-m-d',strtotime($_REQUEST['Inspection_Date_time']));
	$Inspection_report=$_REQUEST['Inspection_report'];
	$Inspection_comments=$_REQUEST['Inspection_comments'];
	$Inspection_document=$_REQUEST['Inspection_document'];
	
	
	$Quality_MT_Engineer_name=$_REQUEST['Quality_MT_Engineer_name'];
	$Quality_testing_Date_time=date('Y-m-d',strtotime($_REQUEST['Quality_testing_Date_time']));
	$Quality_test_perfomed=$_REQUEST['Quality_test_perfomed'];
	$Quality_test_sample_numbers=$_REQUEST['Quality_test_sample_numbers'];
	$Quality_test_report=$_REQUEST['Quality_test_report'];
	$Quality_test_result=$_REQUEST['Quality_test_result'];
	$Quality_test_comments=$_REQUEST['Quality_test_comments'];
	$Quality_test_report_document=$_REQUEST['Quality_test_report_document'];
	
	
	$Approval_authority=$_REQUEST['Approval_authority'];
	$Approval_authority_name=$_REQUEST['Approval_authority_name'];
	$Approval_status=$_REQUEST['Approval_status'];
	$Approval_comments=$_REQUEST['Approval_comments'];
	$Approval_documents=$_REQUEST['Approval_documents'];
	// insert query

	
	
	$message="";
	$pgid=1;
	if(isset($_FILES["Approval_documents"]["name"])&&$_FILES["Approval_documents"]["name"]!="")
	{
	$extension=getExtention($_FILES["Approval_documents"]["type"]);
	 $file_name=genRandom(5)."-".$lid;
   
	if(($_FILES["Approval_documents"]["type"] == "application/pdf")|| ($_FILES["Approval_documents"]["type"] == "application/msword") || 
	($_FILES["Approval_documents"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")||
	($_FILES["Approval_documents"]["type"] == "text/plain") || 
	($_FILES["Approval_documents"]["type"] == "image/jpg")|| 
	($_FILES["Approval_documents"]["type"] == "image/jpeg")|| 
	($_FILES["Approval_documents"]["type"] == "image/gif") || 
	($_FILES["Approval_documents"]["type"] == "image/png"))
	{ 
	$Approval_documents=$file_name.".".$extension;
	  $target_file=$file_path.$Approval_documents;
	 //$target_file = $file_path . basename($_FILES['al_file']["name"]);
	
	move_uploaded_file($_FILES['Approval_documents']['tmp_name'], $target_file);	
	
	
	}
	}
	if(isset($_FILES["RFI_Scanned_document"]["name"])&&$_FILES["RFI_Scanned_document"]["name"]!="")
	{
	$extension1=getExtention($_FILES["RFI_Scanned_document"]["type"]);
	 $RFI_Scanned_document_file_name=genRandom(5)."-".$lid;
   
	if(($_FILES["RFI_Scanned_document"]["type"] == "application/pdf")|| ($_FILES["RFI_Scanned_document"]["type"] == "application/msword") || 
	($_FILES["RFI_Scanned_document"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")||
	($_FILES["RFI_Scanned_document"]["type"] == "text/plain") || 
	($_FILES["RFI_Scanned_document"]["type"] == "image/jpg")|| 
	($_FILES["RFI_Scanned_document"]["type"] == "image/jpeg")|| 
	($_FILES["RFI_Scanned_document"]["type"] == "image/gif") || 
	($_FILES["RFI_Scanned_document"]["type"] == "image/png"))
	{ 
	$RFI_Scanned_documentfile=$RFI_Scanned_document_file_name.".".$extension1;
	  $target_file1=$file_path.$RFI_Scanned_documentfile;
	 //$target_file = $file_path . basename($_FILES['al_file']["name"]);
	
	move_uploaded_file($_FILES['RFI_Scanned_document']['tmp_name'], $target_file1);	
	
	
	}
	}
	if(isset($_FILES["Quality_test_report_document"]["name"])&&$_FILES["Quality_test_report_document"]["name"]!="")
	{
	$extension2=getExtention($_FILES["Quality_test_report_document"]["type"]);
	 $Quality_test_report_document_file_name=genRandom(5)."-".$lid;
	if(($_FILES["Quality_test_report_document"]["type"] == "application/pdf")|| ($_FILES["Quality_test_report_document"]["type"] == "application/msword") || 
	($_FILES["Quality_test_report_document"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")||
	($_FILES["Quality_test_report_document"]["type"] == "text/plain") || 
	($_FILES["Quality_test_report_document"]["type"] == "image/jpg")|| 
	($_FILES["Quality_test_report_document"]["type"] == "image/jpeg")|| 
	($_FILES["Quality_test_report_document"]["type"] == "image/gif") || 
	($_FILES["Quality_test_report_document"]["type"] == "image/png"))
	{ 
	$Quality_test_report_documentfile=$Quality_test_report_document_file_name.".".$extension2;
	  $target_file2=$file_path.$Quality_test_report_documentfile;
	 //$target_file = $file_path . basename($_FILES['al_file']["name"]);
	
	move_uploaded_file($_FILES['Quality_test_report_document']['tmp_name'], $target_file2);	
	
	
	}
	}
/* echo $insert_q="INSERT INTO tbl_rfi_lab( contractor_no, section, site, rfi_number, rfi_prev_ref, rfi_Date, rfi_sub_date_time, rfi_activity_detail, rfi_activity_location, rfi_activity_location_from, rfi_activity_location_to, rfi_contractor_rep_name, RFI_Received_by, RFI_Received_date_time, RFI_Scanned_document, Survey_Surveyor_name, Survey_Date_time, Survey_report, Survey_comments, Survey_document, Inspection_inspector_name, Inspection_Date_time, Inspection_report, Inspection_comments, Inspection_document, Quality_MT_Engineer_name, Quality_testing_Date_time, Quality_test_perfomed, Quality_test_sample_numbers, Quality_test_report, Quality_test_result, Quality_test_comments, Quality_test_report_document, Approval_authority, Approval_authority_name, Approval_status, Approval_comments, Approval_documents) VALUES ('$contractor_no','$section','$site','$rfi_number','$rfi_prev_ref','$rfi_Date','$rfi_sub_date_time','$rfi_activity_detail','$rfi_activity_location','$rfi_activity_location_from','$rfi_activity_location_to','$rfi_contractor_rep_nam','$RFI_Received_by','$RFI_Received_date_time','$RFI_Scanned_document','$Survey_Surveyor_name','$Survey_Date_time','$Survey_report','$Survey_comments','$Survey_document','$Inspection_inspector_name','$Inspection_Date_time','$Inspection_report','$Inspection_comments','$Inspection_document','$Quality_MT_Engineer_name','$Quality_testing_Date_time','$Quality_test_perfomed','$Quality_test_sample_numbers','$Quality_test_report','$Quality_test_result','$Quality_test_comments','$Quality_test_report_document','$Approval_authority','$Approval_authority_name','$Approval_status','$Approval_comments','$Approval_documents')";*/
 $insert_q="INSERT INTO tbl_rfi_lab( contractor_no, section, site, rfi_number, rfi_prev_ref, rfi_Date, rfi_sub_date_time, rfi_activity_detail, rfi_activity_location, rfi_activity_location_from, rfi_activity_location_to, rfi_contractor_rep_name, RFI_Received_by, RFI_Received_date_time, RFI_Scanned_document) VALUES ('$contractor_no','$section','$site','$rfi_number','$rfi_prev_ref','$rfi_Date','$rfi_sub_date_time','$rfi_activity_detail','$rfi_activity_location','$rfi_activity_location_from','$rfi_activity_location_to','$rfi_contractor_rep_nam','$RFI_Received_by','$RFI_Received_date_time','$RFI_Scanned_document')";
$sql_pro= $objDb->dbQuery($insert_q);
/*$sql_pro= $objSDb->dbQuery("INSERT INTO tbl_rfi_lab( contractor_no, section, site, rfi_number, rfi_prev_ref, rfi_Date, rfi_sub_date_time, rfi_activity_detail, rfi_activity_location, rfi_activity_location_from, rfi_activity_location_to, rfi_contractor_rep_name, RFI_Received_by, RFI_Received_date_time, RFI_Scanned_document)VALUES('$contractor_no','$section','$site','$rfi_number','$rfi_prev_ref','$rfi_Date','$rfi_sub_date_time','$rfi_activity_detail','$rfi_activity_location','$rfi_activity_location_from','$rfi_activity_location_to','$rfi_contractor_rep_nam','$RFI_Received_by','$RFI_Received_date_time','$RFI_Scanned_document')");*/
//echo $pSQL="INSERT INTO tbl_rfi_lab( contractor_no,section,site,rfi_number) VALUES('11','22','22','22')";
//$sql_pro=$objDb->dbQuery($pSQL);
//$objSDb->dbQuery("INSERT INTO tbl_rfi_lab( contractor_no,section,site,rfi_number) VALUES('$contractor_no','$section','$site','$rfi_number')");
 //$insertid=$con->lastInsertId();
	if ($sql_pro == TRUE) {
    $message=  "New record added successfully";
	$activity=$insertid." - New record for issues added successfully";
} else {
    $message= "Error in adding record";
	$activity="Error in adding record";
	
}
//$iSQL = ("INSERT INTO pages_visit_log (log_id,request_url) VALUES ('$log_id','$activity')");
//$objSDb->dbQuery($iSQL);

	
	$iss_no='';
	$iss_date='';
	$iss_title='';
	$iss_detail='';
	$iss_status='';
	$iss_action='';
	$iss_remarks='';
	$al_file='';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php //include ('includes/metatag.php'); ?>

<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="scripts/JsCommon.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="datepickercode/jquery-ui.css" />
  <script type="text/javascript" src="datepickercode/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="datepickercode/jquery-ui.js"></script>
  <script>
  function required(){
	
	var x =document.getElementById("lid").value;
	var file =document.getElementById("al_file").value;
	var old_file =document.getElementById("old_al_file").value;
	
	 if (x == 0) {
    alert("Select Component First");
    return false;
  		}
		
  
  }
  </script>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Input - Project Issues</title>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- bootstrap -->
  

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.min.js"></script>

  <script> 
$(document).ready(function () {
   var date = new Date(); 
$('#rfi_Date').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#rfi_sub_date_time').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#RFI_Received_date_time').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#Survey_Date_time').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#Inspection_Date_time').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#Quality_testing_Date_time').datepicker({ dateFormat: 'yy-mm-dd'}); });
</script> 


<link rel="stylesheet" href="../../../timepicker/wickedpicker.css">
<script type="text/javascript" src="../../../timepicker/wickedpicker.js"></script>



</head>

<body>
  <div class="container-scroller">
     <!-- partial:partials/_navbar.html --><div id="partials-navbar"></div> <!-- partial -->
     <div class=" page-body-wrapper" id="pagebodywraper">
       <!-- partial:partials/_sidebar.html --> 
       <div class="sidebar sidebar-offcanvas" id="partials-sidebar-offcanvas"></div><!-- partial -->

      <div class="main-panel " id="mainpanel">
      <div class="content-wrapper" style="">
        <h4 class="text-center text-34 mb-4" style="  letter-spacing: 4px">  REQUEST FOR INFORMATION (RFI)  </h4> 
          <h3 class="text-center text-34 mb-4" style="  letter-spacing: 4px; color:#096"><?php echo $message;?></h3>
              <div class="card ">
                <div class="card-body">


            <form class="form-sample" method="post">



         <h4 class="card-title text-center">RFI Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end ">Contract No :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="contractor_no"  id="contractor_no" placeholder=""  />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end  ">Section :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="section"  id="section" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Site :</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="site"  id="site" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Number</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="rfi_number"  id="rfi_number" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Reference RFI Number :</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="rfi_prev_ref"  id="rfi_prev_ref" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> RFI Date :</label>
                          <div class="col-sm-9">
                          <input class="form-control" id="rfi_Date" placeholder ="yyyy-mm-dd" type="text" name="rfi_Date"/>
                          </div>
                        </div>
                      </div>
                    </div>
           
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Submission Date </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="rfi_sub_date_time"  id="rfi_sub_date_time" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Location</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="rfi_activity_location"  id="rfi_activity_location" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Activity Location From :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="rfi_activity_location_from"  id="rfi_activity_location_from" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Activity Location To :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="rfi_activity_location_to"  id="rfi_activity_location_to" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Contractor Rep Name:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="rfi_contractor_rep_name"  id="rfi_contractor_rep_name" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Received by:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="RFI_Received_by"  id="RFI_Received_by" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Received Date</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="RFI_Received_date_time"  id="RFI_Received_date_time" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Received Time</label>
                          <div class="col-sm-9">
                            <input type="text" class="timepicker form-control" name=""  id="" placeholder="yyyy-mm-dd" />
                            <script type="text/javascript">$('.timepicker').wickedpicker({now: '00:00', twentyFour: true, showSeconds: false});</script>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Activity Detail</label>
                          <div class="col-sm-9">
                            <textarea  class="form-control" rows="4" style=" height: 100px; "  name="rfi_activity_detail" id="rfi_activity_detail"> </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Scanned Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light" name="RFI_Scanned_document"  id="RFI_Scanned_document" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                   
                <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="save" id="save"  style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>



       
        <h4 class="card-title text-center pt-4 pb-1">Survey Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Surveyor Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Survey_Surveyor_name"  id="Survey_Surveyor_name" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> </label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Date</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="Survey_Date_time"  id="Survey_Date_time" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Time</label>
                          <div class="col-sm-9">
                          <input type="text" class="timepicker form-control" name=""  id="" placeholder="yyyy-mm-dd" />
                            <script type="text/javascript">$('.timepicker').wickedpicker({now: '00:00', twentyFour: true, showSeconds: false});</script>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Report</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Survey_report" id="Survey_report" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Survey_comments" id="Survey_comments" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light" name="Survey_document"  id="Survey_document" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"></label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
                    </div>
    
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="save" id="save"  style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>
            


       
        <h4 class="card-title text-center pt-4 pb-1">Inspection Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspector Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Inspection_inspector_name"  id="Inspection_inspector_name" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> </label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Date</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="Inspection_Date_time"  id="Inspection_Date_time" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Time</label>
                          <div class="col-sm-9">
                          <input type="text" class="timepicker form-control" name=""  id="" placeholder="yyyy-mm-dd" />
                            <script type="text/javascript">$('.timepicker').wickedpicker({now: '00:00', twentyFour: true, showSeconds: false});</script>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Report</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Inspection_report" id="Inspection_report" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Inspection_comments" id="Inspection_comments" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name="Inspection_document"  id="Inspection_document" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"></label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
                    </div>
   
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="save" id="" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>

        <h4 class="card-title text-center pt-4 pb-1">Quality Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">MT Engineer Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="Quality_MT_Engineer_name"  id="Quality_MT_Engineer_name" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> </label>
                          <div class="col-sm-9">
                           
                          </div>
                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Testing Date:</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name=""  id="Quality_testing_Date_time" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Testing Time:</label>
                          <div class="col-sm-9">
                          <input type="text" class="timepicker form-control" name=""  id="" placeholder="yyyy-mm-dd" />
                            <script type="text/javascript">$('.timepicker').wickedpicker({now: '00:00', twentyFour: true, showSeconds: false});</script>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Perfomed:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Quality_test_perfomed"  id="Quality_test_perfomed"> </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Sample Numbers:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Quality_test_sample_numbers" id="Quality_test_sample_numbers" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Report:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Quality_test_report" id="Quality_test_report" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Result:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Quality_test_result" id="Quality_test_result" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Quality_test_comments" id="Quality_test_comments" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Document:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name="Quality_test_report_document"  id="Quality_test_report_document" placeholder="" />
                          </div>
                        </div>
                      </div>
                  
                    </div>
                        
    
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="save" id="save" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>

        <h4 class="card-title text-center pt-4 pb-1">Approved Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Approved Authority :</label>
                          <div class="col-sm-9">
                          <select class="form-control bg-light text-dark"  name="Approval_authority"  id="Approval_authority" >
                              <option value="1">Client</option>
                              <option value="2">Consultant</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end ">Approved Authority Name  </label>
                          <div class="col-sm-9">
                          <select class="form-control bg-light text-dark"  name="Approval_authority_name"  id="Approval_authority_name" >
                              <option value="1">option 1</option>
                              <option value="2">option 2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Approved Comments:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="Approval_comments" id="Approval_comments" > </textarea>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Approved Document:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name="Approval_documents"  id="Approval_documents" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                      
                            <label class="col-sm-3 text-end"> Approved Status: </label>
                            <div class="col-sm-9 text-start">
                            <label class="form-check-label" style="padding-left: 1%;">
                                  <input  type="radio" class="form-check-input"  id="" name="Approval_status" value="1"  checked="checked"/> Approved
                            </label>
                            <label class="form-check-label " style="padding-left: 5%;">
                                   <input  type="radio" class="form-check-input" id="" name="Approval_status" value="2"  /> Rejected
                            </label>
                            <label class="form-check-label " style="padding-left: 5%;">
                                   <input  type="radio" class="form-check-input" id="" name="Approval_status" value="3"  /> Partially Approved
                            </label>
                            </div>
                          
                        </div>
                      </div>
                    </div>
    
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="save" id="save"  style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>



            
                  </form>
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


  <!-- plugins:js -->
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../../vendors/chart.js/Chart.min.js"></script>

  <!-- commented because of date picker -->
  <!-- <script src="../../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->
  <!-- Custom js for this page-->
  <script src="../../../js/chart.js"></script>

  <!-- commented because of date picker -->
  <!-- <script src="../../js/navtype_session.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->      
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

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


<script language="javascript" type="text/javascript"></script>


</body>
</html>