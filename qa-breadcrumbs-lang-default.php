<?php
/*
	Question2Answer (c) Gideon Greenspan
	Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)
*/

/* don't allow this page to be requested directly from browser */	
if (!defined('QA_VERSION')) {
		header('Location: /');
		exit;
}

return array(
			"opt_yes"         => "Yes" ,
			"opt_no"          => "No" ,
			"opt_truncate"    => "Truncate title in breadcrumb " ,
			"not_found"       => "Page Not Found" ,
			"recent_que"      => "Recent Questions" ,
			"home"            => "Home" ,
			"hot"             => "Hot! Questions" ,
			"most_votes"      => "Most Voted Questions" ,
			"most_answers"    => "Most Answered Questions" ,
			"most_views"      => "Most Viewed Questions" ,
			"no_ans"          => "No Answer" ,
			"no_selected_ans" => "No Selected Answer" ,
			"no_upvoted_ans"  => "No Upvoted Answer" ,
			"questions"       => "Questions" ,
			"unanswered"      => "Unanswered" ,
			"categories"      => "Categories" ,
			"tags"         => "Tags" ,
			"tag"          => "Tag" ,
			"users"        => "Users" ,
			"user"         => "User" ,
			"ask"          => "Ask a Question" ,
			"save_changes" => "Save Changes" ,
			"custom_css"   => "Custom CSS" ,
			"message"      => "Message" ,
			"top_users"    => "Top Scoring Users" ,
			"special"      => "Special Users" ,
			"blocked"      => "Blocked Users" ,
			"activity"      => "Recent Activities" ,
			"settings_saved"  => "Breadcrumbs settings has been saved " ,
			"dont_use_link_for_last_elem"  => "Do not use link for the last element (usually it is a self link )" ,
			"dont_use_icons"  => "Do not use icons " ,
			"searching_for"  => "Searching For : " ,
			"all_my_updates"  => "All My Updates" ,
			"my_favorites"  => "My Favorites" ,
			"my_content"  => "My Content" ,
			"use_fa_cdn"  => "Use Font Awesome CDN for faster page loading" ,
			"fa_cdn_link"  => "Font Awesome CDN link url (give a new one if the existing does not works)" ,
	);