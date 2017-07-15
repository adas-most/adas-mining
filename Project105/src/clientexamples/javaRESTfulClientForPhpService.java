package clientexamples;

import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.MultivaluedMap;

import com.sun.jersey.api.client.Client;
import com.sun.jersey.api.client.ClientResponse;
import com.sun.jersey.api.client.WebResource;
import com.sun.jersey.api.client.config.ClientConfig;
import com.sun.jersey.api.client.config.DefaultClientConfig;
import com.sun.jersey.core.util.MultivaluedMapImpl;

import restfulws.JsonProcess;

public class javaRESTfulClientForPhpService {
	public static final String BASE_URI = "http://localhost:8080/PHPprj105";
	//public static final String PATH_NAME = "/restfulwsOne";
	//public static final String SRV_NAME = "/index.php/Mock/rock";
	public static final String PATH_NAME = "/restfulwsTwo";
	public static final String SRV_NAME = "/RestController.php";

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			ClientConfig config = new DefaultClientConfig();
			Client client = Client.create(config);
			WebResource resource = client.resource(BASE_URI);			
			WebResource nameResource = resource.path(PATH_NAME).path(SRV_NAME);
			
			//demoExampleOneGET(nameResource);
			//System.out.println("");
			demoExampleOnePOST(nameResource);
			
			//demoExampleTwoGET(nameResource);
			
	    } catch (Exception e) {
	        e.printStackTrace();
	    }

	}//end of method

	private static void demoExampleOneGET(WebResource nameResource) {
		ClientResponse response = nameResource.accept(MediaType.APPLICATION_JSON).get(ClientResponse.class);
        // check response status code
        if (response.getStatus() != 200) {
            throw new RuntimeException("Failed : HTTP error code : "
                    + response.getStatus());
        }
		 
        // display response
        String output = response.getEntity(String.class);
        System.out.println("Output from Server .... ");
        System.out.println(output + "\n");				
	}

	private static void demoExampleOnePOST(WebResource nameResource) {
        MultivaluedMap<String, String> formData = new MultivaluedMapImpl();
        formData.add("youname", "HelenWu");
        formData.add("youemail", "hw@gmail.com.tw");
        formData.add("studies", "college");
        formData.add("civilstate", "married");
        ClientResponse response = nameResource
            .type(MediaType.APPLICATION_FORM_URLENCODED_TYPE)
            .post(ClientResponse.class, formData);
        
        // check response status code
        if (response.getStatus() != 200) {
            throw new RuntimeException("Failed : HTTP error code : "
                    + response.getStatus());
        }

        // display response
        String output = response.getEntity(String.class);
        System.out.println("Output from Server .... ");
        System.out.println(output + "\n");				
	}

	private static void demoExampleTwoGET(WebResource nameResource) {
		MultivaluedMap<String, String> params = new MultivaluedMapImpl();
		params.add("view", "all"); 
		ClientResponse response = nameResource
				.queryParams(params)
				.accept(MediaType.APPLICATION_JSON)
				.get(ClientResponse.class);
        // check response status code
        if (response.getStatus() != 200) {
            throw new RuntimeException("Failed : HTTP error code : "
                    + response.getStatus());
        }
		 
        // display response
        String output = response.getEntity(String.class);
        //System.out.println("Output from Server .... ");
        //System.out.println(output + "\n");
        System.out.println("new test");
        JsonProcess json = new JsonProcess();
        json.doDecode(output);
	}

}
