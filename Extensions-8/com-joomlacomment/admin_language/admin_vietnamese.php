<?php
/* ***************************************************
 * Vietnamese Language backend for Joomcomment 3.2.6
 * Author: KhacVinh Pham
 * E-mail: khacvinhp@gmail.com
 * URL   : http://donganhol.com
 * ***************************************************
 */


/* ***************************************************
 * *********** M A N A G E   C O M M E N T S *********
 * ***************************************************
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_CONFIRM_NOTIFY', 'Bạn có muốn gửi thông báo ?\n[CANCEL = không thông báo]');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_SENT_TO', 'Thông báo đã được gửi tới : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_NOTIFY_NOT_SENT', 'Thông báo không được gửi');

JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_id', 'Id');
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_writer', 'Người viết'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_userid', 'Userid'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_notify', 'Thông báo'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_url', 'Website'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_date', 'Ngày'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_comment', 'Nội dung (không bao gồm hình ảnh)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_contentitem', 'Bài viết'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_published', 'Hiển thị? (thông báo tác giả)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_delete', 'Xóa (thông báo tác giả)'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_ip', 'IP'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingyes', 'Voting Yes'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_votingno', 'Voting No'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_parentid', 'Parent Id'); 



/* ***************************************************
 * *************** S E T T I N G *********************
 * ***************************************************
 */
/*
 * common
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_NAME', 'Tên : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_SETTING_LINE_COMPONENT', 'Thành phần : ');
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_BASIC_SETTINGS', 'Cài đặt cơ bản'); 
/*
 * generalPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_GENERAL_PAGE', 'Tổng quan'); 
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_CAPTION', 'Gỡ bỏ hoàn toàn:'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_complete_uninstall_HELP', 'Gỡ bỏ hoàn toàn các tệp tin và bảng trong cơ sở dữ liệu, không nên kích hoạt chế độ này nếu bạn không thực sự nắm rõ hệ thống'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_CAPTION', 'Mambot content function:');
JOSC_define('_JOOMLACOMMENT_ADMIN_mambot_func_HELP', '<u>Lưu ý!</u> Không thay đổi mục này nếu bạn không nắm rõ cơ chế hoạt động của hệ thống');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_CAPTION', 'Ngôn ngữ trang chủ:');
JOSC_define('_JOOMLACOMMENT_ADMIN_language_HELP', 'Nếu tự động sẽ sử dụng ngôn ngữ mặc định của trang chủ');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_CAPTION', 'Ngôn ngữ trang quản lí:');
JOSC_define('_JOOMLACOMMENT_ADMIN_admin_language_HELP', 'Nếu tự động sẽ sử dụng ngôn ngữ mặc định của trang quản lí');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_CAPTION', 'Bảng mã :');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPnoiconv', 'php <a href="http://www.php.net/manual/fr/ref.iconv.php" target="_blank">iconv library</a><u/> không được cài đặt.  <b>Nếu bạn ko sử dụng bảng mã utf-8 hoặc iso-8859-1 khi cài đặt joomla, bạn cần tắt chức năng ajax để tránh các lỗi về font chữ</b>');
JOSC_define('_JOOMLACOMMENT_ADMIN_local_charset_HELPiconv', '<b><font color=red>Thay đổi thiết lập này sẽ gây lỗi với vấn đề tiếng Việt, bạn không nên thay đổi</font></b>');
/* SECTIONS_CATEGORIES */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_CAPTION', 'Kích hoạt / Không kích hoạt nhận xét tại chủ đề:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_sections_HELP', 'Sử dụng phím Ctrl hoặc Shift để lựa chọn nhiều chủ đề');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_CAPTION', 'Kích hoạt / Không kích hoạt nhận xét tại chủ đề con:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_categories_HELP', 'Sử dụng phím Ctrl hoặc Shift để lựa chọn nhiều chủ đề con');
/* TECHNICAL */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TECHNICAL', 'Các thông số kĩ thuật - Không nên chỉnh sửa'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_CAPTION', 'Người dùng được phép thấy lỗi:');
JOSC_define('_JOOMLACOMMENT_ADMIN_debug_username_HELP', 'Thông báo lỗi sẽ chỉ xuất hiện với người dùng này');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_CAPTION', 'xmlErrorAlert:');
JOSC_define('_JOOMLACOMMENT_ADMIN_xmlerroralert_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_CAPTION', 'ajaxdebug:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajaxdebug_HELP', '');

