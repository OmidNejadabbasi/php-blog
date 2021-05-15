<?php
$pageTitle = "Create New Post";
require 'partials/head.phtml';
?>

<body>

    <?php require 'partials/header.phtml'; ?>


    <div class="content">
    <form id="new-post-form" action="save-post" method="POST" enctype="multipart/form-data">

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
            <textarea form="new-post-form" name="content" rows="15" id="content-editor"></textarea>
        </div>

        <div>
            <h2>Poster Image: </h2>
            <input name="poster-image" type="file" accept="image/*" required>
        </div>

        <button type="submit" >Post </button>

    </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content-editor' ), {



            })
            .catch( error => {
                console.error( error );
            });
    </script>

    <style>

        .ck.ck-editor__editable[role='textbox']{

            min-height: 500px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 5px 1px burlywood;
        }

    </style>

</body>


<?php

require 'partials/footer.phtml';

?>