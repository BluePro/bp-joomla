<?php

/* ***************************************************
 * *********** M A N A G E   C O M M E N T S *********
 * ***************************************************
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_CONFIRM_NOTIFY', '要發送通知嗎 ?\n[取消 = 不通知]');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_SENT_TO', '通知發送給 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_NOT_SENT', '通知沒有發出');

JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_id', 'Id');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_writer', '作者');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_userid', '用戶 ID');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_notify', '通知');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_url', '網址');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_date', '日期');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_comment', '評論 <br />(連結和圖片已禁用)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_contentitem', '文章');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_published', '已發布 (通知作者)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_delete', '刪除 (通知作者)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_ip', 'IP');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingyes', '允許評分');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingno', '禁用評分');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_parentid', '上層 Id');



/* ***************************************************
 * *************** S E T T I N G *********************
 * ***************************************************
 */
/*
 * common
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_NAME', '名稱 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_COMPONENT', '元件 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_BASIC_SETTINGS', '基礎設定');
/*
 * generalPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_GENERAL_PAGE', '常規');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_CAPTION', '完全卸載模式:');
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_HELP', '卸載時同時刪除資料表。如果你還想要繼續使用 !joomlacomment 元件，就不要啟用此項.');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_CAPTION', '文章觸發器函數:');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_HELP', '<b>只提供專家級用戶使用 !</b> 如果您曾經 <b>修改了</b> 核心文件的 html (例如: 先顯示 read only 函數)，那么你可以在這里更改 joscomment 觸發器的函數.');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_CAPTION', '前臺語言:');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_HELP', '如果選擇自動探測 : 將采用網站的 mosConfigLanguage 參數指定的語言');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_CAPTION', '后臺語言:');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_HELP', '如果選擇自動探測 : 將采用網站的 mosConfigLanguage 參數指定的語言');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_CAPTION', '網站字符編碼 :<br />如果您是從 3.0.0 以前的舊版升級, 請仔細閱讀右側的說明 !');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPnoiconv', '不要使用 !! 您的伺服器上沒有 php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a><u/> .  <b>如果您的 Joomla 既沒有使用 utf-8 編碼，也沒有使用 iso-8859-1 編碼，請與網站管理員聯系，或者禁用本元件的 ajax 支持參數。</b>');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPiconv', '您的伺服器上有 Php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a>.'
	                    .  '<br /><b>如果您的 joomla 沒有用 utf-8 編碼，請輸入您所用的字符編碼。 <br /> <a href="http://www.gnu.org/software/libiconv/" target="_blank">點擊此處</a> 檢查一下是否被 inconv library 支持! 否則，請與本元件作者聯系。</b> '
						.  '<br /><br /><b>如果您是從 3.0.0 以前的版本升級本元件</b>, 當您儲存本設定之后, <u>請到“評論管理”頁面使用“轉換為 LCharset”</u> 功能來轉換相關的評論。'
        				.  '<br />如果您一直在用 ajax 模式, 就需要轉換每一條評論.'
        				.  '<br />如果您更改過設定, 一些評論 (由 ajax 所創建的) 需要轉換，另一些評論(禁用 ajax 時創建的) 就不需要轉換。'
        				.  ' 在這種情況下, 只需要選擇有問題(可能顯示奇怪字符)的評論即可.'
        				);
/* SECTIONS_CATEGORIES */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_CAPTION', '除外/包括 單元:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_HELP', '鼠標點擊來選擇單元。<br />同時按下 CTRL 或 SHIFT 鍵來選擇或者取消選擇。');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_CAPTION', '除外/包括 類別:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_HELP', '鼠標點擊來選擇類別。<br />同時按下 CTRL 或 SHIFT 鍵來選擇或者取消選擇。');
/* TECHNICAL */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TECHNICAL', '技術參數 (僅用于 joomlacomment 除錯)');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_CAPTION', '向這些用戶顯示錯誤消息:');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_HELP', '僅向這些用戶顯示出錯消息.');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_CAPTION', 'xmlErrorAlert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_CAPTION', 'ajaxdebug:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_HELP', '');

