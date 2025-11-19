<?php
$sort = "nom"; 
if (isset($_GET['sort'])) {
    $allowed_sorts = ["nom", "pays", "course", "temps"]; 
    if (in_array($_GET['sort'], $allowed_sorts)) {
        $sort = $_GET['sort'];
    }
}
 
$order = "DESC"; 
if (isset($_GET['order'])) {
    $allowed_orders = ["ASC", "DESC"]; 
    $user_order = strtoupper($_GET['order']); 
    if (in_array($user_order, $allowed_orders)) {
        $order = $user_order;
    }
}


try {
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=tg;charset=utf8', 
        'root', 
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] 
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage()); 
}


$sql_query = "SELECT * FROM `100` ORDER BY `" . $sort . "` " . $order;
$query = $mysqlClient->prepare($sql_query);
$query->execute();

$data = $query->fetchAll(PDO::FETCH_ASSOC);


$mysqlClient = null;


?>

<table>
    <thead>
        <tr>
            <th>
                <a href="?sort=nom&order=<?php echo $sort == 'nom' && $order == 'DESC' ? 'ASC' : 'DESC'; ?>">Nom</a>
                <?php if ($sort == 'nom') echo $order == 'DESC' ? ' ▼' : ' ▲'; ?>
            </th>
            <th>
                <a href="?sort=pays&order=<?php echo $sort == 'pays' && $order == 'DESC' ? 'ASC' : 'DESC'; ?>">Pays</a>
                <?php if ($sort == 'pays') echo $order == 'DESC' ? ' ▼' : ' ▲'; ?>
            </th>
            <th> <a href="?sort=course&order=<?php echo $sort == 'course' && $order == 'DESC' ? 'ASC' : 'DESC'; ?>">course</a>
                <?php if ($sort == 'course') echo $order == 'DESC' ? ' ▼' : ' ▲'; ?>
            </th>
            <th>
                <a href="?sort=temps&order=<?php echo $sort == 'temps' && $order == 'DESC' ? 'ASC' : 'DESC'; ?>">temps</a>
                <?php if ($sort == 'temps') echo $order == 'DESC' ? ' ▼' : ' ▲'; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) { ?>
            <tr>
                <td><?php echo htmlspecialchars($value["nom"]); ?></td>
                <td><?php echo htmlspecialchars($value["pays"]); ?></td>
                <td><?php echo htmlspecialchars($value["course"]); ?></td>
                <td><?php echo htmlspecialchars($value["temps"]); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>