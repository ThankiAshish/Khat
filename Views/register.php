<?php include_once "../Backend/Helpers/header.php";?>
  <body>
    <div class="wrapper">
      <form class="card signup" method="POST" enctype="multipart/form-data">
        <div class="form-header">
          <h1>Register</h1>
        </div>
        <div class="error-text"></div>
        <div class="form-body">
          <input
            type="text"
            name="name"
            id="name"
            class="input-field"
            placeholder="Name" />
          <input
            type="text"
            name="username"
            id="username"
            class="input-field"
            placeholder="Username" />
          <input
            type="email"
            name="email"
            id="email"
            class="input-field"
            placeholder="Email" />
          <input
            type="password"
            name="password"
            id="password"
            class="input-field"
            placeholder="Password" />
          <div class="profile-picture-container">
            <label for="profilePicture" class="btn btn-small"
              >Choose Profile Picture</label
            >
            <input
              type="file"
              name="profilePicture"
              id="profilePicture"
              hidden />
            <p class="file-status">No Files Selected!</p>
          </div>
        </div>
        <div class="form-footer">
          <input
            type="submit"
            value="Register"
            name="register"
            class="btn"
            id="registerButton" />
          <p>
            Already have an Account?&nbsp;<span
              ><a href="./login.php">Login</a></span
            >
          </p>
        </div>
      </form>
    </div>
    <!-- <script src="../Scripts/script.js"></script> -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../Scripts/register.js"></script>
  </body>
</html>
