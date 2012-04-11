package delta.site.client;

import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.Grid;
import com.google.gwt.user.client.ui.HTML;
import com.google.gwt.user.client.ui.Label;

public class MemberDetailPage extends Composite {

	public MemberDetailPage() {
		this("Niels Avonds", "Tow be, or not tow be, is that really THE questaajon?", 4, "CW", "IT");
	}
	
	public MemberDetailPage(String name, String quote, int year, String study, String vtkpost) {
		
		Grid mainpanel = new Grid(1, 2);

		Grid leftpanel = createLeftPanel(name, quote);
		Grid rightpanel = createRightPanel();		

		mainpanel.setWidget(0, 0, leftpanel);
		mainpanel.setWidget(0, 1, rightpanel);
		initWidget(mainpanel);
	}
	
	private Grid createLeftPanel(String name, String quote) {
		Grid leftpanel = new Grid(2, 1);

		HTML html = new HTML("<span class=\"membername\">" + name + "</span>");
		leftpanel.setWidget(0, 0, html);
		
		html = new HTML("<br/><span class=\"memberquestions\">" + 
							"<b>Favoriete quote:</b><br/>" + quote + "<br/>" +
							"<b>Nog een vraag:</b><br/>" + "Nog een antwoord" + "</br>" + 
						"</span>");
		leftpanel.setWidget(1, 0, html);
		
		return leftpanel;
	}
	
	private Grid createRightPanel() {
		Grid rightpanel = new Grid(2, 1);

		return rightpanel;
	}
}
