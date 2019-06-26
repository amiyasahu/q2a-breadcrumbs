<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/

		French language by Mohamed-Rafik Bouguelia
        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-fr.php
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
        "opt_yes"                     => "Oui",
        "opt_no"                      => "Non",
        "opt_truncate"                => "Tronquer le titre dans le Breadcrumbs ",
        "not_found"                   => "Page non trouvée",
        "recent_que"                  => "Questions les plus récentes",
        "home"                        => "Accueil",
        "hot"                         => "Questions à voir",
        "most_votes"                  => "Questions les plus votés",
        "most_answers"                => "Questions avec le plus de réponses",
        "most_views"                  => "Questions les plus vues",
        "no_ans"                      => "Pas de réponse",
        "no_selected_ans"             => "Pas de réponse sélectionnée",
        "no_upvoted_ans"              => "Pas de réponse avec vote positif",
        "questions"                   => "Questions",
        "unanswered"                  => "Sans réponses",
        "categories"                  => "Catégories",
        "tags"                        => "Mots clés",
        "tag"                         => "Mot clé",
        "users"                       => "Utilisateurs",
        "user"                        => "Utilisateur",
        "ask"                         => "Poser une question",
        "save_changes"                => "Sauvegarder les changements",
        "custom_css"                  => "CSS personnalisé",
        "message"                     => "Message",
        "top_users"                   => "Top utilisateurs",
        "special"                     => "Utilisateurs spéciaux",
        "blocked"                     => "Utilisateurs bloqués",
        "activity"                    => "Activités récentes",
        "settings_saved"              => "Les paramètres de Breadcrumbs ont étés sauvegardés ",
        "dont_use_link_for_last_elem" => "Ne pas utiliser de lien pour le dernier élément (C'est le lien de la page actuelle )",
        "searching_for"               => "Chercher : ",
        "all_my_updates"              => "Toutes mes mises à jour",
        "my_favorites"                => "Mes favoris",
        "my_content"                  => "Mon contenu",
        "login"                       => "Connexion",
        "register"                    => "Inscription",
        "forgot"                      => "Mot de passe oublié",
        "messages"                    => "Messages privés",
        "message"                     => "Message privé",
        "sent"                        => "Messages envoyés",
        "inbox"                       => "Boite de réception",
        "message_for_x"               => "Message pour : ^",
        "account"                     => "Mon compte",
        "favorites"                   => "Mes favoris",
        "answers"                     => "Réponses",
        "wall"                        => "Mur",
    );