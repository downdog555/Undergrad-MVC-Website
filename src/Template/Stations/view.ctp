<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Station'), ['action' => 'edit', $station->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Station'), ['action' => 'delete', $station->id], ['confirm' => __('Are you sure you want to delete # {0}?', $station->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accesslogs'), ['controller' => 'Accesslogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accesslog'), ['controller' => 'Accesslogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stations view large-9 medium-8 columns content">
    <h3><?= h($station->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('AccessLevelRequired') ?></th>
            <td><?= h($station->accessLevelRequired) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StationKey') ?></th>
            <td><?= h($station->stationKey) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($station->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($station->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($station->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accesslogs') ?></h4>
        <?php if (!empty($station->accesslogs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Card Id') ?></th>
                <th scope="col"><?= __('Station Id') ?></th>
                <th scope="col"><?= __('Time Accessed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($station->accesslogs as $accesslogs): ?>
            <tr>
                <td><?= h($accesslogs->id) ?></td>
                <td><?= h($accesslogs->card_id) ?></td>
                <td><?= h($accesslogs->station_id) ?></td>
                <td><?= h($accesslogs->time_accessed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accesslogs', 'action' => 'view', $accesslogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accesslogs', 'action' => 'edit', $accesslogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accesslogs', 'action' => 'delete', $accesslogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accesslogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
