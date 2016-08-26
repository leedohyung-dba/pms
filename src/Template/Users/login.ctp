<div class="x_title">
  <h4><?= __('PMS Setup Page')?></h4>
  <div class="clearfix"></div>
</div>
<div class="x_content">
  <?= $this->Form->create($user); ?>
  <div>
    <?= $this->Form->input('username', ['type' => 'text', 
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'placeholder' => 'Username']); ?>
  </div>
  <div>
    <?= $this->Form->input('password', ['type' => 'password', 
                                        'class' => 'form-control', 
                                        'label' => false, 
                                        'placeholder' => 'Password']); ?>
  </div>
  <div>
    <?= $this->Form->submit(__('Log in'), ['class' => 'btn btn-default submit']); ?>
  </div>
  <?= $this->Form->end(); ?>

  <div class="clearfix"></div>

  <div class="separator">
    <div>
      <p><?= __('Hellow!') ?></p>
    </div>
  </div>
</div>