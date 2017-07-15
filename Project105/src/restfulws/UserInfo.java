package restfulws;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.PathParam;


// @Path here defines class level path. Identifies the URI path that
// a resource class will serve requests for.
@Path("UserInfoService")
public class UserInfo {
	
	// @GET here defines, this method will process HTTP GET requests.
	@GET
	// @Path here defines method level path. Identifies the URI path that a
	// resource class method will serve requests for.
	@Path("/name/{i}")
	// @Produces here defines the media type(s) that the methods of a resource class can produce.
	@Produces(MediaType.TEXT_XML)
	// @PathParam injects the value of URI parameter that defined in @Path expression, into the method.
	public String userName(@PathParam("i") String i) {
		String name = i;
		return "<User>" + "<Name>" + name + "</Name>" + "</User>";
	}

	@GET
	@Path("/age/{j}")
	@Produces(MediaType.TEXT_XML)
	public String userAge(@PathParam("j") int j) {
		int age = j;
		return "<User>" + "<Age>" + age + "</Age>" + "</User>";
	}
	
	@GET
	@Path("/data/{k}")
	@Produces(MediaType.TEXT_XML)
	public String userData(@PathParam("k") String k) {
		String data = k;
		return "<User>" + "<Data>" + data + "</Data>" + "</User>";
	}
	
	@POST
	@Path("/crunchifyService")
	@Consumes(MediaType.APPLICATION_JSON)
	public Response crunchifyREST(InputStream incomingData) {
		StringBuilder crunchifyBuilder = new StringBuilder();
		try {
			BufferedReader in = new BufferedReader(new InputStreamReader(incomingData));
			String line = null;
			while ((line = in.readLine()) != null) {
				crunchifyBuilder.append(line);
			}
		} catch (Exception e) {
			System.out.println("Error Parsing: - ");
		}
		System.out.println("Data Received: " + crunchifyBuilder.toString());
		
		JsonProcess jp = new JsonProcess();
		jp.doDecode(crunchifyBuilder.toString());
 
		// return HTTP response 200 in case of success
		return Response.status(200).entity("Crunchify REST Service Invoked Successfully..").build();
	}
 
	@GET
	@Path("/verify")
	@Produces(MediaType.TEXT_PLAIN)
	public Response verifyRESTService(InputStream incomingData) {
		String result = "CrunchifyRESTService Successfully started..";
 
		// return HTTP response 200 in case of success
		return Response.status(200).entity(result).build();
	}
}
