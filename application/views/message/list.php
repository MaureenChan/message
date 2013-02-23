<?php foreach($message as $message_item):?>
<div id="main">
<h4><?php echo $message_item['username']?></h4>
<?php echo $message_item['content'];?>
<span id="date"><?php echo $message_item['date'];?></span>
</div>
<?php endforeach ?>
