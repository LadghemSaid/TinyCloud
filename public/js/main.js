$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');


$(document).ready(function(){
    $("#search").submit(function(e){
        e.preventDefault();
        window.location.href = "/recherche/"+e.target.elements[0].value;
    });



    $(".chanson").click(function(e){
        //e.preventDefault();
        let audio =$("#audio");
        let f =$(this).attr('data-file');
       
        audio[0].src = f;
        audio[0].play();

    });

    $("#testajax").click(function(e){
        e.preventDefault();

        $.ajax({
            type:"GET",
            url:'/testajax',
            data :{
                login: 'Gilles',
                mdp:'aud123',
            },
            success: function(data, textStatus,jqXHR){
                $("#aremplir").html(data);
            },
            error: function(jqHXR, textStatus, errorThrown){

            }

        })
    })

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.like').on('click', function(event){
        event.preventDefault();
        var islike = event.target.previousElementSibling == null ;
        console.log(islike);
    })


});

