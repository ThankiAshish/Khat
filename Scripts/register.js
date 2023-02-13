$(document).ready(function () {
  const form = document.querySelector(".signup");
  const registerButton = form.querySelector("#registerButton");

  $(form).submit(function (event) {
    event.preventDefault();
  });

  $(form).validate({
    rules: {
      name: {
        required: true,
      },
      username: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
      profilePicture: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Enter Name",
      },
      username: {
        required: "Invalid Username",
      },
      email: {
        required: "Invalid Email Address",
      },
      password: {
        required: "Password not Acceptable",
        minlength: "Minimum 8 Characters Required",
      },
      profilePicture: {
        required: "Profile Picture Required",
      },
    },
    ignore: ":hidden:not(#profilePicture)",
    errorContainer: ".error-text",
    errorLabelContainer: ".error-text",
    errorElement: "div",
    submitHandler: function () {
      $(".error-text").css("display", "block");
      $(".error-text").show();
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../Backend/Controllers/registerController.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            if (data == "Success!") {
              location.href = "../";
            } else {
              $(".error-text").text(data);
              $(".error-text").css("display", "block");
            }
          }
        }
      };
      let formData = new FormData(form);
      xhr.send(formData);
    },
  });

  $(registerButton).click(function () {});
});
