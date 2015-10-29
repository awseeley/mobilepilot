CREATE TABLE Productph2 (

prod_id INT NOT NULL,

prod_name VARCHAR(40) NOT NULL ,

prod_desc VARCHAR(128) DEFAULT NULL ,

prod_img_url VARCHAR(128) DEFAULT NULL ,

prod_long_desc VARCHAR(256) DEFAULT NULL ,

prod_sku CHAR(16) DEFAULT NULL ,

prod_disp_cmd VARCHAR(128) DEFAULT NULL ,

PRIMARY KEY (prod_id) );

CREATE INDEX prod_name ON Productph2 (prod_name ASC) ;



drop table categoryph2;

create table categoryph2 (

cat_id INT NOT NULL ,

cat_name VARCHAR(40) NOT NULL ,

cat_desc VARCHAR(128) DEFAULT NULL ,

cat_img_url VARCHAR(128) DEFAULT NULL ,

CAT_DISP_CMD varchar(128) default null ,

primary key (CAT_ID) ) ;

CREATE INDEX cat_name ON Categoryph2 (cat_name ASC) ;

-- -----------------------------------------------------

-- Table CgPrRel

-- -----------------------------------------------------

CREATE TABLE CgPrRel (

Id INT NOT NULL ,

CgPr_cat_id INT NOT NULL ,

CgPr_prod_id INT NOT NULL ,

PRIMARY KEY (Id) ,

CONSTRAINT pk_parent_cat

FOREIGN KEY (CgPr_cat_id )

REFERENCES Categoryph2 (CAT_ID ),

CONSTRAINT pk_child_prod

FOREIGN KEY (CgPr_prod_id )

REFERENCES Productph2 (PROD_ID ) ) ;

CREATE INDEX pk_parent_cat_idx ON CgPrRel (CgPr_cat_id ASC) ;

CREATE INDEX pk_child_prod_idx ON CgPrRel (CgPr_prod_id ASC) ;


CREATE TABLE CgryRel (

Id INT NOT NULL ,

cgryrel_id_parent INT NOT NULL ,

cgryrel_id_child INT NOT NULL ,

cgryrel_sequence INT NULL ,

PRIMARY KEY (Id) ,

CONSTRAINT fk_parent_cat

FOREIGN KEY (cgryrel_id_parent )

REFERENCES Categoryph2 (cat_id ),

CONSTRAINT fk_child_cat

foreign key (CGRYREL_ID_CHILD )

REFERENCES Categoryph2 (cat_id ) ) ;

CREATE INDEX pk_cc_parent_cat_idx ON CgryRel (cgryrel_id_parent ASC) ;

CREATE INDEX pk_cc_child_cat_idx ON CgryRel (cgryrel_id_child ASC);



insert into categoryph2 values (1,'Store root category','Store root category',null,'DisplayCategory.php');

insert into categoryph2 values (2,'Men''s Clothing','Clothing of all types - trousers, jackets, etc.',null,'DisplayCategory.php');

insert into categoryph2 values (3,'Jeans','Jeans: Denim, cotton, etc.',null,'DisplayCategory.php');

insert into categoryph2 values (4,'Denim Jeans','Denim jeans',null,'DisplayCategory.php');

insert into categoryph2 values (5,'Boot cut jeans','Boot cut jeans',null,'DisplayProducts.php');

insert into categoryph2 values (6,'Straight cut jeans','Straight cut jeans',null,'DisplayProducts.php');

insert into categoryph2 values (7,'Shoes and boots','Shoes and boots','shoes.jpg','DisplayCategory.php');

insert into categoryph2 values (8,'Computers','Computers','computers.jpg','DisplayCategory.php');

insert into categoryph2 values (9,'Laptop computers','Laptop computers','laptop.jpg','DisplayProducts.php');

insert into categoryph2 values (10,'Servers','Rackmount and tower servers','server.jpg','DisplayProducts.php');

insert into categoryph2 values (11,'Shirts','Shirts of all kinds','shirts.jpg','DisplayCategory.php');

