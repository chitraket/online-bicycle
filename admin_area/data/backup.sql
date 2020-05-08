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




DROP TABLE accessories_brand;

CREATE TABLE `accessories_brand` (
  `accessories_brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `accessories_brand` text NOT NULL,
  `accessories_brand_top` text NOT NULL,
  `accessories_brand_status` text NOT NULL,
  PRIMARY KEY (`accessories_brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO accessories_brand VALUES("5","Fabric","yes","yes");
INSERT INTO accessories_brand VALUES("7","Knog","yes","yes");
INSERT INTO accessories_brand VALUES("8","Track&Trail","yes","yes");
INSERT INTO accessories_brand VALUES("9","Xeccon","yes","yes");
INSERT INTO accessories_brand VALUES("10","XMR","yes","yes");
INSERT INTO accessories_brand VALUES("11","Firefox","yes","yes");



DROP TABLE accessories_category;

CREATE TABLE `accessories_category` (
  `accessories_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `accessories_category` text NOT NULL,
  `accessories_category_top` text NOT NULL,
  `accessories_category_status` text NOT NULL,
  PRIMARY KEY (`accessories_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO accessories_category VALUES("1","Bags","yes","yes");
INSERT INTO accessories_category VALUES("8","Bike Carriers & Pannier Racks","yes","yes");
INSERT INTO accessories_category VALUES("7","Bells","yes","yes");
INSERT INTO accessories_category VALUES("13","Bike Computer & Acessories","yes","yes");
INSERT INTO accessories_category VALUES("14","Bottles & Cages","yes","yes");
INSERT INTO accessories_category VALUES("15","Display Stand","yes","yes");
INSERT INTO accessories_category VALUES("16","Grips & Tapes","yes","yes");
INSERT INTO accessories_category VALUES("17","Kickstands","yes","yes");
INSERT INTO accessories_category VALUES("18","Lights","yes","yes");
INSERT INTO accessories_category VALUES("19","Pumps","yes","yes");
INSERT INTO accessories_category VALUES("20","Wheel Lock","yes","yes");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO admins VALUES("2","chitraket","chitraketsavani@gmail.com","chit@9125","","2222-2222-2222","admin","1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,44","yes");
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

INSERT INTO boxes_section VALUES("16","box1","27,200+ Orders","<p>Customers who bought from Choose My Bicycle</p>","yes");
INSERT INTO boxes_section VALUES("17","map-2","220+ Locations Across India","<p>We ship to 95% of all place in India</p>","yes");
INSERT INTO boxes_section VALUES("18","users","16.2 Million","<p>Consumers Have Used CMB before making a descision</p>","yes");
INSERT INTO boxes_section VALUES("19","bicycle","240+ Brands","<p>Trust CMB as their online partner</p>","yes");



DROP TABLE categories;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_status` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("1","5-8","yes","yes");
INSERT INTO categories VALUES("3","2-5","yes","yes");
INSERT INTO categories VALUES("5","11-16","no","yes");
INSERT INTO categories VALUES("6","16+","no","yes");
INSERT INTO categories VALUES("7","8-11","yes","yes");



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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;




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

INSERT INTO customers VALUES("14","chit","savani","17bmiit116@gmail.com","Chit@9125","guj","surat","7984498992","  34,lax,surat","345673","5e36fb208c952Arief.jpeg","yes");
INSERT INTO customers VALUES("17","chitraket","savani","chitraketsavani@gmail.com","chit@9125","guj","surat","7984498994","23,lax,surat","234567","","yes");



DROP TABLE logo;

CREATE TABLE `logo` (
  `logo_id` int(10) NOT NULL AUTO_INCREMENT,
  `logo_name` text NOT NULL,
  `logo_img` text NOT NULL,
  `logo_link` text NOT NULL,
  `logo_status` text NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO logo VALUES("1","hercules","TI_Hercules_0.png","http://localhost/SKOTE/bikes_manufacturer-MTA=","yes");
INSERT INTO logo VALUES("3","GT","TI_GT-Bicycles_0.png","http://localhost/SKOTE/bikes_manufacturer-MTc=","yes");
INSERT INTO logo VALUES("4","BSA","TI_BSA-Kids_1.png","http://localhost/SKOTE/bikes_manufacturer-Nw==","yes");
INSERT INTO logo VALUES("5","Firefox","firefox-bikes-footer-logo.png","http://localhost/SKOTE/bikes_manufacturer-OQ==","yes");
INSERT INTO logo VALUES("6","Roadeo","Ti_Roadeo.png","http://localhost/SKOTE/bikes_manufacturer-MTU=","yes");
INSERT INTO logo VALUES("7","Ridley","TI_Ridley-2_0.png","http://localhost/SKOTE/bikes_manufacturer-MTI=","yes");
INSERT INTO logo VALUES("8","Hero","Hero_Cycle_logo_New.png","http://localhost/SKOTE/bikes_manufacturer-OA==","yes");



DROP TABLE manufacturers;

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_status` text NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO manufacturers VALUES("7","BSA","yes","yes");
INSERT INTO manufacturers VALUES("8","Hero","yes","yes");
INSERT INTO manufacturers VALUES("9","Firefox","yes","yes");
INSERT INTO manufacturers VALUES("10","Hercules","yes","yes");
INSERT INTO manufacturers VALUES("11","Kross","yes","delete");
INSERT INTO manufacturers VALUES("12","Ridley","yes","yes");
INSERT INTO manufacturers VALUES("13","Format","yes","yes");
INSERT INTO manufacturers VALUES("14","Frog","yes","yes");
INSERT INTO manufacturers VALUES("15","Roadeo","yes","yes");
INSERT INTO manufacturers VALUES("16","Montra","yes","yes");
INSERT INTO manufacturers VALUES("17","GT","yes","yes");
INSERT INTO manufacturers VALUES("18","Giant","yes","yes");



DROP TABLE order_policy;

CREATE TABLE `order_policy` (
  `o_policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_policy_title` text NOT NULL,
  `o_policy_link` text NOT NULL,
  `o_policy_desc` text NOT NULL,
  `o_policy_status` text NOT NULL,
  PRIMARY KEY (`o_policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO order_policy VALUES("7","Time To Delive","Time","<p>The time taken for delivery tends to vary according to the destination; however, we make our best efforts to ensure that the order is delivered on time.</p>
<p>&nbsp;</p>
<p>Delivery Time for Domestic Orders:&nbsp; It takes 7- 14 working days from the day of order confirmation to deliver the products within India given that the delivery is not delayed due to governmental authority or any other entity acting on behalf of the government or acting as per the directions of the government. In the unlikely event that delivery period exceeds the stipulated time, the order is cancelled and the customer is notified of the same. In such cases, the refund is made directly to the customer&rsquo;s back account using the same mode the payment was made. Track and Trail partners with reputed agencies to ensure prompt and secure delivery. Since the delivery of products is address specific, please ensure that the address entered while placing the order is correct.</p>
<p>&nbsp;</p>
<p>Important Note: In case the office address is provided for delivery, please make sure that the department details, employee number and direct landline numbers are also provided to prevent any last minute hassles and failed delivery.</p>
<p>&nbsp;</p>
<p>To prevent misplaced delivery, please keep one of the following identity cards for verification:</p>
<p>&nbsp;</p>
<p>&bull; PAN card</p>
<p>&nbsp;</p>
<p>&bull; Driving License</p>
<p>&nbsp;</p>
<p>&bull; Passport</p>
<p>&nbsp;</p>
<p>&bull; Voter identification card</p>
<p>&nbsp;</p>
<p>&bull; Unique Identification Card (Aadhaar)&nbsp;</p>","yes");



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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;




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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;




DROP TABLE policy;

CREATE TABLE `policy` (
  `policy_id` int(10) NOT NULL AUTO_INCREMENT,
  `policy_title` text NOT NULL,
  `policy_link` text NOT NULL,
  `policy_desc` text NOT NULL,
  `policy_status` text NOT NULL,
  PRIMARY KEY (`policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO policy VALUES("6","Your privacy - our commitment","YOUR","<p>At SKOTE.com, we are extremely proud of our commitment to protect your privacy and the personal information you disclose on the Site. We value your trust in us. Please read the following policy to understand how your personal information will be treated as you make full use of our portal.</p>","yes");
INSERT INTO policy VALUES("8","Information we collect","INFORMATION","<p>When you use our portal, we collect and store personal information provided by you. Our primary goal in doing this is to provide a safe, efficient and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our portal to make your experience safer and easier. Importantly, we only collect personal information about you that we consider necessary for achieving this purpose. In general, you can browse the portal without telling us who you are or revealing any personal information about yourself. To be able to use every feature of our portal, you will need to register and provide us your contact information and other personal information as indicated on the form.</p>
<p>If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the portal, we may collect such information.</p>","yes");
INSERT INTO policy VALUES("9","Our user of your information","OUR","<p>From time to time we may reveal general visitor analytics information about our portal, such as number of visitors, portal usage patterns etc. We use your personal information to facilitate the services you request. We use your personal and other information that we obtain from your current and past activities on the portal to: measure consumer interest in the services provided by us, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our User Agreement; sharing in the course of classified listings with prospective buyers/sellers (including dealers involved in buying and selling) as the case may be; and as otherwise described to you at the time of collection. We may examine your personal information to identify users using multiple User IDs or aliases.</p>
<p>You agree that we may use your personal information to contact you and deliver information to you that, in some cases, are targeted to your interests, such as targeted banner advertisements, administrative notices, product offerings, locate a dealer, and communications relevant to your use of the Site. By accepting the User Agreement and Privacy Policy, you expressly agree to receive this information.</p>
<p>&nbsp;</p>","yes");



DROP TABLE product_categories;

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_status` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO product_categories VALUES("9","Mountain Bikes","yes","yes");
INSERT INTO product_categories VALUES("10","City Bikes (Hybrid)","yes","yes");
INSERT INTO product_categories VALUES("11","Road Bikes","yes","yes");
INSERT INTO product_categories VALUES("12","Women Bikes","yes","yes");
INSERT INTO product_categories VALUES("13","Kids Bikes","yes","yes");
INSERT INTO product_categories VALUES("14","Junior Bikes","yes","yes");
INSERT INTO product_categories VALUES("15","Speciality Bikes","yes","yes");



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
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

INSERT INTO products VALUES("93","9","5","9","2020-05-02 00:54:20","Nexus D","firefox-nexus-d-1.jpg","firefox-nexus-d-2.jpg","firefox-nexus-d-3.jpg","","12700","13700","10","new","<p>FRAME</p>
<p>The Firefox Nexus D is a Hardtail Mountain Bicycle which has a Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Nexus D is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Nexus D has a Zoom Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Nexus D comes with a pair of 27.5\" x 2.1\" tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","45cms","Steel HardTail","","Zoom Suspension Fork","","","","Alloy Double Wall 36H Rims","27.5” x 2.10","","Steel 40T, 170mm(17cm)","18T","Sealed Cartridge","","Black","PP","Steel 28.6 X 300mm(2.8 cm X 30cm)","Steel 660, 31.8mm (3.1cm), 30mm(3cm) rise","Alloy 28.6(2.8cm) x 31.8mm(3.1cm)","Steel 11 pcs","Front & Rear Disc Brake JAK 7","yes","yes");
INSERT INTO products VALUES("94","9","6","9","2020-05-02 01:24:39","Nuke D 27S","firefox-nuke-d-29er-matte-black-and-matte-blue.jpg","","","","31900","41900","20","new","<p>The Firefox Nuke D 29er is a Mountain Bicycle which has an Alloy Hardtail Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Nuke D 29er has Shimano Altus front and rear derailleurs and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Nuke D has a Suntour XCT Suspension Fork with 100mm of travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Nuke comes with a pair of Kenda K1027 29\" x 2.1\" tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","15","15","45cms,48cms","Alloy Hardtail Frame","","SUNTOUR XCT suspension with hydraulic lockout, 100 mm (10 Cms) travel","","SHIMANO ALTUS M2000","SHIMANO ALTUS M370","Alloy Double Wall 32H Rims","Kenda 27.5X2.10","SHIMANO ALTUS, 3 X 9 Speed","Shimano MT101 , 22/30/40T, 170mm","SHIMANO CS-HG400 (11-34T) 9 spd","VP –BC73","","Blue","Wellgo","Zoom Alloy 30.4 X 350mm","Zoom Alloy 660 X 31.8 mm, 20 mm rise","ZOOM Alloy 90 mm. extension","Semi-Integrated 28.6*44*30mm","Shimano, Hydraulic DISC BRAKE W/160MM ROTOR","yes","yes");
INSERT INTO products VALUES("96","9","5","9","2020-05-02 01:28:01","Fusion D 21S","firefox-fusion-d-29-21s-matte-charcoal-and-matte-blue-1.jpg","firefox-fusion-d-29-21s-matte-charcoal-and-matte-blue-4.jpg","firefox-fusion-d-29-21s-matte-charcoal-and-matte-blue-2.jpg","firefox-fusion-d-29-21s-matte-charcoal-and-matte-blue-3.jpg","17900","18900","10","new","<p>FRAME</p>
<p>The Firefox Fusion D 29 21S is a Mountain Bicycle which has a Steel Hardtail Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Fusion D 29 21S has a Shimano TY500 3-Speed front derailleur, a Shimano Tourney TY300D 7-Speed rear derailleur and Shimano Altus 21-Speed shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Fusion D 29 21S has a Zoom Suspension Fork with a 50mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Fusion D 29 21S comes with a pair of Wanda 29\" x 2.1\" tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","40cms,45cms,48cms","Steel Hardtail Frame","","Zoom Suspension fork with 50 mm travel, Steer Tube dia. -25.4*28.6mm(2.5*8.9 cm)","","SHIMANO TY 500","SHIMANO TY300D","Alloy Double Wall 36H Rims","WANDA 29X2.10","SHIMANO ALTUS, 21 spd","Steel 24/34/42T, 170mm(17 cm)","SHIMANO TZ500","Steel 5 Pieces","","Blue","PP","Steel 25.4 X 300mm (2.5x300 cm)","Steel 660 X 31.8 mm (66x3.2 cm), 20 mm (2 cm) rise","ZOOM Alloy 90 mm (9 cm)","Steel 1 1/8” thread less","Alloy, DISC BRAKE W/160MM ROTOR","yes","yes");
INSERT INTO products VALUES("97","10","5","9","2020-05-03 01:02:19","Axxis 26","firefox-axxis-new-silver.jpg","","","","11200","12200","10","sale","<p>FRAME</p>
<p>The Firefox Axxis 26 New is a City Bicycle which has a Steel Hardatil Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Axxis 26 New is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Firefox comes with V-Brakes which are connected to Alloy Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Axxis 26 New has a Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Axxis 26 New comes with a pair of 26\" x 2.125\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","45cms,48cms","Steel Hard tail","15","Suspension fork","","","","Alloy 36H Double Wall Rims","26","","Steel 40T, 170mm (17 Cms)","16T","Steel 5 Pieces","","Silver","PP","Steel 25.4mm X 300mm (2.54X30 Cms)","Steel 580mm (58 Cms),30mm (3 Cms) rise","Steel, 22.2mm (2.22 Cms)","Steel 8pcs","Alloy ","no","yes");
INSERT INTO products VALUES("98","9","5","9","2020-05-02 01:34:30","AXXIS 27.5D SSP","firefox-axxis-27-5-d-ssp-blue.jpg","","","","11900","14900","20","sale","<p>FRAME</p>
<p>The Firefox Axxis 27.5D SSP is a Mountain Bicycle which has an Alloy hardtail frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Axxis 27.5D SSP is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with JAK 7 Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Axxis 27.5D SSP has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Axxis 27.5D SSP comes with a pair of 27.5\" x 2.1\" tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","40cms,48cms","Steel Hard Tail","","Zoom Suspension Fork","","","","Alloy Double Wall 36H Rims","27.5","","Steel 40T, 170mm (17 Cms)","18T","Sealed Cartridge","","Blue","PP","Steel 25.4mm X 300mm (2.54X30 Cms)","Steel 660mm (66 Cms), 31.8mm (3.18 Cms), 30mm (3 Cms) rise","Alloy 28.6mm x 31.8mm (2.86X3.18 Cms)","Steel 11 pcs","Front & Rear Disc Brake JAK 7","yes","yes");
INSERT INTO products VALUES("99","9","6","13","2020-05-01 22:21:31","Format Hurricane ","format-hurricane-2018-black-blue.jpg","","","","17900","20900","20","sale","<p>FRAME</p>
<p>The Format Hurricane (2018) is a Mountain Bicycle which has a AL6061 Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format Hurricane has Shimano Tourney front and rear derailleurs and Shimano Tourney ST-EF51 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format Hurricane has a Hi-Ten Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format Hurricane comes with a pair of G2016 27.5\" x 1.95\" tires which are attached Format Al6061 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>
<p>&nbsp;</p>","10","10","33cms","AL 6061 Frame","","Hardtail","","Shimano Tourney ","Shimano Tourney ","27.5\"","G2016 27.5\" x 1.95\"","Shimano Tourney ST-EF51 3x7","","","","","Black","","Format Steel","Format Steel Flatbar","Format AL6061","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("100","10","5","14","2020-05-02 20:58:08","Frog Plus Granite","frog-plus-granite-x20-26-green (1).jpg","","","","9799","11979","20","sale","<p>FRAME</p>
<p>The Frog Plus Granite X20 26\" is a Mountain Bike which has a TIG Welded Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Plus Granite X20 26\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Frog comes with Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Plus Granite X20 26\" has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Plus Granite X20 26\" comes with a paiir of Wanda 26\" x 2.3\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>
<p>&nbsp;</p>","10","10","38cms","TIG Welded Steel Frame",""," Hardtail","","","","26","Wanda 26","","","","","","Green","","with QR","","","","","yes","yes");
INSERT INTO products VALUES("101","9","6","14","2020-05-01 22:21:29","Frog Plus New","frog-plus-granite-x20-27-5-silver.jpg","","","","10499","20499","20","new","<p>FRAME</p>
<p>The Frog Plus Granite X20 27.5\" is a Mountain Bike which has a TIG Welded Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Plus Granite X20 27.5\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Frog comes with Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Plus Granite X20 27.5\" has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Plus Granite X20 27.5\" comes with a paiir of Wanda 27.5\" x 2.3\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>
<p>&nbsp;</p>","10","10","38cms","TIG Welded Steel Frame","17 kgs","Hardtail","","",""," 27.5","Wanda 27.5","","","","","","Silver","","with QR","","","","Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("102","9","5","14","2020-05-01 22:21:29","Frog Apollo V 26","frog-apollo-26.jpg","","","","10999","11999","10","new","<p>FRAME</p>
<p>The Frog Apollo 26\" is a Mountain Bicycle which has a Hi-Ten Steel Frame</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Apollo 26\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Frog comes with Yingxing V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Apollo 26\" has a Frictionless Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Apollo 26\" comes with a pair of DSI 26\" x 2.3\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","10","10","40cms","Hi-Ten Steel Frame","14.9 kgs","Hardtail","","","","26\"","DSI 26\" x 2.3\"","","","","","","Orange","","Alloy QR","","","","Yingxing V-Brakes","yes","yes");
INSERT INTO products VALUES("103","9","6","8","2020-05-03 19:53:37","Hero Sprint Spark ","hero-sprint-spark-26t.jpg","","","","13485","15485","10","sale","<p>FRAME</p>
<p>The Hero Sprint Spark 26T is a Mountain Bicycle which has a Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Spark 26T has Shimano Tourney front and rear derailleurs and Shimano EF-500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Hero comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Spark 26T has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>The Hero Sprint Spark 26T comes with a pair of DSI 26\" x 2.1\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>
<p>&nbsp;</p>","21","21","38cms","Steel Frame","","Hardtail","","Shimano Tourney","Shimano Tourney","26","DSI 26","Shimano EF-500","Steel","","","Sunrun 14/28T","Black","Half Alloy","Steel","Steel 660mm","Alloy","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("104","9","5","15","2020-04-29 00:21:17","Roadeo Fugitive","roadeo-fugitive-26-2018-blue.jpg","","","","12225","14225","20","sale","<p>FRAME</p>
<p>The Roadeo Fugitive 26\" (2018) is a Mountain Bicycle which has a Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Roadeo Fugitive 26\" has Shimano Tourney front and rear derailleurs and Shimano EF41 Shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Roadeo comes with a Disc Brake in the Front and a V-Brake at the back which are connected to Shimano EZFire EF41 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Roadeo Fugitive 26\" has a Threadless Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Roadeo Fugitive comes with a pair of 26\" x 2.1 tires which are attached to XMR Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Roadeo is a brand under the T.I Cycles of India umbrella which is aimed at teenagers and young adults looking for quality bicycles with attractive designs. The Roadeo series boats high quality steel and alloy bicycles for the young rider.</p>
<p>&nbsp;</p>","0","0","33cms,38cms","26\" Steel Frame","","Hardtail","","Shimano Tourney","Shimano Tourney","26\"","26\" x 2.1\" Nylon Black","Shimano EF41","Cartridge","","","14/28T","Blue","","Steel","XMR Handlebar 600mm Bird Type","","","Shimano EZFire EF41","no","yes");
INSERT INTO products VALUES("105","9","5","15","2020-04-29 00:21:23","Roadeo Hannibal","roadeo-hannibal-26-dd-2019-black-blue.jpg","roadeo-hannibal-26-dd-2019-black-blue-1.jpg","","","15300","25000","20","sale","<p>FRAME</p>
<p>The Roadeo Hannibal 26 DD (2019) is Full Suspension Mountain Bicycle which has an 18\" Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Roadeo Hannibal 26 DD (2019) has a Shimano Tourney TY-500 3-Speed front derailleur, a Shimano Tourney TY-300 7-Speed rear derailleur and Shimano EF-41 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Roadeo comes with Disc Brakes which are attached to Shimano EF41 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Roadeo Hannibal 26 DD (2019) has a Threadless Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Roadeo Hannibal 26 DD comes with a pair of 26\" x 2.1\" Nylon Black tires which are attached to XMR Double Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Roadeo is a brand under the T.I Cycles of India umbrella which is aimed at teenagers and young adults looking for quality bicycles with attractive designs. The Roadeo series boats high quality steel and alloy bicycles for the young rider.</p>","3","3","38cms,40cms,45cms"," 18\" Suspension Steel Frame","18.4kgs","Hardtail","","Shimano Tourney TY500 3-Speed","Shimano Tourney TY-300 7-Speed","26\"","26\" x 2.1\" Nylon Black","Shimano EF-41 21-Speed","24/34/42T Steel","","","14/28T","Blue","","","620mm XMR Bird Type","XMR Alloy","","Dual Disc Brakes","no","yes");
INSERT INTO products VALUES("106","9","6","15","2020-04-29 00:21:29","Roadeo Maddox ","roadeo-maddox-2019.jpg","roadeo-maddox-2019-1.jpg","","","15252","20252","5","new","<p>FRAME</p>
<p>The Roadeo Maddox (2019) is a Mountain Bicycle which has a 13.4\" Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Roadeo Maddox (2019) has a Shimano Tourney TZ-500 3-Speed front derailleur, a Shimano TY-300 7-Speed rear derailleur and Shimano EF41 21-Speed shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Roadeo comes with Disc Brakes which are attached to Shimano EF41 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Roadeo Maddox (2019) has a Threadless Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Roadeo Maddox (2019) comes with a pair of 26\" x 2.1\" tires which are attached to XMR Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Roadeo is a brand under the T.I Cycles of India umbrella which is aimed at teenagers and young adults looking for quality bicycles with attractive designs. The Roadeo series boats high quality steel and alloy bicycles for the young rider.</p>","5","5","45cms","13.4\" Steel Frame","","Hardtail","","Shimano Tourney TZ500 3-Speed","Shimano Tourney TY-300 7-Speed","26\"","26\" x 2.1\" Nylon Black","Shimano EF-41 21-Speed","24/34/42T Steel","","","14/28T","Black","","","620mm XMR Bird Type","XMR Alloy","","Dual Disc Brakes","no","yes");
INSERT INTO products VALUES("107","10","5","10","2020-05-02 11:58:17","StreetCat Pro ","Artboard-–-3.png","","","","5890","10000","20","new","","10","10","33cms,38cms,40cms","Sleek and sporty frame design","","Stylish Integrated Carrier","","","","","Broader Tyre of 2.35”","","","","","","Black","Plastic with reflector","Quick Release","Straight – Sand Blast Finish","","","Power brake for effective braking","no","yes");
INSERT INTO products VALUES("108","9","5","10","2020-04-29 00:22:55","Flare RF","Hercules_MTB_Flare_Black_2020_02.png","","","","4680","10000","20","new","<p>&nbsp;</p>
<p>&nbsp;</p>","20","20","33cms,38cms","18T – Sleek and light weight frame design","","Best in Class Front Suspension","","","","","2.1, Broader tyres","","","","","","Black","Plastic with reflector","","Broader head tube","","","Power brake with Alloy Levers","no","yes");
INSERT INTO products VALUES("109","9","5","10","2020-04-29 00:23:13","Top Speed FX200 ","Hercules_MTB_FX_200_2020_02.png","","","","7980","50","20000","new","","20","20","33cms,38cms","17T – Sleek and sporty frame design","","Best in Class Front Suspension","","","","","2.35, Broader tyres","","Cotterless","","","","Black","Plastic","","Straight – Sand Blast Finish","","","Dual Disc brake for effective braking","no","yes");
INSERT INTO products VALUES("110","9","5","10","2020-05-02 01:18:44","Neo HT","Hercules_MTB_NeoHT_Green_2019_04.png","","","","6900","","","new","","10","10","33cms,38cms","18","","","","","","","1.95, Black Nylon","","Cotterless","","","","Yellow","Plastic, branded","","Straight -Sand blast finish","","","V-brake","no","yes");
INSERT INTO products VALUES("111","9","6","12","2020-04-29 00:23:29","Ridley Trailfire 6D","1FPN83G0412000A_0.png","","","","31999","","","new","","10","10","40cms,45cms,48cms,53cms","Trailfire 27.5, Superlight Aluminium, Double Butted, Tapered Head-Tube","","","","Shimano FD-TX800","Shimano Altus","","Kenda Water Spirit K1162 , 27.2.10","Shimano Acera ST-EF500A, EZ-Fire Plus, (3x8-Speed)","Shimano FC-TY501, 42/34/24T, 170mm Arms, 3-Speed","","","","Red","Alloy Cage with Alloy Body","Zoom SP-C208, Alloy, 350 x 27.5, Setback: 17.5mm","Zoom, Alloy, D:31.8, W: 680mm, 20mm Rise, Backsweep: 6° Degree","","NECO H-156, Threadless, Tapered 1-1/8 to 1.5, Semi Integrated","Tektro MD-M280, Mechanical Disc, 160/160mm Rotor","no","yes");
INSERT INTO products VALUES("112","9","6","12","2020-04-29 00:23:29","Ridley Trailfire 5","1FPN80G0050000A_0.png","","","","39999","","","new","","10","10","40cms,45cms,48cms,53cms","Trailfire 27.5","","","","Shimano FD-TX800","Shimano Acera","","Kenda Water Spirit K1162 , 27.2.10","Shimano SL-M310, Rapidfire Plus Shifting, (3x8-Speed)","","","","","Black","Alloy Cage with Alloy Body","Zoom SP-C208, Alloy, 350 x 27.5, Setback: 17.5mm","Zoom, Alloy, D:31.8, W: 680mm, 20mm Rise, Backsweep: 6° Degree","Zoom TDS-C301, Alloy, 70mm, D: 31.8mm, Angle: 10° Degree","NECO H-156, Threadless, Tapered 1-1/8 to 1.5, Semi Integrated","Shimano M2000 Series, BR-M315, Hydraulic Disc, SM-RT54S 160mm Center Lock Rotor","no","yes");
INSERT INTO products VALUES("113","9","5","9","2020-05-02 01:09:22","Tornado","27_5_-tornado.jpg","tornado1.png","tornado2.png","","22100","","","new","<p>FRAME</p>
<p>The Firefox Tornado 27.5D is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Tornado 27.5D has a Shimano Tourney TY700 3-Speed front derailleur, a Shimano Tourney TX800 8-Speed rear derailleur and Shimano Altus EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with JAK 7 Mechanical Disc Brakes which are attached to Shimano Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Tornado 27.5D has a Zoom Suspension Fork with a 60mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Tornado 27.5D comes with a pair of Kenda K1027 27.5\" x 2.1\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","20","20","40cms,45cms","Alloy Hardtail MTB","","ZOOM Front Suspension, 60mm (6 Cms)","","SHIMANO TOURNEY TY700","SHIMANO TOURNEY TX800","Alloy 32H Double Wall Rims","KENDA K1027 27.5","SHIMANO ALTUS EF500, 3 x 8 speed","SHIMANO TOURNEY TY301, 24x34x42T, 170mm (17 Cms)","","KENLI Sealed Cartridge","SHIMANO TOURNEY HG200. 12-32T, 8 speed","Red"," FP 922","ZOOM Alloy 30.4mm X 300mm (3X30 Cms)","ZOOM Alloy 680mm (68 Cms), 31.8mm (3 Cms)","ZOOM Alloy 28.6mm (2.86 Cms)","KENLI KL-B441","Front & Rear JAK 7 Mechanical disc brakes with SHIMANO levers","no","yes");
INSERT INTO products VALUES("114","9","5","9","2020-05-02 01:11:17","Hurrikan","firefox-hurrikan-27-5-d.jpg","","","","28300","30000","10","sale","<p>FRAME</p>
<p>The Firefox Hurrikan 27.5D is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Hurrikan 27.5D has a Shimano Tourney TX800 3-Speed front derailleur, a Shimano Acera M360 8-Speed rear derailleur and Shimano Altus M310 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Shimano Altus Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Hurrikan 27.5D has a Suntour XCT Suspension Fork with 100mm travel and Hydraulic Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Hurrikan 27.5D comes with a pair of Kenda K1027 27.5\" x 2.1\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","20","20","40cms,45cms","Alloy Hardtail MTB","","SR SUNTOUR XCT hydraulic lockout 100mm (10 Cms)","","SHIMANO TOURNEY TX800","SHIMANO ACERA M360","Alloy 32H Double Wall Rims","KENDA K1027 27.5","SHIMANO ALTUS M310, 3 x 8 speed","SHIMANO ACERA M3000, 22x30x40T, 170mm (17 Cms)","","VP BC-73 Sealed Cartridge","SHIMANO TOURNEY HG200. 12-32T, 8 speed","Blue","FP 963","ZOOM Alloy 30.4mm X 300mm (3.04X30 Cms)","UUR Alloy 680mm (68 Cms), 31.8mm (3.18 Cms)","UUR Alloy 28.6mm (2.86 Cms)","KENLI KL -441","Front & Rear SHIMANO ALTUS hydraulic disc brakes","yes","yes");
INSERT INTO products VALUES("115","9","5","8","2020-05-01 22:22:44","Hero Sprint Pro","hero-sprint-pro-caliber-27-5-d.jpg","hero-sprint-pro-caliber-27-5-d-1.jpg","","","12150","14150","20","sale","<p>FRAME</p>
<p>The Hero Sprint Pro Caliber 27.5 D is a Urban MTB which has a Steel Hardtail Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Pro Caliber 27.5 D is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Hero Cycles comes with Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Pro Caliber 27.5 D has a Threadless Suspension Fork with 90mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Sprint Pro Caliber 27.5 D comes with a pair of Small Block 27.5\" x 2.1\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","15","15","40cms","Steel Hardtail Frame","17kgs","Hardtail","","","","27.5\"","Small Block 27.5\" x 2.1\"","","38T","","","","Black","","Steel","Steel 680mm","","","Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("116","9","6","16","2020-04-29 00:42:18","Montra Rock","1FPJ23G0622000A.png","","","","30700","","","new","<p><span style=\"color: #30363e; font-family: open_sanssemibold; font-size: 16px;\">If off-road cycling is your calling, the Montra Rock 4.1 is your calling. Exploring uphill trails is now more thrilling than ever with this beast by your side. The right componenets make it a comfortable and swift ride.</span></p>","5","5","33cms,40cms,45cms,48cms","Hardtail, 6061 Aluminium Alloy","","","","Shimano Altus, Fd-M310, 3-Speed","Shimano Acera, Rd-M360, 8-Speed","","Kenda, K1010, 27.5X2.1","Kmc Z7, 8-Speed","Shimano Tourney, Fc-M131, 42/34/24T","","","","Black","Wellgo, Alloy Body, Alloy Cage","Zoom, Alloy, L: 300Mm, D: 30.4Mm","XMR By Zoom, Alloy, L: 680Mm (M&L), 640Mm (S), D: 31.8Mm,","XMR By Zoom, Alloy, L: 50Mm, D: 31.8Mm","","Tektro Novela, Mechanical Disc, 160/160Mm Rotors","no","yes");
INSERT INTO products VALUES("117","9","7","16","2020-04-29 00:46:44","Montra Rock 1.0","1FPJ47G0069000A.png","","","","18800","","","new","<p><span style=\"color: #30363e; font-family: open_sanssemibold; font-size: 16px;\">Montra Rock 1.0 is your weekend warrior and a great multi-purpose machine for mountain and town. This bicycle is a capable, confident machine for legitimate trails. The Rock 1.0 lets the rider cruise around town too, but still maintains the mountain biker identity. It is a great entry-level bicycle that you will be able to ride harder and faster than most.</span></p>","5","5","33cms,38cms","Hardtail, 6061 Aluminium Alloy","","","","Shimano Tourney, Fd-Ty500, 3-Speed","Shimano Tourney, Rd-Ty300, 7-Speed","","Kenda Komodo, K1027, 26X2.1","Kmc Z51, 7-Speed","Prowheel Ma-Ae43, 42/34/24T","","","","Orange","Neco, Resin Body, Alloy Cage","Zoom, Alloy, L: 300Mm, D: 27.2Mm","XMR By Zoom, Alloy, L: 680Mm (M&L), 640Mm (S), D: 31.8Mm","","","Promax Tx-117 , Alloy, V-Brake, 110Mm Arms","no","yes");
INSERT INTO products VALUES("118","9","7","16","2020-04-29 12:06:39","Montra Rock 2.1","1FPJ65G0A50000A.png","","","","26500","","","new","<p><span style=\"color: #30363e; font-family: open_sanssemibold; font-size: 16px;\">Being an adrenaline junkie and pushing your limits is what the Rock 2.1 is about. With its Kenda Komodo Tyres and Shimano Shifters this bike gives you the grip you need while exploring unpaved terrains. The comfort of a mountain bike mixed with its marvellous agility.</span></p>","5","5","33cms,40cms","Hardtail, 6061 Aluminium Alloy","","","","Shimano Altus, Fd-M310, 3-Speed","Shimano Altus, Rd-M310, 8-Speed","","Kenda Komodo, K1027, 29X2.1","Kmc Z72, 8-Speed","Prowheel Ma-Ae43, 42/34/24T","","","","black","Neco, Resin Body, Alloy Cage","Zoom, Alloy, L: 300Mm, D: 30.4Mm","XMR By Zoom, Alloy, L: 680Mm (M&L), 640Mm (S), D: 31.8Mm","XMR By Zoom, Alloy, L: 50Mm, D: 31.8Mm","","Logan Lg-300, Mechanical Disc, 160/160Mm Rotors","no","yes");
INSERT INTO products VALUES("119","9","5","14","2020-05-01 22:21:29","Frog Manchester","frog-manchester-27-5.jpg","","","","18599","","","new","<p>FRAME</p>
<p>The Frog Manchester 27.5\" is a Mountain Bicycle which has an 18.5\" Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Manchester 27.5\" has a Shimano Tourney TY500 3-Speed front derailleur, a Shimano Tourney TY500 7-Speed rear derailleur and Shimano EZFire shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Frog comes with Zoom Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Manchester 27.5\" has a Zoom 389 Suspension fork with Lockout option.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Manchester 27.5\" comes with a pair of 27.5\" x 2.2\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","0","0","33cms,38cms","18.5\" Alloy","15kgs","Hardtail","","Shimano Tourney TY500 3-Speed","Shimano Tourney TY500 7-Speed","27.5\"","27.5\" x 2.2\"","Shimano EZFire 21-Speed","","","","Shimano MF TZ21","Red","","Alloy QR","","","","Zoom Disc Brakes","yes","yes");
INSERT INTO products VALUES("120","9","6","17","2020-05-02 13:31:44","Avalanche Sport","gt-avalanche-sport-29-2019-black.jpg","","","","42485","","","old","<p>FRAME</p>
<p>The GT Avalanche Sport 29 (2019) is a Mountain Bicycle which has a 6061 T6 Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The GT Avalanche Sport 29 (2019) has a Shimano Atus 3-Speed front derailleur, a Shimano Alivio 9-Speed rear derailleur and Shimano Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from GT comes with Tektro Hydraulic Disc Brakes which are connected to Tektro Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The GT Avalanche Sport 29 (2019) has a Siuntour XCT-DS Suspension fork with 100mm travel and Hydraulic Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The GT Avalanche Sport 29 (2019) comes with a pair of WTB Transition 29\" x 2.25\" tires which are attached to WTB ST i19 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>GT Bicycles is an American company founded in 1972. GT was born with the simple vision: To help riders push the envelope of what is possible on two wheels. GT build cycles with the perfect balance between performance and refinement.</p>","5","5","40cms,48cms,53cms,55cms","6061 T6 Aluminum Frame, w/ Triple Triangle™, Zerostack Tapered 1 1/8-1 1/2 Head Tube","","","","Shimano Altus, 34.9m Clamp","Shimano Alivio, 9-Speed","29","WTB Transition, 27.5x2.25","Shimano Altus, (3x9-Speed)","All Terra, 44/32/22T","","","","Black","GT Slim Line Flat Pedal","All Terra Micro Adjust, 6061 Alloy, 30.9x350mm","GT All Terra Alloy Riser, 25mm Rise, 8° sweep, 6° Rise, 720mm","All Terra Alloy 1 1/8” Threadless, 4-Bolt W/ CNC Face Plate, 31.8mm, 8° Deg","","Tektro Hydraulic Disc, 160/160mm Rotors","yes","yes");
INSERT INTO products VALUES("121","9","6","18","2020-05-02 21:07:42","Rincon","giant-rincon-2019-blue.jpg","","","","29999","","","old","<p>FRAME</p>
<p>The Giant Rincon (2019) is a Mountain Bicycle which has a ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Rincon has a Shimano Tourney TY300 3x7-Speed gear set with Shimano ST-EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Giant comes with Tektro 832AL V-Brakes which are connected to Tektro 832AL brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Rincon has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Rincon comes with a pair of Kenda 27.5\" x 1.95\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>
<p>&nbsp;</p>","5","5","40cms,45cms,48cms","ALUXX-Grade Aluminium","13.4kgs","Hardtail","","Shimano Tourney TY300 3-Speed ","Shimano Tourney TY300 7-Speed","27.5","Giant 27.5","Shimano ST-EF500","ProWheel 24/34/42","","","Shimano MF-TZ500 14/28","Blue","PP","Alloy","Alloy","Alloy","","Tektro 832AL","yes","yes");
INSERT INTO products VALUES("122","9","6","17","2020-05-02 13:35:50","Avalanche Comp","gt-avalanche-comp-29-2019.jpg","","","","45385","","","old","<p>FRAME</p>
<p>The GT Avalanche Comp 29 (2019) is a Mountain Bicycle which has a 6061 T6 Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The GT Avalanche Comp 29 (2019) has a Shimano Alivio 2-Speed front derailleur, a Shimano Deore 9-Speed rear derailleur and Shimano Shimano Alivio shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from GT comes with Shimano Hydraulic Disc Brakes which are connected to Shimano Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The GT Avalanche Comp 29 (2019) has a Siuntour XCM-DS Suspension fork with 100mm travel and Hydraulic Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The GT Avalanche Comp 29 (2019) comes with a pair of WTB Transition 29\" x 2.25\" tires which are attached to WTB SX19 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>GT Bicycles is an American company founded in 1972. GT was born with the simple vision: To help riders push the envelope of what is possible on two wheels. GT build cycles with the perfect balance between performance and refinement.</p>","10","10","53cms,55cms","6061 T6 Aluminum Frame, w/ Triple Triangle™, Zerostack Tapered 1 1/8-1 1/2 Head Tube","15.4kgs","Hardtail","","Shimano Alivio, 2-Speed","Shimano Deore, 9-Speed","29\"","WTB Transition, 27.5x2.25","Shimano Alivio, (2x9-Speed)","All Terra, 36/22T","","","Shimano Alivio 11/36T","Red","GT Slim Line Flat Pedal","All Terra Micro Adjust, 6061 Alloy, 30.9x350mm","GT All Terra Alloy Riser, 25mm Rise, 8° sweep, 6° Rise, 720mm","All Terra Alloy 1 1/8” Threadless, 4-Bolt W/ CNC Face Plate, 31.8mm, 8° Deg","Semi Integrated, Sealed Cartridge, Tapered","Shimano Hydraulic Disc, 160/160mm Rotors","yes","yes");
INSERT INTO products VALUES("123","9","6","18","2020-05-02 21:07:15","Talon 29 ","giant-talon-29-4-gi-2019.jpg","","","","40999","","","old","<p>RAME</p>
<p>The Giant Talon 29 4 GI (2019) is a Mountain Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Talon 29 4 GI has a Shimano Tourney TY300 21-Speed front and rear derailleurs and Shimano ST-EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Giant comes with Tektro TKM 172 Mechanical Disc Brakes which are connected to Tektro TKM 172 brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Talon 29 4 GI has a Suntour M3030 Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Talon 29 4 GI comes with a pair of CST 29\" x 2.25\" tires which are attached to Giant GX03V Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","40cms,48cms,55cms","ALUXX-Grade Aluminium","","Hardtail","","Shimano Tourney TY300 3-Speed","Shimano Tourney TY300 7-Speed","29","CST 29","Shimano ST-EF500","ProWheel 22/32/42","","","Shimano MF-TZ500 11/34","Grey","MTB Caged","Giant Sport Alloy","Giant Sport Alloy","Giant Sport Alloy","","Tektro TKM 172 Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("124","9","5","9","2020-05-04 21:50:37","Mountrail","firefox-mountrail.jpg","","","","52000","","","old","<p>FRAME, FIT AND COMFORT</p>
<p>The Firefox Mountrail is a Mountain Bicycle which has a Alloy Hardtail MTB Frame with internal Cabling.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Mountrail has a Shimano Acera front derailleur, a Shimano Alivio rear derailleur and Shimano Alivio 3x9 Speed shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Shimano Acera Hydraulic Disc Brakes</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Mountrail has a Suntour SCM Suspension Fork with 100mm travel and Remote Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Mountrail comes with a pair Kenda K1104A 27.5\" x 2.1\" tires which are attached to Alex Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","9","40cms,48cms","Alloy Hardtail MTB Smooth weld with internal cabling","","SR SUNTOUR XCM hydraulic lockout 100mm (10 Cms) w/remote lockout","","SHIMANO ACERA M3000","SHIMANO ALIVIO T4000","Alex Alloy 32H Tubeless Ready Double Wall Rims","KENDA K1104A 27.5","SHIMANO ALIVIO SLM 4000, 3 x 9 speed","SHIMANO ACERA M3000, 22x30x40T, 170mm (17 Cms)","","NECO Sealed Cartridge","SHIMANO ALIVIO HG400. 11-32T, 9 speed","Black","FP 906","ZOOM Alloy 30.9mm X 300mm (3.09X30 Cms)","ZOOM Alloy 690mm (69 Cms) , 31.8mm (3.18 Cms)","ZOOM Alloy 28.6mm (2.86 Cms)","NECO Semi cartridge","Front & Rear SHIMANO ACERA hydraulic disc brakes","yes","yes");
INSERT INTO products VALUES("125","10","5","8","2020-05-02 12:19:34","chit","1_17.jpg","","","","20000","","","new","","2","2","33cms","","","","","","","","","","","","","","black","","","","","","","yes","delete");
INSERT INTO products VALUES("126","10","5","8","2020-05-02 12:19:26","chit","1_17.jpg","","","","20000","","","new","","2","2","33cms","","","","","","","","","","","","","","black","","","","","","","yes","delete");
INSERT INTO products VALUES("127","10","5","9","2020-05-03 00:37:47","Voya","firefox-voya-700c.jpg","","","","12000","","","old","<p>FRAME</p>
<p>The Firefox Voya 700C is a Hybrid Bicycle which has an Alloy Hybrid Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Voya 700C is a single-speed bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid bicycle from Firefox comes with a Steel V-Brakes which are connected to Alloy Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Voya 700C has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Voya 700C comes with a pair of Wanda 700x35c tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","45cms","Alloy Hybrid","12.9kgs","Alloy Rigid Fork","","","","Alloy 36H Double Wall Rims","WANDA 700 X 35C","","Steel 40T, 170mm (17 Cms) steel crank","16T","NECO","","Grey"," FP 856","27.2mm X 300mm (2.72X30 Cms)","Steel 660mm (66 Cms), 31.8mm (3.18 Cms)","Alloy 28.6mm (2.86 Cms)","Steel 1-1/8","Steel V brakes with Alloy levers","yes","yes");
INSERT INTO products VALUES("128","10","7","14","2020-05-02 11:58:17","Frog Granite","frog-granite-26-grey.jpg","","","","8299","","","new","<p>FRAME</p>
<p>The Frog Granite 26\" is a City Bicycle which has a 16\" Hardtail Precision Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Granite 26\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Frog comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Granite 26\" has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Granite 26\" comes with a pair of 26\" x 2.125\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","3","3","40cms","16\" Hardtail Precision Steel","12kgs","Rigid","","","","26\"","DSI 26\" x 2.125\"","","Steel 3-piece","","","","Silver","","","","","","V-Brakes","yes","yes");
INSERT INTO products VALUES("129","10","5","14","2020-05-02 11:58:17","Frog TopGun","frog-topgun-26-men-black.jpg","","","","5999","","","new","<p>FRAME</p>
<p>The Frog TopGun 26 Men is a City Bicycle which has a Hi-Ten TIG Welded Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog TopGun 26 Men is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Frog comes with V-Brakes which are connected to Half Alloy Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog TopGun 26 Men has a Lightweight Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog TopGun 26 Men comes with a pair of 26\" x 1.75\" Nylon tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","5","5","48cms,53cms","Hi-Ten TIG Welded Frame","12.7 kgs","Rigid","","","","26\"","26\" x 1.75\" Nylon","","","","","","Black","","With QR","","","","","yes","yes");
INSERT INTO products VALUES("130","10","7","14","2020-05-02 11:58:17","Frog Granite","frog-granite-27-5-red.jpg","","","","8899","","","new","<p>FRAME</p>
<p>The Frog Granite 27.5\" is a City Bicycle which has a 18\" Hardtail Precision Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Granite 27.5\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Frog comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Granite 27.5\" has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Granite 27.5\" comes with a pair of DSI 27.5\" x 2.125\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>
<p>&nbsp;</p>","5","5","45cms,48cms","18\" Hardtail Precision Steel","13.7kgs","Rigid","","","","27.5\"","DSI 27.5\" x 2.125\"","","Steel 3-piece","","","","Black","","Alloy QR","","","","","yes","yes");
INSERT INTO products VALUES("131","10","5","14","2020-05-02 11:58:17","Frog Alphacity","frog-alphacity-ss-26-black.jpg","","","","9333","","","new","<p>FRAME</p>
<p>The Frog Alphacity SS 26\" is a City Bicycle which has a 19\" Hi-Ten Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Alphacity SS 26\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Frog comes with Power V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Alphacity SS 26\" has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Alphacity SS 26\" comes with a pair of Wanda 26\" x 1.95\" tires which are attached to Kelani Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","4","4","40cms","19\" Hi-Ten Steel Frame","13kgs","Rigid","","","","26\"","Wanda 26\" x 1.95\"","","","","","","Green","","Alloy QR","","Alloy","","Power V-Brakes","yes","yes");
INSERT INTO products VALUES("132","10","5","9","2020-05-02 11:58:17","Missfit V SSP","firefox-missfit-v-ssp-black.jpg","","","","2000","","","new","<p><span style=\"color: #333333; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Firefox Bikes reserves the right to make changes to product information without prior notice. Changes include alterations to specifications, price, available cycle models and colour options. Weight of the bike may vary in final production. Product Color may slightly vary due to photographic lighting sources or your monitor settings.</span></p>","5","5","33cms,38cms,40cms","Alloy Hardtail Frame","","Rigid","","","","26","Nylon 26","","Steel 40T","","","16T","Black","PP","Steel","","Zoom Alloy","","V-Brakes","yes","yes");
INSERT INTO products VALUES("133","10","5","14","2020-05-02 11:58:17","Frog Amazon","frog-amazon-26-grey.jpg","","","","8499","9999","15","sale","<p>FRAME</p>
<p>The Frog Amazon 26\" is a City Bicycle which has a Precision Hardtail Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Amazon 26\" is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Frog comes with Power V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Amazon 26\" has a Rigid Steel Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Amazon 26\" comes with a pair of Wanda 26\" x 1.95\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","10","10","33cms,38cms","16","12kgs","Rigid","","","","26","Wanda 26","","","","","","Grey","","Alloy QR","","","","Power V-Brakes","yes","yes");
INSERT INTO products VALUES("134","10","5","13","2020-05-02 11:58:17","Format 2610","format-2610-2018-black-blue.jpg","","","","9592","11990","20","sale","<p>FRAME</p>
<p>The Format 2610 (2018) is a City Bicycle which has a Hi-Ten Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 2610 is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Format comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 2610 (2018) has a Hi-Ten Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 2610 comes with a pair of Duro DB1072 26\" x 1.95\" tires which are attached to Format AL6061 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","38cms","Hi-Ten Steel Fork","","Front Hi-Suspension ","","","","26\"","Duro DB1072 26\" x 1.95\"","","","","","","Black","","Format Steel","Steel Flatbar","Format AL6061","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("135","10","7","13","2020-05-02 11:58:17","Format 2910","format-2910-2018-yellow.jpg","","","","10392","12990","20","sale","<p>FRAME</p>
<p>The Format 2910 (2018) is a City Bicycle which has a Hi-Ten Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 2910 is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Format comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 2910 has a Hi-Ten Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 2910 comes with a pair of Duro DB1072 29\" x 2.1\" tires which are attached to Format AL6061 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>
<p>&nbsp;</p>","5","5","40cms","Hi-Ten Steel","13kgs","Front Hi- Suspension","","","","29\"","Duro DB1072 29\" x 2.1\"","","","","","","Yellow","","Format Steel","Format Steel Flatbar","Format AL6061","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("136","10","5","13","2020-05-02 11:58:17","Format 2710","format-2710-2018-orange.jpg","","","","10392","12990","20","sale","<p>FRAME</p>
<p>The Format 2710 (2018) is a City Bicycle which has a Hi-Ten Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 2710 is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Format comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 2710 has a Hi-Ten Steel Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 2710 comes with a pair of Duro DB1072 27.5\" x 2.1\" tires which are attached to Format AL6061 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","33cms,38cms","Hi-Ten Steel","","","","","","27.5\"","Duro DB1072 27.5\" x 2.1\"","","","","","","Orange","","Format Steel","Format Steel Flatbar","Format AL6061","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("137","10","7","8","2020-05-02 11:58:17","Hero Octane","hero-octane-firefly.jpg","","","","8330","","","new","<p>FRAME</p>
<p>The Hero Octane Firefly is a bicycle for teenage boys which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Octane Firefly is a Single Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Kids Bicycle from Hero comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Octane Firefly has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Octane Firefly comes with a pair of Ralson 26\" x 2\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","5","5","33cms,38cms","Alloy Frame","13.5kgs","Rigid","","","","26","Ralson 26","","Steel 44T","","","Spur 18T","Orange","Plastic","Steel","Steel 620mm","Steel","","V-Brakes","yes","yes");
INSERT INTO products VALUES("138","10","5","8","2020-05-02 11:58:17","Hero Sprint Brook","hero-sprint-brooklyn-27-5.jpg","","","","9395","","","new","<p>FRAME</p>
<p>The Hero Sprint Brooklyn 27.5 is a City Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Brooklyn 27.5 is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Hero Cycles comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Brooklyn 27.5 has a Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Sprint Brooklyn 27.5 comes with a pair of 27.5\" x 1.95\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","5","5","38cms,40cms","Alloy Frame","14.4kgs","Rigid","","","","27.5","27.5","","40T","","","Spur 18T","Blue","Plastic Wide Platform","Steel","Spur Alloy 660mm","Spur Alloy","","V-Brake","yes","yes");
INSERT INTO products VALUES("139","10","5","8","2020-05-02 11:58:17","Hero Octane Park","hero-octane-parkour-26t-1.jpg","hero-octane-parkour-26t-2.jpg","","","10999","","","new","<p>FRAME</p>
<p>The Hero Octane Parkour 26T is a City Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Octane Parkour 26T is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Hero Cycles comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Octane Parkour 26T has an Alloy Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Octane Parkour 26T comes with a pair of 26\" x 1.95\" tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","5","5","33cms,38cms","17","13.4kgs","Rigid","","","","26","26","","44T","","","","Silver","","","Steel 600mm","Steel","","V-Brakes","yes","yes");
INSERT INTO products VALUES("140","10","5","8","2020-05-02 19:47:32","Hero Sprint Siren","hero-sprint-pro-siren-26t-ss-black.jpg","","","","11210","","","old","<p>FRAME</p>
<p>The Hero Sprint Pro Siren 26T SS is a City Bicycle which has a Steel Hardtail Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Pro Siren 26T SS is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This City Bicycle from Hero Cycles comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Pro Siren 26T SS has a Threadless Coil Spring Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Sprint Pro Siren 26T SS comes with a pair of 26\" x 2.1\" tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","5","5","33cms,38cms,40cms","Steel Hardtail Frame","18kgs","Best Front Suspension","","","","26","26","","38T","","","18T","Black","Plastic with Wide Platform","Steel with QR","Steel 660mm","Alloy","","V-Brakes","no","yes");
INSERT INTO products VALUES("141","9","5","9","2020-05-02 13:44:44","Fusion 2.6","firefox-fusion-26-21-speed-green.jpg","","","","14100","","","old","<p>FRAME</p>
<p>The Firefox Fusion 2.6 21Speed is a Mountain Bicycle which has a Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Fusion 2.6 has Shimano Tourney front and rear derailleurs and Shimano shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Rim Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Fusion 2.6 has a Zoom Suspension Fork with 50mm of travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Fusion 2.6 comes with a pair of 26\" x 2.125\" tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","33cms,38cms","Steel Frame","","Hardtail","","Shimano Tourney","Shimano Tourney","26","26","Shimano","","","","","Green","PP","Steel","Steel 580mm","Alloy","","Rim Brakes","no","yes");
INSERT INTO products VALUES("142","9","5","9","2020-05-02 12:18:02","Patrol","firefox-patrol-21s-yellow-white.jpg","","","","16400","","","old","<p>FRAME</p>
<p>The Firefox Patrol 21S is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Patrol 21S has Shimano Tourney front and rear derailleurs and Shimano EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with V-Brakes which are connected to Shimano Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Patrol 21S has a Zoom Suspension Fork with 50mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Patrol 21S comes with a pair of Wand 26\" x 2.125\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","33cms,38cms,40cms","Alloy Hardtail MTB Frame","","Hardtail","","Shimano Tourney","Shimano Tourney","26","Wanda 26","Shimano EF500","Steel 24/34/42T","","","Shimano TZ21 14/28T","Yellow","PP","Steel","Steel 640mm","Alloy","","V-Brakes","yes","yes");
INSERT INTO products VALUES("143","9","6","9","2020-05-02 12:18:25","Soulfly 27.5","firefox-soulfly-27-5.jpg","","","","74700","","","old","<p>FRAME</p>
<p>The Firefox Soulfly 27.5\" is a Mountain Bicycle which has a MTB Superior Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Soulfly 27.5\" has Shimano Deore front and rear derailleurs and Shimano Deore shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Shimano SLX Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Soulfly 27.5\" has a RockShox XC30 TK Suspension Fork with 100mm travel and remote lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Soulfly 27.5\" comes with a pair of 27.5\" MTB tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","0","0","53cms,55cms","MTB Superior Alloy Frame","","Hardtail","","Shimano Deore","Shimano Deore","27.5","27.5","SHIMANO DEORE M6000 2x10 speed","Shimano Hollowtech 2","","","SHIMANO DEORE HG50, 11-36T","Black","FP Alloy","ZOOM Alloy 31.6 X 400mm","ZOOM Alloy 680mm , 31.8mm, Bend 9* , 12mm rise","ZOOM Alloy , 28.6mm, Rise 7*","","Shimano SLX Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("144","9","6","9","2020-05-02 12:14:23","X-Siege D","firefox-x-siege-27-5d.jpg","","","","36500","","","old","<p>FRAME</p>
<p>The Firefox X-Siege 27.5D is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox X-Siege 27.5D has a Shimano Tourney front derailleur, a Shimano Acera rear derailleur and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Tektro M285 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox X-Siege 27.5D has a Suntour XCT Suspension Fork with 100mm travel and Hydraulic Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox X-Siege 27.5D comes with a pair of Kenda K1153 27.5\" x 1.95\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","0","0","53cms,55cms","Alloy Hardtail MTB Frame","14.8kgs","Hardtail","","Shimano Tourney ","Shimano Tourney ","27.5","Kenda K1153 27.5","Shimano Altus 3x8","Shimano TY301 24/34/42T","","","Shimano Alivio HG200 12/32T","Black","FP-953","Alloy","Alloy 680mm","Alloy","","Tektro M285 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("145","9","5","9","2020-05-02 13:45:01","Target S","firefox-target-d-matt-black-red.jpg","","","","23500","","","old","<p>FRAME</p>
<p>The Firefox Target 21 - Speed Disc has a hardtail alloy MTB frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Target 21 - Speed Disc is equipped with a 3-Speed Shimano Tourney Front Derailleur and a 7-Speed Shimano Altus Read Derailleur. The shifting is controlled by 3x7 Speed Shimano EF-51 Shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>The Firefox Target 21 - Speed Disc has front and rear disc brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Target 21 - Speed Disc has an SR Suntour Suspension fork with 63mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Target 21 - Speed Disc has KENDA 26 X 2.10\" tires fitted on Alloy rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","0","0","45cms,48cms,53cms,55cms","Alloy Frame","","Hardtail","","Shimano TX51","Shimano Altus","26\"","Kenda 26\" x 2.10\"","Shimano EF-51","Prowheel 28/38/48T","","","Shimano TZ21 14/28T","Black","Wellgo Nylon Platform","Alloy","Alloy 640mm with 30mm rise","Zoom Alloy","","Disc Brakes","no","yes");
INSERT INTO products VALUES("146","9","5","9","2020-05-02 12:33:06","Kreed ","firefox-kreed-27-5d.jpg","","","","16500","","","old","<p>FRAME</p>
<p>The Firefox Kreed 27.5D is a Mountain Bicycle which has a Steel Hardtail Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Kreed 27.5D has a Shimano Tourney TY 500 3-Speed front derailleur, a Shimano TY500D 7-Speed rear derailleur and Shimano Altus EF500 3x7 Speed shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with JAK 7 Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Kreed 27.5D has a Steel Suspension fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Kreed 27.5D comes with a pair of Wanda P1126 27.5\" x 2.35\" tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","38cms,40cms,45cms","Steel Hardtail MTB","18.8kgs","Hardtail","","Shimano Tourney 3-Speed","Shimano Tourney 7-Speed","27.5\"","Wanda P1226 27.5\" x 2.35\"","Shimano Altus EF500 3x7 Speed","Steel 24/34/42T","","","Shimano TZ500 14/28T","Grey","PP","Steel with QR","Steel 640mm","Alloy","","JAK 7 Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("147","9","5","9","2020-05-02 12:39:29","Stravaro","firefox-stravaro-29er-white.jpg","","","","42000","","","old","<p>FRAME</p>
<p>The Firefox Stravaro 29er is a Mountain Bicycle which has a Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Stravaro has a Shimano Altus front derailleur, a Shimano Acera rear derailleur and Shimano Acera shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Shimano Acera M396 Hydraulic Disc Brake which are connected to Shimano Acera Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Stravaro has a Suntour XCM Suspension fork with 100mm travel and hydraulic lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Stravaro comes with a pair of Kenda K1027 29\" X 2.1\" tires which are attached to Alex Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","40cms,45cms","Alloy Hardtail MTB Frame","","Hardtail","","Shimano Altus","Shimano Acera","29\"","Kenda K1027 29\" X 2.1\"","Shimano Acera","Shimano Acera 22/32/44T","","","Shimano Alivio 11-34T","Silver","Wellgo PP","Zoom Alloy","Zoom Alloy 700mm","Zoom Alloy","","Shimano Acera M396 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("148","9","5","9","2020-05-02 12:45:57","Crusador","firefox-crusador-29-blue.jpg","","","","22300","","","old","<p>FRAME</p>
<p>The Firefox Crusador 29 is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Crusador 29 has a Shimano Tourney front derailleur, a Shimano Altus rear derailleur and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Tektro M300 Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Crusador 29 has a Zoom Suspension Fork with 80mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Crusador 29 comes with a pair of Kenda K1027 29\" x 2.1\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","4","4","45cms,48cms","Alloy Hardtail MTB Frame","15.8kgs","Hardtail","","Shimano Tourney","Shimano Altus","29\"","Kenda K1027 29\" x 2.1\"","Shimano Altus 3x7","Steel 24/34/42T","","","Shimano TZ500 14/34T","Blue","Wellgo","Alloy","Steel 660mm","Alloy","","Tektro M300 Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("149","9","5","9","2020-05-02 13:45:19","Sniper V","firefox-sniper-v-2017.jpg","","","","24200","","","old","<p>FRAME</p>
<p>The Firefox Sniper V (2017) is a bicycle for teenagers which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Sniper V comes with Shimano TX50 front derailleur, Shimano Acera M360 rear derailleur and Shimano EF51 Gear Shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Bicycle from Firefox for teenagers comes with Rim Brakes which are connected to Shimano EF51 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Sniper comes with a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Sniper comes with Kenda 26 x 2.1 inch tires which are attached to Alloy 32H Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","38cms,40cms","Alloy Frame","","Hardtail","","Shimano TX50","Shimano Acera","26\"","Kenda 26\" x 2.1\"","Shimano EF-51","Prowheel 24/34/42T","","","","Green","","Zoom Alloy","Zoom 660mm with 20mm rise","Zoom Alloy","","Rim Brakes","no","yes");
INSERT INTO products VALUES("150","9","5","9","2020-05-02 12:58:43","Flextrail","firefox-flextrail-27-5d-black.jpg","","","","25000","","","old","<p>FRAME</p>
<p>The Firefox Flextrail 27.5D is a Mountain Bicycle which has an Alloy Hardtail MTB Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Flextrail 27.5D has a Shimano Tourney front derailleur a Shimano Acera rear derailleurs and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Firefox comes with Tektro M300 Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Flextrail 27.5D has a Suntour XCE Suspension Fork with 100mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Flextrail 27.5D comes with a pair of Kenda K1027 27.5\" x 2.1\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","45cms,48cms","Alloy Hardtail MTB Frame","15.4kgs","Hardtail","","Shimano Tourney","Shimano Acera","27.5\"","Kenda K1027 27.5\" x 2.1\"","Shimano Altus 3x7","ProWheel 24/34/42T","","","Shimano TZ500 14/28T","Black","Wellgo","Zoom Alloy","","Zoom Alloy","","Tektro M300 Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("151","9","5","13","2020-05-02 13:28:10","Format Tornado","format-tornado-2018-yellow.jpg","","","","22500","","","old","<p>FRAME</p>
<p>The Format Tornado (2018) is a Mountain Bicycle which has a AL 6061 Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format Tornado has a Shimano Tourney front derailleur, a Shimano Altus rear derailleur and Shimano Tourney ST-EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format Tornado (2018) has a Hi-Ten Suspension Fork with Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format Tornado comes with a pair of Kenda K1153 29\" x 2.1\" tires which are attached to Format AL6061 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","40cms,45cms","AL 6061 Frame","","Hardtail","","Shimano Tourney","Shimano Altus","29\"","Kenda K1153 29\" x 2,1\"","Shimano Tourney ST-EF500 3x8","","","","","Black","","Format Steel","Format Steel Flatbar","Format AS602 AL6061","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("152","9","6","17","2020-05-02 13:45:28","Verb Elite","1461284866.34-Verb Elite (2016).jpg","","","","52800","88000","40","sale","<p>FRAME</p>
<p>The GT Verb Elite 27.5 (2016) is a MTB, which comes with a 6061-T6 Aluminum 27.5 Frame with a 120mm Travel with a 1-1/8\" to 1-1/2\" integrated Head Tube.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Verb Elite (2016) comes with Shimano Deore, FD-M618L Front Derailleur and a Shimano Deore, RD-M592- SGS Rear Derailleur. Shimano Alvio SL-M4000, Rapid Fire shifters control the drivetrain.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from GT comes with Shimano BR-M355, Hydraulic Disc Brakes with 180mm Rotor that are connected to Shimano BR-M355 Brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The GT Verb Elite 27.5 comes with a SR Suntour XCR RL DS Suspension with a 120mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Wheels size of the cycle is 27.5\". The tires on the GT Verb Elite are All-Terra Cypher 27.5\" x 2.10\" tires, and these are fitted on to Alex ASD10-27.5 Double Wall, 32H 27.5, Disc Specific Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>GT Bicycles is an American company founded in 1972. GT was born with the simple vision: To help riders push the envelope of what is possible on two wheels. GT build cycles with the perfect balance between performance and refinement.</p>","5","5","53cms,55cms","6061-T6 ALUMINUM 27.5 FRAME, 120MM TRAVEL INDEPENDENT DRIVETRAINï¾® W/FORGED LINKAGE, PIVOTS, 1 1/8\" -1 1/2\" INTEGRATED HEAD TUBE, AND 135MM QR DROPOUTS","","Full Suspension","","SHIMANO DEORE, FD-M618L","SHIMANO DEORE, RD-M592-SGS","27.5\"","ALL TERRA CYPHER 27.5X2.10\"","SHIMANO ALIVIO, SL-M4000, RAPID FIRE","SR SUNTOUR XCM D, 38/24T, (2X9-SPEED)","","","SUNRACE CSM98, 11-36T, 9-SPEED","Orange","GT SLIM LINE FLAT PEDAL, CAST ALLOY","ALL TERRA ALLOY MICRO-ADJUST, 31.6MM","ALL TERRA 6061 ALUMINUM RISER, 720MM WIDTH, 15MM RISE, 31.8MM CLAMP","ALL TERRA 1 1/8\" THREADLESS, 4-BOLT W/ CNC FACE PLATE, 10ï¾° RISE, 31.8MM CLAMP, 60MM","","Disc Brakes","no","yes");
INSERT INTO products VALUES("153","9","6","17","2020-05-02 13:53:31","Zaskar Carbon ","1461284874.24-Zaskar Carbon (2016).jpg","","","","153000","","","old","<p>FRAME</p>
<p>The GT Zaskar Carbon Elite 27.5 (2016) is a MTB, which comes with a Carbon Triple Triangle Frame with 12 x 142mm Thru Axle Dropouts and 1-1/8\" to 1-1/2\" tapered Head Tube.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Zaskar Carbon Elite (2016) comes with a Shimano Deore 2-Speed Front Derailleur and a Shimano SLX Shadow Plus, RD-M675- GS, 10-Speed Rear Derailleur. Shimano SLX SL-M670 Rapid Fire shifters control the drivetrain.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from GT comes with Shimano Deore BR-M615 Hydraulic Disc Brakes with 160mm centerlock Rotors that are connected to Shimano Deore BL-M615 Brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The GT Zaskar Carbon Elite 27.5 comes with a Rockshox Recon Gold RL 27.5, Solo Air with Rebound Adjust, Poploc Remote Lockout Suspension with a 100mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Wheels size of the cycle is 27.5\". The tires on the GT Zaskar Carbon Elite are Schwalbe Racing Ralph 27.5 x 2.25\", Folding Bead tires, and these are fitted on to WTB ST I19 TCS 27.5\", 32H Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>GT Bicycles is an American company founded in 1972. GT was born with the simple vision: To help riders push the envelope of what is possible on two wheels. GT build cycles with the perfect balance between performance and refinement.</p>","0","0","45cms,55cms","CARBON FRAME, TRIPLE TRIANGLEï¾ FRAME CONSTRUCTION, BB96 SHELL, 12X142MM THRU AXLE DROPOUTS, AND 1 1/8","","Hardtail","","SHIMANO DEORE (2-SPEED)","SHIMANO SLX SHADOW PLUS, RD-M675-GS, 10-SPEED View Details","27.5","SCHWALBE RACING RALPH 27.5X2.25","SHIMANO SLX, SL-M670, RAPID FIRE","SUNRACE CS-MS1, 11-36T, 10-SPEED","","","SHIMANO DEORE, FD-M617-H, 2-SPEED","Orange","","ALL TERRA ALLOY MICRO-ADJUST, 31.6MM","KORE XCD-R1 RISER, DOUBLE BUTTED, 710MM WIDTH, 13MM RISE, 31.8MM CLAMP","KORE XCD1, 1-1/8","","Disc Brakes","no","yes");
INSERT INTO products VALUES("154","9","5","13","2020-05-02 19:52:57","Format 1215","format-1215-2018.jpg","","","","57900","","","old","<p>FRAME</p>
<p>The Format 1215 (2018) is a Mountain Bicycle which has a Format Double Butted Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 1215 has a Shimano Acera front derailleur, a Shimano Acera rear derailleur and Shimano Alvio shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Shimano M396 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 1215 has a RockShox XC30 Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 1215 comes with a pair of Kenda 27.5\" tires which are attached to Format Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","45cms,53cms","Format Double Butted Alloy Frame","","Hardtail","","Shimano Acera","Shimano Alivio","27.5\"","Kenda 27.5\"","Shimano Alivio 3x10","","","","","Red","","Alloy","Alloy","Alloy","","Shimano M396 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("155","9","5","13","2020-05-02 20:40:18","Format 1312","format-1312-2018.jpg","","","","59900","","","old","<p>FRAME</p>
<p>The Format 1312 (2018) is a Mountain Bicycle which has a Format Double Butted Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 1312 has a Shimano Alivio front and rear derailleurs and Shimano Alivio shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Shimano M396 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 1312 has a RockShox XC30 Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 1312 comes with a pair of Maxxis Ardent Exo 27.5\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","45cms,48cms","Format Double Butted Alloy Frame","","Hardtail","","Shimano Alivio","Shimano Alivio","27.5\"","Maxxis Ardent Exo 27.5\"","Shimano Alivio 3x9","","","","","Yellow","","Alloy","Alloy","Alloy","","Shimano M396 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("156","9","5","13","2020-05-02 20:46:48","Format Buk 1.0","format-buk-1-0-2018.jpg","","","","68900","","","old","<p>FRAME</p>
<p>The Format Buk 1.0 (2018) is a Mountain Bicycle which has a Format Carbon Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format Buk 1.0 has Shimano Altus front and rear derailleurs and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Shimano M315 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format Buk 1.0 has a Remote Air Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format Buk 1.0 comes with a pair of Kenda K1153 27.5\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","48cms,53cms","Format Carbon","","Format Carbon","","Shimano Altus","Shimano Altus","27.5\"","Kenda K1153 27.5\" x 2.1\"","Shimano Altus 3x9","","","","","Black","","Alloy","Alloy","Alloy","","Shimano M315 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("157","9","6","13","2020-05-02 20:51:51","Format Des 90","format-des-90-2018.jpg","","","","72900","","","old","<p>FRAME</p>
<p>The Format Des 90 (2018) is a Mountain Bicycle which has a Format Alloy U6 Superlight Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format Des 90 (2018) has Shimano XT front and rear derailleurs and Shimano XT shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Shimano M506 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format Des 90 has a X Fusion Shock Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format Des 90 comes with a pair of Maxxis 27.5\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","5","5","53cms,55cms","Format Alloy U6 Superlight Frame","","Hardtail","","Shimano XT","Shimano XT","27.5\"","Maxxis 27.5\"","Shimano XT 1x11","","","","","Black","","Alloy","Alloy","Alloy","","Shimano M506 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("158","9","6","13","2020-05-02 20:55:44","Format 1311 Elite","format-1311-elite-2018.jpg","","","","74900","","","old","<p>FRAME</p>
<p>The Format 1311 Elite (2018) is a Mountain Bicycle which has a Format Double Butted Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Format 1311 Elite has Shimano Deore front and rear derailleurs and Shimano Deore shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Format comes with Shimano M506 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Format 1311 Elite has a ROckShox Recon Silver TX Solo Air Suspension Fork with 120mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Format 1311 Elite comes with a pair of Maxxis Ardent Exo 27.5\" tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Format is a baby of the Russian Cycling Culture which has been born out of enthusiasm. Format bicycle are known for their highest quality standards and aesthetic design.</p>","0","0","55cms","Format Double Butted Alloy Frame","","Hardtail","","Shimano Deore","Shimano Deore","27.5\"","Maxxis Ardent Exo 27.5\"","Shimano Deore 2x10","","","","","Red","","Alloy","Alloy","Alloy","","Shimano M506 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("159","9","6","18","2020-05-03 19:44:39","Giant ATX","giant-atx-1-2019 (1).jpg","","","","41999","","","old","<p>FRAME</p>
<p>The Giant ATX 1 (2019) is a Mountain Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant ATX 1 comes with a Shimano Tourney 3-Speed front derailleur, a Shimano Acera M360 8-Speed rear derailleur and Shimano EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Giant comes with Tektro TKB-172 Mechanical Disc Brakes which are connected to Shimano EF500 brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant ATX 1 has a Suntour XCT HLO Suspension Fork with 100mm travel and Suspension Lockout.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant ATX 1 comes with a pair of Giant Quickcross 27.5\" x 2.1\" tires which are attached to Giant GX28 Disc Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","45cms,53cms,55cms","ALUXX-Grade Aluminium","14.5kgs","Hardtail","","Shimano Tourney 3-Speed","Shimano Acera M360 8-Speed","27.5","Giant Quickcross 27.5","Shimano EF500 3x8","ProWheel forged 24/34/42","","","Shimano HG31 11/32","Grey","","Giant Sport","Giant Sport XC","Giant Sport Alloy","","Tektro TKB-172","yes","yes");
INSERT INTO products VALUES("160","9","6","18","2020-05-02 21:14:17","Giant Fathom","giant-fathom-29er-2-2019-black.jpg","","","","97999","","","old","<p>FRAME</p>
<p>The Giant Fathom 29er 2 (2019) is a Mountain Bicycle which has an ALUXX SL-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Fathom 29er 2 has a Shimano Deore Shadow + 10-Speed rear derailleur and Shimano Deore shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This MTB from Giant comes with Shimano M315 Hydraulic Disc Brakes which are connected to Shimano M315 brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Fathom 29er 2 has a Suntour Raidon 32 XC LO-R with 100 mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Fathom 29er 2 comes with a pair of Maxxis Ikon 29\" x 2.2\" tires which are attached to Giant XC-2 29 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","3","3","53cms,55cms","ALUXX SL-Grade Aluminium","","Hardtail","","Shimano Deore Shadow+ 10-Speed","","29\"","Maxxis Ikon 29\" x 2.2\" Tubeless","Shimano Deore 10-Speed","FSA Comet CK-7158ST 24/38T","","","Shimano HG400-9 12/36","Black","MTB Caged","Giant Contact Switch Dropper post with remote lever","Giant Connect Trail 780mm","Giant Connect","","Shimano M315 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("161","10","5","13","2020-05-03 00:20:23","Fomas Absolute","fomas-absolute-5-0.jpg","","","","20990","","","old","<p>FRAME</p>
<p>The Fomas Absolute 5.0 is a Hybrid Bicycle which has a 19 inch Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Fomas Absolute 5.0 has a Shimano Tourney TX500 3-Speed front derailleur, a Shimano Altus M310 8-Speed rear derailleur and Shimano ST-EF500 3x8-Speed shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Fomas comes with Linear Pull V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Fomas Absolute 5.0 has a Rigid Steel Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Fomas Absolute 5.0 comes with a pair of Kenda 700x32c tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Fomas is a Chinese Manufacturer of Bicycles and hit the Indian Market in 2016 with their complete range of Adult Bicycles. Fomas cycles are straight forward and specific to every type of riding category.</p>","5","5","48cms,53cms","19\" Alloy","","Rigid","","Shimano Tourney TX500 3-Speed","Shimano Altus M310 8-Speed","700c","Kenda 700x32C","Shimano ST-EF500 3x8","ProWheel 28/38/48T","","","Shimano HG200 12/32T","Red","Plastic","Alloy with QR","680mm Alloy","Zoom Alloy","","Linear Pull V-Brakes","yes","yes");
INSERT INTO products VALUES("162","10","6","18","2020-05-03 00:27:35","Giant Escape","giant-escape-3-2019-black.jpg","","","","29999","","","old","<p>FRAME</p>
<p>The Giant Escape 3 (2019) is a Hybrid Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Escape 3 has a Shimano Tourney 3-Speed front derailleur, a Shimano Tourney RD-TX55 7-Speed rear derailleur and Shimano ST-EF40 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Giant comes with Tektro TK837 V-Brakes which are connected to Shimano EF51 brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Escape 3 has a High Tensile Chromoly Steel Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Escape 3 comes with a pair of Giant S-X3 Puncture Protect 700x32c tires which are attached to Giant GX02 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","40cms,48cms,53cms","ALUXX-Grade Aluminium","12.3kgs","Rigid","","Shimano Tourney 3-Speed","Shimano Tourney RD-TX55 7-Speed","700c","Giant S-X3 Puncture Protectt 700x32c","Shimano ST-EF30 3x7","Shimano FC-M131 28/38/48","","","Shimano MFTZ21 14/34","Black","Giant Sport","Giant Sport","Giant Sport","Giant Sport Ahead","","Tektro TK837","yes","yes");
INSERT INTO products VALUES("163","10","5","18","2020-05-03 00:37:30","Giant Roam","giant-roam-2-disc-2020-pure-red.jpg","","","","49999","","","old","<p>FRAME</p>
<p>The Giant Roam 2 Disc (2020) is a Hybrid Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Roam 2 Disc has a Shimano Acera 2x9-Speed drivetrain and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Giant comes with Tektro HMD 275 Hydraulic Disc Brakes which are connected to Tektro Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Roam 2 Disc has a Suntour NEX HLO Suspension Fork with Lockout and 63mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Roam 2 Disc comes with a pair of Giant CrossCut 700x42c tires which are attached to Giant Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","45cms,53cms,55cms","ALUXX-Grade Aluminium","","Shimano Front Suspension","","Shimano Acera 2-Speed ","Shimano Acera 9-Speed","700c","Giant CrossCut 700x42c","Shimano Altus","Forged Alloy","","","Shimano HG200 11/36T","Red","Platform","","Giant Connect Low Rise","Giant Sport Alloy","","Tektro HMD275 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("164","10","5","9","2020-05-03 00:43:37","Road Runner Pro","firefox-road-runner-pro-v.jpg","","","","18300","","","old","<p>FRAME</p>
<p>The Firefox Road Runner Pro - V Brake (2015) has an alloy hybrid frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Road Runner Pro - V Brake (2015) is equipped with a 3-Speed, Shimano Tourney Front Derailleur and a 7-Speed, Shimano Tourney Rear Derailleur. The shifting is controlled by 21-Speed Shimano EF-51 Shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>The Firefox Road Runner Pro - V Brake (2015) has front and rear rim brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Road Runner Pro - V Brake (2015) has a Front suspension fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Road Runner Pro - V Brake (2015) has 700c wheels with 700x35C tired fitten on double-walled alloy rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","48cms,53cms","Alloy Frame","","Front Suspension x3","","Shimano TX51","Shimano TX51 ","700c","Wanda 700 x 35C","Shimano Tourney EF-51","Steel 28/38/48T","","","Shimano TX 500,14-28T,7 speed","Black","Wellgo Plastic","Steel","Steel 600mm with 30mm rise","Zoom Alloy","","Rim Brakes","yes","yes");
INSERT INTO products VALUES("165","10","5","9","2020-05-03 00:48:59","Volante","firefox-volante-blue.jpg","","","","31000","","","old","<p>FRAME</p>
<p>The Firefox Volante is a Hybrid Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Volante has a Shimano Altus front derailleur and a Shimano Acera rear derailleur and Shimano Acera shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Firefox comes with Tektro M730 V-Brakes which are connected to Tektro MT2.0 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Volante has a Rigid Alloy Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Volante comes with a pair of Kenda K184 700X35c tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","6","6","45cms,53cms","Alloy Hybrid Frame","","Rigid","","Shimano Altus","Shimano Acera","700c","Kenda K184 700 X 35c","","","","","Shimano Acera HG200 11-32T","Blue","Wellgo PP","Zoom Alloy","Zoom Alloy 660mm","Zoom Alloy","","TEKTRO M730 V-Brakes","yes","yes");
INSERT INTO products VALUES("166","10","6","9","2020-05-03 00:59:28","Origine 700c","firefox-origine-700c.jpg","","","","43000","","","old","<p>FRAME</p>
<p>The Firefox Origine 700c is a Hybrid Bicycle which has an Alloy Hybrid Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Origine 700c has a Shimano Altus front derailleur, a Shimano Acera rear derailleur and Shimano Alivio shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Firefox comes with Tektro M285 Hydraulic Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Origine 700c has a Alloy Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Origine 700c has a pair of Kenda K193 700x32c tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","10","10","45cms,48cms,53cms,55cms","Alloy Hybrid Frame","12.2kgs","Rigid","","Shimano Altus","Shimano Alivio","700c","Kenda K193 700x32c","Shimano Alivio 3x9","Shimano Acera M371 22/32/44T","","","Shimano Acera HG200 11/32T","Red","Wellgo C157","Zoom Alloy","Zoom Alloy 620mm","Zoom Alloy","","Tektro M285 Hydraulic Disc Brakes","yes","yes");
INSERT INTO products VALUES("167","10","5","9","2020-05-03 20:06:03","Athelio Single","firefox-athelio-single-speed-matt-silver.jpg","","","","12300","","","old","<p>FRAME</p>
<p>The Firefox Athelio Single-Speed is a Hybrid Bicycle which has an Alloy Hybrid Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Athelio is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid from Firefox comes with V-Brakes with Plastic Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Athelio has a Zoom Suspension Fork with 45mm of travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Athelio comes with a pair of 700x35C tires which are attached to Alloy 36H Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","0","0","53cms","Hybrid Alloy","","Front Suspension 3x","","","","700c","700 x 35C","","Steel 40T","","","","Silver","Plastic","","Steel 640mm with 30mm rise","Zoom Alloy","","V-Brakes","no","yes");
INSERT INTO products VALUES("168","10","5","8","2020-05-03 19:58:47","Hero  Manhattan ","hero-sprint-manhattan-700c.jpg","","","","9320","","","old","<p>FRAME</p>
<p>The Hero Sprint Manhattan 700c is a Hybrid Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Manhattan 700c is a Single-Speed Bicycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Hybrid Bicycle from Hero Cycles comes with V-Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Manhattan 700c has a Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Sprint Manhattan 700c comes with a pair of 700c tires which are attached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","0","0","38cms,45cms","Alloy Frame","13.8kgs","Rigid","","","","700c","700c","","40T","","","Spur 18T","Yellow","","Steel","Spur Alloy 660mm","Alloy","","V-Brakes","yes","yes");
INSERT INTO products VALUES("169","11","6","8","2020-05-04 00:11:43","Hero Iguana","hero-octane-iguana-700c.jpg","","","","29700","","","old","<p>FRAME</p>
<p>The Hero Octane Iguana 700C is a Road Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Octane Iguana 700C has a Shimano Claris 2x8 Speed drivetrain.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Hero Cycles comes with Caliper Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Octane Iguana 700C comes with an Alloy Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Octane Iguana 700C comes with a pair of 700c tires which are ttached to Double Wall Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","5","5","55cms","Alloy Frame","12.6kgs","Rigid","","Shimano Claris 2-Speed","Shimano Claris 8-Speed","700c","700c","Shimano Claris","ProWheel 34/50T","","","11/32T","Black","Traction-Alloy with Grip Nodes","Alloy with QR","Alloy 420mm","Alloy","","Caliper Brakes","yes","yes");
INSERT INTO products VALUES("170","11","6","9","2020-05-05 19:49:48","Tarmak","firefox-tarmak.jpg","","","","44000","","","old","<p>FRAME</p>
<p>The Firefox Tarmak is a Road Bicycle which has an Alloy Rigid Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Tarmak has Shimano Sora front and rear derailleurs and Shimano Sora shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Firefox comes with tektro R312 Caliper Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Tarmak has a Carbon Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Tarmak comes with a pair of Kenda K152 700x25c tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","4","48cms,53cms","Alloy Rigid Frame","11kgs","Rigid","","Shimano Sora","Shimano Sora","700c","Kenda K152 700x25c","Shimano Sora 2x9","Shimano R345 50/34T","","","Shimano HG50 12/25T","Blue","Wellgo Toe Clip w/Strap","Zoom Alloy","Zoom Alloy 420mm","Zoom Alloy","","Tektro R312 Caliper Brakes","yes","yes");
INSERT INTO products VALUES("171","10","6","9","2020-05-08 16:17:22","Firefox Aeron","firefox-aeron-700c.jpg","","","","34800","","","old","<p>FRAME</p>
<p>The Firefox Aeron 700C is a Road Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Aeron 700C has a Shimano Claris 2-Speed front derailleur, a Shimano Claris 8-Speed rear derailleur and Shimano Claris shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bike from Firefox comes with Tektro Alloy Caliper Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Aeron 700C has a Rigid Alloy Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Aeron 700C comes with a pair of Wanda P1035 700x25C tires which are attached to Alloy Double Wall Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","1","1","55cms","Alloy Frame","11.8kgs","Rigid","","Shimano Claris R2030 2-Speed","Shimano Claris R2000 8-Speed","700c","Wanda P1035 700x25c","Shimano Claris R2000 2x8 Speed","Shimano RS200 50/34T","","","Shimano HG50 11/28T","Black","Alloy","Zoom Alloy","Zoom Alloy 420mm","Zoom Alloy","Zoom Alloy 420mm","Tektro Alloy Caliper Brakes","yes","yes");
INSERT INTO products VALUES("172","11","6","12","2020-05-08 16:24:57","Ridley Damocles","ridley-damocles-1-claris-2019.jpg","ridley-damocles-1-claris-2019-2.jpg","ridley-damocles-1-claris-2019-1.jpg","","52999","","","old","<p>FRAME</p>
<p>The Ridley Damocles 1 (Claris) (2019) is a Road Bicycle which has a Damocles Advanced 6061 Alu Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Ridley Damocles 1 (Claris) has a Shimano Claris R2000 2x8 Speed gear set which is connected to Shimano Claris R2000 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Ridley comes with Shimano Claris R2000 Caliper Brakes which are connected to Shimano Claris R2000 brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley Damocles 1 (Claris) has a Rigid Fork with Carbon Blades and an Alloy Steerer.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley Damocles 1 (Claris) comes with a pair of Continetal Ultra Sport II 700x25c tires which are attached to Weinmann Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","4","4","53cms,55cms","Damocles Advanced 6069 Alu","","Rigid","","Shimano Claris R2000 2-Speed","Shimano Claris R2000 8-Speed","700c","Continental Ultra Sport II 700x25c","Shimano Claris R2000 2x8","Shimano Claris R2000 50/34T","","","Shimano Claris R2000 11/30T","BLack","","Zoom SP-218","Zoom DR-AL-210BT","Zoom TDS-RD701","Zoom DR-AL-210BT","Shimano Claris R2000 Caliper Brakes","yes","yes");
INSERT INTO products VALUES("173","11","6","12","2020-05-08 16:36:55","Ridley Fenix","ridley-fenix-a-105-2018.jpg","","","","92064","109600","16","sale","<p>FRAME</p>
<p>The Ridley Fenix A (105) (2018) is a Road Bicycle which has a Fenix A Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Ridley Fenix A (105) has Shimano 105 front and rear derailleurs and Shimano 105 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Ridley comes with Forza Stratos V-Brakes which are connected to Shimano 105 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley Fenix A (105) has a Fenix SL 24t HM UD Carbon Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley Fenix A (105) comes with a pair of Vittoria Zaffiro tires which are attached to 4ZA RC31 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","6","6","55cms","Fenix A Triple Butted Aluminium","","Rigid","","Shimano 105","Shimano 105","700c","Vittoria Zaffiro","Shimano 105","Shimano FC-RS510 50/34T","","","Shimano 105 11/28T","Black","","4ZA Stratos","4ZA Stratos","4ZA Stratos","","Forza Stratos","no","yes");
INSERT INTO products VALUES("174","11","6","12","2020-05-08 16:42:47","Ridley Helium","ridley-helium-sla-105-mix-2017.jpg","","","","93100","133000","30","sale","<p>FRAME</p>
<p>The Ridley Helium SLA 105 Mix (2017) is a Road Bicycle which has a Helium Superlight 6005-6061 Aluminium frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Ridley Delium SLA comes with Shimano 105 front and rear derailleurs and Shimano 105 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Ridley comes with Rim Brakes which are connected to Shimano 105 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley Helium SLA comes with a Helium SL fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley Helium SLA comes with a pair of Continental Ultrasport 700x25C folding tires which are attached to 4ZA RC23 SL Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","6","6","55cms","Helium Hydroformed Superlight 6005 - 6061 Aluminium","","Rigid","","Shimano 105, FD-5800, 2 Speed","Shimano 105, RD-5800, 11 Speed","700c","Continental Ultrasport, 700x25c, Folding","Shimano 105, ST-5800","","","","","Black","","4ZA stratos","4ZA stratos","4ZA stratos","4ZA stratos","Rim Brakes","yes","yes");
INSERT INTO products VALUES("175","11","6","12","2020-05-08 16:47:49","Ridley Noah","ridley-noah-105-2018.jpg","","","","120363","227100","47","sale","<p>FRAME</p>
<p>The Ridley Noah (105) (2018) is a Road Bicycle which has a Noah 30T-24T HM Unidirectional Carbon Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Ridley Noah (105) has Shimano 105 front and rear derailleurs and Shimano 105 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Ridley comes with Shimano 105 V-Brakes which are connected to Shimano 105 STI Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley Noah (105) has a Noah Aero 30T-24T Full Carbon Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley Noah (105) comes with a pair of Vittoria Zaffiro Pro tires which are attached to 4ZA RC31 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","5","5","48cms,53cms,55cms","Noah, 30T-24T HM Unidirectional Carbon","","Rigid","","Shimano 105","Shimano 105","700c","Vittoria Zaffiro Pro","Shimano 105","FSA Gossamer Pro 50/34T","","","Shimano 105 11/28T","Black","","Noah SL Aero Carbon","4ZA Stratos","4ZA Stratos","","4ZA Cirrus","no","yes");
INSERT INTO products VALUES("176","11","6","12","2020-05-08 16:53:07","Ridley Helium X","ridley-helium-x-ultegra-2018.jpg","","","","177825","237100","25","sale","<p>FRAME</p>
<p>The Ridley Helium X (Ultegra) (2018) is a Road Bicycle which has a Helium X 30T-24T HM Unidirectional Carbon Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Ridley Helium X (Ultegra) has Shimano Ultegra front and rear derailleurs and Shimano Ultegra shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Ridley comes with Shimano Ultegra V-Brakes which are connected to Shimano Ultegra STI Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley Helium X (Ultegra) has a Helium X 30T-24T HM Unidirectional Carbon Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley Helium X (Ultegra) comes with a pair of Vittoria Zaffiro Pro tires which are attached to 4ZA RC23 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","5","5","55cms","Helium X 30T-24T HM Unidirectional Carbon","","Rigid","","Shimano Ultegra","Shimano Ultegra","700c","Vittoria Zaffiro Pro","Shimano Ultegra","Rotor RD30","","","Shimano 105 11/28T","Silver","","4ZA Stratos","4ZA Stratos","4ZA Stratos","","Shimano Ultegra","yes","yes");
INSERT INTO products VALUES("177","11","6","16","2020-05-08 17:08:45","Montra Unplugg","montra-unplugged-2017.jpg","","","","25000","26100","10","sale","<p>FRAME</p>
<p>The Montra Unplugged 1.1 (2017) has a Unplugged 700C, Road 6061 Aluminium Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Unplugged 1.1 (2017) comes with Shimano Tourney FD-A070, 2-Speed Front Derailleur and Shimano Tourney RD-A070, 7-Speed Rear derailleur which are connected to Shimano Tourney ST-070 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road bicycle from Montra comes with Promax RC-452, Caliper Brakes which are connected to Shimano ST-A070 Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Unplugged 1.1 comes with a 700C, Rigid Alloy Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Montra Unplugged 1.1 has Kenda K191, 700 x 23C tires which are fitted on XMR 700C, Alloy Double Wall 32H Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>T.I Cycles of India launched their own performance bicycle brand Montra in 2011. Montra Bicycles are known for their quality components, attractive graphics and affordability. Montra has a complete range of MTBs, Road, Hybrid and Kids bicycles.</p>","5","5","55cms","Unplugged Road 6061 Aluminium Alloy","","Rigid","","Shimano Tourney","Shimano Tourney","700c","Kenda K191 700x23C","Shimano Tourney","Prowheel Alloy 52/42T","","","Shimano CS-HG41 11/28T","Black","Neco Resin","Promax Alloy","Promax 440mm Drop","Promax Alloy","","Caliper Brakes","yes","yes");
INSERT INTO products VALUES("178","11","6","16","2020-05-08 17:17:27","Montra Celtic","montra-celtic-2-1-2017.png","","","","35800","","","old","<p>FRAME</p>
<p>The Montra Celtic 2.1 (2017) is a Road Bicycle which has a Celtic 6061 Aluminium Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Montra Celtic 2.1 has Shimano Claris front and rear derailleurs and Shimano Claris shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Road Bicycle from Montra has Tektro Caliper Brakes which are connected to Shimano ST-2400 shifters.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Montra Celtic 2.1 has an Alloy Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Montra Celtic 2.1 comes with a pair of Kinda K191 700x23C tires which are attached to XMR Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>T.I Cycles of India launched their own performance bicycle brand Montra in 2011. Montra Bicycles are known for their quality components, attractive graphics and affordability. Montra has a complete range of MTBs, Road, Hybrid and Kids bicycles.</p>","1","1","55cms","Celtic 6061 Aluminium Alloy","","Rigid","","Shimano Claris","Shimano Claris","700c","Kenda K191 700x23C","Shimano Claris","Shimano 50/34T","","","Shimano CS-HG50 11/28T","Black","Wellgo Resin","Promax Alloy","Promax 400mm Drop","Promax Alloy","","Caliper Brakes","no","yes");
INSERT INTO products VALUES("179","11","6","18","2020-05-08 17:23:10","Giant SCR","giant-scr-2-2019.jpg","","","","52999","","","old","<p>FRAME</p>
<p>The Giant SCR 2 (2019) is a Road Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant SCR 2 (2019) has a Shimano Claris 2-Speed front derailleur, a Shimano Claris 8-Speed rear derailleur and Shimano Claris shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This road bicycle from Giant comes with Alloy V-Brakes which are connected to Shimano Claris brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant SCR 2 has an Alloy Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant SCR 2 comes with a pair of Giant S-R4 700x25c tires which are attached to Aluminium Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","2","2","55cms","ALUXX-Grade Aluminium","","Rigid","","Shimano Claris 2-Speed","Shimano Claris 8-Speed","700c","Giant S-R4 700x25c","Shimano Claris 2x8","ProWheel 34/50T","","","Shimano CS-HG50 11/28T","Green","Pedal with toe clip and strap","Aluminium","Alloy Drop","Alloy","","Alloy","yes","yes");
INSERT INTO products VALUES("180","11","6","18","2020-05-08 17:29:57","Giant Contend","giant-contend-3-2019-black.jpg","","","","56999","","","old","<p>FRAME</p>
<p>The Giant Contend 3 (2019) is a Road Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Contend 3 has a Shimano Claris 2-Speed front derailleur, a Shimano Claris 8-Speed rear derailleur and Shimano Claris shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This road bicycle from Giant comes with Tektro TK-B177 brakes which are connected to Shimano Claris brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Contend 3 has an Aluminium Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Contend 3 comes with a pair of Giant S-R3 700x28c tires which are attached to Giant S-R3 rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","55cms","ALUXX-Grade Aluminium","","Rigid","","Shimano Claris 2-Speed","Shimano Claris 8-Speed","700c","Giant S-R3 700x28c","Shimano Claris 2x8","FSA Tempo 34/50","","","Shimano CS-HG50-8 11/34","Black","","","Giant Connect","Sport","","Tektro TK-B177","yes","yes");
INSERT INTO products VALUES("181","14","7","18","2020-05-08 17:36:04","Giant XTC","giant-xtc-jr-24-lite-2019.jpg","","","","18999","","","old","<p>FRAME</p>
<p>The Giant XTC JR 24 Lite (2019) is a Kids Bicycle which has an ALUXX-Grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant XTC JR 24 Lite has a Shimano Tourney rear derailleur and a Shimano RS35 shifter.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Kids MTB from Giant comes with Alloy Liner Pull V-Brakes which are connected to Alloy brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant XTC JR 24 Lite has a High-Tensile Steel Rigid Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant XTC JR 24 Lite comes with a pair of Giant Junior Lite Sport 24\" x 1.95\" tires which are attached to Giant Kids 24 Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories</p>","5","5","33cms,38cms","ALUXX-Grade Aluminium","","Rigid","","","Shimano Tourney 7-Speed","24\"","Giant Junior Lite Sport 24\" x 1.95\"","Shimano RS35","Steel","","","14/34","Blue","","Steel","Giant Jr MTB Low Rise","Steel Quill","","Alloy Liner Pull","yes","yes");
INSERT INTO products VALUES("182","15","5","7","2020-05-08 17:44:03","BSA Tandem","262_1.jpg","","","","15599","19499","20","sale","<p>BRAKES</p>
<p>This Speciality Bicycle from BSA comes with Rim Brakes.</p>
<p>&nbsp;</p>
<p>PRICE</p>
<p>The price of the BSA Tandem Duo is Rs.19,499.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The BSA Tandem Duo has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The BSA Tandem Duo comes with a pair of 26\" tires.</p>
<p>&nbsp;</p>
<p>FRAME</p>
<p>The BSA Tandem Duo is a City Bicycle which two people can ride at the same time which has a Steel Frame.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>BSA is the flagship brand of leading Indian Bicycle Manufacturer T.I Cycles of India. Freedom, Fun, Energy, Style and Comfort are the values adopted by BSA to provide a wide range of Kids and City Bicycles.</p>","5","5","38cms,40cms","Steel","","Front Suspension x","","","","26\"","","","Turbodrive Chain Wheel","","","","Blue","","","","Alloy","","Rim Brakes","no","yes");
INSERT INTO products VALUES("183","15","1","9","2020-05-08 17:49:24","Firefox Skull","firefox-skull-orange.jpg","","","","12100","","","old","<p>FRAME</p>
<p>The Firefox Skull (2015) has a BMX styled steel frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Skull (2015) is a single speed cycle.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>The Firefox Skull (2015) has front and rear rim brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Skull (2015) has no suspension.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Skull (2015) has Wanda 20x2.125\" BMX tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","4","4","33cms","Steel BMX","14kgs","Front Suspension FX","","","","20\"","Wanda BMX 20 X 2.125\"","","Steel 3 pieces, 33T X 170MM","","","","Orange","Alloy","Steel, 25.4 X 250mm","Steel BMX","","","Rim Brakes","no","yes");
INSERT INTO products VALUES("184","15","5","9","2020-05-08 17:55:45","Firefox Swagfire","firefox-swagfire.jpg","","","","25900","","","old","<p>FRAME</p>
<p>The Firefox Swagfire is a Fat Bike which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Swagfire has Shimano Tourney front and rear derailleurs and Shimano Altus shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Fat Bike from Firefox comes with Tektro Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Swagfire has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Swagfire comes with a pair of Wanda 26\" x 4\" tires.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","38cms,40cms","Alloy Frame","","Front Suspension PP","","Shimano TY500","Shimano TY300D","26\"","Wanda 26\" X 4.0\"","Shimano Altus, 3 X 7","Steel 24 x 34x 42T X 170mm","","","","Black","PP","Steel","Steel 31.8mm x 620mm","Alloy 4 Bold 80mm Extension","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("185","15","1","9","2020-05-08 18:02:36","Firefox Kompac","firefox-kompac-7s-black.jpg","","","","14700","","","old","<p>FRAME</p>
<p>The Firefox Kompac ST 7 Speed is a folding bicycle which has a Steel Folding Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Firefox Kompac ST 7 Speed has a Shimano TY300D 7-Speed rear derailleur and a Shimano RS35 shifter.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Folding Bicycle from Firefox comes with Rim Brakes which are connected to Alloy Brake Levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Firefox Kompac ST 7 Speed has a Suspension fork with a 50mm travel.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Firefox Kompac ST 7 Speed comes with a pair of 26\" x 2.1\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles. Firefox&rsquo;s philosophy is to constantly improve the Indian cycling experience. Firefox have a complete range of bicycles for Kids and Adults.</p>","5","5","33cms,38cms","Steel Frame","","Full Suspension","","","Shimano TY300D","26\"","26\" x 2.1\"","Shimano RS35","Steel 40T","","","Shimano TZ20 14/28T","Black","VP Folding","Steel","Steel 580mm with 30mm rise","Zoom Alloy","","Rim Brakes","no","yes");
INSERT INTO products VALUES("186","15","5","14","2020-05-08 18:11:11","Frog Vantage ","frog-vantage-x-27-5-blue.jpg","","","","16999","","","old","<p>FRAME</p>
<p>The Frog Vantage X 27.5\" is a Fat Bicycle which has a 18\" Hi-Ten Steel Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Frog Vantage X 27.5\" has a Shimano Tourney TZ31 3-Speed front derailleur, a Shimano Tourney TY300 7-Speed rear derailleur and Shimano EF500 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Fat Bicycle from Frog comes with Yinxing Mechanical Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Frog Vantage X 27.5\" has a ECA Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Frog Vantage X 27.5\" comes with a pair of 27.5\" x 3.0\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Frog Cycles with a culture of craftsmanship and engineering brings you extraordinary bicycles. Frog Bicycles believe in being honest and uncomplicated with their designs and functionality and produce bicycles which are durable and value for money.</p>","5","5","38cms,40cms","18\" Hi-Ten Steel Frame","20kgs","Front Suspension SS","","Shimano Tourney TZ31 3-Speed","Shimano Tourney TY300 7-Speed","27.5\"","27.5\" x 3.0\"","Shimano EF500","","","","","Silver","","Alloy QR","","","","Yinxing Mechanical Disc Brakes","yes","yes");
INSERT INTO products VALUES("187","15","1","18","2020-05-08 18:16:20","Giant Expressway","giant-expressway-2-2019.jpg","","","","36999","","","old","<p>FRAME</p>
<p>The Giant Expressway 2 (2019) is a Folding Bicycle which has a ALUXX-grade Aluminium Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Giant Expressway 2 has a Shimano Tourney RD-FT30 rear derailleur and Shimano Tourney Twist shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This folding bicycle from Giant comes with Direct Pull brakes which are connected to Alloy Comfort brake levers.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Giant Expressway 2 has a High-Tensile Chromoly Steel Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Giant Expressway 2 comes with a pair of Kenda Kwest 20\" x 1.5\" tires which are attached to Alloy Rims.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Giant is a Taiwanese bicycle manufacturer started in 1972 with a simple goal of creating a better cycling experience. Giant&rsquo;s efficiency in manufacturing have allowed them to make quality bikes at an affordable price. Giant have a wide range of bicycles across all categories.</p>","5","5","33cms,38cms","ALUXX-Grade Aluminium","11.2 kgs","Rigid","","","Shimano Tourney RD-FT30","20\"","Kenda Kwest 20\" x 1.5\"","Shimano Tourney Twist","Alloy 52T","","","Shimano MFTZ21 14/28","Black","Folding","Alloy","Alloy","Alloy Folding","","Direct Pull","yes","yes");
INSERT INTO products VALUES("188","15","6","12","2020-05-08 18:27:22","Ridley X Ride","1458079950.72-Ridley X Ride 20 Disc.jpg","","","","70150","115000","39","sale","<p>BRAKES</p>
<p>The X Ride 20 comes with Disc Brakes which are connected to Shimano Ultegra Brake Levers.</p>
<p>&nbsp;</p>
<p>PRICE</p>
<p>The price of the Ridley X Ride 20 Disc (2015) is Rs.1,15,000.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Ridley X Ride comes with an Oryx Alloy fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Ridley X Ride 20 comes with a pair of Challenge Grifo Plus 700x32C tires which are attached to Fulcrum Racing Sport Rims.</p>
<p>&nbsp;</p>
<p>FRAME</p>
<p>The Ridley X Ride 20 Disc (2015) is a Road Bicycle which has a 7005-T6 Alloy Frame.</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Ridley Bikes is a Belgian manufacturer of performance bicycles started in 1997. Ridley bicycles are inspired by nature and based on facts and on-the-field-experiences. Ridley strives to design and build better bicycles every time.</p>","5","5","55cms","X Ride Disc T6 Alloy","","Rigid","","Shimano 105","Shimano 105","26\"","Challenge Grifo Plus 700x32C","Shimano Ultegra","Rotor 46/36T","","","Shimano 105 11/28T","Black","","4ZA","4ZA","4ZA","","Disc Brakes","no","yes");
INSERT INTO products VALUES("189","15","5","8","2020-05-08 18:32:55","Hero Warrior ","hero-sprint-warrior-26t.jpg","","","","26860","","","old","<p>FRAME</p>
<p>The Hero Sprint Warrior 26T is a Fat Bicycle which has an Alloy Frame.</p>
<p>&nbsp;</p>
<p>GEARING</p>
<p>The Hero Sprint Warrior 26T has a Shimano Tourney rear derailleur and Shimano TX-50 shifters.</p>
<p>&nbsp;</p>
<p>BRAKES</p>
<p>This Fat Bicycle from Hero comes with Disc Brakes.</p>
<p>&nbsp;</p>
<p>FORK/SUSPENSION</p>
<p>The Hero Sprint Warrior 26T has a Suspension Fork.</p>
<p>&nbsp;</p>
<p>TIRES</p>
<p>The Hero Sprint Warrior 24T comes with a pair of 26\" x 4\" tires which are attached to Alloy Rims</p>
<p>&nbsp;</p>
<p>ABOUT BRAND</p>
<p>Hero Cycles was started in 1944 and is now one of the largest manufacturers in the World. Their vision is to provide products that meet the quality, performance and price aspirations of the customer. Hero has an extensive range of Kids and Adult bicycles.</p>","1","1","55cms","Alloy Frame","","Front Suspension BB","","","Shimano Tourney","26\"","26\" x 4\"","Shimano TX-50","Alloy 42T","","","Shimano TZ21 14/28T","Black","","Steel","Alloy 700mm","Alloy","","Disc Brakes","yes","yes");
INSERT INTO products VALUES("190","15","1","16","2020-05-08 18:41:08","Montra Spinto","montra-spinto-2018.jpg","","","","10990","","","old","","5","5","33cms","Montra Spinto","","Rigid","","","","20","Lumin B90 20","","SXH Z50","","","Shunfeng HLQC-04B 16T","Green","BMX Platform","Steel","ZX 650mm","Alloy","","V-Brakes","no","yes");



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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;




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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO slider VALUES("13","Editing Slide 12","Website-Banner-1-Mountain-bike.png"," ","","float-md-right float-none","http://localhost/SKOTE/bikes_category-OQ==","yes");
INSERT INTO slider VALUES("14","Slide Number 14","Hybrid-Bike-Website-Banner-2.png"," ","","float-md-right float-none","shop.php","yes");
INSERT INTO slider VALUES("15","Slide Number 14","Website-Banner-Kids-bike-2.png","","","float-md-right float-none","","yes");



DROP TABLE terms;

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL AUTO_INCREMENT,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL,
  `term_status` text NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO terms VALUES("14","Definitions","DEFINITIONS","<p>CMB Information Portal Private Limited (&ldquo;CMB&rdquo;), a company incorporated under the laws of India, with its principal office at 109, Velachery Main Road, Guindy, Chennai - 600032, is an online portal for the sale of multi-brand bicycles and related accessories.</p>
<p>&nbsp;</p>
<p>CMB shall provide you (&ldquo;User&rdquo;) bicycles of various brands, related products/accessories &amp; information. These products/services may be availed by the User in India at any time.</p>
<p>&nbsp;</p>
<p>This Master User Agreement (&ldquo;Agreement&rdquo;) is applicable to all bicycles/products sold through CMB. In addition to this Agreement, the User shall be required to read and accept the relevant terms and conditions of any service (&ldquo;TOS&rdquo;) for each such Service, which may be updated or modified by CMB from time to time. Such TOS shall be deemed to be a part of this Agreement and in the event of a conflict between such TOS and this Agreement, the terms of this Agreement shall prevail.</p>
<p>&nbsp;</p>
<p>All the terms, conditions and notices contained in this Agreement and the TOS, as may be posted on the Website from time to time shall be applicable for all bicycles and products sold through CMB. For the removal of doubts, it is clarified that the purchase of any bicycle/product by the User constitutes an acknowledgement and acceptance by the User of this Agreement and the TOS. If the User does not agree with any part of such terms, conditions and notices, the User must not make any purchase through CMB.</p>
<p>&nbsp;</p>
<p>CMB at its sole discretion reserves the right not to accept any order placed by the User through the website without assigning any reason thereof. Any contract to provide any service by CMB is not complete until full money towards the bicycle/product is received from the User and accepted/acknowledged by CMB.</p>","yes");
INSERT INTO terms VALUES("15","Modification of terms","MODIFICATION","<p>CMB reserves the right to change the terms, conditions and notices under which the bicycles/products are offered through the website, including but not limited to price of the products offered through its website, which shall be intimated to CMB by the respective manufacturer/brand from time to time. The user shall be responsible for regularly reviewing these terms and conditions.</p>","yes");
INSERT INTO terms VALUES("16","Links to third party sites","LINKS","<p>The website may contain links to other websites (\"Linked Sites\"). The Linked Sites are not under the control of CMB or the website and CMB is not responsible for the contents of any Linked Site, including without limitation any link contained in a Linked Site, or any changes or updates to a Linked Site. CMB is not responsible for any form of transmission, whatsoever, received by the User from any Linked Site. CMB is providing these links to the User only as a convenience, and the inclusion of any link does not imply endorsement by CMB or the website of the Linked Sites or any association with its operators or owners including the legal heirs or assigns thereof.</p>
<p>&nbsp;</p>
<p>CMB is not responsible for any errors, omissions or representations on any Linked Site. CMB does not endorse any advertiser on any Linked Site in any manner. The Users are requested to verify the accuracy of all information on their own before undertaking any reliance on such information.</p>","yes");
INSERT INTO terms VALUES("17","Relationship","RELATIONSHIP","<p>None of the provisions of this Agreement, terms and conditions, notices or the right to use the website by the User contained herein or any other section or pages of the Website and/or the Linked Sites, shall be deemed to constitute a partnership between the User and CMB and no party shall have any authority to bind or shall be deemed to be the agent of the other in any way. It may be noted, however, that if by using the website, the User authorizes CMB and its agents to access third party sites designated by them or on their behalf for retrieving requested information, the User shall be deemed to have appointed CMB and its agents as their agent for this purpose.</p>","yes");
INSERT INTO terms VALUES("18","Hendings","HEADINGS","<p>The headings and subheadings herein are included for convenience and identification only and are not intended to describe, interpret, define or limit the scope, extent or intent of this Agreement, the TOS or the right to use the website by the User contained herein or any other section or pages of the website or any Linked Sites in any manner whatsoever.</p>","yes");
INSERT INTO terms VALUES("19","Severabilty","SEVERABILITY","<p>If any provision of this Agreement is determined to be invalid or unenforceable in whole or in part, such invalidity or unenforceability shall attach only to such provision or part of such provision and the remaining part of such provision and all other provisions of this Agreement shall continue to be in full force and effect.</p>","yes");



DROP TABLE wishlist;

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  `papage` int(11) NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;




