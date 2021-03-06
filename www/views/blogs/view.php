<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use app\models\AddPostModel;
    use app\models\Post;
    use app\models\Blog;
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
<table class="table" id="posts">
<?php foreach($blog->posts as $post): ?>
    <tr>
        <td><?= $post->title?></td>
        <td><?= $post->content?></td>
        <td><?= $post->date?></td>
        <td><button class="btn like-btn" data-post="<?= $post->id ?>">Like</button></td>
        <?php if($blog->blog->owner_id == Yii::$app->user->identity->getId()) { echo "<td><button class='btn btn-danger btn-delete' data-post='{$post->id}'>Delete</button></td>"; }?>
    </tr>   
<?php endforeach;?>
</table>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>

$(function() {
    $('.like-btn').each(function(idx, elem) {
        $.ajax(
            {
                url: '/likes/all',
                data: {
                    'post_id': elem['dataset']['post'],
                    '_csrf':'<?=\Yii::$app->request->csrfToken?>'
                },
                method: 'POST',
                success: function(result, status) {
                    $(elem).html('Like: ' + result);
                }
            }
        );
    });

    $('.like-btn').on('click', function(event) {
        
        $.ajax(
            {
                url: '/likes/like',
                data: {
                    'post_id': event.target['dataset']['post'],
                    'user_id': <?= Yii::$app->user->identity->getId();?>
                },
                method: 'POST',
                success: function(result, status) {
                    $(event.target).html('Like: ' + result);
                }
            }
        );
    });

    $('.btn-delete').on('click', function(event) {
        
        $.ajax(
            {
                url: '/posts/delete',
                data: {
                    'post_id': event.target['dataset']['post'],
                    'user_id': <?= Yii::$app->user->identity->getId();?>
                },
                method: 'POST',
                success: function(result, status) {
                    $(event.target).parents('tr').remove();
                }
            }
        );
    });
});
</script>