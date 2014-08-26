var informationArray;
var info;


$.ajax({
      url: "getCartelera.php",
      dataType: "json",
      success: function(response) {
        //console.log(response);
        informationArray = response;
        for (var i = 0; i < informationArray.peliculas.length; i++){
          info = "<div class='row'><div class='small-4 columns'>"+
          "<img width='100%' src="+informationArray.peliculas[i].IMGPATH+
          "></img>"+"</div>" + "<div class='small-8 columns'><b>"+
          informationArray.peliculas[i].TITLE+"</b><br>"+
          "País: "+informationArray.peliculas[i].PAIS+
          "<br>Año: "+informationArray.peliculas[i].ANO+
          "<br>Duración: "+informationArray.peliculas[i].DURATION+" min"+
          "<br>Clasifiación: "+informationArray.peliculas[i].CLASIFICACION+
          "<br>Horarios ";
          for (var j=0; j < informationArray.peliculas[i].horarios.length; j++){
            info+="<ul>";
            info+="<li>"+informationArray.peliculas[i].horarios[j]+"</li>";
            info+="</ul>";
          }
          info +="</div></div>";
          $("#cartelera").append(info);
          $("#cartelera").append("<br>");
        }
      }
    });



function filterInformation(){
  var clasificaciones = document.getElementsByName("classifArray[]");
  var realClasif = [];
  var infoToShow = [];
  var textFilter = document.getElementById("title").value.toUpperCase();
  info = "";
  document.getElementById("cartelera").innerHTML = ("");
  for (var i = 0; i < clasificaciones.length; i++){
    if (clasificaciones[i].checked){
      realClasif.push(clasificaciones[i].value);
    }
  }

  for (var i = 0; i < informationArray.peliculas.length; i++){
    if ((informationArray.peliculas[i].TITLE.toUpperCase().indexOf(textFilter)>-1)) {
      alert(informationArray.peliculas[i].TITLE + "Contenido");
      infoToShow.push(informationArray.peliculas[i]);
    }






    info = "<div class='row'><div class='small-4 columns'>"+
    "<img width='100%' src="+infoToShow[i].IMGPATH+
    "></img>"+"</div>" + "<div class='small-8 columns'><b>"+
    infoToShow[i].TITLE+"</b><br>"+
    "País: "+infoToShow[i].PAIS+
    "<br>Año: "+infoToShow[i].ANO+
    "<br>Duración: "+infoToShow[i].DURATION+" min"+
    "<br>Clasifiación: "+infoToShow[i].CLASIFICACION+
    "<br>Horarios ";
    for (var j=0; j < infoToShow[i].horarios.length; j++){
      info+="<ul>";
      info+="<li>"+infoToShow[i].horarios[j]+"</li>";
      info+="</ul>";
    }
    info +="</div></div>";
    $("#cartelera").append(info);
    $("#cartelera").append("<br>");



    
  }
}
    
