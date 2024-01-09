<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Wiki Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
  <link href="/Wiki/public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="/Wiki/public/css/add.css">
</head>

<style>
    body {
        font-family: 'Poppins';
        background-color: #8fbafa;
        
    }

    .card {
        width: 100%;
        border: none;
        background-color: transparent;
        border: none;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card img {
        width: 80%;
        height: auto;
        object-fit: cover;
        border-radius: 15px;
        object-fit: cover;
        margin: auto;
    }

    .card label {
        margin-top: 30px;
        text-align: center;
        height: 40px;
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card input {
        display: none;
    }

    button {
        padding: 20px 50px;
        border-radius: 10px;
        background-color: black;
        color: white;
        font-weight: bold;
        margin: 5% 3%;
        cursor: pointer;

    }
  
    /* Style the select dropdown */
form select {
    width: 100%;
    padding: 20px;
    border: 1px solid rgb(201, 201, 201);
    border-radius: 10px;
    appearance: none; /* Remove default arrow in Firefox */
    -webkit-appearance: none; /* Remove default arrow in Chrome and Safari */
    background: transparent;
    cursor: pointer;
}

/* Style the options */
/* form select option {
    background-color: #1D1D1D;
    color: white;
    padding: 10px;
}

/* Style the selected option */
/* form select option:checked {
    background-color: #333;
    color: #fff;
} */

    /* form input{
        width: 100%;
        padding: 20px;
        border: 1px solid rgb(201, 201, 201);
        border-radius: 10px;
    } */
    .container{
        border-radius: 20px;
        
    }
    .tag-container {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .tag {
        background-color: #1D1D1D;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-right: 10px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .tag-close {
        margin-left: 5px;
        cursor: pointer;
    }
</style>

<body>

    <div class="main">
        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" action="addwiki" enctype="multipart/form-data">
                <div>
                    <fieldset>
                        <h2>Wiki Content</h2>
                        <p class="desc">Please enter your content and proceed to the next step so we can post your
                            wiki</p>
                        <div class="fieldset-content">
                            <div class="form-row">
                                <label class="form-label">Title</label>
                                    <div class="form-group">
                                        <input type="text" name="title" id="first_name" />
                                    </div>
                            </div>
                            
                                <div class="form-group">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category">
                                        <option value="option1" default>Choose your category</option>
                                        <?php foreach($category as $ctg): ?>
                                        <option value="<?= $ctg['id'] ?>"><?= $ctg['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            
                            <div class="form-group">
                                <label for="tag" class="form-label">Add Your Tags</label>
                                <div class="tag-container" id="tag-container"></div>
                                <select name="tags[]" multiple>
                                    <option value="option1" default>Choose your Tags</option>
                                        <?php foreach($tags as $tg): ?>
                                    <option value="<?= $tg['id'] ?>"><?= $tg['name'] ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="card">
                                    <img src="" id="image">
                                    <label for="input-file">Choose Image</label>
                                    <input type="file" accept="image/jpg, image/png, image/jpeg" name="image"
                                        style="background-color: transparent;" id="input-file">
                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <button type="submit" name="addwiki">Post Wiki</button>
            </form>
        </div>
    </div>


    <!-- JS -->
   
    <script src="js/main.js"></script>

    <script src="https://cdn.tiny.cloud/1/f9ggt3dqixvgwwjjoxp3xio6hgf0r72qnuvll71z6g0sckld/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->



    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    <script>
        let image = document.getElementById("image");
        let input = document.getElementById("input-file");

        input.onchange = () => {
            image.src = URL.createObjectURL(input.files[0]);
        }
    </script>
     <!-- <script>

        document.addEventListener('DOMContentLoaded', function () {
            const tagInput = document.getElementById('tag');
            const tagContainer = document.getElementById('tag-container');

            tagInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();

                    const tagValue = tagInput.innerHTML.trim();
                    if (tagValue !== '') {
                        const tagElement = document.createElement('div');
                        tagElement.classList.add('tag');
                        tagElement.innerHTML = `
                            ${tagValue}
                            <span class="tag-close" onclick="removeTag(this)"><i class="ri-close-circle-line"></i></span>
                        `;
                        tagContainer.appendChild(tagElement);
                        tagInput.value = '';
                    }
                }
            });
        });

        function removeTag(tagCloseElement) {
            const tagElement = tagCloseElement.parentNode;
            const tagContainer = tagElement.parentNode;
            tagContainer.removeChild(tagElement);
        }
    </script> -->

</body>

</html>