$(document).ready(function () {
  setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./Backend/Controllers/usersController.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if (!$("#search").hasClass("active")) {
            $(".chats").html(data);
          }
        }
      }
    };
    xhr.send();
  }, 500);

  $("#search").keyup(function () {
    let searchContent = $("#search").val();
    if (searchContent !== "") {
      $("#search").addClass("active");
      $(".chats").addClass("default");
    } else {
      $("#search").removeClass("active");
      $(".chats").removeClass("default");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./Backend/Controllers/searchController.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if (data !== "User Not Found!") {
            $(".chats").removeClass("default");
          }
          $(".chats").html(data);
        }
      }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchContent=" + searchContent);
  });
});
