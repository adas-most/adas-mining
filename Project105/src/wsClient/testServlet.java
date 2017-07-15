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
		
		moduleData[0] = new String().format("P1�S�x�Ѽ�(%.2f), P2�����ǲ߰Ѽ�(%.2f), P3�S�x�ӷ����(%.2f), P4�Ѯ𪬪p(%.2f), P5���ߪ��p(%.2f), P6�����K����(%.2f), P7�a�I(%.2f)",
				temp[0][0], temp[0][1], temp[0][2], temp[0][3], temp[0][4], temp[0][5], temp[0][6]);
		moduleData[1] = new String().format("P1�S�x�Ѽ�(%.2f), P2�����ǲ߰Ѽ�(%.2f), P3�S�x�ӷ����(%.2f), P4�Ѯ𪬪p(%.2f), P5���ߪ��p(%.2f), P6�����K����(%.2f), P7�a�I(%.2f)",
				temp[1][0], temp[1][1], temp[1][2], temp[1][3], temp[1][4], temp[1][5], temp[1][6]);
		moduleData[2] = new String().format("P1�v���G�׸��(%.2f), P2���бӷP��(%.2f), P3������O�_������ɶ�(%.2f)",
				temp[2][0], temp[2][1], temp[2][2]);
		moduleData[3] = new String().format("P1�k���D�ӷP��(%.2f), P2�����D�ӷP��(%.2f), P3�w�]�������D�̤p�e��(%.2f),P4�w�]�������D�̤j�e��(%.2f), P5ĵ�i�ӷP��(%.2f), P6�D���������Ѧ^���ɶ�����(%.2f)",
				temp[3][0], temp[3][1], temp[3][2], temp[3][3], temp[3][4], temp[3][5]);
		
		carEvent.eventCenter.processEventData(restfulws.JsonProcess.doEncode(mainData, sensorData, moduleData));
		
	}

}
