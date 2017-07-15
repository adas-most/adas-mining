package restfulws;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

@Path("DataService")
public class wsCenter {
	
	@GET
	@Path("/carPath/{carID}/{timestamp}/{eventID}")
	@Produces(MediaType.TEXT_XML)
	public void carPath(@PathParam("carID") String carID,@PathParam("timestamp") String timestamp,@PathParam("eventID") String eventID) {
		
		wsClient.clientOfPlanII.getMedium(carID, timestamp, eventID);
		
	}
	
	// Test interface
	@GET
	@Path("/databasePath/{carID}/{timestamp}/{eventID}")
	@Produces(MediaType.TEXT_XML)
	public String databasePath(@PathParam("carID") String carID,@PathParam("timestamp") String timestamp,@PathParam("eventID") String eventID) {
		
		return restfulws.JsonProcess.doEncode();
		
	}
	
	@GET
	@Path("/recommendSolution/{eventID}")
	@Produces(MediaType.TEXT_XML)
	public void recommendSolution(@PathParam("eventID") int eventID) {
		
		esTrans.preTransCenter.recommendSolutionA(eventID);

		// set status to 2
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", "localhost", "u825104560_ygade");
			Connection conn = DriverManager.getConnection(jdbc_info, "root", "mysqlmysql");
			
			Statement st = conn.createStatement();
			String sql = new String().format("UPDATE `carevent` SET `status`= '2' WHERE `id` = %d", eventID);
			st.executeUpdate(sql);
			
			if(!conn.isClosed())	conn.close();	// close sql connect
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
