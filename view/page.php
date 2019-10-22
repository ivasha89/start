<div class="container shadow-sm p-3 mb-2 bg-white rounded">
	<table class="table table-sm table-striped">
	    <caption>Задачи</caption>
    	<thead class="thead-light">
        <form method="get" action="index.php">
            <?php $sort == 'DESC' ? $sort = "ASC" : $sort = 'DESC' ?>
    		<tr>
    			<th>
                    <a href="index.php?order=name&&sort=<?= $sort; ?>">
    				    Имя
                    </a>
    			</th>
    			<th>
                    <a href="index.php?order=email&&sort=<?= $sort; ?>">
    				email
                    </a>
    			</th>
    			<th>
    				Описание
    			</th>
    			<th>
                    <a href="index.php?order=completed&&sort=<?= $sort; ?>">
    				Статус
                    </a>
    			</th>
    		</tr>
        </form>
    	</thead>
    	<tbody>
        <?php if(isset($tasks)) : ?>
            <?php foreach($tasks as $task) : ?>
                <tr>
                    <form class="form-inline" action="index.php" method="post">
                    <td>
                        <?= $task['name'] ?>
                    </td>
                    <td>
                        <?= $task['email'] ?>
                    </td>
                        <td>
                        <?= $task['description'] ?>
                        <?php if ($loggedin) : ?>
                                <button type="submit" class="btn mb-2 float-right">
                                    <a href="taskEdit.php?id=<?= $task['id'] ?>">
                                    Проверить
                                    </a>
                                </button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge <?= $task['completed'] == true ? 'badge-info' : 'badge-danger'; ?>">
                            <?= $task['completed'] == true ? 'Проверено' : 'Не проверено';?>
                        </span>
                        <?php if($task['created_at'] !== $task['updated_at']) : ?>
                        <span class="badge badge-success">
                            <?= $task['created_at'] !== $task['updated_at'] ? 'Отредактированно модератором' : '' ?>
                        </span>
                        <?php endif; ?>
                    </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
        <form class="form-inline" action="index.php" method="post">
            <label class="sr-only" for="inlineFormInputName2">Имя</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName" placeholder="Имя" name="name" required>

            <label class="sr-only" for="inlineFormInputGroupUsername2">email</label>
            <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputGroupEmail" placeholder="email" name="email" required>

            <label class="sr-only" for="inlineFormInputGroupUsername2">email</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputGroupEmail" placeholder="Описание" name="description" required>

            <button type="submit" class="btn btn-primary mb-2">Отправить</button>
        </form>
</div>
<nav aria-label="Page navigation example" class="ml-4">
    <ul class="pagination">
        <li class="page-item <?= $previous == 0 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?page=<?= $previous; ?>" > &laquo; Previous</a></li>
        <?php for($i = 1; $i <= $pages; $i++) :?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?= $i ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= $next > $pages ? 'disabled' : '' ?>"><a class="page-link" href="index.php?page=<?= $next; ?>">Next
                &raquo;</a></li>
    </ul>
</nav>