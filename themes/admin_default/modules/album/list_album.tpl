<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="text-center">
            <th class="text-nowrap">Số thứ tự</th>
            <th class="text-nowrap">Tên album</th>
            <th class="text-nowrap">Ảnh</th>
            <th class="text-nowrap">Mô tả</th>
            <th class="text-nowrap">Trạng thái</th>
            <th class="text-nowrap text-center">Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <!-- BEGIN: loop -->
        <tr class="text-center">
            <td class="">{ROW.stt}</td>
            <td class="">{ROW.name_album}</td>
            <td class="">
                <img src="{ROW.image_album}" width="100px" height="100px">
            </td>
            <td class="">{ROW.desc_album}</td>
            <td class="">
                <input onchange="nv_change_active({ROW.id})" type="checkbox" name="active" {ROW.active_album}>
            </td>
            <td class="text-center text-nowrap">
                <a href="{ROW.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>Sửa</a>
                <a href="{ROW.url_delete}" class="btn btn-danger btn-sm delete"><i class="fa fa-edit"></i>Xoá</a>
            </td>
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->