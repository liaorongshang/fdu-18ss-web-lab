<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

$servername = "localhost";
$username = "root";
$passwork = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, $passwork, $dbname);

$sql_continets = "SELECT * FROM Continents";
$sql_contries = "SELECT * FROM Countries";
$result = $conn->query($sql_continets);
$result_countries = $conn->query($sql_contries);

$sql_display_image = "SELECT * from ImageDetails";
$result_images = $conn->query($sql_display_image);

include "functions.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />  
    <script>
        var CookieUtil = {
            get : function (name) {
                var cookieName = encodeURIComponent(name) + "=",
                    cookieStart = document.cookie.indexOf(cookieName),
                    cookieValue = null;

                if(cookieStart > -1){
                    var cookieEnd = document.cookie.indexOf(";", cookieStart);
                    if(cookieEnd === -1){
                        cookieEnd = document.cookie.length;
                    }
                    cookieValue = decodeURIComponent(document.cookie.substring(cookieStart+cookieName.length, cookieEnd));
                }
                return cookieValue;
            },

            set : function (name, value, expires, path, domain, secure) {
                var cookieText = encodeURIComponent(name) + "=" + encodeURIComponent(value);
                if(expires instanceof Date){
                    cookieText += "; expires=" + expires.toGMTString();
                }
                if(path){
                    cookieText += "; path= "+ path;
                }
                if(domain){
                    cookieText += ";domain = " + domain;
                }
                if(secure){
                    cookieText += ";secure";
                }
                document.cookie = cookieText;
            },

            unset : function (name, path, domain, secure) {
                this.set(name,"", new Date(), path, domain, secure);
            }
        };
        /*
        I didn't see that the form's action is again the lab11.php
        i thought there will be some kind of ajax
        will actually not, so please ignore this part of code
         */
        function filter() {
            let continentOptions = document.getElementById("continent");

            let continentIndex = continentOptions.selectedIndex;
            let filterContinentCode = continentOptions.options[continentIndex].value;

            let countryOptions = document.getElementById("country");
            let countryIndex = countryOptions.selectedIndex;
            let filterCountryCode = countryOptions.options[countryIndex].value;


            let title = document.getElementById("title").value;

            // let filter_ajax = new XMLHttpRequest();
            // filter_ajax.onreadystatechange = function () {
            //     if(filter_ajax.readyState === 4 && (filter_ajax.status>=200 && filter_ajax.status<300) || filter_ajax.status===304){
            //         alert("hello world");
            //         document.querySelector("main ul.caption-style-2").innerHTML = filter_ajax.responseText;
            //     }
            // };
            // filter_ajax.open("POST", "filter.php", true);
            // let post = "continentCode=" + filterContinentCode + "&countryCode="+ filterCountryCode + "&title=" + encodeURIComponent(title);
            // filter_ajax.send(post);
            CookieUtil.unset("continentCode");
            CookieUtil.unset("countryCode");
            CookieUtil.unset("title");
            if (filterContinentCode!=="0") CookieUtil.set("continentCode", filterContinentCode);
            if (filterCountryCode!=="0") CookieUtil.set("countryCode", filterCountryCode);
            CookieUtil.set("title", title);
        }
    </script>

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control" id="continent">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                //****** Hint ******
                //display the list of continents

                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }


                ?>
              </select>     
              
              <select name="country" class="form-control" id="country">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                //****** Hint ******
                /* display list of countries */

                while($row_c = $result_countries->fetch_assoc()){
                    echo '<option value=' . $row_c['ISO'] . '>' . $row_c['CountryName'] . '</option>';
                }
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title id="title">
              <button type="submit" class="btn btn-primary" onclick="filter()">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            */
            $continentCode = $countryCode = $title = "";
            $config = ["continentCode", "countryCode", "title"];
            for($ind = 0; $ind<3;$ind++){
                if (isset($_COOKIE[$config[$ind]])){
                    $vars = $config[$ind];
                    $$vars = $_COOKIE[$vars];
                }
            }
            while($row_image = $result_images->fetch_assoc()){
                $ok = true;
                if(($continentCode!= "" && $row_image['ContinentCode'] != $continentCode)) $ok=false;
                if(($countryCode != "" && $row_image['CountryCodeISO'] != $countryCode)) $ok=false;
                if(($title != "" && $row_image['Title'] != $title)) $ok=false;
                if($ok) display_image($row_image);

            }

            ?>
       </ul>       

      
    </main>
    <script>
        let continentOptions = document.getElementById("continent");
        let countryOptions = document.getElementById("country");
        continentOptions.onchange = function (e) {
            let continentIndex = continentOptions.selectedIndex;
            let filterContinentCode = continentOptions.options[continentIndex].value;

            let country_ajax = new XMLHttpRequest();
            country_ajax.onreadystatechange = function () {
                if(country_ajax.status >= 200 && country_ajax.status < 300 && country_ajax.readyState === 4)
                    countryOptions.innerHTML = country_ajax.responseText;
            };

            country_ajax.open("POST", "filter.php",true);
            country_ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            country_ajax.send("continent="+filterContinentCode);
        }
    </script>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>