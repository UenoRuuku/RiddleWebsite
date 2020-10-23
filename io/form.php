<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>题目管理系统
    </a>
</p>
<form action="upload.php" enctype="multipart/form-data" method="post" id="collapseOne" class="accordion-body collapse">
    <h3>欢迎来到题目管理系统</h3>
    <br>
    <p>*请选择题号（仅1-24）</p>
    <input type="number" name="number" class="form-control" required>
    <p>*请输入题目标题</p>
    <input type="text" name="title" class="form-control" required>
    <p>*请输入题目内容<span>#采用一般html5通用的标签修改格式</span></p>
    <textarea name="problem" class="form-control" style="height:300px"></textarea>
    <p>*请输入题目答案</p>
    <input type="text" name="answer" class="form-control" required>
    <p>（可选项）上传题目图片</p>
    <input id="f_upload" type="file" name="file" class="file" required />
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
<p>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseNone" style="color:#fff">
            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>注册
        </a>
    </p>
    <form method="post" action="register.php" id="collapseNone" class="accordion-body collapse">
        <h3>欢迎来到账号注册系统</h3>
        <p>*请输入需要注册的账号名</p>
        <input type="text" name="name" class="form-control" required>
        <p>*请输入密码</p>
        <input type="text" name="passcode" class="form-control" required>
        <br>
        <br>
        <br>
        <br>
        <button type="submit" class="btn btn-success">提交</button>
    </form>
<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>账号管理系统（现仅开放跳关系统）
    </a>
</p>
<form method="post" action="zhanghao.php" id="collapseTwo" class="accordion-body collapse">
    <h3>欢迎来到账号管理系统</h3>
    <p>*请输入需要调整的账号名</p>
    <input type="text" name="name" class="form-control" required>
    <p>*请输入调整至的题号</p>
    <input type="number" name="number" class="form-control" required>
    <br>
    <br><br>
    <br>
    <button type="submit" class="btn btn-success" style="float:right">提交</button>
</form>

<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>账号注册系统
    </a>
</p>
<form method="post" action="register.php" id="collapseThree" class="accordion-body collapse">
    <h3>欢迎来到账号注册系统</h3>
    <p>*请输入需要注册的账号名</p>
    <input type="text" name="name" class="form-control" required>
    <p>*请输入密码</p>
    <input type="text" name="passcode" class="form-control" required>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-success" style="float:right">提交</button>
</form>

<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>查看上传信息
    </a>
</p>
<div id="collapseFour" class="accordion-body collapse">
    <?php
    $db = new mysqli('localhost', 'root', '', 'io');
    $rows = $db->query('SELECT * FROM upload');
    echo '<table class="table"><thead><tr><th>日期</th><th>队伍账号</th><th>上传内容</th><th>正确与否</th><th>是否作弊</th></tr></thead>';
    while ($row = $rows->fetch_assoc()) {
        echo '<tr><td>' . $row['date'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['content'] . '</td>';
        echo '<td>' . $row['judge'] . '</td>';
        echo '<td>' . $row['cheat'] . '</td></tr>';
    }
    echo '</table>';
    ?>
</div>

<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSpecial" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>查看上传信息IP
    </a>
</p>
<div id="collapseSpecial" class="accordion-body collapse">
<?php
    $db = new mysqli('localhost', 'root', '', 'io');
    $rows = $db->query('SELECT * FROM userip');
    echo '<table class="table"><thead><tr><th>队伍账号</th><th>上传内容</th><th>IP</th></tr></thead>';
    while ($row = $rows->fetch_assoc()) {
        echo '<tr><td>' . $row['name'] . '</td>';
        echo '<td>' . $row['content'] . '</td>';
        echo '<td>' . $row['ip'] . '</td></tr>';
    }
    echo '</table>';
    ?>
</div>

<p>
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" style="color:#fff">
        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>账号解锁
    </a>
</p>

<form method="post" action="unlock.php"  id="collapseFive" class="accordion-body collapse">
    <p>*请输入需要修改锁定状态的账号名</p>
    <input type="text" name="name" class="form-control" required>
    <p>*请选择状态</p>
    <select name="lockie" class="form-control" required>
        <option value="1">lock</option>
        <option value="0">unlock</option>
    </select>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-success" style="float:right">提交</button>
</form>