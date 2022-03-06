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



<!-- copied -->
<?php
require_once('../../../rs_lang.admin.php');
require_once('../../../rs_lang.eng.php');
include_once("../../../config/config.php");
//$ObjMapDrawing  = new  MapsDrawings();
//$ObjMapDrawing2 = new MapsDrawings();
//$ObjMapDrawing3 = new MapsDrawings();
//$ObjMapDrawing4 = new MapsDrawings();
//$user_cd=1;
//$_SESSION['ne_user_type']=1;
//$data_url="drawings/";
//$file_path="pictorial_data";
//$data_url="photos/";

 //$album_id=$_REQUEST['album_id'];

$edit			= $_GET['edit'];
$revert			= $_GET['revert'];
$objDb  		= new Database( );
$objSDb  		= new Database( );
$objVSDb  		= new Database( );

//@require_once("get_url.php");
//$user_cd=$uid;
$_SESSION['ne_user_type']=1;
$user_cd=1;
$pSQL = "SELECT max(pid) as pid from project";
$objDb->dbQuery($pSQL);
$pData =$objDb->dbFetchArray();
//$pData = mysql_fetch_array($pSQLResult);
 $pid=$pData["pid"];
//$edit			= $_GET['edit'];
//$objDb  		= new Database( );
//@require_once("get_url.php");
$file_path="issues/";
if(isset($_REQUEST['delete']))
{
	$nos_id=$_REQUEST['nos_id'];
	$sql="select attachment from tbl_rfi_lab where nos_id=".$_REQUEST['nos_id'];
	$objDb->dbQuery($sql);
	$res=$objDb->dbFetchArray();
	$al_file=$res['attachment'];
	@unlink($file_path.$al_file);
$objSDb->dbQuery("Delete from tbl_rfi_lab where nos_id=".$_REQUEST['nos_id']);
 $activity="Issue Record -".$_REQUEST['nos_id']."-  Deleted Successfully";
$iSQL = ("INSERT INTO pages_visit_log (log_id,request_url) VALUES ('$log_id','$activity')");
$objVSDb->dbQuery($iSQL);

}

//===============================================

 
?>
<!-- end copied -->
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



<link rel="stylesheet" href="../../../timepicker/wickedpicker.css">
<script type="text/javascript" src="../../../timepicker/wickedpicker.js"></script>

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
table{
    border:  double ;

    }
.shadow_table{
	box-shadow: 0px 2px 5px 1px  rgba(0, 0, 0, 0.3);
	  border-radius: 6px;
}
	
