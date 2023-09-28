<style>
    h1{
        font-size: 30px;
        text-align: center;
        font-weight: 300;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<h1>Export Data to MS Word from Database</h1>
<table border="1" style="border-collapse:collapse; padding: 22px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font: size 20px;">
<thead>
    <th>Sr.No</th>
    <th>German</th>
    <th>French</th>
    <th>Arabic</th>
</thead>
<tbody>
<?php
include_once "./config.php";
$sql = "SELECT * FROM terminologies";
$result = $link->query($sql);
$number = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            font-size: 34px;
            text-align: center;
            font-weight: 300;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
<h1> Border Glossary </h1>
<table border="1" style="border-collapse: collapse; padding: 22px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px;">
    <thead>
    <th>Sr.No</th>
    <th>German</th>
    <th>French</th>
    <th>Arabic</th>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        $number++;
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $row['german']; ?></td>
            <td><?php echo $row['french']; ?></td>
            <td><?php echo $row['arabic']; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<?php
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=ExportFile.doc");
?>
</body>
</html>
