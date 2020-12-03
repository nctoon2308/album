<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 16/6/2010, 10:23
 */

if (! defined('NV_IS_MOD_STATISTICS')) {
    die('Stop!!!');
}

$page_title = $lang_module['os'];
$key_words = $module_info['keywords'];
$mod_title = $lang_module['os'];

$sql = "SELECT COUNT(*), MAX(c_count) FROM " . NV_COUNTER_GLOBALTABLE . " WHERE c_type='os' AND c_count!=0";
$result = $db->query($sql);
list($num_items, $max) = $result->fetch(3);

if ($num_items) {
    $page = $nv_Request->get_int('page', 'get', 1);
    $per_page = 50;
    $base_url = NV_BASE_MOD_URL . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['allos'];

    $db->sqlreset()
        ->select('c_val,c_count, last_update')
        ->from(NV_COUNTER_GLOBALTABLE)
        ->where("c_type='os' AND c_count!=0")
        ->order('c_count DESC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);

    $result = $db->query($db->sql());

    $os_list = array();
    while (list($os, $count, $last_visit) = $result->fetch(3)) {
        $last_visit = ! empty($last_visit) ? nv_date('l, d F Y H:i', $last_visit) : '';
        $os_list[$os] = array( $count, $last_visit );
    }

    if (! empty($os_list)) {
        $cts = array();
        $cts['thead'] = array( $lang_module['os'], $lang_module['hits'], $lang_module['last_visit'] );
        $cts['rows'] = $os_list;
        $cts['max'] = $max;
        $cts['generate_page'] = nv_generate_page($base_url, $num_items, $per_page, $page);
    }
    if ($page > 1) {
        $page_title .= NV_TITLEBAR_DEFIS . $lang_global['page'] . ' ' . $page;
    }

    $contents = nv_theme_statistics_allos($num_items, $os_list, $cts);
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
