<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends AccessController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');

        if (empty($this->session->userdata('logged_in'))) {
            redirect('');
        }
    }

    public function index()
    {
        $data['title'] = "Pengguna";
        $data['users'] = $this->Auth->get_user_all();
        $this->render('user_page/admin/pengguna/index', $data);
    }

    public function verify($stat, $id)
    {
        $dataVerify = [
            0 => "Pending",
            1 => "menyetujui",
            2 => "Rejected"
        ];
        try {
            if (!empty($dataVerify[$stat])) {
                $data = [
                    "is_active" => $stat
                ];
                $this->db->where(['id' => $id])->update('tb_user', $data);


                $dataHakAkses = [
                    ["fitur" => "dokumen", "is_create" => 0, "is_read" => 0, "is_update" => 0, "is_delete" => 0],
                    ["fitur" => "pegawai", "is_create" => 0, "is_read" => 1, "is_update" => 0, "is_delete" => 0],
                    ["fitur" => "pengguna", "is_create" => 0, "is_read" => 0, "is_update" => 0, "is_delete" => 0],
                ];

                foreach ($dataHakAkses as $row) {
                    $aksesData = [
                        "id_user" => $id,
                        "fitur" => $row['fitur'],
                        "is_create" => $row['is_create'],
                        "is_read" => $row['is_read'],
                        "is_update" => $row['is_update'],
                        "is_delete" => $row['is_delete']
                    ];

                    $exists = $this->db->get_where('tb_user_akses', [
                        'id_user' => $id,
                        'fitur' => $row['fitur']
                    ])->row();

                    if ($exists) {
                        $this->db
                            ->set($aksesData)
                            ->where('id_user', $exists->id_user)
                            ->where('fitur', $exists->fitur)
                            ->update('tb_user_akses');
                    } else {
                        $this->db->insert('tb_user_akses', $aksesData);
                    }
                }

                $this->session->set_flashdata('succ_msg', 'Berhasil ' . $dataVerify[$stat] . ' data pegawai!');
                redirect('admin/pengguna');
            } else {
                $this->session->set_flashdata('err_msg', 'Error data, jangan menngubah parameter!');
                redirect('admin/pengguna');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('err_msg', 'Gagal melakukan verifikasi, error ' . $e->getMessage());
            redirect('admin/pengguna');
        }
    }

    public function submit()
    {
        try {
            $dataReq = $this->input->post();
            $idUser = $dataReq['id_user_edit'];
            $data = [
                "nama" => $dataReq['nama_edit'],
                "username" => $dataReq['username_edit'],
                "email" => $dataReq['email_edit']
            ];

            if (empty($idUser)) {
                $this->db->insert('tb_user', $data);

                $this->session->set_flashdata('succ_msg', 'Berhasil menyimpan data pengguna!');
                redirect('admin/pengguna');
            } else {
                $this->db->where(['id' => $idUser])->update('tb_user', $data);
                $this->session->set_flashdata('succ_msg', 'Berhasil memperbarui data pengguna!');
                redirect('admin/pengguna');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('err_msg', 'Gagal menyimpan data pengguna, error ' . $e->getMessage());
            redirect('admin/pengguna');
        }
    }

    public function submit_akses()
    {
        try {
            $dataReq = $this->input->post();
            $idUser = $dataReq['id_user_hak_akses'];

            $fitur = $dataReq['fitur'];
            $insert = $dataReq['insert'];
            $read = $dataReq['read'];
            $update = $dataReq['update'];
            $delete = $dataReq['delete'];

            foreach ($fitur as $fiturX) {
                $dataHakAkses = [
                    "id_user" => $idUser,
                    "fitur" => $fiturX,
                    "is_create" => ($insert[$fiturX] == "on" ? 1 : 0),
                    "is_read" => ($read[$fiturX] == "on" ? 1 : 0),
                    "is_update" => ($update[$fiturX] == "on" ? 1 : 0),
                    "is_delete" => ($delete[$fiturX] == "on" ? 1 : 0)
                ];

                $exists = $this->db->get_where('tb_user_akses', [
                    'id_user' => $idUser,
                    'fitur' => $fiturX
                ])->row();

                if ($exists) {
                    $this->db
                        ->set($dataHakAkses)
                        ->where('id_user', $exists->id_user)
                        ->where('fitur', $exists->fitur)
                        ->update('tb_user_akses');
                } else {
                    $this->db->insert('tb_user_akses', $dataHakAkses);
                }
            }

            $this->session->set_flashdata('succ_msg', 'Berhasil menyimpan hak akses pengguna!');
            redirect('admin/pengguna');
        } catch (Exception $e) {
            $this->session->set_flashdata('err_msg', 'Gagal menyimpan data pengguna, error ' . $e->getMessage());
            redirect('admin/pengguna');
        }
    }

    public function reset_password()
    {
        try {
            $dataReq = $this->input->post();

            $id_user = $dataReq['id_user'];
            $hashedPassword = (!empty($dataReq['pass']) ? hash('sha256', $dataReq['pass']) : NULL);

            $data = [
                "password" => $hashedPassword,
            ];

            $this->db->where(['id' => $id_user])->update('tb_user', $data);
            $this->session->set_flashdata('succ_msg', 'Berhasil memperbarui password pengguna!');
            redirect('admin/pengguna');
        } catch (Exception $e) {
            $this->session->set_flashdata('err_msg', 'Gagal menyimpan password pengguna, error ' . $e->getMessage());
            redirect('admin/pengguna');
        }
    }

    public function render($content_page, $data = [])
    {
        $data['akses'] = $this->akses;
        $data['js_script'] = "user_page/admin/pengguna/js_script";
        $this->load->view('template_page_user/header', $data);
        $this->load->view($content_page, $data);
        $this->load->view('template_page_user/footer', $data);
    }
}
