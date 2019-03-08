/*
prend en charge le lecteur son
structure html :
<audio class="lecteur-son" controls data-titre="Titre du morceau" data-auteur="auteur du morceau" data-illustration="image.jpg">
        <source src="song.mp3" type="audio/mp3">
</audio>
*/
$(document).ready(function(){
    $("audio.lecteur-son").each(function(i){
        var audio=$(this).get(0);
        // ajouter le titre
        var infos="";
        var drag=false;
        
        $(this).removeAttr("controls");
        $(this).wrap("<div class='wrapper-son' id='lecteur-"+i+"'></div>");
        var lecteur=$(this).parent();
        lecteur.append("<div class='boutons-fond'><div class='bouton play'><span class='icon-play'></span></div><div class='bouton pause'><span class='icon-pause'></span></div></div><div class='timeline'><div class='bar-played'></div></div><div class='son-info'><div class='played'>00:00</div><div class='duration'>00:00</div></div>");
        
        if(audio.hasAttribute("data-titre")){ infos=$(audio).attr("data-titre"); }
        if(audio.hasAttribute("data-auteur")){
            var auteur=$(audio).attr("data-auteur");  
            infos+="<span class='auteur'>"+auteur+"</span> ";
        }
        if(infos.length > 0){
            lecteur.find(".son-info").append("<div class='titre'>"+infos+"</div>");
        }
        // image éventuelle
        if(audio.hasAttribute("data-illustration")){ lecteur.find(".boutons-fond").css("background-image","url("+$(audio).attr("data-illustration")+")"); }
 
        // bouton play et pause
        lecteur.find(".play").click(function(){
            audio.play();
            $(this).hide();
            $(this).siblings(".pause").show();
        });
        lecteur.find(".pause").hide().click(function(){
            audio.pause();
            $(this).hide();
            $(this).siblings(".play").show();
        });
        // clicker sur la barre de temps et dragger
        lecteur.find(".timeline").click(function(e){
            var lt=$(this).innerWidth();
            var x = e.pageX - $(this).offset().left;
            var jp=audio.currentTime=audio.duration*(x/lt);
        }).mousedown(function() {
            drag=true;
        }).mouseup(function(){
            drag=false;
        }).mousemove(function(e){
            if(drag){
            var lt=$(this).innerWidth();
            var x = e.pageX - $(this).offset().left;
            var jp=audio.currentTime=audio.duration*(x/lt);
            }
        });
 
        // charger la durée qu démarrage
        audio.addEventListener('loadedmetadata',function(){
            lecteur.find('.duration').html(formate_temps(audio.duration));
        },false);
        // montrer les infos pendant la lecture
        audio.addEventListener("timeupdate", function() {
            // ligne du temps
            var pc=(audio.currentTime/audio.duration)*100;
            lecteur.find(".timeline .bar-played").css("width",pc+"%");
            lecteur.find('.played').html(formate_temps(audio.currentTime));
        }, false);
 
    });
 });
 
 // Transformer la durée (en secondes brutes, 221 par ex)
 // vers une structure minutes/secondes (3:41 par ex)
 function formate_temps(temps){
    s = parseInt(temps % 60);
    m = Math.floor( temps / 60 ) % 60;
    s = s < 10 ? "0"+s : s;
    m = m < 10 ? "0"+m : m;
    return m+":"+s;
 }