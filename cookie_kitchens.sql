SET sql_mode = "NO_AUTO_VALUE_ON_ZERO";SET time_zone = "+00:00"; 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */ 
; 
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */ 
; 
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */ 
; 
/*!40101 SET NAMES utf8 */ 
; 
-- 
-- Database: `cookie_kitchens` 
-- 
-- -------------------------------------------------------- 
-- 
-- Table structure for table `customers` 
--CREATE TABLEIF NOT EXISTS `customers` ( `customerid` int(15) NOT NULL auto_increment, `customerfirstname` varchar(255) NOT NULL, `customerlastname` varchar(255) NOT NULL, `customerpassword` varchar(255) NOT NULL, `customeraddress` varchar(255) NOT NULL, `customertelephone` varchar(15) NOT NULL, `customermobile` varchar(15) NOT NULL, `customerpostcode` varchar(255) NOT NULL, `customeremail` varchar(255) NOT NULL, PRIMARY KEY (`customerid`) ) engine=innodb DEFAULT charset=latin1 auto_increment=54 ;
-- 
-- Dumping data for table `customers` 
--INSERT INTO `customers` 
            ( 
                        `customerid`, 
                        `customerfirstname`, 
                        `customerlastname`, 
                        `customerpassword`, 
                        `customeraddress`, 
                        `customertelephone`, 
                        `customermobile`, 
                        `customerpostcode`, 
                        `customeremail` 
            ) 
            VALUES 
            ( 
                        1, 
                        'Cole', 
                        'Tucker', 
                        '123', 
                        '776 Bibendum St.', 
                        '0800 842 4930', 
                        '056 1231 1907', 
                        'L5H 5Y7', 
                        'dignissim.lacus@ipsumportaelit.edu' 
            ) 
            , 
            ( 
                        2, 
                        'Conner', 
                        'Bailey', 
                        '123', 
                        '1032215CursusRd', 
                        '09086837087', 
                        '01915546595', 
                        '3367', 
                        'nisiNullamcom' 
            ) 
            , 
            ( 
                        3, 
                        'Illana', 
                        'Stewart', 
                        '123', 
                        'P.O. Box 911, 8454 Tincidunt Road', 
                        '(01966) 121383', 
                        '0800 1111', 
                        '55490', 
                        'et@libero.net' 
            ) 
            , 
            ( 
                        5, 
                        'Charlotte', 
                        'Johnston', 
                        '123', 
                        'Ap #473-6959 Aenean Street', 
                        '07500 242623', 
                        '0800 1111', 
                        '7542', 
                        'auctor.velit.eget@nunc.org' 
            ) 
            , 
            ( 
                        6, 
                        'Brynn', 
                        'Miller', 
                        '123', 
                        '3928 Sodales Avenue', 
                        '0500 932260', 
                        '0997 710 8127', 
                        '38362', 
                        'accumsan@sit.com' 
            ) 
            , 
            ( 
                        7, 
                        'Keegan', 
                        'Cantrell', 
                        '123', 
                        'P.O. Box 299, 767 At Rd.', 
                        '0305 531 4923', 
                        '07624 863417', 
                        '70142', 
                        'magna.Praesent@nibhlacinia.edu' 
            ) 
            , 
            ( 
                        8, 
                        'Neville', 
                        'Hardin', 
                        '123', 
                        '2148 Mauris St.', 
                        '(022) 7697 8722', 
                        '07509 508304', 
                        'K5S 2N6', 
                        'ac.nulla.In@vitaealiquam.edu' 
            ) 
            , 
            ( 
                        9, 
                        'Yoshi', 
                        'Aguilar', 
                        '123', 
                        '313-6678 Ultrices Road', 
                        '(0119) 074 8838', 
                        '(01346) 830113', 
                        '86669', 
                        'gravida.sagittis@velnislQuisque.edu' 
            ) 
            , 
            ( 
                        10, 
                        'Howard', 
                        'Guerra', 
                        '123', 
                        'P.O. Box 864, 7446 Duis Street', 
                        '0884 793 4317', 
                        '0997 608 5325', 
                        '21001', 
                        'aliquet@sit.net' 
            ) 
            , 
            ( 
                        11, 
                        'Dalton', 
                        'Hicks', 
                        '123', 
                        '591-6743 Nec St.', 
                        '076 3010 3689', 
                        '(01100) 235264', 
                        '39240', 
                        'et.rutrum@metus.edu' 
            ) 
            , 
            ( 
                        12, 
                        'Prescott', 
                        'Brooks', 
                        '123', 
                        'Ap #561-2409 Mauris Av.', 
                        '(01967) 42804', 
                        '(017457) 63246', 
                        '7968', 
                        'pede@enimmi.edu' 
            ) 
            , 
            ( 
                        13, 
                        'Lance', 
                        'Newman', 
                        '123', 
                        '9737 Faucibus Av.', 
                        '0828 374 9131', 
                        '0800 1111', 
                        '18802', 
                        'consectetuer.mauris.id@faucibuslectusa.net' 
            ) 
            , 
            ( 
                        14, 
                        'Maxwell', 
                        'Alvarez', 
                        '123', 
                        '841-4723 Aliquam Road', 
                        '0809 559 4711', 
                        '(022) 5111 8850', 
                        '8117RJ', 
                        'rutrum.Fusce@tortornibhsit.net' 
            ) 
            , 
            ( 
                        15, 
                        'Amanda', 
                        'Farmer', 
                        '123', 
                        'P.O. Box 447, 8188 Ut Street', 
                        '0397 192 1157', 
                        '056 3312 4017', 
                        '43102', 
                        'Nunc@enimconsequatpurus.org' 
            ) 
            , 
            ( 
                        16, 
                        'Erich', 
                        'Jarvis', 
                        '123', 
                        'Ap #859-6019 Sed St.', 
                        '(01803) 79302', 
                        '0845 46 46', 
                        '40511', 
                        'dui@etnetus.co.uk' 
            ) 
            , 
            ( 
                        17, 
                        'Rigel', 
                        'Rios', 
                        '123', 
                        'P.O. Box 165, 1293 Sed, Rd.', 
                        '(016895) 00039', 
                        '0845 46 44', 
                        '5944', 
                        'imperdiet.erat@netus.org' 
            ) 
            , 
            ( 
                        18, 
                        'Cara', 
                        'Mcdaniel', 
                        '123', 
                        '505 Nunc St.', 
                        '0800 283683', 
                        '(0111) 774 0712', 
                        '88259', 
                        'Donec.felis@nunc.org' 
            ) 
            , 
            ( 
                        19, 
                        'Latifah', 
                        'Berry', 
                        '123', 
                        '9297 Nulla. Street', 
                        '(01510) 644554', 
                        '0800 059034', 
                        '1933', 
                        'morbi@felispurus.org' 
            ) 
            , 
            ( 
                        20, 
                        'Carl', 
                        'Shelton', 
                        '123', 
                        '332-5976 Eu St.', 
                        '0800 767 4083', 
                        '056 5526 3047', 
                        '8451', 
                        'Mauris.non.dui@bibendumfermentum.net' 
            ) 
            , 
            ( 
                        21, 
                        'Hope', 
                        'Underwood', 
                        '123', 
                        '5933 Pellentesque Street', 
                        '(0171) 426 2226', 
                        '(01582) 19663', 
                        '851069', 
                        'mi@Maurisquis.ca' 
            ) 
            , 
            ( 
                        22, 
                        'Tatiana', 
                        'Oneal', 
                        '123', 
                        '1699 Magna St.', 
                        '(016977) 9637', 
                        '0800 541500', 
                        'P6B 7SH', 
                        'egestas.nunc@turpisegestas.edu' 
            ) 
            , 
            ( 
                        23, 
                        'Kirby', 
                        'Yang', 
                        '123', 
                        'P.O. Box 446, 8754 Bibendum. St.', 
                        '07386 746321', 
                        '0500 831052', 
                        '3794', 
                        'cursus.purus.Nullam@tinciduntpedeac.org' 
            ) 
            , 
            ( 
                        24, 
                        'Deirdre', 
                        'Weiss', 
                        '123', 
                        '410-4915 Ullamcorper St.', 
                        '0800 1111', 
                        '076 0352 9829', 
                        '5877', 
                        'pretium@egestasrhoncusProin.org' 
            ) 
            , 
            ( 
                        25, 
                        'Mufutau', 
                        'Ballard', 
                        '123', 
                        'P.O. Box 174, 5976 Risus, Av.', 
                        '0800 1111', 
                        '056 3198 0677', 
                        '2077', 
                        'lorem.ut@commodohendrerit.ca' 
            ) 
            , 
            ( 
                        26, 
                        'Kim', 
                        'Hendricks', 
                        '123', 
                        '1279 Et Avenue', 
                        '0845 46 46', 
                        '(016977) 5875', 
                        '70055-393', 
                        'arcu.et.pede@luctusetultrices.ca' 
            ) 
            , 
            ( 
                        27, 
                        'Patricia', 
                        'Kelly', 
                        '123', 
                        '826-6402 Red St.', 
                        '(01215) 32483', 
                        '(01509) 65858', 
                        '40295', 
                        'nascetur.ridiculus.mus@In.ca' 
            ) 
            , 
            ( 
                        28, 
                        'Hanna', 
                        'Molina', 
                        '123', 
                        '990-8585 Penatibus Rd.', 
                        '076 2200 3126', 
                        '0845 46 41', 
                        '73491', 
                        'in@Nuncsollicitudin.com' 
            ) 
            , 
            ( 
                        29, 
                        'Quinlan', 
                        'Burnett', 
                        '123', 
                        'Ap #740-1760 Quis Rd.', 
                        '(019343) 08172', 
                        '(0119) 365 7724', 
                        '41056-037', 
                        'malesuada.fames@sempercursus.org' 
            ) 
            , 
            ( 
                        30, 
                        'Benjamin', 
                        'White', 
                        '123', 
                        '648-7373 Vulputate, Ave', 
                        '056 8198 6615', 
                        '(019472) 80792', 
                        '6682', 
                        'vel.faucibus.id@velitQuisquevarius.ca' 
            ) 
            , 
            ( 
                        31, 
                        'Michelle', 
                        'Pierce', 
                        '123', 
                        'P.O. Box 465, 604 Nulla St.', 
                        '0845 46 48', 
                        '0800 1111', 
                        '12525', 
                        'nec@magnamalesuada.edu' 
            ) 
            , 
            ( 
                        32, 
                        'Reed', 
                        'Watson', 
                        '123', 
                        'P.O. Box 598, 8590 Mauris Rd.', 
                        '(01585) 61590', 
                        '0500 482992', 
                        '12997', 
                        'nec@lacus.ca' 
            ) 
            , 
            ( 
                        33, 
                        'Kylynn', 
                        'Rose', 
                        '123', 
                        '665-8994 Lectus Rd.', 
                        '076 1430 4472', 
                        '0969 908 0293', 
                        '8691', 
                        'metus.Aenean@eueuismodac.net' 
            ) 
            , 
            ( 
                        34, 
                        'Zorita', 
                        'Williamson', 
                        '123', 
                        '120-4611 Aliquam St.', 
                        '0800 728429', 
                        '(0114) 618 2550', 
                        '6428', 
                        'Praesent@dolorsit.net' 
            ) 
            , 
            ( 
                        35, 
                        'Baxter', 
                        'Mays', 
                        '123', 
                        '1681 Enim, Street', 
                        '(0119) 157 1207', 
                        '(01944) 714557', 
                        '43292-863', 
                        'massa.Vestibulum.accumsan@elit.edu' 
            ) 
            , 
            ( 
                        36, 
                        'James', 
                        'Bell', 
                        '123', 
                        '657-6753 Malesuada. Ave', 
                        '0993 177 9218', 
                        '055 6607 0927', 
                        'CZ0 3CP', 
                        'elementum.purus.accumsan@odiotristiquepharetra.edu' 
            ) 
            , 
            ( 
                        37, 
                        'Noelani', 
                        'Kirkland', 
                        '123', 
                        'P.O. Box 988, 5287 Luctus Road', 
                        '070 2442 0802', 
                        '0500 697971', 
                        '00327', 
                        'ultrices.sit@convallis.co.uk' 
            ) 
            , 
            ( 
                        38, 
                        'Ora', 
                        'Morrison', 
                        '123', 
                        'Ap #160-4045 Varius Rd.', 
                        '(0181) 009 3170', 
                        '(0141) 485 6648', 
                        '05284', 
                        'laoreet.lectus@Seddictum.com' 
            ) 
            , 
            ( 
                        39, 
                        'Guy', 
                        'Bishop', 
                        '123', 
                        'Ap #576-8571 Tellus Street', 
                        '0847 925 3526', 
                        '055 9962 1794', 
                        '1154', 
                        'vel.quam@Phasellus.co.uk' 
            ) 
            , 
            ( 
                        40, 
                        'Omar', 
                        'Jordan', 
                        '123', 
                        'Ap #884-3978 Non Avenue', 
                        '0500 621432', 
                        '0374 652 7123', 
                        '71162', 
                        'sapien.imperdiet@fames.org' 
            ) 
            , 
            ( 
                        50, 
                        'Kelly', 
                        'Devlin', 
                        'craigispro', 
                        'I dont know', 
                        '100101001', 
                        '102012031', 
                        'B23k64', 
                        'Kellyisanoob@craiig.com' 
            ) 
            , 
            ( 
                        51, 
                        'Zeri', 
                        'Verve', 
                        '231564', 
                        'no', 
                        'plsno', 
                        'ohgodno', 
                        'no', 
                        'mramirez6164@gmail.com' 
            ) 
            , 
            ( 
                        52, 
                        'Craig', 
                        'lol', 
                        'gains', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol' 
            ) 
            , 
            ( 
                        53, 
                        'Gains', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol', 
                        'lol' 
            ); 

