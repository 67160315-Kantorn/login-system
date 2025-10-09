<html>
<head>
    <title>My First Web</title>
    <?php
        // -------------------------
        // เชื่อมต่อฐานข้อมูล MySQL
        // -------------------------
        $host = "localhost";
        $dbname = "s67160315";  // ✅ ชื่อฐานข้อมูลใน phpMyAdmin
        $username = "s67160315";
        $password = "BAntb9YY";

        $con = mysqli_connect($host, $username, $password, $dbname);

        if (!$con) {
            die("<h3 style='color:red;text-align:center;'>❌ Connection Failed: " . mysqli_connect_error() . "</h3>");
        } else {
            echo "<h3 style='color:green;text-align:center;'>✅ Connection Successful!</h3>";
        }
    ?>
</head>
<body bgcolor="#27E0F5">
<center>
    <h1>Hello World !! This is Kantorn Jaiyai Home Page !!</h1>
    <br>
    <!-- เรียกรูปจากโฟลเดอร์ images -->
    <img src="30c210344bbbcde4d5542c02a0cb908b.gif" width="600">
    <br><br>

    <!-- ตาราง employees (ของเดิม) -->
    <h2>📋 ข้อมูลพนักงาน (employees)</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Name</th>
            <th>Salary</th>
        </tr>
        <?php
        $sql = "SELECT * FROM employees";
        $query = mysqli_query($con, $sql);
        if ($query && mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["emp_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["salary"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>ไม่มีข้อมูลพนักงาน</td></tr>";
        }
        ?>
    </table>

    <br><br>

    <!-- ตาราง users (ใหม่จาก phpMyAdmin) -->
    <h2>👤 รายชื่อผู้ใช้ในระบบ (users)</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>ชื่อที่แสดง</th>
            <th>เข้าสู่ระบบล่าสุด</th>
            <th>วันที่สร้างบัญชี</th>
        </tr>
        <?php
        $sql_users = "SELECT id, email, display_name, last_login, created_at FROM users ORDER BY id ASC";
        $result_users = mysqli_query($con, $sql_users);

        if ($result_users && mysqli_num_rows($result_users) > 0) {
            while ($u = mysqli_fetch_assoc($result_users)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($u["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($u["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($u["display_name"] ?? '-') . "</td>";
                echo "<td>" . ($u["last_login"] ?: '-') . "</td>";
                echo "<td>" . htmlspecialchars($u["created_at"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>ยังไม่มีผู้ใช้ในระบบ</td></tr>";
        }
        ?>
    </table>

</center>
</body>
</html>

