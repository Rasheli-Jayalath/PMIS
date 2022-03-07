

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php //include ('includes/metatag.php'); ?>

<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="scripts/JsCommon.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="datepickercode/jquery-ui.css" />
  <script type="text/javascript" src="datepickercode/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="datepickercode/jquery-ui.js"></script>
  <!-- <script>
  function required(){
	
	var x =document.getElementById("lid").value;
	var iss_title =document.getElementById("iss_title").value;
	var iss_no =document.getElementById("iss_no").value;
	var file =document.getElementById("al_file").value;
	var old_file =document.getElementById("old_al_file").value;
	
	 if (x == 0) {
    alert("Select Component First");
    return false;
  		}
		else if (iss_title == '') {
    alert("Please Add Title!");
    return false;
  		}
		else if (iss_no == '') {
    alert("Please Add Issue Number!");
    return false;
  		}
		
  
  }
  </script> -->


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Input - Project News & Events </title>
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

 

    </style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.9.2/jquery-ui.min.js"></script>

  <script> 
$(document).ready(function () {
    var date = new Date();
    $('#date_input').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script> 


</head>
<body>
<div class="container-fluid">
    <div class=" grid-margin stretch-card " style = "margin-top: 3%;">
              <div class="card" style="background-image: linear-gradient(180deg, #f0f0fc, #f0f0fc);">
                <div class="card-body text-center">

                <div class="row">
                      <div class="col-sm-4">       </div>
                      <div class="col-sm-4 text-end">     <h4 class="card-title ">  Input - Project News & Events </h4>   </div>
                      <div class=" col-sm-4">     </div>
                </div>
                
                 
				  <?php echo $message; ?>
          <form class="forms-sample pt-3" action="news_info_input.php" target="_self" method="post"  enctype="multipart/form-data" onsubmit="return required();" >

            <div class="row  pt-2 ">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Title: </label>
                            <div class="col-sm-8 text-start"> 
                            <input class=" form-control"  type="text" name="" id="" value="" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end"> News Date : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control"  type="text" name="" id="date_input" value="" />
                            </div>
                          </div>
                        </div>
            </div>
            <div class="row  pt-2 ">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Upload Image1 : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control  bg-light text-dark "  type="file" name="" id="" value="" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Upload Image2 : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control  bg-light text-dark "  type="file" name="" id="" value="" />
                            </div>
                          </div>
                        </div>
            </div>
            <div class="row  pt-2 ">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Upload Image3 : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control  bg-light text-dark "  type="file" name="" id="" value="" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Upload Image4 : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control  bg-light text-dark "  type="file" name="" id="" value="" />
                            </div>
                          </div>
                        </div>
            </div>
            <div class="row pt-2">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  Upload Image5 : </label>
                            <div class="col-sm-8 text-start">
                            <input class=" form-control bg-light text-dark "  type="file" name="" id="" value="" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end">  </label>
                            <div class="col-sm-8 text-start">
                       
                            </div>
                          </div>
                        </div>
            </div>
            <div class="row pt-2 pb-3">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end"> Details  : </label>
                            <div class="col-sm-8 text-start">
                            <textarea class="form-control" rows="4" style=" height: 100px; "  name=""> </textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 text-end"> Status : </label>
                            <div class="col-sm-8 text-start">
                            <label class="form-check-label" style="padding-left: 1%;">
                                  <input  type="radio" class="form-check-input"  id="" name="is_status" value="1"  checked="checked"/> Active
                            </label>
                            <label class="form-check-label " style="padding-left: 10%;">
                                   <input  type="radio" class="form-check-input" id="" name="is_status" value="2"  /> Inactive
                            </label>

                            </div>
                          </div>
                        </div>
            </div>
               
   <button  type="submit" name="save" id="save" class="btn btn-primary me-2"  value="Save" style="width:20%"> Save </button>
   <button class="btn btn-light" type="button" style="width:20%" onclick="javascript:window.close()" >Cancel</button>

          </form>
                </div>
              </div>
            </div>

				
			<div id="search"></div>
			<div id="without_search"></div>
</div>


</body>
</html>
