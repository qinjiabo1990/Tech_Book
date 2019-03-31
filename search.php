<!--search result page-->
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    .result {
        width: 85%;
        margin: auto;
        padding-top: 20px;
    }
    .title1 {
        width: 20%;
        margin: auto;
        text-align: center;
        border-bottom: 4px solid black;
        padding-top: 20px;
    }
    .noresult{
        text-align: center;
        padding:30px;
    }
    </style>
<?php
include('templates/header.php');
include('templates/nav.php');
    echo "<div class=\"title1\"><h2>Search Results</h2></div>";
    // Get user input
    $query = $_REQUEST['query'];
    // Ensure the seach is not empty
    $min_length = 1;

    // Chech if the query valid
    if(strlen($query) >= $min_length){

        $sql = "SELECT * FROM BOOK_INFO WHERE `Bookname` LIKE '%".$query."%'";
        $raw_results = mysqli_query($conn, $sql);

        // If one or more rows are returned do following
        if(mysqli_num_rows($raw_results) > 0){
            // Use while loop to print the result out.
            while($results = mysqli_fetch_assoc($raw_results)){
                echo "<div class=\"result\"><h3>".$results['Bookname']."</h3>"."<img src=".$results['Image']." width=\"150\""."alt=".$results['Bookname']."><p>Author: ".$results['Author']."</p>"."<p> Description<br/>".$results['Abstract']."</p>"."<p>Price: $".$results['Price']."</p>"."<form method=\"post\" action=\"product.php\"><input type=\"hidden\" name=\"input\" value=".$results['Book_ID']."/><input type=\"submit\" class=\"btn btn-primary\" value=\"Check Details\"/></form><hr></div>";
            }
        }
        else{ // if there is no matching rows do following
            echo "<h4 class=\"noresult\">No result.</h4>";
        }

    }
    else{ // if query length is less than minimum
        echo "Please type more than".$min_length."characters.";
    }
  include('templates/footer.php');
?>
