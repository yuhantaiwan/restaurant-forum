let ratedIndex = -1;

$(function(){
  $(".rating_user").mouseover(function() {
    resetStarColor();
    ratedIndex = parseInt($(this).data("index"));
    console.log(ratedIndex);
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
    saveToDB();
  });
});

function resetStarColor() {
  $(".rating_user").css("color", "#ccc");
}

function setStarColor(max) {
  for(let i=0; i<=max; i++) {
    $(".rating_user:eq("+i+")").css("cursor", "pointer");
    $(".rating_user:eq("+i+")").css("color", "yellow");
  }
}

function saveToDB() {
  $.ajax({
    type: "POST",
    url: "../php/rating.php",
    data: {ratedIndex: ratedIndex},
    success: function(data) {
      console.log(data);
      alert("評分成功！");
    }, 
    error: function(jqXHR, textStatus, errorThrown) {
      alert("有錯誤產生！");
      console.log(jqXHR.responseText);
    }               
  });
}