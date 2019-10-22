<form method="post" action="index.php">
    <div class="d-flex card projectCreate justify-content-center">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Имя</label>
                <input type="text" class="form-control" placeholder="<?= $task['name']?>" disabled>
            </div>
            <div class="form-group">
                <label for="description">Описание задачи</label>
                <textarea class="form-control" name="descriptionAdmin"required><?= $task['description'] ?></textarea>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="completed" <?= $task['completed'] == 1 ? 'checked' : ''?> >
                    <label class="custom-control-label" for="customCheck1">
                        <?= $task['completed'] == 1 ? 'Отметить как не проверено' : 'Отметить как проверено'; ?>
                    </label>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $task['id']?>">
            <button type="submit" class="btn btn-outline-info mb-2 float-right">💥️
                Сохранить
            </button>
        </div>
    </div>
</form>