<!-- BEGIN: main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- BEGIN: loop -->
<div class="row">
    <div class="col-md-16">
        <table class="table table-striped table-bordered table-hover">
            <caption>Thông tin album: {ROW.name_album}</caption>
            <tr>
                <td>Số ID</td>
                <td>{ROW.id}</td>
            </tr>
            <tr>
                <td>Tên album: </td>
                <td>{ROW.name_album}</td>
            </tr>
            <tr>
                <td>Mô tả album: </td>
                <td>{ROW.desc_album}</td>
            </tr>
            <tr>
                <td>Ảnh đại diện: </td>
                <td><img src="{ROW.image_album}" alt="" width="100"></td>
            </tr>
        </table>
    </div>
</div>

<div class="col-md-24 col-lg-24"  style="min-height: 1000px">
    <h2>Slideshow album {ROW.name_album}</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <img src="/album/uploads/album/img_0615_1.jpg" alt="Los Angeles">
            </div>
            <!-- BEGIN: zz -->
            <div class="item">
                <img src="{ROW2.image}" alt="New york">
            </div>
            <!-- END: zz -->
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- END: loop -->
<!-- END: main -->