/*
 * layoutPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_LAYOUT', 'Hiển thị');
/* FRONTPAGE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_FRONTPAGE', 'Hiển thị trên đoạn văn giới thiệu'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_CAPTION', 'Hiển thị nút "Nhận xét":');
JOSC_define('_JOOMLACOMMENT_ADMIN_show_readon_HELP', 'Hiện nút "Viết nhận xét" trong đoạn văn giới thiệu của bài viết');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_CAPTION', 'Hiển thị nếu được cài đặt trong Menu:');
JOSC_define('_JOOMLACOMMENT_ADMIN_menu_readon_HELP', '&nbsp;');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_CAPTION', 'Không hiển thị nếu bài viết chỉ có đoạn giới thiệu:');
JOSC_define('_JOOMLACOMMENT_ADMIN_intro_only_HELP', '&nbsp;');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_CAPTION', 'Xem trước:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_visible_HELP', 'Hiển thị xem trước của nhận xét cuối');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_CAPTION', 'Độ dài xem trước:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_length_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_CAPTION', 'Số dòng xem trước:');
JOSC_define('_JOOMLACOMMENT_ADMIN_preview_lines_HELP', ''); 
/* TEMPLATES */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_TEMPLATES', 'Giao diện'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_template_CAPTION', 'Giao diện chuẩn:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_HELP', 'Lựa chọn kiểu hiển thị của khung nhận xét');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_CAPTION', 'Sao chép giao diện hiện tại sang thư mục cá nhân:');
JOSC_define('_JOOMLACOMMENT_ADMIN_copy_template_HELP', 'Copy giao diện hiện tại vào thư mục cá nhân để bạn có thể dễ dàng chỉnh sửa lại giao diện theo ý thích của mình');
JOSC_define('_JOOMLACOMMENT_ADMIN_TEMPLATE_CUSTOM_LOCATION', 'Đường dẫn:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_CAPTION', 'Thư mục cá nhân:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_custom_HELP', 'Copy giao diện hiện tại vào thư mục cá nhân để bạn có thể dễ dàng chỉnh sửa lại giao diện theo ý thích của mình. Thư mục này sẽ ko bị xóa đi khi nâng cấp hay gỡ bỏ');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_CAPTION', 'Chỉnh sửa giao diện cá nhân:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_modify_HELP', 'Nếu bạn muốn chỉnh sửa giao diện cá nhân của mình, chọn Yes và 2 tab mới sẽ xuất hiện để bạn có thể dễ dàng chỉnh lại mã nguồn HTML và CSS, tuy nhiên chúng tôi khuyến cáo bạn không nên dùng chức năng này mà sử dụng 1 chương trình thiết kế chuyên nghiệp để chỉnh sửa');                   		
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_CAPTION', 'Kèm các thư viện javascript:');
JOSC_define('_JOOMLACOMMENT_ADMIN_template_library_HELP', 'Chúng tôi khuyến cáo không nên tắt chức năng này, nếu không có thể gặp rắc rối trong quá trình xử lí các script');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_CAPTION', 'Số cột của khung viết:');
JOSC_define('_JOOMLACOMMENT_ADMIN_form_area_cols_HELP', 'Chiều rộng của khung viết nhận xét, chỉnh sửa nó cho phù hợp với chiều rộng website của bạn');
                   		
/* EMOTICONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_EMOTICONS', 'Mặt cười'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_CAPTION', 'Hỗ trợ mặt cười:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_emoticons_HELP', 'Cho phép sử dụng mặt cười?');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_CAPTION', 'Gói hình mặt cười:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_pack_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_CAPTION', 'Số hình trên 1 dòng:');
JOSC_define('_JOOMLACOMMENT_ADMIN_emoticon_wcount_HELP', '');
/*
 * postingPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_POSTING', 'Bài viết');
/* BASIC_SETTINGS */
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_CAPTION', 'Bật Ajax (nên bật):');
JOSC_define('_JOOMLACOMMENT_ADMIN_ajax_HELP', '');
/* STRUCTURE */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_STRUCTURE', 'Cấu trúc'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_CAPTION', 'Cho phép nhận xét đặc biêt:');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_HELP', 'This will allow users to insert post in response to any post of the content item (not only the last), with an indent display.');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_CAPTION', 'Chỉ dành cho quản trị');
JOSC_define('_JOOMLACOMMENT_ADMIN_mlink_post_HELP', 'Chỉ quản trị mới được quyền nhận xét');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_CAPTION', 'Indent (pixels):');
JOSC_define('_JOOMLACOMMENT_ADMIN_tree_indent_HELP', 'This is used to indent messages in threaded view.');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_CAPTION', 'Sắp xếp nhận xét:');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_FIRST', 'Nhận xét mới trên cùng');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_VALUE_LAST', 'Nhận xét mới dưới cùng');
JOSC_define('_JOOMLACOMMENT_ADMIN_sort_downward_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_CAPTION', 'Số lượng nhận xét trên 1 trang:');
JOSC_define('_JOOMLACOMMENT_ADMIN_display_num_HELP', '');
/* POSTING */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_POSTING', 'Viết nhận xét'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_CAPTION', 'Nhập website:');
JOSC_define('_JOOMLACOMMENT_ADMIN_enter_website_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_CAPTION', 'UBB code:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_UBBcode_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_CAPTION', 'Hỗ trợ hình ảnh:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_pictures_HELP', 'Cho phép chèn hình ảnh?');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_CAPTION', 'Chiều cao ảnh tối đa:');
JOSC_define('_JOOMLACOMMENT_ADMIN_pictures_maxwidth_HELP', 'Chiều rộng ảnh tối đa');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_CAPTION', 'Bình chọn:');
JOSC_define('_JOOMLACOMMENT_ADMIN_voting_visible_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_CAPTION', 'Sử dụng username :');
JOSC_define('_JOOMLACOMMENT_ADMIN_use_name_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_CAPTION', 'Bật bồ sơ:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_profiles_HELP', "");
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_CAPTION', 'Bật avatar:');
JOSC_define('_JOOMLACOMMENT_ADMIN_support_avatars_HELP', "");
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_CAPTION', 'Định dạng ngày tháng:');
JOSC_define('_JOOMLACOMMENT_ADMIN_date_format_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_CAPTION', 'Tắt nút tìm kiếm:');
JOSC_define('_JOOMLACOMMENT_ADMIN_no_search_HELP', '');
/* IP ADDRESS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_IP_ADDRESS', 'Địa chỉ IP'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_CAPTION', 'Hiển thị IP:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_visible_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_CAPTION', 'Nhóm thành viên:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_usertypes_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_CAPTION', 'Bảo mật:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_partial_HELP', 'Sẽ không hiển thị số cuối trong dãy IP');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_CAPTION', 'Nhãn:');
JOSC_define('_JOOMLACOMMENT_ADMIN_IP_caption_HELP', 'Mô tả trước khi hiển thị IP');
/*
 * securityPage
 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TAB_SECURITY', 'Bảo mật'); 
/* BASICS SETTINGS */  
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_CAPTION', 'Thành viên:');
JOSC_define('_JOOMLACOMMENT_ADMIN_only_registered_HELP', 'Chỉ thành viên đã đăng nhập mới được quyền viết nhận xét');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_CAPTION', 'Tự động kích hoạt:');
JOSC_define('_JOOMLACOMMENT_ADMIN_autopublish_HELP', 'Nếu không bật chức năng này, nhận xét sẽ được lưu lại và chờ kiểm duyệt trước khi dc hiển thị');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_CAPTION', 'Ban IP:');
JOSC_define('_JOOMLACOMMENT_ADMIN_ban_HELP', '');
/* NOTIFICATIONS */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_NOTIFICATIONS', 'Thông báo'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_CAPTION', 'Thông báo tới Admin:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_admin_HELP', 'không nên dùng');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_CAPTION', 'Admin\'s email:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_email_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_CAPTION', 'Thông báo tới quản trị:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_moderator_HELP', 'Thông báo tới quản trị khi có nhận xét mới?');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_CAPTION', 'Nhóm quản trị:');
JOSC_define('_JOOMLACOMMENT_ADMIN_moderator_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_CAPTION', 'Thông báo tới người dùng:');
JOSC_define('_JOOMLACOMMENT_ADMIN_notify_users_HELP', 'Thông báo tới người dùng nếu có nhận xét mới (nếu người dùng lựa chọn chức năng thông báo)');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_CAPTION', 'Bật RSS:');
JOSC_define('_JOOMLACOMMENT_ADMIN_rss_HELP', '');
/* OVERFLOW */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_OVERFLOW', 'Cài đặt khác'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_CAPTION', 'Độ dài tối đa:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_text_HELP', 'Độ dài tối đa của nhận xét (-1 là không giới hạn)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_CAPTION', 'Số dòng tối đa:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_line_HELP', 'Số dòng tối đa của nhận xét (-1 là không giới hạn)');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_CAPTION', 'Số kí tự tối đa trong 1 từ:');
JOSC_define('_JOOMLACOMMENT_ADMIN_maxlength_word_HELP', 'Số kí tự tối đa trong 1 từ (-1 là không giới hạn)');
/* ANTI-SPAM */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CAPTCHA', 'Ngăn chặn spam'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_CAPTION', 'Bật mã bảo vệ:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_CAPTION', 'Nhóm người dùng:');
JOSC_define('_JOOMLACOMMENT_ADMIN_captcha_usertypes_HELP', 'Mã bảo vệ sẽ được áp dụng đối với nhóm được chọn');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_CAPTION', 'Địa chỉ website đối với thành viên đăng nhập');
JOSC_define('_JOOMLACOMMENT_ADMIN_website_registered_HELP', 'Chỉ thành viên đăng nhập mới được quyền thêm địa chỉ website khi viết nhận xét');
/* CENSORSHIP */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CENSORSHIP', 'Lọc từ'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_CAPTION', 'Bật lọc từ:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_enable_HELP', 'Lọc những từ ngữ nhạy cảm, thô tục trên các bài nhận xét của thành viên');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_CAPTION', 'Case sensitive:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_case_sensitive_HELP', '');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_CAPTION', 'Các từ cần lọc');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_words_HELP', false); /* colspan */
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_CAPTION', 'Nhóm thành viên:');
JOSC_define('_JOOMLACOMMENT_ADMIN_censorship_usertypes_HELP', 'Chỉ áp dụng lọc từ với nhóm thành viên được chọn');




