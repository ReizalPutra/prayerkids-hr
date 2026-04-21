<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.9.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.9.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                                    <ul id="tocify-subheader-introduction" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="versi-bahasa-indonesia">
                                <a href="#versi-bahasa-indonesia">Versi Bahasa Indonesia</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Login pengguna</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                                <a href="#authentication-POSTapi-logout">Logout pengguna</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETapi-me">
                                <a href="#authentication-GETapi-me">Profil pengguna saat ini</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-hr-management-attendances" class="tocify-header">
                <li class="tocify-item level-1" data-unique="hr-management-attendances">
                    <a href="#hr-management-attendances">HR Management - Attendances</a>
                </li>
                                    <ul id="tocify-subheader-hr-management-attendances" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="hr-management-attendances-GETapi-attendances">
                                <a href="#hr-management-attendances-GETapi-attendances">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-attendances-POSTapi-attendances">
                                <a href="#hr-management-attendances-POSTapi-attendances">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-attendances-GETapi-attendances--id-">
                                <a href="#hr-management-attendances-GETapi-attendances--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-attendances-PUTapi-attendances--id-">
                                <a href="#hr-management-attendances-PUTapi-attendances--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-attendances-DELETEapi-attendances--id-">
                                <a href="#hr-management-attendances-DELETEapi-attendances--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-hr-management-employees" class="tocify-header">
                <li class="tocify-item level-1" data-unique="hr-management-employees">
                    <a href="#hr-management-employees">HR Management - Employees</a>
                </li>
                                    <ul id="tocify-subheader-hr-management-employees" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="hr-management-employees-GETapi-employees">
                                <a href="#hr-management-employees-GETapi-employees">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-employees-POSTapi-employees">
                                <a href="#hr-management-employees-POSTapi-employees">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-employees-GETapi-employees--id-">
                                <a href="#hr-management-employees-GETapi-employees--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-employees-PUTapi-employees--id-">
                                <a href="#hr-management-employees-PUTapi-employees--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-employees-DELETEapi-employees--id-">
                                <a href="#hr-management-employees-DELETEapi-employees--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-hr-management-leave-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="hr-management-leave-requests">
                    <a href="#hr-management-leave-requests">HR Management - Leave Requests</a>
                </li>
                                    <ul id="tocify-subheader-hr-management-leave-requests" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="hr-management-leave-requests-GETapi-leaveRequests">
                                <a href="#hr-management-leave-requests-GETapi-leaveRequests">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-leave-requests-POSTapi-leaveRequests">
                                <a href="#hr-management-leave-requests-POSTapi-leaveRequests">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-leave-requests-GETapi-leaveRequests--id-">
                                <a href="#hr-management-leave-requests-GETapi-leaveRequests--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-leave-requests-PUTapi-leaveRequests--id-">
                                <a href="#hr-management-leave-requests-PUTapi-leaveRequests--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-leave-requests-DELETEapi-leaveRequests--id-">
                                <a href="#hr-management-leave-requests-DELETEapi-leaveRequests--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-hr-management-payrolls" class="tocify-header">
                <li class="tocify-item level-1" data-unique="hr-management-payrolls">
                    <a href="#hr-management-payrolls">HR Management - Payrolls</a>
                </li>
                                    <ul id="tocify-subheader-hr-management-payrolls" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="hr-management-payrolls-GETapi-payrolls">
                                <a href="#hr-management-payrolls-GETapi-payrolls">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-payrolls-POSTapi-payrolls">
                                <a href="#hr-management-payrolls-POSTapi-payrolls">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-payrolls-GETapi-payrolls--id-">
                                <a href="#hr-management-payrolls-GETapi-payrolls--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-payrolls-PUTapi-payrolls--id-">
                                <a href="#hr-management-payrolls-PUTapi-payrolls--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-payrolls-DELETEapi-payrolls--id-">
                                <a href="#hr-management-payrolls-DELETEapi-payrolls--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-hr-management-performance-reviews" class="tocify-header">
                <li class="tocify-item level-1" data-unique="hr-management-performance-reviews">
                    <a href="#hr-management-performance-reviews">HR Management - Performance Reviews</a>
                </li>
                                    <ul id="tocify-subheader-hr-management-performance-reviews" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="hr-management-performance-reviews-GETapi-performanceReviews">
                                <a href="#hr-management-performance-reviews-GETapi-performanceReviews">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-performance-reviews-POSTapi-performanceReviews">
                                <a href="#hr-management-performance-reviews-POSTapi-performanceReviews">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-performance-reviews-GETapi-performanceReviews--id-">
                                <a href="#hr-management-performance-reviews-GETapi-performanceReviews--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-performance-reviews-PUTapi-performanceReviews--id-">
                                <a href="#hr-management-performance-reviews-PUTapi-performanceReviews--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="hr-management-performance-reviews-DELETEapi-performanceReviews--id-">
                                <a href="#hr-management-performance-reviews-DELETEapi-performanceReviews--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-operational-attendance-locations" class="tocify-header">
                <li class="tocify-item level-1" data-unique="operational-attendance-locations">
                    <a href="#operational-attendance-locations">Operational - Attendance Locations</a>
                </li>
                                    <ul id="tocify-subheader-operational-attendance-locations" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="operational-attendance-locations-GETapi-attendanceLocations">
                                <a href="#operational-attendance-locations-GETapi-attendanceLocations">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-attendance-locations-POSTapi-attendanceLocations">
                                <a href="#operational-attendance-locations-POSTapi-attendanceLocations">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-attendance-locations-GETapi-attendanceLocations--id-">
                                <a href="#operational-attendance-locations-GETapi-attendanceLocations--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-attendance-locations-PUTapi-attendanceLocations--id-">
                                <a href="#operational-attendance-locations-PUTapi-attendanceLocations--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-attendance-locations-DELETEapi-attendanceLocations--id-">
                                <a href="#operational-attendance-locations-DELETEapi-attendanceLocations--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-operational-contract-templates" class="tocify-header">
                <li class="tocify-item level-1" data-unique="operational-contract-templates">
                    <a href="#operational-contract-templates">Operational - Contract Templates</a>
                </li>
                                    <ul id="tocify-subheader-operational-contract-templates" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="operational-contract-templates-GETapi-contractTemplates">
                                <a href="#operational-contract-templates-GETapi-contractTemplates">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-contract-templates-POSTapi-contractTemplates">
                                <a href="#operational-contract-templates-POSTapi-contractTemplates">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-contract-templates-GETapi-contractTemplates--id-">
                                <a href="#operational-contract-templates-GETapi-contractTemplates--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-contract-templates-PUTapi-contractTemplates--id-">
                                <a href="#operational-contract-templates-PUTapi-contractTemplates--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-contract-templates-DELETEapi-contractTemplates--id-">
                                <a href="#operational-contract-templates-DELETEapi-contractTemplates--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-operational-divisions" class="tocify-header">
                <li class="tocify-item level-1" data-unique="operational-divisions">
                    <a href="#operational-divisions">Operational - Divisions</a>
                </li>
                                    <ul id="tocify-subheader-operational-divisions" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="operational-divisions-GETapi-divisions">
                                <a href="#operational-divisions-GETapi-divisions">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-divisions-POSTapi-divisions">
                                <a href="#operational-divisions-POSTapi-divisions">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-divisions-GETapi-divisions--id-">
                                <a href="#operational-divisions-GETapi-divisions--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-divisions-PUTapi-divisions--id-">
                                <a href="#operational-divisions-PUTapi-divisions--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-divisions-DELETEapi-divisions--id-">
                                <a href="#operational-divisions-DELETEapi-divisions--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-operational-positions" class="tocify-header">
                <li class="tocify-item level-1" data-unique="operational-positions">
                    <a href="#operational-positions">Operational - Positions</a>
                </li>
                                    <ul id="tocify-subheader-operational-positions" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="operational-positions-GETapi-positions">
                                <a href="#operational-positions-GETapi-positions">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-positions-POSTapi-positions">
                                <a href="#operational-positions-POSTapi-positions">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-positions-GETapi-positions--id-">
                                <a href="#operational-positions-GETapi-positions--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-positions-PUTapi-positions--id-">
                                <a href="#operational-positions-PUTapi-positions--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-positions-DELETEapi-positions--id-">
                                <a href="#operational-positions-DELETEapi-positions--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-operational-shifts" class="tocify-header">
                <li class="tocify-item level-1" data-unique="operational-shifts">
                    <a href="#operational-shifts">Operational - Shifts</a>
                </li>
                                    <ul id="tocify-subheader-operational-shifts" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="operational-shifts-GETapi-shifts">
                                <a href="#operational-shifts-GETapi-shifts">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-shifts-POSTapi-shifts">
                                <a href="#operational-shifts-POSTapi-shifts">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-shifts-GETapi-shifts--id-">
                                <a href="#operational-shifts-GETapi-shifts--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-shifts-PUTapi-shifts--id-">
                                <a href="#operational-shifts-PUTapi-shifts--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="operational-shifts-DELETEapi-shifts--id-">
                                <a href="#operational-shifts-DELETEapi-shifts--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-recruitment-applicants" class="tocify-header">
                <li class="tocify-item level-1" data-unique="recruitment-applicants">
                    <a href="#recruitment-applicants">Recruitment - Applicants</a>
                </li>
                                    <ul id="tocify-subheader-recruitment-applicants" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="recruitment-applicants-GETapi-applicants">
                                <a href="#recruitment-applicants-GETapi-applicants">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-applicants-POSTapi-applicants">
                                <a href="#recruitment-applicants-POSTapi-applicants">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-applicants-GETapi-applicants--id-">
                                <a href="#recruitment-applicants-GETapi-applicants--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-applicants-PUTapi-applicants--id-">
                                <a href="#recruitment-applicants-PUTapi-applicants--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-applicants-DELETEapi-applicants--id-">
                                <a href="#recruitment-applicants-DELETEapi-applicants--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-recruitment-job-vacancies" class="tocify-header">
                <li class="tocify-item level-1" data-unique="recruitment-job-vacancies">
                    <a href="#recruitment-job-vacancies">Recruitment - Job Vacancies</a>
                </li>
                                    <ul id="tocify-subheader-recruitment-job-vacancies" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="recruitment-job-vacancies-GETapi-jobVacancies">
                                <a href="#recruitment-job-vacancies-GETapi-jobVacancies">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-job-vacancies-POSTapi-jobVacancies">
                                <a href="#recruitment-job-vacancies-POSTapi-jobVacancies">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-job-vacancies-GETapi-jobVacancies--id-">
                                <a href="#recruitment-job-vacancies-GETapi-jobVacancies--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-job-vacancies-PUTapi-jobVacancies--id-">
                                <a href="#recruitment-job-vacancies-PUTapi-jobVacancies--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="recruitment-job-vacancies-DELETEapi-jobVacancies--id-">
                                <a href="#recruitment-job-vacancies-DELETEapi-jobVacancies--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 11, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<h2 id="versi-bahasa-indonesia">Versi Bahasa Indonesia</h2>
<p>Dokumentasi ini menjelaskan seluruh endpoint API pada sistem Prayerkids HR.</p>
<h3 id="ringkasan">Ringkasan</h3>
<ul>
<li>Base URL mengikuti konfigurasi environment backend.</li>
<li>Semua response mengikuti pola standar: <code>meta</code>, <code>data</code> (sukses), dan <code>errors</code> (gagal).</li>
<li>Hampir semua endpoint membutuhkan autentikasi Sanctum Bearer token.</li>
</ul>
<h3 id="langkah-penggunaan-cepat">Langkah Penggunaan Cepat</h3>
<ol>
<li>Login lewat endpoint <code>POST /api/login</code>.</li>
<li>Ambil nilai <code>access_token</code> dari response.</li>
<li>Kirim header: <code>Authorization: Bearer {token}</code>.</li>
<li>Gunakan endpoint lain sesuai role dan permission user.</li>
</ol>
<h3 id="format-response">Format Response</h3>
<pre><code class="language-json">{
  "meta": {
    "status": "success",
    "code": 200,
    "message": "Pesan"
  },
  "data": {}
}</code></pre>
<pre><code class="language-json">{
  "meta": {
    "status": "error",
    "code": 422,
    "message": "Validasi request gagal."
  },
  "errors": {
    "field": ["Pesan error"]
  }
}</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Gunakan token Bearer dari endpoint login. Format header: <code>Authorization: Bearer {token}</code>.</p>

        <h1 id="authentication">Authentication</h1>

    

                                <h2 id="authentication-POSTapi-login">Login pengguna</h2>

<p>
</p>

