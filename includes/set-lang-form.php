<!-- handler is in config.php -->
<form id="set-lang-form" name="input-set-lang" method="post">
    <select name="select-set-lang">
        <option value="en">English</option>
        <option value="ko">한국어</option>
    </select>
    <button type="submit" name="input-set-lang">
        <?php // TODO: change this to a 'CHANGE' SYMBOL SO IT'S UNIVERSALLY UNDERSTOOD ?>
        <?php echo $lang['save']; ?>
    </button>
</form>
