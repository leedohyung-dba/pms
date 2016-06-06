<div class="x_panel">
<div class="col-md-5 col-md-offset-1">
    <div class="x_title">
      <h4><?= $pageTitle ?></h4>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">        
        <table class="table table-bordered">
            <thead>
              <tr>
                <th class="w100px"><?= __('input title') ?></th>
                <th><?= __('input content') ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th><?= __('username') ?></th>
                <td><?= $user->username ?></td>
              </tr>
              <tr>
                <th><?= __('name') ?></th>
                <td><?= $user->name ?></td>
              </tr>
              <tr>
                <th><?= __('name_kana') ?></th>
                <td><?= $user->name_kana ?></td>
              </tr>
              <tr>
                <th><?= __('admin_f') ?></th>
                <td><?= $user->admin_flag ?></td>
              </tr>
            </tbody>
        </table>

        <?php if(!empty($beforeUrl)): ?>
            <?= $this->Html->link(__('List'), $beforeUrl, ['class' => 'btn btn-default'], '', ['escape'=>false, 'div' => true]);?>
        <?php else: ?>
            <?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'btn btn-default'], '', ['escape'=>false, 'div' => true]);?>
        <?php endif; ?>
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary'], '', ['escape'=>false, 'div' => true]);?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
    </div>
</div>
</div>