<!-- File: /app/View/Users/index.ctp -->
<h1>Blog Users<h1>
<?php
	echo $this->Html->link('Add User', array(
									'controller' => 'users', 
									'action' => 'add')
						);  
?>
<table>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th>Role</th>
		<th>Create</th>
		<th>Modified</th>
		<th> </th>
	</tr>
	<?php foreach($users as $user) : ?>
	
	<tr>
		<td><?= $user['User']['id']; ?></td>
		<td><?= $user['User']['username']; ?></td>
		<td><?= $user['User']['role']; ?></td>
		<td><?= $user['User']['created']; ?></td>
		<td><?= $user['User']['modified']; ?></td>
		<td><?php
				echo $this->Html->link('Edit', array(
									'controller' => 'users', 
									'action' => 'edit',
									$user['User']['id'])
						);  
			?>
			|
			<?php
				echo $this->Html->link('Delete', 
							array('controller' => 'users', 'action' => 'delete',$user['User']['id']),
							array('confirm' =>'esta usted seguro?')
						);  
			?>
		</td>
	</tr>
	
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>

