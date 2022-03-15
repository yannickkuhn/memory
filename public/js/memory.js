// Algorithme de tri aléatoire selon Fisher Yates
function fisherYatesShuffle(arr){
    for(var i = arr.length-1; i>0 ;i--) {
        var j = Math.floor( Math.random() * (i + 1) ); // calcul aléatoire d'une case
        [arr[i],arr[j]]=[arr[j],arr[i]]; // échange des valeurs du tableau
    }
}

$(document).ready(function() {
    $(".fruit").hide();
    $(".empty_color").show();

    // le tableau réprésente les fruits sur le plateau de jeux
    var fruits = [1, 2, 3, 4, 5, 6, 7, 8, 
                  1, 2, 3, 4, 5, 6, 7, 8,
                  9, 10, 11, 12, 13, 14, 15, 16,
                  9, 10, 11, 12, 13, 14, 15, 16];
    var card1 = null;
    var card2 = null;
    var coups = 0;
    var gagne = false;

    // on trie de façon aléatoire tous les fruits avant de les affecter aux éléments de type card (html)
    fisherYatesShuffle(fruits);

    // Ajout d'un fruit du tableau sur chaque élément card
    $(".fruit").each(function(index) {
        $(this).attr("id", "fruit" + fruits[index]);
    })

    // Action lors d'un clic sur un élement card
    $(".card").click(function() {
        if(coups < 2) {
            $(this).find(".empty_color").hide();
            $(this).find(".fruit").show();
            if(coups == 0) {
                card1 = $(this);
            }
            if(coups == 1) {
                card2 = $(this);

                // Vérification du contenu des 2 cartes
                var fruit1 = card1.find(".fruit").attr("id");
                var fruit2 = card2.find(".fruit").attr("id");
                if(fruit1 == fruit2) {
                    console.log("gagné :: " + fruit1 + " / " + fruit2);
                    gagne = true;
                } else {
                    console.log("perdu");
                }
            }
            coups = coups + 1;
        }

        console.log("Valeur de coups : ".coups);
    })

    // Compteur
    var secondes = 0;
    var minutes = 0;
    var on = false;
   
    function chrono() {
        $("#nbcoups").html(coups+" coups joués !");
        if(coups == 2) {
            console.log("Retourne les cartes");
            coups = 0;
            if(gagne == false) {
                card1.find(".empty_color").show();
                card1.find(".fruit").hide();

                card2.find(".empty_color").show();
                card2.find(".fruit").hide();
            }
            // Réinitialisation des variables
            gagne = false;
            card1 = null;
            card2 = null;
        }
    }
   
    function start() {
      if(on===false) {
        timerID = setInterval(chrono, 2000);
        on = true;
      }
    }
    start();
});

$(document).ready(function() {
    $.ajax({
        //L'URL de la requête 
        url: "capture.php",
        cache: false,
        //La méthode d'envoi (type de requête)
        method: "GET",
        //Le format de réponse attendu
        dataType : "json",
    })
    // Code en cas de succès
    .then(function(response){
        var data = JSON.stringify(response);
        console.log(data);
    })
    // Code en cas d'echec
    .catch(function(error){
        console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
    })
});