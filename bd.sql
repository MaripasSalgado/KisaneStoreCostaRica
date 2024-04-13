
-- Table: product_categories
CREATE TABLE product_categories (
  p_cat_id NUMBER(10) PRIMARY KEY,
  p_cat_title VARCHAR2(255) NOT NULL,
  p_cat_top VARCHAR2(100) NOT NULL,
  p_cat_image VARCHAR2(100) NOT NULL,
  CONSTRAINT fk_product_categories_p_cat_id FOREIGN KEY (p_cat_id) REFERENCES products(p_cat_id)
);

--Insert: product_categories
INSERT INTO product_categories (p_cat_id, p_cat_title, p_cat_top, p_cat_image)
VALUES (1, 'Electrónicos', 'Principal', 'electronics.jpg');

INSERT INTO product_categories (p_cat_id, p_cat_title, p_cat_top, p_cat_image)
VALUES (2, 'Ropa', 'Principal', 'clothing.jpg');

INSERT INTO product_categories (p_cat_id, p_cat_title, p_cat_top, p_cat_image)
VALUES (3, 'Hogar', 'Principal', 'home.jpg');

INSERT INTO product_categories (p_cat_id, p_cat_title, p_cat_top, p_cat_image)
VALUES (4, 'Juguetes', 'Principal', 'toys.jpg');

INSERT INTO product_categories (p_cat_id, p_cat_title, p_cat_top, p_cat_image)
VALUES (5, 'Deportes', 'Principal', 'sports.jpg');





-- Table: categories
CREATE TABLE categories (
  cat_id NUMBER(10) PRIMARY KEY,
  cat_title VARCHAR2(100) NOT NULL,
  cat_top VARCHAR2(100) NOT NULL,
  cat_image VARCHAR2(100) NOT NULL
);

--Inserts
INSERT INTO categories (cat_id, cat_title, cat_top, cat_image)
VALUES (1, 'Electrónicos', 'Principal', 'electronics_cat.jpg');

INSERT INTO categories (cat_id, cat_title, cat_top, cat_image)
VALUES (2, 'Hogar', 'Principal', 'home_cat.jpg');

INSERT INTO categories (cat_id, cat_title, cat_top, cat_image)
VALUES (3, 'Ropa', 'Principal', 'clothing_cat.jpg');

INSERT INTO categories (cat_id, cat_title, cat_top, cat_image)
VALUES (4, 'Juguetes', 'Principal', 'toys_cat.jpg');

INSERT INTO categories (cat_id, cat_title, cat_top, cat_image)
VALUES (5, 'Deportes', 'Principal', 'sports_cat.jpg');




-- Table: manufacturers
CREATE TABLE manufacturers (
  manufacturer_id NUMBER(10) PRIMARY KEY,
  manufacturer_title VARCHAR2(255) NOT NULL,
  manufacturer_top VARCHAR2(100) NOT NULL,
  manufacturer_image VARCHAR2(100) NOT NULL
);

--Inserts
INSERT INTO manufacturers (manufacturer_id, manufacturer_title, manufacturer_top, manufacturer_image)
VALUES (1, 'Sony', 'Principal', 'sony_logo.jpg');

INSERT INTO manufacturers (manufacturer_id, manufacturer_title, manufacturer_top, manufacturer_image)
VALUES (2, 'Samsung', 'Principal', 'samsung_logo.jpg');

INSERT INTO manufacturers (manufacturer_id, manufacturer_title, manufacturer_top, manufacturer_image)
VALUES (3, 'LG', 'Principal', 'lg_logo.jpg');

INSERT INTO manufacturers (manufacturer_id, manufacturer_title, manufacturer_top, manufacturer_image)
VALUES (4, 'Apple', 'Principal', 'apple_logo.jpg');

INSERT INTO manufacturers (manufacturer_id, manufacturer_title, manufacturer_top, manufacturer_image)
VALUES (5, 'Nike', 'Principal', 'nike_logo.jpg');




-- Table: admins
CREATE TABLE admins (
  admin_id NUMBER(10) PRIMARY KEY,
  admin_name VARCHAR2(255) NOT NULL,
  admin_email VARCHAR2(255) NOT NULL,
  admin_pass VARCHAR2(255) NOT NULL,
  admin_image VARCHAR2(255) NOT NULL,
  admin_contact VARCHAR2(255) NOT NULL,
  admin_country VARCHAR2(255) NOT NULL,
  admin_job VARCHAR2(255) NOT NULL,
  admin_about VARCHAR2(4000) NOT NULL
);

--Inserts
INSERT INTO admins (admin_id, admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about)
VALUES (1, 'Admin1', 'admin1@example.com', 'password1', 'admin1.jpg', '123456789', 'Country1', 'Job1', 'About Admin1');

INSERT INTO admins (admin_id, admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about)
VALUES (2, 'Admin2', 'admin2@example.com', 'password2', 'admin2.jpg', '987654321', 'Country2', 'Job2', 'About Admin2');

INSERT INTO admins (admin_id, admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about)
VALUES (3, 'Admin3', 'admin3@example.com', 'password3', 'admin3.jpg', '111222333', 'Country3', 'Job3', 'About Admin3');

INSERT INTO admins (admin_id, admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about)
VALUES (4, 'Admin4', 'admin4@example.com', 'password4', 'admin4.jpg', '444555666', 'Country4', 'Job4', 'About Admin4');

INSERT INTO admins (admin_id, admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about)
VALUES (5, 'Admin5', 'admin5@example.com', 'password5', 'admin5.jpg', '777888999', 'Country5', 'Job5', 'About Admin5');




