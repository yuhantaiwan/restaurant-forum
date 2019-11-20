let ratedIndex = -1;

$(function() {
  $("#comment_form").on("submit", leaveComment);

   $(".rating_user").mouseover(function() {
    resetStarColor();
    ratedIndex = parseInt($(this).data("index"));
    setStarColor(ratedIndex);
  });

  $(".rating_user").mouseleave(function() {
    resetStarColor();
    if(ratedIndex!=-1) {
      setStarColor(ratedIndex);
    }
  });

  $(".rating_user").on("click", function() {
    ratedIndex = parseInt($(this).data("index"));
    console.log(ratedIndex);
    // saveToDB();
  });
});

function leaveComment() {
  if(ratedIndex == -1) {
    alert("請留下您的評分");
  } else {
    $.ajax({
      type: "POST",
      url: "../php/leave_comment.php",
      data: {
        comment: $("#comment_textarea").val(), 
        ratedIndex: ratedIndex
      },
      success: showComment,
      error: function(jqXHR, textStatus, errorThrown) {
        alert("有錯誤產生");
        console.log(jqXHR.responseText);
      }                
    });
  }
  return false;
}

function showComment(data) {
  console.log(data);
  if(data == "yes") {
    alert("留言成功！");
    location.reload();
  } else {
    alert("留言失敗！");
    return false;
  }
}

function resetStarColor() {
  $(".rating_user").css("color", "#ccc");
}

function setStarColor(max) {
  for(let i=0; i<=max; i++) {
    $(".rating_user:eq("+i+")").css("cursor", "pointer");
    $(".rating_user:eq("+i+")").css("color", "yellow");
  }
}