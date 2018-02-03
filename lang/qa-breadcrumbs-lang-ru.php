<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/

        Russian language by Denwer
        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-ru.php
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
        "opt_yes"                     => "Да",
        "opt_no"                      => "Нет",
        "opt_truncate"                => "Максимальное количество символов в breadcrumb ",
        "not_found"                   => "Страница не найдена",
        "recent_que"                  => "Последние вопросы",
        "home"                        => "Вопрос — Ответ",
        "hot"                         => "В тренде!",
        "most_votes"                  => "Большинство голосов за вопрос",
        "most_answers"                => "Наибольшее число ответов",
        "most_views"                  => "Самые просматриваемые вопросы",
        "no_ans"                      => "Вопросы без ответов",
        "no_selected_ans"             => "Вопросы без лучшего ответа",
        "no_upvoted_ans"              => "Вопросы без голосов за ответы",
        "questions"                   => "Вопросы",
        "unanswered"                  => "Без ответов",
        "categories"                  => "Категории",
        "tags"                        => "Метки",
        "tag"                         => "Метка",
        "users"                       => "Пользователи",
        "user"                        => "Пользователь",
        "ask"                         => "Задать вопрос",
        "save_changes"                => "Сохранить изменения",
        "custom_css"                  => "Пользовательские CSS",
        "message"                     => "Сообщение",
        "top_users"                   => "Пользователи по рейтингу",
        "special"                     => "Администраторы, модераторы, редакторы и эксперты",
        "blocked"                     => "Заблокированные пользователи",
        "activity"                    => "Последние действия",
        "settings_saved"              => "Breadcrumbs настройки сохранены ",
        "dont_use_link_for_last_elem" => "Не используйте ссылку на последний элемент (обычно это текущая ссылка на страницу)",
        "searching_for"               => "Поиск : ",
        "all_my_updates"              => "Все обновления",
        "my_favorites"                => "Избранное",
        "my_content"                  => "Публикации",
        "login"                       => "Логин",
        "register"                    => "Регистрация",
        "forgot"                      => "Напоминание пароля",
        "messages"                    => "Личные сообщения",
        "message"                     => "Личное сообщение",
        "sent"                        => "Отправленные сообщения",
        "inbox"                       => "Входящие",
        "message_for_x"               => "Сообщение для : ^",
        "account"                     => "Мой аккаунт",
        "favorites"                   => "Избранное",
        "answers"                     => "Ответы",
        "wall"                        => "Стена",
    );
