<html>
  <head>
    <link rel="stylesheet" href="../login.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/books.png">
    <meta charset="utf-8">
    <title>Comic Store</title>
  </head>
    <body>
        <br><br><br><br><br>
        <form method="post" action="insert_admin.php">
          <h2><span class="entypo-user-add"><i class="fa fa-sign-in"></i></span> Register</h2>

          <input type="text" class="user" placeholder="Username" name="username"/>
          <input type="password" class="pass" placeholder="Password" name="password"/>
          <input type="text"  placeholder="First Name" name="fname"/>
          <input type="text"  placeholder="Last Name" name="lname"/>
          <input type="password"  placeholder="รหัสยืนยันจากผู้จัดการ" name="mname"/>
          <br> <button class="submit button3" name="submit" align="center">Submit</button>
        </form>
    </body>
</html>
