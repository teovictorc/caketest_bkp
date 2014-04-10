<h1>Posts do Blog</h1>
<?php echo $this->Html->link('Adicionar', array(
                                        'controller' => 'posts',
                                        'action' => 'add',
                                        'full_base' => true
                                        )
      );?>
<?=$this->Form->create('Post');?>
<?=$this->Form->input('title');?>
<?=$this->Form->end('Buscar');?>
<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Ação</th>
        <th>Data de Criação</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
                                         array(
                                         'controller' => 'posts',
                                         'action' => 'view',
                                         $post['Post']['id']
                                    )
                    ); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                                        'Excluir',
                                        array('action' => 'delete', $post['Post']['id']),
                                        array('confirm' => "Tem certeza disso?")
                    ); ?>
            <?php echo $this->Html->link('Editar',
                                         array(
                                         'action' => 'edit',
                                         $post['Post']['id'])
                    ); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>