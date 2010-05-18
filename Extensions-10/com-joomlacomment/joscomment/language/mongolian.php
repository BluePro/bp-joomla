<?php

/*
Joomla Comment компонентийн Монгол хэлний орчуулга.
Орчуулсан: Алмас
веб сайт: www.dusal.net 
email: almas@dusal.net

 * Шинэ хэл үүсгэх заавар (дэмжиж байгаад тань баярлалаа !):

 *      1. components/com_comment/joscomment/language хавтсанд

 *         таны хүссэн хэл байгаа эсэхийг шалгаарай.

 *      2. хэрвээ байхгүй бол english.php файлыг юмуу өөрийн орчуулах хэлний файлыг
 
 *		   хуулж аваад <taniihel>.php гэсэн байдлаар нэр өгөөрэй.

 *      3. орчуулахын өмнө <taniihel>.php файлаа utf-8 кодлолоор хадгалаарай ! 

 * 		   (Жишээ нь та Windows хэрэглэдэг бол notepad дээр файлаа нээгээд save as...)

 *      4. орчуулгаа хийнэ

 * 		5. шалгана !

 *      6. тэгээд орчуулгаа joomlacomment -ын тусламжийн форумд илгээгээрэй!

 */

JOSC_define('_JOOMLACOMMENT_WRITECOMMENT', 'Сэтгэгдэл бичих');
JOSC_define('_JOOMLACOMMENT_EDITCOMMENT', 'Сэтгэгдэл засах');
JOSC_define('_JOOMLACOMMENT_UBBCODE', 'UBBCode:');
JOSC_define('_JOOMLACOMMENT_ENTERNAME', 'Нэр:');
JOSC_define('_JOOMLACOMMENT_ENTERNOTIFY0', 'манахгүй');
JOSC_define('_JOOMLACOMMENT_ENTERNOTIFY1', 'манана');
JOSC_define('_JOOMLACOMMENT_NOTIFYTXT1', 'хариу бичигдвэл мэйлээр мэдэгдэнэ');
JOSC_define('_JOOMLACOMMENT_NOTIFYTXT0', 'хариу бичигдэхэд мэйлээр мэдэгдэхгүй');
JOSC_define('_JOOMLACOMMENT_ENTEREMAIL', 'Email:');
JOSC_define('_JOOMLACOMMENT_AUTOMATICEMAIL', 'автомат');
JOSC_define('_JOOMLACOMMENT_ENTERWEBSITE', 'Веб сайт:');
JOSC_define('_JOOMLACOMMENT_ENTERTITLE', 'Гарчиг:');
JOSC_define('_JOOMLACOMMENT_SENDFORM', 'Оруул');
JOSC_define('_JOOMLACOMMENT_BY', 'бичсэн: ');

JOSC_define('_JOOMLACOMMENT_COLOR', 'өнгө');
JOSC_define('_JOOMLACOMMENT_AQUA', 'усан цэнхэр');
JOSC_define('_JOOMLACOMMENT_BLACK', 'хар');
JOSC_define('_JOOMLACOMMENT_BLUE', 'цэнхэр');
JOSC_define('_JOOMLACOMMENT_FUCHSIA', 'ягаан');
JOSC_define('_JOOMLACOMMENT_GRAY', 'саарал');
JOSC_define('_JOOMLACOMMENT_GREEN', 'ногоон');
JOSC_define('_JOOMLACOMMENT_LIME', 'шохойн');
JOSC_define('_JOOMLACOMMENT_MAROON', 'хүрэн');
JOSC_define('_JOOMLACOMMENT_NAVY', 'хар хөх');
JOSC_define('_JOOMLACOMMENT_OLIVE', 'шар ногоон');
JOSC_define('_JOOMLACOMMENT_PURPLE', 'нил ягаан');
JOSC_define('_JOOMLACOMMENT_RED', 'улаан');
JOSC_define('_JOOMLACOMMENT_SILVER', 'мөнгөлөг');
JOSC_define('_JOOMLACOMMENT_TEAL', 'хөх ногоон');
JOSC_define('_JOOMLACOMMENT_WHITE', 'цагаан');
JOSC_define('_JOOMLACOMMENT_YELLOW', 'шар');

JOSC_define('_JOOMLACOMMENT_SIZE', 'хэмжээ');
JOSC_define('_JOOMLACOMMENT_TINY', 'бяцхан');
JOSC_define('_JOOMLACOMMENT_SMALL', 'жижиг');
JOSC_define('_JOOMLACOMMENT_MEDIUM', 'дунд');
JOSC_define('_JOOMLACOMMENT_LARGE', 'том');
JOSC_define('_JOOMLACOMMENT_HUGE', 'аврага');

