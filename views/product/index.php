<?php
use yii\bootstrap\Html;
/* @var $this yii\web\View */
?>
<h1>รายการสินค้า</h1>

<p>
<?=Html::a('เพิ่มสินค้า',['create'],['class'=>'btn btn-success'])?>
</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ไอดี</th>
      <th>ชื่อสินค้า</th>
      <th>ประเภท</th>
      <th>ราคา</th>
      <th>รายละเอียด</th>
      <th>จำนวน</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($model as $data){?>
    <tr>
      <td><?=$data->id?></td>
      <td><?=$data->title?></td>
      <td><?=$data->type?></td>
      <td><?=$data->price?></td>
      <td><?=$data->detail?></td>
      <td><?=$data->amount?></td>
      <td>
        <?=Html::a(Html::icon('pencil'),['update','id'=>$data->id],['class'=>''])?>
        <?=Html::a(Html::icon('trash'),['delete','id'=>$data->id],['class'=>'','onClick'=>"return confirm('Are you sure?');"])?>
      </td>
    </tr>
    <?php } ?>

  </tbody>



</table>
