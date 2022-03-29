
$(document).ready
(
	function()
	{
		$("#btClick").click
        (
			function(e)
			{
				//alert("hello");
			
                //reference
                var reference = $('input[name="reference"]').val();
                //alert(reference);
				//e.preventDefault();
                //ajax
                $.ajax
				(
					{
						async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
						url: "/api/verifReferencePieceDeRechange",
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