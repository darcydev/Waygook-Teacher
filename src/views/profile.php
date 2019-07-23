<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

include("src/views/head.php");
include("src/views/header.php");
?>

<main>

  <div class="container profile-container">
    <!-- STICKY SIDEBAR -->
    <section class="section">
      <?php include("src/views/sidebar.php"); ?>
    </section>
    <!-- \.STICKY SIDEBAR -->

    <!-- PROFILE CONTAINER -->
    <section class="section profile">
      <div class="img-l">
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/768px-Circle-icons-profile.svg.png"
          alt="profile-photo">
      </div>
      <h4>TOM JONES</h4>
      <div class="introduction">
        <p>FLAG</p>
        <p>Years' Experience</p>
        <p>Reviews Stars</p>
      </div>
      <div class="description">
        The road out of Perm runs along a frozen river dotted with crouching figures. They huddle round small holes
        drilled through the ice. All around are thick forests of silver birch and fir trees, covered in snow.

        Lyubov laughs off mention of the cold as I approach her gingerly, looking for cracks beneath my feet. It’s
        -17C
        and the pensioner has been fishing with her husband on the frozen river for hours without gloves.

        “It’s fine!” she insists, dipping a finger through the ice hole and swirling it round. “It’s warmer in the
        water.”

        Russians are famed for their hardiness. But ask about politics and there’s one fear that keeps recurring -
        no-one wants to return to the chaos and criminality of the 1990s. Those who lived through the Soviet collapse
        still shudder at the memory of the empty shops, the queues and the hardship.

        In some places there was conflict - in many places there was organised crime. And everywhere there was
        bewilderment as an entire ideological system fell apart.
      </div>
    </section>
    <!-- \.PROFILE CONTAINER -->
  </div>

</main>

<?php
include("src/views/footer.php");
?>