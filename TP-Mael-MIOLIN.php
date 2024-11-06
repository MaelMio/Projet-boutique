<?php



$articles = [" Chaussettes", " T-shirts", " Chaussures", " Casquettes", " Robes"];
$quantites = [10, 5, 8, 3, 12];
$ventes = [0, 0, 0, 0, 0];

$choix = 0;

while ($choix != 7) {

    echo "Menu  :";
    echo PHP_EOL;
    echo "1.  Afficher les articles disponibles et leurs quantités";
    echo PHP_EOL;
    echo "2.  Réaliser une vente";
    echo PHP_EOL;
    echo "3. Réapprovisionner un article";
    echo PHP_EOL;
    echo "4.  Afficher l'état actuel du stock";
    echo PHP_EOL;
    echo "5.  Suivre les ventes totales par article";
    echo PHP_EOL;
    echo "6.  Supprimer un article";
    echo PHP_EOL;
    echo "7.  Quitter";
    echo PHP_EOL;

    $choix = intval(readline("Choisissez une option : "));

    while($choix < 1 || $choix > 8){
        echo "Erreur option inconnu veuillez saisir une option comprise entre 1 et 8 ! ";
        echo PHP_EOL;
        $choix = intval(readline("Choisissez une option : "));
    }

    if ($choix == 1) {
        echo "Articles disponibles avec leurs quantités :";
        echo PHP_EOL;
        for ($i = 0; $i < count($articles); $i++) {
            if ($quantites[$i] > 0) {
                echo "$i: $articles[$i] - Quantité : $quantites[$i]";
                echo PHP_EOL;
            }
        }
    }

    if ($choix == 2) {

       

        echo "Articles disponibles avec leurs quantités :";
        echo PHP_EOL;
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]";
            echo PHP_EOL;
        }

        $index = intval(readline("Choisissez l'index de l'article à vendre : "));
        $quantiteVendue = intval(readline("Quantité vendue : "));

        if ($index >= 0 && $index < count($articles)) {
            if ($quantites[$index] >= $quantiteVendue) {
                $quantites[$index] -= $quantiteVendue; 
                $ventes[$index] += $quantiteVendue; 
                echo "Vente confirmée ✅ : $quantiteVendue $articles[$index]";
                echo PHP_EOL;
            } else {
                echo "Stock insuffisant ❌ pour $articles[$index].";
                echo PHP_EOL;
            }
        } else {
            echo "Index invalide.";
            echo PHP_EOL;
        }
    }

    if ($choix == 3) {
        echo "Quel article souhaitez-vous réapprovisionner ? : ";
        echo PHP_EOL;

       
        
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]";
            echo PHP_EOL;
        }

       
        $index = intval(readline("Choisissez l'index de l'article que vous souhaitez réapprovisionner : "));
        
        $quantiteReapro = intval(readline("Quantité à réapprovisionner : "));
        $quantites[$index] += $quantiteReapro;
        echo "Réapprovisionnement confirmé ✅ : $quantiteReapro $articles[$index]";
        echo PHP_EOL;
    }

    if ($choix == 4) {
        echo " État actuel du stock :\n";

        for ($i = 0; $i < count($articles); $i++) {
       
        echo "$articles[$i] - Quantité restante : $quantites[$i] ";
        echo PHP_EOL;
        
          
            if ($quantites[$i] == 0) {
                echo "🚫 $articles[$i] est en rupture de stock !";
                echo PHP_EOL;
                $tousEnStock = false; 
            }
        }
    }
    
    if ($choix == 5) {
    echo " Suivi des ventes totales par article :";
    echo PHP_EOL;

        for ($i = 0; $i < count($articles); $i++) {
          
            echo "$articles[$i] - Quantité vendue : $ventes[$i] 🛒";
            echo PHP_EOL;
        }    
    }

    if ($choix == 6) {
        echo "Quel article souhaitez-vous supprimer ? : ";
        echo PHP_EOL;
        
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]";
            echo PHP_EOL;
        }

       
        $index = intval(readline("Choisissez l'index de l'article à supprimer : "));
        echo "Article supprimé avec succès ✅ : $articles[$index]";
        echo PHP_EOL;

        if ($index >= 0 && $index < count($articles)) {
          
            array_splice($articles, $index, 1);
            array_splice($quantites, $index, 1);
            array_splice($ventes, $index, 1);
        } else {
            echo "Index invalide. Aucune suppression effectuée ! ";
            echo PHP_EOL;
        }
    }

}


echo "Merci et à bientôt !";

