drop procedure IF EXISTS getPreNextPosts;
create procedure getPreNextPosts(postId int)
begin
IF(SELECT id from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) IS NULL THEN 
(SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1);
ELSEIF (SELECT id from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1) IS NULL THEN
(SELECT * from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where id = postId);
ELSE
(SELECT * from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = postId) order by post_modified ASC limit 1) UNION ALL (SELECT * from hd_posts where id = postId) UNION ALL (SELECT * from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = postId) order by post_modified DESC limit 1);
END IF;
END;

#(SELECT * from hd_posts where post_modified > (SELECT post_modified FROM hd_posts where id = 249) order by post_modified ASC limit 1) UNION ALL (SELECT * from hd_posts where post_modified < (SELECT post_modified FROM hd_posts where id = 249) order by post_modified DESC limit 1) UNION ALL (SELECT * from hd_posts where id = 249 order by post_modified DESC limit 1);


#

call getPreNextPosts(40);