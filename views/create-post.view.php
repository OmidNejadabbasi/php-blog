<?php
$pageTitle = "Create New Post";
require 'partials/head.phtml';
?>

<body>

    

    <div class="content">
    <form id="new-post-form" action="create-post" method="POST" >

        <div>
            <h2>Title</h2>
            <input name="title" type="text" required>
        </div>

        <div>
            <h2>Abstract : </h2>
            <textarea form="new-post-form" name="abstract" rows="2"></textarea>
        </div>
        
        <div>
            <h2>Content </h2>
            <textarea form="new-post-form" name="content" rows="15"></textarea>
        </div>

        <button type="submit" >Post </button>

    </form>
    </div>
</body>


<?php

require 'partials/footer.phtml';

?>