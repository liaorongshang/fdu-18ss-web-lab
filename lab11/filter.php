<?php
/**
 * Created by IntelliJ IDEA.
 * User: william
 * Date: 2019/6/7
 * Time: 12:17 PM
 */


if(isset($_POST['continent'])){
    $continent = $_POST['continent'];

    $servername = "localhost";
    $username = "root";
    $passwork = "";
    $dbname = "travel";
    
    $conn = new mysqli($servername, $username, $passwork, $dbname);
    
    $sql_countries = "SELECT * from Countries Where Continent = '$continent'";
    $country = $conn->query($sql_countries);

    echo "<option value=\"0\">Select Country</option>";
    while($result = $country->fetch_assoc()){
        echo '<option value='.$result['ISO'].'>'.$result['CountryName'].'</option>';
    }


}