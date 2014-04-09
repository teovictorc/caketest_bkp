<h1>Editar Postagem</h1>
<?php echo $this->Form->create('Post', array('action'=>'edit'));?>
<?=$this->Form->input('title');?>
<?=$this->Form->input('body', array('rows'=>'3'));?>
<?=$this->Form->input('id',array('type'=>'hidden'));?>
<?=$this->Form->end('Salvar');?>