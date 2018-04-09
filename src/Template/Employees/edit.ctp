<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
//$employee = $this->request->session()->read('Auth.Employee');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
     <?php echo('<li>'.$this->Html->link(__('Back'), ['action' => 'view', $employeeEdit['id']]).'</li>'); ?>
</nav>

<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create((object) $employeeEdit) ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->control('name' ,['value' => $employeeEdit['name']]);
            echo $this->Form->control('address' ,['value' => $employeeEdit['address']]);
            echo $this->Form->control('contactNumber' ,['value' => $employeeEdit['contactNumber']]);
            echo $this->Form->control('username' ,['value' => $employeeEdit['username']]);
            echo $this->Form->control('password' );
            echo $this->Form->control('jobType' ,['value' => $employeeEdit['jobType']]);
            echo $this->Form->control('hoursRequiredWeekly' ,['value' => $employeeEdit['hoursRequiredWeekly']]);           

        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'button primary']) ?>
    <?= $this->Form->end() ?>
</div>
