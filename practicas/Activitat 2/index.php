<?php
//1.Definició d'una classe bàsic
class Cotxe {
    private $marca;
    private $model;

    public function __construct($marca, $model) {
        $this->marca = $marca;
        $this->model = $model;
    }

    public function descripcio() {
        return "Marca: " . $this->marca . ", Model: " . $this->model;
    }
}


$cotxe1 = new Cotxe("Toyota", "Corolla");
echo $cotxe1->descripcio();
?>

<?php
//2. Afegir valors als atributs
class Cotxe {
    private $marca;
    private $model;

    public function __construct($marca = "Ford", $model = "Fiesta") {
        $this->marca = $marca;
        $this->model = $model;
    }

    public function descripcio() {
        return "Marca: " . $this->marca . ", Model: " . $this->model;
    }
}


$cotxe1 = new Cotxe(); 
$cotxe2 = new Cotxe("Toyota", "Corolla"); 


echo $cotxe1->descripcio() . "<br>";
echo $cotxe2->descripcio();

?>

<?php
//3. Utilitzar un constructor
class Persona {
    private $nom;
    private $edat;

    public function __construct($nom, $edat) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function benvinguda() {
        return "Hola, em dic " . $this->nom . " i tinc " . $this->edat . " anys.";
    }
}


$persona1 = new Persona("Anna", 25);
echo $persona1->benvinguda();
?>

<?php
//4. Tipatge estricte
declare(strict_types=1);

class Persona {
    private string $nom;
    private int $edat;

    public function __construct(string $nom, int $edat) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function benvinguda(): string {
        return "Hola, em dic " . $this->nom . " i tinc " . $this->edat . " anys.";
    }
}


$persona1 = new Persona("Anna", 25);
echo $persona1->benvinguda();
?>

<?php
//5. Interacció d’objectes
declare(strict_types=1);

class Persona {
    private string $nom;
    private int $edat;

    public function __construct(string $nom, int $edat) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function benvinguda(): string {
        return "Hola, em dic " . $this->nom . " i tinc " . $this->edat . " anys.";
    }
}


$persona1 = new Persona("Anna", 25);
$persona2 = new Persona("Joan", 30);


echo $persona1->benvinguda() . "<br>";
echo $persona2->benvinguda();
?>

<?php
//6. Crear una classe amb mètodes que accepten paràmetres
declare(strict_types=1);

class Calculadora {
    public function sumar(float $a, float $b): float {
        return $a + $b;
    }
}


$calc = new Calculadora();
$resultat = $calc->sumar(10.5, 5.3);
echo "La suma és: " . $resultat;
?>

<?php
//7. Utilitzar HTML per interactuar amb la classe
declare(strict_types=1);

class Persona {
    private string $nom;
    private int $edat;

    public function __construct(string $nom, int $edat) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    public function benvinguda(): string {
        return "Hola, em dic " . $this->nom . " i tinc " . $this->edat . " anys.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'] ?? '';
    $edat = $_POST['edat'] ?? 0;

 
    $persona = new Persona($nom, (int)$edat);
    $missatge = $persona->benvinguda();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari Persona</title>
</head>
<body>
    <h1>Introduïu el vostre nom i edat</h1>
    

    <form method="post" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="edat">Edat:</label>
        <input type="number" id="edat" name="edat" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($missatge)) {
        echo "<p>$missatge</p>";
    }
    ?>
</body>
</html>

<?php
//8. Atributs personalitzats
declare(strict_types=1);

class Animal {
    private string $nom;
    private string $tipus;


    public function __construct(string $nom, string $tipus) {
        $this->nom = $nom;
        $this->tipus = $tipus;
    }


    public function descripcio(): string {
        return "Aquest és el " . $this->nom . ", un " . $this->tipus . ".";
    }
}


$animal1 = new Animal("Tigre", "Felí");
$animal2 = new Animal("Llop", "Caní");


echo $animal1->descripcio() . "<br>";
echo $animal2->descripcio();
?>

<?php
//9. Utilitzar mètodes amb retorns personalitzats
declare(strict_types=1);

class Animal {
    private string $nom;
    private string $tipus;


    public function __construct(string $nom, string $tipus) {
        $this->nom = $nom;
        $this->tipus = $tipus;
    }


    public function saludar(): string {
        return "Hola, sóc un " . $this->tipus . " i em dic " . $this->nom . ".";
    }
}


$animal1 = new Animal("Tigre", "Felí");
$animal2 = new Animal("Llop", "Caní");

echo $animal1->saludar() . "<br>";
echo $animal2->saludar();
?>

<?php
//10.Un exemple avançat amb interacció
declare(strict_types=1);

class Producte {
    private string $nom;
    private float $preu;


    public function __construct(string $nom, float $preu) {
        $this->nom = $nom;
        $this->preu = $preu;
    }


    public function obtenirNom(): string {
        return $this->nom;
    }


    public function obtenirPreu(): float {
        return $this->preu;
    }
}


$productes = [
    new Producte("Cafetera", 99.99),
    new Producte("Portàtil", 799.99),
    new Producte("Telèfon mòbil", 599.99),
    new Producte("Auriculars", 89.99)
];

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llista de Productes</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Llista de Productes</h1>


    <table>
        <tr>
            <th>Nom del Producte</th>
            <th>Preu (€)</th>
        </tr>
        <?php

        foreach ($productes as $producte) {
            echo "<tr>";
            echo "<td>" . $producte->obtenirNom() . "</td>";
            echo "<td>" . number_format($producte->obtenirPreu(), 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
