create database calendar;

-- appointments
create table appoinments(
    id int auto_increment primary key,
    course_name varchar(255),
    instructor_name varchar(255),
    start_date date,
    end_date date,
    created_date timestamp
);
