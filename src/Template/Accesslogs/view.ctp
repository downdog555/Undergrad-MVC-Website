<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accesslog $accesslog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Accesslog'), ['action' => 'edit', $accesslog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Accesslog'), ['action' => 'delete', $accesslog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accesslog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accesslogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accesslog'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accesslogs view large-9 medium-8 columns content">
    <h3><?= h($accesslog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Card') ?></th>
            <td><?= $accesslog->has('card') ? $this->Html->link($accesslog->card->id, ['controller' => 'Cards', 'action' => 'view', $accesslog->card->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Station') ?></th>
            <td><?= $accesslog->has('station') ? $this->Html->link($accesslog->station->name, ['controller' => 'Stations', 'action' => 'view', $accesslog->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accesslog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Accessed') ?></th>
            <td><?= h($accesslog->time_accessed) ?></td>
        </tr>
    </table>
</div>
