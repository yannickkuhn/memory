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
    let fruits = [1, 2, 3, 4, 5, 6, 7, 8, 
                  1, 2, 3, 4, 5, 6, 7, 8];
    let card1 = null;
    let card2 = null;
    let coups = 0;
    let gagne = false;

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
                let fruit1 = card1.find(".fruit").attr("id");
                let fruit2 = card2.find(".fruit").attr("id");
                if(fruit1 == fruit2) {
                    console.log("gagné :: " + fruit1 + " / " + fruit2)
                    gagne = true
                } else {
                    console.log("perdu")
                }
            }
            coups = coups + 1;
        } else {

            console.log("Retourne les cartes")

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
    })
});