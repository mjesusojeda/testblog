<!-- File: /app/View/Posts/index.ctp -->
<h1>Blog Posts<h1>
<?php
	echo $this->Html->link('Add Post', array(
									'controller' => 'posts', 
									'action' => 'add')
						);  
?>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Created</th>
		<th>Actions</th>
	</tr>
	<?php foreach($posts as $post) : ?>
	
	<tr>
		<td><?php echo $post['Post']['id']; ?></td>
		<td>
			<?php
				echo $this->Html->link($post['Post']['title'], array(
												'controller' => 'posts', 
												'action' => 'view',
												$post['Post']['id'])
									);  
			?>
		</td>
		<td><?php echo $post['Post']['created']; ?></td>
		<td>
			<?php
				echo $this->Html->link('Edit', array(
												'controller' => 'posts', 
												'action' => 'edit',
												$post['Post']['id'])
									);  
			?>
			|
			<?php
				echo $this->Form->postlink(
											'Del', 
											array('action' => 'delete',$post['Post']['id']),
											array('confirm' => 'esta usted seguro?')
										);  
			?>
		</td>
	</tr>
	
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>

