package delta.site.client;

import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.FlowPanel;

public class Scene extends Composite {

	
	public static final int WIDTH_SCENE = 800;
	public static final int HEIGHT_SCENE = 500;
	public static final int WIDTH_GRADIENT = 130;
	
	
	
	public Scene(int nPages) {
		
		AbsolutePanel absPanel = new AbsolutePanel();
		absPanel.setWidth(WIDTH_SCENE + "px");
		absPanel.setHeight(HEIGHT_SCENE + "px");
		absPanel.setStyleName("BgScene");
		
		FlowPanel rightGradient = new FlowPanel();
		FlowPanel leftGradient = new FlowPanel();
		rightGradient.setStyleName("GradientScene");
		leftGradient.setStyleName("GradientScene");
		rightGradient.setWidth(WIDTH_GRADIENT + "px");
		leftGradient.setWidth(WIDTH_GRADIENT + "px");
		rightGradient.setHeight(HEIGHT_SCENE+ "px");
		leftGradient.setHeight(HEIGHT_SCENE+ "px");
		absPanel.add(leftGradient, 0, 0);
		absPanel.add(rightGradient, WIDTH_SCENE-WIDTH_GRADIENT, 0);
		
		
		FlowPanel content = new FlowPanel();
		content.setWidth(nPages*Page.WIDTH_PAGE + "px");
		content.setHeight(nPages*Page.HEIGHT_PAGE + "px");
		content.setStyleName("PageScene");
		absPanel.add(content, -250, 0);
		
		initWidget(absPanel);
	}
	
	
}
