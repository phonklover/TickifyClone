<div class="container">
    <h1>Tickify</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <a href="<?php echo Config::get('URL'); ?>note/index">Crete New Ticket</a>


    </div>
</div>
