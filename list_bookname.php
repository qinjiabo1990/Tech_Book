<!DOCTYPE html>
<html>
<head>
  <title>Book List</title>
  <?php
  include('templates/header.php');
  include('templates/nav.php');
  ?>
  <br>
  <div class="container">
    <div class="d-flex justify-content-center">
      <h2>Stored Book List</h2>
    </div>
    <br>
    <div class="d-flex justify-content-center">
      <p id="demo"></p>
      <script>
        var obj, dbParam, xmlhttp, myObj, x, txt = "";
        obj = { "table":"BOOK_INFO", "limit":20 };
        dbParam = JSON.stringify(obj);
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                txt += "<table border='1'>"
                for (x in myObj) {
                    txt += "<tr><td>" + myObj[x].Bookname + "</td></tr>";
                }
                txt += "</table>"
                document.getElementById("demo").innerHTML = txt;
            }
        };
        xmlhttp.open("POST", "get_bookname.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);
      </script>
    </div>
  </div>
<?php
include('templates/footer.php');
?>
