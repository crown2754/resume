# resume
履歷使用

請先設定環境變數
有隱藏 index.php 設置 .htaccess 及 base_url() 時要注意

.htaccess 內容
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d  
RewriteRule ^(.*)$ /index.php?/$1 [L]    

baseurl：
	http://127.0.0.1/


db:
https://github.com/crown2754/resume/blob/main/first_impot_sql
dbname：
	test
mysql_account：
	test
mysql_password：
	test@1234
db編碼：
	utf8mb4_general_ci

請先建立資料庫後再執行 first_import.sql 新建資料表內容
