

$(document).ready(function(){
    $(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');
    $(document).pjax('[data-pjax-toggle] a, a[data-pjax-toggle]', '#pjax-container',{push : false});
    $(document).on('submit', 'form[data-pjax]', function(event) {
        $.pjax.submit(event, '#pjax-container')
    })

    $("#Ajaxquery").on('input',function(e){
    console.log(e.target.value);
    if($.support.pjax){
        $.ajax({
            type:"GET",
            url:'/autocomplete/'+ e.target.value,
            
            success: function(data, textStatus,jqXHR){
                $("#AjaxqueryList").html(data);
            },
            error: function(jqHXR, textStatus, errorThrown){

            }

        })
           
        }
       
    });
    
    //Next function pour afficher l'image de l'artiste
    $("#Ajaxquery").on('input', function () {
    var val = this.value;
    if($('#AjaxqueryList option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //send ajax request
        //alert(this.value);
          if($.support.pjax){
        $.ajax({
            type:"GET",
            url:'/getartist/'+ this.value,
            
            success: function(data, textStatus,jqXHR){
                console.log(data);
               
                $("#artistimg").attr("src",data[1]);
            },
            error: function(jqHXR, textStatus, errorThrown){

            }

        })
           
        }
    }
    });
    
    
    
    

    $("#search").submit(function(e){
        e.preventDefault();
        if($.support.pjax){
            $.pjax({url:"/recherche/" + e.target.elements[0].value, container:'#pjax-container'})
        }
        else {
            window.location.href = "/recherche/" + e.target.elements[0].value;
        }
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

