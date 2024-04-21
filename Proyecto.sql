CREATE TABLE about_us (
  about_id NUMBER(10) PRIMARY KEY,
  about_heading VARCHAR2(255) NOT NULL,
  about_short_desc VARCHAR2(1000) NOT NULL,
  about_desc VARCHAR2(4000) NOT NULL
);
-- Insertar datos en la tabla about_us
INSERT INTO about_us (
    about_id,
    about_heading,
    about_short_desc,
    about_desc
  )
VALUES (
    1,
    'About Us - Our Story',
    '
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
',
    '
Rhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.

Advanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.

Beyond our product offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.
'
  );

-- Crear tabla admins
CREATE TABLE admins (
  admin_id NUMBER PRIMARY KEY,
  admin_name VARCHAR2(255) NOT NULL,
  admin_email VARCHAR2(255) NOT NULL,
  admin_pass VARCHAR2(255) NOT NULL,
  admin_image VARCHAR2(255) NOT NULL,
  admin_contact VARCHAR2(255) NOT NULL,
  admin_country VARCHAR2(255) NOT NULL,
  admin_job VARCHAR2(255) NOT NULL,
  admin_about VARCHAR2(4000) NOT NULL
);

-- Insertar datos en la tabla admins
INSERT INTO admins (
    admin_id,
    admin_name,
    admin_email,
    admin_pass,
    admin_image,
    admin_contact,
    admin_country,
    admin_job,
    admin_about
  )
VALUES (
    2,
    'Administrator',
    'admin@mail.com',
    'Password@123',
    'user-profile-min.png',
    '7777775500',
    'Morocco',
    'Front-End Developer',
    '
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
'
  );

CREATE TABLE coupons (
  coupon_id NUMBER PRIMARY KEY,
  product_id NUMBER NOT NULL,
  coupon_title VARCHAR2(255) NOT NULL,
  coupon_price VARCHAR2(255) NOT NULL,
  coupon_code VARCHAR2(255) NOT NULL,
  coupon_limit NUMBER NOT NULL,
  coupon_used NUMBER  NOT NULL
);

-- Insertar datos en la tabla coupons
INSERT INTO coupons (
    coupon_id,
    product_id,
    coupon_title,
    coupon_price,
    coupon_code,
    coupon_limit,
    coupon_used
  )
VALUES 
(5, 8, 'Sale', '10', 'CASTRO', 2, 1);