<p>Men-generate personal access token Sanctum untuk dipakai pada endpoint lain.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"username\": \"admin_super\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "admin_super",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Login Berhasil&quot;
    },
    &quot;data&quot;: {
        &quot;access_token&quot;: &quot;1|example_plain_text_token&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;username&quot;: &quot;admin_super&quot;,
            &quot;name&quot;: &quot;Super Admin&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;error&quot;,
        &quot;code&quot;: 401,
        &quot;message&quot;: &quot;Username atau password tidak valid.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 422,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Validasi request gagal.&quot;
    },
    &quot;errors&quot;: {
        &quot;username&quot;: [
            &quot;The username field is required.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTapi-login"
               value="admin_super"
               data-component="body">
    <br>
<p>Username akun. Example: <code>admin_super</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="password"
               data-component="body">
    <br>
<p>Password akun. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-logout">Logout pengguna</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Menghapus token aktif saat ini (Bearer token), atau mengakhiri sesi jika login via session.</p>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Logout Berhasil&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 401,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Unauthenticated.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-GETapi-me">Profil pengguna saat ini</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Mengembalikan data user dari token yang sedang digunakan.</p>

<span id="example-requests-GETapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-me">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Success&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;username&quot;: &quot;admin_super&quot;,
        &quot;name&quot;: &quot;Super Admin&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 401,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Unauthenticated.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-me" data-method="GET"
      data-path="api/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-me"
                    onclick="tryItOut('GETapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-me"
                    onclick="cancelTryOut('GETapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-me"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="hr-management-attendances">HR Management - Attendances</h1>

    <p>API pengelolaan data presensi karyawan.</p>

                                <h2 id="hr-management-attendances-GETapi-attendances">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-attendances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/attendances" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendances"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attendances">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data kehadiran berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef50&quot;,
            &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;date&quot;: &quot;2026-04-11&quot;,
            &quot;status&quot;: &quot;on_time&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attendances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attendances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attendances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attendances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attendances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attendances" data-method="GET"
      data-path="api/attendances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attendances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attendances"
                    onclick="tryItOut('GETapi-attendances');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attendances"
                    onclick="cancelTryOut('GETapi-attendances');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attendances"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attendances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-attendances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="hr-management-attendances-POSTapi-attendances">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-attendances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/attendances" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"shift_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20\",
    \"location_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30\",
    \"date\": \"2026-04-11\",
    \"clock_in\": \"2026-04-11 08:03:00\",
    \"clock_out\": \"2026-04-11 17:04:00\",
    \"status\": \"on_time\",
    \"check_in_lat\": -6.2009,
    \"check_in_long\": 106.8166
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendances"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "shift_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef20",
    "location_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef30",
    "date": "2026-04-11",
    "clock_in": "2026-04-11 08:03:00",
    "clock_out": "2026-04-11 17:04:00",
    "status": "on_time",
    "check_in_lat": -6.2009,
    "check_in_long": 106.8166
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-attendances">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Data kehadiran baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef50&quot;,
        &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;date&quot;: &quot;2026-04-11&quot;,
        &quot;status&quot;: &quot;on_time&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-attendances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-attendances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-attendances"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-attendances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-attendances">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-attendances" data-method="POST"
      data-path="api/attendances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-attendances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-attendances"
                    onclick="tryItOut('POSTapi-attendances');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-attendances"
                    onclick="cancelTryOut('POSTapi-attendances');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-attendances"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/attendances</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-attendances"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-attendances"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="POSTapi-attendances"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shift_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shift_id"                data-endpoint="POSTapi-attendances"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef20"
               data-component="body">
    <br>
<p>ID shift kerja terkait. Must be a valid UUID. The <code>id</code> of an existing record in the shifts table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location_id"                data-endpoint="POSTapi-attendances"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef30"
               data-component="body">
    <br>
<p>ID lokasi presensi. Must be a valid UUID. The <code>id</code> of an existing record in the attendance_locations table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="POSTapi-attendances"
               value="2026-04-11"
               data-component="body">
    <br>
<p>Tanggal presensi. Must be a valid date. Example: <code>2026-04-11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>clock_in</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="clock_in"                data-endpoint="POSTapi-attendances"
               value="2026-04-11 08:03:00"
               data-component="body">
    <br>
<p>Waktu check-in (Y-m-d H:i:s). Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2026-04-11 08:03:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>clock_out</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="clock_out"                data-endpoint="POSTapi-attendances"
               value="2026-04-11 17:04:00"
               data-component="body">
    <br>
<p>Waktu check-out (Y-m-d H:i:s). Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2026-04-11 17:04:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-attendances"
               value="on_time"
               data-component="body">
    <br>
<p>Status presensi. Example: <code>on_time</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>on_time</code></li> <li><code>late</code></li> <li><code>absent</code></li> <li><code>permit</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>check_in_lat</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="check_in_lat"                data-endpoint="POSTapi-attendances"
               value="-6.2009"
               data-component="body">
    <br>
<p>Latitude saat check-in. Must be between -90 and 90. Example: <code>-6.2009</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>check_in_long</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="check_in_long"                data-endpoint="POSTapi-attendances"
               value="106.8166"
               data-component="body">
    <br>
<p>Longitude saat check-in. Must be between -180 and 180. Example: <code>106.8166</code></p>
        </div>
        </form>

                    <h2 id="hr-management-attendances-GETapi-attendances--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-attendances--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/attendances/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendances/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attendances--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail kehadiran ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef50&quot;,
        &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;date&quot;: &quot;2026-04-11&quot;,
        &quot;status&quot;: &quot;on_time&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attendances--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attendances--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attendances--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attendances--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attendances--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attendances--id-" data-method="GET"
      data-path="api/attendances/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attendances--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attendances--id-"
                    onclick="tryItOut('GETapi-attendances--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attendances--id-"
                    onclick="cancelTryOut('GETapi-attendances--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attendances--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attendances/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-attendances--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-attendances--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the attendance. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="hr-management-attendances-PUTapi-attendances--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-attendances--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/attendances/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"shift_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef20\",
    \"location_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef30\",
    \"date\": \"2026-04-11\",
    \"clock_in\": \"2026-04-11 08:03:00\",
    \"clock_out\": \"2026-04-11 17:04:00\",
    \"status\": \"on_time\",
    \"check_in_lat\": -6.2009,
    \"check_in_long\": 106.8166
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendances/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "shift_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef20",
    "location_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef30",
    "date": "2026-04-11",
    "clock_in": "2026-04-11 08:03:00",
    "clock_out": "2026-04-11 17:04:00",
    "status": "on_time",
    "check_in_lat": -6.2009,
    "check_in_long": 106.8166
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-attendances--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data kehadiran berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef50&quot;,
        &quot;status&quot;: &quot;late&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-attendances--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-attendances--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-attendances--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-attendances--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-attendances--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-attendances--id-" data-method="PUT"
      data-path="api/attendances/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-attendances--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-attendances--id-"
                    onclick="tryItOut('PUTapi-attendances--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-attendances--id-"
                    onclick="cancelTryOut('PUTapi-attendances--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-attendances--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/attendances/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/attendances/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-attendances--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-attendances--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the attendance. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="PUTapi-attendances--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shift_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shift_id"                data-endpoint="PUTapi-attendances--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef20"
               data-component="body">
    <br>
<p>ID shift kerja terkait. Must be a valid UUID. The <code>id</code> of an existing record in the shifts table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location_id"                data-endpoint="PUTapi-attendances--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef30"
               data-component="body">
    <br>
<p>ID lokasi presensi. Must be a valid UUID. The <code>id</code> of an existing record in the attendance_locations table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="PUTapi-attendances--id-"
               value="2026-04-11"
               data-component="body">
    <br>
<p>Tanggal presensi. Must be a valid date. Example: <code>2026-04-11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>clock_in</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="clock_in"                data-endpoint="PUTapi-attendances--id-"
               value="2026-04-11 08:03:00"
               data-component="body">
    <br>
<p>Waktu check-in (Y-m-d H:i:s). Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2026-04-11 08:03:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>clock_out</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="clock_out"                data-endpoint="PUTapi-attendances--id-"
               value="2026-04-11 17:04:00"
               data-component="body">
    <br>
<p>Waktu check-out (Y-m-d H:i:s). Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2026-04-11 17:04:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-attendances--id-"
               value="on_time"
               data-component="body">
    <br>
<p>Status presensi. Example: <code>on_time</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>on_time</code></li> <li><code>late</code></li> <li><code>absent</code></li> <li><code>permit</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>check_in_lat</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="check_in_lat"                data-endpoint="PUTapi-attendances--id-"
               value="-6.2009"
               data-component="body">
    <br>
<p>Latitude saat check-in. Must be between -90 and 90. Example: <code>-6.2009</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>check_in_long</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="check_in_long"                data-endpoint="PUTapi-attendances--id-"
               value="106.8166"
               data-component="body">
    <br>
<p>Longitude saat check-in. Must be between -180 and 180. Example: <code>106.8166</code></p>
        </div>
        </form>

                    <h2 id="hr-management-attendances-DELETEapi-attendances--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-attendances--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/attendances/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendances/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-attendances--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data kehadiran berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-attendances--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-attendances--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-attendances--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-attendances--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-attendances--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-attendances--id-" data-method="DELETE"
      data-path="api/attendances/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-attendances--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-attendances--id-"
                    onclick="tryItOut('DELETEapi-attendances--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-attendances--id-"
                    onclick="cancelTryOut('DELETEapi-attendances--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-attendances--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/attendances/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-attendances--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-attendances--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-attendances--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the attendance. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="hr-management-employees">HR Management - Employees</h1>

    <p>API pengelolaan data karyawan.</p>

                                <h2 id="hr-management-employees-GETapi-employees">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data karyawan berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;nik&quot;: &quot;EMP-2026-001&quot;,
            &quot;full_name&quot;: &quot;Budi Setiawan&quot;,
            &quot;status&quot;: &quot;active&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-employees" data-method="GET"
      data-path="api/employees"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees"
                    onclick="tryItOut('GETapi-employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees"
                    onclick="cancelTryOut('GETapi-employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-employees"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-employees"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-employees"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="hr-management-employees-POSTapi-employees">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/employees" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"nik\": \"EMP-2026-001\",
    \"full_name\": \"Budi Setiawan\",
    \"division_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef10\",
    \"position_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11\",
    \"phone\": \"081234567890\",
    \"address\": \"Jl. Melati No. 10, Jakarta\",
    \"gender\": \"L\",
    \"join_date\": \"2026-01-10\",
    \"contract_start_date\": \"2026-01-10\",
    \"contract_end_date\": \"2027-01-09\",
    \"contract_number\": \"CTR-2026-001\",
    \"leave_quota\": 12,
    \"basic_salary\": 6000000,
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "nik": "EMP-2026-001",
    "full_name": "Budi Setiawan",
    "division_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10",
    "position_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef11",
    "phone": "081234567890",
    "address": "Jl. Melati No. 10, Jakarta",
    "gender": "L",
    "join_date": "2026-01-10",
    "contract_start_date": "2026-01-10",
    "contract_end_date": "2027-01-09",
    "contract_number": "CTR-2026-001",
    "leave_quota": 12,
    "basic_salary": 6000000,
    "status": "active"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-employees">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Karyawan baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;nik&quot;: &quot;EMP-2026-001&quot;,
        &quot;full_name&quot;: &quot;Budi Setiawan&quot;,
        &quot;status&quot;: &quot;active&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-employees"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-employees">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-employees" data-method="POST"
      data-path="api/employees"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-employees"
                    onclick="tryItOut('POSTapi-employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-employees"
                    onclick="cancelTryOut('POSTapi-employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-employees"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/employees</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-employees"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-employees"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-employees"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="POSTapi-employees"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID user yang terhubung ke data karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the users table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nik"                data-endpoint="POSTapi-employees"
               value="EMP-2026-001"
               data-component="body">
    <br>
<p>Nomor induk karyawan (unik). Must not be greater than 50 characters. Example: <code>EMP-2026-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="POSTapi-employees"
               value="Budi Setiawan"
               data-component="body">
    <br>
<p>Nama lengkap karyawan. Must not be greater than 255 characters. Example: <code>Budi Setiawan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>division_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="division_id"                data-endpoint="POSTapi-employees"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef10"
               data-component="body">
    <br>
<p>ID divisi karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the divisions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position_id"                data-endpoint="POSTapi-employees"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef11"
               data-component="body">
    <br>
<p>ID jabatan karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the positions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-employees"
               value="081234567890"
               data-component="body">
    <br>
<p>Nomor telepon karyawan. Must not be greater than 20 characters. Example: <code>081234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-employees"
               value="Jl. Melati No. 10, Jakarta"
               data-component="body">
    <br>
<p>Alamat domisili karyawan. Example: <code>Jl. Melati No. 10, Jakarta</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-employees"
               value="L"
               data-component="body">
    <br>
<p>Jenis kelamin: L (Laki-laki) atau P (Perempuan). Example: <code>L</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>L</code></li> <li><code>P</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>join_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="join_date"                data-endpoint="POSTapi-employees"
               value="2026-01-10"
               data-component="body">
    <br>
<p>Tanggal mulai bekerja. Must be a valid date. Example: <code>2026-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_start_date"                data-endpoint="POSTapi-employees"
               value="2026-01-10"
               data-component="body">
    <br>
<p>Tanggal mulai kontrak. Must be a valid date. Example: <code>2026-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_end_date"                data-endpoint="POSTapi-employees"
               value="2027-01-09"
               data-component="body">
    <br>
<p>Tanggal akhir kontrak. Must be a valid date. Example: <code>2027-01-09</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_number"                data-endpoint="POSTapi-employees"
               value="CTR-2026-001"
               data-component="body">
    <br>
<p>Nomor dokumen kontrak. Example: <code>CTR-2026-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>leave_quota</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="leave_quota"                data-endpoint="POSTapi-employees"
               value="12"
               data-component="body">
    <br>
<p>Kuota cuti tahunan. Must be at least 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>basic_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="basic_salary"                data-endpoint="POSTapi-employees"
               value="6000000"
               data-component="body">
    <br>
<p>Gaji pokok karyawan. Must be at least 0. Example: <code>6000000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-employees"
               value="active"
               data-component="body">
    <br>
<p>Status kepegawaian. Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>resigned</code></li> <li><code>suspended</code></li></ul>
        </div>
        </form>

                    <h2 id="hr-management-employees-GETapi-employees--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-employees--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail karyawan ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;nik&quot;: &quot;EMP-2026-001&quot;,
        &quot;full_name&quot;: &quot;Budi Setiawan&quot;,
        &quot;status&quot;: &quot;active&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-employees--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-employees--id-" data-method="GET"
      data-path="api/employees/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees--id-"
                    onclick="tryItOut('GETapi-employees--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees--id-"
                    onclick="cancelTryOut('GETapi-employees--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-employees--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-employees--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the employee. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="hr-management-employees-PUTapi-employees--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-employees--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/employees/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"nik\": \"EMP-2026-001\",
    \"full_name\": \"Budi Setiawan\",
    \"division_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef10\",
    \"position_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11\",
    \"phone\": \"081234567890\",
    \"address\": \"Jl. Melati No. 10, Jakarta\",
    \"gender\": \"L\",
    \"join_date\": \"2026-01-10\",
    \"contract_start_date\": \"2026-01-10\",
    \"contract_end_date\": \"2027-01-09\",
    \"contract_number\": \"CTR-2026-001\",
    \"leave_quota\": 12,
    \"basic_salary\": 6000000,
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "nik": "EMP-2026-001",
    "full_name": "Budi Setiawan",
    "division_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef10",
    "position_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef11",
    "phone": "081234567890",
    "address": "Jl. Melati No. 10, Jakarta",
    "gender": "L",
    "join_date": "2026-01-10",
    "contract_start_date": "2026-01-10",
    "contract_end_date": "2027-01-09",
    "contract_number": "CTR-2026-001",
    "leave_quota": 12,
    "basic_salary": 6000000,
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-employees--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data karyawan berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;nik&quot;: &quot;EMP-2026-001&quot;,
        &quot;full_name&quot;: &quot;Budi S.&quot;,
        &quot;status&quot;: &quot;active&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-employees--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-employees--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-employees--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-employees--id-" data-method="PUT"
      data-path="api/employees/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-employees--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-employees--id-"
                    onclick="tryItOut('PUTapi-employees--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-employees--id-"
                    onclick="cancelTryOut('PUTapi-employees--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-employees--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/employees/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/employees/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-employees--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-employees--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the employee. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="PUTapi-employees--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID user yang terhubung ke data karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the users table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nik</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nik"                data-endpoint="PUTapi-employees--id-"
               value="EMP-2026-001"
               data-component="body">
    <br>
<p>Nomor induk karyawan (unik). Must not be greater than 50 characters. Example: <code>EMP-2026-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>full_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="full_name"                data-endpoint="PUTapi-employees--id-"
               value="Budi Setiawan"
               data-component="body">
    <br>
<p>Nama lengkap karyawan. Must not be greater than 255 characters. Example: <code>Budi Setiawan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>division_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="division_id"                data-endpoint="PUTapi-employees--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef10"
               data-component="body">
    <br>
<p>ID divisi karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the divisions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position_id"                data-endpoint="PUTapi-employees--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef11"
               data-component="body">
    <br>
<p>ID jabatan karyawan. Must be a valid UUID. The <code>id</code> of an existing record in the positions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-employees--id-"
               value="081234567890"
               data-component="body">
    <br>
<p>Nomor telepon karyawan. Must not be greater than 20 characters. Example: <code>081234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-employees--id-"
               value="Jl. Melati No. 10, Jakarta"
               data-component="body">
    <br>
<p>Alamat domisili karyawan. Example: <code>Jl. Melati No. 10, Jakarta</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTapi-employees--id-"
               value="L"
               data-component="body">
    <br>
<p>Jenis kelamin: L (Laki-laki) atau P (Perempuan). Example: <code>L</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>L</code></li> <li><code>P</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>join_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="join_date"                data-endpoint="PUTapi-employees--id-"
               value="2026-01-10"
               data-component="body">
    <br>
<p>Tanggal mulai bekerja. Must be a valid date. Example: <code>2026-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_start_date"                data-endpoint="PUTapi-employees--id-"
               value="2026-01-10"
               data-component="body">
    <br>
<p>Tanggal mulai kontrak. Must be a valid date. Example: <code>2026-01-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_end_date"                data-endpoint="PUTapi-employees--id-"
               value="2027-01-09"
               data-component="body">
    <br>
<p>Tanggal akhir kontrak. Must be a valid date. Example: <code>2027-01-09</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contract_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contract_number"                data-endpoint="PUTapi-employees--id-"
               value="CTR-2026-001"
               data-component="body">
    <br>
<p>Nomor dokumen kontrak. Example: <code>CTR-2026-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>leave_quota</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="leave_quota"                data-endpoint="PUTapi-employees--id-"
               value="12"
               data-component="body">
    <br>
<p>Kuota cuti tahunan. Must be at least 0. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>basic_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="basic_salary"                data-endpoint="PUTapi-employees--id-"
               value="6000000"
               data-component="body">
    <br>
<p>Gaji pokok karyawan. Must be at least 0. Example: <code>6000000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-employees--id-"
               value="active"
               data-component="body">
    <br>
<p>Status kepegawaian. Example: <code>active</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>active</code></li> <li><code>resigned</code></li> <li><code>suspended</code></li></ul>
        </div>
        </form>

                    <h2 id="hr-management-employees-DELETEapi-employees--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-employees--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/employees/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-employees--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Karyawan berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-employees--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-employees--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-employees--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-employees--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-employees--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-employees--id-" data-method="DELETE"
      data-path="api/employees/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-employees--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-employees--id-"
                    onclick="tryItOut('DELETEapi-employees--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-employees--id-"
                    onclick="cancelTryOut('DELETEapi-employees--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-employees--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/employees/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-employees--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-employees--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-employees--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the employee. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="hr-management-leave-requests">HR Management - Leave Requests</h1>

    <p>API pengelolaan pengajuan cuti.</p>

                                <h2 id="hr-management-leave-requests-GETapi-leaveRequests">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-leaveRequests">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/leaveRequests" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/leaveRequests"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-leaveRequests">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data cuti berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef60&quot;,
            &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;type&quot;: &quot;annual&quot;,
            &quot;status&quot;: &quot;pending&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-leaveRequests" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-leaveRequests"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-leaveRequests"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-leaveRequests" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-leaveRequests">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-leaveRequests" data-method="GET"
      data-path="api/leaveRequests"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-leaveRequests', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-leaveRequests"
                    onclick="tryItOut('GETapi-leaveRequests');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-leaveRequests"
                    onclick="cancelTryOut('GETapi-leaveRequests');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-leaveRequests"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/leaveRequests</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-leaveRequests"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-leaveRequests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-leaveRequests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="hr-management-leave-requests-POSTapi-leaveRequests">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-leaveRequests">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/leaveRequests" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"type\": \"annual\",
    \"start_date\": \"2026-05-10\",
    \"end_date\": \"2026-05-12\",
    \"reason\": \"Keperluan keluarga\",
    \"proof_file\": \"proofs\\/leave-001.pdf\",
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/leaveRequests"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "type": "annual",
    "start_date": "2026-05-10",
    "end_date": "2026-05-12",
    "reason": "Keperluan keluarga",
    "proof_file": "proofs\/leave-001.pdf",
    "status": "pending"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-leaveRequests">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Pengajuan cuti baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef60&quot;,
        &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;type&quot;: &quot;annual&quot;,
        &quot;status&quot;: &quot;pending&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-leaveRequests" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-leaveRequests"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-leaveRequests"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-leaveRequests" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-leaveRequests">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-leaveRequests" data-method="POST"
      data-path="api/leaveRequests"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-leaveRequests', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-leaveRequests"
                    onclick="tryItOut('POSTapi-leaveRequests');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-leaveRequests"
                    onclick="cancelTryOut('POSTapi-leaveRequests');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-leaveRequests"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/leaveRequests</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-leaveRequests"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-leaveRequests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-leaveRequests"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="POSTapi-leaveRequests"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan pengaju cuti. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-leaveRequests"
               value="annual"
               data-component="body">
    <br>
<p>Jenis cuti: sick, annual, unpaid. Example: <code>annual</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>sick</code></li> <li><code>annual</code></li> <li><code>unpaid</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="POSTapi-leaveRequests"
               value="2026-05-10"
               data-component="body">
    <br>
<p>Tanggal mulai cuti. Must be a valid date. Example: <code>2026-05-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="POSTapi-leaveRequests"
               value="2026-05-12"
               data-component="body">
    <br>
<p>Tanggal akhir cuti. Must be a valid date. Must be a date after or equal to <code>start_date</code>. Example: <code>2026-05-12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reason"                data-endpoint="POSTapi-leaveRequests"
               value="Keperluan keluarga"
               data-component="body">
    <br>
<p>Alasan pengajuan cuti. Example: <code>Keperluan keluarga</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>proof_file</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="proof_file"                data-endpoint="POSTapi-leaveRequests"
               value="proofs/leave-001.pdf"
               data-component="body">
    <br>
<p>Path bukti lampiran jika ada. Example: <code>proofs/leave-001.pdf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-leaveRequests"
               value="pending"
               data-component="body">
    <br>
<p>Status approval cuti. Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>approved</code></li> <li><code>rejected</code></li></ul>
        </div>
        </form>

                    <h2 id="hr-management-leave-requests-GETapi-leaveRequests--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-leaveRequests--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/leaveRequests/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/leaveRequests/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-leaveRequests--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail cuti ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef60&quot;,
        &quot;type&quot;: &quot;annual&quot;,
        &quot;status&quot;: &quot;pending&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-leaveRequests--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-leaveRequests--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-leaveRequests--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-leaveRequests--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-leaveRequests--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-leaveRequests--id-" data-method="GET"
      data-path="api/leaveRequests/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-leaveRequests--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-leaveRequests--id-"
                    onclick="tryItOut('GETapi-leaveRequests--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-leaveRequests--id-"
                    onclick="cancelTryOut('GETapi-leaveRequests--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-leaveRequests--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/leaveRequests/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-leaveRequests--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-leaveRequests--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the leaveRequest. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="hr-management-leave-requests-PUTapi-leaveRequests--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-leaveRequests--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/leaveRequests/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"type\": \"annual\",
    \"start_date\": \"2026-05-10\",
    \"end_date\": \"2026-05-12\",
    \"reason\": \"Keperluan keluarga\",
    \"proof_file\": \"proofs\\/leave-001.pdf\",
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/leaveRequests/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "type": "annual",
    "start_date": "2026-05-10",
    "end_date": "2026-05-12",
    "reason": "Keperluan keluarga",
    "proof_file": "proofs\/leave-001.pdf",
    "status": "pending"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-leaveRequests--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data cuti berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef60&quot;,
        &quot;status&quot;: &quot;approved&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-leaveRequests--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-leaveRequests--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-leaveRequests--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-leaveRequests--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-leaveRequests--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-leaveRequests--id-" data-method="PUT"
      data-path="api/leaveRequests/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-leaveRequests--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-leaveRequests--id-"
                    onclick="tryItOut('PUTapi-leaveRequests--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-leaveRequests--id-"
                    onclick="cancelTryOut('PUTapi-leaveRequests--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-leaveRequests--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/leaveRequests/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/leaveRequests/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-leaveRequests--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-leaveRequests--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the leaveRequest. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="PUTapi-leaveRequests--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan pengaju cuti. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTapi-leaveRequests--id-"
               value="annual"
               data-component="body">
    <br>
<p>Jenis cuti: sick, annual, unpaid. Example: <code>annual</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>sick</code></li> <li><code>annual</code></li> <li><code>unpaid</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="PUTapi-leaveRequests--id-"
               value="2026-05-10"
               data-component="body">
    <br>
<p>Tanggal mulai cuti. Must be a valid date. Example: <code>2026-05-10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="PUTapi-leaveRequests--id-"
               value="2026-05-12"
               data-component="body">
    <br>
<p>Tanggal akhir cuti. Must be a valid date. Must be a date after or equal to <code>start_date</code>. Example: <code>2026-05-12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reason</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reason"                data-endpoint="PUTapi-leaveRequests--id-"
               value="Keperluan keluarga"
               data-component="body">
    <br>
<p>Alasan pengajuan cuti. Example: <code>Keperluan keluarga</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>proof_file</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="proof_file"                data-endpoint="PUTapi-leaveRequests--id-"
               value="proofs/leave-001.pdf"
               data-component="body">
    <br>
<p>Path bukti lampiran jika ada. Example: <code>proofs/leave-001.pdf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-leaveRequests--id-"
               value="pending"
               data-component="body">
    <br>
<p>Status approval cuti. Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>approved</code></li> <li><code>rejected</code></li></ul>
        </div>
        </form>

                    <h2 id="hr-management-leave-requests-DELETEapi-leaveRequests--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-leaveRequests--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/leaveRequests/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/leaveRequests/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-leaveRequests--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data cuti berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-leaveRequests--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-leaveRequests--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-leaveRequests--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-leaveRequests--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-leaveRequests--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-leaveRequests--id-" data-method="DELETE"
      data-path="api/leaveRequests/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-leaveRequests--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-leaveRequests--id-"
                    onclick="tryItOut('DELETEapi-leaveRequests--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-leaveRequests--id-"
                    onclick="cancelTryOut('DELETEapi-leaveRequests--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-leaveRequests--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/leaveRequests/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-leaveRequests--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-leaveRequests--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-leaveRequests--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the leaveRequest. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="hr-management-payrolls">HR Management - Payrolls</h1>

    <p>API pengelolaan data penggajian.</p>

                                <h2 id="hr-management-payrolls-GETapi-payrolls">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-payrolls">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/payrolls" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payrolls"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-payrolls">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data gaji berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef70&quot;,
            &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;month&quot;: &quot;April&quot;,
            &quot;year&quot;: 2026,
            &quot;net_salary&quot;: 6600000
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-payrolls" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payrolls"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payrolls"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payrolls" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payrolls">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payrolls" data-method="GET"
      data-path="api/payrolls"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payrolls', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payrolls"
                    onclick="tryItOut('GETapi-payrolls');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payrolls"
                    onclick="cancelTryOut('GETapi-payrolls');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payrolls"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payrolls</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-payrolls"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payrolls"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payrolls"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="hr-management-payrolls-POSTapi-payrolls">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-payrolls">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/payrolls" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"month\": \"April\",
    \"year\": 2026,
    \"basic_salary_snapshot\": 6000000,
    \"allowance_details\": {
        \"transport\": 500000,
        \"meal\": 300000
    },
    \"deduction_details\": {
        \"bpjs\": 200000
    },
    \"net_salary\": 6600000,
    \"payment_status\": \"pending\",
    \"payment_date\": \"2026-04-30\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payrolls"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "month": "April",
    "year": 2026,
    "basic_salary_snapshot": 6000000,
    "allowance_details": {
        "transport": 500000,
        "meal": 300000
    },
    "deduction_details": {
        "bpjs": 200000
    },
    "net_salary": 6600000,
    "payment_status": "pending",
    "payment_date": "2026-04-30"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-payrolls">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Data gaji baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef70&quot;,
        &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
        &quot;month&quot;: &quot;April&quot;,
        &quot;year&quot;: 2026,
        &quot;net_salary&quot;: 6600000
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-payrolls" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-payrolls"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-payrolls"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-payrolls" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-payrolls">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-payrolls" data-method="POST"
      data-path="api/payrolls"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-payrolls', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-payrolls"
                    onclick="tryItOut('POSTapi-payrolls');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-payrolls"
                    onclick="cancelTryOut('POSTapi-payrolls');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-payrolls"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/payrolls</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-payrolls"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-payrolls"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-payrolls"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="POSTapi-payrolls"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan penerima gaji. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>month</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="month"                data-endpoint="POSTapi-payrolls"
               value="April"
               data-component="body">
    <br>
