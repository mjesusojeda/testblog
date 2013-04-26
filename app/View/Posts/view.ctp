<!-- File: /app/View/Posts/index.ctp -->
<h1><?php echo $post['Post']['title'] ?><h1>
<?php
	echo $this->Html->link('< Back', array(
									'controller' => 'posts', 
									'action' => 'index')
						);  
?>
<p><?php echo $post['Post']['created'] ?></p>
<p><?php echo $post['Post']['body'] ?></p>
