<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="text-center">
            <th class="text-nowrap">Số thứ tự</th>
            <th class="text-nowrap">Tên album</th>
            <th class="text-nowrap">Ảnh</th>
            <th class="text-nowrap">Mô tả</th>
            <th class="text-nowrap">Chức năng</th>

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
                <div class="row">
                    <a href="{ROW.url_view}" class="btn btn-success btn-md active"><i class="fa fa-edit"></i>Xem chi tiết</a>
                </div>
                <div class="row" style="margin-top: 15px">
                    <a href="{ROW.url_sildeshow}" class="btn btn-primary btn-md active"><i class="fa fa-edit"></i>Xem slideshow</a>
                </div>
            </td>
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- BEGIN: GENERATE_PAGE -->
{GENERATE_PAGE}
<!-- END: GENERATE_PAGE -->
<!-- END: main -->