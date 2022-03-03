

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

}
.style-five {

box-shadow: 0px 0px 2px 1px #1a1a7d;
padding-top: 0px ;
margin-top: 20px ;
margin-bottom: 20px ;
width: 102%;
}

    


    </style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.min.js"></script>

  <script> 
$(document).ready(function () {
   var date = new Date(); 
$('#datepicker1').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#datepicker3').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#datepicker4').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#datepicker5').datepicker({ dateFormat: 'yy-mm-dd'}); });

$(document).ready(function () {
   var date = new Date(); 
$('#datepicker6').datepicker({ dateFormat: 'yy-mm-dd'}); });
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

              <div class="card ">
                <div class="card-body">


            <form class="form-sample">



         <h4 class="card-title text-center">RFI Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end ">Contract No :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder=""  />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end  ">Section :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Site :</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Number</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Reference RFI Number :</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> RFI Date :</label>
                          <div class="col-sm-9">
                          <input class="form-control" id="datepicker1" placeholder ="yyyy-mm-dd" type="text" />
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Submission Date </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="datepicker2" placeholder="yyyy-mm-dd" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">RFI Submission  Time</label>
                          <div class="col-sm-9">
                            <input type="text" id="" name="" class="timepicker form-control">
                            <script type="text/javascript"> $('.timepicker').wickedpicker({now: '00:00', twentyFour: true, showSeconds: false}); </script>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Activity Location From :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Activity Location To :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Contractor Rep Name:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Received by:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Received Date</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name=""  id="datepicker3" placeholder="yyyy-mm-dd" />
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
                            <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end"> Scanned Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light" name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="" id="" value="" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>



       
        <h4 class="card-title text-center pt-4 pb-1">Survey Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Surveyor Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
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
                          <input type="text" class="form-control" name=""  id="datepicker4" placeholder="yyyy-mm-dd" />
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
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Survey Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light" name=""  id="" placeholder="" />
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
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="" id="" value="" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>
            


       
        <h4 class="card-title text-center pt-4 pb-1">Inspection Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspector Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
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
                          <input type="text" class="form-control" name=""  id="datepicker5" placeholder="yyyy-mm-dd" />
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
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Document</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name=""  id="" placeholder="" />
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
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="" id="" value="" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>

                        


       
        <h4 class="card-title text-center pt-4 pb-1">Quality Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">MT Engineer Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name=""  id="" placeholder="" />
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
                          <input type="text" class="form-control" name=""  id="datepicker6" placeholder="yyyy-mm-dd" />
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
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Sample Numbers:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Report:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Result:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Comments</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Inspection Document:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                  
                    </div>
    
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="" id="" value="" style="width:15%">Save</button>
            </div>
            <div class="style-five row" >  </div>



            
                        


       
        <h4 class="card-title text-center pt-4 pb-1">Approved Details</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Approved Authority :</label>
                          <div class="col-sm-9">
                          <select class="form-control bg-light text-dark"  name=""  id="" >
                              <option>option 1</option>
                              <option>option 2</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end ">Approved Authority Name  </label>
                          <div class="col-sm-9">
                          <select class="form-control bg-light text-dark"  name=""  id="" >
                              <option>option 1</option>
                              <option>option 2</option>
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
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Test Sample Numbers:</label>
                          <div class="col-sm-9">
                          <textarea  class="form-control" rows="4" style=" height: 100px; "  name="" > </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 text-end">Approved Document:</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control bg-light " name=""  id="" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                      
                            <label class="col-sm-3 text-end"> Approved Status: </label>
                            <div class="col-sm-9 text-start">
                            <label class="form-check-label" style="padding-left: 1%;">
                                  <input  type="radio" class="form-check-input"  id="" name="approved_status" value=""  checked="checked"/> Approved
                            </label>
                            <label class="form-check-label " style="padding-left: 5%;">
                                   <input  type="radio" class="form-check-input" id="" name="approved_status" value=""  /> Rejected
                            </label>
                            <label class="form-check-label " style="padding-left: 5%;">
                                   <input  type="radio" class="form-check-input" id="" name="approved_status" value=""  /> Partially Approved
                            </label>
                            </div>
                          
                        </div>
                      </div>
                    </div>
    
            <!-- Save button -->
            <div class="pt-2 text-end pb-3" > 
                <button  class="btn btn-primary button-33 py-2 me-3" type="submit" name="" id="" value="" style="width:15%">Save</button>
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


</body>
</html>