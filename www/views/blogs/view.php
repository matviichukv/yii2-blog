<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use app\models\AddPostModel;
?>

<h2><?= $blog->blog->name ?></h2>
<p><?= $blog->blog->description ?></p>
<?php if($blog->blog->owner_id == Yii::$app->user->identity->getId()): ?>
<?php $form = ActiveForm::begin([
        'id' => 'blog-add-form',
        'action' => '/posts/add',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= $form->field($blog->addPostModel, 'blog_id')->hiddenInput()->label(false)?>
    <?= $form->field($blog->addPostModel, 'title')->textInput()?>
    <?= $form->field($blog->addPostModel, 'content')->textarea()?>
    <button type="submit" class="btn btn-default"> Add post</button>
<?php ActiveForm::end(); ?>
<?php endif; ?>
<table class="table">
<?php foreach($blog->posts as $post): ?>
    <tr>
        <td><?= $post->title?></td>
        <td><?= $post->content?></td>
        <td><?= $post->date?></td>
    </tr>   
<?php endforeach;?>
</table>