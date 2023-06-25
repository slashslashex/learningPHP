<form method="post" action="eat.php">
    <select name="lunch[]" multiple>
        <option value="pork">BBQ Pork Bun</option>
        <option value="chicken">Chicken Bun</option>
        <option value="lotus">Lotus Seed Bun</option>
        <option value="bean">Bean Paste Bun</option>
        <option value="nest">Bird-Nest Bun</option>
    </select>
    <button>Submit</button>
</form>
Selected buns:
<br>
<?php
if (isset($_POST['lunch']))
{
    foreach ($_POST['lunch'] as $choice)
    {
        print "You choose a $choice bun<br>";
    }
}
print '<pre>';
print_r($_POST);