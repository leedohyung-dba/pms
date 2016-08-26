<?= $this->Form->create($user); ?>
  <?php
    $this->Form->templates([
      'inputContainer' => '<div class="col-sm-12">{{content}}</div>',
    ]);
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="w100px"><?= __('input title') ?></th>
        <th><?= __('input content') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th><input type="email" class="test" required><?= __('username') ?></th>
        <td><?= $this->Form->input('username', ['type' => 'text', 
                'class' => 'form-control-xs col-md-4 col-xs-12 fvc-fv-required-false', 
                'label' => false ]); ?></td>
      </tr>
      <?php if($this->request->action != 'edit'): ?>
            <tr>
              <th><?= __('password') ?></th>
              <td><?= $this->Form->input('password', ['type' => 'password', 
                      'class' => 'form-control col-md-4 col-xs-12', 
                      'label' => false ]); ?></td>
            </tr>
            <tr>
              <th><?= __('password_c') ?></th>
                <td><?= $this->Form->input('password_confirm', ['type' => 'password', 
                      'class' => 'form-control col-md-4 col-xs-12', 
                      'label' => false ]); ?></td>
            </tr>
      <?php endif;?>
      <tr>
        <th><?= __('name') ?></th>
        <td><?= $this->Form->input('name', ['type' => 'text', 
                'class' => 'form-control col-md-4 col-xs-12', 
                'label' => false ]); ?></td>
      </tr>
      <tr>
        <th><?= __('name_kana') ?></th>
        <td><?= $this->Form->input('name_kana', ['type' => 'text', 
                'class' => 'form-control col-md-4 col-xs-12', 
                'label' => false ]); ?></td>
      </tr>
      <tr>
        <th><?= __('admin_f') ?></th>
        <td><?= $this->Form->input('admin_flag', ['type' => 'checkbox', 
                'value' => $adminFlag,
                'class' => 'js-switch',
                'label' => ' ' ]); ?></td>
      </tr>

      <?php if($this->request->action == 'edit'): ?>
      <tr>
        <th><?= __('password_C') ?></th>
        <td><?= $this->Form->input('update_password_flag', ['type' => 'checkbox', 
                'class' => 'js-switch',
                'label' => ' ' ]); ?></td>
      </tr>
      
      <?php if ( !empty($this->request->data['update_password_flag']) ): ?>
        <?php if ( (int)$this->request->data['update_password_flag'] === 1 ): ?>
            <tr class='pw-change'>
        <?php else: ?>
            <tr class='pw-change' style="display: none;">
        <?php endif; ?>
      <?php else: ?>
        <tr class='pw-change' style="display: none;">
      <?php endif; ?>
        <th><?= __('password') ?></th>
        <td><?= $this->Form->input('password', ['type' => 'password', 
                'class' => 'form-control col-md-4 col-xs-12', 
                'default' => '123',
                'label' => false ]); ?></td>
      </tr>
      <?php if ( !empty($this->request->data['update_password_flag']) ): ?>
        <?php if ( (int)$this->request->data['update_password_flag'] === 1 ): ?>
            <tr class='pw-change'>
        <?php else: ?>
            <tr class='pw-change' style="display: none;">
        <?php endif; ?>
      <?php else: ?>
        <tr class='pw-change' style="display: none;">
      <?php endif; ?>
        <th><?= __('password_c') ?></th>
        <td><?= $this->Form->input('password_confirm', ['type' => 'password', 
                'class' => 'form-control col-md-4 col-xs-12', 
                'default' => '',
                'label' => false ]); ?></td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>


<div class="btn-group w200px">
  <?= $this->Form->submit(__('Add'), ['class' => 'btn btn-primary submit']); ?>
  <div class="btn-cancel">
  <?php if($this->request->action != 'setup'): ?>
      <?php if(!empty($beforeUrl)): ?>
        <?= $this->Html->link(__('Cancel'), $beforeUrl, ['class' => 'btn btn-default'], '', ['escape'=>false, 'div' => true]);?>
      <?php else: ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default'], '', ['escape'=>false, 'div' => true]);?>
      <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
<?= $this->Form->end(); ?>
<div class="clearfix"></div>

<script src="<?= $baseUrl;?>js/rvc/dist/index.bundle.js"></script>