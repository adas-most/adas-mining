package esTrans;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.Set;
import java.util.TreeSet;

public class preTransCenter {
	
	public static double[] sameValue = {1.0, 5.0, 5.0};
	public static double[] similarValue = {1.0, 30.0, 30.0};
	
	static ArrayList<Integer> sameArr;
	static ArrayList<Integer> similarArr;
	
	static String url = "localhost";
	static String database = "u825104560_ygade";
	static String user = "root";
	static String passwd = "mysqlmysql";
	
	public static void findSolution (Boolean type, int eventID){		
		
		String S1 = "";
		String S2 = "";
		String S3 = "";
		
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", url, database);
			Connection conn = DriverManager.getConnection(jdbc_info, user, passwd);
			
			Statement st = conn.createStatement();
			String sql;
			ResultSet rs;
			
			// build String S1, members sets of S2 and S3
			Set<Integer> S2set = new TreeSet<Integer>();
			Set<Integer> S3set = new TreeSet<Integer>();
			for(int i : (type ? sameArr : similarArr)){
				S1 += "," + i;
				
				sql = new String().format("SELECT `solidlist` FROM `transaction` WHERE `event…id` = %d", i);
				rs = st.executeQuery(sql);
				while(rs.next()){
					int[] sollist = strArr2intArr(rs.getString("solidlist").split(","));
					for(int j : sollist)
						S2set.add(j);
				}
				
				sql = new String().format("SELECT `empno` FROM `transaction` WHERE `event…id` = %d", i);
				rs = st.executeQuery(sql);
				while(rs.next()) {
					S3set.add(rs.getInt("empno"));
				}
			}
			if(!(type ? sameArr : similarArr).isEmpty())
				S1 = S1.substring(1);
			
			// build String S2
			for(int i : S2set)
				S2 += "," + i;
			if(!S2set.isEmpty())
				S2 = S2.substring(1);
			
			// build String S3
			for(int i : S3set)				
				S3 += "," + i;
			if(!S3set.isEmpty()) {
				S3 = S3.substring(1);
			}
			
			// insert data to database
			S1 = (S1.equals("") ? "NULL" : "'" + S1 + "'");
			S2 = (S2.equals("") ? "NULL" : "'" + S2 + "'");
			S3 = (S3.equals("") ? "NULL" : "'" + S3 + "'");
			
			sql = new String().format(
					"INSERT INTO `pretrans`(`createdate`, `empnolist`, `event…id`, `smeventlist`, `solidlist`) VALUES (NOW(), %s, '%d', %s, %s)",
					S3, eventID, S1, S2);
			st.executeUpdate(sql);
			
			// close sql connect
			if(!conn.isClosed())
				conn.close();
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}
	
	public static void recommendSolutionA (int eventID){
		
		// build this eventID data type
		data t1 = new data(eventID);
		
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", url, database);
			Connection conn = DriverManager.getConnection(jdbc_info, user, passwd);
			
			Statement st = conn.createStatement();
			String sql = new String().format("SELECT COUNT(*) FROM `carevent` WHERE NOT `id` = %d", eventID);
			ResultSet rs = st.executeQuery(sql);
			rs.next();
			
			int arrayLength = rs.getInt("COUNT(*)");
			// if database empty call recommendSolutionC
			if(arrayLength == 0){
				
				conn.close();
				recommendSolutionC(eventID);
				
			}else{
				
				// same events or similar events
				sameArr = new ArrayList();
				similarArr = new ArrayList();
				
				sql = new String().format("SELECT `id` FROM `carevent` WHERE NOT `id` = %d AND `status` = '4'", eventID);
				rs = st.executeQuery(sql);
				while(rs.next()){
					
					data t2 = new data(rs.getInt("id"));
					
					double D1 = (t1.type == t2.type) ? 1.0 : 0.0;
					double D2 = distance(
							t1.carsenselist.values().toArray(new Double[t1.carsenselist.size()]),
							t2.carsenselist.values().toArray(new Double[t2.carsenselist.size()]));
					double D3 = distance(
							t1.imgmodlist.values().toArray(new Double[t1.imgmodlist.size()]),
							t2.imgmodlist.values().toArray(new Double[t2.imgmodlist.size()]));
					
					System.out.println(new String().format("%d and %d : %.2f %.2f %.2f", t1.eventID, t2.eventID, D1, D2, D3));
					
					if(D1 == sameValue[0] && D2 <= sameValue[1] && D3 <= sameValue[2]){
						System.out.println(new String().format("%d was a same event of %d.", t2.eventID, t1.eventID));
						sameArr.add(t2.eventID);
					}else if(D1 == similarValue[0] && D2 <= similarValue[1] && D3 <= similarValue[2]){
						System.out.println(new String().format("%d was a similar event of %d.", t2.eventID, t1.eventID));
						similarArr.add(t2.eventID);
					}
					
				}
				
				// close sql connect
				if(!conn.isClosed())
					conn.close();
				
				if(sameArr.isEmpty()){
					// find similar solutions
					recommendSolutionB(eventID);
				}else{
					// find same solutions
					System.out.println("Start recommend solution process of same event...");
					findSolution(true, eventID);
				}
			}
				
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	}
	
