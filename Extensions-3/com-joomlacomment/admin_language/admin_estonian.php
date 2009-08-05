<?php

/*
 * Translated by jFlash
 * 
 * Translation is available at www.eraser.ee
 */


/* ***************************************************
 * *********** M A N A G E   C O M M E N T S *********
 * ***************************************************
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_CONFIRM_NOTIFY', 'Kas sa soovid ka saata teavitust ?\n[CANCEL=ei teavitata]');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_SENT_TO', 'Teavitused on saadetud : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_NOT_SENT', 'Teavitusi ei saadetud');

JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_id', 'Id');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_writer', 'Kirjutaja'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_userid', 'KasutajaID'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_notify', 'Teavita'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_url', 'Url'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_date', 'Kuupäev'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_comment', 'Kommentaar <br /><i>(lingid ja pildid on aktiveerimata)</i>'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_contentitem', 'Sisuelement'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_published', 'Avaldatud (teavita postitajat)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_delete', 'Kustuta (teavita postitajat)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_ip', 'IP'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingyes', 'Hääleta Jah'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingno', 'Hääleta Ei'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_parentid', 'Kõrgem Id'); 



/* ***************************************************
 * *************** S E T T I N G *********************
 * ***************************************************
 */
/*
 * common
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_NAME', 'Nimi : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_COMPONENT', 'Komponent : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_BASIC_SETTINGS', 'Tavaseaded'); 
/*
 * generalPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_GENERAL_PAGE', 'Peamine'); 
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_CAPTION', 'Kustuta täielikult:'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_HELP', 'Komponendi eemaldamisel kustutatakse ka andmebaasi tabelid! Ära aktiveeri, kui sa just ei taha enam !joomlacomment komponenti kasutada.'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_CAPTION', 'Mamboti-plugina funktsioon artiklites:');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_HELP', '<u>Ainult spetsialistidele!</u> Siin saad muuta joscomment plugina funktsionaalsust, kui oled muutnud HTML koodi.');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_CAPTION', 'Keel kodulehel:');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_HELP', 'kui on auto : kasutatakse parameetrit mosConfigLanguage ');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_CAPTION', 'Administreerimisliidese keel:');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_HELP', 'kui on auto : kasutatakse parameetrit mosConfigLanguage ');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_CAPTION', 'Lokaalne tähekodeering :<br />kui sa uuendad vanemalt versioonilt kui 3.0.0, loe enne täpselt selgitust paremal !');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPnoiconv', 'Ei kasutata !! php <a href="http://www.php.net/manual/en/ref.iconv.php" target="_blank">iconv library</a><u/> pole saadaval.  <b>Kui sa ei kasuta Joomlas utf-8 või iso-8859-1 kodeeringut, siis kontakteeru oma administraatoriga või deaktiveeri ajaxi toetuse parameeter.</b>');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPiconv', 'Php <a href="http://www.php.net/manual/en/ref.iconv.php" target="_blank">iconv library</a> selles serveris on saadaval.'
	                    .  '<br /><b>Sisesta oma joomla tähekodeering, kui see pole utf-8.<br />Kliki <a href="http://www.gnu.org/software/libiconv/" target="_blank">SIIA</a> et kontrollida, kas iconv library seda tähekodeeringut toetab, vastasel juhul pöördu joomlacomment klienditoe poole.</b> '
						.  '<br /><br /><b>Kui sa uuendad vanemalt versioonilt kui 3.0.0</b>, ja oled selle parameetri salvestanud, <u>siis mine kommentaaride haldamise lehele (Manage Comments) ja kasuta tähekodeeringu muutmist (Convert To LCharset)</u> et muuta juba olemasolevate kommentaaride tähekodeeringut.'
        				.  '<br />Kui sa kasutad ajax režiimi, siis konverteeri kõik kommentaarid.'
        				.  '<br />Kommentaarid, mis on loodud kasutades ajaxit, konverteeritakse. Need, mis on loodud ilma ajaxita, neid ei konverteerita!'
        				.  ' Sellisel juhul vali kommentaarid, mis vajavad muutmist (veidrate tähtedega kommentaarid :) !).'
        				);
/* SECTIONS_CATEGORIES */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_CAPTION', 'Välista/kaasa sektsioone:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_HELP', 'Kliki välistamiseks/kaasamiseks sektsioonidel.<br />Kasuta CTRL või SHIFT klahvi, et sektsioone valida või valikust eemaldada.');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_CAPTION', 'Välista/kaasa kategooriaid:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_HELP', 'Kliki välistamiseks/kaasamiseks kategooriatel.<br />Kasuta CTRL või SHIFT klahvi, et kategooriaid valida või valikust eemaldada.');
/* TECHNICAL */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TECHNICAL', 'Tehnilised parameetrid (ainult joomlacomment komponendi probleemide lahendamiseks, teisisõnu veatuvastus)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_CAPTION', 'Näita probleeme kasutajale:');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_HELP', 'Näita veatuvastus-infot ainult selles lahtris märgitud kasutajale.');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_CAPTION', 'xmlErrorAlert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_CAPTION', 'ajaxdebug:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_HELP', '');