-- Table: customers
CREATE TABLE customers (
  customer_id NUMBER(10) PRIMARY KEY,
  customer_name VARCHAR2(255) NOT NULL,
  customer_email VARCHAR2(255) NOT NULL,
  customer_pass VARCHAR2(255) NOT NULL,
  customer_country VARCHAR2(255) NOT NULL,
  customer_city VARCHAR2(255) NOT NULL,
  customer_contact VARCHAR2(255) NOT NULL,
  customer_address VARCHAR2(4000) NOT NULL,
  customer_image VARCHAR2(255) NOT NULL,
  customer_ip VARCHAR2(255) NOT NULL,
  customer_confirm_code VARCHAR2(255) NOT NULL
);

--Inserts
INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code)
VALUES (1, 'Customer1', 'customer1@example.com', 'password1', 'Country1', 'City1', '+123456789', 'Address1', 'customer1.jpg', '192.168.1.1', 'confirmcode1');

INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code)
VALUES (2, 'Customer2', 'customer2@example.com', 'password2', 'Country2', 'City2', '+987654321', 'Address2', 'customer2.jpg', '192.168.1.2', 'confirmcode2');

INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code)
VALUES (3, 'Customer3', 'customer3@example.com', 'password3', 'Country3', 'City3', '+111222333', 'Address3', 'customer3.jpg', '192.168.1.3', 'confirmcode3');

INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code)
VALUES (4, 'Customer4', 'customer4@example.com', 'password4', 'Country4', 'City4', '+444555666', 'Address4', 'customer4.jpg', '192.168.1.4', 'confirmcode4');

INSERT INTO customers (customer_id, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code)
VALUES (5, 'Customer5', 'customer5@example.com', 'password5', 'Country5', 'City5', '+777888999', 'Address5', 'customer5.jpg', '192.168.1.5', 'confirmcode5');




