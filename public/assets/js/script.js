$(function(){

    var value;
    var aperolist;
    var data_filter;
    var rep = 0;


    $('#reset-input').on('click', function(){
        $('#input-search').val('')
    });

    $('#input-search').on('keyup', function(){

        value = $(this).val().toLowerCase().trim();

        aperolist = $('#apero-list li');

        $.each(aperolist, function(e, f){

            data_filter = $(f).attr('data-filtertext');
            data_filter = data_filter.split(' ');
            //console.log(data_filter[0],data_filter.length);

            for (var j = 0; j < data_filter.length; j++){
                //console.log(value, (data_filter[j].toLowerCase()));
                if ((data_filter[j].toLowerCase()).indexOf(value) != -1){
                    rep++;
                }else{
                    rep--;
                }

            }


            if (Math.abs(rep) < data_filter.length){
                $(f).css('display', 'block');
            }else{
                $(f).css('display', 'none');
            }

            rep=0;

        });

        if ($(this).val() == ''){

            aperolist.css('display', 'block');
        }

    })

});