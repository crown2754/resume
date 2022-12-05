<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{

    private $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }

    function checkMailFormatStatus($email)
    {
        return preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email) ? true : false;
    }

    function checkPasswordLength($password)
    {
        if (mb_strlen($password) <= 6)
            return false;
        return true;
    }

    function readSql($file_name, $sql_vars)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/test/ci/application/models/sqls/' . $file_name;
        $str = "";
        if (file_exists($file_path))
            $str = file_get_contents($file_path);
        foreach ($sql_vars as $key => $value)
            $str = str_replace("{{" . $key . "}}", $value, $str);
        return $str;
    }

    function getAllPost($xss = true)
    {
        $sql_vars = [];
        foreach ($_POST as $key => $value)
            $sql_vars[$key] = $this->CI->input->post($key,$xss);
        return $sql_vars;
    }

    function doSqlAction($sqlfile, $sql_vars){
        $sql = $this->readSql($sqlfile, $sql_vars);
        return $this->CI->db->query($sql);
    }

}
