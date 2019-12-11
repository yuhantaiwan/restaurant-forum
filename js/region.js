$(function() {
  $.ajax({
    type: "GET",
    url: "https://restaurant-forum-yh.herokuapp.com//forum/php/get_json.php",
    success: showRegion,
    error: function() {
      alert("Connect to region api error");
    }
  });
});
let counter = new Array();
let regionData = new Array();
let regionTitle = new Array();
function showRegion(data) {
  for(let i=0; i<data.length; i++) {
    let getRegion = data[i]["City"];
    // console.log(getRegion);
    if(counter[getRegion]==undefined) {
      counter[getRegion] = regionData.length;
      regionData.push(new Array());
      regionTitle[counter[getRegion]] = getRegion;
    }
    regionData[counter[getRegion]].push(data[i]);
  }
  // console.log(regionData);
  for(let i=0; i<regionTitle.length; i++) {
    let storeName="";
    let storeDescript="";
    let storeImg="";
    let storeID="";
    for(let j=0; j<regionData[i].length; j++) {
      storeName += regionData[i][j]["Name"] + "|";
      storeDescript += regionData[i][j]["FoodFeature"] + "|";
      storeImg += regionData[i][j]["PicURL"] + "|";
      storeID += regionData[i][j]["ID"] + "|";
    }
    let regionHTML = '<li class="nav-item"><a class="nav-link region_nav" href="javascript:void(0)" data-name="'
    +storeName+'" data-text="'
    +storeDescript+'" data-img="'
    +storeImg+'" data-id="'
    +storeID+'">'
    +regionTitle[i]+'</a></li>';
    $("#region_menu").append(regionHTML);
  }
  $(".region_nav").on("click", function() {
    getItem($(this).attr("data-name"), $(this).attr("data-text"), $(this).attr("data-img"), $(this).attr("data-id"));
  });

  $(".region_nav").on("click", function() {
    $(".region_nav").removeClass("active")
    $(this).addClass("active");
  });
}

function getItem(dataName, dataText, dataImg, dataID) {
  let arrayName = dataName.split("|");
  let arrayText = dataText.split("|");
  let arrayImg = dataImg.split("|");
  let arrayID = dataID.split("|");

  $("#food-cards").empty();
  for(let i=0; i<arrayName.length-1; i++) {
    let storesHTML = '<div class="col-md-4"><div class="card"><img src="'
    +arrayImg[i]+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'
    +arrayName[i]+'</h5><p class="card-text mb-3">'
    +arrayText[i]+'</p><a href="restaurant.php?i='+arrayID[i]+'" class="btn btn-primary btn-block a_store" data-name="'+arrayName[i]+'" data-img="'+arrayImg[i]+'" data-text="'+arrayText[i]+' data-id="'+arrayID[i]+'">看更多</a></div></div></div>';
    $("#food-cards").append(storesHTML);
  }
}
