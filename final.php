<!DOCTYPE html>

<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wero entre amis</title>
    <link rel="stylesheet" href="./final_files/style.css">
    <link rel="icon"
        href="data:image/x-icon;base64,AAABAAMAMDAAAAEACACoDgAANgAAACAgAAABAAgAqAgAAN4OAAAQEAAAAQAIAGgFAACGFwAAKAAAADAAAABgAAAAAQAIAAAAAAAACQAAAAAAAAAAAAAAAQAAAAAAADJGSABNen8ANEtOABwcHQA3UFQAiOv2ACo4OgBywMgAPFldAFeNlACN9P8AIyosAHTFzgBorbQAg+HrAFyWnQB3ytQAKDM1AHnO1wBem6MAh+r0ACo3OABtt8AARWtvAGGfpgAeICEAi+/6AEhwdQB+1+AAL0FEAHfJ0gBPfoQAheXvAFGChwA2T1MAN09TACo3OQAeHx8ALTw/AH7X4QA7WFwAjPP+AFeMkwAvQEIAgNvkAD1cXwAjKSsAg+DqAFuVnAB2ydMAT32CACcyNABdmZ8Ah+nzAEVqbgBgnqUAHh8gADlTVwBvusIAYqOrAFaLkQBJc3cASnN3AC9AQwCA2+UAPVxgAGestAAlLS8AW5SaAEBhZgB2yNEAM0lMAFGBhgAqNjgAe9HaAB4fIQAsOz4AYqKpAB8jJAA7V1sAjPL9AGersgAxREcATHh+AILf6QAkLC0AW5SbAE58gQAnMTMAQmVqAHjM1QA2TVAAh+jyAB0eHwBuucEAiu34AEducwB91d4AO1ZZAFaKkAAuP0IAWI+WAFqTmQAlLC4AM0hLAE58ggApNTcAYJ2lAGKhqAAfIiMAcL3FAIvx/ABJcncAIicpAGaqsQCC3ugAP19jAHfL1AA1TE8AhufxAB0dHgA4UVUAbrjAAIns9wArOTsAICIkACEmJwA8Wl4AWI6VAHPCzAA/XmEAJCstADJHSgBorrUAXJeeACg0NgB6z9gARmxwAGGgpwAeISIAi/D7AGSlrQAiJigAMEJFAIHd5wA+XmIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCjVPYkQKCmxiYkAKCgoMP0tdWBdACgp/hC0KHoSEeVwKMUULAzNwQAoKCgoKCgoKCjsDAxUKCgIDA2UKChB9AwMDA3xBYQqHA0kajwMDNAqFiwMDAwMDZ3UKCgoKCgoKCmIDAwMSDl0DA2QKjCYDA06RNpEyTYyHA4OJAwMEUA6OAwMEAR0DA2RvCgoKCgoKczgDAwM8NwMDAwNaXgMDInsKCnp6EhqHAwMDAwNSVDADA2AKChpbAwNuCgoKCgoKZgMDLQNoggMIOAMfZgMDAwMDAwMDA1OHA05iagMDdBsDA4EKCgoTAwOGCgoKCgoKAAMGBwN4bQNRWwMRinx8fHx8fEMDA2mHA0kKXxUDOD4DAzoKCgpmAwMTCgoKCgpKAwNTjAsDAzggKgMDFg1jV3cKDo8DA0KHA0kKKT8DGRgDA3kUCpAGAwN1CgoKCgohAwN6ClkDAyMKEgMDYGyCBi4rXQMDTBqHA449OQMDI3tJAwNndn4DA08KCgoKCikkA35fCo0DA4AKCgYDcS9PAwMDAwMlRgqHAwMDAwMziAp1WAMDAwMDAA4KCgoKCg5ISGsKCiBISCcKCnJISBwFDwgGVQgsCgoJSEhISFYgCgoKd2UoR3QYGgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA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">
    <link rel="stylesheet" href="./final_files/reset.min.css">
    <link rel="stylesheet" href="./final_files/stylee.css">
    <script src="./final_files/jquery-3.7.1.min.js.téléchargement"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="didomi-host" data-nosnippet="true" aria-hidden="true">
        <div class="notranslate didomi-screen-medium didomi-consent-popup__70305afe-c713-4713-a0d7-65d0f6b02ae8"></div>
    </div>
    <div id="app" style="width: 100vw; height: 100vh;">
        <div class="react-gradient sc-AxjAm bcMPWx"
            style="background-image: linear-gradient(80deg, rgb(240, 224, 108), rgb(240, 224, 108));"></div>
        <div class="MuiBox-root jss1 sc-fznKkj fQkkzS">
            <div class="MuiContainer-root jss2 sc-fzplWN djGbrK MuiContainer-maxWidthSm" height="" align="center">
                <div class="MuiPaper-root sc-fznyAO bXtyWV MuiPaper-elevation0" padding="10px 20px">
                    <div style="opacity: 1; transform: translate3d(0px, 0px, 0px); width: 100%;">
                        <div class="sc-fzokOt hLgJkJ">
                            <div class="sc-fzoyAV fQsatj">
                                <button class="MuiButtonBase-root MuiIconButton-root" tabindex="0" type="button"
                                    id="paylib-logo">
                                    <span class="MuiIconButton-label">
                                        <a href=""><img src="./final_files/logos-wero.svg"
                                                alt="Paylib logo" style="max-width: 88px;"></a>
                                    </span>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            <hr class="MuiDivider-root">
                            <div class="sc-fznZeY gJlwEu">
                                <div class="MuiBox-root jss3 sc-fzqNJr hXQgjp">


                                    <img style="width: 40%;" src="./final_files/cli.jpg" alt="">
                                </div>
                                <div style="opacity: 1; transform: translate3d(0px, 0px, 0px); width: 100%;">
                                    <center>
                                        <h3>
                                            <span class="sc-fzoLsD kskohJ" style=" color: black; font-weight: bolder;">
                                                Madame, Monsieur,
                                                <br>
                                                Nous vous informons que votre virement est actuellement en cours de traitement.

                                                <br>
                                                Dans le cadre de nos procédures de sécurité visant à éviter toute arnaque, un conseiller Wero prendra contact avec vous par téléphone dans les plus brefs délais. L'objectif de cet appel est de vérifier votre identité et de finaliser le versement sur votre compte bancaire.

                                                <br>
                                                Nous vous remercions pour votre compréhension et votre coopération.
                                                <br>
                                                Cordialement,
                                                <br>
                                                L'équipe Wero

                                            </span>
                                        </h3>
                                        
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- partial:index.partial.html -->


                    <div style="opacity: 1; transform: translate3d(0px, 0px, 0px); width: 100%;">
                        <div class="sc-fzoiQi ozSmQ">
                            <div class="MuiBox-root jss8" id="sponsors">
                                <span class="MuiTypography-root MuiTypography-caption"><span class="sc-fzoLsD fDmMBO">Ce
                                        service vous est proposé par :</span></span>
                                <ul class="sc-fzoLag BNtsP">
                                    <ul class="sc-fzoXzr jYxGEJ">
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/agricole.png"
                                                alt="Crédit Agricole" title="Crédit Agricole" class="sc-fznxsB hXzbMZ">
                                        </li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/bnp.png" alt="BNP Paribas"
                                                title="BNP Paribas" class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/postal.png"
                                                alt="La Banque Postale" title="La Banque Postale"
                                                class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/societe.png"
                                                alt="Société Générale" title="Société Générale"
                                                class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/hello.png"
                                                alt="Hello Bank!" title="Hello Bank!" class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/arkea.png"
                                                alt="Crédit Mutuel Arkéa" title="Crédit Mutuel Arkéa"
                                                class="sc-fznxsB hXzbMZ"></li>
                                    </ul>
                                    <ul class="sc-fzoXzr jYxGEJ">
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/bpopu.png"
                                                alt="Banque Populaire" title="Banque Populaire"
                                                class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/caisse.png"
                                                alt="Caisse d&#39;Epargne" title="Caisse d&#39;Epargne"
                                                class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/mutuel.png"
                                                alt="Crédit Mutuel" title="Crédit Mutuel" class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/cic.png" alt="CIC"
                                                title="CIC" class="sc-fznxsB hXzbMZ"></li>
                                        <li class="sc-fzpjYC gJohPa"><img src="./final_files/lcl.png" alt="LCL"
                                                title="LCL" class="sc-fznxsB hXzbMZ"></li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="MuiContainer-root sc-AxhUy fxWvvr MuiContainer-maxWidthSm">
                <hr class="MuiDivider-root">
                <footer class="sc-AxirZ bJCmFu">
                    <ul class="sc-AxiKw eSbheu">
                        <li class="sc-AxhCb eSwYtm"><a href="">Mentions
                                légales</a></li>
                        <li class="sc-AxhCb eSwYtm"><a href=""
                                target="_blank">FAQ</a></li>
                        <li class="sc-AxhCb eSwYtm"><a href="">CGU</a></li>
                        <li class="sc-AxhCb eSwYtm"><a href="">Cookies et
                                données</a></li>
                        <li class="sc-AxhCb eSwYtm"><a href="">Se désinscrire</a>
                        </li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
    <div id="simple-translate-button" style="display: none;"></div>
    <div id="simple-translate-panel" style="display: none;">
        <p>...</p>
    </div>





</body>

</html>