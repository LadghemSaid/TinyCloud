$(document).ready(function(){
    $("#search").submit(function(e){
        e.preventDefault();
        window.location.href = "/recherche/"+e.target.elements[0].value;
    });
    
    
    
    $(".chanson").click(function(e){
        e.preventDefault();
        let audio =$("#audio");
        let f =$(this).attr('data-file');

        audio[0].src = f;
        audio[0].play();

    });
    
    
});