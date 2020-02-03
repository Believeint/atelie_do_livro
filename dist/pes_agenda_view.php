<?php

require_once 'header.php';

if(Session::exists('deleted_success')) {
    echo "<div id='alert' class='alert-success text-center'>" . "<strong>" .  Session::flash('deleted_success') . "</strong>" . "</div>";
}


?>



    <div class="container">
        <h2 class="text-center" >Manter Agenda</h2>
        <hr/>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon alert-warning">Pesquisa Rápida</span>
                <input type="text" name="search_text" id="search_text" placeholder="Buscar..." class="form-control">
            </div>
        </div>
        <br/>



        <div id="result" onload="loading();">
            <div id="loader"">
            <img src="images/loading.gif">
        </div>

    </div>

    </div>


    <script type="text/javascript">

        setTimeout(function () {
            $('#alert').fadeOut();
        }, 2000);

        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"pes_agenda_viewmodel.php",
                    method:"post",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });

        function loading() {
            $('#result').css('display', 'none');
        }

    </script>




<?php











