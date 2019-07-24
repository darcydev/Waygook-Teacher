<?php
// get list of all timezones
$timezones = DateTimeZone::listIdentifiers();
?>


<script>
document.addEventListener("DOMContentLoaded", function(event) {
  displayEdit(<?php echo $isStudent; ?>);
});
</script>