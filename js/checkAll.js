$(document).ready(function(){
    var donnees = getEnigme();
    var attempt = 0;
    var code = '';
    var max = 3;
    var id = 0;


    $('.rep').click(function(){
        var r = no_accent($(this).parent().find('.reponse').val());
        r = r.toLowerCase();
        if (r === code) {
            var time = 300;
            $.post('../admin/assets/form/enigmePlus.php',{time:time,attempt:attempt}).done(function(data){
                var v = parseInt(id)+1;
                window.location.replace(v+'.html');
            });
        } else {
            attempt += 1;
            $.post('../admin/assets/form/addAttempt.php',{a:attempt});
            if (attempt >= max) {
                $.post('../admin/assets/form/banUser.php').done(function(){
                    window.location.replace('../profil.php');
                });
            }
        }
    });

    function getEnigme() {
        $.post('../admin/assets/form/getEnigmeForPlayer.php').done(function(data){
            data = JSON.parse(data);
            //console.log(data);
            id = data['enigme_id'];
            code = no_accent(data['enigme_code'].toLowerCase());
            max = data['enigme_attempt_to_fail'];
            checkLn(id);
            return data;
        });
    }

    function no_accent(my_string) {
        return my_string.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    }

    function checkLn(p) {
        $.post('../admin/assets/form/checkIfUserLogin.php',{page:p}).done(function(data){
            if (data === 'away') {
                window.location.replace('https://guimoves.oliviso.fr');
            }
        });

    }
});