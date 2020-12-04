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

/**
 * nv_theme_album_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_main($array_data , $generate_page, $page, $perpage)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('OP', $op);
    /*
     * $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name.'&amp;' . NV_OP_VARIABLE . '=main';

     */
    if (!empty($array_data)){
        $i = ($page-1) * $perpage;
        foreach ($array_data as $row){
            $row['stt'] = $i+1;
            //$row['gender'] = !empty($array_gender[$row['gender']]) ? $array_gender[$row['gender']] : 'null';
            $row['url_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=detail&amp;id=' . $row['id'];
            $row['url_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' .$module_name. '&amp;' . NV_OP_VARIABLE .'=search&amp;id=' . $row['id'];
            /* die();*/
            if (!empty($row['image_album']))
                $row['image_album'] = NV_BASE_SITEURL.NV_UPLOADS_DIR.'/'.$module_name.'/'. $row['image_album'];

            $xtpl->assign('ROW',$row);
            $xtpl->parse('main.loop');
            $i++;
        }
    }
    if ($generate_page){
        $xtpl->assign('GENERATE_PAGE',$generate_page);
        $xtpl->parse('main.GENERATE_PAGE');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_detail($array_data, $array_row)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây

    if (!empty($array_data)){
        foreach ($array_data as $row){
            if (!empty($array_row)){
                $j=1;
                foreach ($array_row as $row2){
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

            $xtpl->assign('ROW',$row);
            $xtpl->parse('main.loop');
            $i++;

        }
    }
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_search($array_data, $array_row)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây

    if (!empty($array_data)){
        foreach ($array_data as $row){
            if (!empty($array_row)){
                $j=1;
                foreach ($array_row as $row2){
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

            $xtpl->assign('ROW',$row);
            $xtpl->parse('main.loop');
            $i++;

        }
    }
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}
