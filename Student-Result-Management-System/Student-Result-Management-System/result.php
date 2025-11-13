<!DOCTYPE html>
<html>
<head>
    <title>Cambridge Institute of Technology - Student Result Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin-top: 80px;
        }
        form {
            background: white;
            display: inline-block;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
        }
        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        h1 {
            color: #333;
        }
        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Cambridge Institute of Technology, Bengaluru</h1>
    <form action="result_action.php" method="POST">
        <h2>Check Your Result</h2>

        <label>Student USN</label><br>
        <input type="text" name="usn" placeholder="Enter USN" required><br>

        <label>Student DOB</label><br>
        <input type="date" name="dob" required><br>

        <button type="submit" name="submit">Fetch Result</button><br>
        <a href="index.php">Back to Homepage</a>
    </form>
</body>
</html>
