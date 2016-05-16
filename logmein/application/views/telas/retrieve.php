<?php
    echo '<hr>';
    echo '<h2>Lista de usuários</h2>';
    if ($this->session->flashdata('excluirok')):
        echo '<p>'.$this->session->flashdata('excluirok').'</p>';
    endif;

    $this->table->set_heading('ID','Nome','Nome Logmein','Cod Acesso','Usuário Windows','Senha Windows', 'Win Server');

    foreach ($usuarios as $linha):
        $this->table->add_row($linha->id,$linha->nome,$linha->nome_logmein,$linha->cod_acesso,$linha->usuario_win,$linha->senha_win,$linha->win_server,anchor("crud/update/$linha->id",'Editar').' - '.anchor("crud/delete/$linha->id",'Excluir'));
    endforeach;
    echo $this->table->generate();

