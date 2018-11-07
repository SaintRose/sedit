function WHCreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    var expires = "; expires=" + date.toGMTString();
	document.cookie = name+"="+value+expires+"; path=/";
}
function WHReadCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

window.onload = WHCheckCookies;

function WHCheckCookies() {
    if(WHReadCookie('cookies_accepted') != 'T') {
        var message_container = document.createElement('div');
        message_container.id = 'cookies-message-container';
        var text = '<p style="background:#ffffff;max-height:45vh;overflow:auto;margin:0 auto; text-align:left; max-width:1000px;padding:20px 30px;">Z dniem 25 maja 2018r. wchodzi w życie ROZPORZĄDZENIE PARLAMENTU EUROPEJSKIEGO I RADY (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (ogólne rozporządzenie o ochronie danych) zwanym RODO lub GDPR (General Data Protection Regulation). <br> Prosimy o zapoznanie się z naszą <a style="text-decoration:underline;color:#000000;font-weight:bold;" href="/polityka-prywatnosci">Polityką Ochrony Danych Osobowych (RODO)</a>. <br> Wykorzystujemy informacje zapisane za pomocą plików cookies w celach reklamowych, statystycznych, uwierzytelniania użytkowników oraz dostosowania naszych serwisów do indywidualnych potrzeb użytkowników. W przeglądarce istnieje możliwość zmiany ustawień zapisu plików "cookies". Korzystanie z naszych serwisów internetowych bez zmiany ustawień plików cookies oznacza, że będą one zapisane w pamięci urządzenia oraz zgodę na ich wykorzystywanie.<p>';
        var html_code = '<div id="cookies-message" style="padding: 10px 0px; font-size: 14px; line-height: 22px; border-bottom: 1px solid #D3D0D0; text-align: center; position: fixed !important; bottom: 0px; background-color: #EFEFEF; width: 100%; z-index: 9999;max-height:60vh;">' + text + '<a href="javascript:WHCloseCookiesWindow();" id="accept-cookies-checkbox" name="accept-cookies" style="background-color: #000000; padding: 5px 10px; color: #FFF; display: inline-block; margin-left: 10px; text-decoration: none; cursor: pointer; margin-top:10px;">Rozumiem</a></div>';
        message_container.innerHTML = html_code;
        document.body.appendChild(message_container);
    }
}

function WHCloseCookiesWindow() {
    WHCreateCookie('cookies_accepted', 'T', 365);
    document.getElementById('cookies-message-container').removeChild(document.getElementById('cookies-message'));
}
