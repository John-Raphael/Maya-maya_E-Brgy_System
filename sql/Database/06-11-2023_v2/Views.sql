CREATE VIEW `vw_resident` AS SELECT
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
        `rsdt`.`photo` AS `Photo`,
        `rsdt`.`f_name` AS `f_name`,
        `rsdt`.`m_name` AS `m_name`,
        `rsdt`.`l_name` AS `l_name`,
        `rsdt`.`ext_name` AS `ext_name`,
        `rsdt`.`hs_num` AS `hs_num`,
        `rsdt`.`strt_name` AS `strt_name`
    FROM
        `tbl_resident` AS `rsdt`;

CREATE VIEW `vw_accounts` AS SELECT
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
    `rsdt`.`photo` AS `Photo`,
    `acnt`.`status` AS `Status`
FROM
    (
        `tbl_account` `acnt`
    JOIN `tbl_resident` `rsdt` ON
        (
            `acnt`.`user_resident` = `rsdt`.`rsdt_id`
        )
    );


CREATE VIEW `vw_activity_log` AS SELECT
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
        `tbl_activity_log` `aclg`
    JOIN `vw_accounts` `acnt` ON
        (
            `aclg`.`user_account` = `acnt`.`Account ID`
        )
    )
ORDER BY
    `aclg`.`date_time` DESC;


CREATE VIEW `vw_blotters` AS SELECT
    `bltr`.`bltr_id` AS `Blotter ID`,
    DATE_FORMAT(`bltr`.`bltr_date`, '%M %d, %Y') AS `Blotter Date`,
    DATE_FORMAT(`bltr`.`bltr_date`, '%h:%i %p') AS `Blotter Time`,
    `bltr`.`comp_name` AS `Comp Name`,
    `bltr`.`comp_name_address` AS `Comp Name Address`,
    `bltr`.`comp_person` AS `Comp Person`,
    `bltr`.`comp_person_address` AS `Comp Person Address`,
    `bltr`.`description` AS `Description`,
    `bltr`.`regs_by` AS `Official ID`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Registered By`,
    DATE_FORMAT(`bltr`.`date_settled`, '%M %d, %Y') AS `Date Settled`,
    `bltr`.`status` AS `Status`
FROM
    (
        `tbl_blotter` `bltr`
    JOIN `tbl_resident` `rsdt` ON
        (`bltr`.`regs_by` = `rsdt`.`rsdt_id`)
    )
ORDER BY
    `bltr`.`bltr_date` DESC;


CREATE VIEW `vw_incident` AS SELECT
    `incd`.`incd_id` AS `Incident ID`,
    DATE_FORMAT(`incd`.`incd_date_time`, '%M %d, %Y') AS `Incident Date`,
    DATE_FORMAT(`incd`.`incd_date_time`, '%h:%i %p') AS `Incident Time`,
    `incd`.`victim_name` AS `Victim Name`,
    `incd`.`victim_address` AS `Victim Address`,
    `incd`.`incd_location` AS `Incident Address`,
    `incd`.`description` AS `Description`,
    `incd`.`regs_by` AS `Official ID`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Registered By`,
    DATE_FORMAT(`incd`.`date_settled`, '%M %d, %Y') AS `Date Settled`,
    `incd`.`status` AS `Status`
FROM
    (
        `tbl_incident` `incd`
    JOIN `tbl_resident` `rsdt` ON
        (`incd`.`regs_by` = `rsdt`.`rsdt_id`)
    )
ORDER BY
    `incd`.`incd_date_time` DESC;


CREATE VIEW `vw_item` AS SELECT
    `item`.`item_id` AS `Item ID`,
    `item`.`name` AS `Name`,
    `item`.`description` AS `Description`,
    `item`.`updated_qty` AS `Current Qty`,
    `item`.`original_qty` AS `Original Qty`,
    CONCAT(
        `rsdt`.`f_name`,
        ' ',
        LEFT(`rsdt`.`m_name`, 1),
        '. ',
        `rsdt`.`l_name`,
        ' ',
        `rsdt`.`ext_name`,
        ' '
    ) AS `Registered by`,
    DATE_FORMAT(`item`.`regs_date`, '%M %d, %Y') AS `Registration Date`,
    `item`.`status` AS `Status`
