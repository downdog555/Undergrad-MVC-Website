<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['action' => 'add']) ?> </li>
        
    </ul>
</nav>
<hr />
<?php
foreach ($cards as $card)
{
   echo("<nav class=\"large-3 medium-4 columns\" id=\"actions-sidebar\">
   <ul class=\"side-nav\">
   <li class=\"heading\">Card Actions</li>
   <li>".$this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id]) ."</li>
   <li>".$this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ."</li>


</ul>
</nav>");
   echo('
<div class="cards view large-9 medium-8 columns content">
    <h3>'. h($card->id) .'</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row">Employee</th>
            <td>'. $this->Html->link($card->employee->name, ['controller' => 'Employees', 'action' => 'view', $card->employee->id]).'</td>
        </tr>
        <tr>
            <th scope="row">Id</th>
            <td>'.$this->Number->format($card->id) .'</td>
        </tr>
        <tr>
            <th scope="row">Access Level</th>
            <td>'. $this->Number->format($card->access_level) .'</td>
        </tr>
    </table>
    <div class="row">
        <h4>Manufacturedata</h4>
        '.$this->Text->autoParagraph(h($card->manufacturedata)).'
    </div>
    <div class="row">
        <h4>Assigneddata</h4>
        '.$this->Text->autoParagraph(h($card->assigneddata)).'
    </div>
</div> ' 
);
   echo("<hr />");
}

?>





