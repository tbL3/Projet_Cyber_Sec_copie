<!DOCTYPE html>
<html>

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
            color: #ffffff;
        }

        .mdc-top-app-bar--fixed-adjust {
            padding-top: 0px;
        }
    </style>

    <link rel="stylesheet" type="text/css"
        href="https://auth.univ-corse.fr/cas/webjars/normalize.css/8.0.1/normalize.css" />
    <link rel="stylesheet" type="text/css"
        href="https://auth.univ-corse.fr/cas/webjars/bootstrap/5.2.3/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://auth.univ-corse.fr/cas/webjars/material-components-web/14.0.0/dist/material-components-web.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://auth.univ-corse.fr/cas/webjars/mdi__font/7.2.96/css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://auth.univ-corse.fr/cas/webjars/datatables/1.13.2/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://auth.univ-corse.fr/cas/css/cas.css" />
    <link rel="shortcut icon" href="https://auth.univ-corse.fr/cas/favicon.ico" />
</head>

<body class="login mdc-typography">
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://auth.univ-corse.fr/cas/webjars/datatables/1.13.2/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/webjars/es5-shim/4.5.9/es5-shim.min.js"></script>
    <script type="text/javascript"
        src="https://auth.univ-corse.fr/cas/webjars/css-vars-ponyfill/2.4.7/dist/css-vars-ponyfill.min.js"></script>
    <script type="text/javascript"
        src="https://auth.univ-corse.fr/cas/webjars/material-components-web/14.0.0/dist/material-components-web.min.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/js/cas.js"></script>
    <script type="text/javascript" src="https://auth.univ-corse.fr/cas/js/material.js"></script>
    <script>
        if (typeof resourceLoadedSuccessfully === "function") {
            resourceLoadedSuccessfully();
        }
        $(() => {
            typeof cssVars === "function" && cssVars({ onlyLegacy: true });
        });
        let trackGeoLocation = false;
    </script>

<?php
// Assuming you have a database connection established
// You should replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$conn = new mysqli('localhost', 'admin', 'password', 'tp_cyber');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a record exists in the tricked_counter table
$check_sql = "SELECT COUNT(*) AS num_records FROM visits_counter";
$result = $conn->query($check_sql);
$row = $result->fetch_assoc();
$num_records = $row['num_records'];

// If no record exists, insert a new one with an initial count of 0
if ($num_records == 0) {
    $insert_sql = "INSERT INTO visits_counter (visits) VALUES (0)";
    $conn->query($insert_sql);
}

// Increment the counter for every visit to the form page
$increment_sql = "UPDATE visits_counter SET visits = visits + 1";
$conn->query($increment_sql);