<p>Periode bulan payroll. Must not be greater than 20 characters. Example: <code>April</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="year"                data-endpoint="POSTapi-payrolls"
               value="2026"
               data-component="body">
    <br>
<p>Periode tahun payroll. Must be at least 2000. Example: <code>2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>basic_salary_snapshot</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="basic_salary_snapshot"                data-endpoint="POSTapi-payrolls"
               value="6000000"
               data-component="body">
    <br>
<p>Snapshot gaji pokok saat payroll diproses. Must be at least 0. Example: <code>6000000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allowance_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="allowance_details"                data-endpoint="POSTapi-payrolls"
               value=""
               data-component="body">
    <br>
<p>Rincian tunjangan (object key-value).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deduction_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deduction_details"                data-endpoint="POSTapi-payrolls"
               value=""
               data-component="body">
    <br>
<p>Rincian potongan (object key-value).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>net_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="net_salary"                data-endpoint="POSTapi-payrolls"
               value="6600000"
               data-component="body">
    <br>
<p>Gaji bersih yang dibayarkan. Must be at least 0. Example: <code>6600000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_status"                data-endpoint="POSTapi-payrolls"
               value="pending"
               data-component="body">
    <br>
<p>Status pembayaran: paid atau pending. Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>paid</code></li> <li><code>pending</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_date"                data-endpoint="POSTapi-payrolls"
               value="2026-04-30"
               data-component="body">
    <br>
