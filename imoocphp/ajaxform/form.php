<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <title>商品的Ajax请求处理</title>
    <style>
        body {
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <script>
        function deleteItem(value) {
            $.ajax({
                async: true,
                url: './delete.php',
                type: 'POST',
                data: {
                    "productId": $(value).val(),
                },
                dataType: "json",
                success: function (result) {
                    if (result.code == 200) {
                        alert(result.msg);
                        $("tr").remove("#" + $(value).val());
                    }
                },
                error: function (error) {
                    alert(error.valueOf());
                }
            });
        }

        function update(updateId) {
            var productId = $(updateId).val();
            var proName = '';
            var proPrice = '';
            var proTip = '';
            var proImage = '';
            var saveBtn = $(updateId).text("保存");
            $("#" + $(updateId).val() + " td input").removeAttr("readonly");
            $("#" + $(updateId).val() + " td input").css("border", "1px solid red");

            if (saveBtn.text() == "保存") {
                $(updateId).removeAttr("onclick");
                saveBtn.on('click', function () {
                    $("#" + $(updateId).val() + " td input").each(function (index, values) {
                        if (index == 0) {
                            proName = values.value;
                        } else if (index == 1) {
                            proPrice = values.value;
                        } else if (index == 2) {
                            proTip = values.value;
                        } else {
                            proImage = values.value;
                        }
                    })
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: './update.php',
                        data: {
                            "productId": $(updateId).val(),
                            "productName": proName,
                            "productPrice": proPrice,
                            "productTip": proTip,
                            "productImg": proImage,
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.code == 200) {
                                alert(data.msg);
                                window.location.reload();
                            }
                        },
                        error: function (error) {

                        }
                    });
                })
            }
        }

        $(document).ready(function () {
            $.ajax({
                async: true,
                url: './selAll.php',
                type: 'POST',
                dataType: "json",
                success: function (result) {
                    if (result.code == 200) {
                        $.each(result.data, function (i, item) {
                            $("#result_table tbody").append(function () {
                                return "<tr id='" + item.id + "'><td>" + item.id + "</td><td><input name='jqProductName' id='" + item.id + "' type='text' readonly='readonly' style='border: none' value='" + item.productName + "'/></td><td><input name='jqProductPrice'  id='\"+item.id+\"'  type='text' readonly='readonly' style='border: none' value='" + item.productPrice + "'/></td><td><input  name='jqProductTip' type='text' id='\"+item.id+\"'  readonly='readonly' style='border: none' value='" + item.productTip + "'/></td><td> <input  name='jqProductImg' id='\"+item.id+\"'  type='text' readonly='readonly' style='border: none;width: 100px' value='" + item.productImg + "' /></td><td><button  onclick='deleteItem(this)'  value='" + item.id + "' >删除</button><button onclick='update(this)'  id='update' value='" + item.id + "' >更新</button></td></tr>";
                            })
                        })
                    }
                },
                error: function (error) {
                }
            });
            $("#btn_add").on('click', function () {
                var flag = true;
                $("#input_product input").each(function () {
                    if ($(this).val() == "") {
                        flag = false;
                    }
                })
                if (flag) {
                    $.ajax({
                        async: true,
                        url: './insert.php',
                        type: 'POST',
                        data: {
                            "productName": $("#product_name").val(),
                            "productPrice": $("#product_price").val(),
                            "productTip": $("#product_tip").val(),
                            "productImg": $("#product_img").val(),
                        },
                        dataType: "json",
                        success: function (result) {
                            if (result.code == 200) {
                                alert(result.msg);
                                window.location.reload();
                            }
                        },
                        error: function (error) {
                            alert(error);
                        }
                    });
                } else {
                    alert("信息不完整");
                }
            });
        })
    </script>
</head>
<body>

<form id="input_product">
    <label>商品名称</label>
    <input type="text" name="product_name" id="product_name" placeholder="请输入商品名称">
    <label>商品价格</label>
    <input type="text" name="product_price" id="product_price" placeholder="请输入商品价格">
    <label>商品介绍</label>
    <input type="text" name="product_tip" id="product_tip" placeholder="请输入商品介绍">
    <label>商品图片</label>
    <input type="text" name="product_img" id="product_img" placeholder="请输入商品图片">
    <input type="button" id="btn_add" value="提交">
</form>

<table id="result_table" border="1px" style="width: 500px">
    <thead>
    <tr>
        <th>商品id</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>商品介绍</th>
        <th>商品图片</th>
        <th>&nbsp&nbsp&nbsp&nbsp&nbsp操&nbsp&nbsp作&nbsp&nbsp&nbsp&nbsp&nbsp</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>