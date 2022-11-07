<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-image: url('bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            /* background-size: 100% 100%; */
            font-family: 'Dancing Script', cursive;
        }

        header {
            width: 100%;
            height: 10%;
            background-color: black;
            color: white;
            box-shadow: 0px 5px 10px grey;
        }

        header>h1 {
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            padding-top: 1%;
            padding-bottom: 1%;
            font-size: 25px;
        }

        form {
            padding-top: 3%;
            padding-left: 5%;
            padding-right: 5%;
            padding-bottom: 2%;
            height: 100%;
            color: white;

        }

        input {
            box-shadow: 5px 5px 5px grey;
        }

        .control {
            text-align: center;
            padding-top: 2%;
        }

        button {
            border-radius: 8px;
            padding: 5px;
            border: none;
            box-shadow: 5px 5px 5px grey;
        }
    </style>
</head>

<body>
    <header>
        <h1><i class="fas fa-solid fa-camera-retro"></i> image tool</h1>
    </header>
    <form method="get" enctype="multipart/form-data">
        <label for="formFileDisabled" class="form-label">Path folder</label>
        <input type="text" name="file" id="formFileDisabled" class="form-control" placeholder="Input path ..." style="font-style: italic;">
        <div class="control">
            <button type="submit" name="resize" value="resize" formaction="./resize-image/resizeimg.php">re:size</button>
            <button type="submit" name="thumpnail" value="thumpnail" formaction="./make-thumbnail/makethumb.php">make thumpnail</button>
            <button type="submit" name="copy" value="copy" formaction="./copy-img-to-empty-folder/createimg.php">copy photo</button>
        </div>
    </form>
</body>

</html>