JOSC_define('_JOOMLACOMMENT_QUOTE', 'Ишлэх');
JOSC_define('_JOOMLACOMMENT_REPLY', 'Хариулах');
JOSC_define('_JOOMLACOMMENT_EDIT', 'Засах');
JOSC_define('_JOOMLACOMMENT_DELETE', 'Устгах');

JOSC_define('_JOOMLACOMMENT_UBB_WROTE', 'бичсэн:');
JOSC_define('_JOOMLACOMMENT_UBB_QUOTE', 'Ишлэсэн:');
JOSC_define('_JOOMLACOMMENT_UBB_CODE', 'Код:');

JOSC_define('_JOOMLACOMMENT_FORMVALIDATE', 'Сэтгэгдэл оруулна уу.');
JOSC_define('_JOOMLACOMMENT_FORMVALIDATE_EMAIL', 'Шинэ сэтгэгдэл нэмэгдэх мэдэгдэл авахын тулд э-мэйл хаягаа оруулна уу.');
JOSC_define('_JOOMLACOMMENT_FORMVALIDATE_CAPTCHA', 'Зураг дээрх спэмээс хамгаалсан кодыг дуурайлгаж оруулна уу.');
JOSC_define('_JOOMLACOMMENT_FORMVALIDATE_CAPTCHATXT', 'Зураг дээрх спэмээс хамгаалсан кодыг дуурайлгаж оруулна уу.');
JOSC_define('_JOOMLACOMMENT_FORMVALIDATE_CAPTCHA_FAILED', 'Спэмээс хамгаалах код буруу байна. Зураг дээрх спэмээс хамгаалсан кодыг дуурайлгаж оруулна уу.');
JOSC_define('_JOOMLACOMMENT_MSG_DELETE', 'Энэ сэтгэгдлийг устгах уу?');
JOSC_define('_JOOMLACOMMENT_SAVINGFAILED', 'Сэтгэгдэл оруулж чадсангүй!');
JOSC_define('_JOOMLACOMMENT_EDITINGFAILED', 'Сэтгэгдлийг засаж чадсангүй!');
JOSC_define('_JOOMLACOMMENT_DELETINGFAILED', 'Сэтгэгдэл устгаж чадсангүй!');
JOSC_define('_JOOMLACOMMENT_REQUEST_ERROR','Алдаа гарлаа');

JOSC_define('_JOOMLACOMMENT_ONLYREGISTERED', 'Зөвхөн бүртгэлтэй хэрэглэгчид сэтгэгдэл үлдээж чадна!');
JOSC_define('_JOOMLACOMMENT_ANONYMOUS', 'Зочин');

JOSC_define('_JOOMLACOMMENT_ADDNEW', 'Сэтгэгдэл бичих');
JOSC_define('_JOOMLACOMMENT_DELETEALL', 'Бүгдийг устгах');
JOSC_define('_JOOMLACOMMENT_MSG_DELETEALL', 'Үнэхээр бүх сэтгэгдлийг устгах уу!?');
JOSC_define('_JOOMLACOMMENT_RSS', 'RSS');

JOSC_define('_JOOMLACOMMENT_SEARCH', 'Хайлт');
JOSC_define('_JOOMLACOMMENT_PROMPT_KEYWORD', 'Түлхүүр үгээр хайх');
JOSC_define('_JOOMLACOMMENT_SEARCH_ANYWORDS', 'Үг бүрээр');
JOSC_define('_JOOMLACOMMENT_SEARCH_ALLWORDS', 'Бүх үгнүүдээр');
JOSC_define('_JOOMLACOMMENT_SEARCH_PHRASE', 'Нарийвчилсан хэлцээр');
JOSC_define('_JOOMLACOMMENT_NOSEARCHMATCH', 'Таны хайлтанд тохирох зүйл олдсонгүй.');
JOSC_define('_JOOMLACOMMENT_SEARCHMATCH', '%d зүйл олдлоо.');
JOSC_define('_JOOMLACOMMENT_SEARCHMATCHES', '%d зүйл олдлоо.');

JOSC_define('_JOOMLACOMMENT_BEFORE_APPROVAL', 'Сэтгэгдэл хадгалагдлаа. Удахгүй шалгаад оруулах болно. Сэтгэгдэл оруулсан таньд баярлалаа.');

/* -----------------------------------------------------------------------------
 * NEW OR MODIFIED IN THE 3.20
 * 
 */
JOSC_define('_JOOMLACOMMENT_COMMENTS_TITLE', 'Сэтгэгдэл'); 	/* Will replace {_COMMENTS_2_4} in template */ 
JOSC_define('_JOOMLACOMMENT_COMMENTS_0', 'Сэтгэгдэл'); 		/* for Read ON: 0 */ 
JOSC_define('_JOOMLACOMMENT_COMMENTS_1', 'Сэтгэгдэл'); 	/* for Read ON: when only one comment */
JOSC_define('_JOOMLACOMMENT_COMMENTS_2_4', 'Сэтгэгдэл'); 	/* for Read ON: 2 to 4 comments */
JOSC_define('_JOOMLACOMMENT_COMMENTS_MORE', 'Сэтгэгдэл'); /* for Read ON: more than 4 */ 

