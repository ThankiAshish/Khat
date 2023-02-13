$(document).ready(function () {
  const form = document.querySelector(".login");

  $(form).submit(function (event) {
    event.preventDefault();
  });

  $(form).validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Invalid Email Address",
      },
      password: {
        required: "Password is Required!",
      },
    },
    errorContainer: ".error-text",
    errorLabelContainer: ".error-text",
    errorElement: "div",
    submitHandler: function () {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "../Backend/Controllers/loginController.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            if (data === "Success!") {
              location.href = "../";
            } else {
              console.log(data);
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
});
