<!--UBC CPSC304 2018夏季第一学期项目小组BiuBiuPanda PHP+Oracle项目引擎
  小组成员: 王雪榕， 何俊韬，周陈梁, 温宇霆
  文件创建者：周陈梁
  特别鸣谢：Jiemin Zhang 与 Simona Radu，感谢他们提供的测试文件模版。
  若你的名字不在上文所列之中，且你不是UBC CPSC304 2018夏季第一学期课程教员，
  请立即退出并删除此文件，否则一切后果自负。
  举报转发源: 296046519@qq.com       -->


<!--PHP + Oracle engine for UBC CPSC304 2018 Summber Term 1 Project Group BiuBiuPanda
  Group Member: Juntao He, Xuerong Wang, Yuting Wen, Chenliang Zhou
  File Created by Chenliang Zhou
  Inspired by Jiemin Zhang and Simona Radu
  If your name is not listed above and you are not a course staff for UBC CPSC304 2018 Summber Term 1,
    you must quit and delete this file immediately, or for all the consequences arising from your own.
    Report your sharer to: 296046519@qq.com       -->
<html>
<head>
  <meta charset="utf-8">
   <title>飙飙熊猫</title>
   <link type="text/css" rel="stylesheet" href="BiuBiuPanda_project_final_style.css">
</head>

<style>
body {
  background-image:url('images/BiuBiuPanda_project_final_backgroundCN.jpg');
  background-size:cover;background-color:white;
  background-repeat:no-repeat;
  background-attachment:fixed;
}
</style>

<body>
<div class="page">

  <div class="pageright">
    <p><a href="BiuBiuPanda_project_final_index.php">English</a></p>

    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p>重置BiuBiu熊猫数据库:
      <input type="submit" value="重置" name="reset"></p>
    </form>
    <p><a href="BiuBiuPanda_project_final_mini_gameCN.php" target="_blank">熊猫小游戏</a></p>
  </div>

<div class="tab">
  <button class="tablinks" onclick="userType(event,'Administrator')">管理员</button>
  <button class="tablinks" onclick="userType(event,'User')">普通用户</button>
</div>

<!-- Administrator tab -->
<div id="Administrator" class="tabcontent">

  <p><font size="6">管理员选项</font></p>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 1. 展示表格: </font>
    <select id="selectBarT" name="tableName">
    </select>
    <input type="submit" value="展示" name="showTable"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 2. 将数据 <input type="text" name="insertValue" size="30" placeholder="如 (1, 'Marco', 'M', 'Canada')">
      插入表格: </font>
    <select id="selectBarI" name="insertTableName">
    </select>
    <input type="submit" value="插入" name="insertTable"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 3. 将具有属性 <input type="text" name="deleteValue" size="30" placeholder="如 artist_ID = 2">
      的数据从表格: </font>
    <select id="selectBarD" name="deleteTableName">
    </select>
    <input type="submit" value="删除" name="deleteTable"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 4. 将具有属性 <input type="text" name="updateValueOriginal" size="30" placeholder="如 artist_ID = 2">
      的数据更新为 <input type="text" name="updateValueNew" size="30" placeholder="如 nationality = 'Chinese'">
      ，数据所在表格: </font>
    <select id="selectBarU" name="updateTableName">
    </select>
    <input type="submit" value="更新" name="updateTable"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 5. 查看用户ID为 <input type="text" name="userID" size="10" placeholder="如 2"> 的用户的所有评论信息</font>
    <input type="submit" value="查看" name="seeUserComments"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 6. 查看用户ID为 <input type="text" name="userID" size="10" placeholder="如 2"> 的用户的所有歌单信息</font>
    <input type="submit" value="查看" name="seeUserLists"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 7. 查找包含ISRC为 <input type="text" name="allSongs" size="10" placeholder="如 01,03,04"> 的所有歌的歌单</font>
    <input type="submit" value="查找" name="findAllLists"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 8. 查找所有歌曲的评论量: </font>
    <input type="submit" value="查找" name="findNumComments"></p>
  </form>
  <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
    <p><font size="2"> 9. 查找所有用户歌单的平均歌曲量: </font>
    <input type="submit" value="查找" name="findAvgNumSongs"></p>
  </form>
</div>

