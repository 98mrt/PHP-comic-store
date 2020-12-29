<!DOCTYPE html>
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
                header("Location: admin_login.php");
            }
            $UserName = $_SESSION['AdminUserName'];
        ?>
        <header>
              <div class="book">
                <a href="admin_page.php"><img src="../img/books.png" width="100" height="100" align="center"></a>
              </div>
        </header>
        <table align="center" class="ta1">
            <tr width="200" align="center">
                <td>
                    <a href="addbook.php"><button class="button2" name="addBook">Add Book</button></a>
                </td>
                <td>
                    <a href="listbook.php"><button class="button2" name="updateBook">Update Book</button></a>
                </td>
                <td>
                    <a href="check_sale.php"><button class="button2">ดูยอดขาย</button></a>
                </td>
                <td>
                    <a href="logout_admin.php"><button class="button2">Logout</button></a>
                </td>
            </tr>
        </table>
    </body>
</html>
