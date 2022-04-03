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
                if(id === "")
                    id = null;
                //ajax
                $.ajax
                (
                    {
                        async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
                        url: "/api/verifReferenceEquipements",
                        data:
                        {
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
                    $('input[name="reference"]').focus();
                    e.preventDefault();
                }
            }
        );
    }
);
