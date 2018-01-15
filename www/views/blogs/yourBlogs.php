<table class="table striped">
<tr>
    <th>Blog name</th>
    <th>Blog description</th>
</tr>
<?php foreach($blogs as $blog):?>

<tr>
    <td><a href="/blogs/view?id=<?= $blog->id?>"><?= $blog->name ?></a></td>
    <td><?= $blog->description ?></td>
    <?php if($blog->owner_id == Yii::$app->user->identity->getId()) { echo "<td><button class='btn btn-danger btn-delete' data-blog='{$blog->id}'>Delete</button></td>"; }?>
</tr>

<?php endforeach; ?>
</table>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>
$(function() {
    $('.btn-delete').on('click', function(event) {
        $.ajax(
            {
                url: '/blogs/delete',
                data: {
                    'blog_id': event.target['dataset']['blog'],
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