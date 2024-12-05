<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Student</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #eef2f7;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Form Container */
        form {
            max-width: 500px;
            width: 90%;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.15);
        }

        form label {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            height: 45px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #333;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        form input:focus {
            border-color: #3498db;
            outline: none;
            background-color: #fff;
            box-shadow: 0px 0px 8px rgba(52, 152, 219, 0.3);
        }

        form button {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #2980b9;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <h1>Update Student</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $student['name']; ?>" required>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?= $student['email']; ?>" required>
        
        <label>Phone:</label>
        <input type="text" name="phone" value="<?= $student['phone']; ?>">
        
        <label>Course:</label>
        <input type="text" name="course" value="<?= $student['course']; ?>">
        
        <button type="submit">Update Student</button>
    </form>
</body>
</html>