JOSC_define('_JOOMLACOMMENT_EMPTYCOMMENT', 'Алдаа: Сэтгэгдэл хоосон байна.');

JOSC_define('_JOOMLACOMMENT_NOTIFY_NEW_SUBJECT', 'Shine setgegdel:{title} [henees:{name}][medegdel:{notify}]');
JOSC_define('_JOOMLACOMMENT_NOTIFY_NEW_MESSAGE',		'<p>Tanii <a href="{livesite}">{livesite}</a> sited manasan bichlegt tani setgegdel nemegdlee.</p>'
											. 	'<p><b>Bichsen: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdlin site dahi hayag: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											. 	'<p>Hervee iim mail dahin huleej avahiig husehgui bol :<br />'
											.	'- Hervee ta burtgeltei hereglegch bol : nevterch orood ene bichlegt bichsen setgegdeldee \'medegdehgui\' gesen songolt hiine uu.<br />'
											.	'- Hervee burtgelgui bol : \'medegdehgui\' gesen songolt hiij shine setgegdel oruulna uu.</p>'
											);
JOSC_define('_JOOMLACOMMENT_NOTIFY_TOBEAPPROVED_SUBJECT', 'Huleegdsen:{title} [from:{name}][notify:{notify}]');
JOSC_define('_JOOMLACOMMENT_NOTIFY_TOBEAPPROVED_MESSAGE', '<p><a href="{livesite}">{livesite}</a> sited shine setgegdel nemegdlee. Ta shalgaad oruulah heregtei.</p>'
											. 	'<p><b>Bichsen: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdliin holboos: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											);
JOSC_define('_JOOMLACOMMENT_NOTIFY_EDIT_SUBJECT', 'Setgegdel zasvarlagdlaa:{title} [from:{name}][notify:{notify}]');
JOSC_define('_JOOMLACOMMENT_NOTIFY_EDIT_MESSAGE',	'<p>{livesite} site dahi tanii manasan bichlegt setgegdel zasagdlaa.</p>'
											. 	'<p><b>Ner: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdliin holboos: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											. 	'<p>Hervee iim mail dahin huleej avahiig husehgui bol :<br />'
											.	'- Hervee ta burtgeltei hereglegch bol : nevterch orood ene bichlegt bichsen setgegdeldee \'medegdehgui\' gesen songolt hiine uu.<br />'
											.	'- Hervee burtgelgui bol : \'medegdehgui\' gesen songolt hiij shine setgegdel oruulna uu.</p>'
											);
JOSC_define('_JOOMLACOMMENT_NOTIFY_PUBLISH_SUBJECT', 'Hevlegdlee:{title} setgegdel shalgagdaad orloo.');
JOSC_define('_JOOMLACOMMENT_NOTIFY_PUBLISH_MESSAGE','<p><a href="{livesite}">{livesite}</a> sited daraah setgegdel orloo.</p>'
											. 	'<p><b>Ner: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdliin holboos: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											);        
JOSC_define('_JOOMLACOMMENT_NOTIFY_UNPUBLISH_SUBJECT', 'Horigdloo:{title} setgegdel shalgagdaad zuvshuurugdsungui.');
JOSC_define('_JOOMLACOMMENT_NOTIFY_UNPUBLISH_MESSAGE','<p><a href="{livesite}">{livesite}</a> site dahi daraahi setgegdel zuvshuurugdsungui.</p>'
											. 	'<p><b>Ner: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdliin holboos: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											);        
JOSC_define('_JOOMLACOMMENT_NOTIFY_DELETE_SUBJECT', 'Ustgagdlaa:{title} setgegdel ustgagdlaa.');
JOSC_define('_JOOMLACOMMENT_NOTIFY_DELETE_MESSAGE','<p><a href="{livesite}">{livesite}</a> site dahi daraahi setgegdel ustgagdlaa:</p>'
											. 	'<p><b>Ner: </b>{name}<br />'
											. 	'<b>Garchig: </b>{title}<br />'
											. 	'<b>Setgegdel: </b>{comment}<br />'
											. 	'<b>Setgegdliin holboos: </b><a href="{linkURL}">{linkURL}</a></p>'
											. 	'<p>Ene setgegdel automataar uusgegden tanid ilgeegdej baigaag anhaarna uu.</p>'
											);    
JOSC_define('_JOOMLACOMMENT_MSG_NEEDREFRESH', '' );
JOSC_define('_JOOMLACOMMENT_RELOAD_CAPTCHA', 'дарж шинэ зураг ав.');
											    
?>
