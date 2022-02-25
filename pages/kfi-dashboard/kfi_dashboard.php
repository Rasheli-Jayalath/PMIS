<?php
include_once("../../config/config.php");
$ObjKfiDash = new KfiDashboard();
$ObjKfiDash2 = new KfiDashboard();
$ObjKfiDash3 = new KfiDashboard();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KFIs Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../../css/basic-styles.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  
  <!-- CSS scrollbar style -->
  <link id="pagestyle" href="../../css/scrollbarStyle.css" rel="stylesheet" />

  <style>
        .margintopCSS {
          margin-top:10px;
        }      
    </style>

</head>

<body>
     
  <!-- Spinner -->
  <div class="text-center" style="  position: absolute; left: 50%; top: 50%; z-index: 1;">
      <div id="spinner" style="width: 60px; height: 60px;" class="spinner-border text-primary" role="status">
           <span class="sr-only"></span>
      </div>
  </div>
 <!-- Spinner -->

  <div class="container-scroller">
    
     <!-- partial:partials/_navbar.html -->
     <div id="partials-navbar"></div>
     <!-- partial -->
 
     <div class="container-fluid page-body-wrapper" id="pagebodywraper">
     
 
       <!-- partial:partials/_sidebar.html -->
       <div class="sidebar sidebar-offcanvas" id="partials-sidebar-offcanvas"></div>
       <!-- partial -->

      <div class="main-panel " id="mainpanel">
      <div class="content-wrapper" style="padding : 20px 29.5px ;">



      <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" onclick="location.reload();" role="tab" aria-controls="overview" aria-selected="true">Back to Top</a>
                    </li>
                    <li class="nav-item">
                    <a id="offcanvabutton" class="nav-link" id="filter-tab"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" href="#demographics" role="tab" aria-selected="false">Filter by Items</a>
                   
                    <!-- <button id="offcanvabutton" type="submit" class= "btn btn-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="width: 80px; height:30px;"><i style="font-size:15px; text-align:center;" class="mdi mdi-filter-variant"></i></button> -->
                     
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab"  href="#audiences"  onclick="showSpinner()" aria-expanded="false" aria-controls="collapseWidthExample" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" >Monthly Distribution</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab"  data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false" onclick="defaultPageLoadOverdues()">Overdues</a>
                    </li>
                    
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                      <a href="#" class="btn btn-otline-dark" ><i class="icon-printer"></i> Print</a>
                      <a href="#" class="btn btn-primary text-white me-0" onclick="exportReportToExcel('xlsx')"><i class="icon-download"></i> Export</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>






          <!-- Page Data Goes Here -->
            <!-- Page Data Goes Here -->

            <!-- OFF CANVAS -->
            <!-- OFF CANVAS -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvasExampleLabel">Key Financial Indicators (KFIs) Dashboard</h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <!-- <div>
                Please Choose From Dropdowns...
                </div> -->

                <div class="row" style="margin-top: 20px;">

                  <div class="form-group" id="formgrop1">

                <form class="forms-sample" style="text-align: center;" action="#">

                  <select class="form-control" style="color: #444;" id="selectBox1" onchange="getprolevel(this);">
                        <option class="text-muted" value="0">Component/Package</option>

                      <?php        

                          $ObjKfiDash->setProperty("prolvlid",0); 
                          $kfiprojectlevel = $ObjKfiDash->getActvityLevel(); 
 
                        while($plevelrows=$ObjKfiDash->dbFetchArray())
                          {
                            ?>
                           
                           <option value="<?php echo $plevelrows['itemid']; ?>"><?php echo $plevelrows['itemname']; ?></option>; 

                            <?php
                          }

                        ?>

                   </select>

                   <div id="seconddiv"></div>

                   <div id="thirddiv"></div>


                  <input type="hidden" name="lastSelectedDropID" id="lastSelectedDropID" value="1111"/> 
                  <input type="hidden" name="lastSelectedDropItemName" id="lastSelectedDropItemName" value="vvvv"/>   
                  

                  <button type="button" onclick="reportgenButton(lastSelectedDropID.value,lastSelectedDropItemName.value)" class= "btn btn-success" data-bs-toggle="offcanvas"  style="text-align: center; margin-top: 20px;">Generate Report</button>


                </form>

                </div>

                  </div>  


              </div>
            </div>
              <!-- OFF CANVAS -->
              <!-- OFF CANVAS -->


            
 
                                     
              <div class="table-responsive" id="table_report" style = "margin: auto; align-items: center; justify-content: center;"  >
 
             
              

                    </div>

                    <div class="row">

                       

                    </div>


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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>
  <!-- <script src="../../js/navtype_session.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


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


