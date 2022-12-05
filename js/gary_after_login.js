$(document).ready(function () {
    loadAllDetails();
    setAllbuttonActions();
});

function setAllbuttonActions() {
    $(".del_details_btn").attr("onclick", "delDetails()");
    $(".output_details_btn").attr("onclick", "outputDetails()");
    $(".update_details_btn").attr("onclick", "updateDetails()");
}

function buildTable(data) {
    $('#all_details').DataTable({
        data: data,
        columns: [{
            data: 'account_info_seq',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<input>', {
                    type: 'checkbox',
                    value: data,
                    name: 'check_btn[]',
                    class: 'check_btn',
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }
        }, {
            data: 'account'
        }, {
            data: 'name',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<input>', {
                    type: 'text',
                    value: data,
                    id: "name_" + row.account_info_seq,
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'sex',
            render: function (data, type, row, meta) {
                if (data == '1') {
                    var $btn = '<select id="' + "sex_" + row.account_info_seq + '"><option selected value="1">男</option><option value="0">女</option></select>';
                } else {
                    var $btn = '<select id="' + "sex_" + row.account_info_seq + '"><option value="1">男</option><option selected value="0">女</option></select>';
                }
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'birthday',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<input>', {
                    type: 'date',
                    value: data,
                    id: "birthday_" + row.account_info_seq,
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'email',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<input>', {
                    type: 'text',
                    value: data,
                    id: "email_" + row.account_info_seq,
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'note',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<input>', {
                    type: 'text',
                    value: data,
                    id: "note_" + row.account_info_seq,
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'account_info_seq',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<button>', {
                    text: '刪除',
                    class: 'btn btn-outline-secondary bi bi-file-earmark-plus',
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    delAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }, {
            data: 'account_info_seq',
            render: function (data, type, row, meta) {
                var $btn = '';
                $btn = $('<button>', {
                    text: '更改',
                    class: 'btn btn-outline-secondary bi bi-file-earmark-plus',
                }).prop('outerHTML');
                return $btn
            },
            createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('.btn').on('click', function () {
                    updateAccount(rowData['account_info_seq']);
                })
            }, width: "5%"
        }]
    });

}

function loadAllDetails() {
    let ajax_data = {
        'url': baseurl + 'M_home/loadAllDetails',
        'type': 'POST',
        'dataType': 'json',
        'cache': false,
        'async': true,
        'contentType': false,
        'processData': false
    };
    let post_data = {
        method: 'loadAllDetails'
    };
    myAjaxPost(ajax_data, post_data);
}

function delAccount(account_info_seq) {
    if (confirm('確認要刪除此帳號嗎?')) {
        let ajax_data = {
            'url': baseurl + 'M_home/delAccount',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'delAccount',
            account_info_seq: account_info_seq,
        };
        myAjaxPost(ajax_data, post_data);
    }
}

function updateAccount(account_info_seq) {
    if (confirm('確認要修正嗎?')) {
        let ajax_data = {
            'url': baseurl + 'M_home/updateAccount',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'updateAccount',
            account_info_seq: account_info_seq,
            account: $("#account_" + account_info_seq).val(),
            name: $("#name_" + account_info_seq).val(),
            sex: $("#sex_" + account_info_seq).val(),
            birthday: $("#birthday_" + account_info_seq).val(),
            email: $("#email_" + account_info_seq).val(),
            note: $("#note_" + account_info_seq).val()
        };
        myAjaxPost(ajax_data, post_data);
    }
}

function updateAccount2(account_info_seq) {
        let ajax_data = {
            'url': baseurl + 'M_home/updateAccount2',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'updateAccount2',
            account_info_seq: account_info_seq,
            account: $("#account_" + account_info_seq).val(),
            name: $("#name_" + account_info_seq).val(),
            sex: $("#sex_" + account_info_seq).val(),
            birthday: $("#birthday_" + account_info_seq).val(),
            email: $("#email_" + account_info_seq).val(),
            note: $("#note_" + account_info_seq).val()
        };
        myAjaxPost(ajax_data, post_data);
}

function delDetails() {
    var check_btn = $("input[name='check_btn[]']:checked").map(
        function () {
            return $(this).val();
        }
    ).get();

    if (confirm('確認要刪除這些帳號嗎?')) {
        let ajax_data = {
            'url': baseurl + 'M_home/delDetails',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'delDetails',
            account_info_seq_arr: check_btn
        };
        myAjaxPost(ajax_data, post_data);
    }
}

function updateDetails() {
    if (confirm('確認要批次修改這些帳號嗎?')) {
        var check_btn = $("input[name='check_btn[]']:checked").map(
            function () {
                return $(this).val();
            }
        ).get();
        check_btn.forEach(function (value) {
            updateAccount2(value);
        });
        alert("更改完成！");
        window.location.reload();
    }
}

function outputDetails() {
    var check_btn = $("input[name='check_btn[]']:checked").map(
        function () {
            return $(this).val();
        }
    ).get();

    if (confirm('確認要匯出這些資料嗎?')) {
        let ajax_data = {
            'url': baseurl + 'M_home/outputDetails',
            'type': 'POST',
            'dataType': 'html',
            'cache': false,
            'async': true,
            'contentType': false,
            'processData': false
        };
        let post_data = {
            method: 'outputDetails',
            account_info_seq_arr: check_btn
        };
        myAjaxPost(ajax_data, post_data);
    }
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
                ['default', () => { }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        },
        complete: function () {
            const actions = new Map([
                ['default', () => { }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        },
        success: function (data) {
            const actions = new Map([
                ['loadAllDetails', () => { afterLoadAllDetails(data) }],
                ['delAccount', () => { afterDelAccount(data) }],
                ['delDetails', () => { afterDelDetails(data) }],
                ['updateAccount', () => { afterUpdateAccount(data) }],
                ['outputDetails', () => { afterOutputDetails(data) }],
                ['default', () => { console.log(data) }],
            ]);
            let action = actions.get(post_data['method']) || actions.get('default');
            action.call(this);
        }
    })
}


function afterLoadAllDetails(data) {
    buildTable(data);
}

function afterDelAccount(data) {
    const parm = {
        '1': '刪除成功！'
    };
    typeof parm[data] === "undefined" ? alert("不明錯誤") : alert(parm[data]);
    if (data == '1')
        window.location.reload();
}

function afterUpdateAccount(data) {
    const parm = {
        '1': '修改成功！'
    };
    typeof parm[data] === "undefined" ? alert("不明錯誤") : alert(parm[data]);
    if (data == '1')
        window.location.reload();
}

function afterDelDetails(data) {
    const parm = {
        '1': '刪除成功！'
    };
    typeof parm[data] === "undefined" ? alert("不明錯誤") : alert(parm[data]);
    if (data == '1')
        window.location.reload();
}

function afterOutputDetails(data) {
    downloadTxt(data, "test.txt");
}

function downloadTxt(text, fileName) {
    let element = document.createElement('a')
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text))
    element.setAttribute('download', fileName)
    element.style.display = 'none'
    element.click()
}