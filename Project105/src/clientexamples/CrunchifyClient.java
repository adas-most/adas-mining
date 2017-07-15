package clientexamples;

import java.io.BufferedReader;
//import java.io.FileInputStream;
//import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.URL;
import java.net.URLConnection;

import restfulws.JsonProcess;

public class CrunchifyClient {
		public static void main(String[] args) {
			String string = "";
			try {
	 
				// Step1: 
				// a. Let's 1st read file from fileSystem
		//		InputStream crunchifyInputStream = new FileInputStream("D:\\JSONdata\\CrunchifyJSON.txt");
		//		InputStreamReader crunchifyReader = new InputStreamReader(crunchifyInputStream);
		//		BufferedReader br = new BufferedReader(crunchifyReader);
		//		String line;
		//		while ((line = br.readLine()) != null) {
		//			string += line + "\n";
		//		}
				// b. Let's call JsonProcess.doEncode()
				JsonProcess jp = new JsonProcess();
//string = jp.doEncode();
				
				System.out.println("Data Sentout: " + string);
	 
				// Step2: Now pass JSON File Data to REST Service
				try {
					URL url = new URL("http://localhost:8080/Project105/rest/UserInfoService/crunchifyService");
					URLConnection connection = url.openConnection();
					connection.setDoOutput(true);
					connection.setRequestProperty("Content-Type", "application/json");
					connection.setConnectTimeout(5000);
					connection.setReadTimeout(5000);
					OutputStreamWriter out = new OutputStreamWriter(connection.getOutputStream());
					out.write(string);
					out.close();
	 
					BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
					String string1 = "\n";
					String line1;
					while ((line1 = in.readLine()) != null) {
						string1 += line1 + "\n";
					}
					System.out.println(string1);
					in.close();
				} catch (Exception e) {
					System.out.println("\nError while calling Crunchify REST Service");
					System.out.println(e);
				}
	 
//				br.close();
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}