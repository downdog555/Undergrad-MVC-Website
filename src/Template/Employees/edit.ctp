<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
//$employee = $this->request->session()->read('Auth.Employee');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee['id']],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee['id'])]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<?php

print_r($employee);
?>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create((object) $employee) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->control('name' ,['value' => $employee['name']]);
            echo $this->Form->control('address' ,['value' => $employee['address']]);
            echo $this->Form->control('contactNumber' ,['value' => $employee['contactNumber']]);
            echo $this->Form->control('username' ,['value' => $employee['username']]);
            echo $this->Form->control('password' );
            echo $this->Form->control('jobType' ,['value' => $employee['jobType']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