/*
 * layoutPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_LAYOUT', 'Paigutus');
/* FRONTPAGE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_FRONTPAGE', '"Loe kohe" link artikli sissejuhatava teksti juures'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_CAPTION', 'Näita "Loe kohe":');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_HELP', 'Artiklite nimistus näidatakse artikli sissejuhatava teksti alla, mitu kommentaari on artiklile lisatud ja sellele klikkides saab neid lugema ja lisama minna');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_CAPTION', 'Näidata ainult siis kui "Loe kohe" on määratud menüüs:');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_HELP', 'Näidatakse linki ainult siis kui "Loe kohe" parameeter on määratud menüüst (joomla administreerimisliideses Menüüd->...). JAH on soovitatav.');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_CAPTION', 'Ära näita, kui lisainfo link on lubatud:');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_HELP', 'Ära näita, kui artiklil on link lisainfole (Readon or Title) ja kui leht on "intro only"');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_CAPTION', 'Eelvaade nähtav:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_HELP', 'Näita viimaste kommentaaride eelvaade (kui Näita "Loe kohe" on lubatud)');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_CAPTION', 'Eelvaate pikkus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_CAPTION', 'Eelvaate ridade arv:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_HELP', ''); 
/* TEMPLATES */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TEMPLATES', 'Kujundus'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_template_CAPTION', 'Standardne kujundus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_HELP', 'Kujundused annavad erineva välimuse kommentaaridele.'
				   		. '<br />Kui oled lubanud emotikonid, siis määra mitut emotikoni ühel real näidatakse. Kindlasti sõltub see ka kujunduse valikust.'
				   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_CAPTION', 'Kopeeri see kujundus muudetud kujunduse kataloogi:');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_HELP', 'Kui on märgitud, siis seadete salvestamisel valitud kujundus kopeeritakse muudetud kujunduse kataloogi kui uus "my[standard template]", mida peale seda saad muuta (vaata parameetreid allpool). Kopeerimine toimub juhul, kui samanimelist kujundust veel pole.');
JOSC_define('_JOOMLACOMMENT_ADMIN_TEMPLATE_CUSTOM_LOCATION', 'Asukoht:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_CAPTION', 'Sinu muudetud kujundus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_HELP', 'Kasuta kopeerimise parameetrit et kopeerida kujundust. Siis saad muuta nii HTML kui CSS faili (neid ei kirjutata komponendi uuendustega üle). Kui midagi ei ole valitud, kasutatakse standardset kujundust.');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_CAPTION', 'Muuda valitud kujundust:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_HELP', 'Vali JAH kui soovid muuta HTML või CSS faili. Peale valiku salvestamist avanevad 2 uut sakki.'
                   		. '<br />Valik EI lihtsustab seadete salvestamist (lihtsalt kiirem).</b>'
                   		);                   		
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_CAPTION', 'Kaasa ka Javaskript laienused:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_HELP', 'Kaasa ka Javaskript laienused, kui kasutad kujunduses efekte (JQuery, Mootools...)'
       					. '<br />Vali EI kui skriptid on juba olemas, muidu võib tekkida javaskripti vigu ja muid probleeme.'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_CAPTION', 'Tulpade arv sisestuses:');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_HELP', 'Selle parameetri muutmisega saad kommentaari tekstisisestuslahtri (text area) laiust suurendada või vähendada, et seda kujundusega sobitada.');
                   		
/* EMOTICONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_EMOTICONS', 'Emotikonid'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_CAPTION', 'Emotikonide lubamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_HELP', 'Kas lubada emotikone kommentaaris?');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_CAPTION', 'Emotikonide pakett:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_CAPTION', 'Ühel real olevate emotikonide arv:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_HELP', 'Ühel real näidatavate emotikonide arv. 0 tähendab limiidi puudumist.'
        				. '<br />Teave: sisesta 12, kui kasutad kujundust järel-liidesega <i>emotop</i> (emotikonid on üleval) ja 2 või 3 teiste kujundustega (enamasti on siis emotikonid vasakul küljel). Proovi ja vaata, mis on just sinu veebilehe jaoks parim variant!'
        				);
/*
 * postingPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_POSTING', 'Postitamine');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_CAPTION', 'Ajax toetus (soovituslik):');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_HELP', 'Asünkroonne JavaSkript + XML');
/* STRUCTURE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_STRUCTURE', 'Struktuur'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_CAPTION', 'Luba üksteise sees asetsevaid (ehk seotud) kommentaare:');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_HELP', 'See seade lubab kasutajatel sisestada postitusi postituse sees.');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_CAPTION', 'Ainult moderaatorid');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_HELP', 'Kas seotud postitusi (postitust postituse sees) lubatakse ainult moderaatoritele');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_CAPTION', 'Taane (pikslites):');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_HELP', 'See seade lubab seotud teadete vahel taanet (taandrida).');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_CAPTION', 'Kommentaaride sorteerimine (kui ei ole seotud (üksteise sees asetsevad) kommentaarid):');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_FIRST', 'Uued postitused ees');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_LAST', 'Uued postitused lõpus');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_HELP', 'Kommentaaride järjestus : kasutatakse kui seotud kommentaarid pole sisse lülitatud.<br /> Kui uued postitused on üleval, siis kommentaaride sisestamise vorm on üleval, vastasel juhul on see all.');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_CAPTION', 'Kommentaaride arv lehel:');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_HELP', 'Määrab mitut kommentaari artikli all näidatakse. Väärtuse 0 korral näidatakse kõiki.');
/* POSTING */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_POSTING', 'Postitamine'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_CAPTION', 'Kodulehe aadressi väli:');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_HELP', 'Kas kasutaja saab sisestada oma kodulehe aadressi.');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_CAPTION', 'UBB koodi tugi:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_HELP', 'Kas lubada UBB koodi kasutamist?');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_CAPTION', 'Piltide tugi:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_HELP', 'Kas lubada piltide kasutamist kommentaarides?');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_CAPTION', 'Pildi maksimaalne laius:');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_HELP', 'Pildi maksimaalne laius pikslites');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_CAPTION', 'Hääletuse lubamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_HELP', 'JAH korral lülitatakse sisse ajax režiim ja näidatakse kommentaari kõrval pildikesed hääletamiseks. Anda saab kas + või - hääle.');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_CAPTION', 'Kasuta nimesid :');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_HELP', 'Kasuta nimesid kasutajanimede asemel (käib registreerunud kasutajate kohta)');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_CAPTION', 'Luba profiile:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_HELP', "Kas lubatakse kasutada <a href='http://www.joomlapolis.com/' target='_blank'>Community Builderi</a> - profiile kommentaarides?");
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_CAPTION', 'Luba avatarid:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_HELP', "Kas lubatakse kasutada <a href='http://www.joomlapolis.com/' target='_blank'>Community Builderi</a> - avatare kommentaarides? Toimib ainult siis, kui profiilid on lubatud (vt eelmist seadet).");
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_CAPTION', 'Kuupäeva formaat:');
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_HELP', 'Kuupäeva süntaks peaks olema sama mis PHP date() funktsioonil.');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_CAPTION', 'Keela otsingunupp:');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_HELP', 'Otsingunupu keelamine.');
/* IP ADDRESS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_IP_ADDRESS', 'IP Aadress'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_CAPTION', 'IP Aadress nähtav:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_HELP', 'Selle seadega näidatakse registreerumata kasutajatel IP aadressi ja registreeritud kasutajatel kasutajatüüpi.');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_CAPTION', 'Kasutajatüübid:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_HELP', 'Valitud peab olema vähemalt üks kasutajatüüp.'
							. '<br />Kui "IP Aadress nähtav" seade on valitud JAH : näidatakse ainult valitud kasutajatüüpi kuuluvate kasutajate kommentaaride juures (soovitatav valida kõik).'
							. '<br />Kui "IP Aadress nähtav" seade on valitud EI : näidatakse ainult valitud kasutajatüüpide juures'
							);
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_CAPTION', 'Osaline IP aadress:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_HELP', 'Selle seade korral ei näidata registreerumata kasutajate IP aadressi viimast numbriosa');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_CAPTION', 'Selgitus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_HELP', 'IP aadressi ees näidatav kirjeldus');
/*
 * securityPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_SECURITY', 'Turvalisus'); 
/* BASICS SETTINGS */  
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_CAPTION', 'Ainult registreerunud kasutajad:');
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_HELP', 'Ainult registreerunud kasutajad saavad sisestada kommentaare.');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_CAPTION', 'Kommentaaride automaatne avalikustamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_HELP', 'Kui on valitud "EI", siis kommentaarid lisatakse andmebaasi ja ootavad modereerimist.');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_CAPTION', 'Bännimine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_HELP', 'Sisesta keelatud IP aadressid eraldades need komadega.');
/* NOTIFICATIONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_NOTIFICATIONS', 'Teavitamine'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_CAPTION', 'Teavita administraatorit (ENAM MITTE KASUTADA):');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_HELP', 'ENAM MITTE KASUTADA - palun kasutada moderaatori teavitamise seadet allpool');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_CAPTION', 'Admin\'i e-posti aadress:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_HELP', 'Sisesta e-posti aadress, millele teavitus saata.');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_CAPTION', 'Moderaatorite teavitamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_HELP', 'Kas teavitada moderaatoreid uuest kommentaarist?');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_CAPTION', 'Moderaatorite grupp:');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_HELP', 'Moderaatorid saavad muuta ja kustutada kõiki kommentaare. Selleks avaneb neile spetsiaalne aken.');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_CAPTION', 'Kasutajate teavitamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_HELP', 'E-posti ja teavitamise väljasid näidatakse kommentaari kõrval. Kui teavitus on märgitud JAH, saavad kasutajad teavet uue kommentaari postituse kohta teemas millesse kasutaja kommentaari on jätnud.');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_CAPTION', 'Lubada uudisvoog (RSS):');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_HELP', '');
/* OVERFLOW */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_OVERFLOW', 'Piirangud'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_CAPTION', 'Postituse maksimaalne pikkus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_HELP', 'Maksimaalne lubatud tähtede arv postituses (-1 korral piirangut pole)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_CAPTION', 'Maksimaalne rea pikkus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_HELP', 'Maksimaalne lubatud tähtede arv real (-1 korral piirangut pole)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_CAPTION', 'Maksimaalne sõna pikkus:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_HELP', 'Maksimaalne lubatud tähtede arv ühes sõnas (-1 korral piirangut pole)');
/* ANTI-SPAM */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CAPTCHA', 'Spämmi tõrjumine'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_CAPTION', 'Kinnituskoodi küsimine (soovitatav):');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_HELP', 'Kasutaja peab sisestama kinnituskoodi sümbolite jada. Selle koodi kasutamisega tõkestakse automatiseeritud kommentaaride lisamist spämmirobotite poolt.');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_CAPTION', 'Kinnituskoodi küsimitakse järgmistelt kasutajatüüpidelt:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_HELP', 'Kinnistuskoodi küsimist rakendatakse järgmistele siin loetelus märgitud kasutajatüüpidele.');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_CAPTION', 'Kodulehe aadressi näitamine:');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_HELP', 'Postituse ehk kommentaari kirjutaja poolt sisestatud kodulehe aadress näidatakse ainult registreerunud kasutajatele, kui nad on sisse loginud');
/* CENSORSHIP */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CENSORSHIP', 'Tsenseerimine'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_CAPTION', 'Lubada:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_HELP', 'Tsenseerimisreeglite kasutamine või mitte kasutamine. Tsenseeritud sõnad kas asendatakse või peidetakse.');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_CAPTION', 'Tõstutundlik (suured ja väikesed tähed):');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_HELP', 'Kas suured ja väikesed tähed tsenseeritavates sõnades on olulised? Kui valida EI, siis suurtel ja väikestel tähtedel sõnades vahet ei tehta');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_CAPTION', 'Tsenseeritud sõnad:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_HELP', false); /* colspan */
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_CAPTION', 'Kasutajatüübid:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_HELP', 'Tsenseerimist rakendatakse ainult siin valitud kasutajatüüpidele.');


