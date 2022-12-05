<?php

class M_homedb extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("Asia/Taipei");
    }

    function registerAccount()
    {
        $post_vars = $this->auth->getAllPost();
        echo $this->getRegisterAccountStatus($post_vars);
        if ($this->getRegisterAccountStatus($post_vars) == '1')
            $this->doRegisterAccountAction($post_vars);
    }

    function getRegisterAccountStatus($post_vars)
    {
        if (empty($post_vars['account']))
            return '2';
        if (empty($post_vars['name']))
            return '3';
        if (!isset($post_vars['sex']))
            return '4';
        if (empty($post_vars['birthday']))
            return '5';
        if (empty($post_vars['email']))
            return '6';
        // if (empty($post_vars['note']))
        //     return '7';
        if (!$this->checkMailFormatStatus($post_vars))
            return '8';
        if (!$this->checkAccountFormat($post_vars))
            return '9';
        if ($this->checkAccountRepeat($post_vars))
            return '10';
        return '1';
    }

    function checkAccountFormat($post_vars)
    {
        if (preg_match('/(?=.*[a-z])(?=.*[0-9])[a-z0-9]/', $post_vars['account']) || preg_match('/(?=.*[A-Z])(?=.*[0-9])[A-Z0-9]/', $post_vars['account']))
            return true;
        return false;
    }

    function checkAccountRepeat($post_vars)
    {
        $sql = "
            SELECT
                *
            FROM
                account_info
            WHERE
                LOWER(account) = '" . strtolower($post_vars['account']) . "';
        ";
        $query = $this->db->query($sql);
        return $query->num_rows() > 0 ? true : false;
    }

    function checkMailFormatStatus($post_vars)
    {
        return preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $post_vars['email']) ? true : false;
    }

    function doRegisterAccountAction($post_vars)
    {
        $sql = "
            INSERT INTO
                account_info (
                    account,
                    name,
                    sex,
                    birthday,
                    email,
                    note
                )
            VALUES
                (
                '" . strtolower($post_vars['account']) . "',
                '" . $post_vars['name'] . "',
                '" . $post_vars['sex'] . "',
                '" . $post_vars['birthday'] . "',
                '" . $post_vars['email'] . "',
                '" . $post_vars['note'] . "'
            );
        ";
        $this->db->query($sql);
    }

    function login()
    {
        $post_vars = $this->auth->getAllPost();
        echo $this->getLoginStatus($post_vars);
        if ($this->getLoginStatus($post_vars) == '1')
            $this->setLoginSession($post_vars);
    }

    function getLoginStatus($post_vars)
    {
        if (empty($post_vars['account']))
            return '2';
        if (!$this->checkAccountRepeat($post_vars))
            return '3';
        return '1';
    }

    function setLoginSession($post_vars)
    {
        $_SESSION['account'] = $post_vars['account'];
    }

    function showError()
    {
        echo "發生錯誤！";
    }

    function loadAllDetails()
    {
        $sql = "
            SELECT
                *,
                SUBSTR(birthday,1,4) AS birthday_y,
                SUBSTR(birthday,6,2) AS birthday_m,
                SUBSTR(birthday,9,2) AS birthday_d
            FROM account_info
        ";
        $query = $this->db->query($sql);
        $pram = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $pram[] = array(
                    'account_info_seq' => $row['account_info_seq'],
                    'account' => $row['account'],
                    'name' => $row['name'],
                    'sex' => $row['sex'],
                    'birthday' => $row['birthday'],
                    'birthday_y' => $row['birthday_y'],
                    'birthday_m' => $row['birthday_m'],
                    'birthday_d' => $row['birthday_d'],
                    'email' => $row['email'],
                    'note' => $row['note']
                );
            }
        }
        echo json_encode($pram, JSON_UNESCAPED_UNICODE);
    }

    function delAccount()
    {
        $post_vars = $this->auth->getAllPost();
        $sql = "
            DELETE FROM account_info
            WHERE account_info_seq = '" . $post_vars['account_info_seq'] . "'
        ";
        $this->db->query($sql);
    }

    function delDetails()
    {
        $post_vars = $this->auth->getAllPost();
        foreach ($post_vars['account_info_seq_arr'] as $row) {
            $sql = "
                DELETE FROM account_info
                WHERE account_info_seq = '" . $row . "'
            ";
            $this->db->query($sql);
        }
        echo "1";
    }

    function outputDetails()
    {
        $post_vars = $this->auth->getAllPost();
        foreach ($post_vars['account_info_seq_arr'] as $row)
            $post_vars['account_info_seqs'] .= "'" . $row . "',";
        $post_vars['account_info_seqs'] = rtrim($post_vars['account_info_seqs'], ",");
        $sql = "
            SELECT
                *
            FROM account_info
            WHERE account_info_seq IN (" . $post_vars['account_info_seqs'] . ");
        ";
        $query = $this->db->query($sql);
        $str = "";
        foreach ($query->result() as $row) {
            $str .= $row->account_info_seq . ",";
            $str .= $row->account . ",";
            $str .= $row->name . ",";
            $str .= $row->sex . ",";
            $str .= $row->birthday . ",";
            $str .= $row->email . ",";
            $str .= $row->note . ",\n";
        }
        echo $str;
    }

    function updateAccount()
    {
        $post_vars = $this->auth->getAllPost();
        $sql = "
            UPDATE account_info SET
                name = '" . $post_vars['name'] . "',
                sex = '" . $post_vars['sex'] . "',
                birthday = '" . $post_vars['birthday'] . "',
                email = '" . $post_vars['email'] . "',
                note = '" . $post_vars['note'] . "'
            WHERE account_info_seq IN (" . $post_vars['account_info_seq'] . ");
        ";
        $this->db->query($sql);
        echo "1";
    }

    function updateAccount2()
    {
        $post_vars = $this->auth->getAllPost();
        $sql = "
            UPDATE account_info SET
                name = '" . $post_vars['name'] . "',
                sex = '" . $post_vars['sex'] . "',
                birthday = '" . $post_vars['birthday'] . "',
                email = '" . $post_vars['email'] . "',
                note = '" . $post_vars['note'] . "'
            WHERE account_info_seq IN (" . $post_vars['account_info_seq'] . ");
        ";
        $this->db->query($sql);
    }
}
