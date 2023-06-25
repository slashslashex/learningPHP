<form method="post" action="catalog.php">
    <input type="text" name="product_id">
    <select name="category">
        <option value="ovenmitt">Pot Holder</option>
        <option value="fryingpan">Frying Pan</option>
        <option value="torch">Kitchen Torch</option>
    </select>
    <button>Submit</button>
</form>
Here are the submitted values:

product ID: <?php print $_POST['product_id'] ?? ''?>
<br>
category: <?php print $_POST['category'] ?? ''?>
<hr>
<a href="lesson7.php">Back</a>
