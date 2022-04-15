$(document).ready
(
    function()
    {
        $("#btClick").click
        (
            function(e)
            {
                //id_reparation_externe
                var id_reparation_externe = $('select[name="id_reparation_externe"]').val();
                //reference_BC
                var reference_BC = $('select[name="reference_BC"]').val();
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
                        url: "/api/VerifDetailBondecommande",
                        data:
                        {
                            'reference_BC' : reference_BC,
                            'id_reparation_externe' : id_reparation_externe,
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
                    $('select[name="reference_BC"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);