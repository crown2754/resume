$(document).ready(function () {
    setAllbuttonActions();
    clickEnterSendSubmit();
});

function setAllbuttonActions() {
    $(".register_btn").attr("onclick", "registerAccount()");
    $(".login_btn").attr("onclick", "login()");
}

function clickEnterSendSubmit() {
    $("#account,#name,#sex,#birthday,#email,#note").keypress(function (e) {
        if ((e.keyCode ? e.keyCode : e.which) == 13)
            registerAccount();
    });
    $("#login_account").keypress(function (e) {
        if ((e.keyCode ? e.keyCode : e.which) == 13)
            login();
    });
}

function registerAccount() {
    if (confirm('確認要註冊此帳號嗎?')) {
        let ajax_data = {
            'url': baseurl + 'M_home/registerAccount',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'registerAccount',
            account: $("#account").val(),
            name: $("#name").val(),
            sex: $("#sex").val(),
            birthday: $("#birthday").val(),
            email: $("#email").val(),
            note: $("#note").val()
        };
        myAjaxPost(ajax_data, post_data);
    }
}

function login() {
    let ajax_data = {
        'url': baseurl + 'M_home/login',
        'type': 'POST',
        'dataType': 'html',
        'cache': false,
        'async': true,
        'contentType': false,
        'processData': false
    };
    let post_data = {
        method: 'login',
        account: $("#login_account").val()
    };
    myAjaxPost(ajax_data, post_data);
}

function myAjaxPost(ajax_data, post_data) {
    $.ajax({
        url: ajax_data['url'],
        type: ajax_data['type'],
        dataType: ajax_data['dataType'],
        cache: ajax_data['cache'],
        async: ajax_data['async'],
        data: post_data,
        beforeSend: function () {
            const actions = new Map([
                ['registerAccount', () => { loadingBtn(".register_btn"); }],
                ['login', () => { loadingBtn(".login_btn"); }],
                ['default', () => { }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        },
        complete: function () {
            const actions = new Map([
                ['registerAccount', () => { $(".register_btn").html("註冊"); }],
                ['login', () => { $(".login_btn").html("登入"); }],
                ['default', () => { }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        },
        success: function (data) {
            const actions = new Map([
                ['registerAccount', () => { afterRegisterAccount(data) }],
                ['login', () => { afterLogin(data) }],
                ['default', () => { console.log(data) }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        }
    })
}

function loadingBtn(select_object) {
    $(select_object).html("<i class='fa fa-spinner fa-spin'></i>Loading");
}

function afterRegisterAccount(data) {
    const parm = {
        '1': '註冊成功！',
        '2': '請輸入帳號',
        '3': '請輸入姓名',
        '4': '請選擇性別',
        '5': '請選擇生日',
        '6': '請輸入信箱',
        '7': '請填寫備註',
        '8': '信箱格式不對',
        '9': '帳號格是不正確\n(英文不限大小寫)+數字',
        '10': '帳號已經存在'
    };
    typeof parm[data] === "undefined" ? alert("不明錯誤") : alert(parm[data]);
    if (data === '1')
        window.location.reload();
}

function afterLogin(data) {
    const parm = {
        '1': '登入成功！',
        '2': '請輸入帳號',
        '3': '帳號並不存在'
    };
    typeof parm[data] === "undefined" ? alert("不明錯誤") : alert(parm[data]);
    if (data === '1')
        window.location.reload();
}