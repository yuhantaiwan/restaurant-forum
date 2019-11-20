$(function() {
  $("#register_password").on("input propertychange", showPasswordMsg);
  $("#register_form").on("submit", checkNewUser);
  $("#register_form").on("reset", cancelMsg);
});

function showPasswordMsg() {
  if($("#register_password").val().length < 6) {
    $("#register_password_msg").html("密碼不得少於6個字");
    $("#register_password_msg").css("color", "red");
  } else {
    $("#register_password_msg").html("有效的密碼");
    $("#register_password_msg").css("color", "green");
  }
}


function checkNewUser() {
  if($("#register_password").val() != $("#confirm_password").val()) {
    // alert("密碼不一致！");
    $("#register_confirm_msg").html("密碼不一致！");
    $("#register_confirm_msg").css("color", "red");
  } else {
    $("#register_confirm_msg").html("");
    $.ajax({
      type: "POST",
      url: "../php/add_user.php",
      data: {username: $("#register_username").val(), email: $("#register_email").val(), password: $("#register_password").val()},
      success: showRegisterMsg,
      error: function(jqXHR, textStatus, errorThrown) {
        alert("ajax傳送資料失敗！");
        console.log(jqXHR.responseText);
      } 
    });
  }
  return false;
}

function showRegisterMsg(data) {
  if(data == "yes") {
    alert("會員新增成功！");
    window.location.href = "member_list.php";
  } else {
    // alert("該帳號已被註冊！");
    $("#register_email_msg").html("該帳號已被註冊，不可使用！");
    $("#register_email_msg").css("color", "red");
  } 
}

function cancelMsg() {
  $("#register_email_msg").html("");
  $("#register_confirm_msg").html("");
  $("#register_password_msg").html("");
}
