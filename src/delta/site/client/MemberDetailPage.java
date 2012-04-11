package delta.site.client;

import com.google.gwt.i18n.client.HasDirection.Direction;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.Grid;
import com.google.gwt.user.client.ui.HTML;
import com.google.gwt.user.client.ui.HasHorizontalAlignment.HorizontalAlignmentConstant;
import com.google.gwt.user.client.ui.HorizontalPanel;
import com.google.gwt.user.client.ui.Image;
import com.google.gwt.user.client.ui.VerticalPanel;
import com.google.gwt.user.client.ui.Widget;

public class MemberDetailPage extends Composite {

	public MemberDetailPage() {
		this(
				"Niels Avonds",
				"Tow be, or not tow be, is that really THE questaajon? This answer is a little longer to test the wrapping over multiple lines.",
				4, "CW", "IT");
	}

	public MemberDetailPage(String name, String quote, int year, String study,
			String vtkpost) {

		HorizontalPanel mainpanel = new HorizontalPanel();
		mainpanel.setSize("660px", "260px");

		Widget leftpanel = createLeftPanel(name, quote);
		Widget rightpanel = createRightPanel(year, study, vtkpost);

		mainpanel.add(leftpanel);
		mainpanel.add(rightpanel);
		initWidget(mainpanel);
	}

	private Widget createLeftPanel(String name, String quote) {
		VerticalPanel leftpanel = new VerticalPanel();

		HTML html = new HTML("<span class=\"membername\">" + name + "</span>");
		leftpanel.add(html);

		html = new HTML("<br/><span class=\"memberquestions\">"
				+ "<b>Favoriete quote:</b><br/>" + quote + "<br/>"
				+ "<b>Nog een vraag:</b><br/>" + "Nog een antwoord" + "</br>"
				+ "</span>");
		leftpanel.add(html);
		leftpanel.setStylePrimaryName("memberleft");

		return leftpanel;
	}

	private Widget createRightPanel(int year, String study, String vtkpost) {
		VerticalPanel rightpanel = new VerticalPanel();

		Image image = new Image(
				"http://www.pmradio.com.au/images/mainsite/profile_m.gif");
		image.setSize("150px", "150px");
		rightpanel.add(image);

		HTML html = new HTML("<span class=\"memberinfo\">" + "Jaar: " + year
				+ "e<br/>" + "Richting: " + study + "<br/>"
				+ "Favoriete post: " + vtkpost + "</span>");
		rightpanel.add(html);

		return rightpanel;
	}
}
