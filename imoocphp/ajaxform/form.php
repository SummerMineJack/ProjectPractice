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
                                return "<tr><td>" + item.id + "</td><td>" + item.productName + "</td><td>" + item
                                        .productPrice + "</td><td>" + item.productTip + "</td><td>" + item.productImg +
                                    "</td><td><button id='del_id' >删除</button><button " +
                                    "id='update_id'>更新</button></td></tr>";
                            })

                        })
                    }
                },
                error: function (error) {
                }
            });
            $("#btn_add").on('click', function () {
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
                        }

                    },
                    error: function (error) {
                        alert(error);
                    }
                });
            });
            $('#del_id').delegate('click', function () {
                alert('OK');
            });

        })
    </script>
</head>
<body>
<form method="post">
    <label>商品名称</label>
    <input type="text" name="product_name" id="product_name" placeholder="请输入商品名称">
    <label>商品价格</label>
    <input type="text" name="product_price" id="product_price" placeholder="请输入商品价格">
    <label>商品介绍</label>
    <input type="text" name="product_tip" id="product_tip" placeholder="请输入商品介绍">
    <label>商品图片</label>
    <input type="text" name="product_img" id="product_img" placeholder="请输入商品图片">
    <input type="submit" id="btn_add" value="提交">
</form>
<table id="result_table" border="1px" style="width: 500px">
    <thead>
    <tr>
        <th>商品id</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>商品介绍</th>
        <th>商品图片</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>