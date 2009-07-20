<?php

/* ***************************************************
 * *********** M A N A G E   C O M M E N T S *********
 * ***************************************************
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_CONFIRM_NOTIFY', '要发送通知吗 ?\n[取消 = 不通知]');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_SENT_TO', '通知发送给 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_NOT_SENT', '通知没有发出');

JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_id', 'Id');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_writer', '作者');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_userid', '用户 ID');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_notify', '通知');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_url', '网址');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_date', '日期');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_comment', '评论 <br />(链接和图片已禁用)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_contentitem', '文章');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_published', '已发布 (通知作者)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_delete', '删除 (通知作者)');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_ip', 'IP');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingyes', '允许评分');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingno', '禁用评分');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_parentid', '上层 Id');



/* ***************************************************
 * *************** S E T T I N G *********************
 * ***************************************************
 */
/*
 * common
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_NAME', '名称 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_COMPONENT', '组件 : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_BASIC_SETTINGS', '基础设定');
/*
 * generalPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_GENERAL_PAGE', '常规');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_CAPTION', '完全卸载模式:');
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_HELP', '卸载时同时删除数据表。如果你还想要继续使用 !joomlacomment 组件，就不要启用此项.');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_CAPTION', '文章触发器函数:');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_HELP', '<b>只提供专家级用户使用 !</b> 如果您曾经 <b>修改了</b> 核心文件的 html (例如: 先显示 read only 函数)，那么你可以在这里更改 joscomment 触发器的函数.');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_CAPTION', '前台语言:');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_HELP', '如果选择自动探测 : 将采用网站的 mosConfigLanguage 参数指定的语言');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_CAPTION', '后台语言:');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_HELP', '如果选择自动探测 : 将采用网站的 mosConfigLanguage 参数指定的语言');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_CAPTION', '网站字符编码 :<br />如果您是从 3.0.0 以前的旧版升级, 请仔细阅读右侧的说明 !');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPnoiconv', '不要使用 !! 您的服务器上没有 php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a><u/> .  <b>如果您的 Joomla 既没有使用 utf-8 编码，也没有使用 iso-8859-1 编码，请与网站管理员联系，或者禁用本组件的 ajax 支持参数。</b>');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPiconv', '您的服务器上有 Php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a>.'
	                    .  '<br /><b>如果您的 joomla 没有用 utf-8 编码，请输入您所用的字符编码。 <br /> <a href="http://www.gnu.org/software/libiconv/" target="_blank">点击此处</a> 检查一下是否被 inconv library 支持! 否则，请与本组件作者联系。</b> '
						.  '<br /><br /><b>如果您是从 3.0.0 以前的版本升级本组件</b>, 当您保存本设定之后, <u>请到“评论管理”页面使用“转换为 LCharset”</u> 功能来转换相关的评论。'
        				.  '<br />如果您一直在用 ajax 模式, 就需要转换每一条评论.'
        				.  '<br />如果您更改过设定, 一些评论 (由 ajax 所创建的) 需要转换，另一些评论(禁用 ajax 时创建的) 就不需要转换。'
        				.  ' 在这种情况下, 只需要选择有问题(可能显示奇怪字符)的评论即可.'
        				);
/* SECTIONS_CATEGORIES */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_CAPTION', '除外/包括 单元:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_HELP', '鼠标点击来选择单元。<br />同时按下 CTRL 或 SHIFT 键来选择或者取消选择。');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_CAPTION', '除外/包括 类别:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_HELP', '鼠标点击来选择类别。<br />同时按下 CTRL 或 SHIFT 键来选择或者取消选择。');
/* TECHNICAL */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TECHNICAL', '技术参数 (仅用于 joomlacomment 除错)');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_CAPTION', '向这些用户显示错误消息:');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_HELP', '仅向这些用户显示出错消息.');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_CAPTION', 'xmlErrorAlert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_CAPTION', 'ajaxdebug:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_HELP', '');

/*
 * layoutPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_LAYOUT', '外观');
/* FRONTPAGE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_FRONTPAGE', '简介文字时的“阅读全文”链接');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_CAPTION', '显示 "阅读全文":');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_HELP', '如果文章是在“简介”模式下显示(首页, blog 视图...), 将为该文章显示一个“发表评论”的链接，同时附上已有的评论数量。');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_CAPTION', '仅当菜单参数中启用了“阅读全文”:');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_HELP', '仅当所调用的菜单链接参数(在 joomla 后台的“菜单管理”中)中启用了“阅读全文”才显示。推荐选“是”.');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_CAPTION', '如果有全文链接就不显示:');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_HELP', '如果文章有全文链接(“阅读全文”或者链接标题) 同时页面上只显示简介文字，就不显示。');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_CAPTION', '可预览:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_HELP', '显示最后一条评论的预览(如果启用了 显示 "阅读全文" )');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_CAPTION', '预览长度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_CAPTION', '预览行数:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_HELP', '');
/* TEMPLATES */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TEMPLATES', '模板');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_CAPTION', '标准模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_HELP', '模板可以给评论以不同的外观.'
				   		. '<br />如果您启用了表情图案，请按照模板风格来设定每行显示的表情图案数量(在下面)。'
				   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_CAPTION', '复制当前的标准模板到自定义模板目录:');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_HELP', '如果选择, 当保存设定时, 所选的标准模板将被复制到自定义目录，成为新的 "my[standard template]" 模板，您就可以用来修改(看下面的参数). 如果目标目录已存在该模板，就不会复制。');
