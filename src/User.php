<?

require_once 'Database.php';

/**
 * Class User
 * @property string $username
 * 
 * This class is used for user actions
 */
class User extends Database
{
    public $username;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * checks if a user is logged in
     * 
     * @return bool
     */
    function isLoggedIn()
    {
        if (!isset($this->username) && isset($_SESSION['username'])) {
            $this->username = $_SESSION['username'];
        }
        if (!(isset($this->username))) {
            return false;
        }
        return true;
    }

    /**
     * tries to log in a user
     * 
     * @param string $username
     * @param string $password
     * 
     * @return bool|string true if successful, error message if not
     */
    function logIn($username, $password)
    {

        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists, if yes then verify password
            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        $this->username = $username;
                        return true;
                    } else {
                        // Password is not valid, display a generic error message
                        return "Invalid username or password.";
                    }
                }
            }
            // Username doesn't exist, display a generic error message
            return "Invalid username or password.";
        }
        return "Oops! Something went wrong. Please try again later.";
    }

    /**
     * logs out a user and redirects to login page
     */
    static function signOut()
    {
        // Initialize the session
        session_start();

        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session.
        session_destroy();

        // Redirect to login page
        header("location: login.php");
        exit;
    }

    function resetPassword($new_password)
    {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = $this->connection->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                return "Oops! Something went wrong. Please try again later.";
            }
        }
        return "Oops! Something went wrong. Please try again later.";
    }
}
