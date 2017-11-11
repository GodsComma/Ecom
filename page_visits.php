	<meta http-equiv="refresh" content="10">
<?php
	$page = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$current_page = $page;
	$_SESSION['vegCount'] = 0;
	$_SESSION['nutCount'] = 0;
	$_SESSION['fruitCount'] = 0;
	$_SESSION['meatCount'] = 0;
	$_SESSION['dairyCount'] = 0;
	$_SESSION['wineCount'] = 0;

		if (!(in_array($page, $_SESSION['pages_visited']))){
			array_push($_SESSION['pages_visited'], $page);
		}
		else{
			//Do nothing
		}
		echo "<h4> Your recent viewing history: </h4>";
	foreach($_SESSION['pages_visited'] as $pages_visited){
        //want: to display previously visited product page
        if ($pages_visited == 'http://localhost/vegetables.php' && $pages_visited !== $current_page){
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Vegetables</a>"; 
            echo "  ";          
        }
        if ($pages_visited == 'http://localhost/nuts.php' && $pages_visited !== $current_page){          
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Nuts</a>";
            echo "  ";
        }
        if ($pages_visited == 'http://localhost/fruits.php' && $pages_visited !== $current_page){           
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Fruits</a>";
            echo "  ";
        }
        if ($pages_visited == 'http://localhost/meats.php' && $pages_visited !== $current_page){
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Meats</a>";
            echo "  ";           
        }
        if ($pages_visited == 'http://localhost/dairy.php' && $pages_visited !== $current_page){            
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Dairy</a>";
            echo "  ";
        }
        if ($pages_visited == 'http://localhost/wines.php' && $pages_visited !== $current_page){           
            echo "<a href=$pages_visited class='btn btn-link' role='button'>Wines</a>";
            echo "  ";
        }
	}