<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo LINK; ?>">หน้าหลัก</a>
    </li>
    <li class="breadcrumb-item active">เบิกอะไหล่</li>
</ol>

<div class="row">
    <div class="col-12">
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#paytran">รายการอะไหล่จากคลังพัสดุ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rcvtran">รายการอะไหล่ที่นำเข้า</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="paytran" class="container tab-pane active">
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="box_bg">
                                <div class="fontbox_heading">
                                ตารางเครื่องมือแพทย์
                                </div>

                                <div class="box_table_scroll">
                                    <form action="GetBarcode" method="post">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th style="text-align: center;">
                                                    <button type="button" onclick="insert_rcv()" class="btn btn-info">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> เบิก
                                                    </button>
                                               </th>
                                                <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                                                <th>NO_REC</th>
                                                <th>TRNDATE</th>
                                                <th>BILLNO</th>
                                                <th>CODE_DP</th>
                                                <th>CODE_ST</th>
                                                <th>REMARK</th>
                                                <th>PRC</th>
                                                <th>USER_NAME</th>
                                                <th>USER_DATE</th>
                                                <th>PERIOD</th>
                                                <th>AMOUNT</th>
                                                <th>CTRL</th>
                                                <th>ID</th>
                                                <th>TYPEMT</th>
                                                <th>INSTOCK</th>
                                                <th>CODE_GP</th>
                                                <th>DATEWANT</th>
                                            </tr>
                                            </thead>
                                                <tbody>
                                                    <?php 
                                                   // _print_r($paytran_list);
                                                    if($paytran_list['status'] == true){
                                                    ?>

                                                        <?php  foreach($paytran_list['data'] as $value) { ?>
                                                            <tr>
                                                                <td style="text-align: center;"> 
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" value="<?php echo $value['BILLNO']; ?>" id="checkpaytran_<?php echo $value['BILLNO']; ?>" class="custom-control-input">
                                                                        <span class="custom-control-indicator"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-warning" onClick="Detailpaytran('<?php echo $value['BILLNO']; ?>')" data-toggle="modal" data-target="#Detailpaytran">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['NO_REC'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['TRNDATE']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['BILLNO']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['CODE_DP']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['CODE_ST'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['REMARK']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['PRC']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['USER_NAME']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['USER_DATE']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['PERIOD']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['AMOUNT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['CTRL']; ?>
                                                                </td>                                                   
                                                                <td>
                                                                    <?php echo $value['ID']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['TYPEMT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['INSTOCK']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['CODE_GP']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['DATEWANT']; ?>
                                                                </td>                                                                                            
                                                            </tr>
                                                        <?php }?> 

                                                    <?php 
                                                        }else{
                                                    ?>
                                                         <tr>
                                                            <td colspan="18" style=" text-align: center;">
                                                                -ไม่มีข้อมูล-
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                   
                                                       
                                                </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div id="rcvtran" class="container tab-pane fade">
                
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="box_bg">
                                <div class="fontbox_heading">
                                ตารางเครื่องมือแพทย์
                                </div>

                                <div class="box_table_scroll">
                                    <form action="GetBarcode" method="post">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th style="text-align: center;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                                                <th>รายละเอียด</th>
                                                <th>RCV_BILLNO</th>
                                                <th>RCV_BILLDATE</th>
                                                <th>RCV_SupCode</th>
                                                <th>RCV_NO</th>
                                                <th>RCV_DATE</th>
                                                <th>RCV_REF_NO</th>
                                                <th>RCV_SEC</th>
                                                <th>RCV_CODE_ST</th>
                                                <th>RCV_TYPE</th>
                                                <th>RCV_AMOUNT</th>
                                                <th>RCV_AMOUNTVAT</th>
                                                <th>RCV_DISCOUNT</th>
                                                <th>RCV_DISCAMT</th>
                                                <th>RCV_VAT</th>
                                                <th>RCV_VAT_AMT</th>
                                                <th>RCV_REMARK</th>
                                                <th>RCV_PERIOD</th>
                                                <th>RCV_STATUS</th>
                                                <th>RCV_ID</th>
                                                <th>RCV_TOTNET</th>
                                                <th>User_Create</th>
                                                <th>Time_Create</th>
                                                <th>Date_Create</th>
                                                <th>Comp_Create</th>
                                                <th>User_Update</th>
                                                <th>Time_Update</th>
                                                <th>Date_Update</th>
                                                <th>Comp_Update</th>
                                                <th>User_Cancel</th>
                                                <th>Time_Cancel</th>
                                                <th>Date_Cancel</th>
                                                <th>Comp_Cancel</th>


                                            </tr>
                                            </thead>
                                                <tbody>
                                                    <?php 
                                                    // _print_r($rcvtran_list);
                                                    if($rcvtran_list['status'] == true){
                                                    ?>

                                                        <?php  foreach($rcvtran_list['data'] as $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <i class="fa fa-times" aria-hidden="true"></i> ลบ
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-warning" onClick="Detailrcvtran('<?php echo $value['RCV_BILLNO']; ?>')" data-toggle="modal" data-target="#Detailpaytran">
                                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_BILLNO'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_BILLDATE']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_SupCode']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_NO']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_DATE'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_REF_NO']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_SEC']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_CODE_ST']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_TYPE']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_AMOUNT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_AMOUNTVAT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_DISCOUNT']; ?>
                                                                </td>                                                   
                                                                <td>
                                                                    <?php echo $value['RCV_DISCAMT']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['RCV_VAT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_VAT_AMT']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_REMARK']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['RCV_PERIOD']; ?>
                                                                </td>     
                                                                <td>
                                                                    <?php echo $value['RCV_STATUS']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['RCV_ID']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['RCV_TOTNET']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['User_Create']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['Time_Create']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['Comp_Create']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['User_Update']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['Time_Update']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['Date_Update']; ?>
                                                                </td> 
                                                                <td>
                                                                    <?php echo $value['Comp_Update']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['Date_Update']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['User_Cancel']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['Time_Cancel']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['Date_Cancel']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['Comp_Cancel']; ?>
                                                                </td>


                                                            </tr>
                                                        <?php }?> 

                                                    <?php 
                                                        }else{
                                                    ?>
                                                            <tr>
                                                            <td colspan="18" style=" text-align: center;">
                                                                -ไม่มีข้อมูล-
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                        
                                                </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="Detailpaytran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box_bg">
            <div class="fontbox_heading">
            ตารางรายละเอียดเครื่องมือแพทย์
            </div>
            <div style="overflow-x:  scroll;" id="bodytabledetail">
                <table class="table table-striped table-bordered table-condensed">
                    <thead class="thead-inverse">
                        <tr style="background-color: #4f75a2;color: white;" id="headDetail"></tr>
                    </thead> 
                    <tbody id="showDetail"></tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<script>

    var url = "<?php echo base_url(); ?>";
    var input_pay = [];
    $(document).ready(function(){

        // $("input[type=checkbox]").click(function(event){
        //     var id = this.id;
        //     alert(id);
        // });
    });


    function check_checkbox(){
        var sList ="";
        input_pay = [];
        $("input[type=checkbox]").each(function() {

            if(this.checked){
                input_pay.push(this.value)
            }

             //sList += "(" + $(this).val() + "-" + (this.checked ? "checked" : "not checked") + ")";

        });
        //console.log (input_pay);
        var data ={
            BILLNO :input_pay
        }
        $.ajax({
            url: 'http://172.17.8.144/tools/tools_restserver/parts/Insert_rcvtran',
            data:data,
            type:'post',
            success:function(response)
            {
                //var data = JSON.parse(response);

                var data = response;
                //console.log(response);
                if(data.status == true){
                    alert('เบิกอะไหล่เรียบร้อยแล้ว');
                    window.location.reload();
                }else if(data.status == 'duplicate'){
                    alert('ข้อมูลซ้ำ');
                    window.location.reload();
                }else{
                    alert('ไม่สามารถเบิกอะไหล่ได้');
                    //window.location.reload();
                }
            }

        });
    }

    function insert_rcv(){
        check_checkbox();
    }

    function Detailpaytran(billno){
        //alert(billno);
        var data = {
            name :billno
        };
        $.ajax({
            url: url + 'PickupSpare/PickupDetailPaytran',
            data: data,
            type: "post",
            success: function (response)
            {

                var detailpaytran = JSON.parse(response);

                $("#showDetail").empty();
                $("#headDetail").empty();
                if(detailpaytran.status == true){
                    console.log(detailpaytran.data);
                    var data = detailpaytran.data;
                    if(data.length >0){

                        $("#headDetail").append('<th>BILLNO</th><th>MT_CODE</th><th>NUM</th><th>PRICE</th><th>TRNDATE</th><th>CTRL</th><th>PERIOD</th><th>ST_NOW</th><th>ID</th><th>CODE_ST</th><th>USER_NAME</th><th>USER_DATE</th><th>BALAMT</th><th>no_rec</th><th>mt_name</th><th>mt_unit</th>');

                        for(i=0; i < data.length; i++){
                            var test = data[i]['BILLNO'];
                            //alert(test);
                            $("#showDetail").append('<tr>');
                            $("#showDetail").append('<tr>'
                                    + '<td>' + data[i]['BILLNO'] + '</td>'
                                    + '<td>' + data[i]['MT_CODE'] + '</td>'
                                    + '<td>' + data[i]['NUM'] + '</td>'
                                    + '<td>' + data[i]['PRICE'] + '</td>'
                                    + '<td>' + data[i]['TRNDATE'] + '</td>'
                                    + '<td>' + data[i]['CTRL'] + '</td>'
                                    + '<td>' + data[i]['PERIOD'] + '</td>'
                                    + '<td>' + data[i]['ST_NOW'] + '</td>'
                                    + '<td>' + data[i]['ID'] + '</td>'
                                    + '<td>' + data[i]['CODE_ST'] + '</td>'
                                    + '<td>' + data[i]['USER_NAME'] + '</td>'
                                    + '<td>' + data[i]['USER_DATE'] + '</td>'
                                    + '<td>' + data[i]['BALAMT'] + '</td>'
                                    + '<td>' + data[i]['no_rec'] + '</td>'
                                    + '<td>' + data[i]['mt_name'] + '</td>'
                                    + '<td>' + data[i]['mt_unit'] + '</td>'
                                    + '</tr>');
                        }
                    }else{
                        $("#showDetail").append('<tr>'
                                    + '<td colspan="16">' + "-ไม่มีข้อมูล-" + '</td>'
                                    + '</tr>');
                    }
                }else{
                    $("#showDetail").append('<div class="nodata">'+ "-ไม่มีข้อมูล-" + '</div>');
                }
            }
        });
    }

    function Detailrcvtran(billno){
        //alert(billno);
        var data = {
            name :billno
        };
        $.ajax({
            url: url + 'PickupSpare/PickupDetailRcvtran',
            data: data,
            type: "post",
            success: function (response)
            {

                var detailrcvtran = JSON.parse(response);
               //console.log(detailrcvtran);
                $("#showDetail").empty();
                $("#headDetail").empty();
                if(detailrcvtran.status == true){
                    console.log(detailrcvtran.data);
                    var data = detailrcvtran.data;
                    if(data.length >0){

                        $("#headDetail").append('<th>RCVD_NO</th><th>RCVD_DATE</th><th>RCVD_BILLNO</th><th>RCVD_MT_CODE</th><th>RCVD_QTY</th><th>RCVD_PRICE</th><th>RCVD_ORD_QTY</th><th>RCVD_STATUS</th><th>RCVD_VAT</th><th>RCVD_VAT_AMT</th><th>RCVD_PERIOD</th><th>RCVD_CODE_ST</th><th>RCVD_BALANCE</th><th>RCVD_ST_NOW</th><th>RCVD_REF_ID</th><th>RCVD_ID</th><th>User_Create</th><th>Time_Create</th><th>Date_Create</th><th>Comp_Create</th><th>User_Update</th><th>Time_Update</th><th>Date_Update</th><th>Comp_Update</th><th>User_Cancel</th><th>Time_Cancel</th><th>Date_Cancel</th><th>Comp_Cancel</th>');

                        for(i=0; i < data.length; i++){
                            var test = data[i]['BILLNO'];
                            //alert(test);
                            $("#showDetail").append('<tr>');
                            $("#showDetail").append('<tr>'
                                    + '<td>' + data[i]['RCVD_NO'] + '</td>'
                                    + '<td>' + data[i]['RCVD_DATE'] + '</td>'
                                    + '<td>' + data[i]['RCVD_BILLNO'] + '</td>'
                                    + '<td>' + data[i]['RCVD_MT_CODE'] + '</td>'
                                    + '<td>' + data[i]['RCVD_QTY'] + '</td>'
                                    + '<td>' + data[i]['RCVD_PRICE'] + '</td>'
                                    + '<td>' + data[i]['RCVD_ORD_QTY'] + '</td>'
                                    + '<td>' + data[i]['RCVD_STATUS'] + '</td>'
                                    + '<td>' + data[i]['RCVD_VAT'] + '</td>'
                                    + '<td>' + data[i]['RCVD_VAT_AMT'] + '</td>'
                                    + '<td>' + data[i]['RCVD_PERIOD'] + '</td>'
                                    + '<td>' + data[i]['RCVD_CODE_ST'] + '</td>'
                                    + '<td>' + data[i]['RCVD_BALANCE'] + '</td>'
                                    + '<td>' + data[i]['RCVD_ST_NOW'] + '</td>'
                                    + '<td>' + data[i]['RCVD_REF_ID'] + '</td>'
                                    + '<td>' + data[i]['RCVD_ID'] + '</td>'
                                    + '<td>' + data[i]['User_Create'] + '</td>'
                                    + '<td>' + data[i]['Time_Create'] + '</td>'
                                    + '<td>' + data[i]['Date_Create'] + '</td>'
                                    + '<td>' + data[i]['Comp_Create'] + '</td>'
                                    + '<td>' + data[i]['User_Update'] + '</td>'
                                    + '<td>' + data[i]['Time_Update'] + '</td>'
                                    + '<td>' + data[i]['Date_Update'] + '</td>'
                                    + '<td>' + data[i]['Comp_Update'] + '</td>'
                                    + '<td>' + data[i]['User_Cancel'] + '</td>'
                                    + '<td>' + data[i]['Time_Cancel'] + '</td>'
                                    + '<td>' + data[i]['Date_Cancel'] + '</td>'
                                    + '<td>' + data[i]['Comp_Cancel'] + '</td>'
                                    + '</tr>');
                        }
                    }else{
                        $("#showDetail").append('<tr>'
                                    + '<td colspan="28">' + "-ไม่มีข้อมูล-" + '</td>'
                                    + '</tr>');
                    }
                }else{
                    $("#showDetail").append('<div class="nodata">'+ "-ไม่มีข้อมูล-" + '</div>');
                }

            }
        });
    }

</script>