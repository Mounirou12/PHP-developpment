<?php
/** @var $pdo \PDO */
require_once "../../database.php";


$search = $_GET['search'] ?? '';
if($search){
  $statement = $pdo->prepare('SELECT * FROM product WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title', "%$search%");
}else{
  $statement = $pdo->prepare('SELECT * FROM product ORDER BY create_date DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once "../../views/partials/header.php" ?>

  <h1>Products CRUD</h1>
  <p>
    <a href="create.php" class="btn btn-success">Create Product</a>
  </p>
  <form >
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $search ?>" aria-label="Recipient's username">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price </th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $i => $product) : ?>
        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          <td>
            <img src="<?php echo $product['image'] ?>" class="thumb-image">
          </td>
          <td><?php echo $product['title'] ?></td>
          <td><?php echo $product['price'] ?></td>
          <td><?php echo $product['create_date'] ?></td>
          <td>
            <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <form style="display: inline-block;" method="post" action="delete.php">
              <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>
</body>

</html>