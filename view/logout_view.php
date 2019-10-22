<div class="row justify-content-center p-2">
	<div style="width:300px">
		<div class="card text-center border-secondary">
			<div class="card-header bg-success">
				Вы вышли
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Всего доброго
<?php if (isset($user)) echo $user;?>

				</h5>
				<a class="btn btn-outline-info" href="index.php">
					К задачнику
				</a>
			</div>
			<div class="card-footer text-muted">
				Спасибо за посещение
			</div>
		</div>
	</div>
</div>
