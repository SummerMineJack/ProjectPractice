$(function () {
    var currentPage = 1;
    var isLastPage;
    var formTable = $('table#result_table');
    var showPage = 5;
    var showPageOffset = (showPage - 1) / 2;
    var start = 1;
    var end = isLastPage;
    selAll4Page(currentPage);
    getAll();

    $("#pageDown").on("click", function () {
        $('#pageUp').removeAttr("disabled");
        $("#firstPage").removeAttr("disabled");
        currentPage = currentPage + 1;
        selAll4Page(currentPage);
        if (currentPage == 11) {
            $('#pageDown').attr("disabled", true);
        }
    });
    $("#pageUp").on("click", function () {
        $('#pageDown').removeAttr("disabled");
        currentPage = currentPage - 1;
        selAll4Page(currentPage);
        if (currentPage == 1) {
            $('#pageUp').attr("disabled", true);
            $('#firstPage').attr("disabled", true);
        }
    });
    $("#firstPage").on("click", function () {
        selAll4Page(1);
        $('#pageUp').attr("disabled", true);
        $('#firstPage').attr("disabled", true);
        $('#pageDown').removeAttr("disabled");
        $("#endPage").removeAttr("disabled");
    });

    $("#endPage").on("click", function () {
        selAll4Page(isLastPage);
        $('#pageUp').removeAttr("disabled");
        $("#firstPage").removeAttr("disabled");
        $('#pageDown').attr("disabled", true);
        $('#endPage').attr("disabled", true);
    });

    /**
     * 根据页码进行分页查询
     * @param currentPage
     */
    function selAll4Page(currentPage) {
        var ajaxUrl = "doAction.php?action=init_table&p=" + currentPage;
        $.ajax({
            url: ajaxUrl,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result.code == 200) {
                    formTable.find("tr:not(:first)").empty();
                    $.each(result.data, function (i, item) {
                        var data_dom = create_row(result.data[i]);
                        formTable.append(data_dom);
                    })
                }
            },
        });
    };


    /**
     * 获取总条数
     */
    function getAll() {
        var ajaxUrl = "doAction.php?action=get_all";
        $.ajax({
            url: ajaxUrl,
            type: "GET",
            dataType: "json",
            success: function (result) {
                if (result.code == 200) {
                    isLastPage = Math.ceil(result.data[0] / 5);
                    $("#allPage").html(isLastPage);
                    for (var i = 1; i <= isLastPage; i++) {
                        $("#showPageNumber").append("<button  id='" + i + "' onclick='jumpPage4PageNumber(this)' value='" + i + "'>" + i + "</button> ");
                    }
                }
            },
        });
    }

    /**
     * 添加商品操作
     */
    $("#btn_add").on("click", function () {
        //新增一行数据
        var newRow = $("<tr></tr>");
        newRow.append("<td><a href='http://www.baidu.com'></a></td>");
        //获取头部表单的新增商品值
        var ajaxUrl = "doAction.php?action=add_row";
        var productName = $("#product_name").val();
        var productPrice = $("#product_price").val();
        var productTip = $("#product_tip").val();
        var productImg = $("#product_img").val();
        var products = {};
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                "productName": productName,
                "productPrice": productPrice,
                "productTip": productTip,
                "productImg": productImg
            },
            dataType: "json",
            success: function (result) {
                if (result.code == 200) {
                    products['id'] = result.data;
                    products['productName'] = productName;
                    products['productPrice'] = productPrice;
                    products['productTip'] = productTip;
                    products['productImg'] = productImg;
                    var currentRow = create_row(products);
                    $("#result_table tbody").append(currentRow);
                }
            }
        });
    });


    /**
     * 根据id进行删除
     */
    function delRow() {
        var productId = $(this).attr("dataid");
        var delButton = $(this);
        var ajaxUrl = "doAction.php?action=del_row";
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {"productId": productId},
            dataType: "json",
            success: function (result) {
                if (result.code == 200) {
                    $(delButton).parent().parent().remove();
                }
            }
        });
    }

    /**
     * 根据id进行更新
     */
    function updateRow() {
        var data_id = $(this).attr("dataid");
        var meButton = $(this);
        var ajaxUrl = "doAction.php?action=update_row";

        //没有事件
        var meRow = $(this).parent().parent();

        var editRow = $("<tr></tr>");
        editRow.append("<td style='text-align: center'>" + meRow.find('td:eq(' + 0 + ')').html() + "</td>");
        for (var i = 1; i < 5; i++) {
            var editTd = $("<td><input type='text' class='txtField' style='width: 100%;text-align: center' /></td>");
            var v = meRow.find('td:eq(' + i + ')').html();
            editTd.find('input').val(v);
            editRow.append(editTd);
        }
        var delUpdateRow = $("<td style='text-align: center'></td>");
        var saveButton = $("<a href='javascript:;' class='optLink'>保存&nbsp;</a>");
        //点击保存进行数据的更新
        saveButton.on("click", function () {
            //获取当前行的input内容
            var currentRowContent = $(this).parent().parent();
            var inputContent = currentRowContent.find("input");
            var postContents = {};
            postContents['productId'] = data_id;
            postContents['productName'] = inputContent[0].value;
            postContents['productPrice'] = inputContent[1].value;
            postContents['productTip'] = inputContent[2].value;
            postContents['productImg'] = inputContent[3].value;
            $.ajax({
                url: ajaxUrl,
                type: "POST",
                dataType: "json",
                data: postContents,
                success: function (result) {
                    if (result.code == 200) {
                        var createRow = create_row(postContents);
                        currentRowContent.replaceWith(createRow);
                    }
                },
            });
        });
        var cancelButton = $("<a href='javascript:;' class='optLink'>取消&nbsp;</a>");
        cancelButton.on("click", function () {
            var currentRow = $(this).parent().parent();
            meRow.find("a:eq(0)").val("删除").click(delRow);
            meRow.find("a:eq(1)").val("编辑").click(updateRow);
            currentRow.replaceWith(meRow);

        });
        delUpdateRow.append(saveButton);
        delUpdateRow.append(cancelButton);
        editRow.append(delUpdateRow);
        meRow.replaceWith(editRow);
    }

    /**
     *  查询所有信息时添加行信息
     * @param data_item
     * @returns {JQuery<HTMLElement> | jQuery | HTMLElement}
     */
    function create_row(data_item) {
        var row_obj = $("<tr id=" + data_item['id'] + "></trid>");
        for (var k in data_item) {
            var col_td = $("<td style='text-align: center'></td>")
            col_td.html(data_item[k]);
            row_obj.append(col_td);
        }

        var delButton = $('<a class="optLink" href="javascript:;">删除&nbsp;</a>');
        delButton.attr("dataid", data_item['id']);
        delButton.click(delRow);

        var editButton = $('<a class="optLink" href="javascript:;">编辑&nbsp;</a>');
        editButton.attr("dataid", data_item['id']);
        editButton.click(updateRow);

        var opt_td = $('<td style="text-align: center"></td>');

        opt_td.append(delButton);
        opt_td.append(editButton);
        row_obj.append(opt_td);
        return row_obj;
    }

});