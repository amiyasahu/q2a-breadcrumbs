<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)
        German Language by Martin Staffhorst

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
        "opt_yes"                     => "Ja",
        "opt_no"                      => "Nein",
        "opt_truncate"                => "Titel in Breadcrumb abschneiden",
        "not_found"                   => "Seite nicht gefunden",
        "recent_que"                  => "Neueste Fragen",
        "home"                        => "Startseite",
        "hot"                         => "Beliebte Fragen",
        "most_votes"                  => "Meist bewertete Fragen",
        "most_answers"                => "Meist beantwortete Fragen",
        "most_views"                  => "Meist aufgerufene Fragen",
        "no_ans"                      => "Unbeantwortet",
        "no_selected_ans"             => "Keine Antwort ausgewählt",
        "no_upvoted_ans"              => "Keine Antwort mit positiven Bewertungen",
        "questions"                   => "Fragen",
        "unanswered"                  => "Unbeantwortet",
        "categories"                  => "Kategorien",
        "tags"                        => "Tags",
        "tag"                         => "Tag",
        "users"                       => "Nutzer",
        "user"                        => "Nutzer",
        "ask"                         => "Frage stellen",
        "save_changes"                => "Änderungen speichern",
        "custom_css"                  => "Individuelles CSS",
        "message"                     => "Nachricht",
        "top_users"                   => "Nutzer mit höchster Punktzahl",
        "special"                     => "Besonderer Nutzer",
        "blocked"                     => "Gesperrte Nutzer",
        "activity"                    => "Alle Aktivitäten",
        "settings_saved"              => "Breadcrumbs Einstellungen gespeichert ",
        "dont_use_link_for_last_elem" => "Nicht den Link für letztes Element verwenden (dieser ist im Normalfall ein Selbstlink)",
        "searching_for"               => "Suchen nach: ",
        "all_my_updates"              => "Meine Aktualisierungen",
        "my_favorites"                => "Meine Favoriten",
        "my_content"                  => "Meine Beiträge",
    );