<h1>Adicionar Postagem</h1>

<?=$this->Form->create('Post');?>
<?=$this->Form->input('title');?>
<?=$this->Form->input('body', array('rows'=> '3'));?>
<?=$this->Form->end('Salvar');?>