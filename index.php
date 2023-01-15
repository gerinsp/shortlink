<?php

require 'controller/header.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LinkIn</title>
    <!-- script -->

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&family=Noto+Sans+JP&family=Outfit&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        
        .bg-color,
        .bg-color:hover {
            background-color: rgb(225, 225, 226);
        }
        
        .color,
        .color:focus,
        .color::selection {
            background-color: rgb(64, 65, 79);
            outline: none;
            border: none;
        }
        
        .dark {
            background-color: rgb(52, 53, 65);
        }
        
        .text-color {
            color: white;
            opacity: 0, 5;
        }
        
        .custom-tooltip {
        --bs-tooltip-bg: var(--bs-dark);
        }

        .customtooltip {
        --bs-tooltip-bg: var(--bs-light);
        --bs-tooltip-color: var(--bs-dark);
        } 
    </style>
  </head>
  <body id="body">
      <!-- navbar -->
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 shadow-sm">
            <div class="container col-md-8">
                <div class="float-start">
                    <a href="/" class="text-dark text-decoration-none">
                        <h4><i class="bi bi-link-45deg"></i> LinkIn</h4>
                    </a>
                </div>
                <div class="text-end">
                    <a href="https://github.com/gerinsp/shortlink" class="mx-4 text-dark text-decoration-none"><i class="bi bi-github"></i> Open in Github</a>
                    <a id="mode" class="btn btn-sm btn-secondary bg-color border-0 text-dark"><i class="bi bi-moon-fill"></i></i></a>
                </div>
            </div>
            </header>

        <!-- main -->
        <div class="container col-md-8">
        <h5 class="text-center my-4 text-danger">The URL is to long? Make it short</h5>
        <form src="#" method="post" id="form">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Long URL <i id="longurl" class="bi bi-question-circle-fill tooltip-form" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip1"
                            data-bs-title="The URL to be shortened. example : https://www.example.com/example-form-income-data"></i></label>
                    <input type="text" class="form-control" name="long_url" id="input1" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">End Point URL <i id="endpoint" class="bi bi-question-circle-fill tooltip-form" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip1"
                            data-bs-title="Sentence behind URL End Point. for example: short, then the result: http://linkin/short"></i></label>
                    <input type="text" class="form-control" name="short_url" id="input2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button id="submit" type="submit" data-bs-toggle="modal" data-bs-target="#modalShort" name="submit" class="btn btn-primary w-100"  disabled>Submit</button>
                </div>
                <div class="col">
                    <button id="reset" type="button" class="btn btn-warning w-100">Reset Form</button>
                </div>
            </div>
        </form>
        </div>
        
        <!-- modal -->
        <div class="modal fade" id="modalShort" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="modalbox" class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 id="modal-title" class="modal-title fs-5">Your Shortened Link</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal-body" class="modal-body py-0">
            <div class="hstack gap-3">
                <input type="text" id="url" value="" class="border border-0 mx-2 form-control overflow-hidden" readonly>
                <div id="btnmodal1" class="text-end">
                <button type="button" id="btnmodal" data-clipboard-target="#url" class="btn btn-sm bg-color btn-modal"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Copy to clipboard">
                        <i data-clipboard-target="#url" class="bi bi-clipboard"></i>
                </button>
                </div>
                </div>
                <div class="float-start flex-column">
                
            </div>
                
                <!-- Trigger -->
            </div>
            <div class="modal-footer flex-column border-top-0">
                <button type="button" class="btn btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('#btnmodal, .bi-clipboard');
        clipboard.on('success', function (e) {
            console.log(e);
        });
        clipboard.on('error', function (e) {
            console.log(e);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>