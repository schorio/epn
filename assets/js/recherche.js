$(document).ready(function(){
    $('#search_1, #search').keyup(function(){
        search_table($(this).val());
    });

    function search_table(value){
        $('.col-12, #myTable tbody tr').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                {
                    found = 'true';
                }
            });
            if(found == 'true'){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    }

});