<form action="upload.php" enctype="multipart/form-data" method="post">
    <h3>欢迎来到题目管理系统</h3>
    <br>
    <p>*请选择题号（仅1-24）</p>
    <input type="number" name="number"class="form-control" required>
    <p>*请输入题目标题</p>
    <input type="text" name="title" class="form-control" required>
    <p>*请输入题目内容</p>
    <textarea name="problem"class="form-control" style="height:300px"></textarea>
    <p>*请输入题目答案</p>
    <input type="text" name="answer" class="form-control" required>
    <p>（可选项）上传题目图片</p>
    <input id="f_upload" type="file" name="file" class="file" required/>
    <br>
    <p>是否清空原有图片</p>
    <select name="clear" class="form-control">
        <option value="no" selected>no</option>
        <option value="yes">yes</option>
    </select>
    <br>
    <br><br>
    <br>
    <button type="submit" class="btn btn-success" style="float:right">提交</button>
</form>

