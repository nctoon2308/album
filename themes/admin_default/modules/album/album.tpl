<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning" role="alert">{ERROR}</div>
<!-- END: error -->
<form  enctype="multipart/form-data" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" name="{MODULE_NAME}">
    <div class="form-group">
        <h1><b>Tạo mới album</b></h1>
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <label for="name_album">Tên album:</label>
            <input type="text" name="name_album" class="form-control" id="name_album" value="">
        </div>
        <div class="form-group">
            <label for="active-album">Trạng thái album:</label>
            <select name="active_album" id="">
                <option value="1">Hiển thị</option>
                <option value="2">Ẩn</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image_album">Ảnh album:</label>
            <input type="file" class="form-control" name="image_album" id="image_album" value="">
        </div>
        <div class="form-group">
            <label for="desc_album">Mô tả album:</label>
            <textarea name="desc_album" class="form-control" id="desc_album"  rows="10"></textarea>
        </div>
        <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
    </div>
</form>
<!-- END: main -->