<!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><?= __('list'); ?> <small><?= __('uesrs'); ?></small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <?= $this->Html->link(__('add'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content  index large-9 medium-8 columns content">
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th><?= $this->Paginator->sort('username', __('username'))?></th>
            <th><?= $this->Paginator->sort('name', __('name')) ?></th>
            <th><?= $this->Paginator->sort('name_kana', __('name_kana')) ?></th>
            <th><?= $this->Paginator->sort('email', __('email')) ?></th>
            <th><?= $this->Paginator->sort('admin_flag', __('role')) ?></th>
            <th><?= $this->Paginator->sort('created', __('created')) ?></th>
            <th><?= __('action') ?></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->name_kana) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= $this->Number->format($user->admin_flag) ?></td>
                <td><?= $user->created->timezone('Asia/Tokyo')->format('Y/m/d H:i:s') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
        <div class="btn-group paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
            </ul>
            <ul class="pagination">
                <?= $this->Paginator->numbers() ?>
            </ul>
            <ul class="pagination">
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
        </div>
        
    </div>
  </div>
</div>
<!-- /page content -->