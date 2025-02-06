<div class="container">
    <h1>Tickify</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <a href="<?php echo Config::get('URL'); ?>note/index">Crete New Ticket</a>


        <h3>What happens here ?</h3>
        <h3>Display Tickets from user that are still in progress and show some stats or something likt that</h3>
        <h3>Display how many tickets did user create and how many have been resolved and how many are in progress</h3>



    </div>
</div>
