CREATE or REPLACE VIEW vw_Resident AS
SELECT
    `rsdt`.`rsdt_id` AS `Resident ID`,
    CONCAT(
        `rsdt`.`l_name`,
        ', ',
        `rsdt`.`f_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '.'
    ) AS `Name`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`
    ) AS `Name_2`,
    `rsdt`.`gender` AS `Gender`,
    DATE_FORMAT(`rsdt`.`birthdate`, '%M %d, %Y') AS `Birthdate`,
    DATE_FORMAT(
        FROM_DAYS(
            TO_DAYS(CURRENT_TIMESTAMP()) - TO_DAYS(`rsdt`.`birthdate`)),
            '%Y'
        ) + 0 AS `Age`,
        `rsdt`.`birthplace` AS `Birthplace`,
        `rsdt`.`pr_contact` AS `Primary Contact Number`,
        `rsdt`.`sr_contact` AS `Secondary Contact Number`,
        `rsdt`.`cvl_status` AS `Civil Status`,
        `rsdt`.`citizenship` AS `Citizenship`,
        `rsdt`.`voter_status` AS `Voter Status`,
        `rsdt`.`occupation` AS `Occupation`,
        CONCAT(`rsdt`.`hs_num`, ' ', `rsdt`.`strt_name`) AS `Address`,
        DATE_FORMAT(`rsdt`.`regs_date`, '%M %d, %Y') AS `Registration Date`,
        `rsdt`.`rsdt_status` AS `Resident Status`,
        `rsdt`.`photo` AS `Photo`
    FROM
        `maya-maya_e_brgy_system`.`tbl_resident` `rsdt`;


CREATE or REPLACE VIEW vw_official AS
SELECT
    `ofcl`.`ofcl_id` AS `Official ID`,
    `rsdt`.`rsdt_id` AS `Resident ID`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Name`,
    `ofcl`.`position` AS `Position`,
    DATE_FORMAT(`ofcl`.`regs_date`, '%M %d, %Y') AS `Registration Date`,
    `ofcl`.`ofcl_status` AS `Status`,
    `ofcl`.`photo` AS `Photo`
FROM
    (
        `maya-maya_e_brgy_system`.`tbl_official` `ofcl`
    JOIN `maya-maya_e_brgy_system`.`tbl_resident` `rsdt`
    ON
        (`ofcl`.`resident` = `rsdt`.`rsdt_id`)
    );

SELECT
    `ofcl`.`ofcl_id` AS `Official ID`,
    `rsdt`.`rsdt_id` AS `Resident ID`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Name`,
    `ofcl`.`position` AS `Position`,
    DATE_FORMAT(`ofcl`.`regs_date`, '%M %d, %Y') AS `Registration Date`,
    `ofcl`.`ofcl_status` AS `Status`,
    `ofcl`.`photo` AS `Photo`
FROM
    (
        `maya-maya_e_brgy_system`.`tbl_official` `ofcl`
    JOIN `maya-maya_e_brgy_system`.`tbl_resident` `rsdt`
    ON
        (`ofcl`.`resident` = `rsdt`.`rsdt_id`)
    );


CREATE or REPLACE VIEW vw_accounts AS
SELECT
    `rsdt`.`rsdt_id` AS `Resident ID`,
    `acnt`.`acnt_id` AS `Account ID`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Name`,
    `acnt`.`user_type` AS `User Type`,
    DATE_FORMAT(`acnt`.`regs_date`, '%M %d, %Y') AS `Registration Date`,
    `acnt`.`username` AS `Username`,
    `acnt`.`password` AS `Password`,
    `acnt`.`online_status` AS `Online Status`,
    `acnt`.`status` AS `Status`
FROM
    (
        `maya-maya_e_brgy_system`.`tbl_account` `acnt`
    JOIN `maya-maya_e_brgy_system`.`tbl_resident` `rsdt`
    ON
        (
            `acnt`.`user_resident` = `rsdt`.`rsdt_id`
        )
    );


CREATE or REPLACE VIEW vw_activity_log AS
SELECT
    `aclg`.`aclg_id` AS `Log ID`,
    DATE_FORMAT(`aclg`.`date_time`, '%M %d, %Y') AS `Date`,
    DATE_FORMAT(`aclg`.`date_time`, '%h:%i %p') AS `Time`,
    `acnt`.`Account ID` AS `Account ID`,
    `acnt`.`Name` AS `User Name`,
    `acnt`.`User Type` AS `User Type`,
    `aclg`.`activity` AS `Activity`,
    `aclg`.`activity_status` AS `Status`
FROM
    (
        `maya-maya_e_brgy_system`.`tbl_activity_log` `aclg`
    JOIN `maya-maya_e_brgy_system`.`vw_accounts` `acnt`
    ON
        (
            `aclg`.`user_account` = `acnt`.`Account ID`
        )
    )
ORDER BY
    `aclg`.`date_time`
DESC;



    