/* MODIFIED IN 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_SECTIONS_CATEGORIES', 'Kích hoạt / Không kích hoạt nhận xét'); 
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_CAPTION', 'Kích hoạt/Không kích hoạt :');
JOSC_define('_JOOMLACOMMENT_ADMIN_include_sc_HELP', 'Nếu lựa chọn kích hoạt, nhận xét sẽ có tác dụng trên những chủ đề, chủ đề con, hoặc bài viết mà bạn lựa chọn trong danh sách dưới đây'
													.'<br />Nếu lựa chọn không kích hoạt, nhận xét sẽ không có tác dụng trên những chủ đề, chủ đề con, hoặc bài viết mà bạn lựa chọn trong danh sách dưới đây');

JOSC_define('_JOOMLACOMMENT_ADMIN_TITLE_CONTENT_ITEM', 'Không kích hoạt bài viết qua ID '); 
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_CAPTION', 'Không kích hoạt nhận xét ở những bài viết có ID được khai báo');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentids_HELP', 'Khuyến cáo không nên dùng');

/* ADDED SINCE 3.24 */
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_CAPTION', 'Cho phép / Không cho phép nhận xét ở bài viết:');
JOSC_define('_JOOMLACOMMENT_ADMIN_exclude_contentitems_HELP', 'Sử dụng ID của bài viết, phân cách bằng dấu , và không có khoảng trắng');
JOSC_define('_JOOMLACOMMENT_ADMIN_INCLUDE', 'Kích hoạt');
JOSC_define('_JOOMLACOMMENT_ADMIN_EXCLUDE', 'Không kích hoạt');

/* ADDED SINCE 3.25 */
JOSC_define('_JOOMLACOMMENT_ADMIN_viewcom_importtable', 'Imported from'); 

?>