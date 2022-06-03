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
                //add id
                var id = $('input[name="id"]').val();
                var etat = $('select[name="etat"]').val();
                
                if(id === "")
                    id = null;
                //ajax
                $.ajax
                
                (
                    {
                        async: false, 
                        type: 'POST',
                        url: "/api/verifReferenceEquipements",
                        data:
                        {
                            'reference' : reference,
                            'id' : id,
                            'etat':etat
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
