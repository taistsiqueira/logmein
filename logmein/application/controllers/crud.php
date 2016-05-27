<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowe');

class  Crud extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('table');
        $this->load->model('crud_model','crud');
    }

    public function index(){
        $dados = array(
            'titulo' => 'CRUD com CodeIgniter',
            'tela' => '',
        );
        $this->load->view('crud',$dados);
    }

    public function create(){
        //validação do form
        //'nome do campo no form', 'NOME DA MSG DE VALIDACAO','regras'
        //trim: elimina os espaços
        //ucwords: letras maiusculas
        $this->form_validation->set_rules('Nome','NOME','trim|max_length[50]|ucwords');
        $this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema.');
        $this->form_validation->set_rules('nome_logmein','NOME_LOGMEIN','trim|required|max_length[50]');
        $this->form_validation->set_rules('cod_acesso','COD_ACESSO','trim|max_length[50]');
        $this->form_validation->set_rules('usuario_win','USUARIO_WIN','trim|max_length[50]');
        $this->form_validation->set_rules('senha_win','SENHA_WIN','trim|max_length[50]');
        $this->form_validation->set_rules('win_server','WIN_SERVER','trim|max_length[50]');

        if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','nome_logmein','cod_acesso','usuario_win','senha_win','win_server'),$this->input->post());

            $this->crud->do_insert($dados);
        endif;

        $dados = array(
            'titulo' => 'CRUD &raquo; Create',
            'tela' => 'create',
        );
        $this->load->view('crud',$dados);
    }

    public function retrieve(){
        $dados = array(
            'titulo' => 'CRUD &raquo; Retrieve',
            'tela' => 'retrieve',
            'usuarios' => $this->crud->get_all()->result(),
        );
        $this->load->view('crud',$dados);
    }

    public function update(){
                //********** ULTIMO CAMPO NÃO CONTINUA VISUALIZADO DEPOIS DA ALTERAÇÃO.

        //validação do form
        //'nome do campo no form', 'NOME DA MSG DE VALIDACAO','regras'
        //trim=elimina os espaços
        //ucwords: Converte para maiúsculas o primeiro caractere de cada palavra
        //strtolower: Retorna string com todos os caracteres do alfabeto convertidos para minúsculas.
        $this->form_validation->set_rules('nome','NOME','trim|max_length[50]|ucwords');
        $this->form_validation->set_rules('nome_logmein','NOME_LOGMEIN','trim');
        //$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('cod_acesso','COD_ACESSO','trim');
        $this->form_validation->set_rules('usuario_win','USUARIO_WIN','trim');
        $this->form_validation->set_rules('senha_win','SENHA_WIN','trim');
        $this->form_validation->set_rules('win_server','WIN_SERVER','trim');


        if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome_logmein','cod_acesso','usuario_win','senha_win','win_server'),$this->input->post());
//            $dados['senha_win'] = md5($dados['senha_win']);
            $this->crud->do_update($dados,array('id'=>$this->input->post('idusuario')));
        endif;

        $dados = array(
            'titulo' => 'CRUD &raquo; Update',
            'tela' => 'update',
        );
        $this->load->view('crud',$dados);
    }

    public function delete(){
        if ($this->input->post('idusuario')>0):
            $this->crud->do_delete(array('id'=>$this->input->post('idusuario')));
        endif;

        $dados = array(
            'titulo' =>'CRUD &raquo; Delete' ,
            'tela' => 'delete'
        );
        $this->load->view('crud',$dados);
    }
//
//    public function cadastrar(){
//        $this->chamada('CRUD &raquo; Cadastrar','cadastrar',array('nome' => 'Taís'));
//    }
//
//    public function teste(){
//        $this->chamada('CRUD &raquo; Taís','teste');
//    }
// private function chamada($titulo=NULL,$tela=NULL,$array = NULL){
//     $dados = array(
//         'titulo' => $titulo,
//         'tela'=>$tela
//     );
//     if($array != NULL)
//         $dados = array_merge($dados,$array);
//     $this->load->view('crud',$dados);
// }

}