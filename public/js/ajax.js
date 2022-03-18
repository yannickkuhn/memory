$(function () {

    // FONCTION 1 - Envoyer un temps en AJAX
    
    $.fn.savetime = function(passtime) {
        $.ajax({
            //L'URL de la requête 
            url: "../app/ajax/savetime.php",
            cache: false,
            //La méthode d'envoi (type de requête)
            method: "POST",
            //Le format de réponse attendu
            dataType : "json",
            //Les données
            data : { time: passtime },
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
    }


    // FONCTION 2 - Récupérer les meilleurs temps en AJAX

    $.fn.getbesttimes = function() {
        $.ajax({
            //L'URL de la requête 
            url: "../app/ajax/getbesttimes.php",
            cache: false,
            //La méthode d'envoi (type de requête)
            method: "GET",
            //Le format de réponse attendu
            dataType : "json",
        })
        // Code en cas de succès
        .then(function(response){
            var data = JSON.stringify(response);

            var alertData = "";

            alertData = "Meilleurs temps effectués :\n";
            $.each(response, function(i, time) {
                alertData += `[${i+1}] Le ${time.date}, temps : ${time.time}\n`;
            });

            alert(alertData)
        })
        // Code en cas d'echec
        .catch(function(error){
            console.log("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        })
    };
});