	public static void recommendSolutionB (int eventID){
		
		if(similarArr.isEmpty()){
			recommendSolutionC(eventID);
		}else{
			System.out.println("Start recommend solution process of similar event...");
			findSolution(false, eventID);
		}
		
	}
	
	public static void recommendSolutionC (int eventID){
		
		System.out.println("To recommend process of new solution...");
		
		// insert new and empty data to database
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", url, database);
			Connection conn = DriverManager.getConnection(jdbc_info, user, passwd);
			
			Statement st = conn.createStatement();
			String sql = new String().format(
					"INSERT INTO `pretrans`(`createdate`, `empnolist`, `event…id`, `smeventlist`, `solidlist`) VALUES (NOW(), NULL, '%d', NULL, NULL)",
					eventID);
			st.executeUpdate(sql);
			
			// colse sql connect
			if(!conn.isClosed())
				conn.close();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	}
	
	public static double distance(Double[] a, Double[] b){
		double sum = 0.0;
		for(int i = 0; i < a.length; i++)
			sum += Math.pow(a[i] - b[i], 2);
		return Math.sqrt(sum);
	}
	
	public static int[] strArr2intArr(String[] src){
		int[] dst = new int[src.length];
		for(int i = 0; i < dst.length; i++)
			dst[i] = Integer.parseInt(src[i]);
		return dst;
	}
	
}

class data {
	
	public int eventID;
	public int type;
	public Map<Integer, Double> carsenselist;
	public Map<Integer, Double> imgmodlist;
	
	String url = "localhost";
	String database = "u825104560_ygade";
	String user = "root";
	String passwd = "mysqlmysql";
	
	data(int eventID){
		this.eventID = eventID;
		build();
	}
	
	void build(){
		
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String jdbc_info = new String().format("jdbc:mysql://%s/%s", url, database);
			Connection conn = DriverManager.getConnection(jdbc_info, user, passwd);
			
			// get target event
			Statement st = conn.createStatement();
			String sql = new String().format("SELECT * FROM `carevent` WHERE `id` = %d", this.eventID);
			ResultSet rs = st.executeQuery(sql);			
			rs.next();
			this.type = rs.getInt("type");
			int[] sdlist = strArr2intArr(rs.getString("sdidlist").split(","));
			int[] imgmodlist = strArr2intArr(rs.getString("imgmodidlist").split(","));
			
			// for table carsensedata
			this.carsenselist = new HashMap<Integer, Double>();
			for(int i = 0; i < sdlist.length; i++){
				sql = new String().format("SELECT `data` FROM `carsensedata` WHERE `id` = %d", sdlist[i]);
				rs = st.executeQuery(sql);
				
				rs.next();
				
				String str = rs.getString("data");
				try{
					double value = Double.parseDouble(str);
					carsenselist.put(i, value);
				}catch(NumberFormatException e){
					double value = (str.equals("on") ? 1.0 : 0.0);
					carsenselist.put(i, value);
				}
				
			}

			// for table imgmodule
			int dataIndex = 0;
			this.imgmodlist = new HashMap<Integer, Double>();
			for(int i = 0; i < imgmodlist.length; i++){
				sql = new String().format("SELECT `oldpara` FROM `imgmodule` WHERE `id` = %d", imgmodlist[i]);
				rs = st.executeQuery(sql);
				
				rs.next();
				double[] sublist = strArr2doubleArr(rs.getString("oldpara").split(","));
				for(int j = 0; j < sublist.length; j++)
					this.imgmodlist.put(dataIndex++, sublist[j]);
			}
			
			// close sql connect
			if(!conn.isClosed())
				conn.close();
			
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	int[] strArr2intArr(String[] src){
		int[] dst = new int[src.length];
		for(int i = 0; i < dst.length; i++)
			dst[i] = Integer.parseInt(src[i]);
		return dst;
	}
	
	double[] strArr2doubleArr(String[] src){
		double[] dst = new double[src.length];
		for(int i = 0; i < dst.length; i++)
			dst[i] = Double.parseDouble(src[i]);
		return dst;
	}
	
}