-- -------------------------------------------------------- 
-- 
-- Table structure for table `orders` 
--CREATE TABLEIF NOT EXISTS `orders` ( `orderid` int(11) NOT NULL auto_increment, `items` varchar(255) NOT NULL, `customerid` int(11) NOT NULL, `payment` varchar(255) NOT NULL, `date` varchar(255) NOT NULL, `total` int(255) NOT NULL, PRIMARY KEY (`orderid`) ) engine=innodb DEFAULT charset=latin1 auto_increment=10 ;
-- 
-- Dumping data for table `orders` 
--INSERT INTO `orders` 
            ( 
                        `orderid`, 
                        `items`, 
                        `customerid`, 
                        `payment`, 
                        `date`, 
                        `total` 
            ) 
            VALUES 
            ( 
                        1, 
                        'cake and knife', 
                        3, 
                        'paypal', 
                        '333', 
                        123 
            ) 
            , 
            ( 
                        2, 
                        ' Item: Sink- Quantity: 1, ', 
                        1, 
                        'paypal', 
                        '2014-06-10', 
                        100 
            ) 
            , 
            ( 
                        3, 
                        ' Item: Table - Quantity: 1  Item: Toaster - Quantity: 1  Item: Drawers - Quantity: 1  Item: Blender - Quantity: 1 ',
                        1, 
                        'cash', 
                        '2014-06-10', 
                        96 
            ) 
            , 
            ( 
                        4, 
                        ' Item: Grill - Quantity: 1  Item: Unit - Quantity: 1  Item: Table - Quantity: 1 ',
                        1, 
                        'paypal', 
                        '2014-06-12', 
                        217 
            ) 
            , 
            ( 
                        5, 
                        ' Item: Grill - Quantity: 1  Item: Unit - Quantity: 1  Item: Table - Quantity: 1 ',
                        1, 
                        'cash', 
                        '2014-06-12', 
                        217 
            ) 
            , 
            ( 
                        6, 
                        ' Item: Drawers - Quantity: 1 ', 
                        1, 
                        'paypal', 
                        '2014-06-12', 
                        11 
            ) 
            , 
            ( 
                        7, 
                        ' Item: Table - Quantity: 1 ', 
                        50, 
                        'cash', 
                        '2014-06-12', 
                        40 
            ) 
            , 
            ( 
                        8, 
                        ' Item: Tv - Quantity: 1  Item: Fan - Quantity: 1 ', 
                        50, 
                        'cash', 
                        '2014-06-12', 
                        190 
            ) 
            , 
            ( 
                        9, 
                        ' Item: Table - Quantity: 1 ', 
                        1, 
                        'cash', 
                        '2014-06-23', 
                        40 
            ); 

