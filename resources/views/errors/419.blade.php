<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "author" lang="fr" content= "Brindou Gnépa Junior">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sourale-Group</title>
</head>
<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    body {
        padding: 0;
        margin: 0;
    }
    #notfound {
        position: relative;
        height: 100vh;
    }
    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .notfound {
        /* max-width: 90vw; */
        width: 90vw;
        text-align: center;
        line-height: 1.4;
    }
    .notfound .notfound-404 {
        height: 158px;
        line-height: 153px;
    }
    .notfound .notfound-404 h1 {
        font-family: 'Josefin Sans', sans-serif;
        color: #222;
        font-size: 150px;
        letter-spacing: 10px;
        margin: 0px;
        font-weight: 700;
        text-shadow: 2px 2px 0px #c9c9c9, -2px -2px 0px #c9c9c9;
    }
    .notfound .notfound-404 h1>span {
        text-shadow: 2px 2px 0px #ffab00, -2px -2px 0px #ffab00, 0px 0px 8px #ff8700;
    }
    .notfound p {
        font-family: 'Josefin Sans', sans-serif;
        color: #c9c9c9;
        font-size: 16px;
        font-weight: 400;
        margin-top: 0px;
        margin-bottom: 15px;
    }
    .notfound a {
        font-family: 'Josefin Sans', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: transparent;
        color: #c9c9c9;
        border: 2px solid #c9c9c9;
        display: inline-block;
        padding: 10px 25px;
        font-weight: 700;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .notfound a:hover {
        color: #ffab00;
        border-color: #ffab00;
    }

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 {
            height: 122px;
            line-height: 122px;
        }

        .notfound .notfound-404 h1 {
            font-size: 122px;
        }
    }

</style>

<body style="background-image: url({{asset('dist/img/background.jpg')}}); background-size: 100Vh;">

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>R<span>ETOU</span>R</h1>
            </div>
            <p>Veuillez vous reconnecter en cliquant sur le bouton ci-dessous
            </p>
            <a href="{{route('login')}}">Page de Connexion</a>
        </div>
    </div>

</body>
</html>
