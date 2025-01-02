<?php
 $footer = new database();
 $footer->select('headerfooter','*','','', '', '');
 $getFooterResult = $footer->getResult();
 $copyright = $getFooterResult['0']['copyright'];
?>
<footer>
<div class="row"> 
    <div class="col-sm-12 nopadding">
        <div class="my-footer">
            <div class="description">
                <pre><?php echo $copyright; ?></pre>
            </div>
            <div class="social-manus">
                <div class="list-inline">
                    <a href="" class="list-inline-item">Facebook</a>
                    <a href="" class="list-inline-item">Twitter</a>
                    <a href="" class="list-inline-item">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- if you want use modal boz -->
<script>
    const toggleBtn = document.getElementsByClassName('togglebtn')[0]
    const navbarLinks = document.getElementsByClassName('navbar-links')[0]

    toggleBtn.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})
</script>
</body>
</html>