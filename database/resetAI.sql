SET @num:= 0;
UPDATE `user` SET Id = @num:= (@num + 1);
ALTER TABLE `user` AUTO_INCREMENT = 1;

SET @num:= 0;
UPDATE phieudangkythuctap SET MaSV = @num:= (@num + 1);
ALTER TABLE phieudangkythuctap AUTO_INCREMENT = 1;