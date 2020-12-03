<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 10 Nov 2020 06:56:08 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['config'];

//phan trang
$page_title = $lang_module['main'];

$perpage = 5;
$page = $nv_Request->get_int('page','get',1);

$db->sqlreset()
    ->select('COUNT(*)')
    ->from($db_config['prefix'].'_'.'md_album');
$sql = $db->sql();
$total = $db->query($sql)->fetchColumn();

$db->select('*')
    ->order('id ASC')
    ->limit($perpage)
    ->offset(($page-1)*$perpage);

$sql = $db->sql();
$result = $db->query($sql);
while ($row = $result->fetch()){
    $array_row[$row['id']] = $row;
}

//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('list_album.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

//-------------------------------
// Viết code xuất ra site vào đây
if (!empty($array_row)){
    $i = ($page-1) * $perpage;
    foreach ($array_row as $row){
        $row['stt'] = $i+1;
        //$row['gender'] = !empty($array_gender[$row['gender']]) ? $array_gender[$row['gender']] : 'null';
        $row['url_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=list_album&amp;id='.$row['id'].'&action=delete&checksess='. md5($row['id'].NV_CHECK_SESSION) ;
        $row['url_edit']   = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=album&amp;id=' . $row['id'];
        $row['active_album'] = $row['active_album'] == 1 ? 'checked=checked' : '';
        /* die();*/
        if (!empty($row['image_album']))
            $row['image_album'] = NV_BASE_SITEURL.NV_UPLOADS_DIR.'/'.$module_name.'/'. $row['image_album'];

        $xtpl->assign('ROW',$row);
        $xtpl->parse('main.loop');
        $i++;
    }
}


$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name.'&amp;' . NV_OP_VARIABLE . '=list';
$generate_page=nv_generate_page($base_url,$total,$perpage,$page);
$xtpl->assign('GENERATE_PAGE',$generate_page);
$xtpl->parse('main.GENERATE_PAGE');
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
