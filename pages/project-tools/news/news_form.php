
<script>
function frmValidate(frm){
	var msg = "<?php echo _JS_FORM_ERROR;?>\r\n-----------------------------------------";
	var flag = true;
	/*var invid=frm.invid.value;
	var id_inv='paymentdate_'+invid;
	alert(id_inv);
	alert(invid);*/
	if(frm.title1.value == ""){
		msg = msg + "\r\n<?php echo "News Title is required field";?>";
		flag = false;
	}
	if(frm.newsdate.value == ""){
		msg = msg + "\r\n<?php echo "Date is required field";?>";
		flag = false;
	}
	
	if(flag == false){
		alert(msg);
		return false;
	}
}
</script>
<script language="javascript" type="text/javascript">
function getXMLHTTP2() { //fuction to return the xml http object
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
function doDeleteNewsFile(news_cd,image,name) {

		
			var strURL="<?php echo SITE_URL; ?>delete_image.php?news_cd="+news_cd+"&image="+image+"&name="+name;
		
			var req = getXMLHTTP2();
				
			if (req) {
				//alert("if");
				
				req.onreadystatechange = function() {
					if (req.readyState == 4) {
						// only if "OK"
						if (req.status == 200) {	
						    document.getElementById('delete_'+name).innerHTML=req.responseText;	
						   						
						} else {
							alert("There was a problem while using XMLHTTP:7\n" + req.statusText);
						}
					}				
				}			
				req.open("GET", strURL, true);
				req.send(null);
			}
			
		
	}
</script>
<div id="wrapperPRight">
		<div id="pageContentName" class="shadowWhite"><?php echo ($mode == "U") ? 'News Edit' : 'News Add';?></div>
		<div id="pageContentRight">
		</div>
		<div class="clear"></div>
		<?php echo $objCommon->displayMessage();?>
		<div class="clear"></div>
		<div class="NoteTxt"><?php echo _NOTE;?></div>
		<div id="tableContainer">
		<script type="text/javascript">
		  $(function() {
			$( "#newsdate" ).datepicker();
		  });
		</script>
		<div class="clear"></div>			
	  	    <form name="frmNews" id="frmNews" action="" method="post" onSubmit="return frmValidate(this);" enctype="multipart/form-data">
			
			<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>" />
        	<input type="hidden" name="news_cd" id="news_cd" value="<?php echo $news_cd;?>" />
       		<div class="formfield b shadowWhite"><?php echo 'Title';?> <span style="color:#FF0000;">*</span>:</div>
			<div class="formvalue">
				
			<input class="rr_input" size="60" type="text" name="title1" id="title1" value="<?php echo $title;?>" />
		</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'News Date';?> <span style="color:#FF0000;">*</span>:</div>
			<div class="formvalue">
			<input type="text" class="rr_input" id="newsdate" name="newsdate" value="<?php if($newsdate!="")
			echo date('Y-m-d',strtotime($newsdate));?>" />
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'Upload Image1';?>:</div>
			<div class="formvalue">
			<input type="file" name="newsfile" id="newsfile" size="25" />
            <input type="hidden" name="old_news_file" value="<?php echo $newsfile;?>" />
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite">&nbsp;</div>
			<div class="formvalue">							
			<div id="delete_newsfile">
                        <?php if($newsfile!="") {?>
                        <a href="<?php echo NEWS_URL.$newsfile ;?>"  target="_blank"><img src="<?php echo NEWS_URL.$newsfile ;?>" width="40px" height="40px" /></a>
                       <a   onClick="doDeleteNewsFile(<?php echo $news_cd;?>,'<?php echo $newsfile;?>','newsfile');" href="javascript:void(null)">Remove Image?</a>
					   
					 
                        <?php }?>
						</div>
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'Upload Image2';?>:</div>
			<div class="formvalue">
			<input type="file" name="newsfile1" id="newsfile1" size="25" />
            <input type="hidden" name="old_news_file1" value="<?php echo $newsfile1;?>" />
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite">&nbsp;</div>
			<div class="formvalue">						
			<div id="delete_newsfile1">
                        <?php if($newsfile1!="") {?>
                        <a href="<?php echo NEWS_URL.$newsfile1 ;?>"  target="_blank"><img src="<?php echo NEWS_URL.$newsfile1 ;?>" width="40px" height="40px" /></a>
                       <a   onClick="doDeleteNewsFile(<?php echo $news_cd;?>,'<?php echo $newsfile1;?>','newsfile1');" href="javascript:void(null)">Remove Image?</a>
					   
					 
                        <?php }
						?>
						</div>
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'Upload Image3';?>:</div>
			<div class="formvalue">
			<input type="file" name="newsfile2" id="newsfile2" size="25" />
            <input type="hidden" name="old_news_file2" value="<?php echo $newsfile2;?>" />
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite">&nbsp;</div>
			<div class="formvalue">				
			<div id="delete_newsfile2">
                        <?php if($newsfile2!="") {?>
                        <a href="<?php echo NEWS_URL.$newsfile2 ;?>"  target="_blank"><img src="<?php echo NEWS_URL.$newsfile2 ;?>" width="40px" height="40px" /></a>
                       <a   onClick="doDeleteNewsFile(<?php echo $news_cd;?>,'<?php echo $newsfile2;?>','newsfile2');" href="javascript:void(null)">Remove Image?</a>
					   
					 
                        <?php }
						?>
						</div>
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'Upload Image4';?>:</div>
			<div class="formvalue">
			<input type="file" name="newsfile3" id="newsfile3" size="25" />
            <input type="hidden" name="old_news_file3" value="<?php echo $newsfile3;?>" />
			
			</div>	
			<div class="clear"></div>
			<div class="formfield b shadowWhite">&nbsp;</div>
			<div class="formvalue">			
			<div id="delete_newsfile3">
                        <?php if($newsfile3!="") {?>
                        <a href="<?php echo NEWS_URL.$newsfile3 ;?>"  target="_blank"><img src="<?php echo NEWS_URL.$newsfile3 ;?>" width="40px" height="40px" /></a>
                       <a   onClick="doDeleteNewsFile(<?php echo $news_cd;?>,'<?php echo $newsfile3;?>','newsfile3');" href="javascript:void(null)">Remove Image?</a>
					   
					 
                        <?php }
						?>
						</div>
			</div>					
			<div class="clear"></div>		
			<div class="formfield b shadowWhite"><?php echo 'Upload Image5';?>:</div>
			<div class="formvalue">
			<input type="file" name="newsfile4" id="newsfile4" size="25" />
            <input type="hidden" name="old_news_file4" value="<?php echo $newsfile4;?>" />
			</div>						
			<div class="clear"></div>
			<div class="formfield b shadowWhite">&nbsp;</div>
			<div class="formvalue">	
			<div id="delete_newsfile4">
                        <?php if($newsfile4!="") {?>
                        <a href="<?php echo NEWS_URL.$newsfile4 ;?>"  target="_blank"><img src="<?php echo NEWS_URL.$newsfile4 ;?>" width="40px" height="40px" /></a>
                       <a   onClick="doDeleteNewsFile(<?php echo $news_cd;?>,'<?php echo $newsfile4;?>','newsfile4');" href="javascript:void(null)">Remove Image?</a>
					   
					 
                        <?php }
						?>
						</div>
			</div>
			<div class="clear"></div>					
			<div class="formfield b shadowWhite"><?php echo 'Details';?> <span style="color:#FF0000;">*</span>:</div>
			<div class="formvalue"> 
			   <textarea rows="8" cols="1050" name="details"><?php echo $details; ?></textarea><?php
			 /* $oFCKeditor = new FCKeditor('details') ;
			  $oFCKeditor->BasePath   = SITE_URL.'fckeditor/';
			  $oFCKeditor->Width      = "506px";
			  $oFCKeditor->Height     = "250";
			  $oFCKeditor->ToolbarSet = "Basic";
			  $oFCKeditor->Value     = stripslashes($details);      
			  $oFCKeditor->Create( );*/
			  ?>
			</div>
			<div class="clear"></div>
			<div class="formfield b shadowWhite"><?php echo 'Status';?>:</div>
			<div class="formvalue" style="color:black"><input type="radio" name="status" checked="checked" value="Y" /> Active 
        		<input type="radio" name="status" value="N" <?php echo ($status == "N") ? "checked" : "";?> /> Inactive</div>
			<div class="clear"></div>		
			<div id="submit" style="margin-left:164px;"><input type="submit" class="SubmitButton" value="Save" /></div>
					  <div id="submit2">
					  <input type="button" class="SubmitButton" value=" Cancel " onclick="javascript: history.back(-1);" />
					  </div>
			<div class="clear"></div>
		    </form>
			<div class="clear"></div>
  	    </div>
	</div>







<!--<div class="title_div">
	<div style="float:left;padding-top:3px;"><?php echo ($mode == "U") ? 'Application &raquo; News Edit' : 'Application &raquo; News Add';?></div>
    <div style="float:right; padding:0px 2px 2px; *padding: 0 4px 2px 2px;">
        <a href="javascript:void(null);" onclick="history.go(-1);" class="lnkButton"><?php echo _BTN_BACK;?></a>
    </div>
</div>
<div align="left" style="padding-left:6px;"><?php echo _NOTE;?></div>
<div class="rr_form">
	<?php echo $objCommon->displayMessage();?>
	<br />
	<div id="divUpdate">
    <form name="frmContent" id="frmContent" action="" method="post">
        <input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>" />
        <input type="hidden" name="news_cd" id="news_cd" value="<?php echo $news_cd;?>" />
		
		<div class="frmCaption"><?php echo 'Language';?> <span style="color:#FF0000;">*</span> </div><div class="frmDot">:</div>
        <div class="frmElement">
        <select name="language_cd" id="language_cd" class="rr_select" style="width:200px;">
			<option value="" selected>--- Language ---</option>
			<?php echo $objCommon->langCombo($language_cd);?>
		</select>
        </div>
		<br />
		<?php if($vResult['language_cd']){?>
		<div class="frmCaption">&nbsp;</div><div class="frmDot">&nbsp;</div><div class="frmElement">
		<div class="msgError"><?php echo $vResult['language_cd'];?></div></div>
		<br />
		<?php }?>
		
		<div class="frmCaption"><?php echo 'Title';?> <span style="color:#FF0000;">*</span></div><div class="frmDot">:</div>
        <div class="frmElement"><input class="rr_input" size="60" type="text" name="title" id="title" value="<?php echo $title;?>" /></div>
		<br />
        <?php if($vResult['title']){?>
        <div class="frmCaption">&nbsp;</div><div class="frmDot">&nbsp;</div><div class="frmElement">
		<div class="msgError"><?php echo $vResult['title'];?></div></div>
		<br />
		<?php }?>
		
		<div class="frmCaption"><?php echo 'Short';?> <span style="color:#FF0000;">*</span></div><div class="frmDot">:</div>
        <div>&nbsp;</div>
        <div style="clear:both;">
        <textarea name="short" id="short" cols="70" rows="15"><?php echo stripslashes($short);?></textarea>
        <script type="text/javascript">
		//<![CDATA[
			CKEDITOR.replace( 'short',{toolbar : toolBarSet});
		//]]>
		</script>
		</div>
		<br />
		<?php if($vResult['short']){?>
        <div class="frmCaption">&nbsp;</div><div class="frmDot">&nbsp;</div><div class="frmElement">
		<div class="msgError"><?php echo $vResult['short'];?></div></div>
		<br />
		<?php }?>
		
		<div class="frmCaption"><?php echo 'Details';?> <span style="color:#FF0000;">*</span></div><div class="frmDot">:</div>
        <div>&nbsp;</div>
        <div style="clear:both;">
        <textarea name="details" id="details" cols="70" rows="15"><?php echo stripslashes($details);?></textarea>
        <script type="text/javascript">
		//<![CDATA[
			CKEDITOR.replace( 'details',{toolbar : toolBarSet});
		//]]>
		</script>
		</div>
		<br />
		<?php if($vResult['details']){?>
        <div class="frmCaption">&nbsp;</div><div class="frmDot">&nbsp;</div><div class="frmElement">
		<div class="msgError"><?php echo $vResult['details'];?></div></div>
		<br />
		<?php }?>
		
		<div class="frmCaption"><?php echo 'Status';?> <span style="color:#FF0000;">*</span> </div><div class="frmDot">:</div>
        <div class="frmElement">
        <input type="radio" name="status" checked="checked" value="Y" /> Active 
        <input type="radio" name="status" value="N" <?php echo ($status == "N") ? "checked" : "";?> /> Inactive
        </div>
		<br />
		
        <div id="div_button">
            <input type="submit" class="rr_button" value="<?php echo _BTN_SAVE;?>" />
            <input type="button" class="rr_button" value="<?php echo _BTN_CANCEL;?>" onClick="document.location='./?p=news_mgmt';" />
        </div>
        </form>
    </div>
</div>-->