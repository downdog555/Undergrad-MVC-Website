<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login', ['class' => 'button primary']) ?>
<?= $this->Form->end() ?>