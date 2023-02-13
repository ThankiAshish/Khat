$(document).ready(function () {
  const form = document.querySelector(".chat-footer");

  $(form).submit(function (event) {
    event.preventDefault();
  });

  $(".btn-send").click(function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Backend/Controllers/chatController.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          $("#sendMessage").val("");
          scrollToBottom();
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
  });

  $(".chat-body").mouseenter(function () {
    $(".chat-body").addClass("active");
  });

  $(".chat-body").mouseleave(function () {
    $(".chat-body").removeClass("active");
  });

  setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../Backend/Controllers/getChatController.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          $(".chat-body").html(data);
          if (!$(".chat-body").hasClass("active")) {
            scrollToBottom();
          }
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
  }, 500);

  function scrollToBottom() {
    $(".chat-body").scrollTop($(".chat-body").height());
  }
});
