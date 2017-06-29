<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;




AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Ecolpets',
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]), 
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
             //['label' => 'Todo', 'url' => ['/todo/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            // ['label' => 'Registrar Mascota', 'url' => ['/recepcionclinica/create']],
            // ['label' => 'Mascotas Recibidas', 'url' => ['/recepcionclinica/index']],
            // ['label' => 'Procesar Mascotas', 'url' => ['/procesos/index']],

             ['label' => 'Mascotas ', 'items' => [
                ['label' => 'Nuevo', 'url' => ['/recepcionclinica/create']],
                ['label' => 'Listado', 'url' => ['/recepcionclinica/index']],
                ['label' => 'Procesar', 'url' => ['/procesos/index']]
             ]],

             ['label' => 'Propietarios', 'items'=> [
             ['label' => 'Nuevo', 'url' => ['/propietarios/create']],
             ['label' => 'Listado', 'url' => ['/propietarios/index']]
             ]],

           // ['label' => 'Propietarios', 'items' => [
           // ['label' => 'Listado', 'url' => ['/propietarios/index']],
           // ['label' => 'Nuevo Propietario', 'url' => ['/propietarios/create']]
           // ]],
           // //  ['label' => 'Planes', 'items' => [
           // //      ['label' => 'Listado', 'url' => ['/planes/index']],
           // //      ['label' => 'Registrar', 'url' => ['/planes/create']]
           // //  ]],
             ['label' => 'Empresas', 'items'  => [
             ['label' => 'Nuevo', 'url' => ['/referidos/create']],
             ['label' => 'Listado', 'url' => ['/referidos/index']]
             ]],
            /*
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )*/
        ],
    ]);
    NavBar::end();
    ?>


    <div class="container">
    <!-- -->
    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) { echo '<div class="alert alert-' . $key . '">' . $message . '</div>'; } ?>
    <!-- -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ecolpets <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<!--<script type="text/javascript">
    $this->registerJsFile(
    '@web/js/autocomplete.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
</script>-->
</body>
</html>
<?php $this->endPage() ?>
