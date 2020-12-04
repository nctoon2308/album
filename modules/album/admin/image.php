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

$post = [];
$error = [];
$upload_info =[];


//xu ly anh
if ($nv_Request->isset_request('submit', 'post') and isset($_FILES, $_FILES['image'], $_FILES['image']['tmp_name']) and is_uploaded_file($_FILES['image']['tmp_name'])) {
    //
    $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);

    $upload->setLanguage($lang_global);

    $upload_info = $upload->save_file($_FILES['image'], NV_UPLOADS_REAL_DIR.'/'.$module_name, false,$global_config['nv_auto_resize']);

   /* die($upload_info['basename']);*/
}

$post['id'] = $nv_Request->get_int('id','post,get','0');
$post['id_album'] = $nv_Request->get_int('id_album','post,get','0');

$post['name_image'] = $nv_Request->get_title('name_image','post','');
$post['image_desc'] = $nv_Request->get_title('image_desc','post','');
$post['image'] = $upload_info['basename'];

$post['submit'] = $nv_Request->get_title('submit','post');



if (!empty($post['submit'])) {
    if (empty($post['name_image'])) {
        $error[] = "Chưa nhập tên";
    }
    if (empty($post['image_desc'])) {
        $error[] = "Chưa nhập mô tả";
    }
  echo "<pre>";
    print_r($post);
    echo "</pre>";
    if (empty($error)) {

            $sql = "INSERT INTO `nv4_md_image` (`id`,`create_at`,`name_image`,`image`,`image_desc`,`id_album`) 
                    VALUES (NULL,:create_at,:name_image,:image,:image_desc,:id_album)";

            $s = $db->prepare($sql);
            $s->bindValue('create_at', NV_CURRENTTIME);
            $s->bindValue('name_image', $post['name_image']);
            $s->bindValue('image', $post['image']);
            $s->bindValue('image_desc', $post['image_desc']);
            $s->bindValue('id_album', $post['id_album']);
        $exe = $s->execute();

        if ($exe) {
            $error[] = "OK";
        } else {
            $error[] = "Lỗi";
        }
    }
    header('Location: '.NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE .
                 '=' .$module_name. '&' . NV_OP_VARIABLE .'=image&id_album_id=' . $post['id_album']);

}elseif ($post['id_album']>0){
    //nếu tồn tại id thì lấy dữ liệu ra
    $sql = "SELECT * FROM `nv4_md_album` WHERE id=".$post['id_album'];
    $post = $db->query($sql)->fetch();
}
//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('image.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('POST', $post);
$xtpl->assign('ERROR',implode('<br>',$error));
if (!empty($error)){
    $xtpl->parse('main.error');
}

//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
