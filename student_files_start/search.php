
    <?php require('header.php'); ?>
    <div class="container">
        <div class="bg-light">
            <div class="row">
            <div class="col heading">
            <h1> Current Opportunities</h1>
            </div>
            <div class="col">
            <!-- STEP ONE - display all risky job titles in a dynamic list   -->
            <?php
            //connect 
            require('connect.php'); 
            //set up our query 
            $sql = "SELECT title FROM riskyjobs;";
            //prepare 
            $statement = $db->prepare($sql); 
            //execute the query 
            $statement->execute(); 
            //fetchAll 
            $search_results = $statement->fetchAll(); 
            echo "<ul>"; 
            //loop through results 
            foreach($search_results as $result) {
                echo "<li>" .$result['title']. "</li>"; 
            }
            echo "</ul>"; 
            echo "</div>"; 
            echo "</div>";
            echo "</div>";
            ?>

        <h2> Search For Your New Career Here: </h2> 
        <form action="search_results.php" method="get">
            <div class="row">
                <div class="col">
                    <input type ="text" name="name" placeholder="My name is" class="form-control">
                </div>
                <div class="col">
                    <input type="text" name="search" placeholder="I'm searching for..." class="form-control">
                </div>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>










