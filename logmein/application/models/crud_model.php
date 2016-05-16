<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowe');

class Crud_model extends CI_Model{

    public function do_insert($dados=NULL){
        if ($dados!=NULL):
                $this->db->insert('clientes',$dados);
                $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso!');
                redirect('crud/create');
        endif;
    }

    public function do_update($dados=NULL,$condicao=NULL){
        if ($dados!=NULL && $condicao!=NULL):
            $this->db->update('clientes',$dados, $condicao);
            $this->session->set_flashdata('edicaook','Cadastro alteradoo com sucesso!');
            redirect(current_url());
        endif;
    }

    public function do_delete($condicao=NULL){
        if ($condicao!=NULL):
            $this->db->delete('clientes',$condicao);
            $this->session->set_flashdata('excluirok','Registro deletado com sucesso');
            redirect('crud/retrieve');
        endif;
    }

    public function  get_all(){
        return $this->db->get('clientes');
    }

    public function get_byid($id=NULL){
        if ($id!=NULL):
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('clientes');
        else:
            return FALSE;
        endif;
    }
}