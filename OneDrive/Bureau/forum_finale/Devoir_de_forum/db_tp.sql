select * from user inner join user_has_forum
on (idUser = User_id_user) inner join forum 
on ( forum_id_forum = idforum) where 
user_name = 'david14@gmail.com';

truncate table forum;
truncate table user_has_forum;


select article from forum where title = 'Noel';

select article from user left outer join user_has_forum on 
(idUser = User_id_user) left outer join forum on
(idforum = forum_id_forum) where title = 'Noel'
and idforum != 1;