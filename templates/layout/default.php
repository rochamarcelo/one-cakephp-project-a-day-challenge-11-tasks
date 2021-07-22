<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['bootstrap.min.css']) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['bootstrap.bundle.min.js']) ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<div class="col-lg-12 mx-auto p-3 py-md-5">
    <main>
        <div class="row">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        One Project a Day - with CakePHP
    </footer>
</div>
</body>
</html>