JOSC_define('_JOOMLACOMMENT_ADMIN_TEMPLATE_CUSTOM_LOCATION', '位置:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_CAPTION', '您的自定义模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_HELP', '使用复制参数来复制标准模板。然后您就可以修改 HTML 或 CSS (在下次升级之前不会被忽略). 如果没有选择任何一个，将使用标准模板。');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_CAPTION', '修改当前自定义模板:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_HELP', '选择“是”如果您希望修改当前自定义模板的 HTML 或 CSS 样式。保存设定后将出现两个新的标签页。'
                   		. '<br />选择“否”将使保存设定很容易(速度快多了).</b>'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_CAPTION', '包含 javascript 库:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_HELP', '当使用带有特效(JQuery, Mootools...)的模板时包含 javascript 库。'
       					. '<br />如果已经包含了库，就选择“否”。否则，您就会遇到 javascript 错误及问题。'
                   		);
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_CAPTION', '输入框的宽度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_HELP', '您可以根据您网站的页面宽度来在这里增加或者减小评论输入框的宽度。');

/* EMOTICONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_EMOTICONS', '表情图案');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_CAPTION', '启用表情图案 (smilies) :');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_HELP', '是否允许在评论中使用表情图案 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_CAPTION', '表情图案库:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_CAPTION', '每行显示的表情图案数量:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_HELP', '每行显示的表情图案数量。 数字 0 表示没有限制.'
        				. '<br />建议: 为 <i>emotop</i> 模板(表情图案显示在顶部)使用 12；为其它模板使用 2 或 3 (表情图案显示在左侧). 多试几次就知道哪种方案最适合您的网站 !'
        				);
/*
 * postingPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_POSTING', '撰写');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_CAPTION', '启用 Ajax (推荐):');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_HELP', 'Asynchronous JavaScript + XML');
/* STRUCTURE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_STRUCTURE', '结构');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_CAPTION', '允许评论嵌套:');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_HELP', '此功能允许用户对已发表的评论(不只是针对最后一条)进行回应，并且以缩进的形式来显示。');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_CAPTION', '仅限管理人员');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_HELP', '仅允许管理人员回应');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_CAPTION', '缩进 (像素):');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_HELP', '如果以树形外观展示，回应的评论缩进多少.');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_CAPTION', '评论排序 (如果不启用评论嵌套的话):');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_FIRST', '新的在前');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_LAST', '新的在后');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_HELP', '评论的显示顺序: 只有在不启用评论嵌套参数的情况下才能使用这个设定。<br /> 如果选择“新的在前”，则评论撰写表单将显示在顶部；否则表单将显示在底部。');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_CAPTION', '每页显示的评论数量:');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_HELP', '每页显示的评论数量');
/* POSTING */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_POSTING', '撰写');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_CAPTION', '允许输入网站:');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_HELP', '允许评论者输入自己的网站链接.');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_CAPTION', '启用 UBB code:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_HELP', '允许使用 UBB Codes ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_CAPTION', '允许插入图像:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_HELP', '允许在评论中插入图像 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_CAPTION', '图像最大宽度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_HELP', '最大宽度，单位：像素');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_CAPTION', '允许评分:');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_HELP', '如果启用，并且启用了 ajax 模式 : 将显示可点击的图像以便对任何评论进行 + 或 - 的评分。');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_CAPTION', '使用真实姓名 :');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_HELP', '使用真实姓名而不是用户名(只与注册会员有关)');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_CAPTION', '启用个人资料:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_HELP', "允许在评论中使用 <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - 个人资料?");
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_CAPTION', '启用头像:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_HELP', "允许在评论中使用 <a href='http://www.joomlapolis.com/' target='_blank'>Community Builder</a> - 头像 ? (只有启用个人资料后此项才有效)");
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_CAPTION', '日期格式:');
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_HELP', '此处语法与 PHP 的 date() 函数相同.');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_CAPTION', '隐藏搜索按钮:');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_HELP', '隐藏搜索按钮.');
/* IP ADDRESS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_IP_ADDRESS', 'IP 地址');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_CAPTION', '可见:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_HELP', '如果选择, 将显示未注册游客或者下面“用户类型”中选择的注册会员的 IP 地址.');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_CAPTION', '用户类型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_HELP', '至少必须选择一种用户类型.'
							. '<br />"IP 可见" 已启用 : 将只显示所选用户类型的用户的 IP 地址(推荐全选).'
							. '<br />"IP 可见" 未启用 : 将只显示所选用户类型'
							);
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_CAPTION', '部分显示:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_HELP', '如果选择, 将不显示未注册游客的 IP 地址的最后一位数字。');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_CAPTION', '说明文字:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_HELP', '显示在 IP 数值之前的说明文字');
/*
 * securityPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_SECURITY', '安全');
/* BASICS SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_CAPTION', '仅限注册会员:');
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_HELP', '只允许注册会员发表评论。');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_CAPTION', '自动发表评论:');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_HELP', '如果选“否”，则评论提交后先保存在数据库中，在管理员审核并批准后才能显示出来。');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_CAPTION', '屏蔽列表:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_HELP', '多个 IP 地址请用英文逗号分隔。');
/* NOTIFICATIONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_NOTIFICATIONS', '通知');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_CAPTION', '通知管理员(不要使用):');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_HELP', '不要使用 - 请使用“通知管理人员”参数');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_CAPTION', '管理员 email:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_HELP', '通知邮件发送到哪个 email 地址?');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_CAPTION', '通知管理人员:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_HELP', '当有新评论发表时通知管理人员 ?');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_CAPTION', '管理人员群组:');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_HELP', '管理人员可以修改或者删除任何评论。每一条评论上将为他们展示一个特殊的管理菜单。');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_CAPTION', '通知用户:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_HELP', '如果同意，将显示 Email 及 通知 字段，当有新的评论发表时，用户也能收到通知。');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_CAPTION', '启用评论 feed (RSS):');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_HELP', '');
/* OVERFLOW */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_OVERFLOW', '排版');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_CAPTION', '评论最大长度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_HELP', '每条评论允许的最大字符数量 (-1 表示没有限制.)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_CAPTION', '每一行最多允许多少字符:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_HELP', '每一行最多允许多少字符 (-1 表示没有限制.)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_CAPTION', '单词最大长度:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_HELP', '单个词汇最多允许多少个字符(-1 表示没有限制。)');
/* ANTI-SPAM */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CAPTCHA', '反垃圾)');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_CAPTION', '启用图片验证码 (推荐):');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_HELP', '将要求用户输入一个图片上显示的随机字符串。这将阻止外部程序自动向您的网站提交信息。');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_CAPTION', '启用验证码的用户类型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_HELP', '只有所选的用户类型必须输入验证码。');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_CAPTION', '只允许注册会员填写网站 URL:');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_HELP', '在撰写评论时，只允许注册会员输入自己的网站链接并显示出来。');
/* CENSORSHIP */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CENSORSHIP', '脏字过滤');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_CAPTION', '启用:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_HELP', '是否启用敏感词语过滤机制？如果启用，将使用下面“要屏蔽的字词”中所定义的规则来隐藏或者替换那些词汇。');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_CAPTION', '区分大小写:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_CAPTION', '要屏蔽的字词:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_HELP', false); /* colspan */
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_CAPTION', '用户类型:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_HELP', '仅适用于所选的用户类型.');




/* MODIFIED IN 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_SECTIONS_CATEGORIES', '文章, 单元 及 类别 标准');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_CAPTION', '除外/包含 :');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_HELP', '如果选择包含, 将允许向这些文章发表评论： <u>所选文章 ID<b> 或者 </b> 所选单元 <b>或者</b> 所选类别.</u>'
													.'<br />如果选择除外, 将不允许向这些文章发表评论： <u>所选文章 ID<b> 或者 </b> 所选单元 <b>或者</b> 所选类别.</u>');

JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CONTENT_ITEM', '文章 id 列表(不要使用)');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_CAPTION', '除外的文章列表(不要使用):');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_HELP', '不要使用 - 请使用前一个部分的参数 Id');

/* ADDED SINCE 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_CAPTION', '除外/包含 的文章 Id:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_HELP', '您可以在这里 除外/包含 文章 Id. <u>格式</u>: 多个 ID 用英文逗号分隔。不能有空格。');
JOSC_define('_JOOMLACOMMENT_ADMIN_INCLUDE', '包括');
JOSC_define('_JOOMLACOMMENT_ADMIN_EXCLUDE', '除外');

/* ADDED SINCE 3.25 */
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_importtable', '导入自');

?>
