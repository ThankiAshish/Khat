<?php
  session_start();
  if(!isset($_SESSION['uid'])) {
    header("location: ./login.php");
  }
?>
<?php include_once "../Backend/Helpers/header.php";?>
  <body>
    <div class="wrapper">
      <div class="card card-start chat-container">
        <div class="chat-header">
          <?php
            include_once "../Backend/Config/config.php";
            $uid = mysqli_real_escape_string($conn, $_GET['uid']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE `uid` = '{$uid}'");
            if(mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="go-back-container">
            <i class="fas fa-arrow-left" id="goBack"></i>
          </div>
          <div class="chat-user-details">
            <div class="user-profile-picture">
              <img src="../Backend/Images/<?php echo $row['profile_picture']; ?>" alt="Profile Picture">
            </div>
            <div class="user-details">
              <h3><?php echo $row['name'];?></h3>
              <p><?php echo "@".$row['username'];?></p>
            </div>
          </div>
          <div class="status-container">
            <?php 
              if($row['status'] === 'Active Now') {
                echo "<i class='fas fa-circle online'></i>";
              } else {
                echo "<i class='fas fa-circle offline'></i>";
              }
            ?>
          </div>
        </div>
        <div class="chat-body"></div>
        <form class="chat-footer">
          <input type="text" name="outgoingId" value=<?php echo $_SESSION['uid'];?> hidden>
          <input type="text" name="incomingId" value=<?php echo $uid;?> hidden>
          <input
            type="text"
            name="sendMessage"
            id="sendMessage"
            placeholder="Send Message"
            class="input-field"
            autocomplete="off" />
          <button class="btn btn-send"><i class="fas fa-paper-plane"></i></button>
        </form>
      </div>
    </div>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    <script src="../Scripts/script.js"></script>
    <script src="../Scripts/chat.js"></script>
  </body>
</html>