/*
 * layoutPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_LAYOUT', '外觀');
/* FRONTPAGE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_FRONTPAGE', '簡介文字時的“閱讀全文”連結');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_CAPTION', '顯示 "閱讀全文":');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_HELP', '如果文章是在“簡介”模式下顯示(首頁, blog 視圖...), 將為該文章顯示一個“發表評論”的連結，同時附上已有的評論數量。');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_CAPTION', '僅當菜單參數中啟用了“閱讀全文”:');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_HELP', '僅當所調用的菜單連結參數(在 joomla 后臺的“菜單管理”中)中啟用了“閱讀全文”才顯示。推薦選“是”.');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_CAPTION', '如果有全文連結就不顯示:');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_HELP', '如果文章有全文連結(“閱讀全文”或者連結標題) 同時頁面上只顯示簡介文字，就不顯示。');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_CAPTION', '可預覽:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_HELP', '顯示最后一條評論的預覽(如果啟用了 顯示 "閱讀全文" )');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_CAPTION', '預覽長度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_CAPTION', '預覽行數:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_HELP', '');
/* TEMPLATES */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TEMPLATES', '模板');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_CAPTION', '標準模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_HELP', '模板可以給評論以不同的外觀.'
				   		. '<br />如果您啟用了表情圖案，請按照模板風格來設定每行顯示的表情圖案數量(在下面)。'
				   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_CAPTION', '復制當前的標準模板到自定義模板目錄:');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_HELP', '如果選擇, 當儲存設定時, 所選的標準模板將被復制到自定義目錄，成為新的 "my[standard template]" 模板，您就可以用來修改(看下面的參數). 如果目標目錄已存在該模板，就不會復制。');
JOSC_define('_JOOMLACOMMENT_ADMIN_TEMPLATE_CUSTOM_LOCATION', '位置:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_CAPTION', '您的自定義模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_HELP', '使用復制參數來復制標準模板。然后您就可以修改 HTML 或 CSS (在下次升級之前不會被忽略). 如果沒有選擇任何一個，將使用標準模板。');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_CAPTION', '修改當前自定義模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_HELP', '選擇“是”如果您希望修改當前自定義模板的 HTML 或 CSS 樣式。儲存設定后將出現兩個新的標簽頁。'
                   		. '<br />選擇“否”將使儲存設定很容易(速度快多了).</b>'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_CAPTION', '包含 javascript 庫:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_HELP', '當使用帶有特效(JQuery, Mootools...)的模板時包含 javascript 庫。'
       					. '<br />如果已經包含了庫，就選擇“否”。否則，您就會遇到 javascript 錯誤及問題。'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_CAPTION', '輸入框的寬度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_HELP', '您可以根據您網站的頁面寬度來在這里增加或者減小評論輸入框的寬度。');

/* EMOTICONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_EMOTICONS', '表情圖案');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_CAPTION', '啟用表情圖案 (smilies) :');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_HELP', '是否允許在評論中使用表情圖案 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_CAPTION', '表情圖案庫:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_CAPTION', '每行顯示的表情圖案數量:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_HELP', '每行顯示的表情圖案數量。 數字 0 表示沒有限制.'
        				. '<br />建議: 為 <i>emotop</i> 模板(表情圖案顯示在頂部)使用 12；為其它模板使用 2 或 3 (表情圖案顯示在左側). 多試幾次就知道哪種方案最適合您的網站 !'
        				);
/*
 * postingPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_POSTING', '撰寫');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_CAPTION', '啟用 Ajax (推薦):');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_HELP', 'Asynchronous JavaScript + XML');
/* STRUCTURE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_STRUCTURE', '結構');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_CAPTION', '允許評論嵌套:');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_HELP', '此功能允許用戶對已發表的評論(不只是針對最后一條)進行回應，并且以縮進的形式來顯示。');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_CAPTION', '僅限管理人員');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_HELP', '僅允許管理人員回應');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_CAPTION', '縮進 (像素):');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_HELP', '如果以樹形外觀展示，回應的評論縮進多少.');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_CAPTION', '評論排序 (如果不啟用評論嵌套的話):');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_FIRST', '新的在前');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_LAST', '新的在后');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_HELP', '評論的顯示順序: 只有在不啟用評論嵌套參數的情況下才能使用這個設定。<br /> 如果選擇“新的在前”，則評論撰寫表單將顯示在頂部；否則表單將顯示在底部。');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_CAPTION', '每頁顯示的評論數量:');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_HELP', '每頁顯示的評論數量');
/* POSTING */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_POSTING', '撰寫');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_CAPTION', '允許輸入網站:');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_HELP', '允許評論者輸入自己的網站連結.');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_CAPTION', '啟用 UBB code:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_HELP', '允許使用 UBB Codes ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_CAPTION', '允許插入圖像:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_HELP', '允許在評論中插入圖像 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_CAPTION', '圖像最大寬度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_HELP', '最大寬度，單位：像素');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_CAPTION', '允許評分:');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_HELP', '如果啟用，并且啟用了 ajax 模式 : 將顯示可點擊的圖像以便對任何評論進行 + 或 - 的評分。');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_CAPTION', '使用真實姓名 :');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_HELP', '使用真實姓名而不是用戶名(只與注冊會員有關)');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_CAPTION', '啟用個人資料:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_HELP', "允許在評論中使用 <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - 個人資料?");
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_CAPTION', '啟用頭像:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_HELP', "允許在評論中使用 <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - 頭像 ? (只有啟用個人資料后此項才有效)");
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_CAPTION', '日期格式:');
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_HELP', '此處語法與 PHP 的 date() 函數相同.');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_CAPTION', '隱藏搜索按鈕:');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_HELP', '隱藏搜索按鈕.');
/* IP ADDRESS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_IP_ADDRESS', 'IP 位址');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_CAPTION', '可見:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_HELP', '如果選擇, 將顯示未注冊游客或者下面“用戶類型”中選擇的注冊會員的 IP 位址.');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_CAPTION', '用戶類型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_HELP', '至少必須選擇一種用戶類型.'
							. '<br />"IP 可見" 已啟用 : 將只顯示所選用戶類型的用戶的 IP 位址(推薦全選).'
							. '<br />"IP 可見" 未啟用 : 將只顯示所選用戶類型'
							);
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_CAPTION', '部分顯示:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_HELP', '如果選擇, 將不顯示未注冊游客的 IP 位址的最后一位數字。');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_CAPTION', '說明文字:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_HELP', '顯示在 IP 數值之前的說明文字');
/*
 * securityPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_SECURITY', '安全');
/* BASICS SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_CAPTION', '僅限注冊會員:');
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_HELP', '只允許注冊會員發表評論。');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_CAPTION', '自動發表評論:');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_HELP', '如果選“否”，則評論提交后先儲存在數據庫中，在管理員審核并批準后才能顯示出來。');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_CAPTION', '屏蔽列表:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_HELP', '多個 IP 位址請用英文逗號分隔。');
/* NOTIFICATIONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_NOTIFICATIONS', '通知');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_CAPTION', '通知管理員(不要使用):');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_HELP', '不要使用 - 請使用“通知管理人員”參數');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_CAPTION', '管理員 email:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_HELP', '通知郵件發送到哪個 email 位址?');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_CAPTION', '通知管理人員:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_HELP', '當有新評論發表時通知管理人員 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_CAPTION', '管理人員群組:');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_HELP', '管理人員可以修改或者刪除任何評論。每一條評論上將為他們展示一個特殊的管理菜單。');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_CAPTION', '通知用戶:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_HELP', '如果同意，將顯示 Email 及 通知 字段，當有新的評論發表時，用戶也能收到通知。');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_CAPTION', '啟用評論 feed (RSS):');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_HELP', '');
/* OVERFLOW */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_OVERFLOW', '排版');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_CAPTION', '評論最大長度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_HELP', '每條評論允許的最大字符數量 (-1 表示沒有限制.)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_CAPTION', '每一行最多允許多少字符:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_HELP', '每一行最多允許多少字符 (-1 表示沒有限制.)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_CAPTION', '單詞最大長度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_HELP', '單個詞匯最多允許多少個字符(-1 表示沒有限制。)');
/* ANTI-SPAM */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CAPTCHA', '反垃圾)');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_CAPTION', '啟用圖片驗證碼 (推薦):');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_HELP', '將要求用戶輸入一個圖片上顯示的隨機字符串。這將阻止外部程序自動向您的網站提交信息。');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_CAPTION', '啟用驗證碼的用戶類型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_HELP', '只有所選的用戶類型必須輸入驗證碼。');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_CAPTION', '只允許注冊會員填寫網站 URL:');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_HELP', '在撰寫評論時，只允許注冊會員輸入自己的網站連結并顯示出來。');
/* CENSORSHIP */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CENSORSHIP', '臟字過濾');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_CAPTION', '啟用:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_HELP', '是否啟用敏感詞語過濾機制？如果啟用，將使用下面“要屏蔽的字詞”中所定義的規則來隱藏或者替換那些詞匯。');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_CAPTION', '區分大小寫:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_CAPTION', '要屏蔽的字詞:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_HELP', false); /* colspan */
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_CAPTION', '用戶類型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_HELP', '僅適用于所選的用戶類型.');




/* MODIFIED IN 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_SECTIONS_CATEGORIES', '文章, 單元 及 類別 標準');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_CAPTION', '除外/包含 :');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_HELP', '如果選擇包含, 將允許向這些文章發表評論： <u>所選文章 ID<b> 或者 </b> 所選單元 <b>或者</b> 所選類別.</u>'
													.'<br />如果選擇除外, 將不允許向這些文章發表評論： <u>所選文章 ID<b> 或者 </b> 所選單元 <b>或者</b> 所選類別.</u>');

JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CONTENT_ITEM', '文章 id 列表(不要使用)');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_CAPTION', '除外的文章列表(不要使用):');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_HELP', '不要使用 - 請使用前一個部分的參數 Id');

/* ADDED SINCE 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_CAPTION', '除外/包含 的文章 Id:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_HELP', '您可以在這里 除外/包含 文章 Id. <u>格式</u>: 多個 ID 用英文逗號分隔。不能有空格。');
JOSC_define('_JOOMLACOMMENT_ADMIN_INCLUDE', '包括');
JOSC_define('_JOOMLACOMMENT_ADMIN_EXCLUDE', '除外');

/* ADDED SINCE 3.25 */
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_importtable', '導入自');

?>
