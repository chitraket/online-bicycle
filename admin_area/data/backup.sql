DROP TABLE accessories;

CREATE TABLE `accessories` (
  `accessories_id` int(11) NOT NULL AUTO_INCREMENT,
  `accessories_brand` text NOT NULL,
  `accessories_category` text NOT NULL,
  `accessories_name` text NOT NULL,
  `accessories_image_1` text NOT NULL,
  `accessories_image_2` text NOT NULL,
  `accessories_image_3` text NOT NULL,
  `accessories_image_4` text NOT NULL,
  `accessories_qty` text NOT NULL,
  `available_qty` text NOT NULL,
  `accessories_material` text NOT NULL,
  `accessories_color` text NOT NULL,
  `accessories_prices` text NOT NULL,
  `accessories_discount_price` text NOT NULL,
  `accessories_discount` text NOT NULL,
  `accessories_label` text NOT NULL,
  `accessories_date` date NOT NULL,
  `accessories_desc` text NOT NULL,
  `accessories_status_top` text NOT NULL,
  `accessories_status` text NOT NULL,
  PRIMARY KEY (`accessories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO accessories VALUES("5","5","8","x","boys-Puffer-Coat-With-Detachable-Hood-1.jpg","boys-Puffer-Coat-With-Detachable-Hood-2.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","2","1","2","2","20000","343456","23","new","2020-04-08","2","yes","yes");
INSERT INTO accessories VALUES("4","5","1","amansss","boys-Puffer-Coat-With-Detachable-Hood-1.jpg","boys-Puffer-Coat-With-Detachable-Hood-2.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","12","12","2","2","20000","40","100000","new","2020-04-05","2","yes","yes");



DROP TABLE accessories_brand;

CREATE TABLE `accessories_brand` (
  `accessories_brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `accessories_brand` text NOT NULL,
  `accessories_brand_top` text NOT NULL,
  `accessories_brand_status` text NOT NULL,
  PRIMARY KEY (`accessories_brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO accessories_brand VALUES("5","aman","yes","yes");



DROP TABLE accessories_category;

CREATE TABLE `accessories_category` (
  `accessories_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `accessories_category` text NOT NULL,
  `accessories_category_top` text NOT NULL,
  `accessories_category_status` text NOT NULL,
  PRIMARY KEY (`accessories_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO accessories_category VALUES("1","car","yes","yes");
INSERT INTO accessories_category VALUES("8","mans","yes","yes");
INSERT INTO accessories_category VALUES("7","man","yes","yes");



DROP TABLE admins;

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO admins VALUES("2","chitraket","chitraketsavani@gmail.com","chit9125","tatiana-saphira.jpg","Indonesia","2222-2222-2222");



DROP TABLE boxes_section;

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL AUTO_INCREMENT,
  `box_icon` text NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO boxes_section VALUES("16","back-2","sdfg","sdfvgb");
INSERT INTO boxes_section VALUES("17","arc","asdfg","asdfg");



DROP TABLE categories;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_status` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("1","5-8","yes","yes");
INSERT INTO categories VALUES("3","2-5","yes","yes");



DROP TABLE city;

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `country_id` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO city VALUES("1","Karachi","1");
INSERT INTO city VALUES("2","Lahore","1");
INSERT INTO city VALUES("3","Jeddah","2");
INSERT INTO city VALUES("4","Riyadh","2");
INSERT INTO city VALUES("5","London","3");
INSERT INTO city VALUES("6","Liverpool","3");



DROP TABLE country;

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO country VALUES("1","Pakistan");
INSERT INTO country VALUES("2","Saudi Arabia");
INSERT INTO country VALUES("3","United Kingdom");



DROP TABLE country_state_city;

CREATE TABLE `country_state_city` (
  `id` int(11) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO country_state_city VALUES("1","USA","New York","New York city");
INSERT INTO country_state_city VALUES("2","USA","New York","Buffalo");
INSERT INTO country_state_city VALUES("3","USA","New York","Albany");
INSERT INTO country_state_city VALUES("4","USA","Alabama","Birmingham");
INSERT INTO country_state_city VALUES("5","USA","Alabama","Montgomery");
INSERT INTO country_state_city VALUES("6","USA","Alabama","Huntsville");
INSERT INTO country_state_city VALUES("7","USA","California","Los Angeles");
INSERT INTO country_state_city VALUES("8","USA","California","San Francisco");
INSERT INTO country_state_city VALUES("9","USA","California","San Diego");
INSERT INTO country_state_city VALUES("10","Canada","Ontario","Toronto");
INSERT INTO country_state_city VALUES("11","Canada","Ontario","Ottawa");
INSERT INTO country_state_city VALUES("12","Canada","British Columbia","Vancouver");
INSERT INTO country_state_city VALUES("13","Canada","British Columbia","Victoria");
INSERT INTO country_state_city VALUES("14","Australia","New South Wales","Sydney");
INSERT INTO country_state_city VALUES("15","Australia","New South Wales","Newcastle");
INSERT INTO country_state_city VALUES("16","Australia","Queensland","City of Brisbane");
INSERT INTO country_state_city VALUES("17","Australia","Queensland","Gold Coast
");



DROP TABLE coupons;

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO coupons VALUES("2","5","Coupon For Black Swan Blouse","95","kupon28183774","2","1");
INSERT INTO coupons VALUES("4","10","Coupon Forn Diamond Heart Ring","250","82828288","3","0");



DROP TABLE customer_orders;

CREATE TABLE `customer_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL,
  `payment_status` text NOT NULL,
  `papage_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO customer_orders VALUES("8","41","1","ORDS88870342","402651783","1","N/A","2020-04-01","d","successful","1");
INSERT INTO customer_orders VALUES("9","41","2","ORDS88870342","402651783","1","S","2020-04-01","d","successful","0");
INSERT INTO customer_orders VALUES("10","42","2","","1172931987","1","S","2020-04-02","r","returned","0");
INSERT INTO customer_orders VALUES("11","42","1","","1172931987","1","N/A","2020-04-02","r","returned","1");
INSERT INTO customer_orders VALUES("12","43","2","","782857222","1","S","2020-04-02","c","cancel","0");
INSERT INTO customer_orders VALUES("13","43","1","","782857222","1","N/A","2020-04-02","c","cancel","1");
INSERT INTO customer_orders VALUES("21","51","1","","1592854802","1","N/A","2020-04-04","c","cancel","1");
INSERT INTO customer_orders VALUES("22","52","2","","735431476","1","S","2020-04-05","c","cancel","0");
INSERT INTO customer_orders VALUES("23","53","2","","996900946","1","S","2020-04-05","o","pending","0");
INSERT INTO customer_orders VALUES("24","54","2","","1748788475","1","S","2020-04-05","o","pending","0");
INSERT INTO customer_orders VALUES("25","55","5","","919141111","1","N/A","2020-04-05","o","pending","1");
INSERT INTO customer_orders VALUES("26","56","1","","1795758946","1","S","2020-04-05","o","pending","0");
INSERT INTO customer_orders VALUES("27","57","2","","1267937988","1","S","2020-04-05","o","pending","0");
INSERT INTO customer_orders VALUES("28","58","1","","389925188","1","S","2020-04-05","o","pending","0");
INSERT INTO customer_orders VALUES("29","59","2","","515687472","1","S","2020-04-09","o","pending","0");



DROP TABLE customers;

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_lname` varchar(225) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_state` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pincode` int(10) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_status` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO customers VALUES("7","test ","test","17bmiit116@gmail.com   ","chit@9125","gujarat","surat","7984498992","34,lax,surat","396005","h-man.jpg","yes");
INSERT INTO customers VALUES("11","chit","chit","17bmiit117@gmail.com ","chit@9125","guj","surat","7984498994","34,dfgh","567897","erika.jpg","yes");



DROP TABLE logo;

CREATE TABLE `logo` (
  `logo_id` int(10) NOT NULL AUTO_INCREMENT,
  `logo_name` text NOT NULL,
  `logo_img` text NOT NULL,
  `logo_link` text NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO logo VALUES("1","logos","logo2.png","index.php");



DROP TABLE manufacturers;

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_status` text NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO manufacturers VALUES("7","BSA","yes","yes");
INSERT INTO manufacturers VALUES("8","hero","yes","yes");



DROP TABLE orders;

CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO orders VALUES("41","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("42","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("43","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("51","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("52","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("53","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("54","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("55","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("56","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("57","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("58","test","17bmiit116@gmail.com","gujarat","surat","7984498992","34,lax,surat");
INSERT INTO orders VALUES("59","chit","17bmiit116@gmail.com","guj","surat","7984498994","34,dfgh");



DROP TABLE payments;

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(10) NOT NULL,
  `txnid` text NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `code_name` text NOT NULL,
  `code` text NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO payments VALUES("2","350058432","","20000","CashonDelivery","","","2020-03-23");
INSERT INTO payments VALUES("3","2069819726","ORDS98838426","20000","Paytm","","","2020-03-23");
INSERT INTO payments VALUES("11","735431476","","20000","Cash on Delivery","","","2020-04-05");
INSERT INTO payments VALUES("9","625213333","ORDS58651304","5000","Paytm","","","2020-04-02");
INSERT INTO payments VALUES("10","1172931987","","25000","Cash on Delivery","","","2020-04-03");



DROP TABLE pending_orders;

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE product_categories;

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_status` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO product_categories VALUES("7","road","yes","yes");
INSERT INTO product_categories VALUES("8","man","yes","no");



DROP TABLE products;

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_img4` text NOT NULL,
  `product_price` int(10) DEFAULT NULL,
  `product_discount_price` text NOT NULL,
  `product_discount` text NOT NULL,
  `product_label` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_qty` text NOT NULL,
  `available_qty` text NOT NULL,
  `product_size` text NOT NULL,
  `product_frame` text NOT NULL,
  `product_weight` text NOT NULL,
  `product_front_suspension` text NOT NULL,
  `product_rear_suspension` text NOT NULL,
  `product_front_derailleur` text NOT NULL,
  `product_rear_derailleur` text NOT NULL,
  `product_wheels` text NOT NULL,
  `product_tires` text NOT NULL,
  `product_shifter` text NOT NULL,
  `product_crankset` text NOT NULL,
  `product_freewheels` text NOT NULL,
  `product_bb_set` text NOT NULL,
  `product_cassette` text NOT NULL,
  `product_colour` text NOT NULL,
  `product_pedals` text NOT NULL,
  `product_seat_post` text NOT NULL,
  `product_handleber` text NOT NULL,
  `product_stem` text NOT NULL,
  `product_headset` text NOT NULL,
  `product_brakeset` text NOT NULL,
  `product_status_top` text NOT NULL,
  `product_status` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO products VALUES("1","8","3","8","2020-04-08 18:05:40","amans","bik1.jpg","bik2.jpg","bik3.jpg","bik3.jpg","20000","30","30000","new","sdfghj","99","97","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","","","","yes","delete");
INSERT INTO products VALUES("2","7","1","7","2020-04-09 00:18:41","savani","bik2.jpg","bik2.jpg","bik3.jpg","bik3.jpg","20000","40","100000","new","2","164","161","2","2","2","2","2","2","22","2","2","2","2","2","222","2","2","2","2","2","2","22","","yes","yes");



DROP TABLE slider;

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_row` text NOT NULL,
  `slide_row_2` text NOT NULL,
  `status` text NOT NULL,
  `slide_url` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO slider VALUES("13","Editing Slide 12","s2.jpg","","","float-md-right float-none","shop.php");
INSERT INTO slider VALUES("14","Slide Number 14","s1.jpg","bike","","float-md-right float-none","shop.php");



DROP TABLE terms;

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL AUTO_INCREMENT,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO terms VALUES("11","Refund Condition Policy","link_3","Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.");
INSERT INTO terms VALUES("12","car","sxcvb","sdfvbnbcsdfgg");



