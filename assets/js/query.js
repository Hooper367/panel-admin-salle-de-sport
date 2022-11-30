// CONNEXION

$(function(){
    // Action qui est exécutée quand le formulaire est envoyé ( #connexion est l'ID du formulaire)
    $('#connexion').on('submit', function (e) {
        e.preventDefault(); // On empêche de soumettre le formulaire
        var $this = $(this); // L'objet jQuery du formulaire
        // Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // On récupère l'action (ici action.php)
            type: $this.attr('method'), // On récupère la méthode (post)
            data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
            dataType: 'json', // JSON
            success: function (json) { // Si ça c'est passé avec succès
                // ici on teste la réponse
                if (json.reponse === 'ok user') {
                    alert('Connexion OK');
                    // On peut aussi rediriger vers l'index
                    window.location.href = 'index.php';
                } else if (json.reponse === 'ok admin'){
                    alert('Connexion OK');
                    // On peut aussi rediriger vers panel
                    window.location.href = 'panel.php';
                }else {
                    alert('Erreur : ' + json.reponse);
                }
            }
        });
    }); 
    $('#disconnect').on('click', function(e){
        e.preventDefault();
        let $this = $(this);
        $.ajax({
            url: $this.attr('href'),
            type:'post', 
            data: {action : 'disconnect'},
            dataType: 'json',
                success: function (json) { 
                    if (json.reponse === 'deconnexion effectué') {
                        if(window.location.href.includes('panel.php')){
                            alert('deco OK');
                           window.location.href = 'index.php';
                       }
                    } 
                }
        });

    });
    // MODIF
    
    // Action qui est exécutée quand le formulaire est envoyé ( #modif est l'ID du formulaire)
    $('#modif').on('submit', function (e) {
        e.preventDefault(); // On empêche de soumettre le formulaire
        var $this = $(this); // L'objet jQuery du formulaire
        // Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // On récupère l'action (ici check.php)
            type: $this.attr('method'), // On récupère la méthode (post)
            data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
            dataType: 'json', // JSON
            success: function (json) {
                if (json.reponse === "modification bien effectuée") {
                    alert('Modif OK');
                    window.location.href = 'message.php';
                }else {
                    alert('Erreur : ' + json.reponse);
                }
            }
        });
    });

    // CREATE
  
    // Action qui est exécutée quand le formulaire est envoyé ( #create est l'ID du formulaire)
    $('#create').on('submit', function (e) {
        e.preventDefault(); // On empêche de soumettre le formulaire
        var $this = $(this); // L'objet jQuery du formulaire
        // Envoi de la requête HTTP en mode asynchrone
        $.ajax({
            url: $this.attr('action'), // On récupère l'action 
            type: $this.attr('method'), // On récupère la méthode (post)
            data: {action : create, title : title, content : content , image : image , slug : slug, id_users : id_users}, 
            dataType: 'json', // JSON
            success: function (json) { 
                
                if (json.reponse === 'article crée') {
                    alert('article crée');
                    
                    window.location.href = 'message.php';
                }else {
                    alert('Erreur : ' + json.reponse);
                }
            }
        });
    });
});




   




//   // MODIF


  