/* MODIFIED IN 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_SECTIONS_CATEGORIES', 'Id-de, sektsioonide ja kategooriate seaded'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_CAPTION', 'Välista/kaasa :');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_HELP', 'Kui on valitud KAASA, siis lubatakse kommentaare nendele teemadele millede ID-d on loetellu lisatud kas <u>teemades <b>või</b> valitud sektsioonides <b>või</b> valitud kategooriates.</u>'
													.'<br />Kui on VÄLISTA, siis keelatakse kommenteerimine nendele teemadele millede ID-d on loetellu lisatud kas <u>teemades <b>või</b> valitud sektsioonides <b>või</b> valitud kategooriates.</u>');

JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CONTENT_ITEM', 'Teemad ID-de järgi (enam mitte kasutada)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_CAPTION', 'Välistatud teemad (enam mitte kasutada):');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_HELP', 'ENAM MITTE KASUTADA - Kasuta ID-de parameetreid eelmises lõigus');

/* ADDED SINCE 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_CAPTION', 'Välista/kaasa teemasid:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_HELP', 'See väli on mõeldud teatud teemade kas kaasamiseks või välistamiseks ID-de järgi. <u>Formaat</u>: ID-de loetelu peab olema eraldatud komaga ega tohi sisaldada tühikuid.');
JOSC_define('_JOOMLACOMMENT_ADMIN_INCLUDE', 'Kaasa');
JOSC_define('_JOOMLACOMMENT_ADMIN_EXCLUDE', 'Välista');

/* ADDED SINCE 3.25 */
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_importtable', 'Imporditud'); 

?>
