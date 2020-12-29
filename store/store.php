<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="../image/x-icon" href="../img/books.png">
    <link rel="stylesheet" href="store.css">
    <meta charset="utf-8">
    <title>Comic Store</title>
  </head>
  <body>
    <?php
      session_start();
      if(!isset($_SESSION['UserName']))header("Location: ../index.php");
      $UserName = $_SESSION['UserName'];
    ?>
      <div class="fixed-nav-bar">
        <header>
          <div class="search_bar">
            <form method="get" id="searchbox">
              <input id="search" name="search" type="text" size="40" placeholder="Search..." />
            </form>
          </div>
          <div class="book">
            <a href="store.php"><img src="../img/books.png" width="100" height="100" align="center"></a>
          </div>
          <input type="checkbox" id="menuButton" />
          <label for="menuButton" class="menu-button-label">
              <div class="white-bar"></div>
              <div class="white-bar"></div>
              <div class="white-bar"></div>
              <div class="white-bar"></div>
          </label>
        </header>
      </div>
      <div class="the-bass">
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../bookshelf/bookshelf.php"><h3 class="menu">ชั้นหนังสือ</h3></a></div>
         </div>
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../topup/topup.php"><h3 class="menu">เติม Point</h3></a></div>
         </div>
         <div class="rela-block drop-down-container">
             <div class="drop-down-item"><a href="../logout.php"><h3 class="menu">Logout</h3></a></div>
         </div>
      </div>


    <br><br>
    <table align="center">
      <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comic_store";
        $conn = mysqli_connect( $hostname, $username, $password );
        if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
        mysqli_set_charset($conn,"utf8");

        if(!isset($_GET["search"])){
          $sqltxt = "SELECT * FROM comic WHERE comic_available = 'available' order by comic_id";
          $result = mysqli_query ( $conn, $sqltxt );
          $count = 0;
          while ( $rs = mysqli_fetch_array ( $result ) )
          {
            if($count == 0)echo "<tr align='center'>";
            echo "<td width='400'><a href='../sell/sell.php?id=$rs[0]'><img src='../img/manga/$rs[6].jpg' width='300' height='400'><br><h3>$rs[1] ราคา $rs[4]</h3></a></td>";
            if($count == 3)echo "</tr><tr height='50'><td></td></tr>";
            $count++;
            if($count == 4)$count = 0;
          }
        }
        else{
          $search = $_GET["search"];
          $sqltxt = "SELECT * FROM comic WHERE comic_name LIKE '%$search%' OR '$search%' OR '%$search' order by comic_id";
          $result = mysqli_query ( $conn, $sqltxt );
          $count = 0;
          $empty = 0;
          while ( $rs = mysqli_fetch_array ( $result ) )
          {
            if($count == 0)echo "<tr align='center'>";
            echo "<td width='400'><a href='../sell/sell.php?id=$rs[0]'><img src='../img/manga/$rs[6].jpg' width='300' height='400'><br><h3>$rs[1] ราคา $rs[4]</h3></a></td>";
            if($count == 3)echo "</tr><tr height='50'><td></td></tr>";
            $count++;
            if($count == 4)$count = 0;
            $empty++;
          }
          if($empty == 0){
            echo "<script>
            alert('ไม่พบหนังสือ');
            window.location = 'store.php';
            </script>";
          }
        }

        mysqli_close($conn);
      ?>
    </table>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../menu.js"></script>
  </body>
</html>