<!-- User tab -->
<div id="User" class="tabcontent">
  <br><p><font size="6">普通用户选项</font></p>

  <div class="tab">
    <button class="subTablinks" onclick="userOpt(event,'Options')">账号</button>
    <button class="subTablinks" onclick="userOpt(event,'Search')">搜索</button>
    <button class="subTablinks" onclick="userOpt(event,'Song Lists')">歌单</button>
    <button class="subTablinks" onclick="userOpt(event,'Comments')">评论</button>
    <button class="subTablinks" onclick="userOpt(event,'Recommendations')">推荐</button>
  </div>

  <div id="Options" class="subTabcontent">
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 1. 切换用户ID为 <input type="text" name="switchTo" size="10" placeholder="如 1"> (若ID不存在，会新建账号)</font>
      <input type="submit" value="切换" name="switchUser"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 2. 将我的昵称更改为 <input type="text" name="nicknameTo" size="10" placeholder="如 Yuting"></font>
      <input type="submit" value="更改" name="changeNickname"></p>
    </form>
  </div>

  <div id="Song Lists" class="subTabcontent">
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 1. 查看我的所有歌单: </font>
      <input type="submit" value="查看" name="seeSonglists"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 2. 查看我ID为 <input type="text" name="listID" size="10" placeholder="如 1">的歌单的内容</font>
      <input type="submit" value="查看" name="seeOneSonglist"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 3. 新建歌单，名字为 <input type="text" name="listName" size="30" placeholder="如 I love Soup" maxlength="30"></font>
      <input type="submit" value="新建" name="createSonglist"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 4. 删除我ID为 <input type="text" name="listID" size="10" placeholder="如 1">的歌单</font>
      <input type="submit" value="删除" name="deleteSonglist"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 5. 将ISRC为 <input type="text" name="songISRC" size="10" placeholder="如 01"> 的歌曲加入我ID为 <input type="text" name="listID" size="10" placeholder="如 1">的歌单</font>
      <input type="submit" value="加入" name="addSongFromList"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 6. 将ISRC为 <input type="text" name="songISRC" size="10" placeholder="如 01"> 的歌从我ID为 <input type="text" name="listID" size="10" placeholder="如 1">的歌单中删除</font>
      <input type="submit" value="删除" name="deleteSongFromList"></p>
    </form>
  </div>

  <div id="Comments" class="subTabcontent">
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 1. 查看我的所有评论 </font>
      <input type="submit" value="查看" name="viewComments"></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 2. 对ISRC为<input type="text" name="songISRC" size="10" placeholder="如 01">的歌写评论：
        <br>内容: <br><textarea name="commentContents" row="20" cols="48" placeholder="我好喜欢这首歌哦！" maxlength = "1000"></textarea>
      <input type="submit" value="评论" name="makeComments"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 3. 修改ID为<input type="text" name="commentID" size="10" placeholder="如 1">的评论为：
       <br><textarea name="commentContents" row="20" cols="48" placeholder="如 我好喜欢这首歌哦！" maxlength = "1000"></textarea>
      <input type="submit" value="修改" name="editComments"></font></p>
    </form>
  </div>

  <div id="Recommendations" class="subTabcontent">
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 1. 探索被加入歌单次数最多的潮歌
      <input type="submit" value="探索" name="mostPopularList"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 2. 探索评论最多的潮歌
      <input type="submit" value="探索" name="mostPopularComment"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 3.探索最热门艺术家
      <input type="submit" value="探索" name="mostPopularArtist"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 4.探索最冷门艺术家
      <input type="submit" value="探索" name="mostUnpopularArtist"></font></p>
    </form>
  </div>

  <div id="Search" class="subTabcontent">
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 1. 按照ISRC找歌: ISRC = <input type="text" name="songISRC" size="10" placeholder="如 01">
        <br />显示: <input name="language" type="checkbox" checked>语言
        <input name="genre" type="checkbox" checked>流派
        <input name="publish_date" type="checkbox" checked>发行日期
        <input name="publisher" type="checkbox" checked>发行商
        <input name="duration" type="checkbox" checked>时长
        <input name="singer" type="checkbox" checked />歌手
        <input name="composer" type="checkbox" checked />作曲
        <input name="author" type="checkbox" checked />作词
        <input name="album" type="checkbox" checked />专辑
        <input name="platform" type="checkbox" checked />平台
        <input name="comment" type="checkbox" checked />评论
      <input type="submit" value="搜索" name="searchSongByISRC"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 2. 按照歌名找歌: <input type="text" name="songName" size="30" placeholder="如 Everytime" maxlength = "30">
        <br />显示: <input name="language" type="checkbox" checked>语言
        <input name="genre" type="checkbox" checked>流派
        <input name="publish_date" type="checkbox" checked>发行日期
        <input name="publisher" type="checkbox" checked>发行商
        <input name="duration" type="checkbox" checked>时长
        <input name="singer" type="checkbox" checked />歌手
        <input name="composer" type="checkbox" checked />作曲
        <input name="author" type="checkbox" checked />作词
        <input name="album" type="checkbox" checked />专辑
        <input name="platform" type="checkbox" checked />平台
        <input name="comment" type="checkbox" checked />评论
      <input type="submit" value="搜索" name="searchSongByName"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 3. 按照人名找艺术家: <input type="text" name="artistName" size="30" placeholder="如 Jay Chou" maxlength = "30">
      <input type="submit" value="搜索" name="searchArtistByName"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 4. 按照ISBN找专辑: ISBN = <input type="text" name="albumISBN" size="10" placeholder="如 01">
      <input type="submit" value="搜索" name="searchAlbumByISBN"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 5. 按照专辑名找专辑: <input type="text" name="albumName" size="30" placeholder="如 Jay Chous Bedtime Stories" maxlength = "30">
      <input type="submit" value="搜索" name="searchAlbumByName"></font></p>
    </form>
    <form method="POST" action="BiuBiuPanda_project_final_indexCN.php">
      <p><font size="2"> 6. 按照注册名找网络播放平台: <input type="text" name="platformName" size="30" placeholder="如 YouTube" maxlength = "500">
      <input type="submit" value="搜索" name="searchPlatformByName"></font></p>
    </form>
  </div>
