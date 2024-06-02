<?php
include_once 'base-model.php';
include_once 'traits/HasViewCount.php';

class articales extends BaseModel
{
    use HasViewCount;
    protected $table = 'articales';
    // protected $primaryKey = 'id';
}



$post_id = 2;
$post = new articales();
$data = $post->find($post_id);
$post->addViewCount($post_id);
echo "$data->title (views: $data->viewcount)";
