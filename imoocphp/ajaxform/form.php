<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="AjaxFormJs.js"></script>
    <title>商品的Ajax请求处理</title>
</head>
<body>

<div style="text-align: center">
    <form id="input_product" style="width: 60%;margin:auto">
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
</div>
<div style="text-align: center">
    <table id="result_table" border="1px" cellpadding="3" cellspacing="0" style="width: 60%;margin:20px auto">
        <tr>
            <th>商品id</th>
            <th>商品名称</th>
            <th>商品价格</th>
            <th>商品介绍</th>
            <th>商品图片</th>
            <th>&nbsp&nbsp&nbsp&nbsp&nbsp操&nbsp&nbsp作&nbsp&nbsp&nbsp&nbsp&nbsp</th>
        </tr>
    </table>
    <button id="firstPage" disabled="disabled">首页</button>
    <button id="pageUp" disabled="disabled">上一页</button>
    <label id="showPageNumber"></label>
    <button id="pageDown">下一页</button>
    <button id="endPage">尾页</button>
    共有<label id="allPage"></label>页


</div>

</body>
</html>