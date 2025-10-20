<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once BASEPATH . 'core/Controller.php';

class AccessController extends CI_Controller
{
    protected $akses = [];

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('logged_in'))) {
            redirect('');
        }

        $user_id = $this->session->userdata('user_id');

        $sql = "
            SELECT 
                tua.*
            FROM 
                tb_user_akses tua
            WHERE 
                tua.id_user = ?
        ";

        $this->akses = $this->db->query($sql, [$user_id])->result();
        $this->load->vars($this->akses);
    }
}
