create schema employees collate latin1_swedish_ci;

create table EmpTable
(
    EmpNo      int(4) auto_increment comment 'Employee’s Identification Number' primary key,
    EmpName    varchar(30)   not null comment 'Employee’s Name',
    JobTitle   varchar(20)   not null comment 'Employee’s Job Title',
    Salary     decimal(8, 2) not null comment 'Employee’s Salary',
    DeptNo     int(4)        not null comment 'Employee’s Department Number',
    Commission decimal(7, 2) not null comment 'Employee’s Commission'
);

create definer = root@`%` trigger on_commission_change
    before update
    on EmpTable
    for each row
begin
    if (NEW.Commission > OLD.Salary || NEW.Commission > NEW.Salary) then
        set NEW.Commission = OLD.Commission;
    end if;
end;

create definer = root@`%` trigger on_salary_change
    before update
    on EmpTable
    for each row
begin
    if (NEW.Salary < OLD.Salary) then
        set NEW.Salary = OLD.Salary;
    end if;
end;

create table Users
(
    Id       int(10) auto_increment primary key,
    name     varchar(60)  not null,
    email    varchar(120) not null,
    password varchar(100) not null
);

create
    definer = root@`%` procedure increase_salary()
begin
    declare eno, dno int(4);
    declare emp_sly decimal(8, 2);
    declare finished int default false;
    declare sld10 decimal(8, 2) default 1800;
    declare sld20 decimal(8, 2) default 1600;
    declare employees cursor for
        select EmpNo, Salary, DeptNo from employees.EmpTable;
    declare continue handler for not found set finished = true;
    create temporary table if not exists TempTable
    (
        EmpId     int(4) primary key,
        OldSalary decimal(8, 2),
        NewSalary decimal(8, 2)
    );
    open employees;
    while !finished
        do
            fetch employees into eno, emp_sly, dno;
            if (!finished) then
                if (dno = 10) then
                    insert into TempTable(EmpId, OldSalary, NewSalary)
                    values (eno, emp_sly, emp_sly + sld10);
                else
                    insert into TempTable(EmpId, OldSalary, NewSalary)
                    values (eno, emp_sly, emp_sly + sld20);
                end if;
            end if;
        end while;
    close employees;
    select * from TempTable;
    drop temporary table TempTable;
end;