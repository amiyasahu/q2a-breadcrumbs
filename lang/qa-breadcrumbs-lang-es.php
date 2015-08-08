<?php
    /*
        Question2Answer (c) Gideon Greenspan
        Q2A Breadcrumbs (c) Amiya Sahu (developer.amiya@outlook.com)

        http://www.question2answer.org/

        Spanish language by Alvaro Fernandez
        File: qa-plugin/q2a-breadcrumbs/qa-breadcrumbs-lang-es.php
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
        "opt_yes"                     => "Si",
        "opt_no"                      => "No",
        "opt_truncate"                => "Truncar el titulo en Breadcrumb",
        "not_found"                   => "Pagina No Encontrada",
        "recent_que"                  => "Preguntas recientes",
        "home"                        => "Inicio",
        "hot"                         => "Más Activas",
        "most_votes"                  => "Más Votadas",
        "most_answers"                => "Más Respondidas",
        "most_views"                  => "Más Vistas",
        "no_ans"                      => "Sin Respuesta",
        "no_selected_ans"             => "Sin Respuesta Seleccionada",
        "no_upvoted_ans"              => "Sin Respuesta con voto positivo",
        "questions"                   => "Preguntas",
        "unanswered"                  => "Sin Responder",
        "categories"                  => "Categorias",
        "tags"                        => "Etiquetas",
        "tag"                         => "Etiqueta",
        "users"                       => "Usuarios",
        "user"                        => "Usuario",
        "ask"                         => "Hacer una pregunta",
        "save_changes"                => "Guardar cambios",
        "custom_css"                  => "Custom CSS",
        "message"                     => "Mensaje",
        "top_users"                   => "Usuarios mejor puntuados",
        "special"                     => "Usuarios Especiales",
        "blocked"                     => "Usuarios Bloqueados",
        "activity"                    => "Actividad reciente",
        "settings_saved"              => "La configuración de Breadcrumbs ha sido guardada con exito",
        "dont_use_link_for_last_elem" => "No enlazar el ultimo elemento (usualmente es un auto link)",
        "searching_for"               => "Buscando: ",
        "all_my_updates"              => "Todas mis Actualizaciones",
        "my_favorites"                => "Mis Favoritos",
        "my_content"                  => "Mi Contenido",
    );
