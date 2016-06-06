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
            <th class="w200px th-sort-link" id="th-sort-link-username">
                <?= $this->Paginator->sort('username', __('username'))?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w100px th-sort-link" id="th-sort-link-name">
                <?= $this->Paginator->sort('name', __('name')) ?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w100px th-sort-link" id="th-sort-link-name_kana">
                <?= $this->Paginator->sort('name_kana', __('name_kana')) ?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w100px th-sort-link" id="th-sort-link-email">
                <?= $this->Paginator->sort('email', __('email')) ?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w60px th-sort-link" id="th-sort-link-admin_flag">
                <?= $this->Paginator->sort('admin_flag', __('role')) ?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w150px th-sort-link" id="th-sort-link-username">
                <?= $this->Paginator->sort('created', __('created')) ?>
                <i class="fa fa-sort"></i>
            </th>
            <th class="w150px"><?= __('action') ?></th>
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
                    <div class="btn-group" role="group" aria-label="...">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-default btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger btn-xs', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </div>
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

<?php $this->start('script'); ?>
<script type="text/javascript">
    var PHPVALUE = {
        sort: <?= "'".str_replace("Users.", "", $this->Paginator->params()['sort'])."'"; ?>,
        direction: <?= "'".$this->Paginator->params()['direction']."'"; ?>
    };
</script>
<?php $this->end(); ?>
<?= $this->Html->script('user_list'); ?>