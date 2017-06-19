<script src="/public/js/prism.js"></script>
<link href="/public/css/prism.css" rel="stylesheet">
<style>
    pre{
        width: auto;
        height: 130px;
    }
</style>
<script type="application/javascript">
    $(function(){
        $( "#btnGet" ).click(function() {
            $.get($("#url").val(), function( data ) {
                $("#result").html(Prism.highlight(JSON.stringify(data), Prism.languages.json));
            });
        });
    });
</script>


<div class="row">
    <br>
    <div class="col-md-12">
        <div class="starter-template">
            <h1>API Teste</h1>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-inline">
            <input type="text" class="form-control" size="50" id="url" value="http://<?php echo APP_HOST; ?>/api/produto?token=12345">
            <a href="#" class="btn btn-success btn-sm" id="btnGet">GET API</a>
        </div>

        <br />
        <pre id="result"></pre>

    </div>


</div>