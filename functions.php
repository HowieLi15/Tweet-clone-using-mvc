
<?php
error_reporting(0);
session_start();
    $link=mysqli_connect('localhost','root','','twitter');
    if($_GET['function']=='logout'){
        session_unset();
    }

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}

    function displaytweets($type){
        global $link;
        if($type=='public'){
            $whereclause='';
        }
        $query="select * from tweets".$whereclause." order by 'datetime' desc limit 10";

        $result=mysqli_query($link, $query);
        if (mysqli_num_rows($result)==0) {
            echo 'There is no tweets to display.';

        }
        else{
            while($row=mysqli_fetch_assoc($result)){
                $userquery="select * from users where id=".mysqli_real_escape_string($link,$row['userid'])." limit 1";
                $userqueryresult=mysqli_query($link,$userquery);
                $user=mysqli_fetch_assoc($userqueryresult);
                echo "<div class='tweet'><p>".$user['email']."<span class='time'>".time_since(time()-strtotime($row['datetime']))."ago</span></p>";
                echo "<p>".$row['tweet']."</p>";
                echo"<p>Follow</p></div>";
            }
        }
    }

    function displaysearch(){
        echo'<form class="form-inline">
  
            <div class="form-group">
    
            <input type="text" class="form-control" id="search" placeholder="search">
            
            <button type="submit" class="btn btn-primary">Search Tweets</button>
            </form>  </div>
            ';
    }
    function displaytweetbox(){
        if($_SESSION['id']>0){
            echo'<form class="form-inline">
  
            <div class="form-group mx-sm-3 mb-2">
    
            <textarea class="form-control" id="tweetcontent"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mx-sm-3 mb-2">Post Tweets</button>
            </form>';

        }
    }
?>