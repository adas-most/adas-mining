<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	$table_name  = $wpdb->prefix . "totalsoft_fonts";
	$table_name1 = $wpdb->prefix . "totalsoft_cal_1";
	$table_name2 = $wpdb->prefix . "totalsoft_cal_ids";
	$table_name3 = $wpdb->prefix . "totalsoft_cal_events";
	$table_name4 = $wpdb->prefix . "totalsoft_cal_types";
	$table_name5 = $wpdb->prefix . "totalsoft_cal_2";
	$table_name6 = $wpdb->prefix . "totalsoft_cal_events_p2";

	$sql = 'CREATE TABLE IF NOT EXISTS ' .$table_name . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Font VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql1 = 'CREATE TABLE IF NOT EXISTS ' .$table_name1 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftCal_ID VARCHAR(255) NOT NULL,
		TotalSoftCal_Name VARCHAR(255) NOT NULL,
		TotalSoftCal_Type VARCHAR(255) NOT NULL,
		TotalSoftCal_BgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_GrCol VARCHAR(255) NOT NULL,
		TotalSoftCal_GW VARCHAR(255) NOT NULL,
		TotalSoftCal_BW VARCHAR(255) NOT NULL,
		TotalSoftCal_BStyle VARCHAR(255) NOT NULL,
		TotalSoftCal_BCol VARCHAR(255) NOT NULL,
		TotalSoftCal_BSCol VARCHAR(255) NOT NULL,
		TotalSoftCal_MW VARCHAR(255) NOT NULL,
		TotalSoftCal_HBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_HCol VARCHAR(255) NOT NULL,
		TotalSoftCal_HFS VARCHAR(255) NOT NULL,
		TotalSoftCal_HFF VARCHAR(255) NOT NULL,
		TotalSoftCal_WBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_WCol VARCHAR(255) NOT NULL,
		TotalSoftCal_WFS VARCHAR(255) NOT NULL,
		TotalSoftCal_WFF VARCHAR(255) NOT NULL,
		TotalSoftCal_LAW VARCHAR(255) NOT NULL,
		TotalSoftCal_LAWS VARCHAR(255) NOT NULL,
		TotalSoftCal_LAWC VARCHAR(255) NOT NULL,
		TotalSoftCal_DBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_DCol VARCHAR(255) NOT NULL,
		TotalSoftCal_DFS VARCHAR(255) NOT NULL,
		TotalSoftCal_TBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_TCol VARCHAR(255) NOT NULL,
		TotalSoftCal_TFS VARCHAR(255) NOT NULL,
		TotalSoftCal_TNBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_HovBgCol VARCHAR(255) NOT NULL,
		TotalSoftCal_HovCol VARCHAR(255) NOT NULL,
		TotalSoftCal_NumPos VARCHAR(255) NOT NULL,
		TotalSoftCal_WDStart VARCHAR(255) NOT NULL,
		TotalSoftCal_RefIcCol VARCHAR(255) NOT NULL,
		TotalSoftCal_RefIcSize VARCHAR(255) NOT NULL,
		TotalSoftCal_ArrowType VARCHAR(255) NOT NULL, 
		TotalSoftCal_ArrowLeft VARCHAR(255) NOT NULL, 
		TotalSoftCal_ArrowRight VARCHAR(255) NOT NULL, 
		TotalSoftCal_ArrowCol VARCHAR(255) NOT NULL, 
		TotalSoftCal_ArrowSize VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql2 = 'CREATE TABLE IF NOT EXISTS ' .$table_name2 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Cal_ID VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql3 = 'CREATE TABLE IF NOT EXISTS ' .$table_name3 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftCal_EvName VARCHAR(255) NOT NULL,
		TotalSoftCal_EvCal VARCHAR(255) NOT NULL,
		TotalSoftCal_EvStartDate VARCHAR(255) NOT NULL,
		TotalSoftCal_EvEndDate VARCHAR(255) NOT NULL,
		TotalSoftCal_EvURL VARCHAR(255) NOT NULL,
		TotalSoftCal_EvURLNewTab VARCHAR(255) NOT NULL,
		TotalSoftCal_EvStartTime VARCHAR(255) NOT NULL,
		TotalSoftCal_EvEndTime VARCHAR(255) NOT NULL,
		TotalSoftCal_EvColor VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql4 = 'CREATE TABLE IF NOT EXISTS ' .$table_name4 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftCal_Name VARCHAR(255) NOT NULL,
		TotalSoftCal_Type VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql5 = 'CREATE TABLE IF NOT EXISTS ' .$table_name5 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftCal_ID VARCHAR(255) NOT NULL,
		TotalSoftCal_Name VARCHAR(255) NOT NULL,
		TotalSoftCal_Type VARCHAR(255) NOT NULL,
		TotalSoftCal2_WDStart VARCHAR(255) NOT NULL,
		TotalSoftCal2_BW VARCHAR(255) NOT NULL,
		TotalSoftCal2_BS VARCHAR(255) NOT NULL,
		TotalSoftCal2_BC VARCHAR(255) NOT NULL,
		TotalSoftCal2_W VARCHAR(255) NOT NULL,
		TotalSoftCal2_H VARCHAR(255) NOT NULL,
		TotalSoftCal2_BxShShow VARCHAR(255) NOT NULL,
		TotalSoftCal2_BxShType VARCHAR(255) NOT NULL,
		TotalSoftCal2_BxSh VARCHAR(255) NOT NULL,
		TotalSoftCal2_BxShC VARCHAR(255) NOT NULL,
		TotalSoftCal2_MBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_MC VARCHAR(255) NOT NULL,
		TotalSoftCal2_MFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_MFF VARCHAR(255) NOT NULL,
		TotalSoftCal2_WBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_WC VARCHAR(255) NOT NULL,
		TotalSoftCal2_WFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_WFF VARCHAR(255) NOT NULL,
		TotalSoftCal2_LAW_W VARCHAR(255) NOT NULL,
		TotalSoftCal2_LAW_S VARCHAR(255) NOT NULL,
		TotalSoftCal2_LAW_C VARCHAR(255) NOT NULL,
		TotalSoftCal2_DBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_DC VARCHAR(255) NOT NULL,
		TotalSoftCal2_DFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_TdBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_TdC VARCHAR(255) NOT NULL,
		TotalSoftCal2_TdFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_EdBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_EdC VARCHAR(255) NOT NULL,
		TotalSoftCal2_EdFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_HBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_HC VARCHAR(255) NOT NULL,
		TotalSoftCal2_ArrType VARCHAR(255) NOT NULL,
		TotalSoftCal2_ArrFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_ArrC VARCHAR(255) NOT NULL,
		TotalSoftCal2_OmBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_OmC VARCHAR(255) NOT NULL,
		TotalSoftCal2_OmFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_HBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_HC VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_HFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_HFF VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_HText VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_BBgC VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_TC VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_TFF VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_TFS VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_DC VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_DFF VARCHAR(255) NOT NULL,
		TotalSoftCal2_Ev_DFS VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql6 = 'CREATE TABLE IF NOT EXISTS ' .$table_name6 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftCal_EvDesc LONGTEXT NOT NULL,
		TotalSoftCal_EvImg VARCHAR(255) NOT NULL,
		TotalSoftCal_EvVid_Src VARCHAR(255) NOT NULL,
		TotalSoftCal_EvVid_Iframe VARCHAR(255) NOT NULL,
		TotalSoftCal_EvCal VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql1);
	dbDelta($sql2);
	dbDelta($sql3);
	dbDelta($sql4);
	dbDelta($sql5);
	dbDelta($sql6);

	$TotalSoft_Fonts = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New','AngsanaUPC','Aparajita','Arabic Typesetting','Arial','Arial Black', 'Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic','Comic Sans MS','Consolas', 'Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New','DaunPenh','David','DFKai-SB','DilleniaUPC', 'DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong','Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola', 'Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe','Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika', 'Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee','Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode', 'Malgun Gothic','Mangal','Manny ITC','Marlett','Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue', 'Microsoft PhagsPa','Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS', 'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT','NSimSun','Nyala', 'Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol','Shonar Bangla','Shruti','SimHei','SimKai', 'Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic','Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	if(count($TotalSoftFontCount)==0)
	{
		foreach ($TotalSoft_Fonts as $Fonts) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Font) VALUES (%d, %s)", '', $Fonts));
		}
	}

	$TotalSoftCalCount1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d",0));
	if(count($TotalSoftCalCount1)==0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'Total Soft Calendar', 'Event Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'Total Soft Calendar'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_BgCol, TotalSoftCal_GrCol, TotalSoftCal_GW, TotalSoftCal_BW, TotalSoftCal_BStyle, TotalSoftCal_BCol, TotalSoftCal_BSCol, TotalSoftCal_MW, TotalSoftCal_HBgCol, TotalSoftCal_HCol, TotalSoftCal_HFS, TotalSoftCal_HFF, TotalSoftCal_WBgCol, TotalSoftCal_WCol, TotalSoftCal_WFS, TotalSoftCal_WFF, TotalSoftCal_LAW, TotalSoftCal_LAWS, TotalSoftCal_LAWC, TotalSoftCal_DBgCol, TotalSoftCal_DCol, TotalSoftCal_DFS, TotalSoftCal_TBgCol, TotalSoftCal_TCol, TotalSoftCal_TFS, TotalSoftCal_TNBgCol, TotalSoftCal_HovBgCol, TotalSoftCal_HovCol, TotalSoftCal_NumPos, TotalSoftCal_WDStart, TotalSoftCal_RefIcCol, TotalSoftCal_RefIcSize, TotalSoftCal_ArrowType, TotalSoftCal_ArrowLeft, TotalSoftCal_ArrowRight, TotalSoftCal_ArrowCol, TotalSoftCal_ArrowSize) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'Total Soft Calendar', 'Event Calendar', '#efefef', '#009491', '1', '2', 'solid', '#009491', '#009491', '700', '#ffffff', '#009491', '14', 'Arial', '#009491', '#ffffff', '10', 'Arial', '0', 'none', '#ffffff', '#ffffff', '#009491', '14', '#009491', '#009491', '15', '#ffffff', '#009491', '#ffffff', 'left', 'Mon', '#009491', '20', '7' , 'totalsoft totalsoft-caret-square-o-left', 'totalsoft totalsoft-caret-square-o-right', '#009491', '17'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'Total-Soft Calendar', 'Event Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'Total-Soft Calendar'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));			
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_BgCol, TotalSoftCal_GrCol, TotalSoftCal_GW, TotalSoftCal_BW, TotalSoftCal_BStyle, TotalSoftCal_BCol, TotalSoftCal_BSCol, TotalSoftCal_MW, TotalSoftCal_HBgCol, TotalSoftCal_HCol, TotalSoftCal_HFS, TotalSoftCal_HFF, TotalSoftCal_WBgCol, TotalSoftCal_WCol, TotalSoftCal_WFS, TotalSoftCal_WFF, TotalSoftCal_LAW, TotalSoftCal_LAWS, TotalSoftCal_LAWC, TotalSoftCal_DBgCol, TotalSoftCal_DCol, TotalSoftCal_DFS, TotalSoftCal_TBgCol, TotalSoftCal_TCol, TotalSoftCal_TFS, TotalSoftCal_TNBgCol, TotalSoftCal_HovBgCol, TotalSoftCal_HovCol, TotalSoftCal_NumPos, TotalSoftCal_WDStart, TotalSoftCal_RefIcCol, TotalSoftCal_RefIcSize, TotalSoftCal_ArrowType, TotalSoftCal_ArrowLeft, TotalSoftCal_ArrowRight, TotalSoftCal_ArrowCol, TotalSoftCal_ArrowSize) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'Total-Soft Calendar', 'Event Calendar', '#efefef', '#ffffff', '1', '2', 'solid', '#ffffff', '#ffffff', '700', '#009491', '#ffffff', '14', 'Arial', '#ffffff', '#009491', '10', 'Arial', '0', 'none', '#009491', '#009491', '#ffffff', '14', '#ffffff', '#ffffff', '15', '#009491', '#ffffff', '#009491', 'left', 'Mon', '#ffffff', '20', '7' , 'totalsoft totalsoft-caret-square-o-left', 'totalsoft totalsoft-caret-square-o-right', '#ffffff', '17'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'TotalSoft Calendar', 'Event Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'TotalSoft Calendar'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));			
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_BgCol, TotalSoftCal_GrCol, TotalSoftCal_GW, TotalSoftCal_BW, TotalSoftCal_BStyle, TotalSoftCal_BCol, TotalSoftCal_BSCol, TotalSoftCal_MW, TotalSoftCal_HBgCol, TotalSoftCal_HCol, TotalSoftCal_HFS, TotalSoftCal_HFF, TotalSoftCal_WBgCol, TotalSoftCal_WCol, TotalSoftCal_WFS, TotalSoftCal_WFF, TotalSoftCal_LAW, TotalSoftCal_LAWS, TotalSoftCal_LAWC, TotalSoftCal_DBgCol, TotalSoftCal_DCol, TotalSoftCal_DFS, TotalSoftCal_TBgCol, TotalSoftCal_TCol, TotalSoftCal_TFS, TotalSoftCal_TNBgCol, TotalSoftCal_HovBgCol, TotalSoftCal_HovCol, TotalSoftCal_NumPos, TotalSoftCal_WDStart, TotalSoftCal_RefIcCol, TotalSoftCal_RefIcSize, TotalSoftCal_ArrowType, TotalSoftCal_ArrowLeft, TotalSoftCal_ArrowRight, TotalSoftCal_ArrowCol, TotalSoftCal_ArrowSize) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'TotalSoft Calendar', 'Event Calendar', '#efefef', '#ffffff', '1', '2', 'solid', '#ffffff', '#ffffff', '700', '#00c603', '#ffffff', '14', 'Arial', '#ffffff', '#00c603', '10', 'Arial', '0', 'none', '#00c603', '#00c603', '#ffffff', '14', '#ffffff', '#ffffff', '15', '#00c603', '#ffffff', '#00c603', 'left', 'Mon', '#ffffff', '20', '7' , 'totalsoft totalsoft-caret-square-o-left', 'totalsoft totalsoft-caret-square-o-right', '#ffffff', '17'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'TotalSoftCalendar', 'Event Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'TotalSoftCalendar'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));			
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal_BgCol, TotalSoftCal_GrCol, TotalSoftCal_GW, TotalSoftCal_BW, TotalSoftCal_BStyle, TotalSoftCal_BCol, TotalSoftCal_BSCol, TotalSoftCal_MW, TotalSoftCal_HBgCol, TotalSoftCal_HCol, TotalSoftCal_HFS, TotalSoftCal_HFF, TotalSoftCal_WBgCol, TotalSoftCal_WCol, TotalSoftCal_WFS, TotalSoftCal_WFF, TotalSoftCal_LAW, TotalSoftCal_LAWS, TotalSoftCal_LAWC, TotalSoftCal_DBgCol, TotalSoftCal_DCol, TotalSoftCal_DFS, TotalSoftCal_TBgCol, TotalSoftCal_TCol, TotalSoftCal_TFS, TotalSoftCal_TNBgCol, TotalSoftCal_HovBgCol, TotalSoftCal_HovCol, TotalSoftCal_NumPos, TotalSoftCal_WDStart, TotalSoftCal_RefIcCol, TotalSoftCal_RefIcSize, TotalSoftCal_ArrowType, TotalSoftCal_ArrowLeft, TotalSoftCal_ArrowRight, TotalSoftCal_ArrowCol, TotalSoftCal_ArrowSize) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'TotalSoftCalendar', 'Event Calendar', '#efefef', '#00c603', '1', '2', 'solid', '#00c603', '#00c603', '700', '#ffffff', '#00c603', '14', 'Arial', '#00c603', '#ffffff', '10', 'Arial', '0', 'none', '#ffffff', '#ffffff', '#00c603', '14', '#00c603', '#00c603', '15', '#ffffff', '#00c603', '#ffffff', 'left', 'Mon', '#00c603', '20', '7' , 'totalsoft totalsoft-caret-square-o-left', 'totalsoft totalsoft-caret-square-o-right', '#00c603', '17'));			
	}
	
	$TotalSoftCalCount2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
	if(count($TotalSoftCalCount2)==0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'Simple Calendar', 'Simple Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'Simple Calendar'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));			
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal2_WDStart, TotalSoftCal2_BW, TotalSoftCal2_BS, TotalSoftCal2_BC, TotalSoftCal2_W, TotalSoftCal2_H, TotalSoftCal2_BxShShow, TotalSoftCal2_BxShType, TotalSoftCal2_BxSh, TotalSoftCal2_BxShC, TotalSoftCal2_MBgC, TotalSoftCal2_MC, TotalSoftCal2_MFS, TotalSoftCal2_MFF, TotalSoftCal2_WBgC, TotalSoftCal2_WC, TotalSoftCal2_WFS, TotalSoftCal2_WFF, TotalSoftCal2_LAW_W, TotalSoftCal2_LAW_S, TotalSoftCal2_LAW_C, TotalSoftCal2_DBgC, TotalSoftCal2_DC, TotalSoftCal2_DFS, TotalSoftCal2_TdBgC, TotalSoftCal2_TdC, TotalSoftCal2_TdFS, TotalSoftCal2_EdBgC, TotalSoftCal2_EdC, TotalSoftCal2_EdFS, TotalSoftCal2_HBgC, TotalSoftCal2_HC, TotalSoftCal2_ArrType, TotalSoftCal2_ArrFS, TotalSoftCal2_ArrC, TotalSoftCal2_OmBgC, TotalSoftCal2_OmC, TotalSoftCal2_OmFS, TotalSoftCal2_Ev_HBgC, TotalSoftCal2_Ev_HC, TotalSoftCal2_Ev_HFS, TotalSoftCal2_Ev_HFF, TotalSoftCal2_Ev_HText, TotalSoftCal2_Ev_BBgC, TotalSoftCal2_Ev_TC, TotalSoftCal2_Ev_TFF, TotalSoftCal2_Ev_TFS, TotalSoftCal2_Ev_DC, TotalSoftCal2_Ev_DFF, TotalSoftCal2_Ev_DFS) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'Simple Calendar', 'Simple Calendar', '0', '5', 'solid', '#ffffff', '600', '600', 'Yes', '2', '25', '#009491', '#009491', '#ffffff', '30', 'Gabriola', '#ffffff', '#009491', '19', 'Gabriola', '1', 'solid', '#009491', '#ffffff', '#009491', '17', '#009491', '#ffffff', '18', '#e2e2e2', '#ffffff', '18', '#ffffff', '#009491', 'angle', '21', '#ffffff', '#ffffff', '#a0a0a0', '10', '#009491', '#ffffff', '30', 'Gabriola', 'Events', '#ffffff', '#009491', 'Gabriola', '23', '#7c7c7c', 'Gabriola', '20'));	

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftCal_Name, TotalSoftCal_Type) VALUES (%d, %s, %s)", '', 'Simple Calendar 2', 'Simple Calendar'));
		$TotalSoftCal_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoftCal_Name=%s", 'Simple Calendar 2'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Cal_ID) VALUES (%d, %s)", '', $TotalSoftCal_ID[0]->id));			
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftCal_ID, TotalSoftCal_Name, TotalSoftCal_Type, TotalSoftCal2_WDStart, TotalSoftCal2_BW, TotalSoftCal2_BS, TotalSoftCal2_BC, TotalSoftCal2_W, TotalSoftCal2_H, TotalSoftCal2_BxShShow, TotalSoftCal2_BxShType, TotalSoftCal2_BxSh, TotalSoftCal2_BxShC, TotalSoftCal2_MBgC, TotalSoftCal2_MC, TotalSoftCal2_MFS, TotalSoftCal2_MFF, TotalSoftCal2_WBgC, TotalSoftCal2_WC, TotalSoftCal2_WFS, TotalSoftCal2_WFF, TotalSoftCal2_LAW_W, TotalSoftCal2_LAW_S, TotalSoftCal2_LAW_C, TotalSoftCal2_DBgC, TotalSoftCal2_DC, TotalSoftCal2_DFS, TotalSoftCal2_TdBgC, TotalSoftCal2_TdC, TotalSoftCal2_TdFS, TotalSoftCal2_EdBgC, TotalSoftCal2_EdC, TotalSoftCal2_EdFS, TotalSoftCal2_HBgC, TotalSoftCal2_HC, TotalSoftCal2_ArrType, TotalSoftCal2_ArrFS, TotalSoftCal2_ArrC, TotalSoftCal2_OmBgC, TotalSoftCal2_OmC, TotalSoftCal2_OmFS, TotalSoftCal2_Ev_HBgC, TotalSoftCal2_Ev_HC, TotalSoftCal2_Ev_HFS, TotalSoftCal2_Ev_HFF, TotalSoftCal2_Ev_HText, TotalSoftCal2_Ev_BBgC, TotalSoftCal2_Ev_TC, TotalSoftCal2_Ev_TFF, TotalSoftCal2_Ev_TFS, TotalSoftCal2_Ev_DC, TotalSoftCal2_Ev_DFF, TotalSoftCal2_Ev_DFS) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftCal_ID[0]->id, 'Simple Calendar 2', 'Simple Calendar', '0', '5', 'solid', '#ffffff', '600', '600', 'Yes', '1', '25', '#000000', '#ffffff', '#009491', '25', 'Gabriola', '#009491', '#ffffff', '21', 'Gabriola', '1', 'solid', '#009491', '#ffffff', '#009491', '17', '#009491', '#ffffff', '18', '#e2e2e2', '#ffffff', '18', '#ffffff', '#009491', 'angle', '21', '#009491', '#ffffff', '#a0a0a0', '14', '#ffffff', '#009491', '30', 'Gabriola', 'Events', '#009491', '#ffffff', 'Gabriola', '23', '#d6d6d6', 'Gabriola', '20'));	
	}			
?>