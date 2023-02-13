<?php
  session_start();
  if(!isset($_SESSION['uid'])) {
    header("location: ./Views/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./Styles/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>
    <title>Khat</title>
  </head>
  <body class="light">
    <?php
      include_once "./Backend/Config/config.php";
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE `uid` = '{$_SESSION['uid']}'");
      if(mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      }
    ?>
    <div class="wrapper">
      <div class="card card-start">
        <header>
          <h1>Khat</h1>
          <i class="fas fa-gear" id="settings-btn"></i>
        </header>
        <div class="search-container">
          <input
            type="search"
            name="search"
            id="search"
            class="input-field"
            placeholder="Search Users" />
          <i class="fas fa-search" id="#searchBtn"></i>
        </div>
        <div class="chats-container">
          <div class="chats">
          </div>
        </div>
      </div>
    </div>
    <script src="./Scripts/script.js"></script>
    <script src="./Scripts/users.js"></script>
  </body>
</html>