DROP TABLE CUSTOMERS;
-- Crear tabla customers
CREATE TABLE customers (
  customer_id NUMBER(10) PRIMARY KEY,
  customer_name VARCHAR2(255) NOT NULL,
  customer_email VARCHAR2(255) NOT NULL,
  customer_pass VARCHAR2(255) NOT NULL,
  customer_country VARCHAR2(255) NOT NULL,
  customer_city VARCHAR2(255) NOT NULL,
  customer_contact VARCHAR2(255) NOT NULL,
  customer_address VARCHAR2(255) NOT NULL,
  customer_image VARCHAR2(255) NOT NULL,
  customer_ip VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla customers
INSERT INTO customers (
    customer_id,
    customer_name,
    customer_email,
    customer_pass,
    customer_country,
    customer_city,
    customer_contact,
    customer_address,
    customer_image,
    customer_ip
  )
VALUES (
    2,
    'user',
    'user@ave.com',
    '123',
    'United State',
    'New York',
    '0092334566931',
    'new york',
    'user.jpg',
    '::1'
  );
  (
    3,
    'Demo Customer',
    'demo@customer.com',
    'Password123',
    'DemoCountry',
    'DemoCity',
    '700000000',
    'DemoAddress',
    'sample_image.jpg',
    '::1',
    ''
  ),
  (
    4,
    'Thomas',
    'thomas@demo.com',
    'Password123',
    'One Country',
    'One City',
    '777777777',
    '111 Address',
    'sample_img360.png',
    '::1',
    '1427053935'
  ),
  (
    5,
    'Fracis',
    'test@customer.com',
    'Password123',
    'US',
    'Demo City',
    '780000000',
    '112 Bleck Street',
    'userav-min.png',
    '::1',
    '1634138674'
  ),
  (
    6,
    'Sample Customer',
    'customer@mail.com',
    'Password123',
    'Sample Country',
    'Sample City',
    '7800000000',
    'Sample Address',
    'user-icn-min.png',
    '::1',
    '174829126'
  ),
  (
    7,
    'maripas',
    'ferdez.safer20@gmail.com',
    '123456789',
    'Costa Rica',
    'San Jose',
    '84371496',
    'Granadialla',
    'ASD.png',
    '::1',
    '1650149762'
  );
SELECT * FROM CUSTOMERS;
CREATE TABLE customer_orders (
  order_id NUMBER PRIMARY KEY,
  customer_id NUMBER  NOT NULL,
  due_amount NUMBER NOT NULL,
  invoice_no NUMBER NOT NULL,
  qty NUMBER  NOT NULL,
  talla VARCHAR2(255) NOT NULL,
  order_date TIMESTAMP NOT NULL,
  order_status VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla customer_orders
INSERT INTO customer_orders (
    order_id,
    customer_id,
    due_amount,
    invoice_no,
    qty,
    talla,
    order_date,
    order_status
  )
VALUES (
    17,
    2,
    100,
    1715523401,
    2,
    'Large',
    TIMESTAMP '2017-02-20 08:21:42',
    'pending'
  );
  (
    23,
    3,
    20,
    1762810884,
    1,
    'Medium',
    TIMESTAMP '2021-09-14 08:35:57',
    'Complete'
  ),
  (
    24,
    4,
    100,
    1972602052,
    1,
    'Large',
    TIMESTAMP '2021-09-14 16:37:52',
    'Complete'
  ),
  (
    25,
    4,
    90,
    2008540778,
    1,
    'Medium',
    TIMESTAMP '2021-09-14 16:43:15',
    'pending'
  ),
  (
    27,
    5,
    120,
    2138906686,
    1,
    'Small',
    TIMESTAMP '2021-09-15 03:18:41',
    'Complete'
  ),
  (
    28,
    5,
    180,
    361540113,
    2,
    'Medium',
    TIMESTAMP '2021-09-15 03:25:42',
    'Complete'
  ),
  (
    29,
    3,
    100,
    858195683,
    1,
    'Large',
    TIMESTAMP '2021-09-15 03:14:01',
    'Complete'
  ),
  (
    31,
    6,
    245,
    901707655,
    1,
    'Medium',
    TIMESTAMP '2021-09-15 03:52:18',
    'Complete'
  ),
  (
    32,
    6,
    75,
    2125554712,
    1,
    'Large',
    TIMESTAMP '2021-09-15 03:52:58',
    'pending'
  );

-- Crear tabla enquiry_types
CREATE TABLE enquiry_types (
  enquiry_id NUMBER PRIMARY KEY,
  enquiry_title VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla enquiry_types
INSERT INTO enquiry_types (enquiry_id, enquiry_title)
VALUES (1, 'Order and Delivery Support'),
  (2, 'Technical Support'),
  (3, 'Price Concern');

CREATE TABLE manufacturers (
  manufacturer_id NUMBER(10) PRIMARY KEY,
  manufacturer_title VARCHAR2(255) NOT NULL,
  manufacturer_top VARCHAR2(3) NOT NULL,
  manufacturer_image VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla manufacturers
INSERT INTO manufacturers (
    manufacturer_id,
    manufacturer_title,
    manufacturer_top,
    manufacturer_image
  )
VALUES 
  (3, 'Nike', 'no', 'niketransl.png');
  (4, 'Philip Plein', 'no', 'pplg.png'),
  (5, 'Lacoste', 'no', 'lacostelg.png'),
  (7, 'Polo', 'no', 'polobn.jpg'),
  (8, 'Gildan 1800', 'no', 'sample_img360.png');

-- Crear tabla payments
CREATE TABLE payments (
  payment_id NUMBER(10) PRIMARY KEY,
  invoice_no NUMBER(10) NOT NULL,
  amount NUMBER(10) NOT NULL,
  payment_mode VARCHAR2(255) NOT NULL,
  ref_no NUMBER(10) NOT NULL,
  code NUMBER(10) NOT NULL,
  payment_date VARCHAR2(20) NOT NULL
);
commit;
-- Insertar datos en la tabla payments
INSERT INTO payments (
    payment_id,
    invoice_no,
    amount,
    payment_mode,
    ref_no,
    code,
    payment_date
  )
VALUES (
    2,
    1607603019,
    447,
    'UBL/Omni',
    5678,
    33,
    '11/1/2016'
  ),
  (
    3,
    314788500,
    345,
    'UBL/Omni',
    443,
    865,
    '11/1/2016'
  ),
  (
    4,
    6906,
    400,
    'Western Union',
    101025780,
    696950,
    'January 1'
  ),
  (
    5,
    10023,
    20,
    'Bank Code',
    1000010101,
    6969,
    '09/14/2021'
  ),
  (
    6,
    69088,
    100,
    'Bank Code',
    1010101022,
    88669,
    '09/14/2021'
  ),
  (
    7,
    1835758347,
    480,
    'Western Union',
    1785002101,
    66990,
    '09-04-2021'
  ),
  (
    8,
    1835758347,
    480,
    'Bank Code',
    1012125550,
    66500,
    '09-14-2021'
  ),
  (
    9,
    1144520,
    480,
    'Bank Code',
    1025000020,
    66990,
    '09-14-2021'
  ),
  (
    10,
    2145000000,
    480,
    'Bank Code',
    2147483647,
    66580,
    '09-14-2021'
  ),
  (
    20,
    858195683,
    100,
    'Bank Code',
    1400256000,
    47850,
    '09-13-2021'
  ),
  (
    21,
    2138906686,
    120,
    'Bank Code',
    1455000020,
    202020,
    '09-13-2021'
  ),
  (
    22,
    2138906686,
    120,
    'Bank Code',
    1450000020,
    202020,
    '09-15-2021'
  ),
  (
    23,
    361540113,
    180,
    'Western Union',
    1470000020,
    12001,
    '09-15-2021'
  ),
  (
    24,
    361540113,
    180,
    'UBL/Omni',
    1258886650,
    200,
    '09-15-2021'
  ),
  (
    25,
    901707655,
    245,
    'Western Union',
    1200002588,
    88850,
    '09-15-2021'
  );



CREATE TABLE products (
  product_id NUMBER PRIMARY KEY,
  p_cat_id NUMBER NOT NULL,
  cat_id NUMBER NOT NULL,
  manufacturer_id NUMBER NOT NULL,
  fecha TIMESTAMP NOT NULL,
  product_title VARCHAR2(255) NOT NULL,
  product_url VARCHAR2(255) NOT NULL,
  product_img1 VARCHAR2(255) NOT NULL,
  product_img2 VARCHAR2(255) NOT NULL,
  product_img3 VARCHAR2(255) NOT NULL,
  product_price NUMBER(10,2) NOT NULL,
  product_psp_price NUMBER(10,2) NOT NULL,
  product_desc VARCHAR2(255) NOT NULL,
  product_features VARCHAR2(255) NOT NULL,
  product_video VARCHAR2(255) NOT NULL,
  product_keywords VARCHAR2(255) NOT NULL,
  product_label VARCHAR2(255) NOT NULL,
  status VARCHAR2(255) NOT NULL
);

Select * FROM PRODUCTS;
-- Insertar datos en la tabla products
INSERT INTO products (
    product_id,
    p_cat_id,
    cat_id,
    manufacturer_id,
    fecha,
    product_title,
    product_url,
    product_img1,
    product_img2,
    product_img3,
    product_price,
    product_psp_price,
    product_desc,
    product_features,
    product_video,
    product_keywords,
    product_label,
    status
)
VALUES (
    8,
    4,
    2,
    4,
    TO_TIMESTAMP('2021-09-14 10:13:02', 'YYYY-MM-DD HH24:MI:SS'),
    'Sleeveless Flaux Fur Hybrid Coat',
    'product-url-8',
    'Black Blouse Versace Coat1.jpg',
    'Black Blouse Versace Coat2.jpg',
    'Black Blouse Versace Coat3.jpg',
    245,
    100,
    '<p>This is a sample product description...</p>',
    'It is a long established fact that a reader will be distracted by...',
    '<iframe width="854" height="480" src="https://www.youtube.com/embed/qRswlmADRa8" frameborder="0" allowfullscreen></iframe>',
    'Coats',
    'New',
    'product'
  );
  (
    9,
    5,
    4,
    7,
    TO_TIMESTAMP('2021-09-14 17:06:30', 'YYYY-MM-DD HH24:MI:SS'),
    'Long Sleeves Polo Shirt for Men',
    'product-url-9',
    'product-1.jpg',
    'product-2.jpg',
    'product-3.jpg',
    50,
    35,
    '<p>This is a sample product description...</p>',
    'It is a long established fact that a reader will be distracted by...',
    '<iframe width="854" height="480" src="https://www.youtube.com/embed/qRswlmADRa8" frameborder="0" allowfullscreen></iframe>',
    'T-Shirt',
    'Sale',
    'product'
  ),
  (
    12,
    8,
    5,
    2,
    TO_TIMESTAMP('2021-05-25 09:15:09', 'YYYY-MM-DD HH24:MI:SS'),
    'Ultraboost 21 PrimeBlue Shoes',
    'ultraboost-21-adidas',
    'Ultraboost_21.jpg',
    'Ultraboost_21_2.jpg',
    'Ultraboost_21_3.jpg',
    150,
    180,
    'This product is made with Primeblue, a high-performance recycled material made in part with Parley Ocean Plastic. 50% of the upper is textile, 92% of the textile is Primeblue yarn. No virgin polyester.',
    'Comfortable and responsive, Ultraboost became our first shoe to be as popular in streetwear style as it is in performance running.',
    'https://assets.adidas.com/videos/q_auto,f_auto,g_auto/599fff35a3cf432aa9bbac7c0091316f_d98c/Ultraboost_21_Primeblue_Shoes_Blue_FX7729_video.mp4',
    'sneakers adidas ultraboost shoes',
    'New',
    'product'
  ),
  (
    13,
    9,
    2,
    3,
    TO_TIMESTAMP('2021-09-14 16:26:51', 'YYYY-MM-DD HH24:MI:SS'),
    'Nike Sportswear Essential Collection',
    'nike-sportswear-essen-col',
    'nike-s.jpg',
    'nike-s2.jpg',
    'nike-s02.jpg',
    90,
    85,
    'This is a sample text. This is a sample text. This is a sample text...',
    'This is a sample text. This is a sample text. This is a sample text...',
    'This is a sample text. This is a sample text. This is a sample text...',
    'nike sportswear',
    'Featured',
    'product'
  ),
  (
    15,
    5,
    5,
    8,
    TO_TIMESTAMP('2021-09-15 03:46:42', 'YYYY-MM-DD HH24:MI:SS'),
    'Gildan 1800 Ultra Cotton Polo Shirt',
    'cotton-polo-shirt',
    'g18bulk.jpg',
    'g18bulk2.jpg',
    'g18bulk3.jpg',
    88,
    75,
    'THIS IS A DEMO DESCRIPTION',
    'DEMO FEATURES',
    '',
    'polo shirt',
    'Sale',
    'bundle'
  );


CREATE TABLE pending_orders (
  order_id NUMBER NOT NULL,
  customer_id NUMBER  NOT NULL,
  invoice_no NUMBER NOT NULL,
  product_id VARCHAR2(255) NOT NULL,
  qty NUMBER NOT NULL,
  talla VARCHAR2(255) NOT NULL,
  order_status VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla pending_orders
INSERT INTO pending_orders (
    order_id,
    customer_id,
    invoice_no,
    product_id,
    qty,
    talla,
    order_status
  )
VALUES (17, 2, 1715523401, '9', 2, 'Large', 'pending'),
  (23, 3, 1762810884, '12', 1, 'Medium', 'Complete'),
  (24, 4, 1972602052, '5', 1, 'Large', 'Complete'),
  (25, 4, 2008540778, '13', 1, 'Medium', 'pending'),
  (27, 5, 2138906686, '14', 1, 'Small', 'Complete'),
  (28, 5, 361540113, '13', 2, 'Medium', 'Complete'),
  (29, 3, 858195683, '5', 1, 'Large', 'Complete'),
  (31, 6, 901707655, '8', 1, 'Medium', 'Complete'),
  (32, 6, 2125554712, '15', 1, 'Large', 'pending');


CREATE TABLE product_categories (
  p_cat_id NUMBER(10) PRIMARY KEY,
  p_cat_title VARCHAR2(255) NOT NULL,
  p_cat_top VARCHAR2(3) NOT NULL,
  p_cat_image VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla product_categories
INSERT INTO product_categories (
    p_cat_id,
    p_cat_title,
    p_cat_top,
    p_cat_image
  )
VALUES (4, 'Coats', 'no', 'coaticn.png'),
  (5, 'T-Shirts', 'no', 'tshirticn.png'),
  (6, 'Sweater', 'no', 'sweatericn.png'),
  (7, 'Jackets', 'yes', 'jacketicn.png'),
  (8, 'Sneakers', 'yes', 'sneakericn.png'),
  (9, 'Trousers', 'no', 'trousericn.png');

CREATE TABLE store (
  store_id NUMBER(10) PRIMARY KEY,
  store_title VARCHAR2(255) NOT NULL,
  store_image VARCHAR2(255) NOT NULL,
  store_desc CLOB NOT NULL,
  store_button VARCHAR2(255) NOT NULL,
  store_url VARCHAR2(255) NOT NULL
);

-- Insertar datos en la tabla store
INSERT INTO store (
    store_id,
    store_title,
    store_image,
    store_desc,
    store_button,
    store_url
  )
VALUES (
    4,
    'London Store',
    'store (3).jpg',
    '<p style="text-align: center;"><strong>180-182 RECENTS STREET, LONDON, W1B 5BT</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>',
    'View Map',
    'http://www.thedailylux.com/ecommerce'
  ),
  (
    5,
    'New York Store',
    'store (1).png',
    '<p style="text-align: center;"><strong>109 COLUMBUS CIRCLE, NEW YORK, NY10023</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>',
    'View Map',
    'http://www.thedailylux.com/ecommerce'
  ),
  (
    6,
    'Paris Store',
    'store (2).jpg',
    '<p style="text-align: center;"><strong>2133 RUE SAINT-HONORE, 75001 PARIS&nbsp;</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>',
    'View Map',
    'http://www.thedailylux.com/ecommerce'
  );

CREATE TABLE terms (
  term_id NUMBER(10) PRIMARY KEY,
  term_title VARCHAR2(100) NOT NULL,
  term_link VARCHAR2(100) NOT NULL,
  term_desc CLOB NOT NULL
);

-- Insertar datos en la tabla terms
INSERT INTO terms (
    term_id,
    term_title,
    term_link,
    term_desc
  )
VALUES (
    1,
    'Rules And Regulations',
    'rules',
    '<p>Contrary to popular belief, Lorem Ipsum is not simply random text...</p>'
  ),
  (
    2,
    'Refund Policy',
    'link2',
    'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...'
  ),
  (
    3,
    'Pricing and Promotions Policy',
    'link3',
    'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...'
  );

CREATE TABLE wishlist (
  wishlist_id NUMBER(10) PRIMARY KEY,
  customer_id NUMBER(10) NOT NULL,
  product_id NUMBER(10) NOT NULL
);

-- Insertar datos en la tabla wishlist
INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (2, 2, 8),
  (3, 5, 13),
  (4, 3, 13),
  (5, 6, 15);


-- Primary keys for tables
ALTER TABLE about_us ADD CONSTRAINT about_us_pk PRIMARY KEY (about_id);
ALTER TABLE admins ADD CONSTRAINT admins_pk PRIMARY KEY (admin_id);
ALTER TABLE bundle_product_relation ADD CONSTRAINT bundle_product_relation_pk PRIMARY KEY (rel_id);
ALTER TABLE cart ADD CONSTRAINT cart_pk PRIMARY KEY (p_id);
ALTER TABLE categories ADD CONSTRAINT categories_pk PRIMARY KEY (cat_id);
ALTER TABLE contact_us ADD CONSTRAINT contact_us_pk PRIMARY KEY (contact_id);
ALTER TABLE coupons ADD CONSTRAINT coupons_pk PRIMARY KEY (coupon_id);
ALTER TABLE customers ADD CONSTRAINT customers_pk PRIMARY KEY (customer_id);
ALTER TABLE customer_orders ADD CONSTRAINT customer_orders_pk PRIMARY KEY (order_id);
ALTER TABLE enquiry_types ADD CONSTRAINT enquiry_types_pk PRIMARY KEY (enquiry_id);
ALTER TABLE manufacturers ADD CONSTRAINT manufacturers_pk PRIMARY KEY (manufacturer_id);
ALTER TABLE payments ADD CONSTRAINT payments_pk PRIMARY KEY (payment_id);
ALTER TABLE pending_orders ADD CONSTRAINT pending_orders_pk PRIMARY KEY (order_id);
ALTER TABLE products ADD CONSTRAINT products_pk PRIMARY KEY (product_id);
ALTER TABLE product_categories ADD CONSTRAINT product_categories_pk PRIMARY KEY (p_cat_id);
ALTER TABLE store ADD CONSTRAINT store_pk PRIMARY KEY (store_id);
ALTER TABLE terms ADD CONSTRAINT terms_pk PRIMARY KEY (term_id);
ALTER TABLE wishlist ADD CONSTRAINT wishlist_pk PRIMARY KEY (wishlist_id);

-- Auto-increment for tables
CREATE SEQUENCE about_us_seq START WITH 2;
CREATE SEQUENCE admins_seq START WITH 3;
CREATE SEQUENCE bundle_product_relation_seq;
CREATE SEQUENCE categories_seq START WITH 6;
CREATE SEQUENCE contact_us_seq START WITH 2;
CREATE SEQUENCE coupons_seq START WITH 7;
CREATE SEQUENCE customers_seq START WITH 8;
CREATE SEQUENCE customer_orders_seq START WITH 33;
CREATE SEQUENCE enquiry_types_seq START WITH 4;
CREATE SEQUENCE manufacturers_seq START WITH 9;
CREATE SEQUENCE payments_seq START WITH 26;
CREATE SEQUENCE pending_orders_seq START WITH 33;
CREATE SEQUENCE products_seq START WITH 17;
CREATE SEQUENCE product_categories_seq START WITH 10;
CREATE SEQUENCE store_seq START WITH 7;
CREATE SEQUENCE terms_seq START WITH 4;
CREATE SEQUENCE wishlist_seq START WITH 6;

CREATE OR REPLACE TRIGGER about_us_trigger
BEFORE INSERT ON about_us
FOR EACH ROW
BEGIN
    SELECT about_us_seq.NEXTVAL INTO :NEW.about_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER admins_trigger
BEFORE INSERT ON admins
FOR EACH ROW
BEGIN
    SELECT admins_seq.NEXTVAL INTO :NEW.admin_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER bundle_product_relation_trigger
BEFORE INSERT ON bundle_product_relation
FOR EACH ROW
BEGIN
    SELECT bundle_product_relation_seq.NEXTVAL INTO :NEW.rel_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER categories_trigger
BEFORE INSERT ON categories
FOR EACH ROW
BEGIN
    SELECT categories_seq.NEXTVAL INTO :NEW.cat_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER contact_us_trigger
BEFORE INSERT ON contact_us
FOR EACH ROW
BEGIN
    SELECT contact_us_seq.NEXTVAL INTO :NEW.contact_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER coupons_trigger
BEFORE INSERT ON coupons
FOR EACH ROW
BEGIN
    SELECT coupons_seq.NEXTVAL INTO :NEW.coupon_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER customers_trigger
BEFORE INSERT ON customers
FOR EACH ROW
BEGIN
    SELECT customers_seq.NEXTVAL INTO :NEW.customer_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER customer_orders_trigger
BEFORE INSERT ON customer_orders
FOR EACH ROW
BEGIN
    SELECT customer_orders_seq.NEXTVAL INTO :NEW.order_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER enquiry_types_trigger
BEFORE INSERT ON enquiry_types
FOR EACH ROW
BEGIN
    SELECT enquiry_types_seq.NEXTVAL INTO :NEW.enquiry_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER manufacturers_trigger
BEFORE INSERT ON manufacturers
FOR EACH ROW
BEGIN
    SELECT manufacturers_seq.NEXTVAL INTO :NEW.manufacturer_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER payments_trigger
BEFORE INSERT ON payments
FOR EACH ROW
BEGIN
    SELECT payments_seq.NEXTVAL INTO :NEW.payment_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER pending_orders_trigger
BEFORE INSERT ON pending_orders
FOR EACH ROW
BEGIN
    SELECT pending_orders_seq.NEXTVAL INTO :NEW.order_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER products_trigger
BEFORE INSERT ON products
FOR EACH ROW
BEGIN
    SELECT products_seq.NEXTVAL INTO :NEW.product_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER product_categories_trigger
BEFORE INSERT ON product_categories
FOR EACH ROW
BEGIN
    SELECT product_categories_seq.NEXTVAL INTO :NEW.p_cat_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER store_trigger
BEFORE INSERT ON store
FOR EACH ROW
BEGIN
    SELECT store_seq.NEXTVAL INTO :NEW.store_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER terms_trigger
BEFORE INSERT ON terms
FOR EACH ROW
BEGIN
    SELECT terms_seq.NEXTVAL INTO :NEW.term_id FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER wishlist_trigger
BEFORE INSERT ON wishlist
FOR EACH ROW
BEGIN
    SELECT wishlist_seq.NEXTVAL INTO :NEW.wishlist_id FROM DUAL;
END;
/

CREATE OR REPLACE PROCEDURE get_product(p_pro_id IN NUMBER, p_product_data OUT SYS_REFCURSOR)
IS
BEGIN
    OPEN p_product_data FOR
        SELECT PRODUCT_ID, PRODUCT_TITLE, PRODUCT_PRICE, PRODUCT_DESC
        FROM tu_tabla
        WHERE product_id = p_pro_id;
END;
commit;
BEGIN
  get_products
END;
/
SET SERVEROUTPUT ON;
CREATE OR REPLACE PROCEDURE get_product_details(p_pro_id IN NUMBER, p_product_data OUT SYS_REFCURSOR)
IS
BEGIN
    -- Tu lógica para obtener los detalles del producto aquí
    IF EXISTS(SELECT * FROM products WHERE product_id = p_pro_id) THEN
        OPEN p_product_data FOR
            SELECT * FROM products WHERE product_id = p_pro_id;
    ELSE
        -- Manejo de error si no se encuentra el producto
        OPEN p_product_data FOR
            SELECT NULL FROM DUAL WHERE 1 = 0;
    END IF;
END;
Commit
CREATE OR REPLACE PROCEDURE get_cart_items(p_ip_add IN VARCHAR2, p_cart_items OUT SYS_REFCURSOR) AS
BEGIN
  OPEN p_cart_items FOR
    SELECT * FROM cart WHERE ip_add = p_ip_add;
END;
/

CREATE OR REPLACE PROCEDURE insert_customer_order(p_customer_id IN NUMBER, p_sub_total IN NUMBER, p_invoice_no IN NUMBER, p_pro_qty IN NUMBER, p_pro_size IN VARCHAR2, p_status IN VARCHAR2) AS
BEGIN
  INSERT INTO customer_orders (customer_id, due_amount, invoice_no, qty, talla, order_status)
  VALUES (p_customer_id, p_sub_total, p_invoice_no, p_pro_qty, p_pro_size, p_status);
  COMMIT;
END;
/

CREATE OR REPLACE PROCEDURE insert_pending_order(p_customer_id IN NUMBER, p_invoice_no IN NUMBER, p_pro_id IN NUMBER, p_pro_qty IN NUMBER, p_pro_size IN VARCHAR2, p_status IN VARCHAR2) AS
BEGIN
  INSERT INTO pending_orders (customer_id, invoice_no, product_id,   qty, talla, order_status)
  VALUES (p_customer_id, p_invoice_no, p_pro_id, p_pro_qty, p_pro_size, p_status);
  COMMIT;
END;
/

CREATE OR REPLACE PROCEDURE getAboutUs(
    about_heading OUT VARCHAR2,
    about_desc OUT VARCHAR2
)\


AS
BEGIN
    SELECT heading, desc
    INTO about_heading, about_desc
    FROM about_us;
END getAboutUsDetails;
/
   
