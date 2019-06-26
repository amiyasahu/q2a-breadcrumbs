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
        "opt_yes"                     => "Evet",
        "opt_no"                      => "Hayır",
        "opt_truncate"                => "Başlığı kısalt ",
        "not_found"                   => "Sayfa Bulunamadı",
        "recent_que"                  => "Son Sorular",
        "home"                        => "Ana Sayfa",
        "hot"                         => "Beğenilenler",
        "most_votes"                  => "En Çok Oylanan Sorular",
        "most_answers"                => "En Çok Cevaplanan Sorular",
        "most_views"                  => "En Çok Görüntülenen Sorular",
        "no_ans"                      => "Cevap Yok",
        "no_selected_ans"             => "Seçilen Cevap Yok",
        "no_upvoted_ans"              => "Oylanan Cevap Yok",
        "questions"                   => "Sorular",
        "unanswered"                  => "Cevaplanmayan",
        "categories"                  => "Kategoriler",
        "tags"                        => "Etiketler",
        "tag"                         => "Etiket",
        "users"                       => "Kullanıcılar",
        "user"                        => "Kullanıcı",
        "ask"                         => "Bir Soru Sor",
        "save_changes"                => "Değişiklikleri Kaydet",
        "custom_css"                  => "Özel CSS",
        "message"                     => "Mesaj",
        "top_users"                   => "En Çok Puan Olan Kullanıcılar",
        "special"                     => "Özel Kullanıcılar",
        "blocked"                     => "Engelli Kullanıcılar",
        "activity"                    => "Son Aktiviteler",
        "settings_saved"              => "Ayarlar kaydedildi",
        "dont_use_link_for_last_elem" => "Son öğe için bağlantı kullanmayın (genellikle kendi kendine bir bağlantıdır).",
        "searching_for"               => "Arama : ",
        "all_my_updates"              => "Tüm Güncelemelerim",
        "my_favorites"                => "Favorilerim",
        "my_content"                  => "İçeriğim",
        "login"                       => "Giriş",
        "register"                    => "Kayıt",
        "forgot"                      => "Parolamı Unuttum",
        "messages"                    => "Özel Mesajlar",
        "message"                     => "Özel Mesaj",
        "sent"                        => "Gönderilen Mesajlar",
        "inbox"                       => "Gelen Kutusu",
        "message_for_x"               => "Mesaj : ^",
        "account"                     => "Hesabım",
        "favorites"                   => "Favorilerim",
        "answers"                     => "Cevaplar",
        "wall"                        => "Duvar",
    );
