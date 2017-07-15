package restfulws;

import java.io.StringReader;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import javax.json.Json;
import javax.json.JsonArray;
import javax.json.JsonException;
import javax.json.JsonObject;
import javax.json.JsonObjectBuilder;
import javax.json.JsonReader;

public class JsonProcess {
	
	// Test interface 
	public static String doEncode() {
		
		String[] mainData = {
				"095488", "2017-06-06 00:00:00", "201705033", "1", "E120° 50' 00\" N23° 39' 15\"", "roh82KD.jpg", "http://i.imgur.com/roh82KD.jpg"
		};
		String[] sensorData = {
				"0.0", "1.0", "2.0", "3.0", "4.0", "5.0", "6.0", "on", "8.0", "9.0", "10.0"
		};
		String[] moduleData = {
				"P1特徵參數(22), P2機器學習參數(3), P3特徵來源選擇(0), P4天氣狀況(1), P5早晚狀況(2), P6車輛密集度(0), P7地點(1)",
				"P1特徵參數(22), P2機器學習參數(3), P3特徵來源選擇(0), P4天氣狀況(1), P5早晚狀況(2), P6車輛密集度(0), P7地點(1)",
				"P1影像亮度資料(22), P2光譜敏感度(33), P3防遠近燈震盪延遲時間(44)",
				"P1右車道敏感度(22), P2左車道敏感度(3), P3預設偵測車道最小寬度(0),P4預設偵測車道最大寬度(1), P5警告敏感度(2), P6道路偵測失敗回溯時間長度(1)"
		};
		
		return doEncode(mainData, sensorData, moduleData);
		
	}
	
	public static String doEncode(String[] mainData, String[] sensorData, String[] moduleData) {

		String jsonText ="";
		
		try {

			JsonObjectBuilder empBuilder = Json.createObjectBuilder();
			
			JsonObjectBuilder vehicleInfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder monitoringBoardInfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder exceptionEventInfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder locationinfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder videoClipsInfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder OBDIIinfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder OBUinfoBuilder = Json.createObjectBuilder();
			JsonObjectBuilder originalParametersInfoBuilder = Json.createObjectBuilder();
			
			vehicleInfoBuilder.add("Vehicle_Identification_Number", mainData[0]);
			
			//DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
			//monitoringBoardInfoBuilder.add("Timestamp", dateFormat.format(new Date()));
			monitoringBoardInfoBuilder.add("Timestamp", mainData[1]);
			
			exceptionEventInfoBuilder.add("Exception_Event_Number", mainData[2]);
			exceptionEventInfoBuilder.add("Exception_Event_Type", mainData[3]);
			
			locationinfoBuilder.add("location", mainData[4]);
			
			videoClipsInfoBuilder.add("Video_File_Name", mainData[5]);
			videoClipsInfoBuilder.add("Video_URL", mainData[6]);
			
			OBDIIinfoBuilder.add("車輛引擎轉速(rpm)", sensorData[0]);
			OBDIIinfoBuilder.add("車輛行駛時速(km/h)", sensorData[1]);
			OBDIIinfoBuilder.add("引擎進氣溫度(oC)", sensorData[2]);
			OBDIIinfoBuilder.add("引擎冷卻水溫(oC)", sensorData[3]);
			OBDIIinfoBuilder.add("空氣流率(g/s)", sensorData[4]);
			
			OBUinfoBuilder.add("加速度(m/s2)", sensorData[5]);
			OBUinfoBuilder.add("煞車(Nt)", sensorData[6]);
			OBUinfoBuilder.add("燈號(on/off)", sensorData[7]);
			OBUinfoBuilder.add("方向盤(度)", sensorData[8]);
			OBUinfoBuilder.add("胎溫(oC)", sensorData[9]);
			OBUinfoBuilder.add("胎壓(kg/cm2)", sensorData[10]);
			
			originalParametersInfoBuilder.add("路面偵測模組", moduleData[0]);
			originalParametersInfoBuilder.add("前方物體偵測模組", moduleData[1]);
			originalParametersInfoBuilder.add("智慧頭燈模組", moduleData[2]);
			originalParametersInfoBuilder.add("道路偏移偵測模組", moduleData[3]);
			
			empBuilder.add("monitoring_board_info", monitoringBoardInfoBuilder);
			empBuilder.add("vehicle_info", vehicleInfoBuilder);
			empBuilder.add("Exception_Event_info", exceptionEventInfoBuilder);
			empBuilder.add("location_info", locationinfoBuilder);
			empBuilder.add("video_clips_info", videoClipsInfoBuilder);
			empBuilder.add("OBDII_info", OBDIIinfoBuilder);
			empBuilder.add("OBU_info", OBUinfoBuilder);
			empBuilder.add("original_parameters_info", originalParametersInfoBuilder);
			
			JsonObject obj = empBuilder.build();
			 
			jsonText = obj.toString();
			
		} catch (JsonException e) {
			e.printStackTrace();
		}

		return jsonText;

	}
	

	public Map<String, Object> doDecode(String s) {
		
		Map<String, Object> map = null;

		try {

			//System.out.println("Data received is decoded as follows:");
			JsonObject jsonObject = jsonFromString(s);
			//Map<String, Object> map = jsonToMap(jsonObject);
			//recursiveProcess(map);
			
			map = jsonToMap(jsonObject);
		
		}catch(JsonException e){
			e.printStackTrace();
		}
		
		return map;

	}
	
	public static JsonObject jsonFromString(String jsonObjectStr) {
		
		JsonReader jsonReader = Json.createReader(new StringReader(jsonObjectStr));
		JsonObject object = jsonReader.readObject();
		jsonReader.close();

		return object;
	}

	public static Map<String, Object> jsonToMap(JsonObject json) throws JsonException {

		Map<String, Object> retMap = new HashMap<String, Object>();

		if(json != JsonObject.NULL) {
			retMap = toMap(json);
		}

		return retMap;

	}

	public static Map<String, Object> toMap(JsonObject object) throws JsonException {
		
	  Map<String, Object> map = new HashMap<String, Object>();

	  Iterator<String> keysItr = object.keySet().iterator();
	  while(keysItr.hasNext()) {
			String key = keysItr.next();
			Object value = object.get(key);

			if(value instanceof JsonArray) {
				 value = toList((JsonArray) value);
			} else if(value instanceof JsonObject) {
				 value = toMap((JsonObject) value);
			}
			map.put(key, value);
	  }
	  return map;
		 
	}

	public static List<Object> toList(JsonArray array) throws JsonException {
		
	  List<Object> list = new ArrayList<Object>();
	  for (int i = 0; i < array.size(); i++) {
			Object value = array.get(i);
			if (value instanceof JsonArray) {
				 value = toList((JsonArray) value);
			} else if(value instanceof JsonObject) {
				 value = toMap((JsonObject) value);
			}
			list.add(value);
	  }
	  return list;
		 
	}
	
	public static void recursiveProcess(Map<String, Object> map) throws JsonException {
			
	  for (Map.Entry<String,Object> entry:map.entrySet()) {
		  if (entry.getValue() instanceof Map) {
			 System.out.println(entry.getKey()+"	{");
			 recursiveProcess((Map<String, Object>)entry.getValue());
			 System.out.println("}");
		  } else
			 System.out.println(entry.getKey()+"	"+entry.getValue());
	  }		
	}

}