$(document).ready(function () {
  $("#goBack").click(function (event) {
    event.preventDefault();
    window.location.href = "../";
  });

  $("#settings-btn").click(function (event) {
    event.preventDefault();
    window.location.href = "./Views/settings.php";
  });

  $(".settings-header").click(function () {
    location.href = "../";
  });
});
