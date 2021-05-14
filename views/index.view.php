<?php

$pageTitle = "Home Page";

require 'partials/head.phtml';

?>

<body>

<header class="site-header">
        <div class="home-page-link">
            <img class="omid-image" src="public/ico/placeholder.png">
            <a>Omid's Blog</a>
        </div>
        <nav class="header-middle-area">
            <ul class="header-list-container">
                <li>
                    <a>
                        <img class="header-icon" src="public/ico/home.png">
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="create-post">
                        <img class="header-icon" src="public/ico/create-post.png">
                        <span>Create New Post</span>
                    </a>
                </li>

                <li>
                    <a href="about.html">
                        <img class="header-icon" src="public/ico/about.svg">
                        <span>About</span>
                    </a>
                </li>

            </ul>
        </nav>
    </header>


    <h1>Hello world!</h1>
    <hr>
    <h2>Home page: </h2>
</body>

<?php

require 'partials/footer.phtml';

?>