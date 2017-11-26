<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
</head>
<body>
    <div class="search">
        <input type="text" id="text" placeholder="Dubai">
        <div class="search-icon">
            <img src="search-icon.png" alt="" id="searchimg" width="45">
        </div>
    </div>
    <div class="content">
        <div class="imagekader">
            <img id="image" src="" >
        </div>
        <div class="textkader">
            <h1 id="name"></h1>
            <h2 id="temp"></h2>
        </div>
    </div>

</body>
<script>
    document.getElementById("text").value = "Dubai";
    update();

    //als er op enter wordt gedrukt
    document.getElementById("text").addEventListener("keydown",function (e) {
        if(e.keyCode == 13){
            update();
        }
    });


    var button = document.getElementById("searchimg");
    button.addEventListener("click", update);

    //update foto en stad + graden
    function update() {


        var name = document.getElementById("text").value;

        //url van openweathermap API
        var url = "http://api.openweathermap.org/data/2.5/weather?q="+ name +"&units=metric&APPID=a93d7ffbf1d9774081bc4ac785a3a2ce";
        var xmlhttp = new XMLHttpRequest();

        //haalt alles uit de API als json bestand
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var openmap = JSON.parse(this.responseText);
                var naam = openmap.name;
                var temp = openmap.main.temp;

                //de src is een php script
                document.getElementById("image").src = "image.php?city="+naam;


                document.getElementById("name").innerHTML = naam;
                document.getElementById("temp").innerHTML = parseInt(temp)+"°";


                }

        };
        xmlhttp.open("GET", url , true);
        xmlhttp.send();
    }



</script>

<?php


?>
</html>