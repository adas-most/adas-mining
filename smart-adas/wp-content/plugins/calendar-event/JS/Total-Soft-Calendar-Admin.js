function TotalSoftCal_Edit(Total_Soft_Cal_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_Cal_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0];
		jQuery('.Total_Soft_AMMTable').hide(500);
		jQuery('.Total_Soft_AMOTable').hide(500);
		jQuery('.Total_Soft_Cal_ID').html('[Total_Soft_Cal id="'+Total_Soft_Cal_ID+'"]');
		jQuery('.Total_Soft_Cal_TID').html('&lt;?php echo do_shortcode("[Total_Soft_Cal id='+'"'+Total_Soft_Cal_ID+'"'+']");?&gt');
		jQuery('#TotalSoftCal_Name').val(b[1]);	
		jQuery('#TotalSoftCal_Type').val(b[2]);	
		jQuery('#TotalSoftCal_Type').hide();
		setTimeout(function(){
			jQuery('.Total_Soft_AMSetTable_Main').show(500);
			if(b[2]=='Event Calendar')
			{
				jQuery('#TotalSoftCal_BgCol').val(b[3]); 
				jQuery('#TotalSoftCal_GrCol').val(b[4]); 
				jQuery('#TotalSoftCal_GW').val(b[5]); 
				jQuery('#TotalSoftCal_GW_Output').val(b[5]+'px'); 
				jQuery('#TotalSoftCal_BW').val(b[6]); 
				jQuery('#TotalSoftCal_BW_Output').val(b[6]+'px'); 
				jQuery('#TotalSoftCal_BStyle').val(b[7]); 
				jQuery('#TotalSoftCal_BCol').val(b[8]); 
				jQuery('#TotalSoftCal_BSCol').val(b[9]); 
				jQuery('#TotalSoftCal_MW').val(b[10]); 
				jQuery('#TotalSoftCal_MW_Output').val(b[10]+'px'); 
				jQuery('#TotalSoftCal_HBgCol').val(b[11]); 
				jQuery('#TotalSoftCal_HCol').val(b[12]); 
				jQuery('#TotalSoftCal_HFS').val(b[13]); 
				jQuery('#TotalSoftCal_HFS_Output').val(b[13]+'px');	
				jQuery('#TotalSoftCal_HFF').val(b[14]);	
				jQuery('#TotalSoftCal_WBgCol').val(b[15]); 
				jQuery('#TotalSoftCal_WCol').val(b[16]);	
				jQuery('#TotalSoftCal_WFS').val(b[17]);	
				jQuery('#TotalSoftCal_WFS_Output').val(b[17]+'px');	
				jQuery('#TotalSoftCal_WFF').val(b[18]);	
				jQuery('#TotalSoftCal_LAW').val(b[19]);	
				jQuery('#TotalSoftCal_LAW_Output').val(b[19]+'px');	
				jQuery('#TotalSoftCal_LAWS').val(b[20]); 
				jQuery('#TotalSoftCal_LAWC').val(b[21]); 
				jQuery('#TotalSoftCal_DBgCol').val(b[22]); 
				jQuery('#TotalSoftCal_DCol').val(b[23]); 
				jQuery('#TotalSoftCal_DFS').val(b[24]); 
				jQuery('#TotalSoftCal_DFS_Output').val(b[24]+'px'); 
				jQuery('#TotalSoftCal_TBgCol').val(b[25]); 
				jQuery('#TotalSoftCal_TCol').val(b[26]); 
				jQuery('#TotalSoftCal_TFS').val(b[27]); 
				jQuery('#TotalSoftCal_TFS_Output').val(b[27]+'px'); 
				jQuery('#TotalSoftCal_TNBgCol').val(b[28]); 
				jQuery('#TotalSoftCal_HovBgCol').val(b[29]); 
				jQuery('#TotalSoftCal_HovCol').val(b[30]); 
				jQuery('#TotalSoftCal_NumPos').val(b[31]); 
				jQuery('#TotalSoftCal_WDStart').val(b[32]); 
				jQuery('#TotalSoftCal_RefIcCol').val(b[33]); 
				jQuery('#TotalSoftCal_RefIcSize').val(b[34]); 
				jQuery('#TotalSoftCal_RefIcSize_Output').val(b[34]+'px'); 
				jQuery('#TotalSoftCal_ArrowType').val(b[35]); 
				jQuery('#TotalSoftCal_ArrowCol').val(b[38]); 
				jQuery('#TotalSoftCal_ArrowSize').val(b[39]); 
				jQuery('#TotalSoftCal_ArrowSize_Output').val(b[39]+'px');

				jQuery('.Total_Soft_AMSetTable_1').show(500);
			}
			else if(b[2]=='Simple Calendar')
			{
				jQuery('#TotalSoftCal2_WDStart').val(b[3]);
				jQuery('#TotalSoftCal2_BW').val(b[4]);
				jQuery('#TotalSoftCal2_BW_Output').val(b[4]+'px');
				jQuery('#TotalSoftCal2_BS').val(b[5]);
				jQuery('#TotalSoftCal2_BC').val(b[6]);
				jQuery('#TotalSoftCal2_W').val(b[7]);
				jQuery('#TotalSoftCal2_W_Output').val(b[7]+'px');
				jQuery('#TotalSoftCal2_H').val(b[8]);
				jQuery('#TotalSoftCal2_H_Output').val(b[8]+'px');
				jQuery('#TotalSoftCal2_BxShShow').val(b[9]);
				jQuery('#TotalSoftCal2_BxShType').val(b[10]);
				jQuery('#TotalSoftCal2_BxSh').val(b[11]);
				jQuery('#TotalSoftCal2_BxSh_Output').val(b[11]+'px');
				jQuery('#TotalSoftCal2_BxShC').val(b[12]);
				jQuery('#TotalSoftCal2_MBgC').val(b[13]);
				jQuery('#TotalSoftCal2_MC').val(b[14]);
				jQuery('#TotalSoftCal2_MFS').val(b[15]);
				jQuery('#TotalSoftCal2_MFS_Output').val(b[15]+'px');
				jQuery('#TotalSoftCal2_MFF').val(b[16]);
				jQuery('#TotalSoftCal2_WBgC').val(b[17]);
				jQuery('#TotalSoftCal2_WC').val(b[18]);
				jQuery('#TotalSoftCal2_WFS').val(b[19]);
				jQuery('#TotalSoftCal2_WFS_Output').val(b[19]+'px');
				jQuery('#TotalSoftCal2_WFF').val(b[20]);
				jQuery('#TotalSoftCal2_LAW_W').val(b[21]);
				jQuery('#TotalSoftCal2_LAW_W_Output').val(b[21]+'px');
				jQuery('#TotalSoftCal2_LAW_S').val(b[22]);
				jQuery('#TotalSoftCal2_LAW_C').val(b[23]);
				jQuery('#TotalSoftCal2_DBgC').val(b[24]);
				jQuery('#TotalSoftCal2_DC').val(b[25]);
				jQuery('#TotalSoftCal2_DFS').val(b[26]);
				jQuery('#TotalSoftCal2_DFS_Output').val(b[26]+'px');
				jQuery('#TotalSoftCal2_TdBgC').val(b[27]);
				jQuery('#TotalSoftCal2_TdC').val(b[28]);
				jQuery('#TotalSoftCal2_TdFS').val(b[29]);
				jQuery('#TotalSoftCal2_TdFS_Output').val(b[29]+'px');
				jQuery('#TotalSoftCal2_EdBgC').val(b[30]);
				jQuery('#TotalSoftCal2_EdC').val(b[31]);
				jQuery('#TotalSoftCal2_EdFS').val(b[32]);
				jQuery('#TotalSoftCal2_EdFS_Output').val(b[32]+'px');
				jQuery('#TotalSoftCal2_HBgC').val(b[33]);
				jQuery('#TotalSoftCal2_HC').val(b[34]);
				jQuery('#TotalSoftCal2_ArrType').val(b[35]);
				jQuery('#TotalSoftCal2_ArrFS').val(b[36]);
				jQuery('#TotalSoftCal2_ArrFS_Output').val(b[36]+'px');
				jQuery('#TotalSoftCal2_ArrC').val(b[37]);
				jQuery('#TotalSoftCal2_OmBgC').val(b[38]);
				jQuery('#TotalSoftCal2_OmC').val(b[39]);
				jQuery('#TotalSoftCal2_OmFS').val(b[40]);
				jQuery('#TotalSoftCal2_OmFS_Output').val(b[40]+'px');
				jQuery('#TotalSoftCal2_Ev_HBgC').val(b[41]);
				jQuery('#TotalSoftCal2_Ev_HC').val(b[42]);
				jQuery('#TotalSoftCal2_Ev_HFS').val(b[43]);
				jQuery('#TotalSoftCal2_Ev_HFS_Output').val(b[43]+'px');
				jQuery('#TotalSoftCal2_Ev_HFF').val(b[44]);
				jQuery('#TotalSoftCal2_Ev_HText').val(b[45]);
				jQuery('#TotalSoftCal2_Ev_BBgC').val(b[46]);
				jQuery('#TotalSoftCal2_Ev_TC').val(b[47]);
				jQuery('#TotalSoftCal2_Ev_TFF').val(b[48]);
				jQuery('#TotalSoftCal2_Ev_TFS').val(b[49]);
				jQuery('#TotalSoftCal2_Ev_TFS_Output').val(b[49]+'px');
				jQuery('#TotalSoftCal2_Ev_DC').val(b[50]);
				jQuery('#TotalSoftCal2_Ev_DFF').val(b[51]);
				jQuery('#TotalSoftCal2_Ev_DFS').val(parseInt(b[52]));
				jQuery('#TotalSoftCal2_Ev_DFS_Output').val(parseInt(b[52])+'px');

				jQuery('.Total_Soft_AMSetTable_2').show(500);
			}
			jQuery('.Total_Soft_Cal_AMD3').show(500);
			jQuery('.Total_Soft_AMShortTable').show(500);
			jQuery('.Total_Soft_Color').wpColorPicker();
		},500)
	})
}
function TotalSoft_Reload()
{
	location.reload();
}
function TotalSoftCal_EditEv(Total_Soft_CalEv_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_EditEv', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {

		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0];
		jQuery('.Total_Soft_Cal_Save_Ev').hide(500);
		jQuery('.Total_Soft_Cal_Update_Ev').show(500);

		jQuery('#Total_SoftCal_EvUpdate').val(Total_Soft_CalEv_ID);
		jQuery('#TotalSoftCal_EvName').val(b[0]);			
		jQuery('#TotalSoftCal_EvCal').val(b[1]);			
		jQuery('#TotalSoftCal_EvStartDate').val(b[2]);			
		jQuery('#TotalSoftCal_EvEndDate').val(b[3]);			
		jQuery('#TotalSoftCal_EvURL').val(b[4]);			
		jQuery('#TotalSoftCal_EvURLNewTab').val(b[5]);			
		jQuery('#TotalSoftCal_EvStartTime').val(b[6]);			
		jQuery('#TotalSoftCal_EvEndTime').val(b[7]);			
		jQuery('#TotalSoftCal_EvColor').val(b[8]);		
		setTimeout(function(){
			jQuery('.Total_Soft_AMEvTable').fadeIn(500);
			jQuery('.Total_Soft_Color').wpColorPicker();
		},500)	
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_EditEv_Desc', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		if(response!='none')
		{
			var b=Array();
			var a=response.split('=>');
			for(var i=3;i<a.length;i++)
			{ b[b.length]=a[i].split('[')[0].trim(); }
			b[b.length-1]=b[b.length-1].split(')')[0];

			b[0]=b[0].replace(')*^*(', '"');
			b[0]=b[0].replace(")*&*(", "'");
			jQuery('#TotalSoftCal_EvDesc').val(b[0]);
		}
	})
}
function TotalSoftCal_DelEv(Total_Soft_CalEv_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_DelEv', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function Total_Soft_CalEv_AMD2_But1()
{
	jQuery('.Total_Soft_AMEvTable').fadeIn(500);
	jQuery('.Total_Soft_Color').wpColorPicker();
}
function Total_Soft_Calendar_Free_Options()
{
	alert("Those options are given for free version. You can change those values but can't save them. For changing and saving you must buy pro versions.");
}