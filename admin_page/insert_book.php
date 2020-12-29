
<?php
    session_start();
    if(isset($_SESSION['AdminUserName'])){
    }else{
        header("Location: admin_page/admin_login.php");
    }
    $UserName = $_SESSION['AdminUserName'];

?>
<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comic_store";
    $conn = mysqli_connect( $hostname, $username, $password,$dbname );
    $conn->set_charset("utf8");
    if ( ! $conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
        mysqli_select_db ( $conn, $dbname )or die ( "ไม่สามารถเลือกฐานข้อมูล comic_store ได้" );
    if (isset($_POST["submit"])) {


        $c_id       = $_POST["comic_id"];
        $c_name     = $_POST["comic_name"];
        $author     = $_POST["author"];
        $publisher  = $_POST["publisher"];
        $c_price    = $_POST["comic_price"];
        $c_available= $_POST["comic_available"];
        $c_pic      = $_POST["comic_pic"];

        $sql = "INSERT INTO comic (comic_id, comic_name, author, publisher, comic_price, comic_available, comic_pic)VALUES
        ('$c_id', '$c_name', '$author', '$publisher', '$c_price', '$c_available', '$c_pic')";

        if (!$conn->query($sql) === TRUE) {
            echo"<script>alert('Add หนังสือไม่สำเร็จ')</script>";
        } else {
          echo "<script>
          alert('Add หนังสือสำเร็จ');
          window.location = 'addbook.php';
          </script>";
        }

        mysqli_close($conn);
    }
?>
