<?php
  session_start();
  if(!isset($_SESSION['uid'])) {
    header("location: ./login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Styles//style.css" />
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
    <title>Khat | Settings</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="card card-start settings-container">
        <?php
          include_once "../Backend/Config/config.php";
          $query = "SELECT * FROM users WHERE uid = '{$_SESSION['uid']}'";
          $sql = mysqli_query($conn, $query);
          if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
        <div class="settings-header">
          <i class="fas fa-arrow-left"></i>
          <h3>Settings</h3>
        </div>
        <form class="settings-body" method="POST">
          <div class="profile-picture-container">
            <img src="../Backend/Images/<?php echo $row['profile_picture'];?>" alt="Profile Picture">
          </div>
          <div class="user-details">
            <input type="text" name="user-name" id="user-name" value=<?php echo $row['username']?> readonly class="input-field">
            <i class="fas fa-pen" id="editName"></i>
          </div>
          <div class="user-details">
            <input type="email" name="user-email" id="user-email" value=<?php echo $row['email']?> readonly class="input-field">
            <i class="fas fa-pen" id="editEmail"></i>
          </div>
          <!-- <div class="change-theme-container">
            <h4>Change Theme: </h4>
            <i class="fas fa-moon" id="theme-button"></i>
          </div> -->
          <button class="btn save-btn">Save</button>
        </form>
        <div class="settings-footer">
          <a class="btn" href="../Backend/Controllers/logoutController.php?logout_id=<?php echo $_SESSION['uid'];?>">Logout</a>
        </div>
      </div>
    </div>
    <script src="../Scripts/script.js"></script>
    <script src="../Scripts/settings.js"></script>
  </body>
</html>
