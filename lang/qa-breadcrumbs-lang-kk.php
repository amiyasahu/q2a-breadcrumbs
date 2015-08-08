<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/

        Kazakh language by Yerbol
        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-kk.php
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
        "opt_yes"                     => "Ия",
        "opt_no"                      => "Жоқ",
        "opt_truncate"                => "Қалпына келтіру ",
        "not_found"                   => "Бет табылмады",
        "recent_que"                  => "Соңғы сұрақтар",
        "home"                        => "Сұрақ-Жауап",
        "hot"                         => "Ыстық сұрақтар",
        "most_votes"                  => "Көп дауыс берілген сұрақтар",
        "most_answers"                => "Көп жауап алынған сұрақтар",
        "most_views"                  => "Көп қаралған сұрақтар",
        "no_ans"                      => "Жауабы жоқ",
        "no_selected_ans"             => "Жақсы жауабы жоқ",
        "no_upvoted_ans"              => "Жоғары дауысы жоқ",
        "questions"                   => "Сұрақтар",
        "unanswered"                  => "Жауабы жоқ сұрақтар",
        "categories"                  => "Санаты",
        "tags"                        => "Ілмектер",
        "tag"                         => "Ілмек",
        "users"                       => "Қолданушылар",
        "user"                        => "Қолданушы",
        "ask"                         => "Сұрақ қою",
        "save_changes"                => "Сақтау",
        "custom_css"                  => "Қолмен CSS",
        "message"                     => "Жеке хат",
        "top_users"                   => "Қолданушылар тізімі",
        "special"                     => "Арнайы қолданушылар",
        "blocked"                     => "Құлыпталған қолданушылар",
        "activity"                    => "Соңғы белсенділік",
        "settings_saved"              => "Баптау сәтті сақталды ",
        "dont_use_link_for_last_elem" => "Do not use link for the last element (usually it is a self link )",
        "searching_for"               => "Іздеу нәтижесі : ",
        "all_my_updates"              => "Менің жаңартуларым",
        "my_favorites"                => "Менің таңдаулыларым",
        "my_content"                  => "Менің контентім",
    );