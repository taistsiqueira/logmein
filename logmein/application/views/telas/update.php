<?php
$iduser = $this->uri->segment(3);
    if($iduser==NULL) redirect('crud/retrieve');

    $query = $this->crud->get_byid($iduser)->row();
        echo form_open("crud/update/$iduser");
    echo validation_errors('<p>','</p>');

    if($this->session->flashdata('edicaook')):
        echo '<p>'.$this->session->flashdata('edicaook').'</p>';
    endif;

//**********TRES ULTIMOS CAMPOS ESTAO OCULTOS COMO SENHA, CORRIGIR - OK
echo form_label('Nome');
echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'disabled="disabled"');
echo form_label('Nome Logmein');
echo form_input(array('name'=>'nome_logmein'),set_value('nome_logmein',$query->nome_logmein),'autofocus');
echo form_label('Cod Acesso');
echo form_input(array('name'=>'cod_acesso'),set_value('cod_acesso',$query->cod_acesso));
echo form_label('Usuário Windows');
echo form_input(array('name'=>'usuario_win'),set_value('usuario_win',$query->usuario_win));
echo form_label('Senha Windows');
echo form_input(array('name'=>'senha_win'),set_value('senha_win',$query->senha_win));
echo form_label('Win Server');
echo form_input(array('name'=>'win_server'),set_value('win_server',$query->win_server));

echo form_submit(array('name'=>'cadastrar'),'Alterar Dados');
echo form_hidden('idusuario',$query->id);
echo form_close();