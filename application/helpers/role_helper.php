<?php
function role_user($id)
{
    $name_role = null;
    switch ($id) {
        case 1:
            $name_role = 'Admin';
            break;
        case 2:
            $name_role = 'Siswa';
            break;
        default:
            $name_role = 'Kepala Sekolah';
            break;
    }

    return $name_role;
}