<p>Tanggal pembayaran. Must be a valid date. Example: <code>2026-04-30</code></p>
        </div>
        </form>

                    <h2 id="hr-management-payrolls-GETapi-payrolls--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-payrolls--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/payrolls/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payrolls/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-payrolls--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail gaji ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef70&quot;,
        &quot;month&quot;: &quot;April&quot;,
        &quot;year&quot;: 2026,
        &quot;net_salary&quot;: 6600000
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-payrolls--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payrolls--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payrolls--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payrolls--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payrolls--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payrolls--id-" data-method="GET"
      data-path="api/payrolls/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payrolls--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payrolls--id-"
                    onclick="tryItOut('GETapi-payrolls--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payrolls--id-"
                    onclick="cancelTryOut('GETapi-payrolls--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payrolls--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payrolls/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-payrolls--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-payrolls--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the payroll. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="hr-management-payrolls-PUTapi-payrolls--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-payrolls--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/payrolls/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"month\": \"April\",
    \"year\": 2026,
    \"basic_salary_snapshot\": 6000000,
    \"allowance_details\": {
        \"transport\": 500000,
        \"meal\": 300000
    },
    \"deduction_details\": {
        \"bpjs\": 200000
    },
    \"net_salary\": 6600000,
    \"payment_status\": \"pending\",
    \"payment_date\": \"2026-04-30\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payrolls/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "month": "April",
    "year": 2026,
    "basic_salary_snapshot": 6000000,
    "allowance_details": {
        "transport": 500000,
        "meal": 300000
    },
    "deduction_details": {
        "bpjs": 200000
    },
    "net_salary": 6600000,
    "payment_status": "pending",
    "payment_date": "2026-04-30"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-payrolls--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data gaji berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef70&quot;,
        &quot;payment_status&quot;: &quot;paid&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-payrolls--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-payrolls--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-payrolls--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-payrolls--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-payrolls--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-payrolls--id-" data-method="PUT"
      data-path="api/payrolls/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-payrolls--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-payrolls--id-"
                    onclick="tryItOut('PUTapi-payrolls--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-payrolls--id-"
                    onclick="cancelTryOut('PUTapi-payrolls--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-payrolls--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/payrolls/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/payrolls/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-payrolls--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-payrolls--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the payroll. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="PUTapi-payrolls--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan penerima gaji. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>month</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="month"                data-endpoint="PUTapi-payrolls--id-"
               value="April"
               data-component="body">
    <br>
<p>Periode bulan payroll. Must not be greater than 20 characters. Example: <code>April</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="year"                data-endpoint="PUTapi-payrolls--id-"
               value="2026"
               data-component="body">
    <br>
<p>Periode tahun payroll. Must be at least 2000. Example: <code>2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>basic_salary_snapshot</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="basic_salary_snapshot"                data-endpoint="PUTapi-payrolls--id-"
               value="6000000"
               data-component="body">
    <br>
<p>Snapshot gaji pokok saat payroll diproses. Must be at least 0. Example: <code>6000000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>allowance_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="allowance_details"                data-endpoint="PUTapi-payrolls--id-"
               value=""
               data-component="body">
    <br>
<p>Rincian tunjangan (object key-value).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deduction_details</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="deduction_details"                data-endpoint="PUTapi-payrolls--id-"
               value=""
               data-component="body">
    <br>
<p>Rincian potongan (object key-value).</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>net_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="net_salary"                data-endpoint="PUTapi-payrolls--id-"
               value="6600000"
               data-component="body">
    <br>
<p>Gaji bersih yang dibayarkan. Must be at least 0. Example: <code>6600000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_status"                data-endpoint="PUTapi-payrolls--id-"
               value="pending"
               data-component="body">
    <br>
<p>Status pembayaran: paid atau pending. Example: <code>pending</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>paid</code></li> <li><code>pending</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_date"                data-endpoint="PUTapi-payrolls--id-"
               value="2026-04-30"
               data-component="body">
    <br>
<p>Tanggal pembayaran. Must be a valid date. Example: <code>2026-04-30</code></p>
        </div>
        </form>

                    <h2 id="hr-management-payrolls-DELETEapi-payrolls--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-payrolls--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/payrolls/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payrolls/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-payrolls--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data gaji berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-payrolls--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-payrolls--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-payrolls--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-payrolls--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-payrolls--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-payrolls--id-" data-method="DELETE"
      data-path="api/payrolls/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-payrolls--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-payrolls--id-"
                    onclick="tryItOut('DELETEapi-payrolls--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-payrolls--id-"
                    onclick="cancelTryOut('DELETEapi-payrolls--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-payrolls--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/payrolls/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-payrolls--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-payrolls--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-payrolls--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the payroll. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="hr-management-performance-reviews">HR Management - Performance Reviews</h1>

    <p>API pengelolaan penilaian performa karyawan.</p>

                                <h2 id="hr-management-performance-reviews-GETapi-performanceReviews">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-performanceReviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performanceReviews" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performanceReviews"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performanceReviews">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data review performa berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef80&quot;,
            &quot;employee_id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efe9&quot;,
            &quot;review_period&quot;: &quot;Q1-2026&quot;,
            &quot;final_score&quot;: 89
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performanceReviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performanceReviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performanceReviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-performanceReviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performanceReviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-performanceReviews" data-method="GET"
      data-path="api/performanceReviews"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performanceReviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performanceReviews"
                    onclick="tryItOut('GETapi-performanceReviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performanceReviews"
                    onclick="cancelTryOut('GETapi-performanceReviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performanceReviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performanceReviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-performanceReviews"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-performanceReviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-performanceReviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="hr-management-performance-reviews-POSTapi-performanceReviews">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-performanceReviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/performanceReviews" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"reviewer_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef90\",
    \"review_period\": \"Q1-2026\",
    \"score_discipline\": 88,
    \"note_discipline\": \"Datang tepat waktu secara konsisten.\",
    \"score_target\": 90,
    \"note_target\": \"Mencapai 95% KPI bulanan.\",
    \"final_score\": 89,
    \"is_locked\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performanceReviews"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "reviewer_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef90",
    "review_period": "Q1-2026",
    "score_discipline": 88,
    "note_discipline": "Datang tepat waktu secara konsisten.",
    "score_target": 90,
    "note_target": "Mencapai 95% KPI bulanan.",
    "final_score": 89,
    "is_locked": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-performanceReviews">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Review performa baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef80&quot;,
        &quot;review_period&quot;: &quot;Q1-2026&quot;,
        &quot;final_score&quot;: 89
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-performanceReviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-performanceReviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-performanceReviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-performanceReviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-performanceReviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-performanceReviews" data-method="POST"
      data-path="api/performanceReviews"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-performanceReviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-performanceReviews"
                    onclick="tryItOut('POSTapi-performanceReviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-performanceReviews"
                    onclick="cancelTryOut('POSTapi-performanceReviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-performanceReviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/performanceReviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-performanceReviews"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-performanceReviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-performanceReviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="POSTapi-performanceReviews"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan yang dinilai. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reviewer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reviewer_id"                data-endpoint="POSTapi-performanceReviews"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef90"
               data-component="body">
    <br>