-- Table: customer_orders
CREATE TABLE customer_orders (
  order_id NUMBER(10) PRIMARY KEY,
  customer_id NUMBER(10) NOT NULL,
  due_amount NUMBER(10, 2) NOT NULL,
  invoice_no NUMBER(10) NOT NULL,
  qty NUMBER(10) NOT NULL,
  size VARCHAR2(100) NOT NULL,
  order_status VARCHAR2(100) NOT NULL,
  CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

--Inserts
INSERT INTO customer_orders (order_id, customer_id, due_amount, invoice_no, qty, size, order_status)
VALUES (1, 1, 100.00, 12345, 2, 'M', 'Pendiente');

INSERT INTO customer_orders (order_id, customer_id, due_amount, invoice_no, qty, size, order_status)
VALUES (2, 2, 150.00, 12346, 1, 'L', 'En Proceso');

INSERT INTO customer_orders (order_id, customer_id, due_amount, invoice_no, qty, size, order_status)
VALUES (3, 3, 75.50, 12347, 3, 'S', 'Entregado');

INSERT INTO customer_orders (order_id, customer_id, due_amount, invoice_no, qty, size, order_status)
VALUES (4, 4, 200.00, 12348, 2, 'XL', 'Pendiente');

INSERT INTO customer_orders (order_id, customer_id, due_amount, invoice_no, qty, size, order_status)
VALUES (5, 5, 80.25, 12349, 1, 'M', 'En Proceso');



-- Table: wishlist
CREATE TABLE wishlist (
  wishlist_id NUMBER(10) PRIMARY KEY,
  customer_id NUMBER(10) NOT NULL,
  product_id NUMBER(10) NOT NULL,
  CONSTRAINT fk_wishlist_customer_id FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
  CONSTRAINT fk_wishlist_product_id FOREIGN KEY (product_id) REFERENCES products(product_id)
);

--inserts
INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (1, 1, 101);

INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (2, 2, 102);

INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (3, 3, 103);

INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (4, 4, 104);

INSERT INTO wishlist (wishlist_id, customer_id, product_id)
VALUES (5, 5, 105);



-- Table: cart
CREATE TABLE cart (
  cart_id NUMBER(10) PRIMARY KEY,
  customer_id NUMBER(10) NOT NULL,
  p_id NUMBER(10) NOT NULL,
  ip_add VARCHAR2(255) NOT NULL,
  qty NUMBER(10) NOT NULL,
  p_price NUMBER(10, 2) NOT NULL,
  size VARCHAR2(255) NOT NULL,
  CONSTRAINT fk_cart_customer_id FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
  CONSTRAINT fk_cart_product_id FOREIGN KEY (p_id) REFERENCES products(product_id)
);

--inserts
INSERT INTO cart (cart_id, customer_id, p_id, ip_add, qty, p_price, size)
VALUES (1, 1, 101, '192.168.1.1', 2, 50.00, 'M');

INSERT INTO cart (cart_id, customer_id, p_id, ip_add, qty, p_price, size)
VALUES (2, 2, 102, '192.168.1.2', 1, 30.00, 'L');

INSERT INTO cart (cart_id, customer_id, p_id, ip_add, qty, p_price, size)
VALUES (3, 3, 103, '192.168.1.3', 3, 25.50, 'S');

INSERT INTO cart (cart_id, customer_id, p_id, ip_add, qty, p_price, size)
VALUES (4, 4, 104, '192.168.1.4', 2, 70.00, 'XL');

INSERT INTO cart (cart_id, customer_id, p_id, ip_add, qty, p_price, size)
VALUES (5, 5, 105, '192.168.1.5', 1, 40.25, 'M');



-- Table: pending_orders
CREATE TABLE pending_orders (
  order_id NUMBER(10) PRIMARY KEY,
  customer_id NUMBER(10) NOT NULL,
  invoice_no NUMBER(10) NOT NULL,
  product_id NUMBER(10) NOT NULL,
  qty NUMBER(10) NOT NULL,
  size VARCHAR2(255) NOT NULL,
  order_status VARCHAR2(255) NOT NULL,
  CONSTRAINT fk_pending_orders_customer_id FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
  CONSTRAINT fk_pending_orders_product_id FOREIGN KEY (product_id) REFERENCES products(product_id)
);

--inserts 
INSERT INTO pending_orders (order_id, customer_id, invoice_no, product_id, qty, size, order_status)
VALUES (1, 1, 12345, 101, 2, 'M', 'Pendiente');

INSERT INTO pending_orders (order_id, customer_id, invoice_no, product_id, qty, size, order_status)
VALUES (2, 2, 12346, 102, 1, 'L', 'En Proceso');

INSERT INTO pending_orders (order_id, customer_id, invoice_no, product_id, qty, size, order_status)
VALUES (3, 3, 12347, 103, 3, 'S', 'Entregado');

INSERT INTO pending_orders (order_id, customer_id, invoice_no, product_id, qty, size, order_status)
VALUES (4, 4, 12348, 104, 2, 'XL', 'Pendiente');

INSERT INTO pending_orders (order_id, customer_id, invoice_no, product_id, qty, size, order_status)
VALUES (5, 5, 12349, 105, 1, 'M', 'En Proceso');



-- Table: coupons
CREATE TABLE coupons (
  coupon_id NUMBER(10) PRIMARY KEY,
  product_id NUMBER(10) NOT NULL,
  coupon_title VARCHAR2(255) NOT NULL,
  coupon_price NUMBER(10, 2) NOT NULL,
  coupon_code VARCHAR2(255) NOT NULL,
  coupon_limit NUMBER(10) NOT NULL,
  coupon_used NUMBER(10) NOT NULL,
  CONSTRAINT fk_coupons_product_id FOREIGN KEY (product_id) REFERENCES products(product_id)
);
--inserts
INSERT INTO coupons (coupon_id, product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
VALUES (1, 101, 'Descuento de Verano', 10.00, 'VERANO10', 100, 0);

INSERT INTO coupons (coupon_id, product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
VALUES (2, 102, 'Oferta Especial', 20.00, 'OFERTA20', 50, 0);

INSERT INTO coupons (coupon_id, product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
VALUES (3, 103, 'Descuento Navideño', 15.00, 'NAVIDAD15', 75, 0);

INSERT INTO coupons (coupon_id, product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
VALUES (4, 104, 'Cupón de Cumpleaños', 30.00, 'CUMPLE30', 30, 0);

INSERT INTO coupons (coupon_id, product_id, coupon_title, coupon_price, coupon_code, coupon_limit, coupon_used)
VALUES (5, 105, 'Oferta de Primavera', 25.00, 'PRIMAVERA25', 50, 0);




-- Table: bundle_product_relation
CREATE TABLE bundle_product_relation (
  rel_id NUMBER(10) PRIMARY KEY,
  rel_title VARCHAR2(255) NOT NULL,
  product_id NUMBER(10) NOT NULL,
  bundle_id NUMBER(10) NOT NULL,
  CONSTRAINT fk_bundle_product_relation_product_id FOREIGN KEY (product_id) REFERENCES products(product_id),
  CONSTRAINT fk_bundle_product_relation_bundle_id FOREIGN KEY (bundle_id) REFERENCES bundle_product_relation(bundle_id)
);

--inserts
INSERT INTO bundle_product_relation (rel_id, rel_title, product_id, bundle_id)
VALUES (1, 'Relación 1', 101, 201);

INSERT INTO bundle_product_relation (rel_id, rel_title, product_id, bundle_id)
VALUES (2, 'Relación 2', 102, 202);

INSERT INTO bundle_product_relation (rel_id, rel_title, product_id, bundle_id)
VALUES (3, 'Relación 3', 103, 203);

INSERT INTO bundle_product_relation (rel_id, rel_title, product_id, bundle_id)
VALUES (4, 'Relación 4', 104, 204);

INSERT INTO bundle_product_relation (rel_id, rel_title, product_id, bundle_id)
VALUES (5, 'Relación 5', 105, 205);




-- Table: coupon_product_relation
CREATE TABLE coupon_product_relation (
  coupon_id NUMBER(10) NOT NULL,
  product_id NUMBER(10) NOT NULL,
  PRIMARY KEY (coupon_id, product_id),
  CONSTRAINT fk_coupon_product_relation_coupon_id FOREIGN KEY (coupon_id) REFERENCES coupons(coupon_id),
  CONSTRAINT fk_coupon_product_relation_product_id FOREIGN KEY (product_id) REFERENCES products(product_id)
);
--inserts
INSERT INTO coupon_product_relation (coupon_id, product_id)
VALUES (1, 101);

INSERT INTO coupon_product_relation (coupon_id, product_id)
VALUES (2, 102);

INSERT INTO coupon_product_relation (coupon_id, product_id)
VALUES (3, 103);

INSERT INTO coupon_product_relation (coupon_id, product_id)
VALUES (4, 104);

INSERT INTO coupon_product_relation (coupon_id, product_id)
VALUES (5, 105);


-- Table: bundle_product_relation_mapping
CREATE TABLE bundle_product_relation_mapping (
  product_id NUMBER(10) NOT NULL,
  bundle_id NUMBER(10) NOT NULL,
  PRIMARY KEY (product_id, bundle_id),
  CONSTRAINT fk_bundle_product_relation_mapping_product_id FOREIGN KEY (product_id) REFERENCES products(product_id),
  CONSTRAINT fk_bundle_product_relation_mapping_bundle_id FOREIGN KEY (bundle_id) REFERENCES bundle_product_relation(bundle_id)
);
--inserts
INSERT INTO bundle_product_relation_mapping (product_id, bundle_id)
VALUES (101, 201);

INSERT INTO bundle_product_relation_mapping (product_id, bundle_id)
VALUES (102, 202);

INSERT INTO bundle_product_relation_mapping (product_id, bundle_id)
VALUES (103, 203);

INSERT INTO bundle_product_relation_mapping (product_id, bundle_id)
VALUES (104, 204);

INSERT INTO bundle_product_relation_mapping (product_id, bundle_id)
VALUES (105, 205);



-- Table: about_us
CREATE TABLE about_us (
  about_id NUMBER(10) PRIMARY KEY,
  about_heading VARCHAR2(255) NOT NULL,
  about_short_desc VARCHAR2(4000) NOT NULL,
  about_desc CLOB NOT NULL
);
--inserts
INSERT INTO about_us (about_id, about_heading, about_short_desc, about_desc)
VALUES (1, 'Nuestra Historia', 'Descubre cómo comenzamos nuestra empresa.', 'Somos una empresa fundada en 20XX con la misión de proporcionar productos y servicios de calidad a nuestros clientes. Desde entonces, hemos estado comprometidos con la excelencia y la satisfacción del cliente.');

INSERT INTO about_us (about_id, about_heading, about_short_desc, about_desc)
VALUES (2, 'Nuestro Equipo', 'Conoce al equipo detrás de nuestra empresa.', 'Nuestro equipo está formado por profesionales altamente calificados y apasionados que trabajan juntos para ofrecer soluciones innovadoras y satisfacer las necesidades de nuestros clientes.');

INSERT INTO about_us (about_id, about_heading, about_short_desc, about_desc)
VALUES (3, 'Nuestra Misión', 'Descubre nuestra misión y valores.', 'Nuestra misión es proporcionar productos y servicios de alta calidad que mejoren la vida de nuestros clientes. Nos esforzamos por mantener altos estándares éticos y de integridad en todo lo que hacemos.');

INSERT INTO about_us (about_id, about_heading, about_short_desc, about_desc)
VALUES (4, 'Nuestros Valores', 'Conoce los valores que guían nuestro trabajo diario.', 'Valoramos la honestidad, la responsabilidad, la innovación y el compromiso con la excelencia en todo lo que hacemos. Estos valores fundamentales nos ayudan a mantenernos enfocados en nuestra misión y a satisfacer las necesidades de nuestros clientes.');

INSERT INTO about_us (about_id, about_heading, about_short_desc, about_desc)
VALUES (5, 'Nuestro Compromiso', 'Descubre nuestro compromiso con la comunidad y el medio ambiente.', 'Estamos comprometidos a ser una empresa socialmente responsable y a contribuir positivamente a la comunidad y al medio ambiente. Nos esforzamos por minimizar nuestro impacto ambiental y apoyar iniciativas benéficas.');


-- Table: contact_us
CREATE TABLE contact_us (
  contact_id NUMBER(10) PRIMARY KEY,
  contact_email VARCHAR2(255) NOT NULL,
  contact_heading VARCHAR2(255) NOT NULL,
  contact_desc CLOB NOT NULL
);

--inserts
INSERT INTO contact_us (contact_id, contact_email, contact_heading, contact_desc)
VALUES (1, 'info@example.com', 'Servicio al Cliente', '¡Gracias por contactarnos! Estamos aquí para ayudarte. Por favor, no dudes en comunicarte con nosotros si tienes alguna pregunta o inquietud.');

INSERT INTO contact_us (contact_id, contact_email, contact_heading, contact_desc)
VALUES (2, 'support@example.com', 'Soporte Técnico', '¿Necesitas ayuda técnica? No te preocupes, estamos aquí para asistirte. Por favor, envíanos un correo electrónico con los detalles de tu problema y te responderemos lo antes posible.');

INSERT INTO contact_us (contact_id, contact_email, contact_heading, contact_desc)
VALUES (3, 'sales@example.com', 'Ventas', '¿Interesado en nuestros productos o servicios? Contáctanos para obtener más información sobre nuestras ofertas y promociones actuales.');

INSERT INTO contact_us (contact_id, contact_email, contact_heading, contact_desc)
VALUES (4, 'partnerships@example.com', 'Alianzas Comerciales', '¿Estás interesado en una colaboración o alianza comercial con nosotros? ¡Nos encantaría escuchar tus ideas! Por favor, envíanos un correo electrónico para discutir las posibilidades.');

INSERT INTO contact_us (contact_id, contact_email, contact_heading, contact_desc)
VALUES (5, 'media@example.com', 'Contacto de Medios', '¿Eres un miembro de los medios de comunicación y necesitas información sobre nuestra empresa? ¡Estamos aquí para ayudarte! Por favor, ponte en contacto con nosotros para consultas relacionadas con los medios.');



-- Table: store
CREATE TABLE store (
  store_id NUMBER(10) PRIMARY KEY,
  store_title VARCHAR2(255) NOT NULL,
  store_image VARCHAR2(255) NOT NULL,
  store_desc CLOB NOT NULL,
  store_button VARCHAR2(255) NOT NULL,
  store_url VARCHAR2(255) NOT NULL
);

--inserts
INSERT INTO store (store_id, store_title, store_image, store_desc, store_button, store_url)
VALUES (1, 'Tienda Principal', 'main_store.jpg', 'Bienvenido a nuestra tienda principal. Aquí encontrarás una amplia selección de productos de alta calidad.', 'Explorar', '/store/main');

INSERT INTO store (store_id, store_title, store_image, store_desc, store_button, store_url)
VALUES (2, 'Tienda de Ropa', 'clothing_store.jpg', '¡Descubre las últimas tendencias en moda en nuestra tienda de ropa! Encuentra ropa para todas las ocasiones.', 'Ver Colección', '/store/clothing');

INSERT INTO store (store_id, store_title, store_image, store_desc, store_button, store_url)
VALUES (3, 'Tienda de Electrónica', 'electronics_store.jpg', 'Explora nuestra amplia gama de productos electrónicos de última generación en nuestra tienda de electrónica.', 'Explorar', '/store/electronics');

INSERT INTO store (store_id, store_title, store_image, store_desc, store_button, store_url)
VALUES (4, 'Tienda de Juguetes', 'toy_store.jpg', '¡Diversión asegurada en nuestra tienda de juguetes! Encuentra los juguetes más populares para todas las edades.', 'Ver Juguetes', '/store/toys');

INSERT INTO store (store_id, store_title, store_image, store_desc, store_button, store_url)
VALUES (5, 'Tienda de Hogar', 'home_store.jpg', 'Descubre nuestra selección de productos para el hogar que harán que tu espacio sea aún más acogedor.', 'Explorar', '/store/home');


-- Table: terms
CREATE TABLE terms (
  term_id NUMBER(10) PRIMARY KEY,
  term_title VARCHAR2(100) NOT NULL,
  term_link VARCHAR2(100) NOT NULL,
  term_desc CLOB NOT NULL
);

--inserts
INSERT INTO terms (term_id, term_title, term_link, term_desc)
VALUES (1, 'Términos de Uso', '/terms_of_use', 'Lee nuestros términos de uso para entender las condiciones bajo las cuales puedes utilizar nuestros servicios.');

INSERT INTO terms (term_id, term_title, term_link, term_desc)
VALUES (2, 'Política de Privacidad', '/privacy_policy', 'Nuestra política de privacidad describe cómo recopilamos, utilizamos y protegemos tu información personal.');

INSERT INTO terms (term_id, term_title, term_link, term_desc)
VALUES (3, 'Condiciones de Venta', '/sales_conditions', 'Consulta nuestras condiciones de venta para conocer los detalles sobre los precios, el envío y la devolución de productos.');

INSERT INTO terms (term_id, term_title, term_link, term_desc)
VALUES (4, 'Política de Cookies', '/cookie_policy', 'Lee nuestra política de cookies para entender cómo utilizamos las cookies y cómo puedes gestionar tus preferencias.');

INSERT INTO terms (term_id, term_title, term_link, term_desc)
VALUES (5, 'Términos y Condiciones', '/terms_and_conditions', 'Consulta nuestros términos y condiciones generales para conocer las reglas y restricciones relacionadas con el uso de nuestros servicios y productos.');


-- Table: payments
CREATE TABLE payments (
  payment_id NUMBER(10) PRIMARY KEY,
  invoice_no NUMBER(10) NOT NULL,
  amount NUMBER(10, 2) NOT NULL,
  payment_mode VARCHAR2(255) NOT NULL,
  ref_no NUMBER(10) NOT NULL,
  code NUMBER(10) NOT NULL,
  payment_date DATE NOT NULL
);

--inserts
INSERT INTO payments (payment_id, invoice_no, amount, payment_mode, ref_no, code, payment_date)
VALUES (1, 1001, 50.00, 'Tarjeta de Crédito', 123456, 987654, TO_DATE('2024-04-10', 'YYYY-MM-DD'));

INSERT INTO payments (payment_id, invoice_no, amount, payment_mode, ref_no, code, payment_date)
VALUES (2, 1002, 75.50, 'Transferencia Bancaria', 789012, 345678, TO_DATE('2024-04-11', 'YYYY-MM-DD'));

INSERT INTO payments (payment_id, invoice_no, amount, payment_mode, ref_no, code, payment_date)
VALUES (3, 1003, 100.00, 'PayPal', 654321, 210987, TO_DATE('2024-04-12', 'YYYY-MM-DD'));

INSERT INTO payments (payment_id, invoice_no, amount, payment_mode, ref_no, code, payment_date)
VALUES (4, 1004, 120.25, 'Tarjeta de Débito', 456789, 789012, TO_DATE('2024-04-13', 'YYYY-MM-DD'));

INSERT INTO payments (payment_id, invoice_no, amount, payment_mode, ref_no, code, payment_date)
VALUES (5, 1005, 200.00, 'Efectivo', 321098, 567890, TO_DATE('2024-04-14', 'YYYY-MM-DD'));



-- Foreign key from product_categories to products
ALTER TABLE product_categories
ADD FOREIGN KEY (p_cat_id) REFERENCES products(p_cat_id);

-- Foreign key from categories to products
ALTER TABLE categories
ADD FOREIGN KEY (cat_id) REFERENCES products(cat_id);

-- Foreign key from admins to customer_orders
ALTER TABLE admins
ADD FOREIGN KEY (admin_id) REFERENCES customer_orders(admin_id);

-- Foreign key from customers to customer_orders
ALTER TABLE customers
ADD FOREIGN KEY (customer_id) REFERENCES customer_orders(customer_id);

-- Foreign key from customers to wishlist
ALTER TABLE customers
ADD FOREIGN KEY (customer_id) REFERENCES wishlist(customer_id);

-- Foreign key from customers to cart
ALTER TABLE customers
ADD FOREIGN KEY (customer_id) REFERENCES cart(customer_id);

-- Foreign key from coupons to products
ALTER TABLE coupons
ADD FOREIGN KEY (product_id) REFERENCES products(product_id);

-- Foreign key from coupons to bundle_product_relation
ALTER TABLE coupons
ADD FOREIGN KEY (bundle_id) REFERENCES bundle_product_relation(bundle_id);

-- Foreign key from bundle_product_relation_mapping to products
ALTER TABLE bundle_product_relation_mapping
ADD FOREIGN KEY (product_id) REFERENCES products(product_id);

-- Foreign key from bundle_product_relation_mapping to bundle_product_relation
ALTER TABLE bundle_product_relation_mapping
ADD FOREIGN KEY (bundle_id) REFERENCES bundle_product_relation(bundle_id);

-- Foreign key from pending_orders to products
ALTER TABLE pending_orders
ADD FOREIGN KEY (product_id) REFERENCES products(product_id);

CREATE OR REPLACE PROCEDURE change_password(
    p_customer_email IN VARCHAR2,
    p_old_password IN VARCHAR2,
    p_new_password IN VARCHAR2,
    p_new_password_again IN VARCHAR2,
    p_msg OUT VARCHAR2
)
IS
    v_hashed_password VARCHAR2(255);
    v_old_password VARCHAR2(255);
BEGIN
    -- Verificar que las contraseñas nuevas coincidan
    IF p_new_password <> p_new_password_again THEN
        p_msg := 'Your New Password does not match';
        RETURN;
    END IF;
    
    -- Obtener la contraseña actual del cliente
    SELECT customer_pass INTO v_old_password
    FROM customers
    WHERE customer_email = p_customer_email;
    
    -- Verificar que la contraseña antigua coincida
    IF NOT dbms_crypto.compare(p_old_password, v_old_password) = 0 THEN
        p_msg := 'Your Current Password is not valid try again';
        RETURN;
    END IF;
    
    -- Generar el hash de la nueva contraseña
    v_hashed_password := dbms_crypto.hash(p_new_password, dbms_crypto.hash_sha256);
    
    -- Actualizar la contraseña en la tabla de clientes
    UPDATE customers
    SET customer_pass = v_hashed_password
    WHERE customer_email = p_customer_email;
    
    p_msg := 'Success';
    
EXCEPTION
    WHEN OTHERS THEN
        p_msg := 'An error occurred. Please try again later.';
END;
/

CREATE OR REPLACE PROCEDURE confirm_payment(
    p_order_id IN NUMBER,
    p_invoice_no IN VARCHAR2,
    p_amount IN NUMBER,
    p_payment_mode IN VARCHAR2,
    p_ref_no IN VARCHAR2,
    p_code IN VARCHAR2,
    p_payment_date IN DATE,
    p_msg OUT VARCHAR2
)
IS
BEGIN
    -- Insertar el pago en la tabla de pagos
    INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, code, payment_date)
    VALUES (p_invoice_no, p_amount, p_payment_mode, p_ref_no, p_code, p_payment_date);
    
    -- Actualizar el estado del pedido en la tabla de órdenes de clientes
    UPDATE customer_orders
    SET order_status = 'Complete'
    WHERE order_id = p_order_id;
    
    -- Actualizar el estado del pedido en la tabla de órdenes pendientes
    UPDATE pending_orders
    SET order_status = 'Complete'
    WHERE order_id = p_order_id;
    
    p_msg := 'Success';
EXCEPTION
    WHEN OTHERS THEN
        p_msg := 'An error occurred. Please try again later.';
END;
/

CREATE OR REPLACE PROCEDURE customer_login(
    p_customer_email IN VARCHAR2,
    p_customer_pass IN VARCHAR2,
    p_login_status OUT VARCHAR2
)
IS
    v_customer_count NUMBER;
BEGIN
    -- Verificar las credenciales del cliente
    SELECT COUNT(*) INTO v_customer_count
    FROM customers
    WHERE customer_email = p_customer_email
    AND customer_pass = p_customer_pass;
    
    IF v_customer_count = 0 THEN
        p_login_status := 'password or email is wrong';
    ELSE
        p_login_status := 'Success';
    END IF;
END;
/

CREATE OR REPLACE PROCEDURE delete_customer_account(
    p_customer_email IN VARCHAR2,
    p_success OUT VARCHAR2
)
IS
BEGIN
    -- Eliminar la cuenta del cliente
    DELETE FROM customers WHERE customer_email = p_customer_email;

    -- Verificar si la cuenta ha sido eliminada correctamente
    IF SQL%ROWCOUNT > 0 THEN
        p_success := 'success';
    ELSE
        p_success := 'error';
    END IF;
END;
/
CREATE OR REPLACE PROCEDURE delete_wishlist_item(
    p_wishlist_id IN NUMBER,
    p_success OUT VARCHAR2
)
IS
BEGIN
    -- Eliminar el elemento de la lista de deseos
    DELETE FROM wishlist WHERE wishlist_id = p_wishlist_id;

    -- Verificar si el elemento ha sido eliminado correctamente
    IF SQL%ROWCOUNT > 0 THEN
        p_success := 'success';
    ELSE
        p_success := 'error';
    END IF;
END;
/
-- Procedimiento almacenado para obtener los detalles del cliente
CREATE OR REPLACE PROCEDURE get_customer_details(
    p_email IN VARCHAR2,
    p_customer_id OUT VARCHAR2,
    p_customer_name OUT VARCHAR2,
    p_customer_country OUT VARCHAR2,
    p_customer_city OUT VARCHAR2,
    p_customer_contact OUT VARCHAR2,
    p_customer_address OUT VARCHAR2,
    p_customer_image OUT VARCHAR2
) AS
BEGIN
    SELECT customer_id, customer_name, customer_country, customer_city, customer_contact, customer_address, customer_image
    INTO p_customer_id, p_customer_name, p_customer_country, p_customer_city, p_customer_contact, p_customer_address, p_customer_image
    FROM customers
    WHERE customer_email = p_email;
END get_customer_details;
/

-- Procedimiento almacenado para confirmar el correo electrónico del cliente
CREATE OR REPLACE PROCEDURE confirm_email(
    p_confirm_code IN VARCHAR2
) AS
BEGIN
    UPDATE customers
    SET customer_confirm_code = ''
    WHERE customer_confirm_code = p_confirm_code;
    COMMIT;
END confirm_email;
/
-- Procedimiento almacenado para enviar el correo electrónico de confirmación nuevamente
CREATE OR REPLACE PROCEDURE send_confirmation_email(
    p_email IN VARCHAR2,
    p_customer_name IN VARCHAR2,
    p_confirm_code IN VARCHAR2
) AS
    v_subject VARCHAR2(100) := 'Email Confirmation Message';
    v_from VARCHAR2(100) := 'your_email@example.com';
    v_message CLOB;
    v_headers VARCHAR2(200);
BEGIN
    -- Construir el mensaje de correo electrónico
    v_message := '<h2>Email Confirmation By YourWebsite.com ' || p_customer_name || '</h2><a href="localhost/ecom_store/customer/my_account.php?' || p_confirm_code || '">Click Here To Confirm Email</a>';

    -- Construir los encabezados del correo electrónico
    v_headers := 'From: ' || v_from || CHR(13) || CHR(10);
    v_headers := v_headers || 'Content-type: text/html; charset=iso-8859-1' || CHR(13) || CHR(10);

    -- Enviar el correo electrónico
    UTL_MAIL.send(
        sender => v_from,
        recipients => p_email,
        subject => v_subject,
        message => v_message,
        mime_type => 'text/html',
        priority => 1
    );

    COMMIT;
END send_confirmation_email;
/
CREATE OR REPLACE PROCEDURE get_customer_id (
    p_customer_email IN VARCHAR2,
    p_customer_id OUT NUMBER
) AS
BEGIN
    SELECT customer_id INTO p_customer_id
    FROM customers
    WHERE customer_email = p_customer_email;
END;
/
CREATE OR REPLACE PROCEDURE get_customer_orders (
    p_customer_id IN NUMBER,
    p_order_id OUT SYS.ODCINUMBERLIST,
    p_due_amount OUT SYS.ODCINUMBERLIST,
    p_invoice_no OUT SYS.ODCINUMBERLIST,
    p_qty OUT SYS.ODCINUMBERLIST,
    p_size OUT SYS.ODCIVARCHAR2LIST,
    p_order_date OUT SYS.ODCIVARCHAR2LIST,
    p_order_status OUT SYS.ODCIVARCHAR2LIST
) AS
BEGIN
    SELECT order_id, due_amount, invoice_no, qty, size, TO_CHAR(order_date, 'YYYY-MM-DD'), order_status
    BULK COLLECT INTO p_order_id, p_due_amount, p_invoice_no, p_qty, p_size, p_order_date, p_order_status
    FROM customer_orders
    WHERE customer_id = p_customer_id;
END;
/
CREATE OR REPLACE PROCEDURE get_customer_id(
    p_customer_email IN VARCHAR2,
    p_customer_id OUT NUMBER
)
AS
BEGIN
    SELECT customer_id INTO p_customer_id
    FROM customers
    WHERE customer_email = p_customer_email;
END;
/
CREATE OR REPLACE PROCEDURE get_customer_wishlist(
    p_customer_id IN NUMBER,
    p_wishlist_id OUT SYS.ODCINUMBERLIST,
    p_product_id OUT SYS.ODCINUMBERLIST
)
AS
BEGIN
    SELECT wishlist_id, product_id
    BULK COLLECT INTO p_wishlist_id, p_product_id
    FROM wishlist
    WHERE customer_id = p_customer_id;
END;
/

CREATE OR REPLACE PROCEDURE update_customer (
    p_customer_id IN NUMBER,
    p_customer_name IN VARCHAR2,
    p_customer_email IN VARCHAR2,
    p_customer_country IN VARCHAR2,
    p_customer_city IN VARCHAR2,
    p_customer_contact IN VARCHAR2,
    p_customer_address IN VARCHAR2,
    p_customer_image IN VARCHAR2
) AS
BEGIN
    UPDATE customers
    SET customer_name = p_customer_name,
        customer_email = p_customer_email,
        customer_country = p_customer_country,
        customer_city = p_customer_city,
        customer_contact = p_customer_contact,
        customer_address = p_customer_address,
        customer_image = p_customer_image
    WHERE customer_id = p_customer_id;
    COMMIT;
END;
/
CREATE OR REPLACE PROCEDURE get_customer_wishlist(
    p_customer_id IN NUMBER,
    p_wishlist_id OUT SYS.ODCINUMBERLIST,
    p_product_id OUT SYS.ODCINUMBERLIST
)
AS
BEGIN
    SELECT wishlist_id, product_id
    BULK COLLECT INTO p_wishlist_id, p_product_id
    FROM wishlist
    WHERE customer_id = p_customer_id;
END;
/
CREATE OR REPLACE PROCEDURE get_product_details(
    p_product_id IN NUMBER,
    p_product_title OUT VARCHAR2,
    p_product_url OUT VARCHAR2,
    p_product_img1 OUT VARCHAR2
)
AS
BEGIN
    SELECT product_title, product_url, product_img1
    INTO p_product_title, p_product_url, p_product_img1
    FROM products
    WHERE product_id = p_product_id;
END;
/
-- Procedimiento para obtener la cantidad de elementos en el carrito
CREATE OR REPLACE PROCEDURE get_items_count
IS
  v_ip_add VARCHAR2(50);
  v_count_items NUMBER;
BEGIN
  -- Obtener la dirección IP real del usuario
  v_ip_add := get_real_user_ip();

  -- Consultar la base de datos para obtener los elementos del carrito para esta dirección IP
  SELECT COUNT(*) INTO v_count_items
  FROM cart
  WHERE ip_add = v_ip_add;

  -- Mostrar la cantidad de elementos
  DBMS_OUTPUT.PUT_LINE('Número de elementos: ' || v_count_items);
END get_items_count;
/


CREATE OR REPLACE PROCEDURE GET_PRODUCTS_PAGINATED (
    p_manufacturer_id IN NUMBER DEFAULT NULL,
    p_category_id IN NUMBER DEFAULT NULL,
    p_page_number IN NUMBER,
    p_page_size IN NUMBER
)
IS
    v_start_index NUMBER;
    v_end_index NUMBER;
BEGIN
    -- Calcular los índices de inicio y fin para la paginación
    v_start_index := (p_page_number - 1) * p_page_size + 1;
    v_end_index := p_page_number * p_page_size;

    -- Consulta para obtener los productos filtrados y paginados
    FOR product_row IN (
        SELECT *
        FROM (
            SELECT 
                p.*,
                ROW_NUMBER() OVER (ORDER BY product_id) AS row_num
            FROM 
                products p
            WHERE 
                (p_manufacturer_id IS NULL OR manufacturer_id = p_manufacturer_id)
                AND (p_category_id IS NULL OR category_id = p_category_id)
        )
        WHERE 
            row_num BETWEEN v_start_index AND v_end_index
    )
    LOOP
        -- Devolver los resultados (puedes modificar esto según tu estructura de datos)
        DBMS_OUTPUT.PUT_LINE('Product ID: ' || product_row.product_id || ', Product Name: ' || product_row.product_name);
        -- Agrega más columnas según tus necesidades
    END LOOP;
END;
/

CREATE OR REPLACE PROCEDURE Get_Paginator_Paginated (
    p_manufacturer_id    IN NUMBER DEFAULT NULL,
    p_p_cat_id           IN NUMBER DEFAULT NULL,
    p_cat_id             IN NUMBER DEFAULT NULL,
    p_per_page           IN NUMBER DEFAULT 6,
    p_page               IN NUMBER DEFAULT 1
) AS
    per_page NUMBER := p_per_page;
    start_from NUMBER := (p_page - 1) * per_page;
    total_records NUMBER;
    total_pages NUMBER;
BEGIN
    -- Consultar el número total de registros
    SELECT COUNT(*) INTO total_records
    FROM products
    WHERE (p_manufacturer_id IS NULL OR manufacturer_id = p_manufacturer_id)
    AND (p_p_cat_id IS NULL OR p_cat_id = p_p_cat_id)
    AND (p_cat_id IS NULL OR cat_id = p_cat_id);

    -- Calcular el número total de páginas
    total_pages := CEIL(total_records / per_page);

    -- Generar el HTML para la paginación
    DBMS_OUTPUT.PUT_LINE('<li><a href="shop.php?page=1' || CASE WHEN p_manufacturer_id IS NOT NULL THEN '&man[]=' || p_manufacturer_id ELSE '' END || CASE WHEN p_p_cat_id IS NOT NULL THEN '&p_cat[]=' || p_p_cat_id ELSE '' END || CASE WHEN p_cat_id IS NOT NULL THEN '&cat[]=' || p_cat_id ELSE '' END || '">First Page</a></li>');

    FOR i IN 1..5 -- Ejemplo de 5 páginas
        DBMS_OUTPUT.PUT_LINE('<li><a href="shop.php?page=' || i || CASE WHEN p_manufacturer_id IS NOT NULL THEN '&man[]=' || p_manufacturer_id ELSE '' END || CASE WHEN p_p_cat_id IS NOT NULL THEN '&p_cat[]=' || p_p_cat_id ELSE '' END || CASE WHEN p_cat_id IS NOT NULL THEN '&cat[]=' || p_cat_id ELSE '' END || '">' || i || '</a></li>');
    END LOOP;

    DBMS_OUTPUT.PUT_LINE('<li><a href="shop.php?page=' || total_pages || CASE WHEN p_manufacturer_id IS NOT NULL THEN '&man[]=' || p_manufacturer_id ELSE '' END || CASE WHEN p_p_cat_id IS NOT NULL THEN '&p_cat[]=' || p_p_cat_id ELSE '' END || CASE WHEN p_cat_id IS NOT NULL THEN '&cat[]=' || p_cat_id ELSE '' END || '">Last Page</a></li>');
END Get_Paginator_Paginated;
/

CREATE OR REPLACE PROCEDURE get_cart_items(
    ip_address IN VARCHAR2,
    cart_items OUT SYS_REFCURSOR
)
AS
BEGIN
    OPEN cart_items FOR
    SELECT p_id, qty, p_price
    FROM cart
    WHERE ip_add = ip_address;
END;
/

CREATE OR REPLACE PROCEDURE get_paginator
AS
BEGIN
  -- Aquí puedes calcular la paginación y generar el HTML correspondiente para los enlaces de paginación
  FOR i IN 1..5 -- Ejemplo de 5 páginas
  LOOP
    DBMS_OUTPUT.PUT_LINE('<li><a href="shop.php?page=' || i || '">' || i || '</a></li>');
  END LOOP;
END;
/
CREATE OR REPLACE PROCEDURE get_products
AS
BEGIN
  FOR product IN (SELECT * FROM products)
  LOOP
    DBMS_OUTPUT.PUT_LINE('Product ID: ' || product.product_id || ', Product Title: ' || product.product_title || ', Product Price: ' || product.product_price);
    -- Puedes procesar cada fila de resultados según sea necesario
  END LOOP;
END;
/
