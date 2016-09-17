<?php
	session_start();
	$current_user = $_SESSION["logged_on_user"];
	$to_del = $_POST["to_del"];
	$status = $_POST["submit"];
	$user_path = "data/users";
	$admin_path = "data/admins";
	
	if ($current_user === $to_del)
	{
		echo "ERROR:CANNOT_DEL_SELF";
		header("Location:admin.php?error=1");
		return ;
	}
	if ($status === "OK" && $to_del != NULL)
	{
		if (file_exists($user_path) && file_exists($admin_path))
		{
			$users = unserialize(file_get_contents($user_path));
			$admins = unserialize(file_get_contents($admin_path));
			foreach ($users as $key => $field)
			{
				if ($field["login"] == $to_del)
				{
					unset($users[$key]);
					file_put_contents($user_path, serialize($users));
					echo "OK\n";
					header("Location:admin.php?error=0");
					return ;
				}
			}
			foreach ($admins as $key => $field)
			{
				if ($field["login"] == $to_del)
				{
					unset($admins[$key]);
					file_put_contents($admin_path, serialize($admins));
					echo "OK\n";
					header("Location:admin.php?error=0");
					return ;
				}
			}
			echo "ERROR:USER_NOT_FOUND\n";
			header("Location:admin.php?error=3");
			return ;

		}
		else
		{
			echo "ERROR:FILE_NOT_EXISTS\n";
			header("Location:index.php?error=1");
			return ;
		}
	}
	else
	{
		echo "ERROR:FIELDS_EMPTY\n";
		header("Location:admin.php?error=2");
		return ;
	}
?>