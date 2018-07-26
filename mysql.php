1.mysql分表之后如何范围查询


(SELECT * FROM `user_00` WHERE id<133 ORDER BY id DESC LIMIT 10) 
UNION 
(SELECT * FROM user_01 WHERE id>999 ORDER BY id DESC LIMIT 10)

2.mysql根结点的存储格式


3.mysql limit 优化

先求 id之后 在limit