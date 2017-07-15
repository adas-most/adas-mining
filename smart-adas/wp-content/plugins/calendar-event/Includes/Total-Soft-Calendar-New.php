<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Calendar-Install.php');
	global $wpdb;

	$table_name  = $wpdb->prefix . "totalsoft_fonts";
	$table_name3 = $wpdb->prefix . "totalsoft_cal_events";
	$table_name4 = $wpdb->prefix . "totalsoft_cal_types";

	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	$TotalSoftCalCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoftCal_GW_Output.value=parseInt(TotalSoftCal_GW.value)+'px';TotalSoftCal_BW_Output.value=parseInt(TotalSoftCal_BW.value)+'px';TotalSoftCal_MW_Output.value=parseInt(TotalSoftCal_MW.value)+'px';TotalSoftCal_HFS_Output.value=parseInt(TotalSoftCal_HFS.value)+'px';TotalSoftCal_WFS_Output.value=parseInt(TotalSoftCal_WFS.value)+'px';TotalSoftCal_LAW_Output.value=parseInt(TotalSoftCal_LAW.value)+'px';TotalSoftCal_DFS_Output.value=parseInt(TotalSoftCal_DFS.value)+'px';TotalSoftCal_TFS_Output.value=parseInt(TotalSoftCal_TFS.value)+'px';TotalSoftCal_RefIcSize_Output.value=parseInt(TotalSoftCal_RefIcSize.value)+'px'; TotalSoftCal_ArrowSize_Output.value=parseInt(TotalSoftCal_ArrowSize.value)+'px'; TotalSoftCal2_BW_Output.value=parseInt(TotalSoftCal2_BW.value)+'px'; TotalSoftCal2_W_Output.value=parseInt(TotalSoftCal2_W.value)+'px'; TotalSoftCal2_BxSh_Output.value=parseInt(TotalSoftCal2_BxSh.value)+'px'; TotalSoftCal2_MFS_Output.value=parseInt(TotalSoftCal2_MFS.value)+'px'; TotalSoftCal2_WFS_Output.value=parseInt(TotalSoftCal2_WFS.value)+'px'; TotalSoftCal2_LAW_W_Output.value=parseInt(TotalSoftCal2_LAW_W.value)+'px'; TotalSoftCal2_DFS_Output.value=parseInt(TotalSoftCal2_DFS.value)+'px'; TotalSoftCal2_TdFS_Output.value=parseInt(TotalSoftCal2_TdFS.value)+'px'; TotalSoftCal2_EdFS_Output.value=parseInt(TotalSoftCal2_EdFS.value)+'px'; TotalSoftCal2_ArrFS_Output.value=parseInt(TotalSoftCal2_ArrFS.value)+'px'; TotalSoftCal2_OmFS_Output.value=parseInt(TotalSoftCal2_OmFS.value)+'px'; TotalSoftCal2_Ev_HFS_Output.value=parseInt(TotalSoftCal2_Ev_HFS.value)+'px'; TotalSoftCal2_Ev_TFS_Output.value=parseInt(TotalSoftCal2_Ev_TFS.value)+'px'; TotalSoftCal2_Ev_DFS_Output.value=parseInt(TotalSoftCal2_Ev_DFS.value)+'px'; TotalSoftCal2_H_Output.value=parseInt(TotalSoftCal2_H.value)+'px';">
	<div class="Total_Soft_Cal_AMD">
		<a href="http://total-soft.pe.hu/calendar-event/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i><span style="margin-left:5px;">Get The Full Version</span></div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Total_Soft_Cal_AMD1"></div>
		<div class="Total_Soft_Cal_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Click for Canceling', 'Total-Soft-Calendar' );?>"></i>
			<input type="button" value="<?php echo __( 'Cancel', 'Total-Soft-Calendar' );?>" class="Total_Soft_Cal_AMD2_But" onclick='TotalSoft_Reload()'>
		</div>
	</div>

	<table class="Total_Soft_AMMTable">
		<tr class="Total_Soft_AMMTableFR">
			<td><?php echo __( 'No', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Calendar Name', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Events Quantity', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Actions', 'Total-Soft-Calendar' );?></td>
		</tr>
	</table>

	<table class="Total_Soft_AMOTable">
	 	<?php for($i=0;$i<count($TotalSoftCalCount);$i++){
	 		$TotalSoft_Cal_Ev=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE TotalSoftCal_EvCal=%d", $TotalSoftCalCount[$i]->id));
	 		?> 
	 		<tr>
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftCalCount[$i]->TotalSoftCal_Name;?></td>
				<td><?php echo count($TotalSoft_Cal_Ev);?></td>
				<td onclick="TotalSoftCal_Edit(<?php echo $TotalSoftCalCount[$i]->id;?>)"><i class="Total_Soft_icon totalsoft totalsoft-pencil"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-trash"></i></td>
			</tr>
	 	<?php }?>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTable_Main" onclick="Total_Soft_Calendar_Free_Options()">
		<tr>
			<td><?php echo __( 'Calendar Name', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar name, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_Name" id="TotalSoftCal_Name" class="Total_Soft_Select" required placeholder=" * <?php echo __( 'Required', 'Total-Soft-Calendar' );?>"></td>
			<td><?php echo __( 'Calendar Type', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar type, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_Type" id="TotalSoftCal_Type" onchange="TotalSoftCal_Type_Changed()">
					<option value="Event Calendar"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_Type=='Event Calendar'){echo 'selected';}?>><?php echo __( 'Event Calendar', 'Total-Soft-Calendar' );?> </option>
					<option value="Simple Calendar" <?php if($TotalSoftCal_1[0]->TotalSoftCal_Type=='Simple Calendar'){echo 'selected';}?>><?php echo __( 'Simple Calendar', 'Total-Soft-Calendar' );?></option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_1" onclick="Total_Soft_Calendar_Free_Options()">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_WDStart" id="TotalSoftCal_WDStart">
					<option value="Sun" <?php if($TotalSoftCal_1[0]->TotalSoftCal_WDStart=='Sun'){echo 'selected';}?>><?php echo __( 'Sunday', 'Total-Soft-Calendar' );?></option>
					<option value="Mon" <?php if($TotalSoftCal_1[0]->TotalSoftCal_WDStart=='Mon'){echo 'selected';}?>><?php echo __( 'Monday', 'Total-Soft-Calendar' );?></option>
				</select>
			</td>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose main background color in calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_BgCol" id="TotalSoftCal_BgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_BgCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Grid Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select grid color which divide the days in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_GrCol" id="TotalSoftCal_GrCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_GrCol;?>"></td>
			<td><?php echo __( 'Grid Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the grid width, you can choose it corresponding  to your calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>			
				<input type="range" name="TotalSoftCal_GW" id="TotalSoftCal_GW" min="0" max="5" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_GW;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_GW_Output" id="TotalSoftCal_GW_Output" for="TotalSoftCal_GW"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_GW;?>px</output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_BW" id="TotalSoftCal_BW" min="0" max="10" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_BW;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_BW_Output" id="TotalSoftCal_BW_Output" for="TotalSoftCal_BW"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_BW;?>px</output>
			</td>
			<td><?php echo __( 'Border Style', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_BStyle" id="TotalSoftCal_BStyle">
					<option value="none"   <?php if($TotalSoftCal_1[0]->TotalSoftCal_BStyle=='none'){echo 'selected';}?>>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_BStyle=='solid'){echo 'selected';}?>>  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed" <?php if($TotalSoftCal_1[0]->TotalSoftCal_BStyle=='dashed'){echo 'selected';}?>> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted" <?php if($TotalSoftCal_1[0]->TotalSoftCal_BStyle=='dotted'){echo 'selected';}?>> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_BCol" id="TotalSoftCal_BCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_BCol;?>"></td>
			<td><?php echo __( 'Box Shadow Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select shadow color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_BSCol" id="TotalSoftCal_BSCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_BSCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Max Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_MW" id="TotalSoftCal_MW" min="150" max="1000" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_MW;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_MW_Output" id="TotalSoftCal_MW_Output" for="TotalSoftCal_MW"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_MW;?>px</output>
			</td>
			<td><?php echo __( 'Numbers Position', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Mention, the days in calendar must be from right or from left.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_NumPos" id="TotalSoftCal_NumPos">
					<option value="left"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_NumPos=='left'){echo 'selected';}?>>  <?php echo __( 'Left', 'Total-Soft-Calendar' );?>  </option>
					<option value="right" <?php if($TotalSoftCal_1[0]->TotalSoftCal_NumPos=='right'){echo 'selected';}?>> <?php echo __( 'Right', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_HBgCol" id="TotalSoftCal_HBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_HBgCol;?>"></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_HCol" id="TotalSoftCal_HCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_HCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_HFS" id="TotalSoftCal_HFS" min="8" max="36" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_HFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_HFS_Output" id="TotalSoftCal_HFS_Output" for="TotalSoftCal_HFS"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_HFS;?>px</output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_HFF" id="TotalSoftCal_HFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_1[0]->TotalSoftCal_HFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Weekday Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_WBgCol" id="TotalSoftCal_WBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_WBgCol;?>"></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_WCol" id="TotalSoftCal_WCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_WCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?> "></i></td>
			<td>
				<input type="range" name="TotalSoftCal_WFS" id="TotalSoftCal_WFS" min="8" max="36" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_WFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_WFS_Output" id="TotalSoftCal_WFS_Output" for="TotalSoftCal_WFS"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_WFS;?>px</output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_WFF" id="TotalSoftCal_WFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_1[0]->TotalSoftCal_WFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Weekday', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_LAW" id="TotalSoftCal_LAW" min="0" max="5" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_LAW;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_LAW_Output" id="TotalSoftCal_LAW_Output" for="TotalSoftCal_LAW"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_LAW;?>px</output>
			</td>
			<td><?php echo __( 'Style', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_LAWS" id="TotalSoftCal_LAWS">
					<option value="none"   <?php if($TotalSoftCal_1[0]->TotalSoftCal_LAWS=='none'){echo 'selected';}?>>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_LAWS=='solid'){echo 'selected';}?>>  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed" <?php if($TotalSoftCal_1[0]->TotalSoftCal_LAWS=='dashed'){echo 'selected';}?>> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted" <?php if($TotalSoftCal_1[0]->TotalSoftCal_LAWS=='dotted'){echo 'selected';}?>> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_LAWC" id="TotalSoftCal_LAWC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_LAWC;?>"></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_DBgCol" id="TotalSoftCal_DBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_DBgCol;?>"></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_DCol" id="TotalSoftCal_DCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_DCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_DFS" id="TotalSoftCal_DFS" min="8" max="25" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_DFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_DFS_Output" id="TotalSoftCal_DFS_Output" for="TotalSoftCal_DFS"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_DFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Todays Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_TBgCol" id="TotalSoftCal_TBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_TBgCol;?>"></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_TCol" id="TotalSoftCal_TCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_TCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_TFS" id="TotalSoftCal_TFS" min="8" max="25" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_TFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_TFS_Output" id="TotalSoftCal_TFS_Output" for="TotalSoftCal_TFS"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_TFS;?>px</output>
			</td>
			<td><?php echo __( "Number's Background Color", 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background color of the day, it is designed for the frame.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_TNBgCol" id="TotalSoftCal_TNBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_TNBgCol;?>"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Hover Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_HovBgCol" id="TotalSoftCal_HovBgCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_HovBgCol;?>"></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_HovCol" id="TotalSoftCal_HovCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_HovCol;?>"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Refresh Icon Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a color for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_RefIcCol" id="TotalSoftCal_RefIcCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_RefIcCol;?>"></td>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a size for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_RefIcSize" id="TotalSoftCal_RefIcSize" min="8" max="25" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_RefIcSize;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_RefIcSize_Output" id="TotalSoftCal_RefIcSize_Output" for="TotalSoftCal_RefIcSize"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_RefIcSize;?>px</output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Arrows Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Choose Icon', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the right and the left icons, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_ArrowType" id="TotalSoftCal_ArrowType">
					<option value="1"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='1'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value="2"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='2'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value="3"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='3'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value="4"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='4'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value="5"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='5'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value="6"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='6'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value="7"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='7'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value="8"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='8'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value="9"  <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='9'){echo 'selected';}?>>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value="10" <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='10'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value="11" <?php if($TotalSoftCal_1[0]->TotalSoftCal_ArrowType=='11'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_ArrowCol" id="TotalSoftCal_ArrowCol" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_ArrowCol;?>"></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal_ArrowSize" id="TotalSoftCal_ArrowSize" min="8" max="25" value="<?php echo $TotalSoftCal_1[0]->TotalSoftCal_ArrowSize;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal_ArrowSize_Output" id="TotalSoftCal_ArrowSize_Output" for="TotalSoftCal_ArrowSize"><?php echo $TotalSoftCal_1[0]->TotalSoftCal_ArrowSize;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_2" onclick="Total_Soft_Calendar_Free_Options()">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'WeedDay Start', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_WDStart" id="TotalSoftCal2_WDStart">
					<option value="0" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_WDStart=='0'){echo 'selected';}?>><?php echo __( 'Sunday', 'Total-Soft-Calendar' );?></option>
					<option value="1" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_WDStart=='1'){echo 'selected';}?>><?php echo __( 'Monday', 'Total-Soft-Calendar' );?></option>
				</select>
			</td>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_BW" id="TotalSoftCal2_BW" min="0" max="5" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BW;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_BW_Output" id="TotalSoftCal2_BW_Output" for="TotalSoftCal2_BW"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BW;?>px</output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Style', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_BS" id="TotalSoftCal2_BS">
					<option value="none"   <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BS=='none'){echo 'selected';}?>>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid"  <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BS=='solid'){echo 'selected';}?>>  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BS=='dashed'){echo 'selected';}?>> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BS=='dotted'){echo 'selected';}?>> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_BC" id="TotalSoftCal2_BC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_W" id="TotalSoftCal2_W" min="150" max="1200" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_W;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_W_Output" id="TotalSoftCal2_W_Output" for="TotalSoftCal2_W"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_W;?>px</output>
			</td>
			<td><?php echo __( 'Height', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar height.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_H" id="TotalSoftCal2_H" min="300" max="1200" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_H;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_H_Output" id="TotalSoftCal2_H_Output" for="TotalSoftCal2_H"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_H;?>px</output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Box Shadow', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose to show the boxshadow or no.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_BxShShow" id="TotalSoftCal2_BxShShow">
					<option value="Yes" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BxShShow=='Yes'){echo 'selected';}?>> <?php echo __( 'Yes', 'Total-Soft-Calendar' );?> </option>
					<option value="No"  <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BxShShow=='No'){echo 'selected';}?>>  <?php echo __( 'No', 'Total-Soft-Calendar' );?>  </option>
				</select>
			</td>
			<td><?php echo __( 'Shadow Type', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_BxShType" id="TotalSoftCal2_BxShType">
					<option value="1" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BxShType=='1'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
					<option value="2" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_BxShType=='2'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Shadow', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the shadow size for the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_BxSh" id="TotalSoftCal2_BxSh" min="0" max="50" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BxSh;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_BxSh_Output" id="TotalSoftCal2_BxSh_Output" for="TotalSoftCal2_BxSh"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BxSh;?>px</output>
			</td>
			<td><?php echo __( 'Shadow Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select shadow color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_BxShC" id="TotalSoftCal2_BxShC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_BxShC;?>">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Calendar Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_MBgC" id="TotalSoftCal2_MBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_MBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_MC" id="TotalSoftCal2_MC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_MC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_MFS" id="TotalSoftCal2_MFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_MFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_MFS_Output" id="TotalSoftCal2_MFS_Output" for="TotalSoftCal2_MFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_MFS;?>px</output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_MFF" id="TotalSoftCal2_MFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_2[0]->TotalSoftCal2_MFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'WeekDay Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_WBgC" id="TotalSoftCal2_WBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_WBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_WC" id="TotalSoftCal2_WC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_WC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_WFS" id="TotalSoftCal2_WFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_WFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_WFS_Output" id="TotalSoftCal2_WFS_Output" for="TotalSoftCal2_WFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_WFS;?>px</output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_WFF" id="TotalSoftCal2_WFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_2[0]->TotalSoftCal2_WFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After WeekDay', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_LAW_W" id="TotalSoftCal2_LAW_W" min="0" max="3" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_LAW_W;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_LAW_W_Output" id="TotalSoftCal2_LAW_W_Output" for="TotalSoftCal2_LAW_W"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_LAW_W;?>px</output>
			</td>
			<td><?php echo __( 'Style', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_LAW_S" id="TotalSoftCal2_LAW_S">
					<option value="none"   <?php if($TotalSoftCal_2[0]->TotalSoftCal2_LAW_S=='none'){echo 'selected';}?>>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid"  <?php if($TotalSoftCal_2[0]->TotalSoftCal2_LAW_S=='solid'){echo 'selected';}?>>  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_LAW_S=='dashed'){echo 'selected';}?>> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted" <?php if($TotalSoftCal_2[0]->TotalSoftCal2_LAW_S=='dotted'){echo 'selected';}?>> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_LAW_C" id="TotalSoftCal2_LAW_C" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_LAW_C;?>">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_DBgC" id="TotalSoftCal2_DBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_DBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_DC" id="TotalSoftCal2_DC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_DC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_DFS" id="TotalSoftCal2_DFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_DFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_DFS_Output" id="TotalSoftCal2_DFS_Output" for="TotalSoftCal2_DFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_DFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Todays Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the background color of the current day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_TdBgC" id="TotalSoftCal2_TdBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_TdBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the current date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_TdC" id="TotalSoftCal2_TdC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_TdC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_TdFS" id="TotalSoftCal2_TdFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_TdFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_TdFS_Output" id="TotalSoftCal2_TdFS_Output" for="TotalSoftCal2_TdFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_TdFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for event days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_EdBgC" id="TotalSoftCal2_EdBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_EdBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_EdC" id="TotalSoftCal2_EdC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_EdC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_EdFS" id="TotalSoftCal2_EdFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_EdFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_EdFS_Output" id="TotalSoftCal2_EdFS_Output" for="TotalSoftCal2_EdFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_EdFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Hover Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_HBgC" id="TotalSoftCal2_HBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_HBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_HC" id="TotalSoftCal2_HC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_HC;?>">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Arrows Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Type', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the right and the left icons for calendar, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_ArrType" id="TotalSoftCal2_ArrType">
					<option value='angle-double'   <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='angle-double'){echo 'selected';}?>>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='angle'          <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='angle'){echo 'selected';}?>>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='arrow-circle'   <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='arrow-circle'){echo 'selected';}?>>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='arrow-circle-o' <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='arrow-circle-o'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='arrow'          <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='arrow'){echo 'selected';}?>>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='caret'          <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='caret'){echo 'selected';}?>>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='caret-square-o' <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='caret-square-o'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='chevron-circle' <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='chevron-circle'){echo 'selected';}?>> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='chevron'        <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='chevron'){echo 'selected';}?>>        <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='hand-o'         <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='hand-o'){echo 'selected';}?>>         <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='long-arrow'     <?php if($TotalSoftCal_2[0]->TotalSoftCal2_ArrType=='long-arrow'){echo 'selected';}?>>     <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_ArrFS" id="TotalSoftCal2_ArrFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_ArrFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_ArrFS_Output" id="TotalSoftCal2_ArrFS_Output" for="TotalSoftCal2_ArrFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_ArrFS;?>px</output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_ArrC" id="TotalSoftCal2_ArrC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_ArrC;?>">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Other Months Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background color for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_OmBgC" id="TotalSoftCal2_OmBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_OmBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the text color of the other months days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_OmC" id="TotalSoftCal2_OmC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_OmC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the size for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_OmFS" id="TotalSoftCal2_OmFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_OmFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_OmFS_Output" id="TotalSoftCal2_OmFS_Output" for="TotalSoftCal2_OmFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_OmFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the background color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_Ev_HBgC" id="TotalSoftCal2_Ev_HBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_HBgC;?>">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the text color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_Ev_HC" id="TotalSoftCal2_Ev_HC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_HC;?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_Ev_HFS" id="TotalSoftCal2_Ev_HFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_HFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_Ev_HFS_Output" id="TotalSoftCal2_Ev_HFS_Output" for="TotalSoftCal2_Ev_HFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_HFS;?>px</output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_Ev_HFF" id="TotalSoftCal2_Ev_HFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_2[0]->TotalSoftCal2_Ev_HFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Text', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'You can write events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" class="Total_Soft_Select" name="TotalSoftCal2_Ev_HText" id="TotalSoftCal2_Ev_HText" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_HText;?>">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Body Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_Ev_BBgC" id="TotalSoftCal2_Ev_BBgC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_BBgC;?>">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Title Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_Ev_TC" id="TotalSoftCal2_Ev_TC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_TC;?>">
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_Ev_TFF" id="TotalSoftCal2_Ev_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_2[0]->TotalSoftCal2_Ev_TFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_Ev_TFS" id="TotalSoftCal2_Ev_TFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_TFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_Ev_TFS_Output" id="TotalSoftCal2_Ev_TFS_Output" for="TotalSoftCal2_Ev_TFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_TFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Description Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event description in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal2_Ev_DC" id="TotalSoftCal2_Ev_DC" class="Total_Soft_Color" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_DC;?>">
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the description.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_Ev_DFF" id="TotalSoftCal2_Ev_DFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<?php if($TotalSoftCal_2[0]->TotalSoftCal2_Ev_DFF==$Font_Family->Font) {?>
							<option value='<?php echo $Font_Family->Font;?>' selected="select"><?php echo $Font_Family->Font;?></option>
						<?php }else{?><option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php } endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size for the description.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" name="TotalSoftCal2_Ev_DFS" id="TotalSoftCal2_Ev_DFS" min="8" max="48" value="<?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_DFS;?>">
				<output class="TotalSoft_Out" name="TotalSoftCal2_Ev_DFS_Output" id="TotalSoftCal2_Ev_DFS_Output" for="TotalSoftCal2_Ev_DFS"><?php echo $TotalSoftCal_2[0]->TotalSoftCal2_Ev_DFS;?>px</output>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMShortTable">
		<tr style="text-align:center">
			<td><?php echo __( 'Shortcode', 'Total-Soft-Calendar' );?></td>
		</tr>
		<tr>
			<td><?php echo __( 'Copy &amp; paste the shortcode directly into any WordPress post or page.', 'Total-Soft-Calendar' );?></td>
		</tr>
		<tr style="text-align:center">
			<td class="Total_Soft_Cal_ID"></td>
		</tr>
		<tr style="text-align:center">
			<td><?php echo __( 'Templete Include', 'Total-Soft-Calendar' );?></td>
		</tr>
		<tr>
			<td><?php echo __( 'Copy &amp; paste this code into a template file to include the calendar within your theme.', 'Total-Soft-Calendar' );?></td>
		</tr>
		<tr>
			<td >
				<textarea class="Total_Soft_Cal_TID" rows="3" readonly>
					
				</textarea>
			</td>
		</tr>
	</table>
</form>