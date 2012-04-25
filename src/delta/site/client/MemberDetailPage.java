package delta.site.client;

import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.HTML;

public class MemberDetailPage extends Composite {

	public MemberDetailPage() {
		this(
				"Niels Avonds",
				"Tow be, or not tow be, is that really THE questaajon? This answer is a little longer to test the wrapping over multiple lines.",
				4, "CW", "IT");
	}

	public MemberDetailPage(String name, String quote, int year, String study,
			String vtkpost) {
		
		HTML html = new HTML(
					"<div class=\"memberleft\">" +
						"<div class=\"membername\">" + 
								name + 
						"</div>" +
						"<div class=\"memberquestions\">" +
							"<b>Favoriete quote:</b><br/>" + quote + "<br/>" +
							"<b>Nog een vraag:</b><br/>" + "Nog een antwoord" + "</br>" +
						"</div>" +
					"</div>" +
					"<div class=\"memberright\">" +
						"<img class=\"memberimage\" src=\"http://www.pmradio.com.au/images/mainsite/profile_m.gif\" alt=\"" + name + "\"/>" +
						"<div class=\"memberinfo\">" +
							"Jaar: " + year +
							"e<br/>" + "Richting: " + study + "<br/>" +
							"Favoriete post: " + vtkpost +
						"</div>" +
					"</div>"
				);
		
		initWidget(html);

	}
}
