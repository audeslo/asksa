var apprenant_filiere=document.getElementById('apprenant_filiere');
var enseigner_filiere=document.getElementById('enseigner_filiere');


if (!(apprenant_filiere !== null)) {
} else {
    $(document).on('change','#apprenant_filiere',function(){
        let $field=$(this)
        let $form=$field.closest('form')
        let data={}
        data[$field.attr('name')]=$field.val()
        $.post($form.attr('action'),data).then(function(data) {
            let  $input = $(data).find('#apprenant_classe')
            //language=JQuery-CSS
            $('#apprenant_classe').replaceWith($input)

        })
    })
}

if (!(enseigner_filiere !== null)) {
} else {
    $(document).on('change','#enseigner_filiere',function(){
        let $field=$(this)
        let $form=$field.closest('form')
        let data={}
        data[$field.attr('name')]=$field.val()
        $.post($form.attr('action'),data).then(function(data) {
            let  $input = $(data).find('#enseigner_classe')
            //language=JQuery-CSS
            $('#enseigner_classe').replaceWith($input)

        })

        /* $.post($form.attr('action'),data).then(function(data) {
             let $input = $(data).find('#eds_stockbundle_sortie_contrat')
             $('#eds_stockbundle_sortie_contrat').replaceWith($input)

         })
         $.post($form.attr('action'),data).then(function(data) {
             let $input = $(data).find('#eds_stockbundle_sortie_poste')
             $('#eds_stockbundle_sortie_poste').replaceWith($input)

         })*/
    })
}

