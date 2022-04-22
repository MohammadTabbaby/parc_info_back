$(document).ready
(
    function()
    {
        $("#btClick").click
        (
            function(e)
            {
                //id_reparation_externe
                var equipement = $('select[name="equipement"]').val();
                //ref_bl
                var ref_bl = $('select[name="ref_bl"]').val();
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
                        url: "/api/VerifDetailBondeLivraison",
                        data:
                        {
                            'ref_bl' : ref_bl,
                            'equipement' : equipement,
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
                    $('select[name="ref_bl"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);