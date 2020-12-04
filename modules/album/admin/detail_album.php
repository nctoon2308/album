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

$page_title = $lang_module['main'];

$post['id'] = $nv_Request->get_int('id','post,get','0');
$db->sqlreset()
    ->select('*')
    ->from($db_config['prefix'].'_'.'md_album')
    ->where('id='.$post['id']);
$sql = $db->sql();
$result = $db->query($sql);

while ($row = $result->fetch()){
    /*  echo "<pre>";
       print_r($row);
       echo "</pre>";*/
    $array_row[$row['id']] = $row;

}
/*echo "<pre>";
print_r($array_row);
echo "</pre>";*/


//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('detail_album.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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

    $i = 0;
    foreach ($array_row as $row){

        $row['stt'] = $i+1;

        if (!empty($row['id'])){
            $j=1;
            $db->sqlreset()
                ->select('*')
                ->from($db_config['prefix'].'_'.'md_image')
                ->where('id_album='.$row['id']);
            $sql = $db->sql();
            $result2 = $db->query($sql);
            while ($row2 = $result2->fetch()){

                $row['name_image'] = $row2['name_image'];
                $row['image_desc'] = $row2['image_desc'];
                $row['stt_image'] = $j;
                $row['image'] = $row2['image'];
                if (!empty($row['image']))
                    $row['image'] = NV_BASE_SITEURL.NV_UPLOADS_DIR.'/'.$module_name.'/'. $row['image'];
                $xtpl->assign('ROW2',$row);
                $xtpl->parse('main.loop.zz');
                $j++;
            }

        }


        if (!empty($row['image_album']))
            $row['image_album'] = NV_BASE_SITEURL.NV_UPLOADS_DIR.'/'.$module_name.'/'. $row['image_album'];

        $row['url_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=crud_order&amp;id='.$row['id'].'&order_id='.$row['order_id'].'&action=delete&checksess='. md5($row['id'].NV_CHECK_SESSION) ;
        $row['url_add_image'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=image&amp;id_album='.$row['id'];

        $xtpl->assign('ROW',$row);
        $xtpl->parse('main.loop');
        $i++;

    }
}
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
