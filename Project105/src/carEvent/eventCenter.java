package carEvent;

import java.io.FileOutputStream;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.nio.channels.Channels;
import java.nio.channels.ReadableByteChannel;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.json.JsonObject;
import javax.ws.rs.core.MediaType;

import com.sun.jersey.api.client.Client;
import com.sun.jersey.api.client.WebResource;
import com.sun.jersey.api.client.config.ClientConfig;
import com.sun.jersey.api.client.config.DefaultClientConfig;

public class eventCenter {
	
	public static final String BASE_URL = "localhost";
	public static final String USER_NAME = "root";
	public static final String USER_PASSWD = "mysqlmysql";
	public static final String DATABASE_NAME = "u825104560_ygade";
	
	public static void processEventData(String input){
		
		eventData oneself = new eventData(restfulws.JsonProcess.jsonFromString(input));
		
		// save infomation to mysql database
		try {
			
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", BASE_URL, DATABASE_NAME);
			Connection conn = DriverManager.getConnection(jdbc_info, USER_NAME, USER_PASSWD);
			
			Statement st = conn.createStatement();
			String sql;
			ResultSet rs;
			
			System.out.println("Save to database...");
			
			// save data to database - to carsensedata
						
			sql = "SELECT MAX(`id`) FROM `carsensedata`";
			rs = st.executeQuery(sql);
			rs.next();
			int sdidstart = rs.getInt("MAX(`id`)");
			String sdlist = oneself.list_stringmaker(sdidstart, oneself.sdidlist.length);
			
			for(int i = 0; i < oneself.sdidlist.length; i++){
				sql = new String().format("INSERT INTO `carsensedata`(`id`, `name`, `data`) VALUES ('%s', '%s', '%s')",
						sdidstart + 1 + i, oneself.sdidlist[i][0], oneself.sdidlist[i][1]);
				System.out.println("\t" + sql);
				st.executeUpdate(sql);
			}
			
			// save data to database - to imgmodule
			
			sql = "SELECT MAX(`id`) FROM `imgmodule`";
			rs = st.executeQuery(sql);
			rs.next();
			int imgmodstart = rs.getInt("MAX(`id`)");
			String imgmodlist = oneself.list_stringmaker(imgmodstart, oneself.imgmodidlist.length);
			
			for(int i = 0; i < oneself.imgmodidlist.length; i++){
				sql = new String().format("INSERT INTO `imgmodule`(`id`, `name`, `modified`, `paraname`, `oldpara`, `newpara`) VALUES ('%s', '%s', '0', '%s', '%s', '')",
						imgmodstart + 1 + i, oneself.imgmodidlist[i][0], oneself.imgmodidlist[i][1], oneself.imgmodidlist[i][2]);
				System.out.println("\t" + sql);
				st.executeUpdate(sql);
			}

			// save data to database - to carevent
			
			sql = new String().format("INSERT INTO `carevent`(`id`, `carnumber`, `createdate`, `location`, `address`, `type`, `imgsource`, `sdidlist`, `imgmodidlist`, `status`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '0')",
					oneself.eventID, oneself.carID, oneself.timestamp, oneself.location, oneself.address, oneself.eventType, oneself.videoinfo[1], sdlist, imgmodlist);
			System.out.println("\t" + sql);
			st.executeUpdate(sql);
			
			System.out.println("Database operation completed!");
			
			// close connect
			
			if(!conn.isClosed())	conn.close();
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
}

class eventData {
	
	public String carID;
	public String timestamp;
	public String eventID;
	public String location;
	public String address;
	public String eventType;
	public String[] videoinfo;
	public String[][] sdidlist;
	public String[][] imgmodidlist;
	public String status;
	
	public eventData(JsonObject json){
		build(json);
	}
	
	void build(JsonObject json){
		JsonObject monitoring_board_info = json.getJsonObject("monitoring_board_info");
		JsonObject vehicle_info = json.getJsonObject("vehicle_info");
		JsonObject Exception_Event_info = json.getJsonObject("Exception_Event_info");
		JsonObject video_clips_info = json.getJsonObject("video_clips_info");
		JsonObject OBDII_info = json.getJsonObject("OBDII_info");
		JsonObject OBU_info = json.getJsonObject("OBU_info");
		JsonObject original_parameters_info = json.getJsonObject("original_parameters_info");
		JsonObject location_info = json.getJsonObject("location_info");
		
		this.carID = vehicle_info.getString("Vehicle_Identification_Number");
		this.timestamp = monitoring_board_info.getString("Timestamp");
		
		this.eventID = Exception_Event_info.getString("Exception_Event_Number");
		this.eventType = Exception_Event_info.getString("Exception_Event_Type");
		
		this.videoinfo = new String[2];
		this.videoinfo[0] = video_clips_info.getString("Video_File_Name");
		downloadVideo(video_clips_info.getString("Video_URL"), this.videoinfo[0]);
		this.videoinfo[1] = "smart-adas\\\\video\\\\" + videoinfo[0];
		
		this.sdidlist = new String[11][2];
		this.sdidlist[0][0] = "車輛引擎轉速(rpm)";	this.sdidlist[0][1] = OBDII_info.getString("車輛引擎轉速(rpm)");
		this.sdidlist[1][0] = "車輛行駛時速(km/h)";	this.sdidlist[1][1] = OBDII_info.getString("車輛行駛時速(km/h)");
		this.sdidlist[2][0] = "引擎進氣溫度(oC)";	this.sdidlist[2][1] = OBDII_info.getString("引擎進氣溫度(oC)");
		this.sdidlist[3][0] = "引擎冷卻水溫(oC)";	this.sdidlist[3][1] = OBDII_info.getString("引擎冷卻水溫(oC)");
		this.sdidlist[4][0] = "空氣流率(g/s)";	this.sdidlist[4][1] = OBDII_info.getString("空氣流率(g/s)");
		
		this.sdidlist[5][0] = "加速度(m/s2)";	this.sdidlist[5][1] = OBU_info.getString("加速度(m/s2)");
		this.sdidlist[6][0] = "煞車(Nt)";	this.sdidlist[6][1] = OBU_info.getString("煞車(Nt)");
		this.sdidlist[7][0] = "燈號(on/off)";	this.sdidlist[7][1] = OBU_info.getString("燈號(on/off)");
		this.sdidlist[8][0] = "方向盤(度)";	this.sdidlist[8][1] = OBU_info.getString("方向盤(度)");
		this.sdidlist[9][0] = "胎溫(oC)";	this.sdidlist[9][1] = OBU_info.getString("胎溫(oC)");
		this.sdidlist[10][0] = "胎壓(kg/cm2)";	this.sdidlist[10][1] = OBU_info.getString("胎壓(kg/cm2)");
		
		this.imgmodidlist = new String[4][3];
		this.imgmodidlist[0][0] = "路面偵測模組";
		this.imgmodidlist[0][1] = imgmodinfo_prename(original_parameters_info.getString("路面偵測模組"));
		this.imgmodidlist[0][2] = imgmodinfo_prevalue(original_parameters_info.getString("路面偵測模組"));
		this.imgmodidlist[1][0] = "前方物體偵測模組";
		this.imgmodidlist[1][1] = imgmodinfo_prename(original_parameters_info.getString("前方物體偵測模組"));
		this.imgmodidlist[1][2] = imgmodinfo_prevalue(original_parameters_info.getString("前方物體偵測模組"));
		this.imgmodidlist[2][0] = "智慧頭燈模組";
		this.imgmodidlist[2][1] = imgmodinfo_prename(original_parameters_info.getString("智慧頭燈模組"));
		this.imgmodidlist[2][2] = imgmodinfo_prevalue(original_parameters_info.getString("智慧頭燈模組"));
		this.imgmodidlist[3][0] = "道路偏移偵測模組";
		this.imgmodidlist[3][1] = imgmodinfo_prename(original_parameters_info.getString("道路偏移偵測模組"));
		this.imgmodidlist[3][2] = imgmodinfo_prevalue(original_parameters_info.getString("道路偏移偵測模組"));
		
		this.status = "0";
		
		this.location = location_info.getString("location");		
		this.address = addressTranslate(this.location);
		this.location = this.location.replace("'", "\\'");
	}
	
	String imgmodinfo_prename(String input){
		return input.replaceAll("\\s?P\\d", "").replaceAll("\\([^,]*\\)", "");
	}
	
	String imgmodinfo_prevalue(String input){
		return input.replaceAll("\\s?P\\d+[^\\(]*", "").replaceAll("[\\(\\)]", "");
	}
	
	public String list_stringmaker(int start, int length){
		String dst = "";
		for(int i = 1; i <= length; i++)
			dst += new String().format(",%d", start+i);
		return dst.substring(1);
	}
	
	void downloadVideo(String url, String filename) {
		
		// save vidoe source to local system
		try {
			System.out.println("Video downloading from "+url);

			URL website = new URL(url);
			ReadableByteChannel rbc = Channels.newChannel(website.openStream());
			
			String basepath = "D:\\myPhpWeb\\smart-adas\\video\\";
			String filepath = basepath.concat(filename);
			
			FileOutputStream fos = new FileOutputStream(filepath);
			fos.getChannel().transferFrom(rbc, 0, Long.MAX_VALUE);
			
			fos.close();
			rbc.close();

			System.out.println("Video download completed!");
		} catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	public String addressTranslate(String src){
		
		String[] input = src.replaceAll("([A-Z])", "$1 ").replaceAll("[^A-Z0-9\\s]", "").split(" ");
		
		double lat = Double.parseDouble(input[1]) + (Double.parseDouble(input[2]) / 60) + (Double.parseDouble(input[3]) / 3600);
		double lng = Double.parseDouble(input[5]) + (Double.parseDouble(input[6]) / 60) + (Double.parseDouble(input[7]) / 3600);
		
		if(input[0].equals("E") || input[0].equals("W")){
			double temp = lat;
			lat = lng;
			lng = temp;
		}
		
		String url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&language=zh-TW&sensor=true";
		
		ClientConfig config = new DefaultClientConfig();
		Client client = Client.create(config);
		WebResource resource = client.resource(url);
		
		String addressInfo = resource.accept(MediaType.TEXT_XML).get(String.class);
		
		JsonObject addressJson = restfulws.JsonProcess.jsonFromString(addressInfo);
		return addressJson.getJsonArray("results").getJsonObject(0).getString("formatted_address");
	}
	
}
