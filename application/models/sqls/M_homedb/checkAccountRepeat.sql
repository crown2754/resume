SELECT
    COUNT(account) AS account_count
FROM
    account_info
WHERE
    account = '{{account}}';