</div>

</body>
</html>
<?php

$success = true; //keep track of errors so it redirects the page only if there are no errors
$db_conn = OCILogon("ora_c2e1b", "a26244160", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$globalUserName = file_get_contents('../cs304/BiuBiuPanda_project_final_current_user.txt');

// Connect Oracle...
if ($db_conn) {
    if (array_key_exists('reset', $_POST)) {
        echo "<br>Loading the initialization data...";
        $sql = file_get_contents('../cs304/BiuBiuPanda_project_final_initialization.sql');
        $list = split(';', $sql);
        foreach ($list as $i => $item) {
            if ($i !== sizeof($list) - 1) {
                executePlainSQL($item);
            }
        }
        OCICommit($db_conn);
    } elseif (array_key_exists('showTable', $_POST)) {
        printWhole($_POST['tableName']);
    } elseif (array_key_exists('insertTable', $_POST)) {
        $result = executePlainSQL("INSERT INTO {$_POST['insertTableName']} VALUES {$_POST['insertValue']}");
        OCICommit($db_conn);
        printWhole($_POST['insertTableName']);
    } elseif (array_key_exists('deleteTable', $_POST)) {
        $result = executePlainSQL("DELETE FROM {$_POST['deleteTableName']} WHERE {$_POST['deleteValue']}");
        OCICommit($db_conn);
        printWhole($_POST['deleteTableName']);
    } elseif (array_key_exists('updateTable', $_POST)) {
        $result = executePlainSQL("UPDATE {$_POST['updateTableName']} SET {$_POST['updateValueNew']} WHERE {$_POST['updateValueOriginal']}");
        OCICommit($db_conn);
        printWhole($_POST['updateTableName']);
    } elseif (array_key_exists('seeUserComments', $_POST)) {
        if (shouldBeNumberCheck($_POST['userID'])) {
            $result = executePlainSQL("SELECT user_ID, nickname AS user_nickname, comment_id, ISRC AS song_commented_on, contents, comment_date
       FROM AppUser NATURAL INNER JOIN Comment_makes WHERE user_ID = {$_POST['userID']}");
            OCICommit($db_conn);
            printResult($result);
        }
    } elseif (array_key_exists('seeUserLists', $_POST)) {
        if (shouldBeNumberCheck($_POST['userID'])) {
            $result = executePlainSQL("SELECT user_ID, nickname AS user_nickname, list_id AS song_list_id, name AS song_list_name
       FROM AppUser NATURAL INNER JOIN Song_List_creates WHERE user_ID = {$_POST['userID']}");
            OCICommit($db_conn);
            printResult($result);
        }
    } elseif (array_key_exists('findAllLists', $_POST)) {
        $songs = split(',', $_POST['allSongs']);

        executePlainSQL("DROP TABLE temp");
        executePlainSQL("CREATE TABLE temp(ISRC char(30) PRIMARY KEY)");
        foreach ($songs as $key => $value) {
            executePlainSQL("INSERT INTO temp VALUES ('ISRC{$value}')");
        }
        OCICommit($db_conn);
        $result = executePlainSQL("SELECT a.user_ID, a.nickname AS user_nickname, s.list_id AS song_list_id, s.name AS song_list_name
                     FROM AppUser a, Song_List_creates s
                     WHERE a.user_ID = s.user_ID AND NOT EXISTS ((SELECT temp.ISRC FROM temp) MINUS (SELECT i.ISRC FROM list_includes i WHERE i.user_ID = a.user_ID AND i.list_id = s.list_id))");
        printResult($result);
    } elseif (array_key_exists('findNumComments', $_POST)) {
        $result = executePlainSQL("SELECT ISRC, name, count(*) AS number_of_comments
       FROM Comment_makes NATURAL INNER JOIN Song GROUP BY (ISRC, name)");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('findAvgNumSongs', $_POST)) {
        $result = executePlainSQL("SELECT * FROM (SELECT user_ID, AVG(num_of_songs) AS avg_songs
       FROM  (SELECT user_ID, list_ID, COUNT(ISRC) AS num_of_songs
              FROM (SELECT * FROM list_includes UNION SELECT * FROM Song_List_creates) NATURAL RIGHT OUTER JOIN AppUser
              GROUP BY (user_ID, list_ID))
       GROUP BY user_ID
       ORDER BY user_ID DESC)
       WHERE avg_songs IN (SELECT (avg_songs) FROM (SELECT user_ID, AVG(num_of_songs) AS avg_songs FROM
                                                  (SELECT user_ID, list_ID, COUNT(ISRC) AS num_of_songs FROM
                                                    (SELECT * FROM list_includes UNION SELECT * FROM Song_List_creates) NATURAL RIGHT OUTER JOIN AppUser
                                                    GROUP BY (user_ID, list_ID))
                                                    GROUP BY user_ID
                                                    ORDER BY user_ID DESC))");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('switchUser', $_POST)) {
        if (shouldBeNumberCheck($_POST['switchTo'])) {
            global $globalUserName;
            $oldID = $globalUserName;
            if (!countRows(executePlainSQL("SELECT * FROM AppUser WHERE user_ID = {$_POST['switchTo']}"))) {
                executePlainSQL("INSERT INTO AppUser VALUES ({$_POST['switchTo']}, 'default_nickname')");
            }

            OCICommit($db_conn);
            file_put_contents("../cs304/BiuBiuPanda_project_final_current_user.txt", "{$_POST['switchTo']}");

            popWindow("切换为用户{$_POST['switchTo']}!");
            echo "切换为用户{$_POST['switchTo']}!";
        }
    } elseif (array_key_exists('changeNickname', $_POST)) {
        $result = executePlainSQL("UPDATE AppUser SET nickname = '" . "{$_POST['nicknameTo']}" . "'" . " WHERE user_ID = {$globalUserName}");
        OCICommit($db_conn);
        popWindow("已将昵称更改为{$_POST['nicknameTo']}! 你好 {$_POST['nicknameTo']}!");
    } elseif (array_key_exists('seeSonglists', $_POST)) {
        global $globalUserName;
        $result = executePlainSQL("SELECT user_id, list_id, name AS song_list_name FROM Song_List_creates WHERE user_ID = {$globalUserName}");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('seeOneSonglist', $_POST)) {
        if (shouldBeNumberCheck($_POST['listID'])) {
            global $globalUserName;
            $result = executePlainSQL("SELECT user_id, list_id, name AS song_list_name, ISRC, song_name FROM list_includes NATURAL INNER JOIN Song_List_creates NATURAL INNER JOIN (SELECT ISRC, name AS song_name FROM Song) WHERE user_ID = {$globalUserName} AND list_ID = {$_POST['listID']}");
            OCICommit($db_conn);
            printResult($result);
        }
    } elseif (array_key_exists('createSonglist', $_POST)) {
        global $globalUserName;
        $listID = getNewID("list");
        $result = executePlainSQL("INSERT INTO Song_List_creates VALUES " . "({$listID}, {$globalUserName}, " . "'" . "{$_POST['listName']}" . "')");
        OCICommit($db_conn);
        popWindow("已新建歌单！");
    } elseif (array_key_exists('deleteSonglist', $_POST)) {
        if (shouldBeNumberCheck($_POST['listID'])) {
            global $globalUserName;
            $result = executePlainSQL("DELETE FROM Song_List_creates WHERE user_ID = {$globalUserName} AND list_ID = {$_POST['listID']}");
            OCICommit($db_conn);
            popWindow("已删除歌单！");
        }
    } elseif (array_key_exists('addSongFromList', $_POST)) {
        if (shouldBeNumberCheck($_POST['listID']) && shouldBeNumberCheck($_POST['songISRC'])) {
            global $globalUserName;
            $findSong = executePlainSQL("SELECT Song.ISRC FROM Song WHERE Song.ISRC = 'ISRC{$_POST['songISRC']}'");
            $findList = executePlainSQL("SELECT * FROM Song_List_creates WHERE user_ID = {$globalUserName} AND list_ID = {$_POST['listID']}");
            $findSongInList = executePlainSQL("SELECT * FROM list_includes WHERE user_ID = {$globalUserName} AND ISRC = 'ISRC{$_POST['songISRC']}' AND list_ID = {$_POST['listID']}");
            if (countRows($findSong) == 0) {
                popWindow("此歌不存在！");
            } elseif (countRows($findList) == 0) {
                popWindow("此歌单不存在！");
            } elseif (countRows($findSongInList) != 0) {
                popWindow("此歌已存在在歌单中！");
            } else {
                $result = executePlainSQL("INSERT INTO list_includes VALUES" . "({$_POST['listID']}, {$globalUserName}," . " '" . "ISRC{$_POST['songISRC']}" . "')");
                OCICommit($db_conn);
                popWindow("已将此歌加入歌单！");
            }
        }
    } elseif (array_key_exists('deleteSongFromList', $_POST)) {
        if (shouldBeNumberCheck($_POST['listID']) && shouldBeNumberCheck($_POST['songISRC'])) {
            global $globalUserName;
            $findSong = executePlainSQL("SELECT Song.ISRC FROM Song WHERE Song.ISRC = 'ISRC{$_POST['songISRC']}'");
            $findList = executePlainSQL("SELECT list_includes.list_ID FROM list_includes WHERE user_ID = {$globalUserName} AND list_includes.list_ID = {$_POST['listID']}");
            $findSongInList = executePlainSQL("SELECT * FROM list_includes WHERE user_ID = {$globalUserName} AND ISRC = 'ISRC{$_POST['songISRC']}' AND list_ID = {$_POST['listID']}");
            if (countRows($findSong) == 0) {
                popWindow("此歌不存在！");
            } elseif (countRows($findList) == 0) {
                popWindow("此歌单不存在！");
            } elseif (countRows($findSongInList) == 0) {
                popWindow("此歌不存在在歌单中！");
            } else {
                $result = executePlainSQL("DELETE FROM list_includes WHERE user_ID = {$globalUserName} AND list_ID = {$_POST['listID']} AND ISRC = " . "'" . "ISRC{$_POST['songISRC']}" . "'");
                OCICommit($db_conn);
                popWindow("已从歌单删除此歌！");
            }
        }
    } elseif (array_key_exists('viewComments', $_POST)) {
        global $globalUserName;
        $result = executePlainSQL("SELECT user_id, comment_id, ISRC AS song_commented_on, name AS song_name, comment_date, contents
      FROM Comment_makes NATURAL INNER JOIN Song
      WHERE user_ID = {$globalUserName}");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('makeComments', $_POST)) {
        if (shouldBeNumberCheck($_POST['songISRC'])) {
            global $globalUserName;
            $commentID = getNewID("comment");
            $ISRC = "'ISRC" . $_POST['songISRC'] . "'";
            $contents = "'" . $_POST['commentContents'] . "'";
            $todaydate = "'" . date("Y-m-d") . "'";
            executePlainSQL("INSERT INTO Comment_makes VALUES ({$commentID}, {$globalUserName}, {$ISRC}, {$contents}, {$todaydate})");
            OCICommit($db_conn);
            popWindow("已评论！");
        }
    } elseif (array_key_exists('editComments', $_POST)) {
        global $globalUserName;
        if (!strpos("'" . strtolower($_POST['commentContents']) . "'", 'fuck') and !strpos("'" . strtolower($_POST['commentContents']) . "'", 'shit')) {
            $result = executePlainSQL("UPDATE Comment_makes SET contents = '" . "{$_POST['commentContents']}" . "' WHERE user_ID = {$globalUserName} AND comment_ID = {$_POST['commentID']}");
            OCICommit($db_conn);
            printResult($result);
        } else {
            popWindow("此内容涉嫌黄色暴力！");
        }
    } elseif (array_key_exists('mostPopularList', $_POST)) {
        $result = executePlainSQL("SELECT ISRC, name AS song_name, count(*) AS number_of_song_lists
    FROM list_includes NATURAL INNER JOIN Song
    GROUP BY (ISRC, name)
    ORDER BY count(*) DESC");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('mostPopularComment', $_POST)) {
        $result = executePlainSQL("SELECT ISRC, name AS song_name, count(*) AS number_of_comments
    FROM Comment_makes NATURAL INNER JOIN Song
    GROUP BY (ISRC, name)
    ORDER BY count(*) DESC");
        OCICommit($db_conn);
        printResult($result);
    } else if (array_key_exists(('mostPopularArtist'), $_POST)) {
        $result = executePlainSQL("SELECT artist_ID, name, gender, nationality, avg_comments AS popularity
                                  FROM (SELECT artist_ID, AVG(number_of_comments) AS avg_comments
                                                  FROM (SELECT artist_ID, ISRC, COUNT(comment_id) AS number_of_comments
                                                        FROM (SELECT * FROM sings UNION SELECT * FROM composes UNION SELECT * FROM writes) NATURAL LEFT OUTER JOIN Comment_makes
                                                              GROUP BY (artist_ID, ISRC))
                                                        GROUP BY artist_ID
                                                        ORDER BY AVG(number_of_comments) DESC) NATURAL INNER JOIN (SELECT * FROM Singer UNION SELECT * FROM Composer UNION SELECT * FROM Author)
                                                  WHERE avg_comments IN
                                                    (SELECT MAX(avg_comments)
                                                    FROM (SELECT artist_ID, AVG(number_of_comments) AS avg_comments
                                                          FROM (SELECT artist_ID, ISRC, COUNT(comment_id) AS number_of_comments
                                                                FROM (SELECT * FROM sings UNION SELECT * FROM composes UNION SELECT * FROM writes) NATURAL LEFT OUTER JOIN Comment_makes
                                                                GROUP BY (artist_ID, ISRC))
                                                          GROUP BY artist_ID
                                                          ORDER BY AVG(number_of_comments) DESC))");
        OCICommit($db_conn);
        printResult($result);
    } else if (array_key_exists(('mostUnpopularArtist'), $_POST)) {
        $result = executePlainSQL("SELECT artist_ID, name, gender, nationality, avg_comments AS popularity
                                  FROM (SELECT artist_ID, AVG(number_of_comments) AS avg_comments
                                                  FROM (SELECT artist_ID, ISRC, COUNT(comment_id) AS number_of_comments
                                                  FROM (SELECT * FROM sings UNION SELECT * FROM composes UNION SELECT * FROM writes) NATURAL LEFT OUTER JOIN Comment_makes
                                                        GROUP BY (artist_ID, ISRC))
                                                        GROUP BY artist_ID
                                                        ORDER BY AVG(number_of_comments) DESC) NATURAL INNER JOIN (SELECT * FROM Singer UNION SELECT * FROM Composer UNION SELECT * FROM Author)
                                                        WHERE avg_comments IN (SELECT MIN(avg_comments)
                                                        FROM (SELECT artist_ID, AVG(number_of_comments) AS avg_comments
                                                              FROM (SELECT artist_ID, ISRC, COUNT(comment_id) AS number_of_comments
                                                                    FROM (SELECT * FROM sings UNION SELECT * FROM composes UNION SELECT * FROM writes) NATURAL LEFT OUTER JOIN Comment_makes
                                                          GROUP BY (artist_ID, ISRC))
                                                          GROUP BY artist_ID
                                                          ORDER BY AVG(number_of_comments) DESC))");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('searchSongByISRC', $_POST)) {
        if (shouldBeNumberCheck($_POST['songISRC'])) {
            $checkboxLanguage = !empty($_POST['language']) ? ",language" : "";
            $checkboxGenre = !empty($_POST['genre']) ? ",genre" : "";
            $checkboxDate = !empty($_POST['publish_date']) ? ",Song.publish_date" : "";
            $checkboxPublisher = !empty($_POST['publisher']) ? ",Song.publisher" : "";
            $checkboxDuration = !empty($_POST['duration']) ? ",duration" : "";
            $ISRC = "'ISRC" . $_POST['songISRC'] . "'";
            $result = executePlainSQL("SELECT Song.ISRC, Song.name AS song_name {$checkboxLanguage}{$checkboxGenre}{$checkboxDate}{$checkboxPublisher}{$checkboxDuration}
    FROM Song
    WHERE Song.ISRC = {$ISRC}");
            OCICommit($db_conn);
            printResult($result);
            if (!empty($_POST['singer'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT Singer.name AS singer
    FROM Song, Singer, sings
    WHERE Song.ISRC = {$ISRC} AND Singer.artist_ID = sings.artist_ID AND {$ISRC} = sings.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
            if (!empty($_POST['composer'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT Composer.name AS composer
    FROM Song, Composer, composes
    WHERE Song.ISRC = {$ISRC} AND Composer.artist_ID = composes.artist_ID AND {$ISRC} = composes.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
            if (!empty($_POST['author'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT Author.name AS author
    FROM Song, Author, writes
    WHERE Song.ISRC = {$ISRC} AND Author.artist_ID = writes.artist_ID AND {$ISRC} = writes.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
            if (!empty($_POST['album'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT Album.name AS in_album
    FROM Song, Album, album_includes
    WHERE Song.ISRC = {$ISRC} AND Album.ISBN = album_includes.ISBN AND {$ISRC} = album_includes.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
            if (!empty($_POST['platform'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT Platform.registered_name AS player, Platform.website AS player_website
    FROM Song, Platform, plays
    WHERE Song.ISRC = {$ISRC} AND Platform.registered_name = plays.registered_name AND {$ISRC} = plays.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
            if (!empty($_POST['comment'])) {
                echo "<br>";
                $result = executePlainSQL("SELECT AppUser.nickname, Comment_makes.contents AS comment_contents
    FROM Song, Comment_makes, AppUser
    WHERE Song.ISRC = {$ISRC} AND AppUser.user_ID = Comment_makes.user_ID AND {$ISRC} = Comment_makes.ISRC");
                OCICommit($db_conn);
                printResult($result);
            }
        }
    } elseif (array_key_exists('searchSongByName', $_POST)) {
        $checkboxLanguage = !empty($_POST['language']) ? ",language" : "";
        $checkboxGenre = !empty($_POST['genre']) ? ",genre" : "";
        $checkboxDate = !empty($_POST['publish_date']) ? ",Song.publish_date" : "";
        $checkboxPublisher = !empty($_POST['publisher']) ? ",Song.publisher" : "";
        $checkboxDuration = !empty($_POST['duration']) ? ",duration" : "";
        $songName = "'%" . strtolower($_POST['songName']) . "%'";
        $result = executePlainSQL("SELECT Song.ISRC, Song.name AS song_name {$checkboxLanguage}{$checkboxGenre}{$checkboxDate}{$checkboxPublisher}{$checkboxDuration}
    FROM Song
    WHERE LOWER(Song.name) LIKE {$songName}");
        OCICommit($db_conn);
        printResult($result);
        if (!empty($_POST['singer'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT Singer.name AS singer
    FROM Song, Singer, sings
    WHERE LOWER(Song.name) LIKE {$songName} AND Singer.artist_ID = sings.artist_ID AND Song.ISRC = sings.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
        if (!empty($_POST['composer'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT Composer.name AS composer
    FROM Song, Composer, composes
    WHERE LOWER(Song.name) LIKE {$songName} AND Composer.artist_ID = composes.artist_ID AND Song.ISRC = composes.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
        if (!empty($_POST['author'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT Author.name AS author
    FROM Song, Author, writes
    WHERE LOWER(Song.name) LIKE {$songName} AND Author.artist_ID = writes.artist_ID AND Song.ISRC = writes.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
        if (!empty($_POST['album'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT Album.name AS in_album
    FROM Song, Album, album_includes
    WHERE LOWER(Song.name) LIKE {$songName} AND Album.ISBN = album_includes.ISBN AND Song.ISRC = album_includes.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
        if (!empty($_POST['platform'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT Platform.registered_name AS player, Platform.website AS player_website
    FROM Song, Platform, plays
    WHERE LOWER(Song.name) LIKE {$songName} AND Platform.registered_name = plays.registered_name AND Song.ISRC = plays.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
        if (!empty($_POST['comment'])) {
            echo "<br>";
            $result = executePlainSQL("SELECT AppUser.nickname, Comment_makes.contents AS comment_contents
    FROM Song, Comment_makes, AppUser
    WHERE LOWER(Song.name) LIKE {$songName} AND AppUser.user_ID = Comment_makes.user_ID AND Song.ISRC = Comment_makes.ISRC");
            OCICommit($db_conn);
            printResult($result);
        }
    } elseif (array_key_exists('searchArtistByName', $_POST)) {
        $artistName = "'%" . strtolower($_POST['artistName']) . "%'";
        $result = executePlainSQL("SELECT artist_ID, name, gender, nationality FROM Singer WHERE LOWER(name) LIKE {$artistName}
    UNION SELECT artist_ID, name, gender, nationality FROM Composer WHERE LOWER(name) LIKE {$artistName}
    UNION SELECT artist_ID, name, gender, nationality FROM Author WHERE LOWER(name) LIKE {$artistName}");
        OCICommit($db_conn);
        printResult($result);
        echo "<br>";
        $result = executePlainSQL("SELECT  Song.name AS song_they_sing
    FROM Song, Singer, sings
    WHERE LOWER(Singer.name) LIKE {$artistName} AND Singer.artist_ID = sings.artist_ID AND Song.ISRC = sings.ISRC");
        OCICommit($db_conn);
        printResult($result);
        echo "<br>";
        $result = executePlainSQL("SELECT Song.name AS song_they_compose
    FROM Song, Composer, composes
    WHERE LOWER(Composer.name) LIKE {$artistName} AND Composer.artist_ID = composes.artist_ID AND Song.ISRC = composes.ISRC");
        OCICommit($db_conn);
        printResult($result);
        echo "<br>";
        $result = executePlainSQL("SELECT Song.name AS song_they_write
    FROM Song, Author, writes
    WHERE LOWER(Author.name) LIKE {$artistName} AND Author.artist_ID = writes.artist_ID AND Song.ISRC = writes.ISRC");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('searchAlbumByISBN', $_POST)) {
        if (shouldBeNumberCheck($_POST['albumISBN'])) {
            $ISBN = "'ISBN" . $_POST['albumISBN'] . "'";
            $result = executePlainSQL("SELECT ISBN, name AS album_name, price_in_US$, num_of_songs AS number_of_songs, main_language, publish_date, publisher
    FROM Album
    WHERE ISBN = {$ISBN}");
            OCICommit($db_conn);
            printResult($result);
            echo "<br>";
            $result = executePlainSQL("SELECT Song.name AS song_it_contains
    FROM Song, Album, album_includes
    WHERE Album.ISBN = {$ISBN} AND Song.ISRC = album_includes.ISRC AND {$ISBN} = album_includes.ISBN");
            OCICommit($db_conn);
            printResult($result);
        }
    } elseif (array_key_exists('searchAlbumByName', $_POST)) {
        $albumName = "'%" . strtolower($_POST['albumName']) . "%'";
        $result = executePlainSQL("SELECT ISBN, name AS album_name, price_in_US$, num_of_songs AS number_of_songs, main_language, publish_date, publisher
    FROM Album
    WHERE LOWER(name) LIKE {$albumName}");
        OCICommit($db_conn);
        printResult($result);
        echo "<br>";
        $result = executePlainSQL("SELECT Song.name AS song_it_contains, Album.name AS album_name
    FROM Song, Album, album_includes
    WHERE LOWER(Album.name) LIKE {$albumName} AND Song.ISRC = album_includes.ISRC AND Album.ISBN = album_includes.ISBN
    ORDER BY Album.name");
        OCICommit($db_conn);
        printResult($result);
    } elseif (array_key_exists('searchPlatformByName', $_POST)) {
        $platformName = "'%" . strtolower($_POST['platformName']) . "%'";
        $result = executePlainSQL("SELECT * FROM Platform
    WHERE LOWER(registered_name) LIKE {$platformName}");
        OCICommit($db_conn);
        printResult($result);
        echo "<br>";
        $result = executePlainSQL("SELECT name AS song_it_plays, registered_name AS platform_name
    FROM Song NATURAL INNER JOIN Platform NATURAL INNER JOIN  plays
    WHERE LOWER(registered_name) LIKE {$platformName}
    ORDER BY registered_name");
        OCICommit($db_conn);
        printResult($result);
    }

    //Commit to save changes...
    OCILogoff($db_conn);
} else {
    echo "无法连接";
    $e = OCI_Error(); // For OCILogon errors pass no handle
    echo htmlentities($e['message']);
}

function executePlainSQL($cmdstr)
{ //takes a plain (no bound variables) SQL command and executes it
    //echo "<br>running ".$cmdstr."<br>";
    global $db_conn, $success;
    $statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

    if (!$statement) {
        echo "<br>无法分析命令: " . $cmdstr . "<br>";
        $e = OCI_Error($db_conn); // For OCIParse errors pass the
        // connection handle
        echo htmlentities($e['message']);
        $success = false;
    }

    $r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        echo "<br>无法执行命令: " . $cmdstr . "<br>";
        $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
        echo htmlentities($e['message']);
        $success = false;
    } else {
        echo "<br>成功执行命令: " . $cmdstr . "<br>";
    }
    return $statement;
}

function printResult($result)
{ //prints results from a select statement
    echo "<br>结果:<br>";

    // table head
    $ncols = oci_num_fields($result);
    echo "<table><tr>";
    for ($i = 1; $i <= $ncols; $i++) {
        $column_name = oci_field_name($result, $i);
        echo "<th>{$column_name}</th>";
    }
    echo "</tr>";

    // table data
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr>";
        for ($i = 0; $i < $ncols; $i++) {
            echo "<td>{$row[$i]}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function printWhole($tableName)
{ //prints results from a select statement
    $result = executePlainSQL("SELECT * FROM {$tableName}");
    OCICommit($db_conn);
    echo "<br>表格 [{$tableName}]:<br>";

    // table head
    $ncols = oci_num_fields($result);
    echo "<table><tr>";
    for ($i = 1; $i <= $ncols; $i++) {
        $column_name = oci_field_name($result, $i);
        echo "<th>{$column_name}</th>";
    }
    echo "</tr>";

    // table data
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr>";
        for ($i = 0; $i < $ncols; $i++) {
            echo "<td>{$row[$i]}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function countRows($result)
{
    $rownum = 0;
    while (OCI_Fetch_Array($result, OCI_BOTH)) {
        $rownum++;
    }
    return $rownum;
}

function getNewID($name)
{
    global $globalUserName;
    if ($name == "list") {
        $id = "list_id";
        $table = "Song_List_creates";
    } elseif ($name == "comment") {
        $id = "comment_id";
        $table = "Comment_makes";
    }
    $listID = 1;
    OCICommit($db_conn);

    while (1) {
        $flag = 0;
        $result = executePlainSQL("SELECT {$id} FROM {$table} WHERE user_ID = {$globalUserName}");
        while ($row = OCI_Fetch_Array($result)) {
            if ($listID == $row[0]) {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            break;
        }
        $listID++;
    }
    return $listID;
}

function popWindow($message)
{
    echo '<script language="javascript">alert("' . "{$message}" . '");</script>';
    header("Location:currentpage.php");
}

function shouldBeNumberCheck($input)
{
    if (!is_numeric($input)) {
        popWindow("ID/ISBN/ISRC必须是整数!");
        return false;
    }
    return true;
}

?>

</div>

<script>
function userType(evt, uType) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(uType).style.display = "block";
    evt.currentTarget.className += " active";

    //see if storage is avalible for this browser
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem("selectedTab", uType);
    }
    else{
      cosole.log("Sorry, your browser does not support Web Storage...");
    }

}

function userOpt(evt, opt) {
    var i, subTabcontent, subTablinks;
    subTabcontent = document.getElementsByClassName("subTabcontent");
    for (i = 0; i < subTabcontent.length; i++) {
        subTabcontent[i].style.display = "none";
    }
    subTablinks = document.getElementsByClassName("subTablinks");
    for (i = 0; i < subTablinks.length; i++) {
        subTablinks[i].className = subTablinks[i].className.replace(" active", "");
    }
    document.getElementById(opt).style.display = "block";
    evt.currentTarget.className += " active";

    //see if storage is avalible for this browser
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem("selectedSubTab", opt);
    }
    else{
      cosole.log("Sorry, your browser does not support Web Storage...");
    }

}

function selectionBar(){
  return "<option value=\"Song\">歌曲</option><option value=\"Singer\">歌手</option><option value=\"Composer\">作曲家</option><option value=\"Author\">作词手</option><option value=\"Album\">专辑</option><option value=\"Platform\">平台</option><option value=\"AppUser\">用户</option><option value=\"Comment_makes\">评论</option><option value=\"sings\">唱</option><option value=\"composes\">谱曲</option><option value=\"writes\">作词</option><option value=\"plays\">播放</option><option value=\"album_includes\">专辑包含</option><option value=\"list_includes\">歌单包含</option>"
}

document.getElementById("selectBarT").innerHTML = selectionBar();
document.getElementById("selectBarI").innerHTML = selectionBar();
document.getElementById("selectBarD").innerHTML = selectionBar();
document.getElementById("selectBarU").innerHTML = selectionBar();

//reload the tabs
var selectedTab = localStorage.getItem("selectedTab");
if(selectedTab){
  document.getElementById(selectedTab).style.display = "block";
  console.log(selectedTab);
}

var selectedSubTab = localStorage.getItem("selectedSubTab");
if(selectedSubTab){
  document.getElementById(selectedSubTab).style.display = "block";
  console.log(selectedSubTab);
}
</script>
</body>
