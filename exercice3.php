<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /**
     * pour récuperer les données du formulaire*
     */
    $title = $_POST["title"] ?? null;
    $actor = $_POST["actor"] ?? null;
    $director = $_POST["director"] ?? null;
    $producer = $_POST["producer"] ?? null;
    $year_of_prod = $_POST["year_of_prod"] ?? null;
    $language = $_POST["language"] ?? null;
    $category = $_POST["category"] ?? null;
    $storyline = $_POST["storyline"] ?? null;
    $trailer = $_POST["trailer"] ?? null;
    
    if ($title && $director && $actor && $producer && $storyline > 5) {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=user', 'root');
        } catch (PDOException $e) {
            echo 'These field must have at least 5 characters';
        }
    }
    $sql = "INSERT INTO track VALUES(title, actor, director, producer, year_of_prod, language, category, storyline, trailer) VALUES(:title, :actor, :director, :producer, :year_of_prod, :language, :category, :storyline, :trailer)";
    $statement = $connection->prepare($sql);
    $statement->bindValue('title', $title, PDO::PARAM_STR);
    $statement->bindValue('actor', $actor, PDO::PARAM_STR);
    $statement->bindValue('director', $director, PDO::PARAM_STR);
    $statement->bindValue('producer', $producer, PDO::PARAM_STR);
    $statement->bindValue('year_of_prod', $year_of_prod, PDO::PARAM_STR);
    $statement->bindValue('language', $language, PDO::PARAM_STR);
    $statement->bindValue('category', $category, PDO::PARAM_STR);
    $statement->bindValue('storyline', $storyline, PDO::PARAM_STR);
    $statement->bindValue('trailer', $trailer, PDO::PARAM_STR);
    $statement->execute();
    /**
     * if the result is not true, display error*
     */
    if (! $statement->execute()) {
        echo 'INSERT FAILED';
    }
}

?>

<!DOCTYPE html>
<html>
	<head>	
	<meta charset = utf8>	
	</head>
	<body>
		<h1>Your favorite movies</h1>
		<form method = "POST">
			<input type="text" name="title" placeholder="Movie's name"/>
			<input type="text" name="actor" placeholder="Actor's name"/>
			<input type="text" name="director" placeholder="Director's name"/>
			<input type="text" name="Producer" placeholder="Producer's name"/>
			<label for="year_of_production">Select the year of production:</label><br>/>
			<select name="year_of_prod">
				<option value=year>2012</option>
				<option value=year>2013</option>
				<option value=year>2014</option>
				<option value=year>2015</option>
				<option value=year>2016</option>
			</select>
			<label for="language">Select the language:</label><br>/>
				<select name="language">
				<option value="FR">French</option>
				<option value="EN">English</option>
				<option value="SP">Spanish</option>
			</select>
			<label for="category">Select the category:</label><br>/>
			<select name="category">
				<option value="Drama">Drama</option>
				<option value="Comedy">Comedy</option>
				<option value="Thriller">Thriller</option>
				<option value="Horror">Horror</option>
			</select>
			<input type="text" name="storyline" placeholder="Synopsis"/>
			<input type="url" name="trailer" placeholder="Trailer"/>
			<button type="submit">submit</button>
			
<?php
if (isset($_POST['formSubmit'])) {
    $year_of_prod = $_POST('Year_of_prod');
    if (! isset($year_of_prod)) {
        echo ("you didn't select any year of production");
    }
}
if (isset($_POST['formSubmit'])) {
    $language = $_POST('Language');
    if (! isset($language)) {
        echo ("you didn't select any language");
    }
}
if (isset($_POST['formSubmit'])) {
    $category = $_POST('Category');
    if (! isset($category)) {
        echo ("you didn't select any category");
    }
}

function urlExist($url)
{
    $header = @get_headers($url);
    if ($file_headers[0] == 'HTTP/1.1 404 Not Found')
        return false;
    
    return true;
}
?>
		</form>
	</body>
</html>