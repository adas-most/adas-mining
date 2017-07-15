package wsClient;

import java.io.BufferedReader;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class testServlet
 */
@WebServlet("/testServlet")
public class testServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public testServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub

		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		response.setCharacterEncoding("UTF-8");
		request.setCharacterEncoding("UTF-8");
		
		String[] mainData = new String[7];
		String[] sensorData = new String[11];
		String[] moduleData = new String[4];
		
		for(int i = 0; i < 3; i++)
			mainData[i] = request.getParameter("b" + (i+1));
		
		for(int i = 3; i < 7; i++)
			mainData[i] = request.getParameter("o" + (i-2));
		
		for(int i = 0; i < 11; i++) {
			if(i < 5)
				sensorData[i] = request.getParameter("s1"+(i+1));
			else
				sensorData[i] = request.getParameter("s2"+(i-4));
		}
		
		float[][] temp = new float[4][7];
		for(int i = 1; i <= temp.length; i++) {
			for(int j = 1; i <= 2 && j <= 7; j++) {
				String s = "m" + i + j;
				try {
					temp[i-1][j-1] = Float.parseFloat(request.getParameter(s));
				} catch(Exception e) {
					temp[i-1][j-1] = 0;
				}
				
			}
			for(int j = 1; i == 3 && j <= 3; j++) {
				String s = "m" + i + j;
				try {
					temp[i-1][j-1] = Float.parseFloat(request.getParameter(s));
				} catch(Exception e) {
					temp[i-1][j-1] = 0;
				}
			}
			for(int j = 1; i == 4 && j <= 6; j++) {
				String s = "m" + i + j;
				try {
					temp[i-1][j-1] = Float.parseFloat(request.getParameter(s));
				} catch(Exception e) {
					temp[i-1][j-1] = 0;
				}
			}
		}
		
		moduleData[0] = new String().format("P1特徵參數(%.2f), P2機器學習參數(%.2f), P3特徵來源選擇(%.2f), P4天氣狀況(%.2f), P5早晚狀況(%.2f), P6車輛密集度(%.2f), P7地點(%.2f)",
				temp[0][0], temp[0][1], temp[0][2], temp[0][3], temp[0][4], temp[0][5], temp[0][6]);
		moduleData[1] = new String().format("P1特徵參數(%.2f), P2機器學習參數(%.2f), P3特徵來源選擇(%.2f), P4天氣狀況(%.2f), P5早晚狀況(%.2f), P6車輛密集度(%.2f), P7地點(%.2f)",
				temp[1][0], temp[1][1], temp[1][2], temp[1][3], temp[1][4], temp[1][5], temp[1][6]);
		moduleData[2] = new String().format("P1影像亮度資料(%.2f), P2光譜敏感度(%.2f), P3防遠近燈震盪延遲時間(%.2f)",
				temp[2][0], temp[2][1], temp[2][2]);
		moduleData[3] = new String().format("P1右車道敏感度(%.2f), P2左車道敏感度(%.2f), P3預設偵測車道最小寬度(%.2f),P4預設偵測車道最大寬度(%.2f), P5警告敏感度(%.2f), P6道路偵測失敗回溯時間長度(%.2f)",
				temp[3][0], temp[3][1], temp[3][2], temp[3][3], temp[3][4], temp[3][5]);
		
		carEvent.eventCenter.processEventData(restfulws.JsonProcess.doEncode(mainData, sensorData, moduleData));
		
	}

}