<script language="javascript" type="text/javascript">

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

function getprolevel(a){
    
  //alert(a.options[a.selectedIndex].value ) ; //project level value alert 
  var prolvlid = (a.value || a.options[a.selectedIndex].value);  
    var itemname = (a.text || a.options[a.selectedIndex].text); 

  if(prolvlid=="" || prolvlid==0)
  {
    //alert(itemname);
    document.getElementById("lastSelectedDropID").value = prolvlid;
    document.getElementById("lastSelectedDropItemName").value = itemname;
    document.getElementById("dynadiv"+prolvlid).style.display="none";
    document.getElementById("seconddiv").style.display="none";
  
  }
  else
  {
    //alert(prolvlid);
    document.getElementById("lastSelectedDropID").value = prolvlid;
    document.getElementById("lastSelectedDropItemName").value = itemname;
    document.getElementById("dynadiv"+prolvlid).style.display="block";
    document.getElementById("seconddiv").style.display="block";
  }

    var strURL="getActivityLeveldata.php?prolvlid="+prolvlid;
    var req= getXMLHTTP();

    if(req)
    {
      req.onreadystatechange = function() {
            if (req.readyState == 4) {
              //alert(req.readyState);
            // alert(req.status);
              // only if "OK"
              if (req.status == 200) {
                
             document.getElementById("seconddiv").innerHTML=req.responseText;
              // alert(req.responseText);			
              } else {
                
                alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
              }
            }				
          }			
          req.open("GET", strURL, true);
          req.send(null);
    }

}

