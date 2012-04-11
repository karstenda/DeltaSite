package delta.site.client;

import com.google.gwt.event.dom.client.ClickEvent;
import com.google.gwt.event.dom.client.ClickHandler;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.Composite;

public class Topbar extends Composite {

	public Topbar() {
		Button test = new Button("<b>test</b>");
		test.addClickHandler(new ClickHandler() {
			
			@Override
			public void onClick(ClickEvent event) {
				Window.alert("test");
				Window.Location.replace("www.google.com");
			}
		});
		initWidget(test);
	}
	
}
