create table users(
    id int IDENTITY (1,1) not null,
    role varchar(250),
    name varchar(250),
    password varchar(500),
    surname varchar(250),
    nick varchar(250),
    email varchar(250),
    image varchar(250),
    created_at datetime,
    updated_at datetime,
    rememver_token varchar(250),
    CONSTRAINT PK_US PRIMARY KEY (id)
)

create table imagen(
    id int IDENTITY(1,1) not null,
    user_id int,
    image_path varchar(250),
    descripcion varchar(500),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT PK_IM PRIMARY KEY (id),
    CONSTRAINT FK_USM FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE 
)

create table comentario(
    id int IDENTITY(1,1) not null,
    user_id int,
    image_id int,
    content varchar(250),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT PK_CO PRIMARY KEY (id),
    CONSTRAINT FK_USC FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_IMC FOREIGN KEY (image_id) REFERENCES imagen(id),
)

create table likes(
    id int IDENTITY(1,1) not null,
    user_id int,
    image_id int,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT PK_LIKES PRIMARY KEY (id), 
    CONSTRAINT FK_LIKESUER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_IMAGELIK FOREIGN KEY (image_id) REFERENCES imagen(id)
)
