<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        const baseurl = "<?php echo base_url();?>";
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test_gary_chen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>css/gary.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/gary.js?id=<?= date("YmdHis"); ?>"></script>
</head>

<body>
    <div class="content ml-auto">
        <div class='col-md-10 mt-5 mx-auto px-5'>
            <form class="form-signin">
                <div class="form-label-group">
                    <label for="account">帳號</label>
                    <input type="text" id="account" class="form-control" placeholder="abc123..." autofocus>
                </div>
                <div class="form-label-group">
                    <label for="name">姓名</label>
                    <input type="text" id="name" class="form-control" placeholder="王大明">
                </div>
                <div class="form-label-group">
                    <label for="sex">性別</label>
                    <select id="sex" class="form-control">
                        <option selected='selected' value='1'>男士</option>
                        <option value='0'>女士</option>
                    </select>
                </div>
                <div class="form-label-group">
                    <label for="birthday">生日</label>
                    <input type="date" id="birthday" class="form-control" placeholder="Email address" required>
                </div>
                <div class="form-label-group">
                    <label for="email">信箱</label>
                    <input type="email" id="email" class="form-control" placeholder="abc@gmail.com" required>
                </div>
                <div class="form-label-group">
                    <label for="note">備註</label>
                    <textarea id="note" class="form-control" placeholder="內容"></textarea>
                </div>
                <div class="form-label-group mt-3 text-center">
                    <button type='button' class="btn btn-primary register_btn">註冊</button>
                    <button type='button' class="btn btn-primary want_login_btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">我已有帳號要登入</button>
                </div>
                <p class="mt-5 mb-3 text-muted text-center">&copy; gary_chen @ 2022</p>
            </form>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>