$(document).ready
(
    function()
    {
        $("#btClick").click
        (
            function(e)
            {
                //reference
                var reference = $('select[name="reference"]').val();
                //reference_facture
                var reference_facture = $('select[name="reference_facture"]').val();
                //add id
                var id = $('input[name="id"]').val();
                if(id === "")
                    id = null;
                //ajax
                $.ajax
                (
                    {
                        async: false, 
                        type: 'POST',
                        url: "/api/VerifDetailFacture",
                        data:
                        {
                            'reference_facture' : reference_facture,
                            'reference' : reference,
                            'id' : id
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
                    $('select[name="reference_facture"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);