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
                
                //ajax
                $.ajax
				(
					{
						async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
						url: "/api/verifReferenceReparationExterne",
						data:
						{
							'id_equipement' : id_equipement
						},
						success: 
						function(result)
						{
							res = (result);
                            console.log(res);
						}
					}
				);
                if(res.code == 0)
                {
                    toastr.error(res.message, 'Error');
                    $('select[name="id_equipement"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);