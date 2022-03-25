$(document).ready
(
	function()
	{
		$("#btClick").click
        (
			function(e)
			{
                //reference
                var reference = $('input[name="reference"]').val();
                
                //ajax
                $.ajax
				(
					{
						async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
						url: "/api/verifReferenceDevis",
						data:
						{
							'reference' : reference
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
                    $('input[name="reference"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);