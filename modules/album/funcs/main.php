<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 10 Nov 2020 06:56:08 GMT
 */

if (!defined('NV_IS_MOD_ALBUM')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];

//------------------
// Viết code vào đây

//phan trang
$page_title = $lang_module['main'];

$perpage = 5;
$page = $nv_Request->get_int('page','get',1);

$db->sqlreset()
    ->select('COUNT(*)')
    ->from($db_config['prefix'].'_'.'md_album')
    ->where('	active_album = 1');
$sql = $db->sql();
$total = $db->query($sql)->fetchColumn();

$db->select('*')
    ->order('id ASC')
    ->limit($perpage)
    ->offset(($page-1)*$perpage);

$sql = $db->sql();
$result = $db->query($sql);
while ($row = $result->fetch()){
    $array_data[$row['id']] = $row;
}
/*
 * $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name.'&amp;' . NV_OP_VARIABLE . '=main';
 */
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name.'&amp;' . NV_OP_VARIABLE . '=main';
$generate_page=nv_generate_page($base_url,$total,$perpage,$page);
$page_title = $lang_module['main'];
//------------------

$contents = nv_theme_album_main($array_data, $generate_page, $page, $perpage );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
