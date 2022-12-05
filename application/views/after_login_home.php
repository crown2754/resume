<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        const baseurl = "<?php echo base_url(); ?>";
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test_gary_chen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/gary.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>js/gary_after_login.js?id=<?= date("YmdHis"); ?>"></script>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <div class="content ml-auto">
        <div class='col-md-12 mt-5 mx-auto px-5 row'>
            <h1 class='col-10'>歡迎登入</h1>
            <a class='col-2' href='<?php echo base_url(); ?>M_home/loginOut' class="btn btn-primary register_btn">登出</a>
        </div>
        <hr class='w-100' />
        <div class='col-md-10 mt-5 mx-auto px-5 row'>
            <button type="button" class="btn btn-primary del_details_btn ml-1">批次刪除</button>
            <button type="button" class="btn btn-primary update_details_btn ml-1">批次修改</button>
            <button type="button" class="btn btn-primary output_details_btn ml-1">批次匯出</button>
        </div>
        <div id='content_div' class='col-md-11 mt-5 mx-auto'>
            <table class="table is-striped" id="all_details">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">帳號</th>
                        <th scope="col">姓名</th>
                        <th scope="col">性別</th>
                        <th scope="col">生日</th>
                        <th scope="col">信箱</th>
                        <th scope="col">備註</th>
                        <th scope="col">刪除</th>
                        <th scope="col">更改</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>