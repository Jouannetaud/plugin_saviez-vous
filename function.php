<?php

add_action('admin_menu', 'lien_menu');

function lien_menu()
{
  add_menu_page('Admin saviez-vous', 'Saviez-vous', 'administrator', 'saviez-vous-admin', 'page_block','images/marker.png', 50);
}

function page_block()
{
	include ('content_admin.php');
}