<p>ID reviewer/penilai. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>review_period</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="review_period"                data-endpoint="POSTapi-performanceReviews"
               value="Q1-2026"
               data-component="body">
    <br>
<p>Periode penilaian. Must not be greater than 255 characters. Example: <code>Q1-2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>score_discipline</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="score_discipline"                data-endpoint="POSTapi-performanceReviews"
               value="88"
               data-component="body">
    <br>
<p>Skor kedisiplinan (0-100). Must be at least 0. Must not be greater than 100. Example: <code>88</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_discipline</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_discipline"                data-endpoint="POSTapi-performanceReviews"
               value="Datang tepat waktu secara konsisten."
               data-component="body">
    <br>
<p>Catatan kedisiplinan. Example: <code>Datang tepat waktu secara konsisten.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>score_target</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="score_target"                data-endpoint="POSTapi-performanceReviews"
               value="90"
               data-component="body">
    <br>
<p>Skor pencapaian target (0-100). Must be at least 0. Must not be greater than 100. Example: <code>90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_target</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_target"                data-endpoint="POSTapi-performanceReviews"
               value="Mencapai 95% KPI bulanan."
               data-component="body">
    <br>
<p>Catatan pencapaian target. Example: <code>Mencapai 95% KPI bulanan.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>final_score</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="final_score"                data-endpoint="POSTapi-performanceReviews"
               value="89"
               data-component="body">
    <br>
<p>Skor akhir performa. Must be at least 0. Must not be greater than 100. Example: <code>89</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_locked</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-performanceReviews" style="display: none">
            <input type="radio" name="is_locked"
                   value="true"
                   data-endpoint="POSTapi-performanceReviews"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-performanceReviews" style="display: none">
            <input type="radio" name="is_locked"
                   value="false"
                   data-endpoint="POSTapi-performanceReviews"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Kunci hasil penilaian agar tidak bisa diubah. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="hr-management-performance-reviews-GETapi-performanceReviews--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-performanceReviews--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performanceReviews/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performanceReviews/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performanceReviews--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail review performa ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef80&quot;,
        &quot;review_period&quot;: &quot;Q1-2026&quot;,
        &quot;final_score&quot;: 89
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performanceReviews--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performanceReviews--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performanceReviews--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-performanceReviews--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performanceReviews--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-performanceReviews--id-" data-method="GET"
      data-path="api/performanceReviews/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performanceReviews--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performanceReviews--id-"
                    onclick="tryItOut('GETapi-performanceReviews--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performanceReviews--id-"
                    onclick="cancelTryOut('GETapi-performanceReviews--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performanceReviews--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performanceReviews/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-performanceReviews--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-performanceReviews--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the performanceReview. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="hr-management-performance-reviews-PUTapi-performanceReviews--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-performanceReviews--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/performanceReviews/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"employee_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efe9\",
    \"reviewer_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef90\",
    \"review_period\": \"Q1-2026\",
    \"score_discipline\": 88,
    \"note_discipline\": \"Datang tepat waktu secara konsisten.\",
    \"score_target\": 90,
    \"note_target\": \"Mencapai 95% KPI bulanan.\",
    \"final_score\": 89,
    \"is_locked\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performanceReviews/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "employee_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efe9",
    "reviewer_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef90",
    "review_period": "Q1-2026",
    "score_discipline": 88,
    "note_discipline": "Datang tepat waktu secara konsisten.",
    "score_target": 90,
    "note_target": "Mencapai 95% KPI bulanan.",
    "final_score": 89,
    "is_locked": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-performanceReviews--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data review performa berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef80&quot;,
        &quot;final_score&quot;: 91
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-performanceReviews--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-performanceReviews--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-performanceReviews--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-performanceReviews--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-performanceReviews--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-performanceReviews--id-" data-method="PUT"
      data-path="api/performanceReviews/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-performanceReviews--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-performanceReviews--id-"
                    onclick="tryItOut('PUTapi-performanceReviews--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-performanceReviews--id-"
                    onclick="cancelTryOut('PUTapi-performanceReviews--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-performanceReviews--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/performanceReviews/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/performanceReviews/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-performanceReviews--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-performanceReviews--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the performanceReview. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>employee_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="employee_id"                data-endpoint="PUTapi-performanceReviews--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="body">
    <br>
<p>ID karyawan yang dinilai. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reviewer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reviewer_id"                data-endpoint="PUTapi-performanceReviews--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef90"
               data-component="body">
    <br>
<p>ID reviewer/penilai. Must be a valid UUID. The <code>id</code> of an existing record in the employees table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>review_period</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="review_period"                data-endpoint="PUTapi-performanceReviews--id-"
               value="Q1-2026"
               data-component="body">
    <br>
<p>Periode penilaian. Must not be greater than 255 characters. Example: <code>Q1-2026</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>score_discipline</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="score_discipline"                data-endpoint="PUTapi-performanceReviews--id-"
               value="88"
               data-component="body">
    <br>
<p>Skor kedisiplinan (0-100). Must be at least 0. Must not be greater than 100. Example: <code>88</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_discipline</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_discipline"                data-endpoint="PUTapi-performanceReviews--id-"
               value="Datang tepat waktu secara konsisten."
               data-component="body">
    <br>
<p>Catatan kedisiplinan. Example: <code>Datang tepat waktu secara konsisten.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>score_target</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="score_target"                data-endpoint="PUTapi-performanceReviews--id-"
               value="90"
               data-component="body">
    <br>
<p>Skor pencapaian target (0-100). Must be at least 0. Must not be greater than 100. Example: <code>90</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_target</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_target"                data-endpoint="PUTapi-performanceReviews--id-"
               value="Mencapai 95% KPI bulanan."
               data-component="body">
    <br>
<p>Catatan pencapaian target. Example: <code>Mencapai 95% KPI bulanan.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>final_score</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="final_score"                data-endpoint="PUTapi-performanceReviews--id-"
               value="89"
               data-component="body">
    <br>
<p>Skor akhir performa. Must be at least 0. Must not be greater than 100. Example: <code>89</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_locked</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-performanceReviews--id-" style="display: none">
            <input type="radio" name="is_locked"
                   value="true"
                   data-endpoint="PUTapi-performanceReviews--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-performanceReviews--id-" style="display: none">
            <input type="radio" name="is_locked"
                   value="false"
                   data-endpoint="PUTapi-performanceReviews--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Kunci hasil penilaian agar tidak bisa diubah. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="hr-management-performance-reviews-DELETEapi-performanceReviews--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-performanceReviews--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/performanceReviews/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performanceReviews/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-performanceReviews--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data review performa berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-performanceReviews--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-performanceReviews--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-performanceReviews--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-performanceReviews--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-performanceReviews--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-performanceReviews--id-" data-method="DELETE"
      data-path="api/performanceReviews/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-performanceReviews--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-performanceReviews--id-"
                    onclick="tryItOut('DELETEapi-performanceReviews--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-performanceReviews--id-"
                    onclick="cancelTryOut('DELETEapi-performanceReviews--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-performanceReviews--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/performanceReviews/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-performanceReviews--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-performanceReviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-performanceReviews--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the performanceReview. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="operational-attendance-locations">Operational - Attendance Locations</h1>

    <p>API pengelolaan lokasi presensi (geo-fencing).</p>

                                <h2 id="operational-attendance-locations-GETapi-attendanceLocations">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-attendanceLocations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/attendanceLocations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendanceLocations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attendanceLocations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data lokasi berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef30&quot;,
            &quot;name&quot;: &quot;Kantor Pusat&quot;,
            &quot;latitude&quot;: -6.2009,
            &quot;longitude&quot;: 106.8166,
            &quot;radius_meter&quot;: 100
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attendanceLocations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attendanceLocations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attendanceLocations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attendanceLocations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attendanceLocations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attendanceLocations" data-method="GET"
      data-path="api/attendanceLocations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attendanceLocations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attendanceLocations"
                    onclick="tryItOut('GETapi-attendanceLocations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attendanceLocations"
                    onclick="cancelTryOut('GETapi-attendanceLocations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attendanceLocations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attendanceLocations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-attendanceLocations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attendanceLocations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attendanceLocations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="operational-attendance-locations-POSTapi-attendanceLocations">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-attendanceLocations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/attendanceLocations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Kantor Pusat\",
    \"latitude\": -6.2009,
    \"longitude\": 106.8166,
    \"radius_meter\": 100,
    \"qr_token\": \"LOC-HQ-QR-001\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendanceLocations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Kantor Pusat",
    "latitude": -6.2009,
    "longitude": 106.8166,
    "radius_meter": 100,
    "qr_token": "LOC-HQ-QR-001",
    "is_active": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-attendanceLocations">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Lokasi baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef30&quot;,
        &quot;name&quot;: &quot;Kantor Pusat&quot;,
        &quot;latitude&quot;: -6.2009,
        &quot;longitude&quot;: 106.8166,
        &quot;radius_meter&quot;: 100
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-attendanceLocations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-attendanceLocations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-attendanceLocations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-attendanceLocations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-attendanceLocations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-attendanceLocations" data-method="POST"
      data-path="api/attendanceLocations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-attendanceLocations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-attendanceLocations"
                    onclick="tryItOut('POSTapi-attendanceLocations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-attendanceLocations"
                    onclick="cancelTryOut('POSTapi-attendanceLocations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-attendanceLocations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/attendanceLocations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-attendanceLocations"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-attendanceLocations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-attendanceLocations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-attendanceLocations"
               value="Kantor Pusat"
               data-component="body">
    <br>
<p>Nama lokasi presensi yang unik. Must not be greater than 255 characters. Example: <code>Kantor Pusat</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="POSTapi-attendanceLocations"
               value="-6.2009"
               data-component="body">
    <br>
<p>Koordinat latitude lokasi. Must be between -90 and 90. Example: <code>-6.2009</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="POSTapi-attendanceLocations"
               value="106.8166"
               data-component="body">
    <br>
<p>Koordinat longitude lokasi. Must be between -180 and 180. Example: <code>106.8166</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>radius_meter</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="radius_meter"                data-endpoint="POSTapi-attendanceLocations"
               value="100"
               data-component="body">
    <br>
<p>Radius toleransi presensi dalam meter. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>qr_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="qr_token"                data-endpoint="POSTapi-attendanceLocations"
               value="LOC-HQ-QR-001"
               data-component="body">
    <br>
<p>Token QR untuk presensi berbasis QR. Must not be greater than 255 characters. Example: <code>LOC-HQ-QR-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-attendanceLocations" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-attendanceLocations"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-attendanceLocations" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-attendanceLocations"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif lokasi. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="operational-attendance-locations-GETapi-attendanceLocations--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-attendanceLocations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-attendanceLocations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail lokasi ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef30&quot;,
        &quot;name&quot;: &quot;Kantor Pusat&quot;,
        &quot;latitude&quot;: -6.2009,
        &quot;longitude&quot;: 106.8166,
        &quot;radius_meter&quot;: 100
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-attendanceLocations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-attendanceLocations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-attendanceLocations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-attendanceLocations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-attendanceLocations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-attendanceLocations--id-" data-method="GET"
      data-path="api/attendanceLocations/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-attendanceLocations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-attendanceLocations--id-"
                    onclick="tryItOut('GETapi-attendanceLocations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-attendanceLocations--id-"
                    onclick="cancelTryOut('GETapi-attendanceLocations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-attendanceLocations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/attendanceLocations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-attendanceLocations--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-attendanceLocations--id-"
               value="019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="url">
    <br>
<p>The ID of the attendanceLocation. Example: <code>019d7a4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
            </div>
                    </form>

                    <h2 id="operational-attendance-locations-PUTapi-attendanceLocations--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-attendanceLocations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Kantor Pusat\",
    \"latitude\": -6.2009,
    \"longitude\": 106.8166,
    \"radius_meter\": 100,
    \"qr_token\": \"LOC-HQ-QR-001\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Kantor Pusat",
    "latitude": -6.2009,
    "longitude": 106.8166,
    "radius_meter": 100,
    "qr_token": "LOC-HQ-QR-001",
    "is_active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-attendanceLocations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data lokasi berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef30&quot;,
        &quot;name&quot;: &quot;Kantor Cabang&quot;,
        &quot;latitude&quot;: -6.2101,
        &quot;longitude&quot;: 106.8202,
        &quot;radius_meter&quot;: 120
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-attendanceLocations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-attendanceLocations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-attendanceLocations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-attendanceLocations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-attendanceLocations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-attendanceLocations--id-" data-method="PUT"
      data-path="api/attendanceLocations/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-attendanceLocations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-attendanceLocations--id-"
                    onclick="tryItOut('PUTapi-attendanceLocations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-attendanceLocations--id-"
                    onclick="cancelTryOut('PUTapi-attendanceLocations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-attendanceLocations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/attendanceLocations/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/attendanceLocations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-attendanceLocations--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="url">
    <br>
