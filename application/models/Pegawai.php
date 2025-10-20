<?php

class Pegawai extends CI_Model
{
    private $table = 'tb_pegawai';

    public function get_all()
    {
        return $this->db
            ->where('deleted_at IS NULL', null, false)
            ->get($this->table)->result();
    }

    public function get_pegawai_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->where('deleted_at IS NULL', null, false)
            ->get($this->table)->row();
    }
}