?>


    <div>
        <header role="banner" style="position:relative;">

            <div class="top_header">
                <div class="container">
                    <div class="pull-left">
                        <div class="menu_top_header">
                            <span><a href="https://www.universita.corsica" class="hidden_md">Università di
                                    corsica</a><span
                                    class="hidden_md">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><label
                                    for="nosportails_menu" class="nosportails">Nos Portails &nbsp;&nbsp;:</label></span>
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
                    <a href="https://portail.universita.corsica/" class="logo"><img
                            src="https://portail.universita.corsica/template/template_back_office/images/logo.png"
                            alt="logo"></a>
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
            <aside id="app-drawer"
                class="mdc-drawer mdc-drawer--dismissible mdc-drawer--modal offcanvas offcanvas-start">
                <div class="mdc-drawer__header offcanvas-header flex-column">
                    <h3 class="mdc-drawer__title offcanvas-title">CAS</h3>
                    <h6 class="mdc-drawer__subtitle offcanvas-title">Central Authentication Service</h6>
                </div>
                <div class="mdc-drawer__content offcanvas-body">
                    <nav class="mdc-list list-group list-group-flush">
                        <a id="halbrowser"
                            href="https://auth.univ-corse.fr/cas/webjars/hal-explorer/index.html#hkey0=Content-Type&amp;hval0=application/json&amp;uri=https://auth.univ-corse.fr/cas/cas/actuator"
                            class="mdc-list-item list-group-item list-group-item-action">
                            <i class="mdi mdi-cogs fa fa-cogs"></i>&nbsp;
                            <span class="mdc-list-item__text">HAL Explorer</span>
                        </a>

                        <a href="https://auth.univ-corse.fr/cas/actuator"
                            class="mdc-list-item list-group-item list-group-item-action">
                            <i class="mdi mdi-cogs fa fa-cogs"></i>&nbsp;
                            <span class="mdc-list-item__text">Actuator Endpoints</span>
                        </a>
                        <hr class="mdc-list-divider bs-hide" /><a
                            class="mdc-list-item list-group-item list-group-item-action"
                            href="https://apereo.github.io/cas">
                            <i class="mdi mdi-file-code-outline fas fa-file-code"></i>&nbsp;
                            <span class="mdc-list-item__text">Documentation</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://github.com/apereo/cas/pulls">
                            <i class="mdi mdi-call-merge fas fa-code-branch"></i>&nbsp;
                            <span class="mdc-list-item__text">Pull Requests</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://apereo.github.io/cas/developer/Contributor-Guidelines.html">
                            <i class="mdi mdi-information fas fa-info-circle"></i>&nbsp;
                            <span class="mdc-list-item__text">Guide pour les contributeurs</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://apereo.github.io/cas/Support.html">
                            <i class="mdi mdi-help-circle fas fa-question-circle"></i>&nbsp;
                            <span class="mdc-list-item__text">Support</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://apereo.github.io/cas/Mailing-Lists.html">
                            <i class="mdi mdi-email-newsletter fas fa-envelope-open-text"></i>&nbsp;
                            <span class="mdc-list-item__text">Listes de diffusion</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://gitter.im/apereo/cas">
                            <i class="mdi mdi-message-text fas fa-comment-dots"></i>&nbsp;
                            <span class="mdc-list-item__text">Salon de discussion</span>
                        </a>
                        <a class="mdc-list-item list-group-item list-group-item-action"
                            href="https://apereo.github.io/">
                            <i class="mdi mdi-post fas fa-newspaper"></i>&nbsp;
                            <span class="mdc-list-item__text">Blog</span>
                        </a>
                    </nav>
                </div>
            </aside>
        </div>

        <script>var countMessages = 0;</script>
        <div class="mdc-dialog cas-notification-dialog modal" id="cas-notification-dialog" role="alertdialog"
            aria-modal="true" aria-labelledby="notif-dialog-title" aria-describedby="notif-dialog-content">
            <div class="mdc-dialog__container modal-dialog">
                <div class="mdc-dialog__surface modal-content">
                    <h1 class="mdc-dialog__title mt-lg-2 modal-header modal-title" id="notif-dialog-title">
                        Notifications
                    </h1>
                    <div class="mdc-dialog__content modal-body" id="notif-dialog-content">
                        <div id="cookiesSupportedDiv" class="cas-notification-message mdc-typography--body1"
                            style="display: none">
                            <h6 class="mdc-typography--headline6 mdi mdi-alert-circle fas fa-exclamation-circle">Cookies
                                navigateur désactivés</h6>
                            <p class="text-wrap small">Votre navigateur ne supporte pas les cookies. L'authentification
                                centralisée NE FONCTIONNERA PAS.</p>
                        </div>

                    </div>
                    <footer class="mdc-dialog__actions modal-footer">
                        <button type="button" class="mdc-button mdc-button--raised mdc-dialog__button btn btn-primary"
                            data-mdc-dialog-action="accept" data-mdc-dialog-button-default data-bs-dismiss="modal">
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
        <main role="main" id="main-content" class="container-lg py-4">
            <div id="content" class="justify-content-center">

                <div class="justify-content-center  flex-column mdc-card mdc-card-content card flex-grow-1"
                    style="padding: 20px">
                    <div id="etu_pers_vacataires"></div>
                    <div class="d-flex flex-column justify-content-between m-auto">

                        <div>
                            <!--  <div class="service-ui" th:replace="~{fragments/serviceui :: serviceUI}">
                <a href="fragments/serviceui.html">service ui fragment</a>
            </div>-->
                        </div>

                        <div class="form-wrapper">

                            <form method="post" id="fm1" action="visit.php">
                                <div id="login-form-controls">
                                    <!--<h3 th:unless="${existingSingleSignOnSessionAvailable}" class="text-center">
                        <i class="mdi mdi-security fas fa-shield-alt"></i>
                        <span th:utext="#{screen.welcome.instructions}">Enter your Username and Password:</span>
                    </h3>-->
                                    <section class="cas-field form-group my-3" id="usernameSection">
                                        <label for="username"
                                            class="mdc-text-field mdc-text-field--outlined control-label w-100 ">
                                            <span class="mdc-notched-outline">
                                                <span class="mdc-notched-outline__leading"></span>
                                                <span class="mdc-notched-outline__notch">
                                                    <!-- <span class="mdc-floating-label"
                                          th:utext="#{screen.welcome.label.netid}">Username</span> --><span
                                                        class="mdc-floating-label  mdc-floating-label--float-above"
                                                        style="background-color:#ffffff"><span
                                                            class="accesskey">I</span>dentifiant :</span>
                                                </span>
                                                <span class="mdc-notched-outline__trailing"></span>
                                            </span>
                                            <input class="mdc-text-field__input form-control" id="username" size="25"
                                                type="text" accesskey="i" autocapitalize="none" spellcheck="false"
                                                autocomplete="username" required name="username" value="" />
                                            <div class="mdc-text-field-helper-line invalid-feedback">
                                                <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                    aria-hidden="true">
                                                    <span id="usernameValidationMessage">Vous devez entrer votre
                                                        identifiant.</span>
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
                                    <section class="cas-field form-group my-3 mdc-input-group form-group"
                                        id="passwordSection">
                                        <div class="mdc-input-group-field mdc-input-group-field-append">
                                            <div class="d-flex caps-check">
                                                <label for="password"
                                                    class="mdc-text-field caps-check mdc-text-field--outlined control-label mdc-text-field--with-trailing-icon control-label w-100">
                                                    <span class="mdc-notched-outline">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                            <!-- <span class="mdc-floating-label" th:utext="#{screen.welcome.label.password}">Password</span> --><span
                                                                class="mdc-floating-label   mdc-floating-label--float-above"
                                                                style="background-color:#ffffff"><span
                                                                    class="accesskey">M</span>ot de passe :</span>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                    </span>
                                                    <input class="mdc-text-field__input form-control pwd"
                                                        type="password" id="password" size="25" required accesskey="m"
                                                        autocomplete="off" name="password" value="" />
                                                    <div class="mdc-text-field-helper-line invalid-feedback">
                                                        <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                            aria-hidden="true">
                                                            <span id="passwordValidationMessage">Vous devez entrer votre
                                                                mot de passe.</span>
                                                        </div>
                                                    </div>
                                                </label>
                                                <button class="reveal-password  mdc-input-group-append  bouton"
                                                    tabindex="-1" type="button">
                                                    <img src="./assets/eye-solid.svg" style="width: 25px;"></img>
                                                    <!-- <span class="visually-hidden">Toggle Password</span>--></button>
                                            </div>

                                            <div class="mdc-text-field-helper-line caps-warn">
                                                <div
                                                    class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg text-danger">
                                                    <span>La touche Verr Maj est activée !</span>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="cas-field form-group my-3">
                                    </section>

                                    <section class="cas-field">

                                        <input type="hidden" name="execution"
                                            value="abfc9c33-791b-482a-8672-6e666717ac50_ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0lzSW10cFpDSTZJak5sTnpBME56SXhMVE01TlRndE5EZzFOQzA1WmpNeExXRXpOekJtTUdNelpEWmhPU0o5LlFRTnlfeFBRQnpESHYwejJOcE0zdE9UY0FFM09qcGtoRUxtd0FrRUt6cGVJdlpFc3d3dGZRamp4a0xSMGxPc1J3dmx1LU1lSWJvV2REbTc5Z3M5ekVGSXZLY0ZKMWkwVGpIWTJ4Zk5TWGxiT3B5MXhDTllWbWtTZnFiXzVlTnM5N1RTWmdQQW1RaGFid1dPM0kzWmxZa0MyN2hXZ3M0T2hIVXdmeHd1Q0xwcktTNV92YnFqUTd3akNaVG1lQ3Z1Rk1Pc3BMQmtNS1k0UTdKbC1yZFIySXJuMHB4emdrWXRqbE1yUWNIaFU4dWphWGRQRnMtU2FZdk5EREpPUmtiNVE1cU5mcW5PQktQSTZwZkhYNmI5NDQ3YUhCV1lhWTFlOVZtVFpKU2EzZG1weVdyenZUZFNNSVNjdHBHc3dSelNYbU1sODRHZHlfVlpMMzJkcEE3QnRRdFZ2dVNIZEFUalJXVzVyVmRUYU1qOXNVTHVrWENDNzFaUUd4S3hQLXVGWlRPSmY3MUZ2QlVJT1l3LVVncmpQb21xVjNPdFI0OXNOTVBQZVRNaFJweVBzeWZ4RXNFd0FWbEprckhlN3paZWtZSmlNd0VQYnVtYWxDUV9VMkdONFhBNDJwMWxCRUswcTVwVjcxY090RXBRZ0VnaTgzT0RUcU9ScS1WVWVuOFlObUpSUDRfN0hBR0Jja2NOM2NEZzE0NV8xeDFOTFVXaG9XTFhCaWlGUVZlQ0FUZEpiT2FzVjk5UUw5U2c3Wjh4ZjZ2X2hPOTFxYUZsRGlBZloxcGdJWDZUcWlNNnBUa05nUzhrVWVUa3UxMmxtZWswVHdUMmk3dF9DVTV3LTlvSnJFTFh4VndCVzZOUWFQc1hHdjAzREFBVTlQVVlKcTlOV1RZdXJkQ3paNUtsUnJ3NlpNS0FPWGVFOHh5RVcyTlZyczVpNUZ0S2ZKSEoyS1BsNkpPc0NZOF9pUjMtM3l5N3QwbkpyWlpBZmU4ZzVmV0JsV1gtXzJHYk9KNHR4cWh4aWhfMHJwb2tiUktQQ19rUFp3cWY0WFNfY2NPMlEybWhIQmdCNGNVa1NrSGd0YWoxZThPbklIUHVOZnV4SzZ5a0trblI1RnZadEN6UGpyUzZBUng1QXB4OXFuU1dzVDJfdGZyZ25kbjh5bzRtVmVOS05rc2J4WV91TnYwY21EY0d6M2JoUXFzZi1aY2NQWjJvZ0JlNG9VampRUF9IY2ZfZWY3VExEOVNuV2tOdWhiU3hZcmJyY3A5XzJibGlhRGRQU0FMclpBbWJJVkZ4S3FwZGJwaFlyV1EyZEdEX29nMWQ5MVJQTWFuYWJ0WTFGa2duclZabmQ2aUxlcTBLd0ZoWmJLcVg3ZkJ3UVRoVW1sQ1AxeFBlQWx5SncyM0VZLVRQWElySEt6UGZJMDVaQUNadzZ1b0JLcEpIdUlWUzlZdElZRzd3a2d0cVduXzRGVnpZVUNfbVo2LWcyMXBzXzlWU1dKUTdEblBFd1dOOFJvcU00dkFNQ3JhSHJwSk5BRjhhVHNiOVRPMURjLVJMNUgwRktlZk1WN1VUY3hmUWN1VEdUWUR4UFhvZGg3cjlMUEs5dlFXRXFaZ2pabWlQZnZUUVNNWk11dEd3NkNrUHpBNGQzNmdOWGhZTmdJZVFTcXRDempIMGVRUGQ3MEpvb010emRZbkpHYUZpUmFzSUhRX3Z3aS1TRm5hVVlaU0d1d1hqWkdWRmZjOV96TGEyZk1ZVVBqTUdxNmVyVXBiejBqMzNWVWtjcVl5VjgwMGd2UUF0aDMwWHVhTFZJbUNRajZKb2tMSEZVS0pWODJnSmNIXzBqalI2b3gweTVHZzhuMERtS0dUREJaZktzX1ZVWGt4dWRKZVBEYjlJS181RXZic3pvXzctUnVYTVNaaXlXREZQUW1qamRzcWRQR1N6MXd4NkQySllRUV9FOGtYR0FXSk5HZzF3SE5GZXFoSUh6UE1QbnZXVThlT2N6UnYxY1lkV0ppbEw5eUhNVUFMeldfcTQ0dE9qQkdKTENLRzhoOWRTQzkxSC1vTC1KS3FZOGJTVDJvaEJDQW1JSGp3X2lIa1pPVEg1TUdSTHV0NlM0SXh2clRkZVpTN2Jka0tJY2oxdlRDUnpBNGFsanpENlVSaXE5NGM3UXRNa3FqMExYanp6QnlaUFM4YTZoeEM1LVFpSXhwZm9JOWZFR29YRGJ2cTNGTW5FOVIzaGZKN2pzWlJwUmJKRDB5cWxNcWF4LWNxNGRveVgtTmh1OXlBdWVXZVNwdFIzWjJ3aTJUS3JORmxSTy1wUG05dzh3X3U3WmNRUGRYemtEMU11TlhpRWxIUExtZk9kN0FwY2p3WUpBZDdjcl80UXdhVzhONGNYbngxYmxVeHhobnNIU2xUVUxtWGNuSXlZdWJCWkJBUF9oZ1NqdWsxb1NKM2lUcnZDQkNyVXRZdnFMNGh5OXRjRXpVQ19SRjY4Wnhpc0d6Q0NJaGU0LW5uNk44THA0WHRKTWhQa0I4NDhHb2Y1Y1ZFN19wVUFoNlowZVBUOGgzRDJDYm5LcFJjcHpiejJWM05xc3FYZmVLRlVXM1EzcDM2NEx3WUFmaEJBdVpKV3NWb2YyUU14aTFoREllV0NNSXRWYkxaMWUwUWRhbUd5bGI4TmNvT0lORzlqZkFsOVZnTXhyX1FuamFTaDA1Yi04WnFaYmZZWHRUZWpUSWlnREZkdFlOZlZtWVpxX2NoUGk4NXV6cDZ6Y0pveERRZ0ZqQ25FVkdxWGlCUWFTQmJsVWxua1dXbzVzTS1DU3hoN2xwMDB4NzhINEZZNEtKQ0lDUjUydHpPZ1JaaERFTXlvSkpNZ0x0NFZsb2hzdUV0clE0MnY3UmU0RnlaWHRZTDBwVV9kc1YydmhNbFJCSTk5bXgyWFZFa2hGeXgtNXpEbFU2QmpsZk5BQ2JRZWVod3hhb05udXRFZUJYMGR3OUIxbHhaVTlzTnVoM0h2bkhLdmFXeUo4ZFlVQUp2QlhucXZyR1R1dm1pLWJ4a3dpb25OZ19NakxaYktjTmpUcE9pTG05ZmxZYnh5TmVNV1lSMzVMa0doSFZFZ3hhcHowWGozdDdoM2U1aERFSWFYRXVuZmJHRndaNm9fU1pIU3dCNUp4MjA3N0w1eEEzeW8tbTRSdDBPcDB1Z1Z2b3A5bkt3cjFVcUFJNWxuc3lvR1lMMUotZXRwT011OVNHNERucGJTVWtDOXRLbTZqM1BlbnJQN3VHckRscnFNYW9jMlJLQzE2SkFZcUZsbUcxcTgyc3VySEhscEduWC13WmhkUlhqT0hDUFUtcUhkRjFRS0tjUC16ZjNsR2FnbmVPY3IwVnUyNXk4dlNLWWdRQVpROEg5dlhRbWdyTzFCWk4zNjdlMUp0ZmRhTHNqWDJFZ185RHVlakI1cFFxenFLOUZkWjlBemllRWloa2V0WU5HeURiOXFlQzc2and0OFBET0JKdTdXSVhjLUVBMVc0Ym41Z2VyeGxvWUE4WENVbWUyeXJQbTJhc1dzdjBoOENwZHZmVHcyRjV6SjcwM3lZRHk1RXNLRDJ6QWxBVTIzdnhiQ0NEeEJEV0R0MVlienA4blZ3TWdyVHJMd0RzVkhCZk9LeGdWSzRQQTROWnIyWGFiY1lZNXpKMGVxcnVmeExJLXNTZC1qM3BkVmhHN1JMem52Yi1SOVNUOUg1czBuTmgtV2EtTnZYMHowSFVjeUQ0S3VvUjQ3MkVqSnNRNUFVVHZuV3dRRnpfNzVNTWZXQThqcmJQOTlaOW4xeXBjLTJtWUxtOC12b3NSX2lLelhtVHFiOHhXRzF0UlhKWlJrR0RkcnNpVk9GVVdnbVFCbnE1SjE2OFVPSmVTNHJyUTZCRHdHWnVwTkxpRnRrUmZSMFlReUdaMHhRWnowTkJZc1Z2ODhJbFdDaXg2ekFvTGZGd0ViNnIwcHBKOFZvc0NJWHJMT2dvenVucnRINHhIQlRkUVBGa0wzZndUT3FiVGVQdER3TzFTTmNFYjRxY3lzMVVJallhRU5GOGw4VElKT250RUpFWFF3TDRZbGZIUlBrbHR2ZGVIeHgzclhMUjNxeEIwSTA2V3RaWW1Kd3VxOWJyNkRvcU1yVHlGcjJ1QjlYRVJ3NmlodkU0d2ZwaVlnV1Q1am5obUFGSkVDSjM3VE90UG5aVjdyN08wenFRMEtHLVdfRjExZmVlNXRMZ2pFVUNYTVpfM0pkeGpFZlZHazhWVGwxalNyN3NodEJsRjhMVWRjSEVwanBSckdEUEpGSWs1OXM3Z3p0by0tX2dJN1AtNndWZWpIQ09DZG1uVktFcUxtbVJiZFR6WUtqeVFFa2kwc0FwVVpvWDlkTndDakFrYS1rOE8wM3A4R0hFNXdtT1RhWjIzZzUyLVk4Q0xUZ0VLMEhIMllld0dwYk5aUTk0UGV2dENnelFOcW1UdFIxMzNGczNIM2Jzb3J1UkUzXzZUQ0FCS2Vjbjlic3VJc2F3TkhmMUZWeV8xM3hPVlV1eWN2RXpSR0FhLWZfeFFJZkhEQVc1Uk5TSXVkNE1ablpSdlBfRFZiaGJhWjJtT2xWcTVHVGlOUlZoLWJZc1RyUmh6Y3R0czBvSkdhTXppZjNhcmtfb3otTHQxb00yTlIwYzhId2YxYkh0Y2VDeEdDcTRtQVc3UnloVGIyUEs3enF4NHY2Q3pobDZDWGZGUW5ZVmViVmo1cTZEd0JHYkVMRnVuMThFVFYyNUFOMHE4SS0zRDN1ZjU5aHZ5NGhVZlBqY3NkeTRQLU9nZ2dlYzlacURUV3RWQU5GZlFuZGRmNHVJNzk4Nm1zTzFtZFJ0NjlzOWpzZGp1R05GTDFGWm10cUNIb3I1N0Q5N09wcmZRM3NQS3dZZ0xEeThFOEJNV2NOdkZ0RXJXQ3diMlBHLVFwclA2MGRsZjlWZXpQOTRHZFBjNW5NYWhoamhGSHVmTTM3RXlZdEdEQ3ZTcGZUeUNPNmVUZi1TRm5uS3pPZ0dtNjlGN3RicDdsSy1ZQ29OOF81RTJsRG5XTmJWQUZ1OVRwYXRQeWpNR1FWOFJLaENoT1liYjJSZUhmY0phZWNXSkR6cmpqSVNZY2NjVEx0ejhUUFFzOHFGZ005UGxGNGJxekpSSDVVM0FJd2l1Q2ZScmY2ZXMzUG1IR19lZXVZVTFRamdtbXJkZTJqdURDY2xZY1hESWpXQWJLUmFITG8yMUR2Q3FVMHhNYjdUZDBCZzZ3Rzd2VVFPam9CR3BBWVB5b0UzS2hMWjNLQXdvOG5aeWp3RE0xcG40RFpNWC1JS1VwYmVWdEFKMFh6OFZmNUF6VTdUdUk2ZjlyS21PMjVTUHU2SElUTmVYeU4tbDJSejlyZGZ4MlVBTk5DV1N1c0R1VTdweEVyYnBQSENkdEJIbVNJZVA3MTFHOGotZnBvcV9KSzBNT3J4U2RWdTdUczFIUUQ5SmszSE9JeDZvaHlCbjdzbi1tOUJfZlp3c3FIVDM0RG50b0NsY0pBTWQ1TWQtS3VGaFktaG9OSFROQmRxVTdPNDc1TEJxck13ZkhFQ0p5ZlZDcl85dWlMZm4xTVZvT0phU2NSbjVlZXFVc2dudFZnY2pCeHoyNlZXVXk0TWdHd2U2YUx2N1BNanJsNURKU3Z6a0FCUThjSTI0a2Q1d0JURGxEeC4xb3Bwa18xbm4zYTNRNkV3cEQ3Z2VEc0I5WUp1SzhkYmF1a19FbXJqMXJULUlodHljbXE5RzV3UXhnbVh2NXFlTWdZbTQyMHpkQ0oxQkZYU2lnYTU1dw==" /><input
                                            type="hidden" name="_eventId" value="submit" /><input type="hidden"
                                            name="geolocation" />
                                    </section>

                                    <button class="bouton" name="submitBtn" accesskey="l" type="submit">
                                        <span class="mdc-button__label">SE CONNECTER</span>
                                    </button>

                                </div>
                            </form>

                            <!--<hr th:if="${loginFormViewable and loginFormEnabled}" class="my-4"/>--><span>
                                <div id="pmlinks" class="my-2">
                                    <div>
                                        <br /><img src="./assets/account-question.svg" alt="" style="width: 30px;">
                                        <span><a
                                                href="https://applisweb.universita.corsica/portail/tous_mes_outils/pwd-front.php">Mot
                                                de passe oublié ?</a></span>
                                    </div>
                                </div>
                            </span>

                            <script type="text/javascript">
                                /*<![CDATA[*/
                                var i = "Veuillez patienter..."
                                var j = "SE CONNECTER"
                                /*]]>*/
                                $(window).on('pageshow', function () {
                                    $(':submit').prop('disabled', false);
                                    $(':submit').attr('value', j);
                                });
                                $(document).ready(function () {
                                    $("#fm1").submit(function () {
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
                                    <p>Pour des raisons de sécurité, veuillez vous <a href="logout">déconnecter</a> et
                                        fermer votre navigateur lorsque vous avez fini d'accéder aux services
                                        authentifiés.</p>
                                </div>
                            </div>
                        </span>
                    </div>

                    <span>
                    </span>
                </div>

                <br>
                <div class="justify-content-center  flex-column mdc-card mdc-card-content card flex-grow-1"
                    style="padding: 20px">


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
                            if (typeof (data) == "undefined")
                                return false;

                            return true;
                        }

                        // CODE DE TEST

                        $_GET = getURLParams();

                        //if(isset($_GET.locale))
                        //	document.write($_GET.locale + "<br />");
                        // alert($_GET.locale);
                        if (!isset($_GET.url_appli)) {
                            url_appli = "https://portailweb.universita.corsica";
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
