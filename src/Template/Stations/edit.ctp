<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $station->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $station->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accesslogs'), ['controller' => 'Accesslogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Accesslog'), ['controller' => 'Accesslogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stations form large-9 medium-8 columns content">
    <?= $this->Form->create($station) ?>
    <fieldset>
        <legend><?= __('Edit Station') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('accessLevelRequired');
            echo $this->Form->control('stationKey');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
