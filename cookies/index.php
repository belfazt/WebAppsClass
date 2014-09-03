<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
  <?php
    $link = mysqli_connect("localhost","superuser","bestpass123","cartelera") or die ("Error ".mysqli_error($link));

    $query = "SELECT TITLE FROM peliculas";

    $result = $link->query($query);



  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB Application Example</title>

  <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">

  <!-- If you are using the gem version, you need this only -->
 

  <script src="js/vendor/modernizr.js"></script>



</head>
<body>

  <!-- body content here -->


<div class="row" id="selectors">
  <div class="small-4 columns">
        <select id="country">
          <option>Selecciona un País</option>
          <option value="ET">Etiopía</option>
          <option value="SOM">Somalia</option>
          <option value="CONG">Republica del Congo</option>
        </select>
        <select id="lenguaje">
          <option>Selecciona un Lenguaje</option>
          <option value="ES">Español</option>
          <option value="ENG">Inglés</option>
        </select>
        <select id="audio">
          <option>Selecciona una fuente de Audio</option>
          <option value="ES">Español</option>
          <option value="ENG">Inglés</option>
        </select>
        <select id="lastmovie">
          <option>Ultima película que viste</option>
          <?php
            while($fila = mysqli_fetch_assoc($result)){
              $peli = $fila["TITLE"];
              echo "<option value'$fila'>"."$peli"."</option>";
            }
          ?>
        </select>
    <a class="button" href="#" onclick='getInfo()'>Go</a>
    </form>
  


  </div>
  <div class="small-8 columns">Content</div>
</div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
    
    function getInfo(){
      
      var pais = document.getElementById("country").value;
      var lang = document.getElementById("lenguaje").value;
      var audio = document.getElementById("audio").value;
      var LastMovie = document.getElementById("lastmovie").value;
      $.post("cookie.php", {audio:audio, pais:pais, language:lang, lastmovie:LastMovie}, function(data){
        //console.log(data)
        window.document.reload();
      });  


    }

    if(navigator.cookieEnabled){
        if (document.cookie.indexOf("pais")>-1 && document.cookie.indexOf("language")>-1 && document.cookie.indexOf("lastmovie")>-1 && document.cookie.indexOf("audio")>-1){
          document.getElementById("selectors").innerHTML = ("");
          var text = "<h1>Ultima Película Vista</h1>";
          var informationArray;
          
          var cookies = document.cookie.split(";");

          for (var i = 0; i < cookies.length; i++) {
            var cook = cookies[i].split("=");
            console.log(cook);
            text+= "<b>"+cook[0]+"</b>:"+cook[1]+"<br>";
          };

          $.ajax({
            url: "cartelera.php",
            dataType: "json",
            success: function(response) {
              //console.log(response);
              informationArray = response;
              for (var i = 0; i < informationArray.peliculas.length; i++) {
                console.log(informationArray.peliculas[i]);
                text+= "<img src='"+informationArray.peliculas[i].IMGPATH+"' width='300'/> <br>";
              }
              document.getElementById("selectors").innerHTML = text;
            }
          });

          
          
          




      }
    }





  </script>
</body>
</html>