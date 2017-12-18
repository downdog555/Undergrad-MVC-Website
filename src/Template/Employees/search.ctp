<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 * @var \App\Model\Entity\Employee $query
 */
//print_r($query);


?>
<h3>Employee Search Results:</h3>
<table>

    <?= $this->Html->tableHeaders(['ID', 'Name', 'Address', 'Contact Number', 'Link']); ?>
<?php foreach ($query as $emp): ?>
  <tr>
    <td><?= $emp['id'] ?></td>
    <td><?= $emp['name'] ?></td>
    <td><?= $emp['address'] ?></td>
    <td><?= $emp['contactNumber'] ?></td>
    <td><?= $this->Html->link(('View Details'), ['action' => 'view', $emp['id']]) ?></td>
  </tr>
<?php endforeach; ?>
</table>