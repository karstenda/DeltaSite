package delta.site.client;

import com.google.gwt.core.client.EntryPoint;


import com.google.gwt.user.client.ui.HTML;
import com.google.gwt.user.client.ui.Image;
import com.google.gwt.user.client.ui.RootPanel;


/**
 * Entry point classes define <code>onModuleLoad()</code>.
 */
public class DeltaSite implements EntryPoint {


	
	/**
	 * This is the entry point method.
	 */
	public void onModuleLoad() {
		
	
		
//		RootPanel.get("contentcontainer").add(new Scene(1));
		
	
		
		
		Image image = new Image("./images/delta_dark.png");
		
		image.setStyleName("introLogo");
		
		RootPanel.get("intro1").add(new HTML("<q><span class=\"introLogo\" >Delta <a href=\"http://www.google.be\">test</a></span></q>"));
		
		for (int i = 1; i <= 3; i++)
			for (int j = 1; j <=3; j++) {
				MemberDetailPage t = new MemberDetailPage();
				RootPanel.get("memberdetail"+i+j).add(t);
			}
				
		
	}
}
