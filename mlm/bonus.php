<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>UUID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Access Key</th>
            <th>Phone Number</th>
            <th>Activated</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>

    <?php

$query = $con->query("SELECT * FROM user ORDER by id");
while($row = $query->fetch_array()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";

    echo "<td>".$row['mobile']."</td>";
    $active = $row['active'];
    if ($active = '1') {
        echo activated ;
    } else {
        echo "<td>".$row['active']."</td>";
    }


    echo "</tr>";
}
?>
    </tbody>
</table>


<?php
$sql = "SELECT id, email,FROM user";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " <br>";
    }
} else {
    echo "0 results";
}
?>