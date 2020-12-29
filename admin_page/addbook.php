<html>
  <head>
    <link rel="stylesheet" href="../login.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/books.png">
    <meta charset="utf-8">
    <title>Comic Store</title>
  </head>
    <body>
      <?php
        session_start();
        if(isset($_SESSION['AdminUserName'])){
        }else{
            header("Location: admin_page/admin_login.php");
        }
        $UserName = $_SESSION['AdminUserName'];
      ?>
      <header>
            <div class="book">
              <a href="admin_page.php"><img src="../img/books.png" width="100" height="100" align="center"></a>
            </div>
      </header>
        <br><br><br><br><br>
        <form method="post" action="insert_book.php">
          <h2><span class="entypo-book"><i class="fa fa-sign-in"></i></span> เพิ่มหนังสือ</h2>

          <input type="text"  placeholder="รหัสหนังสือ" name="comic_id"/>
          <input type="text"  placeholder="ชื่อหนังสือ" name="comic_name"/>
          <input type="text"  placeholder="ชื่อผู้แต่ง" name="author"/>
          <input type="text"  placeholder="สำนักพิมพ์" name="publisher"/>
          <input type="text"  placeholder="ราคาจำหน่าย" name="comic_price"/>
          <input type="text"  placeholder="ชื่อรูป" name="comic_pic"/>
          <input type="hidden" name="comic_available" value="available">
          <br> <button class="submit button3" name="submit" align="center">Submit</button>
        </form>
    </body>
</html>
