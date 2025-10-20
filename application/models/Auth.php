<?php

class Auth extends CI_Model
{
    public function get_user_all()
    {
        $sql = "
            SELECT 
                tu.id ,
                tu.id_pegawai ,
                tu.username ,
                tu.nama ,
                tu.password ,
                tu.email ,
                tu.privillage ,
                tu.is_active ,
                GROUP_CONCAT(tua.fitur SEPARATOR ';') AS fitur,
                GROUP_CONCAT(tua.is_create SEPARATOR ';') AS is_create,
                GROUP_CONCAT(tua.is_read SEPARATOR ';') AS is_read,
                GROUP_CONCAT(tua.is_update SEPARATOR ';') AS is_update,
                GROUP_CONCAT(tua.is_delete SEPARATOR ';') AS is_delete
            FROM 
                tb_user tu
            LEFT JOIN tb_user_akses tua ON 
                tua.id_user = tu.id
            WHERE
                tu.privillage NOT IN (0)
            GROUP BY 
                tu.id ,
                tu.id_pegawai ,
                tu.username ,
                tu.nama ,
                tu.password ,
                tu.email ,
                tu.privillage ,
                tu.is_active
        ";
        return $this->db->query($sql)->result();
    }

    public function get_pending_user()
    {
        $sql = "
            SELECT 
                tu.* 
            FROM 
                tb_user tu
            WHERE
                tu.privillage NOT IN (0)
                AND
                tu.is_active = 0
            ";
        return $this->db->query($sql)->result();
    }

    public function get_user($username, $password)
    {
        $sql = "
            SELECT 
                tu.* 
            FROM 
                tb_user tu
            WHERE 
                (                    
                    tu.username = ? 
                    OR
                    tu.email = ?
                )
                AND
                tu.password = ?
            LIMIT 1";
        $dataLogin = $this->db->query($sql, [$username, $username, $password])->row_array();
        return $dataLogin;
    }

    public function get_guest_user($username, $password)
    {
        $sql = "
            SELECT 
                tp.*,
                tu.username,
                tu.password
            FROM 
                tb_pegawai tp
            left join tb_user tu on
                tu.ID_PEGAWAI = tp.id
            WHERE
                (
                    TRIM(REPLACE(CONVERT(tp.nip USING utf8mb4), ' ', '')) = ?
                    OR
                    TRIM(REPLACE(CONVERT(tp.nip USING utf8mb4), ' ', '')) = ?
                )
                AND
                deleted_at IS NULL 
            LIMIT 1";

        $data = $this->db->query($sql, [$username, $password])->row_array();
        return $data;
    }

    public function get_user_by_username($username)
    {
        $sql = "
            SELECT 
                tu.* 
            FROM 
                tb_user tu
            WHERE 
                tu.username = ? 
            LIMIT 1";
        return $this->db->query($sql, [$username])->row_array();
    }

    public function get_user_by_id_pegawai($idPegawai)
    {
        $sql = "
            SELECT 
                tu.* 
            FROM 
                tb_user tu
            WHERE 
                tu.id_pegawai = ? 
            LIMIT 1";
        return $this->db->query($sql, [$idPegawai])->row();
    }
}
