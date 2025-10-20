<?php
function fix_strict_mode()
{
    $CI =& get_instance();
    if ($CI->db->conn_id) {
        // Set ulang sql_mode tanpa koma
        $CI->db->query("SET SESSION sql_mode='STRICT_ALL_TABLES'");
    }
}
