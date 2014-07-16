<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./view/style/green/style.css" type=text/css rel=stylesheet>
        <link href="./view/css/css-main.css" type=text/css rel=stylesheet>
        <script type="text/javascript" src="./view/js/common.js"></script>
        <script type="text/javascript" src="../include/lib/js/jquery/jquery-1.7.1.js"></script>
        <script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js"></script>
    </head>
    <body>
    <script charset="utf-8" src="./editor/kindeditor.js"></script>
    <script charset="utf-8" src="./editor/lang/zh_CN.js"></script>

    <div id="post" style="MARGIN-RIGHT: auto; MARGIN-LEFT: auto; ">
        <div class=containertitle><b>写文章</b><span id="msg_2"></span></div>
        <form action="SavePost.php?action=add" method="post" enctype="multipart/form-data" id="addlog" name="addlog">

            <label for="title" id="title_label">输入文章标题</label>
            <input type="text" maxlength="200" name="title" id="title"/>
            <textarea id="content" name="content" style="width:845px; height:460px;"></textarea>

            <br><br>
            <table align="center" style="width: 70%">
                <tr>
                    <td style="width: 30%">
                        <label >输入Head的title</label>
                    </td>
                    <td>
                        <input type="text" style="width:100%;height:3%;left: 10%"  name="HeadTitle" id="HeadTitle"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label >输入Head的description</label>
                    </td>
                    <td>
                        <input type="text" style="width:100%;height:3%"  name="HeadDescription" id="HeadDescription"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label >输入Head的keywords</label>
                    </td>
                    <td>
                    <input type="text" style="width:100%;height:3%"  name="HeadKeywords" id="HeadKeywords"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label >输入Head的author</label>
                    </td>
                    <td>
                        <input type="text" style="width:100%;height:3%"  name="HeadAuthor" id="HeadAuthor"/>
                    </td>
                </tr>
            </table>
            <div id="post_button">
                <input type="hidden" name="ishide" id="ishide" value="">
                <input type="submit" value="发布文章" onclick="return checkform();" class="button" />
            </div>
        </form>
    </div>
    <script>
        loadEditor('content');
        $("#menu_wt").addClass('sidebarsubmenu1');
        $("#advset").css('display', $.cookie('em_advset') ? $.cookie('em_advset') : '');
        $("#alias").keyup(function(){checkalias();});
        $("#title").focus(function(){$("#title_label").hide();});
        $("#title").blur(function(){if($("#title").val() == '') {$("#title_label").show();}});
        $("#tag").focus(function(){$("#tag_label").hide();});
        $("#tag").blur(function(){if($("#tag").val() == '') {$("#tag_label").show();}});
        setTimeout("autosave(0)",60000);
    </script>
    </body>
</html>