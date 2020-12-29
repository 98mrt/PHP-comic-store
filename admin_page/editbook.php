<html>
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="../img/books.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../login.css">
    <title>Comic Store</title>
  </head>
    <body>
      <header>
            <div class="book">
              <a href="admin_page.php"><img src="../img/books.png" width="100" height="100" align="center"></a>
            </div>
      </header>
      <?php
        session_start();
        if(isset($_SESSION['AdminUserName'])){
        }else{
            header("Location: admin_login.php");
        }
        $UserName = $_SESSION['AdminUserName'];

        $c_id       = $_POST["comic_id"];

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comic_store";
        $conn = mysqli_connect( $hostname, $username, $password );
        $conn->set_charset("utf8");
        if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
            mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );


        $sqltxt = "SELECT * FROM comic WHERE comic_id = '$c_id' ";
        $result = mysqli_query( $conn, $sqltxt );
        $row = mysqli_fetch_array( $result );
      ?>

        <form enctype='multipart/form-data' method="post" action="update_book.php" class="form">
          <h2><span class="entypo-book"><i class="fa fa-sign-in"></i></span> แก้ไขหนังสือ</h2>
          <table class="ta2">
            <tr align="center">
              <td>
                <?php
                  echo "รหัสหนังสือ   :</td> <td><input type='text' name='comic_id' value='$row[0]'>";
                  ?>
              </td>
            </tr>
            <tr align="center">
              <td>
                <?php
                  echo "ชื่อหนังสือ    :</td> <td><input type='text' name='comic_name' value='$row[1]'>";
                  ?>
              </td>
            </tr>
            <tr align="center">
              <td>
                <?php
                  echo "ชื่อผู้แต่ง     :</td> <td><input type='text' name='author' value='$row[2]'>";
                  ?>
              </td>
            </tr>
            <tr align="center">
              <td>
                <?php
                  echo "สำนักพิมพ์    :</td> <td><input type='text' name='publisher' value='$row[3]'>";
                  ?>
              </td>
            </tr>
            <tr align="center">
              <td>
                <?php
                  echo "ราคาจำหน่าย   :</td> <td><input type='text' name='comic_price' value='$row[4]'>";
                  ?>
              </td>
            </tr>
            <tr align="center" height="80px">
              <td colspan="2">
                <div class="box">
                  <select name='comic_available'>
                    <option value='available'>available</option>
                    <option value='unvailable'>unvailable</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr align="center">
              <td>
                <?php
                  echo "image :</td> <td><input type='text' name='comic_pic' value='$row[6]'><br>";
                  ?>
              </td>
            </tr>
            <tr align="center">
              <td colspan="2">
                  <button class="button2" name='submit'>Edit</button>
              </td>
            </tr>
          </table>
        </form>
    </body>
</html>