<p>The ID of the attendanceLocation. Example: <code>019d7a4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="Kantor Pusat"
               data-component="body">
    <br>
<p>Nama lokasi presensi yang unik. Must not be greater than 255 characters. Example: <code>Kantor Pusat</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="-6.2009"
               data-component="body">
    <br>
<p>Koordinat latitude lokasi. Must be between -90 and 90. Example: <code>-6.2009</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="106.8166"
               data-component="body">
    <br>
<p>Koordinat longitude lokasi. Must be between -180 and 180. Example: <code>106.8166</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>radius_meter</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="radius_meter"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="100"
               data-component="body">
    <br>
<p>Radius toleransi presensi dalam meter. Must be at least 1. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>qr_token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="qr_token"                data-endpoint="PUTapi-attendanceLocations--id-"
               value="LOC-HQ-QR-001"
               data-component="body">
    <br>
<p>Token QR untuk presensi berbasis QR. Must not be greater than 255 characters. Example: <code>LOC-HQ-QR-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-attendanceLocations--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-attendanceLocations--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-attendanceLocations--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-attendanceLocations--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif lokasi. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="operational-attendance-locations-DELETEapi-attendanceLocations--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-attendanceLocations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/attendanceLocations/019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-attendanceLocations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Lokasi berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-attendanceLocations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-attendanceLocations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-attendanceLocations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-attendanceLocations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-attendanceLocations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-attendanceLocations--id-" data-method="DELETE"
      data-path="api/attendanceLocations/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-attendanceLocations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-attendanceLocations--id-"
                    onclick="tryItOut('DELETEapi-attendanceLocations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-attendanceLocations--id-"
                    onclick="cancelTryOut('DELETEapi-attendanceLocations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-attendanceLocations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/attendanceLocations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-attendanceLocations--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-attendanceLocations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-attendanceLocations--id-"
               value="019d7a4d-38a7-72b3-aa65-20c9d3d0efe9"
               data-component="url">
    <br>
<p>The ID of the attendanceLocation. Example: <code>019d7a4d-38a7-72b3-aa65-20c9d3d0efe9</code></p>
            </div>
                    </form>

                <h1 id="operational-contract-templates">Operational - Contract Templates</h1>

    <p>API pengelolaan template kontrak kerja.</p>

                                <h2 id="operational-contract-templates-GETapi-contractTemplates">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-contractTemplates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/contractTemplates" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contractTemplates"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contractTemplates">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data template kontrak berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef40&quot;,
            &quot;name&quot;: &quot;PKWT Standard 1 Tahun&quot;,
            &quot;is_active&quot;: true
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contractTemplates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contractTemplates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contractTemplates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contractTemplates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contractTemplates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contractTemplates" data-method="GET"
      data-path="api/contractTemplates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contractTemplates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contractTemplates"
                    onclick="tryItOut('GETapi-contractTemplates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contractTemplates"
                    onclick="cancelTryOut('GETapi-contractTemplates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contractTemplates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contractTemplates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-contractTemplates"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contractTemplates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contractTemplates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="operational-contract-templates-POSTapi-contractTemplates">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-contractTemplates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/contractTemplates" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"PKWT Standard 1 Tahun\",
    \"body\": \"Perjanjian kerja waktu tertentu selama 1 tahun ...\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contractTemplates"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "PKWT Standard 1 Tahun",
    "body": "Perjanjian kerja waktu tertentu selama 1 tahun ...",
    "is_active": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contractTemplates">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Template kontrak baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef40&quot;,
        &quot;name&quot;: &quot;PKWT Standard 1 Tahun&quot;,
        &quot;is_active&quot;: true
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-contractTemplates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contractTemplates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contractTemplates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-contractTemplates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contractTemplates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-contractTemplates" data-method="POST"
      data-path="api/contractTemplates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contractTemplates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contractTemplates"
                    onclick="tryItOut('POSTapi-contractTemplates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contractTemplates"
                    onclick="cancelTryOut('POSTapi-contractTemplates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contractTemplates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contractTemplates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-contractTemplates"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-contractTemplates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-contractTemplates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-contractTemplates"
               value="PKWT Standard 1 Tahun"
               data-component="body">
    <br>
<p>Nama template kontrak. Must not be greater than 255 characters. Example: <code>PKWT Standard 1 Tahun</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>body</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="body"                data-endpoint="POSTapi-contractTemplates"
               value="Perjanjian kerja waktu tertentu selama 1 tahun ..."
               data-component="body">
    <br>
<p>Isi template kontrak. Example: <code>Perjanjian kerja waktu tertentu selama 1 tahun ...</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-contractTemplates" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="POSTapi-contractTemplates"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-contractTemplates" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="POSTapi-contractTemplates"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif template. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="operational-contract-templates-GETapi-contractTemplates--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-contractTemplates--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/contractTemplates/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contractTemplates/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contractTemplates--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail template kontrak ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef40&quot;,
        &quot;name&quot;: &quot;PKWT Standard 1 Tahun&quot;,
        &quot;body&quot;: &quot;Perjanjian kerja...&quot;,
        &quot;is_active&quot;: true
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contractTemplates--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contractTemplates--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contractTemplates--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-contractTemplates--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contractTemplates--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-contractTemplates--id-" data-method="GET"
      data-path="api/contractTemplates/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contractTemplates--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contractTemplates--id-"
                    onclick="tryItOut('GETapi-contractTemplates--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contractTemplates--id-"
                    onclick="cancelTryOut('GETapi-contractTemplates--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contractTemplates--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contractTemplates/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-contractTemplates--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-contractTemplates--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contractTemplate. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="operational-contract-templates-PUTapi-contractTemplates--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-contractTemplates--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/contractTemplates/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"PKWT Standard 1 Tahun\",
    \"body\": \"Perjanjian kerja waktu tertentu selama 1 tahun ...\",
    \"is_active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contractTemplates/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "PKWT Standard 1 Tahun",
    "body": "Perjanjian kerja waktu tertentu selama 1 tahun ...",
    "is_active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-contractTemplates--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data template kontrak berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef40&quot;,
        &quot;name&quot;: &quot;PKWT Revisi&quot;,
        &quot;is_active&quot;: true
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-contractTemplates--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-contractTemplates--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-contractTemplates--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-contractTemplates--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-contractTemplates--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-contractTemplates--id-" data-method="PUT"
      data-path="api/contractTemplates/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-contractTemplates--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-contractTemplates--id-"
                    onclick="tryItOut('PUTapi-contractTemplates--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-contractTemplates--id-"
                    onclick="cancelTryOut('PUTapi-contractTemplates--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-contractTemplates--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/contractTemplates/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/contractTemplates/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-contractTemplates--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-contractTemplates--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contractTemplate. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-contractTemplates--id-"
               value="PKWT Standard 1 Tahun"
               data-component="body">
    <br>
<p>Nama template kontrak. Must not be greater than 255 characters. Example: <code>PKWT Standard 1 Tahun</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>body</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="body"                data-endpoint="PUTapi-contractTemplates--id-"
               value="Perjanjian kerja waktu tertentu selama 1 tahun ..."
               data-component="body">
    <br>
<p>Isi template kontrak. Example: <code>Perjanjian kerja waktu tertentu selama 1 tahun ...</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_active</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-contractTemplates--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="true"
                   data-endpoint="PUTapi-contractTemplates--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-contractTemplates--id-" style="display: none">
            <input type="radio" name="is_active"
                   value="false"
                   data-endpoint="PUTapi-contractTemplates--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Status aktif template. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="operational-contract-templates-DELETEapi-contractTemplates--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-contractTemplates--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/contractTemplates/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contractTemplates/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-contractTemplates--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Template kontrak berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-contractTemplates--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-contractTemplates--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-contractTemplates--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-contractTemplates--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-contractTemplates--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-contractTemplates--id-" data-method="DELETE"
      data-path="api/contractTemplates/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-contractTemplates--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-contractTemplates--id-"
                    onclick="tryItOut('DELETEapi-contractTemplates--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-contractTemplates--id-"
                    onclick="cancelTryOut('DELETEapi-contractTemplates--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-contractTemplates--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/contractTemplates/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-contractTemplates--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-contractTemplates--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-contractTemplates--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the contractTemplate. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="operational-divisions">Operational - Divisions</h1>

    <p>API pengelolaan data divisi.</p>

                                <h2 id="operational-divisions-GETapi-divisions">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-divisions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/divisions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/divisions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-divisions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data divisi berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef10&quot;,
            &quot;name&quot;: &quot;Human Resources&quot;,
            &quot;description&quot;: &quot;Mengelola SDM&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 401,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Unauthenticated.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-divisions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-divisions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-divisions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-divisions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-divisions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-divisions" data-method="GET"
      data-path="api/divisions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-divisions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-divisions"
                    onclick="tryItOut('GETapi-divisions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-divisions"
                    onclick="cancelTryOut('GETapi-divisions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-divisions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/divisions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-divisions"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-divisions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-divisions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="operational-divisions-POSTapi-divisions">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-divisions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/divisions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Human Resources\",
    \"description\": \"Mengelola kebutuhan SDM dan administrasi karyawan.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/divisions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Human Resources",
    "description": "Mengelola kebutuhan SDM dan administrasi karyawan."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-divisions">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Divisi baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef10&quot;,
        &quot;name&quot;: &quot;Human Resources&quot;,
        &quot;description&quot;: &quot;Mengelola SDM&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 422,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Validasi request gagal.&quot;
    },
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;The name has already been taken.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-divisions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-divisions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-divisions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-divisions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-divisions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-divisions" data-method="POST"
      data-path="api/divisions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-divisions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-divisions"
                    onclick="tryItOut('POSTapi-divisions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-divisions"
                    onclick="cancelTryOut('POSTapi-divisions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-divisions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/divisions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-divisions"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-divisions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-divisions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-divisions"
               value="Human Resources"
               data-component="body">
    <br>
<p>Nama divisi yang unik. Must not be greater than 255 characters. Example: <code>Human Resources</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-divisions"
               value="Mengelola kebutuhan SDM dan administrasi karyawan."
               data-component="body">
    <br>
<p>Deskripsi singkat divisi. Example: <code>Mengelola kebutuhan SDM dan administrasi karyawan.</code></p>
        </div>
        </form>

                    <h2 id="operational-divisions-GETapi-divisions--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-divisions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/divisions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/divisions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-divisions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail divisi ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef10&quot;,
        &quot;name&quot;: &quot;Human Resources&quot;,
        &quot;description&quot;: &quot;Mengelola SDM&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-divisions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-divisions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-divisions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-divisions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-divisions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-divisions--id-" data-method="GET"
      data-path="api/divisions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-divisions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-divisions--id-"
                    onclick="tryItOut('GETapi-divisions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-divisions--id-"
                    onclick="cancelTryOut('GETapi-divisions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-divisions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/divisions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-divisions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-divisions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the division. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="operational-divisions-PUTapi-divisions--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-divisions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/divisions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Human Resources\",
    \"description\": \"Mengelola kebutuhan SDM dan administrasi karyawan.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/divisions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Human Resources",
    "description": "Mengelola kebutuhan SDM dan administrasi karyawan."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-divisions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data divisi berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef10&quot;,
        &quot;name&quot;: &quot;People Operations&quot;,
        &quot;description&quot;: &quot;Mengelola SDM&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 422,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Validasi request gagal.&quot;
    },
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;The name field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-divisions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-divisions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-divisions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-divisions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-divisions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-divisions--id-" data-method="PUT"
      data-path="api/divisions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-divisions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-divisions--id-"
                    onclick="tryItOut('PUTapi-divisions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-divisions--id-"
                    onclick="cancelTryOut('PUTapi-divisions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-divisions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/divisions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/divisions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-divisions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-divisions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the division. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-divisions--id-"
               value="Human Resources"
               data-component="body">
    <br>
<p>Nama divisi yang unik. Must not be greater than 255 characters. Example: <code>Human Resources</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-divisions--id-"
               value="Mengelola kebutuhan SDM dan administrasi karyawan."
               data-component="body">
    <br>
