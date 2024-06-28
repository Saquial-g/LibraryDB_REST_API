<?php 
    $address = "http://127.0.0.1:8000"; 
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library</title>

        <!-- Style -->
        <style>
            a,
            body,
            div,
            form,
            html,
            img,
            input,
            label,
            p,
            span {
                margin: 0;
                padding: 0;
                border: 0;
                font-family: sans-serif, Arial
            }

            body,
            html {
                min-height: 100%;
                overflow-x: hidden
            }

            body {
                background: #545454;
            }

            a {
                color: #486173
            }

            .register {
                margin-bottom: 60px;
                flex-direction: column;
                align-items: center;
            }

            input,
            label {
                vertical-align: middle;
                white-space: normal;
                background: 0 0;
                line-height: 1
            }

            label {
                position: relative;
                display: block
            }

            p::first-letter {
                text-transform: uppercase
            }

            .main {
                width: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .ie-fixMinHeight {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex
            }

            .div-form{
                width: 80%;
                margin: auto;
            }

            .ico {
                height: 16px;
                position: absolute;
                top: 0;
                left: 0;
                margin-top: 13px;
                margin-left: 14px
            }

            .title{
                display: block;
                max-width: 250px;
                width: 70%;
                margin: 0 auto 30px auto
            }

            .logo {
                max-width: 200px;
                display: block;
                margin: 0 auto 30px auto
            }

            .logo * {
                fill: #fff
            }

            .lite .logo * {
                fill: #444
            }

            h1 {
                text-align: center;
                color: #fff;
                font-size: 40px !important;
                padding: 20px
            }

            h2 {
                font-size: 18px;
                padding: none;
                color: #fff;
            }

            h3 {
                font-size: 18px;
                padding: none;
                color: #000;
            }

            .bookEntry {
                width: 100%;
                background-color: #fff;
                padding: 0px 40px 0px 20px;
                margin-bottom: 20px;
                border-radius: 6px;
                display:flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-around;
            }

            * {
                box-sizing: border-box;
                font-size: 14px;
            }

            .wrap {
                margin: auto;
                width: 90%;
                -webkit-transition: width .3s ease-in-out;
                transition: width .3s ease-in-out
            }

            .rowContainer {
                display:flex;
                flex-direction: row;
                width: 100%;
                margin-bottom: 20px;
                justify-content: space-evenly;
                align-items: center;
            }

            .optionContainer {
                display:flex;
                flex-direction: row;
                width: 20%;
                justify-content: space-evenly;
                align-content: center;
            }

            .info {
                color: #fff;
                text-align: center;
                margin-bottom: 30px
            }

            input {
                outline: 0;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                color: #545454;
                font-weight: bold;
            }

            input:focus {
                outline: 0
            }

            input[type=password],
            input[type=text] {
                width: 60%;
                background-color: #fff;
                height: 44px;
                padding: 3px 20px 3px 40px;
                border-radius: 6px;
            }

            input[type=password]:focus,
            input[type=text]:focus {
                -webkit-box-shadow: 0 0 5px 0 rgba(255, 255, 255, 1);
                box-shadow: 0 0 5px 0 rgba(255, 255, 255, 1)
            }

            .bt {
                font-style: italic;
                font-weight: bold;
                color: #fff;
            }

            input[type=submit] {
                background: #ffdf2c;
                border: 0;
                cursor: pointer;
                text-align: center;
                width: 100%;
                padding: 10px;
                margin: 5px;
                border-radius: 6px;
            }

            input[type=submit]:focus,
            input[type=submit]:hover {
                background: #b29b1b
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px
            }

            table td {
                color: #fff;
                border-bottom: 1px solid #e6e6e6;
                padding: 10px 4px 10px 0
            }

            table td:first-child {
                font-weight: 700
            }

            .lite {
                background: #fff
            }

            .lite input[type=password],
            .lite input[type=text] {
                border: 1px solid #c3c3c3
            }

            .lite .info,
            .lite h1,
            .lite table td {
                color: #444
            }

            .lite input[type=password]:focus,
            .lite input[type=text]:focus {
                -webkit-box-shadow: 0 0 5px 0 rgba(62, 77, 89, .2);
                box-shadow: 0 0 5px 0 rgba(62, 77, 89, .2)
            }

            .dark {
                background: #343434
            }

            .dark input[type=submit] {
                background: #dc3a41
            }

            .dark input[type=submit]:focus,
            .dark input[type=submit]:hover {
                background: #b92f35
            }

            .dark input[type=password],
            .dark input[type=text] {
                background-color: #fff
            }

            .dark a {
                color: #dc3a41
            }

            .dark table td {
                border-bottom: 1px solid #505050
            }

            .info.alert {
                color: #da3d41
            }

        </style>
    </head>
    <body>
        <div class="header">
            <h1 class="title">Librería</h1>
        </div>

        <div class="ie-fixMinHeight">
            <div class="main">
                <div class="div-form">
                    <input type="submit" class="" onclick="toggleVisibility('newBook')" style="margin:0px 0px 40px 0px; padding:15px" value="Agregar nuevo libro" />
                    <div class="register "id="newBook" style="display:none">
                        <div class="rowContainer">
                            <div style="width:20%"><h2>Título:</h2></div>
                            <input type="text" id="newTitle" placeholder="">
                        </div>
                        <div class="rowContainer">
                            <div style="width:20%"><h2>Autor:</h2></div>
                            <input type="text" id="newAuthor" placeholder="">
                        </div>
                        <div class="rowContainer" style=margin_bottom: 0px>
                            <div style="width:20%"><h2>Fecha de publicación (YYYY-MM-DD):</h2></div>
                            <input type="text" id="newDate" placeholder="">
                        </div>
                        <div class="rowContainer">
                            <div style="width:20%"><h2>Género:</h2></div>
                            <input type="text" id="newGenre" placeholder="">
                        </div>
                        <input type="submit" class="" onclick="addBook()" style=width:300px value="Añadir" />
                    </div>

                    <?php
                        $response = file_get_contents($address."/api/library");
                        
                        if ($response === false) {
                            echo '<li>Error fetching books data.</li>';
                        } else {
                            $books = json_decode($response);
                            if (!empty($books)) {
                                foreach ($books as $book) {
                                    echo '
                                    <div class="bookEntry">
                                        <div style="width:3%"><h3>'.htmlspecialchars($book->id).'</h3></div>
                                        <div style="width:20%"><h3>'.htmlspecialchars($book->title).'</h3></div>
                                        <div style="width:12%"><h3>'.htmlspecialchars($book->author).'</h3></div>
                                        <div style="width:12%"><h3>'.htmlspecialchars($book->publication_date).'</h3></div>
                                        <div style="width:8%"><h3>'.htmlspecialchars($book->genre).'</h3></div>
                                        <div class="optionContainer">
                                            <input type="submit" class="" onclick="toggleVisibility('.htmlspecialchars($book->id).')" value="Modificar" />
                                            <input type="submit" class="" onclick="deleteBook('.htmlspecialchars($book->id).')" value="Eliminar" />
                                        </div>
                                    </div>
                                    
                                    <div class="register "id="'.htmlspecialchars($book->id).'" style="display:none">
                                        <div class="rowContainer">
                                            <div style="width:20%"><h2>Título:</h2></div>
                                            <input type="text" id="Title'.htmlspecialchars($book->id).'" placeholder="'.htmlspecialchars($book->title).'">
                                        </div>
                                        <div class="rowContainer">
                                            <div style="width:20%"><h2>Autor:</h2></div>
                                            <input type="text" id="Author'.htmlspecialchars($book->id).'" placeholder="'.htmlspecialchars($book->author).'">
                                        </div>
                                        <div class="rowContainer" style=margin_bottom: 0px>
                                            <div style="width:20%"><h2>Fecha de publicación (YYYY-MM-DD):</h2></div>
                                            <input type="text" id="Date'.htmlspecialchars($book->id).'" placeholder="'.htmlspecialchars($book->publication_date).'">
                                        </div>
                                        <div class="rowContainer">
                                            <div style="width:20%"><h2>Género:</h2></div>
                                            <input type="text" id="Genre'.htmlspecialchars($book->id).'" placeholder="'.htmlspecialchars($book->genre).'">
                                        </div>
                                        <input type="submit" class="" onclick="modifyBook('.htmlspecialchars($book->id).')" style=width:300px value="Editar" />
                                    </div>'
                                    ;
                                }
                            } else {
                                echo '<li>No books found.</li>';
                            }
                        }
                        
                    ?>
                    
                </div>
            </div>
        </div>
        
        <script>
        function deleteBook(id) {
            fetch('<?php echo $address ?>' + '/api/csrf')
                .then(response => response.json())
                .then(data => {
                    const csrf_token = data.csrf_token;

                    fetch('<?php echo $address ?>' + '/api/library/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrf_token,
                            'Content-Type': 'application/json'
                        }
                    })
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            setTimeout(function(){
                location.reload();
            }, 1000)
                
        }

        function addBook() {
            fetch('<?php echo $address ?>' + '/api/csrf')
                .then(response => response.json())
                .then(data => {
                    const csrf_token = data.csrf_token;

                    fetch('<?php echo $address ?>' + '/api/library/', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf_token,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            "title": document.getElementById("newTitle").value,
                            "author": document.getElementById("newAuthor").value,
                            "publication_date": document.getElementById("newDate").value,
                            "genre": document.getElementById("newGenre").value
                        })
                    })
                })
                .catch(error => {
                    console.error('Error:', error);
                }); 
            
            setTimeout(function(){
                location.reload();
            }, 1000)
        }

        function modifyBook(id) {
            fetch('<?php echo $address ?>' + '/api/csrf')
                .then(response => response.json())
                .then(data => {
                    const csrf_token = data.csrf_token;

                    fetch('<?php echo $address ?>' + '/api/library/' + id, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf_token,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            "title": document.getElementById("Title" + id).value,
                            "author": document.getElementById("Author" + id).value,
                            "publication_date": document.getElementById("Date" + id).value,
                            "genre": document.getElementById("Genre" + id).value
                        })
                    })
                })
                .catch(error => {
                    console.error('Error:', error);
                }); 

            setTimeout(function(){
                location.reload();
            }, 1000)
        }

        function toggleVisibility(id) {
            var elem = document.getElementById(id);
            if (elem.style.display === "none") {
                elem.style.display = "flex";
            } else {
                elem.style.display = "none";
            }
        }
        </script>
