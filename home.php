
<div class="container maincontainer">

    <div class="row">
        <div class="col-8">
            <h2>Recent tweets</h2>
            <?php displaytweets('public');?>
        </div>
        <div class="col-4">
            <?php displaysearch(); ?>
            <hr>
            <?php displaytweetbox();?>
        </div>

    </div>


</div>