package wsClient;

import javax.ws.rs.core.MediaType;

import com.sun.jersey.api.client.Client;
import com.sun.jersey.api.client.ClientResponse;
import com.sun.jersey.api.client.WebResource;
import com.sun.jersey.api.client.config.ClientConfig;
import com.sun.jersey.api.client.config.DefaultClientConfig;

public class clientOfPlanII {

	// Test interface
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String BASE_URL = "http://localhost:8080/Project105";
		String PATH_NAME = "/DataService";
		
		// Test for SystemI call
		String SRV_NAME = "/carPath/";
		String request = "095488/2017-05-10 00:00:00/201705033";
		
		// Test for wordpress recommendSolution button
		//String SRV_NAME = "/recommendSolution/";
		//String request = "201705033";
				
		ClientConfig config = new DefaultClientConfig();
		Client client = Client.create(config);
		WebResource resource = client.resource(BASE_URL);
		WebResource requestResourceI = resource.path("rest").path(PATH_NAME + SRV_NAME + request);

		getClientResponse(requestResourceI);
	}
	
	public static final String BASE_URL = "http://localhost:8080/Project105";
	public static final String PATH_NAME = "/DataService";
	public static final String SRV_NAME = "/databasePath/";
	
	public static void getMedium(String carID, String timestamp, String eventID) {
		
		String request = carID + "/" + timestamp + "/" + eventID;
		
		ClientConfig config = new DefaultClientConfig();
		Client client = Client.create(config);
		WebResource resource = client.resource(BASE_URL);
		WebResource requestResource = resource.path("rest").path(PATH_NAME + SRV_NAME + request);
		
		carEvent.eventCenter.processEventData(getResponse(requestResource));
	}
	
	private static String getClientResponse(WebResource resource) {
		return resource.accept(MediaType.TEXT_XML).get(ClientResponse.class).toString();
	}

	private static String getResponse(WebResource resource) {
		return resource.accept(MediaType.TEXT_XML).get(String.class);
	}
}
