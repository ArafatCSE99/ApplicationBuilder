
    CREATE TABLE IF NOT EXISTS company_info (
      `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       userid int(10), 
    company_name Text(200), 
    phone_no Text(200), 
    company_address Text(200),
`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
