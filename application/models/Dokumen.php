<?php

class Dokumen extends CI_Model
{
    private $table = 'tb_dokumen';

    public function get_dokumen_all()
    {        
        $sql = "
            SELECT 
                td.* 
            FROM 
                tb_dokumen td
            WHERE
                td.deleted_at IS NULL";
        return $this->db->query($sql)->result();
    }

    public function get_dokumen_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->where('deleted_at IS NULL', null, false)
            ->get($this->table)->row();
    }
}
