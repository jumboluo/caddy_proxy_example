<?php
$servername = "db";
$username = "root";
$password = "example";
$dbname = "mysql";



// 创建连接
$conn = new \mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功<br>";

// 执行查询
$sql = "SELECT Host, User, password_last_changed FROM user";
$result = $conn->query($sql);

echo "<pre>";
echo str_pad("Host", 10) . "\t" . str_pad("User", 20) . "\tLast Changed\n";
echo str_repeat("=", 60) . "\n";

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo str_pad($row["Host"], 10). "\t" . str_pad($row["User"], 20). "\t" . $row["password_last_changed"]. "\n";
    }
} else {
    echo "0 结果";
}

// 关闭连接
$conn->close();

echo "</pre><br/>";
echo date('Y-m-d H:i:s');