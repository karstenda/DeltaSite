package delta.site.client;

import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.HTML;
import com.google.gwt.user.client.ui.Label;

public class TestPage extends Composite {

	public TestPage() {
		AbsolutePanel panel = new AbsolutePanel();
		
		HTML html = new HTML("Test");
		panel.add(html);
		
		html = new HTML("Test2");
		panel.add(html);
		
		initWidget(panel);
	}
	
}