FROM
    (
        `tbl_item` `item`
    JOIN `tbl_resident` `rsdt` ON
        (`item`.`regs_by` = `rsdt`.`rsdt_id`)
    )
ORDER BY
    `item`.`name` ASC;


CREATE VIEW `vw_item_history` AS SELECT
    `iths`.`iths_id` AS `History ID`,
    DATE_FORMAT(`iths`.`borrowed_date`, '%M %d, %Y') AS `Borrowed Date`,
    DATE_FORMAT(`iths`.`borrowed_date`, '%h:%i %p') AS `Borrowed Time`,
    `iths`.`item` AS `Item ID`,
    `item`.`name` AS `Name`,
    `item`.`description` AS `Description`,
    `item`.`updated_qty` AS `Item Qty`,
    `iths`.`qty` AS `Borrowed Qty`,
    `iths`.`purpose` AS `Purpose`,
    CONCAT(
        `brwd`.`f_name`,
        ' ',
        LEFT(`brwd`.`m_name`, 1),
        '. ',
        `brwd`.`l_name`,
        ' ',
        `brwd`.`ext_name`,
        ' '
    ) AS `Borrowed by`,
    CONCAT(
        `brf`.`f_name`,
        ' ',
        LEFT(`brf`.`m_name`, 1),
        '. ',
        `brf`.`l_name`,
        ' ',
        `brf`.`ext_name`,
        ' '
    ) AS `Borrowed from`,
    CONCAT(
        `rtnd`.`f_name`,
        ' ',
        LEFT(`rtnd`.`m_name`, 1),
        '. ',
        `rtnd`.`l_name`,
        ' ',
        `rtnd`.`ext_name`,
        ' '
    ) AS `Returned by`,
    DATE_FORMAT(`iths`.`returned_date`, '%M %d, %Y') AS `Returned Date`,
    DATE_FORMAT(`iths`.`returned_date`, '%h:%i %p') AS `Returned Time`,
    CONCAT(
        `rtt`.`f_name`,
        ' ',
        LEFT(`rtt`.`m_name`, 1),
        '. ',
        `rtt`.`l_name`,
        ' ',
        `rtt`.`ext_name`,
        ' '
    ) AS `Returned to`,
    `iths`.`status` AS `Status`
FROM
    (
        (
            (
                (
                    (
                        `tbl_item_history` `iths`
                    JOIN `tbl_item` `item` ON
                        (`iths`.`item` = `item`.`item_id`)
                    )
                JOIN `tbl_resident` `brwd` ON
                    (
                        `iths`.`borrowed_by` = `brwd`.`rsdt_id`
                    )
                )
            JOIN `tbl_resident` `brf` ON
                (
                    `iths`.`borrowed_from` = `brf`.`rsdt_id`
                )
            )
        LEFT JOIN `tbl_resident` `rtnd` ON
            (
                `iths`.`returned_by` = `rtnd`.`rsdt_id`
            )
        )
    LEFT JOIN `tbl_resident` `rtt` ON
        (`iths`.`returned_to` = `rtt`.`rsdt_id`)
    )
ORDER BY
    `iths`.`borrowed_date` DESC;


CREATE VIEW `vw_official` AS SELECT
    `ofcl`.`ofcl_id` AS `Official ID`,
    `rsdt`.`rsdt_id` AS `Resident ID`,
    `ofcl`.`rank` AS `Rank`,
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
    DATE_FORMAT(`ofcl`.`regs_date`, '%Y') AS `Year`,
    `ofcl`.`ofcl_status` AS `Status`,
    `ofcl`.`photo` AS `Photo`
FROM
    (
        `tbl_official` `ofcl`
    JOIN `tbl_resident` `rsdt` ON
        (`ofcl`.`resident` = `rsdt`.`rsdt_id`)
    )
ORDER BY
    `ofcl`.`rank` ASC;

