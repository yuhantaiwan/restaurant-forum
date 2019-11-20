$(function() {
  $("#update_password").on("input propertychange", showPasswordMsg);
  $("#update_form").on("submit", updateMember);
  $("#update_form").on("reset", cancelMsg);
});

function showPasswordMsg() {
  if($("#update_password").val().length < 6) {
    $("#update_password_msg").html("密碼不得少於6個字");
    $("#update_password_msg").css("color", "red");
  } else {
    $("#update_password_msg").html("有效的密碼");
    $("#update_password_msg").css("color", "green");
  }
}

function updateMember() {
  if($("#update_password").val() != $("#confirm_password").val()) {
    // alert("密碼不一致！");
    $("#update_confirm_msg").html("密碼不一致！");
    $("#update_confirm_msg").css("color", "red");
  } else {
    $("#update_confirm_msg").html("");
    let send_data = {id: $("#update_id").val(), username: $("#update_username").val()};
    // 如果有輸入密碼，再將密碼加入
    if($("#update_password").val()!="") {     
      send_data.password = $("#update_password").val();
    }
    $.ajax({
      type: "POST",
      url: "../php/update_member.php",
      data: send_data,
      success: showUpdateMsg,
      error: function(jqXHR, textStatus, errorThrown) {
        alert("ajax傳送資料失敗！");
        console.log(jqXHR.responseText);
      } 
    });
  }
  return false;
}

function showUpdateMsg(data) {
  if(data == "yes") {
    console.log(data);
    alert("會員資料修改成功！");
    window.location.href = "member_list.php";
  } else {
    console.log(data);
    alert("會員資料修改失敗！");
  } 
}

function cancelMsg() {
  $("#update_email_msg").html("");
  $("#update_confirm_msg").html("");
  $("#update_password_msg").html("");
}
