create database if not exists sogedep character set utf8 collate utf8_unicode_ci;
use sogedep;

grant all privileges on sogedep.* to 'sogedep_user'@'localhost' identified by 'secret';