<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CAS - Central Authentication Service Connexion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="noindex">
    <style>
        #username:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
            -webkit-text-fill-color: #000 !important;
        }

        #password:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
            -webkit-text-fill-color: #000 !important;
        }
    </style>
    <style type="text/css">
        .mdc-top-app-bar--fixed-adjust {
            padding-top: 0px !important;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
        }

        header .top_header {
            background-color: #333333;
            height: 44px;
            padding: 12px 0;
            color: white;
            font-family: "merlo_regul", sans-serif;
            font-weight: 500;
            font-size: 0.8em;
        }

        header .top_header a {
            color: white;
            text-decoration: none;
        }

        header #nosportails_menu {
            display: none;
        }

        header .top_header .menu_top_header span {
            text-transform: uppercase;
        }

        header .top_header .menu_top_header .nosportails {
            margin: 0;
        }

        header .top_header .menu_top_header ul {
            display: inline-block;
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        header .top_header .menu_top_header ul li {
            display: inline-block;
            margin-left: 25px;
        }

        header .top_header .menu_top_header ul li .actif {
            color: #ff5522
        }

        header .top_header .menu_top_header ul li a:hover {
            color: #ff5522
        }

        header .bottom_header {
            background: white;
            clear: both;
        }

        header .bottom_header a.logo {
            display: inline-block;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        header .bottom_header img {
            max-width: 100%;
        }

        header .bottom_header .baseline {
            float: right;
            margin: 15px 0 0 0;
            font-family: "Ubuntu", sans-serif;
            font-weight: 500;
            font-size: 2.5em;
            vertical-align: middle;
            color: #ff5522;
        }

        header .bottom_header .baseline span {
            font-weight: 300;
            font-size: .5em;
            vertical-align: middle;
        }

        .bouton {
            font-size: 10pt;
            background-color: #F4F4F4;
            color: #ff5522 !important;
            border: 2px solid #ff5522;
            text-transform: uppercase;
            text-decoration: none;
            padding: 5px 10px 5px 10px;
            height: 33px;
            cursor: pointer;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;
            overflow: hidden;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: color, background-color;
            transition-property: color, background-color;
        }

        .bouton:hover,
        .bouton:focus,
        .bouton:active {
            background-color: #ff5522;
            color: #ffffff !important;
        }

        .mdc-top-app-bar--fixed-adjust {
            padding-top: 0px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/webjars/normalize.css/8.0.1/normalize.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/webjars/bootstrap/5.3.3/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/webjars/material-components-web/14.0.0/dist/material-components-web.min.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/webjars/mdi__font/7.3.67/css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/webjars/datatables/1.13.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/css/cas.css" />
    <link rel="shortcut icon" href="https://auth.univ-corse.fr/cas/favicon.ico" />
</head>

<body class="login mdc-typography">
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/datatables/1.13.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/es5-shim/4.5.9/es5-shim.min.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/css-vars-ponyfill/2.4.7/dist/css-vars-ponyfill.min.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/material-components-web/14.0.0/dist/material-components-web.min.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/js/cas.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/js/material.js"></script>
    <script>
        if (typeof resourceLoadedSuccessfully === "function") {
            resourceLoadedSuccessfully();
        }
        $(() => {
            typeof cssVars === "function" && cssVars({
                onlyLegacy: true
            });
        });
        let trackGeoLocation = false;
    </script>

    <div>
        <header role="banner" style="position:relative;">

            <div class="top_header">
                <div class="container">
                    <div class="pull-left">
                        <div class="menu_top_header">
                            <span><a href="https://www.universita.corsica" class="hidden_md">Università di corsica</a><span class="hidden_md">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><label for="nosportails_menu" class="nosportails">Nos Portails &nbsp;&nbsp;:</label></span>
                            <input type="checkbox" id="nosportails_menu">
                            <ul class="animated slideInDown">
                                <li><a href="https://studia.universita.corsica">Étudiants</a></li>
                                <li><a href="https://portail.universita.corsica">Personnels</a></li>
                                <li><a href="https://ricerca.universita.corsica">Recherche</a></li>
                                <li><a href="https://pro.universita.corsica">Partenaires pro</a></li>
                                <li><a href="https://fundazione.universita.corsica">Fondation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom_header">
                <div class="container">
                    <a href="https://portail.universita.corsica/" class="logo"><img src="https://portail.universita.corsica/template/template_back_office/images/logo.png" alt="logo"></a>
                    <div class="baseline">Authentification | <span>Campus numérique</span></div>
                </div>
            </div>
            <div class="clear"></div>


        </header>
        <!--<header id="app-bar" class="mdc-top-app-bar mdc-top-app-bar--fixed mdc-elevation--z4 shadow-sm">
        <nav class="mdc-top-app-bar__row navbar navbar-dark bg-dark">
            <div class="container-fluid container-fluid d-flex align-items-center justify-content-between">
                <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                    <button th:if="${'true' == #strings.defaultString(#themes.code('cas.drawer-menu.enabled'), 'true')}"
                            class="mdc-icon-button mdc-top-app-bar__navigation-icon  btn btn-outline-light"
                            id="drawerButton"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#app-drawer">
                        <span class="mdi mdi-menu fa fa-bars"></span>
                        <span class="visually-hidden">menu</span>
                    </button>
                </section>
                <section class="mdc-top-app-bar__section">
                    <span class="cas-brand mx-auto">
                        <span class="visually-hidden" th:text="${#strings.defaultString(#themes.code('cas.theme.name'), 'CAS')}">CAS</span>
                        <a th:href="@{/}">
                            <img id="cas-logo" class="cas-logo"
                                 th:title="${#strings.defaultString(#themes.code('cas.theme.name'), 'CAS')}"
                                 th:src="@{${#strings.defaultString(#themes.code('cas.logo.file'), '/images/cas-logo.png')}}"
                            />
                        </a>
                    </span>
                </section>
                <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
                    <button id="cas-notifications-menu"
                            th:if="${'true' == #strings.defaultString(#themes.code('cas.notifications-menu.enabled'), 'true')}"
                            class="mdc-icon-button mdc-top-app-bar__action-item cas-notification-toggle btn btn-outline-light"
                            aria-label="Bookmark this page"
                            data-bs-toggle="modal"
                            data-bs-target="#cas-notification-dialog">
                        <span class="mdi mdi-bell-alert fa fa-bell"></span>
                        <span class="visually-hidden">notifications</span>
                        <i id="notifications-count" class="notifications-count count">2</i>
                    </button>

                    <a id="cas-user-account"
                       th:href="@{/account}"
                       th:if="${accountProfileManagementEnabled != null
                        && accountProfileManagementEnabled
                        && ticketGrantingTicketId != null}"
                       class="mdc-icon-button mdc-top-app-bar__action-item"
                       aria-label="User Account">
                        <span class="mdi mdi-account-group"></span>
                        <span class="visually-hidden">user account</span>
                    </a>
                </section>
            </div>
        </nav>
    </header>-->
        <div id="logindrawer">
            <aside id="app-drawer" class="mdc-drawer mdc-drawer--dismissible mdc-drawer--modal offcanvas offcanvas-start">
                <div class="mdc-drawer__header offcanvas-header flex-column">
                    <h2 class="mdc-drawer__title offcanvas-title">CAS</h2>
                    <div class="mdc-drawer__subtitle offcanvas-title">Central Authentication Service</div>
                </div>
                <div class="mdc-drawer__content offcanvas-body">
                    <nav class="mdc-list list-group list-group-flush">
                        <a href="/cas/actuator" class="mdc-list-item list-group-item list-group-item-action">
                            <i class="mdi mdi-cogs fa fa-cogs" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Actuator Endpoints</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://apereo.github.io/cas">
                            <i class="mdi mdi-file-code-outline fas fa-file-code" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Documentation</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://github.com/apereo/cas/pulls">
                            <i class="mdi mdi-call-merge fas fa-code-branch" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Pull Requests</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://apereo.github.io/cas/developer/Contributor-Guidelines.html">
                            <i class="mdi mdi-information fas fa-info-circle" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Guide pour les contributeurs</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://apereo.github.io/cas/Support.html">
                            <i class="mdi mdi-help-circle fas fa-question-circle" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Support</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://apereo.github.io/cas/Mailing-Lists.html">
                            <i class="mdi mdi-email-newsletter fas fa-envelope-open-text" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Listes de diffusion</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://gitter.im/apereo/cas">
                            <i class="mdi mdi-message-text fas fa-comment-dots" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Salon de discussion</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action" href="https://apereo.github.io/">
                            <i class="mdi mdi-post fas fa-newspaper" aria-hidden="true"></i>&nbsp;
                            <span class="mdc-list-item__text">Blog</span>
                        </a>
                    </nav>
                </div>
            </aside>
        </div>

        <script>
            var countMessages = 0;
        </script>
        <div class="mdc-dialog cas-notification-dialog modal" id="cas-notification-dialog" role="alertdialog" aria-modal="true" aria-labelledby="notif-dialog-title" aria-describedby="notif-dialog-content">
            <div class="mdc-dialog__container modal-dialog">
                <div class="mdc-dialog__surface modal-content">
                    <h1 class="mdc-dialog__title mt-lg-2 modal-header modal-title" id="notif-dialog-title">
                        Notifications
                    </h1>
                    <div class="mdc-dialog__content modal-body" id="notif-dialog-content">
                        <div id="cookiesSupportedDiv" class="cas-notification-message mdc-typography--body1" style="display: none">
                            <h6 class="mdc-typography--headline6 mdi mdi-alert-circle fas fa-exclamation-circle">Cookies navigateur désactivés</h6>
                            <p class="text-wrap small">Votre navigateur ne supporte pas les cookies. La capacité du navigateur à stocker ou lire des cookies est essentielle pour que l’authentification unique fonctionne. Veuillez consulter les paramètres de votre navigateur et vous assurer que la prise en charge des cookies est activée.</p>
                        </div>

                    </div>
                    <footer class="mdc-dialog__actions modal-footer">
                        <button type="button" class="mdc-button mdc-button--raised mdc-dialog__button btn btn-primary" data-mdc-dialog-action="accept" data-mdc-dialog-button-default data-bs-dismiss="modal">
                            <span class="mdc-button__label">OK</span>
                        </button>
                    </footer>
                </div>
            </div>
            <div class="mdc-dialog__scrim"></div>
        </div>

        <script type="text/javascript">
            (material => {
                let header = {
                    init: () => {
                        header.attachTopbar();
                        material.autoInit();
                    },
                    attachDrawer: () => {
                        let elm = document.getElementById('app-drawer');
                        if (elm != null) {
                            let drawer = material.drawer.MDCDrawer.attachTo(elm);
                            let closeDrawer = evt => {
                                drawer.open = false;
                            };
                            drawer.foundation.handleScrimClick = closeDrawer;
                            document.onkeydown = evt => {
                                evt = evt || window.event;
                                if (evt.keyCode == 27) {
                                    closeDrawer();
                                }
                            };
                            header.drawer = drawer;
                            return drawer;
                        }
                        return undefined;
                    },
                    attachTopbar: drawer => {

                        drawer = header.attachDrawer();
                        let dialog = header.attachNotificationDialog();

                        if (drawer != undefined) {
                            header.attachDrawerToggle(drawer);
                        }
                        if (dialog != undefined) {
                            header.attachNotificationToggle(dialog);
                        }
                    },
                    attachDrawerToggle: drawer => {
                        let appBar = document.getElementById('app-bar');
                        if (appBar != null) {
                            let topAppBar = material.topAppBar.MDCTopAppBar.attachTo(appBar);
                            topAppBar.setScrollTarget(document.getElementById('main-content'));
                            topAppBar.listen('MDCTopAppBar:nav', () => {
                                drawer.open = !drawer.open;
                            });
                            return topAppBar;
                        }
                        return undefined;
                    },
                    attachNotificationDialog: () => {
                        let element = document.getElementById('cas-notification-dialog');
                        if (element != null) {
                            return material.dialog.MDCDialog.attachTo(element);
                        }
                        return undefined;
                    },
                    attachNotificationToggle: dialog => {
                        let btn = document.getElementById('cas-notifications-menu');
                        if (btn != null) {
                            btn.addEventListener('click', () => {
                                dialog.open();
                            });
                        }
                    }
                }

                function supportsCookies() {
                    try {
                        document.cookie = 'testcookie=1';
                        let ret = document.cookie.indexOf('testcookie=') !== -1;
                        document.cookie = 'testcookie=1; expires=Thu, 01-Jan-1970 00:00:01 GMT';
                        return ret;
                    } catch (e) {
                        console.log(e);
                        return false;
                    }
                }

                document.addEventListener('DOMContentLoaded', () => {
                    if (material) {
                        header.init();
                    }

                    if (!supportsCookies()) {
                        countMessages++;
                        window.jQuery('#cookiesSupportedDiv').show();
                    }

                    if (countMessages === 0) {
                        window.jQuery('#notifications-count').remove();
                        window.jQuery('#cas-notifications-menu').remove();
                    } else {
                        window.jQuery('#notifications-count').text(`(${countMessages})`)
                    }
                });
            })(typeof mdc !== 'undefined' && mdc);
        </script>
    </div>

    <div class="mdc-drawer-scrim"></div>

    <div class="mdc-drawer-app-content mdc-top-app-bar--fixed-adjust d-flex justify-content-center">
        <main id="main-content" class="container-lg py-4">
            <div id="content" class="justify-content-center">

                <div class="justify-content-center  flex-column mdc-card mdc-card-content card flex-grow-1" style="padding: 20px">
                    <div id="etu_pers_vacataires"></div>
                    <div class="d-flex flex-column justify-content-between m-auto">

                        <div>
                            <!--  <div class="service-ui" th:replace="~{fragments/serviceui :: serviceUI}">
                <a href="fragments/serviceui.html">service ui fragment</a>
            </div>-->
                        </div>

                        <div class="form-wrapper">

                            <form method="post" id="fm1" action="login">
                                <div id="login-form-controls">
                                    <!--<h3 th:unless="${existingSingleSignOnSessionAvailable}" class="text-center">
                        <i class="mdi mdi-security fas fa-shield-alt"></i>
                        <span th:utext="#{screen.welcome.instructions}">Enter your Username and Password:</span>
                    </h3>-->
                                    <section class="cas-field form-group my-3" id="usernameSection">
                                        <label for="username" class="mdc-text-field mdc-text-field--outlined control-label w-100 ">
                                            <span class="mdc-notched-outline">
                                                <span class="mdc-notched-outline__leading"></span>
                                                <span class="mdc-notched-outline__notch">
                                                    <!-- <span class="mdc-floating-label"
                                          th:utext="#{screen.welcome.label.netid}">Username</span> --><span class="mdc-floating-label  mdc-floating-label--float-above" style="background-color:#ffffff"><span class="accesskey">I</span>dentifiant :</span>
                                                </span>
                                                <span class="mdc-notched-outline__trailing"></span>
                                            </span>
                                            <input class="mdc-text-field__input form-control" id="username" size="25" type="text" accesskey="i" autocapitalize="none" spellcheck="false" autocomplete="username" required name="username" value="" />
                                            <div class="mdc-text-field-helper-line invalid-feedback">
                                                <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" aria-hidden="true">
                                                    <span id="usernameValidationMessage">Vous devez entrer votre identifiant.</span>
                                                </div>
                                            </div>
                                        </label>



                                        <script type="text/javascript">
                                            /*<![CDATA[*/
                                            let username = "";
                                            let disabled = false;

                                            if (username != null && username !== '') {
                                                $('#username').val(username);
                                                if (disabled) {
                                                    $('#usernameSection').hide();
                                                }
                                            }
                                            /*]]>*/
                                        </script>
                                    </section>
                                    <section class="cas-field form-group my-3 mdc-input-group form-group" id="passwordSection">
                                        <div class="mdc-input-group-field mdc-input-group-field-append">
                                            <div class="d-flex caps-check">
                                                <label for="password" class="mdc-text-field caps-check mdc-text-field--outlined control-label mdc-text-field--with-trailing-icon control-label w-100">
                                                    <span class="mdc-notched-outline">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                            <!-- <span class="mdc-floating-label" th:utext="#{screen.welcome.label.password}">Password</span> --><span class="mdc-floating-label   mdc-floating-label--float-above" style="background-color:#ffffff"><span class="accesskey">M</span>ot de passe :</span>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                    </span>
                                                    <input class="mdc-text-field__input form-control pwd" type="password" id="password" size="25" required accesskey="m" autocomplete="off" name="password" value="" />
                                                    <div class="mdc-text-field-helper-line invalid-feedback">
                                                        <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" aria-hidden="true">
                                                            <span id="passwordValidationMessage">Vous devez entrer votre mot de passe.</span>
                                                        </div>
                                                    </div>
                                                </label>
                                                <button class="reveal-password  mdc-input-group-append  bouton" tabindex="-1" type="button">
                                                    <i class="mdi mdi-eye reveal-password-icon fas fa-eye"></i>
                                                    <!-- <span class="visually-hidden">Toggle Password</span>--></button>
                                            </div>

                                            <div class="mdc-text-field-helper-line caps-warn">
                                                <div class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg text-danger">
                                                    <span>La touche Verr. Maj. est activée !</span>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="cas-field form-group my-3">
                                    </section>

                                    <section class="cas-field">

                                        <input type="hidden" name="execution" value="09feab33-8cf0-44d3-86cc-e082162b3d09_ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0lzSW10cFpDSTZJamxoTldGa05qRm1MVGs1TVdNdE5EQXlZUzFoTjJJNUxXSXpNalJpTkRjME5qZGhPQ0o5LjZKRjNJSEFsTUhPZ3Jpd1VzcWFvU0tCbVc0MmZQTWhLMXUyMmJvcVVyVENFZUttRldmVVk4dlV5MjV6dzV5LVpkVVU5TGNSTXFUVk5qX01zYTQ1MzJMSXlIcmdLMjBIZkNTcDdnS0dFU09Za2JsTUFkOXdBX1Y4ZUV3a3NwTFRUNDJxclJ2Q1k1ZzFyVk81d3hjR2N1MmtXdlZVV2ptZ05PaTNhNUVad2c4akg1SVluRXFfVVJwYzBvM1VYdHRBUGtnVWVEcXFSYktWdEU5WUNaejRQbmc0SzhEMEMtSXRLcnF3djRtWDl6Yl9MMHlJQjQ1WU1Vb0pxVDJCelBCZUhVUk9hQUJGMF9VYUNoMG9WdjVSLWZWbW85RFFlak1XcTVZTkJYMDJ2OUh3cUs3SUltTDhCcWJOZXhtWmlCU2FJd01XbkZUQXZsbGotUjBoZXNkeXY4b2VNbUxDWnlVdnQxdHhtQzB2NjVXenhhN3J6ODIyTFlUSnc5aEowX0Y0S3Y4dEFyOHh3Qi1sVExzdHlvSk90MHRBTXNWZDhrNkg3MDJBd2pjSGxjMlR5R1YxTnFMMHpXWnVJb0VlMHlBREp0MWVkRW5NYm9GempWZmxBdU9aNnJ6T3Rod2RteDg5REV0SmFWMUx3eE5Db3FweGFsRXQ0X0Ftak9FMlc1WGpGYjlsY0RQUTUyQUJPaFktNVQtSmJPdllrdlNDdDlPUDd5VnZPY3Y0dkpzYUNLZ0w5bW1sVTBrcDYyWjczeVJLcERWWG1aaGV6d0g3bWFOZTNwSExNYmxFeFYySENLWVBCanNqZ3FqMXpBWjVzM0NDOFpTblR4ODR0bGpCRUhUZ3NlQXpBWFNVY21Lejc1MnBIek1rcXZfRG1lZHRsSlpieGtYUmV6ZXlCTktnUXoxRTNZLUlzamVFOWNHN1o3ckpqR2Vrang4NFJ1STNtY2QzZ1hPc3VPNUhBZXFpal9NUkpaRWZVS0lxU0RSNmtUNzdFUklQV21PVDFqWVZLQm5PV3FOX3pYYUpOaEJQTlpnOUNWX3Z1TGFHYUtWRjNkWEdRQnlSUVAxU1h2S2NFVDhUNHRBZTJVUmlMTHUzNVI5RmF0ZGdha19ZbjhvX203bTNJNmN2Zk9rZnNXWk8waDdOa0RmTXVGNGtmNnJWZ0htM1RDZzFkT1padDhnN196Uy1qVUZPNDY4ZkhZa1hQOEZZSm1qd18td1ZTSmdPTDVSdzBueE4wX2dSSWJZNVkwWm51a2tTQVl3NWtRM1pONnhkSV9hR0F3bGFkQURNQUQ1ZEJyNWxuV0FQZGJadnNPMlh2Tl9hRFc2c3pzOXBTZkR6cFJFQTFPQmJWcXl5TG5nSmh4d2w1UEZhcGtWZzh0dEh1Q05zdEVRUzZjWk42VEoxdjdsVzdoT1JpV1EzYkNUU0RQQXdyQXJUWEtsOFBhemRJXzBfXzloZDQyR2h0T3MzS1ZLakkycGdSd1QwLTZKM2k5Wm9RZ0lGeGcwbU5zZzVoWF9pdnhWWXg4RlVmM3dxY1FMRjM2N2NTRVMwQUs5X2tVZVo4QjVMVVN3Mm1jbFlqRm12S2NWMFFOYlh4b3o0MkszTkVTTl8yYk9kNExfdkdmRDVZSlJXSjdRWlpHTzRJUlh5aU5fTXpjY3hPa080V3Y5N1RMVHBZUi1NYkNyWHZvczNQa080VmtBYVBoYjlhMVA5ZVdwUHNpY2QwOGo4b0oyOUM4ZWxpcjhNSlJPaTAzVDA5NG8wTHNBV2xGSEVUTUVyYzhuNk81a3M1NWhnZm1lQ1ZsOWpMM3QySk9XaWFRZXVKcmVmX3NzYUd2d1RyTWF5MWNOS29xS3EwbkQ4ZkdmbnBTU2V4Z25sb3hKMVBMVEdYVEhXTWcxSjY4WnN4X3l0ZG1ZdnluSmdIRjZ5bXNteENMS1NwOWRUSXBBQkdxS0JqV09JNEtpZWZhT0xnUEpUMndnZWhZbHh4eVpscjhJd0RvVEZROHV5LUJlcmdGSHFqbzdOa3psbkV0Qkk5VmZhQWs0WjYxYjJocHJGeFY1Y2xlUEEzMXNqMW5RcXQ2NGptQzJQV2o1ek5aWTRadUM2VDl6cFpWMk1ST3ptM18xaEdoVnlvaWlQMy0xQUlISHBuUllIYjhMZk9UcVY1eGprYUliSVZOZWJqNXBXcWd4UUFub2R3ME1iSGszSFVYNWpSSUJoeWhzN2pzMnRlUk8tTlpSVS1lLTcxaExUTHB6dGJZNW10Qk5UV1NfRF8zck9fdUt1RUU1TXJWRVlMMUpERUZ3SXFVa254Z1hMNGhIQ0J3TmJZczV0NkZCUTFGYU15WUVUT3BkcEV2Q3ZzN2FNSlZzYmZwNTlORENFWDQ2MHZfZzE3QUtKTXQtYjltdXVHbWlVT1k3LXh5aE5hc244Q1liSlhQMnppejUyLU9JWkd6emJnTC03MHF4QVdWS3V6ejFoOXFGNVFhaVZoTWdDaV9SLWVUdTI2Tkl5SERXa1pNeWVHU1V0cmthRTVtVTFDUzZJRS1zc1E2eXJxeGVjMWtiUkxsSkdXQU5qQ3lxMWtwRUluY3FqVTZjWFpxdzlZVnhoWDdsSWNwVUs5UjdhdnF0Vm52V1NDeXJVU0pfWnZ6OGpxSmVCbWtxZ0k0OE5YNXJwc3gxVW5FbHAweGcxTUhVaFNqcFlTZXVYcmVGOGVnX0lfdm1nYUM1dHhuZlQ1dDZtejh4NE1yS284d0ZLNllHTk5FWloxUXRLd3dtanhyZnBQYjUwM3BrdXNBVUF3aTNoQ09kekpiUUFLTEZKUXZFOVNpeXYyWjN5cWRuSWZ6QW9oc2ZXUm9JVkszSFJyeWgtODAzb1p1N0RHX0VxNG5teVZFbV9uVEpqRFUzSFByaDY2RmhGWVBzbFhaRUFjRzhSVkhTRUpuVmNncDduVzdZYmpha3Y5MkNwTFM5aEM2bkpqd0tqbWRRUFFiR0NFdGJQMkNsUjRXU2lpald5Uy14d3ZQQVdfTmJGeGVWNmNwSG1oeWgyRmpadi00clExekJzekdkdDRyOE5pYkZmc2U0R2tXS29FV0hFQ0dSSm1uTGxVemxKUXBhVXkyUGhMOFhMd2syNkZFS3VfUHVFR0RuUVZibE1zVFBxVk5fcXF6ZXp4Rm1XSUo3UnRWYTFBRVNPRmNlMWhMRkEtT0tMZjdoZ08ySENfNEozYWY1NGJMUmtHUlFoaV9EOE9qaTBLak9aQTB6bHVjcUNvZktNMzFLdjJSSVR5ZFRxOXRUaWlzMlhpaUc3SU1reG8tT1l3cUJ5b1JuM0hqRVhDQ0NqN3RUR19wb2FiUktNQjR4U0hPUUxmM0RValhWdnl6ME5UTWU4Z0xjbWFLMVZhYkVSeWdDY2ZSZTB1RVB4LU1CR0tBaTQ2OWJqOGFGU2VWTWpkRjNoRVRKajB0YU5GV3VHVDl2RjVmTXlzNWZtSHp3T21mT3lTdnJIRFc4aXNlVjhsRmN4dkdWVDd3STJmc3hSd1BVODgwbzA0ZGdTX0dhWHBNSXRTUnd2ODRDQUpHdkEzM1pENDJ0M1dTQ2s4UmhHMmVRUUlpdjBSS0pzX25ULTZBVzVTYkZkSkpFNFJEd1p0cWw2ekNJVjZiRk90U1NUTEo4LUFWazlLeElLdV8yYV9xQTdfQ3NBTE5TZzRJVElpWDI1eHdoWkpBUTRvZzhWMkZ4eDBrU3ZNc0FMbEMzVnlLRzJjVDIydkJqSUpWMmVGMkNwdFhjUU5NTUhDNGFqMmNzWDhwRWpqVmo2RGUzaE1QamJyRUktbWhjUjA4SkxuU1NQd1hrWElhMVlTMlZSNHdNeWM5ekx1X3VDUFZ4V3E0c2hTM2xfT0ZnU1I3X0NOTVo5ZmZROXdFdEljYTF4Tmp2M19ScEhfVkMtb1Q0ejg3SGVnX2QyejNnTUN5LXJDLVBVZjB1U1RfQ1RiU2xZbXNlbUpBSWpNNjVfZExRazgwd1BsTEIxVUpIa0tiX0NRZWFhMC1JWHlWVHhFaGNfbGNQd2h6eXVqdW50SXNOQ2ZEbU9iRzFzYUhxcHo5LUVBUDVjZEV4Z0Vxajl0NVRzemhuWUhhTVlpWDFpTjRxcDBROFJDazY4amFMSlVqZ1V4c0RHTThjc3R1LW5JbHBkMm9iWGpfVkhzZWtqdmM1amVXcVRHOVRsVUFFQmZOaFBrX3BsVDBQbTNoMUp3ejZJdVY5eWRQWUl1NExtWE9OZG5GVjdPQ0pyd3g5UkxiZ1VWU21oLWx4Umo2dEtjVEFkMWM4OUpmMnJzQXBoeVlGODh3WkFBUjl0b3FoYURjUXhrbURyZWRueFpWcFR3OFowYVZkTVpDRllJUXZMUmNYZDlBRjRmM3IwTklXT3NPTl9MNjZzMFg1cXpJYlB1TEZneEFiTFV2a2YtbVpXZGNHclh1d2h2R3NLdzBCRFczMUR3R3lPWTBRT0ZmdzMxMThjbURjd0FsZmQtUFJidEpoR1ZXb2tQQ0FTTzhxcnJtYzNLWGwxTmpNSDlYa2xGLXZnMTBTdHB6VXJ6bDhMdVhkRjRCVVBZQURGdzRqQ1ZVNXp1Q0puU0k2b2szck1jOF9wUU81VWVrN0o0V2p5QTBHQjRRNHo3NE5vd1ZvYmJYZlE0YUNOMmpoT2NsbXFmRVNlMlpMN0JDbHFCRElQOGNVVGZnR3dDcXMyOTNXTEpKMzBRTE9TbzNocjVhZVAxaFFxREFQbDdHSnZEdW9sVjlfTFByTlB6Q2tiaXZIN0xHZ1RYRzU3U1FEN1l1X2ZSa3dPZnNsMWk4R1Q5ZDVoRmFmN3FabXktNWE5Sjllcjh0U3R5RURHX2s0UnRFS2V1WnItb3l6Q0JuY2JoeHRLQzhvYWF0OFRnQU9DQ0t5ckl6bjMwNENRUHc2UEZMckdCbG5meE5KV2haOGQ3UDlsamdRaEhvUE9vNTA4aTJKUXk0VGk5dDhHVmM0cEVrY2czSkxpTmJvejJyb1VOR216cUJHWnZOX3RNMloxNnZOeUZMUEFmOWV5dDhuTE1OVHFyVTFwWWJzV3dPM1BfQTFfcXFSOERCb0JCOThPWTI0cGhEQjFtN0YtNEhfRzIwS0I3QXdUalFpTmo2RGtnRXJPWFc2cHE0c1pkb1VXSTRhRGVRT1B1VzhsZV8wVi1LcnkxVFVlMzZ6OG5XVm90LVQ4enNibTZoUzc2eGpHN09admVyaEtRN1VlV2RxQy1seWI5T09PTnNwTXJqNERlNnlPZk5mRWduM0Zyd3lKRWJxYUxiRUYzZ1gzRGpSMEZfRWo4SHBfdHlpX1dPZzdrd0dST2xFZEJKdmRiczVZVVhHWnVfWFJCVXpnbEJsVDZMSExnT0hjaHNjaEF2anRwTzVQdFVrTHMxdHdQR2RJLVpQMVhOV0NpUlI5QmI4Y1BJV25oUkN3WXpCT0NJVlZWc3NlU3c3N2JPWVJzY3hIZGtQa0EtNkhKb3poaUw4aDUtWWREZEg5NURLZ3l6eHE2UlJMQzF2QW5uYkNuSVl2MFd2QVk2SkpFOW5uM3NPLWhMUVRsQ3JiVkZoOEI3eEJWSUhiM3B1NjZOb0YzalVPeTJIeVZSSGlvWE5saDB4T29kQ2NKU29zaU9Bakluc3hjNmRpaGVjMzROeHZ4UGRYTDE0cVpYbGNTUzduUEpXU1ZJWHF2RkFxdjdmQjZwYm50RDlBOGFpaVFxMEp4amZkb3F2aU9Ib0pCV1doMXNqdFFrTEd2QW1OUTVrMU54b0pBUDlxZGVvdENMajJoVGItNEhJYVhNMEphRjhiaDc3TGRiVDRsRV9vcmZ3UWJCUE9nOGxqakpVTHJhM1d1QndYa0p1ajUyang2b3RYdnNOd0EyU3d5OEJZNmExTXFlSU1qOWZiQU5ITUdhbF9sYlVoQ1VhVFo1bzVGUUlWN1A5UVJxTFU0dFowOV9Cdkl1akxQMDlCUUlqRzNtTEZlUVRNR0h6RVhqSmdrZUllSHE4RDRKbzBiak1Pbm1Kd09BTjdBd1p6NEVJUktwbXJyLTk5SDhRdlBBSUZIbFRVRlRpODR5cXFuZXhFTHpKSzFiTGVlNEhMMzJheXFvcDhsdmdESHhTR1MtTW1rYU83d0VrV2FZekVMZ3owWExXaXdUSUhzdEQyVVMtdnpMWFBBbHVFTnFUVkNpeklMNldJNjJRd3owUzljaVdHUU4zTmtLS0I2bWpxRXU1bWJYaF9BVUpIbDBhX056ZHNxOTlMeUJXSXFHRFlXYWlZS1VSX2U5d0Iyczh6YXRtcHJTT0pBRWUtUjVWc05zSnZfVXpuSGxrekFXbDFiZjRvbkhXVEtrVHFLTDlQcEI4Vi1qcXpKXy1ua0RwVnl0OVVVb2dqQklXSllmU2UzRXBIN0pWY0ZpaEhSczF4TFpJWnVia2NBQmhfRmdEMXdkR0NUMlNvcExVUGxqbHB1R0dLSU1XbXdRWVdjbTFyZVVGZS1UVmdzeWVZWWFJLVRCQlZsUC1ZTy1hYWw0VnVHQ051Ujk2el9XYzlySElNb3VNdTgyUTMtLVhydUdlR2Z3eU02Q1VhcEZySGl6UmZlRmZoLU5CUnJQbGhGcEZYYkh3X2VHeXBkZUVHTnVHNHNZeEJFOU5PbXhuQjhOR1lmbV8tejRjOVdHMU5SeHFRMmI0NS1KWnF4T000RkI4UjllTUNGcW9vdTQxenJTbmRucy1LOXdUc2p1T0N1T2FaQlZ0MXZaTnJ0Y0g5czZ3YWNzOE9RVzVmR21DUS5abVkybGYtQVEzU0VyakFFWHc4MjI1SlZqTDNFZGxBRVMwdVMwQ1hETF9KRUVBM0FWTkZJZGxhLXVyZ3VSRlg4MUFNbDRJQjF6QXpOV25HVHJ6bEUydw==" /><input type="hidden" name="_eventId" value="submit" /><input type="hidden" name="geolocation" />
                                    </section>

                                    <button class="bouton" name="submitBtn" accesskey="l" type="submit">
                                        <span class="mdc-button__label">Se connecter</span>
                                    </button>

                                </div>
                            </form>

                            <!--<hr th:if="${loginFormViewable and loginFormEnabled}" class="my-4"/>--><span>
                                <div id="pmlinks" class="my-2">
                                    <div>
                                        <br /><span class="mdi mdi-account-question"></span>
                                        <span><a href="https://applisweb.universita.corsica/portail/tous_mes_outils/pwd-front.php">Mot de passe oublié ?</a></span>
                                    </div>
                                </div>
                            </span>

                            <script type="text/javascript">
                                /*<![CDATA[*/
                                var i = "Veuillez patienter\u2026"
                                var j = "Se connecter"
                                /*]]>*/
                                $(window).on('pageshow', function() {
                                    $(':submit').prop('disabled', false);
                                    $(':submit').attr('value', j);
                                });
                                $(document).ready(function() {
                                    $("#fm1").submit(function() {
                                        $(":submit").attr("disabled", true);
                                        $(":submit").attr("value", i);
                                        return true;
                                    });
                                });
                            </script>
                        </div>

                        <span>
                            <div id="sidebar">
                                <div class="sidebar-content">
                                    <p>Pour des raisons de sécurité, veuillez vous <a href="logout">déconnecter</a> et fermer votre navigateur lorsque vous avez fini d’accéder aux services authentifiés.</p>
                                </div>
                            </div>
                        </span>
                    </div>

                    <span>
                    </span>
                </div>

                <br>
                <div class="justify-content-center  flex-column mdc-card mdc-card-content card flex-grow-1" style="padding: 20px">


                    <div id="autres"></div>

                    <!-- <br><a href="https://portailweb.universita.corsica/plugins/auth/auth_externe/auth_externe.php?id_site=&lang=fr&service=auth_externe" name="autres" id="autres" style="color:#ff5522;text-decoration: none;">> Dans tous les autres cas, cliquez ici</a>
-->
                    <script type="text/javascript">
                        // FONCTIONS
                        var str;
                        var lang;
                        var lang_autres;
                        var id_site;
                        var id_cours;
                        var id_locale;
                        var url_appli;
                        var lang_etu_pers_vacataires;

                        function getURLParams() {
                            var url = document.location.href.split("?");

                            if (url.length > 1) {
                                // Params found un URL !
                                var get = new Object;
                                var params = url[1].split("&");

                                for (var i in params) {
                                    var tmp = params[i].split("=");
                                    get[tmp[0]] = unescape(tmp[1].replace("+", " "));
                                }

                                // Return Object (data are accessible in array too) : get["paramname"] = get.paramname
                                return get;
                            }

                            // No params found in URL !
                            return false;
                        }

                        function isset(data) {
                            if (typeof(data) == "undefined")
                                return false;

                            return true;
                        }

                        // CODE DE TEST

                        $_GET = getURLParams();

                        //if(isset($_GET.locale))
                        //	document.write($_GET.locale + "<br />");
                        // alert($_GET.locale);
                        if (!isset($_GET.url_appli)) {
                            url_appli = "https://portail.universita.corsica";
                        } else {
                            url_appli = $_GET.url_appli;
                        }
                        if (!isset($_GET.locale)) {
                            id_locale = "fr";
                        } else {
                            id_locale = $_GET.locale;
                        }
                        if (!isset($_GET.id_site)) {
                            id_site = 0;
                        } else {
                            id_site = $_GET.id_site;
                        }
                        if (!isset($_GET.id_cours)) {
                            id_cours = 0;
                        } else {
                            id_cours = $_GET.id_cours;
                        }

                        if (isset($_GET.id_cours)) {
                            str = "https://portailweb.universita.corsica/plugins/auth/auth_externe/auth_externe.php?id_cours=" + id_cours + "&lang=" + id_locale + "&service=auth_externe&url_appli=" + url_appli;

                            // document.getElementById('autres').innerHTML = '<a href="'+str+'">> Dans tous les autres cas, cliquez ici</a>'; 
                        } else {
                            str = "https://portailweb.universita.corsica/plugins/auth/auth_externe/auth_externe.php?id_site=" + id_site + "&lang=" + id_locale + "&service=auth_externe&url_appli=" + url_appli;


                        }

                        //  alert(str);
                        //			document.write($_GET.url_appli + "<br />");

                        if (id_locale == 'fr') {
                            lang = '> Dans tous les autres cas';
                            lang_autres = 'cliquez ici';
                            lang_etu_pers_vacataires = '> Vous êtes étudiant, personnel, vacataire ou ALUMNI de l\'Università di Corsica';

                        } else {
                            lang = '> In others cases ';
                            lang_autres = 'click here';
                            lang_etu_pers_vacataires = '> You are a student, staff, temporary worker or ALUMNI of the Università di Corsica';
                        }

                        document.getElementById('etu_pers_vacataires').innerHTML = '<span style="color: #ff5522;"> ' + lang_etu_pers_vacataires + '</span>';
                        document.getElementById('autres').innerHTML = '<span style="color: #ff5522;">' + lang + '</span>&nbsp;&nbsp;&nbsp;<a href="' + str + '" class="bouton"><span class="mdc-button__label">' + lang_autres + '</a></div>';
                    </script>
                    <br>
                </div>

            </div>
        </main>
    </div>

    <footer></footer>

</body>

</html>