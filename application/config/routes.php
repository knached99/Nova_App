<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Dash/my_dash';
$route['editprofile'] = 'Dash/edit_profile';
$route['editaccount'] = 'Dash/edit_account';
$route['editsocial'] = 'Dash/edit_social';
/*$route['viewartist/(:any)'] = 'Dash/artist/';*/
$route['wallet'] = 'Dash/wallet';
$route['lyrics'] = 'Dash/lyrics';
$route['releases'] = 'Dash/releases';
$route['createrelease'] = 'Dash/release_create';
$route['lyrics'] = 'Dash/lyrics';
$route['analytics'] = 'Dash/analytics';
$route['deals'] = 'Dash/deals';
$route['engineering'] = 'Dash/engineering';
$route['lyrics'] = 'Dash/lyrics';
$route['collaborations'] = 'Dash/collaborations';
$route['opportunities'] = 'Dash/opportunities';
$route['search_artist'] = 'Dash/search_artist';

$route['trending'] = 'Dash/trending';
$route['artists'] = 'Dash/artists';
$route['news'] = 'Dash/news';
$route['verificationprogram'] = 'Dash/verificationprogram';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;