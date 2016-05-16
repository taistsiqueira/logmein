<?php
$iduser = $this->uri->segment(3);
if($iduser==NULL) redirect('crud/retrieve');

$query = $this->crud->get_byid($iduser)->row();
echo form_open("crud/delete/$iduser");


echo form_label('Nome Empresa');
echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'disabled="disabled"');

echo form_label('Nome Logmein');
echo form_input(array('name'=>'nome_logmein'),set_value('nome_logmein',$query->nome_logmein),'disabled="disabled"');

echo form_submit(array('name'=>'cadastrar'),'Excluir Registro');

echo form_hidden('idusuario',$query->id);

echo form_close();