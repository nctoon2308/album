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
if ($nv_Request->isset_request('submit', 'post') and isset($_FILES, $_FILES['image_album'], $_FILES['image_album']['tmp_name']) and is_uploaded_file($_FILES['image_album']['tmp_name'])) {
    //
    $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);

    $upload->setLanguage($lang_global);

    $upload_info = $upload->save_file($_FILES['image_album'], NV_UPLOADS_REAL_DIR.'/'.$module_name, false,$global_config['nv_auto_resize']);

   /* die($upload_info['basename']);*/
}

$post['id'] = $nv_Request->get_int('id','post,get','0');


$post['name_album'] = $nv_Request->get_title('name_album','post','');
$post['active_album'] = $nv_Request->get_int('active_album','post','1');
$post['desc_album'] = $nv_Request->get_title('desc_album','post','');
$post['image_album'] = $upload_info['basename'];

$post['submit'] = $nv_Request->get_title('submit','post');

/*echo "<pre>";
print_r($post);
echo "</pre>";*/
if (!empty($post['submit'])) {
    if (empty($post['name_album'])) {
        $error[] = "Chưa nhập tên";
    }
    if (empty($post['desc_album'])) {
        $error[] = "Chưa nhập mô tả";
    }

    if (empty($error)) {
        if ($post['id'] > 0) {
            //UPDATE
            $sql = "UPDATE `nv4_md_album` SET `name_album`=:name_album,`image_album`=:image_album,`desc_album`=:desc_album,
            `active_album`=:active_album,`update_at`=:update_at WHERE id =".$post['id'];
            $s = $db->prepare($sql);
            $s->bindValue('update_at',NV_CURRENTTIME);
        } else {
            $sql = "INSERT INTO `nv4_md_album`(`id`, `name_album`, `image_album`, `desc_album`, `active_album`, `create_at`) 
            VALUES (NULL,:name_album,:image_album,:desc_album,:active_album, :create_at)";
            $s = $db->prepare($sql);
            $s->bindValue('create_at', NV_CURRENTTIME);
        }
        $s->bindParam('name_album', $post['name_album']);
        $s->bindParam('active_album', $post['active_album']);
        $s->bindParam('desc_album', $post['desc_album']);
        $s->bindParam('image_album', $post['image_album']);

        $exe = $s->execute();

        if ($exe) {
            $error[] = "OK";
        } else {
            $error[] = "Khong insert dc";
        }
    }

}elseif ($post['id']>0){
    //nếu tồn tại id thì lấy dữ liệu ra
    $sql = "SELECT * FROM `nv4_md_album` WHERE id=".$post['id'];
    $post = $db->query($sql)->fetch();

} else{
        $post['name_album'] = "";
        $post['active_album'] = "";
        $post['category_desc'] = "";
}

//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('album.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
