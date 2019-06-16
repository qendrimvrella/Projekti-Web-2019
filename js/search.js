$(document).ready(function() {

        $('#search-input').keyup(function() {

            var inputSearch =  $('#search-input').val();
            
            $.post("./includes/search.php" , {
                input: inputSearch
            }, function(date){
                $('#search-result').html(date);
            });
        });
    });
