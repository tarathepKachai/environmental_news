<style>
    #table_data1 th{
        text-align: center;
    }

</style>
<?php
if (isset($upload)) {
    if ($upload == true) {
        echo "<script> alert('สำเร็จ'); </script>";
    }else{
         echo "<script> alert('อัพโหลดไม่สำเร็จ'); </script>";

    }
}
?>


<div class="container">
    <div class="row top_15">
        <div class="col-sm-3">
            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                <li class="active"><a href="#vtab1" data-toggle="tab">ภาพสไลด์</a></li>
                <li><a href="#vtab2" data-toggle="tab">ข่าวกิจกรรม</a></li>
                <li><a href="#vtab3" data-toggle="tab">Banner</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                    <div class="col-md-12 col-sm-12">
                        <div class="row box_search">
                            <div class="box_header">
                                <span>
                                    <span class="font_titlehead"><i class="fa fa-picture-o" aria-hidden="true"></i> ภาพสไลด์</span>
                                </span>
                            </div>
                            <div class="row"  >
                                <div class="col-md-12" style="text-align:center">
                                    <button class="btn btn-primary" id="upload_button" data-toggle="modal" data-target="#upload_modal" >อัพโหลด</button>
                                </div>
                                <div class="col-md-12" >
                                    <table class="table table-bordered" id="table_data1" style="margin-top:10px" align="center">
                                        <thead>
                                        <th style="width:20%">ชื่อไฟล์</th>
                                        <th style="width:20%">ข้อความ</th>
                                        <th style="width:20%">วันที่อัพโหลด</th>
                                        <th style="width:20%">Preview</th>
                                        <th>action</th>
                                        </thead>
                                        <tbody id="tab_data1">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="vtab2">
                    <div class="col-md-12 col-sm-12">
                        <div class="row box_search">
                            <div class="box_header">
                                <span>
                                    <span class="font_titlehead"><i class="fa fa-file-text" aria-hidden="true"></i> ข่าวกิจกรรม</span>
                                </span>
                            </div>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table table-striped" style="width: 95%" >
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รายการ</th>
                                                    <th>วันที่ประกาศ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                    <div class="col-md-12 col-sm-12">
                        <div class="row box_search">
                            <div class="box_header">
                                <span>
                                    <span class="font_titlehead"><i class="fa fa-file-image-o" aria-hidden="true"></i> Banner</span>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพโหลดรูป</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('Manage/Upload_slide'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div>
                        <input type="file" name="slide_file" id="slide_file">
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        get_slide(baseUrl);

        console.log(baseUrl);

    });

    function get_slide(baseUrl) {
        $.ajax({
            url: baseUrl + "/environmental_news/Manage/Get_slide",
            type: "GET",
            success: function (data) {
                var str = "";
                $.each(data, function (idx, obj) {
                    str += "<tr>";
                    str += "<td>";
                    str += obj.text;
                    str += "</td>";
                    str += "<td>";
                    str += obj.file_name;
                    str += "</td>";
                    str += "<td>";
                    str += obj.date_create;
                    str += "</td>";
                    str += "<td style='text-align:center'>";
                    str += "<a class='btn btn-success btn-sm'>ดูตัวอย่าง</a>";
                    str += "</td>";
                    str += "<td>";
                    str += "<button class='btn btn-success btn-sm'>แก้ไข</button>";
                    str += "<button class='btn btn-success btn-sm'>ลบ</button>";
                    str += "</td>";
                    str += "</tr>";

                });
                $("#tab_data1").html(str);

            }, error: function (xhr, status, error) {

            }
        });
    }


</script>