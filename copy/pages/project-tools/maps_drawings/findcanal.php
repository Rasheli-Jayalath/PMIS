<?php
include_once("../../../config/config.php");
$ObjMapDrawings = new MapsDrawings();
error_reporting(E_ALL & ~E_NOTICE);
//@require_once("requires/session.php");

$admflag 			= $_SESSION['admflag'];
$superadmflag	 	= $_SESSION['superadmflag'];
$module 			= $_REQUEST['module'];
$isentry		    = $_REQUEST['isentry'];
$lid	        	= $_REQUEST['lid'];

$sCondition = '';
$ObjMapDrawings->setProperty("lid",$lid); 
$pictoalbumname = $ObjMapDrawings->getAllComponents(); 


?>

  <div class="form-group row" >
                      <label for="exampleInputUsername2" style="font-weight: bold; " class="col-sm-5 col-form-label rl-p0">Component</label>
                      <div class="col-sm-7 rl-p0" >
                      <select  id="canal_name" name="canal_name" onchange="getDates(this.value)"  class="form-control"  style="font-size: 14px; color: #000;background-color: #fff;">
                        <option value="0">Select Component</option>

                        <?php
                        
                           
                            while($rowsallcompo=$ObjMapDrawings->dbFetchArray())
                            {
                                $albumid = $rowsallcompo['albumid'];
                                $album_name = $rowsallcompo['album_name'];
                        ?>
                        <option value="<?php echo $albumid;?>"><?php echo $album_name;?></option>
                                  
                        <?php
                            }
                       
                           ?>

  </select>
                      </div>
           </div>