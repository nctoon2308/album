<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning" role="alert">{ERROR}</div>
<!-- END: error -->
<form  enctype="multipart/form-data" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" name="{MODULE_NAME}">
    <div class="form-group">
        <h1><b>Thêm ảnh</b></h1>
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