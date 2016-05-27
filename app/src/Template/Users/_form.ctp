<?= $this->Form->create($user); ?>
  <?php
    $this->Form->templates([
      'inputContainer' => '<div class="col-sm-8">{{content}}</div>',
    ]);
  ?>
<div class="form-group form-group-sm">
  <?= $this->Form->label(__('username'), null, ['class' => 'col-sm-4 control-label']); ?>
  <?= $this->Form->input('username', ['type' => 'text', 
                                      'class' => 'form-control col-md-4 col-xs-12', 
                                      'label' => false ]); ?>
  <div class="clearfix"></div>
</div>

<div class="form-group form-group-sm">
  <?= $this->Form->label(__('password'), null, ['class' => 'col-sm-4 control-label']); ?>
  <?= $this->Form->input('password', ['type' => 'password', 
                                      'class' => 'form-control col-md-4 col-xs-12', 
                                      'label' => false ]); ?>
  <div class="clearfix"></div>
</div>

<div class="form-group form-group-sm">
  <?= $this->Form->label(__('password_c'), null, ['class' => 'col-sm-4 control-label']); ?>
  <?= $this->Form->input('password_confirm', ['type' => 'password', 
                                      'class' => 'form-control col-md-4 col-xs-12', 
                                      'label' => false ]); ?>
  <div class="clearfix"></div>
</div>

<div class="form-group form-group-sm">
  <?= $this->Form->label(__('name'), null, ['class' => 'col-sm-4 control-label']); ?>
  <?= $this->Form->input('name', ['type' => 'text', 
                                      'class' => 'form-control col-md-4 col-xs-12', 
                                      'label' => false ]); ?>
  <div class="clearfix"></div>
</div>

<div class="form-group form-group-sm">
  <?= $this->Form->label(__('name_kana'), null, ['class' => 'col-sm-4 control-label']); ?>
  <?= $this->Form->input('name_kana', ['type' => 'text', 
                                      'class' => 'form-control col-md-4 col-xs-12', 
                                      'label' => false ]); ?>
  <div class="clearfix"></div>
</div>

<div class="form-group form-group-sm div-admin-flag">
  <?= $this->Form->label(__('admin_f'), null, ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); ?>
  <?= $this->Form->input('role', ['type' => 'checkbox', 
                                      'value' => $adminFlag,
                                      'class' => 'js-switch', 
                                      'label' => ' ' ]); ?>
  <div class="clearfix"></div>
</div>


<?= $this->Form->submit(__('Add'), ['class' => 'btn btn-default submit']); ?>

<?= $this->Form->end(); ?>
<div class="clearfix"></div>