var informationArray;
var photos;
var picsHTML;
var imgLink;

$.ajax({

      url: "api.php",
      dataType: "json",
      success: function(response) {
        //console.log(response);
        
        informationArray = response;
        photos = informationArray.photos.photo;
        photos = shuffle(photos);
          for (var i = 0; i < photos.length; i++) {
              //console.log(photos[i]["@attributes"]);
              imgLink = "https://farm"+photos[i]["@attributes"].farm+".staticflickr.com/"+photos[i]["@attributes"].server+"/"+photos[i]["@attributes"].id+"_"+photos[i]["@attributes"].secret+"_b.jpg";
              var img = "<img src='"+imgLink+"' width='100%'/>";
              var modal = "<a data-toggle='modal' href='#modal-id"+[i]+"'>"+
                          img+
                          "</a>"+
                            "<div class='modal fade' id='modal-id"+[i]+"'>"+
                              "<div class='modal-dialog modal-lg'>"+
                                "<div class='modal-content'>"+
                                  "<div class='modal-header'>"+
                                    photos[i]["@attributes"].title+
                                  "</div>"+
                                  "<div class='modal-body'>"+
                                    img+
                                  "</div>"+
                                "</div>"+
                              "</div>"+
                            "</div>"
              picsHTML = "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>"+modal+"</div>";
              $("#pics").append('<br>');
              $("#pics").append(picsHTML);
          }
        }
    });


function reloadJSON(text, callback){
  
  $.ajax({
      url: "api.php?filter="+text,
      dataType: "json",
      success: function(response) {
        console.log("api.php?filter="+text);
        informationArray = response;
        photos = informationArray.photos.photo;
        callback();
        //photos = shuffle(photos);
        //console.log(photos);
    }
  });
  
}
function changePics(){
  var text = document.getElementById("filter").value;
  

  if (text != ""){
    reloadJSON(text, function() {
      changer();
    });
  }
  else{
    changer();
  }
}

function changer(){
  var pics = document.getElementById("inputPics").value;
  //console.log(pics);
  document.getElementById("pics").innerHTML = "";
  document.getElementById("val").innerHTML = "<center><h3>"+pics+"</h3></center>";
  photos = shuffle(photos);
  for (var i = 0; i < pics; i++) {
      //console.log(photos[i]["@attributes"]);
      imgLink = "https://farm"+photos[i]["@attributes"].farm+".staticflickr.com/"+photos[i]["@attributes"].server+"/"+photos[i]["@attributes"].id+"_"+photos[i]["@attributes"].secret+"_b.jpg";
      var img = "<img src='"+imgLink+"' width='100%'/>";
      var modal = "<a data-toggle='modal' href='#modal-id"+[i]+"'>"+
                  img+
                  "</a>"+
                    "<div class='modal fade' id='modal-id"+[i]+"'>"+
                      "<div class='modal-dialog modal-lg'>"+
                        "<div class='modal-content'>"+
                          "<div class='modal-header'>"+
                            photos[i]["@attributes"].title+
                          "</div>"+
                          "<div class='modal-body'>"+
                            img+
                          "</div>"+
                        "</div>"+
                      "</div>"+
                    "</div>"
      picsHTML = "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>"+modal+"</div>";
      $("#pics").append('<br>');
      $("#pics").append(picsHTML);
  }
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}
