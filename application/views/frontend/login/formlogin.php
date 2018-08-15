<div class="container">
    <div class="row" style="margin-top:  15px;">
        <div class="col-md-12 col-sm-12">
            <div class="row box_search">
                <div class="box_header">
                    <span>
                        <span class="font_titlehead"><i class="fa fa-signin" aria-hidden="true"></i> เข้าสู่ระบบ</span>
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-row top_15">      
                            <input id="login_username" class="form-control" type="text" placeholder="username" required autofocus>
                        </div>
                        <div class="input-row top_15">  
                            <input id="login_password" class="form-control" type="password" placeholder="password" required>
                        </div>
                        <div class="row text-center top_15">  
                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            <button type="submit" onClick="Login()"  class="btn btn-primary">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    var url = "<?php echo base_url(); ?>";
    
    function Login(){
        
        var user = $('#login_username').val();
        var pass = $('#login_password').val();
        //alert('in');
        $.ajax({
            url: url + 'Login/CheckLogin',
            data:{
                username:user ,
                password:pass
            },
            type: 'post',
            success: function(response)
            {
                //
               //console.log(response);

                var data = JSON.parse(response);
                if(data.status == true){
                    alert('เข้าสู่ระบบเรียบร้อยค่ะ');

                    window.location.href = url + "Manage/PageManage";

                }else if(data.status == 'password'){
                    alert('กรุณากรอก Password');
                }else if(data.status == 'username'){
                    alert('กรุณากรอก Username');
                }else{
                    alert('กรุณาตรวจสอบ Username และ Password อีกครั้ง');
                }

            }


        });
    }
</script>