

<div id="wrapperPRight">
		<div id="pageContentName"><?php echo NEWS_EVENTS_MGMT;?></div>
		<?php /*if($_SESSION['ne_user_type']==1)
				{*/
				?>
		<div id="pageContentRight">
			<div class="menu1">
				<ul>
				<li><a href="./?p=inactive_news_mgmt" class="lnkButton"><?php echo NEWS_INACTIVE;?>
					</a></li>
				<?php if($newsentry_flag==1 || $newsadm_flag==1)
				{
				?>
				<li><a href="./?p=news_form&amp;mode=add" class="lnkButton"><?php echo NEWS_ADD_NEW;?>
					</a></li>
				<?php
				}
				?>
					</ul>
				<br style="clear:left"/>
			</div>
		</div>
		<?php
		//}
		?>
		<div class="clear"></div>
			
		
	</div>

	