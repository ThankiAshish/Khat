<?php include_once "../Backend/Helpers/header.php";?>
  <body>
    <div class="wrapper">
      <form class="card login" method="post">
        <div class="form-header">
          <h1>Login</h1>
        </div>
        <div class="error-text"></div>
        <div class="form-body">
          <input
            type="text"
            name="email"
            id="email"
            class="input-field"
            placeholder="Email Address" />
          <input
            type="password"
            name="password"
            id="password"
            class="input-field"
            placeholder="Password" />
        </div>
        <div class="form-footer">
          <input
            type="submit"
            value="Login"
            name="login"
            class="btn"
            id="loginBtn" />
          <p>
            Don't have an Account?&nbsp;<span
              ><a href="./register.php">Register</a></span
            >
          </p>
        </div>
      </form>
    </div>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../Scripts/script.js"></script>
    <script src="../Scripts/login.js"></script>
  </body>
</html>
