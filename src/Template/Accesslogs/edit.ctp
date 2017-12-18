<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accesslog $accesslog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accesslog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accesslog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Accesslogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accesslogs form large-9 medium-8 columns content">
    <?= $this->Form->create($accesslog) ?>
    <fieldset>
        <legend><?= __('Edit Accesslog') ?></legend>
        <?php
            echo $this->Form->control('card_id', ['options' => $cards]);
            echo $this->Form->control('station_id', ['options' => $stations]);
            echo $this->Form->control('time_accessed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