function getsublevel(a){
 
  //alert(a.options[a.selectedIndex].value );
     // componant level and low levels alert
    var sublvlid = (a.value || a.options[a.selectedIndex].value);  
    var itemname = (a.text || a.options[a.selectedIndex].text); 

  

  if(sublvlid=="" || sublvlid==0)
  {
  
    document.getElementById("lastSelectedDropID").value = sublvlid;
    document.getElementById("lastSelectedDropItemName").value = itemname;
    document.getElementById("dynadiv"+sublvlid).style.display="none";
    //alert(sublvlid);

  }
  else
  {
    //defaultdivsPageLoad();
    //var preseleid =  document.getElementById("lastSelectedDropID").value;
    // document.getElementById("dynadiv"+preseleid).style.display="none";
    
    document.getElementById("lastSelectedDropID").value = sublvlid;
    document.getElementById("lastSelectedDropItemName").value = itemname;
    

    /////
    // var displayed = $('#thirddiv').filter(function() {
    // var element = $(this);

    // if(element.css('display') == 'block') {
    
    //     element.remove();
    //     return false;
    // }

    // return true;
    // });
    ////

    document.getElementById("dynadiv"+sublvlid).style.display="block";

    
  }

  var strURL="getActivityLeveldata.php?prolvlid="+sublvlid;
	var req= getXMLHTTP();

    if(req)
  {
    req.onreadystatechange = function() {
					if (req.readyState == 4) {
            //alert(req.readyState);
           // alert(req.status);
						// only if "OK"
						if (req.status == 200) {
              
							document.getElementById("dynadiv"+sublvlid).innerHTML=req.responseText;
             
             // alert(req.responseText);			
						} else {
              
							alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
  }
 
}

function justAlert(strr1,strr2)
{
  var itemid = strr1;
  var itemname = strr2;
  alert(itemid + itemname); 
}

function funcHideAndSeek(selector)
{
 
  
  var nodes = document.querySelectorAll( selector ),
      node,
      styleProperty = function(a, b) {
        return window.getComputedStyle ? window.getComputedStyle(a).getPropertyValue(b) : a.currentStyle[b];
      };

  [].forEach.call(nodes, function( a, b ) {
    node = a;

    node.style.display = styleProperty(node, 'display') === 'block' ? 'none' : 'block';
  });

 
}

    function reportgenButton(strval,itemname) {
      //alert(strval+itemname);
      
      var strURL="newTableReport_testing.php?itemids="+strval+"&itemname="+itemname;
         // var strURL="tableReport.php?itemids="+str;
          var req= getXMLHTTP();

          if(req)
            {
              req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                      //alert(req.readyState);
                     //alert(str);
                      // only if "OK"
                      if (req.status == 200) {
                        
                        document.getElementById("table_report").innerHTML=req.responseText;
                      // alert(req.responseText);			
                      } else {
                        
                        alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
                      }
                    }				
                  }			
                  req.open("GET", strURL, true);
                  req.send(null);
            }


          }

          function reportgenPageLoad(strval,strname) {
         
            var strURL="newTableReport_testing.php?itemids="+strval+"&itemname="+strname;
           //var strURL="newTableReport.php?itemids="+strval+"&itemname="+strname;

         var req= getXMLHTTP();

         if(req)
           {
             req.onreadystatechange = function() {
                   if (req.readyState == 4) {
                     //alert(req.readyState);
                    //alert(str);
                     // only if "OK"
                     if (req.status == 200) {
                       
                       document.getElementById("table_report").innerHTML=req.responseText;

                       hideSpinner();
                     // alert(req.responseText);			
                     } else {
                       
                       alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
                     }
                   }				
                 }			
                 req.open("GET", strURL, true);
                 req.send(null);
           }

         }

         function defaultdivsPageLoad()
         {
          var strURL="thirddiv_defaultdivs.php";

           var req= getXMLHTTP();
           if(req)
           {
             req.onreadystatechange = function() {
                   if (req.readyState == 4) {
                     //alert(req.readyState);
                    //alert(str);
                     // only if "OK"
                     if (req.status == 200) {
                       
                       document.getElementById("thirddiv").innerHTML=req.responseText;
                     // alert(req.responseText);			
                     } else {
                       
                       alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
                     }
                   }				
                 }			
                 req.open("GET", strURL, true);
                 req.send(null);
           }

         }

         function defaultPageLoadOverdues()
         {
          var secondOptionValue = document.getElementById('selectBox1').options[1].value; 
        var secondOptionText = document.getElementById('selectBox1').options[1].text; 

          var strURL="newTableReport_testing_overdues.php?itemids="+secondOptionValue+"&itemname="+secondOptionText;
           //var strURL="newTableReport.php?itemids="+strval+"&itemname="+strname;

         var req= getXMLHTTP();

         if(req)
           {
             req.onreadystatechange = function() {
                   if (req.readyState == 4) {
                     //alert(req.readyState);
                    //alert(str);
                     // only if "OK"
                     if (req.status == 200) {
                       
                       document.getElementById("table_report").innerHTML=req.responseText;
                     // alert(req.responseText);			
                     } else {
                       
                       alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
                     }
                   }				
                 }			
                 req.open("GET", strURL, true);
                 req.send(null);
           }
         }

          // Function to hide the Spinner
            function hideSpinner() {
                document.getElementById('spinner')
                        .style.display = 'none';
            } 

                  // Function to hide the Spinner
            function showSpinner() {

                    document.getElementById('spinner').style.display = 'block';

                    function refreshTime() {

                        if($('#collapseWidthExample').hasClass('collapse'))
                        {
                          document.getElementById('spinner')
                        .style.display = 'none';
                        }

                  }

                  setInterval(refreshTime, 10);

                
            } 


            function generatePDF()
            {
              const element = document.getElementById("table_report");

              var opt = {
                      filename:     'exported.pdf',
                      image:        { type: 'jpeg', quality: 0.98 },
                      html2canvas:  {width:2000,},
                      jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape' }
                    };

              html2pdf().set(opt).from(element).save();

            }


            function exportReportToExcel(type, fn, dl) {

              

              var tabletitlename = document.getElementById('tabletitlename').innerHTML;
//alert(tabletitlename);

            //   $("#table_report").table2excel({
            //     exclude: ".excludeThisClass",
            //     name: "Sheet 01",
            //     filename: "exporteddatea.xls", // do include extension
            //     preserveColors: false // set to true if you want background colors and font colors preserved
            // });

            var elt = document.getElementById('table_report');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet 1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || (tabletitlename+'.' + (type || 'xlsx')));


            }

</script>

<!-- Page Load Function -->
<!-- Page Load Function -->
  <script>
      window.onload = function() {
        var secondOptionValue = document.getElementById('selectBox1').options[1].value; 
        var secondOptionText = document.getElementById('selectBox1').options[1].text; 
        //var secondOptionText = document.getElementById('lastSelectedDropItemName').value; 
          //alert(secondOptionText);
          reportgenPageLoad(secondOptionValue,secondOptionText);

          defaultdivsPageLoad();
      };



  </script>


</body>

</html>