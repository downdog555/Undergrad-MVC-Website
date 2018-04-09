<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cards form large-9 medium-8 columns content">
    <?= $this->Form->create($card) ?>
    <fieldset>
        <legend><?= __('Add Card') ?></legend>
        <?php
            echo $this->Form->control('manufacturedata');
            echo $this->Form->control('assigneddata');
            echo $this->Form->control('access_level');
            echo $this->Form->control('employee_id', ['options' => $employees]);
        ?>
    </fieldset>
     <?= $this->Form->button('Submit', ['class' => 'button primary']) ?>
    <?= $this->Form->end() ?>
</div>
