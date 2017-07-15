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
				"095488", "2017-06-06 00:00:00", "201705033", "1", "E120�X 50' 00\" N23�X 39' 15\"", "roh82KD.jpg", "http://i.imgur.com/roh82KD.jpg"
		};
		String[] sensorData = {
				"0.0", "1.0", "2.0", "3.0", "4.0", "5.0", "6.0", "on", "8.0", "9.0", "10.0"
		};
		String[] moduleData = {
				"P1�S�x�Ѽ�(22), P2�����ǲ߰Ѽ�(3), P3�S�x�ӷ����(0), P4�Ѯ𪬪p(1), P5���ߪ��p(2), P6�����K����(0), P7�a�I(1)",
				"P1�S�x�Ѽ�(22), P2�����ǲ߰Ѽ�(3), P3�S�x�ӷ����(0), P4�Ѯ𪬪p(1), P5���ߪ��p(2), P6�����K����(0), P7�a�I(1)",
				"P1�v���G�׸��(22), P2���бӷP��(33), P3������O�_������ɶ�(44)",
				"P1�k���D�ӷP��(22), P2�����D�ӷP��(3), P3�w�]�������D�̤p�e��(0),P4�w�]�������D�̤j�e��(1), P5ĵ�i�ӷP��(2), P6�D���������Ѧ^���ɶ�����(1)"
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
			
			OBDIIinfoBuilder.add("����������t(rpm)", sensorData[0]);
			OBDIIinfoBuilder.add("������p�ɳt(km/h)", sensorData[1]);
			OBDIIinfoBuilder.add("�����i��ū�(oC)", sensorData[2]);
			OBDIIinfoBuilder.add("�����N�o����(oC)", sensorData[3]);
			OBDIIinfoBuilder.add("�Ů�y�v(g/s)", sensorData[4]);
			
			OBUinfoBuilder.add("�[�t��(m/s2)", sensorData[5]);
			OBUinfoBuilder.add("�٨�(Nt)", sensorData[6]);
			OBUinfoBuilder.add("�O��(on/off)", sensorData[7]);
			OBUinfoBuilder.add("��V�L(��)", sensorData[8]);
			OBUinfoBuilder.add("�L��(oC)", sensorData[9]);
			OBUinfoBuilder.add("�L��(kg/cm2)", sensorData[10]);
			
			originalParametersInfoBuilder.add("���������Ҳ�", moduleData[0]);
			originalParametersInfoBuilder.add("�e�誫�鰻���Ҳ�", moduleData[1]);
			originalParametersInfoBuilder.add("���z�Y�O�Ҳ�", moduleData[2]);
			originalParametersInfoBuilder.add("�D�����������Ҳ�", moduleData[3]);
			
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