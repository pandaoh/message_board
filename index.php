<?php
$host = '数据库地址';
$user = '账号';
$pwd = '密码';
$dbname = '数据库名';
$conn = new mysqli($host, $user, $pwd, $dbname);
if (!$conn) {
  die("连接失败！！！！！" . mysqli_connect_error());
  exit();
}
mysqli_query($conn, "SET NAMES UTF8");
$sql = "SELECT * FROM `leavewords` ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql);
if (!$result) {
  die("SQL错误！！！！！" . mysqli_error());
  exit();
}
$rows = [];
while ($row = mysqli_fetch_array($result)) {
  $rows[] = $row;
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <title>留言</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style-s.css">
  </head>
  <body onload="createCode();">
    <div class="top-bar">
      <h1 id="title">留言板</h1>
      <img class="logo" src="img/logo.png" alt="蓝鲸" title="你戳我鼻孔了！">
    </div>
    <hr /><br />
    <div class="lyb">
      <div class="wrap">
        <div class="add">
          <form action="save.php" method="post">
            <textarea name="content" placeholder="此处填写留言内容" maxlength=500" class="content" cols="50" rows="5" ></textarea>
            <br/>
            <div>
              <div>
                <input name="user" type="text" class="user" maxlength="16" required placeholder="请输入用户名">
                <div class="codediv">
                  <div class="code" id="codes" onclick="createCode();"></div>
                  <input name="code" type="text" maxlength="4"  class="code-input" required placeholder="请输入验证码">
                </div>
              </div>
              <div>   
                <input name="img" type="url" maxlength="1000" placeholder="请输入头像url(不填则为默认)">
                <span class="success-info"></span>
                <input type="submit" value="发送留言" onclick="return validateCode();" class="btn">
              </div>
            </div>
          </form>
        </div>
        <hr />
        <?php foreach ($rows as $row) { ?>
          <div class="add-tx">
            <?php
            if (strstr($row['img'], '.png') || strstr($row['img'], '.jpg') || strstr($row['img'], '.gif') || strstr($row['img'], '.jpeg')) {
              echo "<img class='tx' src='" . $row['img'] . "' alt='头像'>";
            } else {
              echo "<img class='tx' src='img/default_img.png' alt='头像'>";
            }
            ?>
            <!--img头像模块验证未解决-->
            <div class = "msg">
              <div class = "info">
                <span class = "user"><?php echo $row['user']; ?></span>
                <span class="time"><?php echo $row['intime']; ?></span>
              </div>
              <div class="content">
                <?php echo $row['content']; ?>
                <br /><br />
              </div>
            </div>
          </div>
        <?php } ?>

        <div class="add-tx">
          <img  class="tx" src="img/love.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">迪丽热巴</span>
              <span class="time">2019/05/20 00:00:00</span>
            </div>
            <div class="content">
              节日快乐呀~
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/star.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">古力娜扎</span>
              <span class="time">2018/08/15 14:50:50</span>
            </div>
            <div class="content">
              快来陪我打游戏！！！
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/em.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">玛尔扎哈</span>
              <span class="time">2017/09/01 04:30:00</span>
            </div>
            <div class="content">
              敢不敢吃我一个大招？！
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/basketball.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">蔡徐鲲</span>
              <span class="time">2017/02/30 00:00:00</span>
            </div>
            <div class="content">
              明天一起打篮球吗？
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/girl.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">杨幂</span>
              <span class="time">2016/05/05 12:30:50</span>
            </div>
            <div class="content">
              端午节记得吃粽子哦~
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/batman.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">烬</span>
              <span class="time">2015/03/01 12:30:50</span>
            </div>
            <div class="content">
              我于杀戮之中绽放，亦如黎明中的花朵。
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/duck.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">塔里克</span>
              <span class="time">2014/09/28 23:30:30</span>
            </div>
            <div class="content">
              我曾踏足山巅，也曾跌入低谷，二者都让我受益良多...
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/flag.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">蒙奇.D.路飞</span>
              <span class="time">2014/06/08 13:30:50</span>
            </div>
            <div class="content">
              开贼哭 偶尼，哦雷哇 纳噜！
            </div>
          </div>
        </div>

        <div class="add-tx">
          <img  class="tx" src="img/bear.png" alt="头像">
          <div class="msg">
            <div class="info">
              <span class="user">Angela大宝贝</span>
              <span class="time">2013/06/08 20:30:30</span>
            </div>
            <div class="content">
              你看见我的小熊了吗，嘻嘻~
            </div>
          </div>
        </div>

      </div>
    </div>
    <br /><hr />
    <script type="text/javascript" src="js/leavewords.js"></script>
  </body>
</html>