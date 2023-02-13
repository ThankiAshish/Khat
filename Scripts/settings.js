$(document).ready(function () {
  const form = document.querySelector(".settings-body");
  $(form).submit(function (event) {
    event.preventDefault();
  });

  $("#editName").click(function () {
    $("#user-name").attr("readonly", false);
    $(".save-btn").addClass("show");
  });

  $("#editEmail").click(function () {
    $("#user-email").attr("readonly", false);
    $(".save-btn").addClass("show");
  });

  $(".save-btn").click(function () {
    $("#user-name").attr("value", $("#user-name").attr("value"));
    $("#user-email").attr("value", $("#user-email").attr("value"));

    $("#user-name").attr("readonly", true);
    $("#user-email").attr("readonly", true);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Backend/Controllers/editUserController.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          console.log(data);
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
    $(".save-btn").removeClass("show");
  });
});
