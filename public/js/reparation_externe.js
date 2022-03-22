$(document).ready
(
	function()
	{
		$("#btClick").click
        (
			function(e)
			{
                //id_equipement
                var id_equipement = $('select[name="id_equipement"]').val();
                //var id_equipement = $('input[name="id_equipement"]').val();
                toastr.error("le valeur est "+id_equipement, 'Error');
                e.preventDefault();
            }
        );
    }
);