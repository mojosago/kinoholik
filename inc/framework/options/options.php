<?php $options = array(

// Sections
array("type" => "section","icon" => "dashicons-admin-settings","title" => __( "Configuration", "mtms" ),"id" => "general","expanded" => "true"),
#array("type" => "section","icon" => "dashicons-admin-appearance","title" => __( "Customize", "mtms" ),"id" => "custom","expanded" => "false"),
array("type" => "section","icon" => "dashicons-welcome-widgets-menus","title" => __( "Home page", "mtms" ),"id" => "home","expanded" => "false"),
#array("type" => "section","icon" => "dashicons-share-alt2","title" => __( "Social integrations", "mtms" ),"id" => "social","expanded" => "false"),
array("type" => "section","icon" => "dashicons-chart-bar","title" => __( "SEO", "mtms" ),"id" => "seo","expanded" => "false"),
array("type" => "section","icon" => "dashicons-admin-tools","title" => __( "Tools", "mtms" ),"id" => "tools","expanded" => "false"),
array("type" => "section","icon" => "dashicons-analytics","title" => __( "Advertising", "mtms" ),"id" => "ads","expanded" => "false"),

// sub sections
array("section" => "general", "type" => "heading","title" => __( "General Settings", "mtms" ),"id" => "general"),
array("section" => "general", "type" => "heading","title" => __( "TMDb API", "mtms" ),"id" => "api-config"),
array("section" => "general", "type" => "heading","title" => __( "Comments", "mtms" ),"id" => "comments"),


array("section" => "custom", "type" => "heading","title" => __( "Default style", "mtms" ),"id" => "default-style"),
array("section" => "custom", "type" => "heading","title" => __( "Dark Style", "mtms" ),"id" => "dark-style"),

array("section" => "home", "type" => "heading","title" => __( "Home modules", "mtms" ),"id" => "h-config"),
array("section" => "home", "type" => "heading","title" => __( "Module slider", "mtms" ),"id" => "m-slider"),
array("section" => "home", "type" => "heading","title" => __( "Module movies", "mtms" ),"id" => "m-movies"),
array("section" => "home", "type" => "heading","title" => __( "Module tvshows", "mtms" ),"id" => "m-tvshows"),
array("section" => "home", "type" => "heading","title" => __( "Module seasons", "mtms" ),"id" => "m-seasons"),
array("section" => "home", "type" => "heading","title" => __( "Module episodes", "mtms" ),"id" => "m-episodes"),


array("section" => "tools", "type" => "heading","title" => __( "Post links", "mtms" ),"id" => "post-links"),
array("section" => "tools", "type" => "heading","title" => __( "WP SMTP mail", "mtms" ),"id" => "wp-smtp"),
array("section" => "tools", "type" => "heading","title" => __( "User register", "mtms" ),"id" => "dt_register_user_ptr"),


array("section" => "seo", "type" => "heading","title" => __( "Basic info", "mtms" ),"id" => "seo-general"),
array("section" => "seo", "type" => "heading","title" => __( "Site verification", "mtms" ),"id" => "site-veri"),
array("section" => "seo", "type" => "heading","title" => __( "Optimizing URL Slugs", "mtms" ),"id" => "taxonomias-config"),

array("section" => "ads", "type" => "heading","title" => __( "Ad spot / home module", "mtms" ),"id" => "ads-1"),
array("section" => "ads", "type" => "heading","title" => __( "Ad spot / redirecting links", "mtms" ),"id" => "ads-2"),
array("section" => "ads", "type" => "heading","title" => __( "Ad spot / single", "mtms" ),"id" => "ads-3"),



#========================================================================


####################  ADS - Spots  ######################
#########################################################


array(
	// ads_spot_home
    "under_section" => "ads-1",
    "type" => "textarea", 
    "name" => __('Ads Home module','mtms'),  
    "id" => "ads_spot_home", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __('Use HTML code','mtms'),
	"rows" => '10',
	"code" => "[module-ads]",
    "default" => ""
),

array(
	// ads_spot_300
    "under_section" => "ads-2",
    "type" => "textarea", 
    "name" => __('Ad 300x250 pixels','mtms'),  
    "id" => "ads_spot_300", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __('Use HTML code','mtms'),
	"rows" => '10',
	"code" => "",
    "default" => ""
),
array(
	// ads_spot_468
    "under_section" => "ads-2",
    "type" => "textarea", 
    "name" => __('Ad 468x60 pixels','mtms'),  
    "id" => "ads_spot_468", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __('Use HTML code','mtms'),
	"rows" => '10',
	"code" => "",
    "default" => ""
),
array(
	// ads_spot_single
    "under_section" => "ads-3",
    "type" => "textarea", 
    "name" => __('Ad single','mtms'),  
    "id" => "ads_spot_single", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __('Use HTML code','mtms'),
	"rows" => '10',
	"code" => "",
    "default" => ""
),
array(
	// Field multi chekbox
    "under_section" => "ads-3",
    "type" => "checkbox",
    "name" => __('Display ad','mtms'),
    "id" => array("ads_ss_1", "ads_ss_2", "ads_ss_3", "ads_ss_4"), 
    "options" => array( __('филми','mtms'), __('TV Shows','mtms'), __('Seasons','mtms'), __('Episodes','mtms'),), 
    "desc" => __('Check to enable ads','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("checked", "checked", "checked", "checked")
),


###################  USER REGISTER  #####################
#########################################################


array(
	// TIP Sconsole shortcode
    "under_section" => "dt_register_user_ptr",
    "type" => "tips",
	"text" => __('<strong>NOTE:</strong> You can use these tags to personalize your welcome message in sign up.','mtms'),
	
),
array(
	// Field textarea
    "under_section" => "dt_register_user_ptr",
    "type" => "textarea", 
    "name" => __('Welcome message','mtms'),  
    "id" => "dt_welcome_mail_user", 
    "display_checkbox_id" => "toggle_checkbox_id",
	"rows" => "10",
	"desc" => __('Use plain text only.','mtms'),
	"default" => __('Hello {first_name}, welcome to {sitename}.','mtms'),
	"code" => "{sitename}
{siteurl}
{username}
{password}
{email}
{first_name}
{last_name}	"
),








###################   SEO  GENERAL  #####################
#########################################################

array(
	// dt_site_titles
    "under_section" => "seo-general",
    "type" => "checkbox",
    "name" => __('SEO Features','mtms'),
    "id" => array("dt_site_titles"), 
    "options" => array( __('Basic SEO','mtms') ), 
    "desc" => __('Uncheck this to disable SEO features in the theme, highly recommended if you use any other SEO plugin, that way the theme\'s SEO features won\'t conflict with the plugin.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("checked")
),
array(
	// blogname
    "under_section" => "seo-general", 
    "type" => "text",
    "name" => __('Site Title','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "blogname"
),
array(
	// blogdescription
    "under_section" => "seo-general", 
    "type" => "text",
    "name" => __('Tagline','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "blogdescription",
    "desc" => __('In a few words, explain what this site is about.','mtms')
),


array(
	// Small heading
    "under_section" => "seo-general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Site info','mtms'),
),

array(
	// dt_alt_name
    "under_section" => "seo-general", 
    "type" => "text",
    "name" => __('Alternative name','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_alt_name"
),

array(
	// dt_main_keywords
    "under_section" => "seo-general", 
    "type" => "text",
    "name" => __('Main keywords','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_main_keywords",
    "desc" => __('add main keywords for site info','mtms')
),


array(
	// dt_metadescription
    "under_section" => "seo-general",
    "type" => "textarea", 
    "name" => __('Meta description','mtms'),  
    "id" => "dt_metadescription", 
	"rows" => "3",
    "display_checkbox_id" => "toggle_checkbox_id"
),

/* 
array(
	// Small heading
    "under_section" => "seo-general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Your company','mtms'),
),

array(
	// dt_company_name
    "under_section" => "seo-general", 
    "type" => "text",
    "name" => __('Company name','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_company_name"
),

array(
	// Field upload image
    "under_section" => "seo-general", 
    "type" => "image", 
	"display_checkbox_id" => "toggle_checkbox_id",
    "name" => __('Company logo','mtms'),
    "id" => "dt_company_logo"
),  
*/

################### CONFIG COMMENTS #####################
#########################################################


array(
	// dt_commets
    "under_section" => "comments",
    "type" => "radio",
    "name" => __("Comments default","mtms"),
    "id" => "dt_commets",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"comtwp" => __('WordPress','mtms'),
		"comtfb" => __('Facebook comments','mtms'),
		"comtdi" => __('Disqus','mtms'),
		"comtno" => __('None','mtms')
	),
    "desc" => __('Choose an option','mtms'),
    "default" => "comtwp"
),


array(
	// comments_on_page
    "under_section" => "comments",
    "type" => "checkbox",
    "name" => __('Comments on pages','mtms'),
    "id" => array("comments_on_page"), 
    "options" => array( __('Enable comments on pages','mtms') ), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("not")
),


array(
	// Small heading
    "under_section" => "comments", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Facebook comments','mtms'),
),
array(
	// Fields Tips
    "under_section" => "comments",
    "type" => "tips",
    "text" => __("We recommend setting these fields to moderate the comments facebook, <a href=\"https://developers.facebook.com/docs/plugins/comments\" target=\"_blank\">more info</a> ","mtms"),
),
array(
	// dt_app_id_facebook
    "under_section" => "comments", 
    "type" => "text",
    "name" => __('APP ID','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_app_id_facebook", 
    "desc" => __("Insert you Facebook app id here. If you don't have one for your webpage you can create it <a href=\"https://developers.facebook.com/apps/\" target=\"_blank\">here</a>","mtms")
),
array(
	// dt_admin_facebook
    "under_section" => "comments", 
    "type" => "text",
    "name" => __('Admin user','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_admin_facebook", 
    "desc" => __("Add user or user ID to manage comments","mtms")
),
array(
	// dt_app_language_facebook
	"under_section" => "comments", 
    "type" => "select", 
    "name" => __('APP language','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_app_language_facebook", 
    "options" => array(
			"af_ZA" => __('Afrikaans','mtms'),
			"ak_GH" => __('Akan','mtms'),
			"am_ET" => __('Amharic','mtms'),
			"ar_AR" => __('Arabic','mtms'),
			"as_IN" => __('Assamese','mtms'),
			"ay_BO" => __('Aymara','mtms'),
			"az_AZ" => __('Azerbaijani','mtms'),
			"be_BY" => __('Belarusian','mtms'),
			"bg_BG" => __('Bulgarian','mtms'),
			"bn_IN" => __('Bengali','mtms'),
			"br_FR" => __('Breton','mtms'),
			"bs_BA" => __('Bosnian','mtms'),
			"ca_ES" => __('Catalan','mtms'),
			"cb_IQ" => __('Sorani Kurdish','mtms'),
			"ck_US" => __('Cherokee','mtms'),
			"co_FR" => __('Corsican','mtms'),
			"cs_CZ" => __('Czech','mtms'),
			"cx_PH" => __('Cebuano','mtms'),
			"cy_GB" => __('Welsh','mtms'),
			"da_DK" => __('Danish','mtms'),
			"de_DE" => __('German','mtms'),
			"el_GR" => __('Greek','mtms'),
			"en_GB" => __('English (UK)','mtms'),
			"en_IN" => __('English (India)','mtms'),
			"en_PI" => __('English (Pirate)','mtms'),
			"en_UD" => __('English (Upside Down)','mtms'),
			"en_US" => __('English (US)','mtms'),
			"eo_EO" => __('Esperanto','mtms'),
			"es_CL" => __('Spanish (Chile)','mtms'),
			"es_CO" => __('Spanish (Colombia)','mtms'),
			"es_ES" => __('Spanish (Spain)','mtms'),
			"es_LA" => __('Spanish (Latin America)','mtms'),
			"es_MX" => __('Spanish (Mexico)','mtms'),
			"es_VE" => __('Spanish (Venezuela)','mtms'),
			"et_EE" => __('Estonian','mtms'),
			"eu_ES" => __('Basque','mtms'),
			"fa_IR" => __('Persian','mtms'),
			"fb_LT" => __('Leet Speak','mtms'),
			"ff_NG" => __('Fulah','mtms'),
			"fi_FI" => __('Finnish','mtms'),
			"fo_FO" => __('Faroese','mtms'),
			"fr_CA" => __('French (Canada)','mtms'),
			"fr_FR" => __('French (France)','mtms'),
			"fy_NL" => __('Frisian','mtms'),
			"ga_IE" => __('Irish','mtms'),
			"gl_ES" => __('Galician','mtms'),
			"gn_PY" => __('Guarani','mtms'),
			"gu_IN" => __('Gujarati','mtms'),
			"gx_GR" => __('Classical Greek','mtms'),
			"ha_NG" => __('Hausa','mtms'),
			"he_IL" => __('Hebrew','mtms'),
			"hi_IN" => __('Hindi','mtms'),
			"hr_HR" => __('Croatian','mtms'),
			"hu_HU" => __('Hungarian','mtms'),
			"hy_AM" => __('Armenian','mtms'),
			"id_ID" => __('Indonesian','mtms'),
			"ig_NG" => __('Igbo','mtms'),
			"is_IS" => __('Icelandic','mtms'),
			"it_IT" => __('Italian','mtms'),
			"ja_JP" => __('Japanese','mtms'),
			"ja_KS" => __('Japanese (Kansai)','mtms'),
			"jv_ID" => __('Javanese','mtms'),
			"ka_GE" => __('Georgian','mtms'),
			"kk_KZ" => __('Kazakh','mtms'),
			"km_KH" => __('Khmer','mtms'),
			"kn_IN" => __('Kannada','mtms'),
			"ko_KR" => __('Korean','mtms'),
			"ku_TR" => __('Kurdish (Kurmanji)','mtms'),
			"ky_KG" => __('Kyrgyz','mtms'),
			"la_VA" => __('Latin','mtms'),
			"lg_UG" => __('Ganda','mtms'),
			"li_NL" => __('Limburgish','mtms'),
			"ln_CD" => __('Lingala','mtms'),
			"lo_LA" => __('Lao','mtms'),
			"lt_LT" => __('Lithuanian','mtms'),
			"lv_LV" => __('Latvian','mtms'),
			"mg_MG" => __('Malagasy','mtms'),
			"mi_NZ" => __('Maori','mtms'),
			"mk_MK" => __('Macedonian','mtms'),
			"ml_IN" => __('Malayalam','mtms'),
			"mn_MN" => __('Mongolian','mtms'),
			"mr_IN" => __('Marathi','mtms'),
			"ms_MY" => __('Malay','mtms'),
			"mt_MT" => __('Maltese','mtms'),
			"my_MM" => __('Burmese','mtms'),
			"nb_NO" => __('Norwegian (bokmal)','mtms'),
			"nd_ZW" => __('Ndebele','mtms'),
			"ne_NP" => __('Nepali','mtms'),
			"nl_BE" => __('Dutch (Belgie)','mtms'),
			"nl_NL" => __('Dutch','mtms'),
			"nn_NO" => __('Norwegian (nynorsk)','mtms'),
			"ny_MW" => __('Chewa','mtms'),
			"or_IN" => __('Oriya','mtms'),
			"pa_IN" => __('Punjabi','mtms'),
			"pl_PL" => __('Polish','mtms'),
			"ps_AF" => __('Pashto','mtms'),
			"pt_BR" => __('Portuguese (Brazil)','mtms'),
			"pt_PT" => __('Portuguese (Portugal)','mtms'),
			"qu_PE" => __('Quechua','mtms'),
			"rm_CH" => __('Romansh','mtms'),
			"ro_RO" => __('Romanian','mtms'),
			"ru_RU" => __('Russian','mtms'),
			"rw_RW" => __('Kinyarwanda','mtms'),
			"sa_IN" => __('Sanskrit','mtms'),
			"sc_IT" => __('Sardinian','mtms'),
			"se_NO" => __('Northern Sami','mtms'),
			"si_LK" => __('Sinhala','mtms'),
			"sk_SK" => __('Slovak','mtms'),
			"sl_SI" => __('Slovenian','mtms'),
			"sn_ZW" => __('Shona','mtms'),
			"so_SO" => __('Somali','mtms'),
			"sq_AL" => __('Albanian','mtms'),
			"sr_RS" => __('Serbian','mtms'),
			"sv_SE" => __('Swedish','mtms'),
			"sw_KE" => __('Swahili','mtms'),
			"sy_SY" => __('Syriac','mtms'),
			"sz_PL" => __('Silesian','mtms'),
			"ta_IN" => __('Tamil','mtms'),
			"te_IN" => __('Telugu','mtms'),
			"tg_TJ" => __('Tajik','mtms'),
			"th_TH" => __('Thai','mtms'),
			"tk_TM" => __('Turkmen','mtms'),
			"tl_PH" => __('Filipino','mtms'),
			"tl_ST" => __('Klingon','mtms'),
			"tr_TR" => __('Turkish','mtms'),
			"tt_RU" => __('Tatar','mtms'),
			"tz_MA" => __('Tamazight','mtms'),
			"uk_UA" => __('Ukrainian','mtms'),
			"ur_PK" => __('Urdu','mtms'),
			"uz_UZ" => __('Uzbek','mtms'),
			"vi_VN" => __('Vietnamese','mtms'),
			"wo_SN" => __('Wolof','mtms'),
			"xh_ZA" => __('Xhosa','mtms'),
			"yi_DE" => __('Yiddish','mtms'),
			"yo_NG" => __('Yoruba','mtms'),
			"zh_CN" => __('Simplified Chinese (China)','mtms'),
			"zh_HK" => __('Traditional Chinese (Hong Kong)','mtms'),
			"zh_TW" => __('Traditional Chinese (Taiwan)','mtms'),
			"zu_ZA" => __('Zulu','mtms'),
			"zz_TR" => __('Zazaki','mtms')
		), 
    "desc" => __('Select language for the app of facebook','mtms'),
    "default" => "en_US"
),
array(
	// dt_scheme_color_facebook
	"under_section" => "comments", 
    "type" => "radio", 
    "name" => __('Color Scheme','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_scheme_color_facebook", 
    "options" => array(
			"light" => __('Light color','mtms'),
			"dark" => __('Dark color','mtms')
		), 
    "desc" => __('Choose the color for the comment block','mtms'),
    "default" => "light"
),
array(
	// dt_number_comments_facebook
    "under_section" => "comments", 
    "type" => "number",
    "name" => __('Number of comments','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_number_comments_facebook", 
	"min" => "5",
	"max" => "50",
	"step" => "5",
    "desc" => __('Select number of comments to display ','mtms'),
    "default" => "20"
),
array(
	// Small heading
    "under_section" => "comments", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Disqus comments','mtms'),
),
array(
	// dt_shortname_disqus
    "under_section" => "comments", 
    "type" => "text",
    "name" => __('Shorname Disqus','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_shortname_disqus", 
    "desc" => __("Add your community shortname <a href=\"https://disqus.com/\" target=\"_blank\">Disqus</a>","mtms")

),

################## GENERAL SETTINGS #####################
#########################################################

array(
	// dt_color_scheme
    "under_section" => "general",
    "type" => "radio",
    "name" => __("Color Scheme","mtms"),
    "id" => "dt_color_scheme",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"white" => __('Default style','mtms'),
		"bluestorm" => __('BlueStorm style','mtms'),
		"bluestorm-dark" => __('BlueStorm Dark style','mtms'),
		"fusion" => __('Fusion style','mtms')
	),
    "desc" => __('Select the default color scheme','mtms'),
    "default" => "white"
),

array(
	// dt_jquery_version
	"under_section" => "general", 
    "type" => "select", 
    "name" => __('jQuery version','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_jquery_version", 
    "options" => array(
			"2.2.0" => "jQuery 2.2.0",
			"2.1.4" => "jQuery 2.1.4",
			"2.1.3" => "jQuery 2.1.3",
			"2.1.1" => "jQuery 2.1.1",
			"2.1.0" => "jQuery 2.1.0",
			"2.0.3" => "jQuery 2.0.3",
			"2.0.2" => "jQuery 2.0.2",
			"2.0.1" => "jQuery 2.0.1",
			"2.0.0" => "jQuery 2.0.0",
			"1.12.0" => "jQuery 1.12.0",
			"1.11.3" => "jQuery 1.11.3"
		), 
    "desc" => __('Select jQuery version','mtms'),
    "default" => "2.2.0"
),

array(
	// dt_google_analytics
    "under_section" => "general", 
    "type" => "text",
    "name" => __('Google Analytics','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_google_analytics", 
    "placeholder" => __('UA-45182606-12','mtms'),
    "desc" => __('Insert tracking code to use this function','mtms'),
    "default" => ""
),
array(
	// posts_per_page
    "under_section" => "general", 
    "type" => "number",
    "name" => __('Post per page','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "posts_per_page", 
	"min" => "5",
	"step" => "5",
    "placeholder" => __('placeholder','mtms'),
    "desc" => __('Blog pages show at most','mtms'),
    "default" => "10"
),

array(
	// Small heading
    "under_section" => "general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Customize logos','mtms'),
),


array(
	// dt_logo
    "under_section" => "general", 
    "type" => "image", 
	"display_checkbox_id" => "toggle_checkbox_id",
    "name" => __('Logo Image','mtms'),
    "id" => "dt_logo", 
    "desc" => __('Upload your logo using the Upload Button or insert image URL','mtms')
), 
array(
	// dt_favicon
    "under_section" => "general", 
    "type" => "image", 
	"display_checkbox_id" => "toggle_checkbox_id",
    "name" => __('Favicon','mtms'),
    "id" => "dt_favicon", 
    "desc" => __('Upload a 16 x 16 px image that will represent your website\'s favicon','mtms')
), 
array(
	// dt_logo_admin
    "under_section" => "general", 
    "type" => "image", 
	"display_checkbox_id" => "toggle_checkbox_id",
    "name" => __('Admin logo','mtms'),
    "id" => "dt_logo_admin", 
    "desc" => __('Upload your logo for wp-admin login, using the Upload Button or insert image URL','mtms')
), 
array(
	// Small heading
    "under_section" => "general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Configure pages','mtms'),
), 

array(
	// dt_account_page
	"under_section" => "general", 
    "type" => "pages", 
    "name" => __('My account','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_account_page", 
    "desc" => __('Select relevant page','mtms'),
),
array(
	// dt_trending_page
	"under_section" => "general", 
    "type" => "pages", 
    "name" => __('Trending','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_trending_page", 
    "desc" => __('Select relevant page','mtms'),
),
array(
	// dt_rating_page
	"under_section" => "general", 
    "type" => "pages", 
    "name" => __('Ratings','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_rating_page", 
    "desc" => __('Select relevant page','mtms'),
),
array(
	// dt_contac_page
	"under_section" => "general", 
    "type" => "pages", 
    "name" => __('Contact','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_contact_page", 
    "desc" => __('Select relevant page','mtms'),
),



array(
	// Small heading
    "under_section" => "general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Code integrations','mtms'),
), 
array(
	// dt_header_code
    "under_section" => "general",
    "type" => "textarea", 
    "name" => __('Header code','mtms'),  
    "id" => "dt_header_code", 
    "display_checkbox_id" => "toggle_checkbox_id",
	"rows" => "5",
    "desc" => __('Enter the code which you need to place <strong>before closing tag.</strong> (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)','mtms')
),
array(
	// dt_footer_code
    "under_section" => "general",
    "type" => "textarea", 
    "name" => __('Footer code','mtms'),  
    "id" => "dt_footer_code", 
    "display_checkbox_id" => "toggle_checkbox_id",
	"rows" => "5",
    "desc" => __('Enter the codes which you need to place in your footer. (ex: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)','mtms')
),


array(
	// Small heading Google reCAPTCHA
    "under_section" => "general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Google reCAPTCHA','mtms'),
),
array(
	// dt_grpublic_key
    "under_section" => "general", 
    "type" => "text",
    "name" => __('Public key','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_grpublic_key"
),
array(
	// dt_grprivate_key
    "under_section" => "general", 
    "type" => "text",
    "name" => __('Private Key','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_grprivate_key"
),
array(
	// Small heading Google reCAPTCHA
    "under_section" => "general", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Additional settings','mtms'),
),

array(
	// dt_play_trailer
    "under_section" => "general",
    "type" => "checkbox",
    "name" => __('Enable or disable','mtms'),
    "id" => array("dt_play_trailer","dt_similiar_titles","dt_register_user"), 
    "options" => array( __("Auto-play video trailers","mtms"), __('Enable similar titles','mtms'), __('Allow user register','mtms') ), 
    "desc" => __('Check whether to activate or deactivate','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("checked","checked","not")
),

array(
	// dt_emoji_disable
	// dt_toolbar_disable
    "under_section" => "general",
    "type" => "checkbox",
    "name" => __('WordPress Controls','mtms'),
    "id" => array("dt_emoji_disable","dt_toolbar_disable"), 
    "options" => array( __('Emoji disable','mtms'), __('User toolbar disable','mtms') ), 
    "desc" => __('Check to disable','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("not","not")
),


#################### TAXONOMIES #########################
#########################################################
array(
	// dt_movies_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Филми','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_movies_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>movies</strong>/titanic/','mtms'),
    "default" => __('movies','mtms')
),
array(
	// dt_tvshows_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('TVShows','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_tvshows_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>tvshows</strong>/arrow/','mtms'),
    "default" => __('tvshows','mtms')
),
array(
	// dt_seasons_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Seasons','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_seasons_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>seasons</strong>/arrow-season-1/','mtms'),
    "default" => __('seasons','mtms')
),
array(
	// dt_episodes_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Episodes','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_episodes_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>episodes</strong>/arrow-1x1/','mtms'),
    "default" => __('episodes','mtms')
),
array(
	// dt_genre_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Genre','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_genre_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>genre</strong>/action/','mtms'),
    "default" => __('genre','mtms')
),
array(
	// dt_release_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Release','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_release_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>release</strong>/2016/','mtms'),
    "default" => __('release','mtms')
),
array(
	// dt_network_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Network','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_network_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>network</strong>/amc/','mtms'),
    "default" => __('network','mtms')
),
array(
	// dt_studio_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Studio','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_studio_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>studio</strong>/amc-studios/','mtms'),
    "default" => __('studio','mtms')
),
array(
	// dt_protagonist_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Protagonist','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_protagonist_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>protagonist</strong>/andrew-lincoln/','mtms'),
    "default" => __('protagonist','mtms')
),
array(
	// dt_cast_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Cast','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_cast_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>cast</strong>/andrew-lincoln/','mtms'),
    "default" => __('cast','mtms')
),
array(
	// dt_gueststar_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Guest Star','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_gueststar_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>guest-star</strong>/emma-bell/','mtms'),
    "default" => __('guest-star','mtms')
),
array(
	// dt_creator_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Creator','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_creator_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>creator</strong>/frank-darabont/','mtms'),
    "default" => __('creator','mtms')
),
array(
	// dt_director_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Director','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_director_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>director</strong>/george-lucas/','mtms'),
    "default" => __('director','mtms')
),
array(
	// dt_links_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Links','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_links_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>links</strong>/49026/','mtms'),
    "default" => __('links','mtms')
),

array(
	// dt_quality_slug
    "under_section" => "taxonomias-config", 
    "type" => "text",
    "name" => __('Quality','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_quality_slug", 
    "desc" => __('<strong>Example:</strong> yourwebsite.com/<strong>quality</strong>/1080p/','mtms'),
    "default" => __('quality','mtms')
),
##################### API TMDB ##########################
#########################################################
array(
	// Tip API TMDB
    "under_section" => "api-config",
    "type" => "tips",
	"text" => __('It is important to correctly configure these fields, the API will allow us to generate content quickly.','mtms')
),
array(
	// dt_activate_api
    "under_section" => "api-config",
    "type" => "checkbox",
    "name" => __('Enable API TMDb','mtms'),
    "id" => array("dt_activate_api"), 
    "options" => array( __('Check to enable the API','mtms') ), 
    "desc" => __("Set your API on <a href=\"https://www.themoviedb.org/account/\" target=\"_blank\">Themoviedb.org API</a>","mtms"),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("checked")
),
array(
	// dt_api_key
    "under_section" => "api-config", 
    "type" => "text",
    "name" => __('TMDb API key','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_api_key", 
    "desc" => __('Add the API key in the text box','mtms'),
    "default" => "6b4357c41d9c606e4d7ebe2f4a8850ea"
),
array(
	// dt_api_language
	"under_section" => "api-config", 
    "type" => "select", 
    "name" => __('API Language','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_api_language", 
    "options" => array(
			"ar-AR" => __('Arabic (ar-AR)','mtms'),
			"bs-BS" => __('Bosnian (bs-BS)','mtms'),
			"bg-BG" => __('Bulgarian (bg-BG)','mtms'),
			"hr-HR" => __('Croatian (hr-HR)','mtms'),
			"cs-CZ" => __('Czech (cs-CZ)','mtms'),
			"da-DK" => __('Danish (da-DK)','mtms'),
			"nl-NL" => __('Dutch (nl-NL)','mtms'),
			"en-US" => __('English (en-US)','mtms'),
			"fi-FI" => __('Finnish (fi-FI)','mtms'),
			"fr-FR" => __('French (fr-FR)','mtms'),
			"de-DE" => __('German (de-DE)','mtms'),
			"el-GR" => __('Greek (el-GR)','mtms'),
			"he-IL" => __('Hebrew (he-IL)','mtms'),
			"hu-HU" => __('Hungarian (hu-HU)','mtms'),
			"is-IS" => __('Icelandic (is-IS)','mtms'),
			"id-ID" => __('Indonesian (id-ID)','mtms'),
			"it-IT" => __('Italian (it-IT)','mtms'),
			"ko-KR" => __('Korean (ko-KR)','mtms'),
			"lb-LB" => __('Letzeburgesch (lb-LB)','mtms'),
			"lt-LT" => __('Lithuanian (lt-LT)','mtms'),
			"zh-CN" => __('Mandarin (zh-CN)','mtms'),
			"fa-IR" => __('Persian (fa-IR)','mtms'),
			"pl-PL" => __('Polish (pl-PL)','mtms'),
			"pt-PT" => __('Portuguese (pt-PT)','mtms'),
			"pt-BR" => __('Portuguese (pt-BR)','mtms'),
			"ro-RO" => __('Romanian (ro-RO)','mtms'),
			"ru-RU" => __('Russian (ru-RU)','mtms'),
			"sk-SK" => __('Slovak (sk-SK)','mtms'),
			"es-ES" => __('Spanish (es-ES)','mtms'),
			"sv-SE" => __('Swedish (sv-SE)','mtms'),
			"th-TH" => __('Thai (th-TH)','mtms'),
			"tr-TR" => __('Turkish (tr-TR)','mtms'),
			"tw-TW" => __('Twi (tw-TW)','mtms'),
			"uk-UA" => __('Ukrainian (uk-UA)','mtms'),
			"vi-VN" => __('Vietnamese (vi-VN)','mtms')
		), 
    "desc" => __('Select language','mtms'),
    "default" => "en-US"
),
array(
	// Small heading
    "under_section" => "api-config", 
    "type" => "small_heading", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "title" => __('Control generated content','mtms'),
), 
array(
	// dt_api_genres 
	// dt_api_upload_poster
    "under_section" => "api-config",
    "type" => "checkbox",
    "name" => __('API control','mtms'),
    "id" => array(
			"dt_api_genres", 
			"dt_api_upload_poster"
		), 
    "options" => array( 
			__("Generate genres","mtms"), 
			__("Upload poster image","mtms")
		), 
    "desc" => __('Check to enable.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"checked", 
			"checked"
		)
),


array(
	// Tip API TMDB
    "under_section" => "api-config",
    "type" => "tips",
	"text" => __('Select publication status the content generated by the API.','mtms')
),

array(
	// dt_api_post_status_movies
    "under_section" => "api-config",
    "type" => "select",
    "name" => __("Movies post status","mtms"),
    "id" => "dt_api_post_status_movies",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"publish" => __('Publish','mtms'),
		"draft" => __('Draft','mtms'),
		"pending" => __('Pending','mtms'),
		"private" => __('Private','mtms'),
		"trash" => __('Trash','mtms')
	),
    "default" => "publish"
),
array(
	// dt_api_post_status_tv_shows
    "under_section" => "api-config",
    "type" => "select",
    "name" => __("TV Shows post status","mtms"),
    "id" => "dt_api_post_status_tv_shows",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"publish" => __('Publish','mtms'),
		"draft" => __('Draft','mtms'),
		"pending" => __('Pending','mtms'),
		"private" => __('Private','mtms'),
		"trash" => __('Trash','mtms')
	),
    "default" => "publish"
),
array(
	// dt_api_post_status_seasons
    "under_section" => "api-config",
    "type" => "select",
    "name" => __("Seasons post status","mtms"),
    "id" => "dt_api_post_status_seasons",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"publish" => __('Publish','mtms'),
		"draft" => __('Draft','mtms'),
		"pending" => __('Pending','mtms'),
		"private" => __('Private','mtms'),
		"trash" => __('Trash','mtms')
	),
    "default" => "publish"
),
array(
	// dt_api_post_status_episodes
    "under_section" => "api-config",
    "type" => "select",
    "name" => __("Episodes post status","mtms"),
    "id" => "dt_api_post_status_episodes",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"publish" => __('Publish','mtms'),
		"draft" => __('Draft','mtms'),
		"pending" => __('Pending','mtms'),
		"private" => __('Private','mtms'),
		"trash" => __('Trash','mtms')
	),
    "default" => "publish"
),

array(
	// dt_api_post_date
    "under_section" => "api-config",
    "type" => "radio",
    "name" => __("Published date","mtms"),
    "id" => "dt_api_post_date",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"PT_DATE" => __('Actual date (default)','mtms'),
		"OR_DATE" => __('Release date','mtms'),
	),
    "desc" => __('select type of date of publication','mtms'),
    "default" => "PT_DATE"
),

array(
	// Tip API TMDB
    "under_section" => "api-config",
    "type" => "tips",
	"text" => __("<strong>\"Published date\"</strong> this option will only effect from the data importer in front-end.","mtms")
),

##################### HOME PAGE #########################
#########################################################
array(
	// dt_shorcode_home
    "under_section" => "h-config",
    "type" => "textarea", 
    "name" => __('Shortcode console','mtms'),  
    "id" => "dt_shorcode_home", 
    "display_checkbox_id" => "toggle_checkbox_id",
    "placeholder" => __('[module]','mtms'),
    "desc" => __("Add modular Shortcodes and configure your home page<br> <a href=\"https://doothemes.com/forums/topic/12-homepage-modular/\" target=\"_blank\">more info</a>","mtms"),
	"rows" => "7",
    "code" => "[module-slider]
[module-slider-movies]
[module-slider-tvshows]
[module-movies]
[module-tvshows]
[module-seasons]
[module-episodes]
[module-ads]
		"
),
array(
	// TIP Sconsole shortcode
    "under_section" => "h-config",
    "type" => "tips",
	"text" => __('<strong>IMPORTANT:</strong> You can only use the following shortcodes, in the order of your preference','mtms'),
),
array(
	// dt_slider_items
    "under_section" => "m-slider", 
    "type" => "number",
    "name" => __('Items number','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_slider_items", 
	"min" => "2",
	"max" => "20",
	"step" => "2",
    "placeholder" => __('10','mtms'),
    "desc" => __('Number of items to show','mtms'),
    "default" => "10"
),
array(
	// dt_autoplay_s 
	// dt_autoplay_s_movies 
	// dt_autoplay_s_tvshows
    "under_section" => "m-slider",
    "type" => "checkbox",
    "name" => __('Autoplay slider control','mtms'),
    "id" => array(
			"dt_autoplay_s", 
			"dt_autoplay_s_movies", 
			"dt_autoplay_s_tvshows"
		), 
    "options" => array( 
			__("Autoplay Slider","mtms"), 
			__("Autoplay Slider Movies","mtms"), 
			__("Autoplay Slider TVShows","mtms")
		), 
    "desc" => __('Check to enable auto-play slider.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"not", 
			"not", 
			"not"
		)
),
array(
	// dt_slider_speed
	"under_section" => "m-slider", 
    "type" => "select", 
    "name" => __('Speed Slider','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_slider_speed", 
    "options" => array(
			"500" => __('0.5 seconds','mtms'),
			"1000" => __('1 second','mtms'),
			"1500" => __('1.5 seconds','mtms'),
			"2000" => __('2 seconds','mtms'),
			"2500" => __('2.5 seconds','mtms'),
			"3000" => __('3 seconds','mtms'),
			"3500" => __('3.5 seconds','mtms'),
			"4000" => __('4 seconds','mtms')
		), 
    "desc" => __('Select speed slider in secons','mtms'),
    "default" => "2000"
),
array(
	// dt_slider_radom
    "under_section" => "m-slider",
    "type" => "checkbox",
    "name" => __('Random order','mtms'),
    "id" => array("dt_slider_radom"), 
    "options" => array( __('Enable Random order','mtms')), 
    "desc" => __('Check to display content in random order','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => "checked"
),
array(
	// Tip [module-slider]
    "under_section" => "m-slider",
    "type" => "tips",
	"text" => __('<code>[module-slider]</code> Usage shortcode.','mtms'),
	"code" => '
[module-slider-movies]
[module-slider-tvshows]
		'
),
array(
	// dt_mm_title
    "under_section" => "m-movies", 
    "type" => "text",
    "name" => __('Module Title','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_mm_title", 
    "placeholder" => __('Movies','mtms'),
    "desc" => __('Add title to show','mtms'),
    "default" => __('Movies','mtms')
),
array(
	// dt_mm_number_items
    "under_section" => "m-movies", 
    "type" => "number",
    "name" => __('Items number','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_mm_number_items", 
	"min" => "5",
	"max" => "50",
	"step" => "5",
    "placeholder" => __('20','mtms'),
    "desc" => __('Number of items to show','mtms'),
    "default" => "20"
),
array(
	// dt_mm_activate_slider 
	// dt_mm_autoplay_slider
	// dt_mm_random_order
    "under_section" => "m-movies",
    "type" => "checkbox",
    "name" => __('Module control','mtms'),
    "id" => array(
			"dt_mm_activate_slider", 
			"dt_mm_autoplay_slider", 
			"dt_mm_random_order"
		), 
    "options" => array( 
			__("Activate Slider","mtms"), 
			__("Auto play Slider","mtms"), 
			__("Random order","mtms")
		), 
    "desc" => __('Check to enable option.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"checked", 
			"not", 
			"not"
		)
),
array(
	// Tip [module-movies]
    "under_section" => "m-movies",
    "type" => "tips",
	"text" => __('<code>[module-movies]</code> Usage shortcode.','mtms')
),
array(
	// dt_mt_title
    "under_section" => "m-tvshows", 
    "type" => "text",
    "name" => __('Module Title','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_mt_title", 
    "placeholder" => __('TVShows','mtms'),
    "desc" => __('Add title to show','mtms'),
    "default" => __('TVShows','mtms')
),
array(
	// dt_mt_number_items
    "under_section" => "m-tvshows", 
    "type" => "number",
    "name" => __('Items number','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_mt_number_items", 
	"min" => "5",
	"max" => "50",
	"step" => "5",
    "placeholder" => __('20','mtms'),
    "desc" => __('Number of items to show','mtms'),
    "default" => "20"
),
array(
	// dt_mt_activate_slider 
	// dt_mt_autoplay_slider
	// dt_mt_random_order
    "under_section" => "m-tvshows",
    "type" => "checkbox",
    "name" => __('Module control','mtms'),
    "id" => array(
			"dt_mt_activate_slider", 
			"dt_mt_autoplay_slider", 
			"dt_mt_random_order"
		), 
    "options" => array( 
			__("Activate Slider","mtms"), 
			__("Auto play Slider","mtms"), 
			__("Random order","mtms")
		), 
    "desc" => __('Check to enable option.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"checked", 
			"not", 
			"not"
		)
),
array(
	// Tip [module-tvshows]
    "under_section" => "m-tvshows",
    "type" => "tips",
	"text" => __('<code>[module-tvshows]</code> Usage shortcode.','mtms')
),
array(
	// dt_ms_title
    "under_section" => "m-seasons", 
    "type" => "text",
    "name" => __('Module Title','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_ms_title", 
    "placeholder" => __('Seasons','mtms'),
    "desc" => __('Add title to show','mtms'),
    "default" => __('Seasons','mtms')
),
array(
	// dt_ms_number_items
    "under_section" => "m-seasons", 
    "type" => "number",
    "name" => __('Items number','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_ms_number_items", 
	"min" => "5",
	"max" => "50",
	"step" => "5",
    "placeholder" => __('20','mtms'),
    "desc" => __('Number of items to show','mtms'),
    "default" => "20"
),
array(
	// dt_ms_autoplay_slider
	// dt_ms_random_order
    "under_section" => "m-seasons",
    "type" => "checkbox",
    "name" => __('Module control','mtms'),
    "id" => array(
			"dt_ms_autoplay_slider", 
			"dt_ms_random_order"
		), 
    "options" => array( 
			__("Auto play Slider","mtms"), 
			__("Random order","mtms")
		), 
    "desc" => __('Check to enable option.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"not", 
			"not"
		)
),
array(
	// Tip [module-seasons]
    "under_section" => "m-seasons",
    "type" => "tips",
	"text" => __('<code>[module-seasons]</code> Usage shortcode.','mtms')
),
array(
	// dt_me_title
    "under_section" => "m-episodes", 
    "type" => "text",
    "name" => __('Module Title','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_me_title", 
    "placeholder" => __('Episodes','mtms'),
    "desc" => __('Add title to show','mtms'),
    "default" => __('Episodes','mtms')
),
array(
	// dt_me_number_items
    "under_section" => "m-episodes", 
    "type" => "number",
    "name" => __('Items number','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_me_number_items", 
	"min" => "5",
	"max" => "50",
	"step" => "5",
    "placeholder" => __('20','mtms'),
    "desc" => __('Number of items to show','mtms'),
    "default" => "20"
),
array(
	// dt_me_autoplay_slider
	// dt_me_random_order
    "under_section" => "m-episodes",
    "type" => "checkbox",
    "name" => __('Module control','mtms'),
    "id" => array(
			"dt_me_autoplay_slider", 
			"dt_me_random_order"
		), 
    "options" => array( 
			__("Auto play Slider","mtms"), 
			__("Random order","mtms")
		), 
    "desc" => __('Check to enable option.','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array(
			"not", 
			"not"
		)
),
array(
	// Tip [module-episodes]
    "under_section" => "m-episodes",
    "type" => "tips",
	"text" => __('<code>[module-episodes]</code> Usage shortcode.','mtms')
),



#################### POST LINKS #########################
#########################################################


array(
	// dt_activate_post_links
    "under_section" => "post-links",
    "type" => "checkbox",
    "name" => __('Activate post links','mtms'),
    "id" => array("dt_activate_post_links"), 
    "options" => array( __('Check to enable module','mtms')), 
    "desc" => __('Check to enable','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("checked")
),

array(
	// dt_permissions_post_links
    "under_section" => "post-links",
    "type" => "radio",
    "name" => __('Who can post links','mtms'),
    "id" => "dt_permissions_post_links",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"a77" => __('Anyone','mtms'),
		"a00" => __('Only admin','mtms'),
		"a63" => __('Registration required','mtms')
	),
    "desc" => __('Select who can post links on your website.','mtms'),
    "default" => "a00"
),


array(
	// dt_status_post_links
    "under_section" => "post-links",
    "type" => "radio",
    "name" => __('Status post','mtms'),
    "id" => "dt_status_post_links",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"pending" => __('Review pending','mtms'),
		"publish" => __('Publish','mtms')
	),
    "desc" => __('Select publishing status for links.','mtms'),
    "default" => "publish"
),


array(
	// dt_languages_post_link
    "under_section" => "post-links", 
    "type" => "text",
    "name" => __('Languages to add links','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_languages_post_link", 
    "desc" => __('Add comma separated values','mtms')
),
array(
	// dt_quality_post_link
    "under_section" => "post-links", 
    "type" => "text",
    "name" => __('Resolutions quality to add links','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_quality_post_link", 
    "desc" => __('Add comma separated values','mtms')
),
array(
	// dt_ountdown_link_redirect
    "under_section" => "post-links", 
    "type" => "number",
    "name" => __('Countdown','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_ountdown_link_redirect", 
	"min" => "5",
	"max" => "120",
	"step" => "5",
    "desc" => __('Define timeout for redirect links','mtms'),
    "default" => "20"
),



################# SITE VERIFICATION #####################
#########################################################



array(
	// dt_veri_google
    "under_section" => "site-veri", 
    "type" => "text",
    "name" => __('Google Search Console','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_veri_google", 
    "desc" => __("Verification settings <a href=\"https://www.google.com/webmasters/verification/\" target=\"_blank\">here</a>","mtms")
),
array(
	// dt_veri_alexa
    "under_section" => "site-veri", 
    "type" => "text",
    "name" => __('Alexa Verification ID','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_veri_alexa", 
    "desc" => __("Verification settings <a href=\"https://www.alexa.com/siteowners/claim/\" target=\"_blank\">here</a>","mtms")
),
array(
	// dt_veri_bing
    "under_section" => "site-veri", 
    "type" => "text",
    "name" => __('Bing Webmaster Tools','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_veri_bing", 
    "desc" => __("Verification settings <a href=\"https://www.bing.com/toolbox/webmaster/\" target=\"_blank\">here</a>","mtms")
),
array(
	// dt_veri_yandex
    "under_section" => "site-veri", 
    "type" => "text",
    "name" => __('Yandex Webmaster Tools','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_veri_yandex", 
    "desc" => __("Verification settings <a href=\"https://yandex.com/support/webmaster/service/rights.xml#how-to\" target=\"_blank\">here</a>","mtms")
),


#################### WP SMTP MAIL #######################
#########################################################


array(
	// Fields Tips
    "under_section" => "wp-smtp",
    "type" => "tips",
    "text" => __('Configure an SMTP server to send e verified in WordPress','mtms'),
    "code" => ""
),
array(
	// dt_enable_smtp
    "under_section" => "wp-smtp",
    "type" => "checkbox",
    "name" => __('Enable SMTP','mtms'),
    "id" => array("dt_enable_smtp"), 
    "options" => array("Activate WP SMTP mail"), 
    "desc" => __('Enable advanced method of sending emails, SMTP','mtms'),
    "display_checkbox_id" => "toggle_checkbox_id",
    "default" => array("not")
),
array(
	// dt_smtp_server
    "under_section" => "wp-smtp", 
    "type" => "text",
    "name" => __('Host','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_server", 
    "placeholder" => __('smtp.gmail.com','mtms'),
    "desc" => __('Set SMTP server','mtms')
),
array(
	// dt_smtp_protocol
    "under_section" => "wp-smtp",
    "type" => "radio",
    "name" => __("Protocol","mtms"),
    "id" => "dt_smtp_protocol",
    "display_checkbox_id" => "toggle_checkbox_id",
    "options" => array(
		"plain" => __('Plain text','mtms'),
		"ssl" => __('SSL','mtms'),
		"tls" => __('TLS','mtms')
	),
    "desc" => __('Select protocol Shipping','mtms'),
    "default" => "ssl"
),
array(
	// dt_smtp_port
    "under_section" => "wp-smtp", 
    "type" => "text",
    "name" => __('Port','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_port", 
    "placeholder" => __('465','mtms'),
    "desc" => __('Assign SMTP port','mtms')
),
array(
	// dt_smtp_username
    "under_section" => "wp-smtp", 
    "type" => "text",
    "name" => __('Username','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_username", 
    "placeholder" => __('username_smtp@yourwebsite.com','mtms'),
    "desc" => __('Assign SMTP username','mtms')
),
array(
	// dt_smtp_password
    "under_section" => "wp-smtp", 
    "type" => "password",
    "name" => __('Password','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_password", 
    "desc" => __('Important to establish the connection to the server','mtms')
),
array(
	// dt_smtp_from_mail
    "under_section" => "wp-smtp", 
    "type" => "text",
    "name" => __('SMTP From email','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_from_mail", 
    "placeholder" => __('from_mail@yourwebsite.com','mtms')
),
array(
	// dt_smtp_from_name
    "under_section" => "wp-smtp", 
    "type" => "text",
    "name" => __('SMTP From name','mtms'), 
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "dt_smtp_from_name",
	"placeholder" => __('My website','mtms')
),

    );


?>