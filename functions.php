<?php

    session_start();

     $link = mysqli_connect("sdb-63.hosting.stackcp.net","projecthub-35303335469e","projecthub123","projecthub-35303335469e");

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

    if ($_GET['function'] == "logout") {
        
        session_unset();
        
    }

        function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'sec')
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

    function displayTweets($type) {
        
        global $link;
        
        if ($type == 'public') {
            
            $whereClause = "";
                
        } else if ($type == 'yourtweets') {
            
           $whereClause = "WHERE userid = ". mysqli_real_escape_string($link, $_SESSION['id']);
            
        } else if ($type == 'search') {
            
            echo '<p>Showing search results for "'.mysqli_real_escape_string($link, $_GET['q']).'":</p>';
            
           $whereClause = "WHERE fullname LIKE '%". mysqli_real_escape_string($link, $_GET['q'])."%'";
            
        } else if (is_numeric($type)) {
            
            $userQuery = "SELECT * FROM Alumni WHERE id = ".mysqli_real_escape_string($link, $type)." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
            
            echo "<h2>".mysqli_real_escape_string($link, $user['email'])."'s Alumni</h2>";
            
            $whereClause = "WHERE userid = ". mysqli_real_escape_string($link, $type);
            
            
        }
        
        
        $query = "SELECT * FROM Alumni ".$whereClause." ORDER BY `datetime` DESC";
        
        $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 0) {
            
            echo "No Alumni found";
            
        } else {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
                $userQuery = "SELECT * FROM Alumni WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
                $userQueryResult = mysqli_query($link, $userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
                
                echo "<div class='tweet'><p><a href='?page=publicprofiles&userid=".$user['id']."'>".$user['email']."</a> <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>:</p>";
                
                echo "<p style='color:rgb(0,33,71)'>".$row['fullname']."</p>";
                
                echo "</a></p></div>";
                
            }
            
        }
        
        
    }

    
    function displaySearch() {
        
        echo '<form class="form-inline">
  <div class="form-group">
    <input type="hidden" name="page" value="search">
    <input type="text" name="q" class="form-control" id="search" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-success">Search</button>
</form>';
        
        
    }

    function displayTweetBox() {
        
        if ($_SESSION['id'] > 0) {
            
            echo '<div id="tweetSuccess" class="alert alert-success">Your tweet was posted successfully.</div>
            <div id="tweetFail" class="alert alert-danger"></div>
            <div class="form">
  <div class="form-group">
     <h6 style="font-family:cursive;color:rgb(25,25,112)">type your message here!!!!<br></h6>   
    <textarea  class="form-control" id="tweetContent" ></textarea>
    <br>
    <h6 style="font-family:cursive;color:rgb(25,25,112)">Tag someone with their email address:<br></h6><input type="text" id="tag">
			
			<br><br>
  </div>
  <button id="postTweetButton" class="btn btn-success">Click to post</button><br><br>
  <button class="btn btn-success-outline" data-toggle="modal" data-target="#myModal2">ShareWith</button>
  selected user:<input type="text" id="emailSelected"><br><br>
  <button id="postTweetButton2" class="btn btn-success">Click to post</button><br><br>
</div>';				          
        }        
    }

    function displayUsers() {
        
        global $link;
        
        $query = "SELECT * FROM Alumni";
        
        $result = mysqli_query($link, $query);
            
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<div class='activeusers'><p><a href='?page=publicprofiles&userid=".$row['id']."'>".$row['email']."</a></p></div>";
            
        }
        
        
        
    }

        

?>