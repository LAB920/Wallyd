<!-- Close app wrapper -->
</div>

<!-- Show when logged in-->
<?php if (isset($_SESSION['username'])) : ?>
    <!-- Fixed button -->
    <div class="fixedbutton">
        <a href="">Hulp nodig?</a>
    </div>
<?php endif ?>

<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="js/myaccount.js"></script>
<script src="js/hamburger.js"></script>
</body>

</html>