

$(document).ready(function(){
    //dropdown activation
   $(".dropdown-toggle").dropdown();
 
 
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
    
    //Like/dislike
        $(".liked").on("click",function(e){
        e.preventDefault();
        console.log(e.currentTarget.dataset.idc);
        if($.support.pjax){
            $.ajax({
                type:"GET",
                url:'/like/'+e.currentTarget.dataset.idc,
                
                success: function(data, textStatus,jqXHR){
                console.log(data);
                $("#countLike"+e.currentTarget.dataset.idc).html(data);
              
                },
                error: function(jqHXR, textStatus, errorThrown){
    
                }
    
            })
               
            }
           
        });
        $(".disliked").on("click",function(e){
        e.preventDefault();
        console.log(e.currentTarget.dataset.idc);
        if($.support.pjax){
            $.ajax({
                type:"GET",
                url:'/dislike/'+e.currentTarget.dataset.idc,
                
                success: function(data, textStatus,jqXHR){
                console.log(data);
                $("#countDislike"+e.currentTarget.dataset.idc).html(data);
                
                },
                error: function(jqHXR, textStatus, errorThrown){
    
                }
    
            })
               
            }
           
        });
    
    
    
     $(".chosen-select").chosen({
         no_results_text: "Oops, Désolé nous n'avons pas !",
         max_selected_options: 3,
         width: "50%",
         enable_split_word_search: true,
         search_contains:true,
         single_backstroke_delete:false,
         disable_search:false,
         placeholder_text_multiple:"Genre musicale"
         
         
     }).bind("chosen:maxselected", function () { swal( "3 max" ,  "Trop c'est trop !" ,  "error" ) }); ; 
    
    

    $("#search").submit(function(e){
        e.preventDefault();
        if($.support.pjax){
            $.pjax({url:"/recherche/" + e.target.elements[0].value, container:'#pjax-container'})
        }
        else {
            window.location.href = "/recherche/" + e.target.elements[0].value;
        }
    });
//Debut de la gestion du player


    $(".chansonPlay").click(function(e){
        
        e.preventDefault();
        alert("ok");
        //console.log(e.currentTarget.dataset.played);
        const audio =$("#audio");
        //console.log(e);
           
        //Si La musique n'ai pas en pause et que ce n'est pas celle qui est joué actuellement
      //  if( e.currentTarget.dataset.file != audio.src){
      
        if(e.currentTarget.dataset.played=="notPlaying" && e.currentTarget.dataset.firstime=="true"  ){
            console.log('playing');
            let f =$(this).attr('data-file');
            audio[0].src = f;
            audio[0].play();
          
      }
      
      
      
            let all = $('.chansonPlay');
            
         
            
        //console.log(e.target.attributes["class"].value);    
        //console.log(e.target); 
        
           for(let i=0;i<all.length;i++){
               // console.log(all[i]);
                if(all[i].dataset.file == audio[0].src){
                    //musique deja dans le player
                    
                    all[i].children[0].setAttribute("class","fa fa-stop fa-2x");
                    all[i].children[0].setAttribute('data-played', 'playing');
                    all[i].children[0].setAttribute('data-firstime', 'false');
                    
                }else{
                    //musique pas dans le player
                    all[i].children[0].setAttribute("class","fa fa-play fa-2x");
                    all[i].children[0].setAttribute('data-played', 'notPlaying');
                    all[i].children[0].setAttribute('data-firstime', 'true');
                        
                }
            }
        
            
              
      //  }
        /*
        if(e.currentTarget.dataset.firstime=="false" &&  e.currentTarget.dataset.file == audio.src){
                e.currentTarget.setAttribute('data-played', 'true');
                
                let f = $(this).attr('data-file');
                audio[0].src = f;
                audio[0].play();
        }else{
            e.currentTarget.setAttribute('data-played', 'false');
            e.target.setAttribute("class","fa fa-play fa-2x");
            audio[0].pause();
        }
        */

    });
    
    
    $(".chansonPause").click(function(e){
        
        e.preventDefault();
        
        //console.log(e.currentTarget.dataset.played);
        const audio =$("#audio");
        //console.log(e);
           
        //Si La musique n'ai pas en pause et que ce n'est pas celle qui est joué actuellement
      //  if( e.currentTarget.dataset.file != audio.src){
      
        if( e.currentTarget.dataset.file == audio[0].src){
            if(audio[0].paused ){
                e.target.setAttribute("class","fa fa-pause fa-2x");
                audio[0].play();
            }else{
                e.target.setAttribute("class","fa fa-play fa-2x");
                audio[0].pause();
                
            }
        }
      
      
      
      /*
            let all = $('.chanson');
            
         
            
        console.log(e.target.attributes["class"].value);    
        console.log(e.target);    
        
        if(e.target.attributes["class"].value == "fa fa-play fa-2x"){
            //alert('OK');
            e.target.setAttribute("class","fa fa-play fa-2x");
            e.target.setAttribute('data-played', 'notPlaying');
            audio[0].pause();
        }
        
        
        
           for(let i=0;i<all.length;i++){
               // console.log(all[i]);
                if(all[i].dataset.file == audio[0].src){
                    //musique deja dans le player
                    
                    all[i].children[0].setAttribute("class","fa fa-pause fa-2x");
                    all[i].children[0].setAttribute('data-played', 'playing');
                    all[i].children[0].setAttribute('data-firstime', 'false');
                    
                }else{
                    //musique pas dans le player
                    all[i].children[0].setAttribute("class","fa fa-play fa-2x");
                    all[i].children[0].setAttribute('data-played', 'notPlaying');
                    all[i].children[0].setAttribute('data-firstime', 'true');
                        
                }
            }
        
            
              
      //  }
        /*
        if(e.currentTarget.dataset.firstime=="false" &&  e.currentTarget.dataset.file == audio.src){
                e.currentTarget.setAttribute('data-played', 'true');
                
                let f = $(this).attr('data-file');
                audio[0].src = f;
                audio[0].play();
        }else{
            e.currentTarget.setAttribute('data-played', 'false');
            e.target.setAttribute("class","fa fa-play fa-2x");
            audio[0].pause();
        }
        */

        

    });



///Fin du player
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

