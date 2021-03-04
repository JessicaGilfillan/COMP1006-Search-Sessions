<?php 
    require('header.php');
    echo "<div class='container'>";
    // grab the search term and display results
    //grab info from the form and store in variables 
    $submit = filter_input(INPUT_GET, 'submit'); 
    $name = filter_input(INPUT_GET, 'name'); 
    $search_term = filter_input(INPUT_GET, 'search'); 

    //connect to the db 
    require('connect.php'); 

    //set up our SQL query 
    $query = "SELECT title FROM riskyjobs WHERE title LIKE :search_term;";

    //prepare 
    $statement = $db->prepare($query); 

    //bind
    $statement->bindValue(':search_term', '%'.$search_term.'%');

    //execute 
    $statement->execute(); 

    echo "<ul>"; 

    //check for results and display, if not, let the user know that no results found 
    if($statement->rowCount() >= 1) {
        while($results = $statement->fetch()) {
            echo "<li>" . $results['title'] . "</li>"; 
        }
    }
    else {
        echo "<p> Sorry, no results found! </p>"; 
    }
    //close the db connect 
    $statement->closeCursor(); 
   
    echo "</ul>"; 
    echo "</div>";
?>
