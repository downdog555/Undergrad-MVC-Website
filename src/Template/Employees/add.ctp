<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create((object)$employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('contactNumber');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('jobType');
            echo $this->Form->control('hoursRequiredWeekly');
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'button primary']) ?>
    <?= $this->Form->end() ?>
</div>
