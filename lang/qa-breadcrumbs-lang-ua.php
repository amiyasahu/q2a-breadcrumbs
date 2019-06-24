<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/
        
        
        Ukrainian language by Denwer
        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-ua.php
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
        "opt_yes"                     => "Так",
        "opt_no"                      => "Ні",
        "opt_truncate"                => "Максимальна кількість символів в breadcrumb ",
        "not_found"                   => "Сторінка не знайдена",
        "recent_que"                  => "Останні запитання",
        "home"                        => "Запитання — Відповідь",
        "hot"                         => "В тренді!",
        "most_votes"                  => "Більшість голосів за запитання",
        "most_answers"                => "Найбільша кількість відповідей",
        "most_views"                  => "Самі популярні запитання",
        "no_ans"                      => "Запитання без відповідей",
        "no_selected_ans"             => "Запитання без кращих відповідей",
        "no_upvoted_ans"              => "Запитання без голосів за відповіді",
        "questions"                   => "Запитання",
        "unanswered"                  => "Без відповіді",
        "categories"                  => "Категорії",
        "tags"                        => "Мітки",
        "tag"                         => "Мітка",
        "users"                       => "Користувачі",
        "user"                        => "Користувач",
        "ask"                         => "Поставити запитання",
        "save_changes"                => "Зберегти зміни",
        "custom_css"                  => "CSS користувача",
        "message"                     => "Повідомлення",
        "top_users"                   => "Користувачі по рейтингу",
        "special"                     => "Адміністратори, модератори, редактори та експерти",
        "blocked"                     => "Заблоковані користувачі",
        "activity"                    => "Останні дії",
        "settings_saved"              => "Breadcrumbs налаштування сбережені ",
        "dont_use_link_for_last_elem" => "Не використовувати посилання на останній елемент (зазвичай це посилання на поточну сторінку)",
        "searching_for"               => "Пошук : ",
        "all_my_updates"              => "Всі оновлення",
        "my_favorites"                => "Обране",
        "my_content"                  => "Публікації",
        "login"                       => "Логін",
        "register"                    => "Реєстрація",
        "forgot"                      => "Нагадування пароля",
        "messages"                    => "Особисті повідомлення",
        "message"                     => "Особисте повідомлення",
        "sent"                        => "Відправлені повідомлення",
        "inbox"                       => "Вхідні",
        "message_for_x"               => "Повідомлення для : ^",
        "account"                     => "Мій аккаунт",
        "favorites"                   => "Обране",
        "answers"                     => "Відповіді",
        "wall"                        => "Стіна",
    );
