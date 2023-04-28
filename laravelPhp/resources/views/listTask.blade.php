<?php
$connnectMysql = mysqli_connect('localhost','root','','demophp');
$sql = "Select * From list_task";
$result = mysqli_query($connnectMysql,$sql);
function printInfo($text){
    if ($text != null) {
        echo $text;
    } else {
        echo "NULL";
    }
}
?>

    <!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>List Task</h2>

<table>
    <tr>
        <th>ID</th>
        <th>UserID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>CreateDateAt</th>
        <th>UpdateAt</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php printInfo($row['id']); ?></td>
        <td><?php printInfo($row['user_id']); ?></td>
        <td><?php printInfo($row['title']); ?></td>
        <td><?php printInfo($row['description']); ?></td>
        <td><?php printInfo($row['status']); ?></td>
        <td><?php printInfo($row['created_at']); ?></td>
        <td><?php printInfo($row['updated_at']); ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<form action="crud">
    <button type="submit" id = "insert">Insert</button>
    <button type="submit" id = "update">Update</button>
</form>
<br>

</body>
</html>


