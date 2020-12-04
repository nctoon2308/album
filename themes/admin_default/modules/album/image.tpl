<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning" role="alert">{ERROR}</div>
<!-- END: error -->
<a href="{POST.url_add_image}" class="btn btn-success btn-md active"><i class="fa fa-edit"></i>Quay lại album {POST.name_album}</a>
<form  enctype="multipart/form-data" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" name="{MODULE_NAME}">
    <div class="form-group">
        <h1><b>Thêm ảnh vào album {POST.name_album}</b></h1>
        <input type="hidden" name="id_album" value="{POST.id}">
        <div class="form-group">
            <label for="name_image">Tên ảnh:</label>
            <input type="text" name="name_image" class="form-control" id="name_image" value="">
        </div>
        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" class="form-control" name="image" id="image" value="">
        </div>
        <div class="form-group">
            <label for="image_desc">Mô tả ảnh:</label>
            <textarea name="image_desc" class="form-control" id="image_desc"  rows="10"></textarea>
        </div>
        <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
    </div>
</form>
<!-- END: main -->