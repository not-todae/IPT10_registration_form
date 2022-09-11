<?php
class Registered
{
	protected $id;
	protected $completeName;
    protected $email;
    protected $password;
	protected $picture_path;

	const TYPE_IMAGE = 'image';
	const DIRECTORY_IMAGES = 'pictures/';

	public function __construct(
        $completeName,
        $email,
        $password,
		$picture_path = null,
	)
	{
        $this->completeName = $completeName;
        $this->email = $email;
        $this->password = $password;
		$this->picture_path = $picture_path;
	}

	public function getName()
	{
		return $this->completeName;
	}

	public function getPath()
	{
		return $this->picture_path;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
    public function getPass()
	{
		return $this->password;
	}

	public function save()
	{
		global $pdo;
		try {

			$sql = "INSERT INTO registrations SET complete_name=:completeName, email=:email, password=:password, picture_path=:picture_path";
			$statement = $pdo->prepare($sql);

			return $statement->execute([
                ':completeName' => $this->getName(),
                ':email' => $this->getEmail(),
                ':password' => $this->getPass(),
				':picture_path' => $this->getPath()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public static function handleUpload($fileObject)
	{
		try {
            $base_dir = getcwd() . '/';
            $target_dir = $base_dir . static::DIRECTORY_IMAGES;

                if (is_uploaded_file($fileObject['tmp_name'])) {
                    $target_file_path = $target_dir . $fileObject['name'];
					$table_showimage = static::DIRECTORY_IMAGES . $fileObject['name'];
                    if (move_uploaded_file($fileObject['tmp_name'], $target_file_path)) {
                        if (strpos($target_file_path, static::DIRECTORY_IMAGES)) {
                            $file_type = static::TYPE_IMAGE;
                        }
                        return [
                            'showimage' => $table_showimage
                        ];
                    }
                }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}