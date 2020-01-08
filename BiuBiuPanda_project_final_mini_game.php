<!--PHP + Oracle engine for UBC CPSC304 2018 Summber Term 1 Project Group BiuBiuPanda
Group Member: Juntao He, Xuerong Wang, Yuting Wen, Chenliang Zhou
File Created by Chenliang Zhou
Inspired by Jiemin Zhang and Simona Radu
If your name is not listed above and you are not a course staff for UBC CPSC304 2018 Summber Term 1,
  you must quit and delete this file immediately, or for all the consequences arising from your own.
  Report your sharer to: 296046519@qq.com       -->


<!--UBC CPSC304 2018夏季第一学期项目小组BiuBiuPanda PHP+Oracle项目引擎
  小组成员: 王雪榕， 何俊韬，周陈梁, 温宇霆
  文件创建者：周陈梁
  特别鸣谢：Jiemin Zhang 与 Simona Radu，感谢他们提供的测试文件模版。
  若你的名字不在上文所列之中，且你不是UBC CPSC304 2018夏季第一学期课程教员，
  请立即退出并删除此文件，否则一切后果自负。
  举报转发源: 296046519@qq.com       -->

<head>
  <meta charset="utf-8">
    <title>Panda Mini Game</title>
</head>

<style>
.mid
  {position:absolute;right:250px;width:500px;}
body
  {background-image:url('images/BiuBiuPanda_project_final_background.jpg');background-size:cover;background-color:white;background-repeat:no-repeat;background-attachment:fixed;}
.page
  {
    width: 1000px;
    height: 500px;
    background-color: rgba(128, 128, 128, 0.32);
    position: relative;
    margin-right: auto;
    margin-left: auto;
}

p.bigfont
  {font-family: Arial, Helvetica, sans-serif;font-size: 30px;}
</style>

<body>
<div class="page">
  <div class="mid">
    <form method="POST" action="BiuBiuPanda_project_final_mini_game.php" id="questionForm">
      <p class="bigfont">Please answer the question: </p>
      <p id="getQuestion"></p>
      <input type="text" name="answerBar" size="75">
      <input type="submit" value="Submit Answer" name="AnswerButton">
    </form>


<?php

