<!-- Navbar Search-->
<nav class="navbar" style="margin-right:0px;padding-right:0px;">
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 my-2 my-md-0" method="POST" action="">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                aria-describedby="basic-addon2" name="r_search_text"
                value="<?php if ( isset( $_POST['r_search_text'] ) ) {echo $_POST['r_search_text'];}?>" />
            <div class="input-group-append">
                <button class="btn  btn-warning" type="submit" name="r_search_btn" style="box-shadow:none;"><i
                        class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</nav>

<!-- <script>
document.getElementById("my_search_form").addEventListener("click", function(event) {
    event.preventDefault()
});
</script>

<div class="col-lg-12">
    <div class="sidebar-item search">
        <form id="my_search_form" name="gs" method="POST" action="">
            <input type="text" name="search_bar" class="searchText" placeholder="Type to search..." autocomplete="on"
                style="text-transform:none;" required>
            <br>
            <div style="width:100%;text-align:right;">
                <br>
                <button class=" btn-warning" type="submit" name="search_btn" id="search_btn">Search</button>


            </div>

        </form>

    </div>

</div> -->