<p>Deskripsi singkat divisi. Example: <code>Mengelola kebutuhan SDM dan administrasi karyawan.</code></p>
        </div>
        </form>

                    <h2 id="operational-divisions-DELETEapi-divisions--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-divisions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/divisions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/divisions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-divisions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Divisi berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-divisions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-divisions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-divisions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-divisions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-divisions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-divisions--id-" data-method="DELETE"
      data-path="api/divisions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-divisions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-divisions--id-"
                    onclick="tryItOut('DELETEapi-divisions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-divisions--id-"
                    onclick="cancelTryOut('DELETEapi-divisions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-divisions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/divisions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-divisions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-divisions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-divisions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the division. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="operational-positions">Operational - Positions</h1>

    <p>API pengelolaan data jabatan.</p>

                                <h2 id="operational-positions-GETapi-positions">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-positions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/positions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-positions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data jabatan berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef11&quot;,
            &quot;title&quot;: &quot;HR Officer&quot;,
            &quot;base_salary&quot;: 5500000
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-positions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-positions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-positions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-positions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-positions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-positions" data-method="GET"
      data-path="api/positions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-positions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-positions"
                    onclick="tryItOut('GETapi-positions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-positions"
                    onclick="cancelTryOut('GETapi-positions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-positions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/positions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-positions"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-positions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-positions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="operational-positions-POSTapi-positions">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-positions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/positions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"HR Officer\",
    \"base_salary\": 5500000
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "HR Officer",
    "base_salary": 5500000
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-positions">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Jabatan baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef11&quot;,
        &quot;title&quot;: &quot;HR Officer&quot;,
        &quot;base_salary&quot;: 5500000
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 422,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Validasi request gagal.&quot;
    },
    &quot;errors&quot;: {
        &quot;title&quot;: [
            &quot;The title has already been taken.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-positions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-positions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-positions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-positions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-positions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-positions" data-method="POST"
      data-path="api/positions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-positions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-positions"
                    onclick="tryItOut('POSTapi-positions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-positions"
                    onclick="cancelTryOut('POSTapi-positions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-positions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/positions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-positions"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-positions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-positions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-positions"
               value="HR Officer"
               data-component="body">
    <br>
<p>Nama jabatan yang unik. Must not be greater than 255 characters. Example: <code>HR Officer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>base_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="base_salary"                data-endpoint="POSTapi-positions"
               value="5500000"
               data-component="body">
    <br>
<p>Gaji pokok default untuk jabatan ini. Must be at least 0. Example: <code>5500000</code></p>
        </div>
        </form>

                    <h2 id="operational-positions-GETapi-positions--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-positions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/positions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-positions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail jabatan ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef11&quot;,
        &quot;title&quot;: &quot;HR Officer&quot;,
        &quot;base_salary&quot;: 5500000
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-positions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-positions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-positions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-positions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-positions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-positions--id-" data-method="GET"
      data-path="api/positions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-positions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-positions--id-"
                    onclick="tryItOut('GETapi-positions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-positions--id-"
                    onclick="cancelTryOut('GETapi-positions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-positions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/positions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-positions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-positions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the position. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="operational-positions-PUTapi-positions--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-positions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/positions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"HR Officer\",
    \"base_salary\": 5500000
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "HR Officer",
    "base_salary": 5500000
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-positions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data jabatan berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef11&quot;,
        &quot;title&quot;: &quot;Senior HR Officer&quot;,
        &quot;base_salary&quot;: 6500000
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-positions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-positions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-positions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-positions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-positions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-positions--id-" data-method="PUT"
      data-path="api/positions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-positions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-positions--id-"
                    onclick="tryItOut('PUTapi-positions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-positions--id-"
                    onclick="cancelTryOut('PUTapi-positions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-positions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/positions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/positions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-positions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-positions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the position. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-positions--id-"
               value="HR Officer"
               data-component="body">
    <br>
<p>Nama jabatan yang unik. Must not be greater than 255 characters. Example: <code>HR Officer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>base_salary</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="base_salary"                data-endpoint="PUTapi-positions--id-"
               value="5500000"
               data-component="body">
    <br>
<p>Gaji pokok default untuk jabatan ini. Must be at least 0. Example: <code>5500000</code></p>
        </div>
        </form>

                    <h2 id="operational-positions-DELETEapi-positions--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-positions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/positions/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-positions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Jabatan berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-positions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-positions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-positions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-positions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-positions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-positions--id-" data-method="DELETE"
      data-path="api/positions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-positions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-positions--id-"
                    onclick="tryItOut('DELETEapi-positions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-positions--id-"
                    onclick="cancelTryOut('DELETEapi-positions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-positions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/positions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-positions--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-positions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-positions--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the position. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="operational-shifts">Operational - Shifts</h1>

    <p>API pengelolaan data shift kerja.</p>

                                <h2 id="operational-shifts-GETapi-shifts">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-shifts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/shifts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shifts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shifts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data shift berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef20&quot;,
            &quot;name&quot;: &quot;Pagi&quot;,
            &quot;start_time&quot;: &quot;08:00:00&quot;,
            &quot;end_time&quot;: &quot;17:00:00&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shifts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shifts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shifts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-shifts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shifts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-shifts" data-method="GET"
      data-path="api/shifts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shifts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-shifts"
                    onclick="tryItOut('GETapi-shifts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-shifts"
                    onclick="cancelTryOut('GETapi-shifts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-shifts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shifts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-shifts"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-shifts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-shifts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="operational-shifts-POSTapi-shifts">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-shifts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/shifts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Pagi\",
    \"start_time\": \"08:00:00\",
    \"end_time\": \"17:00:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shifts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Pagi",
    "start_time": "08:00:00",
    "end_time": "17:00:00"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-shifts">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Shift baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef20&quot;,
        &quot;name&quot;: &quot;Pagi&quot;,
        &quot;start_time&quot;: &quot;08:00:00&quot;,
        &quot;end_time&quot;: &quot;17:00:00&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 422,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Validasi request gagal.&quot;
    },
    &quot;errors&quot;: {
        &quot;name&quot;: [
            &quot;The name has already been taken.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-shifts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-shifts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shifts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-shifts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shifts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-shifts" data-method="POST"
      data-path="api/shifts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-shifts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-shifts"
                    onclick="tryItOut('POSTapi-shifts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-shifts"
                    onclick="cancelTryOut('POSTapi-shifts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-shifts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/shifts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-shifts"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-shifts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-shifts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-shifts"
               value="Pagi"
               data-component="body">
    <br>
<p>Nama shift yang unik. Must not be greater than 255 characters. Example: <code>Pagi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="POSTapi-shifts"
               value="08:00:00"
               data-component="body">
    <br>
<p>Jam mulai shift (format H:i:s). Must be a valid date in the format <code>H:i:s</code>. Example: <code>08:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="POSTapi-shifts"
               value="17:00:00"
               data-component="body">
    <br>
<p>Jam selesai shift (format H:i:s). Must be a valid date in the format <code>H:i:s</code>. Example: <code>17:00:00</code></p>
        </div>
        </form>

                    <h2 id="operational-shifts-GETapi-shifts--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-shifts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shifts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail shift ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef20&quot;,
        &quot;name&quot;: &quot;Pagi&quot;,
        &quot;start_time&quot;: &quot;08:00:00&quot;,
        &quot;end_time&quot;: &quot;17:00:00&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shifts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shifts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shifts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-shifts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shifts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-shifts--id-" data-method="GET"
      data-path="api/shifts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shifts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-shifts--id-"
                    onclick="tryItOut('GETapi-shifts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-shifts--id-"
                    onclick="cancelTryOut('GETapi-shifts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-shifts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shifts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-shifts--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-shifts--id-"
               value="019d7a4d-3893-7023-b13b-1e0b381a8150"
               data-component="url">
    <br>
<p>The ID of the shift. Example: <code>019d7a4d-3893-7023-b13b-1e0b381a8150</code></p>
            </div>
                    </form>

                    <h2 id="operational-shifts-PUTapi-shifts--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-shifts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Pagi\",
    \"start_time\": \"08:00:00\",
    \"end_time\": \"17:00:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Pagi",
    "start_time": "08:00:00",
    "end_time": "17:00:00"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-shifts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data shift berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0ef20&quot;,
        &quot;name&quot;: &quot;Pagi (Updated)&quot;,
        &quot;start_time&quot;: &quot;08:30:00&quot;,
        &quot;end_time&quot;: &quot;17:30:00&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-shifts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-shifts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shifts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-shifts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shifts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-shifts--id-" data-method="PUT"
      data-path="api/shifts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-shifts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-shifts--id-"
                    onclick="tryItOut('PUTapi-shifts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-shifts--id-"
                    onclick="cancelTryOut('PUTapi-shifts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-shifts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/shifts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/shifts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-shifts--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-shifts--id-"
               value="019d7a4d-3893-7023-b13b-1e0b381a8150"
               data-component="url">
    <br>
<p>The ID of the shift. Example: <code>019d7a4d-3893-7023-b13b-1e0b381a8150</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-shifts--id-"
               value="Pagi"
               data-component="body">
    <br>
<p>Nama shift yang unik. Must not be greater than 255 characters. Example: <code>Pagi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="PUTapi-shifts--id-"
               value="08:00:00"
               data-component="body">
    <br>
<p>Jam mulai shift (format H:i:s). Must be a valid date in the format <code>H:i:s</code>. Example: <code>08:00:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="PUTapi-shifts--id-"
               value="17:00:00"
               data-component="body">
    <br>
<p>Jam selesai shift (format H:i:s). Must be a valid date in the format <code>H:i:s</code>. Example: <code>17:00:00</code></p>
        </div>
        </form>

                    <h2 id="operational-shifts-DELETEapi-shifts--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-shifts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shifts/019d7a4d-3893-7023-b13b-1e0b381a8150"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-shifts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Shift berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-shifts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-shifts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shifts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-shifts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shifts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-shifts--id-" data-method="DELETE"
      data-path="api/shifts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shifts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-shifts--id-"
                    onclick="tryItOut('DELETEapi-shifts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-shifts--id-"
                    onclick="cancelTryOut('DELETEapi-shifts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-shifts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/shifts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-shifts--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-shifts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-shifts--id-"
               value="019d7a4d-3893-7023-b13b-1e0b381a8150"
               data-component="url">
    <br>
<p>The ID of the shift. Example: <code>019d7a4d-3893-7023-b13b-1e0b381a8150</code></p>
            </div>
                    </form>

                <h1 id="recruitment-applicants">Recruitment - Applicants</h1>

    <p>API pengelolaan data pelamar.</p>

                                <h2 id="recruitment-applicants-GETapi-applicants">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-applicants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/applicants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/applicants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-applicants">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data pelamar berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efb1&quot;,
            &quot;name&quot;: &quot;Siti Aminah&quot;,
            &quot;email&quot;: &quot;siti.aminah@example.com&quot;,
            &quot;stage&quot;: &quot;screening&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-applicants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-applicants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-applicants"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-applicants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-applicants">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-applicants" data-method="GET"
      data-path="api/applicants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-applicants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-applicants"
                    onclick="tryItOut('GETapi-applicants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-applicants"
                    onclick="cancelTryOut('GETapi-applicants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-applicants"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/applicants</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-applicants"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-applicants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-applicants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="recruitment-applicants-POSTapi-applicants">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-applicants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/applicants" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"job_vacancy_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1\",
    \"name\": \"Siti Aminah\",
    \"email\": \"siti.aminah@example.com\",
    \"phone\": \"081234567899\",
    \"resume_path\": \"resumes\\/siti-aminah.pdf\",
    \"stage\": \"screening\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/applicants"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "job_vacancy_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efa1",
    "name": "Siti Aminah",
    "email": "siti.aminah@example.com",
    "phone": "081234567899",
    "resume_path": "resumes\/siti-aminah.pdf",
    "stage": "screening"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-applicants">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Pelamar baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efb1&quot;,
        &quot;name&quot;: &quot;Siti Aminah&quot;,
        &quot;email&quot;: &quot;siti.aminah@example.com&quot;,
        &quot;stage&quot;: &quot;screening&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-applicants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-applicants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-applicants"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-applicants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-applicants">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-applicants" data-method="POST"
      data-path="api/applicants"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-applicants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-applicants"
                    onclick="tryItOut('POSTapi-applicants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-applicants"
                    onclick="cancelTryOut('POSTapi-applicants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-applicants"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/applicants</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-applicants"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-applicants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-applicants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>job_vacancy_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="job_vacancy_id"                data-endpoint="POSTapi-applicants"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efa1"
               data-component="body">
    <br>
<p>ID lowongan yang dilamar. Must be a valid UUID. The <code>id</code> of an existing record in the job_vacancies table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efa1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-applicants"
               value="Siti Aminah"
               data-component="body">
    <br>
<p>Nama lengkap pelamar. Must not be greater than 255 characters. Example: <code>Siti Aminah</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-applicants"
               value="siti.aminah@example.com"
               data-component="body">
    <br>
<p>Email pelamar. Must be a valid email address. Must not be greater than 255 characters. Example: <code>siti.aminah@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-applicants"
               value="081234567899"
               data-component="body">
    <br>
<p>Nomor telepon pelamar. Must not be greater than 20 characters. Example: <code>081234567899</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>resume_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="resume_path"                data-endpoint="POSTapi-applicants"
               value="resumes/siti-aminah.pdf"
               data-component="body">
    <br>
<p>Path file CV/resume. Example: <code>resumes/siti-aminah.pdf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stage"                data-endpoint="POSTapi-applicants"
               value="screening"
               data-component="body">
    <br>
<p>Tahap proses rekrutmen. Example: <code>screening</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>applied</code></li> <li><code>screening</code></li> <li><code>interview</code></li> <li><code>offering</code></li> <li><code>hired</code></li> <li><code>rejected</code></li></ul>
        </div>
        </form>

                    <h2 id="recruitment-applicants-GETapi-applicants--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-applicants--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/applicants/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/applicants/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-applicants--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail pelamar ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efb1&quot;,
        &quot;name&quot;: &quot;Siti Aminah&quot;,
        &quot;email&quot;: &quot;siti.aminah@example.com&quot;,
        &quot;stage&quot;: &quot;screening&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-applicants--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-applicants--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-applicants--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-applicants--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-applicants--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-applicants--id-" data-method="GET"
      data-path="api/applicants/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-applicants--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-applicants--id-"
                    onclick="tryItOut('GETapi-applicants--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-applicants--id-"
                    onclick="cancelTryOut('GETapi-applicants--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-applicants--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/applicants/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-applicants--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-applicants--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the applicant. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="recruitment-applicants-PUTapi-applicants--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-applicants--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/applicants/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"job_vacancy_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0efa1\",
    \"name\": \"Siti Aminah\",
    \"email\": \"siti.aminah@example.com\",
    \"phone\": \"081234567899\",
    \"resume_path\": \"resumes\\/siti-aminah.pdf\",
    \"stage\": \"screening\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/applicants/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "job_vacancy_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0efa1",
    "name": "Siti Aminah",
    "email": "siti.aminah@example.com",
    "phone": "081234567899",
    "resume_path": "resumes\/siti-aminah.pdf",
    "stage": "screening"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-applicants--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data pelamar berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efb1&quot;,
        &quot;stage&quot;: &quot;interview&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-applicants--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-applicants--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-applicants--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-applicants--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-applicants--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-applicants--id-" data-method="PUT"
      data-path="api/applicants/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-applicants--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-applicants--id-"
                    onclick="tryItOut('PUTapi-applicants--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-applicants--id-"
                    onclick="cancelTryOut('PUTapi-applicants--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-applicants--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/applicants/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/applicants/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-applicants--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-applicants--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the applicant. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>job_vacancy_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="job_vacancy_id"                data-endpoint="PUTapi-applicants--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0efa1"
               data-component="body">
    <br>
<p>ID lowongan yang dilamar. Must be a valid UUID. The <code>id</code> of an existing record in the job_vacancies table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0efa1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-applicants--id-"
               value="Siti Aminah"
               data-component="body">
    <br>
<p>Nama lengkap pelamar. Must not be greater than 255 characters. Example: <code>Siti Aminah</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-applicants--id-"
               value="siti.aminah@example.com"
               data-component="body">
    <br>
<p>Email pelamar. Must be a valid email address. Must not be greater than 255 characters. Example: <code>siti.aminah@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-applicants--id-"
               value="081234567899"
               data-component="body">
    <br>
<p>Nomor telepon pelamar. Must not be greater than 20 characters. Example: <code>081234567899</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>resume_path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="resume_path"                data-endpoint="PUTapi-applicants--id-"
               value="resumes/siti-aminah.pdf"
               data-component="body">
    <br>
<p>Path file CV/resume. Example: <code>resumes/siti-aminah.pdf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stage</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stage"                data-endpoint="PUTapi-applicants--id-"
               value="screening"
               data-component="body">
    <br>
<p>Tahap proses rekrutmen. Example: <code>screening</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>applied</code></li> <li><code>screening</code></li> <li><code>interview</code></li> <li><code>offering</code></li> <li><code>hired</code></li> <li><code>rejected</code></li></ul>
        </div>
        </form>

                    <h2 id="recruitment-applicants-DELETEapi-applicants--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-applicants--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/applicants/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/applicants/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-applicants--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data pelamar berhasil dihapus&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-applicants--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-applicants--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-applicants--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-applicants--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-applicants--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-applicants--id-" data-method="DELETE"
      data-path="api/applicants/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-applicants--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-applicants--id-"
                    onclick="tryItOut('DELETEapi-applicants--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-applicants--id-"
                    onclick="cancelTryOut('DELETEapi-applicants--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-applicants--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/applicants/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-applicants--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-applicants--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-applicants--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the applicant. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="recruitment-job-vacancies">Recruitment - Job Vacancies</h1>

    <p>API pengelolaan lowongan kerja.</p>

                                <h2 id="recruitment-job-vacancies-GETapi-jobVacancies">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-jobVacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/jobVacancies" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobVacancies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-jobVacancies">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data lowongan kerja berhasil diambil&quot;
    },
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efa1&quot;,
            &quot;title&quot;: &quot;Backend Developer&quot;,
            &quot;status&quot;: &quot;open&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-jobVacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-jobVacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-jobVacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-jobVacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-jobVacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-jobVacancies" data-method="GET"
      data-path="api/jobVacancies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-jobVacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-jobVacancies"
                    onclick="tryItOut('GETapi-jobVacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-jobVacancies"
                    onclick="cancelTryOut('GETapi-jobVacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-jobVacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/jobVacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-jobVacancies"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-jobVacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-jobVacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="recruitment-job-vacancies-POSTapi-jobVacancies">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-jobVacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/jobVacancies" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"position_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11\",
    \"title\": \"Backend Developer\",
    \"description\": \"Mengembangkan dan memelihara API HRIS.\",
    \"requirements\": \"Minimal 2 tahun pengalaman Laravel.\",
    \"status\": \"open\",
    \"expired_date\": \"2026-06-30\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobVacancies"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "position_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef11",
    "title": "Backend Developer",
    "description": "Mengembangkan dan memelihara API HRIS.",
    "requirements": "Minimal 2 tahun pengalaman Laravel.",
    "status": "open",
    "expired_date": "2026-06-30"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-jobVacancies">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 201,
        &quot;message&quot;: &quot;Lowongan kerja baru berhasil ditambahkan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efa1&quot;,
        &quot;title&quot;: &quot;Backend Developer&quot;,
        &quot;status&quot;: &quot;open&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-jobVacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-jobVacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-jobVacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-jobVacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-jobVacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-jobVacancies" data-method="POST"
      data-path="api/jobVacancies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-jobVacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-jobVacancies"
                    onclick="tryItOut('POSTapi-jobVacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-jobVacancies"
                    onclick="cancelTryOut('POSTapi-jobVacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-jobVacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/jobVacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-jobVacancies"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-jobVacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-jobVacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position_id"                data-endpoint="POSTapi-jobVacancies"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef11"
               data-component="body">
    <br>
<p>ID jabatan untuk lowongan. Must be a valid UUID. The <code>id</code> of an existing record in the positions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-jobVacancies"
               value="Backend Developer"
               data-component="body">
    <br>
<p>Judul lowongan kerja. Must not be greater than 255 characters. Example: <code>Backend Developer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-jobVacancies"
               value="Mengembangkan dan memelihara API HRIS."
               data-component="body">
    <br>
<p>Deskripsi lowongan. Example: <code>Mengembangkan dan memelihara API HRIS.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>requirements</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="requirements"                data-endpoint="POSTapi-jobVacancies"
               value="Minimal 2 tahun pengalaman Laravel."
               data-component="body">
    <br>
<p>Kualifikasi/kebutuhan kandidat. Example: <code>Minimal 2 tahun pengalaman Laravel.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-jobVacancies"
               value="open"
               data-component="body">
    <br>
<p>Status lowongan: open atau closed. Example: <code>open</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>open</code></li> <li><code>closed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>expired_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="expired_date"                data-endpoint="POSTapi-jobVacancies"
               value="2026-06-30"
               data-component="body">
    <br>
<p>Tanggal kadaluarsa lowongan. Must be a valid date. Example: <code>2026-06-30</code></p>
        </div>
        </form>

                    <h2 id="recruitment-job-vacancies-GETapi-jobVacancies--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-jobVacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/jobVacancies/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobVacancies/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-jobVacancies--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Detail lowongan kerja ditemukan&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efa1&quot;,
        &quot;title&quot;: &quot;Backend Developer&quot;,
        &quot;status&quot;: &quot;open&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-jobVacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-jobVacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-jobVacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-jobVacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-jobVacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-jobVacancies--id-" data-method="GET"
      data-path="api/jobVacancies/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-jobVacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-jobVacancies--id-"
                    onclick="tryItOut('GETapi-jobVacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-jobVacancies--id-"
                    onclick="cancelTryOut('GETapi-jobVacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-jobVacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/jobVacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-jobVacancies--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-jobVacancies--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the jobVacancy. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="recruitment-job-vacancies-PUTapi-jobVacancies--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-jobVacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/jobVacancies/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"position_id\": \"019d8f4d-38a7-72b3-aa65-20c9d3d0ef11\",
    \"title\": \"Backend Developer\",
    \"description\": \"Mengembangkan dan memelihara API HRIS.\",
    \"requirements\": \"Minimal 2 tahun pengalaman Laravel.\",
    \"status\": \"open\",
    \"expired_date\": \"2026-06-30\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobVacancies/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "position_id": "019d8f4d-38a7-72b3-aa65-20c9d3d0ef11",
    "title": "Backend Developer",
    "description": "Mengembangkan dan memelihara API HRIS.",
    "requirements": "Minimal 2 tahun pengalaman Laravel.",
    "status": "open",
    "expired_date": "2026-06-30"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-jobVacancies--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Data lowongan kerja berhasil diperbarui&quot;
    },
    &quot;data&quot;: {
        &quot;id&quot;: &quot;019d8f4d-38a7-72b3-aa65-20c9d3d0efa1&quot;,
        &quot;status&quot;: &quot;closed&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-jobVacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-jobVacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-jobVacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-jobVacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-jobVacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-jobVacancies--id-" data-method="PUT"
      data-path="api/jobVacancies/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-jobVacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-jobVacancies--id-"
                    onclick="tryItOut('PUTapi-jobVacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-jobVacancies--id-"
                    onclick="cancelTryOut('PUTapi-jobVacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-jobVacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/jobVacancies/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/jobVacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-jobVacancies--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-jobVacancies--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the jobVacancy. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position_id"                data-endpoint="PUTapi-jobVacancies--id-"
               value="019d8f4d-38a7-72b3-aa65-20c9d3d0ef11"
               data-component="body">
    <br>
<p>ID jabatan untuk lowongan. Must be a valid UUID. The <code>id</code> of an existing record in the positions table. Example: <code>019d8f4d-38a7-72b3-aa65-20c9d3d0ef11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-jobVacancies--id-"
               value="Backend Developer"
               data-component="body">
    <br>
<p>Judul lowongan kerja. Must not be greater than 255 characters. Example: <code>Backend Developer</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-jobVacancies--id-"
               value="Mengembangkan dan memelihara API HRIS."
               data-component="body">
    <br>
<p>Deskripsi lowongan. Example: <code>Mengembangkan dan memelihara API HRIS.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>requirements</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="requirements"                data-endpoint="PUTapi-jobVacancies--id-"
               value="Minimal 2 tahun pengalaman Laravel."
               data-component="body">
    <br>
<p>Kualifikasi/kebutuhan kandidat. Example: <code>Minimal 2 tahun pengalaman Laravel.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-jobVacancies--id-"
               value="open"
               data-component="body">
    <br>
<p>Status lowongan: open atau closed. Example: <code>open</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>open</code></li> <li><code>closed</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>expired_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="expired_date"                data-endpoint="PUTapi-jobVacancies--id-"
               value="2026-06-30"
               data-component="body">
    <br>
<p>Tanggal kadaluarsa lowongan. Must be a valid date. Example: <code>2026-06-30</code></p>
        </div>
        </form>

                    <h2 id="recruitment-job-vacancies-DELETEapi-jobVacancies--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-jobVacancies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/jobVacancies/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/jobVacancies/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-jobVacancies--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;status&quot;: &quot;success&quot;,
        &quot;code&quot;: 200,
        &quot;message&quot;: &quot;Lowongan kerja berhasil dihapus (Soft Delete)&quot;
    },
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 403,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Anda tidak memiliki izin untuk mengakses resource ini.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;meta&quot;: {
        &quot;code&quot;: 404,
        &quot;status&quot;: &quot;error&quot;,
        &quot;message&quot;: &quot;Data yang diminta tidak ditemukan.&quot;
    },
    &quot;errors&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-jobVacancies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-jobVacancies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-jobVacancies--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-jobVacancies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-jobVacancies--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-jobVacancies--id-" data-method="DELETE"
      data-path="api/jobVacancies/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-jobVacancies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-jobVacancies--id-"
                    onclick="tryItOut('DELETEapi-jobVacancies--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-jobVacancies--id-"
                    onclick="cancelTryOut('DELETEapi-jobVacancies--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-jobVacancies--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/jobVacancies/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-jobVacancies--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-jobVacancies--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-jobVacancies--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the jobVacancy. Example: <code>architecto</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
