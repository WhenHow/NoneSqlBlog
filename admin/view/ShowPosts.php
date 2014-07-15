<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
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
<div id="mainpage">

<form action="admin_log.php?action=operate_log" method="post" name="form_log" id="form_log">
<input type="hidden" name="pid" value="">
<table width="100%" id="adm_log_list" class="item_list">
<thead>
<tr>
    <th width="511" colspan="2"><b>标题</b></th>
    <th width="100"><b>作者</b></th>
    <th width="100"><b>文章ID</b></th>
</tr>
</thead>
<tbody>
<?php
    for($i = 0;$i<count($PostArray);$i++){
?>
<tr>
    <td width="21"><input type="checkbox" name="blog[]" value="<?php echo($PostArray[$i]['PostId']);?>" class="ids" /></td>
    <td width="490"><a href="write_log.php?action=edit&gid=<?php echo($PostArray[$i]['PostId']);?>"><?php echo($PostArray[$i]['PostTitle']);?></a>
            	              <span style="display:none; margin-left:8px;">
		      </span>
    </td>
    <td><?php echo($PostArray[$i]['HeadAuthor']);?></td>
    <td><?php echo($PostArray[$i]['PostId']);?></td>
</tr>
<?php }?>
</tbody>
</table>
<input name="operate" id="operate" value="" type="hidden" />
<div class="list_footer">
    <a href="javascript:void(0);" id="select_all">全选</a> 选中项：
    <a href="javascript:logact('del');" class="care">删除</a>
</div>
</form>
    <div id="post_button">
       <a href="WritePost.php?action=add""> <input type="submit" value="发布文章"  class="button" /></a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#adm_log_list tbody tr:odd").addClass("tralt_b");
        $("#adm_log_list tbody tr")
            .mouseover(function(){$(this).addClass("trover");$(this).find("span").show();})
            .mouseout(function(){$(this).removeClass("trover");$(this).find("span").hide();});
        $("#f_t_tag").click(function(){$("#f_tag").toggle();$("#f_sort").hide();$("#f_user").hide();});
        $("#select_all").toggle(function () {$(".ids").attr("checked", "checked");},function () {$(".ids").removeAttr("checked");});
    });
    setTimeout(hideActived,2600);
    function logact(act){
        if (getChecked('ids') == false) {
            alert('请选择要操作的文章');
            return;}
        if(act == 'del' && !confirm('你确定要删除所选文章吗？')){return;}
        $("#operate").val(act);
        $("#form_log").submit();
    }
    function changeSort(obj) {
        if (getChecked('ids') == false) {
            alert('请选择要操作的文章');
            return;}
        if($('#sort').val() == '')return;
        $("#operate").val('move');
        $("#form_log").submit();
    }
    function changeAuthor(obj) {
        if (getChecked('ids') == false) {
            alert('请选择要操作的文章');
            return;}
        if($('#author').val() == '')return;
        $("#operate").val('change_author');
        $("#form_log").submit();
    }
    function changeTop(obj) {
        if (getChecked('ids') == false) {
            alert('请选择要操作的文章');
            return;}
        if($('#top').val() == '')return;
        $("#operate").val(obj.value);
        $("#form_log").submit();
    }
    function selectSort(obj) {
        window.open("./admin_log.php?sid=" + obj.value + "", "_self");
    }
    function selectUser(obj) {
        window.open("./admin_log.php?uid=" + obj.value + "", "_self");
    }
    $("#menu_log").addClass('sidebarsubmenu1');
</script>	</div><!--end container-->
</div><!--end mainpage-->
</body>
</html>