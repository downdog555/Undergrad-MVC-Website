<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accesslog[]|\Cake\Collection\CollectionInterface $accesslogs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Accesslog'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accesslogs index large-9 medium-8 columns content">
    <h3><?= __('Accesslogs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('card_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('station_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_accessed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesslogs as $accesslog): ?>
            <tr>
                <td><?= $this->Number->format($accesslog->id) ?></td>
                <td><?= $accesslog->has('card') ? $this->Html->link($accesslog->card->id, ['controller' => 'Cards', 'action' => 'view', $accesslog->card->id]) : '' ?></td>
                <td><?= $accesslog->has('station') ? $this->Html->link($accesslog->station->name, ['controller' => 'Stations', 'action' => 'view', $accesslog->station->id]) : '' ?></td>
                <td><?= h($accesslog->time_accessed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accesslog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accesslog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accesslog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accesslog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
