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

function ami_get_li_template( $type , $index , $total_navs )
{
	if (!!qa_opt(q2a_breadcrumbs_admin::DONT_USE_ICONS)) {

		$li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <span itemprop="title"> {{text}} </span></a></li>';

	    if ($index == $total_navs && (!in_array($type , array('questions' , 'unanswered' , 'users' )) || $index > 1) && qa_opt(q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM)) {
	    	$li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><span itemprop="title"> {{text}} </span></li>';
	    }

	} else {
		$li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><a href="{{url}}" itemprop="url" > <i class="{{icon}}" ></i> <span itemprop="title"> {{text}} </span></a></li>';

	    if ($index == $total_navs && (!in_array($type , array('questions' , 'unanswered' , 'users' )) || $index > 1) && qa_opt(q2a_breadcrumbs_admin::NO_LINK_AT_LAST_ELEM)) {
	    	$li_template = '<li {{class}} itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ><i class="{{icon}}" ></i> <span itemprop="title"> {{text}} </span> </li>';
	    }
		
	}
	
	return $li_template ;
}