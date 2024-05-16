<?php 

//ETAPE 3 :
function add(int $nb1, int $nb2) : int
{

    return $nb1 + $nb2;
    
}

function substract(int $nb1, int $nb2) : int
{

    return $nb1 - $nb2;

}


function multiply(int $nb1, int $nb2) : int
{

    return $nb1 * $nb2;

}

function divide(int $nb1, int $nb2) : ?int
{
    if($nb2 === 0)
    {
        return null;
    }

    return $nb1 / $nb2;
}

function modulo(int $nb1, int $nb2) : ?int
{
    if($nb2 === 0) {
        
        return null;
    }
    
    return $nb1 % $nb2;
    
}

echo add(60, 4) . "<br>";
echo substract(60, 4) . "<br>";
echo multiply(60, 4) . "<br>";
echo divide(60, 4) . "<br>";
echo modulo(85, 2) . "<br>";
//ETAPE 2 /
//debug
echo "<pre>";
var_dump($_POST);
echo "</pre>";

// je veux récupérer mes champs de formulaire donc je crée des variables pour les stocker
    // ces variables n'ont pas encore de vraie valeur donc je leur donne null comme valeur par défaut
$nombre1 = null;
$nombre2 = null;
$operation = null; // :-)
$result = null;

//Récupérer les champs du formulaire
// attention tu essaies de les echo alors que tu ne sais pas encore si ils existent 
/* $_POST["nombre1"];
 $_POST["nombre2"];
 $_POST["operation"];*/

//Vérifie si le champs le nombre1 et 2 et operation existent
if(isset($_POST["nombre1"]) && isset($_POST["nombre2"]) && isset($_POST["operation"]) ) // cette condition est bonne
{
    echo "Les champs existent.<br>";

// s'ils existent, je vérifie qu'ils ne sont pas vides
if(!empty($_POST["nombre1"]) && !empty($_POST["nombre2"]) && !empty($_POST["operation"])) // celle ci aussi
    {
        echo "Les champs ne sont pas vides<br>";
        
        // ici tu es sûre que tes variables existent et ne sont pas vides, tu devrais les echo ici :)
        // s'ils ne sont pas vides, je remplis mes variables avec les valeurs de $_POST
        $nombre1 = (int) $_POST["nombre1"];
        $nombre2 = (int) $_POST["nombre2"];
        $operation = $_POST["operation"];
    
    //tester l'ffichage debug
    // Je fais des var_dump de mes trois variables pour vérifier que tout fonctionne
    echo "<pre>";
        var_dump($nombre1);
        var_dump($nombre2);
        var_dump($operation);
        echo "</pre>";
        //Etape 4 :
         if($operation === "add")
        {
            $result = add($nombre1, $nombre2);
        }
        else if ($operation === "sub")
        {
            $result = substract($nombre1, $nombre2);
        }
        else if($operation === "mul")
        {
            $result = multiply($nombre1, $nombre2);
        }
        else if ($operation === "div")
        {
            $result = divide($nombre1, $nombre2);
        }
        else if ($operation === "mod")
        {
            $result = modulo($nombre1, $nombre2);
        }
    }
}
 




?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Formulaires-calculatrice</title>
	</head>
	<body>
		<h1>Résultat : <?= $result ?></h1>
		<form action="index.php" method="post">
		    <fieldset>
		    <label for="nombre1">Nombre 1 : </label>
            <input type="number" step="1" id="nombre1" name="nombre1" >
            </fieldset>
            
            <fieldset>
            <label for="operation">Opération : </label>
            <select id="operation" name="operation">
                <option value="mul">Multiplication</option>
                <option value="div">Division</option>
                <option value="add">Addition</option>
                <option value="sub">Soustraction</option>
                <option value="mod">Modulo</option>
            </select><br>
            </fieldset>
            
            <fieldset>
            <label for="nombre2">Nombre 2 : </label>
            <input type="number" step="1" id="nombre2" name="nombre2" >
            </fieldset>
            
            <button type="submit">Envoyer</button>
		</form>
		    
		</ul>
	</body>
</html>