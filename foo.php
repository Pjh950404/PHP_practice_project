<?php
if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
}
?>
<form action="" method="post">
    이름: <input type="text" name="personal[name]" /><br />
    메일: <input type="text" name="personal[email]" /><br />
    맥주: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="hidden" name="action" value="submitted" />
    <input type="submit" value="전송합니다!" />
</form>
