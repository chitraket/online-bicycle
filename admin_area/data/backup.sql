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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO accessories VALUES("1","7","8","x","boys-Puffer-Coat-With-Detachable-Hood-1.jpg","boys-Puffer-Coat-With-Detachable-Hood-2.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","2","0","2","2","20000","343456","23","sale","2020-04-21","<p>2</p>","yes","yes");
INSERT INTO accessories VALUES("4","5","1","savani","boys-Puffer-Coat-With-Detachable-Hood-1.jpg","boys-Puffer-Coat-With-Detachable-Hood-2.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","boys-Puffer-Coat-With-Detachable-Hood-3.jpg","12","3","2","2","20000","40","100000","new","2020-04-18","<p>2</p>","yes","yes");



DROP TABLE accessories_brand;

CREATE TABLE `accessories_brand` (
  `accessories_brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `accessories_brand` text NOT NULL,
  `accessories_brand_top` text NOT NULL,
  `accessories_brand_status` text NOT NULL,
  PRIMARY KEY (`accessories_brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO accessories_brand VALUES("5","aman","yes","yes");
INSERT INTO accessories_brand VALUES("7","cvbn","yes","yes");



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
  `admin_contact` varchar(255) NOT NULL,
  `admin_roles` text NOT NULL,
  `admin_permission` text NOT NULL,
  `admin_status` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO admins VALUES("2","chitraket","chitraketsavani@gmail.com","chit9125","tatiana-saphira.jpg","2222-2222-2222","admin","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,44","yes");
INSERT INTO admins VALUES("3","chit","17bmiit116@gmail.com","chit@9125","Arief.jpeg","7984498992","sub","1,3","yes");
INSERT INTO admins VALUES("4","amans","aman@gmail.com","aman@9125","iko.png","7984498993","sub","1,2,3,4,5,6,7,8,27,28,29,30","yes");



DROP TABLE boxes_section;

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL AUTO_INCREMENT,
  `box_icon` text NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL,
  `box_status` text NOT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO boxes_section VALUES("16","back-2","sdfg","<p>sdfvgb</p>","yes");
INSERT INTO boxes_section VALUES("17","arc","asdfg","<p>asdfg</p>
<p>DSGHGMH</p>","yes");
INSERT INTO boxes_section VALUES("18","arc","dfgh","<p>dfsgdhfjkhjf dferthjyku;</p>","yes");
INSERT INTO boxes_section VALUES("19","back-2","dzfxgc","<p>XZcvxbnm,n</p>","yes");



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
  `customer_email` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL,
  `payment_status` text NOT NULL,
  `papage_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

INSERT INTO customer_orders VALUES("72","91","2","","905026015","1","S","17bmiit116@gmail.com","2020-04-25","o","pending","0");
INSERT INTO customer_orders VALUES("73","92","2","ORDS50846701","2081721432","1","S","17bmiit116@gmail.com","2020-04-25","o","successful","0");
INSERT INTO customer_orders VALUES("74","92","4","ORDS50846701","2081721432","1","N/A","17bmiit116@gmail.com","2020-04-25","o","successful","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO customers VALUES("14","chit","savani","17bmiit116@gmail.com","chit@9125","guj","surat","7984498992","34,lax,surat","345673","5e36fb208c952Arief.jpeg","yes");
INSERT INTO customers VALUES("17","chitraket","savani","chitraketsavani@gmail.com","chit@9125","guj","surat","7984498994","23,lax,surat","234567","tatiana-saphira.jpg","no");



DROP TABLE logo;

CREATE TABLE `logo` (
  `logo_id` int(10) NOT NULL AUTO_INCREMENT,
  `logo_name` text NOT NULL,
  `logo_img` text NOT NULL,
  `logo_link` text NOT NULL,
  `logo_status` text NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO logo VALUES("1","logos","logo2.png","index.php","yes");



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



DROP TABLE order_policy;

CREATE TABLE `order_policy` (
  `o_policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_policy_title` text NOT NULL,
  `o_policy_link` text NOT NULL,
  `o_policy_desc` text NOT NULL,
  `o_policy_status` text NOT NULL,
  PRIMARY KEY (`o_policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO order_policy VALUES("3","sdfghnm","xdcfvgbnm","sdfgbhn","yes");
INSERT INTO order_policy VALUES("6","chits","xcmvs","<p>dmfbgnhjd</p>
<p>f</p>
<p>hjdgcvcvbvnmkhy</p>","yes");
INSERT INTO order_policy VALUES("4","cvfbnm","xcvbn","sdfghnjmhk,mnbvdrgthfbfgfbvsf","yes");



DROP TABLE orders;

CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_pincode` text NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

INSERT INTO orders VALUES("91","chit savani","17bmiit116@gmail.com","guj","surat","345673","7984498992","34,lax,surat");
INSERT INTO orders VALUES("92","chit savani","17bmiit116@gmail.com","guj","surat","345673","7984498992","34,lax,surat");



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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

INSERT INTO payments VALUES("44","2081721432","ORDS50846701","44800","Paytm","","","2020-04-25");
INSERT INTO payments VALUES("39","1384053298","ORDS89210333","22400","Paytm","","","2020-04-19");
INSERT INTO payments VALUES("38","610508506","ORDS18295856","44800","Paytm","","","2020-04-19");
INSERT INTO payments VALUES("33","1467960086","","44800","Cash on Delivery","","","2020-04-19");



DROP TABLE policy;

CREATE TABLE `policy` (
  `policy_id` int(10) NOT NULL AUTO_INCREMENT,
  `policy_title` text NOT NULL,
  `policy_link` text NOT NULL,
  `policy_desc` text NOT NULL,
  `policy_status` text NOT NULL,
  PRIMARY KEY (`policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO policy VALUES("3","chit","chit1","dfnmsgdhfllllllllllll","yes");
INSERT INTO policy VALUES("2","amans","aman12","<p>ddfjgkhlffffffffgketjldget</p>
<p>frdthkjcvkc6</p>
<p>fggjkhfkryk6uuoiugitiukbiy6khty6ujvjyulrlkejykiejujrjjr</p>","yes");



DROP TABLE product_categories;

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_status` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO product_categories VALUES("7","road","yes","yes");
INSERT INTO product_categories VALUES("8","man","no","yes");



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

INSERT INTO products VALUES("1","8","3","8","2020-04-21 12:23:31","amans","bik1.jpg","bik2.jpg","bik3.jpg","bik3.jpg","20000","30000","30","new","<p>sdfghj</p>","99","96","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","","","","yes","yes");
INSERT INTO products VALUES("2","7","1","7","2020-04-25 12:20:41","savanis","bik2.jpg","bik2.jpg","bik3.jpg","bik3.jpg","20000","40000","10","sale","<p><strong>2222chitraket</strong></p>
<p>dfjslsfjl fkgsjgv dfgkjdfjk dfgdkjjxffj&nbsp;</p>
<p>djfsgdkjgkhfkjgkj fgdhjhjfgfkjgkjtkufduhdfrgiuidfugtnjdfjkngjfdgkjvjfgkhvmfngjhgjgjvfj</p>
<p>frkgdjkvjsfgjkckjgfgjfkgdfjkgcvgjtkh</p>
<p>dfghjcvj f tjkcxnjgrtj</p>
<p>&nbsp;jfgtiuufduy</p>","164","147","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","2","22","2222","2","2","22","yes","yes");



DROP TABLE review;

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `papage` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  `message` text NOT NULL,
  `time` date NOT NULL,
  `rating` int(10) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO review VALUES("13","2","0","17bmiit116@gmail.com","<p>hii</p>","2020-04-18","4","yes");
INSERT INTO review VALUES("14","4","1","17bmiit116@gmail.com","<p>hii</p>","2020-04-18","5","yes");



DROP TABLE slider;

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_row` text NOT NULL,
  `slide_row_2` text NOT NULL,
  `status` text NOT NULL,
  `slide_url` text NOT NULL,
  `slide_status` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO slider VALUES("13","Editing Slide 12","s2.jpg","","","float-md-right float-none","shop.php","yes");
INSERT INTO slider VALUES("14","Slide Number 14","s1.jpg","bike","","float-md-right float-none","shop.php","yes");



DROP TABLE terms;

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL AUTO_INCREMENT,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL,
  `term_status` text NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO terms VALUES("11","Refund Condition Policy","link_3","<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores</p>
<p>modi</p>
<p>natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi,</p>
<p>ea aperiam</p>
<p>voluptate.</p>","yes");
INSERT INTO terms VALUES("12","car","sxcvb","<p>sdfvbnbcsdfgg dfgfdjhfgjhdfll dglthjlyjeti&nbsp;</p>
<p>fdgthrjy;it</p>
<p>dfgtehhyirtir</p>
<p>fgetetouyuwruget</p>
<p>fgethiteuu</p>
<p>dfguetriyuyiu9</p>","yes");
INSERT INTO terms VALUES("13","aman","aman","<p>sfgndlllllllcnvgetioxkcvfltehvklftmokl</p>","yes");



DROP TABLE wishlist;

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  `papage` int(11) NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;




