<div class="ml-auto">
<?php if ($loggedin):?> 
	<a href="logout.php">
		<button class="btn btn-outline-danger">
			Выход
		</button>
	</a>
<?php else:?>
	<a href="login.php">
		<button class="btn btn-outline-success">
			Вход Администратора
		</button>
	</a>
<?php endif;?>
</div>