$success = true; //keep track of errors so it redirects the page only if there are no errors
$db_conn = OCILogon("ora_c2e1b", "a26244160", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$globalUserName = file_get_contents('../cs304/BiuBiuPanda_project_final_current_user.txt');

// Connect Oracle...
if ($db_conn) {

  //select a random artist for question type 1
  //count the number of artist
  $allRoundArtistList = executePlainSQL("SELECT name
                                FROM ((SELECT * FROM Singer) INTERSECT (SELECT * FROM Composer) INTERSECT (SELECT * FROM Author))
                                ORDER BY artist_ID");
  $allRoundArtistNum = countRows($allRoundArtistList);

  //set random select artist
  $allRoundArtistList = executePlainSQL("SELECT name
                                FROM ((SELECT * FROM Singer) INTERSECT (SELECT * FROM Composer) INTERSECT (SELECT * FROM Author))
                                ORDER BY artist_ID");
  $allRoundArtistGen = selectRandom($allRoundArtistList, $allRoundArtistNum);

  //put the random selected artist into html
  echo "<input type=\"hidden\" id=\"aArtist\" name=\"aArtist\" value=\"{$allRoundArtistGen}\" form=\"questionForm\">";

  //select a random nationality for question type 2
  //count the number of nationality
  $nationalityList = executePlainSQL("SELECT nationality FROM Singer GROUP BY nationality");
  $nationalityNum = countRows($nationalityList);

  //select the nationality
  $nationalityList = executePlainSQL("SELECT nationality FROM Singer GROUP BY nationality");
  $nationalityGen = selectRandom($nationalityList, $nationalityNum);

  //put the nationality into javascript
  echo "<input type=\"hidden\" id=\"nationality\" name=\"nationality\" value=\"{$nationalityGen}\" form=\"questionForm\">";

  //select a random artist for question type 3
  //count the number of artist
  $normalArtistList = executePlainSQL("SELECT name
                                FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                ORDER BY artist_ID");
  $normalArtistNum = countRows($normalArtistList);

  //set random select artist
  $normalArtistList = executePlainSQL("SELECT name
                                FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                ORDER BY artist_ID");
  $normalArtistGen = selectRandom($normalArtistList, $normalArtistNum);

  //put the random selected artist into html
  echo "<input type=\"hidden\" id=\"nArtist\" name=\"nArtist\" value=\"{$normalArtistGen}\" form=\"questionForm\">";




  // fine if the name of $_POST is equal to 'AnswerButton'
  if (array_key_exists('AnswerButton', $_POST)) {
    if($_POST['question'] == "type1"){
      $artist = "'" . $_POST['aArtist'] . "'";
      $result = executePlainSQL("SELECT name
                                FROM (SELECT ISRC
                                      FROM ((SELECT * FROM sings) INTERSECT (SELECT * FROM composes) INTERSECT (SELECT * FROM writes)) NATURAL INNER JOIN Singer
                                      WHERE Singer.name = {$artist}) NATURAL INNER JOIN Song");

      isCorrect($result, $_POST['answerBar']);
    }
    else if($_POST['question'] == "type2"){
      $nationality = "'" . $_POST['nationality'] . "'";
      $result = executePlainSQL("SELECT artistName
                                FROM (SELECT sings.artist_ID, artistName, Song.ISRC, Song.name AS songName
                                      FROM (SELECT artist_ID AS nationArtistID, name AS artistName
                                            FROM Singer
                                            WHERE Singer.nationality = {$nationality}), sings, Song
                                      WHERE nationArtistID = sings.artist_ID AND sings.ISRC = Song.ISRC) NATURAL INNER JOIN album_includes
                                GROUP BY artistName");

      isCorrect($result, $_POST['answerBar']);
    }
    else{//type 3
      $artist = "'" . $_POST['nArtist'] . "'";
      $result = executePlainSQL("SELECT name, experience
                                FROM (SELECT artist_ID, name, COUNT(ISRC) AS experience
                                      FROM (SELECT artist_ID, name
                                            FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                            WHERE NOT name = {$artist}),
                                           (SELECT artist_ID AS workWithArtist_ID, ISRC
                                            FROM (SELECT ISRC
                                                  FROM (SELECT artist_ID, name
                                                        FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                                        WHERE name = {$artist})
                                                  NATURAL INNER JOIN ((SELECT * FROM sings) UNION (SELECT * FROM composes) UNION (SELECT * FROM writes)))
                                            NATURAL INNER JOIN ((SELECT * FROM sings) UNION (SELECT * FROM composes) UNION (SELECT * FROM writes)))
                                      WHERE artist_ID = workWithArtist_ID
                                      GROUP BY (artist_ID, name))
                                WHERE experience = (SELECT MAX(experience)
                                                    FROM (SELECT artist_ID, name, COUNT(ISRC) AS experience
                                                          FROM (SELECT artist_ID, name
                                                                FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                                                WHERE NOT name = {$artist}),
                                                               (SELECT artist_ID AS workWithArtist_ID, ISRC
                                                                FROM (SELECT ISRC
                                                                      FROM (SELECT artist_ID, name
                                                                            FROM ((SELECT * FROM Singer) UNION (SELECT * FROM Composer) UNION (SELECT * FROM Author))
                                                                            WHERE name = {$artist})
                                                                      NATURAL INNER JOIN ((SELECT * FROM sings) UNION (SELECT * FROM composes) UNION (SELECT * FROM writes)))
                                                                NATURAL INNER JOIN ((SELECT * FROM sings) UNION (SELECT * FROM composes) UNION (SELECT * FROM writes)))
                                                          WHERE artist_ID = workWithArtist_ID
                                                          GROUP BY (artist_ID, name)))
                                ");


      isCorrect($result, $_POST['answerBar']);
    }

  }
}

//takes a plain (no bound variables) SQL command and executes it
function executePlainSQL($cmdstr)
{
    global $db_conn, $success;
    $statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

    if (!$statement) {
        echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = OCI_Error($db_conn); // For OCIParse errors pass the
        // connection handle
        echo htmlentities($e['message']);
        $success = false;
    }

    $r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
        echo htmlentities($e['message']);
        $success = false;
    } else {
        //echo "<br>Executed the following command: " . $cmdstr . "<br>";
    }
    return $statement;
}

function countRows($result)
{
    $rownum = 0;
    while (OCI_Fetch_Array($result, OCI_BOTH)) {
        $rownum++;
    }
    return $rownum;
}


//select random artist
function selectRandom($list, $size)
{
    srand(mktime());
    $randomNum = rand(1, $size);
    // echo "<p>{$randomNum}</p>";

    //select the random artist
    while ($row = OCI_Fetch_Array($list, OCI_BOTH)) {
        if($randomNum == 1){
          return $row[0];
        }
        $randomNum--;
    }
}

function isCorrect($result, $answer){

  $isNothing = true;
  echo "<p>Key to the last question：</p>";
  while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
    //expanding the input answer to the size of the correct answer from the data table
    $correctSize = strlen($row[0]);
    $formatAnswer = str_pad($answer, $correctSize, ' ', STR_PAD_RIGHT);

    // echo "<p>{$correctSize}</p>";
    echo "<p>{$row[0]}</p>";
    if(strcasecmp($formatAnswer, $row[0]) == 0){
      popWindow("Congraduation!!! YOU GOT IT");
      return;
    }

    //indicate there is something
    $isNothing = false;
  }
  if($isNothing){
    if(strcasecmp($answer, "none") == 0){
      popWindow("Congraduation!!! YOU GOT IT");
      return;
    }
  }

  popWindow("You got wrong");
}

function popWindow($message)
{
    echo '<script language="javascript">alert("' . "{$message}" . '");</script>';
    //header("Location:currentpage.php");
}

?>

<script>

//select question type 1, 2 or 3
function randomSelect(){
  var selectedType = Math.floor(Math.random() * 3) + 1;
  var question;
  question = "<input type=\"hidden\" name=\"question\" value=";
  if(selectedType == 1){
    var artist = document.getElementById("aArtist").value;
    question += "\"type1\"><p>Name one song " + artist + " sings, composes or writes</p>";
  }
  else if(selectedType == 2){
    var nationality = document.getElementById("nationality").value;
    question += "\"type2\"><p>Name a(n) " + nationality + " singer whose song is included in the album.</p>";
  }
  else{ // selectedType == 3
    var artist = document.getElementById("nArtist").value;
    question += "\"type3\"><p>Who has the most experience working at the same song with " + artist + "?</p>";
  }

  return question;
}

document.getElementById("getQuestion").innerHTML = randomSelect();

</script>

  </div> <!-- end of mid -->
</div> <!-- end of page -->
</body>