.text_width_table{
	max-width: 350px;
    word-wrap: initial;
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
  <div class="container-scroller">
     <!-- partial:partials/_navbar.html --><div id="partials-navbar"></div> <!-- partial -->
     <div class=" page-body-wrapper" id="pagebodywraper">
       <!-- partial:partials/_sidebar.html --> 
       <div class="sidebar sidebar-offcanvas" id="partials-sidebar-offcanvas"></div><!-- partial -->

      <div class="main-panel " id="mainpanel">
      <div class="content-wrapper" style="">
        <h4 class="text-center text-34 mb-4" style="  letter-spacing: 4px">  REQUEST FOR INFORMATION (RFI)  </h4> 

        <div class="row pt-4 pb-4" >
	<div class="col-sm-2 " style="  font-weight: 600;">  
	<?php echo MAJ_ISS;?>
	</div>
	<div class="col-sm-10 text-end" >  
	<?php if($pid != ""&&$pid!=0){?>

<button type="button" class="col-sm-2 button-33" onclick="window.open('project_issues_input.php', 'newwindow', 'left=600,top=60,width=1000,height=680');return false;"> <?php echo ADD_NEW_REC;?> </button>
<button type="button" class="col-sm-2 button-33" onclick="location.href='project_issues_archieve.php';" >  <?php echo ARCH_ISS; ?> </button>
<?php } 

?>
	</div>
</div>


<div class="table-responsive shadow_table" >  
  <table class="table issues_info   " style="background-color:#FFF" width="100%" style="" cellspacing="0">
                              <thead>
                                <tr>
                                  <th width="5%" style=" font-weight: 700; texttext-align:center; font-size:14px;"><?php echo "Serial No.";?></th>                                
                                  <th width="5%" style=" font-weight: 700; texttext-align:center; font-size:14px;"><?php echo COMP;?></th>
                                  <th width="2%" style=" font-weight: 700; texttext-align:center; font-size:14px; vertical-align:middle"> #</th>
                                  <th width="15%" style=" font-weight: 700; texttext-align:center; font-size:14px;"><?php echo TITLE;?></th>
                                  <th width="28%" style=" font-weight: 700; texttext-align:center;font-size:14px;"><?php echo DETAIL;?></th>
                                  <th width="10%" style=" font-weight: 700; texttext-align:center;font-size:14px;"><?php echo ATTACH;?></th>
								  <th width="10%" style=" font-weight: 700; texttext-align:center;font-size:14px;"><?php echo STATUS;?></th>
								    <th width="10%" style=" font-weight: 700; texttext-align:center;font-size:14px;"><?php echo ACTION;?></th>
								  <th width="10%" style=" font-weight: 700; texttext-align:center;font-size:14px;"><?php echo REMARKS;?></th>
								  <th width="10%" style=" font-weight: 700; texttext-align:center;font-size:14px;" class="text-center" colspan="2"><?php echo ACTION;?></th>					  
                                </tr>
                              </thead>
                              <tbody>
							  <?php
							     if(isset($_REQUEST['lid']) && $_REQUEST['lid']!="")
							 {
								  $compid=$_REQUEST['lid'];
								 $pdSQLcn = "SELECT * FROM  structures where lid=$compid";
							 }
							 else
							 {
								  $pdSQLcn = "SELECT * FROM  structures order by lid";
							 }
							 
						     $objDb->dbQuery($pdSQLcn);
							  $i=1;
							  while($compdata =$objDb->dbFetchArray())
						
							  {
								  
								 $cmpid= $compdata['lid'];
									 if($_SESSION['ne_user_type']==1)
									{
								  ?>
                                  <tr>
                          		<td colspan="11"  style="font-weight:bold; font-size:14; background: #b5b5f7"><?php echo $compdata['title'];?></td>
                        		</tr>
                                  <?php
									}
									else
									{
										
			$u_rightr=$compdata['user_right'];			
			$arrurightr= explode(",",$u_rightr);
			$arr_right_usersr=count($arrurightr);		
			 foreach($arrurightr as $key => $val) 
			 	{
			$arrurightr[$key] = trim($val);
			   $arightr= explode("_", $arrurightr[$key]);
			    if($arightr[0]==$user_cd)
						{
						
							if($arightr[1]==1)
							{
							$read_right=1;
							}
							else if($arightr[1]==2)
							{
							$read_right=2;
							}
							else if($arightr[1]==3)
							{
							$read_right=3;
							}
                       
						 
									  ?>
                                      <tr>
                          		<td colspan="11"  style="font-weight:bold; font-size:14; background: #FFB062"><?php echo $compdata['title'];?></td>
                        		</tr>
                           <?php
						   
						}
						 
				}
						   
									}
						
								 if(isset($_REQUEST['iss_status']) && $_REQUEST['iss_status']!="")
							 {
								  $status=$_REQUEST['iss_status'];
								  $pdSQL = "SELECT nos_id, pid, iss_no, iss_title, iss_detail, iss_status, iss_action, iss_remarks, attachment, lid FROM tbl_rfi_lab where pid=$pid and lid=$cmpid and iss_status=$status";
							 }
							 else
							 { 
							 $pdSQL = "SELECT nos_id, pid, iss_no, iss_title, iss_detail, iss_status, iss_action, iss_remarks, attachment, lid FROM tbl_rfi_lab where pid=$pid and iss_status!=0 and lid=$cmpid";
							 }



              $pdSQL = "SELECT nos_id, pid, iss_no, iss_title, iss_detail, iss_status, iss_action, iss_remarks, attachment, lid FROM tbl_rfi_lab where pid=$pid and iss_status!=0 and lid=$cmpid";
							$pdSQL .= " order by iss_no";
							$objSDb->dbQuery($pdSQL);
							  
							  if($objSDb->totalRecords()>=1)
							  {
								  $counter=0;
							  while($pdData = $objSDb->dbFetchArray())
							  {
							  /*if(mysql_num_rows($pdSQLResult)>=1)
							  {
								  $counter=0;
							  while($pdData = mysql_fetch_array($pdSQLResult))
							  {*/ 
							 
							  ?>
                              <?php  
							
                          if($_SESSION['ne_user_type']==1)
							{
				
							
								   ?>
                        <tr>
                        <td align="center" style="font-size:13px"><?php echo ++$counter; ?></td>                        
                        <td align="center" style="font-size:13px"><?php  echo $compdata['title'];
							  ?></td>
                          <td align="center" style="font-size:13px"><?php echo $pdData['iss_no'];?></td>
                          <td align="left" style="font-size:13px"><?php echo wordwrap($pdData['iss_title'],30,"<br>\n");?></td>
                          <td align="left" style="font-size:13px"><?php echo wordwrap($pdData['iss_detail'],30,"<br>\n");?></td>
                          <td align="center" style="text-align:center">
                          <?php if($pdData['attachment']!=""){?>
                          <a href="<?php echo "issues/".$pdData['attachment'];?>" target="_blank">
                          <img src="../../../images/pdf.png" width="50" height="50"/></a>
                          <?php
						  }
						  ?></td>
                          <td align="center" style="font-size:13px"><?php if($pdData['iss_status']==1) echo ACTIVE; else echo INACTIVE;?></td>
                          <td align="left" style="font-size:13px"><?php echo wordwrap($pdData['iss_action'],30,"<br>\n");?></td>
						  <td align="left" style="font-size:13px"><?php echo wordwrap($pdData['iss_remarks'],30,"<br>\n");?></td>						 
						    
						   <td align="center" style="font-size:13px; text-align:center">
						    <span style="float:right">
						   <form action="project_issues_input.php?nos_id=<?php echo $pdData['nos_id'] ?>" method="post">
						   <button type="submit" title="Edit" class="btn btn-outline-warning btn-fw px-1  py-1 " style="margin-top: 0; margin-bottom: 0; " name="edit" id="edit" value="<?php echo EDIT;?>" >    
						       <i class="ti-pencil btn-icon-prepend" ></i>  
                            </button></form></span>
						  
						   </td>					  
								    <td align="right">
						   <span style="float:right"><form action="rfi_info.php?nos_id=<?php echo $pdData['nos_id'] ?>" method="post">
						   <button type="submit" title = "Delete"  class="btn btn-outline-danger btn-fw px-1 py-1 m-0"  style="margin-top: 0; margin-bottom: 0; " name="delete" id="delete" value="<?php echo DEL;?>" onclick="return confirm('Are you sure?')" >
						   <i class="ti-trash btn-icon-prepend" ></i> 
        					</button></form></span>
						    </td>
                            </tr>
						   <?php
						   
						  
						   }
						   else
						   {
			$u_rightr=$compdata['user_right'];			
			$arrurightr= explode(",",$u_rightr);
			$arr_right_usersr=count($arrurightr);		
			 foreach($arrurightr as $key => $val) 
			 	{
			$arrurightr[$key] = trim($val);
			   $arightr= explode("_", $arrurightr[$key]);
			    if($arightr[0]==$user_cd)
						{
						
							if($arightr[1]==1)
							{
							$read_right=1;
							}
							else if($arightr[1]==2)
							{
							$read_right=2;
							}
							else if($arightr[1]==3)
							{
							$read_right=3;
							}
                       
						 
									  ?>
                                      <tr>
                        <td align="center" style="font-size:13px"><?php echo ++$counter; ?></td>                        
                        <td align="center" style="font-size:13px"><?php  echo $compdata['title'];
							  ?></td>
                          <td align="center" style="font-size:13px"><?php echo $pdData['iss_no'];?></td>
                          <td align="left" style="font-size:13px"><?php echo $pdData['iss_title'];?></td>
                          <td align="left" style="font-size:13px"><?php echo $pdData['iss_detail'];?></td>
                          <td align="center" style="text-align:center">
                          <a href="<?php echo "issues/".$pdData['attachment'];?>" target="_blank">
                          <img src="../../../images/pdf.png" width="50" height="50"/></a></td>
                          <td align="center" style="font-size:13px"><?php if($pdData['iss_status']==1) echo "Pending"; else echo "Closed";?></td>
                          <td align="left" style="font-size:13px"><?php echo $pdData['iss_action'];?></td>
						  <td align="left" style="font-size:13px"><?php echo $pdData['iss_remarks'];?></td>
                         <?php if($read_right==1 || $read_right==3)
								  {	
								  ?>
                                      <td align="center" style="font-size:13px; text-align:center">
						    <span style="float:right">
						   <form action="project_issues_input.php?nos_id=<?php echo $pdData['nos_id'] ?>" method="post">
						   <button type="submit" title="Edit" class="btn btn-outline-warning btn-fw  py-1  "  name="edit" id="edit" value="<?php echo EDIT;?>" >
						   <i class="ti-pencil btn-icon-prepend" ></i> EDIT 
             				</button></form></span>
						  
						   </td>				
                           <?php
								  }
								  if($read_right==3)
								  {
								   ?>
                                   <td align="right">
						   <span style="float:right"><form action="rfi_info.php?nos_id=<?php echo $pdData['nos_id'] ?>" method="post">
						   <button type="submit" title = "Delete" class="btn btn-outline-danger btn-fw py-1"  name="delete" id="delete" value="<?php echo DEL;?>" onclick="return confirm('Are you sure?')" >
						   <i class="ti-trash btn-icon-prepend" ></i> DELETE
      					  </button> </form></span>
						    </td>
                            <?php							   
						   }
						   ?>
                           </tr>
                           <?php
						   
						}
						 
				}
						   }
						   ?>
						  
                        
						<?php
						}
						}else
						{
						?>
						<tr>
                          <td colspan="11" ><?php echo NO_RECORD;?></td>
                        </tr>
						<?php
						}
						$i=$i+1;
						}
						?>
                            
                              </tbody>
        </table>
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