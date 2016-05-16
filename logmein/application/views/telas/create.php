<?php
echo form_open('crud/create');
echo validation_errors('<p>','</p>');
if($this->session->flashdata('cadastrook')):
    echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
endif;
echo '<hr>';
echo '<h2>Cadastrar</h2>';
echo form_label('Nome Empresa');
echo form_input(array('name'=>'nome','id'=>'id'),set_value('nome'),'autofocus');
echo form_label('Nome Maquina Logmein');
echo form_input(array('name'=>'nome_logmein'),set_value('nome_logmein'));
echo form_label('Cod Acesso');
echo form_input(array('name'=>'cod_acesso'),set_value('cod_acesso'));
echo form_label('Usuário Windows');
echo form_input(array('name'=>'usuario_win'),set_value('usuario_win'));
echo form_label('Senha Windows');
echo form_input(array('name'=>'senha_win'),set_value('senha_win'));
echo form_label('Senha WinServer');
echo form_input(array('name'=>'win_server'),set_value('win_server'));
echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
echo form_close();