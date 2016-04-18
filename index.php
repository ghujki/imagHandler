<?php
/**
 * Created by PhpStorm.
 * User: ghujk
 * Date: 2016/4/15
 * Time: 15:29
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>科比装逼神器</title>
    <link href="static/bootstrap-3.3.5.min.css" rel="stylesheet">
</head>
<body>
<style>
    .margin-top {
        margin-top:1em;
    }

    .bottom {
        position:fixed;
        bottom:0;
        background-color: #ddd;
        width: 100%;
        opacity: 0.8;
        padding: .5em;
    }
    .btn {
        font-size:small;
    }

    @media screen and (max-device-width:480px){
        .container {
            padding-bottom:4.5em;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 margin-top">
            <img src="" id="img" class="img-responsive"/>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 margin-top">
            <input type="text" id="name" class="form-control" placeholder="此处输入您的名字"/>
        </div>
        <div class="col-xs-12 margin-top">
            <button id="submit" class="form-control" >提交</button>
        </div>
    </div>
</div>
<div class="bottom" >
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        关注我们公众号
    </button>
</div>
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close" ></div>
            <div class="modal-body" >
                <img src="static/qrcode.jpg" class="img-responsive">
                <div class="text-center">长按图片，识别图中二维码即可关注。</div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>



<script src="static/jquery-1.11.3.min.js"></script>
<script src="static/bootstrap-3.3.5.min.js"></script>
<script>
    $("#submit").click(function(){
        var height = window.screen.availHeight;
        var width = window.screen.availWidth;
        $("#img").attr("src", "test_font.php?str=" + $("#name").val() + "&width="+width+"&height="+height);
    });
    $(".modal-dialog,.modal").click(function(){
        $('#myModal').modal('hide');
    });
    $(function(){
        var height = window.screen.availHeight;
        var width = window.screen.availWidth;
        $("#img").attr("src", "test_font.php?str=&width="+width+"&height="+height);
    });
</script>
</body>
</html>