-- -------------------------------------------------------- 
-- 
-- Table structure for table `products` 
--CREATE TABLEIF NOT EXISTS `products` ( `itemid` int(11) NOT NULL auto_increment, `itemdesc` varchar(255) NOT NULL, `itemstock` int(255) NOT NULL, `itemcost` decimal(30,0) NOT NULL, `supplierid` int(11) NOT NULL, PRIMARY KEY (`itemid`), KEY `supplierid` (`supplierid`) ) engine=innodb DEFAULT charset=latin1 auto_increment=15 ;
-- 
-- Dumping data for table `products` 
--INSERT INTO `products` 
            ( 
                        `itemid`, 
                        `itemdesc`, 
                        `itemstock`, 
                        `itemcost`, 
                        `supplierid` 
            ) 
            VALUES 
            ( 
                        1, 
                        'Table', 
                        10, 
                        40, 
                        7 
            ) 
            , 
            ( 
                        2, 
                        'Sink', 
                        9, 
                        100, 
                        4 
            ) 
            , 
            ( 
                        3, 
                        'Cooker', 
                        3, 
                        89, 
                        4 
            ) 
            , 
            ( 
                        4, 
                        'Toaster', 
                        2, 
                        12, 
                        4 
            ) 
            , 
            ( 
                        5, 
                        'Bin', 
                        55, 
                        14, 
                        5 
            ) 
            , 
            ( 
                        6, 
                        'Lights', 
                        5, 
                        6, 
                        2 
            ) 
            , 
            ( 
                        7, 
                        'Drawers', 
                        5, 
                        11, 
                        1 
            ) 
            , 
            ( 
                        8, 
                        'Door', 
                        25, 
                        74, 
                        2 
            ) 
            , 
            ( 
                        9, 
                        'Grill', 
                        55, 
                        33, 
                        3 
            ) 
            , 
            ( 
                        10, 
                        'Lights 2', 
                        71, 
                        44, 
                        4 
            ) 
            , 
            ( 
                        11, 
                        'Tv', 
                        73, 
                        142, 
                        5 
            ) 
            , 
            ( 
                        12, 
                        'Unit', 
                        21, 
                        144, 
                        1 
            ) 
            , 
            ( 
                        13, 
                        'Fan', 
                        55, 
                        48, 
                        2 
            ) 
            , 
            ( 
                        14, 
                        'Blender', 
                        2, 
                        33, 
                        5 
            ); 

