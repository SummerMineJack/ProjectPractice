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
        }

        #form_add {
            text-align: center;
        }

        #result_table {
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
                            var id = item.id;
                            var productName = item.productName;
                            var productPrice = item.productPrice;
                            var productTip = item.productTip;
                            var productImg = item.productImg;
                            $("#result_table tbody").append("<tr><td>1</td><td>1 </td><td>1 </td><td>1 </td><td>1 </td> </tr>");
                        })
                    }
                },
                error: function (error) {
                }
            })
        })
    </script>
</head>
<body>
<form id="form_add" method="post">
    <label>商品名称</label>
    <input type="text" name="product_name" placeholder="请输入商品名称">
    <label>商品价格</label>
    <input type="text" name="product_name" placeholder="请输入商品价格">
    <label>商品介绍</label>
    <input type="text" name="product_name" placeholder="请输入商品介绍">
    <label>商品图片</label>
    <input type="text" name="product_name" placeholder="请输入商品图片">
    <input type="submit" value="提交">
</form>
<table id="result_table">
    <thead>
    <tr>
        <th>商品id</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>商品介绍</th>
        <th>商品图片</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>