insert into categoryph2 values (12,'Trousers','Trousers, jeans, shorts','trousers.jpg','DisplayCategory.php');

insert into categoryph2 values (13,'Jackets','Sports jackets, blazers, etc.','jackets.jpg','DisplayCategory.php');

insert into categoryph2 values (14,'Business shirts','Cotton and cotton blend business shirts','bshirt.jpg','DisplayCategory.php');

insert into categoryph2 values (15,'Short-sleeved shirts','With collars and short sleeves','sshirt.jpg','DisplayCategory.php');

insert into categoryph2 values (16,'T-shirts','Tees: plain and with designs','tshirt.jpg','DisplayCategory.php');

insert into PRODUCTph2 values (1,'Null Product','Null product','null.jpg','Null product','NULL','DisplayProduct.php');

insert into PRODUCTph2 values (2,'Levi 501','Levi 501 Classic Jeans','levi_501.jpg','You will look terrific in these classic blue denim jeans. Hard-wearing, but stylish, these durable pants always look smart, even when you''ve just gotten off your horse.','LEVI501','DisplayProduct.php');

insert into PRODUCTph2 values (3,'Levi 504','Levi 504 Cord Jeans','levi_504.jpg','Light-weight corduroy is perfect for those hot summer days! Look cool and be cool. Available in blue, brown and black.','LEVI504','DisplayProduct.php');

insert into PRODUCTph2 values (4,'Levi 502','Levi 502 Jeans','levi_502.jpg','The classic Levi look in black','LEVI502','DisplayProduct.php');

insert into PRODUCTph2 values (5,'Wrangler CCOR','Wrangler Cowboy Cut Original Fit','wr_ccof.jpg','Available in blue and black, yadda, yadda, yadda','WRCCOF','DisplayProduct.php');

insert into PRODUCTph2 values (6,'XKCD Stats Class Tee','The classic XKCD "Causality" t-shirt','xkcd-t.jpg','The classic XKCD cartoon now comes to a t-shirt near you! Available in blue only.','XKCDT','DisplayProduct.php');

insert into PRODUCTph2 values (7,'IBM 306m','IBM X-Series 306m 1U Rack-mount server','306m.jpg','A 1U rack-mount server. Specify processor, RAM, storage, etc. below','IBM306M','DisplayProduct.php');

insert into CGPRREL values (1,5,2);

insert into CGPRREL values (2,5,4);

insert into CGPRREL values (3,6,3);

insert into CGPRREL values (4,5,5);

insert into CGPRREL values (5,16,6);

insert into CGPRREL values (6,10,7);

insert into CGRYREL values (1,1,2,null);

insert into CGRYREL values (2,2,3,null);

insert into CGRYREL values (3,3,4,null);

insert into CGRYREL values (4,3,5,null);

insert into CGRYREL values (5,3,6,null);

insert into CGRYREL values (6,4,5,null);

insert into CGRYREL values (7,4,6,null);

insert into CGRYREL values (8,2,7,null);

insert into CGRYREL values (9,2,11,null);

insert into CGRYREL values (10,2,12,null);

insert into CGRYREL values (11,12,3,null);

insert into CGRYREL values (12,2,11,null);

insert into CGRYREL values (13,11,14,null);

insert into CGRYREL values (14,11,15,null);

insert into CGRYREL values (15,11,16,null);

insert into CGRYREL values (16,2,13,null);

insert into CGRYREL values (17,1,8,null);

insert into CGRYREL values (18,8,9,null);

insert into CGRYREL values (19,8,10,NULL);


select productph2.prod_name,categoryph2.cat_name,productph2.PROD_DESC,productph2.PROD_IMG_URL from productph2,categoryph2, CGPRREL where productph2.PROD_ID= CGPRREL.cgpr_prod_id AND categoryph2.CAT_ID= CGPRREL.CGPR_CAT_ID;
select * from CGPRREL;
select productph2.prod_name from productph2,categoryph2 where productph2.PROD_ID= CGPRREL.cgpr_prod_id ;
