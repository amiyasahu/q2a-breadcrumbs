<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/


        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-default.php
        Version: See define()s at top of qa-include/qa-base.php
        Description: Widget module class for AdSense widget plugin


        This program is free software; you can redistribute it and/or
        modify it under the terms of the GNU General Public License
        as published by the Free Software Foundation; either version 2
        of the License, or (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        More about this license: http://www.question2answer.org/license.php

    */

    /* don't allow this page to be requested directly from browser */
    if ( !defined( 'QA_VERSION' ) ) {
        header( 'Location: /' );
        exit;
    }

    return array(
        "opt_yes"                     => "Yes",
        "opt_no"                      => "No",
        "opt_truncate"                => "Truncate title in breadcrumb ",
        "not_found"                   => "Page Not Found",
        "recent_que"                  => "Recent Questions",
        "home"                        => "Home",
        "hot"                         => "Hot! Questions",
        "most_votes"                  => "Most Voted Questions",
        "most_answers"                => "Most Answered Questions",
        "most_views"                  => "Most Viewed Questions",
        "no_ans"                      => "No Answer",
        "no_selected_ans"             => "No Selected Answer",
        "no_upvoted_ans"              => "No Upvoted Answer",
        "questions"                   => "Questions",
        "unanswered"                  => "Unanswered",
        "categories"                  => "Categories",
        "tags"                        => "Tags",
        "tag"                         => "Tag",
        "users"                       => "Users",
        "user"                        => "User",
        "ask"                         => "Ask a Question",
        "save_changes"                => "Save Changes",
        "custom_css"                  => "Custom CSS",
        "message"                     => "Message",
        "top_users"                   => "Top Scoring Users",
        "special"                     => "Special Users",
        "blocked"                     => "Blocked Users",
        "activity"                    => "Recent Activities",
        "settings_saved"              => "Breadcrumbs settings has been saved ",
        "dont_use_link_for_last_elem" => "Do not use link for the last element (usually it is a self link )",
        "searching_for"               => "Searching For : ",
        "all_my_updates"              => "All My Updates",
        "my_favorites"                => "My Favorites",
        "my_content"                  => "My Content",
        "login"                       => "Login",
        "register"                    => "Register",
        "forgot"                      => "Forgot Password",
        "messages"                    => "Private Messages",
        "message"                     => "Private Message",
        "sent"                        => "Sent Messages",
        "inbox"                       => "Inbox",
        "message_for_x"               => "Message for : ^",
        "account"                     => "My Account",
        "favorites"                   => "My Favorites",
        "answers"                     => "Answers",
        "wall"                        => "Wall",
    );