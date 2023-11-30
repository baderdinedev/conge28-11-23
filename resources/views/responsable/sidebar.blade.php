<style>
    #sidebar {
    position: fixed;
    height: 100%;
    width: 250px;
    top: 0;
    left: -250px;
    transition: all 0.3s;
}

#sidebar.active {
    left: 0;
}

#sidebar ul {
    padding: 20px;
    list-style-type: none;
}

#sidebar ul li {
    padding: 10px;
}

#sidebarToggle {
    position: fixed;
    left: 10px;
    top: 10px;
    cursor: pointer;
}

</style>

<div id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <ul>
                <li><a href="">Gestion des Roles</a></li>
                <li><a href="#">Gestion des Employe</a></li>
            </ul>
        </div>

<div id="sidebarToggle">☰</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const sidebarToggle = document.getElementById("sidebarToggle");

    sidebarToggle.addEventListener("click", function () {
        sidebar.classList.toggle("active");
    });
});

</script>