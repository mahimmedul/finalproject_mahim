<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
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
            color: #1BBC9D;
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
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
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
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        form input:focus {
            border-color: #1BBC9D;
            outline: none;
            background-color: #fff;
            box-shadow: 0px 0px 8px rgba(27, 188, 157, 0.4);
        }

        form button {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #1BBC9D;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #17a589;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
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
    <h1>Add New Student:</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Phone:</label>
        <input type="text" name="phone">
        
        <label>Course:</label>
        <input type="text" name="course">
        
        <button type="submit">Add Student</button>
    </form>
</body>
</html>