-- -------------------------------------------------------- 
-- 
-- Table structure for table `staff` 
--CREATE TABLEIF NOT EXISTS `staff` ( `id` int(30) NOT NULL auto_increment, `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL, `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL, `access` int(1) NOT NULL, PRIMARY KEY (`id`) ) engine=innodb DEFAULT charset=utf8 COLLATE=utf8_unicode_ci auto_increment=18 ;
-- 
-- Dumping data for table `staff` 
--INSERT INTO `staff` 
            ( 
                        `id`, 
                        `username`, 
                        `password`, 
                        `access` 
            ) 
            VALUES 
            ( 
                        1, 
                        'Deborah', 
                        '4768', 
                        3 
            ) 
            , 
            ( 
                        2, 
                        'Mark', 
                        '2345', 
                        1 
            ) 
            , 
            ( 
                        5, 
                        'Ross', 
                        '5555', 
                        2 
            ) 
            , 
            ( 
                        16, 
                        'Craig', 
                        '1234', 
                        1 
            ) 
            , 
            ( 
                        17, 
                        'Diana', 
                        '3333', 
                        2 
            ); 

-- -------------------------------------------------------- 
-- 
-- Table structure for table `suppliers` 
--CREATE TABLEIF NOT EXISTS `suppliers` ( `supplierid` int(11) NOT NULL, `suppliername` varchar(255) NOT NULL, `supplieraddress` varchar(255) NOT NULL, `supplierpostcode` varchar(255) NOT NULL, `suppliercontact` varchar(255) NOT NULL, `suppliertelephone` varchar(255) NOT NULL, `supplieremail` varchar(255) NOT NULL, PRIMARY KEY (`supplierid`) ) engine=innodb DEFAULT charset=latin1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */ 
; 
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */ 
; 
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */ 
;